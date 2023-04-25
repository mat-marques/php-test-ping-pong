FROM php:8.1-apache

RUN apt-get update && apt-get install -y --fix-missing \
    apt-utils \
    unzip \
    git

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev

RUN docker-php-ext-install zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

CMD ["composer", "install"]