<?php include_once VIEWS_DIR . "/layouts/header/index.php"; ?>

<style>
    .product:hover {
        scale: 1;
        box-shadow: none;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
    }

    input[type=number] {
        box-shadow: none !important;
    }

    .add_to_cart:hover,
    .buy_now:hover {
        background-color: #3aafa9 !important;
    }
</style>

<main>
    <section class="mx-2">
        <div class="container">
            <div class="product row py-3 bg-white text-lg-start text-center" data-book_id="<?= htmlspecialchars($book['id']) ?>">
                <div class="col-md-5 col-12 d-flex justify-content-center flex-column text-center">
                    <div class="d-flex justify-content-center">
                        <img src=" <?= htmlspecialchars($book['anh_bia']) ?>" alt="" class="img main-img img-fluid" style="height: 400px;">
                    </div>
                    <div class="col-lg-12 col-12 justify-content-center my-2 d-none d-md-flex">
                        <div class="flex-wrap border border-dark-subtle p-2 d-flex gap-1 justify-content-center">
                            <?php foreach ($book['imgs'] as $img) : ?>
                                <img class="sub-img" src="<?= htmlspecialchars($img['hinh_anh']) ?>" alt="" style="height: 75px;">
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-12">
                    <h4 class="name">
                        <?= htmlspecialchars($book['ten_sach']) ?>
                    </h4>
                    <div class="row">
                        <p>Tác giả: <a href="https://en.wikipedia.org/wiki/ <?= htmlspecialchars($book['tac_gia']) ?>" class="text-decoration-none text-dark fw-bold">
                                <?= htmlspecialchars($book['tac_gia']) ?>
                            </a></p>
                        <p>Phát hành: <a href="" class="text-decoration-none text-dark fw-bold">Bookstore</a></p>
                    </div>
                    <hr>
                    <div class="">
                        <p class="text-decoration-line-through">
                            <?= htmlspecialchars(format_money($book['gia_goc'])) ?>
                        </p>
                        <p class="sale fw-bold text-danger fs-3">
                            <?= htmlspecialchars(format_money($book['gia_sale'])) ?>
                        </p>
                    </div>
                    <hr>
                    <div class="col-md-12 col-3 row d-flex justify-content-center pb-3 gap-3 justify-content-lg-start" style="width: auto;">
                        <!-- Nút "Thêm vào giỏ hàng" với Bootstrap -->
                        <button class="add_to_cart btn col-4 col-md-4 text-white fw-bold" style="background-color: #17252a;">
                            Thêm giỏ hàng
                        </button>

                        <!-- Nút "Mua" với Bootstrap -->
                        <button class="add_to_cart btn col-4 col-md-4 text-white fw-bold" style="background-color: #17252a;">
                            <p class="no-alert" hidden></p>
                            Mua ngay
                        </button>
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
                <p class="book-description text-truncate fw-semibold">
                    <?= htmlspecialchars($book['mo_ta']) ?>
                </p>

                <div class="d-flex justify-content-center">
                    <button class="btn_showmore btn d-block text-white fw-bold" style="min-width: 100px; background-color: #3aafa9;">
                        Xem thêm
                    </button>
                </div>
            </div>

        </div>
    </section>

    <section class="">
        <div class="container">
            <div class="row shadow-lg mt-5">
                <div class="d-flex justify-content-between bg-dark p-3">
                    <a href="#" class="text-decoration-none fw-bold text-white">Sản Phẩm cùng tác giả</a>
                    <a href="#" class="text-decoration-none fw-bold text-white">Xem tất cả</a>
                </div>
            </div>
            <div class="row">
                <?php foreach ($sptt as $sach) : ?>
                    <div class="product col-md-3 col-sm-6 col-12 p-3 bg-white" data-book_id="<?= htmlspecialchars($sach['id']) ?>">
                        <div class="col">
                            <div class="row p-3">
                                <div class="col-md-12 col-12 text-center">
                                    <!-- Hình ảnh sách -->
                                    <a href="/book/detail/<?= htmlspecialchars($sach['id']) ?>"> <img src="<?= htmlspecialchars($sach['anh_bia']) ?>" alt="Hình ảnh sách" class="img-fluid" style=" height: 170px;"></a>
                                </div>
                                <div class="col-md-12 col-12 text-center mt-3">
                                    <!-- Tên sách -->
                                    <p class="fw-bold text-truncate">
                                        <?= htmlspecialchars($sach['ten_sach']) ?>
                                    </p>
                                    <!-- Giá -->
                                    <p class="text-decoration-line-through">
                                        <?= htmlspecialchars(format_money($sach['gia_goc'])) ?>
                                    </p>
                                    <p class="fw-bold text-danger">
                                        <?= htmlspecialchars(format_money($sach['gia_sale'])) ?>
                                    </p>
                                </div>

                                <div class="text-center">
                                    <button class="add_to_cart btn text-white fw-bold" style="background-color: #17252a;">Thêm
                                        giỏ hàng
                                    </button>
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
    const swal = () => {
        Swal.fire({
            title: 'Xác nhận xóa?',
            text: "Bạn chắc chắn muốn xóa sản phẩm này?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xác nhận',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                const bookId = book[0].dataset.book_id;

                $.ajax({
                    url: '/cart/delete/' + bookId,
                    type: 'POST',
                    success: function(res) {
                        res = JSON.parse(res);

                        Swal.fire({
                            title: `${res["error"] ? 'Lỗi' : 'Thành công'}`,
                            text: res["message"],
                            icon: `${res["error"] ? 'error' : 'success'}`,
                            confirmButtonText: 'Ok',
                            customClass: {
                                confirmButton: `${res["error"] ? 'bg-danger' : 'bg-success'}`,
                            },
                        }).then(function() {
                            $('.cart-item').each(function() {
                                const itemId = $(this).find('a').prop('href').split('/')[5];
                                if (itemId === bookId) {
                                    $(this).remove();
                                }
                            })
                            book.remove();
                            if (!$('.cart-item').length) {
                                window.location.reload();
                            }
                        })
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
            }
        })
    }

    $().ready(() => {
        $('img.sub-img').each(function() {
            $(this).on('click', function() {
                const img = $(this).prop("src");
                $('.main-img').prop("src", img);
                $('img[role="presentation"]').prop("src", img);
            })
        })

        $('.main-img')
            .wrap('<span style="display:inline-block"></span>')
            .css('display', 'block')
            .parent()
            .zoom();

        $('.btn_showmore').on('click', function() {
            if ($('.book-description').hasClass('text-truncate')) {
                $('.book-description').removeClass('text-truncate');
                $(this).text('Rút gọn');
            } else {
                $('.book-description').addClass('text-truncate');
                $(this).text('Xem thêm');
            }
        })
    })
</script>

<?php include_once VIEWS_DIR . "/layouts/footer/index.php"; ?>