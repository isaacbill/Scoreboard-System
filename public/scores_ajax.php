<?php include '../includes/db.php';
$sql = "SELECT users.name, COALESCE(SUM(scores.points),0) AS total
        FROM users
        LEFT JOIN scores ON users.id = scores.user_id
        GROUP BY users.id
        ORDER BY total DESC";
$res = $conn->query($sql);
echo "<table>\n<tr><th>Participant</th><th>Total Points</th></tr>\n";
while ($r = $res->fetch_assoc()) {
    echo "<tr><td>{$r['name']}</td><td>{$r['total']}</td></tr>\n";
}
echo "</table>";
?>