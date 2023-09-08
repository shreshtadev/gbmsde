# Use an official PHP runtime as a parent image
FROM php:8.2-fpm

# Set the working directory in the container
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip

# Install PHP extensions required for Laravel
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy your Laravel application files to the container
COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Expose port 9000 (default PHP-FPM port)
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
