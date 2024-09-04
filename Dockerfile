FROM php:7.2-apache
COPY ./LibrePlay /var/www/html/
WORKDIR /var/www/html/