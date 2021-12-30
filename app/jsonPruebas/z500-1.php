<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
echo'{
    "mediciones":[
        {
            "nombreZona": "Z500",
            "tituloZona": "El Dorado",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "luminosidad",
            "valor": "88",
            "cliente": null
        },
        {
            "nombreZona": "Z500",
            "tituloZona": "El Dorado",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "medLuminosidad",
            "valor": "75",
            "cliente": null
        },
        {
            "nombreZona": "Z500",
            "tituloZona": "El Dorado",
            "nombreArea": "A501",
            "tituloArea": "Rápidos del Orinoco",
            "fecha": "2021-11-25 15:30",
            "magnitud": "pulsaciones",
            "valor": "4",
            "cliente": null
        },
        {
            "nombreZona": "Z500",
            "tituloZona": "El Dorado",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "densidad",
            "valor": "100",
            "cliente": null
        }
    ]
} ';