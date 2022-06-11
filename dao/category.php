<?php

    function get_category($id) {
        $sql = "SELECT * FROM `category` WHERE `id` = ?";
        return pdo_query($sql, [$id]);
    }
