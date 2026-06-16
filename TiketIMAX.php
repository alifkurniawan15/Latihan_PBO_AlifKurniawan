<?php
// Memanggil abstract class induk
require_once 'Tiket.php';

class TiketIMAX extends Tiket {
    // Properti tambahan terenkapsulasi (private) sesuai gambar Tahap 4
    private $kacamata3dId;
    private $efekGerakFitur;

    // Constructor untuk memetakan data induk dan data spesifik IMAX
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // Overriding: IMAX dikenakan biaya tambahan (surcharge) e.g., Rp 25.000 per kursi
    public function HitungTotalHarga() {
        $surchargeIMAX = 25000;
        return ($this->harga_dasar_tiket + $surchargeIMAX) * $this->jumlah_kursi;
    }

    // Overriding: Menampilkan fasilitas spesifik studio IMAX
    public function tampilkanInfoFasilitas() {
        $kacamataInfo = !empty($this->kacamata3dId) ? $this->kacamata3dId : "Tidak Ada";
        return "ID Kacamata 3D: " . $kacamataInfo . " | Efek Gerak: " . $this->efekGerakFitur;
    }
}
?>