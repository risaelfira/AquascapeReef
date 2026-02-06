<?php
// Memulai sesi PHP jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Isopora togianensis - Karang Endemik Togean</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Lora:wght@400;700&display=swap" rel="stylesheet">
  <style>
    /* Custom CSS untuk Tema Isopora */
    body {
      font-family: 'Montserrat', sans-serif;
    }
    .hero-title {
      font-family: 'Lora', serif;
    }
    .bubble {
      position: absolute;
      bottom: -100px;
      width: 60px;
      height: 60px;
      background-color: rgba(255, 255, 255, 0.5);
      border-radius: 50%;
      animation: bubble-ascend 10s infinite ease-in;
      opacity: 0;
    }
    .fish {
      position: absolute;
      animation: swim 15s infinite linear;
      width: 120px; /* Sesuaikan ukuran ikan */
      transform: scaleX(-1); /* Agar ikan menghadap ke kiri saat berenang dari kanan */
    }
    @keyframes bubble-ascend {
      0% {
        transform: translateY(0);
        opacity: 0;
      }
      50% {
        opacity: 1;
      }
      100% {
        transform: translateY(-500px);
        opacity: 0;
      }
    }
    @keyframes swim {
      0% {
        left: -100px;
        transform: scaleX(1);
      }
      49% {
        transform: scaleX(1);
      }
      50% {
        left: calc(100% + 100px);
        transform: scaleX(-1); /* Balik arah saat mencapai ujung kanan */
      }
      99% {
        transform: scaleX(-1);
      }
      100% {
        left: -100px;
        transform: scaleX(1); /* Balik arah saat mencapai ujung kiri */
      }
    }
    .wave-bottom {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 50px;
      background: linear-gradient(to top, rgba(255,255,255,0.8), transparent);
      border-radius: 50% 50% 0 0 / 100% 100% 0 0;
      transform: translateY(50%);
    }
    .bg-panel-light {
        background-color: #f8ffff; /* bg-teal-50 */
    }
  </style>
  <script>
    // Fungsi untuk menggulir ke bagian tertentu di halaman
    function scrollToSection(id) {
      document.getElementById(id)?.scrollIntoView({ behavior: 'smooth' });
    }
    // Fungsi untuk mengaktifkan/menonaktifkan menu dropdown
    function toggleDropdownMenu() {
      const menu = document.getElementById("terumbuDropdown");
      menu.classList.toggle("hidden");
    }
    // Menutup dropdown jika mengklik di luar area dropdown atau trigger
    document.addEventListener("click", function (event) {
      const menu = document.getElementById("terumbuDropdown");
      const trigger = document.getElementById("terumbuTrigger");
      if (!menu.contains(event.target) && !trigger.contains(event.target)) {
        menu.classList.add("hidden");
      }
    });
  </script>
</head>

<body class="bg-gradient-to-b from-blue-100 via-emerald-50 to-white text-gray-800">

  <!-- Navbar - Ditambahkan persis seperti Acropora dan Euphyllia -->
  <nav class="bg-white shadow-md fixed w-full top-0 z-30">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
      <a href="index.php" class="text-xl font-bold text-blue-600 hover:text-blue-800 transition">CoralInteraction</a>
      <div class="space-x-4 hidden md:flex">
        <button onclick="scrollToSection('about')" class="hover:text-blue-500 transition">About</button>
        <div class="relative">
          <button id="terumbuTrigger" onclick="toggleDropdownMenu()" class="hover:text-blue-500 transition">Terumbu Karang</button>
          <div id="terumbuDropdown" class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg hidden z-50">
            <a href="terumbu_karang.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Tentang Terumbu Karang</a>
            <a href="jenis_terumbu.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Jenis Terumbu Karang</a>
          </div>
        </div>
        <button onclick="scrollToSection('user')" class="hover:text-blue-500 transition">User</button>
        <button onclick="scrollToSection('contact')" class="hover:text-blue-500 transition">Login</button>
      </div>
    </div>
  </nav>
  <!-- Div untuk memberikan padding agar konten tidak tertutup navbar fixed -->
  <div class="h-24"></div>

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
      <p class="text-lg mb-8">
        🌐 Koordinat: <code>0.3000° S, 121.8000° E</code> (Koordinat umum Kepulauan Togean)<br>
        🔗 <a href="https://www.google.com/maps?q=0.3199,121.7107" target="_blank" class="text-teal-600 underline">Lihat di Google Maps</a>
      </p>

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

  <footer class="text-center py-6 mt-16 bg-gradient-to-r from-blue-700 to-teal-800 text-white font-medium">
    <p>© 2025 - Website oleh Alfathurrahman | Warisan Terumbu Karang Indonesia</p>
  </footer>

</body>
</html>
