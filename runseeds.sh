#!/usr/bin/env bash

echo "Deleting all database tables"
php artisan migrate:reset --env=$1

echo "Rebuilding database tables"
php artisan migrate --env=$1

echo "Inserting default data in tables"
php artisan db:seed --env=$1

echo "Flush memcache"
echo "flush_all" | nc -q 2 127.0.0.1 11211