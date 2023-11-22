<?php include_once VIEWS_DIR . "/admin/layouts/header/index.php"; ?>

<main class="p-2 container" style="min-height: 100vh;">
    <div class="py-5">
        <table class="table border">
            <thead>
                <tr>
                    <th scope="col" class="fw-bold fs-5 text-center">Tổng tiền</th>
                    <th scope="col" class="fw-bold fs-5 text-center">Sản phẩm</th>
                    <th scope="col" class="fw-bold fs-5 text-center">Đơn hàng</th>
                    <th scope="col" class="fw-bold fs-5 text-center">Khách hàng</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center"><?= htmlspecialchars(format_money($total)) ?></td>
                    <td class="text-center"><?= htmlspecialchars(count($books)) ?></td>
                    <td class="text-center"><?= htmlspecialchars($quantity) ?></td>
                    <td class="text-center"><?= htmlspecialchars(count($users)) ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <p class="fs-3 fw-semibold">Danh sách sản phẩm</p>
    <div class=" overflow-x-scroll">
        <table class="table table-responsive" style="min-width: 700px;">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>SẢN PHẨM</th>
                    <th class="text-center">GIÁ</th>
                    <th class="text-center">SALE</th>
                    <th class="text-center">HÀNH ĐỘNG</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $index => $book) : ?>
                    <tr class="book">
                        <td class=" align-middle">
                            <?php echo $index + 1 ?>
                        </td>
                        <td class="align-middle">
                            <a href="/admin/edit/<?= htmlspecialchars($book['id']) ?>" class="d-flex align-items-center gap-2 text-decoration-none text-dark">
                                <img src="<?= htmlspecialchars($book['anh_bia']) ?>" alt="" style="width: 70px;">
                                <p class=" mb-0">
                                    <?= htmlspecialchars($book['ten_sach']) ?>
                                </p>
                            </a>
                        </td>
                        <td class="align-middle text-center text-decoration-line-through fw-semibold">
                            <?= htmlspecialchars(format_money($book['gia_goc'])) ?>
                        </td>
                        <td class="align-middle text-center text-danger fw-semibold">
                            <?= htmlspecialchars(format_money($book['gia_goc'])) ?>
                        </td>
                        <td class="align-middle text-center">
                            <input type="hidden" id="book_id" value="<?= htmlspecialchars($book['id']) ?>">
                            <a href="/admin/edit/<?= htmlspecialchars($book['id']) ?>" class="btn btn-info text-white">Edit</a>
                            <p class="mb-0 btn-delete btn btn-danger">Xóa</p>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</main>

<?php include_once VIEWS_DIR . "/admin/layouts/footer/index.php"; ?>