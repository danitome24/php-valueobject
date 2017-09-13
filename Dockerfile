FROM php:7.1-apache

RUN a2enmod rewrite

# install the PHP extensions we need
RUN apt-get update && apt-get install -y vim git libpng12-dev libjpeg-dev libpq-dev \
  && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
  && rm -rf /var/lib/apt/lists/* \
  && docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr \
  && docker-php-ext-install bcmath gd mbstring zip
# Enable and configure xdebug
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

WORKDIR /var/www/html
