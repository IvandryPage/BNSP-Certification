<?php
require_once APPROOT . "/includes/functions.php";
session_start();

$user_id = $_SESSION['user_id'] ?? -1;

if (!isset($_SESSION['user_id'])) {
  header("Location: " . URLROOT . "/index.php?page=login");
  exit;
}

deleteAccount($user_id);
header("Location: " . URLROOT . "/index.php?action=logout");
exit;
