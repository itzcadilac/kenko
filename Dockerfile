FROM --platform=linux/amd64 php:7.0.20-apache
RUN docker-php-ext-install mysqli && \
    docker-php-ext-install mbstring
    # docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/  &&  \
    # docker-php-ext-install gd
RUN a2enmod rewrite
RUN service apache2 restart

