<?php
// Memanggil abstract class induk
require_once 'Tiket.php';

class TiketVelvet extends Tiket {
    // Properti tambahan terenkapsulasi (private) sesuai gambar Tahap 4
    private $bantalSelimutPack;
    private $layananButler;

    // Constructor untuk memetakan data induk dan data spesifik Velvet
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket, $bantalSelimutPack, $layananButler) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    // Overriding: Velvet Class dikenakan biaya tambahan premium service e.g., Rp 60.000 flat
    public function HitungTotalHarga() {
        $premiumServiceCharge = 60000;
        return ($this->harga_dasar_tiket * $this->jumlah_kursi) + $premiumServiceCharge;
    }

    // Overriding: Menampilkan fasilitas kemewahan studio Velvet
    public function tampilkanInfoFasilitas() {
        return "Fasilitas Kamar: " . $this->bantalSelimutPack . " | Layanan Butler: " . $this->layananButler;
    }
}
?>