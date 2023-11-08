<?php include_once VIEWS_DIR . "/layouts/header/index.php"; ?>
<style>
    ::-webkit-scrollbar {
        height: 10px !important;
    }

    .btn:hover {
        background-color: #17252a !important;
    }
</style>

<main style="background-color: #efefef; min-height: 70vh; min-width: 500px;">
    <div class="container p-5">
        <div class="row">
            <div class="col-12 col-lg-3 px-5 pb-2">
                <div class="pb-2">
                    <div class="d-flex justify-content-start align-items-center gap-2 mb-4">
                        <div class="preview-img p-2 d-flex justify-content-center align-items-center">
                            <img src="<?= htmlspecialchars($user['avatar']) ?>" alt="" style="border-radius: 50%; width: 50px; height: 50px; background-color: #efefef;">
                        </div>
                        <p class="mb-0 text-decoration-none text-black fw-bold text-truncate w-50">
                            <?= htmlspecialchars($user['email']) ?>
                        </p>

                    </div>
                    <hr>
                </div>
                <div class="d-flex gap-2">
                    <i class="fa-regular fa-user" style="font-size: 25px;"></i>
                    <p class="fw-bold">Tài Khoản Của Tôi</p>
                </div>
                <div class="d-flex flex-column">
                    <a href="/profile" class="fw-semibold text-decoration-none text-black">Hồ
                        Sơ</a>
                    <a href="#" class="mt-2 text-decoration-none text-black fw-semibold">Đổi Mật
                        Khẩu</a>
                    <a href="/purchase" class="mt-2 fw-bold text-decoration-none text-black" style="color:#3aafa9 !important;">
                        Đơn mua
                    </a>
                </div>

            </div>

            <div class="col-12 col-lg-9 px-0">
                <div class="p-3 d-flex align-items-center justify-content-between fw-semibold overflow-x-scroll mb-3" style="background-color: white;">
                    <a href="#" data-status="4" class="btn-status px-5 text-center text-nowrap text-decoration-none text-dark p-2 rounded border" style="border-color:#3aafa9 !important;">Tất cả</a>
                    <a href="#" data-status="0" class="btn-status px-5 text-center text-nowrap text-decoration-none text-dark p-2 rounded">Vận chuyển</a>
                    <a href="#" data-status="1" class="btn-status px-5 text-center text-nowrap text-decoration-none text-dark p-2 rounded">Hoàn thành</a>
                    <a href="#" data-status="2" class="btn-status px-5 text-center text-nowrap text-decoration-none text-dark p-2 rounded">Hủy</a>
                </div>

                <div id="content">
                    <div data-status="4">
                        <div class="shadow text-center align-items-center p-4 mb-3" style="background-color: white;" data-book_id="1">
                            <p class="text-end text-uppercase" style="font-size: 0.8rem;">
                                <i class="fa-solid fa-truck me-1"></i>
                                Đơn hàng đã được giao thành công
                            </p>
                            <div class="py-3 d-flex align-items-center border bg-white">
                                <div class="col-3">
                                    <a href class="pan col-3 text-center me-3 me-md-0" data-big="https://cdn0.fahasa.com/media/catalog/product/8/9/8934974190806.jpg">
                                        <img src="https://cdn0.fahasa.com/media/catalog/product/8/9/8934974190806.jpg" alt="" data-action="zoom" style="width: 100px;">
                                    </a>
                                </div>

                                <div class="col-9 text-center px-2">

                                    <div class="text-start">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="text-truncate mb-0 fw-semibold me-5">
                                                Bi Hài Kịch - Sắc Màu Làm Nên Cuộc Sống
                                            </p>
                                        </div>
                                        <p class="mt-2">
                                            <span class="text-decoration-line-through text-black-50 me-2">190.000 đ</span>
                                            <span class="text-danger fw-bold sale">171.000 đ</span>
                                        </p>

                                    </div>
                                    <div class="text-start">
                                        <i class="fa-solid fa-xmark"></i>
                                        1
                                    </div>

                                </div>
                            </div>

                            <div class="mt-3 d-block d-md-flex justify-content-between align-items-center flex-wrap">
                                <div class="d-flex gap-3 align-items-center">
                                    <p class="mb-0">Thành tiền:</p>
                                    <span class="text-danger fw-semibold fs-4">171.000 đ</span>
                                </div>
                                <div class="text-end mt-3 mt-md-0">
                                    <button class="btn text-white" style="min-width: 200px; background-color:#3aafa9;">Mua lại</button>
                                </div>
                            </div>
                        </div>

                        <div class="shadow text-center align-items-center p-4 mb-3" style="background-color: white;" data-book_id="1">
                            <p class="text-end text-uppercase" style="font-size: 0.8rem;">
                                Đã hủy
                            </p>
                            <div class="py-3 d-flex align-items-center border bg-white">
                                <div class="col-3">
                                    <a href class="pan col-3 text-center me-3 me-md-0" data-big="https://cdn0.fahasa.com/media/catalog/product/8/9/8934974190806.jpg">
                                        <img src="https://cdn0.fahasa.com/media/catalog/product/8/9/8934974190806.jpg" alt="" data-action="zoom" style="width: 100px;">
                                    </a>
                                </div>

                                <div class="col-9 text-center px-2">

                                    <div class="text-start">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="text-truncate mb-0 fw-semibold me-5">
                                                Bi Hài Kịch - Sắc Màu Làm Nên Cuộc Sống
                                            </p>
                                        </div>
                                        <p class="mt-2">
                                            <span class="text-decoration-line-through text-black-50 me-2">190.000 đ</span>
                                            <span class="text-danger fw-bold sale">171.000 đ</span>
                                        </p>

                                    </div>
                                    <div class="text-start">
                                        <i class="fa-solid fa-xmark"></i>
                                        1
                                    </div>

                                </div>
                            </div>

                            <div class="mt-3 d-block d-md-flex justify-content-between align-items-center flex-wrap">
                                <div class="d-flex gap-3 align-items-center">
                                    <p class="mb-0">Thành tiền:</p>
                                    <span class="text-danger fw-semibold fs-4">171.000 đ</span>
                                </div>
                                <div class="text-end mt-3 mt-md-0">
                                    <button class="btn text-white" style="min-width: 200px; background-color:#3aafa9;">Mua lại</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-none" data-status="0">
                        <div class="shadow text-center align-items-center p-4 mb-3" style="background-color: white;" data-book_id="1">
                            <p class="text-end text-uppercase" style="font-size: 0.8rem;">
                                <i class="fa-solid fa-truck-fast me-1"></i>
                                Đơn hàng của bạn đang được giao
                            </p>

                            <div class="py-3 d-flex align-items-center border bg-white">
                                <div class="col-3">
                                    <a href class="pan col-3 text-center me-3 me-md-0" data-big="https://cdn0.fahasa.com/media/catalog/product/8/9/8934974190806.jpg">
                                        <img src="https://cdn0.fahasa.com/media/catalog/product/8/9/8934974190806.jpg" alt="" data-action="zoom" style="width: 100px;">
                                    </a>
                                </div>

                                <div class="col-9 text-center px-2">

                                    <div class="text-start">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="text-truncate mb-0 fw-semibold me-5">
                                                Bi Hài Kịch - Sắc Màu Làm Nên Cuộc Sống
                                            </p>
                                        </div>
                                        <p class="mt-2">
                                            <span class="text-decoration-line-through text-black-50 me-2">190.000 đ</span>
                                            <span class="text-danger fw-bold sale">171.000 đ</span>
                                        </p>

                                    </div>
                                    <div class="text-start">
                                        <i class="fa-solid fa-xmark"></i>
                                        1
                                    </div>

                                </div>
                            </div>

                            <div class="mt-3 d-block d-md-flex justify-content-between align-items-center flex-wrap">
                                <div class="d-flex gap-3 align-items-center">
                                    <p class="mb-0">Thành tiền:</p>
                                    <span class="text-danger fw-semibold fs-4">171.000 đ</span>
                                </div>
                                <div class="text-end mt-3 mt-md-0">
                                    <button class="btn text-white" style="min-width: 200px; background-color:#3aafa9;">Hủy</button>
                                </div>
                            </div>
                        </div>

                        <div class="shadow text-center align-items-center p-4 mb-3" style="background-color: white;" data-book_id="1">
                            <p class="text-end text-uppercase" style="font-size: 0.8rem;">
                                <i class="fa-solid fa-truck-fast me-1"></i>
                                Đơn hàng của bạn đang được giao
                            </p>

                            <div class="py-3 d-flex align-items-center border bg-white">
                                <div class="col-3">
                                    <a href class="pan col-3 text-center me-3 me-md-0" data-big="https://cdn0.fahasa.com/media/catalog/product/8/9/8934974190806.jpg">
                                        <img src="https://cdn0.fahasa.com/media/catalog/product/8/9/8934974190806.jpg" alt="" data-action="zoom" style="width: 100px;">
                                    </a>
                                </div>

                                <div class="col-9 text-center px-2">

                                    <div class="text-start">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="text-truncate mb-0 fw-semibold me-5">
                                                Bi Hài Kịch - Sắc Màu Làm Nên Cuộc Sống
                                            </p>
                                        </div>
                                        <p class="mt-2">
                                            <span class="text-decoration-line-through text-black-50 me-2">190.000 đ</span>
                                            <span class="text-danger fw-bold sale">171.000 đ</span>
                                        </p>

                                    </div>
                                    <div class="text-start">
                                        <i class="fa-solid fa-xmark"></i>
                                        1
                                    </div>

                                </div>
                            </div>

                            <div class="mt-3 d-block d-md-flex justify-content-between align-items-center flex-wrap">
                                <div class="d-flex gap-3 align-items-center">
                                    <p class="mb-0">Thành tiền:</p>
                                    <span class="text-danger fw-semibold fs-4">171.000 đ</span>
                                </div>
                                <div class="text-end mt-3 mt-md-0">
                                    <button class="btn text-white" style="min-width: 200px; background-color:#3aafa9;">Hủy</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-none" data-status="1">
                        <div class="shadow text-center align-items-center p-4 mb-3" style="background-color: white;" data-book_id="1">
                            <p class="text-end text-uppercase" style="font-size: 0.8rem;">
                                <i class="fa-solid fa-truck me-1"></i>
                                Đơn hàng đã được giao thành công
                            </p>
                            <div class="py-3 d-flex align-items-center border bg-white">
                                <div class="col-3">
                                    <a href class="pan col-3 text-center me-3 me-md-0" data-big="https://cdn0.fahasa.com/media/catalog/product/8/9/8934974190806.jpg">
                                        <img src="https://cdn0.fahasa.com/media/catalog/product/8/9/8934974190806.jpg" alt="" data-action="zoom" style="width: 100px;">
                                    </a>
                                </div>

                                <div class="col-9 text-center px-2">

                                    <div class="text-start">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="text-truncate mb-0 fw-semibold me-5">
                                                Bi Hài Kịch - Sắc Màu Làm Nên Cuộc Sống
                                            </p>
                                        </div>
                                        <p class="mt-2">
                                            <span class="text-decoration-line-through text-black-50 me-2">190.000 đ</span>
                                            <span class="text-danger fw-bold sale">171.000 đ</span>
                                        </p>

                                    </div>
                                    <div class="text-start">
                                        <i class="fa-solid fa-xmark"></i>
                                        1
                                    </div>

                                </div>
                            </div>

                            <div class="mt-3 d-block d-md-flex justify-content-between align-items-center flex-wrap">
                                <div class="d-flex gap-3 align-items-center">
                                    <p class="mb-0">Thành tiền:</p>
                                    <span class="text-danger fw-semibold fs-4">171.000 đ</span>
                                </div>
                                <div class="text-end mt-3 mt-md-0">
                                    <button class="btn text-white" style="min-width: 200px; background-color:#3aafa9;">Mua lại</button>
                                </div>
                            </div>
                        </div>

                        <div class="shadow text-center align-items-center p-4 mb-3" style="background-color: white;" data-book_id="1">
                            <p class="text-end text-uppercase" style="font-size: 0.8rem;">
                                <i class="fa-solid fa-truck me-1"></i>
                                Đơn hàng đã được giao thành công
                            </p>
                            <div class="py-3 d-flex align-items-center border bg-white">
                                <div class="col-3">
                                    <a href class="pan col-3 text-center me-3 me-md-0" data-big="https://cdn0.fahasa.com/media/catalog/product/8/9/8934974190806.jpg">
                                        <img src="https://cdn0.fahasa.com/media/catalog/product/8/9/8934974190806.jpg" alt="" data-action="zoom" style="width: 100px;">
                                    </a>
                                </div>

                                <div class="col-9 text-center px-2">

                                    <div class="text-start">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="text-truncate mb-0 fw-semibold me-5">
                                                Bi Hài Kịch - Sắc Màu Làm Nên Cuộc Sống
                                            </p>
                                        </div>
                                        <p class="mt-2">
                                            <span class="text-decoration-line-through text-black-50 me-2">190.000 đ</span>
                                            <span class="text-danger fw-bold sale">171.000 đ</span>
                                        </p>

                                    </div>
                                    <div class="text-start">
                                        <i class="fa-solid fa-xmark"></i>
                                        1
                                    </div>

                                </div>
                            </div>

                            <div class="mt-3 d-block d-md-flex justify-content-between align-items-center flex-wrap">
                                <div class="d-flex gap-3 align-items-center">
                                    <p class="mb-0">Thành tiền:</p>
                                    <span class="text-danger fw-semibold fs-4">171.000 đ</span>
                                </div>
                                <div class="text-end mt-3 mt-md-0">
                                    <button class="btn text-white" style="min-width: 200px; background-color:#3aafa9;">Mua lại</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-none" data-status="2">
                        <div class="shadow text-center align-items-center p-4 mb-3" style="background-color: white;" data-book_id="1">
                            <p class="text-end text-uppercase" style="font-size: 0.8rem;">
                                Đã hủy
                            </p>
                            <div class="py-3 d-flex align-items-center border bg-white">
                                <div class="col-3">
                                    <a href class="pan col-3 text-center me-3 me-md-0" data-big="https://cdn0.fahasa.com/media/catalog/product/8/9/8934974190806.jpg">
                                        <img src="https://cdn0.fahasa.com/media/catalog/product/8/9/8934974190806.jpg" alt="" data-action="zoom" style="width: 100px;">
                                    </a>
                                </div>

                                <div class="col-9 text-center px-2">

                                    <div class="text-start">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="text-truncate mb-0 fw-semibold me-5">
                                                Bi Hài Kịch - Sắc Màu Làm Nên Cuộc Sống
                                            </p>
                                        </div>
                                        <p class="mt-2">
                                            <span class="text-decoration-line-through text-black-50 me-2">190.000 đ</span>
                                            <span class="text-danger fw-bold sale">171.000 đ</span>
                                        </p>

                                    </div>
                                    <div class="text-start">
                                        <i class="fa-solid fa-xmark"></i>
                                        1
                                    </div>

                                </div>
                            </div>

                            <div class="mt-3 d-block d-md-flex justify-content-between align-items-center flex-wrap">
                                <div class="d-flex gap-3 align-items-center">
                                    <p class="mb-0">Thành tiền:</p>
                                    <span class="text-danger fw-semibold fs-4">171.000 đ</span>
                                </div>
                                <div class="text-end mt-3 mt-md-0">
                                    <button class="btn text-white" style="min-width: 200px; background-color:#3aafa9;">Mua lại</button>
                                </div>
                            </div>
                        </div>

                        <div class="shadow text-center align-items-center p-4 mb-3" style="background-color: white;" data-book_id="1">
                            <p class="text-end text-uppercase" style="font-size: 0.8rem;">
                                Đã hủy
                            </p>
                            <div class="py-3 d-flex align-items-center border bg-white">
                                <div class="col-3">
                                    <a href class="pan col-3 text-center me-3 me-md-0" data-big="https://cdn0.fahasa.com/media/catalog/product/8/9/8934974190806.jpg">
                                        <img src="https://cdn0.fahasa.com/media/catalog/product/8/9/8934974190806.jpg" alt="" data-action="zoom" style="width: 100px;">
                                    </a>
                                </div>

                                <div class="col-9 text-center px-2">

                                    <div class="text-start">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="text-truncate mb-0 fw-semibold me-5">
                                                Bi Hài Kịch - Sắc Màu Làm Nên Cuộc Sống
                                            </p>
                                        </div>
                                        <p class="mt-2">
                                            <span class="text-decoration-line-through text-black-50 me-2">190.000 đ</span>
                                            <span class="text-danger fw-bold sale">171.000 đ</span>
                                        </p>

                                    </div>
                                    <div class="text-start">
                                        <i class="fa-solid fa-xmark"></i>
                                        1
                                    </div>

                                </div>
                            </div>

                            <div class="mt-3 d-block d-md-flex justify-content-between align-items-center flex-wrap">
                                <div class="d-flex gap-3 align-items-center">
                                    <p class="mb-0">Thành tiền:</p>
                                    <span class="text-danger fw-semibold fs-4">171.000 đ</span>
                                </div>
                                <div class="text-end mt-3 mt-md-0">
                                    <button class="btn text-white" style="min-width: 200px; background-color:#3aafa9;">Mua lại</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $(() => {
        $('.btn-status').each(function() {
            $(this).click(function() {
                const status = $(this)[0].dataset.status;

                $('#content').children().each(function() {
                    if ($(this)[0].dataset.status === status) {
                        $(this).removeClass('d-none')
                    } else {
                        $(this).addClass('d-none')
                    }
                })

                $('.btn-status').each(function() {
                    if ($(this).hasClass('border')) {
                        $(this).removeClass('border').removeProp('style');
                    }
                })

                $(this).addClass('border').prop('style', 'border-color: #3aafa9 !important');
            })
        })
    })
</script>

<?php include_once VIEWS_DIR . "/layouts/footer/index.php"; ?>