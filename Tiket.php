<?php

// Mendefinisikan class sebagai abstract class
abstract class Tiket {
    // Properti terenkapsulasi (protected agar bisa diakses oleh class anak/subclass)
    protected $id_tiket;
    protected $nama_film;
    protected $jadwal_tayang;
    protected $jumlah_kursi;
    protected $harga_dasar_tiket;

    /**
     * Constructor untuk memetakan data dari kolom tabel database
     */
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket) {
        $this->id_tiket        = $id_tiket;
        $this->nama_film       = $nama_film;
        $this->jadwal_tayang   = $jadwal_tayang;
        $this->jumlah_kursi    = $jumlah_kursi;
        $this->harga_dasar_tiket = $harga_dasar_tiket;
    }

    /**
     * METODE ABSTRAK (Tanpa Body/Isi)
     * Wajib di-override dan diimplementasikan secara spesifik di dalam class anak.
     */
    abstract public function HitungTotalHarga();
    abstract public function tampilkanInfoFasilitas();

    // =========================================================================
    // GETTER (Opsi Tambahan untuk Mengakses Properti Terenkapsulasi)
    // =========================================================================
    public function getIdTiket() { return $this->id_tiket; }
    public function getNamaFilm() { return $this->nama_film; }
    public function getJadwalTayang() { return $this->jadwal_tayang; }
    public function getJumlahKursi() { return $this->jumlah_kursi; }
    public function getHargaDasarTiket() { return $this->harga_dasar_tiket; }
}

?>