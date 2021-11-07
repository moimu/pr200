#  fpm es un servicio que escucha en port 9000, que recibe php para ser interpretado
# lo configuramos en conf apache, todo lo que tenga php lo pasas a el container con php
FROM php:8.1.0RC5-fpm-alpine

#  -Al usar alpine no tenemos apt-get de Debian
# RUN apt-get update \
#     && apt-get upgrade -y

RUN apk add --no-cache nginx

# módulo o extensión mysqli que proporciona funcionalidad concreta al motor de PHP
RUN docker-php-ext-install mysqli

# Instruciones para instalación composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"  \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" 

RUN mv composer.phar /usr/local/bin/composer

# RUN cd /var/www/html
# RUN composer update
