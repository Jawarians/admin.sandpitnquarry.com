#!/bin/bash
set -e

# Print debug info
echo "Starting container with PORT=${PORT}"
echo "Apache config before changes:"
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

# Ensure PORT is set to 8080 for Cloud Run compatibility
if [ -z "${PORT}" ]; then
    echo "PORT env variable not set, defaulting to 8080"
    export PORT=8080
fi

# Update REVERB port settings to avoid conflicts with main port
if [ "${PORT}" = "${REVERB_PORT}" ]; then
    echo "Detected REVERB_PORT (${REVERB_PORT}) conflicts with main PORT (${PORT})"
    echo "Setting REVERB_PORT to an alternate value (8000)"
    export REVERB_PORT=8000
    # Update in the .env file if it exists
    if [ -f .env ]; then
        sed -i "s/REVERB_PORT=8080/REVERB_PORT=8000/g" .env
    fi
fi

# Force port to be 8080 for Cloud Run
echo "Forcing Apache to use port 8080 for Cloud Run compatibility..."

# Clear out any existing Listen directives
sed -i '/^Listen/d' /etc/apache2/ports.conf

# Add new Listen directive with port 8080
echo "Listen 8080" >> /etc/apache2/ports.conf

# Make sure VirtualHost is configured for port 8080
sed -i 's/<VirtualHost \*:[0-9]*>/<VirtualHost *:8080>/g' /etc/apache2/sites-available/000-default.conf

echo "Final Apache configuration:"
cat /etc/apache2/ports.conf
cat /etc/apache2/sites-available/000-default.conf

# Additional debugging for Cloud Run
echo "Environment variables that might affect port binding:"
echo "PORT=${PORT}"
echo "REVERB_PORT=${REVERB_PORT}"

# Check for processes already using port 8080
echo "Checking for processes using port 8080:"
apt-get update && apt-get install -y net-tools procps lsof
netstat -tulpn | grep 8080 || echo "No processes found on port 8080"
lsof -i :8080 || echo "No files open on port 8080"

# Verify Apache config
echo "Verifying Apache configuration:"
apache2ctl -t

echo "Starting Apache server on port 8080..."
# Start Apache in foreground
exec apache2-foreground