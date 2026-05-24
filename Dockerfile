# Use the official production-ready PHP 8.2 image with Apache
FROM php:8.2-apache

# Use the default production configuration for PHP
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Enable Apache mod_rewrite for cleaner URL routing if needed in the future
RUN a2enmod rewrite

# Configure custom PHP settings
RUN echo "upload_max_filesize = 32M" >> "$PHP_INI_DIR/php.ini" \
    && echo "post_max_size = 32M" >> "$PHP_INI_DIR/php.ini" \
    && echo "memory_limit = 256M" >> "$PHP_INI_DIR/php.ini" \
    && echo "date.timezone = UTC" >> "$PHP_INI_DIR/php.ini"

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy the application source code to the container
COPY . /var/www/html

# Create the storage directory and set the correct ownership/permissions
# This is critical because submit-inquiry.php writes inquiry logs to storage/inquiries.ndjson
RUN mkdir -p /var/www/html/storage \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 775 /var/www/html/storage

# Expose port 80 to access the web server
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
