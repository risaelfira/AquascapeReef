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

<body class="bg-gradient-to-b from-blue-200 via-indigo-100 to-white text-gray-800">

  <!-- Efek Laut -->
  <div class="absolute top-0 left-0 w-full h-full -z-10 overflow-hidden">
    <div class="bubble" style="left: 20%; animation-delay: 0s;"></div>
    <div class="bubble" style="left: 40%; animation-delay: 3s;"></div>
    <div class="bubble" style="left: 60%; animation-delay: 6s;"></div>
    <div class="bubble" style="left: 80%; animation-delay: 1s;"></div>
    <img src="https://i.ibb.co/YNjFkx3/fish.png" alt="fish" class="fish" style="top: 30%; left: -80px;" />
  </div>

  <!-- Header -->
  <header class="relative w-full h-[420px] bg-cover bg-center text-white flex items-center justify-center"
          style="background-image: url('euphyllia.jpg'); background-position: center; background-size: cover;">
    <div class="absolute inset-0 bg-black/40"></div>
    <div class="relative z-10 text-center px-4">
      <h1 class="text-4xl md:text-5xl font-bold drop-shadow-lg">Euphyllia baliensis</h1>
      <p class="mt-4 text-lg italic drop-shadow-sm">Keajaiban Polip Berkilau dari Perairan Bali</p>
    </div>
    <div class="wave-bottom"></div>
  </header>

  <!-- Main -->
  <main class="pt-12 pb-20 px-4 max-w-5xl mx-auto">
    <div class="bg-white p-6 md:p-10 shadow-2xl rounded-xl border border-blue-100">

      <!-- Deskripsi Karang -->
      <div class="mb-6 rounded-md bg-gradient-to-r from-blue-500 to-indigo-400 px-4 py-3 shadow-md">
        <h2 class="text-white text-2xl font-bold tracking-wide">🧨 Deskripsi Karang</h2>
      </div>
      <p class="text-lg leading-relaxed text-justify mb-8">
        <strong>Euphyllia baliensis</strong> adalah spesies karang batu (Scleractinia) yang sangat dicari dalam dunia akuarium bahari dan dikenal karena polipnya yang besar, berdaging, dan seringkali memiliki ujung berwarna-warni yang berpendar. Karang ini termasuk dalam famili Euphylliidae, yang terkenal dengan spesies karang hiasnya seperti Torch Coral, Hammer Coral, dan Frogspawn Coral. Polip 'Euphyllia baliensis' menampilkan gerakan yang anggun di dalam air, menjadikannya pemandangan yang memukau bagi penyelam dan penggemar akuatik. Bentuk koloninya bisa bervariasi, dari percabangan hingga masif, disesuaikan dengan lingkungan tempat tumbuhnya. Warna polipnya sangat beragam, mulai dari hijau neon, biru keunguan, hingga cokelat keemasan, seringkali dengan sentuhan warna kontras pada ujungnya.
        <br><br>
        'Euphyllia baliensis' memiliki kerangka kalsium karbonat yang kuat dan berkontribusi pada struktur terumbu karang. Sebagai karang fotosintetik, mereka bersimbiosis dengan alga zooxanthellae, yang menyediakan sebagian besar energi melalui fotosintesis. Karang ini juga memiliki kemampuan untuk menangkap partikel makanan kecil dari kolom air dengan tentakelnya yang bersenjata. Keberadaan spesies 'Euphyllia' di terumbu karang menandakan ekosistem yang relatif sehat dan stabil, karena mereka cenderung sensitif terhadap perubahan kualitas air dan kondisi lingkungan. Keindahan dan keunikan 'Euphyllia baliensis' menjadikannya simbol kekayaan biodiversitas terumbu karang di perairan Indonesia, khususnya Bali yang terkenal dengan keindahan bawah lautnya.
      </p>

      <!-- Ancaman yang Dihadapi -->
      <div class="mb-6 rounded-md bg-gradient-to-r from-orange-500 to-red-400 px-4 py-3 shadow-md">
        <h2 class="text-white text-2xl font-bold tracking-wide">⚠️ Ancaman yang Dihadapi</h2>
      </div>
      <div class="text-lg leading-relaxed text-justify space-y-6 mb-8">
        <div>
          <strong>1. Perubahan Iklim Global:</strong> Peningkatan suhu laut menyebabkan pemutihan karang, terutama pada spesies yang sensitif seperti 'Euphyllia'. Pengasaman laut juga mengikis kerangka karang, membuatnya lebih rapuh.
        </div>
        <div>
          <strong>2. Perdagangan Karang Hias Ilegal dan Tidak Berkelanjutan:</strong> Karena permintaan tinggi dari industri akuarium, 'Euphyllia baliensis' menjadi target penangkapan. Praktik penangkapan yang tidak diatur dapat menguras populasi liar dan merusak habitatnya.
        </div>
        <div>
          <strong>3. Kerusakan Fisik Akibat Aktivitas Manusia:</strong> Penempatan jangkar yang sembarangan, sentuhan penyelam atau perenang yang tidak hati-hati, dan praktik penangkapan ikan yang merusak (misalnya bom atau pukat) dapat menyebabkan kerusakan fisik langsung pada koloni karang.
        </div>
        <div>
          <strong>4. Polusi dan Sedimentasi:</strong> Efluen dari pemukiman, pertanian, dan pariwisata yang tidak terkelola dengan baik dapat mencemari perairan, menyebabkan pertumbuhan alga berlebih, penyakit karang, dan mengurangi kualitas air yang dibutuhkan untuk kelangsungan hidup 'Euphyllia'.
        </div>
        <div>
          <strong>5. Wabah Penyakit Karang:</strong> Karang, seperti organisme hidup lainnya, rentan terhadap wabah penyakit. Stres lingkungan akibat perubahan iklim dan polusi dapat membuat mereka lebih rentan terhadap infeksi bakteri atau virus yang mematikan.
        </div>
      </div>

      <!-- Lokasi Penyebaran -->
      <div class="mb-6 rounded-md bg-gradient-to-r from-teal-500 to-green-400 px-4 py-3 shadow-md">
        <h2 class="text-white text-2xl font-bold tracking-wide">📍 Lokasi Penyebaran</h2>
      </div>
      <p class="text-lg leading-relaxed text-justify mb-6">
        Nama <strong>Euphyllia baliensis</strong> menunjukkan bahwa spesies ini pertama kali dideskripsikan dari perairan Bali, Indonesia. Bali, dengan keindahan bawah lautnya yang terkenal, menjadi rumah bagi keanekaragaman hayati laut yang luar biasa. Karang ini umumnya ditemukan di terumbu karang yang terlindung, seringkali di lereng terumbu atau area dengan arus sedang, pada kedalaman yang bervariasi. Meskipun penemuan utamanya di Bali, spesies serupa atau kerabat dekatnya dapat ditemukan di wilayah Indo-Pasifik yang lebih luas. Lokasi spesifik di Bali menjadikan karang ini ikon penting bagi upaya konservasi laut di pulau dewata.
      </p>
      <p class="text-lg mb-4">
        🌐 Koordinat: <code>-8.5167° S, 115.5667° E</code>
      </p>
      <div class="mb-8">
        <iframe 
          src="https://www.google.com/maps?q=-8.5167,115.5667&hl=id&z=14&output=embed" 
          width="100%" 
          height="400" 
          style="border:0;" 
          allowfullscreen="" 
          loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade"
          class="rounded-md shadow-md">
          </iframe>
      </div>


      <!-- Pentingnya Pelestarian -->
      <div class="mb-6 rounded-md bg-gradient-to-r from-pink-500 to-purple-400 px-4 py-3 shadow-md">
        <h2 class="text-white text-2xl font-bold tracking-wide">🌱 Pentingnya Pelestarian</h2>
      </div>
      <p class="text-lg leading-relaxed text-justify">
        Pelestarian <strong>Euphyllia baliensis</strong> sangat vital, tidak hanya karena nilai estetikanya yang tinggi tetapi juga karena perannya dalam menjaga ekosistem terumbu karang yang sehat dan seimbang. Sebagai spesies karang batu, 'Euphyllia baliensis' berkontribusi pada struktur fisik terumbu, menyediakan habitat kompleks dan tempat berlindung bagi ribuan spesies laut lainnya, termasuk ikan, krustasea, dan moluska. Keberadaan karang ini mendukung jaring-jaring makanan laut dan merupakan indikator penting kesehatan laut.
        <br><br>
        Secara ekonomi, terumbu karang di Bali adalah aset pariwisata bahari yang tak ternilai. 'Euphyllia baliensis' dan spesies karang lainnya menarik penyelam dan wisatawan, yang mendukung mata pencarian masyarakat lokal melalui industri pariwisata dan perikanan berkelanjutan. Perlindungan terhadap karang ini berarti menjaga sumber pendapatan dan kesejahteraan bagi banyak orang.
        <br><br>
        Selain itu, karang adalah pelindung alami garis pantai, mengurangi dampak gelombang dan abrasi. Dari sudut pandang ilmiah, 'Euphyllia baliensis' dapat menjadi subjek penelitian penting mengenai adaptasi karang terhadap perubahan lingkungan dan potensi biofarmasi. Oleh karena itu, upaya konservasi yang efektif, termasuk pengelolaan pariwisata yang berkelanjutan, penegakan hukum terhadap penangkapan ilegal, dan mitigasi perubahan iklim, sangat diperlukan untuk memastikan kelangsungan hidup spesies karang yang indah ini dan ekosistem terumbu karang Bali untuk generasi mendatang.
      </p>
    </div>
  </main>

  <!-- Footer -->
  <footer class="text-center py-6 bg-gray-200 mt-10">
    <p>&copy; 2025 CoralInteraction. Create by SAKARA - Samudera Karang</p>
  </footer>

</body>
</html>
