<?php

namespace App\Controllers;

class AdminController
{
    public function index()
    {
        require_once VIEWS_DIR . '/admin/index.html';
    }

    public function add()
    {
        require_once VIEWS_DIR . '/admin/add/index.html';
    }

    public function edit()
    {
        require_once VIEWS_DIR . '/admin/edit/index.html';
    }
}
