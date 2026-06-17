<?php
require_once 'Tiket.php';

class TiketReguler extends Tiket {
    private $tipeAudio;
    private $lokasiBaris;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket, $tipeAudio, $lokasiBaris) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // OVERRIDING POLIMORFISME: Tarif standar tanpa biaya tambahan
    public function HitungTotalHarga() {
        return $this->jumlah_kursi * $this->harga_dasar_tiket;
    }

    public function tampilkanInfoFasilitas() {
        return "Audio: " . $this->tipeAudio . " | Baris: " . $this->lokasiBaris;
    }

    /**
     * Fungsi Statis untuk mengambil data spesifik studio reguler menggunakan SELECT WHERE
     */
    public static function ambilDataReguler($conn) {
        $sql = "SELECT * FROM tabel_tiket WHERE jenis_studio = 'reguler'";
        $result = $conn->query($sql);
        
        $daftarObjek = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $daftarObjek[] = new self(
                    $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                    $row['jumlah_kursi'], $row['harga_dasar_tiket'],
                    $row['tipe_audio'], $row['lokasi_baris']
                );
            }
        }
        return $daftarObjek;
    }
}
?>