<?php
require_once "config.php";

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$connection) {
  die("Database connection failed: " . mysqli_connect_error());
}

function db_select($connection, $sql_query, $types = "", $params = [])
{
  $statement = mysqli_prepare($connection, $sql_query);
  if ($statement === false) return [];

  if ($types && $params) {
    mysqli_stmt_bind_param($statement, $types, ...$params);
  }
  mysqli_stmt_execute($statement);
  $result = mysqli_stmt_get_result($statement);
  $rows = [];
  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
  }
  mysqli_stmt_close($statement);
  return $rows;
}

function db_execute($connection, $sql_query, $types = "", $params = [])
{
  $statement = mysqli_prepare($connection, $sql_query);
  if ($statement === false) return false;

  if ($types && $params) {
    mysqli_stmt_bind_param($statement, $types, ...$params);
  }
  $success_status = mysqli_stmt_execute($statement);

  mysqli_stmt_close($statement);
  return $success_status;
}
