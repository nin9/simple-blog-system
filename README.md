# simple-blog-system

## Setup

```
git clone https://github.com/nin9/simple-blog-system.git
cd simple-blog-system
composer install
cp .env.example .env
php artisan key:generate
php artisan config:cache
php artisan storage:link
```
Create a database and name it simple-blog-system then run the migrations
```
php artisan migrate
```
To generate admin user run the following command:
```
php artisan db:seed
```
Admin credentials
```
email: admin@email.com
password: secret
```
