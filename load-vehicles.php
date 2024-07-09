<?php
include ('includes/config.php');

session_start();
error_reporting(0);
ini_set('display_errors', 1);

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

$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = $query->rowCount();

echo json_encode(['results' => $results, 'count' => $cnt]);
