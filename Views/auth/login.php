<?php
include('../../koneksi.php');

$signupSuccess = isset($_GET['signup']) && $_GET['signup'] === 'success';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../public/css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href="../../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <style>
        .invalid-feedback {
            color: #e3342f;
            font-size: 0.875em;
            margin-top: -15px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <?php if ($signupSuccess): ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
        <script>
            iziToast.success({
                title: 'Success',
                message: 'Signup berhasil! Silakan melakukan login.',
                position: 'topRight',
                timeout: 5000
            });
        </script>
    <?php endif; ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $errors = [];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email tidak valid';
        }

        if (empty($password)) {
            $errors['password'] = 'Password tidak boleh kosong';
        }

        if (empty($errors)) {
            $stmt = $conn->prepare('SELECT user_id, password, full_name FROM users WHERE email = ?');
            if ($stmt === false) {
                die('Prepare failed: ' . $conn->error);
            }
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($user_id, $hashed_password, $full_name);
                $stmt->fetch();
                if (password_verify($password, $hashed_password)) {
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['email'] = $email;
                    $_SESSION['full_name'] = $full_name;

                    header('Location: ' . PATH . '/Views/user/user_dashboard.php');
                    exit();
                } else {
                    echo '<p>Password salah</p>';
                }
            } else {
                $errors['email'] = 'Email tidak terdaftar';
            }
            $stmt->close();
        }
    } ?>

    <div class="container">
        <div class="banner-section">
            <img src="<?php echo PATH ?>/public/img/luffy_face.png" alt="Banner">
            <div class="text">Welcome to GOKGOK. The best rental places in East Java.</div>
        </div>
        <div class="form-section">
            <h2>Sign In</h2>
            <form id="login-form" action="" method="post">
                <div>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <?php if (!empty($errors['email'])): ?>
                        <span class="error invalid-feedback">
                            <?php echo $errors['email']; ?>
                        </span>
                    <?php endif; ?>
                </div>
                <div>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <?php if (!empty($errors['password'])): ?>
                        <span class="error invalid-feedback">
                            <?php echo $errors['password']; ?>
                        </span>
                    <?php endif; ?>
                </div>
                <button type="submit" class="signin">Sign In</button>
            </form>
            <p class="mb-1">
                <a href="#">Forgot Your Password?</a>
            </p>
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>
    </div>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

</body>

</html>
