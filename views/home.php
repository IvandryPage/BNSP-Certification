<?php
require_once APPROOT . "/includes/functions.php";

$articles = [];

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['search'])) {
  $search = trim($_POST['search']);
  $articles = searchArticle($search);
} else {
  $articles = getAllArticles();
}
?>

<div class="container mx-auto py-8 px-4">
  <h2 class="text-3xl font-bold text-gray-800 mb-6">WELCOME TO VETERAN BOARD</h2>

  <form action="" method="POST" class="mb-6 flex max-w-md mx-auto">
    <input type="text" name="search" placeholder="Search articles..."
      value="<?= htmlspecialchars($_POST['search'] ?? '') ?>"
      class="flex-grow border border-gray-300 rounded-l px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-r hover:bg-green-600 transition-colors">Search</button>
  </form>

  <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    <?php foreach ($articles as $article): ?>
      <div class="bg-white rounded-lg shadow-sm hover:shadow-lg transform hover:-translate-y-2 transition-all duration-200 flex flex-col h-full">
        <a href="?page=article&id=<?= $article['id'] ?>" class="block overflow-hidden rounded-t-lg flex-grow">
          <div class="p-4 flex flex-col h-full">
            <h5 class="text-lg font-semibold text-gray-800 mb-2"><?= htmlspecialchars($article['title']) ?></h5>
            <p class="text-gray-600 flex-grow"><?= substr($article['body'], 0, 100) ?>...</p>
          </div>
        </a>
        <div class="p-4 border-t flex justify-between items-center">
          <form action="?action=likes" method="POST" class="mt-4 flex items-center gap-2">
            <input type="hidden" name="article_id" value="<?= $article['id'] ?>">

            <button type="submit" class="flex items-center gap-1 transition-colors font-semibold">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 20 20">
                <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
              </svg>
              <?= getLikesCount($article['id']) ?>
            </button>
          </form>
          <span class="text-gray-400 text-sm"><?= date("M j, Y", strtotime($article['created_at'])) ?></span>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>