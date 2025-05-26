#  Judge Scoreboard System

This is a lightweight PHP-based web application that allows judges to submit scores in real-time and displays a live scoreboard for participants. Built with simplicity and clarity in mind, this app is ideal for small competitions or events.

---

##  Setup Instructions

### 1. Requirements

- **PHP** (v7.4+)
- **MySQL or MariaDB**
- **LAMP Stack** (Use **XAMPP** for convenience on Linux or install components natively)
- A modern web browser

### 2. Installation

1. **Clone or Download** this repository to your XAMPP `htdocs` folder:

   ```
   https://github.com/isaacbill/Scoreboard-System.git
   ```

2. **Start Apache and MySQL** from the XAMPP control panel.

3. **Create the Database**:

   - Open **phpMyAdmin** or use the MySQL CLI.
   - Create a database:

     ```sql
     CREATE DATABASE scoreboard;
     ```

   - Import the schema:

     ```
     /init/scoreboard.sql
     ```

   - Add some users (participants) manually.

4. **Update Database Credentials** in:

   ```
   includes/db.php
   ```

5. **Access the App in your browser**:

   - **Admin Panel**: http://localhost/lamp-scoreboard/admin/add_judge.php
   - **Judge Panel**: http://localhost/lamp-scoreboard/judge/index.php
   - **Scoreboard**: http://localhost/lamp-scoreboard/public/scoreboard.php

---

##  Assumptions Made

- Each judge can score each participant only once.
- No login or authentication is implemented.
- Judges are added manually through the admin panel.
- Scores range from **1 to 100**.

---

##  Design Choices

- **MySQL + PHP (MySQLi)**: A lightweight stack ideal for small local deployments.
- **Normalized Database Structure**: Clear separation of entities (`judges`, `users`, `scores`) for maintainability.
- **AJAX-Based Scoreboard**: Enables real-time updates without reloading the page.
- **Separation of Concerns**: Each PHP script has a single responsibility (e.g., `submit_score.php`, `scores_ajax.php`).

---

##  Future Features

1. **User Authentication & Role Management**  
   Implement login functionality with roles (e.g., judges, admins). Admins manage judges and view all scores.

2. **Editable Scores & Audit Trail**  
   Allow edits to scores with an audit log to track changes and ensure transparency.

3. **Multi-Round/Event Support**  
   Add support for multiple competition rounds or events with isolated leaderboards.

4. **Responsive & Mobile-Friendly UI**  
   Upgrade the frontend to be fully responsive and user-friendly on all devices.
