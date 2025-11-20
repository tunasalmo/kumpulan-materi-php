<?php
session_start();

// PERIKSA SESSION + ROLE - Modul 14
if(!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

// CEK ROLE ADMIN
if($_SESSION['role'] != 'admin') {
    die("<h1>❌ Access Denied!</h1><p>Halaman ini hanya untuk admin.</p><a href='dashboard.php'>Back to Dashboard</a>");
}
include '../templates/header.php';
?>
    <div class="container">
        <div class="admin-panel">
            <h1>⚙️ Admin Panel</h1>
            <p>Halo <strong><?php echo $_SESSION['user']; ?></strong>, Anda login sebagai <strong>Administrator</strong></p>
        </div>
        
        <div style="margin: 20px 0;">
            <h3>Fitur Admin:</h3>
            <ul>
                <li>Manage Users</li>
                <li>System Settings</li>
                <li>View Logs</li>
            </ul>
        </div>
        
        <p><strong>Konsep:</strong> Role-based access control menggunakan session.</p>
        <p>Coba login dengan user biasa (bukan admin) tidak bisa akses halaman ini.</p>
        
        <div style="margin-top: 20px;">
            <a href="dashboard.php">← Back to Dashboard</a>
            <a href="logout.php">🚪 Logout</a>
        </div>
    </div>
<?php include '../templates/footer.php'; ?>