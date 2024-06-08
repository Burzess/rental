<?php
include ('../../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $full_name = $_POST['full_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $errors = [];

    if (empty($username)) {
        $errors['username'] = 'Username tidak boleh kosong';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email tidak valid';
    }

    if (empty($password)) {
        $errors['password'] = 'Password tidak boleh kosong';
    }

    if (empty($full_name)) {
        $errors['full_name'] = 'Nama lengkap tidak boleh kosong';
    }

    if (empty($phone)) {
        $errors['phone'] = 'Nomor telepon tidak boleh kosong';
    }

    if (empty($errors)) {
        $stmt = $conn->prepare('SELECT email FROM users WHERE email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $errors['email'] = 'Email sudah terdaftar';
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare('INSERT INTO users (username, password, full_name, email, phone, created_at) VALUES (?, ?, ?, ?, ?, NOW())');
            $stmt->bind_param('sssss', $username, $hashed_password, $full_name, $email, $phone);

            if ($stmt->execute()) {
                header('Location: login.php?signup=success');
                exit();
            } else {
                echo '<p>Terjadi kesalahan. Silakan coba lagi.</p>';
            }
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../../public/css/login.css">
    <style>
        .invalid-feedback {
            color: #e3342f;
            font-size: 0.875em;
            margin-top: -15px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="banner-section">
            <img src="../img/navigation.svg" alt="Banner">
            <div class="text">Welcome to GOKGOK. The best rental places in East Java.</div>
        </div>
        <div class="form-section">
            <h2>Sign Up</h2>
            <form id="signup-form" action="" method="post">
                <div class="input">
                    <input type="text" id="username" name="username" placeholder="Username">
                    <?php if (!empty($errors['username'])): ?>
                        <span class="invalid-feedback">
                            <?php echo $errors['username']; ?>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="input">
                    <input type="password" id="password" name="password" placeholder="Password">
                    <?php if (!empty($errors['password'])): ?>
                        <span class="invalid-feedback">
                            <?php echo $errors['password']; ?>
                        </span>
                    <?php endif; ?>
                    </div>
                    <div class="inpu">
                    <input type="text" id="full_name" name="full_name" placeholder="Full Name">
                    <?php if (!empty($errors['full_name'])): ?>
                        <span class="invalid-feedback">
                            <?php echo $errors['full_name']; ?>
                        </span>
                    <?php endif; ?>
                    </div>
                    <div class="input">
                    <input type="email" id="email" name="email" placeholder="Email">
                    <?php if (!empty($errors['email'])): ?>
                        <span class="invalid-feedback">
                            <?php echo $errors['email']; ?>
                        </span>
                    <?php endif; ?>
                    </div>
                    <div class="input">
                    <input type="text" id="phone" name="phone" placeholder="Phone">
                    <?php if (!empty($errors['phone'])): ?>
                        <span class="invalid-feedback">
                            <?php echo $errors['phone']; ?>
                        </span>
                    <?php endif; ?>
                    </div>
                    <button type="submit" class="signup">Sign Up</button>
            </form>
            <p>Already have an account? <a href="login.php">Sign In</a></p>
        </div>
    </div>

</body>
</html>