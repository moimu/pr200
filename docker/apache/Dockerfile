
FROM httpd:2.4.51-alpine

# copiar fichero de conf a dir conf/ en container ruta mi maquina _ ruta mi contenedor
# Escribir en fichero httpd.conf inclusión del fichero copiado

COPY ./local.apache.conf /usr/local/apache2/conf/  
RUN echo "Include /usr/local/apache2/conf/local.apache.conf" \
    >> /usr/local/apache2/conf/httpd.conf

# COPY ./pr200.newflow.tech.apache.conf /usr/local/apache2/conf/  
# RUN echo "Include /usr/local/apache2/conf/pr200.newflow.tech.apache.conf" \
#     >> /usr/local/apache2/conf/httpd.conf

# RUN apk update \
# apk --no-cache upgrade

# RUN apk add --no-cache certbot certbot-apache bash

# COPY ./verificar-letsencrypt.sh /usr/local/bin/verificar-letsencrypt.sh
# RUN chmod +x /usr/local/bin/verificar-letsencrypt.sh

# CMD /bin/bash /usr/local/bin/verificar-letsencrypt.sh
