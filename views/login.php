<div class="min-h-screen flex items-center justify-center bg-gray-100">
  <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Login</h2>

    <?php if (!empty($error)) : ?>
      <div class="bg-red-100 text-red-700 p-2 rounded mb-4 text-center">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <form action="?page=login&action=login" method="POST" class="space-y-4">
      <div>
        <label for="email" class="block text-gray-700 mb-1">Email</label>
        <input type="email" name="email" id="email" required
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500" />
      </div>

      <div>
        <label for="password" class="block text-gray-700 mb-1">Password</label>
        <input type="password" name="password" id="password" required
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500" />
      </div>

      <button type="submit"
        class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600 transition-colors font-semibold">
        Login
      </button>
    </form>

    <p class="text-gray-600 mt-4 text-center">
      Don't have an account?
      <a href="?page=register" class="text-green-500 hover:underline">Register</a>
    </p>
  </div>
</div>