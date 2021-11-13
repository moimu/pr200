FROM httpd:2.4.51-alpine

    # copiar fichero de configuración a dir conf/ en container
    #  ruta mi makina        ruta mi contenedor
COPY ./demo.apache.conf /usr/local/apache2/conf/

    # Escribir en fichero httpd.conf inclusión del fichero copiado
RUN echo "Include /usr/local/apache2/conf/demo.apache.conf" \
    >> /usr/local/apache2/conf/httpd.conf