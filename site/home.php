<?php
require './dao/product.php';

$top_4_prods = get_product(4, '', 'view'); // lấy 4 sản phẩm có view lớn nhất
$top_10_prod = get_product(10, '', 'view'); // lấy 10 sản phẩm có view lớn nhất
$total_prods_count = get_product_count(); // lấy tổng số sản phẩm

$category_id = $_POST['category'] ?? 'all'; // lấy id của danh mục được chọn
$search = $_POST['search'] ?? ''; // lấy từ khóa tìm kiếm
$pageno =  $_POST['pageno'] ?? 1; // lấy số trang hiện tại

$categories = pdo_query('SELECT `category`.`name`, `category`.`id`, COUNT(`category_id`) AS count FROM `product` JOIN `category` ON `product`.`category_id` = `category`.`id` GROUP BY `category`.`name`, `category`.`id`'); // lấy danh sách loại hàng và số lượng
$main_prods = $category_id == 'all' ? get_product($total_prods_count) : get_product($total_prods_count, $category_id); // lấy sản phẩm theo danh mục


// Cập nhật số sản phẩm nếu thay đổi danh mục
foreach ($categories as $category) {
    if ($category['id'] == $category_id) {
        $current_prods_count = $category['count'];
    }
}

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
    <div class="banner-container">
        <div class="row grid mx-auto">
            <div class="col col-4-6 grid m-2">
                <!-- banner -->
                <div class="jumbotron border border--line">
                    <h1 class="display-4">Welcome to the Home Page</h1>
                    <p class="lead ">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel dignissimos sed cumque, consequuntur iure magnam.</p>
                    <p class="lead">
                        <a class="btn btn--primary inline-block jumbotron__btn" href="#" role="button">Shop Now</a>
                    </p>
                </div>
                <div class="slider">
                    <div class="slide">
                        <img class="img-fluid slide__img" src="https://source.unsplash.com/random?landscape,mountain" alt="" />
                    </div>
                    <div class="slide">
                        <img class="img-fluid slide__img" src="https://source.unsplash.com/random?landscape,cars" alt="" />
                    </div>
                    <div class="slide">
                        <img class="img-fluid slide__img" src="https://source.unsplash.com/random?landscape,night" alt="" />
                    </div>
                    <div class="slide">
                        <img class="img-fluid slide__img" src="https://source.unsplash.com/random?landscape,city" alt="" />
                    </div>

                    <div class="slide__indicator">
                        <ul class="flex indicator-list">
                            <li class="slide__indicator__item"></li>
                            <li class="slide__indicator__item"></li>
                            <li class="slide__indicator__item"></li>
                            <li class="slide__indicator__item"></li>
                        </ul>
                    </div>
                </div>
                <!-- end banner -->
            </div>
            <div class="col col-2-2 grid">
                <!-- top 4 products -->
                <?php foreach ($top_4_prods as $product) { ?>
                    <div class="top-4-prod">
                        <a href="?page=detail&id=<?= $product["product_id"] ?>&category=<?= $product["category_id"] ?>" class="hover-mask" data-content="<?= $product["name"] ?>">
                            <img class="img-fluid top-4-prod__img" src="<?= $product["image"] ?>" alt="<?= $product["name"] ?>" />
                        </a>
                    </div>
                <?php } ?>
                <!-- end top 4 products -->
            </div>
        </div>
    </div>
    <main class="main-container">
        <div class="row grid mx-auto">
            <aside class="col side-menu">
                <!-- category list -->
                <div class="category">
                    <h2 class="title">Danh mục</h2>

                    <!-- dùng form radio làm danh sách danh mục -->
                    <form action="" method="POST" class="category-list">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" id="all" value="all" onclick="javascript: submit()" <?php echo $category_id == "all" ? "checked" : ""; ?>>
                            <label class="form-check-label" for="all">Tất cả - <span><?= $total_prods_count ?></span></label>
                        </div>
                        <?php foreach ($categories as $category) { ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="category" id=<?= $category["id"] ?> value=<?= $category["id"] ?> onclick="javascript: submit()" <?php echo $category_id == $category["id"] ? "checked" : ""; ?>>
                                <label class="form-check-label" for=<?= $category["id"] ?>><?= $category["name"] ?> - <span><?= $category["count"] ?></span></label>
                            </div>
                        <?php } ?>
                        <div class="divider divider-50"></div>
                        <div class="form-filter flex">
                            <button>
                                <i class="fas fa-search"></i>
                            </button>
                            <input type="text" name="search" class="form-control form-filter__input" placeholder="Tìm kiếm sản phẩm">
                        </div>
                    </form>
                </div>
                <!-- end category list -->

                <!-- top 10 product list -->
                <div class="top-10-prod">
                    <h2 class="title">Top 10 ưa chuộng</h2>
                    <div class="top-10-prod__list col-2-2 grid ">
                        <?php foreach ($top_10_prod as $product) { ?>
                            <div class="top-10-prod__item">
                                <a href="?page=detail&id=<?= $product["product_id"] ?>&category=<?= $product["category_id"] ?>" class="hover-mask" data-content="<?= $product["name"] ?>">
                                    <img class="img-fluid top-10-prod__img" src="<?= $product["image"] ?>" alt="<?= $product["name"] ?>" />
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- end top 10 product list -->
            </aside>
            <section class="col">
                <div class="prod-showcase grid">
                    <!-- main product showcase  -->
                    <?php foreach ($display_prods as $prod) { ?>
                        <div class="prod-item">
                            <a href="?page=detail&id=<?= $prod["product_id"] ?>&category=<?= $prod["category_id"] ?>" class="prod-link">
                                <h3 class="prod-item__name truncate theme--dark"><?= $prod["name"] ?></h3>
                                <div class="prod-item__img-wrapper">
                                    <img class="img-fluid prod-item__img" src="<?= $prod["image"] ?>" alt="" />
                                    <span class="prod-item__price"><?= $prod["price"] ?></span>
                                    <i class="fas fa-eye prod-item__view">
                                        <span><?= number_shorten($prod["view"]); ?></span>
                                    </i>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <!-- end main product showcase -->
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
            </section>
        </div>
    </main>
</div>