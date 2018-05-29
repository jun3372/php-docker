ARG PHP_VERSION=7.2-fpm-alpine
FROM php:${PHP_VERSION}

LABEL maintainer="Jun <zhoujun3372@gmail.com>"


# Install dependencies
RUN apk --update add wget \
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
  supervisor

RUN docker-php-ext-install mysqli mbstring pdo pdo_mysql tokenizer xml
RUN pecl channel-update pecl.php.net && pecl install memcached mcrypt-1.0.1 && docker-php-ext-enable memcached

RUN pecl install redis
RUN docker-php-ext-enable redis

RUN rm /var/cache/apk/*

EXPOSE 9000

CMD ["php-fpm"]
