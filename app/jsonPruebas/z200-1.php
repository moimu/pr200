<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
echo'{
    "mediciones":[
        {
            "nombreZona": "Z200",
            "tituloZona": "Puerta de América",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "luminosidad",
            "valor": "90",
            "cliente": null
        },
        {
            "nombreZona": "Z200",
            "tituloZona": "Puerta de América",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "medLuminosidad",
            "valor": "61",
            "cliente": null
        },
        {
            "nombreZona": "Z200",
            "tituloZona": "Puerta de América",
            "nombreArea": "A201",
            "tituloArea": "Anaconda",
            "fecha": "2021-11-25 15:30",
            "magnitud": "pulsaciones",
            "valor": "8",
            "cliente": null
        },
        {
            "nombreZona": "Z200",
            "tituloZona": "Puerta de América",
            "nombreArea": "A202",
            "tituloArea": "Navío Barbarroja",
            "fecha": "2021-11-25 15:30",
            "magnitud": "pulsaciones",
            "valor": "20",
            "cliente": null
        },
        {
            "nombreZona": "Z200",
            "tituloZona": "Puerta de América",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "densidad",
            "valor": "27",
            "cliente": null
        }
    ]
} ';
