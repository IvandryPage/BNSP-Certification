<?php
require_once APPROOT . "/includes/functions.php";

$user_id = $_SESSION['user_id'] ?? -1;

if (!isset($_SESSION['user_id'])) {
  header("Location: " . URLROOT . "/index.php?page=login");
  exit;
}

// Get the article ID from query string
$article_id = $_GET['id'] ?? 0;

// Fetch article from database
$article = getArticleById($article_id);

if (!$article) {
  echo '<p class="text-center text-red-500 mt-8">Article not found.</p>';
  exit;
}
?>

<div class="container mx-auto px-4 py-8">
  <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
    <!-- Article image -->
    <?php if (!empty($article['image'])): ?>
      <img src="assets/images/<?= htmlspecialchars($article['image']) ?>"
        alt="<?= htmlspecialchars($article['title']) ?>"
        class="w-full h-64 object-cover">
    <?php endif; ?>

    <div class="p-6">
      <!-- Article meta -->
      <div class="mb-4 text-gray-500 text-sm flex flex-col sm:flex-row sm:justify-between sm:items-center">
        <span>By <?= htmlspecialchars($article['user_id']) ?></span>
        <span><?= date("F j, Y", strtotime($article['created_at'])) ?></span>
      </div>

      <!-- Article title -->
      <h1 class="text-3xl font-bold text-gray-800 mb-4"><?= htmlspecialchars($article['title']) ?></h1>

      <!-- Article description -->
      <?php if (!empty($article['description'])): ?>
        <p class="text-gray-700 mb-6"><?= htmlspecialchars($article['description']) ?></p>
      <?php endif; ?>

      <!-- Article content -->
      <div class="prose max-w-none text-gray-800">
        <?= $article['body'] ?>
      </div>

      <!-- Like button -->
      <form action="?page=like" method="post" class="mt-6">
        <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
        <button type="submit" class="text-black hover:text-red-600 transition-colors text-xl">
          ❤️ Like
        </button>
      </form>
    </div>
  </div>
</div>