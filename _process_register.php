<?php
session_start();
include '_util_koneksi.php';
include '_utils.php';

// // Kunci enkripsi (jangan hardcode di produksi)
// define('ENCRYPTION_KEY', 'your-32-char-secret-key-1234567890'); // 32 karakter
// define('ENCRYPTION_IV', '1234567890123456'); // 16 karakter

// function encrypt($data) {
//     return openssl_encrypt($data, 'AES-256-CBC', ENCRYPTION_KEY, 0, ENCRYPTION_IV);
// }

// function decrypt($data) {
//     return openssl_decrypt($data, 'AES-256-CBC', ENCRYPTION_KEY, 0, ENCRYPTION_IV);
// }

// Ambil data dari form
$nama     = $_POST['nama'] ?? '';
$email    = $_POST['email'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$confirm  = $_POST['confirm_password'] ?? '';

// Validasi form
if (empty($nama) || empty($username) || empty($email) || empty($password) || empty($confirm)) {
    header("Location: register?error=empty");
    exit();
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: register?error=emailformat");
    exit();
}
if ($password !== $confirm) {
    header("Location: register.php?error=mismatch");
    exit();
}

// Validasi kekuatan password
function isValidPassword($password, $username, $nama, $email) {
    if (strlen($password) < 8) return false;
    if (!preg_match('/[A-Z]/', $password)) return false;
    if (!preg_match('/[a-z]/', $password)) return false;
    if (!preg_match('/[0-9]/', $password)) return false;
    if (!preg_match('/[\W_]/', $password)) return false;
    $lower = strtolower($password);
    return !(strpos($lower, strtolower($username)) !== false ||
             strpos($lower, strtolower($nama)) !== false ||
             strpos($lower, strtolower($email)) !== false);
}

if (!isValidPassword($password, $username, $nama, $email)) {
    header("Location: register.php?error=password");
    exit();
}

// Enkripsi data
$encryptedNama  = encrypt($nama);
$encryptedEmail = encrypt($email);
$emailHash      = hash('sha256', $email);

// Cek apakah username atau email_hash sudah ada
$stmt = $conn->prepare("SELECT username FROM users WHERE username = ? OR email_hash = ?");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("ss", $username, $emailHash);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    $stmt->close();
    header("Location: register.php?error=duplicate");
    exit();
}
$stmt->close();

// Simpan user ke database
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO users (name, email, email_hash, username, password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $encryptedNama, $encryptedEmail, $emailHash, $username, $hashedPassword);

if ($stmt->execute()) {
    $_SESSION['user'] = [
        'name'     => $nama,     // versi asli
        'email'    => $email,    // versi asli
        'username' => $username
    ];
    header("Location: index");
    exit();
} else {
    header("Location: register.php?error=registerfail");
    exit();
}
?>
