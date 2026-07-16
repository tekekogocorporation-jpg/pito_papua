<?php
// templates/pages/cerpen.php
$query = "SELECT a.*, p.nama_lengkap FROM t_artikel a 
          JOIN m_kategori k ON a.id_kategori = k.id_kategori
          JOIN m_pengguna p ON a.id_penulis = p.id_pengguna
          WHERE k.slug_kategori = 'cerpen' AND a.status_publikasi = 'publikasi'
          ORDER BY a.diterbitkan_pada DESC";
$result = mysqli_query($conn, $query);
?>
<div class="container my-5">
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="sidebar-box border-0 shadow-sm rounded-4 p-4 bg-white">
                <span class="category-badge">Karya Fiksi</span>
                <h2 class="fw-bold mb-3">Para-para Cerpen</h2>
                <p class="text-muted small">Kumpulan cerita fiksi pendek kontemporer yang merefleksikan dinamika kehidupan sosial budaya Papua.</p>
                <hr class="text-black-50">
                
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <div class="py-3 border-bottom">
                            <h4><a href="#" class="text-decoration-none text-dark fw-bold" style="font-size: 1.25rem;"><?= htmlspecialchars($row['judul']); ?></a></h4>
                            <p class="small text-muted">Oleh: <?= htmlspecialchars($row['nama_lengkap']); ?> • <?= date('d M Y', strtotime($row['diterbitkan_pada'])); ?></p>
                            <p class="text-secondary"><?= htmlspecialchars($row['kutipan']); ?></p>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-muted italic py-3 text-center">Naskah cerpen belum tersedia.</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-4">
            <?php include 'templates/pages/sidebar-default.php'; ?>
        </div>
    </div>
</div>