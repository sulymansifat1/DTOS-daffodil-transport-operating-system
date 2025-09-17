# DTOS — Daffodil Transport Operating System

A clean, student-focused web app for DIU transportation. Search routes, manage schedules, and (planned) buy tickets online — with an admin panel for seamless operations.

<p align="left">
  <img alt="PHP" src="https://img.shields.io/badge/PHP-7.4%2B-777BB4?logo=php&logoColor=white" />
  <img alt="MySQL" src="https://img.shields.io/badge/MySQL-8.x-4479A1?logo=mysql&logoColor=white" />
  <img alt="Tailwind CSS" src="https://img.shields.io/badge/TailwindCSS-3.x-38B2AC?logo=tailwindcss&logoColor=white" />
  <img alt="HTML5" src="https://img.shields.io/badge/HTML5-E34F26?logo=html5&logoColor=white" />
  <img alt="CSS3" src="https://img.shields.io/badge/CSS3-1572B6?logo=css3&logoColor=white" />
  <img alt="Status" src="https://img.shields.io/badge/status-student%20project-blue" />
  <img alt="License" src="https://img.shields.io/badge/license-TBD-lightgrey" />
</p>

> Course: Web Engineering Lab (CSE415) • Project Group: 5 • Submission: 31 May, 2024
>
> Report: `DTOS - Final Report.pdf` / `DTOS - Final Report.txt` • Original repo: https://github.com/sulymansifat1/dtos

---

## Table of Contents
- [Overview](#overview)
- [Highlights](#highlights)
- [Tech Stack](#tech-stack)
- [Folder Structure](#folder-structure)
- [Getting Started](#getting-started)
  - [Database schema (starter)](#database-schema-starter)
  - [Configuration](#configuration)
  - [Run locally](#run-locally)
- [Usage](#usage)
- [Security](#security)
- [Roadmap](#roadmap)
- [Authors](#authors)
- [License](#license)
- [Acknowledgments](#acknowledgments)

---

## Overview
DTOS is a centralized platform for DIU students to search buses/routes (e.g., DSC ↔ Dhaka city), register/login, and access helpful pages like About and Contact. An Admin Panel manages bus schedules, tickets, and site settings.

Some features are in progress (see Roadmap). The stack is a classic LAMP-style setup with PHP + MySQL and a lightweight HTML/Tailwind frontend.

## Highlights
- 🔎 Fast route search from the homepage with route, time, and stop details
- 🔐 Modal-based user registration/login and session handling
- 🎫 Ticket purchase flow planned (incomplete in this PHP build)
- 🛠️ Admin panel for buses, tickets (WIP), and settings
- 🧩 Clean includes structure (`inc/`) for DB, utilities, and layout

## Tech Stack
- Frontend: HTML5, Tailwind CSS, JavaScript
- Backend: PHP (procedural)
- Database: MySQL

## Folder Structure
This mirrors the described/layout used in the project:

```
.
├─ admin/
│  ├─ ajax/
│  │  └─ settings_cred.php
│  └─ img/
├─ inc/                 # common includes (db, utilities, layout)
│  ├─ contact.php
│  ├─ db_config.php
│  ├─ essentials.php
│  ├─ head.php
│  ├─ link.php
│  ├─ loader.php
│  ├─ busDetails.php
│  ├─ dashboard.php
│  ├─ delete.php
│  ├─ index.php         # admin home
│  ├─ logout.php
│  ├─ settings.php
│  └─ tickets.php       # WIP
├─ img/                 # images used by the user-facing site
├─ about.php
├─ buyticket.php        # WIP
├─ contact.php          # partially implemented
├─ index.php            # user-facing home (search)
├─ searchResult.php
├─ style.css
├─ DTOS - Final Report.pdf
└─ DTOS - Final Report.txt
```

> Tip: If your actual paths differ, tweak the list above to match your repo.

## Getting Started
### Prerequisites
- PHP 7.4+ (8.x recommended)
- MySQL Server (or MariaDB)
- A local web stack (XAMPP/WAMP/MAMP) or PHP built-in server

### Database schema (starter)
If you don’t have a dump yet, this minimal schema gets you running. Adjust as needed.

```sql
-- Example schema (minimal starter — adjust to your needs)
CREATE DATABASE IF NOT EXISTS dtos CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE dtos;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  phone VARCHAR(30),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS buses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  route_from VARCHAR(100) NOT NULL,
  route_to VARCHAR(100) NOT NULL,
  departure_time TIME NOT NULL,
  arrival_time TIME,
  stops TEXT,
  active TINYINT(1) DEFAULT 1
);

CREATE TABLE IF NOT EXISTS tickets (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  bus_id INT NOT NULL,
  purchase_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  seat_no VARCHAR(20),
  status ENUM('PENDING','CONFIRMED','CANCELLED') DEFAULT 'PENDING',
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (bus_id) REFERENCES buses(id) ON DELETE CASCADE
);
```

### Configuration
Update DB credentials in `inc/db_config.php`:

```php
<?php
$hname = 'localhost';
$uname = 'root';
$pass  = '';
$db    = 'dtos';

$con = mysqli_connect($hname, $uname, $pass, $db);
if (!$con) {
  die('Cannot connect to database: ' . mysqli_connect_error());
}
?>
```

### Run locally
- With XAMPP/WAMP/MAMP: place the project in the web root and open `http://localhost/<folder>`.
- Or with PHP’s built-in server (from the project root):

```powershell
php -S localhost:8000
```

Then open: http://localhost:8000

## Usage
- Home (`index.php`): search for buses
- Search Results (`searchResult.php`): routes, times, stops
- About (`about.php`)
- Contact (`contact.php`): info + form (partial)
- Buy Ticket (`buyticket.php`): planned/incomplete
- Admin (`admin/*`): dashboard, buses, tickets (WIP), settings

## Security
Implemented/planned:
- Password hashing for accounts
- Input validation + prepared statements (SQLi protection)
- Secure session handling
- Future: IoT-based real-time tracking and hardening

## Roadmap
- [ ] Complete ticket purchase flow in the current stack or via a framework
- [ ] QR-code ticketing and validation
- [ ] Real-time bus tracking (IoT)
- [ ] Caching and load balancing for scalability
- [ ] Query and code optimizations

## Authors
- Md Sulyman Islam Sifat — ID: 211-15-4004 (Section: 58_D)
- Mohammed Nazmul Hoque Shawon — ID: 211-15-3996 (Section: 58_D)

Supervisor: Shababul Alam — Lecturer, Dept. of CSE, Daffodil International University

## License
No license specified. Consider adding a `LICENSE` file (e.g., MIT) to clarify usage and contributions.

## Acknowledgments
- Daffodil International University (DIU)
- Web Engineering Lab (CSE415)
