# Laravel URL Shortener

A simple URL shortener project built with Laravel. It supports multiple companies, roles (SuperAdmin, Admin, Member), and short link creation and redirection.

---

## Features

- User authentication and roles
- SuperAdmin can manage all companies and users
- Admin can invite other Admins or Members to their company
- Admins and Members can create short URLs
- Public short URLs redirect to the original URL
- Role-based access to URL lists

---

## Tech Stack

- Laravel 10 or 11
- PHP 8.x
- MySQL or SQLite
- Laravel Spatie Roles & Permissions
- SMTP for invitation emails

---

## Installation Instructions

Follow these steps to get the project up and running locally:

1. Clone the repository

```bash
git clone https://github.com/your-username/laravel-url-shortener.git
cd laravel-url-shortener

2. Install PHP dependencies
composer install

3. Copy the environment configuration and generate app key
cp .env.example .env
php artisan key:generate

4. Configure your .env file
Open .env and set up your database connection (MySQL or SQLite). Example for MySQL:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

5. Run migrations and seed the database
php artisan migrate --seed

6. Start the development server
php artisan serve

7. Access the application
Open your browser and go to http://localhost:8000

8. Login Credentials
Use the seeded SuperAdmin account to log in:
Email: superadmin@example.com
Password: admin@123
