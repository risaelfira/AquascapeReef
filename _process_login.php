<?php
session_start(); 
include '_util_koneksi.php';

$identifier = $_POST['identifier'] ?? '';
$password   = $_POST['password'] ?? '';
// print_r($_POST);

// Gunakan prepared statement untuk keamanan
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
$stmt->bind_param("ss", $identifier, $identifier);
$stmt->execute();
$result = $stmt->get_result();
// echo "<br />res: ";
// print_r($result);
// password_hash($password, PASSWORD_DEFAULT);

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            'name' => $user['name'],
            'email' => $user['email'],
            'username' => $user['username']
        ];
        header("Location: index");
        exit();
    }
}

// Jika gagal login
header("Location: index?error=1");
exit();
?>
