#!/bin/bash
set -e

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

# Start Apache server
exec apache2-foreground