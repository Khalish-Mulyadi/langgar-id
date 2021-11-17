-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2021 at 03:49 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `langgar_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `role`) VALUES
(1, 'Sarah Angelica', 'admin', '$2y$10$QVzhznX/wdEW3k9hQ58BoecyT/NKJa7mU8eib2r8LhOaP6wZt1SLq', 'Super Admin'),
(6, 'Dewi', 'admindewi', '$2y$10$FxjnI5CBE55LoWVmCPqbAO2GNXgQa67Fxow7Q2d34L7CUI4y4amdG', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `guru_ngaji`
--

CREATE TABLE `guru_ngaji` (
  `id` int(11) NOT NULL,
  `uid` int(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(265) NOT NULL,
  `profesi` varchar(30) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `instagram` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru_ngaji`
--

INSERT INTO `guru_ngaji` (`id`, `uid`, `nama`, `gender`, `telepon`, `alamat`, `email`, `password`, `profesi`, `facebook`, `twitter`, `instagram`, `gambar`) VALUES
(1, 1, 'Salman Al Farizi', 'Laki-laki', '081122334455', 'Caringin', 'guest1', '$2y$10$Nq1jqqVxL2gmgIQMC9JbleBbJTZcR6AqYExQbTvgG6A6Ee0D.QzIa', 'Guru Madrasah', 'Salman Al Farizi', '@salmanalfarizi', '', '60a9e88791191.png'),
(2, 2, 'Syifa Amalia', 'Perempuan', '081380785558', 'Cigombong', 'guest2', '$2y$10$09T/OyCu8Dr8MYUBAMyL6.znZD4nrMW7kvdTJCymw2rKpEYiYzRim', 'Mahasiswa', 'facebook', '@twitter', '@insta', '60adc3d01084b.png'),
(3, 3, 'Sarah Nurul Islamiah', 'Perempuan', '081330484052', 'Sentul City', 'guest3', '$2y$10$O3QmbJgKfn3V0d7kZ4WlDeJI7xBr/TDxmoNc6oqgala63v.m/4pTK', 'Guru SMA', 'Sarah Nurul Islamiah', '@sarahnislamiah', '@sarahnislamiah_', '60e70033ce19a.jpg'),
(4, 449222725, 'Ajeng Dewi Puspita', 'Perempuan', '081285678334', 'Jl. Panaragan Kidul Kecamatan Bogor Tengah Kota Bogor', 'guest4', '$2y$10$LShBBttz/xeXbaWKExW3GumABOVizuCR08/Xh1brOBUVhdx8OFLsa', 'Guru SMP', 'Ajeng Dewi Puspita', '@ajengdewip', '@ajengdewip', '60d83d5a317bf.jpg'),
(5, 840439754, 'Ainun Hamzah Sakinah', 'Perempuan', '087734578879', 'Cibinong', 'guest5', '$2y$10$.mMU1lfsMAT1AH8F55C/Bu/LgjOWi0.Z.oS/q0CZ.oZcJnRZkEWD6', 'Freelancer', '', '', '', '60dc81e64222e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `profesi` varchar(50) NOT NULL,
  `pesan` varchar(300) NOT NULL,
  `posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `nama`, `profesi`, `pesan`, `posted`) VALUES
(1, 'Siti', 'Ibu rumah tangga', 'Sangat membantu bagi saya dalam mencari guru ngaji yang bagus dan berkualitas bagi anak saya.', '2021-07-09 21:35:46'),
(2, 'Jaya', 'Pegawai Negeri Sipil', 'Saya senang dapat menemukan guru ngaji yang cocok bagi anak saya di Langgar ID. Guru ngaji nya berkualitas dan hebat dalam mengajar. Terima kasih Langgar ID.', '2021-07-09 21:35:46'),
(3, 'Sarah', 'Guru', 'Sangat bagus karena bisa membantu memasarkan jasa saya sebagai guru ngaji', '2021-07-09 21:35:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `guru_ngaji`
--
ALTER TABLE `guru_ngaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guru_ngaji`
--
ALTER TABLE `guru_ngaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
