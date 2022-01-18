<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

echo'{
    "mediciones":[
        {
            "nombreZona": "Z500",
            "tituloZona": "El Dorado",
            "tituloArea": null,
            "nombreArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "temperatura",
            "valor": "29",
            "cliente": null
        },
        {
            "nombreZona": "Z500",
            "tituloZona": "El Dorado",
            "tituloArea": null,
            "nombreArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "medTemperatura",
            "valor": "40",
            "cliente": null
        },
        {
            "nombreZona": "Z500",
            "tituloZona": "El Dorado",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "humedad",
            "valor": "19",
            "cliente": null
        },
        {
            "nombreZona": "Z500",
            "tituloZona": "El Dorado",
            "tituloArea": null,
            "nombreArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "medHumedad",
            "valor": "70",
            "cliente": null
        },
        {
            "nombreZona": "Z500",
            "tituloZona": "El Dorado",
            "nombreArea": "B501",
            "tituloArea": "Veracruz",
            "fecha": "2021-11-25 15:30",
            "magnitud": "entradas",
            "valor": "6",
            "cliente": null
        },
        {
            "nombreZona": "Z500",
            "tituloZona": "El Dorado",
            "nombreArea": "B502",
            "tituloArea": "Come-Come",
            "fecha": "2021-11-25 15:30",
            "magnitud": "entradas",
            "valor": "9",
            "cliente": null
        },
        {
            "nombreZona": "Z500",
            "tituloZona": "El Dorado",
            "tituloArea": null,
            "nombreArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "fidelidad",
            "valor": "2",
            "cliente": "DD45GTFC"
        },
        {
            "nombreZona": "Z500",
            "tituloZona": "El Dorado",
            "tituloArea": null,
            "nombreArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "fidelidad",
            "valor": "6",
            "cliente": "FRCC8876"
        },
        {
            "nombreZona": "Z500",
            "tituloZona": "El Dorado",
            "tituloArea": null,
            "nombreArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "fidelidad",
            "valor": "11",
            "cliente": "888888FF"
        }
    ]
} ';