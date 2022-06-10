<!DOCTYPE html>
<html lang="vn">

<head>
    <title>X-shop</title>

    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="description" content="X-shop E-commerce">
    <meta name="keywords" content="X-shop, E-commerce">
    <meta name="author" content="X-shop">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="./content/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="./content/css/style.css" />
    <link rel="stylesheet" type="text/css" href="./content/css/util.css" />
    <link rel="stylesheet" type="text/css" href="./content/css/theme.css" />
    <link rel="stylesheet" type="text/css" href="./content/css/header.css" />
    <link rel="stylesheet" type="text/css" href="./content/css/footer.css" />
    <script src="https://kit.fontawesome.com/33c0badbf8.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="./content/js/header.js"></script>
</head>

<body>
    <div id="wrapper">
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
                                                <img src="<?= $_SESSION['avatar'] ?? './content/img/default-' . rand(1, 4) . '.webp' ?>" class="img-fluid user-avatar" alt="User Avatar" />
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
                                                <a href="#" class="nav__link nav__link--main block">Cập nhật tài khoản</a>
                                            </li>
                                            <li class="nav__item">
                                                <a href="#" class="nav__link nav__link--main block">Quảng trị website</a>
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
                            <button data-collapse-toggle="mobile-menu" type="button" class="nav__btn btn btn--primary-a" aria-controls="mobile-menu" aria-expanded="false">
                                <i class="fas fa-bars nav__btn__icon"></i>
                            </button>
                            <div class="nav__dropdown fadeIn ts-2 hidden" id="dd-1">
                                <ul class="nav__list">
                                    <li class="nav__item">
                                        <a href="#" class="nav__link nav__link--main block">Trang Chủ</a>
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
        <!--End_header-->