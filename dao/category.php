<?php

    function get_category($id) {
        $sql = "SELECT * FROM `category` WHERE `id` = ?";
        return pdo_query($sql, [$id]);
    }
    function get_all_category() {
        $sql = "SELECT * FROM `category`";
        return pdo_query($sql);
    }
