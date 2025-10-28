<?php
require_once APPROOT . "/includes/functions.php";

if (!isset($_SESSION['user_id'])) {
  header("Location: " . URLROOT . "/index.php?page=login");
  exit;
}

$user_id = $_SESSION['user_id'];
$user = getUserById($user_id);
?>

<div class="min-h-screen bg-gray-100 flex items-center justify-center py-8">
  <div class="bg-white shadow-lg rounded-lg w-full max-w-md p-6">
    <div class="flex flex-col items-center">
      <!-- Profile image -->
      <div class="w-32 h-32 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 mb-4 text-xl">
        <?= strtoupper(substr($user['name'], 0, 1)) ?>
      </div>

      <!-- User info -->
      <h2 class="text-2xl font-bold text-gray-800 mb-2"><?= htmlspecialchars($user['name']) ?></h2>
      <p class="text-gray-600 mb-4"><?= htmlspecialchars($user['email']) ?></p>

      <!-- Actions -->
      <div class="flex space-x-4">
        <a href="?action=logout"
          class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition-colors">
          Logout
        </a>
        <a href="?action=delete_account"
          class="bg-red-400 hover:bg-red-500 text-white px-4 py-2 rounded transition-colors">
          Delete
        </a>
      </div>
    </div>
  </div>
</div>