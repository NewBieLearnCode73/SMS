<?php
require_once('inc/init.php'); // Lấy kết nối

$cur_page = (int)$_GET['page']; // nhận trang từ js gửi lên qua ajax

$page = new Pagination($conn, 'students'); // Tạo đối tượng phân trang
$page->set_current_page($cur_page); // Đặt trang hiện tại
$page_number = $page->get_pagination_number(); // Lấy tổng số trang

// If the page is less than 1, set it to 1
if ($cur_page < 1) {
    $cur_page = 1;
}

// If the page is greater than the total number of pages, set it to the last page
if ($cur_page > $page_number) {
    $cur_page = $page_number;
}

$students = $page->get_data(); // Lấy dữ liệu sinh viên ở trang hiện tại


// Sử dụng phương thức find_by_id() để lấy thông tin sinh viên từ cơ sở dữ liệu và trả về đường dẫn hình ảnh
foreach ($students as $student) {
    $student->image = $student->picture_path();
}


// Trả dữ liệu dưới dạng json là mảng các sinh viên ở trang hiện tại

echo json_encode(array('students' => $students, 'cur_page' => $cur_page, 'page_number' => $page_number));
