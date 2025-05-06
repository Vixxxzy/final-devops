<body class="bg-gradient-to-b from-white via-blue-700 to-cyan-400 h-screen">
  <div class="flex items-center justify-center h-full">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-sm">

      <?php if (isset($_SESSION['error-message'])): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
          <?= $_SESSION['error-message']; unset($_SESSION['error-message']); ?>
        </div>
      <?php endif; ?>

      <h1 class="text-center text-2xl font-bold mb-6">Register</h1>

      <form action="<?= APP_PATH ?>/login/store" method="post">
        <input type="text" name="name" placeholder="Full Name"
          class="w-full px-3 py-2 mb-4 rounded-md bg-gray-200" required />

        <input type="text" name="username" placeholder="Username"
          class="w-full px-3 py-2 mb-4 rounded-md bg-gray-200" required />

        <input type="email" name="email" placeholder="Email"
          class="w-full px-3 py-2 mb-4 rounded-md bg-gray-200" required />

        <input type="password" name="password" placeholder="Password"
          class="w-full px-3 py-2 mb-4 rounded-md bg-gray-200" required />

        <input type="text" name="phone" placeholder="Phone Number"
          class="w-full px-3 py-2 mb-6 rounded-md bg-gray-200" />

        <button type="submit"
          class="block w-28 mx-auto py-2 rounded-full bg-blue-700 text-white hover:bg-blue-800 transition">
          Register
        </button>

        <p class="text-center mt-4 text-sm">
          Sudah punya akun? <a href="<?= APP_PATH ?>/login/index" class="text-blue-600 hover:underline">Login</a>
        </p>
      </form>

    </div>
  </div>
</body>
