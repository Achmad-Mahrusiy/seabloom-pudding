FROM php:8.3-apache

# Install ekstensi PHP yang dibutuhkan Laravel.
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
    git \
    unzip \
    libzip-dev \
    libsqlite3-dev \
    libonig-dev \
    libicu-dev \
    && docker-php-ext-install -j"$(nproc)" \
    mbstring \
    intl \
    zip \
    bcmath \
    pdo_sqlite \
    pdo_mysql \
    && a2enmod rewrite headers \
    && sed -i 's/^Listen 80$/Listen 10000/' /etc/apache2/ports.conf \
    && sed -i 's/<VirtualHost \*:80>/<VirtualHost *:10000>/' \
    /etc/apache2/sites-available/000-default.conf \
    && sed -i 's#DocumentRoot /var/www/html#DocumentRoot /var/www/html/public#' \
    /etc/apache2/sites-available/000-default.conf \
    && printf '\n<Directory /var/www/html/public>\n    AllowOverride All\n    Require all granted\n</Directory>\n' \
    >> /etc/apache2/apache2.conf \
    && rm -rf /var/lib/apt/lists/*

# Mengambil Composer dari image resmi Composer.
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr
ENV CACHE_STORE=file
ENV SESSION_DRIVER=file
ENV QUEUE_CONNECTION=sync

WORKDIR /var/www/html

# Menyalin source code project.
COPY . .

# Install dependensi dan siapkan direktori Laravel.
RUN mkdir -p \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    && composer install \
    --no-dev \
    --prefer-dist \
    --no-interaction \
    --optimize-autoloader \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R ug+rwx storage bootstrap/cache

# Render menggunakan port 10000 secara default.
EXPOSE 10000

CMD ["apache2-foreground"]
