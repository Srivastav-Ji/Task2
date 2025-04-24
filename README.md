# Task2

---

# PHP CLI-Based User CRUD System

This is a basic PHP + MySQL project implementing **CRUD (Create, Read, Update, Delete)** operations for user management with **secure login**, using **only PHP scripts** — no frontend HTML or JavaScript.

---

## 🛠 Tools Used

- PHP (via XAMPP)
- MySQL (via phpMyAdmin or MySQL Workbench)
- Notepad++ (code editor)
- XAMPP browser execution (localhost)

---

## 🗃 Database Setup

1. Open MySQL Workbench or phpMyAdmin.
2. Run this SQL to create the database and table:

```sql
CREATE DATABASE user_auth;
USE user_auth;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    phone VARCHAR(15)
);
```

---

## 📁 Project File Overview

| File              | Purpose                                                                 |
|-------------------|-------------------------------------------------------------------------|
| `db.php`          | Connects to the MySQL database. Shared across all scripts.              |
| `register.php`    | Handles user registration (CREATE operation). Hashes password securely. |
| `login.php`       | Pure PHP handler that processes login and redirects to `dashboard.php`. |
| `login_form.php`  | Displays a login form. Redirects failed logins with session messages.   |
| `dashboard.php`   | Main post-login page with buttons for all CRUD actions.                 |
| `manage_users.php`| Lists all users in a table (READ operation). Includes Edit/Delete links.|
| `edit_user.php`   | Allows editing a user's name/email/phone (UPDATE operation).            |
| `delete_user.php` | Deletes a user based on their ID (DELETE operation).                    |
| `logout.php`      | Logs out user by destroying the session.                                |

---

## 🔄 Workflow

### 🔐 Registration

- User fills out and submits `register.php`
- Password is hashed with `password_hash`
- New user is inserted into the `users` table

### 🔓 Login

- User enters email & password in `login_form.php`
- `login.php` checks credentials
- On success: user ID is stored in `$_SESSION`, redirect to `dashboard.php`
- On failure: redirect back to login form with error

### 🧭 Dashboard (`dashboard.php`)

- Shows after successful login
- Includes buttons to:
  - View Users
  - Edit User
  - Delete User
  - Logout

### 📖 Read Users (`manage_users.php`)

- Pulls all users from the `users` table
- Displays them with options to:
  - Edit → `edit_user.php?id=...`
  - Delete → `delete_user.php?id=...`

### ✏️ Update User (`edit_user.php`)

- Loads user data by ID
- Allows updating name/email/phone
- Submits changes back to DB

### 🗑 Delete User (`delete_user.php`)

- Deletes user by ID via URL parameter
- Redirects back to `manage_users.php`

### 🚪 Logout

- `logout.php` clears session and redirects to `login_form.php`

---



