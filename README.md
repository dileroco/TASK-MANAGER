# Task Manager

A simple Task Manager application built with Laravel, MySQL, and Bootstrap 4 as part of a practical coding test.

The idea behind this project is to make it easy to manage daily tasks. Users can create tasks, view them, edit their details, change their status, and delete them when they are no longer needed.

## Features

- Create tasks with a title, description, and status.
- View all tasks in a table with their creation dates.
- Edit task information and update its status.
- Delete tasks after confirming the action.
- Choose between two statuses: Completed and Pending.
- Display different colors for each status.
- Validate form inputs and display user-friendly error messages.

## How I Built It

I started by setting up the project structure first, including the model, migration, controller, routes, and views. I wanted to have a clear structure before implementing the features, so I could add changes step by step without getting confused or making the code difficult to manage.

After that, I worked on the main CRUD operations (Create, Read, Update, Delete), added form validation, and then implemented the search, status filtering, and pagination features.

I used Laravel's MVC structure to keep the application organized, Eloquent for database interactions, and Blade with Bootstrap 4 for the user interface.

## Bonus Features

I implemented two of the optional features:

- **Search:** Allows users to search for tasks by title.
- **Status Filter:** Allows users to filter tasks by Completed or Pending status.
- **Pagination:** Displays 5 tasks per page to keep the task list organized.

I decided not to implement drag-and-drop because I felt it was not a natural fit for the table-based layout of this application. I also haven't worked with drag-and-drop functionality before, so I focused on the other features instead.

## Technologies Used

- Laravel
- PHP
- MySQL
- Eloquent ORM
- Blade Templates
- Bootstrap 4
- HTML and CSS

## Assumptions

- A task must have a title and a status.
- The description is optional.
- A task can only have one of two statuses: Completed or Pending.
- User authentication was not included because it was not part of the requirements.
- The application is intended to run locally.

## Installation and Setup

### Requirements

- PHP
- Composer
- MySQL
- A local development environment such as XAMPP

### 1. Clone the repository

```bash
git clone https://github.com/dileroco/TASK-MANAGER.git
```

### 2. Open the project directory

```bash
cd TASK-MANAGER
```

### 3. Install dependencies

```bash
composer install
```

### 4. Configure the environment

Create your `.env` file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

### 5. Create the database

Create a MySQL database named `task_manager`, then update your `.env` file with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_manager
DB_USERNAME=root
DB_PASSWORD=
```

Update the username and password if your local MySQL configuration is different.

### 6. Run the migrations

```bash
php artisan migrate
```

### 7. Start the application

```bash
php artisan serve
```

Open the application at:

http://127.0.0.1:8000/