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
  <header class="relative w-full h-[420px] bg-cover bg-center text-white flex items-center justify-center"
          style="background-image: url('karang.jpg');">
    <div class="absolute inset-0 bg-teal-900/60"></div>
    <div class="relative z-10 text-center px-4">
      <h1 class="text-4xl md:text-5xl font-bold drop-shadow-lg">Acropora suharsonoi</h1>
      <p class="mt-4 text-lg italic drop-shadow-sm">Permata laut langka dari Raja Ampat</p>
    </div>
  </header>

  <!-- Main -->
  <main class="pt-12 pb-20 px-4 max-w-5xl mx-auto">
    <div class="bg-white p-6 md:p-10 shadow-2xl rounded-xl border border-blue-100">

      <!-- Deskripsi Karang -->
      <div class="mb-6 rounded-md bg-gradient-to-r from-teal-500 to-cyan-400 px-4 py-3 shadow-md">
        <h2 class="text-white text-2xl font-bold tracking-wide">🪸 Deskripsi Karang</h2>
      </div>
      <p class="text-lg leading-relaxed text-justify mb-8">
        <strong>Acropora suharsonoi</strong> adalah spesies karang bercabang langka yang hanya ditemukan di wilayah tropis seperti Raja Ampat, Papua Barat...
      </p>

      <!-- Ancaman -->
      <div class="mb-6 rounded-md bg-gradient-to-r from-rose-500 to-pink-400 px-4 py-3 shadow-md">
        <h2 class="text-white text-2xl font-bold tracking-wide">⚠️ Ancaman yang Dihadapi</h2>
      </div>
      <p class="text-lg leading-relaxed text-justify mb-8">
        Ancaman terhadap Acropora suharsonoi meliputi pemutihan karang, polusi laut, penangkapan ikan destruktif, pembangunan pesisir, dan minimnya upaya konservasi...
      </p>

      <!-- Lokasi -->
      <div class="mb-6 rounded-md bg-gradient-to-r from-indigo-500 to-sky-400 px-4 py-3 shadow-md">
        <h2 class="text-white text-2xl font-bold tracking-wide">📍 Lokasi Penyebaran</h2>
      </div>
      <p class="text-lg leading-relaxed text-justify mb-6">
        Karang ini hanya ditemukan di <strong>Raja Ampat, Papua Barat</strong>.
      </p>
      <p class="text-lg mb-4">
        🌐 Koordinat: <code>–5.4730° LS, 130.4670° BT</code>
      </p>
      <div class="mb-8">
        <iframe 
          src="https://www.google.com/maps?q=-5.4730,130.4670&hl=id&z=10&output=embed" 
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
      <p class="text-lg leading-relaxed text-justify">
        Melindungi <strong>Acropora suharsonoi</strong> berarti menjaga sistem kehidupan laut tropis yang saling bergantung...
      </p>
    </div>
  </main>

  <!-- Footer -->
  <footer class="text-center py-6 bg-gray-200 mt-10">
    <p>&copy; 2025 AquascapeReef. Create by SAKARA - Samudera Karang</p>
  </footer>

</body>
</html>
