FROM php:8.2-apache

# Install system dependencies
RUN apt-get update \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
    git \
    unzip \
    libzip-dev \
    libpq-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libicu-dev \
    pkg-config \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    bcmath \
    gd \
    intl \
    pdo_mysql \
    pgsql \
    pdo_pgsql \
    zip

# Enable Apache modules
RUN a2enmod rewrite headers

# Install Node.js and npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Create a custom virtual host configuration for Cloud Run
RUN { \
      echo '<VirtualHost *:${PORT}>' ;\
      echo '  DocumentRoot /var/www/html/public' ;\
      echo '  <Directory /var/www/html/public>' ;\
      echo '    AllowOverride All' ;\
      echo '    Require all granted' ;\
      echo '  </Directory>' ;\
      echo '  ErrorLog ${APACHE_LOG_DIR}/error.log' ;\
      echo '  CustomLog ${APACHE_LOG_DIR}/access.log combined' ;\
      echo '</VirtualHost>' ;\
    } > /etc/apache2/sites-available/000-default.conf

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Install dependencies
RUN composer install --optimize-autoloader --no-interaction --no-plugins --no-scripts --prefer-dist
RUN npm install && npm run build

# Copy entrypoint script and set permissions
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Configure for Cloud Run
ENV PORT=8000

# Set the entrypoint script
ENTRYPOINT ["docker-entrypoint.sh"]
