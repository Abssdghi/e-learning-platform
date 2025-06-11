<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

# E-LEARNING PLATFORM

## About This Project

This repository contains the source code for a lightweight e-learning platform built with the **Laravel Framework (v12.17.0)**.

The platform's core functionalities include:

- **Secure User Authentication:** Full user management system including registration, login, and profile updates.
- **Role-Based Access Control (RBAC):** A clear distinction between `Admin` and `User` roles, with protected routes ensuring proper permissions for course management and enrollment.
- **Course Management (Admin):** A dedicated admin panel for Creating, Reading, Updating, and Deleting (CRUD) courses.
- **User Enrollment System (User):** A simple dashboard for users to view available courses and manage their enrollments.

<br>

## Requirements
- PHP >= 8.1  
- Composer  
- MySQL  
- Node.js and npm  
- Laravel Breeze  

<br>

## Installation Steps
```bash
git clone https://github.com/Abssdghi/e-learning-platform
cd e-learning-platform
composer install
```
### Configure your database settings 
1. Copy `.env.example` to `.env`  
   ```bash
   copy .env.example .env
   ```
2. Generate the app key:  
   ```bash
   php artisan key:generate
   ```
3. Configure the following database credentials in `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
   ```
4. Run database migrations and seeders:  
   ```bash
   php artisan migrate --seed
   ```
5. (Optional) For a fresh start:  
   ```bash
   php artisan migrate:fresh --seed
   ```
### Continue the installation process
```bash
php artisan storage:link
npm install
npm run build
php artisan serve
```


<br>

## Screenshots

||||
|-|-|-|
| ![1](/screenshots/1.png) | ![2](/screenshots/2.png) | ![3](/screenshots/3.png) |
| | |
| ![4](/screenshots/4.png) | ![5](/screenshots/5.png) |

<br>

## Architectural Decisions

- The project follows the **Laravel MVC structure**, ensuring clean code organization by separating application logic, presentation, and data handling.

- Although a **RESTful API** approach was initially considered, a **Blade-based monolithic structure** was selected to better align with the project's UI requirements and to simplify implementation.

- **Laravel Breeze** was used for secure and modern authentication scaffolding. **Custom middleware** was implemented to enforce role-based access control (RBAC), restricting admin routes to authorized users only.

<br>

## Resources Used
- [Laravel Official Documentation](https://laravel.com/docs/12.x)  
- [Bro Code PHP tutorial](https://youtube.com/playlist?list=PLZPZq0r_RZOO6bGTY9jbLOyF_x6tgwcuB)  
- [Git Mag Laravel Course](https://youtube.com/playlist?list=PL1xdRbCBrpocot3OeKdg-DjEfIwUIge4x)  
- [WebDevMatics Laravel 12 Crash Course](https://youtu.be/of2BClSU4VI)  
- [Laravel Daily Laravel 12 Free Course](https://youtu.be/EThrrjtnddw)  
- [Google Gemini AI](https://gemini.google.com/)  

<br>

## Video Recording

🔗 [Full Project Walkthrough](https://drive.google.com/file/d/1sJVHx3RI83RJ8zaX7jFfphnIJrJeEnrh)

<br>

## Summary

This project was developed in three structured phases. It showcases practical skills in Laravel backend development, user authentication, role-based access control (RBAC), course management, and working with a Jalali calendar interface. All required features have been fully implemented and tested successfully.