<?php
session_start();
$isLoggedIn = isset($_SESSION['username']);
$role = $_SESSION['role'] ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hijrah Water</title>
  <link rel="stylesheet" href="css/index.css" />
</head>
<body>
  <nav class="navbar">
    <div class="logo">
      <img src="img/loginbg.jpg" alt="Hijrah Water Logo" class="logo-image" />
      <a class="name">Hijrah Water</a>
    </div>
    <div class="menu-icon" id="menu-icon">&#9776;</div>
    <ul class="nav-list" id="nav-list">
      <li><a href="pages/about.php">About Us</a></li>
      <li><a href="pages/contact.php">Contact Us</a></li>
      <?php if ($isLoggedIn): ?>
        <?php if ($role === 'admin'): ?>
          <li><a href="admin/produk.php">Admin Dashboard</a></li>
        <?php else: ?>
          <li><a href="user_dashboard.php">User Dashboard</a></li>
        <?php endif; ?>
        <li><a href="logout.php">Logout</a></li>
      <?php else: ?>
        <li><a href="admin/loginregister.php">Login</a></li>
      <?php endif; ?>
    </ul>
  </nav>

  <div class="content">
    <h1>Selamat datang di Hijrah Water!</h1>
    <p>Kami menyediakan layanan isi ulang air minum berkualitas dan terpercaya.</p>

    <?php if ($isLoggedIn): ?>
      <a href="<?php echo ($role === 'admin') ? 'admin/produk.php' : 'user_dashboard.php'; ?>" class="order-button">Pesan Sekarang</a>
    <?php else: ?>
      <button class="order-button" onclick="showLoginAlert()">Pesan Sekarang</button>
    <?php endif; ?>
  </div>

  <!-- SweetAlert2 Lokal -->
  <script src="js/sweetalert2.all.min.js"></script>
  <script>
    function showLoginAlert() {
      Swal.fire({
        title: 'Login Diperlukan',
        text: 'Silakan login terlebih dahulu untuk memesan.',
        icon: 'warning',
        confirmButtonText: 'Login Sekarang',
        customClass: {
          popup: 'my-swal',
          title: 'my-swal-title',
          htmlContainer: 'my-swal-text',
          confirmButton: 'my-swal-confirm',
        },
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'admin/loginregister.php';
        }
      });
    }
  </script>
</body>
</html>
