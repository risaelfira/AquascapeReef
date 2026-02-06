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

<body class="bg-gradient-to-b from-blue-100 via-emerald-50 to-white text-gray-800">

  <div class="absolute top-0 left-0 w-full h-full -z-10 overflow-hidden">
    <div class="bubble" style="left: 20%; animation-delay: 0s;"></div>
    <div class="bubble" style="left: 40%; animation-delay: 3s;"></div>
    <div class="bubble" style="left: 60%; animation-delay: 6s;"></div>
    <div class="bubble" style="left: 80%; animation-delay: 1s;"></div>
    <img src="https://i.ibb.co/YNjFkx3/fish.png" alt="fish" class="fish" style="top: 30%; left: -80px;" />
  </div>

  <!-- Header - Background image diubah ke isopora.jpg -->
  <header class="relative w-full h-[420px] bg-cover bg-center text-white flex items-center justify-center"
          style="background-image: url('isopora.jpg'); background-position: center; background-size: cover;">
    <div class="absolute inset-0 bg-cyan-900/60"></div>
    <div class="relative z-10 text-center px-4">
      <h1 class="text-4xl md:text-5xl font-bold drop-shadow-lg hero-title">Isopora togianensis</h1>
      <p class="mt-4 text-lg italic drop-shadow-sm">Permata Langka dari Perairan Indah Kepulauan Togean</p>
    </div>
    <div class="wave-bottom"></div>
  </header>

  <main class="pt-12 pb-20 px-4 max-w-5xl mx-auto">
    <div class="bg-panel-light p-6 md:p-10 shadow-2xl rounded-xl border border-cyan-200">

      <div class="mb-6 rounded-md bg-gradient-to-r from-teal-600 to-cyan-500 px-4 py-3 shadow-md">
        <h2 class="text-white text-2xl font-bold tracking-wide">🪸 Deskripsi Karang</h2>
      </div>
      <p class="text-lg leading-relaxed text-justify mb-8">
        <strong>Isopora togianensis</strong> adalah spesies karang batu (Scleractinia) yang memiliki keunikan luar biasa karena statusnya sebagai <strong>endemik Kepulauan Togean, Sulawesi Tengah, Indonesia</strong>. Karang ini ditandai oleh bentuk percabangan yang khas, seringkali membentuk koloni padat dengan cabang-cabang yang ramping atau agak pipih, yang tumbuh mengarah ke atas atau menyebar. Warna karang ini dapat bervariasi, seringkali didominasi oleh nuansa cokelat muda, krem, atau bahkan kehijauan, yang berpadu sempurna dengan lingkungan terumbu karang di sekitarnya. Morfologi cabangnya dirancang untuk efisien dalam menangkap cahaya matahari dan arus air, mendukung zooxanthellae (alga simbion) yang hidup di dalamnya dan menyediakan sebagian besar energinya.
        <br><br>
        Sebagai bagian penting dari genus <i>Isopora</i>, karang ini memainkan peran krusial dalam <strong>strukturisasi terumbu karang</strong> di Kepulauan Togean. Koloni <i>Isopora togianensis</i> menyediakan <strong>habitat kompleks dan tempat berlindung</strong> bagi beragam spesies ikan, invertebrata, dan organisme laut lainnya, menjadikannya salah satu fondasi bagi keanekaragaman hayati yang tinggi di wilayah tersebut. Keberadaan spesies endemik seperti <i>Isopora togianensis</i> juga memiliki nilai ilmiah yang sangat tinggi, memungkinkan para peneliti untuk mempelajari evolusi dan adaptasi spesies dalam lingkungan geografis yang terisolasi. Keunikan genetiknya menambah kekayaan warisan alam Indonesia dan menjadikan perlindungannya sangat vital bagi ekosistem global.
      </p>

      <div class="mb-6 rounded-md bg-gradient-to-r from-orange-600 to-amber-500 px-4 py-3 shadow-md">
        <h2 class="text-white text-2xl font-bold tracking-wide">⚠️ Ancaman yang Dihadapi</h2>
      </div>
      <div class="text-lg leading-relaxed text-justify space-y-6 mb-8">
        <div>
          <strong>1. Perubahan Iklim Global:</strong> Peningkatan suhu laut adalah ancaman utama yang menyebabkan pemutihan karang (coral bleaching), di mana alga simbion yang memberikan warna dan nutrisi karang dikeluarkan. Fenomena ini, jika berkepanjangan, dapat menyebabkan kematian massal koloni karang. Pengasaman laut juga mengurangi kemampuan karang untuk membangun kerangka kalsium karbonatnya.
        </div>
        <div>
          <strong>2. Polusi Lokal dan Regional:</strong> Limbah domestik, pertanian, dan industri yang masuk ke perairan dapat menyebabkan eutrofikasi (peningkatan nutrisi berlebihan) dan pertumbuhan alga berlebih yang menutupi karang. Mikroplastik juga menjadi ancaman karena dapat tertelan oleh karang dan menyebabkan stres fisiologis.
        </div>
        <div>
          <strong>3. Metode Penangkapan Ikan yang Destruktif:</strong> Meskipun ada upaya konservasi, praktik penangkapan ikan ilegal seperti penggunaan bom, sianida, dan pukat harimau masih menjadi ancaman serius. Metode ini secara langsung menghancurkan struktur karang dan membunuh biota laut secara masif.
        </div>
        <div>
          <strong>4. Pariwisata dan Aktivitas Pesisir yang Tidak Berkelanjutan:</strong> Peningkatan aktivitas pariwisata yang tidak dikelola dengan baik, seperti jangkar kapal yang merusak karang, sentuhan wisatawan, dan pembangunan fasilitas di pesisir, dapat memberikan tekanan signifikan pada ekosistem terumbu karang yang rapuh.
        </div>
        <div>
          <strong>5. Kurangnya Kesadaran dan Penegakan Hukum:</strong> Meskipun Togean adalah taman nasional, kurangnya sumber daya untuk pemantauan dan penegakan hukum yang efektif masih menjadi tantangan dalam melindungi karang endemik dari ancaman antropogenik.
        </div>
      </div>

      <div class="mb-6 rounded-md bg-gradient-to-r from-sky-600 to-blue-500 px-4 py-3 shadow-md">
        <h2 class="text-white text-2xl font-bold tracking-wide">📍 Lokasi Penyebaran</h2>
      </div>
      <p class="text-lg leading-relaxed text-justify mb-6">
        <strong>Isopora togianensis</strong> adalah spesies karang yang sangat istimewa karena merupakan <strong>endemik</strong>, yang berarti hanya ditemukan di satu lokasi geografis di dunia, yaitu di perairan <strong>Kepulauan Togean, Sulawesi Tengah, Indonesia</strong>. Kepulauan ini terletak di "Segitiga Terumbu Karang" yang terkenal dengan keanekaragaman hayatinya yang luar biasa. Habitat karang ini meliputi berbagai kedalaman di perairan jernih, mulai dari lereng terumbu yang dangkal hingga area yang lebih dalam, di mana kondisi lingkungan mendukung pertumbuhannya yang unik. Keberadaan spesifik di Togean menjadikannya simbol kekayaan alam maritim Indonesia.
      </p>
      <p class="text-lg mb-4">
        🌐 Koordinat: <code>–0.5522° LS, 121.8583° BT</code>
      </p>
      <div class="mb-8">
        <iframe 
          src="https://www.google.com/maps?q=-0.5522,121.8583&hl=id&z=12&output=embed" 
          width="100%" 
          height="400" 
          style="border:0;" 
          allowfullscreen="" 
          loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade"
          class="rounded-md shadow-md">
          </iframe>
      </div>

      <div class="mb-6 rounded-md bg-gradient-to-r from-lime-600 to-green-500 px-4 py-3 shadow-md">
        <h2 class="text-white text-2xl font-bold tracking-wide">🌱 Pentingnya Pelestarian</h2>
      </div>
      <p class="text-lg leading-relaxed text-justify">
        Pelestarian <strong>Isopora togianensis</strong> adalah prioritas utama karena statusnya sebagai spesies endemik yang rapuh. Keberadaannya adalah bukti kekayaan biodiversitas dan keunikan ekosistem laut Togean. Melindungi karang ini berarti menjaga seluruh jaring-jaring kehidupan laut yang bergantung padanya, dari ikan-ikan kecil hingga predator puncak. Karang ini berfungsi sebagai <strong>"kota bawah laut"</strong> yang menyediakan makanan, tempat berlindung, dan area pemijahan bagi berbagai spesies laut, yang pada gilirannya mendukung perikanan lokal dan ketahanan pangan masyarakat pesisir.
        <br><br>
        Selain itu, terumbu karang di Togean, yang menjadi rumah bagi <i>Isopora togianensis</i>, adalah daya tarik utama <strong>ekowisata bahari</strong>. Kegiatan seperti snorkeling dan menyelam tidak hanya mendatangkan pendapatan bagi masyarakat lokal tetapi juga meningkatkan kesadaran global akan pentingnya konservasi laut. Secara ekologis, terumbu karang juga bertindak sebagai <strong>pelindung alami garis pantai</strong> dari erosi dan dampak gelombang besar, menjaga komunitas pesisir dari bencana alam. Oleh karena itu, investasi dalam konservasi <i>Isopora togianensis</i> adalah investasi untuk masa depan ekologi, ekonomi, dan sosial wilayah Togean dan Indonesia.
      </p>
    </div>
  </main>

  <!-- Footer -->
  <footer class="text-center py-6 bg-gray-200 mt-10">
    <p>&copy; 2025 CoralInteraction. Create by SAKARA - Samudera Karang</p>
  </footer>

</body>
</html>
