<?php
session_start();
include ('includes/config.php');

$limit = $_POST['limit'];
$offset = $_POST['offset'];
$brand = $_POST['brand'];
$fueltype = $_POST['fueltype'];

$sql = "SELECT tblvehicles.*, tblbrands.BrandName, tblbrands.id as bid FROM tblvehicles JOIN tblbrands ON tblbrands.id = tblvehicles.VehiclesBrand WHERE 1 = 1";

if ($brand != "Select Brand") {
    $sql .= " AND tblvehicles.VehiclesBrand = :brand";
}
if ($fueltype != "Select Fuel Type") {
    $sql .= " AND tblvehicles.FuelType = :fueltype";
}

$sql .= " LIMIT :limit OFFSET :offset";

$query = $dbh->prepare($sql);

if ($brand != "Select Brand") {
    $query->bindParam(':brand', $brand, PDO::PARAM_STR);
}
if ($fueltype != "Select Fuel Type") {
    $query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
}

$query->bindParam(':limit', $limit, PDO::PARAM_INT);
$query->bindParam(':offset', $offset, PDO::PARAM_INT);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

if ($query->rowCount() > 0) {
    foreach ($results as $result) { ?>
        <div class="product-listing-m gray-bg">
            <div class="product-listing-img"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>"
                    class="img-responsive" alt="Image" />
            </div>
            <div class="product-listing-content">
                <h5><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->BrandName); ?>
                        , <?php echo htmlentities($result->VehiclesTitle); ?></a></h5>
                <p class="list-price">Rp.<?php echo htmlentities($result->PricePerDay); ?> Per Day</p>
                <ul>
                    <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity); ?> seats
                    </li>
                    <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear); ?> model
                    </li>
                    <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result->FuelType); ?></li>
                </ul>
                <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>" class="btn">View Details <span
                        class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
            </div>
        </div>
    <?php }
}
?>