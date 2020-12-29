FROM php:7.4.7-fpm-alpine

# composer
COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

# package install
RUN set -eux && \
    apk update && \
    apk add --update --no-cache \
    autoconf \
    gcc \
    g++ \
    git \
    icu-dev \
    libzip-dev \
    make \
    oniguruma-dev \
    unzip  && \
    docker-php-ext-install intl pdo_mysql zip bcmath

# php.ini
COPY ./php.ini /usr/local/etc/php/php.ini

# 起動
COPY ./start.sh /start.sh
RUN chmod a+x /start.sh
WORKDIR /var/www
CMD ["/start.sh"]
