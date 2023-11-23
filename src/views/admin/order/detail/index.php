<?php include_once VIEWS_DIR . "/admin/layouts/header/index.php"; ?>

<style>
    .update-btn:hover {
        background-color: #17252a !important;
    }
</style>

<main class="container" style="min-height: 100vh; min-width: 500px;">
    <div class=" p-5">
        <p class="fs-3 fw-semibold text-center">Chi tiết đơn hàng</p>
        <a href="/admin/order" class="text-decoration-none fw-semibold"><i class="fa-solid fa-arrow-left me-1"></i>Quay
            lại</a>
        <p class="text-end text-uppercase mb-0 fs-6">
            Trạng thái:
            <span class="ms-2 fw-bold">
                <?= htmlspecialchars($results[0]['trang_thai'] == 0 ? 'Chờ xác nhận' : ($results[0]['trang_thai'] == 1 ? 'Đang giao' : ($results[0]['trang_thai'] == 2 ? 'Hủy' : 'Đã nhận'))) ?>
            </span>
        </p>
        <div class="row shadow text-center p-4 mb-5 mt-2 order" style="background-color: white;"
            data-order_id="<?= htmlspecialchars($results[0]['orderId']) ?>"
            data-order_status="<?= htmlspecialchars($results[0]['trang_thai']) ?>">
            <?php foreach ($results as $item): ?>
                <div class="col-12 col-md-6">
                    <div class="py-3 d-flex align-items-center border bg-white">
                        <div class="col-3">
                            <a href="#" class="col-3 text-center me-3 me-md-0">
                                <img src="<?= htmlspecialchars($item['anh_bia']) ?>" alt="" style="width: 100px;">
                            </a>
                        </div>
                        <div class="col-9 text-center px-2">
                            <div class="text-start">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="text-truncate mb-0 fw-semibold me-5">
                                        <?= htmlspecialchars($item['ten_sach']) ?>
                                    </p>
                                </div>
                                <p class="mt-2">
                                    <span class="text-decoration-line-through text-black-50 me-2">
                                        <?= htmlspecialchars(format_money($item['gia_goc'])) ?>
                                    </span>
                                    <span class="text-danger fw-bold sale">
                                        <?= htmlspecialchars(format_money($item['gia'])) ?>
                                    </span>
                                </p>
                            </div>
                            <div class="text-start">
                                <i class="fa-solid fa-xmark"></i>
                                <?= htmlspecialchars($item['so_luong']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

            <div class="mt-3 d-block d-md-flex justify-content-between align-items-center flex-wrap">
                <div class="d-flex gap-3 align-items-center">
                    <p class="mb-0">Thành tiền:</p>
                    <span class="text-danger fw-semibold fs-4">
                        <?= htmlspecialchars(format_money($item['tong_tien'])) ?>
                    </span>
                </div>

                <?php if ($results[0]['trang_thai'] == 0 || $results[0]['trang_thai'] == 1): ?>
                    <div class="text-end mt-3 mt-md-0">
                        <button class="btnUpdate btn text-white"
                            style="min-width: 200px; min-height: 45px; background-color:#3aafa9;">Cập nhật trạng thái giao
                            hàng</button>
                    </div>
                <?php endif ?>
            </div>
        </div>

    </div>
</main>

<script>
    const renderOrder = (orders = []) => {
        let finalHtml = "";

        orders.forEach(order => {
            let html = `
             <div class="shadow text-center align-items-center p-4 mb-5" style="background-color: white;">
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
                        <button class="btn text-white" style="min-width: 200px; background-color:#3aafa9;">Mua lại</button>
                    </div>
                </div>
            </div>`

            finalHtml += html;
        })

        $('#content').html(finalHtml);
    }
    const isValidFile = (file) => {
        const allowSize = 10 * 1024 * 1024;

        const swal = (msg) => {
            return Swal.fire({
                title: 'Lỗi',
                text: msg,
                icon: 'error',
                confirmButtonText: 'Ok',
                customClass: {
                    confirmButton: 'bg-danger',
                },
            })
        }

        const size = file.size;
        const type = file.type;

        if (size > allowSize) {
            swal('Kích thước ảnh tối đa 10 MB');
            return false;
        }

        if (!type.includes('image')) {
            swal('Hình ảnh không đúng định dạng');
            return false;
        }

        return true;
    }

    const previewImg = (input, previewTag) => {
        input.on('change', function () {
            if ($(this).val()) {
                const files = $(this)[0].files;

                if (files.length === 1) {
                    const file = files[0];

                    if (!isValidFile(file)) {
                        $(this).val('');
                        previewTag.addClass('d-none')
                        return;
                    }

                    const img = URL.createObjectURL(file);

                    previewTag.removeClass('d-none').find('img').prop('src', img);
                    $(this).closest('.form-control').removeClass('is-invalid').addClass('is-valid');
                    return;
                }

                let html = '';
                Array.from(files).forEach(file => {
                    if (!isValidFile(file)) {
                        $(this).val('');
                        previewTag.addClass('d-none')
                        return;
                    }
                    const img = URL.createObjectURL(file);
                    html += `<img src="${img}" alt="" style="width: 100px;">`
                })
                previewTag.removeClass('d-none').html(html);
            }
        })
    }

    $().ready(function () {
        $.validator.setDefaults({
            submitHandler: function () {
                const formData = new FormData();
                const img = $('.img')[0].files[0];
                const imgs = $('.imgs')[0].files;

                formData.append('img', img);

                for (var i = 0; i < imgs.length; i++) {
                    formData.append("imgs[]", imgs[i]);
                }

                const book = {
                    "book_id": $('#book_id').val(),
                    "name": $('#name').val(),
                    "price": Number($('#price').val()),
                    "sale": Number($('#sale').val()),
                    "author": $('#author').val(),
                    "description": $('#description').val()
                };

                formData.append("book", JSON.stringify(book));

                fetch('/admin/edit', {
                    method: 'POST',
                    body: formData,
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
                            if (!res['error']) {
                                window.location.href = '/admin'
                            }
                        })
                    })
                    .catch(error => {
                        console.error("Error:", error);
                    });
            }
        })
        $('#edit_book_form').validate({
            rules: {
                name: {
                    required: true,
                },
                price: {
                    required: true,
                    number: true
                },
                sale: {
                    required: true,
                    number: true,
                },
                img: {
                    required: true,
                },
                description: {
                    required: true,
                },
            },
            messages: {
                name: 'Nhập tên sách',
                price: {
                    required: 'Nhập giá bán',
                    number: 'Vui lòng nhập số',
                },
                sale: {
                    required: 'Nhập giá sale',
                    number: 'Vui lòng nhập số',
                },
                img: 'Chọn ảnh bìa',
                description: 'Nhập mô tả',
            },
            errorElement: 'span',
            errorPlacement: (error, element) => {
                error.addClass('invalid-feedback');
                if (element.prop('type') === 'file') {
                    element.closest('.form-control').addClass('is-invalid')
                    error.insertAfter(element.parent('div').parent('div'));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: (element, errorClass, validClass) => {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: (element, errorClass, validClass) => {
                $(element).addClass('is-valid').removeClass('is-invalid');
            },
        })

        previewImg($('#edit_book_form input.img'), $('.preview-img'));
        previewImg($('#edit_book_form input.imgs'), $('.preview-imgs'));
    });
</script>

<?php include_once VIEWS_DIR . "/admin/layouts/footer/index.php"; ?>