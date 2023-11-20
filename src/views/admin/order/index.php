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
                        <?php if ($order['trang_thai'] != 2) : ?>
                            <button class="btnUpdate btn text-white" style="background-color:#3aafa9;" data-orderId="<?= htmlspecialchars($order['id']) ?>">Cập nhật</button>
                        <?php endif ?>
                        <a href="/admin/order/<?= htmlspecialchars($order['id']) ?>" class="btn text-white" style="background-color:#3aafa9;">Xem</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>

<?php include_once VIEWS_DIR . "/admin/layouts/footer/index.php"; ?>