<html>

<head>
    <title>X-shop</title>

    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="description" content="X-shop E-commerce">
    <meta name="keywords" content="X-shop, E-commerce">
    <meta name="author" content="X-shop">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="./public/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="./public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="./public/css/util.css" />
    <link rel="stylesheet" type="text/css" href="./public/css/theme.css" />
    <link rel="stylesheet" type="text/css" href="./public/css/header.css" />
    <!-- không nên dùng tailwind trong giai đoạn production -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <script src="https://kit.fontawesome.com/33c0badbf8.js" crossorigin="anonymous"></script>
    <script src="./public/js/header.js"></script>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <!-- tailwind nav -->
            <nav class="nav">
                <div class="container mx-auto grid nav__container pos-r my-2">
                    <a href="#" class="nav__logo block">
                        <img src="./public/img/logo.png" class="img-fluid" alt="Xshop Logo" />
                    </a>
                    <div class="nav__menu flex">
                    <div class="wrapper">
                            <button data-collapse-toggle="mobile-menu" type="button" class="nav__btn btn btn--primary-a" aria-controls="mobile-menu" aria-expanded="false">
                                <i class="fas fa-user nav__btn__icon"></i>
                            </button>
                            <div class="nav__dropdown fadeIn ts-2 hidden" id="dd-2">
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
        </div>
        <!--End_header-->