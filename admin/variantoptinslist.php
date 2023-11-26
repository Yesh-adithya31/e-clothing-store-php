<?php include('includes/session.php'); ?>
<?php $selectedItem = 'optionList'; ?>
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
                        <h4>Variant Option List</h4>
                        <h6>Manage your Variant Option</h6>
                    </div>
                    <div class="page-btn">
                        <a href="varaintoptionadd.php" class="btn btn-added"><img src="assets/img/icons/plus.svg" class="me-2" alt="img">Add Variant Option</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="variantOptionTB" class="table">
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="editVariantOption" tabindex="-1" aria-labelledby="editVariantOptionLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="editVariantOptionForm" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Category</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Varianti Options ID</label>
                                    <div class="input-group">
                                        <input id="varOptID" name="varOptID" type="text" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <div class="input-group">
                                        <input type="text" id="categoryName" name="categoryName" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Variant Name</label>
                                    <select class="form-select" id="variantSelect" name="variantSelect" required>
                                        <option value="">Select a Variant</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12"></div>
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Variant Options</label>
                                    <div id="optionContainer" class="row">
                                        <!-- <input type="text" id="categoryName" name="categoryName" readonly> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-submit">Submit</button>
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include('template/footer.php'); ?>
    <script>
        let dt;

        $(document).ready(function() {
            //POST- get DATA from DB
            dt = $('#variantOptionTB').DataTable({
                columns: [{
                        title: 'ID',
                        data: 'variant_option_id'
                    },
                    {
                        title: 'Category Name',
                        data: 'category_name'
                    },
                    {
                        title: 'Variant Name',
                        data: 'name'
                    },
                    {
                        title: 'Values',
                        data: 'value'
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
                    targets: [4],
                    orderable: false,
                    // # column rendering
                    // https://datatables.net/reference/option/columns.render
                    render: function(data, type, row, meta) {
                        var editButton = '<button class="border-0 bg-light me-3 ajax_edit" data-id="' + row.variant_option_id + '" data-categoryname="' + row.category_name + '" data-categoryid="' + row.category_id + '" data-variantid="' + row.variation_id + '" data-values="' + row.value + '"> <img src="assets/img/icons/edit.svg" alt="img"></button>';
                        var confirmDeleteButton = '<button class="border-0 bg-light me-3 ajax_delete" data-row-id="' + row.variant_option_id + '"><img src="assets/img/icons/delete.svg" alt="img"></button>';

                        return editButton + confirmDeleteButton;
                    }
                }],
                ajax: {
                    type: "POST",
                    url: 'includes/variantOptionGetAll.php',
                    // contentType: 'application/json; charset=utf-8',
                    datatype: 'json',
                    dataSrc: ""
                }
            });
        });

        // Add a click event listener to the edit buttons
        $('#variantOptionTB').on('click', '.ajax_edit', function() {
            $('#editVariantOption').modal('show');
            $variantID = $(this).data('variantid');
            $categoryID = $(this).data('categoryid');
            $variantOptions = $(this).data('values');

            $('#varOptID').val($(this).data('id'));
            $('#categoryName').val($(this).data('categoryname'));

            $.ajax({
                url: 'includes/api-getCategoryRelateVariation.php', // Replace with the actual API URL
                type: 'POST', // Use GET or POST as appropriate
                data: {
                    categoryID: $categoryID
                },
                dataType: 'json',
                success: function(data) {
                    var select = $('#variantSelect');
                    select.empty();
                    // Loop through the API response data and add options to the select element
                    $.each(data, function(index, category) {
                        select.append($('<option>', {
                            value: category.variant_id,
                            text: category.name,
                            class: ''
                        }));
                    });
                    $("#variantSelect option[value='" + $variantID + "']").prop('selected', true);
                },
                error: function(xhr, textStatus, error) {
                    console.error(xhr.statusText);
                }
            });

            var optionArray = [];
            optionArray = $variantOptions.split(',');
            console.log(optionArray)
            $('#optionContainer').empty();
            // Loop through the array and create text boxes with delete options for each value
            optionArray.forEach(function(val) {
                addTextBox(val);
            });

        });


        // Function to create and append text boxes with delete options
        function addTextBox(value) {
            var row = $('<div>').addClass('col-4 pt-2');

            var textBox = $('<input>').attr({
                type: 'text',
                value: value,
                name: 'optionsName[]',
                id: 'optionsName',
                style: 'width:80%;'
            }).addClass('m-t-2');

            var deleteButton = $('<img>').attr({
                src: 'assets/img/icons/delete.svg', // Replace with your delete icon image path
                alt: 'Delete',
                class: 'w-20 pt-3 pr-5',
                title: 'Delete'
            }).click(function() {
                $(this).prev('input').remove(); // Remove the associated text box
                $(this).remove(); // Remove the delete button
            });

            row.append(textBox, deleteButton);
            $('#optionContainer').append(row);
        }

        function updateVariantOption() {
            var formData = [];
            formData.push({
                name: $('#varOptID').attr('name'),
                value: $('#varOptID').val()
            }, {
                name: $('#variantSelect').attr('name'),
                value: $('#variantSelect').val()
            });
            var data = [];
            $('input[name^="optionsName"]').each(function(index, element) {
                var inputValue = $(element).val();
                data.push(inputValue);
            });

            formData.push({
                name: $('#optionsName').attr('name'),
                value: data
            });

            $.ajax({
                url: 'includes/variantOptionEdit.php',
                data: formData,
                dataType: 'json',
                method: 'POST',
                processData: true,
                error: function(error) {
                    Swal.fire({
                        title: 'Error!',
                        text: error.message,
                        icon: 'error',
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
                }
            });
        }

        $('#editVariantOptionForm').on('submit', function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();
            // Call the createCategory function
            updateVariantOption();
        });

        // Add a click event listener to the delete buttons
        $('#variantOptionTB').on('click', '.ajax_delete', function() {
            var rowId = $(this).data('row-id');

            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to delete this row.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
            }).then(function(result) {
                if (result.isConfirmed) {
                    // User confirmed the deletion, perform the delete action here
                    $.ajax({
                        url: 'includes/variantOptionDelete.php', // Replace with your delete API endpoint
                        type: 'POST',
                        data: {
                            varOpt_id: rowId
                        },
                        success: function(data) {
                            // Parse the JSON response
                            var response = JSON.parse(data);
                            // Handle successful deletion
                            // You may also need to refresh the DataTable
                            if (response.emessage) {
                                Swal.fire({
                                    title: 'Error!',
                                    text: response.message, // Display the message property
                                    icon: 'error',
                                });
                            } else {
                                Swal.fire({
                                    title: 'Success!',
                                    text: response.message, // Provide a default message
                                    icon: 'success',
                                });
                            }
                            dt.ajax.reload();
                        },
                        error: function(error) {
                            // Handle error
                            Swal.fire({
                                title: 'Error!',
                                text: error.message,
                                icon: 'error',
                            });
                            dt.ajax.reload();
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>