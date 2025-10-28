<?php
require_once APPROOT . "/includes/functions.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header("Location: " . URLROOT . "/index.php?page=login");
  exit;
}

$email = $_POST['email'];
$password = $_POST['password'];

$user = getUserByEmail($email);

if ($user && password_verify($password, $user[0]['password'])) {
  $_SESSION['user_id'] = $user[0]['id'];
  $_SESSION['username'] = $user[0]['name'];

  header("Location: " . URLROOT . "/index.php?page=home");
  exit;
}
