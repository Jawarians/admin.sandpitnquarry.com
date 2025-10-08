# Use official PHP image with necessary extensions
FROM php:8.2-bookworm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip libpng-dev libonig-dev libxml2-dev zip curl && \
    docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Laravel setup
RUN php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear && \
    chmod -R 775 storage bootstrap/cache

# Expose the port Cloud Run expects
EXPOSE 8080

# Start the Laravel server
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]
