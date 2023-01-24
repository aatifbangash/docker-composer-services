FROM bubuntux/s6-ubuntu
MAINTAINER Zahoor
RUN apt-get clean all

RUN  apt-get update \
  && apt-get install -y wget \
  && rm -rf /var/lib/apt/lists/*

RUN apt-get update && \
    apt-get install -y software-properties-common && \
    add-apt-repository ppa:ondrej/php && \
    apt-get update && \
    apt-get install -y 
    
RUN apt-get dist-upgrade -y

# and optionally
RUN apt-get autoremove 

RUN apt-get install -y apache2 \
    php5.6 \
    php5.6-common \
    php5.6-cgi \
    php5.6-cli \
    php5.6-fpm \
    php5.6-json \
    php5.6-pdo \
    php5.6-mysql \
    php5.6-zip \
    php5.6-gd \
    php5.6-mbstring \
    php5.6-curl \
    php5.6-xml \
    php5.6-xmlrpc \
    php5.6-mcrypt \
    php5.6-bcmath \
    libapache2-mod-php5.6 \
    php5.6-dev \
    openssl \
    curl \
    && pecl install mongo 
    
        
RUN wget https://fastdl.mongodb.org/tools/db/mongodb-database-tools-ubuntu2004-x86_64-100.5.2.deb && \
    apt install ./mongodb-database-tools-*.deb && \
    rm -f mongodb-database-tools-*.deb

RUN echo "extension=mongo.so" >> /etc/php/5.6/apache2/php.ini
RUN echo "extension=mongo.so" >> /etc/php/5.6/cli/php.ini

COPY vhost.conf /etc/apache2/sites-enabled/
COPY php-overrides.ini /etc/php/5.6/apache2/conf.d/
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


RUN apt-get install vim -y
RUN a2enmod rewrite
RUN a2enmod headers
RUN a2enmod ssl
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
EXPOSE 80
