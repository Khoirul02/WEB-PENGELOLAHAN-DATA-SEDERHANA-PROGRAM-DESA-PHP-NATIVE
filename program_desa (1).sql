-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Agu 2021 pada 15.43
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `program_desa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `art`
--

CREATE TABLE `art` (
  `id_art` int(11) NOT NULL,
  `nama_art` varchar(50) NOT NULL,
  `tempat_lahir_art` varchar(50) NOT NULL,
  `tgl_lahir_art` date NOT NULL,
  `ket_art` text NOT NULL,
  `status_art` enum('suami','anak1','anak2','anak3','lain') NOT NULL,
  `key_pokok` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan`
--

CREATE TABLE `catatan` (
  `id_catatan` int(11) NOT NULL,
  `foto_kondisi_rumah_catatan` text,
  `keterangan_lain_catatan` text,
  `status_ekonomi_catatan` enum('Y','N') DEFAULT NULL,
  `kelayakan_catatan` enum('Y','N') DEFAULT NULL,
  `key_pokok` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghasilan`
--

CREATE TABLE `penghasilan` (
  `id_penghasilan` int(11) NOT NULL,
  `nama_penghasilan` varchar(50) DEFAULT NULL,
  `pekerjaan_penghasilan` varchar(50) DEFAULT NULL,
  `hasil_bulanan` int(20) DEFAULT NULL,
  `status_penghasilan` enum('kpm','suami','anak','lain') DEFAULT NULL,
  `key_pokok` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pihak`
--

CREATE TABLE `pihak` (
  `id_pihak` int(11) NOT NULL,
  `nama_pihak` varchar(50) DEFAULT NULL,
  `jabatan_pihak` varchar(50) DEFAULT NULL,
  `alamat_pihak` text,
  `key_pokok` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pokok`
--

CREATE TABLE `pokok` (
  `nik_pokok` int(250) NOT NULL,
  `nama_pokok` varchar(50) NOT NULL,
  `kohort_pokok` varchar(50) NOT NULL,
  `no_id_bdt_pokok` varchar(50) NOT NULL,
  `alamat_pokok` text NOT NULL,
  `key_pokok` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `potensi`
--

CREATE TABLE `potensi` (
  `id_potensi` int(11) NOT NULL,
  `ketrampilan_art_potensi` text NOT NULL,
  `sda_potensi` text NOT NULL,
  `sdl_potensi` text NOT NULL,
  `usaha_ekonomi_potensi` text NOT NULL,
  `key_pokok` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sosial`
--

CREATE TABLE `sosial` (
  `id_sosial` int(11) NOT NULL,
  `nama_aset_sosial` enum('tanah/sawah','roda2','roda4','ternak','perhiasan','lain') NOT NULL,
  `jumlah_sosial` int(11) NOT NULL DEFAULT '0',
  `sat_sosial` varchar(50) NOT NULL DEFAULT '0',
  `nilai_perkiran_sosial` int(20) NOT NULL,
  `status_aset_sosial` enum('sendiri','lain') NOT NULL,
  `key_pokok` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `usaha`
--

CREATE TABLE `usaha` (
  `id_usaha` int(11) NOT NULL,
  `nama_usaha` varchar(50) NOT NULL DEFAULT '0',
  `omset_usaha` int(20) NOT NULL DEFAULT '0',
  `keuntungan_usaha` int(20) NOT NULL DEFAULT '0',
  `key_pokok` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `art`
--
ALTER TABLE `art`
  ADD PRIMARY KEY (`id_art`);

--
-- Indeks untuk tabel `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indeks untuk tabel `penghasilan`
--
ALTER TABLE `penghasilan`
  ADD PRIMARY KEY (`id_penghasilan`);

--
-- Indeks untuk tabel `pihak`
--
ALTER TABLE `pihak`
  ADD PRIMARY KEY (`id_pihak`);

--
-- Indeks untuk tabel `pokok`
--
ALTER TABLE `pokok`
  ADD PRIMARY KEY (`nik_pokok`);

--
-- Indeks untuk tabel `potensi`
--
ALTER TABLE `potensi`
  ADD PRIMARY KEY (`id_potensi`);

--
-- Indeks untuk tabel `sosial`
--
ALTER TABLE `sosial`
  ADD PRIMARY KEY (`id_sosial`);

--
-- Indeks untuk tabel `usaha`
--
ALTER TABLE `usaha`
  ADD PRIMARY KEY (`id_usaha`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `art`
--
ALTER TABLE `art`
  MODIFY `id_art` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penghasilan`
--
ALTER TABLE `penghasilan`
  MODIFY `id_penghasilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pihak`
--
ALTER TABLE `pihak`
  MODIFY `id_pihak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `potensi`
--
ALTER TABLE `potensi`
  MODIFY `id_potensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sosial`
--
ALTER TABLE `sosial`
  MODIFY `id_sosial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `usaha`
--
ALTER TABLE `usaha`
  MODIFY `id_usaha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
