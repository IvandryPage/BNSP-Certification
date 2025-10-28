<?php
$view = $_GET['page'] ?? "home";

$allowed_pages = ["home", "dashboard", "profile", "login", "register", "article", "article_add", "article_edit"];
if (!in_array($view, $allowed_pages) || !file_exists(APPROOT . "/views/{$view}.php")) {
  $view = "404";
}

$allowed_actions = ["login", "register", "logout", "create_article", "update_article", "delete_article", "delete_account", "likes"];
$action = $_GET['action'] ?? '';
if (!empty($action) && in_array($action, $allowed_actions) && file_exists(APPROOT . "/controllers/process_{$action}.php")) {
  include APPROOT . "/controllers/process_{$action}.php";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Website ini dibuat untuk Sertifikasi Junior Web Programming">
  <link rel="stylesheet" href="<?= URLROOT ?>/assets/css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <title><?= SITENAME ?></title>
</head>

<body class="bg-gray-100">

  <header>
    <?php include APPROOT . "/views/header.php"; ?>
  </header>

  <main class="pt-4">
    <?php include APPROOT . "/views/{$view}.php"; ?>
  </main>

</body>

</html>