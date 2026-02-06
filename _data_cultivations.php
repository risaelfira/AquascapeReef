<?php
include '_util_koneksi.php';
$id = $_GET['cid'] ?? '';

$cultivations = [];

if ($id == '') {
  $stmt = $conn->prepare("SELECT id, title, desc_small FROM cultivations");
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()) {
    $cultivations[] = $row;
  }
} else {
  $stmt = $conn->prepare("SELECT * FROM cultivations WHERE id = ?");
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()) {
    $cultivations[] = $row;
  }
}

// print_r($cultivations);
