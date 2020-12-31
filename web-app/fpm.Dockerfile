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

# copy mount file
COPY docker/fpm/php.ini /usr/local/etc/php/php.ini
COPY ./ /var/www

# 起動
COPY docker/fpm/start.sh /start.sh
RUN chmod a+x /start.sh
RUN chmod -R 757 /var/www/storage/
WORKDIR /var/www
CMD ["/start.sh"]
