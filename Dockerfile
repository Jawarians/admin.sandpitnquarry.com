FROM dunglas/frankenphp:1.3.1

RUN apt-get update \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
    git \
    unzip \
    librabbitmq-dev \
    libpq-dev

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Get NodeJS
COPY --from=node:20-slim /usr/local/bin /usr/local/bin
# Get npm
COPY --from=node:20-slim /usr/local/lib/node_modules /usr/local/lib/node_modules

RUN install-php-extensions \
    bcmath \
    gd \
    intl \
    pcntl \
    pgsql \
    pdo_pgsql \
    zip

COPY . /app

WORKDIR /app

RUN composer install \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --no-dev \
    --prefer-dist

RUN npm install

RUN npm run build

# ENTRYPOINT ["php", "artisan", "octane:frankenphp" ]

CMD php artisan reverb:start & php artisan octane:frankenphp
