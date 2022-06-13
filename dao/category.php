<?php

    function get_category($id) {
        $sql = "SELECT * FROM `category` WHERE `id` = ?";
        return pdo_query($sql, [$id]);
    }
    function get_all_category() {
        $sql = "SELECT * FROM `category`";
        return pdo_query($sql);
    }

    function get_category_count($id) {
        $sql = "SELECT COUNT(*) AS count FROM `product` WHERE `category_id` = ?";
        return pdo_execute($sql, [$id])['count'];
    }