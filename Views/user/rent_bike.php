<?php
require '../../koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ' . PATH . '/Views/auth/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOKGOK - Rental Service</title>

    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="stylesheet" href="../../public/css/card-bike.css">
    <link href="../../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include '../component/navbar.php'; ?>

    <div class="banner-section">
        <div class="image-wrapper">
            <img src="../../public/img/navigation.svg" alt="">
        </div>
        <div class="text">
            <h1>Rent A Bike <br> Rent Your Freedom</h1>
        </div>
    </div>
    <div class="search-filter-card">
        <div class="card">
            <input type="text" placeholder="Search...">
            <!-- <input type="number" placeholder="Price"> -->
            <!-- <input type="text" placeholder="Time Duration"> -->
            <select>
                <option value="">Brand</option>
                <option value="CBR">CBR</option>
                <option value="Honda 140">Honda 140</option>
            </select>
            <button>Filter</button>
        </div>
    </div>

    <main>
        <div class="cart-bike">
            <?php for ($i = 0; $i < 10; $i++) { ?>
                <div class="card">
                    <img src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/uploads/product-draft/meta/ahm-gaul-sideview-deluxe-black-6-01022023-085314.png"
                        class="card-img-top" alt="CBR Motorcycle">
                    <div class="card-body">
                        <h5 class="card-title">Beat</h5>
                        <p class="card-text">Seats: 2</p>
                        <p class="card-text">Horsepower: 500</p>
                        <p class="card-text">Engine: 125cc</p>
                        <p class="card-text">Front Brake: Disc</p>
                        <p class="card-text">Gear Box: -</p>
                        <p class="card-text">Overall Mileage: 40 Km/pl</p>
                    </div>
                    <div class="price-button d-flex justify-content-between align-items-center">
                        <div class="price">
                            <p>Per Hari</p>
                            <h5>Rp.100.000</h5>
                        </div>
                        <button class="btn btn-primary" onclick="location.href='booking.php'">Rent Bike</button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>

    <?php include "../component/footer.php"; ?>

    <script src="../js/script.js"></script>

    <script src="https://kit.fontawesome.com/cbdc962120.js" crossorigin="anonymous"></script>
</body>

</html>