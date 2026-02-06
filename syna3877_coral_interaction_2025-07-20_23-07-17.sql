# ************************************************************
# Antares - SQL Client
# Version 0.7.30
# 
# https://antares-sql.app/
# https://github.com/antares-sql/antares
# 
# Host: localhost (mariadb.org binary distribution 11.4.7)
# Database: syna3877_coral_interaction
# Generation time: 2025-07-20T23:07:26+07:00
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table corals
# ------------------------------------------------------------

DROP TABLE IF EXISTS `corals`;

CREATE TABLE `corals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `desc_small` text DEFAULT NULL,
  `desc_html` text DEFAULT NULL,
  `ancaman_html` text DEFAULT NULL,
  `lokasi_html` text DEFAULT NULL,
  `lokasi_coordinate_txt` varchar(50) DEFAULT NULL,
  `lokasi_iframe_url` varchar(100) DEFAULT NULL,
  `pelestarian_html` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

LOCK TABLES `corals` WRITE;
/*!40000 ALTER TABLE `corals` DISABLE KEYS */;

INSERT INTO `corals` (`id`, `name`, `tagline`, `img`, `link`, `desc_small`, `desc_html`, `ancaman_html`, `lokasi_html`, `lokasi_coordinate_txt`, `lokasi_iframe_url`, `pelestarian_html`) VALUES
	(1, "Acropora suharsonoi", "Permata laut langka dari Raja Ampat", "pemweb/Acropora suharsonoi.web/karang.jpg", "Acropora", "Rare staghorn coral endemic to Indonesia\'s deep reef slopes.::Has long, tapered branches with only axial corallites.::Highly sensitive to bleaching, disease, and predation.::Named after coral expert Suharsono, first described in 1994.", "<strong>Acropora suharsonoi</strong> adalah spesies karang bercabang langka yang hanya ditemukan di wilayah tropis seperti Raja Ampat, Papua Barat...", "Ancaman terhadap Acropora suharsonoi meliputi pemutihan karang, polusi laut, penangkapan ikan destruktif, pembangunan pesisir, dan minimnya upaya konservasi...", "Karang ini hanya ditemukan di <strong>Raja Ampat, Papua Barat</strong>.", "-5.4730° LS, 130.4670° BT", "https://www.google.com/maps?q=-5.4730,130.4670&hl=id&z=10&output=embed", "Melindungi <strong>Acropora suharsonoi</strong> berarti menjaga sistem kehidupan laut tropis yang saling bergantung..."),
	(2, "Euphyllia baliensis", "Keajaiban Karang Polip Besar dari Kedalaman Nusantara", "pemweb/Euphyllia baliensis/euphyllia.jpg", "Euphyllia", "Rare coral found only off eastern Bali, Indonesia.::Has thin branches and tiny 3 mm corallites.::Tentacles shaped like hammers or mittens.::Lives at 27-37 m depth and is considered endemic.", "<strong>Euphyllia baliensis</strong> adalah spesies karang batu (Scleractinia) yang sangat dicari dalam dunia akuarium bahari dan dikenal karena polipnya yang besar, berdaging, dan seringkali memiliki ujung berwarna-warni yang berpendar. Karang ini termasuk dalam famili Euphylliidae, yang terkenal dengan spesies karang hiasnya seperti Torch Coral, Hammer Coral, dan Frogspawn Coral. Polip \'Euphyllia baliensis\' menampilkan gerakan yang anggun di dalam air, menjadikannya pemandangan yang memukau bagi penyelam dan penggemar akuatik. Bentuk koloninya bisa bervariasi, dari percabangan hingga masif, disesuaikan dengan lingkungan tempat tumbuhnya. Warna polipnya sangat beragam, mulai dari hijau neon, biru keunguan, hingga cokelat keemasan, seringkali dengan sentuhan warna kontras pada ujungnya. <br><br> \'Euphyllia baliensis\' memiliki kerangka kalsium karbonat yang kuat dan berkontribusi pada struktur terumbu karang. Sebagai karang fotosintetik, mereka bersimbiosis dengan alga zooxanthellae, yang menyediakan sebagian besar energi melalui fotosintesis. Karang ini juga memiliki kemampuan untuk menangkap partikel makanan kecil dari kolom air dengan tentakelnya yang bersenjata. Keberadaan spesies \'Euphyllia\' di terumbu karang menandakan ekosistem yang relatif sehat dan stabil, karena mereka cenderung sensitif terhadap perubahan kualitas air dan kondisi lingkungan. Keindahan dan keunikan \'Euphyllia baliensis\' menjadikannya simbol kekayaan biodiversitas terumbu karang di perairan Indonesia, khususnya Bali yang terkenal dengan keindahan bawah lautnya.", "<div> <strong>1. Perubahan Iklim Global:</strong> Peningkatan suhu laut menyebabkan pemutihan karang, terutama pada spesies yang sensitif seperti \'Euphyllia\'. Pengasaman laut juga mengikis kerangka karang, membuatnya lebih rapuh. </div> <div> <strong>2. Perdagangan Karang Hias Ilegal dan Tidak Berkelanjutan:</strong> Karena permintaan tinggi dari industri akuarium, \'Euphyllia baliensis\' menjadi target penangkapan. Praktik penangkapan yang tidak diatur dapat menguras populasi liar dan merusak habitatnya. </div> <div> <strong>3. Kerusakan Fisik Akibat Aktivitas Manusia:</strong> Penempatan jangkar yang sembarangan, sentuhan penyelam atau perenang yang tidak hati-hati, dan praktik penangkapan ikan yang merusak (misalnya bom atau pukat) dapat menyebabkan kerusakan fisik langsung pada koloni karang. </div> <div> <strong>4. Polusi dan Sedimentasi:</strong> Efluen dari pemukiman, pertanian, dan pariwisata yang tidak terkelola dengan baik dapat mencemari perairan, menyebabkan pertumbuhan alga berlebih, penyakit karang, dan mengurangi kualitas air yang dibutuhkan untuk kelangsungan hidup \'Euphyllia\'. </div> <div> <strong>5. Wabah Penyakit Karang:</strong> Karang, seperti organisme hidup lainnya, rentan terhadap wabah penyakit. Stres lingkungan akibat perubahan iklim dan polusi dapat membuat mereka lebih rentan terhadap infeksi bakteri atau virus yang mematikan. </div>", "Nama <strong>Euphyllia baliensis</strong> menunjukkan bahwa spesies ini pertama kali dideskripsikan dari perairan Bali, Indonesia. Bali, dengan keindahan bawah lautnya yang terkenal, menjadi rumah bagi keanekaragaman hayati laut yang luar biasa. Karang ini umumnya ditemukan di terumbu karang yang terlindung, seringkali di lereng terumbu atau area dengan arus sedang, pada kedalaman yang bervariasi. Meskipun penemuan utamanya di Bali, spesies serupa atau kerabat dekatnya dapat ditemukan di wilayah Indo-Pasifik yang lebih luas. Lokasi spesifik di Bali menjadikan karang ini ikon penting bagi upaya konservasi laut di pulau dewata.", "-8.5167° S, 115.5667° E", "https://www.google.com/maps?q=-8.5167,115.5667&hl=id&z=14&output=embed", "Pelestarian <strong>Euphyllia baliensis</strong> sangat vital, tidak hanya karena nilai estetikanya yang tinggi tetapi juga karena perannya dalam menjaga ekosistem terumbu karang yang sehat dan seimbang. Sebagai spesies karang batu, \'Euphyllia baliensis\' berkontribusi pada struktur fisik terumbu, menyediakan habitat kompleks dan tempat berlindung bagi ribuan spesies laut lainnya, termasuk ikan, krustasea, dan moluska. Keberadaan karang ini mendukung jaring-jaring makanan laut dan merupakan indikator penting kesehatan laut. <br><br> Secara ekonomi, terumbu karang di Bali adalah aset pariwisata bahari yang tak ternilai. \'Euphyllia baliensis\' dan spesies karang lainnya menarik penyelam dan wisatawan, yang mendukung mata pencarian masyarakat lokal melalui industri pariwisata dan perikanan berkelanjutan. Perlindungan terhadap karang ini berarti menjaga sumber pendapatan dan kesejahteraan bagi banyak orang. <br><br> Selain itu, karang adalah pelindung alami garis pantai, mengurangi dampak gelombang dan abrasi. Dari sudut pandang ilmiah, \'Euphyllia baliensis\' dapat menjadi subjek penelitian penting mengenai adaptasi karang terhadap perubahan lingkungan dan potensi biofarmasi. Oleh karena itu, upaya konservasi yang efektif, termasuk pengelolaan pariwisata yang berkelanjutan, penegakan hukum terhadap penangkapan ilegal, dan mitigasi perubahan iklim, sangat diperlukan untuk memastikan kelangsungan hidup spesies karang yang indah ini dan ekosistem terumbu karang Bali untuk generasi mendatang."),
	(3, "Indophyllia macassarensis", "Keajaiban Polip Berkilau dari Perairan Bali", "pemweb/Indophyllia macassarensis/indop.jpg", "Indophyllia", "Rare coral from Indonesia, found on deep sandy seabeds.::Solitary and free-living, with fleshy transparent tentacles.::Often debated as a variant of Cynarina due to similar traits.::Valued for its vibrant orange-gold color and unique habitat.", "<strong>Indophyllia macassarensis</strong> adalah spesies karang batu yang memukau, dikenal dengan <strong>polip berdaging dan berwarna cerah</strong>. Karang ini hidup di perairan dalam yang teduh, dengan struktur koralit yang tebal dan septa yang menonjol. Karang ini memainkan peran penting dalam ekosistem laut sebagai habitat biota bentik dan sumber keanekaragaman struktural.", "<ul class=\'list-disc space-y-4\'> <li><strong>Perubahan Iklim:</strong> Pengasaman laut dan peningkatan suhu menyebabkan stres fisiologis.</li> <li><strong>Penangkapan Merusak:</strong> Bom ikan dan pukat menghancurkan habitat mereka.</li> <li><strong>Polusi dan Sedimentasi:</strong> Limbah dan sedimen menutupi permukaan karang.</li> <li><strong>Penambangan dan Pengerukan:</strong> Merusak habitat secara langsung.</li> <li><strong>Perdagangan Karang Hias:</strong> Ancaman dari eksploitasi untuk akuarium.</li> </ul>", "Spesies ini ditemukan di sekitar <strong>Makassar, Sulawesi Selatan</strong> dan perairan laut dalam lainnya di Indonesia. Keberadaannya menandakan ekosistem laut yang masih sehat dan alami.", "5°7\'31″ LS, 119°20\'35″ BT", "https://www.google.com/maps?q=-5.1253,119.3431&hl=id&z=12&output=embed", "Konservasi karang ini penting demi menjaga keanekaragaman hayati laut dalam serta potensi bioteknologi dari senyawa alami yang dihasilkan. Upaya pelestarian termasuk mengurangi polusi, menerapkan perikanan berkelanjutan, dan membentuk kawasan konservasi laut."),
	(4, "Isopora togianensis", "Permata Langka dari Perairan Indah Kepulauan Togean", "isopora.jpg", "Isopora", "Endemic to Togian Islands, thrives on shallow reef slopes.::Features thick, circular branches with dome-shaped corallites.::Locally common but listed as Endangered due to climate threats.::Known for fine spinules and strong resistance to currents.", "<strong>Isopora togianensis</strong> adalah spesies karang batu (Scleractinia) yang memiliki keunikan luar biasa karena statusnya sebagai <strong>endemik Kepulauan Togean, Sulawesi Tengah, Indonesia</strong>. Karang ini ditandai oleh bentuk percabangan yang khas, seringkali membentuk koloni padat dengan cabang-cabang yang ramping atau agak pipih, yang tumbuh mengarah ke atas atau menyebar. Warna karang ini dapat bervariasi, seringkali didominasi oleh nuansa cokelat muda, krem, atau bahkan kehijauan, yang berpadu sempurna dengan lingkungan terumbu karang di sekitarnya. Morfologi cabangnya dirancang untuk efisien dalam menangkap cahaya matahari dan arus air, mendukung zooxanthellae (alga simbion) yang hidup di dalamnya dan menyediakan sebagian besar energinya. <br><br> Sebagai bagian penting dari genus <i>Isopora</i>, karang ini memainkan peran krusial dalam <strong>strukturisasi terumbu karang</strong> di Kepulauan Togean. Koloni <i>Isopora togianensis</i> menyediakan <strong>habitat kompleks dan tempat berlindung</strong> bagi beragam spesies ikan, invertebrata, dan organisme laut lainnya, menjadikannya salah satu fondasi bagi keanekaragaman hayati yang tinggi di wilayah tersebut. Keberadaan spesies endemik seperti <i>Isopora togianensis</i> juga memiliki nilai ilmiah yang sangat tinggi, memungkinkan para peneliti untuk mempelajari evolusi dan adaptasi spesies dalam lingkungan geografis yang terisolasi. Keunikan genetiknya menambah kekayaan warisan alam Indonesia dan menjadikan perlindungannya sangat vital bagi ekosistem global.", "<div> <strong>1. Perubahan Iklim Global:</strong> Peningkatan suhu laut adalah ancaman utama yang menyebabkan pemutihan karang (coral bleaching), di mana alga simbion yang memberikan warna dan nutrisi karang dikeluarkan. Fenomena ini, jika berkepanjangan, dapat menyebabkan kematian massal koloni karang. Pengasaman laut juga mengurangi kemampuan karang untuk membangun kerangka kalsium karbonatnya. </div> <div> <strong>2. Polusi Lokal dan Regional:</strong> Limbah domestik, pertanian, dan industri yang masuk ke perairan dapat menyebabkan eutrofikasi (peningkatan nutrisi berlebihan) dan pertumbuhan alga berlebih yang menutupi karang. Mikroplastik juga menjadi ancaman karena dapat tertelan oleh karang dan menyebabkan stres fisiologis. </div> <div> <strong>3. Metode Penangkapan Ikan yang Destruktif:</strong> Meskipun ada upaya konservasi, praktik penangkapan ikan ilegal seperti penggunaan bom, sianida, dan pukat harimau masih menjadi ancaman serius. Metode ini secara langsung menghancurkan struktur karang dan membunuh biota laut secara masif. </div> <div> <strong>4. Pariwisata dan Aktivitas Pesisir yang Tidak Berkelanjutan:</strong> Peningkatan aktivitas pariwisata yang tidak dikelola dengan baik, seperti jangkar kapal yang merusak karang, sentuhan wisatawan, dan pembangunan fasilitas di pesisir, dapat memberikan tekanan signifikan pada ekosistem terumbu karang yang rapuh. </div> <div> <strong>5. Kurangnya Kesadaran dan Penegakan Hukum:</strong> Meskipun Togean adalah taman nasional, kurangnya sumber daya untuk pemantauan dan penegakan hukum yang efektif masih menjadi tantangan dalam melindungi karang endemik dari ancaman antropogenik. </div>", "<strong>Isopora togianensis</strong> adalah spesies karang yang sangat istimewa karena merupakan <strong>endemik</strong>, yang berarti hanya ditemukan di satu lokasi geografis di dunia, yaitu di perairan <strong>Kepulauan Togean, Sulawesi Tengah, Indonesia</strong>. Kepulauan ini terletak di \"Segitiga Terumbu Karang\" yang terkenal dengan keanekaragaman hayatinya yang luar biasa. Habitat karang ini meliputi berbagai kedalaman di perairan jernih, mulai dari lereng terumbu yang dangkal hingga area yang lebih dalam, di mana kondisi lingkungan mendukung pertumbuhannya yang unik. Keberadaan spesifik di Togean menjadikannya simbol kekayaan alam maritim Indonesia.", "-0.5522° LS, 121.8583° BT", "https://www.google.com/maps?q=-0.5522,121.8583&hl=id&z=12&output=embed", "Pelestarian <strong>Isopora togianensis</strong> adalah prioritas utama karena statusnya sebagai spesies endemik yang rapuh. Keberadaannya adalah bukti kekayaan biodiversitas dan keunikan ekosistem laut Togean. Melindungi karang ini berarti menjaga seluruh jaring-jaring kehidupan laut yang bergantung padanya, dari ikan-ikan kecil hingga predator puncak. Karang ini berfungsi sebagai <strong>\"kota bawah laut\"</strong> yang menyediakan makanan, tempat berlindung, dan area pemijahan bagi berbagai spesies laut, yang pada gilirannya mendukung perikanan lokal dan ketahanan pangan masyarakat pesisir. <br><br> Selain itu, terumbu karang di Togean, yang menjadi rumah bagi <i>Isopora togianensis</i>, adalah daya tarik utama <strong>ekowisata bahari</strong>. Kegiatan seperti snorkeling dan menyelam tidak hanya mendatangkan pendapatan bagi masyarakat lokal tetapi juga meningkatkan kesadaran global akan pentingnya konservasi laut. Secara ekologis, terumbu karang juga bertindak sebagai <strong>pelindung alami garis pantai</strong> dari erosi dan dampak gelombang besar, menjaga komunitas pesisir dari bencana alam. Oleh karena itu, investasi dalam konservasi <i>Isopora togianensis</i> adalah investasi untuk masa depan ekologi, ekonomi, dan sosial wilayah Togean dan Indonesia.");

/*!40000 ALTER TABLE `corals` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table cultivations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cultivations`;

CREATE TABLE `cultivations` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `desc_small` text DEFAULT NULL,
  `x_tahun` varchar(50) DEFAULT NULL,
  `x_lokasi` varchar(50) DEFAULT NULL,
  `x_media` varchar(50) DEFAULT NULL,
  `tentang_html` text DEFAULT NULL,
  `metode_media_html` text DEFAULT NULL,
  `lokasi_proses_html` text DEFAULT NULL,
  `lokasi_proses_coordinate_txt` varchar(50) DEFAULT NULL,
  `lokasi_proses_iframe_url` varchar(100) DEFAULT NULL,
  `dampak_manfaat_html` text DEFAULT NULL,
  `sumber_jurnal_txt` text DEFAULT NULL,
  `sumber_jurnal_url` varchar(100) DEFAULT NULL,
  `durasi_proses_html` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

LOCK TABLES `cultivations` WRITE;
/*!40000 ALTER TABLE `cultivations` DISABLE KEYS */;

INSERT INTO `cultivations` (`id`, `title`, `tagline`, `desc_small`, `x_tahun`, `x_lokasi`, `x_media`, `tentang_html`, `metode_media_html`, `lokasi_proses_html`, `lokasi_proses_coordinate_txt`, `lokasi_proses_iframe_url`, `dampak_manfaat_html`, `sumber_jurnal_txt`, `sumber_jurnal_url`, `durasi_proses_html`) VALUES
	(1, "Media “RaKsagon” di Pangandaran", "Restorasi Laut di Pantai Barat Pananjung", "Struktur kubus pasir-besi buatan Unpad sukses mempercepat pertumbuhan karang.", "Sebelum April 2017", "Pantai Barat Pananjung, Pangandaran", "RaKsagon", "Kegiatan penanaman terumbu karang ini diprakarsai oleh <strong>Departemen Kelautan, Fakultas Perikanan dan Ilmu Kelautan Universitas Padjadjaran</strong> dalam rangka pengabdian kepada masyarakat. Tujuan utamanya adalah merehabilitasi ekosistem terumbu karang yang rusak akibat aktivitas manusia dengan metode <em>transplantasi karang</em>.", "Karang ditanam pada media buatan berbentuk <strong>kubah heksagon dari besi</strong> yang telah dilapisi pasir, disebut <strong>RaKsagon</strong>. Rangka-rangka ini disusun membentuk tulisan “UNPAD” di dasar laut.", "Lokasi kegiatan adalah di <strong>Pantai Barat Pananjung, Kabupaten Pangandaran, Jawa Barat</strong>. Pemasangan dilakukan sebelum April 2017 di kedalaman 6–10 meter menggunakan alat selam SCUBA.", "7°42\'19.1” LS, 108°39\'07.5” BT", "https://www.google.com/maps?q=-7.7053,108.6521&hl=id&z=12&output=embed", "Proyek ini meningkatkan peluang regenerasi alami terumbu karang, khususnya karang bercabang yang tumbuh 5-9 cm per tahun. Selain sebagai model restorasi laut yang dapat direplikasi, kegiatan ini juga mendukung <em>wisata bahari</em> dan kesadaran masyarakat dalam menjaga sumber daya laut.", "PENANAMAN TERUMBU KARANG DENGAN METODE TRANSPLANTASI RANGKA KUBAH DI PANGANDARAN", "https://jurnal.unpad.ac.id/pkm/article/download/16290/7946", NULL),
	(2, "Budidaya Karang Ramah Lingkungan", "Edukasi dan Konservasi di Sulawesi", "Pelatihan warga Polewali Mandar dengan substrat alami dan fragmen karang.", NULL, NULL, NULL, "Kegiatan budidaya ini dilakukan oleh <strong>komunitas Ruang Baca Inspirasi (RBI) Desa Tonyaman</strong> bekerja sama dengan <strong>mahasiswa dan tim dari Universitas Sulawesi Barat</strong>. Kegiatan ini mencakup pelatihan, pendampingan, dan pelaksanaan budidaya menggunakan media ramah lingkungan berupa pipa dalam cetakan beton. Karang rusak dari lokasi lain ditransplantasi ke media ini sebagai solusi atas metode lama yang merusak lingkungan.", NULL, "Budidaya dilakukan di <strong>pantai Desa Tonyaman</strong>, Kabupaten Polewali Mandar, Sulawesi Barat. Lokasi ini dipilih karena kondisi perairan yang masih baik dan potensial untuk restorasi ekosistem terumbu karang.", "-3.4633373,119.3260228", "https://www.google.com/maps?q=-3.4633373,119.3260228&hl=id&z=12&output=embed", "Tujuan utama program ini adalah mengembangkan metode budidaya terumbu karang yang ramah lingkungan dan berkelanjutan, meningkatkan pemahaman masyarakat, serta menjadikan Desa Tonyaman sebagai pusat pendidikan, penelitian, dan wisata bahari berbasis ekologi.<br /> Proyek ini tidak hanya berhasil menumbuhkan karang baru, tetapi juga meningkatkan kemandirian masyarakat, mengenalkan teknologi budidaya murah dan efisien, serta membuka peluang ekonomi dari wisata edukatif. Yang paling penting, pendekatan partisipatif berhasil menumbuhkan rasa kepemilikan dan tanggung jawab warga terhadap laut mereka.", NULL, NULL, "Program berlangsung selama <strong>10 bulan</strong> sejak tahun <strong>2022</strong>. Dimulai dengan survei dan koordinasi, dilanjutkan pelatihan teknis partisipatif. Hasilnya dipantau bulanan dan menunjukkan pertumbuhan karang 1–2 cm dalam 6 bulan."),
	(3, "Teknologi Karang Hias (Unhas)", "Pulau Barrang Lompo, Sulawesi Selatan", "Substrat keramik dan beton untuk industri ekspor dan farmasi laut.", NULL, NULL, NULL, "Kegiatan ini merupakan bagian dari <strong>Program Pengembangan Produk Unggulan Daerah (PPPUD)</strong> oleh tim dari <strong>Politeknik Pertanian Negeri Pangkep</strong>, bekerja sama dengan UKM Angin Mamiri dan UKM Rezky Bahari. Melalui metode fragmentasi karang, koloni indukan dicacah dan ditempelkan pada substrat buatan yang diletakkan di rak dasar laut ramah lingkungan.", NULL, "Lokasi budidaya berada di <strong>perairan Pulau Barrang Lompo</strong> (Koordinat: <code>5°02\'51.7\"S 119°19\'37.3\"E</code>) yang memiliki visibilitas baik, substrat pasir, dan terlindung dari gelombang besar.", NULL, NULL, "Program ini bertujuan menciptakan sumber penghasilan alternatif yang ramah lingkungan, mengurangi eksploitasi karang alam, serta memenuhi pasar ekspor. Selain itu, peningkatan kapasitas nelayan dalam agribisnis kelautan dan pariwisata turut menjadi fokus. Hasil kegiatan mencakup peningkatan dari 66 indukan menjadi 11.437 anakan karang, diversifikasi produk untuk ekspor, pengurangan eksploitasi alam, dan peningkatan kesejahteraan nelayan. Program ini menjadi model budidaya berkelanjutan di wilayah pesisir lainnya.", NULL, NULL, "Program ini berlangsung dari <strong>Mei hingga Oktober 2020</strong> di <strong>Pulau Barrang Lompo, Makassar</strong>. Kegiatan termasuk pelatihan teknik budidaya, pemeliharaan, hingga pengemasan karang hias. Evaluasi rutin dilakukan untuk menilai pertumbuhan dan manajemen usaha."),
	(4, "Budidaya dari PT Agung Aquatic Marine", "Strategi Ekspor Karang Bali", "CV Bali Aquarium andalkan teknik stek dan ekowisata karang.", NULL, NULL, NULL, "<strong>PT Agung Aquatic Marine</strong> melakukan budidaya karang hias melalui <em>metode transplantasi</em> untuk tujuan ekspor. Jenis karang yang dibudidayakan meliputi <strong>Acropora</strong>, <strong>Euphyllia</strong>, dan lainnya. Prosesnya mencakup seleksi indukan, pemeliharaan akuarium, dan pengemasan ekspor.", NULL, "Kegiatan dilakukan di <strong>Kerobokan, Kabupaten Badung, Bali</strong> — wilayah perairan tropis yang ideal untuk pertumbuhan karang.", NULL, NULL, "Meningkatkan devisa negara melalui ekspor berkelanjutan, menggantikan eksploitasi liar, dan mendukung konservasi ekosistem laut serta pemberdayaan masyarakat. Berdampak mengurangi eksploitasi liar, meningkatkan nilai tambah produk, membuka pasar ekspor, dan memajukan keterampilan pekerja dalam transplantasi serta promosi digital.", "Jurnal Strategi Budidaya Karang Hias", "https://ejournal.unaja.ac.id/index.php/JMJ/article/view/835/629", "Kegiatan ini dilakukan pada tahun <strong>2022</strong> melalui observasi, wawancara, studi pustaka, dan dokumentasi. Hasil analisis diterbitkan dalam <em>Jurnal Manajemen Jambi (JUMANJI)</em>, Volume 5, Mei 2022."),
	(5, "533 Proyek Restorasi di Indonesia", "Restorasi Terumbu Karang di Seluruh Indonesia", "Analisis 30 tahun proyek karang se-Indonesia oleh ScienceDirect.", NULL, NULL, NULL, "Di Indonesia, berbagai pihak telah melakukan restorasi terumbu karang melalui proyek-proyek besar. Sejak tahun 1990 hingga 2020, tercatat ada 533 proyek di 29 provinsi dengan lebih dari 965.000 fragmen karang ditanam. Metode yang digunakan meliputi struktur buatan dari beton dan baja, serta teknik modern seperti MARRS dan biorock. <br/> Pada tahun 2020, proyek melonjak tajam melalui program nasional <strong>Indonesia Coral Reef Garden</strong>, sebagai bagian dari pemulihan ekonomi pasca-COVID-19. Dalam beberapa bulan, 96.000 struktur buatan ditanam di perairan Bali dan melibatkan lebih dari 10.000 orang.<br/> Proyek ini bertujuan untuk mengembalikan ekosistem yang rusak akibat aktivitas manusia dan perubahan iklim, serta mendorong wisata bahari dan penguatan ekonomi pesisir. <br/> Wilayah restorasi tersebar dari Sumatra hingga Papua, dengan fokus terbesar di Bali, Sulawesi Selatan, dan Nusa Tenggara. Namun, hanya 16% proyek yang memiliki sistem pemantauan jangka panjang, sehingga sistem monitoring masih perlu ditingkatkan agar restorasi terumbu karang di Indonesia semakin kuat dan berkelanjutan.", NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(6, "Hope Reef oleh Mars", "Survei Ilmiah di Hope Reef", "Struktur heksagonal sukses tingkatkan tutupan karang dari 2% ke 70%.", NULL, NULL, NULL, "Pada <strong>Mei 2023</strong>, <strong>Mars</strong> mengundang tim ilmuwan independen, mahasiswa, dan peneliti dari Indonesia dan Inggris untuk melakukan <strong>survei dan pengumpulan data</strong> di <strong>Hope Reef</strong>, Salisi\' Besar, Sulawesi Selatan. Mereka menggunakan <em>fotogrammetri</em> untuk membuat model 3D habitat, <em>video & akustik</em> untuk komunitas ikan, serta metode <em>ReefBudget</em> untuk mengukur pertumbuhan karang. <br /> Studi ini juga mencakup <strong>analisis genetika</strong> dan <strong>penilaian estetika dan pariwisata</strong> terumbu, serta mengevaluasi efektivitas struktur <em>Reef Stars</em> dalam mendukung keragaman dan kompleksitas habitat laut.", "<ul class=\"list-disc pl-6 text-lg mb-6\"> <li>Memahami struktur 3D terumbu untuk habitat & reduksi gelombang</li> <li>Evaluasi kondisi biologis, estetika, dan potensi wisata</li> <li>Pengumpulan data kuantitatif untuk keberlanjutan ekologi & sosial</li> <li>Penilaian keragaman genetika untuk reef yang tahan penyakit</li> </ul>", "Kegiatan ini dilaksanakan di <strong>Hope Reef</strong>, perairan <strong>Salisi’ Besar, Sulawesi Selatan</strong>, bagian dari program restorasi <strong>\"Sheba Hope Grows\"</strong> oleh Mars. Lokasi ini dipilih karena memiliki potensi besar dalam restorasi dan konservasi laut tropis.", NULL, NULL, "<ul class=\"list-disc pl-6 text-lg mb-6\"> <li>Meningkatkan pemahaman efektivitas <em>Reef Stars</em></li> <li>Optimasi desain restorasi untuk toleransi panas & penyakit</li> <li>Mendukung restorasi estetis & pariwisata berbasis data</li> <li>Memperkuat kolaborasi ilmiah dan perluasan ke lokasi lain</li> </ul>", NULL, NULL, NULL);

/*!40000 ALTER TABLE `cultivations` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table komentar
# ------------------------------------------------------------

DROP TABLE IF EXISTS `komentar`;

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `komentar` WRITE;
/*!40000 ALTER TABLE `komentar` DISABLE KEYS */;

INSERT INTO `komentar` (`id`, `nama`, `email`, `pesan`, `lampiran`, `waktu`) VALUES
	(1, "Elfira Risa", "elfirarisahidayat@gmail.com", "yaaaa gitu lah pokoknya", NULL, "2025-07-19 05:59:10"),
	(2, "Elfira Risa", "elfirarisa17@gmail.com", "pokok ngunu", NULL, "2025-07-19 15:13:00"),
	(3, "alfi", "alfiyahfaza7@gmail.com", "sangat edukatif", "687bc5f74395b.png", "2025-07-19 16:21:11"),
	(4, ".......", "risaelfira17@gmail.com", "Semoga website ini bisa berkembang yaa nantinya ga langsung dilupainðŸ˜­", NULL, "2025-07-20 05:25:02"),
	(5, "alfi", "alfiyahfaza7@gmail.com", "keren sangat edukatif, saya mempunyai jenis terumbu karang yang membutuhkan perhatian juga, berikut saya lampirkan spesifikasinya ", "687ca25119a45.png", "2025-07-20 08:01:21");

/*!40000 ALTER TABLE `komentar` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `email_hash` varchar(64) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_hash`, `username`, `password`, `created_at`) VALUES
	(1, "NsODjRpeSCgZ7opL4OTv/g==", "wWYRK5AMDmHDseRxqknqMdSIIVk0G9hB96V5TjS0fmE=", "ad09c13e92a731d76704859211feb11121af7028919c12fd6f1126507177b4c0", "risaelfira", "$2y$10$4.oTsRKXaKv7o6A1BPk4GeiuciFKje3kHjbXhM6jH930u1rFH8Uyi", "2025-07-11 08:06:25"),
	(2, "NsODjRpeSCgZ7opL4OTv/g==", "yNN+JpltbjGSLcPpVvQBcljat2t7+Lt77WbSJSsSbPs=", "03c4866d452e149c6fff0cd4467438d4f829c97a337aed3341813a0272207137", "icebebeluv", "$2y$10$JO04dxTSViCTFpjetV7q3ua.9ro6yPJGBmOZlPgIop4v1s27aLbpG", "2025-07-19 14:03:12"),
	(3, "q1SIKvmB/UTIj8+EGLlmiA==", "kE1uNv//Rmwo/Zgrfna/32GxjL1/X31Kmo0hWixq3TE=", "d792d83ed2f3ad2b1526d710d1093d5f52788f0c7f78312fa61879dca6e55714", "apii.sky", "$2y$10$AkNnVZDRly6Chj2LYcra5uVVqpHhavtpr7IKnAExxbTzbmwUR/Diu", "2025-07-19 14:24:59"),
	(4, "y+7BpdWp+LzmwiV9lKtTpw==", "N0lqiMh0GmUwrGQmIHeo4oWI+yLxPeyetgi4490mTLY=", "a7db32149fd3d49703755e87d442b7861ec4ce04dc51446982307d1eb9229fa1", "karom", "$2y$10$8k0dfkR66x.Az0o2y.TJOeQMJgnVwSulQ4bLndKFyy/NfcjbDCovm", "2025-07-20 15:17:34");

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of views
# ------------------------------------------------------------

# Creating temporary tables to overcome VIEW dependency errors


/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

# Dump completed on 2025-07-20T23:07:26+07:00
