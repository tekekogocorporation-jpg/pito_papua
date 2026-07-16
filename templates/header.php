<?php
// Pastikan variabel $page terdefinisi jika file ini dibaca mandiri oleh editor/sistem
if (!isset($page)) {
    $page = 'beranda';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
...

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pito Papua - Media Pengembangan Sastra dan Budaya Papua</title>
    
    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts Premium -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Merriweather:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Link Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom sticky-top shadow-sm py-3">
    <div class="container">
        <!-- BRAND LOGO (Terintegrasi Rapi di Kiri) -->
        <a class="navbar-brand d-flex align-items-center me-lg-4" href="index.php?page=beranda">
            <span class="brand-icon me-2 fs-2">🌴</span>
            <div class="brand-text-wrapper d-flex flex-column">
                <span class="brand-title fw-bold fs-5">Pito <span class="text-warning">Papua</span></span>
                <span class="brand-subtitle d-none d-sm-block text-muted text-uppercase fw-semibold" style="font-size: 0.65rem; letter-spacing: 0.05em;">Media Sastra & Budaya</span>
            </div>
        </a>

        <!-- Tombol Toggler untuk HP Modern -->
        <button class="navbar-toggler border-0 p-2 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- MENU UTAMA (Rata Kanan) -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-lg-center gap-1 mt-3 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link px-3 py-2 rounded-pill fw-medium <?= ($page == 'beranda') ? 'active text-success' : 'text-dark-emphasis' ?>" href="index.php?page=beranda">Beranda</a>
                </li>
                
                <!-- Dropdown Para-para Karya -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3 py-2 rounded-pill fw-medium <?= in_array($page, ['cerpen', 'puisi']) ? 'active text-success' : 'text-dark-emphasis' ?>" href="#" id="dropKarya" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Para-para Karya
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow mt-2 p-2 rounded-3" aria-labelledby="dropKarya">
                        <li><a class="dropdown-item rounded-2 py-2 <?= ($page == 'cerpen') ? 'active bg-success text-white' : '' ?>" href="index.php?page=cerpen">Cerpen</a></li>
                        <li><a class="dropdown-item rounded-2 py-2 <?= ($page == 'puisi') ? 'active bg-success text-white' : '' ?>" href="index.php?page=puisi">Puisi</a></li>
                    </ul>
                </li>
                
                <!-- Dropdown Para-para Tradisi -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3 py-2 rounded-pill fw-medium <?= in_array($page, ['cerita-rakyat', 'nyanyian-rakyat']) ? 'active text-success' : 'text-dark-emphasis' ?>" href="#" id="dropTradisi" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Para-para Tradisi
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow mt-2 p-2 rounded-3" aria-labelledby="dropTradisi">
                        <li><a class="dropdown-item rounded-2 py-2 <?= ($page == 'cerita-rakyat') ? 'active bg-success text-white' : '' ?>" href="index.php?page=cerita-rakyat">Cerita Rakyat</a></li>
                        <li><a class="dropdown-item rounded-2 py-2 <?= ($page == 'nyanyian-rakyat') ? 'active bg-success text-white' : '' ?>" href="index.php?page=nyanyian-rakyat">Nyanyian Rakyat</a></li>
                    </ul>
                </li>
                
                <!-- Dropdown Para-para Bicara -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3 py-2 rounded-pill fw-medium <?= in_array($page, ['esai', 'wawancara']) ? 'active text-success' : 'text-dark-emphasis' ?>" href="#" id="dropBicara" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Para-para Bicara
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow mt-2 p-2 rounded-3" aria-labelledby="dropBicara">
                        <li><a class="dropdown-item rounded-2 py-2 <?= ($page == 'esai') ? 'active bg-success text-white' : '' ?>" href="index.php?page=esai">Esai</a></li>
                        <li><a class="dropdown-item rounded-2 py-2 <?= ($page == 'wawancara') ? 'active bg-success text-white' : '' ?>" href="index.php?page=wawancara">Wawancara</a></li>
                    </ul>
                </li>
                
                <!-- Dropdown Para-para Anak -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3 py-2 rounded-pill fw-medium <?= in_array($page, ['cerita-anak', 'pojok-baca']) ? 'active text-success' : 'text-dark-emphasis' ?>" href="#" id="dropAnak" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Para-para Anak
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow mt-2 p-2 rounded-3" aria-labelledby="dropAnak">
                        <li><a class="dropdown-item rounded-2 py-2 <?= ($page == 'cerita-anak') ? 'active bg-success text-white' : '' ?>" href="index.php?page=cerita-anak">Cerita Anak</a></li>
                        <li><a class="dropdown-item rounded-2 py-2 <?= ($page == 'pojok-baca') ? 'active bg-success text-white' : '' ?>" href="index.php?page=pojok-baca">Pojok Baca</a></li>
                    </ul>
                </li>
                
                <!-- Dropdown Para-para Buku -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3 py-2 rounded-pill fw-medium <?= in_array($page, ['toko-buku', 'info-literasi']) ? 'active text-success' : 'text-dark-emphasis' ?>" href="#" id="dropBuku" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Para-para Buku
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow mt-2 p-2 rounded-3" aria-labelledby="dropBuku">
                        <li><a class="dropdown-item rounded-2 py-2 <?= ($page == 'toko-buku') ? 'active bg-success text-white' : '' ?>" href="index.php?page=toko-buku">Toko Buku</a></li>
                        <li><a class="dropdown-item rounded-2 py-2 <?= ($page == 'info-literasi') ? 'active bg-success text-white' : '' ?>" href="index.php?page=info-literasi">Info Literasi</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>