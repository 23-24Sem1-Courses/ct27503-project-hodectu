<?php include_once VIEWS_DIR . "/layouts/header/index.php"; ?>

<main class="container d-flex flex-column justify-content-center overflow-hidden">
    <div class="container px-4 pt-3 pb-5 my-5 shadow-lg">
        <input type="hidden" name="kh_tendangnhap" value="dnpcuong">

        <div class="py-5 text-center">
            <h2>Thanh toán</h2>
            <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
        </div>

        <div class="row">
            <div class="col-md-5 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Giỏ hàng</span>
                    <span class="badge badge-secondary badge-pill">2</span>
                </h4>
                <?php if (!empty($cartList)) { ?>
                    <ul class="checkout-cart list-group mb-3 overflow-y-scroll" style="height: 350px;">
                        <?php $totalPrice = 0; ?>
                        <?php foreach ($cartList as $item) :
                            $totalPrice += $item['so_luong'] * $item['gia_sale'];
                        ?>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div class="d-flex justify-content-between">
                                    <a href class="pan d-flex align-items-center" data-big="<?= htmlspecialchars($item['anh_bia']) ?>">
                                        <img src="<?= htmlspecialchars($item['anh_bia']) ?>" alt="" data-action="zoom" class="me-2 img-fluid" style="width: 50px;">
                                    </a>
                                    <div>
                                        <p class="mb-0"><?= htmlspecialchars($item['ten_sach']) ?></p>
                                        <p class="mb-0 text-muted">
                                            <span><?= htmlspecialchars(format_money($item['gia_sale'])) ?></span>
                                            <i class="fa-solid fa-xmark"></i>
                                            <span><?= htmlspecialchars($item['so_luong']) ?></span>
                                        </p>
                                    </div>
                                </div>
                                <span class="text-muted">
                                    <?= htmlspecialchars(format_money($item['so_luong'] * $item['gia_sale'])) ?>
                                </span>
                            </li>
                        <?php endforeach ?>
                        <li class="total-price list-group-item d-flex justify-content-between px-2 position-sticky bottom-0">
                            <span>Tổng tiền</span>
                            <strong><?= htmlspecialchars(format_money($totalPrice)) ?></strong>
                        </li>
                    </ul>
                <?php } else { ?>
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <img src="/images/cart/empty-cart.png" alt="" class="img-fluid" style="width: 250px;">
                    </div>
                <?php }
                ?>

            </div>
            <div class="col-md-7 order-md-1">
                <h4 class="mb-3">Thông tin khách hàng</h4>
                <form id="checkout_form" action="/checkout" method="post" class="row">
                    <div class="col-md-10 mb-3">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?= htmlspecialchars($user['email'])  ?>" readonly="true">
                    </div>
                    <div class="col-md-10 mb-3">
                        <label for="name">Họ tên</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?= htmlspecialchars($user['ho_ten'])  ?>" autocomplete="off">
                    </div>
                    <div class="col-md-10 mb-3">
                        <label for="address">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" id="address" value="<?= htmlspecialchars($user['dia_chi'])  ?>" autocomplete="off">
                    </div>
                    <div class="col-md-10 mb-3">
                        <label for="phone">Điện thoại</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="<?= htmlspecialchars($user['so_dien_thoai'])  ?>" autocomplete="off">
                    </div>

                </form>

                <button form="checkout_form" class="btn btn-lg text-white" type="submit" style="min-width: 100px; background-color: #3aafa9;">
                    Đặt hàng
                </button>
            </div>
        </div>
    </div>
</main>

<script>
    $.validator.setDefaults({
        submitHandler: function() {
            const formData = new FormData();

            const userInfo = {
                "email": $('#email').val(),
                "name": $('#name').val(),
                "address": $('#address').val(),
                "phone": $('#phone').val(),
            };

            formData.append("userInfo", JSON.stringify(userInfo));

            fetch('/checkout', {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.json())
                .then(res => {
                    Swal.fire({
                        title: `${res["error"] ? 'Lỗi' : 'Thành công'}`,
                        text: res["message"],
                        icon: `${res["error"] ? 'error' : 'success'}`,
                        confirmButtonText: 'Ok',
                        customClass: {
                            confirmButton: `${res["error"] ? 'bg-danger' : 'bg-success'}`,
                        },
                    }).then(() => {
                        $('header .cart-quantity').text(0);
                        $('header .cart .top').remove();
                        $('header .cart .bottom').remove();
                        const el = `<div style="height: 300px;" class="empty-cart d-flex justify-content-center align-items-center">
                            <img src="/images/cart/empty-cart.png" class="w-25" alt="">
                        </div>`;
                        $('header .cart').html(el);
                        const emptyCart = `<div class="d-flex justify-content-center align-items-center h-100">
                                                    <img src="/images/cart/empty-cart.png" alt="" class="img-fluid" style="width: 250px;">
                                            </div>`;
                        $('.checkout-cart').html(emptyCart);
                        if (!res['error']) {
                            window.location.href = '/purchase'
                        }
                    })
                })
        }
    })

    $().ready(function() {
        $('#checkout_form').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                name: {
                    required: true,
                },
                address: {
                    required: true,
                },
                phone: {
                    required: true,
                },
            },
            messages: {
                email: 'Email không hợp lệ',
                name: {
                    required: 'Vui lòng nhập họ tên',
                },
                address: {
                    required: 'Vui lòng nhập địa chỉ',
                },
                phone: {
                    required: 'Vui lòng nhập số điện thoại',
                }
            },
            errorElement: 'span',
            errorPlacement: (error, element) => {
                error.addClass('invalid-feedback');
                error.insertAfter(element);
            },
            highlight: (element, errorClass, validClass) => {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: (element, errorClass, validClass) => {
                $(element).addClass('is-valid').removeClass('is-invalid');
            },
        })
    });
</script>

<?php include_once VIEWS_DIR . "/layouts/footer/index.php"; ?>