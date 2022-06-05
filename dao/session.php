<?php
require 'pdo.php';

// new session

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// get current user info
$info = pdo_exec("SELECT * FROM users WHERE usesrname = ?", ["pjanse7"]);
print_r($info);
