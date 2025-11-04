FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libicu-dev \
    libpq-dev \
    libzip-dev \
    unzip \
    git \
    curl \
    && docker-php-ext-install intl pdo pdo_mysql zip

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer