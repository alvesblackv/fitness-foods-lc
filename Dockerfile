FROM php:8.1.12-fpm-alpine3.16
RUN apk add --no-cache openssl bash nodejs npm supervisor
RUN docker-php-ext-install bcmath mysqli pdo pdo_mysql
RUN docker-php-ext-enable pdo_mysql
RUN mkdir -p "/etc/supervisor/logs"
COPY .docker/supervisor/supervisord.conf /etc/supervisor/supervisord.cof
WORKDIR /var/www
RUN chown -R www-data:www-data .
RUN rm -rf /var/www/html
RUN ln -s public html
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
EXPOSE 9000
ENTRYPOINT ["php-fpm"]
