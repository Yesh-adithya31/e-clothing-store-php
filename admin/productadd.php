<?php include('includes/session.php'); ?>
<?php $selectedItem = 'addProduct'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('template/head.php'); ?>
</head>

<body>
  <div id="global-loader">
    <div class="whirly-loader"> </div>
  </div>

  <div class="main-wrapper">
    <?php include('template/header.php'); ?>

    <?php include('template/sidebar.php'); ?>

    <div class="page-wrapper">
      <div class="content">
        <div class="page-header">
          <div class="page-title">
            <h4>Product Add</h4>
            <h6>Create new product</h6>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <form id="productForm" method="POST" class="row" enctype="multipart/form-data">
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                  <label>Product Name</label>
                  <input type="text" id="productname" name="productname" required />
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                  <label>Category</label>
                  <select class="form-select" id="cmbcategory" name="cmbcategory" onchange="loadVariantDropdown()" required>
                    <option>Choose Category</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                  <label>Variation name</label>
                  <select class="form-select" id="cmbvariation" name="cmbvariation" onchange="loadVariantOptionsDropdown()" required>
                    <option>Choose Variation Name</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                  <label>Variation options</label>
                  <select class="form-select" id="cmbvariationoption" name="cmbvariationoption" required>
                    <option>Choose Varition options</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                  <label>SKU</label>
                  <input type="text" id="SKU" name="SKU" required />
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                  <label>Quantity</label>
                  <input type="number" class="form-control" id="qty" name="qty" required />
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                  <label>Price</label>
                  <input type="number" class="form-control" id="price" name="price" required />
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" id="description" name="description" rows="4" cols="50" required></textarea>
                  <div id="wordCountMessage"></div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label> Product Image</label>
                  <div class="image-upload">
                    <input type="file" id="productimage" name="productimage" required />
                    <div class="image-uploads">
                      <img src="assets/img/icons/upload.svg" alt="img" />
                      <h4>Drag and drop a file to upload</h4>
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
    // Category Filtering
    $.ajax({
      url: 'includes/api-getCategory.php', // Replace with the actual API URL
      type: 'POST', // Use GET or POST as appropriate
      dataType: 'json',
      success: function(data) {
        var select = $('#cmbcategory');


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
      // Variation Filtering
      $.ajax({
        url: 'includes/api-getCategoryRelateVariation.php', // Replace with the actual API URL
        type: 'POST', // Use GET or POST as appropriate
        data: {
          categoryID: $('#cmbcategory').val()
        },
        dataType: 'json',
        success: function(data) {
          var select = $('#cmbvariation');
          select.empty();
          // Loop through the API response data and add options to the select element
          $.each(data, function(index, vari) {
            select.append($('<option>', {
              value: vari.variant_id,
              text: vari.name,
              class: ''
            }));
          });
        },
        error: function(xhr, textStatus, error) {
          console.error(xhr.statusText);
        }
      });
    }

    function loadVariantOptionsDropdown() {
      // Variation Filtering
      $.ajax({
        url: 'includes/api-getVariantRelateOption.php', // Replace with the actual API URL
        type: 'POST', // Use GET or POST as appropriate
        data: {
          variantID: $('#cmbvariation').val()
        },
        dataType: 'json',
        success: function(data) {
          var select = $('#cmbvariationoption');
          select.empty();
          // Loop through the API response data and add options to the select element
          $.each(data, function(index, variopt) {
            select.append($('<option>', {
              value: variopt.variant_option_id,
              text: variopt.value,
              class: ''
            }));
          });
        },
        error: function(xhr, textStatus, error) {
          console.error(xhr.statusText);
        }
      });
    }

    $('#productForm').on('submit', function(event) {
      // Prevent the default form submission behavior
      event.preventDefault();
      // Call the createCategory function
      var formData = new FormData(this);
      $.ajax({
        url: 'includes/productAdd.php',
        data: formData,
        dataType: 'json',
        method: 'POST',
        processData: false, // Don't process the data (FormData will handle it)
        contentType: false, // Set content type to false for multipart/form-data
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
          $('#productForm')[0].reset();
        }
      });
    });
  </script>
  <script>
    // Get the textarea element
    var textArea = document.getElementById('description');

    // Get the element to display word count message
    var wordCountMessage = document.getElementById('wordCountMessage');

    // Event listener for input in the textarea
    textArea.addEventListener('input', function() {
      // Get the text content from the textarea
      var text = this.value;

      // Split the text by spaces to count words
      var words = text.trim().split(/\s+/);

      // Display the word count message
      wordCountMessage.textContent = 'Word count: ' + words.length;

      // Limit the words to 200
      if (words.length > 200) {
        // Split the words array to keep only the first 200 words
        var limitedWords = words.slice(0, 200);

        // Join the limited words back together to form the text
        this.value = limitedWords.join(' ');

        // Update the word count message after limiting the words
        wordCountMessage.textContent = 'Word count: ' + limitedWords.length;
      }
    });
  </script>
</body>

</html>