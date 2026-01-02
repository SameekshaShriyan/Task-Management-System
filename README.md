🗂️ Task Management System

A simple and clean Task Management System built using Laravel.  
This application helps users manage tasks with priorities, due dates, and status tracking through a user-friendly dashboard.


 Features

- Add, edit, and delete tasks
- Set task priority (Low / Medium / High)
- Track task status (Pending / Completed)
- Assign and display due dates
- Dashboard with task statistics
- Overdue task highlighting
- Clean UI using Bootstrap
- Proper MVC architecture
- Laravel form validation & resource routing

 🛠️ Tech Stack

- Backend: Laravel (PHP)
- Frontend:Blade Templates, Bootstrap 5
- Database: SQLite / MySQL
- Server: PHP built-in server / XAMPP
- Tools: Composer, Artisan CLI

📂 Project Structure (MVC)

- app/Models → Task model
- app/Http/Controllers → TaskController, DashboardController
- resources/views → Blade UI files
- routes/web.php → Web routes
- database/migrations → Database schema

 ⚙️ Setup Instructions

1. Clone the Repository
bash
git clone <your-repo-url>
cd task-manager
2.Install Dependencies
composer install
3. Environment Setup
Create .env file:
    cp .env.example .env
Generate application key:
    php artisan key:generate
4. Database Configuration
SQLite
i).Create database file:
        touch database/database.sqlite
ii).Update .env:
        DB_CONNECTION=sqlite
5. Run Migrations
    php artisan migrate
6. Run the Application
    php artisan serve
Visit:
http://127.0.0.1:8000



