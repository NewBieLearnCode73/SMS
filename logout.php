
<?php
require "inc/init.php"; // Nạp file init.php vào
$session->logout(); // Gọi hàm logout từ class Session
redirect("login.php"); // Chuyển hướng về trang login.php