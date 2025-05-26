**Judge Scoreboard System**
This is a lightweight PHP-based web application to facilitate real-time score submissions by judges and display a live scoreboard for participants.

## Setup Instructions

1. **Install LAMP Stack** using XAMPP or native (Linux).
2. **Clone or Download this repository to your XAMPP htdocs folder:
      https://github.com/isaacbill/Scoreboard-System.git
3. **Create the Database**:
   - Start Apache and MySQL from the XAMPP control panel.
   - Create a new database:
      CREATE DATABASE scoreboard;
    -Import the SQL schema below (from /init/scoreboard.sql)
     - Add some `users` (participants) manually
    -Update Database Credentials in includes/db.php:

4. **Access the App via browser:**
    Admin Panel: http://localhost/lamp-scoreboard/admin/add_judge.php
    
    Judge Panel: http://localhost/lamp-scoreboard/judge/index.php
    
    Scoreboard: http://localhost/lamp-scoreboard/public/scoreboard.php

5. **Assumptions Made**
-Each judge can score each participant once per submission.

-No login/authentication mechanism is implemented.

-Judges are added manually through an admin-like panel.

-Judges score participants from 1 to 100 points.

 6. **Design Choices**
-MySQL + PHP (MySQLi): Lightweight stack suitable for local deployment and small apps.

-Database Normalization: Kept entities (judges, users, scores) normalized for clarity and flexibility.

-AJAX-based Scoreboard: For real-time updates without refreshing the page.

-Separation of Concerns: Each PHP file serves a clear role (e.g., submit_score.php, scores_ajax.php).

7 **Future Features**

-User Authentication & Role Management
Implement login functionality for judges and admins with role-based permissions (e.g., only admins can add judges or manage scores).

-Editable Scores & Audit Trail
Allow judges or admins to edit or delete submitted scores, and maintain a history of changes for transparency.

-Multi-Round/Event Support
Add support for multiple events or competition rounds, with separate scoring and leaderboards for each.

-Responsive & Mobile-Friendly UI
Improve the frontend design to be fully responsive for mobile and tablet users, ensuring accessibility during live events.


