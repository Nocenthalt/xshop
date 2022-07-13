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
                            <?php if (isset($_SESSION['role'])) : ?>
                                <?php if ($_SESSION['role'] == 0) : ?>
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
                                <?php elseif ($_SESSION['role'] == 1) : ?>
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
                                <?php endif; ?>
                                <!-- else display current menu -->
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
                        <div class="wrapper">
                            <?php
                            $cart_total = count($_SESSION['cart'] ?? []);
                            ?>
                            <button data-collapse-toggle="mobile-menu" type="button" class="nav__btn btn btn--primary-a" aria-controls="mobile-menu" aria-expanded="false">
                                <i class="fas fa-shopping-cart nav__btn__icon"><span class="amount"><?= $cart_total ?></span></i>
                            </button>
                            <div class="nav__dropdown fadeIn ts-2 hidden" id="dd-1">
                                <ul class="nav__list">
                                    <?php if($cart_total): ?>
                                    <?php foreach ($_SESSION['cart'] as $cart_item) : ?>
                                        <li class="nav__item">
                                            <p class="nav__link nav__link--main">
                                                <span><?= $cart_item["amount"] ?> x </span>
                                                <?= $cart_item["product_image"] ? $cart_item["product_image"] : $cart_item["product_name"] ?>
                                            </p>
                                        </li>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
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