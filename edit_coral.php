<?php
include "_utils.php";
include "_data_corals.php";

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

$coral = $corals[0];

?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AquascapeReef - Kelola Konten - Edit Koral</title>
  <?php include '_layout_headscript.php' ?>

  <style>
    .form-container {
      background-color: #ffffff;
      padding: 2.5rem;
      border-radius: 1rem;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 800px;
      margin: 1rem;
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 600;
      color: #334155;
    }

    input[type="text"],
    input[type="url"],
    textarea {
      width: 100%;
      padding: 0.75rem 1rem;
      border: 1px solid #cbd5e1;
      border-radius: 0.5rem;
      font-size: 1rem;
      color: #334155;
      transition: border-color 0.2s, box-shadow 0.2s;
    }

    input[type="text"]:focus,
    input[type="url"]:focus,
    textarea:focus {
      outline: none;
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
    }

    textarea {
      min-height: 100px;
      resize: vertical;
    }

    button {
      width: 100%;
      padding: 0.75rem 1.5rem;
      background-color: #3b82f6;
      color: white;
      font-weight: 600;
      border-radius: 0.5rem;
      border: none;
      cursor: pointer;
      font-size: 1.125rem;
      transition: background-color 0.2s, transform 0.1s;
    }

    button:hover {
      background-color: #2563eb;
      transform: translateY(-1px);
    }

    button:active {
      transform: translateY(0);
    }

    h1 {
      font-size: 2.25rem;
      font-weight: 700;
      color: #1e293b;
      margin-bottom: 2rem;
      text-align: center;
    }
  </style>
</head>

<body id="top" class="bg-gray-100 text-gray-800 font-sans">
  <!-- Navbar -->
  <?php include '_layout_navbar.php' ?>

  <!-- Header  -->
  <div class="pt-20 w-full h-[200px] bg-cover bg-center bg-no-repeat" style="background-image: url('https://image.idntimes.com/post/20161209/the-great-barrier-reef-5f78074eec83b3b8e8958d857e58bc29.jpeg?tr=w-1920,f-webp,q-75&width=1920&format=webp&quality=75');">
    <div class="w-full h-full bg-black/40 flex items-center justify-center">
      <h1 class="text-white text-4xl md:text-5xl font-bold text-center drop-shadow-lg">
        AquascapeReef Kelola Konten <?php echo count($corals); ?>
      </h1>
    </div>
  </div>

  <!-- Header  -->
  <section class="p-6">
    <!-- <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">AquascapeReef Edit Koral Terancam</h2> -->

    <!-- Table Container for Responsiveness -->
    <div class="overflow-x-auto">
      <form action="_process_send_coral.php" method="POST">

        <?php
        ?>
        <input type="text" class="-d-none" name="id" value="<?= $coral['id'] ?? -1 ?>">

        <!-- Coral Name -->
        <div class="form-group">
          <label for="name">Coral Name:</label>
          <input type="text" id="name" name="name" required
            placeholder="e.g., Acropora millepora"
            value="<?= $coral['name'] ?>"
            class="rounded-lg focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Tagline -->
        <div class="form-group">
          <label for="tagline">Tagline:</label>
          <input type="text" id="tagline" name="tagline"
            placeholder="A short, catchy description"
            value="<?= $coral['tagline'] ?>"
            class="rounded-lg focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Image URL -->
        <div class="form-group">
          <label for="img">Image URL:</label>
          <input type="text" id="img" name="img"
            value="<?= $coral['img'] ?>"
            placeholder="https://example.com/coral.jpg"
            class="rounded-lg focus:ring-blue-500 focus:border-blue-500">
          <p class="text-sm text-gray-500 mt-1">Provide a direct URL to the coral image.</p>
        </div>

        <!-- External Link -->
        <div class="form-group">
          <label for="link">External Link:</label>
          <input type="text" id="link" name="link"
            value="<?= $coral['link'] ?>"
            placeholder="https://example.com/more-info"
            class="rounded-lg focus:ring-blue-500 focus:border-blue-500">
          <p class="text-sm text-gray-500 mt-1">Link to a page with more information about this coral.</p>
        </div>

        <!-- Small Description -->
        <div class="form-group">
          <label for="desc_small">Small Description:</label>
          <textarea id="desc_small" name="desc_small"
            placeholder="A brief summary of the coral."
            class="rounded-lg focus:ring-blue-500 focus:border-blue-500">
            <?= $coral['desc_small'] ?>
          </textarea>
        </div>

        <!-- Full Description (HTML allowed) -->
        <div class="form-group">
          <label for="desc_html">Full Description (HTML allowed):</label>
          <textarea id="desc_html" name="desc_html"
            placeholder="Detailed description of the coral, including HTML tags if needed."
            class="rounded-lg focus:ring-blue-500 focus:border-blue-500">
            <?= $coral['desc_html'] ?>
          </textarea>
        </div>

        <!-- Threats (HTML allowed) -->
        <div class="form-group">
          <label for="ancaman_html">Threats (HTML allowed):</label>
          <textarea id="ancaman_html" name="ancaman_html"
            placeholder="Information about threats to this coral, HTML allowed."
            class="rounded-lg focus:ring-blue-500 focus:border-blue-500">
            <?= $coral['ancaman_html'] ?>
          </textarea>
        </div>

        <!-- Location Description (HTML allowed) -->
        <div class="form-group">
          <label for="lokasi_html">Location Description (HTML allowed):</label>
          <textarea id="lokasi_html" name="lokasi_html"
            placeholder="Description of where this coral can be found, HTML allowed."
            class="rounded-lg focus:ring-blue-500 focus:border-blue-500">
            <?= $coral['lokasi_html'] ?>
          </textarea>
        </div>

        <!-- Location Coordinates -->
        <div class="form-group">
          <label for="lokasi_coordinate_txt">Location Coordinates:</label>
          <input type="text" id="lokasi_coordinate_txt" name="lokasi_coordinate_txt"
            value="<?= $coral['lokasi_coordinate_txt'] ?>"
            placeholder="e.g., -6.2088, 106.8456"
            class="rounded-lg focus:ring-blue-500 focus:border-blue-500">
          <p class="text-sm text-gray-500 mt-1">Latitude, Longitude (e.g., -6.2088, 106.8456).</p>
        </div>

        <!-- Location Iframe URL -->
        <div class="form-group">
          <label for="lokasi_iframe_url">Location Map Iframe URL:</label>
          <input type="url" id="lokasi_iframe_url" name="lokasi_iframe_url"
            value="<?= $coral['lokasi_iframe_url'] ?>"
            placeholder="https://www.google.com/maps/embed?pb=..."
            class="rounded-lg focus:ring-blue-500 focus:border-blue-500">
          <p class="text-sm text-gray-500 mt-1">URL for an embedded map (e.g., Google Maps iframe source).</p>
        </div>

        <!-- Conservation Efforts (HTML allowed) -->
        <div class="form-group">
          <label for="pelestarian_html">Conservation Efforts (HTML allowed):</label>
          <textarea id="pelestarian_html" name="pelestarian_html"
            placeholder="Information about conservation efforts, HTML allowed."
            class="rounded-lg focus:ring-blue-500 focus:border-blue-500"><?= $coral['pelestarian_html'] ?></textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit"
          class="inline-block bg-blue-500 text-white px-5 py-2 rounded-full shadow hover:bg-blue-600 transition">
          Edit Terumbu
        </button>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <?php include "_layout_footer.php" ?>
</body>

</html>