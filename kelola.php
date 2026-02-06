<?php
include "_utils.php";
include "_data_corals.php";
include "_data_cultivations.php";
include "_data_comments.php";

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['user'])) {
  header("Location: index?not_logged_in=1#login-section");
  exit();
}

if (isset($_SESSION['user']['name']) && strpos($_SESSION['user']['name'], '=') !== false) {
  $_SESSION['user']['name'] = decrypt($_SESSION['user']['name']);
}
if (isset($_SESSION['user']['email']) && strpos($_SESSION['user']['email'], '=') !== false) {
  $_SESSION['user']['email'] = decrypt($_SESSION['user']['email']);
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AquascapeReef - Kelola Konten</title>
  <?php include '_layout_headscript.php' ?>
</head>

<body id="top" class="bg-gray-100 text-gray-800 font-sans">
  <!-- Navbar -->
  <?php include '_layout_navbar.php' ?>

  <!-- Header  -->
  <div class="pt-20 w-full h-[200px] bg-cover bg-center bg-no-repeat" style="background-image: url('https://image.idntimes.com/post/20161209/the-great-barrier-reef-5f78074eec83b3b8e8958d857e58bc29.jpeg?tr=w-1920,f-webp,q-75&width=1920&format=webp&quality=75');">
    <div class="w-full h-full bg-black/40 flex items-center justify-center">
      <h1 class="text-white text-4xl md:text-5xl font-bold text-center drop-shadow-lg">
        AquascapeReef Kelola Konten
      </h1>
    </div>
  </div>

  <section class="p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Daftar Terumbu Karang Terancam</h2>

    <!-- Table Container for Responsiveness -->
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider rounded-tl-lg">
              ID
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Nama
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Tagline
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider rounded-tr-lg">
              Action
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <?php foreach($corals as $coral): ?>
          <tr class="hover:bg-gray-50">
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              <?= $coral['id'] ?>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              <?= $coral['name'] ?>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              <?= $coral['tagline'] ?>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              
              <a href="edit_coral.php?cid=<?= $coral['id'] ?>" target="_blank" class="inline-block bg-blue-500 text-white px-5 py-2 rounded-full shadow hover:bg-blue-600 transition">Edit</a>
            </td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </section>



  <!-- Komentar Section -->
  <section id="comment" class="pt-36 pb-20 bg-white scroll-mt-32">
  </section>

  <!-- Footer -->
  <footer class="text-center py-6 bg-gray-200">
    <p>&copy; 2025 AquascapeReef. Create by SAKARA - Samudera Karang</p>
  </footer>
</body>

</html>