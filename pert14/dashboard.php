<?php
session_start();

// PERIKSA SESSION - Modul 14
if(!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$login_duration = time() - $_SESSION['login_time'];

include '../templates/header.php';
?>
    <div class="container">
        <div class="header">
            <h1>🏠 Dashboard</h1>
            <p>Halo, <strong><?php echo $_SESSION['user']; ?></strong>! Selamat datang di halaman terproteksi.</p>
        </div>
        
        <div class="session-info">
            <h3>📊 Info Session:</h3>
            <p><strong>Username:</strong> <?php echo $_SESSION['user']; ?></p>
            <p><strong>Role:</strong> <?php echo $_SESSION['role']; ?></p>
            <p><strong>Login Time:</strong> <?php echo date('H:i:s', $_SESSION['login_time']); ?></p>
            <p><strong>Duration:</strong> <?php echo gmdate("H:i:s", $login_duration); ?></p>
            <p><strong>Session ID:</strong> <?php echo session_id(); ?></p>
        </div>
        
        <div class="menu">
            <a href="profile.php">👤 Profile</a>
            <?php if($_SESSION['role'] == 'admin'): ?>
                <a href="admin.php">⚙️ Admin Panel</a>
            <?php endif; ?>
            <a href="logout.php">🚪 Logout</a>
        </div>
        
        <div style="margin-top: 30px; padding: 15px; background: #fff3cd; border-radius: 5px;">
            <h3>🎯 Konsep Session yang Dipraktikkan:</h3>
            <ul>
                <li><strong>Pembuatan Session:</strong> $_SESSION['user'] = $user</li>
                <li><strong>Pemeriksaan Session:</strong> if(isset($_SESSION['user']))</li>
                <li><strong>Redirect jika belum login:</strong> header("Location: index.php")</li>
                <li><strong>Session Role-based:</strong> Admin vs User biasa</li>
            </ul>
        </div>
    </div>
<?php include '../templates/footer.php'; ?>