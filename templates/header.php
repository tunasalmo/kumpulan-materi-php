<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tugas-kecil/style.css">
    <link rel="icon" type="image/x-icon" href="/tugas-kecil/templates/favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=menu" />
    <title>Tugas Kecil Pemro 2</title>
</head>
<body>
    <nav>
        <button class="sidebar-btn" id="sidebar-btn"><span class="material-symbols-outlined">menu</span></button>
        <a href="/tugas-kecil/index.php">Home</a>
        <a href="/tugas-kecil/index.php">Daftar Pertemuan</a>
    </nav>
    <div class="sidebar" id="nav-menu">
        <button class="close-sidebar" id="close-sidebar"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></button>
        <ul>
            <li><a href="/tugas-kecil/index.php">Home</a></li>
            <li><a href="/tugas-kecil/pert1/index.php">Pertemuan 1</a></li>
            <li><a href="/tugas-kecil/pert2/index.php">Pertemuan 2</a></li>
            <li><a href="/tugas-kecil/pert3/index.php">Pertemuan 3</a></li>
            <li><a href="/tugas-kecil/pert4/index.php">Pertemuan 4</a></li>
            <li><a href="/tugas-kecil/pert5/index.php">Pertemuan 5</a></li>
            <li><a href="/tugas-kecil/pert6/index.php">Pertemuan 6</a></li>
            <li><a href="/tugas-kecil/pert7/index.php">Pertemuan 7</a></li>
            <li><a href="/tugas-kecil/pert8/index.php">Pertemuan 8</a></li>
            <li><a href="/tugas-kecil/pert9/index.php">Pertemuan 9</a></li>
            <!-- <li><a hrtugas-kecil/ef="pert10/index.php">Pertemuan 10 - MVC Pattern</a></li>
            <li><a href="ptugas-kecil/ert11/index.php">Pertemuan 11 - Operasi Database 2</a></li>
            <li><a href="ptugas-kecil/ert12/index.php">Pertemuan 12 - Manipulasi Database</a></li> -->
            <li><a href="/tugas-kecil/pert12/index.php">Pertemuan 10, 11, 12, 13</a></li>
            <li><a href="/tugas-kecil/pert14/index.php">Pertemuan 14</a></li>
            <li><a href="/tugas-kecil/pert15/index.php">Pertemuan 15</a></li>
            <!-- <li><a h/tugas-kecil/ref="pert16/index.php">Pertemuan 16 - Error Handling</a></li>
            <li><a href="/tugas-kecil/pert17/index.php">Pertemuan 17 - API Integration</a></li> -->
            <li><a href="/tugas-kecil/pert18/login.php">Pertemuan 16, 17, 18</a></li>
        </ul>
    </div>

    <div class="sidebar-backdrop" id="sidebar-backdrop"></div>


    <script>
        // elemen
        const sidebarBtn = document.getElementById('sidebar-btn');
        const navMenu = document.getElementById('nav-menu');
        const backdrop = document.getElementById('sidebar-backdrop');
        const closeSidebarBtn = document.getElementById('close-sidebar');

        // tutup sidebar
        closeSidebarBtn.addEventListener('click', () => {
            navMenu.classList.remove('active');
            backdrop.classList.remove('active');
        });

        // buka / tutup sidebar
        sidebarBtn.addEventListener('click', (event) => {
            event.stopPropagation();
            navMenu.classList.toggle('active');
            backdrop.classList.toggle('active');
        });

        // klik blankspace → tutup sidebar
        backdrop.addEventListener('click', () => {
            navMenu.classList.remove('active');
            backdrop.classList.remove('active');
        });

        // jika klik bagian luar sidebar → tutup
        document.addEventListener('click', (event) => {
            if (!navMenu.contains(event.target) && !sidebarBtn.contains(event.target)) {
                navMenu.classList.remove('active');
                backdrop.classList.remove('active');
            }
        });
    </script>

    <main>