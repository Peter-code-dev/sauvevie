# ================================
# Base image PHP + Apache
# ================================
FROM php:8.2-apache

# ================================
# Install system dependencies
# ================================
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    && docker-php-ext-install \
    pdo \
    pdo_mysql \
    mbstring \
    zip \
    exif \
    pcntl \
    bcmath \
    opcache

# ================================
# FIX Apache MPM (Railway crash fix)
# ================================
RUN a2dismod mpm_event mpm_worker \
    && a2enmod mpm_prefork

# Enable Apache rewrite
RUN a2enmod rewrite

# ================================
# Set Apache document root to Laravel /public
# ================================
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# ================================
# Install Composer
# ================================
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# ================================
# Set working directory
# ================================
WORKDIR /var/www/html

# ================================
# Copy project files
# ================================
COPY . .

# ================================
# Permissions
# ================================
RUN chown -R www-data:www-data storage bootstrap/cache

# ================================
# Install PHP dependencies
# ================================
RUN composer install --no-dev --optimize-autoloader

# ================================
# Laravel optimizations (safe on Railway)
# ================================
RUN php artisan key:generate --force || true \
    && php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear

# ================================
# Expose port (Apache)
# ================================
EXPOSE 80

# ================================
# Start Apache
# ================================
CMD ["apache2-foreground"]
