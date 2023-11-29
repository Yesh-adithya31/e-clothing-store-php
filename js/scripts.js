function loadCartCountAndTotalSum(userid) {
  $.ajax({
    url: "includes/customerCartCountAll.php", // Replace with your API endpoint URL
    data: {
      userid: userid,
    },
    method: "POST",
    dataType: "json",
    success: function (data) {
      // Get the container where products will be displayed
      $("#mobileCartCount").text(data[0].cart_count);
      $("#mobilePrice").text(`LKR ${data[0].total_Sum}.00`);
      $("#webCartCount").text(data[0].cart_count);
      $("#webPrice").text(`LKR ${data[0].total_Sum == null ? 0 : data[0].total_Sum }.00`);
    },
    error: function (xhr, status, error) {
      console.log("Error fetching data:", error);
    },
  });
}

function getProducts() {
  $.ajax({
    url: "includes/productGetAll.php", // Replace with your API endpoint URL
    method: "POST",
    dataType: "json",
    success: function (data) {
      // Get the container where products will be displayed
      var productsContainer = $("#productsContainer");
      var filterControls = $("#filter_id");

      // Loop through the retrieved data and populate the HTML structure
      $.each(data, function (index, product) {
        // Create a div for each product and set its class and content dynamically
        var productItem = $(`<div>`).addClass(
          `col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix ${product.category_name}`
        );
        var productContent = `
            <div class="product__item">
                <div class="product__item__pic set-bg">
                <img class="product__item__pic set-bg" src="uploads/${product.product_image}"/>
                    <ul class="product__hover">
                        <li><a onclick="goToProduct(${product.product_master_id})"><img src="img/icon/compare.png" alt=""> <span>View</span></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6>${product.product_name}</h6>
                    <a style="cursor: pointer;" onClick="addToCart(${product.product_master_id},1)" class="add-cart">+ Add To Cart</a>
                    <h5>LKR ${product.price}.00</h5>
                </div>
            </div>
        `;

        // Append the product content to the products container
        productItem.append(productContent);
        productsContainer.append(productItem);

        if (
          !filterControls.find(`[data-filter=".${product.category_name}"]`)
            .length
        ) {
          // If not, create a new filter control for this category
          var filterItem = $("<li>")
            .attr("data-filter", `.${product.category_name}`)
            .text(product.category_name);
          filterControls.append(filterItem);
        }
      });
    },
    error: function (xhr, status, error) {
      console.log("Error fetching data:", error);
    },
  });
}

function getCategoryRelatedProducts(catID) {
  $.ajax({
    url: "includes/productsCategoryRelated.php", // Replace with your API endpoint URL
    data: {
      category_id: catID,
    },
    method: "POST",
    dataType: "json",
    success: function (data) {
      // Get the container where products will be displayed
      var productsContainer = $("#productsContainer");

      // Loop through the retrieved data and populate the HTML structure
      $.each(data, function (index, product) {
        // Create a div for each product and set its class and content dynamically
        var productItem = $(`<div>`).addClass(
          `col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix ${product.category_name}`
        );
        var productContent = `
            <div class="product__item">
                <div class="product__item__pic set-bg">
                <img class="product__item__pic set-bg" src="uploads/${product.product_image}"/>
                    <ul class="product__hover">
                        <li><a onclick="goToProduct(${product.product_master_id})"><img src="img/icon/compare.png" alt=""> <span>View</span></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6>${product.product_name}</h6>
                    <a style="cursor: pointer;" onClick="addToCart(${product.product_master_id},1)" class="add-cart">+ Add To Cart</a>
                    <h5>LKR ${product.price}.00</h5>
                </div>
            </div>
        `;

        productItem.append(productContent);
        productsContainer.append(productItem);
      });
    },
    error: function (xhr, status, error) {
      console.log("Error fetching data:", error);
    },
  });
}

function addToCart(id,qty) {
  console.log((qty));
  if (user) {
    $.ajax({
      url: "includes/cartAdd.php",
      data: {
        productMasterID: id,
        userID: user.user_id,
        qty: qty
      },
      dataType: "json",
      method: "POST",
      processData: true,
      error: function (error) {
        Swal.fire({
          title: "Error!",
          text: error,
          icon: "error",
        });
      },
      success: function (r) {
        Swal.fire({
          title: "Success!",
          text: r.message,
          icon: "success",
        });
        loadCartCountAndTotalSum(user.user_id);
      },
    });
  } else {
    window.location.href = "signin.php";
  }
}

function goToProduct(id) {
  window.location.href = `product-details.php?id=${id}`;
}


function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}
