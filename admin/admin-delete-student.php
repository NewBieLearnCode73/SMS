<?php
require_once(dirname(dirname(__DIR__)) . '/ct07n_nhom13_source/inc/init.php');

if (empty($_GET['id'])) {
    redirect(url_for('error-404.php'));
}

$student = Student::find_by_id($_GET['id']);
if ($student) {
    if (!empty($student->image)) {
        $student->delete_image();
        $student->delete_student_and_account();
        redirect(url_for("index.php"));
    } else {
        $student->delete_student_and_account();
        redirect(url_for("index.php"));
    }
} else {
    redirect(url_for('error-404.php'));
}
