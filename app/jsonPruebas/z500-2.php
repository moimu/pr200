<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

echo'{
    "mediciones":[
        {
            "nombreZona": "Z500",
            "nombreArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "temperatura",
            "valor": "1"
        },
        {
            "nombreZona": "Z500",
            "nombreArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "humedad",
            "valor": "11"
        },
        {
            "nombreZona": "Z500",
            "nombreArea": "B501",
            "fecha": "2021-11-25 15:30",
            "magnitud": "entradas",
            "valor": "6"
        },
        {
            "nombreZona": "Z500",
            "nombreArea": "B502",
            "fecha": "2021-11-25 15:30",
            "magnitud": "entradas",
            "valor": "9"
        }
    ]
} ';