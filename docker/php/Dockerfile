FROM php:7.1-fpm
# update
RUN apt-get update
# install required packages
RUN apt-get install git zip libmemcached-dev zlib1g-dev libicu52 libicu-dev libpng-dev libfreetype6-dev libjpeg62-turbo-dev -y
# configure gd
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
# install php extensions
RUN docker-php-ext-install intl gd pdo pdo_mysql opcache
# install xdebug
RUN pecl install xdebug memcached && docker-php-ext-enable xdebug memcached
# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer
# change workdir
WORKDIR /var/www
# create user
ARG UID
RUN adduser --disabled-password --gecos "" --home /home/dev --uid ${UID} dev > /dev/null
USER dev