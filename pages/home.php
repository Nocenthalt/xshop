<?php
$top_4_prods_sql = 'SELECT * FROM `product` ORDER BY `view` DESC LIMIT 4';
$top_4_prods = pdo_query($top_4_prods_sql);

// get 12 products 
$main_prods_sql = 'SELECT * FROM `product` LIMIT 12';
$main_prods = pdo_query($main_prods_sql);

$categories = pdo_query('SELECT * FROM `category`');
print_r($categories);

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