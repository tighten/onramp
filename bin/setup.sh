#!/bin/bash
if [ ! -f "auth.json" ]; then
    echo "Please create and fill auth.json first."
    exit
fi
composer install
cp .env.example .env
php artisan key:generate
npm install
npm run dev
php artisan migrate --seed
