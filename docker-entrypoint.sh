#!/bin/bash
set -e

# Print debug info
echo "Starting container with PORT=${PORT}"
echo "Apache config:"
cat /etc/apache2/ports.conf
cat /etc/apache2/sites-available/000-default.conf

# Create .env file if it doesn't exist
if [ ! -f .env ]; then
    echo "Creating .env file from example..."
    cp .env.example .env
    php artisan key:generate --force
fi

# Run database migrations if enabled via environment variable
if [ "${RUN_MIGRATIONS:-false}" = "true" ]; then
    echo "Running database migrations..."
    php artisan migrate --force
fi

# Laravel cache for performance
echo "Caching Laravel configuration..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Dynamically configure Apache to use the PORT env var
echo "Configuring Apache to use PORT=${PORT}..."

# Clear out any existing Listen directives
sed -i '/^Listen/d' /etc/apache2/ports.conf

# Add new Listen directive with the correct port
echo "Listen ${PORT}" >> /etc/apache2/ports.conf

# Replace environment variable in VirtualHost config
sed -i "s/\${PORT}/${PORT}/g" /etc/apache2/sites-available/000-default.conf

echo "Final Apache configuration:"
cat /etc/apache2/ports.conf
cat /etc/apache2/sites-available/000-default.conf

# Start Apache in foreground
echo "Starting Apache server..."
exec apache2-foreground