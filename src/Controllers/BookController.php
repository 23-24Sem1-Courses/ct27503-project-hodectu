<?php

namespace App\Controllers;

class BookController
{
    public function getDetail(int $id)
    {
        if (empty($_SESSION['email'])) {
            redirect('/login');
        }

        $UserModel = new \App\Models\UserModel();
        $BookModel = new \App\Models\BookModel();

        $email = htmlspecialchars($_SESSION['email']);
        $user = $UserModel->getByEmail($email);

        $book = $BookModel->getById($id);
        $sptt = $BookModel->getAllByAuthor($book['tac_gia']);
        $title = $book['ten_sach'];
        require_once VIEWS_DIR . '/book/index.php';
    }

    public function getSearch()
    {
        $BookModel = new \App\Models\BookModel();

        $book = $BookModel->getBookByCategory(htmlspecialchars($_GET['tu_khoa']));

        if (!empty($book)) {
            $tukhoa = $book[0]['the_loai'];
            $title = htmlspecialchars($_GET['tu_khoa']);
            require_once VIEWS_DIR . '/book/search/index.php';
        } else {
            $title = 'Không Tìm Thấy';
            require_once VIEWS_DIR . '/errors/search/notFound.php';
            exit;
        }
    }
}
