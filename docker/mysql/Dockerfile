# ARG MYSQL_VERSION
# ${MYSQL_VERSION:+${MYSQL_VERSION}}
FROM mysql:8.0.27

    
# Creo un volumen para situar alli ficheros y no hacer una copia

# Copiar fichero db.sql a dir docker-entrypoint.. para su ejecución
COPY ./00-bd/boards-inserts.sql /docker-entrypoint-initdb.d