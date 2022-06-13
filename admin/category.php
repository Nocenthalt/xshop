<?php
require './dao/product.php';
require './dao/category.php';
require 'admin-header.php';

[$pageno, $total_pages, $filtered_items] = pagination($_POST['pageno'] ?? 1,$_POST['search'] ?? "", get_all_category() );
$selected = $_POST['selected'] ?? null;
$delete_selected = $_POST['delete_selected'] ?? false;
$delete_one = $_POST['delete_one'] ?? false;

?>

<div class="container">
    <!-- category table -->
    <form action="" method="post" class="ta-center table-form">
        <table class="table table-striped mx-auto">
            <thead>
                <tr>
                    <th>Mã loại</th>
                    <th>Tên loại</th>
                    <th>Số lượng hàng hóa</th>
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
                <?php foreach ($filtered_items as $category) { ?>
                    <tr>
                        <td><?= $category['id'] ?></td>
                        <td><?= $category['name'] ?></td>
                        <td><?= get_category_count($category['id']) ?></td>
                        <!-- add checkbox -->
                        <td>
                            <input <?= in_array($category['id'], $selected ?? []) ? 'checked' : '' ?> type="checkbox" name="selected[]" class="selected" value="<?= $category['id'] ?>" onClick=" javascript:return submit()">
                        </td>
                        <td class="ta-center">
                            <a href="?page=edit-category&id=<?= $category['id'] ?>" class="btn btn--success">Sửa</a>
                            <form action="" method="post" class="delete-one">
                                <input type="hidden" name="delete_one" value="<?= $category['id'] ?>">
                                <button type="submit" href="#" class="btn btn--danger select" onClick="javascript:return confirm('Bạn có muốn xóa sản phẩm này?')">Xóa</a>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <div class="row flex mx-auto">
                <div class="col table-tools__container">
                    <button class="btn btn--primary select_all" name="select_all" value="true">Chọn tất cả</button>
                    <button class="btn btn--outline deselect_all" name="select_all" value="false">Bỏ chọn tất cả</button>
                    <button name="delete_selected" value="true" class="btn btn--danger" onClick="javascript:return confirm('Bạn có muốn xóa các sản phẩm đã chọn?');">Xóa đã chọn</button>
                    <a href="?page=add-category" class="btn btn--success">Thêm mới</a>
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