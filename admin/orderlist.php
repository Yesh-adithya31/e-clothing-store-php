<?php include('includes/session.php'); ?>
<?php $selectedItem = 'orderList'; ?>
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
            <h4>Order List</h4>
            <h6>Manage your order</h6>
          </div>
        </div>

        <div class="card">

            <div class="table-responsive">
              <table id="orderTB" class="table">
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
      dt = $('#orderTB').DataTable({
        columns: [{
            title: 'Order ID',
            data: 'order_id'
          },
          {
            title: 'Order Total',
            data: 'order_total'
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
          {
            title: 'Delivery Note',
            data: 'delivery_note'
          },
          {
            title: 'Address',
          },
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
            var address = '<p>' + row.street_number + ', ' + row.address_line1 + ', '+ row.address_line2 + ', '+ row.postal_code + ', '+ row.district + '</p>';

            return address;
          }
        }],
        ajax: {
          type: "POST",
          url: 'includes/orderGetAll.php',
          // contentType: 'application/json; charset=utf-8',
          datatype: 'json',
          dataSrc: ""
        }
      });
    });
  </script>
</body>

</html>