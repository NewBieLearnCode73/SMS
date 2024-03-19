<?php
require "inc/init.php"; // Nạp file init.php vào

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if ($session->is_signed_in()) {
    redirect("index.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Nếu là phương thức POST
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Kiểm tra xem người dùng có tồn tại hay không
    $user_found = User::verify_user($username, $password);

    if ($user_found != false) {
        $session->login($user_found);
        redirect("index.php");
    } else {
        $the_message = "User not found or password incorrect";
    }
} else {
    $the_message = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>GROUP13</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css" />

    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
    <div class="main-wrapper">
        <div class="account-page">
            <div class="container">
                <h3 class="account-title text-white">Login</h3>
                <div class="account-box">
                    <div class="account-wrapper">
                        <div class="account-logo">
                            <img src="assets/img/logo1.png" alt="SchoolAdmin" /> <span>GROUP13</span>
                        </div>

                        <!-- FORM ĐĂNG NHẬP -->
                        <form action="" class="form-login" method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control form-login__input--username" name="username" />
                            </div>
                            <p class="error"></p>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control form-login__input--password" name="password" />
                            </div>
                            <p class="error">
                            <p class="error">
                                <?php if (isset($the_message)) {
                                    echo $the_message;
                                }
                                ?>
                            </p>
                            </p>

                            <div class="form-group text-center custom-mt-form-group">
                                <button class="btn btn-primary btn-block account-btn" type="submit">
                                    Login
                                </button>
                            </div>
                        </form>
                        <!-- KẾT THÚC -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script src="assets/js/validationADD.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/jquery.slimscroll.js"></script>

    <script src="assets/js/app.js"></script>
</body>

</html>