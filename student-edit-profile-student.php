<?php include_once("inc/header.php"); ?>
<?php include_once("inc/sidebar.php"); ?>


<?php
if (isset($_POST['submit'])) {
    // Vòng lặp foreach nếu như có dữ liệu thì gán mới nếu không thì giữ nguyên
    foreach ($student as $key => $value) {
        if (isset($_POST[$key])) {
            $student->$key = $_POST[$key];
        }
    }

    if ($_FILES['file']['name'] != "") {
        // Xóa file cũ
        $student->delete_image();
        $student->image = upload_file();
    } else {
        $old_image = $student->image;
        $student->image = $old_image;
    }
    if ($student->update_by_student()) {
        redirect("student-edit-profile-student.php");
    }
}

?>

<!-- Main content -->
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-content">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-sm-6 col-12">
                                <!-- Single form combining both sections -->
                                <form class="custom-mt-form" method="post" action="" enctype="multipart/form-data">
                                    <!-- Section 1: Personal Information -->
                                    <div class="form-group">
                                        <label for="name">Fullname</label>
                                        <input type="text" class="form-control" name="name" id="fullname" value="<?php echo $student->name; ?>" disabled />
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $student->email; ?>" required="required" />
                                    </div>

                                    <div class="form-group">
                                        <label for="score">Score</label>
                                        <input type="number" class="form-control" name="score" id="score" min="0" max="10" step="0.1" value="<?php echo $student->score; ?>" disabled />
                                    </div>
                                    <div class="form-group">
                                        <label for="birthdate">Birth Date</label>
                                        <input class="form-control" type="date" name="birthdate" id="birthdate" value="<?php echo $student->birthdate; ?>" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" id="address" value="<?php echo $student->address; ?>" required="required" />
                                    </div>

                                    <!-- Section 2: Student Image -->
                                    <div class="form-group">
                                        <label for="image">Student Image</label>
                                        <input type="file" name="file" accept="image/*" class="form-control" id="image" value="<?php echo $student->image; ?>" />
                                    </div>

                                    <!-- Form submission buttons -->
                                    <div class="form-group text-center custom-mt-form-group">
                                        <button class="btn btn-primary mr-2" type="submit" name="submit" value="submit">
                                            Submit
                                        </button>
                                        <button class="btn btn-secondary" type="reset">
                                            Reset
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 center-box">
                                <!-- Single form combining both sections -->
                                <div class="profile-info-box">
                                    <div class="info-box-header">
                                        <h4 class="delete-margin-text">Information</h4>
                                    </div>
                                    <div class="inside">
                                        <div class="box-inner">

                                            <p class="text">
                                                Fullname: <span class="data"><?php echo $student->name; ?></span>
                                            </p>
                                            <p class="text">
                                                Email: <span class="data"><?php echo $student->email; ?></span>
                                            </p>
                                            <p class="text">
                                                Score: <span class="data"><?php echo $student->score; ?></span>
                                            </p>
                                            <p class="text">
                                                Birth Date: <span class="data"><?php echo $student->birthdate; ?></span>
                                            </p>
                                            <p class="text">
                                                Address: <span class="data"><?php echo $student->address; ?></span>
                                            </p>
                                            <p class="text">
                                                Student Image: <span class="data"><?php echo $student->image; ?></span>
                                            </p>
                                        </div>

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