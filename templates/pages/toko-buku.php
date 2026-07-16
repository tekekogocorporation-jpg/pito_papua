<?php
// templates/pages/toko-buku.php
$query = "SELECT * FROM t_buku ORDER BY id_buku DESC";
$result = mysqli_query($conn, $query);
?>
<div class="container my-5">
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="sidebar-box border-0 shadow-sm rounded-4 p-4 bg-white">
                <span class="category-badge">Katalog Pito</span>
                <h2 class="fw-bold mb-3">Para-para Buku Sastra</h2>
                <p class="text-muted small">Dukung keberlanjutan karya dengan membeli buku cetak original berlisensi karya anak negeri.</p>
                <hr>
                
                <div class="row g-3">
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while ($buku = mysqli_fetch_assoc($result)): ?>
                            <div class="col-sm-6">
                                <div class="p-4 border rounded-4 text-center bg-white shadow-sm h-100 d-flex flex-column justify-content-between">
                                    <div>
                                        <h5 class="fw-bold mb-1"><?= htmlspecialchars($buku['judul_buku']); ?></h5>
                                        <p class="small text-muted mb-2">Penulis: <?= htmlspecialchars($buku['penulis_buku']); ?></p>
                                        <span class="badge mb-3 py-2 px-3 fs-6" style="background-color: var(--color-sunset-orange);">Rp <?= number_format($buku['harga'], 0, ',', '.'); ?></span>
                                    </div>
                                    <a href="<?= htmlspecialchars($buku['tautan_wa']); ?>" target="_blank" class="btn text-white w-100 fw-semibold" style="background-color: var(--color-forest); border-radius: 8px;">Pesan Via WhatsApp</a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p class="text-muted text-center w-100 py-3">Stok katalog cetak kosong.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <?php include 'templates/pages/sidebar-default.php'; ?>
        </div>
    </div>
</div>