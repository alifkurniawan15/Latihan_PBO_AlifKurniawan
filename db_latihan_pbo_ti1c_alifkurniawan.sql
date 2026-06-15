-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2026 at 06:48 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan_pbo_ti1c_alifkurniawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tiket`
--

CREATE TABLE `tabel_tiket` (
  `id_tiket` int NOT NULL,
  `nama_film` varchar(150) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int NOT NULL,
  `harga_dasar_tiket` decimal(10,2) NOT NULL,
  `jenis_studio` enum('reguler','IMAX','Velvet') NOT NULL,
  `tipe_audio` varchar(50) DEFAULT NULL,
  `lokasi_baris` varchar(10) DEFAULT NULL,
  `kacamata_3d_id` varchar(20) DEFAULT NULL,
  `efek_gerak_fitur` varchar(100) DEFAULT NULL,
  `bantal_selimut_pack` varchar(50) DEFAULT NULL,
  `layanan_butler` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_tiket`
--

INSERT INTO `tabel_tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(1, 'The Batman', '2026-06-20 13:00:00', 120, '40000.00', 'reguler', 'Dolby Digital 5.1', 'Row G', NULL, NULL, NULL, NULL),
(2, 'Spider-Man: No Way Home', '2026-06-20 15:30:00', 120, '40000.00', 'reguler', 'Standard Stereo', 'Row F', NULL, NULL, NULL, NULL),
(3, 'Inception', '2026-06-21 10:00:00', 100, '35000.00', 'reguler', 'Dolby Digital 5.1', 'Row E', NULL, NULL, NULL, NULL),
(4, 'Interstellar', '2026-06-21 14:00:00', 100, '35000.00', 'reguler', 'Dolby Digital 7.1', 'Row D', NULL, NULL, NULL, NULL),
(5, 'Kajiman', '2026-06-22 19:00:00', 150, '45000.00', 'reguler', 'Standard Stereo', 'Row H', NULL, NULL, NULL, NULL),
(6, 'Siksa Kubur', '2026-06-22 21:30:00', 150, '45000.00', 'reguler', 'Dolby Digital 7.1', 'Row J', NULL, NULL, NULL, NULL),
(7, 'Agak Laen', '2026-06-23 12:00:00', 120, '40000.00', 'reguler', 'Dolby Digital 5.1', 'Row F', NULL, NULL, NULL, NULL),
(8, 'Avatar: The Way of Water', '2026-06-20 12:00:00', 200, '75000.00', 'IMAX', 'Dolby Atmos', 'Row A', '3D-IMAX-001', 'Vibration Standard', NULL, NULL),
(9, 'Dune: Part Two', '2026-06-20 16:00:00', 200, '75000.00', 'IMAX', 'DTS:X', 'Row B', '3D-IMAX-002', 'Wind & Vibration', NULL, NULL),
(10, 'Oppenheimer', '2026-06-21 13:00:00', 180, '70000.00', 'IMAX', 'Dolby Atmos', 'Row A', NULL, 'None', NULL, NULL),
(11, 'Godzilla x Kong', '2026-06-21 17:30:00', 200, '75000.00', 'IMAX', 'Dolby Atmos', 'Row C', '3D-IMAX-003', 'Heavy Motion Simulation', NULL, NULL),
(12, 'Top Gun: Maverick', '2026-06-22 14:00:00', 180, '70000.00', 'IMAX', 'DTS:X', 'Row B', NULL, 'Jet-Engine Wind Effect', NULL, NULL),
(13, 'The Matrix Resurrections', '2026-06-22 20:00:00', 180, '70000.00', 'IMAX', 'Dolby Atmos', 'Row D', '3D-IMAX-004', 'Vibration Standard', NULL, NULL),
(14, 'Jurassic World', '2026-06-23 15:00:00', 200, '75000.00', 'IMAX', 'Dolby Atmos', 'Row C', '3D-IMAX-005', 'Ground Shake Effect', NULL, NULL),
(15, 'Titanic', '2026-06-20 14:00:00', 40, '150000.00', 'Velvet', NULL, 'Suite 1', NULL, NULL, 'Premium Quilt Pack', 'Full Butler Access'),
(16, 'La La Land', '2026-06-20 18:30:00', 40, '150000.00', 'Velvet', NULL, 'Suite 2', NULL, NULL, 'Premium Quilt Pack', 'Full Butler Access'),
(17, 'The Godfather', '2026-06-21 11:00:00', 30, '130000.00', 'Velvet', NULL, 'Suite 3', NULL, NULL, 'Standard Pillow Pack', 'On-Call Service'),
(18, 'Gladiator 2', '2026-06-21 15:00:00', 40, '150000.00', 'Velvet', NULL, 'Suite 4', NULL, NULL, 'Premium Quilt Pack', 'Full Butler Access'),
(19, 'Past Lives', '2026-06-22 16:30:00', 30, '130000.00', 'Velvet', NULL, 'Suite 1', NULL, NULL, 'Standard Pillow Pack', 'On-Call Service'),
(20, 'Exhuma', '2026-06-22 19:30:00', 40, '150000.00', 'Velvet', NULL, 'Suite 5', NULL, NULL, 'Premium Quilt Pack', 'Full Butler Access'),
(21, 'Anatomy of a Fall', '2026-06-23 18:00:00', 30, '130000.00', 'Velvet', NULL, 'Suite 2', NULL, NULL, 'Standard Pillow Pack', 'On-Call Service');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  MODIFY `id_tiket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
