<?php
// PHP SHOWS ERROR
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

define("APPROOT", __DIR__);
require_once APPROOT . "/includes/config.php";
require_once APPROOT . "/includes/db.php";
include APPROOT . "/includes/_layout.php";
