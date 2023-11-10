<?php include_once VIEWS_DIR . "/layouts/header/index.php"; ?>
<style>
    ::-webkit-scrollbar {
        height: 10px !important;
    }

    .btn:hover {
        background-color: #17252a !important;
    }

    .btn-status:hover {
        cursor: pointer;
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
                    <a href="/profile/password" class="mt-2 text-decoration-none text-black fw-semibold">Đổi Mật
                        Khẩu</a>
                    <a href="/purchase" class="mt-2 fw-bold text-decoration-none text-black" style="color:#3aafa9 !important;">
                        Đơn mua
                    </a>
                </div>

            </div>
            <div class="col-12 col-lg-9 px-0">
                <div class="p-3 d-flex align-items-center justify-content-between fw-semibold overflow-x-scroll mb-3" style="background-color: white;">
                    <p data-status="3" class="btn-status px-5 text-center text-nowrap text-decoration-none text-dark p-2 rounded border" style="border-color:#3aafa9 !important;">Tất cả</p>
                    <p data-status="0" class="btn-status px-5 text-center text-nowrap text-decoration-none text-dark p-2 rounded">Chờ xác nhận</p>
                    <p data-status="1" class="btn-status px-5 text-center text-nowrap text-decoration-none text-dark p-2 rounded">Vận chuyển</p>
                    <p data-status="2" class="btn-status px-5 text-center text-nowrap text-decoration-none text-dark p-2 rounded">Hủy</p>
                </div>
                <div id="content"></div>
            </div>
        </div>
    </div>
</main>

<script>
    $(() => {

        $.ajax({
                url: '/purchase',
                type: 'POST',
                data: {
                    status: 3
                },
                beforeSend: function() {
                    const div = `<div class="loading d-flex justify-content-center align-items-center w-100">
                                    <img src="/images/loading/loading-gif.gif" alt="" style="width: 100px;">
                                </div>`
                    $("#content").html(div);
                },
                success: function() {
                    $("#content").children('.loading').remove();
                }
            })
            .then(data => {
                data = JSON.parse(data)
                renderOrder(data);
            })

        $('.btn-status').each(function() {
            $(this).click(function() {
                const status = $(this)[0].dataset.status;

                $.ajax({
                        url: '/purchase',
                        type: 'POST',
                        data: {
                            status
                        },
                        beforeSend: function() {
                            const div = `<div class="loading d-flex justify-content-center align-items-center w-100">
                                    <img src="/images/loading/loading-gif.gif" alt="" style="width: 100px;">
                                </div>`
                            $("#content").html(div);
                        },
                        success: function() {
                            $("#content").children('.loading').remove();
                        }
                    })
                    .then(data => {
                        data = JSON.parse(data)
                        renderOrder(data);
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

    const convertNumberToPrice = (number) => {
        return Number(number).toLocaleString('vi', {
            style: 'currency',
            currency: 'VND'
        });
    }

    const renderOrder = (orders = []) => {
        if (!orders.length) {
            html = `<div class="shadow text-center align-items-center p-4 mb-5" style="background-color: white;">
                            Chưa có đơn hàng
                        </div>`
            $('#content').html(html);
            return;
        }

        const ordersMsg = [
            '</i>Chờ xác nhận',
            '<i class="fa-solid fa-truck me-1"></i>Đơn hàng của bạn đang được giao',
            'ĐÃ HỦY',
        ];

        let finalHtml = "";

        orders.forEach(order => {
            let html = `
             <div class="order shadow text-center align-items-center p-4 mb-5" style="background-color: white;" data-order_id="${order.id}">
                <p class="text-end text-uppercase" style="font-size: 0.8rem;">
                    ${ordersMsg[order?.status]}
                </p>`;

            order?.books?.forEach(item => {
                html += `
                        <div class="py-3 d-flex align-items-center border bg-white">
                        <div class="col-3">
                            <a href class="pan col-3 text-center me-3 me-md-0 img-fluid" data-big="${item.anh_bia}">
                                <img src="${item.anh_bia}" alt="" data-action="zoom" style="width: 100px;">
                            </a>
                        </div>
                        <div class="col-9 text-center px-2">
                            <div class="text-start">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="text-truncate mb-0 fw-semibold me-5">
                                        ${item.ten_sach}
                                    </p>
                                </div>
                                <p class="mt-2">
                                    <span class="text-decoration-line-through text-black-50 me-2"> ${convertNumberToPrice(item.gia_goc)}</span>
                                    <span class="text-danger fw-bold sale">${convertNumberToPrice(item.gia)}</span>
                                </p>
                            </div>
                            <div class="text-start">
                                <i class="fa-solid fa-xmark"></i>
                                    ${item.so_luong}
                            </div>
                        </div>
                    </div>`
            })

            html += `<div class="mt-3 d-block d-md-flex justify-content-between align-items-center flex-wrap">
                    <div class="d-flex gap-3 align-items-center">
                        <p class="mb-0">Thành tiền:</p>
                        <span class="text-danger fw-semibold fs-4">${convertNumberToPrice(order.total)}</span>
                    </div>
                        <div class="text-end mt-3 mt-md-0">
                              ${                             
                                Number(order?.status) === 0 
                                ? (`<button class="cancelBtn btn text-white" style="min-width: 200px; background-color:#3aafa9;">
                                        Hủy
                                    </button>`)
                                : (`<button class="buyAgainBtn btn text-white" style="min-width: 200px; background-color:#3aafa9;">
                                        Mua lại
                                    </button>`)
                            }
                        </div>
                    </div>
                </div>`

            finalHtml += html;
        })

        $('#content').html(finalHtml);
    }

    const postAjax = (url, isAlert, data, order) => {
        $.ajax({
            url,
            type: 'POST',
            data,
            success: function(res) {
                res = JSON.parse(res);

                if (isAlert) {
                    Swal.fire({
                        title: `${res["error"] ? 'Lỗi' : 'Thành công'}`,
                        text: res["message"],
                        icon: `${res["error"] ? 'error' : 'success'}`,
                        confirmButtonText: 'Ok',
                        customClass: {
                            confirmButton: `${res["error"] ? 'bg-danger' : 'bg-success'}`,
                        },
                    }).then(() => {
                        if (!res["error"]) {
                            order.remove();
                            if (!$('.order').length) {
                                window.location.reload();
                            }
                        }
                    })
                } else {
                    if (!res["error"]) {
                        window.location.href = '/cart';
                    }
                }
            },
            error: function(error) {
                console.log(error);
            }
        })
    }

    $(document).on('click', '.cancelBtn', function() {
        Swal.fire({
            title: 'Hủy đơn hàng?',
            text: "Bạn chắc chắn muốn hủy đơn hàng này?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xác nhận',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                const order = $(this).closest('.order');
                const orderId = order[0].dataset.order_id;

                const data = {
                    id: orderId,
                    status: 2
                }

                postAjax('/checkout/cancel', true, data, order)
            }
        })
    })

    $(document).on('click', '.buyAgainBtn', function() {
        const order = $(this).closest('.order');
        const orderId = order[0].dataset.order_id;

        const data = {
            id: orderId
        }

        postAjax('/checkout/buy_again', false, data)

    })
</script>

<?php include_once VIEWS_DIR . "/layouts/footer/index.php"; ?>