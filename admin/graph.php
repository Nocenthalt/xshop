<?php
require './dao/product.php';
require 'admin-header.php';
$categories = pdo_query('SELECT `category`.`name`, `category`.`id`, COUNT(`category_id`) AS count FROM `product` JOIN `category` ON `product`.`category_id` = `category`.`id` GROUP BY `category`.`name`, `category`.`id`'); // lấy danh sách loại hàng và số lượng
$categoryView =  pdo_query('SELECT `category`.`name`,  SUM( `view`) as view FROM `product` JOIN `category` ON `product`.`category_id` = `category`.`id` GROUP BY `category`.`name`'); // lấy danh sách loại hàng và số lượng
$comment = pdo_query('SELECT `category`.`name`,  COUNT(DISTINCT `content`) as comment_count FROM `product` JOIN `comment` ON `product`.`product_id` = `comment`.`product_id` JOIN `category` ON `product`.`category_id` = `category`.`id` GROUP BY `category`.`name`');
$product = get_product("","","view DESC");
?>

<div class="container">
    <script>
        var data = <?php echo json_encode($categories, JSON_HEX_TAG); ?>;
        var categoryView = <?php echo json_encode($categoryView, JSON_HEX_TAG); ?>;
        var comment = <?php echo json_encode($comment, JSON_HEX_TAG); ?>;
        var product = <?php echo json_encode($product, JSON_HEX_TAG); ?>;
    </script>
    <div class="row mx-auto">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <canvas id="product_chart" class="product-chart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <canvas id="popularity_chart" class="popularity_chart"></canvas>
                </div>
                <button class="btn btn--primary detail">
                    Chi tiết
                </button>
            </div>
        </div>
    </div>
</div>