# ARG MYSQL_VERSION
# ${MYSQL_VERSION:+${MYSQL_VERSION}}
FROM mysql:8.0.27

    
# Creo un volumen para situar alli ficheros y no hacer una copia

# Copiar fichero db.sql a dir docker-entrypoint.. para su ejecución
COPY ./00-bd/boards-inserts.sql /docker-entrypoint-initdb.d


RUN docker exec -ti mysql-pr200 sh
RUN mysql -u root -p
RUN rpass
RUN CREATE USER `moidb` IDENTIFIED BY 'moidbpass';
RUN GRANT ALL ON zonas.* TO 'moidb'@'%';
RUN FLUSH PRIVILEGES;

RUN CREATE USER `jca` IDENTIFIED BY 'jca';
RUN GRANT ALL ON zonas.* TO 'jca'@'%';
RUN FLUSH PRIVILEGES;

RUN exit