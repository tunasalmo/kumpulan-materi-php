<?php
session_start();

// PERIKSA SESSION - Modul 14
if(!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
include '../templates/header.php';
?>
    <div class="container">
        <h1>👤 Profile User</h1>
        
        <div class="profile-card">
            <h3>Data Session:</h3>
            <p><strong>Username:</strong> <?php echo $_SESSION['user']; ?></p>
            <p><strong>Role:</strong> <?php echo $_SESSION['role']; ?></p>
            <p><strong>Status:</strong> ✅ Logged In (Session Active)</p>
        </div>
        
        <div style="margin: 20px 0;">
            <p>Halaman ini hanya bisa diakses jika memiliki session login yang valid.</p>
            <p>Coba akses halaman ini langsung tanpa login - akan diredirect ke login page.</p>
        </div>
        
        <div class="menu">
            <a href="dashboard.php">← Back to Dashboard</a>
            <a href="logout.php">🚪 Logout</a>
        </div>
    </div>

<?php include '../templates/footer.php'; ?>