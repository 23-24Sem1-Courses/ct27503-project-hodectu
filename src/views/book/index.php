<?php include_once VIEWS_DIR . "/layouts/header/index.php"; ?>

<main>
    <section class="mx-2">
        <div class="container">
            <div class="row py-3 bg-white text-lg-start text-center">
                <div class="col-md-5 col-12 d-flex justify-content-center flex-column text-center">
                    <div class="d-flex justify-content-center">
                        <img src=" <?= htmlspecialchars($book['anh_bia']) ?>" alt="" class="main-img img-fluid"
                            style="height: 400px;">
                    </div>
                    <div class="col-lg-12 col-12 justify-content-center my-2 d-none d-md-flex">
                        <div class="flex-wrap border border-black p-2 d-flex gap-4 justify-content-center">
                            <img class="sub-img" src="/images/section/h2.jpg" alt="" style="height: 75px;">
                            <img class="sub-img" src="/images/section/h3.jpg" alt="" style="height: 75px;">
                            <img class="sub-img" src="/images/section/h4.jpg" alt="" style="height: 75px;">
                            <img class="sub-img" src="/images/section/h5.jpg" alt="" style="height: 75px;">
                            <img class="sub-img" src="/images/section/h6.jpg" alt="" style="height: 75px;">
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-12">
                    <h4>
                        <?= htmlspecialchars($book['ten_sach']) ?>
                    </h4>
                    <div class="row">
                        <p>Tác giả: <a href="https://en.wikipedia.org/wiki/ <?= htmlspecialchars($book['tac_gia']) ?>"
                                class="text-decoration-none text-dark fw-bold">
                                <?= htmlspecialchars($book['tac_gia']) ?>
                            </a></p>
                        <p>Phát hành: <a href="" class="text-decoration-none text-dark fw-bold">Bookstore</a></p>
                    </div>
                    <hr>
                    <div class="">
                        <p class="text-decoration-line-through">
                            <?= htmlspecialchars($book['gia_goc']) ?> đ
                        </p>
                        <p class="fw-bold text-danger">
                            <?= htmlspecialchars($book['gia_sale']) ?> đ
                        </p>
                    </div>
                    <div class="row justify-content-center justify-content-lg-start">
                        <div class="d-flex col-lg-3 col-6 ">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default btn-number"
                                    style="border: 1px solid #17252a;" data-type="minus" data-field="quantity">
                                    <span class="fa fa-minus"></span>
                                </button>
                            </span>
                            <input type="text" name="quantity" class="form-control input-number text-center col"
                                value="1" min="1" max="100">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default btn-number"
                                    style="border: 1px solid #17252a;" data-type="plus" data-field="quantity">
                                    <span class="fa fa-plus"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12 col-3 row d-flex justify-content-center pb-3 gap-3 justify-content-lg-start "
                        style="width: auto;">
                        <!-- Nút "Thêm vào giỏ hàng" với Bootstrap -->
                        <button class="btn col-4 col-md-4 text-white fw-bold" style="background-color: #17252a;">Thêm
                            giỏ
                            hàng</button>

                        <!-- Nút "Mua" với Bootstrap -->
                        <button class="btn col-4 col-md-4 text-white fw-bold" style="background-color: #17252a;">Mua
                            ngay</button>
                    </div>
                    <div class="row">
                        <p>Bọc Plastic theo yêu cầu</p>
                        <p>Giao hàng miễn phí trong nội thành TP. HCM với đơn hàng ≥ 200.000 đ
                            Giao hàng miễn phí toàn quốc với đơn hàng ≥ 350.000 đ</p>
                    </div>
                </div>
            </div>

            <div class="row bg-white">

                <h4>Giới thiệu về sách</h4>

                <hr>
                <p>
                    <?= htmlspecialchars($book['mo_ta']) ?>
                </p>
            </div>

        </div>
    </section>



    <section class="">
        <div class="container">
            <div class="row shadow-lg mt-5">
                <div class="d-flex justify-content-between bg-white py-2">
                    <a href="" class="text-decoration-none fw-bold">Sản Phẩm tương tự</a>
                    <a href="" class="text-decoration-none fw-bold">Xem tất cả</a>
                </div>
            </div>
            <div class="row">
                <?php foreach ($sptt as $sach): ?>
                    <div class="product col-md-3 col-sm-6 col-12 p-3 bg-white">
                        <div class="col">
                            <div class="row p-3">
                                <div class="col-md-12 col-12 text-center">
                                    <!-- Hình ảnh sách -->
                                    <a href="/book/detail/<?= htmlspecialchars($sach['id']) ?>"> <img
                                            src="<?= htmlspecialchars($sach['anh_bia']) ?>" alt="Hình ảnh sách"
                                            class="img-fluid" style=" height: 170px;"></a>
                                </div>
                                <div class="col-md-12 col-12 text-center mt-3">
                                    <!-- Tên sách -->
                                    <p class="fw-bold text-truncate">
                                        <?= htmlspecialchars($sach['ten_sach']) ?>
                                    </p>
                                    <!-- Giá -->
                                    <p class="text-decoration-line-through">
                                        <?= htmlspecialchars($sach['gia_goc']) ?> đ
                                    </p>
                                    <p class="fw-bold text-danger">
                                        <?= htmlspecialchars($sach['gia_sale']) ?> đ
                                    </p>
                                </div>

                                <div class="text-center">
                                    <a href="" class="btn btn-dark">
                                        Thêm giỏ hàng
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        </div>
    </section>
    <button class="fs-1 position-fixed bottom-0 end-0 border-0 bg-transparent">
        <a href="#body" style="color: #3aafa9;"><i class="fa-solid fa-circle-up"></i></a>
    </button>
</main>

<script>
    $('img.sub-img').each(function () {
        $(this).on('click', function () {
            const img = $(this).prop("src");
            $('.main-img').prop("src", img);
        })
    })
</script>

<?php include_once VIEWS_DIR . "/layouts/footer/index.php"; ?>