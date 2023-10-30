<?php

namespace App\Controllers;

class BookController
{
    public function getDetail(int $id)
    {
        $BookModel = new \App\Models\BookModel();
        $book = $BookModel->getById($id);
        $sptt = $BookModel->getAllByAuthor($book['tac_gia']);
        require_once VIEWS_DIR . '/book/index.php';
    }

}