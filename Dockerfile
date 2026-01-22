FROM php:8.2-apache

# Installer dépendances système
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

# Activer Apache rewrite
RUN a2enmod rewrite

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Dossier de travail
WORKDIR /var/www/html

# Copier le projet
COPY . .

# Permissions Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Installer dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Cache Laravel
RUN php artisan key:generate --force || true
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear

# Port
EXPOSE 80

# Lancer Apache
CMD ["apache2-foreground"]
