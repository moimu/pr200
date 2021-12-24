<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
echo '{
    "mediciones":[
        {
            "nombreZona": "Z100",
            "nombreArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "temperatura",
            "valor": "21"
        },
        {
            "nombreZona": "Z100",
            "nombreArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "humedad",
            "valor": "50"
        },
        {
            "nombreZona": "Z100",
            "nombreArea": "B101",
            "fecha": "2021-11-25 15:30",
            "magnitud": "entradas",
            "valor": "1"
        }
    ]
}';