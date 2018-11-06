FROM phpdockerio/php72-fpm:latest
WORKDIR "/application"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install php7.2-pgsql php-xdebug \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*


RUN usermod -u 1000 www-data

RUN mkdir /var/www
RUN mkdir /var/www/.composer
RUN mkdir /var/www/.composer/cache
RUN chown -R www-data:www-data /var/www/.composer

WORKDIR "/application" 