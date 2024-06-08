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
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../public/css/navbar.css">
    <link href="../../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <?php include '../component/navbar.php'; ?>

    <div class="dashboard">
        <?php include "./../component/user/dashboard.php"; ?>

        <div class="detail-profil container mt-5">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Masukkan Username">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Alamat Email</label>
                        <input type='email' class='form-control' id='email' placeholder='Masukkan Email'>
                    </div>
                </div>

                <div class='form-row'>
                    <div class='form-group col-md-6'>
                        <label for='password'>Kata Sandi Baru</label>
                        <input type='password' class='form-control' id='password' placeholder=''>
                    </div>

                    <div class='form-group col-md-6'>
                        <label for='reenter-password'>Re-enter Password</label>
                        <input type='password' class='form-control' id='reenter-password' placeholder=''>
                    </div>
                </div>

                <div class='form-row update'>
                    <div class='form-group col-md-12'>
                        <button type="submit" class="btn btn-primary">Perbarui Profil</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php require '../component/footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>

</html>