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

<script type="text/javascript">
    $().ready(() => {
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