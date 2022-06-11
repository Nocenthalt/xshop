<?php 
    //kiểm tra xem có phải admin không
    //*excessive feature
    if($_SESSION['role'] != '1'){
        redirect('home');
    }
?>