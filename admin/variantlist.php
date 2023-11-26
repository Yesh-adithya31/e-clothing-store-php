<?php include('includes/session.php'); ?>
<?php $selectedItem = 'variantList'; ?>
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
            <h4>Product Variant list</h4>
            <h6>View/Search product Variant</h6>
          </div>
          <div class="page-btn">
            <a href="variantadd.php" class="btn btn-added"><img src="assets/img/icons/plus.svg" class="me-2" alt="img" />
              Add Variant</a>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table id="variantTB" class="table table-group-divider">
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editVariant" tabindex="-1" aria-labelledby="editVariantLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form id="editVariantForm" method="POST">
          <div class="modal-header">
            <h5 class="modal-title">Edit Category</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-6 col-sm-12 col-12">
                <div class="form-group">
                  <label>Category ID</label>
                  <div class="input-group">
                    <input id="variantID" name="variantID" type="text" readonly>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12 col-12">
                <div class="form-group">
                  <label>Category Name</label>
                  <div class="input-group">
                    <select class="form-select" id="categorySelect" name="categorySelect">
                      <option value="">Select a Category</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12 col-12">
                <div class="form-group">
                  <label>Variant Name</label>
                  <div class="input-group">
                    <input type="text" id="variantName" name="variantName">
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
      dt = $('#variantTB').DataTable({
        columns: [{
            title: 'ID',
            data: 'variant_id'
          },
          {
            title: 'Category Name',
            data: 'category_name'
          },
          {
            title: 'Variation Name',
            data: 'name'
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
          targets: [3],
          orderable: false,
          // # column rendering
          // https://datatables.net/reference/option/columns.render
          render: function(data, type, row, meta) {
            var editButton = '<button class="border-0 bg-light me-3 ajax_edit" data-id="' + row.variant_id + '" data-categoryid="' + row.id + '" data-name="' + row.name + '"> <img src="assets/img/icons/edit.svg" alt="img"></button>';
            var confirmDeleteButton = '<button class="border-0 bg-light me-3 ajax_delete" data-row-id="' + row.variant_id + '"><img src="assets/img/icons/delete.svg" alt="img"></button>';

            return editButton + confirmDeleteButton;
          }
        }],
        ajax: {
          type: "POST",
          url: 'includes/api-getVariation.php',
          // contentType: 'application/json; charset=utf-8',
          datatype: 'json',
          dataSrc: ""
        }
      });
    });

    // Add a click event listener to the edit buttons
    $('#variantTB').on('click', '.ajax_edit', function() {
      $('#editVariant').modal('show');
      $categoryID = $(this).data('categoryid');
      console.log($categoryID)

      $('#variantID').val($(this).data('id'));
      $('#variantName').val($(this).data('name'));

      // Category Filtering
      $.ajax({
        url: 'includes/api-getCategory.php', // Replace with the actual API URL
        type: 'POST', // Use GET or POST as appropriate
        dataType: 'json',
        success: function(data) {
          var select = $('#categorySelect');


          // Loop through the API response data and add options to the select element
          $.each(data, function(index, category) {
            select.append($('<option>', {
              value: category.id,
              text: category.category_name,
              class: ''
            }));
          });
          $("#categorySelect option[value='" + $categoryID + "']").prop('selected', true);
          // console.log($('#categorySelect :selected').val());
        },
        error: function(xhr, textStatus, error) {
          console.error(xhr.statusText);
        }
      });

    });

    function updateVariant() {
      $.ajax({
        url: 'includes/api-variantEdit.php',
        data: $('#editVariantForm').serializeArray(),
        dataType: 'json',
        method: 'POST',
        processData: true,
        error: function(error) {
          Swal.fire({
            title: 'Error!',
            text: error,
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

    $('#editVariantForm').on('submit', function(event) {
      // Prevent the default form submission behavior
      event.preventDefault();
      // Call the createCategory function
      updateVariant();
    });

    // Add a click event listener to the delete buttons
    $('#variantTB').on('click', '.ajax_delete', function() {
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
            url: 'includes/api-variantDelete.php', // Replace with your delete API endpoint
            type: 'POST',
            data: {
              var_id: rowId
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