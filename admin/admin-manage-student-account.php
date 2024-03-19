<?php include_once("inc/header.php"); ?>
<?php include_once("inc/sidebar.php"); ?>
<?php
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $student = Student::find_by_id($id);
    if (empty($student)) {
        redirect(url_for('error-404.php'));
    }
} else {
    redirect(url_for('error-404.php'));
}

// Xủ lí form
$inform = array();
$username = "";
$password = "";

// Kiểm tra dữ liệu
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $partten_username = '/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d_]{8,20}$/';
    $partten_pass = '/^(?=.*[A-Z])(?=.*[a-z]).{8,20}$/';

    // Kiểm tra username
    if (!User::is_exist_student_id($student->id)) {
        // Kiểm tra username
        if (empty($_POST['username'])) {
            $inform['username'] = 'Username not empty';
        } else if (!preg_match($partten_username, $_POST['username'])) {
            $inform['username'] = 'Username not fit';
        } else if (User::find_username($_POST['username'])) {
            $inform['username'] = 'Username already exists';
        } else {
            $username = $_POST['username'];
        }
    }

    // Kiểm tra password
    if (empty($_POST['password'])) {
        $inform['password'] = 'Password not empty';
    } else if (strlen($_POST['password']) < 8) {
        $inform['password'] = 'Password from 8 characters';
    } else if (!preg_match($partten_pass, $_POST['password'])) {
        $inform['password'] = 'Password not fit';
    } else {
        $password = $_POST['password'];
    }

    //Lưu dữ liệu vào database
    if (!empty($username) && !empty($password)) {
        $user = new User();
        $user->username = $username;
        $user->password = $password;
        $user->student_id = $student->id;
        $user->create();
        $_SESSION['message'] = 'Password changed successfully';
        redirect("admin-manage-student-account.php?id=$student->id");
    } else if (User::is_exist_student_id($student->id) && !empty($password)) {
        $user = User::is_exist_student_id($student->id);
        $user->password = $password;
        $user->editPassword($user->id, $password);
        // Thông báo thành công
        $_SESSION['message'] = 'Password changed successfully';
        redirect("admin-manage-student-account.php?id=$student->id");
    }
}
?>

<!-- Main content -->
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">
                        Manage Account
                    </h5>
                </div>
            </div>
        </div>
        <div class="content-page">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="card">
                        <div class="card-body">

                            <!-- FORM ĐĂNG KÍ -->
                            <form method="post" action="">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username" <?php
                                                                                                    // Nếu như user_id đã tồn tại thì hiển thị username và disable input
                                                                                                    if (User::is_exist_student_id($student->id)) {
                                                                                                        echo "value=" . '"' . User::is_exist_student_id($student->id)->username . '"';
                                                                                                        echo " disabled";
                                                                                                    } ?> />
                                        </div>
                                        <p class="error">
                                            <?php if (!empty($inform['username'])) {
                                                echo $inform['username'];
                                            } ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" />
                                        </div>
                                        <p class="error">
                                            <?php if (!empty($inform['password'])) {
                                                echo $inform['password'];
                                            } else if (!empty($_SESSION['message'])) {
                                                echo "<b>" . $_SESSION['message'] . "</b>";
                                            } ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-center m-t-20">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            Change Password
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- END FORM ĐĂNG KÍ -->

                        </div>
                    </div>
                </div>

                <div class="col-md-6 center-box">
                    <!-- Single form combining both sections -->
                    <div class="profile-info-box">
                        <div class="info-box-header">
                            <h4 class="delete-margin-text">Information</h4>
                        </div>
                        <div class="inside">
                            <div class="box-inner">

                                <p class="text">
                                    Username: <span class="data"><?php if (User::is_exist_student_id($student->id)) {
                                                                        echo User::is_exist_student_id($student->id)->username;
                                                                    } ?></span>
                                </p>
                                <p class="text">
                                    Password: <span class="data"><?php if (User::is_exist_student_id($student->id)) {
                                                                        echo "••••••••••••••";
                                                                    } ?></span>
                                </p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End maincontent -->


<?php include_once("inc/footer.php"); ?>