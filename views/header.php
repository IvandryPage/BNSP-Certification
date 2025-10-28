<nav class="bg-white shadow">
  <div class="container mx-auto px-4 py-3 flex items-center justify-between">
    <a href="<?= URLROOT ?>/index.php?page=home" class="text-2xl font-bold text-gray-800">VeteranBoard</a>

    <div class="lg:hidden" x-data="{ open: false }">
      <button @click="open = !open" class="text-gray-800 focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>

      <div x-show="open" x-transition class="mt-2 space-y-2">
        <a href="?page=home" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">Home</a>

        <?php if (isset($_SESSION['user_id'])): ?>
          <a href="?page=profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">Profile</a>
          <a href="?page=dashboard" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">Dashboard</a>
          <a href="?action=logout" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">Logout</a>
        <?php else: ?>
          <a href="?page=register" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">Sign Up</a>
          <a href="?page=login" class="block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition-colors text-center">Login</a>
        <?php endif; ?>
      </div>
    </div>

    <div class="hidden lg:flex lg:items-center lg:space-x-6">
      <a href="?page=home" class="text-gray-700 hover:text-gray-900">Home</a>

      <?php if (isset($_SESSION['user_id'])): ?>
        <div x-data="{ dropdown: false }" class="relative">
          <button @click="dropdown = !dropdown"
            class="flex items-center text-gray-700 hover:text-gray-900 focus:outline-none">
            <?= htmlspecialchars($_SESSION['username'] ?? 'Username') ?>
            <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd"
                d="M5.23 7.21a.75.75 0 011.06 0L10 10.915l3.71-3.705a.75.75 0 111.06 1.06l-4.24 4.243a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 010-1.06z"
                clip-rule="evenodd" />
            </svg>
          </button>
          <div x-show="dropdown" @click.outside="dropdown = false"
            x-transition
            class="absolute right-0 mt-2 w-40 bg-white border rounded shadow-lg py-1 z-20">
            <a href="?page=profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
            <a href="?page=dashboard" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Dashboard</a>
            <hr class="border-t my-1">
            <a href="?action=logout" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
          </div>
        </div>
      <?php else: ?>
        <div class="flex items-center gap-5">
          <a href="?page=register" class="text-gray-700 hover:text-gray-900 hover:bg-green-400 rounded transition-colors px-3 py-1">Sign Up</a>
          <a href="?page=login" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition-colors font-semibold">Login</a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</nav>