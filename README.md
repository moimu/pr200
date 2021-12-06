# docker lamp certbot
Entorno de desarrollo containers docker para aplicaciones web usando:
`Apache`,`Let's Encrypt`,`PHP`,`composer`,`MySQL` todas imagenes montadas sobre distribución: `alpine`. 

## Introducción

- Requesitos:

- Instancia de servidor usaré imagen de Ubuntu 20.04
- Dominio asociado ip de la instacia
- intalación en servidor: `docker` y  `docker-compose`
- Habilitar reglas entrada HTTP y HTTPS para IPv4 y para IPv6
- No tener levantado MySQL di lo trae por defecto la distro del servidor, en ese caso paramos o desistalamos.
    $ sudo systemctl stop mysql
- Ejecutar el fichero docker-compose.yml en docker/ mediante:

$ docker-compose build
$ docker-compose up 

en el servidor entrar container de php y cargar el fichero composer.json
$ docker exec -ti php-pr200 sh
$ composer dump-autoload

Docker generará:
    - container con `Apache` y `certbot` 
        -alpine
    - container con `MySQL`
    - container con `PHP`
        -alpine

# Configuración local

>  Comentar la redirección puerto 443
- #"443:443"

> apache/Dockerfile cambiar la conf por local.apache.conf
COPY ./local.apache.conf /usr/local/apache2/conf/

    # Escribir en fichero httpd.conf inclusión del fichero copiado
RUN echo "Include /usr/local/apache2/conf/local.apache.conf" \
    >> /usr/local/apache2/conf/httpd.conf

# Configuración server

>  Descomentar la redirección puerto 443
- "443:443"

> apache/Dockerfile cambiar la conf por fichero conf servidor y comentar codigo para letsencrypt
COPY ./pr200.newflow.tech.apache.conf /usr/local/apache2/conf/

RUN echo "Include /usr/local/apache2/conf/pr200.newflow.tech.apache.conf" \
    >> /usr/local/apache2/conf/httpd.conf

#RUN apk add --no-cache certbot certbot-apache bash
#COPY ./verificar-letsencrypt.sh /usr/local/bin/verificar-letsencrypt.sh
#RUN chmod +x /usr/local/bin/verificar-letsencrypt.sh

#CMD /bin/bash /usr/local/bin/verificar-letsencrypt.sh

## Errores en desarrollo

- Uncaught Error: Class "Moi\Zonas\Api" not found

Ejecutar composer dump-autolad dentro del contenedor php, donde está instalado composer 

- net::ERR_ABORTED 404 (Not Found)

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