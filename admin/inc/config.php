<?php
// Thực hiện định nghĩa đường dẫn
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR); // Dấu \ được định nghĩa lại thành DS

// D:\Xampp\htdocs\ct07n_nhom13_source
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'Xampp' . DS . 'htdocs' . DS . 'ct07n_nhom13_source');

// Đường dẫn đến thư inlcudes
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT . DS .  'inc'); // Đường dẫn đến thư mục inc

//thong so upload file
define('FILE_MAX_SIZE', 2 * 1024 * 1024); //2MB
define('FILE_TYPE', ['image/gif', 'image/jpeg', 'image/png']);

// Đường dẫn url mặc định
define('URL_ROOT', 'http://localhost/ct07n_nhom13_source/');

// Thực hiện định database
define('DB_HOST', 'localhost');
define('DB_NAME', 'ct07n_nhom13');
define('DB_USER', 'root');
define('DB_PASS', '');
