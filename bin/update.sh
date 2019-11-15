#!/bin/bash
composer install
php artisan migrate
npm install
npm run dev
