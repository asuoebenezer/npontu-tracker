# Npontu Tracker
### Applications Support Team Activity Tracking and Reporting System

Npontu Tracker is a Laravel-based web application designed to help applications support teams record, manage, monitor and report daily operational activities.

The system provides a centralized platform for tracking work progress, recording updates and remarks, maintaining activity histories, and supporting effective team handovers.

## Key Features

- **Authentication and Access Control:** Secure login and role-based access for administrators and staff.
- **Activity Management:** Create and manage daily support activities.
- **Activity Status Tracking:** Update activities as pending or done.
- **Remarks and Updates:** Record progress notes and additional information.
- **Staff Information:** Maintain personnel information for accountability.
- **Activity History:** Track activity updates and their associated timestamps.
- **Daily Activity Dashboard:** Review activities and their current statuses.
- **Activity Reassignment:** Support the transfer of activities between personnel.
- **Reporting and Filtering:** Search and review activity histories over selected periods.
- **Excel Export:** Export activity history and reports for further analysis.
- **Operational Handover:** Provide visibility into outstanding activities to support shift handovers.

## Technology Stack

| Component | Technology |
|---|---|
| Backend | PHP |
| Framework | Laravel 13 |
| Database | MySQL-compatible database |
| Frontend | HTML, CSS, JavaScript |
| Styling | Bootstrap / Tailwind CSS (as used in the project) |
| Asset Bundling | Vite |
| Reporting | Laravel Excel |
| Version Control | Git and GitHub |

## Requirements

Before installing the application, ensure that you have:

- PHP 8.3 or later
- Composer
- MySQL or a compatible database
- Node.js and npm
- Git

## Installation and Setup

### 1. Clone the repository

```bash
git clone https://github.com/asuoebenezer/npontu-tracker.git
```

Navigate into the project directory:

```bash
cd npontu-tracker
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Configure environment variables

Create your local environment file:

```bash
copy .env.example .env
```

On macOS or Linux, use:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

### 4. Configure the database

Create a database in MySQL, for example:

```sql
CREATE DATABASE npontu_tracker;
```

Open your `.env` file and configure your database connection:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=npontu_tracker
DB_USERNAME=root
DB_PASSWORD=
```

Replace the database username and password with your local database credentials.

### 5. Run database migrations

```bash
php artisan migrate
```

### 6. Install frontend dependencies

```bash
npm install
```

Build the frontend assets:

```bash
npm run build
```

### 7. Start the application

```bash
php artisan serve
```

Open the following address in your browser:

http://127.0.0.1:8000

## User Access

The application supports role-based access for administrators and staff.

- **Administrator:** Manages and oversees application activities and personnel.
- **Staff:** Accesses assigned activities and records progress updates.

An administrator account must be configured before testing the administrator features. Use the demonstration credentials supplied separately by the project author, where available.

## Project Structure

```text
npontu-tracker/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   └── Models/
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
│   ├── css/
│   ├── js/
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

- Never commit `.env` files or production credentials.
- Keep database passwords and application keys private.
- Use strong passwords for administrator accounts.
- Configure environment variables locally before running the application.
- Do not expose real user or organizational information in demonstration environments.

## Author

**Ebenezer Asubonteng**

GitHub: https://github.com/asuoebenezer

## Repository

https://github.com/asuoebenezer/npontu-tracker

---

Developed as an Applications Support Team Activity Tracking and Reporting System.
