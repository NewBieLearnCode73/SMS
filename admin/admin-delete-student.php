<?php
require_once(dirname(dirname(__DIR__)) . '/ct07n_nhom13_source/inc/init.php');

$id = $_GET['id'] ?? null;
if (!$id) {
    redirect(url_for('error-404.php'));
}

$student = Student::find_by_id($id);
if (!$student) {
    redirect(url_for('error-404.php'));
}

if (!empty($student->image)) {
    $student->delete_image();
}

$student->delete_student_and_account();
redirect(url_for("index.php"));
