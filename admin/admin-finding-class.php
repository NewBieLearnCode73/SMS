<?php include_once("inc/header.php"); ?>
<?php include_once("inc/sidebar.php"); ?>


<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Finding By Class</h5>
                </div>
            </div>
        </div>
        <div class="content-page">

            <!-- Start Form -->
            <form action="" method="post">
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-6">
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group form-focus select-focus">
                            <select class="form-control select select2-hidden-accessible" data-select2-id="select2-data-1-e77n" tabindex="-1" aria-hidden="true" name="class">
                                <option data-select2-id="select2-data-3-e6je">Select Class</option>
                                <?php
                                foreach ($classes_exist as $grade => $classes) {
                                    echo "<optgroup label='$grade'>";
                                    foreach ($classes as $class) {
                                        echo "<option>$class</option>";
                                    }
                                    echo "</optgroup>";
                                }
                                ?>
                            </select>
                            <label class="focus-label">Select Classes</label>
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
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- <div class="row">
                <?php
                //$page = new Pagination($conn, 'students');

                ?>
                <div class="col-sm-12 col-md-6">
                    <div>
                        <?php
                        // Hiển thị tổng số sinh viên và số trang
                        //echo "<b>Total students:</b> " . $page->get_total_records() . " - <b>Page:</b> ";
                        ?>

                        <span id="current_page"></span>

                        <?php
                        // Hiển thị nội dung số trang hiện tại
                        //echo  "/ " . $page->get_pagination_number();
                        ?>
                    </div>
                </div>


                <div class="col-sm-12 col-md-6">
                    <div class="float-right">
                        <ul class="pagination">

                        </ul>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>












<?php include_once("inc/footer.php"); ?>