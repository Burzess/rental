<header>
  <div class="default-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2">
          <div class="logo"> <a href="index.php">
              <h2>GOKGOK</h2>
            </a> </div>
        </div>
        <div class="col-sm-9 col-md-10">
          <div class="header_info">
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
              <p class="uppercase_text">Untuk Dukungan Kirim Email ke : </p>
              <a href="mailto:info@example.com">info@gokgok.com</a>
            </div>
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
              <p class="uppercase_text">Hubungi Layanan Pelanggan di: </p>
              <a href="tel:+62-1234-5678-09">+62-89966-554-422</a>
            </div>
            <div class="social-follow">

            </div>
            <?php if (strlen($_SESSION['login']) == 0) { ?>
              <div class="login_btn"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal"
                  data-dismiss="modal">Login / Register</a> </div>
            <?php } else {
              echo "Welcome To GOKGOK";
            } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse"
          class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span
            class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                  class="fa fa-user-circle" aria-hidden="true"></i>
                <?php
                $email = $_SESSION['login'];
                $sql = "SELECT FullName FROM tblusers WHERE EmailId=:email ";
                $query = $dbh->prepare($sql);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                if ($query->rowCount() > 0) {
                  foreach ($results as $result) {
                    echo htmlentities($result->FullName);
                  }
                } ?><i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
                <?php if ($_SESSION['login']) { ?>
                  <li><a href="profile.php">Pengaturan Profil</a></li>
                  <li><a href="update-password.php">Perbarui Kata Sandi</a></li>
                  <li><a href="my-booking.php">Pemesanan Saya</a></li>
                  <li><a href="post-testimonial.php">Posting Testimonial</a></li>
                  <li><a href="my-testimonials.php">Testimonial Saya</a></li>
                  <li><a href="logout.php">Keluar</a></li>
                <?php } else { ?>
                  <!-- <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Profile Settings</a></li>
                  <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Update Password</a></li>
                  <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">My Booking</a></li>
                  <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Post a Testimonial</a></li>
                  <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">My Testimonial</a></li> -->
                  <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Login</a></li>
                <?php } ?>
              </ul>
            </li>
          </ul>
        </div>
        <!-- <div class="header_search">
          <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
          <form action="car-listing.php" method="post" id="header-search-form">
            <input type="text" name="search" placeholder="Search by brand or vehicle name..." class="form-control">
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
        </div> -->
      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a> </li>

          <li><a href="page.php?type=aboutus">About Us</a></li>
          <li><a href="vehicle-listing.php">Vehicle Listing</a>
          <li><a href="page.php?type=faqs">FAQs</a></li>
          <li><a href="contact-us.php">Contact Us</a></li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end -->

</header>