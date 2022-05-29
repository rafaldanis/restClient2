FROM php:7.4-fpm

RUN curl -sS https://getcomposer.org/installer | php \
        && mv composer.phar /usr/local/bin/ \
        && ln -s /usr/local/bin/composer.phar /usr/local/bin/comp

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /

ENV PATH="~/.composer/vendor/bin:./vendor/bin:${PATH}"

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git

RUN apt-get install -y libxml2-dev
RUN docker-php-ext-install soap

EXPOSE 6001