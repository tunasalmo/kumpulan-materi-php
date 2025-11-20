<?php
// MODUL 16 & 17
session_start();
include 'functions.php';

if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// MODUL 18: Handling undefined variable + IF-ELSE
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';

if(isset($_POST['update'])) {
    // MODUL 18: Validasi nested IF-ELSE
    if(empty($nama)) {
        $_SESSION['error'] = "Nama tidak boleh kosong!";
    } else {
        $emailValidation = validateEmail($email); // MODUL 18: Pake custom function
        
        if($emailValidation !== true) {
            $_SESSION['error'] = $emailValidation;
        } elseif(strlen($nama) < 3) {
            $_SESSION['error'] = "Nama minimal 3 karakter!";
        } else {
            $_SESSION['success'] = "Profile berhasil diupdate!";
            $_SESSION['user_data'] = ['nama' => $nama, 'email' => $email];
        }
    }
    header("Location: profile.php");
    exit;
}

include '../templates/header.php';
?>

<div class="container">

    <body>
        <h1>Edit Profile</h1>
        
        <?php if(isset($_SESSION['error'])): ?>
            <div class="popup error">
                <span class="close-btn" onclick="this.parentElement.remove()">×</span>
                <?php 
                    echo $_SESSION['error']; 
                    unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>
        
        <?php if(isset($_SESSION['success'])): ?>
            <div class="popup success">
                <span class="close-btn" onclick="this.parentElement.remove()">×</span>
                <?php 
                    echo $_SESSION['success']; 
                    unset($_SESSION['success']);
                ?>
            </div>
        <?php endif; ?>
        
        <form method="post">
            <div class="form-group">
                <input type="text" name="nama" placeholder="Nama Lengkap" 
                       value="<?php echo isset($_SESSION['user_data']['nama']) ? $_SESSION['user_data']['nama'] : ''; ?>">
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email"
                       value="<?php echo isset($_SESSION['user_data']['email']) ? $_SESSION['user_data']['email'] : ''; ?>">
            </div>
            <button type="submit" name="update">Update Profile</button>
        </form>
        
        <br>
        <a href="dashboard.php">← Back to Dashboard</a>
</div>

    
<?php include '../templates/footer.php'; ?>