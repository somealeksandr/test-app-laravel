
# Test Laravel App

This project is a REST API for managing tasks, built with Laravel. The API allows users to create, view, update, and delete tasks, with additional features like user registration, authentication via API tokens, and optimized database queries for fetching recent and popular products.

## Features

- **Task Management**: Create, view, update, and delete tasks.
- **User Authentication**: Register and authenticate users using API tokens.
- **Optimized Queries**: Fetch recent and popular products with optimized database queries.
- **Caching**: Cache results of heavy database queries to improve performance.

## Requirements

- PHP 8.0 or higher
- Composer
- MySQL
- Laravel 10.x

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/somealeksandr/test-app-laravel.git
cd test-app-laravel
```

### 2. Install dependencies

```bash
composer install
```

### 3. Configure the environment

Copy the `.env.example` file to `.env` and configure your database and other environment variables:

```bash
cp .env.example .env
```

Update the `.env` file with your database credentials:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_management
DB_USERNAME=root
DB_PASSWORD=yourpassword
```

### 4. Generate application key

```bash
php artisan key:generate
```

### 5. Run migrations

```bash
php artisan migrate
```

### 6. Seed the database

```bash
php artisan db:seed
```

### 7. Serve the application

You can serve the application locally using Laravel's built-in server:

```bash
php artisan serve
```

The application will be accessible at `http://localhost:8000`.

## API Endpoints

- `POST /api/register`: Register a new user.
- `POST /api/login`: Authenticate a user and retrieve an API token.
- `GET /api/tasks`: Retrieve a list of tasks (requires API token).
- `POST /api/tasks`: Create a new task (requires API token).
- `GET /api/tasks/{task}`: Retrieve a single task by ID (requires API token).
- `PUT /api/tasks/{task}`: Update a task by ID (requires API token).
- `DELETE /api/tasks/{task}`: Delete a task by ID (requires API token).
- `GET /api/products/user/{user}/recent-products`: Retrieve recent products purchased by a user (requires API token).
- `GET /api/products/popular`: Retrieve the most popular products (requires API token).

## Caching

Popular products are cached for 1 hour to improve performance. The cache will be automatically cleared and refreshed when a new request is made after the cache has expired.


