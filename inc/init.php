<?php
ob_start(); // Bắt đầu bộ đệm đầu ra

require_once(realpath(dirname(__DIR__)) . "/admin/inc/config.php");

spl_autoload_register(function ($class) {
    require_once(realpath(dirname(__DIR__)) . "/classes/" . strtolower($class) . ".php");
});

require_once("function.php");

$conn = new Database(); // Nhận connection từ class Database
// Khi muốn truy vấn thì $conn->connection->query($sql);

$session = new Session();

has_message();
