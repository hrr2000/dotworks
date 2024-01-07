# Use the official PHP image as the base image
FROM php:7.4-apache

# Install required dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql zip gd mbstring exif pcntl bcmath opcache

# Enable Apache modules
RUN a2enmod rewrite

# Set up the working directory
WORKDIR /var/www/html

# Copy the application code to the container
COPY . .

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install application dependencies using Composer
RUN composer install --no-dev --no-scripts --no-progress --prefer-dist

# Set the ownership of the application files to the Apache user
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80

# Start the Apache web server
CMD ["apache2-foreground"]
