FROM php:7.1.6-fpm-alpine

LABEL maintainer="Jun <zhoujun3372@gmail.com>"

RUN apk add --no-cache --virtual .build-deps \
    autoconf \
    file \
    gcc \
    g++ \
    libc-dev \
    make \
    pkgconf \
    re2c \ 
    tzdata \
    coreutils \
    libltdl \
    freetype-dev \
    gettext-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    curl-dev \
    libmcrypt-dev \
    libxml2-dev \
    cyrus-sasl-dev \
    libmemcached-dev 

RUN rm -rf /var/lib/apt/lists/* 

RUN docker-php-ext-install -j$(nproc) \
    iconv mcrypt gettext curl mysqli pdo pdo_mysql zip \
    mbstring bcmath opcache xml simplexml sockets hash soap

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/

RUN docker-php-ext-install -j$(nproc) gd

RUN pecl install redis 
RUN pecl install memcached 
#RUN && pecl install xdebug-2.5.0 

RUN docker-php-ext-enable redis memcached 

RUN cp /usr/share/zoneinfo/Asia/Shanghai /etc/localtime  && echo "Asia/Shanghai" >  /etc/timezone

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer self-update --clean-backups

RUN apk del .build-deps
RUN rm -rf /var/cache/apk/*
    
EXPOSE 9000


CMD ["php-fpm"]
