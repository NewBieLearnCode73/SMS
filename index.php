<?php require_once("inc/init.php") ?>

<?php
if (!$session->is_signed_in()) {
    redirect("login.php");
}
?>

<?php $user = User::find_by_id($session->user_id); // Lấy thông tin tài khoản admin hiện tại 
?>
<?php $student = Student::find_by_id($user->student_id); ?>

<!-- Main content -->
<?php
// login admin
if (admin_checking($user)) {
    require_once("admin/admin-dashboard.php");
} else {
    require_once("student-profile.php");
}
?>