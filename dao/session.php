<?php

// new session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $_SESSION['page'] = 'home';
    $_SESSION['user'] = array();
    $_SESSION['user']['username'] = '';
    $_SESSION['user']['role'] = 2; // 2: guest, 1: admin, 0: user
    $_SESSION['user']['identity'] = $_SERVER['REMOTE_ADDR']; // IP address
    $_SESSION['errors'] = false;

}
else {
}

?>