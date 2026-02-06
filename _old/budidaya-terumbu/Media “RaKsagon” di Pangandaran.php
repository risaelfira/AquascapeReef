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

<!-- Header -->
<header class="relative w-full h-[420px] bg-cover bg-center text-white flex items-center justify-center" style="background-image: url('karang.jpg');">
  <div class="absolute inset-0 bg-teal-900/60"></div>
  <div class="relative z-10 text-center px-4">
    <h1 class="text-2xl md:text-3xl font-bold drop-shadow-lg">Budidaya Terumbu Karang</h1>
    <h3 class="text-4xl md:text-5xl font-bold drop-shadow-lg">Media RaKsagon di Pangandaran</h3>
    <p class="mt-4 text-lg italic drop-shadow-sm">Restorasi Laut di Pantai Barat Pananjung</p>
  </div>
</header>

<!-- Main -->
<main class="pt-12 pb-20 px-4 max-w-5xl mx-auto">
  <div class="bg-white p-6 md:p-10 shadow-2xl rounded-xl border border-blue-100 animate-fadeIn">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
      <div class="bg-gradient-to-r from-teal-400 to-cyan-500 rounded-lg text-white p-5 shadow-md">
        <h3 class="text-xl font-bold mb-2">📅 Tahun</h3>
        <p>Sebelum April 2017</p>
      </div>
      <div class="bg-gradient-to-r from-sky-500 to-indigo-500 rounded-lg text-white p-5 shadow-md">
        <h3 class="text-xl font-bold mb-2">📍 Lokasi</h3>
        <p>Pantai Barat Pananjung, Pangandaran</p>
      </div>
      <div class="bg-gradient-to-r from-emerald-500 to-green-400 rounded-lg text-white p-5 shadow-md">
        <h3 class="text-xl font-bold mb-2">🪸 Media</h3>
        <p>RaKsagon</p>
      </div>
    </div>

    <div class="mb-6 rounded-md bg-gradient-to-r from-teal-500 to-cyan-400 px-4 py-3 shadow-md">
      <h2 class="text-white text-2xl font-bold tracking-wide animate-bounce">🌊 Tentang Kegiatan</h2>
    </div>
    <p class="text-lg leading-relaxed text-justify mb-8">
      Kegiatan penanaman terumbu karang ini diprakarsai oleh <strong>Departemen Kelautan, Fakultas Perikanan dan Ilmu Kelautan Universitas Padjadjaran</strong> dalam rangka pengabdian kepada masyarakat. Tujuan utamanya adalah merehabilitasi ekosistem terumbu karang yang rusak akibat aktivitas manusia dengan metode <em>transplantasi karang</em>.
    </p>

    <div class="mb-6 rounded-md bg-gradient-to-r from-blue-500 to-sky-400 px-4 py-3 shadow-md">
      <h2 class="text-white text-2xl font-bold tracking-wide">🧱 Metode dan Media</h2>
    </div>
    <p class="text-lg leading-relaxed text-justify mb-8">
      Karang ditanam pada media buatan berbentuk <strong>kubah heksagon dari besi</strong> yang telah dilapisi pasir, disebut <strong>RaKsagon</strong>. Rangka-rangka ini disusun membentuk tulisan “UNPAD” di dasar laut.
    </p>

    <div class="mb-6 rounded-md bg-gradient-to-r from-indigo-500 to-purple-400 px-4 py-3 shadow-md">
      <h2 class="text-white text-2xl font-bold tracking-wide">📍 Lokasi dan Proses</h2>
    </div>
    <p class="text-lg leading-relaxed text-justify mb-6">
      Lokasi kegiatan adalah di <strong>Pantai Barat Pananjung, Kabupaten Pangandaran, Jawa Barat</strong>. Pemasangan dilakukan sebelum April 2017 di kedalaman 6–10 meter menggunakan alat selam SCUBA.
    </p>
    <p class="text-lg mb-4">
      🌐 Koordinat: <code>7°42'19.1” LS, 108°39'07.5” BT</code>
    </p>
    <div class="mb-4">
      <iframe src="https://www.google.com/maps?q=-7.7053,108.6521&hl=id&z=12&output=embed" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-md shadow-md transition-transform hover:scale-[1.01]"></iframe>
    </div>
    <div class="mb-8 text-right">
      <a href="https://www.google.com/maps?q=-7.7053,108.6521" target="_blank" class="inline-block bg-blue-500 text-white px-5 py-2 rounded-full shadow hover:bg-blue-600 transition">📍 Lihat Lokasi di Google Maps</a>
    </div>

    <div class="mb-6 rounded-md bg-gradient-to-r from-green-500 to-emerald-400 px-4 py-3 shadow-md">
      <h2 class="text-white text-2xl font-bold tracking-wide">🌱 Dampak dan Manfaat</h2>
    </div>
    <p class="text-lg leading-relaxed text-justify mb-6">
      Proyek ini meningkatkan peluang regenerasi alami terumbu karang, khususnya karang bercabang yang tumbuh 5-9 cm per tahun. Selain sebagai model restorasi laut yang dapat direplikasi, kegiatan ini juga mendukung <em>wisata bahari</em> dan kesadaran masyarakat dalam menjaga sumber daya laut.
    </p>

    <div class="mb-6 rounded-md bg-gradient-to-r from-pink-500 to-red-400 px-4 py-3 shadow-md">
      <h2 class="text-white text-2xl font-bold tracking-wide">📚 Sumber Jurnal</h2>
    </div>
    <p class="text-lg leading-relaxed text-justify">
      Baca selengkapnya:
      <a href="https://jurnal.unpad.ac.id/pkm/article/download/16290/7946" target="_blank" class="text-blue-600 hover:underline hover:text-blue-800 transition">
        PENANAMAN TERUMBU KARANG DENGAN METODE TRANSPLANTASI RANGKA KUBAH DI PANGANDARAN
      </a>
    </p>

  </div>
</main>

  <!-- Footer -->
  <footer class="text-center py-6 bg-gray-200 mt-10">
    <p>&copy; 2025 AquascapeReef. Create by SAKARA - Samudera Karang</p>
  </footer>

</body>
</html>
