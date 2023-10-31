<?php

namespace App\Controllers;

class AdminController
{
    public function index()
    {
        if (!isAdmin()) {
            require_once VIEWS_DIR . '/errors/404.php';
            exit;
        };
        $BookModel = new \App\Models\BookModel();
        $books = $BookModel->getAll();
        require_once VIEWS_DIR . '/admin/index.php';
    }

    public function getAdd()
    {
        if (!isAdmin()) {
            require_once VIEWS_DIR . '/errors/404.php';
            exit;
        };
        require_once VIEWS_DIR . '/admin/add/index.php';
    }

    public function postAdd()
    {
        try {
            if (!isAdmin()) {
                require_once VIEWS_DIR . '/errors/404.php';
                exit;
            };

            require_once SRC_DIR . '/config.php';
            $BookModel = new \App\Models\BookModel();

            if (!isset($_POST['book'])) {
                JsonResponse(error: 1, message: "Vui lòng nhập thông tin sản phẩm");
            }
            $book = json_decode($_POST['book'], true);

            if (!isset($book['name'])) {
                JsonResponse(error: 1, message: "Vui lòng nhập tên sản phẩm");
            }

            if (!isset($book['price'])) {
                JsonResponse(error: 1, message: "Vui lòng nhập giá bán");
            }

            if (!isset($book['sale'])) {
                JsonResponse(error: 1, message: "Vui lòng nhập giá sale");
            }

            if (!isset($book['author'])) {
                JsonResponse(error: 1, message: "Vui lòng nhập tên tác giả");
            }

            if (!isset($book['description'])) {
                JsonResponse(error: 1, message: "Vui lòng nhập mô tả sản phẩm");
            }

            $img = handle_img_upload('img');
            if (!isset($img)) {
                JsonResponse(error: 1, message: "Lỗi ảnh bìa");
            }
            $book['img'] = $img;

            $imgs = handle_img_upload('imgs', isMultiple: true);
            if (!isset($imgs)) {
                JsonResponse(error: 1, message: "Lỗi ảnh hình ảnh khác");
            }
            $book['imgs'] = $imgs;

            $isSuccess = $BookModel->create($book);
            if (!isset($isSuccess)) {
                JsonResponse(error: 1, message: "Có lỗi xảy ra! vui lòng thử lại sau");
            }

            JsonResponse(error: 0, message: "Thêm thành công");
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getEdit($id)
    {
        if (!isAdmin()) {
            require_once VIEWS_DIR . '/errors/404.php';
            exit;
        };
        $BookModel = new \App\Models\BookModel();
        $book = $BookModel->getById($id);
        require_once VIEWS_DIR . '/admin/edit/index.php';
    }

    public function postEdit($id)
    {
        if (!isAdmin()) {
            require_once VIEWS_DIR . '/errors/404.php';
            exit;
        };
        try {
            if (!isAdmin()) {
                require_once VIEWS_DIR . '/errors/404.php';
                exit;
            };

            require_once SRC_DIR . '/config.php';
            $BookModel = new \App\Models\BookModel();

            if (!isset($_POST['book'])) {
                JsonResponse(error: 1, message: "Vui lòng nhập thông tin sản phẩm");
            }
            $book = json_decode($_POST['book'], true);

            if (!isset($book['name'])) {
                JsonResponse(error: 1, message: "Vui lòng nhập tên sản phẩm");
            }

            if (!isset($book['price'])) {
                JsonResponse(error: 1, message: "Vui lòng nhập giá bán");
            }

            if (!isset($book['sale'])) {
                JsonResponse(error: 1, message: "Vui lòng nhập giá sale");
            }

            if (!isset($book['author'])) {
                JsonResponse(error: 1, message: "Vui lòng nhập tên tác giả");
            }

            if (!isset($book['description'])) {
                JsonResponse(error: 1, message: "Vui lòng nhập mô tả sản phẩm");
            }

            $img = handle_img_upload('img');
            if (!isset($img)) {
                JsonResponse(error: 1, message: "Lỗi ảnh bìa");
            }
            $book['img'] = $img;

            $imgs = handle_img_upload('imgs', isMultiple: true);
            if (!isset($imgs)) {
                JsonResponse(error: 1, message: "Lỗi ảnh hình ảnh khác");
            }
            $book['imgs'] = $imgs;

            $isSuccess = $BookModel->create($book);
            if (!isset($isSuccess)) {
                JsonResponse(error: 1, message: "Có lỗi xảy ra! vui lòng thử lại sau");
            }

            JsonResponse(error: 0, message: "Thêm thành công");
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function postDelete($id)
    {
        if (!isAdmin()) {
            require_once VIEWS_DIR . '/errors/404.php';
            exit;
        };

        $BookModel = new \App\Models\BookModel();

        $isSuccess = $BookModel->delete($id);

        if (!$isSuccess) {
            JsonResponse(error: 1, message: "Có lỗi xảy ra! vui lòng thử lại sau.");
        }

        JsonResponse(error: 0, message: "Xóa sản phẩm thành công");
    }
}
