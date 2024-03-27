<?php
// Điều hướng đến trang khác
function redirect($location)
{
    header("Location: {$location}");
}


// Kiểm tra admin
function admin_checking($user)
{
    if ($user->role != 1) {
        return false;
    }
    return true;
}

function upload_file()
{
    try {
        // Trường hop không có file nào được upload
        if (empty($_FILES)) {
            $_SESSION['message'] = "No file was uploaded";
            return null;
        }
        $rs = Errorfileupload::error($_FILES['file']['error']);
        if ($rs != 'OK') {
            $_SESSION['message'] = $rs;
            return null;
        }

        // Giới hạn dung lượng của file
        if ($_FILES['file']['size'] > FILE_MAX_SIZE) {
            $_SESSION['message'] = "File size is too large";
            return null;
        }

        // Giới hạn loại file hình ảnh
        $mine_types = FILE_TYPE;
        // Kiểm tra phần thông tin file để đảm bảo rằng là file hình ảnh
        $fileinfo = finfo_open(FILEINFO_MIME_TYPE);

        // File upload sẽ lưu trong tmp_name
        $file_mine_type = finfo_file($fileinfo, $_FILES['file']['tmp_name']);
        if (!in_array($file_mine_type, $mine_types)) {
            $_SESSION['message'] = "File type must be an image";
            return null;
        }

        // Chuẩn hóa tên file trước khi upload lên server
        $pathinfo = pathinfo($_FILES['file']['name']); // Lấy thông tin về file
        $filename = $pathinfo['filename']; // Lấy tên file
        $filename = preg_replace('/[^a-zA-Z0-9_-]/', '_', $filename); // Chuẩn hóa tên file

        // Xử lý không ghi đè nếu đã tồn tại file trong uploads
        $fullname = $filename . '.' . $pathinfo['extension']; // Tên file sau khi chuẩn hóa
        $fileToHost = $_SERVER['DOCUMENT_ROOT'] . "/ct07n_nhom13_source/uploads/" . $fullname;         // Đường dẫn file trên server
        $i = 1;
        while (file_exists($fileToHost)) {
            $fullname = $filename . "(" . "$i" . ")" . $pathinfo['extension'];
            $fileToHost = $_SERVER['DOCUMENT_ROOT'] . "/ct07n_nhom13_source/uploads/" . $fullname;
            $i++;
        }

        // Lấy file tạm trong bộ nhớ đưa lên host
        $fileTmp = $_FILES['file']['tmp_name'];
        if (move_uploaded_file($fileTmp, $fileToHost)) {
            return $fullname;
        } else {
            return null;
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
    }
}

// Nối vào đường dẫn gốc của trang web
function url_for($url)
{
    return URL_ROOT . $url;
}

// Kiểm tra có session message hay không
function has_message()
{
    if (isset($_SESSION['message'])) {
        echo "<script>alert('{$_SESSION['message']}')</script>";
        unset($_SESSION['message']);
    }
}
