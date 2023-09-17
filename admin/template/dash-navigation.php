<ul class="navbar-nav">
    <li class="nav-item">
        <a <?php if ($selectedItem == 'home') echo 'class="active bg-gradient-secondary nav-link text-white"';
            else echo 'class="nav-link text-white"' ?> href="home.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a <?php if ($selectedItem == 'user') echo 'class="active bg-gradient-secondary nav-link text-white"';
            else echo 'class="nav-link text-white"' ?> href="user.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">person </i>
            </div>
            <span class="nav-link-text ms-1">Users</span>
        </a>
    </li>
    <li class="nav-item">
        <a <?php if ($selectedItem == 'bills') echo 'class="active bg-gradient-secondary nav-link text-white"';
            else echo 'class="nav-link text-white"' ?> href="home.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Billing</span>
        </a>
    </li>
    <li class="nav-item">
        <a <?php if ($selectedItem == 'products') echo 'class="active bg-gradient-secondary nav-link text-white"';
            else echo 'class="nav-link text-white"' ?> href="home.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Products</span>
        </a>
    </li>
    <li class="nav-item">
        <a <?php if ($selectedItem == 'orders') echo 'class="active bg-gradient-secondary nav-link text-white"';
            else echo 'class="nav-link text-white"' ?> href="home.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">check_box</i>
            </div>
            <span class="nav-link-text ms-1">Orders</span>
        </a>
    </li>
    <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Products Settings</h6>
    </li>
    <li class="nav-item">
        <a <?php if ($selectedItem == 'category') echo 'class="active bg-gradient-secondary nav-link text-white"';
            else echo 'class="nav-link text-white"' ?> href="category.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">settings</i>
            </div>
            <span class="nav-link-text ms-1">Category</span>
        </a>
    </li>
    <li class="nav-item">
        <a <?php if ($selectedItem == 'variations') echo 'class="active bg-gradient-secondary nav-link text-white"';
            else echo 'class="nav-link text-white"' ?> href="variations.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">toggle_on</i>
            </div>
            <span class="nav-link-text ms-1">Variations</span>
        </a>
    </li>
</ul>