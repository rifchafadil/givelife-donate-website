-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 02:22 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_donasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id_activity` int(11) NOT NULL,
  `id_campaign` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_activity` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id_activity`, `id_campaign`, `amount`, `description`, `image_activity`) VALUES
(9, 4, 120000, 'seoksoo bantuan mental', 'FijRBqeaYAA_YEs.jpg'),
(17, 7, 909, 'afh iyh', 'WhatsApp Image 2022-12-08 at 5.01.30 AM.jpeg'),
(18, 7, 513, 'robert', 'WhatsApp Image 2022-12-08 at 5.01.30 AM.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `id_campaign` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('public','pending','archived') NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `goal` int(11) DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `note` text DEFAULT NULL,
  `image_campaign` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`id_campaign`, `title`, `description`, `status`, `amount`, `goal`, `date_end`, `note`, `image_campaign`) VALUES
(2, 'Bantuan kebutuhan bayi untuk korban erupsi semeru', 'Tak menyangka erupsi Gunung Semeru akan terjadi lagi, Minggu (4/12/2022). Di pengungsian, Mita bersama pengungsi lainnya membutuhkan bantuan susu dan popok untuk bayinya. “Sekarang bantuan yang kami terima adalah makanan dan minuman. Kami berharap dan membutuhkan susu dan popok untuk bayi-bayi di sini,” harapnya', 'public', 7500000, 15000000, '2022-11-13', 'Gunung Semeru Erupsi Lagi, Minta Bantuan Tisu Dan Popok Untuk Bayi', ''),
(4, 'Bayi 2 Bulan Di Gresik Butuh Uluran Bantuan', 'Tak Memiliki Anus Sejak Lahir, Bayi Berusia 2 Bulan Di Dusun Pilanggresik, Desa Kedamean, Kedamean, Gresik Membutuhkan Uluran Tangan. Bayi Bernama Mochammad Nazril Maulana Ini Harus Menjalani Kontrol Ke RSAL Hingga 3 Kali Dalam Sepekan. Uluran tangan para dermawan diharap mampu meringankan beban keluarga. Pasalnya, penghasilan orang tuanya yang bekerja sebagai buruh pabrik tidak cukup untuk membiayai seluruh pengobatan yang harus dijalani buah hatinya.', 'public', 5000000, 10000000, '2022-11-09', 'Tak Punya Anus Sejak Lahir, Bayi 2 Bulan di Gresik Butuh Uluran Bantuan', ''),
(7, 'Bantuan kaki untuk penyandang Disabilitas', 'Di tengah keterbatasan, para penyandang disabilitas berhak mendapatkan kesetaraan dan diikut sertakan dalam semua aspek masyarakat serta pembangunan. Selain itu, para penyandang disabilitas berhak mendapatkan motivasi serta dorongan agar bisa berkembang di tengah masyarakat. Seperti yang dilakukan oleh Bhabinkamtibmas Polsek Petanahan Aipda Nur Wahyu Eko Setiawan bersama dengan Kecamatan Petanahan.', 'public', 10000000, 23000000, '2022-10-09', 'Dua Anak Penyandang Disabilitas di Petanahan Membutuhkan Bantuan Kaki Palsu', ''),
(8, 'Anak penderita Gizi buruk di Lebak butuh bantuan pengobatan', 'Anak penderita gizi buruk di Kabupaten Lebak, Banten membutuhkan bantuan uluran tangan dermawan untuk pengobatan karena kondisi kesehatanya semakin memburuk.', 'archived', 25000000, 25000000, '2022-11-09', 'Anak penderita Gizi buruk di Lebak butuh bantuan pengobatan', 'aktivitas1.jpeg'),
(9, 'Bantuan selimut dan makanan bayi pasca gempa malang', 'Gempa bumi Magnitudo 6,1 yang mengguncan Kabupaten Malang dan sekitarnya. korban yang tinggal di pengungsian sangat membutuhkan bantuan, terutama selimut, terpal untuk tenda dan makanan bayi.\r\n', 'archived', 17000000, 17000000, '2022-10-15', 'Bantuan selimut dan makanan bayi pasca gempa malang', 'aktivitas3.jpg'),
(10, 'Biaya Besar Untuk Balita penderita penyakit komplikasi', 'Biaya pengobatannya yang dibutuhkan cukup besar. Untuk biaya alat bantu pendengaran saja kita  harus mengeluarkan dana Rp400 juta, agar kiri dan kanan pendengaran Faiz bisa berfungsi normal', 'archived', 28000000, 28000000, '2022-05-22', 'Biaya Besar Untuk Balita penderita penyakit komplikasi', 'aktivitas2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id_content` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id_donations` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `telp` bigint(11) DEFAULT NULL,
  `nominal` bigint(11) DEFAULT NULL,
  `image_payment` varchar(255) DEFAULT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `support` text DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id_donations`, `nama`, `telp`, `nominal`, `image_payment`, `metode_pembayaran`, `support`, `status`) VALUES
(10, 'Octavia Nur Chasanah', 88228493834, 10000000, '', 'BRI', 'semoga bisa membantu', 'confirmed'),
(13, 'xc', 34, 0, 'Group 28.png', 'bca', 'ghsjbca', ''),
(14, 'test', 81222222222, 0, 'magang.jpg', 'test', 'test', ''),
(15, 'test', 8122222332, 125000, 'magang.jpg', 'test', 'test', '');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `dana_tersampaikan` int(11) DEFAULT NULL,
  `donatur` int(11) DEFAULT NULL,
  `galang_dana` int(11) DEFAULT NULL,
  `relawan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `dana_tersampaikan`, `donatur`, `galang_dana`, `relawan`) VALUES
(5, 1, 2, 3, 4),
(6, 5, 6, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image_news` varchar(100) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `title`, `image_news`, `description`, `date`, `link`) VALUES
(29, 'Bantuan susu untuk pengungsi gempa Cianjur', 'news4.jpg', 'Komisi Perlindungan Anak Indonesia (KPAI) meminta kepada pemerintah memperbanyak bantuan susu untuk anak-anak pengungsi gempa Cianjur.pemerintah harus membuat data terpilah pengungsi dewasa dan anak, sebagai dasar penanganan korban.', '2022-10-29 00:00:00', 'https://id.berita.yahoo.com/kpai-minta-perbanyak-bantuan-susu-092811314.html?guccounter=1&guce_referrer=aHR0cHM6Ly93d3cuYmluZy5jb20v&guce_referrer_sig=AQAAADUfMGPcDHhpaZ4lutejqLCvjbOLJedITjCEa92NEVPMMJlGrDjRYERAuFYYyqRR9prg72loNswJMFeANVDaIEdGPDWp_92Y-DKn'),
(30, 'Anak Korban Gempa Cianjur Butuh Trauma Healing', 'news3.jpg', 'Gempa bumi Magnitudo 5,6 yang mengguncang Kabupaten Cianjur pada Senin (21/11/2022) lalu, menyebabkakn, 100.330 warga mengungsi. Yang paling terdampak adalah anak-anak sehingga trauma healing bagi mereka sangat dibutuhkan.', '2022-10-29 00:00:00', 'https://www.cnbcindonesia.com/news/20221205090612-4-393686/phe-lakukan-trauma-healing-untuk-korban-gempa-cianjur'),
(31, 'Penyandang Disabilitas butuh Kaki Palsu', 'news5.jpeg', 'Di tengah keterbatasan, para penyandang disabilitas berhak mendapatkan kesetaraan dan diikut sertakan dalam semua aspek masyarakat serta pembangunan. penyandang disabilitas berhak mendapatkan motivasi agar bisa berkembang di tengah masyarakat.', '2022-10-29 00:00:00', 'https://www.beritakebumen.co.id/2022/08/dua-anak-penyandang-disabilitas-di.html'),
(32, 'Gunung Semeru Erupsi, Bantuan Tisu dan Popok Bayi', 'news6.jpeg', 'Di pengungsian, Mita bersama pengungsi lainnya membutuhkan bantuan susu dan popok untuk bayinyaSekarang bantuan yang kami terima adalah makanan dan minuman. Kami berharap dan membutuhkan susu dan popok untuk bayi-bayi di sini', '2022-10-29 00:00:00', 'https://madura.tribunnews.com/2022/12/05/warga-lumajang-trauma-gunung-semeru-erupsi-lagi-minta-bantuan-tisu-dan-popok-untuk-bayi'),
(36, 'Bayi 2 Bulan di Gresik Butuh Uluran Bantuan', 'news1.jpeg', 'Tak memiliki anus sejak lahir, bayi berusia 2 bulan di Dusun Pilanggresik, Desa Kedamean, Kedamean, Gresik membutuhkan uluran tangan. Bayi bernama Mochammad Nazril Maulana ini harus menjalani kontrol ke RSAL hingga 3 kali dalam sepekan.', '2022-10-29 00:00:00', 'https://www.detik.com/jatim/berita/d-6186169/tak-punya-anus-sejak-lahir-bayi-2-bulan-di-gresik-butuh-uluran-bantuan'),
(37, 'Siswa SD Korban Perundungan di Malang', 'news2.jpg', 'Siswa SD berinisial MWF (7), korban perundungan di Malang, kembali ke rumah sakit. Akibat perundungan itu, korban mengalami kejang-kejang hingga dilarikan ke rumah sakit dan koma divonis mengalami pembengkakan dan pendarahan pada bagian otak.', '2022-10-29 00:00:00', 'https://jatim.inews.id/berita/siswa-sd-korban-perundungan-di-malang-kembali-ke-rumah-sakit-ada-apa');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id_team` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `foto`) VALUES
(5, 'Fidra Aulia Asana', 'fidraaulia@gmail.com', 'fidra', 'd41d8cd98f00b204e9800998ecf8427e', 'vidra.jpeg'),
(21, 'Vita Fatul Istifadah', 'vitafatul@gmail.com', 'vita', 'd41d8cd98f00b204e9800998ecf8427e', 'vita.jpeg'),
(22, 'Muhammad Rizki Wahyu Ramadhan', 'mrizki@gmail.com', 'rizki', 'd41d8cd98f00b204e9800998ecf8427e', 'rizki.jpeg'),
(23, 'Servia Wafa Aprine', 'serviawafa@gmail.com', 'wafa', 'd41d8cd98f00b204e9800998ecf8427e', 'wafa.jpeg'),
(24, 'Muhammad Rifcha', 'rifcha@gmail.com', 'rifcha', 'd41d8cd98f00b204e9800998ecf8427e', 'rifcha.jpeg'),
(25, 'Octavia Nur Khasanah', 'octavia@gmail.com', 'octavia', 'd41d8cd98f00b204e9800998ecf8427e', 'octa.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `visimisi`
--

CREATE TABLE `visimisi` (
  `id_visimisi` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visimisi`
--

INSERT INTO `visimisi` (`id_visimisi`, `title`, `description`) VALUES
(1, 'Visi1', 'Membuat Kampanye Gotong Royong'),
(2, 'Visi2', 'Pemberdayaan Organisasi Sosial'),
(3, 'Sejarah Singkat GiveLife', 'GiveLife adalah website yang memberikan kontribusi untuk menyalurkan dana donasi. Dana yang sudah terkumpul akan kami berikan kepada anak-anak yang sedang membutuhkan atau kekurangan terhadap pendidikan, pangan, perekonomian, kesehatan dan bencana alam. GiveLife mengajarkan para donasi untuk saling peduli terhadap kehidupan satu sama lain, karena satu donasi sama seperti menghidupkan satu anak.'),
(4, 'Aktivitas Kami', 'GiveLife telah melakukan beberapa kegiatan penyaluran bantuan dana untuk anak-anak yang membutuhkan, melalui berbagai program kegiatan galang dana. Berikut merupakan beberapa kegiatan galang dana yang telah terlaksana oleh organisasi kami adalah sebagai berikut:'),
(5, 'Visi3', 'Menyediakan Pasar Aksi Baik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id_activity`),
  ADD KEY `id_campaign` (`id_campaign`);

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`id_campaign`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id_content`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id_donations`),
  ADD UNIQUE KEY `id_donation` (`id_donations`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `visimisi`
--
ALTER TABLE `visimisi`
  ADD PRIMARY KEY (`id_visimisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id_activity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `id_campaign` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id_content` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id_donations` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `visimisi`
--
ALTER TABLE `visimisi`
  MODIFY `id_visimisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`id_campaign`) REFERENCES `campaign` (`id_campaign`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
