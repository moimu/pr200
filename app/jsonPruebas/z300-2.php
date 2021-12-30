<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
echo'{
    "mediciones":[
        {
            "nombreZona": "Z300",
            "tituloZona": "Amazonia",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "luminosidad",
            "valor": "71",
            "cliente": null
        },
        {
            "nombreZona": "Z300",
            "tituloZona": "Amazonia",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "medLuminosidad",
            "valor": "60",
            "cliente": null
        },
        {
            "nombreZona": "Z300",
            "tituloZona": "Amazonia",
            "nombreArea": "B301",
            "tituloArea": "El Fuerte",
            "fecha": "2021-11-25 15:30",
            "magnitud": "entradas",
            "valor": "7",
            "cliente": null
        },
        {
            "nombreZona": "Z300",
            "tituloZona": "Amazonia",
            "nombreArea": "B302",
            "tituloArea": "El Arsenal",
            "fecha": "2021-11-25 15:30",
            "magnitud": "entradas",
            "valor": "2",
            "cliente": null
        },
        {
            "nombreZona": "Z300",
            "tituloZona": "Amazonia",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "fidelidad",
            "valor": "2",
            "cliente": "AEFR457U"
        },
        {
            "nombreZona": "Z300",
            "tituloZona": "Amazonia",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "fidelidad",
            "valor": "7",
            "cliente": "SSFR787X"
        }
    ]
} ';