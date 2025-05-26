<?php include '../includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scoreboard</title>
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f4f4f4;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        #scoreTable {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .error {
            color: red;
            text-align: center;
        }
    </style>
    <script>
    function loadScores() {
        fetch('scores_ajax.php')
            .then(res => {
                if (!res.ok) throw new Error('Network response was not ok');
                return res.text();
            })
            .then(html => {
                document.getElementById('scoreTable').innerHTML = html;
            })
            .catch(err => {
                document.getElementById('scoreTable').innerHTML = "<div class='error'>Failed to load scores. Please try again later.</div>";
                console.error("Error loading scores:", err);
            });
    }

    window.onload = loadScores;
    setInterval(loadScores, 10000); // Refresh every 10 seconds
    </script>
</head>
<body>

<h2>Live Scoreboard</h2>
<div id="scoreTable">Loading...</div>

</body>
</html>
