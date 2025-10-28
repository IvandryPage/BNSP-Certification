<?php session_start() ?>
<nav class="bg-white shadow">
  <div class="container mx-auto px-4 py-3 flex items-center justify-between">
    <a href="<?= URLROOT ?>/index.php?page=home" class="text-2xl font-bold text-gray-800">VeteranBoard</a>

    <div class="lg:hidden">
      <button @click="open = !open" class="text-gray-800 focus:outline-none" x-data="{ open: false }">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>

    <div class="hidden lg:flex lg:items-center lg:space-x-6">
      <a href="?page=home" class="text-gray-700 hover:text-gray-900">Home</a>

      <div x-data="{ open: false }" class="relative">
        <?php if (isset($_SESSION['user_id'])): ?>
          <button @click="open = !open" class="flex items-center text-gray-700 hover:text-gray-900 focus:outline-none">
            Username
            <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd"
                d="M5.23 7.21a.75.75 0 011.06 0L10 10.915l3.71-3.705a.75.75 0 111.06 1.06l-4.24 4.243a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 010-1.06z"
                clip-rule="evenodd" />
            </svg>
          </button>

          <div x-show="open" @click.outside="open = false"
            class="absolute right-0 mt-2 w-40 bg-white border rounded shadow-lg py-1 z-20">
            <a href="?page=profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
            <a href="?page=dashboard" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Dashboard</a>
            <hr class="border-t my-1">
            <a href="?action=logout" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
          </div>
        <?php else: ?>
          <div class="flex justify-center items-center gap-5">
            <a href="?page=register" class="text-gray-700 hover:text-gray-900 hover:bg-green-400 rounded transition-colors p-2">Sign Up</a>
            <a href="?page=login" class="bg-green-500 text-white p-2 rounded hover:bg-green-600 transition-colors font-semibold">Login</a>
          </div>
        <?php endif ?>
      </div>

      <?php if (isset($_SESSION['user_id'])): ?>
        <form class="flex items-center" role="search">
          <input type="search" placeholder="Search"
            class="border border-gray-300 rounded-l px-3 py-1 focus:outline-none focus:ring-1 focus:ring-green-500 focus:border-green-500" />
          <button type="submit"
            class="bg-green-500 text-white px-3 py-1 rounded-r hover:bg-green-600">Search</button>
        </form>
      <?php endif ?>
    </div>
  </div>

  <div x-data="{ open: false }" x-show="open" class="lg:hidden px-4 pt-2 pb-4 space-y-1">
    <a href="?page=home" class="block text-gray-700 hover:text-gray-900">Home</a>
    <div x-data="{ dropdown: false }" class="block">
      <button @click="dropdown = !dropdown"
        class="w-full flex justify-between items-center text-gray-700 hover:text-gray-900 focus:outline-none">
        Username
        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd"
            d="M5.23 7.21a.75.75 0 011.06 0L10 10.915l3.71-3.705a.75.75 0 111.06 1.06l-4.24 4.243a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 010-1.06z"
            clip-rule="evenodd" />
        </svg>
      </button>
      <div x-show="dropdown" @click.outside="dropdown = false" class="mt-1 space-y-1 pl-4">
        <a href="?page=profile" class="block text-gray-700 hover:text-gray-900">Profile</a>
        <a href="?page=dashboard" class="block text-gray-700 hover:text-gray-900">Dashboard</a>
        <a href="?action=logout" class="block text-gray-700 hover:text-gray-900">Logout</a>
      </div>
    </div>
    <div class="container mx-auto py-4 px-4 max-w-2xl">
      <form action="" method="POST" class="flex gap-2">
        <input type="text" name="search" placeholder="Search articles..." value="<?= htmlspecialchars($_POST['search'] ?? '') ?>"
          class="flex-grow border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" />
        <button type="submit"
          class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition-colors">
          Search
        </button>
      </form>
    </div>

  </div>
</nav>