<?php
//quyền hạn người dùng, mặc định là 3;
$role = $_SESSION['role'] ?? 3; //khách xem
$username;
?>

<link rel="stylesheet" type="text/css" href="./content/css/header.css" />
<header id="header">
    <nav class="nav">
        <div class="mx-auto grid nav__container pos-r my-2">
            <a href="?page=home" class="nav__logo block">
                <img src="./content/img/logo.png" class="img-fluid" alt="Xshop Logo" />
            </a>
            <div class="nav__menu flex">
                <div class="wrapper">
                    <button data-collapse-toggle="mobile-menu" type="button" class="nav__btn btn btn--primary-a" aria-controls="mobile-menu" aria-expanded="false">
                        <i class="fas fa-user nav__btn__icon"></i>
                    </button>
                    <!-- if user logged in, display a different menu -->
                    <?php if ($role == 0) : ?>
                        <div class="nav__dropdown fadeIn ts-2 hidden" id="dd-2">
                            <ul class="nav__list">
                                <div class="nav__menu__user__avatar">
                                    <img src="<?= $_SESSION['avatar'] ?>" class="img-fluid user-avatar" alt="User Avatar" />
                                </div>
                                <div class="nav__menu__user__name">
                                    <p><?= $_SESSION['username'] ?></p>
                                </div>
                                <li class="nav__item">
                                    <a href="?page=profile" class="nav__link nav__link--main block">Cập nhật tài khoản</a>
                                </li>
                                <li class="nav__item t-center">
                                    <a href="?page=logout" class="nav__link nav__link--main block theme--dark">Đăng xuất</a>
                                </li>
                            </ul>
                        </div>
                        <!-- admin -->
                    <?php elseif ($role == 1) : ?>
                        <div class="nav__dropdown fadeIn ts-2 hidden" id="dd-2">
                            <ul class="nav__list">
                                <div class="nav__menu__user__avatar">
                                    <img src="<?= $_SESSION['avatar'] ?? './content/img/default-' . rand(1, 4) . '.webp' ?>" class="img-fluid user-avatar" alt="User Avatar" />
                                </div>
                                <div class="nav__menu__user__name">
                                    <p><?= $_SESSION['username'] ?></p>
                                </div>
                                <li class="nav__item">
                                    <a href="?page=profile" class="nav__link nav__link--main block">Cập nhật tài khoản</a>
                                </li>
                                <li class="nav__item">
                                    <a href="?page=product" class="nav__link nav__link--main block">Quản trị website</a>
                                </li>
                                <li class="nav__item t-center">
                                    <a href="?page=logout" class="nav__link nav__link--main block theme--dark">Đăng xuất</a>
                                </li>
                            </ul>
                        </div>
                        <!-- menu mặc định -->
                    <?php else : ?>
                        <div class="nav__dropdown fadeIn ts-2 hidden" id="dd-2">
                            <ul class="nav__list">
                                <li class="nav__item">
                                    <a href="#" class="nav__link nav__link--main block">Quên mật khẩu</a>
                                </li>
                                <li class="nav__item">
                                    <a href="?page=register" class="nav__link nav__link--main block">Đăng ký tài khoản</a>
                                </li>
                                <li class="nav__item t-center">
                                    <a href="?page=login" class="nav__link nav__link--main block theme--dark">Đăng nhập</a>
                                </li>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- Giỏ hàng -->
                <div class="wrapper">
                    <?php
                    $cart_total = count($_SESSION['cart'] ?? []);
                    ?>
                    <!-- giấu icon giỏ hàng nếu là admin -->
                    <?php if ($role == 0) : ?>
                        <button data-collapse-toggle="mobile-menu" type="button" class="nav__btn btn btn--primary-a" aria-controls="mobile-menu" aria-expanded="false">
                            <i class="fas fa-shopping-cart nav__btn__icon"><span class="amount"><?= $cart_total ?></span></i>
                        </button>
                    <?php endif; ?>
                    <div class="nav__dropdown fadeIn ts-2 hidden" id="dd-1">
                        <ul class="nav__list">
                            <?php if ($cart_total) : ?>
                                <?php foreach ($_SESSION['cart'] as $cart_item) : ?>
                                    <li class="nav__item">
                                        <?php if (isset($cart_item["product_image"])) : ?>
                                            <div class="nav__link nav__link--main flex">
                                                <img class="thumbnail" src="<?= $cart_item["product_image"] ?>" alt="<?= $cart_item['product_name'] ?>">
                                                <p><?= $cart_item["product_name"] ?></p>
                                                <span>x <?= $cart_item["amount"] ?></span>
                                            </div>
                                        <?php else : ?>
                                            <div class="nav__link nav__link--main flex">
                                                <img class="thumbnail" alt="<?= $cart_item['product_name'] ?>">
                                                <p><?= $cart_item['product_name'] ?></p>
                                                <span>x <?= $cart_item["amount"] ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <a href="?page=cart">
                                <li class="nav__link nav__link--main btn btn--primary">
                                    Xem chi tiết giỏ hàng
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="wrapper">
                    <button data-collapse-toggle="mobile-menu" type="button" class="nav__btn btn btn--primary-a" aria-controls="mobile-menu" aria-expanded="false">
                        <i class="fas fa-bars nav__btn__icon"></i>
                    </button>
                    <div class="nav__dropdown fadeIn ts-2 hidden" id="dd-3">
                        <ul class="nav__list">
                            <li class="nav__item">
                                <a href="?page=home" class="nav__link nav__link--main block">Trang Chủ</a>
                            </li>
                            <li class="nav__item">
                                <a href="#" class="nav__link nav__link--main block">Hỏi Đáp</a>
                            </li>
                            <li class="nav__item">
                                <a href="#" class="nav__link nav__link--main block">Giới Thiệu</a>
                            </li>
                            <li class="nav__item">
                                <a href="#" class="nav__link nav__link--main block">Liên Hệ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>