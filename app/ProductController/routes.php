<?php

class ProductController {
    public function index() {
        echo "Barcha mahsulotlar";
    }
    
    public function create() {
        echo "Yangi mahsulot qo'shish";
    }
    
    public function show($id) {
        echo "Mahsulot ID: {$id}";
    }
    
    public function edit($id) {
        echo "Mahsulotni tahrirlash, ID: {$id}";
    }
    
    public function destroy($id) {
        echo "Mahsulot o'chirildi, ID: {$id}";
    }
    
    public function search() {
        echo "Qidiruv natijalari";
    }
}

// routes.php
require 'ProductController.php';

$uri = trim($_SERVER['REQUEST_URI'], '/');
$segments = explode('/', $uri);
$method = $_SERVER['REQUEST_METHOD'];

if ($uri === 'products') {
    $controller = new ProductController();
    $controller->index();
} elseif ($uri === 'products/create') {
    $controller = new ProductController();
    $controller->create();
} elseif ($uri === 'products/search') {
    $controller = new ProductController();
    $controller->search();
} elseif ($segments[0] === 'products' && isset($segments[1]) && is_numeric($segments[1])) {
    if ($method === 'DELETE') {
        $controller = new ProductController();
        $controller->destroy($segments[1]);
    } elseif (isset($segments[2]) && $segments[2] === 'edit') {
        $controller = new ProductController();
        $controller->edit($segments[1]);
    } else {
        $controller = new ProductController();
        $controller->show($segments[1]);
    }
} else {
    echo "Sahifa topilmadi";
}