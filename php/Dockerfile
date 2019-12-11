# ARG PHP_VERSION=${PHP_COMPILE_VERSION}

FROM php:fpm-alpine

LABEL maintainer="Jun <zhoujun3372@gmail.com>"

# 设置中国源
# RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/g' /etc/apk/repositories 
    

# 设置http为https
# RUN sed -i 's/http/https/g' /etc/apk/repositories

# RUN apk add --no-cache --virtual .build-deps \
#     autoconf \
#     file \
#     gcc \
#     g++ \
#     libc-dev \
#     make \
#     pkgconf \
#     re2c

RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/g' /etc/apk/repositories \
    && apk add --no-cache --virtual .build-deps tzdata \
    gcc make file g++ openssl-dev  nghttp2-dev hiredis-dev \
    php7 php7-fpm php7-xml php7-json php7-pear php7-openssl \
    php7-dev php7-sockets php7-curl php7-iconv php7-zip php7-gd php7-igbinary \
    && pear config-set php_ini /etc/php7/php.ini \
    && pecl channel-update pecl.php.net \
    && yes | pecl install swoole \
    && yes | pecl install redis


# Gd
# RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && docker-php-ext-install -j$(nproc) gd

# RUN yes | pecl install swoole redis && docker-php-ext-enable swoole redis
# Redis
# RUN pecl install redis && docker-php-ext-enable redis

# Memcached
# RUN pecl install memcached && docker-php-ext-enable memcached

# Swoole
# RUN pecl install swoole && docker-php-ext-enable swoole

# 中国时区
# RUN cp /usr/share/zoneinfo/Asia/Shanghai /etc/localtime  && echo "Asia/Shanghai" >  /etc/timezone

# Composer
RUN curl -sS https://install.phpcomposer.com/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/ \
    && composer self-update --clean-backups

# 清理
RUN apk del .build-deps
RUN rm -rf /var/cache/apk/*
RUN rm -rf /var/lib/apt/lists/* 

# 暴露端口
EXPOSE 9000

# 执行脚本
ENTRYPOINT ["php-fpm"]
