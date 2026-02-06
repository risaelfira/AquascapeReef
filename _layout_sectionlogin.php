<section id="contact" class="py-20 bg-white">
  <div class="max-w-lg mx-auto px-6 md:px-10">
    <h2 id="login-section" class="text-3xl md:text-4xl font-bold mb-8 text-center text-blue-700">Log In</h2>

    <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
      <p class="text-red-600 mb-6 text-center text-base md:text-lg">Email/Username atau Password salah.</p>
    <?php endif; ?>

    <!-- FIXME: path has .php can be change to nothing if hosted with apache2 -->
    <form action="_process_login.php" method="POST" class="space-y-6 text-base md:text-lg">
      <!-- TODO: dummy login must be cleanup -->
      <input type="text" name="identifier" placeholder="Username" value="risaelfira"
        class="w-full px-5 py-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required />

      <!-- TODO: dummy login must be cleanup -->
      <input type="password" name="password" placeholder="Password" value="cLaRx5ttEW%b8!94l^"
        class="w-full px-5 py-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
        required />

      <div class="text-center">
        <button type="submit"
          class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 rounded-md transition text-lg md:text-xl">
          Log In
        </button>
      </div>
    </form>

    <?php if (isset($_GET['not_logged_in'])): ?>
      <p class="text-red-600 mt-6 text-center font-medium text-base md:text-lg">
        Silakan login terlebih dahulu untuk mengakses halaman tersebut.
      </p>
    <?php endif; ?>

    <p class="text-center text-sm md:text-base text-gray-600 mt-6">
      Belum punya akun?
      <!-- FIXME: path has .php can be change to nothing if hosted with apache2 -->
      <a href="register.php" class="text-blue-600 hover:underline font-medium">Sign Up</a>
    </p>
  </div>
</section>