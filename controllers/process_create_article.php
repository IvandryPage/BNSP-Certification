<?php
require_once APPROOT . "/includes/functions.php";
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: " . URLROOT . "/index.php?page=login");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user_id = $_SESSION['user_id'];
  $title = trim($_POST['title'] ?? '');
  $content = trim($_POST['content'] ?? '');

  if (!$title || !$content) {
    $error = "Title and content cannot be empty.";
    include APPROOT . "/views/article_add.php";
    exit;
  }

  createArticle($user_id, $title, $content);

  header("Location: ?page=dashboard");
  exit;
}
