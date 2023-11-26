<?php include('includes/session.php'); ?>
<?php $selectedItem = 'addCategory'; ?>
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
            <h4>Product Add Category</h4>
            <h6>Create new product Category</h6>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <form id="addCategoryForm" method="POST" class="row">
              <div class="col-lg-6 col-sm-6 col-12">
                <div class="form-group">
                  <label>Category Name</label>
                  <input type="text" id="categoryname" name="categoryname" required />
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
    function addCategory() {
      $.ajax({
        url: 'includes/api-categoryAdd.php',
        data: $('#addCategoryForm').serializeArray(),
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
          $("#categoryname").val('');
          dt.ajax.reload();
        }
      });
    }

    $('#addCategoryForm').on('submit', function(event) {
      // Prevent the default form submission behavior
      event.preventDefault();
      // Call the createCategory function
      addCategory();
    });
  </script>
</body>

</html>