<?php
$query = "SELECT a.*, p.nama_lengkap FROM t_artikel a 
          JOIN m_kategori k ON a.id_kategori = k.id_kategori
          JOIN m_pengguna p ON a.id_penulis = p.id_pengguna
          WHERE k.slug_kategori = 'puisi' AND a.status_publikasi = 'publikasi'
          ORDER BY a.diterbitkan_pada DESC";
$result = mysqli_query($conn, $query);
?>
<div class="container my-5">
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="sidebar-box border-0 shadow-sm rounded-4 p-4 bg-white">
                <span class="category-badge">Untaian Sajak</span>
                <h2 class="fw-bold mb-3">Para-para Puisi</h2>
                <p class="text-muted small">Ekspresi emosional, bait estetis, dan refleksi jiwa para penyair tanah cenderawasih.</p>
                <hr>
                
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <div class="my-4 p-4 bg-light rounded text-center border-start border-3 border-success">
                            <h4 class="fw-bold italic">"<?= htmlspecialchars($row['judul']); ?>"</h4>
                            <p class="small text-muted">Karya: <?= htmlspecialchars($row['nama_lengkap']); ?></p>
                            <div class="text-secondary small italic"><?= nl2br(htmlspecialchars($row['kutipan'])); ?></div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-muted text-center py-3">Bait puisi belum tersedia.</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-4">
            <?php include 'templates/pages/sidebar-default.php'; ?>
        </div>
    </div>
</div>