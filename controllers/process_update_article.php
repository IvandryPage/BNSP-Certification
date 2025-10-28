<?php
require_once APPROOT . "/includes/functions.php";
session_start();

$user_id = $_SESSION['user_id'] ?? -1;

if (!isset($_SESSION['user_id'])) {
  header("Location: " . URLROOT . "/index.php?page=login");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  var_dump($_POST);
  $title = $_POST['title'];
  $content = $_POST['content'];
  $article_id = $_POST['article_id'];

  updateArticle($article_id, $title, $content);
  header("Location: ?page=dashboard");
  exit;
}
