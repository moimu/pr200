<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
echo'{
    "mediciones":[
        {
            "nombreZona": "Z300",
            "nombreArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "luminosidad",
            "valor": "71"
        },
        {
            "nombreZona": "Z300",
            "nombreArea": "B301",
            "fecha": "2021-11-25 15:30",
            "magnitud": "entrada",
            "valor": "7"
        },
        {
            "nombreZona": "Z300",
            "nombreArea": "B302",
            "fecha": "2021-11-25 15:30",
            "magnitud": "entrada",
            "valor": "2"
        }
    ]
} ';