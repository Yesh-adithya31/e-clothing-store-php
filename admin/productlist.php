<?php include('includes/session.php'); ?>
<?php $selectedItem = 'productList'; ?>
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
            <h4>Product List</h4>
            <h6>Manage your products</h6>
          </div>
          <div class="page-btn">
            <a href="productadd.php" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img" class="me-1" />Add New Product</a>
          </div>
        </div>

        <div class="card">
          <div class="card-body">

            <div class="table-responsive">
              <table id="productTB" class="table">
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
      dt = $('#productTB').DataTable({
        columns: [{
            title: 'Product Name',
            data: 'product_name'
          },
          {
            title: 'SKU',
            data: 'SKU'
          },
          {
            title: 'Category',
            data: 'category_name'
          },
          {
            title: 'Variation',
            data: 'name'
          }, 
          {
            title: 'Variation Options',
            data: 'value'
          }, 
          {
            title: 'Price',
            data: 'price'
          }, {
            title: 'Quantity',
            data: 'qty_in_stock'
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
          targets: [7],
          orderable: false,
          // # column rendering
          // https://datatables.net/reference/option/columns.render
          render: function(data, type, row, meta) {
            var viewButton = '<button class="border-0 bg-light me-3 ajax_view" data-masterid="' + row.product_master_id + '" > <img src="assets/img/icons/eye.svg" alt="img"></button>';
            // var editButton = '<button class="border-0 bg-light me-3 ajax_edit" data-id="' + row.id + '" data-categoryname="' + row.category_name + '"> <img src="assets/img/icons/edit.svg" alt="img"></button>';
            var confirmDeleteButton = '<button class="border-0 bg-light me-3 ajax_delete" data-row-id="' + row.id + '"><img src="assets/img/icons/delete.svg" alt="img"></button>';

            return viewButton + confirmDeleteButton;
          }
        }],
        ajax: {
          type: "POST",
          url: 'includes/productGetAll.php',
          // contentType: 'application/json; charset=utf-8',
          datatype: 'json',
          dataSrc: ""
        }
      });
    });

    $('#productTB').on('click', '.ajax_view', function() {
      var rowId = $(this).data('masterid');
      window.location.href = `product-details.php?id=${rowId}`;
    });
  </script>
</body>

</html>