<?php
require_once APPROOT . "/includes/db.php";


function getAllArticles()
{
  global $connection;
  $sql_query = "SELECT * FROM articles";
  return db_select($connection, $sql_query);
}

function getArticleByUser($user_id)
{
  global $connection;
  $sql_query = "SELECT * FROM articles WHERE user_id = ?";
  return db_select($connection, $sql_query, "i", [$user_id]);
}

function getArticleById($id)
{
  global $connection;
  $sql_query = "SELECT * FROM articles WHERE id = ?";
  return db_select($connection, $sql_query, "i", [$id])[0];
}

function getAllUser()
{
  global $connection;
  $sql_query = "SELECT * FROM users";
  return db_select($connection, $sql_query);
}

function getLikesCount($article_id)
{
  global $connection;
  $sql_query = "SELECT COUNT(*) AS count FROM article_likes WHERE article_id = ?";
  return db_select($connection, $sql_query, "s", [$article_id]);
}

function getUserByEmail($email)
{
  global $connection;
  $sql_query = "SELECT * FROM users WHERE email = ?";
  return db_select($connection, $sql_query, "s", [$email]);
}

function getUserById($user_id)
{
  global $connection;
  $sql_query = "SELECT * FROM users WHERE id = ?";
  return db_select($connection, $sql_query, "i", [$user_id])[0];
}

function createUser($username, $email, $password_hash)
{
  global $connection;
  $sql_query = "INSERT INTO users(name, email, password) VALUES (?, ?, ?)";
  db_execute($connection, $sql_query, "sss", [$username, $email, $password_hash]);
}

function createArticle($user_id, $title, $body)
{
  global $connection;
  $sql_query = "INSERT INTO articles(user_id, title, body) VALUES (?, ?, ?)";
  db_execute($connection, $sql_query, "iss", [$user_id, $title, $body]);
}

function updateArticle($article_id, $title, $body)
{
  global $connection;
  $sql_query = "UPDATE articles SET title = ?, body = ? WHERE id = ?";
  db_execute($connection, $sql_query, "ssi", [$title, $body, $article_id]);
}

function deleteArticle($article_id)
{
  global $connection;
  $sql_query = "DELETE FROM articles WHERE id = ?";
  db_execute($connection, $sql_query, "i", [$article_id]);
}

function deleteAccount($user_id)
{
  global $connection;
  $sql_query = "DELETE FROM users WHERE id = ?";
  db_execute($connection, $sql_query, "i", [$user_id]);
}

function searchArticle($keywords)
{
  global $connection;
  $formatted = "%" . $keywords . "%";
  $sql_query = "SELECT * FROM articles WHERE title LIKE ?";
  return db_select($connection, $sql_query, "s", [$formatted]);
}
