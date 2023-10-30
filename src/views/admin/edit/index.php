<?php include_once VIEWS_DIR . "/admin/layouts/header/index.php"; ?>

<style>
    .dropdown:hover .dropdown-menu {
        display: block;
    }

    nav a:hover {
        color: #17252a !important;
    }

    main img:hover {
        scale: 1.2;
        transition: all 0.5s;
    }
</style>

<main class="container" style="min-height: 100vh;">
    <div class="container rounded-3 my-5 d-flex justify-content-center flex-column align-items-center">
        <p class="fs-3 fw-semibold">Chỉnh sửa sản phẩm</p>

        <form id="add_book_form" action="/admin/add" method="post" enctype="multipart/form-data" class="col-12 col-lg-6 shadow-lg p-4">
            <div class="form-group mb-3">
                <label for="name">Tên Sản Phẩm:</label>
                <input value="Nghệ Thuật Hiện Diện" type="text" class="form-control" id="name" name="name" autocomplete="off">
            </div>

            <div class="form-group mb-3">
                <label for="price">Giá:</label>
                <input value="80000" type="number" class="form-control" id="price" name="price">
            </div>

            <div class="form-group mb-3">
                <div class="form-control d-flex align-items-center gap-3">
                    <div>
                        <label>Ảnh Bìa:</label>
                    </div>
                    <div>
                        <input hidden type="file" class="form-control-file img" id="img" name="img" accept="image/*">
                        <label for="img" class="btn btn-primary">Chọn</label>
                    </div>
                </div>
                <div class="preview-img mt-3">
                    <img src="http://shop.localhost/images/product/text%201.jpg" alt="" style="width: 100px;">
                </div>
            </div>

            <div class="form-group mb-3">
                <div class="form-control d-flex align-items-center gap-3">
                    <label>Hình ảnh khác:</label>
                    <input hidden type="file" class="form-control-file imgs" multiple id="imgs" name="imgs" accept="image/*">
                    <label for="imgs" class="btn btn-primary">Chọn</label>
                </div>
                <div class="preview-imgs mt-3">
                    <img src="http://shop.localhost/images/product/text%201.jpg" alt="" style="width: 100px;">
                    <img src="http://shop.localhost/images/product/text%201.jpg" alt="" style="width: 100px;">
                    <img src="http://shop.localhost/images/product/text%201.jpg" alt="" style="width: 100px;">
                    <img src="http://shop.localhost/images/product/text%201.jpg" alt="" style="width: 100px;">
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="description">Mô Tả:</label>
                <textarea class="form-control" id="description" name="description" rows="6">
                        Làm thế nào để chúng ta nổi bật trong thị trường việc làm cạnh tranh hiện tại khi có rất nhiều
                        người thông minh, có năng
                        lực ngoài kia? Câu trả lời nằm trong “Nghệ thuật hiện diện” - một cuốn sách được viết bởi nhà
                        sáng lập trường đào tạo kỹ
                        năng Palm Beach Jacqueline Whitmore - người chuyên cung cấp các chương trình đào tạo về ứng xử
                        dành cho các doanh nghiệp
                        lớn trên thế giới. Qua từng trang sách, Jacqueline sẽ chỉ cho bạn cách tiến gần hơn mục tiêu mà
                        mình mong muốn thông qua
                        bốn bước: Thay đổi diện mạo - Tạo dấu ấn - Xây thương hiệu và Khẳng định vị thế, với các bài
                        viết thực hành giúp tạo nên
                        dấu ấn cá nhân như: xây dựng tủ đồ thông minh, giao tiếp ứng xử khéo léo, phát triển mạng lưới
                        quan hệ và phong thái làm
                        việc chuyên nghiệp. Qua đó, bạn không chỉ nâng cao giá trị bản thân mà còn có thể tận dụng chính
                        sự độc đáo của mình để
                        mang lại sự hữu ích cho công ty, khách hàng và môi trường xung quanh nói chung. Và đừng quên:
                        “Nhiều hơn vẻ bề ngoài hào
                        nhoáng có thể ngụy tạo, sự hiện diện dù trong thinh lặng vẫn có sức nặng hơn những lời nói ồn ào
                        nhưng trống rỗng.”
                    </textarea>
            </div>

            <button type="submit" class="btn btn-primary" id="liveToastBtn">Thêm Sản Phẩm</button>
        </form>
    </div>

    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                Thêm sản phẩm thành công
                <i class="fa-solid fa-check text-success"></i>
            </div>
        </div>
    </div>

</main>

<script>
    $.validator.setDefaults({
        ignore: [],
        submitHandler: function(form) {
            $.ajax({
                // url: '/admin/add',
                // type: 'POST',
                // data: {
                //     "email": $('#signup_form input[name="email"]').val(),
                //     "password": $('#signup_form input[name="password"]').val(),
                // },
                success: function(res) {
                    const toastTrigger = $('#liveToastBtn')
                    const toastLiveExample = $('#liveToast')

                    if (toastTrigger) {
                        toastTrigger.addEventListener('click', () => {
                            const toast = new bootstrap.Toast(toastLiveExample)

                            toast.show()
                        })
                    }

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
                        if (!res["error"]) window.location.href = '/login';
                    })
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    })

    const previewImg = (input, previewTag) => {
        input.on('change', function() {
            if ($(this).val()) {
                const files = $(this)[0].files;

                if (files.length === 1) {
                    const file = files[0];
                    const img = URL.createObjectURL(file);

                    previewTag.removeClass('d-none').find('img').prop('src', img);
                    $(this).closest('.form-control').removeClass('is-invalid').addClass('is-valid');
                    return;
                }

                let html = '';
                Array.from(files).forEach(file => {
                    const img = URL.createObjectURL(file);
                    html += `<img src="${img}" alt="" style="width: 100px;">`
                })
                previewTag.removeClass('d-none').html(html);
            }
        })
    }

    $().ready(function() {
        $('#add_book_form').validate({
            rules: {
                name: {
                    required: true,
                },
                price: {
                    required: true,
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
                price: 'Nhập giá bán',
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

        previewImg($('#add_book_form input.img'), $('.preview-img'));
        previewImg($('#add_book_form input.imgs'), $('.preview-imgs'));

    });
</script>

<?php include_once VIEWS_DIR . "/admin/layouts/footer/index.php"; ?>