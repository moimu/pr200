// pines conexion Arduino 1 para RFID libreria  MFRC522
// RST 9 MISO 12  MOSI 11 SCK 13  SDA 10
// pines conexion MK para RFID 
// SDA 11 SCK 9 MOSI 8 MISO 10 GND GND RST 12 3.3v VCC   
#include <SPI.h>
// libreria RFID comunicacion
#include <MFRC522.h>

//  *** WEB CLIENT  ***
#include <WiFiNINA.h> // libreria wifi
#include "arduino_secrets.h" 
char ssid[] = SECRET_SSID;  // SSID nombre
char pass[] = SECRET_PASS;  // contraseña red
int status = WL_IDLE_STATUS;
//IPAddress server(52,72,30,250);       // no DNS
char server[] = "pr200.newflow.tech";   // using DNS
String postData;
String postVariable = "iluminacion=";
//WiFiClient client;       // Inicializar biblioteca del cliente puerto 80 default
WiFiSSLClient client;    // Inicializar biblioteca del cliente puerto 443 default
int ingresarEnBd = 0;

//#define RST_PIN  9     // Pin de reset  Arduino 1
//#define SS_PIN  10     // Pin de slave select  Arduino 1
#define RST_PIN  12      // Pin de reset  (RST)
#define SS_PIN  11       // Pin de slave select  (SDA)

int valorMaxSensor = 0;
int valorMinSensor = 1023;
int valorSensor = 0;
unsigned long tiempoActual = 0;

MFRC522 mfrc522( SS_PIN, RST_PIN ); // Objeto mfrc522 enviando pins slave select y reset 
byte LecturaUID[4];        
byte llave[4]= {0xEC, 0x8F, 0x44, 0x4A} ;   

void setup(){
  pinMode(5, OUTPUT);
  Serial.begin(9600);   //comienza comunicación serie

// *** WEB CLIENT ***
if ( WiFi.status() == WL_NO_MODULE ) {
    Serial.println(" ¡La comunicación con el módulo WiFi falló! ");
    while (true);
  }
  String fv = WiFi.firmwareVersion();
  if ( fv < WIFI_FIRMWARE_LATEST_VERSION ) {
    Serial.println(" Actualiza el firmware ");
  }
  while ( status != WL_CONNECTED ) {
    Serial.print(" Intentando conectarse a SSID: ");
    Serial.println(ssid);
    // Conéctar a la red WPA / WPA2. Cambiar línea si usa red abierta o WEP:
    status = WiFi.begin(ssid, pass);
    delay(12000);
  }
  Serial.println(" Conectado a WiFi ");
  printWifiStatus();
  Serial.println("\nIniciando la conexión al servidor...");
 if ( client.connect(server, 443) ) {   // 80 o 443
  Serial.println(" Conectado al servidor "); // si obtiene una conexión, informa
 }
  // *** SENSORES ***
  tone(5, 440, 6000);   // calibrar fotoresistencia 6 seg
  while( millis() < 6000 ){
      valorSensor = analogRead(A0); // valores Mínimo y Máximo fotoresistencia
      if(valorSensor < valorMinSensor){
          valorMinSensor = valorSensor;
        }  
        if(valorSensor > valorMaxSensor){
          valorMaxSensor = valorSensor;
        }  
    }
  noTone(5);
  Serial.print(" MinSensor: "); Serial.print(valorMinSensor);
  Serial.print(" MaxSensor: "); Serial.print(valorMaxSensor);
  
  SPI.begin(); // inicializa bus SPI     
  mfrc522.PCD_Init();   // inicializa MFRC522 (RFID)
  Serial.println(" RFID ON introduce llave:");  

}
void loop(){

  if( ingresarEnBd == 1 ){
    client.println("POST /api/apiReceive.php HTTP/1.1"); 
    client.println("Host: pr200.newflow.tech");
    client.println("Content-Type: application/x-www-form-urlencoded");
    client.print("Content-Length: ");
    client.println(postData.length());
    client.println();
    client.println(postData);
    ingresarEnBd = 0;
  }
  
  while ( client.available() ) {   // info de servidor, leer e imprimir
    char c = client.read();
    Serial.write(c);
  }
  
  if( millis() > tiempoActual + 25000 ){ // cada minuto lectura de luminosidad
    tiempoActual = millis();
    Serial.println( analogRead(A0) );
    postVariable = "iluminacion=";
    float magnitudValor = map(analogRead(A0),valorMinSensor,valorMaxSensor,100.00,0.00);
    postData = postVariable + magnitudValor;
    ingresarEnBd = 1;     
    }
  
  if ( ! mfrc522.PICC_IsNewCardPresent() )   // si no hay una tarjeta presente, resetea el bucle
    return;                                   
  if ( ! mfrc522.PICC_ReadCardSerial() )      // si no puede obtener datos de tarjeta
    return;          
    
  Serial.print("UID leido : "); 
  // lectura de los 4 bytes    
  for (byte i = 0; i < 4; i++) { 
    if ( mfrc522.uid.uidByte[i] < 0x10 ){   
      Serial.print(" 0");     
    }
    else{           
      Serial.print(" ");        
    }
    // imprime el byte hexadecimal
    Serial.print( mfrc522.uid.uidByte[i], HEX ); 
    //guarda byte UID leido   
    LecturaUID[i] = mfrc522.uid.uidByte[i];    
  }           
  if( verificaUID( LecturaUID, llave ) ){    // Verificación de UID
    Serial.println(" Acceso permitido");
    postVariable = "entradas=";
    int magnitudValor = 1;
    postData = postVariable + magnitudValor;
    ingresarEnBd = 1;     
  }
  else {        
    Serial.println(" Acceso NO permitido");           
  }  
  mfrc522.PICC_HaltA();  // corta comunicación con la tarjeta RFID  
}
boolean verificaUID( byte lectura[] ,byte llave[] ) {
  // si byte de UID  es distinto al de la llave, no abre cerradura
  for ( byte i=0; i < 4; i++ ){        
    if( lectura[i] != llave[i] ){        
      return (false);          
    }
    return (true); 
  }
}
void printWifiStatus() {
  // imprime el SSID de la red a la que estás conectado:
  Serial.print("SSID: ");
  Serial.println( WiFi.SSID() );

  // imprime la dirección IP de tu placa:
  IPAddress ip = WiFi.localIP();
  Serial.print("IP Address: ");
  Serial.println(ip);

  // imprime la Intensidad de señal recibida:
  long rssi = WiFi.RSSI();
  Serial.print("Intensidad de señal (RSSI): ");
  Serial.print(rssi);
  Serial.println(" dBm");
}