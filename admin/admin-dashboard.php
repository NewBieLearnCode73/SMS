<?php include_once("inc/header.php"); ?>
<?php include_once("inc/sidebar.php"); ?>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <div class="page-title">
                                    <b>All Students</b>
                                </div>
                            </div>
                            <div class="col-sm-6 text-sm-right"></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table custom-table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Student ID</th>
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

                <?php
                $page = new Pagination($conn, 'students');

                ?>
                <div class="float-right">
                    <ul class="pagination">

                    </ul>
                </div>


                <div class="float-left">
                    <?php
                    // Hiển thị tổng số sinh viên và số trang
                    echo "<b>Total students:</b> " . $page->get_total_records() . " - <b>Page:</b> ";
                    ?>

                    <span id="current_page"></span>

                    <?php
                    // Hiển thị nội dung số trang hiện tại
                    echo  "/ " . $page->get_pagination_number();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("inc/footer.php"); ?>