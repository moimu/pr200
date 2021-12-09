# pr200
nombre del proyecto : pr200

# Partes fundamentales

Las dos partes principales en las que se divide la aplicación son:

- Datos del equipo:
Parte en la cual se solicitan datos a las API de los participantes del proyecto,
son tratados y mostrados de manera agradable.

- Datos de respaldo o prueba
En esta parte se solicitan datos a APIs creadas funcionales pero con datos aleatorios,
esta parte sirve como ejemplo de funcionamiento, gestión, y tratamiento relalizado en este proyecto.
    

# Diccionario de datos Json para todos los integrantes del proyecto
{
    "mediciones":[
        {
            "nombreZona": [string: nombre de la zona con la letra en mayúscula],
            "nombreArea": [string: nombre del area con la letra en mayúscula],
            "magnitud": [string: pulsaciones|entradas|iluminacion|temperatura|humedad],
            "valor": [float: valor medido más reciente y sin unidad. 
            Para pulsaciones y entradas RFID es la suma de todos los registros de esas magnitudes en la bd],
            "fecha": [datetime: fecha de la medición más reciente con formato "AAAA-MM-DD HH:MM".
             Para pulsaciones y entradas RFID se pone la de la ultima medición]
        }
    ]
}      
EJEMPLO:

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

