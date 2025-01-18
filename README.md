<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Inventory and Sales Management System (ERP)

The **Inventory and Sales Management System** is a robust ERP solution built using the Laravel framework. It provides tools for efficiently managing users, products, inventory, and sales with role-based access control and an intuitive dashboard.

---

## 📚 About Laravel

Laravel is a web application framework with expressive, elegant syntax. It takes the pain out of development by easing common tasks used in web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- [Expressive database ORM](https://laravel.com/docs/eloquent).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

To learn more, visit the [official documentation](https://laravel.com/docs).

---

## 🛠️ About the Project

The **Inventory and Sales Management System** is designed to streamline the inventory and sales processes for businesses. Built on Laravel and modern frontend technologies, it is both user-friendly and highly scalable.

---

## 🔑 Credentials

Use the following credentials to explore the system's different roles:

### 1. Admin
- **Email**: tahmid.tf1@gmail.com
- **Password**: 12345678

### 2. Manager
- **Email**: tahmid.tf2@gmail.com
- **Password**: 12345678

### 3. Staff
- **Email**: tahmid.tf3@gmail.com
- **Password**: 12345678

---

## 💻 Technology Stack

### Frontend:
- Laravel Blade template engine
- Vue.js
- jQuery

### Backend:
- Laravel Framework [v.11.0]
- PHP 8

### Database:
- MySQL

### Server:
- AWS Lightsail VPS Instance

---

## ✨ Features

### User Management:
- Role-based access control (Admin, Manager, Staff).
- Profile management for all users.

### Product Management:
- Add, edit, and delete products.
- Organize products into categories and tags.
- Stock tracking for products.

### Inventory Management:
- Record purchases and supplier information.
- Adjust stock levels as needed.

### Sales Management:
- Create invoices and record sales.
- View order history with detailed invoices.

### Custom Dashboard:
- Visualize key data such as:
    - Selling products.
    - Total number of products.
    - Total sales and recent sales activities.

---

## 🚀 How to Install and Run

1. **Clone the Repository**
   ```bash
   git clone https://github.com/your-repo/inventory-sales-management.git
   cd inventory-sales-management

2. **Setup Environment**
   ````
   cp .env.example .env
   composer update
   
3. **Database Setup**
    ````
   Import the database file, it will be found from 
   project_root/database_files/erp_management.sql

4. **Node.js Setup and running the project**
    ````
   npm install && npm run dev
   php artisan serve
