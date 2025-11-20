<?php
// MODUL 16 & 17
session_start();
include 'functions.php';

if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// MODUL 18: File upload handling
if(isset($_POST['upload'])) {
    $file = $_FILES['file'];
    
    // MODUL 18: Cek error upload
    if($file['error'] !== UPLOAD_ERR_OK) {
        $_SESSION['error'] = "Error upload file: " . $file['error'];
    } 
    // MODUL 18: Cek file size (max 2MB)
    elseif($file['size'] > 2 * 1024 * 1024) {
        $_SESSION['error'] = "File terlalu besar! Maksimal 2MB. File Anda: " . formatSize($file['size']);
    }
    // MODUL 18: Cek file type
    elseif(!in_array($file['type'], ['image/jpeg', 'image/png', 'application/pdf'])) {
        $_SESSION['error'] = "Hanya file JPG, PNG, dan PDF yang diizinkan!";
    }
    else {
        $upload_dir = "uploads/";
        // MODUL 18: Buat folder kalo belum ada
        if(!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $filename = time() . "_" . $file['name'];
        if(move_uploaded_file($file['tmp_name'], $upload_dir . $filename)) {
            $_SESSION['success'] = "File berhasil diupload: " . $filename . " (" . formatSize($file['size']) . ")";
        } else {
            $_SESSION['error'] = "Gagal menyimpan file!";
        }
    }
    header("Location: upload.php");
    exit;
}
include '../templates/header.php';
?>
<div class="container">

    <h1>Upload File</h1>
    
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
    
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="file" name="file" required>
        </div>
        <div class="form-group">
            <small>Max file size: 2MB | Allowed: JPG, PNG, PDF</small>
        </div>
        <button type="submit" name="upload">Upload File</button>
    </form>
    
    <br>
    <a href="dashboard.php">← Back to Dashboard</a>

    
</div>
<?php include '../templates/footer.php'; ?>