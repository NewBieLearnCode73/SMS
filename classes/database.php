<?php
class Database
{
    public $connection; // Biến để kết nối

    // Trả về 1 biến PDO kết nối tới database
    public function get_conn()
    {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
            $conn = new PDO($dsn, DB_USER, DB_PASS);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    // Tự động kết nối khi tạo mới 1 đối tượng
    function __construct()
    {
        $this->connection = $this->get_conn();
    }
}
