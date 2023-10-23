<footer class="fw-bold text" style="background-color: #def2f1; color: #17252a;">
    <div class="container-fluid text-center">
        <div class="container p-4">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="fw-bold">Hỗ Trợ Khách Hàng</h4>
                    <p class="mb-0 fw-bold">Email: Bookstore@gamil.com</p>
                    <p class="mb-0 fw-bold">Hotline: 19006060</p>
                </div>
                <div class="col-md-3 my-3 my-md-0">
                    <h4 class="fw-bold">Giới thiệu</h4>
                    <p class="mb-0 fw-bold"><a href="#" class="text-decoration-none">Thông tin về shop</a>
                    </p>
                    <p class="mb-0 fw-bold"><a href="#" class="text-decoration-none">Tuyển Dụng</a></p>
                </div>
                <div class="col-md-3 mb-3">
                    <h4 class="fw-bold">Tài Khoản</h4>
                    <p class="mb-0 fw-bold"><a href="#" class="text-decoration-none">Đăng nhập</a></p>
                    <p class="mb-0 fw-bold"><a href="#" class="text-decoration-none">Đăng ký</a></p>
                </div>
                <div class="col-md-3">
                    <h4 class="fw-bold">Hướng Dẫn</h4>
                    <p class="mb-0 fw-bold mb-0 mb-md-3"><a href="#" class="text-decoration-none">Hướng dẫn
                            mua hàng</a>
                    </p>
                    <p class="mb-0 fw-bold mb-0 mb-md-3"><a href="#" class="text-decoration-none">Phương
                            thức thanh
                            toán</a>
                    </p>
                    <p class="mb-0 fw-bold mb-0 mb-md-3"><a href="#" class="text-decoration-none">câu hỏi
                            thường gặp</a>
                    </p>
                </div>
            </div>
            <hr>
            <div>
                <div class=" d-flex justify-content-center">
                    <p class="mb-0 fw-bold">Copyright © 2023 Bookstore.vn</p>
                </div>
                <div class="d-flex justify-content-center">
                    <p class="mb-0 fw-bold">Địa chỉ: Ninh Kiều, Cần Thơ</p>
                </div>
                <div class="d-flex justify-content-center">
                    <img src="/images/footer/dathongbao.png" alt="" style="width: 220px; height: 83px;">
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/js/zoom-master/jquery.zoom.min.js"></script>
<script src="/js/jquery.pan-master/dist/jquery.pan.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $.validator.setDefaults({
        submitHandler: function() {
            alert('submitted!');
        }
    })
    $().ready(() => {
        $('#login_form').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 5,
                },
            },
            messages: {
                email: 'Email không hợp lệ',
                password: {
                    required: 'Vui lòng nhập mật khẩu',
                    minlength: 'Mật khẩu phải có ít nhất 5 ký tự',
                },
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

        $('#signup_form').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 5,
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: '#password',
                },
            },
            messages: {
                email: 'Email không hợp lệ',
                password: {
                    required: 'Vui lòng nhập mật khẩu',
                    minlength: 'Mật khẩu phải có ít nhất 5 ký tự',
                },
                confirm_password: {
                    required: 'Vui lòng xác nhận mật khẩu',
                    minlength: 'Mật khẩu phải có ít nhất 5 ký tự',
                    equalTo: 'Mật khẩu không trùng khớp',
                },
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

        $('#forgot_pass_form').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
            },
            messages: {
                email: 'Email không hợp lệ',
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

        // $('img')
        //     .wrap('<span style="display:inline-block"></span>')
        //     .css('display', 'block')
        //     .parent()
        //     .zoom();

        $(".pan").pan();

        $('.cart-btn-close').each(function() {
            $(this).on('click', () => {
                $.confirm({
                    title: 'Xác nhận xóa!',
                    content: 'Bạn muốn xóa sản phẩm này?',
                    buttons: {
                        confirm: function() {
                            $.alert('Confirmed!');
                        },
                        cancel: function() {
                            $.alert('Canceled!');
                        },
                    }
                });
            })
        })
    })
    $("#draggable").draggable()
</script>

</body>

</html>