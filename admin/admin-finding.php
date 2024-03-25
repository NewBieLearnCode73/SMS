<?php include_once("inc/header.php"); ?>
<?php include_once("inc/sidebar.php"); ?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Finding By Name</h5>
                </div>
            </div>
        </div>
        <div class="content-page">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="studentTable" class="table custom-table datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Student ID</th>
                                            <th>Class</th>
                                            <th>Score</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Date of Birth</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<?php include_once("inc/footer.php"); ?>