<?php
require_once APPROOT . "/includes/functions.php";
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: " . URLROOT . "/index.php?page=login");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $article_id = $_POST['article_id'] ?? 0;
  $title = trim($_POST['title'] ?? '');
  $content = trim($_POST['content'] ?? '');

  if (!$title || !$content) {
    $error = "Title and content cannot be empty.";
    include APPROOT . "/views/article_edit.php";
    exit;
  }

  updateArticle($article_id, $title, $content);

  header("Location: ?page=dashboard");
  exit;
}
