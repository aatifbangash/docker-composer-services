FROM debian:buster
MAINTAINER Islam
RUN apt-get clean all
RUN apt-get update
RUN apt-get dist-upgrade -y
# and optionally
RUN apt-get autoremove 

RUN apt-get install -y apache2 \
    php \
    php-common \
    php-cli \
    php-fpm \
    php-json \
    php-pdo \
    php-mysql \
    php-zip \
    php-gd \
    php-mbstring \
    php-curl \
    php-xml \
    php-pear \
    php-bcmath \
    libapache2-mod-php \
    php-dev \
    && pecl install mongodb 
RUN echo "extension=mongodb.so" >> /etc/php/7.3/apache2/php.ini
COPY vhost.conf /etc/apache2/sites-enabled/
COPY php-overrides.ini /etc/php/7.3/apache2/conf.d/

RUN apt-get install vim -y
RUN a2enmod rewrite
RUN a2enmod headers
RUN a2enmod ssl
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
EXPOSE 80