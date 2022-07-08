<?php
require 'global.php';
require 'dao/session.php';
require 'dao/pdo.php';

set_session();
get_header();
$page = $_GET['page'] ?? 'home';
$path = "site/{$page}.php";

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == '1') {
        //cho phép admin truy cập những trang của user/non-user
        if (in_array($page, ['logout', 'home', 'profile', 'detail'])) {
            $path = "site/{$page}.php";
        } else {
            $path = "admin/{$page}.php";
        }
    }
}

print_r($_SESSION);
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