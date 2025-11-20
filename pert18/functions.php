<?php
// MODUL 18: Custom function biar ga error "Call to undefined function"
function validateEmail($email) {
    if(empty($email)) {
        return "Email tidak boleh kosong!";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Format email tidak valid!";
    } else {
        return true;
    }
}

function formatSize($bytes) {
    // MODUL 18: Handling undefined variable
    if($bytes == 0) return "0 Bytes";
    $sizes = ['Bytes', 'KB', 'MB', 'GB'];
    $i = floor(log($bytes, 1024));
    return round($bytes / pow(1024, $i), 2) . ' ' . $sizes[$i];
}
?>