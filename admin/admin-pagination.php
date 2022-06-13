<?php
$pageno =  $_POST['pageno'] ?? 1; // lấy số trang hiện tại
$search = $_POST['search'] ?? '';


// Tìm kiếm tên sản phẩm
if ($search != '') {
    $total_products =  array_filter($total_items, function ($prod) use ($search) {
        $clean_target = strtolower($prod['name']);
        $clean_search = trim(strtolower($search));

        return strpos($clean_target, $clean_search) !== false;
    });
}

// Phân trang
$prods_per_page = 12; // số sản phẩm trên một trang
$total_prods = count($total_items); // tổng số sản phẩm
$offset = ($pageno - 1) * $prods_per_page; // vị trí bắt đầu lấy sản phẩm
$total_pages = ceil($total_prods / $prods_per_page); // tổng số trang
$filtered_items= array_slice($total_items, $offset, $prods_per_page); // sản phẩm hiển thị trên một trang
