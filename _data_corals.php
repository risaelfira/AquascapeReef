<?php
include '_util_koneksi.php';
$nama_coral = $_GET['link_coral'] ?? '';
$id = $_GET['cid'] ?? -1;

$corals = [];

if ($nama_coral == '' && $id < 0) {
//   echo "h";
  // die();
  $stmt = $conn->prepare("SELECT * FROM corals");
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()) {
    $corals[] = $row;
  }
} elseif ($id > 0) {
  // echo "i: $id";
  // die();
  $stmt = $conn->prepare("SELECT * FROM corals WHERE id = ?");
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()) {
    $corals[] = $row;
  }
} else {
  // echo "j: $nama_coral";
  // die();
  $stmt = $conn->prepare("SELECT * FROM corals WHERE link = ?");
  $stmt->bind_param("s", $nama_coral);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()) {
    $corals[] = $row;
  }
}


// print_r($corals);
  // die();
