<?php

function get_product()
{
    $sql = "SELECT `product`.*, COUNT(`view`.`username`) AS `view` FROM `product` LEFT JOIN `view` ON `product`.`product_id` = `view`.`product_id` GROUP BY `product`.`name`";
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

//them view
function add_view($product_id)
{
    //check if this product already has already been viewed by user
    $sql = "SELECT * FROM `view` WHERE `product_id` = ? AND `username` = ?";
    $data = pdo_query($sql, [$product_id, $_SESSION['username']]);

    if (count($data) == 0) {
        //log this view
        $sql = "INSERT INTO `view` (`product_id`, `username`) VALUES (?, ?)";
        pdo_execute($sql, [$product_id, $_SESSION['username']]);
    }
}

function get_view($product_id)
{
    $sql = "SELECT COUNT(*) AS `view` FROM `view` WHERE `product_id` = ?";
    return pdo_query_once($sql, [$product_id])["view"];
}


//sắp xếp sản phẩm
function sort_product($products, $sortBy, $order = 0)
{
    if(!$sortBy) return $products;
    $col = array_column($products, $sortBy);
    array_multisort($col, ($order ? SORT_DESC : SORT_ASC), $products);
    return $products;
}

//lọc sản phẩm
function filter_product($products, $filterBy, $value)
{
    $result = array_filter($products, function ($item) use ($filterBy, $value) {
        return ($item[$filterBy] == $value);
    });
    return $result;
}
//chọn số lượng sản phẩm
function truncate_product($products, $no_items)
{
    return array_slice($products, 0, $no_items ?? count($products));
}
