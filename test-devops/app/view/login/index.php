<body class="bg-gradient-to-b from-white via-blue-700 to-cyan-400 h-screen">

  <div class="flex items-center justify-center h-full">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-sm">

      <?php if (isset($data['error-message'])): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
          <?= $data['error-message']; ?>
        </div>
      <?php endif; ?>

      <h1 class="text-center text-2xl font-bold mb-6">Welcome</h1>

      <form action="<?= APP_PATH; ?>/login/verification" method="post">
        <label class="block text-sm font-semibold mb-1">Username or E-mail</label>
        <input type="text" name="usernameoremail"
          class="w-full px-3 py-2 mb-4 rounded-md bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500" />

        <label class="block text-sm font-semibold mb-1">Password</label>
        <input type="password" name="password"
          class="w-full px-3 py-2 mb-6 rounded-md bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500" />

        <button type="submit"
          class="block w-28 mx-auto py-2 rounded-full bg-blue-700 text-white hover:bg-blue-800 transition">Login</button>
      </form>

      <p class="text-center mt-4 text-sm">
        Belum punya akun? <a href="<?= APP_PATH ?>/login/register" class="text-blue-600 hover:underline">Daftar di
          sini</a>
      </p>


    </div>
  </div>

</body>