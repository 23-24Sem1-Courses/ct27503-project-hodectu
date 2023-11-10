<?php include_once VIEWS_DIR . "/admin/layouts/header/index.php"; ?>
<style>
    .btn:hover {
        background-color: #17252a !important;
    }
</style>

<main class="p-2 container" style="min-height: 100vh;">

    <p class="fs-3 fw-semibold">Danh sách đơn hàng</p>
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>Mã đơn</th>
                <th class="text-center">Tên khách hàng</th>
                <th class="text-center">Số điện thoại</th>
                <th class="text-center">Địa chỉ</th>
                <th class="text-center">Tổng tiền</th>
                <th class="text-center">Ngày đặt</th>
                <th class="text-center">Trạng thái</th>
                <th class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order) : ?>
                <tr class="order" data-order_id="<?= htmlspecialchars($order['id']) ?>">
                    <td class="align-middle">
                        <?= htmlspecialchars($order['id']) ?>
                    </td>
                    <td class="align-middle text-center fw-semibold">
                        <?= htmlspecialchars($order['ho_ten']) ?>
                    </td>
                    <td class="align-middle text-center fw-semibold">
                        <?= htmlspecialchars($order['so_dien_thoai']) ?>
                    </td>
                    <td class="align-middle text-center fw-semibold">
                        <?= htmlspecialchars($order['dia_chi']) ?>
                    </td>
                    <td class="align-middle text-center fw-bold text-danger">
                        <?= htmlspecialchars(format_money($order['tong_tien'])) ?>
                    </td>
                    <td class="align-middle text-center fw-semibold">
                        <?= htmlspecialchars($order['ngay_dat']) ?>
                    </td>
                    <td class="align-middle text-center fw-semibold">
                        <?= (int)htmlspecialchars($order['trang_thai']) === 0 ? 'Chờ xác nhận' : ((int)htmlspecialchars($order['trang_thai']) === 1 ? 'Đang giao' : 'Hủy') ?>
                    </td>
                    <td class="align-middle text-center">
                        <button class="btnUpdate btn text-white" style="background-color:#3aafa9;" data-orderId="<?= htmlspecialchars($order['id']) ?>">Cập nhật</button>
                        <a href="/admin/order/<?= htmlspecialchars($order['id']) ?>" class="btn text-white" style="background-color:#3aafa9;">Xem</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>

<script>
    const postAjax = (url, id, status) => {
        $.ajax({
            url,
            type: 'POST',
            data: {
                id,
                status
            },
            success: function(res) {
                res = JSON.parse(res);

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
                        window.location.reload();
                    }
                })

            },
            error: function(error) {
                console.log(error);
            }
        })
    }

    $(() => {
        $('.btnUpdate').on('click', function() {
            Swal.fire({
                title: 'Cập nhật trạng thái?',
                // text: "Bạn chắc chắn muốn hủy đơn hàng này?",
                icon: 'warning',
                showCancelButton: true,
                showDenyButton: true,
                confirmButtonText: "Giao hàng",
                denyButtonText: `Hủy đơn`,
                cancelButtonText: `Quay lại`,
                confirmButtonColor: '#3085d6',
                denyButtonColor: '#d33',

            }).then((result) => {
                const order = $(this).closest('.order');
                const orderId = order[0].dataset.order_id;

                if (result.isConfirmed) {
                    postAjax('/admin/order/update', orderId, 1)
                } else if (result.isDenied) {
                    postAjax('/admin/order/update', orderId, 2)
                }
            })
        })

    })
</script>

<?php include_once VIEWS_DIR . "/admin/layouts/footer/index.php"; ?>