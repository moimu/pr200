<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

echo' {
    "mediciones":[
        {
            "nombreZona": "Z100",
            "tituloZona": "Sevilla, Puerto de Indias",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "luminosidad",
            "valor": "20",
            "cliente": null
        },
        {
            "nombreZona": "Z100",
            "tituloZona": "Sevilla, Puerto de Indias",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "medLuminosidad",
            "valor": "50",
            "cliente": null
        },
        {
            "nombreZona": "Z100",
            "tituloZona": "Sevilla, Puerto de Indias",
            "nombreArea": "A101",
            "tituloArea": "El Desafío",
            "fecha": "2021-11-25 15:30",
            "magnitud": "pulsaciones",
            "valor": "86",
            "cliente": null
        },
        {
            "nombreZona": "Z100",
            "tituloZona": "Sevilla, Puerto de Indias",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "densidad",
            "valor": "40",
            "cliente": null
        }
    ]
} ';