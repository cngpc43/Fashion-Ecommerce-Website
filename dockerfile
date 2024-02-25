# Set master image
FROM php:fpm-alpine

# Set working directory
WORKDIR /var/www/html
# Install pdo_mysql
RUN docker-php-ext-install pdo_mysql
# Install PHP Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy existing application directory
COPY . .
