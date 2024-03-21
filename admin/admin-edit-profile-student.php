<?php include_once("inc/header.php"); ?>
<?php include_once("inc/sidebar.php"); ?>

<?php

try {
    $id = $_GET['id'] ?? null;
    if (!$id) {
        redirect("admin-dashboard.php");
    }

    $student = Student::find_by_id($id);
    if ($_POST['submit'] ?? false) {
        foreach ($student as $key => $value) {
            if (isset($_POST[$key])) {
                $student->$key = $_POST[$key];
            }
        }

        if (!empty($_FILES['file']['name'])) {
            $student->delete_image();
            $student->image = upload_file();
        }

        if ($student->update_by_admin()) {
            // Tạo session thông báo
            $_SESSION['message'] = 'Updated successfully';

            redirect("admin-edit-profile-student.php?id=" . $student->id);
        }
    }
} catch (Throwable $e) {
    redirect(url_for("error-505.php"));
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
                                        <input type="text" class="form-control" name="name" id="fullname" value="<?php echo $student->name; ?>" required="required" />
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $student->email; ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label for="score">Score</label>
                                        <input type="text" class="form-control" name="score" id="score" value="<?php echo $student->score; ?>" required="required" />
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