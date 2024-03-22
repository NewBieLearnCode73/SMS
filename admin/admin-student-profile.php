<?php include_once("inc/header.php"); ?>
<?php include_once("inc/sidebar.php"); ?>

<?php
if (empty($_GET['id'])) {
    redirect(url_for('error-404.php'));
} else {
    $id = $_GET['id'];
    $student = Student::find_by_id($id);
    if (empty($student)) {
        redirect(url_for('error-404.php'));
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
                        Student Profile
                    </h5>
                </div>
            </div>
        </div>
        <div class="card-box m-b-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href="">
                                    <img class="avatar" src="<?php echo url_for($student->picture_path()) ?>" alt="" /></a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0">
                                            <?php echo $student->name; ?>
                                        </h3>
                                        <h5 class="company-role m-t-0 m-b-0">
                                            CT07NHOM13
                                        </h5>
                                        <small class="text-muted">H.O.D</small>
                                        <div class="staff-id">
                                            Student ID : <?php echo $student->id; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <span class="title">Email:</span>
                                            <span class="text"><a href="mailto:<?php echo $student->email; ?>?subject=Support&body=Message"><?php echo $student->email; ?></a></span>
                                        </li>
                                        <li>
                                            <span class="title">Birthday:</span>
                                            <span class="text"><?php echo $student->birthdate ?></span>
                                        </li>
                                        <li>
                                            <span class="title">Address:</span>
                                            <span class="text"><?php echo $student->address ?></span>
                                        </li>
                                        <li>
                                            <span class="title">Classs:</span>
                                            <span class="text"><?php echo Classes::find_class_by_student_id($id)[0]->class_name ?></span>
                                        </li>
                                        <li>
                                            <span class="title">Score:</span>
                                            <span class="text"><?php echo $student->score ?></span>
                                        </li>
                                    </ul>
                                </div>
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