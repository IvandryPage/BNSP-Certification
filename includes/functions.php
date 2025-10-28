<?php
require_once APPROOT . "/includes/db.php";

// ------------------ USERS ------------------
function getAllUser()
{
  global $connection;
  return db_select($connection, "SELECT * FROM users");
}

function getUserById($user_id)
{
  global $connection;
  $res = db_select($connection, "SELECT * FROM users WHERE id = ?", "i", [$user_id]);
  return $res[0] ?? null;
}

function getUserByEmail($email)
{
  global $connection;
  $res = db_select($connection, "SELECT * FROM users WHERE email = ?", "s", [$email]);
  return $res;
}

function createUser($username, $email, $password_hash)
{
  global $connection;
  return db_execute($connection, "INSERT INTO users(name,email,password) VALUES (?,?,?)", "sss", [$username, $email, $password_hash]);
}

function deleteAccount($user_id)
{
  global $connection;
  return db_execute($connection, "DELETE FROM users WHERE id = ?", "i", [$user_id]);
}

function getUserRole($user_id)
{
  global $connection;
  $res = db_select($connection, "SELECT role FROM users WHERE id = ?", "i", [$user_id]);
  return $res[0]["role"] ?? null;
}

function getUsername($user_id)
{
  global $connection;
  $res = db_select($connection, "SELECT name FROM users WHERE id = ?", "i", [$user_id]);
  return $res[0]["name"];
}

// ------------------ ARTICLES ------------------
function getAllArticles()
{
  global $connection;
  return db_select($connection, "SELECT * FROM articles ORDER BY created_at DESC");
}

function getArticleById($id)
{
  global $connection;
  $res = db_select($connection, "SELECT * FROM articles WHERE id = ?", "i", [$id]);
  return $res[0] ?? null;
}

function getArticleByUser($user_id)
{
  global $connection;
  return db_select($connection, "SELECT * FROM articles WHERE user_id = ? ORDER BY created_at DESC", "i", [$user_id]);
}

function createArticle($user_id, $title, $body)
{
  global $connection;
  return db_execute($connection, "INSERT INTO articles(user_id,title,body) VALUES (?,?,?)", "iss", [$user_id, $title, $body]);
}

function updateArticle($article_id, $title, $body)
{
  global $connection;
  return db_execute($connection, "UPDATE articles SET title=?, body=? WHERE id=?", "ssi", [$title, $body, $article_id]);
}

function deleteArticle($article_id)
{
  global $connection;
  return db_execute($connection, "DELETE FROM articles WHERE id=?", "i", [$article_id]);
}

// ------------------ LIKES ------------------
function getLikesCount($article_id)
{
  global $connection;
  $res = db_select($connection, "SELECT COUNT(*) AS count FROM article_likes WHERE article_id=?", "i", [$article_id]);
  return $res[0]['count'] ?? 0;
}

function isLiked($article_id, $user_id)
{
  global $connection;
  $res = db_select($connection, "SELECT * FROM article_likes WHERE article_id = ? AND user_id = ?", [$article_id, $user_id]);
  return !empty($res);
}

// ------------------ SEARCH ------------------
function searchArticle($keywords)
{
  global $connection;
  $keywords = "%$keywords%";
  return db_select($connection, "SELECT * FROM articles WHERE title LIKE ?", "s", [$keywords]);
}
