<?php
// templates/pages/beranda.php
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$where_clause = "WHERE a.status_publikasi = 'publikasi'";

if (!empty($search)) {
    $where_clause .= " AND (a.judul LIKE '%$search%' OR a.konten_karya LIKE '%$search%')";
}

$query = "SELECT a.*, k.nama_kategori, p.nama_lengkap 
          FROM t_artikel a
          JOIN m_kategori k ON a.id_kategori = k.id_kategori
          JOIN m_pengguna p ON a.id_penulis = p.id_pengguna
          $where_clause
          ORDER BY a.diterbitkan_pada DESC";
$result = mysqli_query($conn, $query);
?>

<div class="container my-5">
    <div class="row g-4">
        <!-- Kolom Utama Konten (Kiri) -->
        <div class="col-lg-8">
            <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom border-secondary-subtle">
                <h3 class="fw-bold text-uppercase m-0" style="font-size: 1.25rem; letter-spacing: 0.05em; color: var(--color-forest);">
                    ✨ Karya Terbaru
                </h3>
                <?php if (!empty($search)): ?>
                    <span class="badge text-bg-light border px-3 py-2 rounded-pill">
                        Hasil pencarian: "<?= htmlspecialchars($search); ?>"
                    </span>
                <?php endif; ?>
            </div>
            
            <?php if (mysqli_num_rows($result) > 0): ?>
                <div class="d-flex flex-column gap-4">
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <article class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white article-card p-3">
                            <div class="row g-3 align-items-center">
                                <!-- Bagian Gambar Thumbnail -->
                                <div class="col-md-4">
                                    <div class="article-img-wrapper position-relative overflow-hidden rounded-3" style="height: 180px;">
                                        <img src="https://images.unsplash.com/photo-1590001155093-a3c66ab0c3ff?q=80&w=400&auto=format&fit=crop" 
                                             class="w-100 h-100 object-fit-cover img-fluid" 
                                             alt="<?= htmlspecialchars($row['judul']); ?>">
                                    </div>
                                </div>
                                
                                <!-- Bagian Detail Teks Konten -->
                                <div class="col-md-8">
                                    <div class="card-body p-0 ps-md-2">
                                        <span class="category-badge mb-2 d-inline-block px-2 py-1 text-uppercase fw-bold rounded-pill" style="font-size: 0.7rem;">
                                            <?= htmlspecialchars($row['nama_kategori']); ?>
                                        </span>
                                        
                                        <h4 class="card-title my-1 fw-bold" style="font-family: var(--font-serif); line-height: 1.4;">
                                            <a href="index.php?page=detail-artikel&slug=<?= $row['slug_artikel'] ?? ''; ?>" class="text-decoration-none article-title text-dark-emphasis link-success">
                                                <?= htmlspecialchars($row['judul']); ?>
                                            </a>
                                        </h4>
                                        
                                        <div class="d-flex flex-wrap gap-2 align-items-center small text-muted mb-2" style="font-size: 0.8rem;">
                                            <span>Oleh <strong class="text-dark-emphasis"><?= htmlspecialchars($row['nama_lengkap']); ?></strong></span>
                                            <span>•</span>
                                            <span><?= date('d M Y', strtotime($row['diterbitkan_pada'])); ?></span>
                                        </div>
                                        
                                        <p class="card-text text-secondary small mb-3 text-truncate-3" style="line-height: 1.6;">
                                            <?= htmlspecialchars($row['kutipan']); ?>
                                        </p>
                                        
                                        <a href="index.php?page=detail-artikel&slug=<?= $row['slug_artikel'] ?? ''; ?>" class="btn btn-link btn-sm p-0 fw-bold text-uppercase read-more-link" style="font-size: 0.8rem; letter-spacing: 0.05em;">
                                            Baca Karya Seutuhnya ➔
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <!-- Tampilan Alert Kosong yang Menarik -->
                <div class="card border-0 shadow-sm rounded-4 text-center py-5 px-4 bg-white">
                    <div class="mb-3 fs-1 text-muted">📭</div>
                    <h5 class="fw-bold text-secondary">Belum ada karya sastra yang ditemukan</h5>
                    <p class="text-muted small mb-0 mx-auto" style="max-width: 400px;">
                        Silakan periksa kembali kata kunci pencarian Anda atau kembali ke halaman utama untuk melihat pembaruan karya terbaru.
                    </p>
                    <?php if (!empty($search)): ?>
                        <div class="mt-3">
                            <a href="index.php?page=beranda" class="btn btn-sm text-white px-4 rounded-pill shadow-sm" style="background-color: var(--color-forest);">
                                Kembali ke Beranda
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Kolom Kanan Sidebar -->
        <div class="col-lg-4">
            <div class="position-sticky" style="top: 90px;">
                <?php include 'templates/pages/sidebar-default.php'; ?>
            </div>
        </div>
    </div>
</div>