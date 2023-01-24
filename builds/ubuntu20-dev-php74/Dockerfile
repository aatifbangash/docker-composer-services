FROM ubuntu:20.04
MAINTAINER Islam
RUN apt-get update
RUN apt-get upgrade -y
ENV TZ=US/Alaska
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timez
RUN apt-get install -y apache2 \
    libapache2-mod-php7.4  \
    php7.4 \
    php7.4-common \
    php7.4-cli \
    php7.4-fpm \
    php7.4-memcache \
    php7.4-json \
    php7.4-pdo \
    php7.4-mysql \
    php7.4-zip \
    php7.4-gd \
    php7.4-mbstring \
    php7.4-curl \
    php7.4-xml \
    php7.4-bcmath \  
    php7.4-mongodb 

RUN echo "extension=mongodb.so" >> /etc/php/7.4/apache2/php.ini
RUN echo "extension=mongodb.so" >> /etc/php/7.4/cli/php.ini
COPY vhost.conf /etc/apache2/sites-enabled/
COPY php-overrides.ini /etc/php/7.4/apache2/conf.d/
COPY php-overrides.ini /etc/php/7.4/cli/conf.d/

RUN a2enmod proxy_fcgi setenvif
RUN a2enconf php7.4-fpm
RUN a2enmod rewrite
RUN a2enmod headers
RUN a2enmod ssl


CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
EXPOSE 80
