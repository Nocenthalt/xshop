<?php
require './dao/product.php';
require './dao/category.php';
require './dao/comment.php';
require 'admin-header.php';
require 'admin-pagination.php';

$selected = $_POST['selected'] ?? null;
$pageno = $_POST['pageno'] ?? $pageno;
$delete_selected = $_POST['delete_selected'] ?? false;
$delete_one = $_POST['delete_one'] ?? false;

if ($delete_one) { delete_product($delete_one); }
if ($delete_selected) { delete_product($selected); }

?>

<div class="container">
    <!-- product table -->
    <form action="" method="post" class="ta-center table-form">
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
                        <td><?= get_comment_count("product_id = {$product['product_id']}") ?></td>
                        <td><?= $product['import_date'] ?></td>
                        <!-- add checkbox -->
                        <td>
                            <input <?= in_array($product['product_id'], $selected ?? []) ? 'checked' : '' ?> type="checkbox" name="selected[]" class="selected" value="<?= $product['product_id'] ?>" onClick=" javascript:return submit()">
                        </td>
                        <td class="ta-center">
                            <a href="?page=detail&id=<?= $product['product_id'] ?>" class="btn btn--primary">Xem</a>
                            <a href="?page=edit&id=<?= $product['product_id'] ?>" class="btn btn--success">Sửa</a>
                            <form action="" method="post" class="delete-one">
                                <input type="hidden" name="delete_one" value="<?= $product['product_id'] ?>">
                                <button type="submit" href="#" class="btn btn--danger select" onClick="javascript:return confirm('Bạn có muốn xóa sản phẩm này?')">Xóa</a>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <div class="row flex">
                <div class="col table-tools__container">
                    <button class="btn btn--primary select_all" name="select_all" value="true">Chọn tất cả</button>
                    <button class="btn btn--outline deselect_all" name="select_all" value="false">Bỏ chọn tất cả</button>
                    <button name="delete_selected" value="true" class="btn btn--danger" onClick="javascript:return confirm('Bạn có muốn xóa các sản phẩm đã chọn?');">Xóa đã chọn</button>
                </div>
                <div class="col">
                    <div class="pagination flex mx-auto">
                        <form method="post">
                            <button type="submit" name="pageno" value=<?= $pageno - 1 ?>><i class="fas fa-chevron-left"></i></button>
                            <button type="submit" disabled class="pagination__link btn btn--primary-o" name="pageno" value=<?= $pageno ?>> <?= $pageno ?> </button>
                            <button type="submit" name="pageno" value=<?= $pageno + 1 ?>><i class="fas fa-chevron-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </table>
    </form>

    <div class="table-tools">
    </div>

</div>