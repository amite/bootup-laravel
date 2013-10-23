#!/usr/bin/env bash

echo "Making app/storage writable"
chmod -R 777 app/storage

php artisan optimize

echo "Project initialized!"
