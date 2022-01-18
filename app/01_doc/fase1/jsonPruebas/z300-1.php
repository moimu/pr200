<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

echo '{
    "mediciones":[
        {
            "nombreZona": "Z300",
            "tituloZona": "Amazonia",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "temperatura",
            "valor": "12",
            "cliente": null
        },
        {
            "nombreZona": "Z300",
            "tituloZona": "Amazonia",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "medTemperatura",
            "valor": "27",
            "cliente": null
        },
        {
            "nombreZona": "Z300",
            "tituloZona": "Amazonia",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "humedad",
            "valor": "25",
            "cliente": null
        },
        {
            "nombreZona": "Z300",
            "tituloZona": "Amazonia",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "medHumedad",
            "valor": "19",
            "cliente": null
        },
        {
            "nombreZona": "Z300",
            "tituloZona": "Amazonia",
            "nombreArea": "A301",
            "tituloArea": "Jaguar",
            "fecha": "2021-11-25 15:30",
            "magnitud": "pulsaciones",
            "valor": "2",
            "cliente": null
        },
        {
            "nombreZona": "Z300",
            "tituloZona": "Amazonia",
            "nombreArea": "A302",
            "tituloArea": "Iguazú",
            "fecha": "2021-11-25 15:30",
            "magnitud": "pulsaciones",
            "valor": "14",
            "cliente": null
        },
        {
            "nombreZona": "Z300",
            "tituloZona": "Amazonia",
            "nombreArea": "A303",
            "tituloArea": "Topetazú",
            "fecha": "2021-11-25 15:30",
            "magnitud": "pulsaciones",
            "valor": "81",
            "cliente": null
        },
        {
            "nombreZona": "Z300",
            "tituloZona": "Amazonia",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "densidad",
            "valor": "28",
            "cliente": null
        }

    ]
} ';