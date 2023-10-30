<?php include_once VIEWS_DIR . "/admin/layouts/header/index.php"; ?>

<main class="p-2 container" style="min-height: 100vh;">

    <p class="fs-3 fw-semibold">Danh sách sản phẩm</p>
    <div class=" overflow-x-scroll">
        <table class="table table-responsive" style="min-width: 700px;">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>SẢN PHẨM</th>
                    <th class="text-center">GIÁ</th>
                    <th class="text-center">HÀNH ĐỘNG</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle">1</td>
                    <td class="align-middle">
                        <a href="/admin/edit" class="d-flex align-items-center gap-2 text-decoration-none text-dark">
                            <img src="http://shop.localhost/images/product/text%201.jpg" alt="" style="width: 70px;">
                            <p class=" mb-0">
                                Nghệ Thuật Hiện Diện
                            </p>
                        </a>
                    </td>
                    <td class="align-middle text-center text-danger fw-semibold">80,000 VNĐ</td>
                    <td class="align-middle text-center">
                        <a href="/admin/edit" class="btn btn-info text-white">Edit</a>
                        <button class="btn-delete btn btn-danger">Xóa</button>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle">1</td>
                    <td class="align-middle">
                        <a href="/admin/edit" class="d-flex align-items-center gap-2 text-decoration-none text-dark">
                            <img src="http://shop.localhost/images/product/text%201.jpg" alt="" style="width: 70px;">
                            <p class=" mb-0">
                                Nghệ Thuật Hiện Diện
                            </p>
                        </a>
                    </td>
                    <td class="align-middle text-center text-danger fw-semibold">80,000 VNĐ</td>
                    <td class="align-middle text-center">
                        <a href="/admin/edit" class="btn btn-info text-white">Edit</a>
                        <button class="btn-delete btn btn-danger">Xóa</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</main>

<?php include_once VIEWS_DIR . "/admin/layouts/footer/index.php"; ?>