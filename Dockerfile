FROM php:7.4-apache

WORKDIR /var/www/html

COPY . /var/www/html

RUN apt-get update && \
    apt-get install -y git zip unzip && \
    docker-php-ext-install pdo_mysql && \
    a2enmod rewrite && \
    service apache2 restart

EXPOSE 80
CMD ["apache2-foreground"]
