#!/bin/bash

# Esperar hasta que MySQL esté disponible
echo "Comprobando la disponibilidad de MySQL en $DB_HOST..."
until mysqladmin ping -h"$DB_HOST" -u"$DB_USERNAME" -p"$DB_PASSWORD" &>/dev/null; do
    echo "MySQL no está disponible todavía. Esperando..."
    sleep 1
done
echo "MySQL está listo en $DB_HOST. Continuando..."

# Ejecutar migraciones de Laravel una vez que MySQL esté disponible
echo "Ejecutando migraciones de Laravel..."
php artisan migrate --force

# Iniciar el servidor web de Laravel
echo "Iniciando el servidor web de Laravel..."
exec "$@"
