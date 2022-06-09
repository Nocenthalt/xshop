<?php
    if (isset($_GET['logout'])) {
        session_unset();
        redirect('home');
    }

?>