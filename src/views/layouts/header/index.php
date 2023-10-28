<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="/images/favicon/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/js/jquery.pan-master/dist/css/jquery.pan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <style>
        #dropdown:hover #dropdown-menu {
            display: block;
        }

        .dropdown-item:hover {
            background-color: #17252a;
            color: white;
        }
    </style>
    <title>Trang chủ</title>
</head>

<body id="body" id="body">
    <header class="fw-bold position-sticky top-0 shadow-sm" style="background-color: #17252a; z-index:  100;">
        <div class="container">
            <div class="row py-2 align-items-center" style="min-height: 60px;">
                <!-- LEFT -->
                <div class="col-md-6 col-6 d-none d-md-block">
                    <div class="text-start">
                        <a class="text-white text-decoration-none fw-bold" href="#"><i
                                class="fas fa-question-circle"></i> Trợ
                            giúp</a>
                        <a class="text-white text-decoration-none fw-bold mx-2" href="#"><i
                                class="fas fa-newspaper"></i> Tin tức</a>
                        <a class="text-white text-decoration-none fw-bold" href="#"><i class="fas fa-tags"></i> Khuyến
                            mãi</a>
                    </div>
                </div>
                <!-- END LEFT -->

                <!-- RIGHT -->
                <div class="col-md-6 col-12 ">
                    <div class="text-center text-md-end d-flex justify-content-md-end justify-content-center">
                        <a class="text-white text-decoration-none fw-bold d-flex align-items-center" href="#">
                            <i class="fas fa-gift"></i>
                            Ưu đãi
                        </a>
                        <div>
                            <?php
                            if (isset($_SESSION['email'])) {
                                echo '
                                    <div id="dropdown" class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" style="box-shadow: none;" data-bs-toggle="dropdown" aria-expanded="false">';
                                echo '<a href="login.php" class="text-decoration-none text-white fw-bold mx-4">';
                                echo '<i class="fa-regular fa-user text-white px-2"></i>';
                                echo explode('@', $_SESSION['email'])[0];
                                echo '</a>';
                                echo '</button>
                                        <ul id="dropdown-menu" class="dropdown-menu ">
                                            <li><a class="dropdown-item" href="#">Tài khoản</a></li>
                                            <li><a class="dropdown-item" href="#">Đơn mua</a></li>
                                            <li>
                                            <form id="logout_form" action="/logout" method="post" class="d-flex flex-column">
                                                <button class="dropdown-item" type="submit">
                                                    <i class="fas fa-sign-in-alt"></i>
                                                    Đăng Xuất
                                                </button>
                                            </form>
                                            </li>
                                        </ul>
                                    </div>  
                                ';
                            } else {
                                echo '
                                    <a class="text-white text-decoration-none fw-bold mx-3" href="/login"><i
                                    class="fas fa-sign-in-alt"></i>
                                     Đăng nhập</a>
                                    <a class="text-white text-decoration-none fw-bold" href="/signup"><i
                                            class="fas fa-user-plus"></i>
                                        Đăng ký</a>
                                    ';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- END RIGHT -->
            </div>
        </div>
        <div class="container-fluid" style="background-color: #3aafa9;">
            <div class="container py-2 px-3">
                <div class="row align-items-center justify-content-around my-1">

                    <div class="col-md-3 col-3 d-flex justify-content-center">
                        <a href="/"> <img src="<?= '/images/logo/store.png'; ?>" alt="" style="width: 175px;"></a>
                    </div>

                    <div class="col-md-6 col-6 d-flex justify-content-end position-relative d-none d-md-block">
                        <input type="text" placeholder="Tìm Kiếm" class="w-100 py-2 px-1 border-0 px-3 rounded-5"
                            style="width: 150px; outline: none;">
                        <i class="fa-solid fa-magnifying-glass position-absolute" style="top: 12px; right: 30px;"></i>
                    </div>

                    <div class="text-center col-md-3 col-3 d-flex d-md-block">
                        <a href="/cart" class="position-relative">
                            <span class="fs-3"><i class="fa-solid fa-cart-shopping text-white"></i></span>
                            <span
                                class="cart-quantity position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                                0
                            </span>
                        </a>
                    </div>

                    <div class="col-md-12 position-relative d-block d-md-none mb-3">
                        <input type="text" placeholder="Tìm Kiếm" class="w-100 py-2 px-1 border-0 px-3 rounded-5"
                            style="width: 150px; outline: none;">
                        <i class="fa-solid fa-magnifying-glass position-absolute" style="top: 12px; right: 30px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </header>