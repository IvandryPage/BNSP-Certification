<?php
$view = $_GET['page'] ?? "home";

$allowed_pages = ["home", "dashboard", "profile", "login", "register", "article", "article_add", "article_edit"];
if (!in_array($view, $allowed_pages) || !file_exists(APPROOT . "/views/{$view}.php")) {
  $view = "404";
}

$allowed_actions = ['login', 'register', "logout", "create_article", "update_article", "delete_article", "delete_account", "likes"];
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
  <meta http-equiv="X-UA-Compatible" content="IE=7">
  <meta name="description" content="Website ini dibuat untuk Sertifikasi Junior Web Programming">
  <link rel="stylesheet" href="<? APPROOT . '/assets/css' ?>style.css">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <title><?= SITENAME ?></title>
</head>

<body>

  <header>
    <?php include APPROOT . "/views/_header.php"; ?>
  </header>

  <main>
    <?php include APPROOT . "/views/" . $view . ".php" ?>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>

</html>