<?php
require_once 'Tiket.php';

class TiketVelvet extends Tiket {
    private $bantalSelimutPack;
    private $layananButler;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket, $bantalSelimutPack, $layananButler) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    // OVERRIDING POLIMORFISME: Tambahan kelas premium sebesar 50% (Total Harga * 1.50)
    public function HitungTotalHarga() {
        return ($this->jumlah_kursi * $this->harga_dasar_tiket) * 1.50;
    }

    public function tampilkanInfoFasilitas() {
        return "Fasilitas Kamar: " . $this->bantalSelimutPack . " | Layanan Butler: " . $this->layananButler;
    }

    /**
     * Fungsi Statis untuk mengambil data spesifik studio Velvet menggunakan SELECT WHERE
     */
    public static function ambilDataVelvet($conn) {
        $sql = "SELECT * FROM tabel_tiket WHERE jenis_studio = 'Velvet'";
        $result = $conn->query($sql);
        
        $daftarObjek = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $daftarObjek[] = new self(
                    $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                    $row['jumlah_kursi'], $row['harga_dasar_tiket'],
                    $row['bantal_selimut_pack'], $row['layanan_butler']
                );
            }
        }
        return $daftarObjek;
    }
}
?>