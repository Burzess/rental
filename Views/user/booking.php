<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Rental Booking</title>
    <link rel="stylesheet" href="../../public/css/booking.css">
    <link href="../../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include '../component/navbar.php'; ?>

    <div class="booking-container">
        <div class="bike-image">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://www.wahanahonda.com/assets/upload/produk/fitur/PRODUK_FITUR_19_02-02-2023.png"
                            class="d-block w-100" alt="bike-image">
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.wahanahonda.com/assets/upload/produk/fitur/PRODUK_FITUR_19_02-02-2023.png"
                            class="d-block w-100" alt="bike-image">
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.wahanahonda.com/assets/upload/produk/fitur/PRODUK_FITUR_19_02-02-2023.png"
                            class="d-block w-100" alt="bike-image">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="booking-details">
            <div class="booking-form">
                <h2>Book Now</h2>
                <form action="#process_booking.php" method="post">
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" required>
                    <label for="pickup-date">Pick-Up Date:</label>
                    <input type="date" id="pickup-date" name="pickup-date" required>
                    <label for="pickup-time">Pick-Up Time:</label>
                    <input type="time" id="pickup-time" name="pickup-time" required>
                    <label for="duration">Duration:</label>
                    <input type="text" id="duration" name="duration" value="72 Hours" readonly>
                    <label for="total-price">Total Price: <?php echo "Rp. 100.000" ?></label>
                    <!-- <input type="text" id="total-price" name="total-price" value="" readonly> -->
                    <input type="submit" value="BOOK NOW">
                </form>
            </div>
        </div>

        <div class="vehicle-detail">
            
        </div>
    </div>
    
    <?php include "../component/footer.php"; ?>

    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>