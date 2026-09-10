#!/bin/sh
set -e

DB_HOST=${DB_HOST:-db}
DB_USERNAME=${DB_USERNAME:-root}
DB_PASSWORD=${DB_PASSWORD:-root_password}
DB_DATABASE=${DB_DATABASE:-lppm}

# Copy .env if not exists
if [ ! -f /var/www/html/.env ]; then
    echo "Creating .env file from .env.example..."
    cp /var/www/html/.env.example /var/www/html/.env
fi

# Ensure MySQL configuration in .env
sed -i 's/^DB_CONNECTION=.*/DB_CONNECTION=mysql/' /var/www/html/.env
sed -i "s/^DB_HOST=.*/DB_HOST=$DB_HOST/" /var/www/html/.env
sed -i "s/^DB_PORT=.*/DB_PORT=3306/" /var/www/html/.env
sed -i "s/^DB_DATABASE=.*/DB_DATABASE=$DB_DATABASE/" /var/www/html/.env
sed -i "s/^DB_USERNAME=.*/DB_USERNAME=$DB_USERNAME/" /var/www/html/.env
sed -i "s/^DB_PASSWORD=.*/DB_PASSWORD=$DB_PASSWORD/" /var/www/html/.env

# Ensure APP_KEY exists
if ! grep -q "^APP_KEY=base64:" /var/www/html/.env; then
    echo "Generating application key..."
    php artisan key:generate --force
fi

# Storage link & permissions
echo "Creating storage link..."
php artisan storage:link || true

echo "Setting permissions..."
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Wait for MySQL connection
echo "Waiting for MySQL database at $DB_HOST:3306..."
until mariadb --skip-ssl -h"$DB_HOST" -u"$DB_USERNAME" -p"$DB_PASSWORD" -e "SELECT 1;" > /dev/null 2>&1; do
    echo "MySQL unavailable - waiting 2s..."
    sleep 2
done
echo "MySQL connection established successfully!"

# Run migrations
echo "Running database migrations..."
php artisan migrate --force || true

# Import lppm.sql directly into MySQL if lppm.sql exists
if [ -f /var/www/html/lppm.sql ]; then
    echo "Importing lppm.sql into MySQL database '$DB_DATABASE'..."
    mariadb --skip-ssl --force -h"$DB_HOST" -u"$DB_USERNAME" -p"$DB_PASSWORD" "$DB_DATABASE" < /var/www/html/lppm.sql || true
fi

# Execute CMD
exec "$@"
