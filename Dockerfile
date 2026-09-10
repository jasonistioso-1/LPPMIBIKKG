# Stage 1: Build Node frontend assets
FROM node:22-alpine AS node_builder
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci
COPY . .
RUN npm run build

# Stage 2: Install Composer PHP dependencies
FROM composer:2 AS composer_builder
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --ignore-platform-reqs --no-scripts

# Stage 3: Production PHP + Nginx image
FROM php:8.3-fpm-alpine

# Install system packages & dependencies
RUN apk add --no-cache \
    nginx \
    supervisor \
    curl \
    mariadb-client \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    icu-dev \
    oniguruma-dev \
    sqlite-dev \
    bash \
 && mkdir -p /var/log/supervisor /run/nginx

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install -j$(nproc) \
    pdo \
    pdo_mysql \
    pdo_sqlite \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip \
    intl \
    opcache

WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html

# Copy compiled frontend assets from node_builder
COPY --from=node_builder /app/public/build /var/www/html/public/build

# Copy vendor dependencies from composer_builder
COPY --from=composer_builder /app/vendor /var/www/html/vendor

# Copy Docker configs
COPY docker/nginx.conf /etc/nginx/http.d/default.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh

RUN chmod +x /usr/local/bin/entrypoint.sh \
 && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
