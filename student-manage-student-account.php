<?php include_once("inc/header.php"); ?>
<?php include_once("inc/sidebar.php"); ?>

<?php
$error = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'] ?? '';
    $repassword = $_POST['repassword'] ?? '';

    $user->editPassword($user->id, $_POST['password']);
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
                            <form method="post" action="" class="form-student-account">
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
                                        <p class="error"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control form-student-account__input--password" name="password" />
                                        </div>

                                        <p class="error"></p>

                                        <div class="form-group">
                                            <label for="repassword">Enter the password again</label>
                                            <input type="password" class="form-control form-student-account__input--repassword" name="repassword" />
                                        </div>
                                        <p class="error"></p>

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