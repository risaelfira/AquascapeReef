<?php
$host = "localhost";
$user = "syna3877_coraluser";
$password = "88terumbu";
$db = "syna3877_coral_interaction";

// $host = "127.0.0.1";
// $user = "root";
// $password = "unroot";
// $db = "syna3877_coral_interaction";

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>