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
        require_once VIEWS_DIR . '/admin/index.php';
    }

    public function add()
    {
        if (!isAdmin()) {
            require_once VIEWS_DIR . '/errors/404.php';
            exit;
        };
        require_once VIEWS_DIR . '/admin/add/index.php';
    }

    public function edit()
    {
        if (!isAdmin()) {
            require_once VIEWS_DIR . '/errors/404.php';
            exit;
        };
        require_once VIEWS_DIR . '/admin/edit/index.php';
    }
}
