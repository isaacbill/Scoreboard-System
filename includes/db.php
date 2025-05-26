<?php

$host = '127.0.0.1';   
$user = 'root';
$pass = '';            
$db   = 'scoreboard';
$port = 3307;           

$conn = new mysqli($host, $user, $pass, $db, $port);

$conn->set_charset('utf8mb4');

if ($conn->connect_error) {
    die('Connection failed: ' . htmlspecialchars($conn->connect_error));
}
?>
