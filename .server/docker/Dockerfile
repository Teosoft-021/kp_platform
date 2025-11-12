FROM php:8.4-fpm

# Setup UID/GID build arguments
ARG APP_UID=1000
ARG APP_GID=1000

# Install dependencies needed for Composer
RUN apt-get update && apt-get install -y curl unzip git zip

# Install PHP extensions
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions amqp bcmath gd intl opcache pdo_mysql pdo_pgsql sockets xsl zip xdebug pcov redis apcu memcached

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    chmod +x /usr/local/bin/composer

# Create custom user and group to match host
RUN groupadd -g ${APP_GID} appgroup && \
    useradd -u ${APP_UID} -g appgroup -m appuser

# Set working directory
WORKDIR /app
RUN chown -R appuser:appgroup /app

# Enable and configure xdebug properly
RUN docker-php-ext-enable xdebug && \
    echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.start_with_request=trigger" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Copy the entrypoint script BEFORE using it
COPY --chown=root:root ./.server/docker/entrypoint.sh /usr/local/bin/entrypoint.sh

# Verify file exists
RUN ls -alh /usr/local/bin/entrypoint.sh

# Ensure the entrypoint script is executable
RUN chmod +x /usr/local/bin/entrypoint.sh

# Use the entrypoint script
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

CMD ["php-fpm"]

USER appuser
