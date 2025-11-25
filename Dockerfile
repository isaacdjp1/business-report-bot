FROM php:8.2-apache

# Enable Apache rewrite
RUN a2enmod rewrite

# Copy project files to Apache web root
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Expose default Apache port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
