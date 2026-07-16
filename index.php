<?php
// index.php
require_once 'config/database.php';

// Ambil parameter halaman, default ke 'beranda'
$page = isset($_GET['page']) ? $_GET['page'] : 'beranda';

// Daftar halaman yang diizinkan agar aman
$allowed_pages = [
    'beranda', 'cerpen', 'puisi', 'cerita-rakyat', 'nyanyian-rakyat', 
    'esai', 'wawancara', 'cerita-anak', 'pojok-baca', 'toko-buku', 'info-literasi'
];

if (!in_array($page, $allowed_pages)) {
    $page = 'beranda';
}

// Load View Header
include 'templates/header.php'; 

// Load Konten Dinamis
$file_path = "templates/pages/" . $page . ".php";
if (file_exists($file_path)) {
    include $file_path;
} else {
    echo "<div class='container my-5 py-5 text-center'><div class='alert alert-danger d-inline-block'>Halaman konten tidak ditemukan.</div></div>";
}

// Load View Footer
include 'templates/footer.php';
?>