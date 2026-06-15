<?php

class Database {
    // Properti enkapsulasi untuk konfigurasi database
    private $host     = "localhost";
    private $username = "root";
    private $password = ""; // Isi password jika MySQL Laragon/XAMPP Anda menggunakannya
    private $database = "db_latihan_pbo_ti1c_alifkurniawan";
    public $conn;

    // Constructor: otomatis dieksekusi saat objek dari class Database dibuat
    public function __construct() {
        // Membuat koneksi database dengan MySQLi via OOP
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        // Memeriksa status koneksi
        if ($this->conn->connect_error) {
            // Menghentikan skrip dan menampilkan pesan error jika gagal terhubung
            die("Koneksi gagal ke database '" . $this->database . "': " . $this->conn->connect_error);
        } else {
            // Menampilkan pesan sukses sesuai instruksi jika berhasil terhubung
            echo "Koneksi sukses! Berhasil terhubung ke database '" . $this->database . "' menggunakan PBO.<br>";
        }
    }
}

// =========================================================================
// UJI COBA KONEKSI
// Kode di bawah ini opsional untuk memastikan file ini bekerja dengan baik.
// Silakan hapus atau beri komentar jika file ini akan di-include di file lain.
// =========================================================================
$db = new Database();

?>