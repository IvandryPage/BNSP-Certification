<?php
require_once APPROOT . "/includes/functions.php";

$article_id = $_GET['id'] ?? 0;
$article = getArticleById($article_id);
?>

<div class="container mx-auto px-4 py-8 max-w-2xl">
  <h2 class="text-2xl font-bold mb-6">Edit Article</h2>

  <form action="?page=article_edit&action=update_article" method="POST" class="space-y-4">
    <div>
      <label class="block text-gray-700 mb-1">Title</label>
      <input type="text" name="title" required value="<?= htmlspecialchars($article['title']) ?>"
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <div>
      <label class="block text-gray-700 mb-1">Content</label>
      <textarea name="content" rows="6" required
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"><?= htmlspecialchars($article['body']) ?></textarea>
    </div>

    <!--
        <div>
            <label class="block text-gray-700 mb-1">Image</label>
            <input type="file" name="image" class="w-full mb-2">
            <?php if (!empty($article['image'])): ?>
                <img src="assets/images/<?= htmlspecialchars($article['image']) ?>" class="w-32 h-32 object-cover rounded" alt="Current Image">
            <?php endif; ?>
        </div>
        -->

    <input type="hidden" name="article_id" value="<?= $article_id ?>">

    <button type="submit"
      class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors font-semibold">
      Update Article
    </button>
  </form>
</div>