<?php include '../includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Judge</title>
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background-color: #f4f4f4;
        }

        h2 {
            color: #333;
        }

        form {
            background: #fff;
            padding: 25px;
            max-width: 400px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>

<h2>Add a Judge</h2>

<?php
$username = $display_name = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username     = trim($_POST['username']);
    $display_name = trim($_POST['display_name']);

    if ($username === '' || $display_name === '') {
        echo "<div class='message error'>All fields are required.</div>";
    } else {
        $check = $conn->prepare("SELECT id FROM judges WHERE username = ?");
        $check->bind_param('s', $username);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            echo "<div class='message error'>Judge with that username already exists.</div>";
        } else {
            $stmt = $conn->prepare("INSERT INTO judges (username, display_name) VALUES (?, ?)");
            $stmt->bind_param('ss', $username, $display_name);
            if ($stmt->execute()) {
                echo "<div class='message success'>Judge added successfully.</div>";
                $username = $display_name = ''; // Clear form
            } else {
                echo "<div class='message error'>Error adding judge: " . htmlspecialchars($stmt->error) . "</div>";
            }
        }
    }
}
?>

<form method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="<?= htmlspecialchars($username) ?>" required>

    <label for="display_name">Display Name:</label>
    <input type="text" name="display_name" id="display_name" value="<?= htmlspecialchars($display_name) ?>" required>

    <input type="submit" value="Add Judge">
</form>

</body>
</html>
