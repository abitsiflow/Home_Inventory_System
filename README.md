# 🏠 Home Inventory System

A web-based inventory management application designed to help users organize, monitor, and maintain records of household items efficiently. The system provides simple inventory tracking with full CRUD (Create, Read, Update, Delete) functionality backed by a MySQL database.

---

## ✨ Key Features

* **Add Inventory Items**
  Easily register new household items with their corresponding details.

* **Update Existing Records**
  Modify item information whenever changes are needed.

* **Remove Unwanted Entries**
  Delete inventory records that are no longer relevant.

* **Database Integration**
  Store and manage inventory data securely using MySQL.

---

## 🛠️ Technology Stack

This project was developed using the following technologies:

### Frontend

* HTML
* CSS
* JavaScript

### Backend

* PHP

### Database

* MySQL

### Local Development Environment

* Apache (via XAMPP)

---

## 📋 Requirements

Before running the application, ensure that the following software is installed:

* XAMPP or WAMP (Apache, PHP, and MySQL)
* A modern web browser (Chrome, Edge, Firefox, etc.)

---

## 🚀 Installation Guide

### 1. Clone the Repository

git clone https://github.com/abitsiflow/Home_Inventory_System.git

### 2. Place the Project in Your Web Server Directory

Move the project folder to your local server's root directory:

**XAMPP**

C:/xampp/htdocs/

### 3. Configure the Database

1. Launch Apache and MySQL from the XAMPP/WAMP Control Panel.

2. Open phpMyAdmin:

   http://localhost/phpmyadmin

3. Create a new database named:

   home_inventory

4. Import the SQL file located in the `config_data/` directory.

### 4. Set Up Database Credentials

Open the database configuration file inside the `backend/` folder and update the connection settings if necessary:
$host     = "localhost";
$user     = "root";
$password = "";
$database = "home_inventory";

### 5. Launch the Application

Open your browser and visit:

http://localhost/Home_Inventory_System/home-Inventory-system/

---

## 📁 Project Structure

````
Home_Inventory_System/
│
├── backend/
│   └── PHP backend logic and database operations
│
├── config_data/
│   └── SQL files for database setup and configuration
│
└── home-Inventory-system/
    └── Frontend files (HTML, CSS, JavaScript)

---

## 🤝 Contributing

Contributions are welcome. Feel free to submit pull requests for improvements, bug fixes, or new features. For significant changes, please open an issue first to discuss your proposed modifications.

---

## 📄 License

This project is distributed under the MIT License. See the `LICENSE` file for more information.

---

## 👨‍💻 Author

Developed by **abitsiflow** as part of a web development and database management learning project.
