<?php
// Koneksi
include '_util_koneksi.php';
// $conn = new mysqli("localhost", "root", "", "coral_interaction");
// if ($conn->connect_error) {
//   die("Koneksi gagal: " . $conn->connect_error);
// }

// Ambil data
$nama = $_POST['nama'] ?? '';
$email = $_POST['email'] ?? '';
$pesan = $_POST['pesan'] ?? '';
$file_name = null;

// Upload file jika ada
if (!empty($_FILES['lampiran']['name'])) {
  $upload_dir = 'uploads/';
  if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
  }

  $allowed = ['pdf', 'jpg', 'jpeg', 'png'];
  $ext = strtolower(pathinfo($_FILES['lampiran']['name'], PATHINFO_EXTENSION));

  if (in_array($ext, $allowed) && $_FILES['lampiran']['size'] <= 2 * 1024 * 1024) {
    $file_name = uniqid() . '.' . $ext;
    move_uploaded_file($_FILES['lampiran']['tmp_name'], $upload_dir . $file_name);
  }
}

// Simpan ke DB
$stmt = $conn->prepare("INSERT INTO komentar (nama, email, pesan, lampiran) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nama, $email, $pesan, $file_name);
$stmt->execute();
$stmt->close();
$conn->close();

header("Location: komentar?status=sukses");
exit;
?>
