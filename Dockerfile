FROM php:7.0-apache
RUN apt-get update && apt-get install -y
COPY . /var/www/html/
