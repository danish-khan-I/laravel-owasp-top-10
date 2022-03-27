# Installation
1. git clone
2. composer update
3. cp .env.example .env
4. create database and update same records in .env
5. php artisan key:generate
6. php artisan migrate:fresh --seed
7. php artisan serve from the root dir

### User
1. user@example.com password
2. admin@example.com password


# vuln
added blind sql injection at /admin/users, go to view source and search for commented code inside form tag, pass those as query and it will work
