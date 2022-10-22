FROM php:8.0-apache
ENV TZ="Asia/Bangkok"
RUN apt-get update && \
    apt-get install -y 
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod rewrite headers