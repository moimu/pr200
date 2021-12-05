<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
echo'{
    "mediciones":[
        {
            "nombreZona": "Z200",
            "nombreArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "iluminacion",
            "valor": "90"
        },
        {
            "nombreZona": "Z200",
            "nombreArea": "A201",
            "fecha": "2021-11-25 15:30",
            "magnitud": "pulsaciones",
            "valor": "8"
        },
        {
            "nombreZona": "Z200",
            "nombreArea": "A202",
            "fecha": "2021-11-25 15:30",
            "magnitud": "pulsaciones",
            "valor": "20"
        }
    ]
} ';