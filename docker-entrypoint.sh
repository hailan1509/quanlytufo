#!/bin/sh

set -e

# Check database connection (optional - skip if DB_HOST is not set)
if [ -n "${DB_HOST}" ] && [ -n "${DB_DATABASE}" ]; then
    echo "Checking database connection..."
    # Wait for database to be ready (max 30 seconds)
    max_attempts=15
    attempt=0
    until php -r "try { new PDO('mysql:host=${DB_HOST};port=${DB_PORT:-3306};dbname=${DB_DATABASE}', '${DB_USERNAME}', '${DB_PASSWORD}'); exit(0); } catch (PDOException \$e) { exit(1); }" > /dev/null 2>&1; do
        attempt=$((attempt + 1))
        if [ $attempt -ge $max_attempts ]; then
            echo "Warning: Could not connect to database after $max_attempts attempts. Continuing anyway..."
            break
        fi
        echo "Database is unavailable - sleeping (attempt $attempt/$max_attempts)"
        sleep 2
    done
    if [ $attempt -lt $max_attempts ]; then
        echo "Database is up - executing commands"
    fi
else
    echo "Database configuration not found, skipping database check..."
fi

# Install/update dependencies
if [ ! -d "vendor" ]; then
    echo "Installing composer dependencies..."
    composer install --no-interaction --prefer-dist --optimize-autoloader
fi

if [ ! -d "node_modules" ]; then
    echo "Installing npm dependencies..."
    npm install --legacy-peer-deps
fi

# Generate application key if not exists
if [ ! -f ".env" ]; then
    echo "Creating .env file..."
    cp .env.example .env
fi

php artisan key:generate --force || true

# Run migrations
php artisan migrate --force || true

# Clear and cache config
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Set permissions
chown -R www-data:www-data /var/www/html/storage
chown -R www-data:www-data /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage
chmod -R 775 /var/www/html/bootstrap/cache

echo "Application is ready!"

exec "$@"

