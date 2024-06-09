<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<link rel="stylesheet" href="../../public/css/user_dashboard.css">

<div class="navigation">
    <div class="profil">
        <div class="user-avatar">A</div>
        <p><?php echo htmlspecialchars($_SESSION['full_name'] ?? ''); ?></p>
        <div class="user-email"><?php echo htmlspecialchars($_SESSION['email']); ?></div>
    </div>
    <a href="user_dashboard.php" class="nav-link <?php echo $current_page == 'user_dashboard.php' ? 'nav-link-dashboard' : ''; ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a href="my_profil.php" class="nav-link <?php echo $current_page == 'my_profil.php' ? 'nav-link-dashboard' : ''; ?>"><i class="fas fa-user"></i> My Profile</a>
    <a href="#" class="nav-link <?php echo $current_page == 'my_order.php' ? 'nav-link-dashboard' : ''; ?>"><i class="fas fa-clipboard-list"></i> My Order</a>
    <a href="./auth/logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
</div>
