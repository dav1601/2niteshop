FROM php:8.1-fpm

LABEL maintainer="Davi Developer vaone6v2@gmail.com"

# Arguments defined in docker-compose.yml
#  Cài đặt args trong docker-compose.yml
ARG user
ARG uid
# Install system dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
    vim \
    default-mysql-client \
    git \
    curl \
    g++ \
    gcc \
    libc-dev \
    libzip-dev \
    yarn \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions pdo_mysql mbstring exif pcntl bcmath gd zip xml ctype tokenizer openssl fileinfo PDO zlib session json Core curl dom date Phar redis bz2 calendar mcrypt oauth mysqli filter SimpleXML  standard xmlreader xmlwriter readline mysqlnd pcre posix  xdebug timezonedb soap pcntl

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user
RUN chmod -R 777  /var/www
# Set working directory
RUN echo 'memory_limit = -1' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini;
WORKDIR /var/www
USER $user
