<link rel="stylesheet" type="text/css" href="./content/css/admin_header.css" />
<header id="header">
    <div class="admin-sidebar">
        <a href="?page=home" class="sidebar-logo">
            <img src="./content/img/logo.png" alt="Xshop Logo" />
        </a>
        <div class="sidebar-menu">
            <ul>
                <li class="sidebar__item">
                    <a href="?page=product" class="">Hàng hóa</a>
                </li>
                <li class="sidebar__item">
                    <a href="?page=category" class="">Loại hàng</a>
                </li>
                <li class="sidebar__item">
                    <a href="?page=customer" class="">Khách hàng</a>
                </li>
                <li class="sidebar__item">
                    <a href="?page=comment" class="">Bình Luận</a>
                </li>
                <li class="sidebar__item">
                    <a href="?page=statistic" class="">Thống kê</a>
                </li>
            </ul>
        </div>
    </div>
    <nav class="nav">
        <div class="mx-auto grid nav__container pos-r my-2">
            <div class="page-title-container">
                <h1 class="page-title">Hàng Hóa</h1>
            </div>
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
            </div>
        </div>
    </nav>

</header>