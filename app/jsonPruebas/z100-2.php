<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
echo '{
    "mediciones":[
        {
            "nombreZona": "Z100",
            "tituloZona": "Sevilla, puerto de Indias",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "temperatura",
            "valor": "21",
            "cliente": null
        },
        {
            "nombreZona": "Z100",
            "tituloZona": "Sevilla, puerto de Indias",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "humedad",
            "valor": "50",
            "cliente": null
        },
        {
            "nombreZona": "Z100",
            "tituloZona": "Sevilla, puerto de Indias",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "medTemperatura",
            "valor": "24",
            "cliente": null
        },
        {
            "nombreZona": "Z100",
            "tituloZona": "Sevilla, puerto de Indias",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "medHumedad",
            "valor": "28",
            "cliente": null
        },
        {
            "nombreZona": "Z100",
            "tituloZona": "Sevilla, puerto de Indias",
            "nombreArea": "B101",
            "tituloArea": "La venta del Puerto",
            "fecha": "2021-11-25 15:30",
            "magnitud": "entradas",
            "valor": "6",
            "cliente": null
        },
        {
            "nombreZona": "Z100",
            "tituloZona": "Sevilla, puerto de Indias",
            "nombreArea": null,
            "tituloArea": null,
            "fecha": "2021-11-25 15:30",
            "magnitud": "fidelidad",
            "valor": "2",
            "cliente": "45FFTY45"
        }
    ]
}';