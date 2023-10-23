<?php include_once VIEWS_DIR . "/layouts/header/index.php"; ?>

<style>
    body {
        background: #f5f5f5;
    }

    .form-floating>label {
        transition: transform 0.2s ease-in-out;
    }

    .btn-hover-dark:hover {
        background: #000 !important;
    }

    #draggable:hover {
        cursor: move;
    }

    .cart-empty-img {
        background: url('/images/cart/empty-cart.png') center no-repeat;
        background-size: 150px;
    }

    .img {
        max-width: 300px;
        height: auto;
        cursor: pointer;
    }

    .cart-btn-close:hover {
        color: crimson !important;
        cursor: pointer;
    }

    .jconfirm-buttons {
        display: flex;
        flex-direction: row-reverse;
    }

    .jconfirm-buttons button:hover {
        color: #fff !important;
        background: #000 !important;
    }
</style>

<!-- Empty cart -->
<!-- <main class="container d-flex flex-column justify-content-center overflow-hidden" style="min-height: calc(100vh - 200px);">
    <div class="cart-empty-img" style="height: 10rem;"></div>
    <div class="row text-center justify-content-center">
        <p>Giỏ hàng của bạn còn trống</p>
        <button class="btn btn-hover-dark col-4 col-md-2 fw-semibold text-white" style="background: #3aafa9;">Mua
            ngay</button>
    </div>
</main> -->
<!-- /Empty cart -->

<main class="container overflow-hidden py-2" style="min-height: calc(100vh - 200px);">
    <div class="fs-2 my-4 border-bottom pb-3 w-100">
        <i class="fa-brands fa-shopify fs-1" style="color: #3aafa9;"></i>
        Giỏ hàng
    </div>

    <table class="row flex-column">
        <thead class="border text-white d-none d-md-block col" style="background: #2a7a73; margin-left: 0px;">
            <tr class="row">
                <th class="text-center py-3 col-6">Sản phẩm</th>
                <th class="text-center py-3 col-2">Số lượng</th>
                <th class="text-center py-3 col-2">Thành tiền</th>
                <th class="text-center py-3 col-2">Thao tác</th>
            </tr>
        </thead>

        <tbody class="border w-100 col">

            <tr class="d-none d-md-flex text-center row align-items-center bg-white py-4 flex-row">
                <div>

                    <td class="text-start py-2 col-md-6">
                        <div class="d-flex">
                            <a href class="pan col-3 text-center me-3 me-md-0" data-big="https://nobita.vn/wp-content/uploads/2022/05/bia-sakurako-tap-10-ban-pho-thong.jpg">
                                <img src="https://nobita.vn/wp-content/uploads/2022/05/bia-sakurako-tap-10-ban-pho-thong.jpg" alt="" data-action="zoom" style="width: 100px;">
                            </a>
                            <div class="col-8 mx-5 mx-lg-0 d-flex flex-column justify-content-around">
                                <p class="text-truncate mb-0 fw-semibold">
                                    Sakurako Và Bộ Xương Dưới Gốc Anh Đào
                                </p>
                                <p>
                                    <span class="text-decoration-line-through text-black-50 me-2">109.000 đ</span>
                                    <span class="text-danger fw-bold">98.000 đ</span>
                                </p>
                            </div>
                        </div>
                    </td>

                    <td class="col-md-2 px-md-0">
                        <div class="d-flex justify-content-center">
                            <div class="d-flex col-md-12">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default btn-number rounded-end-0" style="border: 1px solid #17252a;" data-type="minus" data-field="quantity">
                                        <span class="fa fa-minus"></span>
                                    </button>
                                </span>
                                <input type="text" name="quantity" class="form-control input-number text-center col rounded-0 border-end-0 border-start-0" value="1" min="1" max="100" style="box-shadow: none; border-color: #17252a;">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default btn-number rounded-start-0" style="border: 1px solid #17252a;" data-type="plus" data-field="quantity">
                                        <span class="fa fa-plus"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </td>

                    <td class="col-md-2 text-center">
                        <span class="text-danger fw-bold">98.000 đ</span>
                    </td>

                    <td class="fs-4 cart-btn-close col-md-2 text-center" style="color: #3aafa9;"><i class="fa-solid fa-trash"></i>
                    </td>

                </div>
            </tr>

            <div class="d-flex d-md-none text-center row align-items-center py-4 flex-column">

                <div class="py-3 d-flex align-items-center border bg-white">
                    <div class="col-3">
                        <a href class="pan col-3 text-center me-3 me-md-0" data-big="https://nobita.vn/wp-content/uploads/2022/05/bia-sakurako-tap-10-ban-pho-thong.jpg">
                            <img src="https://nobita.vn/wp-content/uploads/2022/05/bia-sakurako-tap-10-ban-pho-thong.jpg" alt="" data-action="zoom" style="width: 100px;">
                        </a>
                    </div>

                    <div class="col-9 text-center px-2">

                        <div class="text-start">
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="text-truncate mb-0 fw-semibold me-5">
                                    Sakurako Và Bộ Xương Dưới Gốc Anh Đào
                                </p>
                                <div class="fs-4 cart-btn-close me-2" style="color: #3aafa9;"><i class="fa-solid fa-trash"></i></div>
                            </div>
                            <p class="mt-2">
                                <span class="text-decoration-line-through text-black-50 me-2">109.000 đ</span>
                                <span class="text-danger fw-bold">98.000 đ</span>
                            </p>

                        </div>

                        <div class="text-start">
                            <div class="d-flex w-50">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default btn-number  rounded-end-0" style="border: 1px solid #17252a;" data-type="minus" data-field="quantity">
                                        <span class="fa fa-minus"></span>
                                    </button>
                                </span>
                                <input type="text" name="quantity" class="form-control input-number text-center col rounded-0 border-end-0 border-start-0" value="1" min="1" max="100" style="box-shadow: none; border-color: #17252a;">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default btn-number rounded-start-0" style="border: 1px solid #17252a;" data-type="plus" data-field="quantity">
                                        <span class="fa fa-plus"></span>
                                    </button>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </tbody>
    </table>

    <button class="fs-1 position-fixed bottom-0 end-0 border-0 bg-transparent">
        <a href="#body" style="color: #3aafa9;"><i class="fa-solid fa-circle-up"></i></a>
    </button>

</main>

<?php include_once VIEWS_DIR . "/layouts/footer/index.php"; ?>