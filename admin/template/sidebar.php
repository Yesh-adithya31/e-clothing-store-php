<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <!-- <li <?php if ($selectedItem == 'home') echo 'class="active"';
            else echo 'class=""'; ?>>
          <a href="home.php"><img src="assets/img/icons/dashboard.svg" alt="img" /><span>
              Dashboard</span>
          </a>
        </li> -->
        <li class="submenu">
          <a href="javascript:void(0);"><img src="assets/img/icons/product.svg" alt="img" /><span>
              Product</span>
            <span class="menu-arrow"></span></a>
          <ul>
            <li><a <?php if ($selectedItem == 'productList') echo 'class="active"';
                else echo 'class=""'; ?> href="productlist.php">Product List</a></li>
            <li><a <?php if ($selectedItem == 'addProduct') echo 'class="active"';
                else echo 'class=""'; ?> href="productadd.php">Add Product</a></li>
            <li><a <?php if ($selectedItem == 'categoryList') echo 'class="active"';
                else echo 'class=""'; ?> href="categorylist.php">Category List</a></li>
            <li><a <?php if ($selectedItem == 'addCategory') echo 'class="active"';
                else echo 'class=""'; ?> href="categoryadd.php">Add Category</a></li>
            <li><a <?php if ($selectedItem == 'variantList') echo 'class="active"';
                else echo 'class=""'; ?> href="variantlist.php">Variant List</a></li>
            <li><a <?php if ($selectedItem == 'addVariant') echo 'class="active"';
                else echo 'class=""'; ?> href="variantadd.php">Add Variant</a></li>
            <li><a <?php if ($selectedItem == 'optionList') echo 'class="active"';
                else echo 'class=""'; ?> href="variantoptinslist.php">Variant Options List</a></li>
            <li><a <?php if ($selectedItem == 'addOption') echo 'class="active"';
                else echo 'class=""'; ?> href="varaintoptionadd.php">Add Variant Options</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="assets/img/icons/sales1.svg" alt="img" /><span>
              Orders</span>
            <span class="menu-arrow"></span></a>
          <ul>
            <li><a <?php if ($selectedItem == 'orderList') echo 'class="active"';
                else echo 'class=""'; ?> href="orderlist.php">Order List</a></li>
            <li><a <?php if ($selectedItem == 'customOrderList') echo 'class="active"';
                else echo 'class=""'; ?> href="customorderlist.php">Custom Order List</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="assets/img/icons/users1.svg" alt="img" /><span>
              People</span>
            <span class="menu-arrow"></span></a>
          <ul>
            <li><a <?php if ($selectedItem == 'customerList') echo 'class="active"';
                else echo 'class=""'; ?> href="customerlist.php">Customer List</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>