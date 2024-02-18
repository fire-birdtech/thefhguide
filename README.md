## The Family History Guide

The Family History Guide is a free website that represents a best-in-class learning environment for family history.

### Setup
```
composer install
```
```
cp .env.example .env
```
Update the following in `.env`:  
ADMIN_NAME  
ADMIN_EMAIL  
ADMIN_PASSWORD  
DB_DATABASE  
```
php artisan key:generate
```
```
php artisan migrate --seed
```
```
npm install
```
```
npm run dev
```
