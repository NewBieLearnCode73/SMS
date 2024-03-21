<!-- Start Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <div class="header-left">
                <a href="<?php echo url_for("index.php") ?>" class="logo">
                    <img src="assets/img/logo1.png" width="40" height="40" alt="" />
                    <span class="text-uppercase">GROUP13</span>
                </a>
            </div>
            <ul class="sidebar-ul">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="<?php echo url_for("index.php") ?>"><img src="assets/img/sidebar/icon-1.png" alt="icon" /><span>All Student</span></a>
                </li>

                <li>
                    <a href=" <?php echo url_for("admin-add-student.php") ?>"><img src="assets/img/sidebar/icon-2.png" alt="icon" /><span>Add Student</span></a>
                </li>
                <li>
                    <a href=" <?php echo url_for("admin-account.php") ?>"><img src="assets/img/sidebar/icon-3.png" alt="icon" /><span>Admin Account</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->