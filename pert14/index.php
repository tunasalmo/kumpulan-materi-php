<?php
session_start();

// Redirect kalo udah login
if(isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit;
}

// Proses login
if(isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    
    // Validasi login sederhana
    $users = [
        'rahadian' => '123',
        'admin' => 'admin123',
        'user' => 'user123'
    ];
    
    if(isset($users[$user]) && $users[$user] == $pass) {
        // BUAT SESSION - Modul 14
        $_SESSION['user'] = $user;
        $_SESSION['login_time'] = time();
        $_SESSION['role'] = ($user == 'admin') ? 'admin' : 'user';
        
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
include '../templates/header.php';
?>
    <div class="container">
        <h1>Login Session</h1>
        
        <?php if(isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <div class="user-list">
            <strong>Test Account:</strong><br>
            • rahadian / 123<br>
            • admin / admin123<br>
            • user / user123
        </div>
        
        <form method="post">
            <div class="form-group">
                <input type="text" name="user" placeholder="Username" value="rahadian" required>
            </div>
            <div class="form-group">
                <input type="password" name="pass" placeholder="Password" value="123" required>
            </div>
            <button type="submit" name="login">Login</button>
        </form>
        
        <div style="margin-top: 20px;">
            <small>Contoh Session: Login → Buat Session → Akses Halaman Terproteksi</small>
        </div>
    </div>

<?php include '../templates/footer.php'; ?>