
<?php
session_start();
include ('includes/config.php');
error_reporting(0);

if (isset($_GET['vhid'])) {
  $vhid = intval($_GET['vhid']);
  $sql = "SELECT PricePerDay FROM tblvehicles WHERE id = :vhid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':vhid', $vhid, PDO::PARAM_INT);
  $query->execute();
  $result = $query->fetch(PDO::FETCH_OBJ);

  if ($result) {
    $pricePerDay = $result->PricePerDay;
  }
} else {
  echo "<script>alert('Vehicle ID is missing');</script>";
  exit;
}

if (isset($_POST['submit'])) {
  $fromdate = $_POST['fromdate'];
  $todate = $_POST['todate'];
  $message = $_POST['message'];
  $useremail = $_SESSION['login'];
  $totalPrice = $_POST['totalPrice'];

  $fromDateTime = DateTime::createFromFormat('d/m/Y', $fromdate);
  $toDateTime = DateTime::createFromFormat('d/m/Y', $todate);

  $interval = $fromDateTime->diff($toDateTime);
  $days = $interval->days;
  $total = $days * $pricePerDay;
  $status = 0;
  $vhid = $_GET['vhid'];
  $sql = "INSERT INTO  tblbooking(userEmail,VehicleId,FromDate,ToDate,message,totalPrice,Status) VALUES(:useremail,:vhid,:fromdate,:todate,:message,:totalPrice,:status)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
  $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
  $query->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
  $query->bindParam(':todate', $todate, PDO::PARAM_STR);
  $query->bindParam(':message', $message, PDO::PARAM_STR);
  $query->bindParam(':totalPrice', $total, PDO::PARAM_STR);
  $query->bindParam(':status', $status, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    echo "<script>alert('Booking successfull.');</script>";
  } else {
    echo "<script>alert('Something went wrong. Please try again');</script>";
  }

}

?>


<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Car Rental Port | Vehicle Details</title>
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
  <link rel="apple-touch-icon-precomposed" sizes="144x144"
    href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114"
    href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
  <link rel="apple-touch-icon-precomposed" sizes="72x72"
    href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>

<body>

  <!-- Start Switcher -->
  <?php include ('includes/colorswitcher.php'); ?>
  <!-- /Switcher -->

  <!--Header-->
  <?php include ('includes/header.php'); ?>
  <!-- /Header -->

  <!--Listing-Image-Slider-->
  <?php
  $vhid = intval($_GET['vhid']);
  $sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.id=:vhid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  $cnt = 1;
  if ($query->rowCount() > 0) {
    foreach ($results as $result) {
      $_SESSION['brndid'] = $result->bid;
      ?>

      <section id="listing_img_slider">
        <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive"
            alt="image" width="900" height="560"></div>
        <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage2); ?>" class="img-responsive"
            alt="image" width="900" height="560"></div>
        <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage3); ?>" class="img-responsive"
            alt="image" width="900" height="560"></div>
        <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage4); ?>" class="img-responsive"
            alt="image" width="900" height="560"></div>
        <?php if ($result->Vimage5 == "") {

        } else {
          ?>
          <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage5); ?>" class="img-responsive"
              alt="image" width="900" height="560"></div>
        <?php } ?>
      </section>
      <!--/Listing-Image-Slider-->


      <!--Listing-detail-->
      <section class="listing-detail">
        <div class="container">
          <div class="listing_detail_head row">
            <div class="col-md-9">
              <h2><?php echo htmlentities($result->BrandName); ?> , <?php echo htmlentities($result->VehiclesTitle); ?></h2>
            </div>
            <div class="col-md-3">
              <div class="price_info">
                <p>Rp. <?php echo number_format(htmlentities($result->PricePerDay), 0, ',', '.'); ?> </p>Per Hari
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9">
              <div class="main_features">
                <ul>

                  <li> <i class="fa fa-calendar" aria-hidden="true"></i>
                    <h5><?php echo htmlentities($result->ModelYear); ?></h5>
                    <p>Reg.Year</p>
                  </li>
                  <li> <i class="fa fa-cogs" aria-hidden="true"></i>
                    <h5><?php echo htmlentities($result->FuelType); ?></h5>
                    <p>Fuel Type</p>
                  </li>
                  <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
                    <h5><?php echo htmlentities($result->SeatingCapacity); ?></h5>
                    <p>Seats</p>
                  </li>
                </ul>
              </div>
              <div class="listing_more_info">
                <div class="listing_detail_wrap">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs gray-bg" role="tablist">
                    <li role="presentation" class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview"
                        role="tab" data-toggle="tab">Vehicle Overview </a></li>

                    <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab"
                        data-toggle="tab">Accessories</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- vehicle-overview -->
                    <div role="tabpanel" class="tab-pane active" id="vehicle-overview">

                      <p><?php echo htmlentities($result->VehiclesOverview); ?></p>
                    </div>

                    <?php include('accessories.php'); ?>
                    
                  </div>
                </div>
              </div>
            <?php }
  } ?>

        </div>

        <!--Side-Bar-->
        <aside class="col-md-3">
          <div class="share_vehicle">
            <p>Share: <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a href="#"><i
                  class="fa fa-twitter-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin-square"
                  aria-hidden="true"></i></a> <a href="#"><i class="fa fa-google-plus-square"
                  aria-hidden="true"></i></a> </p>
          </div>
          <div class="sidebar_widget">
            <div class="widget_heading">
              <h5><i class="fa fa-envelope" aria-hidden="true"></i>Book Now</h5>
            </div>
            <form method="post" onsubmit="event.preventDefault(); openConfirmationModal();">
              <div class="form-group">
                <input type="date" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)"
                  oninput="calculateTotalPrice()" required>
              </div>
              <div class="form-group">
                <input type="date" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)"
                  oninput="calculateTotalPrice()" required>
              </div>
              <input type="hidden" id="totalPriceInput" name="totalPrice" value="<?php echo $result->PricePerDay; ?>">
              <div class="form-group">
                <label id="totalPrice">Total Price: </label>
              </div>
              <?php if ($_SESSION['login']) { ?>
                <div class="form-group">
                  <button type="button" class="btn" onclick="openConfirmationModal()">Pesan Sekarang</button>
                </div>
              <?php } else { ?>
                <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login For
                  Book</a>
              <?php } ?>
            </form>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog"
            aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Pesanan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Are you sure you want to book the vehicle from <span id="confirmFromDate"></span> to <span
                    id="confirmToDate"></span>?
                  <br>
                  Total Price: <span id="confirmTotalPrice"></span>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary" onclick="submitBookingForm()">Confirm</button>
                </div>
              </div>
            </div>
          </div>

          <script>

          </script>
        </aside>
        <!--/Side-Bar-->
      </div>

      <script>
        function openConfirmationModal() {
          var fromDate = document.getElementsByName('fromdate')[0].value;
          var toDate = document.getElementsByName('todate')[0].value;
          var totalPrice = document.getElementById('totalPriceInput').value;

          document.getElementById('confirmFromDate').innerText = fromDate;
          document.getElementById('confirmToDate').innerText = toDate;
          document.getElementById('confirmTotalPrice').innerText = 'Rp. ' + parseInt(totalPrice).toLocaleString('id-ID');

          $('#confirmationModal').modal('show');
        }

        function submitBookingForm() {
          document.querySelector('form').submit();
        }

        function calculateTotalPrice() {
          var fromDate = document.getElementsByName('fromdate')[0].value;
          var toDate = document.getElementsByName('todate')[0].value;
          var pricePerDay = <?php echo $result->PricePerDay; ?>;

          if (fromDate && toDate && !isNaN(pricePerDay)) {
            var startDate = new Date(fromDate.split('/').reverse().join('-'));
            var endDate = new Date(toDate.split('/').reverse().join('-'));
            var timeDiff = endDate - startDate;
            var dayDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));

            console.log('timeDiff:', timeDiff);
            console.log('dayDiff:', dayDiff);

            if (dayDiff > 0) {
              var totalPrice = dayDiff * pricePerDay;
              document.getElementById('totalPrice').innerText = 'Total Price: Rp. ' + totalPrice.toLocaleString('id-ID');
              document.getElementById('totalPriceInput').value = totalPrice;
            } else {
              document.getElementById('totalPrice').innerText = 'Total Price: Invalid date range';
            }
          } else {
            document.getElementById('totalPrice').innerText = 'Total Price: ';
          }
        }
      </script>


      <div class="space-20"></div>
      <div class="divider"></div>

      <!--Similar-Cars-->
      <div class="similar_cars">
        <h3>Similar Cars</h3>
        <div class="row">
          <?php
          $bid = $_SESSION['brndid'];
          $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.VehiclesBrand=:bid";
          $query = $dbh->prepare($sql);
          $query->bindParam(':bid', $bid, PDO::PARAM_STR);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          $cnt = 1;
          if ($query->rowCount() > 0) {
            foreach ($results as $result) { ?>
              <div class="col-md-3 grid_listing">
                <div class="product-listing-m gray-bg">
                  <div class="product-listing-img"> <a
                      href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><img
                        src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive"
                        alt="image" /> </a>
                  </div>
                  <div class="product-listing-content">
                    <h5><a
                        href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->BrandName); ?>
                        , <?php echo htmlentities($result->VehiclesTitle); ?></a></h5>
                    <p class="list-price">$<?php echo htmlentities($result->PricePerDay); ?></p>

                    <ul class="features_list">

                      <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity); ?>
                        seats</li>
                      <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear); ?>
                        model</li>
                      <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result->FuelType); ?></li>
                    </ul>
                  </div>
                </div>
              </div>
            <?php }
          } ?>

        </div>
      </div>
      <!--/Similar-Cars-->

    </div>
  </section>
  <!--/Listing-detail-->

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

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/interface.js"></script>
  <script src="assets/switcher/js/switcher.js"></script>
  <script src="assets/js/bootstrap-slider.min.js"></script>
  <script src="assets/js/slick.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>

</body>

</html>