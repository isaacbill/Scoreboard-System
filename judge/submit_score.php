<?php
include '../includes/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judge_id = (int) $_POST['judge_id'];
    $user_id  = (int) $_POST['user_id'];
    $points   = (int) $_POST['points'];

    // Validate points
    if ($points < 1 || $points > 100) {
        die("<div class='message error'>Points must be between 1 and 100.</div>");
    }

    $stmt = $conn->prepare("REPLACE INTO scores (judge_id, user_id, points) VALUES (?, ?, ?)");
    $stmt->bind_param('iii', $judge_id, $user_id, $points);
    if ($stmt->execute()) {
        header("Location: index.php?msg=success");
        exit;
    } else {
        echo "<div class='message error'>Error submitting score: " . htmlspecialchars($stmt->error) . "</div>";
    }
}
?>