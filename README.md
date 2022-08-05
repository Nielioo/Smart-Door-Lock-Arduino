# Smart-Door-Lock-Arduino

Internet Of Things Final Project Semester 4 (Juni 2022)

How to use this project (step by step):
> **After Pulling from GitHub**
```
cp .env.example .env
composer install
php artisan key:generate
```

> **Deploy Laravel Passport**
```
composer require laravel/passport
php artisan migrate
php artisan passport:install
```

> **Run** ```php artisan passport:install``` **if oauth_clients gone**

> **Prism IoT Seeder - Please do it in order**
```
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=DoorSeeder
```

> **Quick Guide - When you wanna refresh the database**
```
php artisan migrate:fresh
php artisan passport:install
```
**_(+ all seeders)_**
