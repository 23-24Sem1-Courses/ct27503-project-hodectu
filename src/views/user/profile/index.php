<?php include_once VIEWS_DIR . "/layouts/header/index.php"; ?>

<main class="" style="background-color: #efefef; min-height: 100vh;">
    <section class="">
        <div class=" container p-5">
            <div class="row ">
                <div class="col-12 col-lg-3  px-5 pb-2">
                    <div class="pb-2">
                        <div class="d-flex justify-content-start align-items-center gap-2 mb-4">
                            <div class="p-2 d-flex justify-content-center align-items-center "
                                style="border-radius: 50%; width: 50px; height: 50px; background-color: white;">
                                <i class="fa-regular fa-user" style="font-size: 25px;"></i>
                            </div>

                            <a href="login.php" class="text-decoration-none  text-black  fw-bold">
                                email</a>

                        </div>
                        <hr>
                    </div>
                    <div class="d-flex gap-1">
                        <i class="fa-regular fa-user" style="font-size: 25px;"></i>
                        <p>Tài Khoản Của Tôi</p>

                    </div>
                    <div class="d-flex flex-column">
                        <a href="#" class="text-decoration-none text-black fw-bold"
                            style="font-size: 14px; color:#3aafa9 !important;">Hồ
                            Sơ</a>
                        <a href="/profile/password" class="text-decoration-none text-black" style="font-size: 14px;">Đổi
                            Mật
                            Khẩu</a>
                    </div>


                </div>

                <div class="col-12 col-lg-9   p-5" style="background-color: white;">
                    <div class="pb-3">
                        <div class="p-2 mb-2 ">
                            <h3>Hồ Sơ Của Tôi</h3>
                            <p>Quản lý thông tin hồ sơ tài khoản</p>
                        </div>

                        <div
                            class="row justify-content-between d-column flex-column-reverse flex-lg-row gap-3 gap-md-0">
                            <div class="col-12 col-lg-8">
                                <form id="user_edit_form">
                                    <div class="mb-3 d-flex row">
                                        <div class="col-3 text-end">
                                            <label for="name" class="form-label" style="font-size: 14px;">Tên</label>
                                        </div>
                                        <div class="col-9">
                                            <input class="form-control " id="name" name="name" aria-describedby="name"
                                                style="box-shadow: none;">

                                        </div>
                                    </div>
                                    <div class="mb-3 d-flex row">
                                        <div class="col-3 text-end">
                                            <label for="email" class="form-label" style="font-size: 14px;">Email</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="email" class="form-control " id="email"
                                                aria-describedby="email" name="email" style="box-shadow: none;">
                                        </div>
                                    </div>
                                    <div class="mb-3 d-flex row">
                                        <div class="col-3 text-end">
                                            <label for="phone" class="form-label" style="font-size: 14px;">Số điện
                                                thoại</label>
                                        </div>
                                        <div class="col-9">
                                            <input class="form-control " id="phone" aria-describedby="phone"
                                                name="phone" style="box-shadow: none;">
                                        </div>
                                    </div>
                                    <div class="mb-3 d-flex row">
                                        <div class="col-3 text-end">
                                            <label for="address" class="form-label" style="font-size: 14px;">Địa
                                                Chỉ</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control " id="address"
                                                aria-describedby="address" name="address" style="box-shadow: none;">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn text-white "
                                            style="min-width: 100px; background-color: #3aafa9;"
                                            aria-disabled="false">Lưu</button>
                                    </div>

                                </form>

                            </div>
                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center flex-column">
                                <div class="p-2 d-flex justify-content-center align-items-center"
                                    style="border-radius: 50%; width: 100px; height: 100px; background-color: #efefef;">
                                    <i class="fa-regular fa-user" style="font-size: 50px;"></i>
                                </div>
                                <div class="py-2">

                                    <form class="" id="update_avatar">
                                        <div class="form-control d-flex align-items-center gap-3">
                                            <div>
                                                <input hidden type="file" class="form-control-file img" id="img"
                                                    name="img" accept="image/*">
                                                <label for="img" class="btn text-white"
                                                    style="background-color: #3aafa9;">Chọn
                                                    ảnh</label>
                                            </div>
                                        </div>
                                        <div class=" preview-img mt-3 d-none">
                                            <img src="" alt="" style="width: 100px;">
                                        </div>
                                    </form>
                                </div>
                                <div class="">
                                    <div class="" style="font-size: 14px;">Dụng lượng file tối đa 1 MB</div>
                                    <div class="" style="font-size: 14px;">Định dạng:.JPEG, .PNG</div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>>
    </div>

</main>
<script>
    $.validator.setDefaults({
        ignore: [],
        submitHandler: function (form) {
            $.ajax({
                // url: '/admin/add',
                // type: 'POST',
                // data: {
                //     "email": $('#signup_form input[name="email"]').val(),
                //     "password": $('#signup_form input[name="password"]').val(),
                // },
                success: function (res) {
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
                    }).then(function () {
                        if (!res["error"]) window.location.href = '/login';
                    })
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    })
    const previewImg = (input, previewTag) => {
        input.on('change', function () {
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


    $().ready(function () {
        $('#user_edit_form').validate({
            rules: {
                email: {
                    email: true,
                },
                phone: {
                    minlength: 10,
                    maxlength: 10,

                },
            },
            messages: {
                email: 'Hộp thư điện tử không hợp lệ',
                phone: {
                    minlength: 'Số điện thoại phải có ít nhất 10 số ',
                    maxlength: 'Số điện thoại phải có tối đa 10 số ',
                },
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
        previewImg($('#update_avatar input.img'), $('.preview-img'));

    });
</script>
<?php include_once VIEWS_DIR . "/layouts/footer/index.php"; ?>