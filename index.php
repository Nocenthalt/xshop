<?php
require 'global.php';
require 'dao/session.php';
require 'dao/pdo.php';

set_session();
get_header();
$page = $_GET['page'] ?? 'home';
$path = "site/{$page}.php";
$role = $_SESSION['role'] ?? 0;
if ($role && $role == '1') {
    //cho phép admin truy cập những trang của user/non-user
    if (in_array($page, ['logout', 'home', 'profile', 'detail'])) {
        get_user_header();
        $path = "site/{$page}.php";
    } else {
        get_admin_header();
        $path = "admin/{$page}.php";
    }
} else {
    get_user_header();
}

if (file_exists($path)) {
?>
    <!-- css -->
    <style>
        <?php include "./content/css/{$page}.css" ?>
    </style>
    <!-- js -->
    <script src="./content/js/<?= $page ?>.js"></script>
<?php
    require $path;
} else {
?>
    <style>
        <?php include "./content/css/404.css" ?>
    </style>
<?php
    require 'site/404.php';
}

?>
<?php
get_footer();
?>