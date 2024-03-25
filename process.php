<?php
require_once('inc/init.php'); // Lấy kết nối

// Nếu như đứng ở trang index.php thì xử lí phân trang ở đây



// Trả dữ liệu dưới dạng json là mảng các sinh viên ở trang hiện tại


if (parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH) == '/ct07n_nhom13_source/index.php') {

    $cur_page = (int)$_GET['page']; // nhận trang từ js gửi lên qua ajax

    $page = new Pagination($conn, 'students'); // Tạo đối tượng phân trang
    $page->set_current_page($cur_page); // Đặt trang hiện tại
    $page_number = $page->get_pagination_number(); // Lấy tổng số trang

    $students = $page->get_full('classes', 'classes.class_name', 'student_id', 'id'); // Lấy dữ liệu sinh viên ở trang hiện tại


    // Sử dụng phương thức find_by_id() để lấy thông tin sinh viên từ cơ sở dữ liệu và trả về đường dẫn hình ảnh
    foreach ($students as $student) {
        $student->image = $student->picture_path();
    }
    echo json_encode(array('students' => $students, 'cur_page' => $cur_page, 'page_number' => $page_number));
}
