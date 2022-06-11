<?php

function get_product($limit = null, $cat_id = null, $order = null)
{
    $sql = "SELECT * FROM `product`";

    if ($cat_id) {
        $sql .=  " WHERE `category_id` = {$cat_id}";
    }
    if ($order) {
        $sql .= " ORDER BY `$order` DESC";
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

function delete_product($id)
{
    $sql = "DELETE FROM `product` WHERE `product_id` = {$id}";
    pdo_query($sql);
}

?>