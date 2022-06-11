<?php
require './dao/product.php';
require './dao/category.php';
require 'admin-header.php';
require 'admin-pagination.php';
// get category list
$select = $_POST['select'] ?? null;

$pageno = $_POST['pageno'] ?? $pageno;
$delete_selected = $_POST['delete_selected'] ?? false;

if ($delete_selected) {
    print_r($select);
    // $pageno = $_POST['pageno'] ?? $pageno;
}
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
                            <input type="text" name="search" class="form-control search-bar">
                        </div>
                    </form>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filtered_products as $product) { ?>
                <tr>
                    <td><?= $product['product_id'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['price'] ?></td>
                    <td><?= get_category($product['category_id'])[0]['name'] ?></td>
                    <td><?= $product['view'] ?></td>
                    <td><?= $product['view'] ?></td>
                    <td><?= $product['import_date'] ?></td>
                    <!-- add checkbox -->
                    <td>
                        <form action="" method="post" class="ta-center">
                            <input type="checkbox" name="select" id="select" value="$product['product_id']">
                        </form>
                    </td>
                    <td class="ta-center">
                        <a href="?page=detail&id=<?= $product['product_id'] ?>" class="btn btn--primary">Xem</a>
                        <a href="?page=edit&id=<?= $product['product_id'] ?>" class="btn btn--success">Sửa</a>
                        <a href="?page=delete&id=<?= $product['product_id'] ?>" class="btn btn--danger" onClick="javascript:return confirm('Bạn có muốn xóa sản phẩm này?')">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="table-tools">
        <div class="row flex">
            <div class="col">
                <div class="pagination flex mx-auto">
                    <!-- <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                        <form action="" method="POST" class="pagination-form">
                            <input type="hidden" name="pageno" value="<?= $i ?>">
                            <button type="submit" class="pagination__link btn btn--primary-o <?= $i == $pageno ? "pagination__link--active" : "" ?> ">
                                <?= $i ?>
                            </button>
                        </form>
                    <?php } ?> -->
                    <form method="post">
                        <button type="submit" name="pageno" value=<?= $pageno - 1 ?>><i class="fas fa-chevron-left"></i></button>
                        <button type="submit" disabled class="pagination__link btn btn--primary-o" name="pageno" value=<?= $pageno ?>> <?= $pageno ?> </button>
                        <button type="submit" name="pageno" value=<?= $pageno + 1 ?>><i class="fas fa-chevron-right"></i></button>
                    </form>
                </div>
            </div>
            <div class="col table-tools__container">
                <button type="submit" class="btn btn--primary select_all" name="select_all" value="true">Chọn tất cả</button>
                <button type="submit" class="btn btn--outline deselect_all" name="select_all" value="false">Bỏ chọn tất cả</button>
                <form method="post">
                    <input type="hidden" name="delete_selected" value="true">
                    <button type="submit" class="btn btn--danger" onClick="javascript:return confirm('Bạn có muốn xóa các sản phẩm đã chọn?');">Xóa đã chọn</button>
                </form>
            </div>
        </div>
    </div>

</div>