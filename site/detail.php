<?php
require './dao/product.php';
//query product with product_id = $_GET['id'] using pdo_query
$product = pdo_query("SELECT * FROM `product` WHERE `product_id` = ?", [$_GET['id']]);
$comments = pdo_query("SELECT * FROM `comment` WHERE `product_id` = ? ORDER BY `date` DESC", [$_GET['id']]);
$comments_count = count($comments);
$top_9_prod = get_product(9, $_GET['category'] ?? '', 'view'); // lấy 10 sản phẩm có view lớn nhất

if (isset($_POST['comment'])) {
    if (!isset($_SESSION['user'])) {
        echo '<script>alert("Bạn phải đăng nhập để bình luận!");</script>';
    } else {
        $content = $_POST['content'];
        $date = date('Y-m-d H:i:s');
        $username = $_SESSION['username'];
        $product_id = $_GET['id'];
        pdo_query("INSERT INTO `comment` (`content`, `date`, `username`, `product_id`) VALUES (?, ?, ?, ?)", [$content, $date, $username, $product_id]);
        redirect('detail&id=' . $product_id . '&category=' . $_GET['category']);
    }
}

?>

<div class="container">
    <main class="product-hero grid theme--primary-500 mx-auto">
        <div class="product-hero__image">
            <!-- <img class="img-fluid" src="<?php echo $product[0]['image'] ?>" alt=""> -->
            <img src="https://source.unsplash.com/random?landscape,city" class="img-fluid" alt="">
        </div>
        <div class="product-hero__info theme--primary">
            <h1><?= $product[0]['name'] ?></h1></span>
            <p class="product-hero__price"><?= $product[0]['price'] ?>₫</p>
            <p class="product-hero__id"> Mã: <?= $product[0]['product_id'] ?></p>
            <div class="product-hero__view">
                <div data-tooltip="Lượt xem" class="product-hero__view-item tooltip">
                    <span class="product-hero__view-item-icon">
                        <i class="fas fa-eye"></i>
                    </span>
                    <span class="product-hero__view-item-text">
                        <?= number_shorten($product[0]['view']) ?>
                    </span>
                </div>
                <div data-tooltip="Lượt bình luận" class="product-hero__view-item tooltip">
                    <span class="product-hero__view-item-icon">
                        <i class="fas fa-comment-alt"></i>
                    </span>
                    <span class="product-hero__view-item-text">
                        <?= number_shorten($comments_count) ?>
                    </span>
                </div>
            </div>
            <p class="product-hero__desc"><?= $product[0]['description'] ?></p>
            <div class="btn-back btn">
                <a href="index.php">
                    <i class="fas fa-arrow-left"></i>
                    <span>Trở về</span>
                </a>
            </div>
        </div>
    </main>
    <div class="other-section grid mx-auto">
        <div class="col comment-section">
            <div class="title"> Bình luận: <span class="comment-count">(<?= number_shorten($comments_count) ?>)</span> </div>
            <div class="commit-section__content">
                <form action="" METHOD="POST" class="commit-section__content__form grid mx-auto">
                    <input type="hidden" name="comment" value="true">
                    <div class="commit-section__content__avatar">
                        <img class="img-fluid" src="<?= $_SESSION['avatar'] ?>" alt="">
                    </div>
                    <div class="form-group">
                        <textarea name="content" id="" class="form-control border border--line form-comment" placeholder="Nhập nội dung"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn--primary form-comment__submit">Gửi</button>
                    </div>
                </form>
                <div class="divider"></div>
                <div class="product-comment">
                    <?php foreach ($comments as $comment) {
                        $user_avatar = pdo_query("SELECT `avatar` FROM `users` WHERE `username` = ?", [$comment['username']]);
                    ?>
                        <div class="product-comment__item grid">
                            <div class="product-comment__item-avatar">
                                <img class="img-fluid" src="<?= $user_avatar[0]['avatar'] ?>" alt="">
                            </div>
                            <div class="product-comment__item-content">
                                <p class="product-comment__item-name"><?= $comment['username'] ?> <span class="product-comment__item-date"> · <?= $comment['date'] ?></span></p>

                                <div class="product-comment__item-comment"><?= $comment['content'] ?></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="top-9-prod">
                <h2 class="title">Sản phẩm tương tự</h2>
                <div class="top-9-prod__list col-3-3 grid">
                    <?php foreach ($top_9_prod as $product) { ?>
                        <div class="top-9-prod__item">
                            <a href="?page=detail&id=<?= $product["product_id"] ?>&category=<?= $product["category_id"] ?>" class="hover-mask" data-content="<?= $product["name"] ?>">
                                <img class="img-fluid top-9-prod__img" src="<?= $product["image"] ?>" alt="<?= $product["name"] ?>" />
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </aside>
</div>