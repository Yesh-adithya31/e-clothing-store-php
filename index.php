<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="This is e-commerce platform which is helping to worldwide customer to connect and shopping through virtual platform"
    />
    <meta
      name="author"
      content="Yesh Adithya, Sanduni Ranawaka, Dilki Fernando, Wathsala"
    />
    <title>The KNOT</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico" />
    <!-- CSS(Bootstrap) links -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@docsearch/css@3"
    />
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/styles/index.css" rel="stylesheet" />
    <!-- Scripts links -->
    <script src="assets/js/color-modes.js"></script>
  </head>
  <body>
    <!-- START Floating Scroll Button -->
    <div
      class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle"
    >
      <p class="float-end mb-1">
        <a href="#"><img src="assets/images/icons/scroll.png" /></a>
      </p>
    </div>
    <!-- END Floating Scroll Button -->

    <!-- START the Header Design -->
    <header data-bs-theme="light">
      <nav class="navbar navbar-expand-md navbar-light fixed-top bg-body">
        <div class="container-fluid">
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav nav-underline me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a class="nav-link fw-bold active" aria-current="page" href="#"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link fw-semibold" href="#">Product</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-semibold" href="#">Category</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-semibold" href="#">SALE</a>
              </li>
            </ul>
            <div class="container d-flex justify-content-center">
              <a
                class="blog-header-logo text-body-emphasis text-decoration-none"
                href="#"
                ><img src="assets/images/logo-lg.png" style="transform: scale(3.5); height: 50px;" alt="" /></a
              >
            </div>
            <form class="d-flex" role="search">
              <input
                class="form-control me-2"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <button class="btn btn-outline-success" type="submit">
                Search
              </button>
            </form>
            <ul class="navbar-nav flex-grow-1 justify-content-between">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <svg class="bi" width="24" height="24">
                    <use xlink:href="#cart" />
                  </svg>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- END the Header Design -->

    <main>
      <!-- START Main Banner -->
      <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button
            type="button"
            data-bs-target="#myCarousel"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          <button
            type="button"
            data-bs-target="#myCarousel"
            data-bs-slide-to="1"
            aria-label="Slide 2"
          ></button>
          <button
            type="button"
            data-bs-target="#myCarousel"
            data-bs-slide-to="2"
            aria-label="Slide 3"
          ></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active bg-secondary">
            <img
              class="container d-flex justify-content-center"
              src="assets/images/BGImage.png"
            />
            <div class="container">
              <div class="carousel-caption text-start">
                <!-- <p><a class="btn btn-lg btn-primary" href="#">Explore</a></p> -->
              </div>
            </div>
          </div>
          <div class="carousel-item bg-dark">
            <img
              class="container d-flex justify-content-center"
              src="assets/images/BGImage.png"
            />
            <div class="container">
              <div class="carousel-caption">
                <h1>Another example headline.</h1>
                <p>
                  Some representative placeholder content for the second slide
                  of the carousel.
                </p>
                <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item bg-secondary">
            <img
              class="container d-flex justify-content-center"
              src="assets/images/BGImage.png"
            />
            <div class="container">
              <div class="carousel-caption text-end">
                <h1>One more for good measure.</h1>
                <p>
                  Some representative placeholder content for the third slide of
                  this carousel.
                </p>
                <p>
                  <a class="btn btn-lg btn-primary" href="#">Browse gallery</a>
                </p>
              </div>
            </div>
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#myCarousel"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#myCarousel"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <!-- END Main Banner -->

      <!-- START Seasonal -->
      <div class="album py-5 bg-body-light">
        <h1
          class="container d-flex justify-content-center fs-1 blog-header-logo pb-3"
        >
          Season Collections
        </h1>
        <div class="container">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
              <div class="card shadow-sm">
                <img
                  class="bd-placeholder-img card-img-top"
                  src="assets/images/seasonal/seasonal-1.png"
                />
                <div class="card-body">
                  <p class="card-text text-center fw-medium fs-4">SPRING</p>
                  <div class="d-flex justify-content-center align-items-center">
                    <div class="btn-group">
                      <button
                        type="button"
                        class="btn btn-sm rounded-pill btn-outline-secondary px-4"
                      >
                        More
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <img
                  class="bd-placeholder-img card-img-top"
                  src="assets/images/seasonal/seasonal-2.png"
                />
                <div class="card-body">
                  <p class="card-text text-center fw-medium fs-4">SUMMER</p>
                  <div class="d-flex justify-content-center align-items-center">
                    <div class="btn-group">
                      <button
                        type="button"
                        class="btn btn-sm rounded-pill btn-outline-secondary px-4"
                      >
                        More
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <img
                  class="bd-placeholder-img card-img-top"
                  src="assets/images/seasonal/seasonal-3.png"
                />
                <div class="card-body">
                  <p class="card-text text-center fw-medium fs-4">WINTER</p>
                  <div class="d-flex justify-content-center align-items-center">
                    <div class="btn-group">
                      <button
                        type="button"
                        class="btn btn-sm rounded-pill btn-outline-secondary px-4"
                      >
                        More
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END Seasonal -->

      <!-- START Best-Sellers -->
      <div class="album py-5 bg-body-light">
        <h1
          class="container d-flex justify-content-center fs-1 blog-header-logo pb-3"
        >
          Our Best Seller
        </h1>
        <div class="container">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
              <div class="card shadow-sm">
                <img
                  class="bd-placeholder-img card-img-top"
                  src="assets/images/best-seller/best-seller-1.png"
                />
                <div class="card-body text-center">
                  <p class="card-text fs-6">Euphoria Crop Blouse</p>
                  <label class="fs-6"> LKR. 1900.00 </label>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <img
                  class="bd-placeholder-img card-img-top"
                  src="assets/images/best-seller/best-seller-2.png"
                />
                <div class="card-body text-center">
                  <p class="card-text fs-6">Venus Halter Dress</p>
                  <label class="fs-6"> LKR. 2500.00 </label>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <img
                  class="bd-placeholder-img card-img-top"
                  src="assets/images/best-seller/best-seller-3.png"
                />
                <div class="card-body text-center">
                  <p class="card-text fs-6">Snap Pure Blouse</p>
                  <label class="fs-6"> LKR. 1600.00 </label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END Best-Sellers -->

      <!-- START Discount Banner -->
      <div class="container-fluid bg-body-secondary py-5">
        <div class="row py-5">
          <div class="col-md-2"></div>
          <div class="col-md-3">
            <img
              class="card-img-top"
              src="assets/images/left-side.png"
              alt="offer-leftside"
            />
          </div>
          <div class="col-md-2 d-flex justify-content-center text-center">
            <div>
              <p class="fw-bold fs-1 mt-4">Get 50% Off</p>
              <p class="fs-7 text-break">
                for all new product purchases min. purchases LKR. 6000
              </p>
              <button
                class="btn btn-light rounded-pill px-3 fw-medium mt-4"
                type="button"
              >
                SHOP NOW
              </button>
            </div>
          </div>
          <div class="col-md-3">
            <img
              class="card-img-top"
              src="assets/images/right-side.png"
              alt="offer-rightside"
            />
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
      <!-- END Discount Banner -->

      <!-- START Our Products -->
      <div class="container py-5">
        <h1 class="d-flex justify-content-center fs-1 blog-header-logo pb-3">
          Our Products
        </h1>
        <div>
          <ul
            class="nav nav-tabs nav-fill nav-underline justify-content-center"
            id="myTab"
            role="tablist"
          >
            <li class="nav-item" role="presentation">
              <button
                class="nav-link fs-5 active"
                id="tab1-tab"
                data-bs-toggle="tab"
                data-bs-target="#tab1"
                type="button"
                role="tab"
                aria-controls="tab1"
                aria-selected="true"
              >
                Top
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button
                class="nav-link fs-5"
                id="tab2-tab"
                data-bs-toggle="tab"
                data-bs-target="#tab2"
                type="button"
                role="tab"
                aria-controls="tab2"
                aria-selected="false"
              >
                Bottom
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button
                class="nav-link fs-5"
                id="tab3-tab"
                data-bs-toggle="tab"
                data-bs-target="#tab3"
                type="button"
                role="tab"
                aria-controls="tab3"
                aria-selected="false"
              >
                Dress
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button
                class="nav-link fs-5"
                id="tab4-tab"
                data-bs-toggle="tab"
                data-bs-target="#tab4"
                type="button"
                role="tab"
                aria-controls="tab4"
                aria-selected="false"
              >
                Set
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button
                class="nav-link fs-5"
                id="tab5-tab"
                data-bs-toggle="tab"
                data-bs-target="#tab5"
                type="button"
                role="tab"
                aria-controls="tab5"
                aria-selected="false"
              >
                Knit
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button
                class="nav-link fs-5"
                id="tab6-tab"
                data-bs-toggle="tab"
                data-bs-target="#tab6"
                type="button"
                role="tab"
                aria-controls="tab6"
                aria-selected="false"
              >
                Outer
              </button>
            </li>
          </ul>
          <div class="tab-content mt-2" id="myTabContent">
            <div
              class="tab-pane fade show active"
              id="tab1"
              role="tabpanel"
              aria-labelledby="tab1-tab"
            >
              <div class="container py-5 bg-body-light">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-1.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Euphoria Crop Blouse</p>
                        <label class="fs-6"> LKR. 1900.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-2.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Venus Halter Dress</p>
                        <label class="fs-6"> LKR. 2500.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-3.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Snap Pure Blouse</p>
                        <label class="fs-6"> LKR. 1600.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-1.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Euphoria Crop Blouse</p>
                        <label class="fs-6"> LKR. 1900.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-2.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Venus Halter Dress</p>
                        <label class="fs-6"> LKR. 2500.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-3.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Snap Pure Blouse</p>
                        <label class="fs-6"> LKR. 1600.00 </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-center">
                  <button
                    class="btn btn-dark rounded-pill px-3 fw-medium mt-4"
                    type="button"
                  >
                    SEE MORE ->
                  </button>
                </div>
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="tab2"
              role="tabpanel"
              aria-labelledby="tab2-tab"
            >
              <div class="container py-5 bg-body-light">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-1.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Euphoria Crop Blouse</p>
                        <label class="fs-6"> LKR. 1900.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-2.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Venus Halter Dress</p>
                        <label class="fs-6"> LKR. 2500.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-3.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Snap Pure Blouse</p>
                        <label class="fs-6"> LKR. 1600.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-1.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Euphoria Crop Blouse</p>
                        <label class="fs-6"> LKR. 1900.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-2.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Venus Halter Dress</p>
                        <label class="fs-6"> LKR. 2500.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-3.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Snap Pure Blouse</p>
                        <label class="fs-6"> LKR. 1600.00 </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-center">
                  <button
                    class="btn btn-dark rounded-pill px-3 fw-medium mt-4"
                    type="button"
                  >
                    SEE MORE ->
                  </button>
                </div>
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="tab3"
              role="tabpanel"
              aria-labelledby="tab3-tab"
            >
              <div class="container py-5 bg-body-light">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-1.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Euphoria Crop Blouse</p>
                        <label class="fs-6"> LKR. 1900.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-2.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Venus Halter Dress</p>
                        <label class="fs-6"> LKR. 2500.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-3.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Snap Pure Blouse</p>
                        <label class="fs-6"> LKR. 1600.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-1.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Euphoria Crop Blouse</p>
                        <label class="fs-6"> LKR. 1900.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-2.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Venus Halter Dress</p>
                        <label class="fs-6"> LKR. 2500.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-3.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Snap Pure Blouse</p>
                        <label class="fs-6"> LKR. 1600.00 </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-center">
                  <button
                    class="btn btn-dark rounded-pill px-3 fw-medium mt-4"
                    type="button"
                  >
                    SEE MORE ->
                  </button>
                </div>
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="tab4"
              role="tabpanel"
              aria-labelledby="tab4-tab"
            >
              <div class="container py-5 bg-body-light">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-1.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Euphoria Crop Blouse</p>
                        <label class="fs-6"> LKR. 1900.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-2.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Venus Halter Dress</p>
                        <label class="fs-6"> LKR. 2500.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-3.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Snap Pure Blouse</p>
                        <label class="fs-6"> LKR. 1600.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-1.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Euphoria Crop Blouse</p>
                        <label class="fs-6"> LKR. 1900.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-2.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Venus Halter Dress</p>
                        <label class="fs-6"> LKR. 2500.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-3.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Snap Pure Blouse</p>
                        <label class="fs-6"> LKR. 1600.00 </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-center">
                  <button
                    class="btn btn-dark rounded-pill px-3 fw-medium mt-4"
                    type="button"
                  >
                    SEE MORE ->
                  </button>
                </div>
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="tab5"
              role="tabpanel"
              aria-labelledby="tab5-tab"
            >
              <div class="container py-5 bg-body-light">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-1.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Euphoria Crop Blouse</p>
                        <label class="fs-6"> LKR. 1900.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-2.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Venus Halter Dress</p>
                        <label class="fs-6"> LKR. 2500.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-3.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Snap Pure Blouse</p>
                        <label class="fs-6"> LKR. 1600.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-1.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Euphoria Crop Blouse</p>
                        <label class="fs-6"> LKR. 1900.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-2.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Venus Halter Dress</p>
                        <label class="fs-6"> LKR. 2500.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-3.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Snap Pure Blouse</p>
                        <label class="fs-6"> LKR. 1600.00 </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-center">
                  <button
                    class="btn btn-dark rounded-pill px-3 fw-medium mt-4"
                    type="button"
                  >
                    SEE MORE ->
                  </button>
                </div>
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="tab6"
              role="tabpanel"
              aria-labelledby="tab6-tab"
            >
              <div class="container py-5 bg-body-light">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-1.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Euphoria Crop Blouse</p>
                        <label class="fs-6"> LKR. 1900.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-2.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Venus Halter Dress</p>
                        <label class="fs-6"> LKR. 2500.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-3.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Snap Pure Blouse</p>
                        <label class="fs-6"> LKR. 1600.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-1.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Euphoria Crop Blouse</p>
                        <label class="fs-6"> LKR. 1900.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-2.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Venus Halter Dress</p>
                        <label class="fs-6"> LKR. 2500.00 </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card shadow-sm">
                      <img
                        class="bd-placeholder-img card-img-top"
                        src="assets/images/best-seller/best-seller-3.png"
                      />
                      <div class="card-body text-center">
                        <p class="card-text fs-6">Snap Pure Blouse</p>
                        <label class="fs-6"> LKR. 1600.00 </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-center">
                  <button
                    class="btn btn-dark rounded-pill px-3 fw-medium mt-4"
                    type="button"
                  >
                    SEE MORE ->
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END Discount Banner -->

      <!-- START Featured Collection -->
      <div class="container">
        <h1 class="d-flex justify-content-center fs-1 blog-header-logo pb-3">
          Our Featured Collections
        </h1>
        <div class="row">
          <div class="col-4 pt-2">
            <div class="carousel m-2 pt-5">
              <img
                class="card-img-top"
                src="assets/images/featured/featured-1.png"
                alt="offer-rightside"
              />
              <div class="carousel-caption d-none d-md-block">
                <p class="fs-8 text-black fw-bold">COLORFUL KNITWEAR SERIES</p>
              </div>
            </div>
            <div class="carousel m-2 pt-3">
              <img
                class="card-img-top"
                src="assets/images/featured/featured-2.png"
                alt="offer-rightside"
              />
              <div class="carousel-caption d-none d-md-block">
                <p class="fs-8 text-black fw-bold">TOP PANTS SERIES</p>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="carousel">
              <img
                class="card-img-top"
                src="assets/images/featured/featured-main.png"
                alt="offer-rightside"
              />
              <div class="carousel-caption d-none d-md-block">
                <p class="fs-8 text-black fw-bold">JIWOO MADE SPECIAL SERIES</p>
              </div>
            </div>
          </div>
          <div class="col-4 pt-2">
            <div class="carousel m-2 pt-5">
              <img
                class="card-img-top"
                src="assets/images/featured/featured-3.png"
                alt="offer-rightside"
              />
              <div class="carousel-caption d-none d-md-block">
                <p class="fs-8 text-black fw-bold">FRESHIDER TOP SERIES</p>
              </div>
            </div>
            <div class="carousel m-2 pt-3">
              <img
                class="card-img-top"
                src="assets/images/featured/featured-4.png"
                alt="offer-rightside"
              />
              <div class="carousel-caption d-none d-md-block">
                <p class="fs-8 text-black fw-bold">SWEET DRESSES SERIES</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END Featured Collection -->

      <!-- START Community Banner -->
      <div class="container-fluid bg-body-secondary py-5">
        <div class="container">
          <div class="row py-5">
            <div class="col-md-5 border-end border-2 border-black">
              <div class="d-flex justify-content-center text-center text-black">
                <div>
                  <p class="fw-bold fs-1 mt-4">
                    Get more benefits <br />by Sign Up & Join <br />The KNOT
                    Community!
                  </p>
                  <p class="fs-5">◆ FREE Special Gift to a new member</p>
                  <p class="fs-5">◆ Get 2x JIWOO Points to purchase items</p>
                  <p class="fs-5">◆ Get special voucher code every month</p>
                  <p class="fs-5">◆ Claim Voucher Disc. Up To 50%</p>
                  <button
                    class="btn btn-light rounded-pill px-3 fw-medium mt-4"
                    type="button"
                  >
                    SHOP NOW
                  </button>
                </div>
              </div>
            </div>
            <div class="col-md-6 px-5 py-5 d-none d-md-block">
              <img
                class="banner-img card-img-top"
                src="assets/images/banner.png"
                alt="offer-leftside"
              />
            </div>
          </div>
        </div>
      </div>
      <!-- END Community Banner -->
    </main>

    <!-- START Footer -->
    <div class="container py-5">
      <footer class="py-2">
        <div class="row">
          <div class="col-12 col-md-2 mb-3">
            <ul class="nav flex-column">
              <li class="nav-item mb-2">
                <a
                  class="blog-header-logo text-body-emphasis text-decoration-none"
                  href="#"
                  >The KNOT</a
                >
              </li>
            </ul>
          </div>

          <div class="col-6 col-md-2 mb-3">
            <h5>About us</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary">News</a>
              </li>
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary"
                  >Official Store</a
                >
              </li>
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary">Company</a>
              </li>
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary">Careers</a>
              </li>
            </ul>
          </div>

          <div class="col-6 col-md-2 mb-3">
            <h5>Get Help</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary">FAQ</a>
              </li>
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary"
                  >Shipping</a
                >
              </li>
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary">Payment</a>
              </li>
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary"
                  >Returnfa-spin</a
                >
              </li>
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary"
                  >Contact Us</a
                >
              </li>
            </ul>
          </div>

          <div class="col-md-5 offset-md-1 mb-3">
            <form>
              <h5>Subscribe to our newsletter</h5>
              <p>Monthly digest of what's new and exciting from us.</p>
              <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                <label for="newsletter1" class="visually-hidden"
                  >Email address</label
                >
                <input
                  id="newsletter1"
                  type="text"
                  class="form-control"
                  placeholder="Email address"
                />
                <button class="btn btn-primary" type="button">Subscribe</button>
              </div>
            </form>
          </div>
        </div>
      </footer>
    </div>
    <div class="container-fluid d-flex justify-content-center bg-dark">
      <p class="text-center text-light">
        &copy; 2023 WUSL- Web Development Team
      </p>
    </div>
    <!-- END Footer -->

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
