FROM composer:2

RUN delgroup dialout

RUN addgroup -g 1000 --system laravel
RUN adduser -G laravel --system -D -s /bin/sh -u 1000 laravel

WORKDIR /var/www/html
