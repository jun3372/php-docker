ARG PHP_VERSION=${PHP_VERSION}

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
RUN docker-php-ext-enable redis swoole memcached

RUN apk del tzdata libpng-dev

RUN rm /var/cache/apk/*

EXPOSE 9000

CMD ["php-fpm"]
