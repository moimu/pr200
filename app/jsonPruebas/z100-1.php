<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

echo' {
    "mediciones":[
        {
            "nombreZona": "Z100",
            "nombreArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "iluminacion",
            "valor": "20"
        },
        {
            "nombreZona": "Z100",
            "nombreArea": "A101",
            "fecha": "2021-11-25 15:30",
            "magnitud": "pulsaciones",
            "valor": "86"
        }
    ]
} ';