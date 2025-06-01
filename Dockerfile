FROM php:8.2.3-apache

# environment
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
ENV APACHE_LOG_DIR /etc/apache2/logs

# install libs and mods
RUN apt-get update && apt-get install -y
#RUN apt-get install -y libmar iadb-dev
RUN apt-get install -y libpng-dev libzip-dev
RUN docker-php-ext-install mysqli pdo_mysql gd zip

# apache config
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/conf-available/*.conf
RUN mv "/etc/apache2/mods-available/rewrite.load" "/etc/apache2/mods-enabled/"
RUN mv "/etc/apache2/conf-available/docker-php.conf" "/etc/apache2/conf-enabled/"
RUN mv "/etc/apache2/sites-available/000-default.conf" "/etc/apache2/sites-enabled/"
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# php config
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
RUN echo 'max_execution_time = 6000' >> $PHP_INI_DIR/conf.d/php.user.ini
RUN echo 'max_input_time = 600' >> $PHP_INI_DIR/conf.d/php.user.ini
RUN echo 'memory_limit = 256M' >> $PHP_INI_DIR/conf.d/php.user.ini
RUN echo 'post_max_size = 512M' >> $PHP_INI_DIR/conf.d/php.user.ini
RUN echo 'upload_max_filesize = 512M' >> $PHP_INI_DIR/conf.d/php.user.ini
