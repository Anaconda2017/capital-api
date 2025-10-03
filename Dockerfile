# Use PHP 8.0 with Apache as base image for better stability
FROM php:8.0-apache

# Set working directory
WORKDIR /var/www/html

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libwebp-dev \
    vim \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions with optimized flags
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . /var/www/html

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Create storage directories and set permissions
RUN mkdir -p storage/app/public \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache

# Set permissions for storage and bootstrap
RUN chmod -R 775 storage bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Copy .env.example to .env if .env doesn't exist
RUN if [ ! -f .env ]; then cp env.example .env; fi

# Generate application key if not set
RUN php artisan key:generate --force || true

# Clear and cache config
RUN php artisan config:clear || true
RUN php artisan config:cache || true

# Clear and cache routes
RUN php artisan route:clear || true
RUN php artisan route:cache || true

# Clear and cache views
RUN php artisan view:clear || true
RUN php artisan view:cache || true

# Configure Apache
RUN echo '<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
    ErrorLog ${APACHE_LOG_DIR}/error.log\n\
    CustomLog ${APACHE_LOG_DIR}/access.log combined\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]