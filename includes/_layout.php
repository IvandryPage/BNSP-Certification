<?php
$view = $_GET['page'] ?? "home";

//UPDATE IF NEW PAGE CREATED
$allowed = ["home"];
if (!in_array($view, $allowed) || !file_exists(APPROOT . "/views/{$view}.php")) {
  $view = "404";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= SITENAME ?></title>
</head>

<body>

  <header>
    <?php include APPROOT . "/views/_header.php"; ?>
  </header>

  <main>
    <?php include APPROOT . "/views/" . $view . ".php" ?>
  </main>

  <footer>
    <?php include APPROOT . "/views/_footer.php"; ?>
  </footer>

</body>

</html>