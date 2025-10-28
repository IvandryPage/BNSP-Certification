<?php
require_once APPROOT . "/includes/functions.php";

$user_id = $_SESSION['user_id'] ?? -1;

if (!isset($_SESSION['user_id'])) {
  header("Location: " . URLROOT . "/index.php?page=login");
  exit;
}

$article_id = $_GET['id'] ?? 0;
$article = getArticleById($article_id);

if (!$article) {
  echo '<p class="text-center text-red-500 mt-8">Article not found.</p>';
  exit;
}
?>

<div class="container mx-auto px-4 py-8">
  <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
    <?php if (!empty($article['image'])): ?>
      <img src="assets/images/<?= htmlspecialchars($article['image']) ?>"
        alt="<?= htmlspecialchars($article['title']) ?>"
        class="w-full h-64 object-cover">
    <?php endif; ?>

    <div class="p-6">
      <div class="mb-4 text-gray-500 text-sm flex flex-col sm:flex-row sm:justify-between sm:items-center">
        <span>By <?= htmlspecialchars(getUsername($article['user_id'])) ?></span>
        <span><?= date("F j, Y", strtotime($article['created_at'])) ?></span>
      </div>

      <h1 class="text-3xl font-bold text-gray-800 mb-4"><?= htmlspecialchars($article['title']) ?></h1>

      <?php if (!empty($article['description'])): ?>
        <p class="text-gray-700 mb-6"><?= htmlspecialchars($article['description']) ?></p>
      <?php endif; ?>

      <div class="prose max-w-none text-gray-800">
        <?= nl2br(htmlspecialchars($article['body'])) ?>
      </div>

      <form action="?action=likes" method="POST" class="mt-4 flex items-center gap-2">
        <input type="hidden" name="article_id" value="<?= $article['id'] ?>">

        <button type="submit" class="flex items-center gap-1 text-gray-700 hover:text-red-600 transition-colors font-semibold">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 20 20">
            <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
          </svg>
          <?= getLikesCount($article['id']) ?>
        </button>
      </form>

    </div>
  </div>
</div>