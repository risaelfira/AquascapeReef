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

<!-- Section: Hope Reef -->
<section class="pt-28 pb-20 px-4 max-w-5xl mx-auto">
  <div class="bg-white p-6 md:p-10 shadow-2xl rounded-xl border border-blue-100 animate-fadeIn">
    <div class="mb-6 rounded-md bg-gradient-to-r from-yellow-500 to-orange-400 px-4 py-3 shadow-md">
      <h2 class="text-white text-2xl font-bold tracking-wide">🔬 Survei Ilmiah di Hope Reef</h2>
    </div>
    <p class="text-lg leading-relaxed text-justify mb-6">
      Pada <strong>Mei 2023</strong>, <strong>Mars</strong> mengundang tim ilmuwan independen, mahasiswa, dan peneliti dari Indonesia dan Inggris untuk melakukan <strong>survei dan pengumpulan data</strong> di <strong>Hope Reef</strong>, Salisi' Besar, Sulawesi Selatan. Mereka menggunakan <em>fotogrammetri</em> untuk membuat model 3D habitat, <em>video & akustik</em> untuk komunitas ikan, serta metode <em>ReefBudget</em> untuk mengukur pertumbuhan karang.
    </p>
    <p class="text-lg leading-relaxed text-justify mb-6">
      Studi ini juga mencakup <strong>analisis genetika</strong> dan <strong>penilaian estetika dan pariwisata</strong> terumbu, serta mengevaluasi efektivitas struktur <em>Reef Stars</em> dalam mendukung keragaman dan kompleksitas habitat laut.
    </p>
    <div class="mb-6 rounded-md bg-gradient-to-r from-emerald-500 to-green-400 px-4 py-3 shadow-md">
      <h2 class="text-white text-2xl font-bold tracking-wide">🎯 Tujuan Survei</h2>
    </div>
    <ul class="list-disc pl-6 text-lg mb-6">
      <li>Memahami struktur 3D terumbu untuk habitat & reduksi gelombang</li>
      <li>Evaluasi kondisi biologis, estetika, dan potensi wisata</li>
      <li>Pengumpulan data kuantitatif untuk keberlanjutan ekologi & sosial</li>
      <li>Penilaian keragaman genetika untuk reef yang tahan penyakit</li>
    </ul>
    <div class="mb-6 rounded-md bg-gradient-to-r from-blue-500 to-indigo-500 px-4 py-3 shadow-md">
      <h2 class="text-white text-2xl font-bold tracking-wide">🌍 Lokasi Penelitian</h2>
    </div>
    <p class="text-lg leading-relaxed text-justify mb-6">
      Kegiatan ini dilaksanakan di <strong>Hope Reef</strong>, perairan <strong>Salisi’ Besar, Sulawesi Selatan</strong>, bagian dari program restorasi <strong>"Sheba Hope Grows"</strong> oleh Mars. Lokasi ini dipilih karena memiliki potensi besar dalam restorasi dan konservasi laut tropis.
    </p>
    <div class="mb-6 rounded-md bg-gradient-to-r from-pink-500 to-red-400 px-4 py-3 shadow-md">
      <h2 class="text-white text-2xl font-bold tracking-wide">📈 Dampak terhadap Restorasi</h2>
    </div>
    <ul class="list-disc pl-6 text-lg mb-6">
      <li>Meningkatkan pemahaman efektivitas <em>Reef Stars</em></li>
      <li>Optimasi desain restorasi untuk toleransi panas & penyakit</li>
      <li>Mendukung restorasi estetis & pariwisata berbasis data</li>
      <li>Memperkuat kolaborasi ilmiah dan perluasan ke lokasi lain</li>
    </ul>
  </div>
</section>

  <!-- Footer -->
  <footer class="text-center py-6 bg-gray-200 mt-10">
    <p>&copy; 2025 AquascapeReef. Create by SAKARA - Samudera Karang</p>
  </footer>

</body>
</html>
