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
    <title>AquascapeReef - Terumbu Karang Terancam</title>
  <?php include '_layout_headscript.php' ?>

</head>

<body id="top" class="bg-gray-100 text-gray-800 font-sans">


  <!-- Navbar -->
  <?php include '_layout_navbar.php' ?>

  <!-- Header -->
  <section class="pt-28 relative w-full h-[400px] bg-cover bg-center flex items-center justify-center text-white"
    style="background-image: url('https://superlive.id/storage/articles/24a08c96-5a39-40f4-9136-42361ce32532.jpg');">
    <div class="absolute inset-0 bg-black/50"></div>
    <h1 class="text-4xl md:text-5xl font-bold relative z-10 text-center px-4 drop-shadow-lg">
      Terumbu Karang yang Terancam di Indonesia
    </h1>
  </section>

  <!-- Content -->
  <section class="pt-20 pb-16 bg-gray-50" id="terumbu-terancam">
    <div class="max-w-6xl mx-auto px-6 space-y-12">

      <?php
      include "_data_corals.php";
      foreach ($corals as $coral):
        $isClickable = !empty($coral['link']); // GANTI DARI isset() KE !empty()
        if ($isClickable) {
          echo '<a href="detail_terumbu.php?link_coral=' . htmlspecialchars($coral['link']) . '" class="block hover:no-underline">';
        }
      ?>

        <div class="bg-white shadow-xl hover:shadow-2xl transition duration-500 rounded-xl p-6 md:flex md:items-start gap-8 transform hover:scale-[1.02] <?= $isClickable ? 'cursor-pointer' : '' ?>">
          <img src="<?= htmlspecialchars($coral['img']) ?>" alt="<?= htmlspecialchars($coral['name']) ?>" class="w-full md:w-1/3 h-64 object-cover rounded-lg shadow-md transition duration-300 hover:brightness-105">
          <div class="mt-6 md:mt-0">
            <h3 class="text-3xl font-semibold text-blue-600 mb-4"><?= htmlspecialchars($coral['name']) ?></h3>
            <ul class="list-disc ml-6 text-lg leading-relaxed text-gray-700 space-y-2">
              <?php 
                $coral_mini_desc = explode("::", $coral['desc_small'])
              ?>
              <?php foreach ($coral_mini_desc as $point): ?>
                <li><?= htmlspecialchars($point) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>

      <?php
        if ($isClickable) echo '</a>';
      endforeach;
      ?>

    </div>
  </section>

  <!-- Footer -->
  <?php include "_layout_footer.php" ?>

</body>

</html>