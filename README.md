<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Netcoden Support Ticket System

This is a Laravel-based support ticket system. Follow the instructions below to set up the project on your local environment.

### Features Implemented:

- [x] **User Roles:** Implemented two types of users: `Admin` and `Customer`.
- [x] **Ticket Creation:** Customers can open tickets to submit their issues.
- [x] **Ticket Visibility:** Tickets are visible in both Admin and Customer panels.
- [x] **Email Notification (Admin):** Admin receives an email notification when a new ticket is opened.
- [x] **Admin Response:** Admin can respond to the ticket through the system.
- [x] **Ticket Closure:** Admin can close the ticket, and customers receive an email notification regarding the closure.
- [x] **Further Issues:** Customers can reopen a ticket by creating a new one for any additional issues.

**Admin Credentials**
> email : `admin@example.com`  
> pass : `admin`

_**Note:**_ You can change these credentials in the `.env` file by modifying the following environment variables **before running the seeder**:
```env
ADMIN_EMAIL_FOR_SEEDER=
ADMIN_PASSWORD_FOR_SEEDER=
```

## Setup Guide

### 1. Clone the Repository

`git clone -b sakib-hossain-01869680796 https://github.com/netcodengit/support-ticket-coding-test.git`

`cd support-ticket-coding-test`

### 2. Install PHP Dependencies
Use Composer to install the required PHP dependencies:

`composer install`

### 3. Install JavaScript Dependencies
Install the required npm packages and build the front-end assets:

`npm install`  
`npm run build`

### 4. Copy Environment Configuration
Create a copy of the example environment file:

`cp .env.example .env`

### 5. Generate Application Key
Run the following command to generate an application encryption key:

`php artisan key:generate`

### 6. Configure the Environment File
Open the `.env` file and configure your database settings:

```env
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

#### You also need to add default admin data for seeding:
```env
ADMIN_EMAIL_FOR_SEEDER=
ADMIN_PASSWORD_FOR_SEEDER=
```

#### You also need to add email configuration:
```env
MAIL_MAILER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME=
```

### 7. Run Migrations and Seed Database
Run the following command to migrate the database and seed default data:

`php artisan migrate --seed`

### 8. Serve the Application
Start the development server:

`php artisan serve`

<details><summary>Developer Information</summary>
<p>
<h2>MD. SAKIB HOSSAIN</h2>
<strong>Email: </strong> <a href="mailto:techsakib00@gmail.com">techsakib00@gmail.com</a>
<br/>
<strong>Mobile: </strong> +8801869680796
</p>
</details> 

  
## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
