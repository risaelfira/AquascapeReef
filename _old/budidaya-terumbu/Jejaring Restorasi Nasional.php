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

<!-- Section: Restorasi Terumbu Nasional -->
<section class="pt-28 pb-20 px-4 max-w-5xl mx-auto">
  <div class="bg-white p-6 md:p-10 shadow-2xl rounded-xl border border-blue-100 animate-fadeIn">
    <div class="mb-6 rounded-md bg-gradient-to-r from-orange-600 to-yellow-400 px-4 py-3 shadow-md">
      <h2 class="text-white text-2xl font-bold tracking-wide">🇮🇩 Restorasi Terumbu Karang di Indonesia</h2>
    </div>
    <p class="text-lg leading-relaxed text-justify mb-6">
      Indonesia telah menjadi <strong>negara dengan jumlah proyek restorasi terumbu karang terbanyak di dunia</strong>, dengan lebih dari <strong>500 proyek</strong> yang telah dilaksanakan oleh berbagai pemangku kepentingan—pemerintah, LSM, sektor swasta, hingga komunitas lokal. Kegiatan ini dilakukan menggunakan beragam metode, seperti transplantasi fragmen ke struktur buatan seperti <em>Reef Stars</em> dan <em>rak beton</em>, teknik <strong>Biorock</strong>, serta penggabungan dengan <strong>ekowisata</strong>. Inovasi substrat, teknologi monitoring, dan pelibatan masyarakat turut menjadi kekuatan utama.
    </p>

    <div class="mb-6 rounded-md bg-gradient-to-r from-sky-600 to-cyan-400 px-4 py-3 shadow-md">
      <h2 class="text-white text-2xl font-bold tracking-wide">📅 Rentang Waktu Kegiatan</h2>
    </div>
    <p class="text-lg leading-relaxed text-justify mb-6">
      Proyek restorasi ini telah berlangsung sejak <strong>awal 2000-an</strong>, namun mengalami peningkatan tajam sejak <strong>2015 hingga 2023</strong>. Puncaknya terjadi selama pelaksanaan program <strong>Indonesia Coral Reef Garden</strong> pada <strong>2020–2021</strong> sebagai bagian dari upaya pemulihan pasca-pandemi COVID-19. Sekitar setengah dari seluruh struktur buatan yang pernah dipasang di Indonesia berasal dari periode ini.
    </p>

    <div class="mb-6 rounded-md bg-gradient-to-r from-green-600 to-teal-400 px-4 py-3 shadow-md">
      <h2 class="text-white text-2xl font-bold tracking-wide">🎯 Tujuan Restorasi</h2>
    </div>
    <ul class="list-disc pl-6 text-lg mb-6">
      <li>Memulihkan ekosistem terumbu yang rusak</li>
      <li>Menambah keanekaragaman hayati laut</li>
      <li>Memberdayakan masyarakat pesisir melalui ekonomi biru</li>
      <li>Mengurangi dampak perubahan iklim</li>
      <li>Memperbaiki habitat ikan dan invertebrata</li>
      <li>Mendukung pariwisata dan penelitian konservasi</li>
    </ul>

    <div class="mb-6 rounded-md bg-gradient-to-r from-purple-600 to-indigo-500 px-4 py-3 shadow-md">
      <h2 class="text-white text-2xl font-bold tracking-wide">📍 Lokasi Kegiatan</h2>
    </div>
    <p class="text-lg leading-relaxed text-justify mb-6">
      Proyek dilakukan di seluruh wilayah pesisir Indonesia, dengan konsentrasi tinggi di <strong>Sulawesi Selatan</strong>, <strong>Bali</strong>, <strong>Nusa Tenggara Timur</strong>, dan <strong>Maluku</strong>. Wilayah-wilayah ini dipilih berdasarkan tingkat kerentanan ekosistem terumbu dan kesiapan sosial masyarakat untuk terlibat aktif.
    </p>

    <div class="mb-6 rounded-md bg-gradient-to-r from-pink-600 to-red-400 px-4 py-3 shadow-md">
      <h2 class="text-white text-2xl font-bold tracking-wide">📈 Dampak dan Tantangan</h2>
    </div>
    <ul class="list-disc pl-6 text-lg mb-6">
      <li>Jutaan fragmen karang telah ditanam di seluruh nusantara</li>
      <li>Peningkatan luas area terumbu dan habitat laut</li>
      <li>Kesadaran masyarakat meningkat terhadap konservasi laut</li>
      <li>Indonesia menjadi contoh global restorasi berskala besar</li>
      <li>Perlu peningkatan kualitas monitoring dan kolaborasi lintas lembaga</li>
    </ul>
    <p class="text-lg leading-relaxed text-justify">
      Informasi ini berdasarkan sumber jurnal berikut:
      <a href="https://www.researchgate.net/publication/381803122_Coral_reef_restoration_in_Indonesia_lessons_learnt_from_the_world's_largest_coral_restoration_nation/link/66912d53c1cf0d77ffd2655d/download?_tp=eyJjb250ZXh0Ijp7ImZpcnN0UGFnZSI6InB1YmxpY2F0aW9uIiwicGFnZSI6InB1YmxpY2F0aW9uIn19" target="_blank" class="text-blue-600 hover:underline">
        Coral Reef Restoration in Indonesia (ResearchGate)
      </a>.
    </p>
  </div>
</section>

  <!-- Footer -->
  <footer class="text-center py-6 bg-gray-200 mt-10">
    <p>&copy; 2025 AquascapeReef. Create by SAKARA - Samudera Karang</p>
  </footer>

</body>
</html>
