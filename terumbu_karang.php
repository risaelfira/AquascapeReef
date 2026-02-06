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
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AquascapeReef - Terumbu Karang Indonesia</title>
  <?php
  include '_layout_headscript.php'
  ?>
</head>

<body id="top" class="bg-gray-100 text-gray-800 font-sans">
  <!-- Navbar -->
  <?php include '_layout_navbar.php' ?>

  <!-- Header -->
  <section class="pt-28 relative w-full h-[400px] bg-cover bg-center flex items-center justify-center text-white"
    style="background-image: url('https://www.mldspot.com/storage/generated/June2021/keindahan-terumbu-karang.jpg');">
    <div class="absolute inset-0 bg-black/50"></div>
    <h1 class="text-4xl md:text-5xl font-bold relative z-10 text-center px-4 drop-shadow-lg">
      Terumbu Karang Indonesia
    </h1>
    <p class="absolute bottom-2 left-4 text-xs text-white z-10">
      Sumber gambar: <a href="https://www.mldspot.com/" target="_blank" class="underline hover:text-blue-300">mldspot.com</a>
    </p>
  </section>

  <!-- Konten -->
  <main class="pt-28 px-4 max-w-4xl mx-auto space-y-8 text-lg leading-relaxed text-gray-800 animate-fade-in">
    <h2 class="text-3xl md:text-4xl font-bold text-center text-cyan-700 mb-6">Keindahan dan Peran Terumbu Karang</h2>

    <p class="italic text-justify">
      Di kedalaman biru samudra, tersembunyi sebuah keajaiban yang memesona – <strong>terumbu karang</strong>, kota kehidupan yang berdenyut dalam diam.
    </p>

    <p class="text-justify">
      Lebih dari sekadar batuan di dasar laut, terumbu karang adalah <strong>arsitek alam</strong> yang menciptakan rumah bagi ribuan spesies laut dan melukiskan lanskap bawah air dengan warna-warni yang memukau.
    </p>

    <div class="border-l-4 border-blue-400 pl-4 italic text-gray-700">
      “Bayangkan menyelam ke dunia yang sunyi, di mana setiap sudut memancarkan keindahan tak terlukiskan.”
    </div>

    <p class="text-justify">
      Di sinilah terumbu karang menampilkan pesonanya — dari <span class="text-blue-700 font-semibold">koral bercabang</span> yang menjulang anggun, hingga <span class="text-blue-700 font-semibold">koral meja</span> yang datar dan luas menyerupai taman rahasia. Setiap bentuk dan warna adalah <em>mahakarya alam</em> yang menakjubkan.
    </p>

    <p class="text-justify">
      Namun, keindahan ini bukan hanya visual. Terumbu karang adalah <strong class="text-green-700">jantung kehidupan ekosistem laut</strong>, rumah bagi lebih dari 25% spesies laut dunia, meskipun hanya menempati kurang dari 1% dasar laut.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-white shadow-md rounded-lg p-6 border-l-4 border-cyan-500">
      <p class="text-justify">
        <strong class="text-pink-600">Pelindung garis pantai:</strong> Struktur kokohnya meredam ombak dan badai, mengurangi erosi, dan melindungi masyarakat pesisir dari bencana alam.
      </p>
      <p class="text-justify">
        <strong class="text-pink-600">Sumber kehidupan:</strong> Menjadi tempat berlindung, berkembang biak, dan mencari makan bagi jutaan makhluk laut, termasuk ikan, penyu, dan teripang.
      </p>
    </div>

    <p class="text-justify">
      Sayangnya, <strong class="text-red-600">keajaiban ini kini terancam</strong> akibat perubahan iklim, polusi, dan aktivitas manusia yang tidak bertanggung jawab. Tanpa perlindungan, permata laut ini bisa hilang selamanya.
    </p>

    <div class="text-center text-xl font-semibold text-blue-600 bg-blue-50 border border-blue-200 rounded-lg p-6 shadow">
      Mari bersama-sama <span class="underline">melestarikan terumbu karang</span> demi masa depan samudra dan kehidupan bumi
    </div>
  </main>

  <!-- Footer -->
  <?php include "_layout_footer.php" ?>

</body>

</html>