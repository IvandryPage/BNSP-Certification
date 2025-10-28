<?php
require_once APPROOT . "/includes/functions.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header("Location: " . URLROOT . "/index.php?page=register");
  exit;
}

$username = trim($_POST['username'] ?? '');
$pattern = '/^[a-zA-Z0-9_.]+$/';

if (!preg_match($pattern, $username)) {
  $error = urlencode("Username valid symbols: underscore (_) and dot (.)");
  header("Location: " . URLROOT . "/index.php?page=register&error={$error}");
  exit;
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm_pass = $_POST['confirm_password'] ?? '';

if (!$username || !$email || !$password || !$confirm_pass) {
  $error = urlencode("All fields are required.");
  header("Location: " . URLROOT . "/index.php?page=register&error={$error}");
  exit;
}

if ($password !== $confirm_pass) {
  $error = urlencode("Passwords do not match.");
  header("Location: " . URLROOT . "/index.php?page=register&error={$error}");
  exit;
}

if (getUserByEmail($email)) {
  $error = urlencode("Email is already registered.");
  header("Location: " . URLROOT . "/index.php?page=register&error={$error}");
  exit;
}

$password_hash = password_hash($password, PASSWORD_DEFAULT);
createUser($username, $email, $password_hash);

session_start();
$_SESSION['user_id'] = getUserByEmail($email)[0]['id'];
$_SESSION['username'] = $username;

header("Location: " . URLROOT . "/index.php?page=home");
exit;
