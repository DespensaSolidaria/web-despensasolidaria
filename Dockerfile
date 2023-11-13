FROM php:7.4-apache

RUN useradd -G www-data,root -u 1000 -d /home/despensasolidaria despensasolidaria

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
COPY start-apache /usr/local/bin
RUN a2enmod rewrite

COPY . /var/www/html/web-despensasolidaria
RUN chown -R www-data:www-data /var/www/html/web-despensasolidaria
RUN chmod -R 774 /var/www/html/web-despensasolidaria
RUN apt-get update && apt-get install -y zlib1g-dev libzip-dev unzip
RUN docker-php-ext-install mysqli pdo pdo_mysql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN mkdir -p /home/despensasolidaria/.composer && chown -R despensasolidaria:despensasolidaria /home/despensasolidaria

USER despensasolidaria

RUN cd /var/www/html/web-despensasolidaria && composer update

CMD ["start-apache"]

EXPOSE 80