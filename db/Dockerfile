# Utiliza una imagen base de MySQL
FROM mysql:latest

# Copia el archivo de inicialización SQL al contenedor
COPY init.sql /docker-entrypoint-initdb.d/

# Variables de entorno para configurar la contraseña de root y el nombre de la base de datos
ENV MYSQL_ROOT_PASSWORD=root
ENV MYSQL_DATABASE=backendprueba