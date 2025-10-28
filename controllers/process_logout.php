<?php
session_start();
session_unset();
session_destroy();

header("Location: " . URLROOT . "/index.php?page=login&success=Logged+out+successfully");
exit;
