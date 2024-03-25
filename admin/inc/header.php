<?php
require_once(dirname(dirname(__DIR__)) . '/inc/init.php');

if (!$session->is_signed_in()) {
    redirect(url_for("login.php"));
}
?>

<?php $user = User::find_by_id($session->user_id); // Lấy thông tin tài khoản admin hiện tại 
?>
<?php $student = Student::find_by_id($user->student_id); ?>

<?php
// Nếu như user không phải là admin thì chuyển hướng về trang index
if ($user->role != 1) {
    redirect(url_for("index.php"));
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>CT07GROUP13</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body>
    <div class="main-wrapper">
        <!-- START Header -->
        <div class="header-outer">
            <div class="header">
                <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fas fa-bars" aria-hidden="true"></i></a>
                <a id="toggle_btn" class="float-left" href="javascript:void(0);">
                    <img src="assets/img/sidebar/icon-21.png" alt="" />
                </a>

                <ul class="nav user-menu float-right">
                    <li class="nav-item dropdown has-arrow">
                        <a href="#" class="nav-link user-link" data-toggle="dropdown">
                            <span><?php echo $user->username; ?></span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo url_for("logout.php") ?>">Logout</a>
                        </div>
                    </li>
                </ul>
                <div class="dropdown mobile-user-menu float-right">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="<?php echo url_for("logout.php") ?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>