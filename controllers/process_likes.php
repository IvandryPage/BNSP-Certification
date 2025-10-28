<?php
require_once APPROOT . "/includes/functions.php";
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: " . URLROOT . "/index.php?page=login");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user_id = $_SESSION['user_id'];
  $article_id = $_POST['article_id'] ?? 0;

  $likes = db_select($connection, "SELECT * FROM article_likes WHERE user_id = ? AND article_id = ?", "ii", [$user_id, $article_id]);

  if ($likes) {
    db_execute($connection, "DELETE FROM article_likes WHERE user_id = ? AND article_id = ?", "ii", [$user_id, $article_id]);
  } else {
    db_execute($connection, "INSERT INTO article_likes(user_id, article_id) VALUES (?, ?)", "ii", [$user_id, $article_id]);
  }

  header("Location: " . $_SERVER['HTTP_REFERER']);
  exit;
}
