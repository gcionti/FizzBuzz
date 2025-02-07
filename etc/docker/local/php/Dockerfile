FROM php:8.3-fpm-alpine as base

RUN apk add --update --no-cache autoconf \
    build-base \
    linux-headers \
    libzip-dev \
    icu-dev \
    zlib-dev \
    acl \
    fcgi \
    git \
    bash \
    rabbitmq-c-dev;

RUN pecl install amqp
RUN docker-php-ext-enable amqp

RUN docker-php-ext-install opcache
COPY etc/docker/local/php/opcache.ini /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini

RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl pdo_mysql zip

WORKDIR /var/www/symfony

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

FROM base as development

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

RUN curl -sS https://get.symfony.com/cli/installer -O && chmod +x ./installer && ./installer --install-dir=/usr/local/bin
COPY etc/docker/local/php/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

EXPOSE 9000

CMD ["php-fpm"]

FROM base AS production

COPY . .

EXPOSE 9000

CMD ["php-fpm"]
