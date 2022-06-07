<?php
require 'template.php';
require 'dao/pdo.php';
require 'dao/session.php';
get_header();
?>
<?php
$page = $_GET['page'] ?? $_SESSION['page'];
$path = "pages/{$page}.php";
if (file_exists($path)) {
?>
    <!-- css -->
    <style><?php include "./public/css/{$page}.css" ?></style>
    <!-- js -->
    <script src="./public/js/<?php echo $page ?>.js"></script>
<?php
    require $path;
} else {
    echo "không tồn tại trang này";
}

?>
<?php
get_footer();
?>