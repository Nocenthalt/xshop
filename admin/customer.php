<?php
require './dao/customer.php';
require 'admin-header.php';

[$pageno, $total_pages, $filtered_items] = pagination($_POST['pageno'] ?? 1, $_POST['search'] ?? "", get_customer());
$selected = $_POST['selected'] ?? null;
$delete_selected = $_POST['delete_selected'] ?? false;
$delete_one = $_POST['delete_one'] ?? false;

?>

<div class="container">
    <!-- customer table -->
    <form action="" method="post" class="ta-center table-form">
        <table class="table table-striped mx-auto">
            <thead>
                <tr>
                    <th>Tên đăng nhập</th>
                    <th>Họ tên</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Vai trò</th>
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
                <?php foreach ($filtered_items as $customer) { ?>
                    <tr>
                        <td><?= $customer['username'] ?></td>
                        <td><?= $customer['name'] ?></td>
                        <td><?= $customer['gender'] ?></td>
                        <td><?= $customer['birthdate'] ?></td>
                        <td><?= $customer['phone_number'] ?></td>
                        <td><?= $customer['email'] ?></td>
                        <td><?= $customer['role'] ? "Admin" : "Khách Hàng" ?></td>
                        <!-- add checkbox -->
                        <?php if ($customer['role'] == 0) : ?>
                            <td>
                                <input <?= in_array($customer['username'], $selected ?? []) ? 'checked' : '' ?> type="checkbox" name="selected[]" class="selected" value="<?= $customer['id'] ?>" onClick=" javascript:return submit()">
                            </td>
                            <td class="ta-center">
                                <a href="?page=edit-customer&username=<?= $customer['username'] ?>" class="btn btn--success">Sửa</a>
                                <form action="" method="post" class="delete-one">
                                    <input type="hidden" name="delete_one" value="<?= $customer['username'] ?>">
                                    <button type="submit" href="#" class="btn btn--danger select" onClick="javascript:return confirm('Bạn có muốn xóa sản phẩm này?')">Xóa</a>
                                </form>
                            </td>
                        <?php else: ?>
                            <td></td>
                            <td></td>
                        <?php endif ?>

                    </tr>
                <?php } ?>
            </tbody>
            <div class="row flex mx-auto">
                <div class="col table-tools__container">
                    <button class="btn btn--primary select_all" name="select_all" value="true">Chọn tất cả</button>
                    <button class="btn btn--outline deselect_all" name="select_all" value="false">Bỏ chọn tất cả</button>
                    <button name="delete_selected" value="true" class="btn btn--danger" onClick="javascript:return confirm('Bạn có muốn xóa các sản phẩm đã chọn?');">Xóa đã chọn</button>
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