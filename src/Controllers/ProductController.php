<?php

namespace App\Controllers;

class ProductController
{
    public function detail(int $id)
    {
        require_once VIEWS_DIR . '/product/index.php';
    }
}
