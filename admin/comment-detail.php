<?php
require './dao/comment.php';
require 'admin-header.php';

$comment = get_comment("", "", "product_id = " . $_GET['id']);
[$pageno, $total_pages, $filtered_items] = pagination($_POST['pageno'] ?? 1, $_POST['search'] ?? "", $comment);
$selected = $_POST['selected'] ?? null;

if ($delete_one = $_POST['delete_one'] ?? false) {
    delete_comment($delete_one);
}
if ($delete_selected = $_POST['delete_selected'] ?? false) {
    delete_comment($selected);
}

?>

<div class="container">
    <!-- product table -->
    <form action="" method="post" class="ta-center table-form">
        <table class="table table-striped mx-auto">
            <thead>
                <tr>
                    <th>Mã Bình Luận</th>
                    <th>Nội Dung</th>
                    <th>Người Bình Luận</th>
                    <th>ngày Bình Luận</th>
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
                <?php foreach ($filtered_items as $comment) { ?>
                    <tr>
                        <td><?= $comment['id'] ?></td>
                        <td><?= $comment['content'] ?></td>
                        <td><?= $comment['username'] ?></td>
                        <td><?= $comment['date'] ?></td>

                        <!-- add checkbox -->
                        <td>
                            <input <?= in_array($comment['product_id'], $selected ?? []) ? 'checked' : '' ?> type="checkbox" name="selected[]" class="selected" value="<?= $product['product_id'] ?>" onClick=" javascript:return submit()">
                        </td>
                        <td class="ta-center">
                            <form action="" method="post" class="delete-one">
                                <input type="hidden" name="delete_one" value="<?= $comment['product_id'] ?>">
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
</div>