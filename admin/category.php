<?php
// Set the selected item based on the current page
$selectedItem = 'category';
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
                                    <h6 class="mb-0">Manage Category Details</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <a class="btn bg-gradient-dark mb-0 fixed-plugin-btn" href="javascript:;"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Category</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card my-0">
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive m-t-40 p-2">
                                <table id="myTable" class="table table-striped">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SIDE-DRAWER -->
            <?php include('template//side-drawers/category-drawer.php'); ?>
            <!-- END SIDE-DRAWER -->
            <?php include('template/dash-foot.php'); ?>
        </div>
    </main>
    <script>
        //POST - Create Category
        function createCategory() {
            $.ajax({
                url: 'includes/api-categoryAdd.php',
                data: $('#catrgoryForm').serializeArray(),
                dataType: 'json',
                method: 'POST',
                processData: true,
                error: function(error) {
                    Swal.fire({
                        title: 'Success!',
                        text: r.message,
                        icon: 'success',
                    });
                    dt.ajax.reload();
                },
                success: function(r) {
                    Swal.fire({
                        title: 'Success!',
                        text: r.message,
                        icon: 'success',
                    });
                    dt.ajax.reload();
                    $("#category_name").val('');
                }
            });
        }

        $('#catrgoryForm').on('submit', function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();
            // Call the createCategory function
            createCategory();
        });

        let dt;
        $(document).ready(function() {
            //POST- get DATA from DB
            dt = $('#myTable').DataTable({
                columns: [{
                        title: 'ID',
                        data: 'id'
                    },
                    {
                        title: 'Category Name',
                        data: 'category_name'
                    },
                    {
                        title: 'Action'
                    }
                ],
                // data: data,
                language: {
                    emptyTable: "No files to show..."
                },
                columnDefs: [{
                    // # action controller (edit,delete)
                    targets: [2],
                    orderable: false,
                    // # column rendering
                    // https://datatables.net/reference/option/columns.render
                    render: function(data, type, row, meta) {
                        return '<button class="btn btn-sm btn-info mx-2">Edit</button>' +
                            '<button class="btn btn-sm btn-danger">Delete</button>';
                    }
                }],
                ajax: {
                    type: "POST",
                    url: 'includes/api-getCategory.php',
                    // contentType: 'application/json; charset=utf-8',
                    datatype: 'json',
                    dataSrc: ""
                }
            });
        });
    </script>
    <?php include('template/footer.php'); ?>