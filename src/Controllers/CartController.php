<?php

namespace App\Controllers;

class ProductController
{
    public function index()
    {
        require_once VIEWS_DIR . '/cart/index.php';
    }
}
