# Wardrobe Management System

A full-stack application to manage your wardrobe, built with **Laravel 11** (backend) and **Vue 3** (frontend). Features include user authentication, adding/editing/deleting clothing items, categorization, and search/filter functionality with a responsive UI.

## Features

* User authentication (login/registration)
* CRUD operations for clothing items (add, edit, delete)
* Categorization of items (e.g., tops, bottoms, shoes)
* Search and filter functionality
* Responsive and user-friendly UI using Tailwind CSS and shadcn-vue
* SQLite database for lightweight storage
* Protected API routes with Laravel Sanctum

## Prerequisites

Before cloning and running the project, ensure you have the following installed:

* **PHP** (>= 8.2): [Download](https://www.php.net/downloads.php)
* **Composer**: [Download](https://getcomposer.org/download/)
* **Node.js** (>= 18.x) and **npm**: [Download](https://nodejs.org/)
* **Git**: [Download](https://git-scm.com/downloads)

Verify installations:

```bash
php -v
composer --version
node -v
npm -v
git --version
```

## Project Structure

```
wardrobe-management/    # Laravel backend
wardrobe-frontend/      # Vue 3 frontend
```

## Installation

### 1. Clone the Repository

```bash
git clone <repository-url>
cd wardrobe-management
```

**Note**: Replace `<repository-url>` with the actual URL of your repository. If the frontend and backend are in separate repositories, clone both into the same parent directory.

### 2. Set Up the Backend (Laravel)

1. **Navigate to the backend directory**:

```bash
cd wardrobe-management
```

2. **Install PHP dependencies**:

```bash
composer install
```

3. **Copy the .env file**:

```bash
cp .env.example .env
```

4. **Configure the SQLite database**:
   * Create the SQLite database file:

```bash
touch database/database.sqlite
```

   * Edit `.env` to point to the absolute path of database.sqlite. For example:

```
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/wardrobe-management/database/database.sqlite
```

> On Windows, use backslashes (e.g., C:\path\to\wardrobe-management\database\database.sqlite).

5. **Generate application key**:

```bash
php artisan key:generate
```

6. **Run database migrations**:

```bash
php artisan migrate
```

7. **Install Laravel Sanctum** (if not already in composer.json):

```bash
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
```