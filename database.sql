-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 10 Jul 2023 pada 12.26
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
('ADM-1', 'admin', '$2y$10$S/tl3vTh5ERcP46VZsMNjemg.uumsmX7Ngv43FyPs73vNSXSr7DsO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `level` varchar(50) NOT NULL,
  `umur` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`id`, `nama`, `email`, `phone`, `jenis_kelamin`, `level`, `umur`, `saldo`) VALUES
(1, 'Iqbal Rahmatullah', 'user@email.com', '08123112122', 'laki-laki', 'member', 20, 838564),
(2, 'Boni A', 'boni@gmail.com', '81231685459', 'laki-laki', 'member', 14, 95000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `judul` varchar(39) NOT NULL,
  `deskripsi` varchar(944) NOT NULL,
  `durasi` int(11) NOT NULL,
  `tanggal_rilis` date NOT NULL,
  `poster_url` varchar(63) NOT NULL,
  `banner_url` varchar(500) NOT NULL,
  `ketentuan_umur` int(11) NOT NULL,
  `harga_tiket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `movie`
--

INSERT INTO `movie` (`id`, `judul`, `deskripsi`, `durasi`, `tanggal_rilis`, `poster_url`, `banner_url`, `ketentuan_umur`, `harga_tiket`) VALUES
(0, 'Fast X', 'Keluarga Dom yang kembali mendapat ancaman dari musuhnya baru. Dante, putra dari Herman Reyes sang musuh di film Fast Furious 5 ingin membalas dendam kepada keluarga Toretto. Dante yang menyaksikan akhir dari ayahnya di tangan Dom Toretto kemudian menghabiskan waktunya untuk merencanakan pembalasan dendam serta mengumpulkan anak buah dari seluruh dunia. ', 134, '2023-05-17', 'https://image.tmdb.org/t/p/w500/fiVW06jE7z9YnO4trhaMEdclSiC.jpg', 'https://wallpapercg.com/download/fast-x-3840%20x%202160-11583.jpg', 15, 53000),
(1, 'John Wick: Chapter 4', 'John Wick mengungkap jalan untuk mengalahkan The High Table. Tapi sebelum dia bisa mendapatkan kebebasannya, Wick harus berhadapan dengan musuh baru dengan aliansi kuat di seluruh dunia dan kekuatan yang mengubah teman lama menjadi musuh.', 169, '2023-03-22', 'https://image.tmdb.org/t/p/w500/vZloFAK7NmvMGKE7VkF5UHaz0I.jpg', 'https://i.ibb.co/7Qc6ZMp/john-wick-4-theatrical-trailer-banner1.jpg', 10, 60000),
(2, 'The Super Mario Bros. Movie', 'Ketika sedang bekerja di bawah tanah untuk memperbaiki pipa air, Mario dan Luigi, yang merupakan tukang ledeng dari Brooklyn, tiba-tiba terhisap ke dalam pipa misterius dan masuk ke dunia yang sangat berbeda. Mereka berada di tempat yang ajaib dan aneh. Tapi sayangnya, mereka terpisah satu sama lain. Mario memulai petualangan besar untuk mencari dan menemukan Luigi.', 92, '2023-04-05', 'https://image.tmdb.org/t/p/w500/qNBAXBIQlnOThrVvA6mA2B5ggV6.jpg', 'https://images6.alphacoders.com/130/1302330.jpg', 14, 49000),
(4, 'Transformers: Age of Extinction', 'Lima tahun setelah Chicago dihancurkan, manusia berbalik melawan robot. Namun seorang ayah tunggal dan penemu membangkitkan robot yang dapat menyelamatkan dunia.', 165, '2014-06-25', 'https://image.tmdb.org/t/p/w500/jyzrfx2WaeY60kYZpPYepSjGz4S.jpg', 'https://thesecondtake.com/wp-content/uploads/2014/05/Wallpaper_Latino_Transformers4_Mxtrailers.jpg', 11, 54000),
(7, 'Avatar: The Way of Water', 'Jake Sully tinggal bersama keluarga barunya di planet Pandora. Setelah ancaman kembali datang, Jake harus bekerja dengan Neytiri dan pasukan ras Na\'vi untuk melindungi planet mereka.', 192, '2022-12-14', 'https://image.tmdb.org/t/p/w500/t6HIqrRAclMCA60NsSmeqe9RmNV.jpg', 'https://i.ibb.co/KzWCZsD/avatar.jpg', 12, 53000),
(9, 'Guardians of the Galaxy Vol. 3', 'Peter Quill masih trauma karena kehilangan Gamora. Ia perlu mengumpulkan timnya untuk melindungi alam semesta dan salah satu anggota mereka. Jika mereka gagal, Guardian akan berakhir.', 149, '2023-05-03', 'https://image.tmdb.org/t/p/w500/nAbpLidFdbbi3efFQKMPQJkaZ1r.jpg', 'https://i.ibb.co/wdMQwvX/201396.jpg', 12, 41000),
(12, 'Ant-Man and the Wasp: Quantumania', 'Scott Lang dan Hope van Dyne adalah pasangan pahlawan super. Mereka pergi bersama orang tua Hope, Janet van Dyne dan Hank Pym, serta anak perempuan Scott, Cassie Lang, untuk menjelajahi Alam Kuantum. Di sana, mereka bertemu dengan makhluk-makhluk aneh dan memulai petualangan yang tak terduga. Petualangan ini akan menguji batas-batas mereka.', 124, '2023-02-15', 'https://image.tmdb.org/t/p/w500/g0OWGM7HoIt866Lu7yKohYO31NU.jpg', 'https://i.ibb.co/WgJ90rq/ant-man-and-the-wasp-reald-3d-poster.jpg', 12, 51000),
(17, 'The Pope\'s Exorcist', 'Pastor Gabriele Amorth, yang memimpin tim pengusir setan di Vatikan, menginvestigasi kasus kekerasan roh jahat yang menghantui seorang anak laki-laki. Dalam penyelidikannya, ia secara tak terduga menemukan rahasia tua yang disembunyikan oleh Vatikan selama berabad-abad.', 103, '2023-04-05', 'https://image.tmdb.org/t/p/w500/gNPqcv1tAifbN7PRNgqpzY8sEJZ.jpg', 'https://i.ibb.co/5KzQGqD/the-popes-exorcist-russell-crowe-daniel-zovatto-social-feature-1-1.jpg', 13, 51000),
(19, 'To Catch a Killer', 'Baltimore. Malam tahun baru. Seorang petugas polisi yang berbakat tetapi bermasalah (Shailene Woodley) direkrut oleh kepala penyelidik FBI (Ben Mendelsohn) untuk membantu membuat profil dan melacak individu yang terganggu yang meneror kota.', 119, '2023-04-06', 'https://image.tmdb.org/t/p/w500/mFp3l4lZg1NSEsyxKrdi0rNK8r1.jpg', 'https://i.ibb.co/9sr1tx9/bg1-tocatchakiller.jpg', 15, 47000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id_order` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `tanggal_order` date NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` enum('Paid','Cancelled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id_order`, `id_user`, `id_film`, `jumlah_tiket`, `tanggal_order`, `total_harga`, `status`) VALUES
('#1168897609480', 1, 0, 1, '2023-07-14', 53000, 'Cancelled'),
('#1168897630431', 1, 1, 1, '2023-07-13', 60000, 'Cancelled'),
('#1168897709326', 1, 1, 1, '2023-07-13', 60000, 'Cancelled'),
('#1168897790812', 1, 1, 1, '2023-07-13', 60000, 'Cancelled'),
('#1168897846715', 1, 1, 3, '2023-07-11', 180000, 'Cancelled'),
('#1168897945010', 1, 0, 3, '2023-07-12', 159000, 'Paid'),
('#1168897959315', 1, 0, 1, '2023-07-12', 53000, 'Paid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `seat`
--

CREATE TABLE `seat` (
  `no_kursi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_movie` int(11) NOT NULL,
  `id_pesanan` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `umur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `seat`
--

INSERT INTO `seat` (`no_kursi`, `tanggal`, `id_movie`, `id_pesanan`, `nama`, `umur`) VALUES
(2, '2023-07-12', 0, '#1168897945010', 'Iqbal', 22),
(3, '2023-07-12', 0, '#1168897945010', 'Budi', 43),
(4, '2023-07-12', 0, '#1168897945010', 'Aldo', 21),
(5, '2023-07-12', 0, '#1168897959315', 'Iqbal', 22),
(1, '2023-07-12', 0, '#4168898021235', 'Iqbal', 33),
(2, '2023-07-13', 0, '#516889804881', 'Iqbal', 22),
(1, '2023-07-14', 0, '#7168898096551', 'Iqbal', 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `topup`
--

CREATE TABLE `topup` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('success','pending') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `topup`
--

INSERT INTO `topup` (`id`, `id_user`, `total`, `status`) VALUES
(2, 1, 50925, 'success'),
(3, 1, 20768, 'success'),
(6, 1, 50564, 'success'),
(7, 1, 100764, 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'iqbalr', '$2y$10$.XEwh.R/BeDbL87op83ds.x/mUP99Siij8LAAsM3cC.Q5cSg7tjLy'),
(2, 'boni', '$2y$10$bfC.9LjjXbDNhc97VysTy.1BTF/MWdtXN4BgZCJwnj8CxyNJR.27q');

-- --------------------------------------------------------

--
-- Struktur dari tabel `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `rekening` varchar(50) NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `status` enum('pending','success') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `withdraw`
--

INSERT INTO `withdraw` (`id`, `id_user`, `total`, `rekening`, `atas_nama`, `status`) VALUES
(1, 1, 5000, '12332211', 'iqbal', 'success'),
(2, 1, 5000, '12332211', 'iqbal', 'success'),
(3, 1, 7000, '12212', 'iqbal', 'success'),
(4, 1, 3000, '233223', 'iqbal', 'pending'),
(5, 1, 50000, '212122', 'iqbal', 'pending'),
(8, 1, 2000, '113113', 'iqbal', 'pending'),
(9, 1, 100000, '21121221', 'iqbal', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `topup`
--
ALTER TABLE `topup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
