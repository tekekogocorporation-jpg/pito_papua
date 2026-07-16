<?php
$query = "SELECT a.*, p.nama_lengkap FROM t_artikel a 
          JOIN m_kategori k ON a.id_kategori = k.id_kategori
          JOIN m_pengguna p ON a.id_penulis = p.id_pengguna
          WHERE k.slug_kategori = 'esai' AND a.status_publikasi = 'publikasi'";
$result = mysqli_query($conn, $query);
?>
<div class="container my-5">
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="sidebar-box border-0 shadow-sm rounded-4 p-4 bg-white">
                <span class="category-badge">Opini Kritis</span>
                <h2 class="fw-bold mb-3">Para-para Esai</h2>
                <p class="text-muted small">Sudut pandang analitis, tulisan kritis ilmiah, serta diskursus perkembangan literasi modern.</p>
                <hr>
                
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <div class="mb-4 pb-3 border-bottom">
                            <h4 class="fw-bold"><?= htmlspecialchars($row['judul']); ?></h4>
                            <p class="small text-muted">Penulis: <?= htmlspecialchars($row['nama_lengkap']); ?></p>
                            <p class="text-secondary small"><?= htmlspecialchars($row['kutipan']); ?></p>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-muted text-center py-3">Naskah esai belum tersedia.</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-4">
            <?php include 'templates/pages/sidebar-default.php'; ?>
        </div>
    </div>
</div>