<?php
session_start();

// PENGHAPUSAN SESSION - Modul 14
if(isset($_SESSION['user'])) {
    // Unset semua session variables
    $_SESSION = array();
    
    // Hapus session cookie
    if(ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    
    // Hancurkan session
    session_destroy();
}
include '../templates/header.php';
?>
    <div class="container">
        <div class="success">
            <h1>✅ Logout Berhasil!</h1>
            <p>Session Anda telah dihapus dari server.</p>
        </div>
        
        <div style="margin: 30px 0;">
            <h3>📝 Proses Penghapusan Session:</h3>
            <ol style="text-align: left; display: inline-block;">
                <li>Unset semua variabel session → $_SESSION = array()</li>
                <li>Hapus session cookie dari browser</li>
                <li>Destroy session → session_destroy()</li>
            </ol>
        </div>
        
        <div>
            <a href="index.php" class="btn">🔐 Login Kembali</a>
            <a href="dashboard.php" class="btn" style="background: #6c757d;">🚫 Coba Akses Dashboard (akan diredirect)</a>
        </div>
    </div>

<?php include '../templates/footer.php'; ?>