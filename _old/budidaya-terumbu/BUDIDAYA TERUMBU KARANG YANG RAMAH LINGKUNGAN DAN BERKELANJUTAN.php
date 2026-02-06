<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['user'])){
  header("Location: index?not_logged_in=1#login-section");
  exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Coral Interaction</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    function scrollToSection(id) {
      document.getElementById(id).scrollIntoView({ behavior: "smooth" });
    }

    function toggleDropdown() {
      const dropdown = document.getElementById("userDropdown");
      dropdown.classList.toggle("hidden");
    }

    function toggleDropdownMenu(id) {
      const dropdown = document.getElementById(id);
      const isHidden = dropdown.classList.contains("hidden");

      document.querySelectorAll('.dropdown-menu').forEach(el => el.classList.add('hidden'));
      if (isHidden) dropdown.classList.remove('hidden');
    }

    document.addEventListener("click", function (event) {
      const isClickInside = event.target.closest(".relative");
      if (!isClickInside) {
        document.querySelectorAll('.dropdown-menu').forEach(el => el.classList.add('hidden'));
        document.getElementById("userDropdown")?.classList.add("hidden");
      }
    });

    window.addEventListener('DOMContentLoaded', () => {
      if (window.location.hash === "#contact") {
        const section = document.getElementById("contact");
        if (section) {
          section.scrollIntoView({ behavior: "smooth" });
        }
      }
    });
  </script>
</head>
<body id="top" class="bg-gray-100 text-gray-800 font-sans">
<?php
// Enkripsi/dekripsi
define('ENCRYPTION_KEY', 'your-32-char-secret-key-1234567890');
define('ENCRYPTION_IV', '1234567890123456');
function decrypt($data) {
  return openssl_decrypt($data, 'AES-256-CBC', ENCRYPTION_KEY, 0, ENCRYPTION_IV);
}

if (isset($_SESSION['user']['name']) && strpos($_SESSION['user']['name'], '=') !== false) {
  $_SESSION['user']['name'] = decrypt($_SESSION['user']['name']);
}
if (isset($_SESSION['user']['email']) && strpos($_SESSION['user']['email'], '=') !== false) {
  $_SESSION['user']['email'] = decrypt($_SESSION['user']['email']);
}
?>
<!-- Navbar -->
<nav class="bg-white shadow-md fixed w-full top-0 z-30">
  <div class="max-w-7xl mx-auto px-4 py-6 flex justify-between items-center">
    <a href="index" onclick="window.scrollTo({ top: 0, behavior: 'smooth' });" class="text-2xl md:text-3xl font-bold text-blue-600 hover:text-blue-800 transition">AquascapeReef</a>

    <div class="space-x-4 hidden md:flex text-base md:text-lg">
      <button onclick="scrollToSection('about')" class="hover:text-blue-500 transition"><a href="about">About</a></button>

      <!-- Dropdown Terumbu Karang -->
      <div class="relative">
        <button onclick="toggleDropdownMenu('dropdownKarang')" class="hover:text-blue-500 transition">Terumbu Karang</button>
        <div id="dropdownKarang" class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg hidden z-50 dropdown-menu">
          <a href="terumbu_karang" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Tentang Terumbu Karang</a>
          <a href="jenis_terumbu" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Jenis Terumbu Karang</a>
        </div>
      </div>

      <!-- Dropdown Terumbu Terancam -->
      <div class="relative">
        <button onclick="toggleDropdownMenu('dropdownTerancam')" class="hover:text-blue-500 transition">Terancam</button>
        <div id="dropdownTerancam" class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg hidden z-50 dropdown-menu">
          <a href="terumbu_terancam" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Terumbu Terancam</a>
          <a href="budidaya_terumbu_karang" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Budidaya Terumbu Karang</a>
        </div>
      </div>

      <!--Kontak-->
      <button onclick="scrollToSection('comment')" class="hover:text-blue-500 transition"><a href="komentar">Comment</a></button>


      <?php if (isset($_SESSION['user'])): ?>
        <div class="relative">
          <button onclick="toggleDropdown()" class="hover:text-blue-500 transition">User</button>
          <div id="userDropdown" class="absolute right-0 mt-2 w-64 bg-white shadow-lg rounded-lg p-4 hidden z-50">
            <div class="flex items-center gap-3 mb-4">
              <div class="w-12 h-12 bg-pink-500 text-white flex items-center justify-center rounded-full text-xl font-bold">
                <?= isset($_SESSION['user']['name']) ? strtoupper(substr(htmlspecialchars($_SESSION['user']['name']), 0, 1)) : '?' ?>
              </div>
              <div>
                <p class="font-semibold"><?= htmlspecialchars($_SESSION['user']['name'] ?? 'Nama tidak tersedia') ?></p>
                <p class="text-sm text-gray-500"><?= htmlspecialchars($_SESSION['user']['email'] ?? 'Email tidak tersedia') ?></p>
              </div>
            </div>
            <form action="logout" method="POST">
              <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 rounded-md">Sign out</button>
            </form>
          </div>
        </div>
      <?php else: ?>
        <button onclick="scrollToSection('contact')" class="hover:text-blue-500 transition">Login</button>
      <?php endif; ?>
    </div>
  </div>
</nav>

  <!-- Efek Laut Hidup -->
  <div class="absolute top-0 left-0 w-full h-full -z-10 overflow-hidden">
    <div class="bubble" style="left: 20%; animation-delay: 0s;"></div>
    <div class="bubble" style="left: 40%; animation-delay: 3s;"></div>
    <div class="bubble" style="left: 60%; animation-delay: 6s;"></div>
    <div class="bubble" style="left: 80%; animation-delay: 1s;"></div>
    <img src="https://i.ibb.co/YNjFkx3/fish.png" alt="fish" class="fish" style="top: 30%; left: -80px;" />
  </div>

<header class="relative w-full h-[420px] bg-cover bg-center text-white flex items-center justify-center" style="background-image: url('karang.jpg');">
  <div class="absolute inset-0 bg-teal-900/60"></div>
  <div class="relative z-10 text-center px-4">
    <h1 class="text-4xl md:text-5xl font-bold drop-shadow-lg">Budidaya Terumbu Karang</h1>
    <p class="mt-4 text-lg italic drop-shadow-sm">Edukasi dan Konservasi di Sulawesi Barat</p>
  </div>
</header>

<main class="pt-12 pb-20 px-4 max-w-5xl mx-auto">
  <div class="bg-white p-6 md:p-10 shadow-2xl rounded-xl border border-blue-100">
    <div class="mb-6 rounded-md bg-gradient-to-r from-teal-500 to-cyan-400 px-4 py-3 shadow-md">
      <h2 class="text-white text-2xl font-bold tracking-wide">🌊 Tentang Kegiatan</h2>
    </div>
    <p class="text-lg leading-relaxed text-justify mb-8">
      Kegiatan budidaya ini dilakukan oleh <strong>komunitas Ruang Baca Inspirasi (RBI) Desa Tonyaman</strong> bekerja sama dengan <strong>mahasiswa dan tim dari Universitas Sulawesi Barat</strong>. Kegiatan ini mencakup pelatihan, pendampingan, dan pelaksanaan budidaya menggunakan media ramah lingkungan berupa pipa dalam cetakan beton. Karang rusak dari lokasi lain ditransplantasi ke media ini sebagai solusi atas metode lama yang merusak lingkungan.
    </p>

    <div class="mb-6 rounded-md bg-gradient-to-r from-indigo-500 to-purple-400 px-4 py-3 shadow-md">
      <h2 class="text-white text-2xl font-bold tracking-wide">⏳ Durasi dan Proses</h2>
    </div>
    <p class="text-lg leading-relaxed text-justify mb-8">
      Program berlangsung selama <strong>10 bulan</strong> sejak tahun <strong>2022</strong>. Dimulai dengan survei dan koordinasi, dilanjutkan pelatihan teknis partisipatif. Hasilnya dipantau bulanan dan menunjukkan pertumbuhan karang 1–2 cm dalam 6 bulan.
    </p>

    <div class="mb-6 rounded-md bg-gradient-to-r from-blue-500 to-sky-400 px-4 py-3 shadow-md">
      <h2 class="text-white text-2xl font-bold tracking-wide">📍 Lokasi Kegiatan</h2>
    </div>
    <p class="text-lg leading-relaxed text-justify mb-6">
      Budidaya dilakukan di <strong>pantai Desa Tonyaman</strong>, Kabupaten Polewali Mandar, Sulawesi Barat. Lokasi ini dipilih karena kondisi perairan yang masih baik dan potensial untuk restorasi ekosistem terumbu karang.
    </p>

    <div class="mb-6 rounded-md bg-gradient-to-r from-pink-500 to-red-400 px-4 py-3 shadow-md">
      <h2 class="text-white text-2xl font-bold tracking-wide">📚 Dampak dan Signifikansi</h2>
    </div>
    <p class="text-lg leading-relaxed text-justify">
      Proyek ini tidak hanya berhasil menumbuhkan karang baru, tetapi juga meningkatkan kemandirian masyarakat, mengenalkan teknologi budidaya murah dan efisien, serta membuka peluang ekonomi dari wisata edukatif. Yang paling penting, pendekatan partisipatif berhasil menumbuhkan rasa kepemilikan dan tanggung jawab warga terhadap laut mereka.
    </p>
  </div>
</main>

  <!-- Footer -->
  <footer class="text-center py-6 bg-gray-200 mt-10">
    <p>&copy; 2025 AquascapeReef. Create by SAKARA - Samudera Karang</p>
  </footer>

</body>
</html>
