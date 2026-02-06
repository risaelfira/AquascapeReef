<?php
include "_utils.php";
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AquascapeReef</title>
  <?php include '_layout_headscript.php' ?>
</head>

<body id="top" class="bg-gray-100 text-gray-800 font-sans">

  <!-- Navbar -->
  <?php include '_layout_navbar.php' ?>

  <!-- Hero -->
  <section class="relative h-screen flex items-center justify-center overflow-hidden pt-28">
    <video autoplay muted loop playsinline class="absolute top-0 left-0 w-full h-full object-cover z-0">
      <source src="COREMAP-CTI%EF%BC%9A%20Upaya%20Indonesia%20untuk%20Melestarikan%20Terumbu%20Karang%20yang%20Berperan%20Penting%20bagi%20Kehidupan.mp4" type="video/mp4" />
      Browser Anda tidak mendukung
    </video>
    <div class="absolute inset-0 bg-black/50 backdrop-brightness-75 z-10"></div>

    <div class="relative z-20 text-white text-center px-4 md:px-8 max-w-3xl animate-fade-in">
      <h1 class="text-4xl md:text-5xl font-bold mb-4 drop-shadow-md">Coral paradise beneath the sea</h1>
      <p class="text-lg md:text-xl mb-6 drop-shadow">
        Millions of living creatures around the world depend on coral reefs for their survival. Despite facing numerous disasters and climate change, science reveals that coral reefs can endure—if we choose to protect them.
      </p>
      <button onclick="scrollToSection('features')" class="bg-blue-600 hover:bg-blue-700 transition px-6 py-2 rounded-full text-white shadow-lg">Explore</button>
    </div>

    <div class="absolute bottom-4 left-4 z-20 text-white text-xs md:text-sm bg-black/30 backdrop-blur-md px-4 py-2 rounded-lg shadow-md flex items-center gap-2 animate-fade-in">
      <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
        <path d="M19.615 3.184c-2.137-.525-10.08-.525-12.217 0C4.523 3.686 3.692 5.38 3.692 12s.831 8.314 3.706 8.816c2.137.525 10.08.525 12.217 0C21.477 20.314 22.308 18.62 22.308 12s-.831-8.314-3.693-8.816zM10.5 15.5v-7l6 3.5-6 3.5z" />
      </svg>
      <span>
        Video: <a href="https://www.youtube.com/watch?v=YY__UioSuUc" target="_blank" class="underline hover:text-blue-300 transition">COREMAP-CTI by World Bank</a>
      </span>
    </div>
  </section>

  <!-- About -->
  <section id="about" class="py-16 bg-white scroll-mt-32">
    <div class="max-w-4xl mx-auto px-4 text-center">
      <h2 class="text-3xl md:text-4xl font-bold mb-6 text-blue-700">About Us</h2>
      <p class="text-lg leading-relaxed text-center mb-10">
        Indonesia is home to some of the world’s most diverse coral reefs, vital to the survival of countless marine species. Through coral cultivation—such as fragment planting and reef restoration—communities are working to revive damaged ecosystems. Protecting and caring for these reefs is essential, not only to preserve marine biodiversity but also to support the livelihoods of coastal populations. With collective action, we can ensure that these underwater treasures continue to thrive for generations to come.
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