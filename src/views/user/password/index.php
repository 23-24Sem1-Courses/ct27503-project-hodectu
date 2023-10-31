<?php include_once VIEWS_DIR . "/layouts/header/index.php"; ?>

<main class="" style="background-color: #efefef; min-height: 100vh;">
    <section class="">
        <div class=" container p-5">
            <div class="row">
                <div class="col-3">
                    <div class="pb-2">
                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <div class="p-2 d-flex justify-content-center align-items-center "
                                style="border-radius: 50%; width: 50px; height: 50px; background-color: white;">
                                <i class="fa-regular fa-user" style="font-size: 25px;"></i>
                            </div>

                            <a href="login.php" class="text-decoration-none  text-black  fw-bold">
                                email</a>

                        </div>
                    </div>
                    <div class="d-flex gap-1">

                        <i class="fa-regular fa-user" style="font-size: 25px;"></i>
                        <p>Tài Khoản Của Tôi</p>

                    </div>
                    <div class="d-flex flex-column">
                        <a href="/user/profile" class="text-decoration-none text-black fw-bold"
                            style="font-size: 14px;">Hồ Sơ</a>
                        <a href="/user/password" class="text-decoration-none text-black fw-bold"
                            style="font-size: 14px;">Đổi Mật
                            Khẩu</a>
                    </div>



                </div>
                <div class="col-9" style="background-color: white;">
                    <div class="pb-3">
                        <div class="p-2 d-flex  align-items-center">
                            <div class="p-2 d-flex justify-content-center align-items-center "
                                style="border-radius: 50%; width: 50px; height: 50px; background-color: white;">
                                <i class="fa-solid fa-key" style="font-size: 25px;"></i>
                            </div>
                            <h3>Đổi Mật Khẩu</h3>
                        </div>

                        <div class="row">
                            <div class="col-9">

                                <form id="user_edit_form">
                                    <div class="mb-3 d-flex row">
                                        <div class="col-4">
                                            <label for="password" class="form-label" style="font-size: 14px;">Mật
                                                Khẩu
                                                Cũ</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="password" class="form-control " name="old_password"
                                                aria-describedby="name" style="box-shadow: none;">

                                        </div>
                                    </div>
                                    <div class="mb-3 d-flex row">
                                        <div class="col-4">
                                            <label for="password" class="form-label" style="font-size: 14px;">Mật
                                                Khẩu
                                                Mới</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="password" class="form-control " id="new_password"
                                                aria-describedby="email" name="new_password" style="box-shadow: none;">
                                        </div>
                                    </div>
                                    <div class="mb-3 d-flex row">
                                        <div class="col-xl-4">
                                            <label for="password" class="form-label" style="font-size: 14px;">Nhập
                                                lại
                                                Mật Khẩu mới </label>
                                        </div>
                                        <div class="col-8">
                                            <input type="password" class="form-control " id="phone"
                                                aria-describedby="phone" name="a_new_password"
                                                style="box-shadow: none;">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn text-white" style="background-color: #3aafa9;"
                                        aria-disabled="false">Lưu</button>
                                </form>

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
                old_password: {

                    required: true,
                    minlength: 5,
                },
                new_password: {
                    required: true,
                    minlength: 5,
                },
                a_new_password: {
                    required: true,
                    minlength: 5,
                    equalTo: '#new_password',
                },
            },
            messages: {
                old_password: {
                    required: 'Bạn chưa nhập mật khẩu',
                    minlength: 'Mật khẩu phải có ít nhất 5 ký tự ',

                },
                new_password: {
                    required: 'Bạn chưa nhập mật khẩu',
                    minlength: 'Mật khẩu phải có ít nhất 5 ký tự ',

                },
                a_new_password: {
                    required: 'Bạn chưa nhập mật khẩu',
                    minlength: 'Mật khẩu phải có ít nhất 5 ký tự ',
                    equalTo:
                        'Mật khẩu không trùng khớp với mật khẩu đã nhập',
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