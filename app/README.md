# pr200
pr_arduino

# Diccionario de datos Json para todos los integrantes del proyecto
{
    "mediciones":[
        {
            "nombreZona": [string: nombre de la zona con la letra en mayúscula],
            "nombreArea": [string: nombre del area con la letra en mayúscula],
            "magnitud": [string: pulsaciones|entradas|iluminacion|temperatura|humedad],
            "valor": [float: valor medido más reciente y sin unidad. Para pulsaciones y entradas RFID es la suma de todos los registros de esas magnitudes en la bd],
            "fecha": [datetime: fecha de la medición más reciente con formato "AAAA-MM-DD HH:MM". Para pulsaciones y entradas RFID se pone la de la ultima medición]
        }
    ]
}      
EJEMPLO:
{
    "mediciones":[
        {
            "nombreZona": "Z100",
            "nombreArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "temperatura",
            "valor": "20"
        },
        {
            "nombreZona": "Z100",
            "nombreArea": "A101",
            "fecha": "2021-11-25 15:30",
            "magnitud": "pulsaciones",
            "valor": "86"
        }
        .
        .
        .
    ]
}