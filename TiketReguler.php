<?php
// Memanggil abstract class induk
require_once 'Tiket.php';

class TiketReguler extends Tiket {
    // Properti tambahan terenkapsulasi (private) sesuai gambar Tahap 4
    private $tipeAudio;
    private $lokasiBaris;

    // Constructor untuk memetakan data induk dan data spesifik reguler
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket, $tipeAudio, $lokasiBaris) {
        // Melempar parameter utama ke constructor abstract class Tiket
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // Overriding: Implementasi hitung harga untuk kelas Reguler
    public function HitungTotalHarga() {
        return $this->harga_dasar_tiket * $this->jumlah_kursi;
    }

    // Overriding: Implementasi menampilkan fasilitas reguler
    public function tampilkanInfoFasilitas() {
        return "Audio: " . $this->tipeAudio . " | Baris: " . $this->lokasiBaris;
    }
}
?>