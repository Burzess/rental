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
		$vimage1 = $_FILES["img1"]["name"];
		$vimage2 = $_FILES["img2"]["name"];
		$vimage3 = $_FILES["img3"]["name"];
		$vimage4 = $_FILES["img4"]["name"];
		$vimage5 = $_FILES["img5"]["name"];
		$airconditioner = $_POST['airconditioner'];
		$powerdoorlocks = $_POST['powerdoorlocks'];
		$antilockbrakingsys = $_POST['antilockbrakingsys'];
		$brakeassist = $_POST['brakeassist'];
		$powersteering = $_POST['powersteering'];
		$driverairbag = $_POST['driverairbag'];
		$passengerairbag = $_POST['passengerairbag'];
		$powerwindow = $_POST['powerwindow'];
		$cdplayer = $_POST['cdplayer'];
		$centrallocking = $_POST['centrallocking'];
		$crashcensor = $_POST['crashcensor'];
		$leatherseats = $_POST['leatherseats'];
		$helmet = $_POST['helmet'];
		$raincoat = $_POST['raincoat'];
		$securitylock = $_POST['securitylock'];
		$extrastorage = $_POST['extrastorage'];
		$handguard = $_POST['handguard'];
		$extramirrors = $_POST['extramirrors'];
		$engineguard = $_POST['engineguard'];
		$kneeguards = $_POST['kneeguards'];
		$elbowguards = $_POST['elbowguards'];
		move_uploaded_file($_FILES["img1"]["tmp_name"], "img/vehicleimages/" . $_FILES["img1"]["name"]);
		move_uploaded_file($_FILES["img2"]["tmp_name"], "img/vehicleimages/" . $_FILES["img2"]["name"]);
		move_uploaded_file($_FILES["img3"]["tmp_name"], "img/vehicleimages/" . $_FILES["img3"]["name"]);
		move_uploaded_file($_FILES["img4"]["tmp_name"], "img/vehicleimages/" . $_FILES["img4"]["name"]);
		move_uploaded_file($_FILES["img5"]["tmp_name"], "img/vehicleimages/" . $_FILES["img5"]["name"]);

		$sql = "INSERT INTO tblvehicles(VehiclesTitle,VehiclesBrand,VehiclesOverview,PricePerDay,FuelType,ModelYear,SeatingCapacity,VehicleType,Vimage1,Vimage2,Vimage3,Vimage4,Vimage5,AirConditioner,PowerDoorLocks,AntiLockBrakingSystem,BrakeAssist,PowerSteering,DriverAirbag,PassengerAirbag,PowerWindows,CDPlayer,CentralLocking,CrashSensor,LeatherSeats,Helmet,RainCoat,SecurityLock,ExtraStorage,HandGuard,ExtraMirrors,EngineGuard,KneeGuards,ElbowGuards) VALUES(:vehicletitle,:brand,:vehicleoverview,:priceperday,:fueltype,:modelyear,:seatingcapacity,:vehicletype,:vimage1,:vimage2,:vimage3,:vimage4,:vimage5,:airconditioner,:powerdoorlocks,:antilockbrakingsys,:brakeassist,:powersteering,:driverairbag,:passengerairbag,:powerwindow,:cdplayer,:centrallocking,:crashcensor,:leatherseats,:helmet,:raincoat,:securitylock,:extrastorage,:handguard,:extramirrors,:engineguard,:kneeguards,:elbowguards)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':vehicletitle', $vehicletitle, PDO::PARAM_STR);
		$query->bindParam(':brand', $brand, PDO::PARAM_STR);
		$query->bindParam(':vehicleoverview', $vehicleoverview, PDO::PARAM_STR);
		$query->bindParam(':priceperday', $priceperday, PDO::PARAM_STR);
		$query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
		$query->bindParam(':modelyear', $modelyear, PDO::PARAM_STR);
		$query->bindParam(':seatingcapacity', $seatingcapacity, PDO::PARAM_STR);
		$query->bindParam(':vehicletype', $vehicletype, PDO::PARAM_STR);
		$query->bindParam(':vimage1', $vimage1, PDO::PARAM_STR);
		$query->bindParam(':vimage2', $vimage2, PDO::PARAM_STR);
		$query->bindParam(':vimage3', $vimage3, PDO::PARAM_STR);
		$query->bindParam(':vimage4', $vimage4, PDO::PARAM_STR);
		$query->bindParam(':vimage5', $vimage5, PDO::PARAM_STR);
		$query->bindParam(':airconditioner', $airconditioner, PDO::PARAM_STR);
		$query->bindParam(':powerdoorlocks', $powerdoorlocks, PDO::PARAM_STR);
		$query->bindParam(':antilockbrakingsys', $antilockbrakingsys, PDO::PARAM_STR);
		$query->bindParam(':brakeassist', $brakeassist, PDO::PARAM_STR);
		$query->bindParam(':powersteering', $powersteering, PDO::PARAM_STR);
		$query->bindParam(':driverairbag', $driverairbag, PDO::PARAM_STR);
		$query->bindParam(':passengerairbag', $passengerairbag, PDO::PARAM_STR);
		$query->bindParam(':powerwindow', $powerwindow, PDO::PARAM_STR);
		$query->bindParam(':cdplayer', $cdplayer, PDO::PARAM_STR);
		$query->bindParam(':centrallocking', $centrallocking, PDO::PARAM_STR);
		$query->bindParam(':crashcensor', $crashcensor, PDO::PARAM_STR);
		$query->bindParam(':leatherseats', $leatherseats, PDO::PARAM_STR);
		$query->bindParam(':helmet', $helmet, PDO::PARAM_STR);
		$query->bindParam(':raincoat', $raincoat, PDO::PARAM_STR);
		$query->bindParam(':securitylock', $securitylock, PDO::PARAM_STR);
		$query->bindParam(':extrastorage', $extrastorage, PDO::PARAM_STR);
		$query->bindParam(':handguard', $handguard, PDO::PARAM_STR);
		$query->bindParam(':extramirrors', $extramirrors, PDO::PARAM_STR);
		$query->bindParam(':engineguard', $engineguard, PDO::PARAM_STR);
		$query->bindParam(':kneeguards', $kneeguards, PDO::PARAM_STR);
		$query->bindParam(':elbowguards', $elbowguards, PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if ($lastInsertId) {
			$msg = "Vehicle posted successfully";
		} else {
			$error = "Something went wrong. Please try again";
		}
	}

	?>
	<!doctype html>
	<html lang="en" class="no-js">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="theme-color" content="#3e454c">

		<title>Car Rental Portal | Admin Post Vehicle</title>

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

	</head>

	<body>
		<?php include ('includes/header.php'); ?>
		<div class="ts-main-content">
			<?php include ('includes/leftbar.php'); ?>
			<div class="content-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<h2 class="page-title">Post A Vehicle</h2>
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Basic Info</div>
										<?php if ($error) { ?>
											<div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?>
											</div><?php } else if ($msg) { ?>
												<div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?>
												</div><?php } ?>
										<div class="panel-body">
											<form method="post" class="form-horizontal" enctype="multipart/form-data">
												<div class="form-group">
													<label class="col-sm-2 control-label">Vehicle Title<span
															style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="vehicletitle" class="form-control"
															required>
													</div>
													<label class="col-sm-2 control-label">Select Brand<span
															style="color:red">*</span></label>
													<div class="col-sm-4">
														<select class="selectpicker" name="brandname" required>
															<option value=""> Select </option>
															<?php $ret = "select id,BrandName from tblbrands";
															$query = $dbh->prepare($ret);
															$query->execute();
															$results = $query->fetchAll(PDO::FETCH_OBJ);
															if ($query->rowCount() > 0) {
																foreach ($results as $result) {
																	?>
																	<option value="<?php echo htmlentities($result->id); ?>">
																		<?php echo htmlentities($result->BrandName); ?>
																	</option>
																<?php }
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
															required></textarea>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Price Per Day<span
															style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="priceperday" class="form-control" required>
													</div>
													<label class="col-sm-2 control-label">Select Fuel Type<span
															style="color:red">*</span></label>
													<div class="col-sm-4">
														<select class="selectpicker" name="fueltype" required>
															<option>Pilih Jenis Bahan Bakar</option>
															<option value="Bensin">Bensin</option>
															<option value="Pertalite">Pertalite</option>
															<option value="Pertamax">Pertamax</option>
															<option value="Pertamax Turbo">Pertamax Turbo</option>
															<option value="Solar">Solar</option>
														</select>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Vehicle Type<span
															style="color:red">*</span></label>
													<div class="col-sm-4">
														<select class="selectpicker" name="vehicletype" required
															onchange="showAccessories(this.value);">
															<option value="">Pilih Tipe Kendaraan</option>
															<option value="Mobil">Mobil</option>
															<option value="Motor">Motor</option>
														</select>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Model Year<span
															style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="modelyear" class="form-control" required>
													</div>
													<label class="col-sm-2 control-label">Seating Capacity<span
															style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="seatingcapacity" class="form-control"
															required>
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
														Image 1 <span style="color:red">*</span><input type="file"
															name="img1" required>
													</div>
													<div class="col-sm-4">
														Image 2<span style="color:red">*</span><input type="file"
															name="img2" required>
													</div>
													<div the="col-sm-4">
														Image 3<span style="color:red">*</span><input type="file"
															name="img3" required>
													</div>
												</div>


												<div class="form-group">
													<div class="col-sm-4">
														Image 4<span style="color:red">*</span><input type="file"
															name="img4" required>
													</div>
													<div class="col-sm-4">
														Image 5<input type="file" name="img5">
													</div>

												</div>
												<div class="hr-dashed"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Accessories</div>
										<div class="panel-body">
											<div id="accessories">
												<!-- Accessories will be loaded here based on the vehicle type selected -->
											</div>
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit" type="submit">Save
														changes</button>
												</div>
											</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Loading Scripts -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js"></script>
		<script>
			function showAccessories(vehicleType) {
				var accessoriesDiv = document.getElementById('accessories');
				accessoriesDiv.innerHTML = '';
				if (vehicleType === 'Motor') {
					accessoriesDiv.innerHTML = '<div class="row"><div class="col-sm-4"><div class="checkbox checkbox-inline"><input type="checkbox" id="helmet" name="accessories" value="Helmet"><label for="helmet">Helmet</label></div></div><div class="col-sm-4"><div class="checkbox checkbox-inline"><input type="checkbox" id="raincoat" name="accessories" value="Raincoat"><label for="raincoat">Raincoat</label></div></div><div class="col-sm-4"><div class="checkbox checkbox-inline"><input type="checkbox" id="securitylock" name="accessories" value="Security Lock"><label for="securitylock">Security Lock</label></div></div></div><div class="row"><div class="col-sm-4"><div class="checkbox checkbox-inline"><input type="checkbox" id="extrastorage" name="accessories" value="Extra Storage"><label for="extrastorage">Extra Storage</label></div></div><div class="col-sm-4"><div class="checkbox checkbox-inline"><input type="checkbox" id="handguard" name="accessories" value="Hand Guard"><label for="handguard">Hand Guard</label></div></div><div class="col-sm-4"><div class="checkbox checkbox-inline"><input type="checkbox" id="extramirrors" name="accessories" value="Extra Mirrors"><label for="extramirrors">Extra Mirrors</label></div></div></div><div class="row"><div class="col-sm-4"><div class="checkbox checkbox-inline"><input type="checkbox" id="engineguard" name="accessories" value="Engine Guard"><label for="engineguard">Engine Guard</label></div></div><div class="col-sm-4"><div class="checkbox checkbox-inline"><input type="checkbox" id="kneeguards" name="accessories" value="Knee Guards"><label for="kneeguards">Knee Guards</label></div></div><div class="col-sm-4"><div class="checkbox checkbox-inline"><input type="checkbox" id="elbowguards" name="accessories" value="Elbow Guards"><label for="elbowguards">Elbow Guards</label></div></div></div>';
				} else if (vehicleType === 'Mobil') {
					accessoriesDiv.innerHTML = '<div class="row"><div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="airconditioner" name="airconditioner" value="1"><label for="airconditioner"> Air Conditioner </label></div></div><div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="powerdoorlocks" name="powerdoorlocks" value="1"><label for="powerdoorlocks"> Power Door Locks </label></div></div><div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="antilockbrakingsys" name="antilockbrakingsys" value="1"><label for="antilockbrakingsys"> AntiLock Braking System </label></div></div><div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="brakeassist" name="brakeassist" value="1"><label for="brakeassist"> Brake Assist </label></div></div></div><div class="row"><div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="powersteering" name="powersteering" value="1"><label for="powersteering"> Power Steering </label></div></div><div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="driverairbag" name="driverairbag" value="1"><label for="driverairbag">Driver Airbag</label></div></div><div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="passengerairbag" name="passengerairbag" value="1"><label for="passengerairbag"> Passenger Airbag </label></div></div><div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="powerwindow" name="powerwindow" value="1"><label for="powerwindow"> Power Windows </label></div></div></div><div class="row"><div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="cdplayer" name="cdplayer" value="1"><label for="cdplayer"> CD Player </label></div></div><div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="centrallocking" name="centrallocking" value="1"><label for="centrallocking">Central Locking</label></div></div><div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="crashcensor" name="crashcensor" value="1"><label for="crashcensor"> Crash Sensor </label></div></div><div class="col-sm-3"><div class="checkbox checkbox-inline"><input type="checkbox" id="leatherseats" name="leatherseats" value="1"><label for="leatherseats"> Leather Seats </label></div></div></div>';
				}
			}
		</script>
	</body>

	</html>
<?php } ?>