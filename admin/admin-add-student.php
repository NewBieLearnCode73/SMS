<?php include_once("inc/header.php"); ?>
<?php include_once("inc/sidebar.php"); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $student = new Student();
        $student->name = $_POST['fullname'];
        $student->birthdate = $_POST['birthdate'];
        $student->address = $_POST['address'];
        $student->score = $_POST['score'];

        // Kiểm tra email
        $email = $_POST['email'];
        if (!empty($email)) {
            if (Student::find_email($email)) {
                $_SESSION['message'] = 'Email already exists';
                redirect(url_for("admin-add-student.php"));
            } else {
                $student->email = $email;
            }
        }

        if (!empty($_FILES['file'])) {
            $image = upload_file();
            $student->image = $image;
            if (!$student->create()) {
                unlink($_SERVER['DOCUMENT_ROOT'] . "/ct07n_nhom13_source/uploads/" . $image);
            }
        } else {
            if (!$student->create()) {
                redirect(url_for('error-404.php'));
            }
        }
        $class = new Classes();
        $class->class_name = $_POST['class'];
        $class->student_id = $student->id;
        $class->create();

        // Tạo session thông báo
        $_SESSION['message'] = 'Added successfully';
        redirect(url_for("admin-add-student.php"));
    } catch (Throwable $e) {
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
                        Add Student
                    </h5>
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <!-- Single form combining both sections -->
                                <form class="custom-mt-form" method="post" enctype="multipart/form-data">
                                    <!-- Section 1: Personal Information -->
                                    <div class="form-group">
                                        <label for="fullname">Fullname</label>
                                        <input type="text" class="form-control" name="fullname" id="fullname" required="required" />
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" />
                                    </div>

                                    <div class="form-group">
                                        <label for="class">class</label>
                                        <select class="form-control" name="class" id="class">
                                            <option value="">Select Class</option>
                                            <?php foreach ($classes_exist as $grade => $classes) : ?>
                                                <optgroup label="<?php echo $grade; ?>">
                                                    <?php foreach ($classes as $class) : ?>
                                                        <option value="<?php echo $class; ?>"><?php echo $class; ?></option>
                                                    <?php endforeach; ?>
                                                </optgroup>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="score">Score</label>
                                        <input type="number" class="form-control" name="score" id="score" min="0" max="10" step="0.1" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <label for="birthdate">Birth Date</label>
                                        <input class="form-control" type="date" name="birthdate" id="birthdate" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" id="address" required="required" />
                                    </div>

                                    <!-- Section 2: Student Image -->
                                    <div class="form-group">
                                        <label for="student-image">Student Image</label>
                                        <input type="file" name="file"" class=" form-control" id="student-image" />
                                    </div>

                                    <!-- Form submission buttons -->
                                    <div class="form-group text-center custom-mt-form-group">
                                        <button class="btn btn-primary mr-2" type="submit">
                                            Add Student
                                        </button>
                                    </div>
                                </form>
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