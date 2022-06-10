<?php
function set_session()
{
    if (session_status() == PHP_SESSION_NONE) {
        ob_start();
        session_start();
    }
    $_SESSION['identity'] = $_SERVER['REMOTE_ADDR']; // IP address
    $_SESSION['errors'] = false;
}
