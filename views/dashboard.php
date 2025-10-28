<?php
require_once APPROOT . "/includes/functions.php";
$user_id = $_SESSION['user_id'];
$articles = getArticleByUser($user_id);
?>

<div class="flex justify-start m-4">
  <a href="?page=article_add"
    class="inline-block bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded shadow transition-colors">
    + Create Article
  </a>
</div>

<div class="container mx-auto py-8 px-4">
  <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    <?php foreach ($articles as $article): ?>
      <div class="bg-white rounded-lg shadow-sm hover:shadow-lg transform hover:-translate-y-2 transition-all duration-200 flex flex-col h-full">
        <a href="?page=article&id=<?= $article['id'] ?>" class="block overflow-hidden rounded-t-lg">
          <div class="p-4 flex flex-col flex-grow">
            <h5 class="text-lg font-semibold text-gray-800 mb-2"><?= $article['title'] ?></h5>
            <p class="text-gray-600 flex-grow"><?= substr($article['body'], 0, 100) ?></p>
            <a href="?page=article_edit&id=<?= $article['id'] ?>">
              Edit
            </a>
            <a href="?page=dashboard&action=delete_article&id=<?= $article['id'] ?>">
              Delete
            </a>
          </div>
        </a>
      </div>
    <?php endforeach ?>
  </div>
</div>