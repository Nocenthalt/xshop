<?php
require './dao/product.php';

$top_4_prods = get_product(null, 'view', 4);
$total_prods_count = get_product_count();
$category_id = $_POST['category'] ??'all';
$main_prods = $category_id == 'all' ? get_product(null, null, 12) : get_product($category_id, null, 12); 
$categories = pdo_query('SELECT `category`.`name`, `category`.`id`, COUNT(`category_id`) AS count FROM `product` JOIN `category` ON `product`.`category_id` = `category`.`id` GROUP BY `category`.`name`, `category`.`id`'); // lấy danh sách loại hàng và số lượng


?>
<div class="container">
    <div class="banner-container">
        <div class="row grid mx-auto">
            <div class="col col-4-6 grid m-2">
                <div class="jumbotron border border--line">
                    <h1 class="display-4">Welcome to the Home Page</h1>
                    <p class="lead ">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                    <p class="">It uses utility classes for typography and spacing to space content out within the larger container.</p>
                    <p class="lead">
                        <a class="btn btn--primary inline-block" href="#" role="button">Learn more</a>
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
            </div>
            <div class="col col-2-2 grid">
                <?php
                foreach ($top_4_prods as $product) {
                    echo "<div class='top-4-prod'>
                            <a href='' class='hover-mask' data-content='{$product['name']}'>
                             <img class='img-fluid top-4-prod__img' src='{top-4-prod['image']}' alt='{$product['name']}' />
                            </a>
                          </div>
                         ";
                }
                ?>
            </div>
        </div>
    </div>
    <main class="main-container">
        <div class="row grid mx-auto">
            <section class="col">
                <!-- category list -->
                <div class="category">
                    <h2 class="title">Danh mục</h2>
                </div>
                <form action="" method="POST" class="category-list">
                    <!-- dùng form radio làm danh sách danh mục -->
                   <div class='form-check'>
                        <input 
                            class='form-check-input' 
                            type='radio' 
                            name='category' 
                            id='all' 
                            value='all' 
                            onclick='javascript: submit()' 
                            <?php echo $category_id == 'all' ? "checked" : ""; ?>
                            >
                        <label class='form-check-label' for='all'>Tất cả - <span><?=$total_prods_count?></span></label>
                    </div>
                    <?php foreach ($categories as $category) { ?>
                        <div class='form-check'>
                            <input 
                                class='form-check-input' 
                                type='radio' 
                                name='category' 
                                id=<?=$category['id']?> 
                                value=<?=$category['id']?> 
                                onclick='javascript: submit()' 
                                <?php echo $category_id == $category['id'] ? "checked" : ""; ?>
                            >
                            <label class='form-check-label' for=<?=$category['id']?> ><?=$category['name']?> - <span><?= $category['count'] ?></span></label>
                        </div>
                        <?php } ?>
                </form>
            </section>
            <section class="col">
                <div class="prod-showcase grid">
                    <?php foreach ($main_prods as $prod) {
                        echo
                        "
                            <div class='prod-item'>
                              <a href='' class='prod-link'>
                                <h3 class='prod-item__name truncate theme--dark'>{$prod['name']}</h3>
                                <div class='prod-item__img-wrapper'>
                                <img class='img-fluid prod-item__img' src='{$prod['image']}' alt='' />
                                <span class='prod-item__price'>{$prod['price']}</span>
                                <i class='fas fa-eye prod-item__view'>
                                 <span class=''>{$prod['view']}</span>
                                </i>
                                
                                </div>
                                
                             </a>
                            </div>
                        ";
                    } ?>
                </div>
            </section>
        </div>
    </main>
</div>