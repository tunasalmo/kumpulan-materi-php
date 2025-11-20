<?php
// MODUL 16: Session start
session_start();

// MODUL 17: Header redirect kalo belum login
if(!isset($_SESSION['user'])) {
    $_SESSION['error'] = "Anda harus login dulu!";
    header("Location: login.php");
    exit;
}

// MODUL 18: Hitung waktu login
$login_duration = time() - $_SESSION['login_time'];

include '../templates/header.php';
?>

<div class="container">

    <h1>Welcome, <?php echo $_SESSION['user']; ?>!</h1>
    
    <?php if(isset($_SESSION['error'])): ?>
        <div class="popup error">
            <span class="close-btn" onclick="this.parentElement.remove()">×</span>
            <?php 
                echo $_SESSION['error']; 
                unset($_SESSION['error']);
            ?>
        </div>
    <?php endif; ?>
    
    <div class="popup info">
        Anda sudah login selama: <span id="login-duration">00:00:00</span>
    </div>

    <script>
        let loginDuration = <?php echo $login_duration; ?>;
        
        function updateLoginDuration() {
            loginDuration++;
            const hours = Math.floor(loginDuration / 3600);
            const minutes = Math.floor((loginDuration % 3600) / 60);
            const seconds = loginDuration % 60;
            
            const formatted = 
                String(hours).padStart(2, '0') + ':' +
                String(minutes).padStart(2, '0') + ':' +
                String(seconds).padStart(2, '0');
            
            document.getElementById('login-duration').textContent = formatted;
        }
        
        updateLoginDuration();
        setInterval(updateLoginDuration, 1000);
    </script>
    
    <div class="menu">
        <a href="profile.php">📝 Edit Profile</a>
        <a href="upload.php">📁 Upload File</a>
        <a href="logout.php">🚪 Logout</a>
    </div>
</div>
<script>
    setTimeout(() => {
        document.querySelector('.popup.error')?.remove();
    }, 5000);
</script>

<?php include '../templates/footer.php'; ?>