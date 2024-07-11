<?php
session_start();
error_reporting(0);
include ('includes/config.php');

if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	if (isset($_POST['submit'])) {
		$vehicletitle = $_POST['vehicletitle'];
		$brand = $_POST['brandname'];
		$vehicleoverview = $_POST['vehicalorcview'];
		$priceperday = $_POST['priceperday'];
		$fueltype = $_POST['fueltype'];
		$modelyear = $_POST['modelyear'];
		$seatingcapacity = $_POST['seatingcapacity'];
		$vehicletype = $_POST['vehicletype'];
		$airconditioner = isset($_POST['airconditioner']) ? 1 : 0;
		$powerdoorlocks = isset($_POST['powerdoorlocks']) ? 1 : 0;
		$antilockbrakingsys = isset($_POST['antilockbrakingsys']) ? 1 : 0;
		$brakeassist = isset($_POST['brakeassist']) ? 1 : 0;
		$powersteering = isset($_POST['powersteering']) ? 1 : 0;
		$driverairbag = isset($_POST['driverairbag']) ? 1 : 0;
		$passengerairbag = isset($_POST['passengerairbag']) ? 1 : 0;
		$powerwindow = isset($_POST['powerwindow']) ? 1 : 0;
		$cdplayer = isset($_POST['cdplayer']) ? 1 : 0;
		$centrallocking = isset($_POST['centrallocking']) ? 1 : 0;
		$crashcensor = isset($_POST['crashcensor']) ? 1 : 0;
		$leatherseats = isset($_POST['leatherseats']) ? 1 : 0;
		$helmet = isset($_POST['helmet']) ? 1 : 0;
		$raincoat = isset($_POST['raincoat']) ? 1 : 0;
		$securitylock = isset($_POST['securitylock']) ? 1 : 0;
		$extrastorage = isset($_POST['extrastorage']) ? 1 : 0;
		$handguard = isset($_POST['handguard']) ? 1 : 0;
		$extramirrors = isset($_POST['extramirrors']) ? 1 : 0;
		$engineguard = isset($_POST['engineguard']) ? 1 : 0;
		$kneeguards = isset($_POST['kneeguards']) ? 1 : 0;
		$elbowguards = isset($_POST['elbowguards']) ? 1 : 0;

		$id = intval($_GET['id']);
		$sql = "UPDATE tblvehicles SET 
			VehiclesTitle=:vehicletitle,
			VehiclesBrand=:brand,
			VehiclesOverview=:vehicleoverview,
			PricePerDay=:priceperday,
			FuelType=:fueltype,
			ModelYear=:modelyear,
			SeatingCapacity=:seatingcapacity,
			VehicleType=:vehicletype,
			AirConditioner=:airconditioner,
			PowerDoorLocks=:powerdoorlocks,
			AntiLockBrakingSystem=:antilockbrakingsys,
			BrakeAssist=:brakeassist,
			PowerSteering=:powersteering,
			DriverAirbag=:driverairbag,
			PassengerAirbag=:passengerairbag,
			PowerWindows=:powerwindow,
			CDPlayer=:cdplayer,
			CentralLocking=:centrallocking,
			CrashSensor=:crashcensor,
			LeatherSeats=:leatherseats,
			Helmet=:helmet,
			RainCoat=:raincoat,
			SecurityLock=:securitylock,
			ExtraStorage=:extrastorage,
			HandGuard=:handguard,
			ExtraMirrors=:extramirrors,
			EngineGuard=:engineguard,
			KneeGuards=:kneeguards,
			ElbowGuards=:elbowguards
			WHERE id=:id";
		$query = $dbh->prepare($sql);
		$query->bindParam(':vehicletitle', $vehicletitle, PDO::PARAM_STR);
		$query->bindParam(':brand', $brand, PDO::PARAM_STR);
		$query->bindParam(':vehicleoverview', $vehicleoverview, PDO::PARAM_STR);
		$query->bindParam(':priceperday', $priceperday, PDO::PARAM_STR);
		$query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
		$query->bindParam(':modelyear', $modelyear, PDO::PARAM_STR);
		$query->bindParam(':seatingcapacity', $seatingcapacity, PDO::PARAM_STR);
		$query->bindParam(':vehicletype', $vehicletype, PDO::PARAM_STR);
		// aksesoris mobil
		$query->bindParam(':airconditioner', $airconditioner, PDO::PARAM_INT);
		$query->bindParam(':powerdoorlocks', $powerdoorlocks, PDO::PARAM_INT);
		$query->bindParam(':antilockbrakingsys', $antilockbrakingsys, PDO::PARAM_INT);
		$query->bindParam(':brakeassist', $brakeassist, PDO::PARAM_INT);
		$query->bindParam(':powersteering', $powersteering, PDO::PARAM_INT);
		$query->bindParam(':driverairbag', $driverairbag, PDO::PARAM_INT);
		$query->bindParam(':passengerairbag', $passengerairbag, PDO::PARAM_INT);
		$query->bindParam(':powerwindow', $powerwindow, PDO::PARAM_INT);
		$query->bindParam(':cdplayer', $cdplayer, PDO::PARAM_INT);
		$query->bindParam(':centrallocking', $centrallocking, PDO::PARAM_INT);
		$query->bindParam(':crashcensor', $crashcensor, PDO::PARAM_INT);
		$query->bindParam(':leatherseats', $leatherseats, PDO::PARAM_INT);
		// aksesoris motor
		$query->bindParam(':helmet', $helmet, PDO::PARAM_INT);
		$query->bindParam(':raincoat', $raincoat, PDO::PARAM_INT);
		$query->bindParam(':securitylock', $securitylock, PDO::PARAM_INT);
		$query->bindParam(':extrastorage', $extrastorage, PDO::PARAM_INT);
		$query->bindParam(':handguard', $handguard, PDO::PARAM_INT);
		$query->bindParam(':extramirrors', $extramirrors, PDO::PARAM_INT);
		$query->bindParam(':engineguard', $engineguard, PDO::PARAM_INT);
		$query->bindParam(':kneeguards', $kneeguards, PDO::PARAM_INT);
		$query->bindParam(':elbowguards', $elbowguards, PDO::PARAM_INT);
		$query->bindParam(':id', $id, PDO::PARAM_INT);

		if ($query->execute()) {
			$msg = "Data updated successfully.";
		} else {
			$error = "Failed to update data. Please try again.";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>Car Rental Portal | Admin Edit Vehicle Info</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
	<style>
		.errorWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #dd3d36;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}

		.succWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #5cb85c;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}
	</style>

	<!-- <script src="js/showaccessories.js"></script> -->

	</script>
</head>

<body>
	<?php include ('includes/header.php'); ?>
	<div class="ts-main-content">
		<?php include ('includes/leftbar.php'); ?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Edit Vehicle</h2>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
									<div class="panel-body">
										<?php if ($msg) { ?>
											<div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?>
											</div>
										<?php } elseif ($error) { ?>
											<div class="errorWrap">
												<strong>ERROR</strong>:<?php echo htmlentities($error); ?>
											</div>
										<?php } ?>
										<?php
										$id = intval($_GET['id']);
										$sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid FROM tblvehicles JOIN tblbrands ON tblbrands.id=tblvehicles.VehiclesBrand WHERE tblvehicles.id=:id";
										$query = $dbh->prepare($sql);
										$query->bindParam(':id', $id, PDO::PARAM_INT);
										$query->execute();
										$results = $query->fetchAll(PDO::FETCH_OBJ);
										$cnt = 1;
										if ($query->rowCount() > 0) {
											foreach ($results as $result) { ?>
												<form method="post" class="form-horizontal" enctype="multipart/form-data">
													<div class="form-group">
														<label class="col-sm-2 control-label">Vehicle Title<span
																style="color:red">*</span></label>
														<div class="col-sm-4">
															<input type="text" name="vehicletitle" class="form-control"
																value="<?php echo htmlentities($result->VehiclesTitle) ?>"
																required>
														</div>
														<label class="col-sm-2 control-label">Select Brand<span
																style="color:red">*</span></label>
														<div class="col-sm-4">
															<select class="selectpicker" name="brandname" required>
																<option value="<?php echo htmlentities($result->bid); ?>">
																	<?php echo htmlentities($bdname = $result->BrandName); ?>
																</option>
																<?php
																$ret = "SELECT id,BrandName FROM tblbrands";
																$query = $dbh->prepare($ret);
																$query->execute();
																$resultss = $query->fetchAll(PDO::FETCH_OBJ);
																if ($query->rowCount() > 0) {
																	foreach ($resultss as $results) {
																		if ($results->BrandName == $bdname) {
																			continue;
																		} else {
																			?>
																			<option value="<?php echo htmlentities($results->id); ?>">
																				<?php echo htmlentities($results->BrandName); ?>
																			</option>
																		<?php }
																	}
																} ?>
															</select>
														</div>
													</div>
													<div class="hr-dashed"></div>
													<div class="form-group">
														<label class="col-sm-2 control-label">Vehical Overview<span
																style="color:red">*</span></label>
														<div class="col-sm-10">
															<textarea class="form-control" name="vehicalorcview" rows="3"
																required><?php echo htmlentities($result->VehiclesOverview); ?></textarea>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label">Price Per Day<span
																style="color:red">*</span></label>
														<div class="col-sm-4">
															<input type="text" name="priceperday" class="form-control"
																value="<?php echo htmlentities($result->PricePerDay); ?>"
																required>
														</div>
														<label class="col-sm-2 control-label">Select Fuel Type<span
																style="color:red">*</span></label>
														<div class="col-sm-4">
															<select class="selectpicker" name="fueltype" required>
																<option value="Bensin" <?php echo ($result->FuelType == 'Bensin') ? 'selected' : ''; ?>>Bensin</option>
																<option value="Pertalite" <?php echo ($result->FuelType == 'Pertalite') ? 'selected' : ''; ?>>
																	Pertalite</option>
																<option value="Pertamax" <?php echo ($result->FuelType == 'Pertamax') ? 'selected' : ''; ?>>
																	Pertamax</option>
																<option value="Pertamax Turbo" <?php echo ($result->FuelType == 'Pertamax Turbo') ? 'selected' : ''; ?>>
																	Pertamax Turbo</option>
																<option value="Solar" <?php echo ($result->FuelType == 'Solar') ? 'selected' : ''; ?>>Solar</option>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label">Model Year<span
																style="color:red">*</span></label>
														<div class="col-sm-4">
															<input type="text" name="modelyear" class="form-control"
																value="<?php echo htmlentities($result->ModelYear); ?>"
																required>
														</div>
														<label class="col-sm-2 control-label">Seating Capacity<span
																style="color:red">*</span></label>
														<div class="col-sm-4">
															<input type="text" name="seatingcapacity" class="form-control"
																value="<?php echo htmlentities($result->SeatingCapacity); ?>"
																required>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label">Vehicle Type<span
																style="color:red">*</span></label>
														<div class="col-sm-4">
															<select class="selectpicker" name="vehicletype" required
																onchange="showAccessories(this.value);">
																<option value="">Pilih Tipe Kendaraan</option>
																<option value="Mobil" <?php echo ($result->VehicleType == 'Mobil') ? 'selected' : ''; ?>>Mobil</option>
																<option value="Motor" <?php echo ($result->VehicleType == 'Motor') ? 'selected' : ''; ?>>Motor</option>
															</select>
														</div>
													</div>
													<div class="hr-dashed"></div>
													<div class="form-group">
														<div class="col-sm-12">
															<h4><b>Upload Images</b></h4>
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-4">
															Image 1 <img
																src="img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>"
																width="300" height="200" style="border:solid 1px #000">
															<a
																href="changeimage1.php?imgid=<?php echo htmlentities($result->id) ?>">Change
																Image 1</a>
														</div>
														<div class="col-sm-4">
															Image 2<img
																src="img/vehicleimages/<?php echo htmlentities($result->Vimage2); ?>"
																width="300" height="200" style="border:solid 1px #000">
															<a
																href="changeimage2.php?imgid=<?php echo htmlentities($result->id) ?>">Change
																Image 2</a>
														</div>
														<div class="col-sm-4">
															Image 3<img
																src="img/vehicleimages/<?php echo htmlentities($result->Vimage3); ?>"
																width="300" height="200" style="border:solid 1px #000">
															<a
																href="changeimage3.php?imgid=<?php echo htmlentities($result->id) ?>">Change
																Image 3</a>
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-4">
															Image 4<img
																src="img/vehicleimages/<?php echo htmlentities($result->Vimage4); ?>"
																width="300" height="200" style="border:solid 1px #000">
															<a
																href="changeimage4.php?imgid=<?php echo htmlentities($result->id) ?>">Change
																Image 4</a>
														</div>
														<div class="col-sm-4">
															Image 5
															<?php if ($result->Vimage5 == "") {
																echo htmlentities("File not available");
															} else { ?>
																<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage5); ?>"
																	width="300" height="200" style="border:solid 1px #000">
																<a
																	href="changeimage5.php?imgid=<?php echo htmlentities($result->id) ?>">Change
																	Image 5</a>
															<?php } ?>
														</div>
													</div>
													<div class="hr-dashed"></div>
												<?php }
										} ?>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">Accessories</div>
							<div class="panel-body">
								<div id="accessories">
									<!-- Accessories will be loaded here based on the vehicle type selected -->
								</div>

								<div class="form-group">
									<div class="col-sm-8 col-sm-offset-2">
										<button class="btn btn-primary" name="submit" type="submit">Save
											changes</button>
									</div>
								</div>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
			<!-- End of Form -->
		</div>
	</div>

	<script>
		function showAccessories(vehicleType) {
			var accessoriesDiv = document.getElementById('accessories');
			console.log('vehicleType', vehicleType);
			accessoriesDiv.innerHTML = '';
			if (vehicleType === 'Motor') {
				accessoriesDiv.innerHTML = '<div class="row">' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="airconditioner" name="airconditioner" value="1" ' + (<?php echo $result->AirConditioner; ?> == 1 ? 'checked' : '') + '><label for="airconditioner"> Air Conditioner </label></div></div>' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="powerdoorlocks" name="powerdoorlocks" value="1" ' + (<?php echo $result->PowerDoorLocks; ?> == 1 ? 'checked' : '') + '><label for="powerdoorlocks"> Power Door Locks </label></div></div>' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="antilockbrakingsys" name="antilockbrakingsys" value="1" ' + (<?php echo $result->AntiLockBrakingSystem; ?> == 1 ? 'checked' : '') + '><label for="antilockbrakingsys"> AntiLock Braking System </label></div></div>' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="brakeassist" name="brakeassist" value="1" ' + (<?php echo $result->BrakeAssist; ?> == 1 ? 'checked' : '') + '><label for="brakeassist"> Brake Assist </label></div></div>' +
					'</div><div class="row">' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="powersteering" name="powersteering" value="1" ' + (<?php echo $result->PowerSteering; ?> == 1 ? 'checked' : '') + '><label for="powersteering"> Power Steering </label></div></div>' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="driverairbag" name="driverairbag" value="1" ' + (<?php echo $result->DriverAirbag; ?> == 1 ? 'checked' : '') + '><label for="driverairbag">Driver Airbag</label></div></div>' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="passengerairbag" name="passengerairbag" value="1" ' + (<?php echo $result->PassengerAirbag; ?> == 1 ? 'checked' : '') + '><label for="passengerairbag"> Passenger Airbag </label></div></div>' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="powerwindow" name="powerwindow" value="1" ' + (<?php echo $result->PowerWindows; ?> == 1 ? 'checked' : '') + '><label for="powerwindow"> Power Windows </label></div></div>' +
					'</div><div class="row">' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="cdplayer" name="cdplayer" value="1" ' + (<?php echo $result->CDPlayer; ?> == 1 ? 'checked' : '') + '><label for="cdplayer"> CD Player </label></div></div>' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="centrallocking" name="centrallocking" value="1" ' + (<?php echo $result->CentralLocking; ?> == 1 ? 'checked' : '') + '><label for="centrallocking">Central Locking</label></div></div>' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="crashcensor" name="crashcensor" value="1" ' + (<?php echo $result->CrashSensor; ?> == 1 ? 'checked' : '') + '><label for="crashcensor"> Crash Sensor </label></div></div>' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="leatherseats" name="leatherseats" value="1" ' + (<?php echo $result->LeatherSeats; ?> == 1 ? 'checked' : '') + '><label for="leatherseats"> Leather Seats </label></div></div>' +
					'</div>';
			} else if (vehicleType === 'Mobil') {
				accessoriesDiv.innerHTML = '<div class="row">' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="airconditioner" name="airconditioner" value="1" ' + (<?php echo $result->AirConditioner; ?> == 1 ? 'checked' : '') + '><label for="airconditioner"> Air Conditioner </label></div></div>' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="powerdoorlocks" name="powerdoorlocks" value="1" ' + (<?php echo $result->PowerDoorLocks; ?> == 1 ? 'checked' : '') + '><label for="powerdoorlocks"> Power Door Locks </label></div></div>' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="antilockbrakingsys" name="antilockbrakingsys" value="1" ' + (<?php echo $result->AntiLockBrakingSystem; ?> == 1 ? 'checked' : '') + '><label for="antilockbrakingsys"> AntiLock Braking System </label></div></div>' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="brakeassist" name="brakeassist" value="1" ' + (<?php echo $result->BrakeAssist; ?> == 1 ? 'checked' : '') + '><label for="brakeassist"> Brake Assist </label></div></div>' +
					'</div><div class="row">' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="powersteering" name="powersteering" value="1" ' + (<?php echo $result->PowerSteering; ?> == 1 ? 'checked' : '') + '><label for="powersteering"> Power Steering </label></div></div>' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="driverairbag" name="driverairbag" value="1" ' + (<?php echo $result->DriverAirbag; ?> == 1 ? 'checked' : '') + '><label for="driverairbag">Driver Airbag</label></div></div>' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="passengerairbag" name="passengerairbag" value="1" ' + (<?php echo $result->PassengerAirbag; ?> == 1 ? 'checked' : '') + '><label for="passengerairbag"> Passenger Airbag </label></div></div>' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="powerwindow" name="powerwindow" value="1" ' + (<?php echo $result->PowerWindows; ?> == 1 ? 'checked' : '') + '><label for="powerwindow"> Power Windows </label></div></div>' +
					'</div><div class="row">' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="cdplayer" name="cdplayer" value="1" ' + (<?php echo $result->CDPlayer; ?> == 1 ? 'checked' : '') + '><label for="cdplayer"> CD Player </label></div></div>' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="centrallocking" name="centrallocking" value="1" ' + (<?php echo $result->CentralLocking; ?> == 1 ? 'checked' : '') + '><label for="centrallocking">Central Locking</label></div></div>' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="crashcensor" name="crashcensor" value="1" ' + (<?php echo $result->CrashSensor; ?> == 1 ? 'checked' : '') + '><label for="crashcensor"> Crash Sensor </label></div></div>' +
					'<div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="leatherseats" name="leatherseats" value="1" ' + (<?php echo $result->LeatherSeats; ?> == 1 ? 'checked' : '') + '><label for="leatherseats"> Leather Seats </label></div></div>' +
					'</div>';
			}
		}
	</script>
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/main.js"></script>
	<script src="js/counterup.min.js"></script>
	<script src="js/waypoints.min.js"></script>
	<script src="js/bootstrap-slider.min.js"></script>
	<script src="js/bootstrap-timepicker.min.js"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			var selectedType = document.querySelector('select[name="vehicletype"]').value;
			showAccessories(selectedType);
		});
	</script>
</body>

</html>

</html>