📌 Support Ticket System — Laravel Project

This is a support ticket management system built using Laravel and developed locally using XAMPP.
The project includes authentication, ticket creation, ticket types, admin feedback, and an admin dashboard.

This repository already includes an .env file configured for local development.

🗄️ Database Requirements

Before running the application, you must create the following databases in phpMyAdmin:

1️⃣ technical_db
2️⃣ billing_db
3️⃣ feedback_db
4️⃣ general_db
5️⃣ support_ticket

These are required because the system separates ticket types and routes based on their corresponding database connections.

⚙️ Local Development Environment

This project was built on:

macOS + XAMPP

Apache + MySQL

PHP 8+

Laravel 10

Composer

phpMyAdmin (via XAMPP)

An .env file is already included with database and app configurations suitable for local testing.

📦 Installation Steps

Follow these steps to run the project:

1️⃣ Clone the Repository
git clone git@github.com:apddequina/Laravel-Test-Project.git
cd Laravel-Test-Project


(If SSH does not work, ensure you added your SSH key to your GitHub account.)

2️⃣ Create the Required Databases

Open phpMyAdmin → create the following databases:

technical_db
billing_db
feedback_db
general_db
support_ticket

3️⃣ Verify .env File

Since the project includes an .env, you only need to ensure MySQL credentials match your XAMPP setup:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_USERNAME=root
DB_PASSWORD=


If your XAMPP MySQL has a password, update it.

4️⃣ Install Dependencies
composer install
npm install
npm run build

5️⃣ Run Migrations
php artisan migrate


This will create tables inside each of the databases you created earlier.

6️⃣ Run the Application
php artisan serve


Application will be available at:

http://127.0.0.1:8000/


Admin login page:

http://127.0.0.1:8000/login

📁 Project Overview
Key Features

Multi-database ticket routing

Ticket submission (Technical, Billing, General, Feedback)

Ticket type CRUD management

Admin dashboard for viewing and responding to tickets

View and update ticket feedback

Role-based admin access

Soft-delete support

Clean Blade template UI with Bootstrap

Run:

php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

📞 Contact

If you have questions about the setup, please feel free to reach out.
Contact #: 0 52 308 1015
WhatsApp: +639190850544
