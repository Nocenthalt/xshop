<?php

function get_product($limit = null, $cond = null, $order = null)
{
    $sql = "SELECT * FROM `product`";

    if ($cond) {
        $sql .=  " WHERE $cond";
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
    $data = pdo_execute($sql);

    return $data['count'];
}

function delete_product($product_id)
{
    //if id is an array, use recursion
    if (is_array($product_id)) {
        foreach ($product_id as $id) {
            delete_product($id);
        }
    } else {
        $sql = "DELETE FROM `product` WHERE `product_id` = ?";
       pdo_execute($sql, [$product_id]);
       redirect('product');
    }
}

?>