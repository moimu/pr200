# pr200
nombre del proyecto : pr200

# Partes fundamentales

Las dos partes principales en las que se divide la aplicación son:

- Datos del equipo:
Parte en la cual se solicitan datos a las API de los participantes del proyecto,
son tratados y mostrados de manera agradable.

- Datos de respaldo o prueba
En esta parte se solicitan datos a APIs creadas funcionales pero con datos aleatorios,
esta parte sirve como ejemplo de funcionamiento, gestión, y tratamiento realizado en este proyecto.
    

# Diccionario de datos Json para todos los integrantes del proyecto fase1
{
    "mediciones":[
        {
            "nombreZona": [string: nombre de la zona con la letra en mayúscula],
            "nombreArea": [string: nombre del area con la letra en mayúscula],
            "magnitud": [string: pulsaciones|entradas|luminosidad|temperatura|humedad],
            "valor": [float: valor medido más reciente y sin unidad. 
            Para pulsaciones y entradas RFID es la suma de todos los registros de esas magnitudes en la bd],
            "fecha": [datetime: fecha de la medición más reciente con formato "AAAA-MM-DD HH:MM".
             Para pulsaciones y entradas RFID se pone la de la ultima medición]
        }
    ]
} 

# Ejemplo
{ "mediciones":[
    {   "nombreZona": "Z100",
        "nombreArea": null,
        "fecha": "2021-11-25 15:30",
        "magnitud": "temperatura",
        "valor": "20"
    },
    {   "nombreZona": "Z100",
        "nombreArea": "A101",
        "fecha": "2021-11-25 15:30",
        "magnitud": "pulsaciones",
        "valor": "86" 
    }
    etc..
] }


# Diccionario de datos Json para todos los integrantes del proyecto fase 2
{
    "mediciones":[
        {
        "nombreZona": [string: nombre de la zona con la letra en mayúscula],
        "tituloZona": [string: nombre de la zona que pertenezca en el mapa de la isla mágica  | null],
        "nombreArea": [string: nombre del area mayusculas A101 | null],
        "tituloArea": [string: nombre de la área que pertenezca en el mapa de la isla mágica  | null],
        "magnitud": [string: pulsaciones|entradas|luminosidad|temperatura|humedad|medLuminosidad|medTemperatura|medHumedad|densidad|fidelidad],
        "valor": [float: valor medido más reciente y sin unidad. (pulsaciones|entradas|luminosidad|temperatura|humedad de la misma manera   que en fase1) 
            ( fidelidad del cliente suma TOTALENTRADAS RFID del cliente !ultimos2meses! AreasBxxx )
            ( densidad suma total en la !ultima media hora! anterior a la consulta todas las pulsaciones / sumatotalPlazasAtraccionesAreasAxxx de tu Zona) 
                ( medLuminosidad|medTemperatura|medHumedad DEVOLVER LA MEDIA DE LOS REGISTROS almacenados de la media hora anterior a                   a la consulta redondeado a 2 decimales)],
        "fecha": [datetime: fecha de la medición más reciente con formato "AAAA-MM-DD HH:MM".    última medición],
        "cliente": null | HEX  por cada cliente enviare un objeto con propiedades "magnitud" : "fidelidad", "valor" :                     "totalEntradasEsteclienteUltimos2meses" (desde momento de consulta)
        "cliente": "EC8F444A"  ( valor UID hexadecimal de su tarjeta sin 0x)
        }    
    ]             
}     

 
# Ejemplo
{ "mediciones":[
    {   "nombreZona": "Z100",
        "tituloZona": "Sevilla puerto de Indias"
        "nombreArea": "A101",
        "tituloArea": "El desafio"
        "fecha": "2021-11-25 15:30",
        "magnitud": "pulsaciones",
        "valor": 20.00,
        "cliente": null
    },
