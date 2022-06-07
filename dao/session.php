<?php

// new session

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $_SESSION['page'] = 'home';
}
// get current user info
$info = pdo_exec("SELECT * FROM users WHERE username = ?", ["pjanse7"]);
