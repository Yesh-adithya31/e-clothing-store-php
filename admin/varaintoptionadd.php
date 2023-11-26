<?php include('includes/session.php'); ?>
<?php $selectedItem = 'addOption'; ?>
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
            <h4>Variant options Add</h4>
            <h6>Create new Variant options</h6>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <form id="variationOptionForm" method="POST" class="row">
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                  <label>Category Name</label>
                  <select class="form-select" id="cmbCategory" name="cmbCategory" onchange="loadVariantDropdown()" required>
                    <option>Choose Category</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                  <label>Variant Name</label>
                  <div class="row">
                    <div class="col-lg-10 col-sm-10 col-10">
                      <select class="form-select" id="cmbVariant" name="cmbVariant" required>
                        <option>Choose Variant</option>
                      </select>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-2 ps-0">
                      <div id="addoptions" class="add-icon">
                        <span><img src="assets/img/icons/plus1.svg" alt="img" /></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-sm-6 col-12"></div>
              <div class="col-lg-3 col-sm-6 col-12" style="margin-left: 12px;">
                <div class="form-group">
                  <label>Options</label>
                  <div id="optionsDetails">
                    <div class="form-group row optionsRow">
                      <input type="text" id="optionsName" name="optionsName[]" class="form-control col-10 optionsName" style="width: 80%;" required>
                      <button class="border-0 bg-light col-2 deleteButton" id="deleteButton1" style="width:20%;"><img src="assets/img/icons/delete.svg" alt="img"></button>
                    </div>
                  </div>
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

    function loadVariantDropdown() {
      console.log($('#cmbCategory').val())
      // Variation Filtering
      $.ajax({
        url: 'includes/api-getCategoryRelateVariation.php', // Replace with the actual API URL
        type: 'POST', // Use GET or POST as appropriate
        data: {
          categoryID: $('#cmbCategory').val()
        },
        dataType: 'json',
        success: function(data) {
          var select = $('#cmbVariant');
          select.empty();
          // Loop through the API response data and add options to the select element
          $.each(data, function(index, category) {
            select.append($('<option>', {
              value: category.variant_id,
              text: category.name,
              class: ''
            }));
          });
        },
        error: function(xhr, textStatus, error) {
          console.error(xhr.statusText);
        }
      });
    }

    var optionsInputCounter = 0;

    $('#addoptions').click(function() {
      // Clone the existing optionsName input field row
      var clonedRow = $('.optionsRow').first().clone();

      // Increment the counter and set unique IDs for the cloned input fields and delete button
      optionsInputCounter++;
      // clonedRow.find('.optionsName').attr('name', 'optionsName' + optionsInputCounter);
      clonedRow.find('.deleteButton').show(); // Show the delete button
      clonedRow.find('.deleteButton').attr('id', 'deleteButton' + optionsInputCounter);

      // Clear the cloned input field's value
      clonedRow.find('.optionsName').val('');

      // Append the cloned input field row to the optionsDetails div
      $('#optionsDetails').append(clonedRow);
    });

    // Handle click event for delete buttons
    $('#optionsDetails').on('click', '.deleteButton', function() {
      $(this).closest('.optionsRow').remove(); // Remove the row containing the delete button clicked
    });

    $('#variationOptionForm').submit(function(event) {
      event.preventDefault(); // Prevent the default form submission behavior

      // Collect values from each input field with name optionsName
      var formData = [];
      formData.push({
        name: $('#cmbVariant').attr('name'),
        value:  $('#cmbVariant').val()
      });
      var data = [];
      $('input[name^="optionsName"]').each(function(index, element) {
        var inputValue = $(element).val();
        data.push(inputValue);
      });

      formData.push({
        name: $('#optionsName').attr('name'),
        value:  data
      });
      
      $.ajax({
        url: 'includes/variantOptionAdd.php',
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
        },
        success: function(r) {
          Swal.fire({
            title: 'Success!',
            text: r.message,
            icon: 'success',
          });
          $("#cmbCategory").selectedIndex = -1;
          $("#cmbVariant").selectedIndex = -1;
        }
      });
    });
  </script>
</body>

</html>