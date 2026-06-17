<?php
require_once 'Tiket.php';

class TiketIMAX extends Tiket {
    private $kacamata3dId;
    private $efekGerakFitur;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // OVERRIDING POLIMORFISME: Dikenakan biaya tambahan flat Rp 35.000
    public function HitungTotalHarga() {
        return ($this->jumlah_kursi * $this->harga_dasar_tiket) + 35000;
    }

    public function tampilkanInfoFasilitas() {
        $kacamataInfo = !empty($this->kacamata3dId) ? $this->kacamata3dId : "Tidak Ada";
        return "ID Kacamata 3D: " . $kacamataInfo . " | Efek Gerak: " . $this->efekGerakFitur;
    }

    /**
     * Fungsi Statis untuk mengambil data spesifik studio IMAX menggunakan SELECT WHERE
     */
    public static function ambilDataIMAX($conn) {
        $sql = "SELECT * FROM tabel_tiket WHERE jenis_studio = 'IMAX'";
        $result = $conn->query($sql);
        
        $daftarObjek = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $daftarObjek[] = new self(
                    $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                    $row['jumlah_kursi'], $row['harga_dasar_tiket'],
                    $row['kacamata_3d_id'], $row['efek_gerak_fitur']
                );
            }
        }
        return $daftarObjek;
    }
}
?>