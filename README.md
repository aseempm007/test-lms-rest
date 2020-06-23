# Learning Management System - REST API  
The code is developed on LARAVEL FRAMEWORK.  

## Initial Steps
1. Copy *.env.example* to *.env*.
2. Configure database in *.env* file.
3. Install dependencies: `composer install`.
4. Generate APP KEY: `php artisan key:generate`.
5. Create tables: `php artisan migrate`.
6. Install Passport: `php artisan passport:install`.
7. Copy *PASSPORT_PERSONAL_ACCESS_CLIENT_ID* and *PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET* to .env file.
8. Run Seeders: `php artisan db:seed`