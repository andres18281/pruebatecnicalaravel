# Utiliza una imagen base con PHP 8.1 y Composer
FROM php:8.1-fpm

# Actualiza el índice de paquetes e instala las dependencias necesarias
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libpq-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
	mariadb-client   # Agregamos mariadb-client para tener acceso al cliente MySQL

# Instala las extensiones de PHP necesarias
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    pdo \
    pdo_mysql \
    gd \
    zip \
    opcache

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establece el directorio de trabajo dentro del contenedor
WORKDIR /var/www/html

# Copia los archivos de la aplicación al contenedor
COPY . .

# Instala las dependencias de Composer
RUN composer install --no-dev --no-interaction --optimize-autoloader

ENV DB_HOST=mysql
ENV DB_USERNAME=root
ENV DB_PASSWORD=root

# Copia el script de entrada al directorio /usr/local/bin
COPY entrypoint.sh /usr/local/bin/entrypoint.sh

# Cambia los permisos del script de entrada para que sea ejecutable
RUN chmod +x /usr/local/bin/entrypoint.sh

RUN sed -i 's/\r$//' /usr/local/bin/entrypoint.sh


# Expone el puerto 8000 para acceder a la aplicación Laravel desde fuera del contenedor
EXPOSE 8000

# Define el comando por defecto para ejecutar la aplicación
CMD ["bash", "-c", "/usr/local/bin/entrypoint.sh && php artisan serve --host=0.0.0.0 --port=8000"]
