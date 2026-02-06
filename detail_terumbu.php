<?php
include "_utils.php";
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

include "_data_corals.php";
$coral = $corals[0];
?>


<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AquascapeReef - Terumbu Karang - <?= $coral['name'] ?></title>
  <?php include '_layout_headscript.php' ?>
</head>

<body id="top" class="bg-gray-100 text-gray-800 font-sans">
  <!-- Navbar -->
  <?php include '_layout_navbar.php' ?>

  <!-- Efek Laut Hidup -->
  <div class="absolute top-0 left-0 w-full h-full -z-10 overflow-hidden">
    <div class="bubble" style="left: 20%; animation-delay: 0s;"></div>
    <div class="bubble" style="left: 40%; animation-delay: 3s;"></div>
    <div class="bubble" style="left: 60%; animation-delay: 6s;"></div>
    <div class="bubble" style="left: 80%; animation-delay: 1s;"></div>
    <img src="https://i.ibb.co/YNjFkx3/fish.png" alt="fish" class="fish" style="top: 30%; left: -80px;" />
  </div>

  <!-- Header -->
  <header class="relative w-full h-[420px] bg-cover bg-center text-white flex items-center justify-center"
    style="background-image: url('karang.jpg');">
    <div class="absolute inset-0 bg-teal-900/60"></div>
    <div class="relative z-10 text-center px-4">
      <h1 class="text-4xl md:text-5xl font-bold drop-shadow-lg"><?= $coral['name'] ?></h1>
      <p class="mt-4 text-lg italic drop-shadow-sm"><?= $coral['tagline'] ?? "" ?></p>
    </div>
  </header>

  <!-- Main -->
  <main class="pt-12 pb-20 px-4 max-w-5xl mx-auto">
    <div class="bg-white p-6 md:p-10 shadow-2xl rounded-xl border border-blue-100">

      <!-- Deskripsi Karang -->
      <div class="mb-6 rounded-md bg-gradient-to-r from-teal-500 to-cyan-400 px-4 py-3 shadow-md">
        <h2 class="text-white text-2xl font-bold tracking-wide">🪸 Deskripsi Karang</h2>
      </div>
      <div class="text-lg leading-relaxed text-justify mb-8">
        <?= $coral['desc_html'] ?>
</div>

      <!-- Ancaman -->
      <div class="mb-6 rounded-md bg-gradient-to-r from-rose-500 to-pink-400 px-4 py-3 shadow-md">
        <h2 class="text-white text-2xl font-bold tracking-wide">⚠️ Ancaman yang Dihadapi</h2>
      </div>
      <div class="text-lg leading-relaxed text-justify mb-8">
        <?= $coral['ancaman_html'] ?>
      </div>

      <!-- Lokasi -->
      <div class="mb-6 rounded-md bg-gradient-to-r from-indigo-500 to-sky-400 px-4 py-3 shadow-md">
        <h2 class="text-white text-2xl font-bold tracking-wide">📍 Lokasi Penyebaran</h2>
      </div>
      <div class="text-lg leading-relaxed text-justify mb-6">
        <?= $coral['lokasi_html'] ?>
      </div>
      <p class="text-lg mb-4">
        🌐 Koordinat: <code><?= $coral['lokasi_coordinate_txt'] ?></code>
      </p>
      <div class="mb-8">
        <iframe
          src="<?= $coral['lokasi_iframe_url'] ?>"
          width="100%"
          height="400"
          style="border:0;"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          class="rounded-md shadow-md">
        </iframe>
      </div>


      <!-- Pelestarian -->
      <div class="mb-6 rounded-md bg-gradient-to-r from-green-500 to-emerald-400 px-4 py-3 shadow-md">
        <h2 class="text-white text-2xl font-bold tracking-wide">🌱 Pentingnya Pelestarian</h2>
      </div>
      <div class="text-lg leading-relaxed text-justify">
        <?= $coral['pelestarian_html'] ?>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <?php include "_layout_footer.php" ?>

</body>

</html>