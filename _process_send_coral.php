<?php
include '_util_koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $conn->real_escape_string($_POST['id']); // Get the ID if it exists (for updates)

  $name = $conn->real_escape_string($_POST['name'] ?? '');
  $tagline = $conn->real_escape_string($_POST['tagline'] ?? '');
  $img = $conn->real_escape_string($_POST['img'] ?? '');
  $link = $conn->real_escape_string($_POST['link'] ?? '');
  $desc_small = $conn->real_escape_string($_POST['desc_small'] ?? '');
  $desc_html = $conn->real_escape_string($_POST['desc_html'] ?? '');
  $ancaman_html = $conn->real_escape_string($_POST['ancaman_html'] ?? '');
  $lokasi_html = $conn->real_escape_string($_POST['lokasi_html'] ?? '');
  $lokasi_coordinate_txt = $conn->real_escape_string($_POST['lokasi_coordinate_txt'] ?? '');
  $lokasi_iframe_url = $conn->real_escape_string($_POST['lokasi_iframe_url'] ?? '');
  $pelestarian_html = $conn->real_escape_string($_POST['pelestarian_html'] ?? '');

  $sql = "";
  $action_message = "";

  if ($id > -1) {
    // This is an UPDATE operation
    $sql = "UPDATE `corals` SET
                    `name` = '$name',
                    `tagline` = '$tagline',
                    `img` = '$img',
                    `link` = '$link',
                    `desc_small` = '$desc_small',
                    `desc_html` = '$desc_html',
                    `ancaman_html` = '$ancaman_html',
                    `lokasi_html` = '$lokasi_html',
                    `lokasi_coordinate_txt` = '$lokasi_coordinate_txt',
                    `lokasi_iframe_url` = '$lokasi_iframe_url',
                    `pelestarian_html` = '$pelestarian_html'
                WHERE `id` = '$id'";
    $action_message = "Coral entry updated successfully!";
  } else {
    // This is an INSERT operation
    $sql = "INSERT INTO `corals` (
                    `name`, `tagline`, `img`, `link`, `desc_small`, `desc_html`,
                    `ancaman_html`, `lokasi_html`, `lokasi_coordinate_txt`,
                    `lokasi_iframe_url`, `pelestarian_html`
                ) VALUES (
                    '$name', '$tagline', '$img', '$link', '$desc_small', '$desc_html',
                    '$ancaman_html', '$lokasi_html', '$lokasi_coordinate_txt',
                    '$lokasi_iframe_url', '$pelestarian_html'
                )";
    $action_message = "New coral entry added successfully!";
  }

  if ($conn->query($sql) === TRUE) {
    // echo "berhasil";
    header("Location: kelola.php?status=1message=$action_message");
    exit();
  } else {
    // echo "gagal";
    header("Location: kelola.php?status=0&message=$action_message");
    exit();
  }
}
