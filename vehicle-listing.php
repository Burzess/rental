<?php
session_start();
include ('includes/config.php');
error_reporting(0);
ini_set('display_errors', 1);
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Portal Rental Kendaraan | Daftar Kendaraan</title>
  <!--Bootstrap -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
  <!--Custome Style -->
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <!--OWL Carousel slider-->
  <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
  <!--slick-slider -->
  <link href="assets/css/slick.css" rel="stylesheet">
  <!--bootstrap-slider -->
  <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
  <!--FontAwesome Font Style -->
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">

  <!-- SWITCHER -->
  <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all"
    data-default-color="true" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144"
    href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114"
    href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
  <link rel="apple-touch-icon-precomposed" sizes="72x72"
    href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://kit.fontawesome.com/cbdc962120.js" crossorigin="anonymous"></script>
  
</head>

<body>

  <!-- Start Switcher -->
  <?php include ('includes/colorswitcher.php'); ?>
  <!-- /Switcher -->

  <!--Header-->
  <?php include ('includes/header.php'); ?>
  <!-- /Header -->

  <!--Page Header-->
  <section class="page-header listing_page">
    <div class="container">
      <div class="page-header_wrap">
        <div class="page-heading">
          <h1>Daftar Kendaraan</h1>
        </div>
        <ul class="coustom-breadcrumb">
          <li><a href="index.php">Beranda</a></li>
          <li>Daftar Kendaraan</li>
        </ul>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <!-- /Page Header-->

  <!--Listing-->
  <section class="listing-page">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-md-push-3">
          <div class="result-sorting-wrapper">
            <div class="sorting-count">
              <?php
              $brands = [];
              $vehicletypes = [];
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $brands = isset($_POST['brands']) ? $_POST['brands'] : [];
                $vehicletypes = isset($_POST['vehicletypes']) ? $_POST['vehicletypes'] : [];
                $sql = "SELECT tblvehicles.*, tblbrands.BrandName, tblbrands.id as bid FROM tblvehicles JOIN tblbrands ON tblbrands.id = tblvehicles.VehiclesBrand WHERE 1 = 1";
                if (!empty($brands)) {
                  $brandPlaceholders = implode(',', array_fill(0, count($brands), '?'));
                  $sql .= " AND tblvehicles.VehiclesBrand IN ($brandPlaceholders)";
                }
                if (!empty($vehicletypes)) {
                  $vehicleTypePlaceholders = implode(',', array_fill(0, count($vehicletypes), '?'));
                  $sql .= " AND tblvehicles.VehicleType IN ($vehicleTypePlaceholders)";
                }
                $query = $dbh->prepare($sql);
                $params = array_merge($brands, $vehicletypes);
                $query->execute($params);
              } else {
                $sql = "SELECT tblvehicles.*, tblbrands.BrandName, tblbrands.id as bid FROM tblvehicles JOIN tblbrands ON tblbrands.id = tblvehicles.VehiclesBrand";
                $query = $dbh->prepare($sql);
                $query->execute();
              }
              if (!$query->execute()) {
                print_r($query->errorInfo());
              }
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              $cnt = $query->rowCount();
              ?>
              <span class="count"><?php echo htmlentities($cnt); ?> Daftar</span>
            </div>
          </div>
          <div id="carList" class="row">
            <?php
            $cnt = 1;
            if ($query->rowCount() > 0) {
              foreach ($results as $result) { ?>
                <div class="col-md-4">
                  <div class="card gray-bg" style="height: 100%;">
                    <div class="card-img-top img-fluid"
                      style="height: 150px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                      <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>"
                        style="max-height: 100%; max-width: 100%;" alt="Image" />
                    </div>
                    <div class="product-listing-content" style="float: left; padding: 20px 15px 20px 20px; width: 100%;">
                      <h5><a
                          href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->BrandName); ?> 
                          <?php echo htmlentities($result->VehiclesTitle); ?></a></h5>
                      <ul class="list-inline" style="margin: 0; padding: 0; list-style: none;">
                        <li class="list-inline-item" style="margin-right: 5px; display: flex; align-items: center;"><i
                            class="fa fa-calendar" aria-hidden="true" style="margin-right: 8px;"></i>
                          <?php echo htmlentities($result->ModelYear); ?></li>
                        <li class="list-inline-item" style="margin-right: 5px; display: flex; align-items: center;"><i
                            class="fa fa-gas-pump" aria-hidden="true" style="margin-right: 8px;"></i>
                          <?php echo htmlentities($result->FuelType); ?></li>
                        <li class="list-inline-item" style="display: flex; align-items: center;"><i class="fa fa-user"
                            aria-hidden="true" style="margin-right: 8px;"></i>
                          <?php echo htmlentities($result->SeatingCapacity); ?></li>
                      </ul>
                      <div style="display: flex; justify-content: space-between; align-items: center;">
                        <p class="">Rp.<?php echo number_format(htmlentities($result->PricePerDay), 0, ',', '.'); ?> / hari
                        </p>
                        <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"
                          class="btn btn-primary">Detail</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php }
            } else {
              echo "<h4>Kendaraan tidak ditemukan</h4>";
            }
            ?>
          </div>
        </div>

        <!--Side-Bar-->
        <aside class="col-md-3 col-md-pull-9">
          <div class="sidebar_widget">
            <div class="widget_heading">
              <h5><i class="fa fa-filter" aria-hidden="true"></i> Filter Kendaraan</h5>
            </div>
            <div class="sidebar_filter">
              <form id="filterForm" action="car-listing.php" method="post">
                <button type="reset" class="btn btn-block btn-warning" style="margin-bottom: 20px;">Reset
                  Filter</button>
                <div class="form-group">
                  <label>Brand</label>
                  <?php
                  $sql = "SELECT * from tblbrands";
                  $query = $dbh->prepare($sql);
                  $query->execute();
                  $results = $query->fetchAll(PDO::FETCH_OBJ);
                  if ($query->rowCount() > 0) {
                    foreach ($results as $result) { ?>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="brands[]"
                          value="<?php echo htmlentities($result->id); ?>"
                          id="check<?php echo htmlentities($result->BrandName); ?>" <?php if (in_array($result->id, $brands))
                               echo "checked"; ?>>
                        <label class="form-check-label" for="check<?php echo htmlentities($result->BrandName); ?>">
                          <?php echo htmlentities($result->BrandName); ?>
                        </label>
                      </div>
                    <?php }
                  } ?>
                </div>
                <div class="form-group">
                  <label>Jenis Kendaraan</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="Motor" name="vehicletypes" id="motorCheck" <?php if (in_array("Motor", $vehicletypes))
                      echo "checked"; ?>>
                    <label class="form-check-label" for="motorCheck">
                      Motor
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="Mobil" name="vehicletypes" id="mobilCheck" <?php if (in_array("Mobil", $vehicletypes))
                      echo "checked"; ?>>
                    <label class="form-check-label" for="mobilCheck">
                      Mobil
                    </label>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search
                  </button>
                </div> -->
              </form>
            </div>
          </div>

          <div class="sidebar_widget">
            <div class="widget_heading">
              <h5><i class="fa fa-car" aria-hidden="true"></i> Kendaraan yang Baru Ditambahkan</h5>
            </div>
            <div class="recent_addedcars">
              <ul id="recentlyListedVehicles">
                <?php
                $sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand order by id desc limit 4";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                if ($query->rowCount() > 0) {
                  foreach ($results as $result) { ?>
                    <li class="gray-bg">
                      <div class="recent_post_img"> <a
                          href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><img
                            src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" alt="image"></a>
                      </div>
                      <div class="recent_post_title"> <a
                          href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->BrandName); ?>,
                          <?php echo htmlentities($result->VehiclesTitle); ?></a>
                        <p class="widget_price">Rp.
                          <?php echo number_format(htmlentities($result->PricePerDay), 0, ',', '.'); ?> Per Hari
                        </p>
                      </div>
                    </li>
                  <?php }
                } ?>
              </ul>
            </div>
          </div>
        </aside>
        <!--/Side-Bar-->
      </div>
    </div>
  </section>
  <!-- /Listing-->

  <!--Footer -->
  <?php include ('includes/footer.php'); ?>
  <!-- /Footer-->

  <!--Back to top-->
  <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
  <!--/Back to top-->

  <!--Login-Form -->
  <?php include ('includes/login.php'); ?>
  <!--/Login-Form -->

  <!--Register-Form -->
  <?php include ('includes/registration.php'); ?>

  <!--/Register-Form -->

  <!--Forgot-password-Form -->
  <?php include ('includes/forgotpassword.php'); ?>

  <!-- Scripts -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/interface.js"></script>
  <!--Switcher-->
  <script src="assets/switcher/js/switcher.js"></script>
  <!--bootstrap-slider-JS-->
  <script src="assets/js/bootstrap-slider.min.js"></script>
  <!--Slider-JS-->
  <script src="assets/js/slick.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#filterForm input[type="checkbox"], #filterForm input[type="radio"]').change(function () {
        var brands = [];
        var vehicletypes = [];

        $('#filterForm input[name="brands[]"]:checked').each(function () {
          brands.push($(this).val());
        });

        vehicletypes.push($('#filterForm input[name="vehicletypes"]:checked').val());

        $.ajax({
          type: 'POST',
          url: 'load-vehicles.php',
          data: {
            brands: brands,
            vehicletypes: vehicletypes
          },
          success: function (response) {
            var data = JSON.parse(response);
            var carList = $('#carList');
            carList.empty();

            if (data.results.length > 0) {
              var totalVehicles = data.results.length;
              var sortingCountHTML = $('.count');
              sortingCountHTML.empty();
              var countHTML = `<span>${totalVehicles} Kendaraan</span>`;
              sortingCountHTML.append(countHTML);

              data.results.forEach(function (vehicle) {
                var vehicleHTML = `
                <div class="col-md-4">
                    <div class="card gray-bg" style="height: 100%;">
                        <div class="card-img-top" style="height: 150px; overflow: hidden;">
                            <img src="admin/img/vehicleimages/${vehicle.Vimage1}" style="width: 100%; height: auto; object-fit: cover;" alt="Image" />
                        </div>
                        <div class="product-listing-content" style="float: left; padding: 20px 15px 20px 20px; width: 100%;">
                            <h5><a href="vehical-details.php?vhid=${vehicle.id}">${vehicle.BrandName}, ${vehicle.VehiclesTitle}</a></h5>
                            <ul class="list-inline" style="margin: 0; padding: 0; list-style: none;">
                                <li class="list-inline-item" style="margin-right: 5px; display: flex; align-items: center;"><i class="fa fa-calendar" aria-hidden="true" style="margin-right: 8px;"></i>${vehicle.ModelYear}</li>
                                <li class="list-inline-item" style="margin-right: 5px; display: flex; align-items: center;"><i class="fa fa-gas-pump" aria-hidden="true" style="margin-right: 8px;"></i>${vehicle.FuelType}</li>
                                <li class="list-inline-item" style="display: flex; align-items: center;"><i class="fa fa-user" aria-hidden="true" style="margin-right: 8px;"></i>${vehicle.SeatingCapacity}</li>
                            </ul>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <p class="">Rp.${new Intl.NumberFormat('id-ID').format(vehicle.PricePerDay)} / hari</p>
                                <a href="vehical-details.php?vhid=${vehicle.id}" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                `;
                carList.append(vehicleHTML);
              });
            } else {
              var sortingCountHTML = $('.count');
              sortingCountHTML.empty();
              var countHTML = `0 Kendaraan</span>`;
              sortingCountHTML.append(countHTML);
              carList.append('<h4>Kendaraan tidak tersedia</h4>');
            }
          },
          error: function () {
            alert('Error loading vehicles');
          }
        });
      });

      $('#filterForm').on('reset', function () {
        $('input[type="checkbox"], input[type="radio"]').prop('checked', false);

        $.ajax({
          type: 'POST',
          url: 'load-vehicles.php',
          data: {
            brands: [],
            vehicletypes: []
          },
          success: function (response) {
            var data = JSON.parse(response);
            var carList = $('#carList');
            carList.empty();

            if (data.results.length > 0) {
              var totalVehicles = data.results.length;
              var sortingCountHTML = $('.count');
              sortingCountHTML.empty();
              var countHTML = `<span>${totalVehicles} Kendaraan</span>`;
              sortingCountHTML.append(countHTML);

              data.results.forEach(function (vehicle) {
                var vehicleHTML = `
                <div class="col-md-4">
                    <div class="card gray-bg" style="height: 100%;">
                        <div class="card-img-top" style="height: 150px; overflow: hidden;">
                            <img src="admin/img/vehicleimages/${vehicle.Vimage1}" style="width: 100%; height: auto; object-fit: cover;" alt="Image" />
                        </div>
                        <div class="product-listing-content" style="float: left; padding: 20px 15px 20px 20px; width: 100%;">
                            <h5><a href="vehical-details.php?vhid=${vehicle.id}">${vehicle.BrandName}, ${vehicle.VehiclesTitle}</a></h5>
                            <ul class="list-inline" style="margin: 0; padding: 0; list-style: none;">
                                <li class="list-inline-item" style="margin-right: 5px; display: flex; align-items: center;"><i class="fa fa-calendar" aria-hidden="true" style="margin-right: 8px;"></i>${vehicle.ModelYear}</li>
                                <li class="list-inline-item" style="margin-right: 5px; display: flex; align-items: center;"><i class="fa fa-gas-pump" aria-hidden="true" style="margin-right: 8px;"></i>${vehicle.FuelType}</li>
                                <li class="list-inline-item" style="display: flex; align-items: center;"><i class="fa fa-user" aria-hidden="true" style="margin-right: 8px;"></i>${vehicle.SeatingCapacity}</li>
                            </ul>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <p class="">Rp.${new Intl.NumberFormat('id-ID').format(vehicle.PricePerDay)} / hari</p>
                                <a href="vehical-details.php?vhid=${vehicle.id}" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                carList.append(vehicleHTML);
              });
            } else {
              carList.append('<h4>Kendaraan tidak ditemukan</h4>');
            }
          },
          error: function () {
            alert('Error resetting filters');
          }
        });
      });
    });
  </script>
</body>

</html>