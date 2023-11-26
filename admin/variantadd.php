<?php include('includes/session.php'); ?>
<?php $selectedItem = 'addVariant'; ?>
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
            <h4>Product Add Variant</h4>
            <h6>Create new product Variant</h6>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <form id="addVariantForm" method="POST" class="row">
              <div class="col-lg-4 col-sm-6 col-12">
                <div class="form-group">
                  <label>Parent Category</label>
                  <select class="form-select" id="cmbCategory" name="cmbCategory">
                    <option>Choose Category</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 col-12">
                <div class="form-group">
                  <label>Variant Name</label>
                  <input type="text" id="variantName" name="variantName" />
                </div>
              </div>
              <div class="col-lg-12">
                <button type="submit" class="btn btn-submit me-2">Submit</button>
                <button type="reset" class="btn btn-cancel">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include('template/footer.php'); ?>
  <script>
    function addVariant() {
      $.ajax({
        url: 'includes/api-variationAdd.php',
        data: $('#addVariantForm').serializeArray(),
        dataType: 'json',
        method: 'POST',
        processData: true,
        error: function(error) {
          Swal.fire({
            title: 'Error!',
            text: error.message,
            icon: 'error',
          });
        },
        success: function(r) {
          Swal.fire({
            title: 'Success!',
            text: r.message,
            icon: 'success',
          });
          $("#variantName").val('');
          $("#cmbCategory").selectedIndex = -1;
        }
      });
    }

    $('#addVariantForm').on('submit', function(event) {
      // Prevent the default form submission behavior
      event.preventDefault();
      // Call the createCategory function
      addVariant();
    });

    // Category Filtering
    $.ajax({
      url: 'includes/api-getCategory.php', // Replace with the actual API URL
      type: 'POST', // Use GET or POST as appropriate
      dataType: 'json',
      success: function(data) {
        var select = $('#cmbCategory');

        // Loop through the API response data and add options to the select element
        $.each(data, function(index, category) {
          select.append($('<option>', {
            value: category.id,
            text: category.category_name,
            class: ''
          }));
        });
      },
      error: function(xhr, textStatus, error) {
        console.error(xhr.statusText);
      }
    });
  </script>
</body>

</html>