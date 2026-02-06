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

include "_data_cultivations.php";
$cul = $cultivations[0];
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AquascapeReef - Budidaya Terumbu - <?= $cul['title'] ?></title>
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
  <header class="relative w-full h-[420px] bg-cover bg-center text-white flex items-center justify-center" style="background-image: url('karang.jpg');">
    <div class="absolute inset-0 bg-teal-900/60"></div>
    <div class="relative z-10 text-center px-4">
      <h1 class="text-2xl md:text-3xl font-bold drop-shadow-lg">Budidaya Terumbu Karang</h1>
      <h3 class="text-4xl md:text-5xl font-bold drop-shadow-lg"><?= $cul['title'] ?></h3>
      <p class="mt-4 text-lg italic drop-shadow-sm"><?= $cul['tagline'] ?></p>
    </div>
  </header>

  <!-- Main -->
  <main class="pt-12 pb-20 px-4 max-w-5xl mx-auto">
    <div class="bg-white p-6 md:p-10 shadow-2xl rounded-xl border border-blue-100 animate-fadeIn">

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <?php if ($cul['x_tahun'] !== ""): ?>
          <div class="bg-gradient-to-r from-teal-400 to-cyan-500 rounded-lg text-white p-5 shadow-md">
            <h3 class="text-xl font-bold mb-2">📅 Tahun</h3>
            <p><?= $cul['x_tahun'] ?></p>
          </div>
        <?php endif ?>
        <?php if ($cul['x_lokasi'] !== ""): ?>
          <div class="bg-gradient-to-r from-sky-500 to-indigo-500 rounded-lg text-white p-5 shadow-md">
            <h3 class="text-xl font-bold mb-2">📍 Lokasi</h3>
            <p><?= $cul['x_lokasi'] ?></p>
          </div>
        <?php endif ?>
        <?php if ($cul['x_media'] !== ""): ?>
          <div class="bg-gradient-to-r from-emerald-500 to-green-400 rounded-lg text-white p-5 shadow-md">
            <h3 class="text-xl font-bold mb-2">🪸 Media</h3>
            <p><?= $cul['x_media'] ?></p>
          </div>
        <?php endif ?>
      </div>

      <div class="mb-6 rounded-md bg-gradient-to-r from-teal-500 to-cyan-400 px-4 py-3 shadow-md">
        <h2 class="text-white text-2xl font-bold tracking-wide animate-bounce">🌊 Tentang Kegiatan</h2>
      </div>
      <div class="text-lg leading-relaxed text-justify mb-8">
        <?= $cul['tentang_html'] ?>
      </div>

      <div class="mb-6 rounded-md bg-gradient-to-r from-blue-500 to-sky-400 px-4 py-3 shadow-md">
        <h2 class="text-white text-2xl font-bold tracking-wide">🧱 Metode dan Media</h2>
      </div>
      <div class="text-lg leading-relaxed text-justify mb-6">
        <?= $cul['metode_media_html'] ?? "" ?>
      </div>

      <div class="mb-6 rounded-md bg-gradient-to-r from-blue-500 to-sky-400 px-4 py-3 shadow-md">
        <h2 class="text-white text-2xl font-bold tracking-wide">⏳ Durasi dan Proses</h2>
      </div>
      <div class="text-lg leading-relaxed text-justify mb-6">
        <?= $cul['durasi_proses_html'] ?? "" ?>
      </div>

      <div class="mb-6 rounded-md bg-gradient-to-r from-indigo-500 to-purple-400 px-4 py-3 shadow-md">
        <h2 class="text-white text-2xl font-bold tracking-wide">📍 Lokasi dan Proses</h2>
      </div>
      <div class="text-lg leading-relaxed text-justify mb-6">
        <?= $cul['lokasi_proses_html'] ?>
      </div>
      <p class="text-lg mb-4">
        🌐 Koordinat: <code><?= $cul['lokasi_proses_coordinate_txt'] ?></code>
      </p>
      <div class="mb-4">
        <iframe src="<?= $cul['lokasi_proses_iframe_url'] ?>" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-md shadow-md transition-transform hover:scale-[1.01]"></iframe>
      </div>
      <div class="mb-8 text-right">
        <a href="<?= explode("&", $cul["lokasi_proses_iframe_url"])[0] ?>" target="_blank" class="inline-block bg-blue-500 text-white px-5 py-2 rounded-full shadow hover:bg-blue-600 transition">📍 Lihat Lokasi di Google Maps</a>
      </div>

      <div class="mb-6 rounded-md bg-gradient-to-r from-green-500 to-emerald-400 px-4 py-3 shadow-md">
        <h2 class="text-white text-2xl font-bold tracking-wide">🌱 Dampak dan Manfaat</h2>
      </div>
      <p class="text-lg leading-relaxed text-justify mb-6">
        <?= $cul['dampak_manfaat_html'] ?>
      </p>

      <div class="mb-6 rounded-md bg-gradient-to-r from-pink-500 to-red-400 px-4 py-3 shadow-md">
        <h2 class="text-white text-2xl font-bold tracking-wide">📚 Sumber Jurnal</h2>
      </div>
      <p class="text-lg leading-relaxed text-justify">
        Baca selengkapnya:
        <a href="<?= $cul['sumber_jurnal_url'] ?>" target="_blank" class="text-blue-600 hover:underline hover:text-blue-800 transition">
          <?= $cul['sumber_jurnal_txt'] ?>
        </a>
      </p>

    </div>
  </main>

  <!-- Footer -->
  <?php include "_layout_footer.php" ?>

</body>

</html>