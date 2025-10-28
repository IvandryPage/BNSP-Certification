<?php
require_once APPROOT . "/includes/functions.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header("Location: " . URLROOT . "/index.php?page=register");
  exit;
}

$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm_pass = $_POST['confirm_password'] ?? '';

if (getUserByEmail($email)) {
  header("Location: " . URLROOT . "/index.php?page=register");
  exit;
}

if ($password === $confirm_pass) {
  $password_hash = password_hash($password, PASSWORD_DEFAULT);
  createUser($username, $email, $password_hash);
  header("Location: " . URLROOT . "/index.php?page=login");
  exit;
}
