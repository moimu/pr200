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
            "magnitud": "temperatura",
            "valor": "26",
            "cliente": null
        },
        {
            "nombreZona": "Z200",
            "tituloZona": "Puerta de América",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "humedad",
            "valor": "15",
            "cliente": null
        },
        {
            "nombreZona": "Z200",
            "tituloZona": "Puerta de América",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "medTemperatura",
            "valor": "22",
            "cliente": null
        },
        {
            "nombreZona": "Z200",
            "tituloZona": "Puerta de América",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "medHumedad",
            "valor": "33",
            "cliente": null
        },
        {
            "nombreZona": "Z200",
            "tituloZona": "Puerta de América",
            "nombreArea": "B201",
            "tituloArea": "La Cabaña Criolla",
            "fecha": "2021-11-25 15:30",
            "magnitud": "entradas",
            "valor": "20",
            "cliente": null
        },
        {
            "nombreZona": "Z200",
            "tituloZona": "Puerta de América",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "fidelidad",
            "valor": "4",
            "cliente": "SD44RT55"
        },
        {
            "nombreZona": "Z200",
            "tituloZona": "Puerta de América",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "fidelidad",
            "valor": "7",
            "cliente": "777777FF"
        }
    ]
} ';
