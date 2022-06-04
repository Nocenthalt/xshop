<?php
require 'template.php';
    get_header();
?>
<?php
    $page=$_GET['page'];
    $path="pages/{$page}.php";
    if(file_exists($path)){
        require $path;
    } else{
        echo "không tồn tại trang này";
    }
          
?>
<?php
    get_footer();
?>           