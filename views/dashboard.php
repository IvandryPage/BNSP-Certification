<?php
require_once APPROOT . "/includes/functions.php";
$user_id = $_SESSION['user_id'];
$articles = getArticleByUser($user_id);
?>

<?php if (getUserRole($user_id) == "admin"):
  $users = getAllUser();
?>
  <div class="container mx-auto px-4 py-8 max-w-6xl">

    <h2 class="text-2xl font-bold mb-6">Admin Dashboard</h2>

    <!-- Users Section -->
    <section class="mb-10">
      <h3 class="text-xl font-semibold mb-4">Users</h3>
      <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow-sm">
          <thead class="bg-gray-100">
            <tr>
              <th class="py-2 px-4 text-left">#</th>
              <th class="py-2 px-4 text-left">Name</th>
              <th class="py-2 px-4 text-left">Email</th>
              <th class="py-2 px-4 text-left">Registered</th>
              <th class="py-2 px-4 text-left">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $index => $user): ?>
              <tr class="border-b hover:bg-gray-50">
                <td class="py-2 px-4"><?= $index + 1 ?></td>
                <td class="py-2 px-4"><?= htmlspecialchars($user['name']) ?></td>
                <td class="py-2 px-4"><?= htmlspecialchars($user['email']) ?></td>
                <td class="py-2 px-4"><?= date("F j, Y", strtotime($user['created_at'])) ?></td>
                <td class="py-2 px-4">
                  <a href="?action=delete_account&id=<?= $user['id'] ?>"
                    class="text-red-500 hover:text-red-700">Delete</a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </section>

    <!-- Articles Section -->
    <section>
      <h3 class="text-xl font-semibold mb-4">Articles</h3>
      <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow-sm">
          <thead class="bg-gray-100">
            <tr>
              <th class="py-2 px-4 text-left">#</th>
              <th class="py-2 px-4 text-left">Title</th>
              <th class="py-2 px-4 text-left">Author</th>
              <th class="py-2 px-4 text-left">Created</th>
              <th class="py-2 px-4 text-left">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($articles as $index => $article): ?>
              <tr class="border-b hover:bg-gray-50">
                <td class="py-2 px-4"><?= $index + 1 ?></td>
                <td class="py-2 px-4"><?= htmlspecialchars($article['title']) ?></td>
                <td class="py-2 px-4"><?= htmlspecialchars(getUserById($article['user_id'])['name']) ?></td>
                <td class="py-2 px-4"><?= date("F j, Y", strtotime($article['created_at'])) ?></td>
                <td class="py-2 px-4 flex gap-2">
                  <a href="?page=article_edit&id=<?= $article['id'] ?>"
                    class="text-blue-500 hover:text-blue-700">Edit</a>
                  <a href="?page=dashboard&action=delete_article&id=<?= $article['id'] ?>"
                    class="text-red-500 hover:text-red-700">Delete</a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </section>

  </div>

<?php else: ?>
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
          <div class="p-4 flex flex-col flex-grow">
            <h5 class="text-lg font-semibold text-gray-800 mb-2"><?= htmlspecialchars($article['title']) ?></h5>
            <p class="text-gray-600 flex-grow"><?= substr($article['body'], 0, 100) ?>...</p>
          </div>
          <div class="p-4 border-t flex justify-between">
            <a href="?page=article_edit&id=<?= $article['id'] ?>"
              class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition-colors text-sm">
              Edit
            </a>
            <a href="?page=dashboard&action=delete_article&id=<?= $article['id'] ?>"
              onclick="return confirm('Are you sure you want to delete this article?');"
              class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition-colors text-sm">
              Delete
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif ?>