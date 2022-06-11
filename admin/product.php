<?php
require 'admin-header.php';
require './dao/product.php';

$all_products = get_product();
$total_prods_count = count($all_products);
$pageno =  $_POST['pageno'] ?? 1; // lấy số trang hiện tại
$search = $_POST['search'] ?? '';
$select_all = $_POST['select_all'] ?? 'false';
$main_prods =  get_product($total_prods_count); // lấy sản phẩm theo danh mục


// Tìm kiếm tên sản phẩm
if ($search != '') {
    $main_prods =  array_filter($main_prods, function ($prod) use ($search) {
        $clean_target = strtolower($prod['name']);
        $clean_search = trim(strtolower($search));

        return strpos($clean_target, $clean_search) !== false;
    });
}

// Phân trang
$prods_per_page = 12; // số sản phẩm trên một trang
$total_prods = count($main_prods); // tổng số sản phẩm
$offset = ($pageno - 1) * $prods_per_page; // vị trí bắt đầu lấy sản phẩm
$total_pages = ceil($total_prods / $prods_per_page); // tổng số trang
$display_prods = array_slice($main_prods, $offset, $prods_per_page); // sản phẩm hiển thị trên một trang


?>

<div class="container">
    <!-- product table -->
    <table class="table table-striped mx-auto">
        <thead>
            <tr>
                <th>Mã hàng</th>
                <th>Tên sản phẩm</th>
                <th>Đơn Giá</th>
                <th>Loại hàng</th>
                <th>Số lượt xem</th>
                <th>Số bình luận</th>
                <th>Ngày nhập</th>
                <th class="ta-center"></th>
                <!-- search bar -->
                <th>
                    <form method="post">
                        <div class="form-filter flex">
                            <button>
                                <i class="fas fa-search"></i>
                            </button>
                            <input type="text" name="search" class="form-control search-bar" >
                        </div>
                    </form>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($display_prods as $product) { ?>
                <tr>
                    <td><?php echo $product['product_id'] ?></td>
                    <td><?php echo $product['name'] ?></td>
                    <td><?php echo $product['price'] ?></td>
                    <td><?php echo $product['category_id'] ?></td>
                    <td><?php echo $product['view'] ?></td>
                    <td><?php echo $product['view'] ?></td>
                    <td><?php echo $product['import_date'] ?></td>
                    <!-- add checkbox -->
                    <td>
                        <form action="" method="post" class="ta-center">
                            <input type="checkbox" name="select" id="select" value="$product['product_id']">
                        </form>
                    </td>
                    <td class="ta-center">
                        <a href="?page=detail&id=<?php echo $product['product_id'] ?>" class="btn btn-primary">Xem</a>
                        <a href="?page=edit&id=<?php echo $product['product_id'] ?>" class="btn btn-success">Sửa</a>
                        <a href="?page=delete&id=<?php echo $product['product_id'] ?>" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="pagination flex mx-auto">
        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
            <form action="" method="POST" class="pagination-form">
                <input type="hidden" name="pageno" value="<?= $i ?>">
                <button type="submit" class="pagination__link btn btn--primary-o <?= $i == $pageno ? "pagination__link--active" : "" ?> ">
                    <?= $i ?>
                </button>
            </form>
        <?php } ?>
    </div>

</div>