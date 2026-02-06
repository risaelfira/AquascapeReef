<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Akun</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
  <div class="w-full max-w-lg mx-auto mt-20 px-6 py-8 md:px-10 md:py-12 bg-white shadow-xl rounded-lg">
    <h2 class="text-2xl md:text-3xl font-bold mb-6 text-center text-blue-700">Buat Akun</h2>

    <!-- ✅ Error Message Box -->
    <?php if (isset($_GET['error'])): ?>
      <div class="mb-6 px-5 py-4 bg-red-100 border border-red-300 text-red-700 rounded text-sm md:text-base">
        <?php
          switch ($_GET['error']) {
            case 'empty':
              echo "Semua kolom wajib diisi.";
              break;
            case 'emailformat':
              echo "Format email tidak valid.";
              break;
            case 'mismatch':
              echo "Konfirmasi password tidak cocok.";
              break;
            case 'password':
              echo "Password harus minimal 8 karakter, mengandung huruf besar, huruf kecil, angka, simbol, dan tidak mengandung nama/email/username.";
              break;
            case 'duplicate':
              echo "Username atau email sudah digunakan.";
              break;
            default:
              echo "Terjadi kesalahan. Silakan coba lagi.";
          }
        ?>
      </div>
    <?php endif; ?>

    <!-- ✅ Form -->
    <form action="_process_register.php" method="POST" class="space-y-5 text-base md:text-lg">
      <input type="text" name="email" placeholder="Email" required
        class="w-full px-4 py-3 md:py-4 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" />

      <input type="text" name="nama" placeholder="Full Name" required
        class="w-full px-4 py-3 md:py-4 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" />

      <input type="text" name="username" placeholder="Username" required
        class="w-full px-4 py-3 md:py-4 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" />

      <!-- Password -->
      <div class="relative">
        <input type="password" name="password" id="password" placeholder="Password" required
          class="w-full px-4 py-3 md:py-4 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" />
        <button type="button" onclick="togglePassword('password')" 
          class="absolute right-4 top-3.5 text-gray-500 hover:text-gray-700 text-sm md:text-base">
          👁️
        </button>
      </div>

      <!-- Confirm Password -->
      <div class="relative">
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Konfirmasi Password" required
          class="w-full px-4 py-3 md:py-4 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" />
        <button type="button" onclick="togglePassword('confirm_password')" 
          class="absolute right-4 top-3.5 text-gray-500 hover:text-gray-700 text-sm md:text-base">
          👁️
        </button>
      </div>

      <!-- Submit Button -->
      <button type="submit"
        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 md:py-4 rounded text-base md:text-lg transition duration-200">
        Daftar
      </button>
    </form>

    <p class="text-center text-sm md:text-base text-gray-600 mt-6">
      Sudah punya akun?
      <a href="index#contact" class="text-blue-600 hover:underline font-medium">Login</a>
    </p>
  </div>

  <script>
    function togglePassword(id) {
      const input = document.getElementById(id);
      input.type = input.type === "password" ? "text" : "password";
    }
  </script>
</body>
</html>
