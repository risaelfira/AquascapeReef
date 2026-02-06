<?php
include "_utils.php";
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['user'])) {
  header("Location: index?not_logged_in=1#login-section");
  exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AquascapeReef - Tentang</title>
  <?php include '_layout_headscript.php' ?>
</head>

<body id="top" class="bg-gray-100 text-gray-800 font-sans">
  <!-- Navbar -->
    <?php include '_layout_navbar.php' ?>


  <!-- Header -->
  <section class="pt-28 relative w-full h-[400px] bg-cover bg-center flex items-center justify-center text-white"
    style="background-image: url('https://geotesa.com/wp-content/uploads/2022/03/Coral-32-1024x576.jpg');">
    <div class="absolute inset-0 bg-black/50"></div>
    <h1 class="text-4xl md:text-5xl font-bold relative z-10 text-center px-4 drop-shadow-lg">
      Terumbu Karang Indonesia
    </h1>
    <p class="absolute bottom-2 left-4 text-xs text-white z-10">
      Sumber gambar: <a href="https://geotesa.com/terumbu-karang-kekayaan-pesisir-indonesia/" target="_blank" class="underline hover:text-blue-300">geotesa.com</a>
    </p>
  </section>

  <!-- About -->
  <section id="about" class="py-16 bg-white scroll-mt-32">
    <div class="max-w-4xl mx-auto px-4 text-center">
      <h2 class="text-3xl md:text-4xl font-bold mb-6 text-blue-700">About Us</h2>
      <p class="text-lg leading-relaxed text-center mb-10">
        Indonesia is home to some of the world’s most diverse coral reefs, vital to the survival of countless marine species. Through coral cultivation—such as fragment planting and reef restoration—communities are working to revive damaged ecosystems. Protecting and caring for these reefs is essential, not only to preserve marine biodiversity but also to support the livelihoods of coastal populations. With collective action, we can ensure that these underwater treasures continue to thrive for generations to come.
      </p>
      <p class="text-lg leading-relaxed text-center mb-6">
        Indonesia adalah rumah bagi beberapa terumbu karang paling beragam di dunia, yang sangat penting bagi kelangsungan hidup berbagai spesies laut. Melalui budidaya terumbu karang—seperti penanaman fragmen dan restorasi terumbu—masyarakat turut berperan dalam memulihkan ekosistem yang rusak. Melindungi dan merawat terumbu karang ini sangatlah penting, tidak hanya untuk menjaga keanekaragaman hayati laut, tetapi juga untuk mendukung mata pencaharian masyarakat pesisir. Dengan aksi bersama, kita dapat memastikan bahwa kekayaan bawah laut ini terus lestari untuk generasi yang akan datang.
      </p>
    </div>
  </section>

  <!-- Features -->
  <?php include "_layout_sectionfeatures.php" ?>

    <?php
  if (isset($_SESSION['user']['name']) && strpos($_SESSION['user']['name'], '=') !== false) {
    $_SESSION['user']['name'] = decrypt($_SESSION['user']['name']);
  }
  if (isset($_SESSION['user']['email']) && strpos($_SESSION['user']['email'], '=') !== false) {
    $_SESSION['user']['email'] = decrypt($_SESSION['user']['email']);
  }
  ?>
  <?php if (!isset($_SESSION['user'])): ?>
    <!-- Login -->
    <?= include "_layout_sectionlogin.php" ?>
  <?php endif; ?>

  <!-- Footer -->
  <?php include "_layout_footer.php" ?>


</body>

</html>