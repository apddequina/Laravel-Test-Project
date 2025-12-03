📌 Support Ticket System (Laravel)

A simple support ticket management system built with Laravel for submitting, managing, and responding to support tickets.

🚀 Features

Public-facing ticket submission form

Admin authentication system

Admin dashboard for managing tickets

Rich text feedback editor

Ticket categories (departments)

CRUD operations for ticket types

Human-readable timestamps

Soft delete support

Bootstrap UI + DataTables integration

📦 Requirements

PHP 8+

Composer

MySQL / MariaDB

Node.js (for compiling assets if needed)

Laravel 10+

XAMPP / MAMP / Laravel Valet (local development)

🗄️ Database Setup
1. Create a database in phpMyAdmin

Example:

support_ticket_app

2. Configure your .env
DB_DATABASE=support_ticket_app
DB_USERNAME=root
DB_PASSWORD=


(Adjust based on your XAMPP settings)

🛠️ Install Dependencies
composer install
npm install && npm run build   # optional if you use vite

▶️ Run Migrations
php artisan migrate


If you want sample admin/login data, add this to a seeder or run:

php artisan tinker


Then:

User::create([
    'name' => 'Admin',
    'username' => 'admin',
    'email' => 'admin@example.com',
    'password' => Hash::make('password'),
]);

▶️ Serve the Application
php artisan serve


App is available at:

http://127.0.0.1:8000/


Admin login page:

http://127.0.0.1:8000/login

📁 Project Structure
app/
resources/
routes/
database/
public/

📤 Deploying

When ready to deploy:

composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache


Upload all project files except vendor/ to your hosting.

Run:

composer install --no-dev
php artisan migrate --force


Make sure .env is set with production database credentials.
