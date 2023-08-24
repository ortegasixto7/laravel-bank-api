FROM composer:2.5.8 as build-stage
COPY . /app
RUN composer install --prefer-dist --optimize-autoloader --no-interaction --no-plugins --no-scripts

FROM php:8.2-apache

ENV APP_ENV=production
ENV APP_DEBUG=false

RUN docker-php-ext-configure opcache --enable-opcache && \
    docker-php-ext-install pdo pdo_mysql
COPY --from=build-stage /app /var/www/html
COPY docker/opcache.ini /usr/local/etc/php/conf.d/opcache.ini
COPY docker/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN php artisan config:cache && \
    php artisan route:cache && \
    chmod 777 -R /var/www/html/storage/ && \
    chown -R www-data:www-data /var/www/ && \
    a2enmod rewrite


