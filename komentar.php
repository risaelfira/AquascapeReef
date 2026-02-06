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
  <title>AquascapeReef - Kirim Komentar</title>
  <?php include '_layout_headscript.php' ?>
</head>

<body id="top" class="bg-gray-100 text-gray-800 font-sans">
  <!-- Navbar -->
  <?php include '_layout_navbar.php' ?>

  <!-- Header  -->
  <div class="w-full h-[480px] bg-cover bg-center bg-no-repeat" style="background-image: url('https://image.idntimes.com/post/20161209/the-great-barrier-reef-5f78074eec83b3b8e8958d857e58bc29.jpeg?tr=w-1920,f-webp,q-75&width=1920&format=webp&quality=75');">
    <div class="w-full h-full bg-black/40 flex items-center justify-center">
      <h1 class="text-white text-4xl md:text-5xl font-bold text-center drop-shadow-lg">
        AquascapeReef Feedback & Report
      </h1>
    </div>
  </div>



  <!-- Komentar Section -->
  <section id="comment" class="pt-36 pb-20 bg-white scroll-mt-32">
    <div class="max-w-5xl w-full mx-auto px-4 md:px-8">
      <h2 class="text-3xl md:text-4xl font-bold mb-10 text-center text-blue-700">Form Komentar</h2>

      <?php if (isset($_GET['status']) && $_GET['status'] === 'sukses'): ?>
        <p class="text-green-600 mb-8 text-center text-lg font-medium">Komentar Anda berhasil dikirim!</p>
      <?php endif; ?>

      <form action="_process_send_comment.php" method="POST" enctype="multipart/form-data" class="grid md:grid-cols-2 gap-6 text-base md:text-lg">
        <!-- Nama -->
        <div class="col-span-2 md:col-span-1">
          <label for="nama" class="block mb-2 text-sm font-medium text-gray-700">Nama Lengkap</label>
          <input type="text" id="nama" name="nama" required
            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none" />
        </div>

        <!-- Email -->
        <div class="col-span-2 md:col-span-1">
          <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Alamat Email</label>
          <input type="email" id="email" name="email" required
            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none" />
        </div>

        <!-- Pesan -->
        <div class="col-span-2">
          <label for="pesan" class="block mb-2 text-sm font-medium text-gray-700">Isi Komentar / Pengaduan</label>
          <textarea id="pesan" name="pesan" rows="6" required
            class="w-full px-4 py-3 border border-gray-300 rounded-md resize-y focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
        </div>

        <!-- Upload File -->
        <div class="col-span-2">
          <label for="lampiran" class="block mb-2 text-sm font-medium text-gray-700">Upload Dokumen (Opsional)</label>
          <input type="file" id="lampiran" name="lampiran"
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200" />
          <p class="text-sm text-gray-500 mt-1">Format yang diperbolehkan: .pdf, .jpg, .png (maks 2MB)</p>
        </div>

        <!-- Tombol Kirim -->
        <div class="col-span-2 flex justify-start">
          <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-md transition text-base">
            Kirim
          </button>
        </div>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <?php include "_layout_footer.php" ?>
</body>

</html>