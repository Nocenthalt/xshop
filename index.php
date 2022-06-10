<?php
require 'global.php';
require 'dao/session.php';
require 'dao/pdo.php';

set_session();
get_header();
$page = $_GET['page'] ?? 'home';
$path = "site/{$page}.php";

if (file_exists($path)) {
?>
    <!-- css -->
    <style>
        <?php include "./content/css/{$page}.css" ?>
    </style>
    <!-- js -->
    <script src="./content/js/<?php echo $page ?>.js"></script>
<?php
    require $path;
} else {
    echo "không tồn tại trang này";
}

?>
<?php
get_footer();
?>