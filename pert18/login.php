<?php
// MODUL 16: Session start harus di atas
session_start();

// MODUL 18: Include custom function
include 'functions.php';

// MODUL 17: Header redirect handling
if(isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit;
}

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // MODUL 18: IF-ELSE yang bener + undefined variable handling
    if(empty($username) || empty($password)) {
        $_SESSION['error'] = "Username dan password harus diisi!";
    } else {
        // MODUL 18: Nested IF-ELSE
        if($username == "admin") {
            if($password == "123") {
                $_SESSION['user'] = $username;
                $_SESSION['login_time'] = time();
                header("Location: dashboard.php");
                exit;
            } else {
                $_SESSION['error'] = "Password salah!";
            }
        } else {
            $_SESSION['error'] = "Username tidak ditemukan!";
        }
    }
    header("Location: login.php");
    exit;
}

include '../templates/header.php';

?>

<div class="container">

    <h1>Login</h1>
    
    <?php if(isset($_SESSION['error'])): ?>
        <div class="popup error">
            <span class="close-btn" onclick="this.parentElement.remove()">×</span>
            <?php 
                echo $_SESSION['error']; 
                unset($_SESSION['error']);
            ?>
        </div>
    <?php endif; ?>
    
    <form method="post">
        <div class="form-group">
            <input type="text" name="username" placeholder="Username" value="admin">
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Password" value="123">
        </div>
        <button type="submit" name="login">Login</button>
    </form>
</div>

    <script>
        setTimeout(() => {
            document.querySelector('.popup')?.remove();
        }, 5000);
    </script>

<?php include '../templates/footer.php'; ?>