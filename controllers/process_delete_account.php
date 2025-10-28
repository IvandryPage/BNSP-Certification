<?php
require_once APPROOT . "/includes/functions.php";
session_start();

$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id) {
  header("Location: " . URLROOT . "/index.php?page=login&error=Please+login+first");
  exit;
}

deleteAccount($user_id);

session_unset();
session_destroy();

header("Location: " . URLROOT . "/index.php?page=register&success=Account+deleted+successfully");
exit;
