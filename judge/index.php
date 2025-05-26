<?php include '../includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Judge Panel</title>
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        select,
        input[type="number"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Judge Score Submission</h2>
    <form method="POST" action="submit_score.php">
        <label for="judge_id">Judge:</label>
        <select name="judge_id" id="judge_id" required>
            <?php
            $result = $conn->query("SELECT id, display_name FROM judges");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['display_name']}</option>";
            }
            ?>
        </select>

        <label for="user_id">Participant:</label>
        <select name="user_id" id="user_id" required>
            <?php
            $result = $conn->query("SELECT id, name FROM users");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['name']}</option>";
            }
            ?>
        </select>

        <label for="points">Points (1–100):</label>
        <input type="number" name="points" id="points" min="1" max="100" required>

        <input type="submit" value="Submit Score">
    </form>
</div>

</body>
</html>
