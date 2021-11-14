# docker lamp certbot
Entorno de desarrollo containers docker para aplicaciones web usando:
`Apache`,`Let's Encrypt`,`PHP`,`composer`,`MySQL` todas imagenes montadas sobre distribución: `alpine`. 

## Introducción

- Requesitos:

- Instancia de servidor usaré imagen de Ubuntu 20.04
- Dominio asociado ip de la instacia
- intalación en servidor: `docker` y  `docker-compose`
- Ejecutar el fichero docker-compose.yml en docker/ mediante:

$ docker-compose build
$ docker-compose up -d

Docker generará:
    - container con `Apache` y `certbot` 
        -alpine
    - container con `MySQL`
    - container con `PHP`
        -alpine

# Estructura de directorios/ficheros

En  directorio `app` estará contenida nuestra aplicación usando composer para generar el proyecto, a fin de realización de tests.
En directorio `docker` es donde está toda la configuración de docker.


Volúmenes para la almacenar la configuración de Let's Encrypt : 
 - `daw-etcletsencrypt`
 - `daw-varletsencrypt`

# .env

Fichero donde son declaradas cariables de entorno usadas en docker-compose.yml

DIR_PROYECTO=../app
LETS_ENCRYPT_EMAIL=usuario@gmail.com
LETS_ENCRYPT_DOMINIOS=pr200.newflow.tech,pr200clon.newflow.tech
LETS_ENCRYPT_DIRECTORIO=pr200.newflow.tech

`DIR_PROYECTO` directorio donde está nuestra aplicación web, será nuestro `DocumentRoot` dentro del `VirtualHost` que crearemos en el contenedor con apache.
`LETS_ENCRYPT_EMAIL` correo al que se mandarán las notificaciones importantes de Let's Encrypt
`LETS_ENCRYPT_DOMINIOS` listado de dominios (separados por comas) para los que se quiere obtener el certificado
`LETS_ENCRYPT_DIRECTORIO` subdirectorio donde almacenará los certificados:
/etc/letsencrypt/live/${LETS_ENCRYPT_DIRECTORIO}/*

## Imágenes de docker usadas

Nos hemos basado en las imágenes oficiales de cada uno de los servicios. Usamos además las distribuciones `alpine`.

* [apache](https://hub.docker.com/_/httpd)
* [php](https://hub.docker.com/_/php)
* [MySQL](https://hub.docker.com/_/mysql)