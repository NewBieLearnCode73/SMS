<?php include_once("inc/header.php"); ?>
<?php include_once("inc/sidebar.php"); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_GET['id'])) {
    $id = $_GET['id'];
    if (Student::find_by_id($id)) {
        $student = Student::find_by_id($id);
    } else {
        $_SESSION['message'] = "Student not found!";
        redirect(url_for('admin-finding-student-by-id.php'));
    }
}
?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Finding By ID</h5>
                </div>
            </div>
        </div>
        <div class="content-page">

            <!-- Start Form -->
            <form action="" method="get">
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-6">
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating" name="id">
                            <label class="focus-label">Id</label>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-2">
                        <button class="btn btn-search rounded btn-block" type="submit">Finding</button>
                    </div>
                </div>
            </form>
            <!-- End Form -->

            <div class=" row">
                <div class="col-md-12 mb-3">
                    <div class="table-responsive">
                        <table class="table custom-table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Student ID</th>
                                    <th>Class</th>
                                    <th>Score</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Date of Birth</th>
                                    <th class="text-right">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="admin-find-id">
                                <?php
                                if (!empty($student)) {
                                ?>
                                    <tr>
                                        <td>
                                            <h2>
                                                <a href='admin-student-profile.php?id=<?= $student->id; ?>' class='avatar text-white'>
                                                    <img src='<?php echo url_for($student->picture_path()) ?>' alt='' />
                                                </a>
                                                <a href='admin-student-profile.php?id=<?= $student->id; ?>'><?= $student->name; ?></a>
                                            </h2>
                                        </td>
                                        <td><?= $student->id; ?></td>
                                        <td><?= $student->class_name; ?></td>
                                        <td><?= $student->score; ?></td>
                                        <td><?= $student->email; ?></td>
                                        <td><?= $student->address; ?></td>
                                        <td><?= $student->birthdate; ?></td>
                                        <td class="text-right">
                                            <a href="admin-edit-profile-student.php?id=<?= $student->id; ?>" class="btn btn-primary btn-sm mb-1 mr-1" title="Edit Student Profile">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="admin-manage-student-account.php?id=<?= $student->id; ?>" class="btn btn-primary btn-sm mb-1 mr-1" title="Manage Student Account">
                                                <i class="fa fa-unlock-alt"></i>
                                            </a>
                                            <a href="admin-delete-student.php?id=<?= $student->id; ?>" class="btn btn-danger btn-sm mb-1 mr-1" title="Delete Student">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                } else {
                                    echo "<tr><td colspan='8'>Student not found!</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include_once("inc/footer.php"); ?>