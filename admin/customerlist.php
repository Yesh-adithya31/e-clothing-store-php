<?php include('includes/session.php'); ?>
<?php $selectedItem = 'customerList'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('template/head.php'); ?>
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"></div>
    </div>

    <div class="main-wrapper">
        <?php include('template/header.php'); ?>

        <?php include('template/sidebar.php'); ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Customer List</h4>
                        <h6>Manage your Customers</h6>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="customerTB" class="table table-borderless">
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <?php include('template/footer.php'); ?>
    <script>
        let dt;
        $(document).ready(function() {
            //POST- get DATA from DB
            dt = $('#customerTB').DataTable({
                columns: [{
                        title: 'User ID',
                        data: 'user_id'
                    },
                    {
                        title: 'First Name',
                        data: 'first_name'
                    },
                    {
                        title: 'Last Name',
                        data: 'last_name'
                    },
                    {
                        title: 'Email',
                        data: 'email'
                    },
                    {
                        title: 'Phone Number',
                        data: 'phone_number'
                    },
                ],
                // data: data,
                language: {
                    emptyTable: "No files to show..."
                },
                ajax: {
                    type: "POST",
                    url: 'includes/api-getUser.php',
                    // contentType: 'application/json; charset=utf-8',
                    datatype: 'json',
                    dataSrc: ""
                }
            });
        });
    </script>
</body>

</html>