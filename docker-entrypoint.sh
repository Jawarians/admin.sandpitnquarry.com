#!/bin/bash
set -e

# Log environment for debugging
echo "Starting container with PORT=${PORT}"

# Create .env file if it doesn't exist
if [ ! -f .env ]; then
    cp .env.example .env
    php artisan key:generate --force
fi

# Run database migrations if enabled via environment variable
if [ "${RUN_MIGRATIONS:-false}" = "true" ]; then
    echo "Running database migrations..."
    php artisan migrate --force
fi

# Laravel cache for performance
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Ensure Apache is configured for the right port
sed -i "s/Listen 80/Listen ${PORT:-8080}/g" /etc/apache2/ports.conf
sed -i "s/:80/:${PORT:-8080}/g" /etc/apache2/sites-available/000-default.conf

# Start Apache server
exec apache2-foreground