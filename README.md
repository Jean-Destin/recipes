# Recipe Website (PHP + MySQL)

A simple, responsive recipe website built with PHP, MySQL, and Bootstrap. This project includes user registration, login, a recipe listing page, and contact form processing.

## ✅ Key Features

- User authentication (register/login)
- Recipe listing from `recipe.json` and optional DB integration with `recipes.php`
- Contact form handling via `contact_process.php`
- Modular layout using `header.html` and `footer.html`
- Responsive UI using Bootstrap (CSS + JS)
- Static content pages: `about.php`, `index.php`
- MySQL connection in `db.php`

## 📁 Project Structure

- `index.php` — Homepage
- `about.php` — About page
- `recipes.php` — Recipe listing page
- `login.php` — User login page
- `register.php` — User registration page
- `contact_process.php` — Contact form processing endpoint
- `db.php` — Database connection helper
- `header.html`, `footer.html` — Common layout pieces
- `recipe.json` — Sample recipe dataset
- `about.json` — About section data

Static assets:
- `css/` — Bootstrap and custom styles
- `js/` — Bootstrap + jQuery scripts
- `images/` — Site-related images

## ⚙️ Prerequisites

- PHP 7.4+ installed
- MySQL or MariaDB server
- Apache server (e.g., XAMPP)
- Web browser

## 🚀 Setup Instructions

1. Copy the project into your web root, e.g. `C:\xampp\htdocs\projects\website-Copy(2)`.
2. Start Apache and MySQL in XAMPP.
3. Create a MySQL database (e.g. `recipes_db`).

```sql
CREATE DATABASE recipes_db;
USE recipes_db;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL UNIQUE,
  email VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

4. Update `db.php` with your DB credentials:

```php
<?php
$host = 'localhost';
$user = 'root';
$pass = ''; // or your password
$dbname = 'recipes_db';

$mysqli = new mysqli($host, $user, $pass, $dbname);
if ($mysqli->connect_error) {
  die('Connection failed: ' . $mysqli->connect_error);
}
?>
```

5. (Optional) Import or seed recipes into DB if used by `recipes.php`.

## 🔐 Authentication Flow

- `register.php` handles user signup and stores hashed passwords.
- `login.php` checks credentials and starts a session.
- Secure session management should be configured with session timeout and secure cookies for production.

## 🧾 Recipe Data

- `recipe.json` contains sample recipe objects. Use in `recipes.php` for JSON-based rendering.
- `about.json` contains about page data.

## 🧪 Running the App

- Visit `http://localhost/projects/website-Copy(2)/index.php`
- Register at `register.php` then login at `login.php`
- View recipes at `recipes.php`

## 🛠️ Development Notes

- Use `bootstrap.min.css` and `style.css` for styling.
- Modify layout in `header.html` & `footer.html`.
- Add CSRF and input sanitization for production readiness.
- Keep password hashing using `password_hash()` and `password_verify()`.

## 📌 Troubleshooting

- “Cannot connect to database”: verify `db.php` credentials and that MySQL is running.
- “Undefined index” warnings: check form field names match in HTML and PHP.

## 📚 Resources

- Bootstrap docs: https://getbootstrap.com
- PHP manual: https://www.php.net
- MySQL docs: https://dev.mysql.com/doc/

## 📝 License

MIT License (or choose appropriate license)

