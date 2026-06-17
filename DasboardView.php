<?php
require_once 'database.php';
require_once 'TiketReguler.php';
require_once 'TiketIMAX.php';
require_once 'TiketVelvet.php';

// Inisialisasi Database
$db = new Database();

// Mengambil data terkelompok menggunakan Static Method
$dataReguler = TiketReguler::ambilDataReguler($db->conn);
$dataIMAX    = TiketIMAX::ambilDataIMAX($db->conn);
$dataVelvet  = TiketVelvet::ambilDataVelvet($db->conn);

// Helper function untuk merender kategori dengan kelas CSS yang berbeda-beda
function renderKategori($judul, $daftarTiket, $className, $ikon) {
    echo "<div class='category-card $className'>";
    echo "<div class='category-header'>";
    echo "<h3><i class='$ikon'></i> $judul</h3>";
    echo "<span class='badge'>".count($daftarTiket)." Pesanan</span>";
    echo "</div>";
    
    if (empty($daftarTiket)) {
        echo "<p class='empty-msg'>Belum ada transaksi tiket untuk kategori studio ini.</p>";
    } else {
        echo "<div class='table-responsive'>
                <table>
                    <thead>
                        <tr>
                            <th>ID Tiket</th>
                            <th>Judul Film</th>
                            <th>Jadwal Tayang</th>
                            <th>Jumlah Kursi</th>
                            <th>Fasilitas Unik (Polimorfik)</th>
                            <th style='text-align: right;'>Total Bayar</th>
                        </tr>
                    </thead>
                    <tbody>";
        foreach ($daftarTiket as $t) {
            echo "<tr>
                    <td class='id-column'>#{$t->getIdTiket()}</td>
                    <td><span class='film-title'>{$t->getNamaFilm()}</span></td>
                    <td class='text-muted'>" . date('d M Y, H:i', strtotime($t->getJadwalTayang())) . " WIB</td>
                    <td><span class='seat-count'>{$t->getJumlahKursi()} Kursi</span></td>
                    <td><span class='fasilitas'>{$t->tampilkanInfoFasilitas()}</span></td>
                    <td class='harga'>Rp " . number_format($t->HitungTotalHarga(), 0, ',', '.') . "</td>
                  </tr>";
        }
        echo "</tbody></table></div>";
    }
    echo "</div>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema Dashboard - Dynamic Multi-Color View</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Base Setup */
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background: #f8fafc; 
            color: #334155; 
            margin: 0;
            padding: 40px 20px;
        }
        .container { max-width: 1100px; margin: auto; }
        .dashboard-header { text-align: center; margin-bottom: 40px; }
        .dashboard-header h2 { color: #0f172a; margin: 0; font-size: 2.2rem; font-weight: 700; }
        .dashboard-header p { color: #64748b; margin-top: 8px; font-size: 1rem; }

        /* Structural Layout Card */
        .category-card { 
            background: #ffffff; 
            padding: 26px; 
            border-radius: 18px; 
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.02);
            margin-bottom: 40px;
            border: 1px solid #e2e8f0;
            transition: transform 0.2s ease;
        }
        .category-card:hover {
            transform: translateY(-2px);
        }
        .category-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 22px; }
        .category-header h3 { margin: 0; font-size: 1.35rem; font-weight: 700; display: flex; align-items: center; }
        .badge { font-size: 0.85rem; padding: 6px 16px; border-radius: 30px; font-weight: 700; }

        /* Table Styling */
        .table-responsive { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; background: transparent; }
        th { text-align: left; padding: 14px; color: #475569; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e2e8f0; }
        td { padding: 16px 14px; border-bottom: 1px solid #f1f5f9; font-size: 0.95rem; }
        .id-column { color: #94a3b8; font-weight: 500; }
        .film-title { font-weight: 600; color: #0f172a; }
        .text-muted { color: #64748b; font-size: 0.9rem; }
        .seat-count { background: #ffffff; padding: 4px 10px; border-radius: 6px; font-size: 0.85rem; font-weight: 500; border: 1px solid #e2e8f0; }
        .fasilitas { font-size: 0.9rem; font-weight: 500; }
        .harga { font-weight: 700; text-align: right; font-size: 1.1rem; }
        .empty-msg { color: #94a3b8; font-style: italic; text-align: center; padding: 20px; }

        /* =========================================================================
           1. SKEMA WARNA STUDIO REGULER (Tema: Emerald Teal/Mint)
        ========================================================================= */
        .view-reguler { border-top: 5px solid #059669; background: linear-gradient(to bottom, #f0fdf4, #ffffff 150px); }
        .view-reguler h3 i { color: #059669; margin-right: 12px; }
        .view-reguler h3 { color: #065f46; }
        .view-reguler .badge { background: #d1fae5; color: #065f46; }
        .view-reguler th { background: #e6f4ea; }
        .view-reguler tr:hover td { background-color: #f2fbf5; }
        .view-reguler .fasilitas { color: #047857; }
        .view-reguler .harga { color: #059669; }

        /* =========================================================================
           2. SKEMA WARNA STUDIO IMAX (Tema: Ocean Blue/Cyan)
        ========================================================================= */
        .view-imax { border-top: 5px solid #0284c7; background: linear-gradient(to bottom, #f0f9ff, #ffffff 150px); }
        .view-imax h3 i { color: #0284c7; margin-right: 12px; }
        .view-imax h3 { color: #075985; }
        .view-imax .badge { background: #e0f2fe; color: #075985; }
        .view-imax th { background: #e0f4ff; }
        .view-imax tr:hover td { background-color: #f4fbc7; background-color: #f0f9ff; }
        .view-imax .fasilitas { color: #0369a1; }
        .view-imax .harga { color: #0284c7; }

        /* =========================================================================
           3. SKEMA WARNA STUDIO VELVET (Tema: Elegant Rose/Crimson)
        ========================================================================= */
        .view-velvet { border-top: 5px solid #db2777; background: linear-gradient(to bottom, #fdf2f8, #ffffff 150px); }
        .view-velvet h3 i { color: #db2777; margin-right: 12px; }
        .view-velvet h3 { color: #9d174d; }
        .view-velvet .badge { background: #fce7f3; color: #9d174d; }
        .view-velvet th { background: #fbe7f0; }
        .view-velvet tr:hover td { background-color: #fdf2f8; }
        .view-velvet .fasilitas { color: #be185d; }
        .view-velvet .harga { color: #db2777; }
    </style>
</head>
<body>

<div class="container">
    <div class="dashboard-header">
        <h2>Dashboard Penjualan Tiket</h2>
        <p>Sistem Pemetaan Polimorfisme Objek Konkrit & Fasilitas Bioskop</p>
    </div>

    <?php 
        // Memanggil fungsi render dengan pengelompokkan kelas CSS warna yang berbeda
        renderKategori("Studio Reguler Class", $dataReguler, "view-reguler", "fa-solid fa-clapperboard");
        renderKategori("Studio IMAX 3D Experience", $dataIMAX, "view-imax", "fa-solid fa-brands fa-imax");
        renderKategori("Studio Velvet Suite Luxury", $dataVelvet, "view-velvet", "fa-solid fa-couch");
    ?>
</div>

</body>
</html>