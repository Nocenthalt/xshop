<?php

function get_product($cat_id, $cond, $limit)
{
    $sql = "SELECT * FROM `product`";

    if ($cat_id) {
        $sql .= " WHERE `category_id` = {$cat_id}";
    }
    if ($cond) {
        $sql .= " ORDER BY `$cond` DESC";
    }
    if ($limit) {
        $sql .= " LIMIT $limit";
    }
    $data = pdo_query($sql);

    return $data;
}

function get_product_count()
{
    $sql = "SELECT COUNT(*) AS count FROM `product`";
    $data = pdo_query($sql);

    return $data[0]['count'];
}
