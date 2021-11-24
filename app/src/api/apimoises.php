<?php
/** Conexion a la base de datos y consultas */
$server = "mysql-pr200"; 
$user = "root"; 
$password = "rpass"; 
$database = "zonas";  
$db = new mysqli($server,$user, $password,$database); 
if($db->connect_error){ 
    die("La conexión con la bd ha fallado, error: " . $db->connect_errno . ": ". $db->connect_error); 
} 

$sentencia1 = $db->prepare(" SELECT `fh`,`cantluz` FROM `Z400` WHERE `id`=?"); 
$sentencia1 -> execute(); 
$sentencia1 -> bind_result( $horaZ400, $cantluzZ400 );
while( $sentencia1->fetch() ){  echo "Zona Z400 - hora: ".date_format(date_create($horaZ400), 'H:i:s').", cantluz: $cantluzZ400 <br><br>"; }
$sentencia1 -> close();

$sentencia2 = $db->prepare(" SELECT `fh`,`entrada` FROM `B401` ORDER BY `idregistro` DESC LIMIT 1 "); 
$sentencia2 -> execute(); 
$sentencia2 -> bind_result( $horaB401, $entradaB401 );
while( $sentencia2->fetch() ){  echo "Area B401 - hora: $horaB401, entrada: $entradaB401 <br><br>";  }
$sentencia2 -> close();

$sentencia3 = $db->prepare(" SELECT `fh`,`entrada` FROM `B402` ORDER BY `idregistro` DESC LIMIT 1 "); 
$sentencia3 -> execute(); 
$sentencia3 -> bind_result( $horaB402, $entradaB402 );
while( $sentencia3->fetch() ){  echo "Area B402 - hora: $horaB402, entrada: $entradaB402 <br><br>"; }
$sentencia3 -> close();

// date_format($horaZ400, 'H:i:s');
$db->close();

// S2) hora en la que se realizó la entrada y área
// S3) hora en la que se realizó la muestra, área y cantidad de luz   luz %

// {
//     "zonas":[
//         {
//         "nombre": "Z400",

//         "sensor":[
//             {
//             "tipo":"Fotoresistencia",
//             "hora":"$horaZ400",
//             "area":"",
//             "valor":["$cantluzZ400"]
//             }
//         ],

//         "areas" :[
//             {
//             "tipo":"RFID",
//             "nombre":"B401",
//             "sensor":[
//                 { 
//                 "hora":"$horaB401",
//                 "valor":"$entradaB401"
//                 }
//             ]  
//             }
//             {
//             "tipo":"RFID",
//             "nombre":"B402",
//             "sensor":[
//                 { 
//                 "hora":"$horaB402",
//                 "valor":"$entradaB402"
//                 }
//             ]  
//             }
//         ]
//         }
//     ]
// }   