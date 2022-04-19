
FROM php:7.4-fpm

RUN apt-get update -q \
    && apt-get install -qy \
        git \
        wget \
        unzip \
        libzip-dev \
        libpq-dev \
        libxml2-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN pecl install \
    xdebug-2.9.8

RUN docker-php-ext-enable \
    xdebug

RUN docker-php-ext-install -j$(nproc) \
    zip \
    pgsql \
    pdo_pgsql \
    xml \
    soap

RUN curl -L https://getcomposer.org/composer-stable.phar \
        -o /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer

ADD conf/php.ini /usr/local/etc/php/conf.d/php.ini

WORKDIR /app
USER 1000:1000

