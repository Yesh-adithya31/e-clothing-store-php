<?php
// Set the selected item based on the current page
$selectedItem = 'variations';
?>
<?php include('template/header.php'); ?>

<body class="g-sidenav-show  bg-gray-200">
    <?php include('template/dash-sidebar.php'); ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <?php include('template/dash-navbar.php'); ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card mt-1">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Manage User Details</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <a class="btn bg-gradient-dark mb-0 fixed-plugin-btn" href="javascript:;"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New User</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card my-0">
                        <div class="table-responsive m-t-40 p-2">
                            <table id="myTable" class="table table-striped">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SIDE-DRAWER -->
        <?php include('template/side-drawers/user-drawer.php'); ?>
        <!-- END SIDE-DRAWER -->
        <?php include('template/dash-foot.php'); ?>
        </div>
    </main>
    <?php include('template/footer.php'); ?>