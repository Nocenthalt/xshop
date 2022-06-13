<?php
require './dao/customer.php';
require './dao/statistic.php';
require 'admin-header.php';

[$pageno, $total_pages, $filtered_items] = pagination($_POST['pageno'] ?? 1, $_POST['search'] ?? "", get_customer());
$selected = $_POST['selected'] ?? null;
$categories = pdo_query('SELECT DISTINCT `category`.`name`, `category`.`id`, COUNT(`category_id`) AS count FROM `product` JOIN `category` ON `product`.`category_id` = `category`.`id` GROUP BY `category`.`name`, `category`.`id`'); // lấy danh sách loại hàng và số lượng
?>

<div class="container">
    <!-- customer table -->
    <form action="" method="post" class="ta-center table-form">
        <table class="table table-striped mx-auto">
            <thead>
                <tr>
                    <th>Loại Hàng</th>
                    <th>Số lượng</th>
                    <th>Giá cao nhất</th>
                    <th>Giá thấp nhất</th>
                    <th>Giá trung bình</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) { ?>
                    <tr>
                        <td><?= $category['name'] ?></td>
                        <td><?= $category['count'] ?></td>
                        <td><?= get_product_price($category['id'], "HIGH") ?></td>
                        <td><?= get_product_price($category['id'], "LOW") ?></td>
                        <td><?= number_format(get_product_price($category['id'], "AVG"), 2) ?></td>

                        <!-- add checkbox -->
                    </tr>
                <?php } ?>
            </tbody>
            <div class="row flex mx-auto">
                    <a href="?page=graph" class="btn btn--outline">Xem Biểu Đồ</a>
            </div>
        </table>
    </form>

</div>