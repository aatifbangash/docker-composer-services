FROM php:5-apache

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions memcache mysqli mongodb pdo_mysql

RUN a2enmod rewrite
RUN a2enmod headers
RUN a2enmod ssl
COPY index.html /var/www/html/
COPY conn.php /var/www/html/
#RUN echo "<Directory /var/www/html>\n Options Indexes FollowSymLinks MultiViews\n AllowOverride All\n Require all granted\n</Directory>\n" >> /etc/apache2/apache2.conf
# CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
# EXPOSE 80