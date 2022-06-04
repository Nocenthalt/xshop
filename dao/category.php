<?php
    require 'dao/pdo.php';

    function category_list($sql) {
        $data = pdo_query($sql);
        var_dump($data);
    }

?>