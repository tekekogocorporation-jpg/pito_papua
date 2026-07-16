<?php
$query = "SELECT a.*, p.nama_lengkap FROM t_artikel a 
          JOIN m_kategori k ON a.id_kategori = k.id_kategori
          JOIN m_pengguna p ON a.id_penulis = p.id_pengguna
          WHERE k.slug_kategori = 'cerita-rakyat' AND a.status_publikasi = 'publikasi'";
$result = mysqli_query($conn, $query);
?>
<div class="container my-5">
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="sidebar-box border-0 shadow-sm rounded-4 p-4 bg-white">
                <span class="category-badge">Mitos & Legenda</span>
                <h2 class="fw-bold mb-3">Para-para Cerita Rakyat</h2>
                <p class="text-muted small">Warisan penuturan lisan, asal-usul marga, dan kisah luhur legendaris masa lampau.</p>
                <hr>
                
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <div class="article-card border-0 shadow-none px-0 mb-4 border-bottom pb-3">
                            <h4 class="fw-bold text-success mb-2"><?= htmlspecialchars($row['judul']); ?></h4>
                            <p class="text-secondary small"><?= htmlspecialchars($row['konten_karya']); ?></p>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-muted text-center py-3">Cerita rakyat belum diinput.</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-4">
            <?php include 'templates/pages/sidebar-default.php'; ?>
        </div>
    </div>
</div>