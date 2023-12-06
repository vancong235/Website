<?php
class IndexController {
    public function index() {
        // Đoạn code xử lý logic
        $data = "Hello, world!";
        
        // Load view và truyền dữ liệu vào
        include 'app/views/index.php';
    }
}