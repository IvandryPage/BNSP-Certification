<?php require_once APPROOT . "/includes/functions.php"; ?>

<div class="min-h-screen flex items-center justify-center bg-gray-100">
  <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Register</h2>

    <?php if (!empty($_GET['error'])) : ?>
      <div class="bg-red-100 text-red-700 p-2 rounded mb-4 text-center">
        <?= htmlspecialchars($_GET['error']) ?>
      </div>
    <?php endif; ?>

    <form action="?page=register&action=register" method="POST" class="space-y-4">
      <div>
        <label for="username" class="block text-gray-700 mb-1">Username</label>
        <input type="text" name="username" id="username" required
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" />
      </div>

      <div>
        <label for="email" class="block text-gray-700 mb-1">Email</label>
        <input type="email" name="email" id="email" required
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" />
      </div>

      <div>
        <label for="password" class="block text-gray-700 mb-1">Password</label>
        <input type="password" name="password" id="password" required minlength="8"
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" />
      </div>

      <div>
        <label for="confirm_password" class="block text-gray-700 mb-1">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" required minlength="8"
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" />
      </div>

      <button type="submit"
        class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600 transition-colors font-semibold">
        Register
      </button>
    </form>

    <p class="text-gray-600 mt-4 text-center">
      Already have an account?
      <a href="?page=login" class="text-green-500 hover:underline">Login</a>
    </p>
  </div>
</div>