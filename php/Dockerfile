ARG PHP_VERSION=${PHP_VERSION}
FROM php:${PHP_VERSION}


# Install modules
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
    && docker-php-ext-install iconv mcrypt redis

EXPOSE 9000

CMD ["php-fpm"]
