<?php
require_once APPROOT . "/includes/functions.php";
session_start();

$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id) {
  header("Location: " . URLROOT . "/index.php?page=login&error=Please+login+first");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $article_id = intval($_GET['id'] ?? 0);

  if ($article_id > 0) {
    deleteArticle($article_id);
    header("Location: ?page=dashboard&success=Article+deleted+successfully");
    exit;
  }
}

header("Location: ?page=dashboard&error=Invalid+article");
exit;
