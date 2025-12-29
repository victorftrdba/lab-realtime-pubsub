FROM php:8.2-apache

# Install Redis extension
RUN apt-get update && apt-get install -y libpq-dev \
    && pecl install redis \
    && docker-php-ext-enable redis

# Set working directory
WORKDIR /var/www/html

# Explicitly copy the index.php from the local php folder to the container
# If your Dockerfile is INSIDE the /php folder, use:
COPY index.php /var/www/html/index.php

# Fix permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80