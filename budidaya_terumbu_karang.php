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
  <title>AquascapeReef - Budidaya Terumbu Karang</title>
  <?php include '_layout_headscript.php' ?>
</head>

<body id="top" class="bg-gray-100 text-gray-800 font-sans">
  <!-- Navbar -->
  <?php include '_layout_navbar.php' ?>

  <!-- Header  -->
  <div class="w-full h-[480px] bg-cover bg-center bg-no-repeat" style="background-image: url('https://www.biorock-indonesia.com/wp-content/uploads/2020/11/Baby-Coral-Nursery-di-Biorock-Indonesia-Pemuteran-Bali.jpg');">
    <div class="w-full h-full bg-black/40 flex items-center justify-center">
      <h1 class="text-white text-4xl md:text-5xl font-bold text-center drop-shadow-lg">
        Budidaya Terumbu Karang Di Indonesia
      </h1>
    </div>
  </div>

  <!-- Konten Kotak -->
  <main class="p-8 max-w-7xl mx-auto">
    <section>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php
        include "_data_cultivations.php";
        foreach ($cultivations as $cultivation): ?>
          <a href='detail_budidaya_terumbu.php?cid=<?= $cultivation['id'] ?>' target='_blank' class='bg-white rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 p-6 border border-blue-200'>
            <h3 class='text-xl font-bold text-blue-800 mb-2'><?= $cultivation['title'] ?></h3>
            <p class='text-sm text-gray-700'><?= $cultivation['desc_small'] ?></p>
          </a>
        <?php endforeach ?>
      </div>
    </section>

    <section id="kontak" class="mt-16 text-center">
      <h2 class="text-2xl font-semibold text-blue-900 mb-4">📩 Kontak Kami</h2>
      <p class="text-md">Untuk informasi lebih lanjut atau kolaborasi proyek, silakan hubungi:</p>
      <p class="mt-2 text-blue-700 font-medium"><a href="mailto:elfira17@outlook.com" class="underline">info@karangindonesia.or.id</a></p>
    </section>
  </main>

  <!-- Footer -->
  <?php include "_layout_footer.php" ?>

</body>

</html>