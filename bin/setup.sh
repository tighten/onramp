#!/bin/bash
composer install
cp .env.example .env
php artisan key:generate
npm install
npm run dev
php artisan migrate --seed
