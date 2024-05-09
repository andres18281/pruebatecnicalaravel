# Utiliza una imagen base con Node.js
FROM node:16-alpine

# Establece el directorio de trabajo dentro del contenedor
WORKDIR /app

# Copia los archivos del proyecto al contenedor
COPY . .

# Instala las dependencias del proyecto
RUN npm install

# Expone el puerto 8080 para acceder a la aplicación desde el navegador
EXPOSE 8080

# Define el comando por defecto para ejecutar la aplicación (puede variar según el entorno de desarrollo)
CMD ["npm", "run", "serve"]