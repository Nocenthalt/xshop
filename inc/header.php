<html>

<head>
    <title>X-shop</title>

    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="description" content="X-shop E-commerce">
    <meta name="keywords" content="X-shop, E-commerce">
    <meta name="author" content="X-shop">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="./public/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="./public/css/root.css" />
    <link rel="stylesheet" type="text/css" href="./public/css/style.css" />
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
            <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded">
                <div class="container flex flex-wrap justify-between items-center mx-auto">
                    <a href="#" class="flex items-center">
                        <img src="./public/img/logo.png" class="nav__logo img-fluid" alt="Xshop Logo" />
                    </a>
                    <button data-collapse-toggle="mobile-menu" type="button" class="inline-flex btn btn--primary" aria-controls="mobile-menu" aria-expanded="false">
                       
                    </button>
                    <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
                        <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                            <li>
                                <!-- This example requires Tailwind CSS v2.0+ -->
                                <div class="relative inline-block text-left nav__dropdown">
                                    <div>
                                        <button type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                            <!-- Menu Icon -->
                                            <svg class="mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                <path d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" />
                                            </svg>
                                        
                                        </button>
                                    </div>

                                    <div class="nav__dropdown__menu hidden origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                        <div class="py-1" role="none">
                                            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Account settings</a>
                                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">Support</a>
                                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">License</a>
                                            <form method="POST" action="#" role="none">
                                                <button type="submit" class="text-gray-700 block w-full text-left px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-3">Sign out</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!--End_header-->