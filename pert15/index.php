<?php 
$judul = "Pertemuan 15 - Cookies in PHP";
include "../templates/header.php"; 
?>

    <div class="container">
        <?php
        // NOTE: To set a cookie from PHP you MUST call setcookie() before any output
        // (i.e., before include "../templates/header.php").
        // Example (place at top of the script):
        // setcookie('user', 'Budi', time() + 3600, '/'); // valid 1 hour
        // To delete from PHP: setcookie('user', '', time() - 3600, '/');

        if (isset($_COOKIE['user'])) {
            $user = htmlspecialchars($_COOKIE['user'], ENT_QUOTES, 'UTF-8');
            echo "<h2>Welcome " . $user . "</h2>";
            echo '<p>Cookie Information:</p>';
            echo '<ul>';
            echo '<li><strong>Username:</strong> ' . $user . '</li>';
            echo '<li><strong>Set Time:</strong> ' . date('d-M-Y H:i:s') . '</li>';
            echo '<li><strong>Expires In:</strong> 1 hour</li>';
            echo '<li><strong>Cookie Path:</strong> /</li>';
            echo '</ul>';
            echo '<button id="deleteCookie">Logout (delete cookie)</button>';
        } else {
            echo '<h2>Welcome Guest!</h2>';
            echo '<label>Set name: <input type="text" id="cookieName" value="Budi"></label> ';
            echo '<button id="setCookie">Set Cookie</button>';
        }
        ?>

        <script>
        // Client-side cookie helpers (useful when you can't call setcookie() because output already started)
        document.addEventListener('click', function (e) {
            if (e.target.id === 'setCookie') {
                var name = document.getElementById('cookieName').value || 'Guest';
                // set cookie for 1 hour
                document.cookie = 'user=' + encodeURIComponent(name) + '; path=/; max-age=' + (60*60);
                location.reload();
            }
            if (e.target.id === 'deleteCookie') {
                // delete cookie
                document.cookie = 'user=; path=/; max-age=0';
                location.reload();
            }
        });
        </script>
    </div>


<?php include "../templates/footer.php"; ?>
