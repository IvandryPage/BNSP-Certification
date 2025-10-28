<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

define("APPROOT", __DIR__);

require_once APPROOT . "/includes/config.php";
require_once APPROOT . "/includes/db.php";

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

include APPROOT . "/includes/_layout.php";
