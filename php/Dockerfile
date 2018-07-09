ARG PHP_VERSION=${PHP_VERSION}
ARG PHP_PORT=${PHP_PORT}
ARG DOCKER_HOST_IP=${DOCKER_HOST_IP}
ARG PHP_XDEBUG_PORT=${PHP_XDEBUG_PORT}

FROM php:${PHP_VERSION}

LABEL maintainer="Jun <zhoujun3372@gmail.com>"

RUN apk --update add wget \
    vim \
    curl \
    git \
    build-base \
    libmemcached-dev \
    libmcrypt-dev \
    libxml2-dev \
    zlib-dev \
    autoconf \
    cyrus-sasl-dev \
    libgsasl-dev \
    supervisor \
    libpng \
    libpng-dev


RUN apk add --no-cache tzdata \  
    && cp /usr/share/zoneinfo/Asia/Shanghai /etc/localtime


RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer self-update --clean-backups

RUN docker-php-ext-install mysqli mbstring pdo pdo_mysql tokenizer xml zip gd
RUN pecl channel-update pecl.php.net

RUN pecl install memcached
RUN pecl install swoole
RUN pecl install redis
RUN pecl install xdebug
RUN docker-php-ext-enable redis swoole memcached xdebug

RUN apk del tzdata libpng-dev

RUN rm /var/cache/apk/*

RUN echo "xdebug.enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_connect_back=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
 #这个是约定的调试码，需要在phpstorm里面设定 
RUN echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
#这个是宿主ip 
# RUN echo "xdebug.remote_host=${DOCKER_HOST_IP}" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
#这个是xdebug对编辑器链接的端口 
RUN echo "xdebug.remote_port=9001" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_log=/var/log/xdebug_remote.log" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

EXPOSE 9000
EXPOSE 9001

CMD ["php-fpm"]
