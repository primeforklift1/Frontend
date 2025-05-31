FROM php:8.2-cli

# Install dependencies
RUN apt-get update && apt-get install -y \
    unzip zip git curl libzip-dev libicu-dev && \
    docker-php-ext-install zip intl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY /page-prime .

# Set permissions
RUN chmod -R 777 writable

# Install PHP dependencies
RUN composer install

# Expose port
EXPOSE 8080

# Run the PHP dev server
CMD ["php", "spark", "serve", "--host", "0.0.0.0"]
