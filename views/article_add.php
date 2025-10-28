<?php
require_once APPROOT . "/includes/functions.php";
?>

<div class="container mx-auto px-4 py-8 max-w-2xl">
  <h2 class="text-2xl font-bold mb-6">Add New Article</h2>

  <form action="?page=dashboard&action=create_article" method="POST" enctype="multipart/form-data" class="space-y-4">
    <div>
      <label class="block text-gray-700 mb-1">Title</label>
      <input type="text" name="title" required
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" />
    </div>

    <div>
      <label class="block text-gray-700 mb-1">Content</label>
      <textarea name="content" rows="6"
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
    </div>

    <!-- <div>
      <label class="block text-gray-700 mb-1">Image</label>
      <input type="file" name="image" class="w-full">
    </div> -->

    <button type="submit"
      class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition-colors">
      Publish
    </button>
  </form>
</div>