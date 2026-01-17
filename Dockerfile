# Multi-stage build cho Laravel application
FROM php:8.2-fpm-alpine AS base

# Install Node.js 20
# Sử dụng edge repository để có Node.js 20
RUN apk add --no-cache \
    --repository=http://dl-cdn.alpinelinux.org/alpine/edge/main \
    nodejs \
    npm

# Verify Node.js version (should be 20.x)
RUN node --version && npm --version

# Install system dependencies
RUN apk add --no-cache \
    git \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    oniguruma-dev \
    postgresql-dev \
    mysql-client \
    bash \
    shadow \
    && docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd \
    && docker-php-ext-enable pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd

# Install Composer 2.2.25
COPY --from=composer:2.2.25 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy composer files
COPY composer.json composer.lock* ./

# Install PHP dependencies (without scripts to avoid errors)
RUN composer install --no-scripts --no-autoloader --prefer-dist || true

# Copy application files
COPY . .

# Complete composer setup
RUN composer dump-autoload --optimize || true

# Build assets (only in production)
# RUN npm run build

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Development stage
FROM base AS development

# Install development dependencies
RUN composer install --prefer-dist || true

# Copy entrypoint script
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Expose port
EXPOSE 9000

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["php-fpm"]

# Production stage
FROM base AS production

# Install Node dependencies và build assets for production
# Sử dụng --legacy-peer-deps để bypass dependency conflict
COPY package.json package-lock.json* ./
RUN npm install --legacy-peer-deps && npm run build

# Remove development files
RUN rm -rf node_modules \
    && rm -rf tests \
    && rm -rf .git

# Copy entrypoint script
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 9000

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["php-fpm"]

