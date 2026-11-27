Npontu Tracker

Applications Support Team Activity Management System

Npontu Tracker is a Laravel-based web application designed to help applications support teams record daily activities, monitor task progress, document updates and maintain activity histories for reporting and operational handover.

## Features

- **User Authentication:** Secure login for authorized users.
- **Role-Based Access:** Administrator and staff workflows.
- **Activity Management:** Create and manage daily support activities.
- **Status Tracking:** Update activities as pending or completed.
- **Remarks and Updates:** Record comments and progress updates.
- **Activity History:** Maintain a record of activity updates and timestamps.
- **Daily Handover:** Review activities and identify outstanding tasks.
- **Reporting:** Search and review activity histories over selected periods.
- **Excel Export:** Export activity records and reports.

## Technology Stack

- PHP 8.3+
- Laravel 13
- MySQL-compatible database
- HTML, CSS and JavaScript
- Bootstrap / frontend assets used by the project
- Vite and npm

## Requirements

Install the following before running the application:

1. PHP 8.3 or later.
2. Composer.
3. MySQL or a compatible database.
4. Node.js and npm.
5. Git.

PHP extensions required by Laravel and the project's Composer dependencies must also be enabled.

## Installation and Setup

### 1. Clone the repository

```bash
git clone https://github.com/asuoebenezer/npontu-tracker.git
```

Enter the project directory:

```bash
cd npontu-tracker
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Configure environment variables

Create your local environment file.

**Windows PowerShell:**

```powershell
Copy-Item .env.example .env
```

**Linux/macOS:**

```bash
cp .env.example .env
```

Open `.env` and configure your database connection:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=npontu_tracker
DB_USERNAME=root
DB_PASSWORD=
```

Create the database named `npontu_tracker` in your MySQL server before proceeding.

Use your own database credentials. Do not publish your `.env` file.

### 4. Generate the application key

```bash
php artisan key:generate
```

### 5. Install frontend dependencies

```bash
npm install
```

Build the frontend assets:

```bash
npm run build
```

### 6. Run database migrations

```bash
php artisan migrate
```

This creates the database tables required by the application.

### 7. Start the application

```bash
php artisan serve
```

Open the following address in your browser:

```text
http://127.0.0.1:8000
```

## Creating an Administrator Account

After configuring the database and running migrations, create an administrator account using Laravel Tinker:

```bash
php artisan tinker
```

Then execute the following, replacing the sample password with a strong password of your choice:

```php
DB::table('users')->updateOrInsert(
    ['email' => 'admin@example.com'],
    [
        'name' => 'System Administrator',
        'password' => Hash::make('Choose-A-Strong-Password'),
        'role' => 'admin',
        'is_active' => 1,
        'email_verified_at' => now(),
        'created_at' => now(),
        'updated_at' => now(),
    ]
);
```

Exit Tinker:

```php
exit
```

Use the email and password you configured to sign in.

## Project Structure

```text
npontu-tracker/
├── app/
│   ├── Http/
│   └── Models/
├── bootstrap/
├── config/
├── database/
│   └── migrations/
├── public/
├── resources/
│   └── views/
├── routes/
├── storage/
├── tests/
├── .env.example
├── artisan
├── composer.json
├── package.json
└── README.md
```

## Security

- Keep database credentials and application keys private.
- Do not commit `.env` files or production secrets.
- Use strong passwords for administrator accounts.
- Configure production environment variables securely.
- Use HTTPS when deploying the application publicly.

## Author

**Ebenezer Asubonteng**

GitHub: [@asuoebenezer](https://github.com/asuoebenezer)

## Repository

[https://github.com/asuoebenezer/npontu-tracker](https://github.com/asuoebenezer/npontu-tracker)

---

*Developed as an applications support activity management solution.*
