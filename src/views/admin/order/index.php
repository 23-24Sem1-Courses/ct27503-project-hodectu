<?php include_once VIEWS_DIR . "/admin/layouts/header/index.php"; ?>
<style>
    .btn:hover {
        background-color: #17252a !important;
    }
</style>

<main class="p-2 container" style="min-height: 100vh;">

    <p class="fs-3 fw-semibold">Danh sách sản phẩm</p>
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>STT</th>
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
            <?php foreach ($orders as $index => $order) : ?>
                <tr class="book">
                    <td class=" align-middle">
                        <?php echo $index + 1 ?>
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
                        <?= (int)htmlspecialchars($order['trang_thai']) === 0 ? 'Đang giao' : ((int)htmlspecialchars($order['trang_thai']) === 1 ? 'Thành công' : 'Hủy') ?>
                    </td>
                    <td class="align-middle text-center">
                        <input type="hidden" id="book_id" value="<?= htmlspecialchars($order['id']) ?>">
                        <button class="btn text-white" style="background-color:#3aafa9;" data-orderId="<?= htmlspecialchars($order['id']) ?>">Cập nhật</button>
                        <a href="/admin/order/<?= htmlspecialchars($order['id']) ?>" class="btn text-white" style="background-color:#3aafa9;">Xem</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>

<?php include_once VIEWS_DIR . "/admin/layouts/footer/index.php"; ?>