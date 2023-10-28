<?php include_once VIEWS_DIR . "/layouts/header/index.php"; ?>

<style>
    .product img:hover {
        scale: 1.2;
        transition: all 0.5s;
    }
</style>

<main>
    <section class="p-3">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-md-3 col-12 bg-white">
                    <p>Menu</p>
                    <p class="mb-0 fw-bold mb-0 mb-md-3"><a href="" class="text-decoration-none text-black">Truyện
                            ngắn
                        </a>
                    </p>
                    <p class="mb-0 fw-bold mb-0 mb-md-3"><a href="" class="text-decoration-none text-black">Tiểu
                            thuyết
                        </a>
                    </p>
                    <p class="mb-0 fw-bold mb-0 mb-md-3"><a href="" class="text-decoration-none text-black">Truyện
                            tranh
                        </a>
                    </p>
                    <p class="mb-0 fw-bold mb-0 mb-md-3"><a href="" class="text-decoration-none text-black">Truyện
                            khoa
                            học viễn
                            tưởng</a>
                    </p>
                    <p class="mb-0 fw-bold mb-0 mb-md-3"><a href="" class="text-decoration-none text-black">Truyện
                            tình
                            yêu
                        </a>
                    </p>
                    <p class="mb-0 fw-bold mb-0 mb-md-3"><a href="" class="text-decoration-none text-black">Truyện
                            Truyện phiêu lưu</a>
                    </p>
                    <p class="mb-0 fw-bold mb-0 mb-md-3"><a href="" class="text-decoration-none text-black">Truyện
                            Truyện hài</a>
                    </p>
                </div>
                <div id="carouselExampleInterval" class="carousel slide col-md-9 col-12" data-bs-ride="carousel">
                    <div class="carousel-inner rounded-3">
                        <div class="carousel-indicators rounded-3">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-item active rounded-3" data-bs-interval="2000">
                            <img src="/images/background/forgot-pass.jpg" class="d-block w-100 rounded-3 " style="height: 316px ;" alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="/images/background/login.jpg" class="d-block w-100 rounded-3" style="height: 316px ;" alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="/images/background/forgot-pass.jpg" class="d-block w-100 rounded-3" style="height: 316px ;" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="p-3">
        <div class="container">
            <div class="row shadow-lg">
                <div class="d-flex justify-content-between bg-white py-2">
                    <a href="#" class="text-decoration-none fw-bold">Sản phẩm bán chạy</a>
                    <a href="#" class="text-decoration-none fw-bold">Xem tất cả</a>
                </div>
            </div>

            <div class="row">
                <div class="product col-md-3 col-sm-6 col-12 p-3 bg-white">
                    <div class="col">
                        <div class="row p-3">
                            <div class="col-md-12 col-12 text-center">
                                <!-- Hình ảnh sách -->
                                <a href="/products/detail"> <img src="/images/section/h5.jpg" alt="Hình ảnh sách" class="img-fluid" style=" height: 170px;"></a>
                            </div>
                            <div class="col-md-12 col-12 text-center mt-3">
                                <!-- Tên sách -->
                                <p class="fw-bold">Nghệ Thuật Hiện Diện</p>
                                <!-- Giá -->
                                <p class="text-decoration-line-through">95.000 đ</p>
                                <p class="fw-bold text-danger">80.000 đ</p>
                            </div>

                            <div class="text-center">
                                <a href="" class="btn btn-dark">
                                    Thêm giỏ hàng
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12 p-3 bg-white">
                    <div class="col">
                        <div class="row p-3">
                            <div class="col-md-12 col-12 text-center">
                                <!-- Hình ảnh sách -->
                                <img src="/images/section/h5.jpg" alt="Hình ảnh sách" class="img-fluid" style=" height: 170px;">
                            </div>
                            <div class="col-md-12 col-12 text-center mt-3">
                                <!-- Tên sách -->
                                <p class="fw-bold">Nghệ Thuật Hiện Diện</p>
                                <!-- Giá -->
                                <p class="text-decoration-line-through">95.000 đ</p>
                                <p class="fw-bold text-danger">80.000 đ</p>
                            </div>

                            <div class="text-center">
                                <a href="" class="btn btn-dark">
                                    Thêm giỏ hàng
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12 p-3 bg-white">
                    <div class="col">
                        <div class="row p-3">
                            <div class="col-md-12 col-12 text-center">
                                <!-- Hình ảnh sách -->
                                <img src="/images/section/h5.jpg" alt="Hình ảnh sách" class="img-fluid" style=" height: 170px;">
                            </div>
                            <div class="col-md-12 col-12 text-center mt-3">
                                <!-- Tên sách -->
                                <p class="fw-bold">Nghệ Thuật Hiện Diện</p>
                                <!-- Giá -->
                                <p class="text-decoration-line-through">95.000 đ</p>
                                <p class="fw-bold text-danger">80.000 đ</p>
                            </div>

                            <div class="text-center">
                                <a href="" class="btn btn-dark">
                                    Thêm giỏ hàng
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12 p-3 bg-white">
                    <div class="col">
                        <div class="row p-3">
                            <div class="col-md-12 col-12 text-center">
                                <!-- Hình ảnh sách -->
                                <img src="/images/section/h5.jpg" alt="Hình ảnh sách" class="img-fluid" style=" height: 170px;">
                            </div>
                            <div class="col-md-12 col-12 text-center mt-3">
                                <!-- Tên sách -->
                                <p class="fw-bold">Nghệ Thuật Hiện Diện</p>
                                <!-- Giá -->
                                <p class="text-decoration-line-through">95.000 đ</p>
                                <p class="fw-bold text-danger">80.000 đ</p>
                            </div>

                            <div class="text-center">
                                <a href="" class="btn btn-dark">
                                    Thêm giỏ hàng
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="">
        <div class="container">
            <div class="row shadow-lg">
                <div class="d-flex justify-content-between bg-white py-2">
                    <a href="" class="text-decoration-none fw-bold">Sản Phẩm sale</a>
                    <a href="" class="text-decoration-none fw-bold">Xem tất cả</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6 col-12 p-3 bg-white">
                    <div class="col">
                        <div class="row p-3">
                            <div class="col-md-12 col-12 text-center">
                                <!-- Hình ảnh sách -->
                                <img src="/images/section/h5.jpg" alt="Hình ảnh sách" class="img-fluid" style=" height: 170px;">
                            </div>
                            <div class="col-md-12 col-12 text-center mt-3">
                                <!-- Tên sách -->
                                <p class="fw-bold">Nghệ Thuật Hiện Diện</p>
                                <!-- Giá -->
                                <p class="text-decoration-line-through">95.000 đ</p>
                                <p class="fw-bold text-danger">80.000 đ</p>
                            </div>

                            <div class="text-center">
                                <a href="" class="btn btn-dark">
                                    Thêm giỏ hàng
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12 p-3 bg-white">
                    <div class="col">
                        <div class="row p-3">
                            <div class="col-md-12 col-12 text-center">
                                <!-- Hình ảnh sách -->
                                <img src="/images/section/h5.jpg" alt="Hình ảnh sách" class="img-fluid" style=" height: 170px;">
                            </div>
                            <div class="col-md-12 col-12 text-center mt-3">
                                <!-- Tên sách -->
                                <p class="fw-bold">Nghệ Thuật Hiện Diện</p>
                                <!-- Giá -->
                                <p class="text-decoration-line-through">95.000 đ</p>
                                <p class="fw-bold text-danger">80.000 đ</p>
                            </div>

                            <div class="text-center">
                                <a href="" class="btn btn-dark">
                                    Thêm giỏ hàng
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12 p-3 bg-white">
                    <div class="col">
                        <div class="row p-3">
                            <div class="col-md-12 col-12 text-center">
                                <!-- Hình ảnh sách -->
                                <img src="/images/section/h5.jpg" alt="Hình ảnh sách" class="img-fluid" style=" height: 170px;">
                            </div>
                            <div class="col-md-12 col-12 text-center mt-3">
                                <!-- Tên sách -->
                                <p class="fw-bold">Nghệ Thuật Hiện Diện</p>
                                <!-- Giá -->
                                <p class="text-decoration-line-through">95.000 đ</p>
                                <p class="fw-bold text-danger">80.000 đ</p>
                            </div>

                            <div class="text-center">
                                <a href="" class="btn btn-dark">
                                    Thêm giỏ hàng
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12 p-3 bg-white">
                    <div class="col">
                        <div class="row p-3">
                            <div class="col-md-12 col-12 text-center">
                                <!-- Hình ảnh sách -->
                                <img src="/images/section/h5.jpg" alt="Hình ảnh sách" class="img-fluid" style=" height: 170px;">
                            </div>
                            <div class="col-md-12 col-12 text-center mt-3">
                                <!-- Tên sách -->
                                <p class="fw-bold">Nghệ Thuật Hiện Diện</p>
                                <!-- Giá -->
                                <p class="text-decoration-line-through">95.000 đ</p>
                                <p class="fw-bold text-danger">80.000 đ</p>
                            </div>

                            <div class="text-center">
                                <a href="" class="btn btn-dark">
                                    Thêm giỏ hàng
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <button class="fs-1 position-fixed bottom-0 end-0 border-0 bg-transparent">
        <a href="#body" style="color: #3aafa9;"><i class="fa-solid fa-circle-up"></i></a>
    </button>
</main>

<?php include_once VIEWS_DIR . "/layouts/footer/index.php"; ?>