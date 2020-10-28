-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2020 at 07:44 AM
-- Server version: 10.1.46-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bahtera3_shippingportal`
--
CREATE DATABASE IF NOT EXISTS `bahtera3_shippingportal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bahtera3_shippingportal`;

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_agent` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_agent` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_city` int(11) NOT NULL,
  `postal` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pkp_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_agent` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_term` int(11) NOT NULL,
  `name_person` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_person` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_person` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax_person` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`id`, `code_agent`, `name_agent`, `address`, `id_city`, `postal`, `telp`, `fax`, `npwp`, `pkp_no`, `desc_agent`, `payment_term`, `name_person`, `phone_person`, `email_person`, `fax_person`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'A0001', 'Cahaya Esa', 'Jalan Mawar Indah no 12 Tangerang Banten', 2, '', '0213141333', '0213141333', '', '', '', 12, 'Maria Subrantyo', '087221222334', 'marias@gmail.com', '', 0, '2020-08-01 11:11:29', NULL, NULL),
(3, 'A0002', 'PELANGI JAYA', 'Jalan Raya Puputan No 108 Renon', 3, '80234', '0212221111', '0213333333', '71.2112.1121.1.111', '980', 'Agent Desc disini', 14, 'Bastian', 'bbaztanzi@gmail.com', '08123456123', '0361654433', 0, '2020-08-20 06:18:48', '2020-08-20 06:18:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_account`
--

CREATE TABLE `bank_account` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` int(11) NOT NULL,
  `bank_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_account`
--

INSERT INTO `bank_account` (`id`, `agent_id`, `bank_name`, `bank_account`, `branch`, `account_name`, `bank_address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'BCA', '6112223334', 'Jakarta', 'Maria Subrantyo', 'Jalan Raya Pusatnya Jakarta', '2020-08-01 11:12:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `consignee`
--

CREATE TABLE `consignee` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_consignee` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_consignee` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_invoice` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_city` int(11) NOT NULL,
  `postal` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pkp_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_consignee` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_term` int(11) NOT NULL,
  `name_person` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_person` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_person` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax_person` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consignee`
--

INSERT INTO `consignee` (`id`, `code_consignee`, `name_consignee`, `address_invoice`, `address`, `id_city`, `postal`, `telp`, `fax`, `npwp`, `pkp_no`, `desc_consignee`, `payment_term`, `name_person`, `phone_person`, `email_person`, `fax_person`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'C0186', 'Aloysius Purnomo', 'Jalan Raya Puputan No 108 Renon', 'Jalan Raya Puputan No 108 Renon Denpasar', 1, '80234', '0216667778', '0213333333', '71.2112.1121.1.111', '222', 'Desc consignee', 14, 'Bastian', '081524635271', '081524635271', '0361654433', '2020-08-21 23:48:33', '2020-08-21 23:48:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_customer` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_customer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_invoice` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_city` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `postal` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pkp_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_customer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_term` int(11) NOT NULL,
  `name_person` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_person` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax_person` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `code_customer`, `name_customer`, `address_invoice`, `address`, `id_city`, `entity_id`, `postal`, `telp`, `fax`, `npwp`, `pkp_no`, `desc_customer`, `payment_term`, `name_person`, `phone_person`, `email`, `fax_person`, `username`, `password`, `status`, `email_verified_at`, `verification_code`, `is_verified`, `created_at`, `updated_at`, `deleted_at`) VALUES
(31, 'R0001', 'siwi pandu', 'jalan jalan no 12', 'jalan jalan no 12', 2, 1, '60227', '031-7656662', '031-7656662', '454545454545', '0', '', 0, 'siwi pandu', '0812232323', 'irhamp12@gmail.com', '031-7656662', 'irham', '25d55ad283aa400af464c76d713c07ad', 0, NULL, '4f37ac5b242f8d97a9c418979615dd39d61661fb', 0, '2020-10-23 22:24:26', '2020-10-23 22:24:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `entity`
--

CREATE TABLE `entity` (
  `id` int(11) NOT NULL,
  `entity_name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entity`
--

INSERT INTO `entity` (`id`, `entity_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PT', '0000-00-00 00:00:00', NULL, NULL),
(2, 'CV', '0000-00-00 00:00:00', NULL, NULL),
(3, 'UD', '0000-00-00 00:00:00', NULL, NULL),
(4, 'TOKO', '0000-00-00 00:00:00', NULL, NULL),
(5, 'FA', '0000-00-00 00:00:00', NULL, NULL),
(6, 'YAYASAN', '0000-00-00 00:00:00', NULL, NULL),
(7, 'PD', '0000-00-00 00:00:00', NULL, NULL),
(8, 'LTD', '0000-00-00 00:00:00', NULL, NULL),
(9, 'PERORANGAN', '0000-00-00 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_city` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_city` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_loading` tinyint(1) NOT NULL DEFAULT '0',
  `status_pelayaran` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `code_city`, `name_city`, `province_city`, `status_loading`, `status_pelayaran`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '001', 'Ambon', 'Maluku', 0, 0, '2020-08-01 10:10:49', NULL, NULL),
(2, '006', 'Tangerang', 'Banten', 0, 0, '2020-08-01 10:12:38', NULL, NULL),
(3, '002', 'Jakarta Selatan', 'Jakarta', 0, 0, '2020-08-01 11:45:43', NULL, NULL),
(4, '003', 'Denpasar', 'Bali', 0, 0, '2020-08-22 00:57:06', '2020-08-22 00:57:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_25_134933_create_news_table', 1),
(5, '2020_07_25_134922_create_news_category_table', 1),
(6, '2020_07_25_135853_create_news_image_table', 1),
(7, '2020_08_01_165605_create_pelayaran_table', 1),
(8, '2020_08_01_171709_create_customer_table', 1),
(9, '2020_08_01_172147_create_agent_table', 1),
(10, '2020_08_01_172308_create_bank_account_table', 1),
(11, '2020_08_01_172558_create_tarif_table', 1),
(12, '2020_08_01_172907_create_consignee_table', 1),
(13, '2020_08_01_173155_create_vendor_truck_table', 1),
(14, '2020_08_01_173531_create_trucking_type_table', 1),
(15, '2020_08_01_173642_create_location_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_category_id` bigint(11) UNSIGNED NOT NULL,
  `location` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'id',
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `img_title`, `news_category_id`, `location`, `id_user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '<p>Luhut Mau Tawarkan <strong>Harta Karun</strong> RI ke AS</p>', '<p><strong>Jakarta</strong> - Menteri Koordinator Bidang Kemaritiman dan Investasi Luhut Binsar Pandjaitan mengaku akan menawarkan &#39;harta karun&#39; kepada negara-negara yang siap menjadi investor. Salah satunya yang akan ditawari adalah Amerika Serikat (AS).</p>\r\n\r\n<p>Dia mengaku investor yang sudah siap mengembangkan &#39;harta karun&#39; di Indonesia adalah China. Namun dirinya tidak ingin menyerahkan ke negeri Tirai Bambu ini demi menjaga iklim investasi nasional.</p>\r\n\r\n<p>&quot;Ini kita juga memang dilematis, karena rare earth kan paling banyak diproduksi di Tiongkok, Amerika sendiri begitu di banned oleh Tiongkok itu kelabakan juga. Nah investor yang paling cepat sekarang itu Tiongkok, nah kalau kita semua kasih Tiongkok nanti semua mental,&quot; kata Luhut dalam acara Investasi di tengah Pandemi secara virtual, Sabtu (25/7/2020).</p>', '1bb8e809-f04d-42de-8de7-ab3d239e5d9f_169.jpeg', 1, 'id', 1, '2020-08-05 21:16:38', '2020-08-05 21:16:38', NULL),
(2, 'Kabar Gembira! Penukaran Uang Khusus Rp 75 Ribu Dibuka Lagi', '<p><b>Jakarta</b> - Bank Indonesia (BI) akan kembali membuka penukaran uang rupiah khusus pecahan Rp 75 ribu. Kepala Departemen Pengelolaan Uang Marlison Hakim menjelaskan bank sentral melihat animo masyarakat dan antusiasme yang tinggi dengan penerbitan uang ini.</p>\r\n\r\n<p>\"Kami harap masyarakat luas makin cepat makin banyak dapat UPK (Uang Pecahan Khusus) ini, kami harap masyarakat luas makin cepat makin banyak dapat UPK ini,\" kata dia dalam konferensi pers, Senin (24/8/2020).</p>\r\n\r\n<p>Dia mengungkapkan, BI telah melakukan evaluasi dan memandang perlu percepatan untuk pengedaran uang ini. Namun tetap dilakukan secara aman dengan seluruh protokol COVID-19 yang ketat.</p>\r\n\r\n<p>Karena itu BI membuka kembali permohonan penukaran melalui aplikasi PINTAR untuk masyarakat. Selain itu BI juga membuka layanan penukaran secara kolektif kepada masyarakat seperti pegawai di Kementerian Lembaga, instansi, korporasi, asosiasi dan perkumpulan.</p>\r\n\r\n<p>\"Masyarakat juga bisa melakukan kolektif jika ingin mendapatkan uang kemerdekaan ini. Minimal 17 orang untuk 17 fotokopi KTP,\" jelas dia.</p>', 'uang-khusus-hut-ri-ke-75-2_169.png', 2, 'id', 1, NULL, NULL, NULL),
(3, 'Negosiasi Dagang Inggris-Uni Eropa Masih Buntu', '<p><b>Jakarta</b> - Negosiasi kesepakatan dagang antara Inggris dan Uni Eropa usai Brexit atau keluarnya Inggris dari Uni Eropa pada pekan lalu berujung buntu. Kedua belah pihak, sepakat diskusi akan diperpanjang 2 bulan lagi hingga pertengahan Oktober. Diskusi selanjutnya berlangsung pada 7 September mendatang.</p>\r\n\r\n<p>Negosiator UE, Michle Barnier mengatakan negosiasi perdagangan pekan lalu tidak mendapatkan terobosan baru karena mengarah ke permasalahan di luar agenda, seperti hak penangkapan ikan komersial. Hal ini dianggap Barnier hanya membuang-buang waktu dan sulit mencapai kesepakatan baru.</p>\r\n\r\n<p>\"Pada tahap ini, kesepakatan antara Inggris dan Uni Eropa tampaknya tidak mungkin. Saya benar-benar tidak mengerti mengapa kita membuang-buang waktu yang berharga,\" ujar Barnier, dikutip dari CNN, Senin (24/8/2020).\r\nSedangkan menurut negosiator Inggris David Frost kebijakan perikanan masih masuk dalam poin-poin penting. Frost menganggap kesepakatan dagang masih mungkin dilakukan, meski sulit.</p>\r\n\r\n<p>\"Ada bidang penting lainnya yang masih harus diselesaikan dan, bahkan ada pemahaman luas antara negosiator yang harus diselesaikan. Namun, waktu yang kita meiliki terlalu singkat,\" katanya.</p>\r\n\r\n<p>Perlu diketahui Inggris meninggalkan Uni Eropa pada bulan Januari tahun lalu. Tetapi ketentuan perdagangan dengan UE tidak berubah selama periode transisi yang akan berakhir pada akhir tahun 2020. Jika negosiator gagal untuk membuat kesepakatan baru, perusahaan Inggris akan menghadapi biaya perdagangan yang lebih tinggi.</p>\r\n\r\n<p>Pejabat UE dan Inggris mengatakan kesepakatan dagang ini diharapkan dapat memperbaiki ekonomi Inggris yang telah terpuruk sejak Brexit. Output ekonomi Inggris menyusut dengan rekor 20,4% pada kuartal-II 2020. Mendorong negara itu terperosok ke jurang resesi. Selain itu. sekitar 730 ribu pekerjaan telah dicabut, sejak pandemi virus Corona memaksa bisnis tutup pada Maret lalu.</p>', 'fcb0b271-6dae-42f0-bb63-d0ba54c321de_169.jpeg', 1, 'id', 1, NULL, NULL, NULL),
(4, 'Kemenhub Sebut 40% Perdagangan Dunia Lewat Laut RI, Dapat Untung?', '<p><b>Jakarta</b> - Kementerian Perhubungan (Kemenhub) menyatakan perairan di wilayah Indonesia punya peran penting dalam perdagangan internasional. Banyak kapal yang pengangkut barang sering melintasi perairan Indonesia.</p>\r\n\r\n<p>Dirjen Perhubungan Laut Kemenhub Agus H. Purnomo mengatakan lalu lintas kargo pengiriman barang di dunia barang 90%-nya dilakukan lewat jalur laut. Kemudian, hampir 50% pelayaran tersebut di melalui laut Indonesia.</p>\r\n\r\n<p>\"Hampir 50% atau sekitar 40% perdagangan di dunia itu melalui laut yang bersinggungan dengan Indonesia. Pengiriman kargo, 90% diangkut melalui laut, 40%-nya akan lewat di perairan Indonesia,\" papar Agus dalam webinar yang diadakan Kemenhub, Senin (24/8/2020).</p>\r\n\r\n<p>\"Ini luar biasa bagaimana kita bisa menangkap peluang ini sebaik-baiknya,\" lanjutnya.</p>\r\n\r\n<p>Menanggapi hal itu, Kemenhub sudah mengambil kebijakan untuk mengadopsi bagan pemisah lalu lintas atau Traffic Separation Scheme (TSS), yang ditetapkan di Selat Sunda dan Selat Lombok.</p>\r\n\r\n<p>TSS Selat Sunda dan Selat Lombok resmi diberlakukan sejak 1 Juli 2020. Hal ini akan meningkatkan profil dan citra Indonesia di lingkungan Internasional sebagai salah satu negara maritim.</p>\r\n\r\n<p>\"Di jalur perdagangan dunia, Indonesia ini sangat besar pengaruhnya. Ini saya sedikit sampaikan, TTS Selat Sunda dan Selat Lombok kita mulai berlakukan secara internasional per 1 Juli 2020. Ini salah satu di antara jalur pelayaran internasional yang melalui Indonesia,\" jelas Agus.</p>\r\n\r\n<p>Agus meneruskan pemerintah sedang fokus untuk menyiapkan sarana dan prasarana untuk mendukung konektivitas transportasi laut. Salah satunya dengan melakukan pembangunan pelabuhan di berbagai daerah.</p>\r\n\r\n<p>Selama ini menurutnya banyak pelabuhan yang belum mampu jadi sandaran kapal besar dengan kargo. Pihaknya sedang mengupayakan agar hal itu bisa terwujud, setidaknya ada 1.321 pelabuhan yang akan dibangun.</p>\r\n\r\n<p>\"Kalau kita lihat sebaran pelabuhan di seluruh Indonesia ada 28 pelabuhan utama dari Sabang ke Merauke. Dengan 4 main port dan kemudian masih ada 164 pelabuhan pengumpul, dan lokal juga banyak,\" ungkap Agus.</p>\r\n', '084bd603-0b34-4f4c-bd5c-4999fd9d23dc_169.jpg', 3, 'id', 1, NULL, NULL, NULL),
(5, 'Tambah 1.877, Kasus Positif Corona di RI Per 24 Agustus Jadi 155.412', '<p><b>Jakarta</b> - Kasus positif virus Corona (COVID-19) di Indonesia kembali bertambah. Hari ini kasus positif Corona di RI bertambah sebanyak 1.877.</p>\r\n\r\n<p>Pertambahan kasus Corona ini dikutip dari data yang diterima dari Humas BNPB, Senin (24/8/2020). Cut off time pengambilan data adalah pukul 12.00 WIB.</p>\r\n\r\n<p>Dengan penambahan 1.877, total kasus positif Corona di Indonesia menjadi 155.412. Selain kasus positif, jumlah pasien yang sembuh dari Corona bertambah.</p>\r\n\r\n<p>Terdapat penambahan jumlah pasien yang sembuh dari Corona sebanyak 3.560, sehingga total pasien yang telah sembuh dari Corona berjumlah 111.060.</p>\r\n\r\n<p>Untuk kasus pasien Corona yang meninggal juga bertambah. Terdapat penambahan jumlah pasien Corona yang meninggal sebanyak 79, sehingga totalnya menjadi 6.759.</p>\r\n\r\n<p>Pada Minggu (23/8), total kasus positif Corona di RI sebanyak 153.535. Total pasien yang sembuh berjumlah 107.500, sedangkan total pasien yang meninggal sebanyak 6.680.</p>', '5d30bbd1-6889-47a1-9f6f-9ea34721a977_169.jpeg', 5, 'id', 1, NULL, NULL, NULL),
(7, 'Bongkar Muat Pelabuhan Gresik Turun', '<p><b>KOTA</b> - Arus bongkar muat di Pelabuhan Gresik mengalami penurunan selama Semester I/2018. Akibatnya kinerja PT Pelabuhan Indonesia III Cabang Gresik ikut terkoreksi. Mereka menuding beroperasinya Terminal Untuk Kepentingan Sendiri (TUKS) menjadi penyebab turunnya kinerja itu.</p>\r\n\r\n<p>General Manager PT Pelindo III Cabang Gresik, Yanto mengungkapkan, sejak beroprasinya TUKS milik salah satu perusahaan di kawasan Manyar, pihaknya kehilangan potensi pendapatan. Terutama dari sektor bongkar muat Crude Palm Oil (CPO) yang mencapai 45.000 ton perbulan.</p>\r\n\r\n<p>Kondisi ini, kata dia, secara otomatis membuat bongkar muat di Pelabuhan Gresik untuk curah cair turun. Semester I/2017 tercatat 538,682 ton. Kemudian semester yang sama tahun ini turun menjadi 435,187 ton.</p>\r\n\r\n<p>Hasil yang sama juga terlihat dari bongkar muat curah kering. Pada semester I/2018 sektor ini mencatat penurunan menjadi 1.150 ton. Padahal periode yang sama tahun lalu membukukan angka 1.341 ton. “Secara total jumlah bongkar muat curah kering juga turun,\" ujar GM Pelabuhan Gresik.</p>\r\n\r\n<p>Namun untuk kargo umum ada kenaikan. Itu dikarenakan ada bongkar muat barang kontruksi dan tiang pancang milik PT Bahtera Setia. Sedangkan untuk batu bara dan log penurunan diakibatkan cuaca buruk.</p>\r\n\r\n<p>Dijelaskan, kinerja bongkar muat di pelabuhan Gresik juga banyak dipengaruhi atas diberikannya izin TUKS Maspion untuk melayani kegiatan bongkar muat umum. Ini berdampak pada menurunnya jumlah kunjungan kapal dari industri yang berada di wilayah Gresik Utara.</p>\r\n\r\n<p>Ketua Asosiasi Pengusaha Indonesia (Apindo) Gresik, Tri Andhi Suprihartono menilai, persaingan industri kepelabuhanan di Gresik semakin ketat. Ini menyusul semakin banyaknya pelabuhan baru di Gresik.</p>\r\n\r\n<p>“Agar tidak kalah bersaing, pelabuhan rakyat harus terus memperbaiki pelayanan dan menambah fasilitas bongkar muatnya,\" pungkas Andi.</p>\r\n\r\n<p>(sb/fir/ris/JPR)</p>', 'bongkar-muat-pelabuhan-gresik-turun-m-85744-300x200.jpg', 2, 'id', 1, '2020-09-07 06:34:34', NULL, NULL),
(8, 'Mulai 26 April, Pelabuhan Gresik Tutup Pelayanan Angkutan Orang', '<p>SuaraJatim.id - Kantor Kesyahbandaran dan Otoritas Pelabuhan (KSOP) Kelas II Gresik akhirnya menutup semua pelayanan angkutan orang di Pelabuhan Gresik, Minggu (26/4/2020).</p>\r\n\r\n<p>Penutupan pelabuhan merujuk surat Kementerian Perhubungan (Kemenhub) terkait larangan mudik.</p>\r\n\r\n<p>Pantauan di lapangan, kantor pelayanan yang menjadi tempat transit para penumpang kapal, mulai tampak lenggang.</p>\r\n\r\n<p>Tidak seperti satu hari sebelumnya, para penumpang terlihat berjubel mengantre tiket tujuan kapal ke Bawean. Namun hari ini, pemandangannya berbeda jauh.</p>\r\n\r\n<p>Kantor pelayanan yang biasa ramai orang kini sepi. Semua pintu pelabuhan ditutup.</p>\r\n\r\n<p>Di setiap kaca ada pengumuman. Isinya pemberitahuan terkait keputusan Menteri Perhubungan Nomor 25 Tahun 2020, yakni pengendalian transportasi selama musim mudik Idul Fitri dan pencegahan penyebaran virus Corona.</p>\r\n\r\n<p>Kasi Keselamatan Berlayar KSOP Gresik, Capt Masri T Randa Bunga mengatakan, penutupan pelayanan angkutan orang ini berlaku mulai 26 April 2020 hari ini sampai 31 Mei 2020.</p>\r\n\r\n<p>enutupan berkaitan larang pulang kampung dalam upaya pencegahan penyebaran virus Corona.</p>\r\n\r\n<p>\"Iya betul, semua kapal angkutan orang tidak melayani penumpang. Tapi kapal angkutan barang masih beroperasi,\" kata Masri saat ditemui di wilayah kerjanya Pelabuhan Gresik.</p>\r\n\r\n<p>Kendati demikian, pihaknya tetap mempersilahan Kapal Gili Iyang tetap beroperasi dengan rute Bawean-Gresik hanya boleh membawa sembako dan barang kebutuhan lainnya. Tidak boleh membawa penumpang orang.</p>\r\n\r\n<p>Penutupan pelabuhan juga berkaitan mencegah orang-orang yang nekat pulang kampung.</p>\r\n\r\n<p>Hal itu seperti terjadi pada, Jumat (24/4/2020) kemarin, ratusan orang dari perantauan memaksa berlayar ke Bawean untuk pulang kampung.</p>\r\n\r\n<p>\"Mestinya kemarin tidak boleh, karena aturan pusat sudah keluar terkait larangan mudik. Nah harapannya, dengan penutupan ini supaya mereka tidak lagi nekat pulang,\" jelasnya.</p>\r\n\r\n<p>\"Saya kira ini tepat sekali, apalagi kalau di kapal penyebaran virus tidak akan membutuhkan waktu lama. Orang di kapal, kalau satu kena, semua tertular, seperti Kapal Pelni ternyata ada 29 yang positif,\" ungkapnya.</p>\r\n\r\n<p>Kontributor : Amin Alamsyah</p>', '41429-pelabuhan-gresik-jawa-timur-1-653x366.jpg', 5, 'id', 1, '2020-09-07 06:34:34', NULL, NULL),
(9, 'Polisi Amankan 3 Pencuri Truk Trailer, 2 Pelaku Ditembak\r\n', '<p>GRESIK, KOMPAS.com – Sindikat pencuri kendaraan panjang atau biasa dikenal dengan sebutan truk trailer di wilayah Gresik dan sekitarnya, diungkap jajaran Kepolisian Resort (Polres) Gresik. Ada tiga pelaku yang berhasil diamankan petugas yakni, Zainal Mustofa (25) warga Waturoyo, Margoyoso, Pati. Kemudian Hahuk Arif Mujiono (37) warga Plumbon, Selopampang, Temanggung, dan Bangkit Setiawan (24) warga Bandarrejo, Benowo, Surabaya. “Untuk ZM (Zainal Mustofa) dan HAM (Hahuk Arif Mujiono) kami berikan tembakan di bagian kaki, karena melawan petugas saat hendak diamankan. Mereka berdua bertindak sebagai eksekutor alias yang mengambil truk pada kejadian 9 November 2017 dinihari lalu,” ujar Kasatreskrim Polres Gresik AKP Adam Purbantoro, Senin (18/12/2017). Adam mengatakan, Zainal dan Hahuk saat itu mencuri truk trailer Nissan Euro bernopol W 9545 UG milik PT Bahtera Setia, yang sedang tidak bermuatan dan terparkir di Pelabuhan Gresik.</p>\r\n\r\n<p>Mereka berdua memanfaatkan kelengahan sopir, yang saat itu tidak mengunci kabin truk dan ditinggal beristirahat. Sementara Bangkit Setiawan mengawasi area sekitar saat pencurian berlangsung. “Kebetulan juga kunci truk tertancap, sehingga begitu diketahui kabin tidak terkunci mereka dengan mudah membawa kabur truk keluar dari area pelabuhan. Mereka membawa truk menuju ruas tol Manyar, selanjutnya dibawa menuju arah Lamongan dan Tuban,” jelasnya. Namun tindakan para pelaku akhirnya diketahui petugas kepolisian, setelah melihat dan mengembangkan petunjuk dari rekaman CCTV yang terpasang di pintu keluar Pelabuhan Gresik dan juga Tol Manyar. “Sebenarnya mereka itu satu kelompok berjumlah tujuh orang, masih ada empat orang lagi yang masih dalam proses pengejaran. Mohon maaf tidak bisa kami ungkap inisialnya, karena khawatir mereka akan kabur jauh,” tutur Adam.</p>\r\n\r\n<p>Tidak hanya menyisakan sisa komplotan pencurian yang belum tertangkap, Kepolisian Gresik juga belum menemukan badan dari truk trailer yang dicuri. Karena barang bukti yang ditemukan, baru kepala truk beserta sepeda motor Yamaha Vixion dengan nopol S 4642 LZ. “Itu juga yang akan terus kami upayakan untuk diungkap, karena kemarin yang baru ditemukan petugas kepala truk, sementara badan truk belum. Dari pengakuan korban, memang tidak sedang mengangkut muatan apa-apa, tapi mudah-mudahan itu juga berhasil kami ungkap saat pelaku lain ditangkap,” ucapnya. Sementara itu, ada indikasi sindikat berencana menjual hasil truk curian tersebut, dengan cara menjual per bagian dari sparepart-nya di pasar gelap yang ada di Jawa Timur. “Saya sendiri kurang tahu mau diapakan barang itu (truk trailer) nantinya, karena terus terang baru pertama kali ikut. Ini saja sebelum ketangkap baru dibayar Rp1 juta, dan masih kurang dari yang dijanjikan mereka,” kata salah satu tersangka, Bangkit Setiawan. Akibat perbuatannya, para pelaku terancam Pasal 363 KUHP tentang Tindak Pidana Pencurian dengan Pemberatan, dengan ancaman hukuman lima tahun penjara.</p>', '1642194903-736x491.jpg', 3, 'id', 1, '2020-09-07 06:38:41', NULL, NULL),
(10, 'Premium Bonds issuer slashes chance of winning', '<p>National Savings and Investments (NS&I), which issues Premium Bonds, has slashed the interest rates it pays.\r\n\r\nThe dramatic cut will hit the savings of 25 million people who have invested with NS&I, which allows people to lend money to the government.\r\n\r\nIt will also reduce the chances of those who own Premium Bonds from winning any of the monthly prizes on offer, which include a £1m jackpot.\r\n\r\nSavers will soon have a one-in-34,500 chance, against one-in-24,500 now.\r\n\r\nIt is also slashing the number of £100,000 prizes from seven to four and £50,000 prizes from 14 to nine.\r\n\r\nFunding the crisis\r\nAs government spending increased to fund the response to the coronavirus crisis, so did the amount that NS&I was asked to raise for the government.\r\n\r\nIn July, its target was increased from £6bn to £35bn. In the first three months of its financial year to June, NS&I raised £14.5bn and it said demand had been \"similarly high\" in the second quarter, which finishes at the end of this month.\r\n\r\nThe savings scheme said some of its interest rates were above those offered by High Street banks, which caused a surge in demand.\r\n\r\n\"Reducing interest rates is always a difficult decision,\" said NS&I chief executive, Ian Ackerley.\r\n\r\n\"Given successive reductions in the Bank of England base rate in March, and subsequent reductions in interest rates by other providers, several of our products have become \'best buy\' and we have experienced extremely high demand as a consequence,\" he said.\r\n\r\n\"It is important that we strike a balance between the interests of savers, taxpayers and the broader financial services sector; and it is time for NS&I to return to a more normal competitive position for our products.\"\r\n\r\n\r\nMedia captionPremium Bonds numbers generator Ernie through the years\r\nThe changes to Premium Bonds will come in for the December prize draw.\r\n\r\nMeanwhile, interest rates on other products will be lower from 24 November - and they include some steep drops.\r\n\r\nNS&I\'s direct saver will offer just 0.15% interest, down from 1% before. Meanwhile, the rate on its income bonds will fall to 0.01%. It was previously 1.15%.\r\n\r\nThe rate on its investment account will also be 0.01% when the rates change, that\'s down from 0.8%. And the direct ISA will offer 0.1%, compared with the 0.9% savers get at the moment.\r\n\r\nKids will do a bit better, getting 1.5% interest from the junior ISA, although that is still well below the 3.25% they can get now.</p>', '_92168249_gettyimages-81631583.jpg', 2, 'en', 1, '2020-09-07 06:38:41', NULL, NULL),
(11, '<p>Brexit: Hauliers&#39; meeting with Michael Gove &#39;a washout&#39;</p>', '<p>The Road Haulage Association has described its meeting with Michael Gove about post-Brexit arrangements as &quot;a washout&quot;.</p>\r\n\r\n<p>The body said there had been &quot;no clarity&quot; from the senior minister on how border checks will operate when the transition period ends after December.</p>\r\n\r\n<p>Although the UK has left the EU, it has continued following some EU rules during the transition period.</p>\r\n\r\n<p>A Cabinet Office spokesperson said the meeting had been &quot;constructive&quot;.</p>\r\n\r\n<p>After the transition period traders will need to fill in customs declaration forms, with detailed information on what is being imported and exported.</p>\r\n\r\n<p>The haulage industry has expressed concern this could lead to long tailbacks at ports and disruption to supply chains.</p>\r\n\r\n<p>In Kent&nbsp;<a href=\"https://www.bbc.co.uk/news/uk-england-kent-54158100\">a coronavirus testing centre has been closed</a>&nbsp;to make way for a lorry park to accommodate post-Brexit customs checks.</p>\r\n\r\n<p><a href=\"https://www.bbc.co.uk/news/business-54172222\">And earlier this week Logistics UK</a>&nbsp;warned that a new freight management system - designed to reduce delays at ports - will not be ready when the transition period ends.</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://www.bbc.com/news/uk-england-kent-54158100\">Coronavirus test centre shut to become lorry park</a></li>\r\n	<li><a href=\"https://www.bbc.com/news/uk-54021421\">UK &#39;sleepwalking into disaster&#39; over border plans</a></li>\r\n	<li><a href=\"https://www.bbc.com/news/business-54116606\">UK and Japan in first major post-Brexit trade deal</a></li>\r\n</ul>\r\n\r\n<p>A meeting between the government and stakeholders was arranged to discuss industry concerns but Road Haulage Association chief executive Richard Burnett said that it &quot;fell far short of our expectations&quot;.</p>\r\n\r\n<p>&quot;The mutually effective co-operation we wanted to ensure seamless border crossings just didn&#39;t happen and there is still no clarity over the questions that we have raised,&quot; he said.</p>\r\n\r\n<p>&quot;Although I don&#39;t think we&#39;re quite back at square one, we&#39;re certainly not much further ahead.&quot;</p>\r\n\r\n<p>Chief executive of the Cold Chain Federation Shane Brennan who also attended the meeting said: &quot;There is no point pretending it&#39;s going to be smooth - we are heading for major delays and disruption - systems are not ready, processes are unclear, awareness of what will be required is low across industry</p>\r\n\r\n<p>&quot;We will need calm heads and a willingness from customs, food and security officials (on the U.K. and EU side) to make sensible, pragmatic, decisions, probably throughout 2021 as systems bed down and new ways of working emerge.&quot;</p>\r\n\r\n<p>A Cabinet Office spokesperson described the meeting as &quot;constructive&quot; and said government would &quot;continue to intensify engagement with industry in the weeks ahead so we can hit the ground running on 1 January 2021 and seize new opportunities&quot;.</p>\r\n\r\n<p>&quot;To help businesses prepare, we have launched a major communications campaign in the UK and EU, committed to investing &pound;705m in jobs, infrastructure and technology at the border and provided a &pound;84m support package to boost the capacity of the customs intermediary sector.&quot;</p>\r\n\r\n<p>Meanwhile informal talks aimed at agreeing a UK-EU trade deal are continuing in Brussels this week, ahead of another full-scale negotiation round later this month.</p>\r\n\r\n<p>A UK government spokesperson described the talks as &quot;useful&quot; and said &quot;some limited progress was made&quot; but added that &quot;significant gaps remain in key areas, including fisheries and subsidies&quot;.</p>\r\n\r\n<p>However the EU has warned that trade talks could be suspended unless the UK removes measures from its Internal Market Bill which could override parts of the original divorce deal.</p>', '1600738594.jpg', 5, 'en', 1, '2020-09-21 17:38:42', '2020-09-21 17:38:42', NULL),
(12, '<p>&#39;Nearly two-thirds&#39; of workers commuting again, says ONS</p>', '<p>Nearly two in three workers are now commuting again, as some employers ask their staff to return to offices during the pandemic.</p>\r\n\r\n<p>The Office for National Statistics (ONS) said that 62% of adult workers reported travelling to work last week.</p>\r\n\r\n<p>That compares with 36% in late May, soon after the ONS began compiling the figures during lockdown.</p>\r\n\r\n<p>The government has been encouraging workers to return to offices to help revive city centres.</p>\r\n\r\n<p>While the proportion of people travelling to work has increased, the ONS said 10% of the workforce remained on furlough leave.</p>\r\n\r\n<p>It added that 20% of workers continued to do so exclusively from home.</p>\r\n\r\n<p>The commuter data includes people who may be travelling to work exclusively, or they may be doing a mixture of commuting and working from home, the ONS said.</p>', '1600738805.jpg', 5, 'en', 1, '2020-09-21 17:44:44', '2020-09-21 17:44:44', NULL),
(13, '<h1>Khabib Nurmagomedov Timbang Badan, Ekspresinya Bikin Bertanya-tanya</h1>', '<p><strong>Abu Dhabi</strong>&nbsp;-&nbsp;</p>\r\n\r\n<p><a href=\"https://www.detik.com/tag/khabib-nurmagomedov\">Khabib Nurmagomedov</a>&nbsp;dan&nbsp;<a href=\"https://www.detik.com/tag/justin-gaethje\">Justin Gaethje&nbsp;</a>baru saja beres timbang berat badan. Ekspresi Khabib bikin pecinta&nbsp;<a href=\"https://www.detik.com/tag/ufc\">UFC&nbsp;</a>bertanya-tanya.</p>\r\n\r\n<p>UFC 254&nbsp;<a href=\"https://www.detik.com/tag/khabib-nurmagomedov-vs-justin-gaethje\">Khabib Nurmagomedov vs Justin Gaethje</a>&nbsp;bakal berlangsung pada Minggu, 25 Oktober pukul 01.00 WIB di Fight Island, Abu Dhabi yang bisa disaksikan via Live Streaming ESPN. Khabib &#39;The Eagle&#39; pemegang sabuk juara kelas ringan bakal coba mempertahankan titel itu dari Justin &#39;The Highlight&#39; selaku juara interm kelas ringannya.</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>Baca juga:&nbsp;</strong><a href=\"https://sport.detik.com/sport-lain/d-5225536/allahu-akbar-saat-khabib-nurmagomedov-jadi-imam-salat\">Allahu Akbar, Saat Khabib Nurmagomedov Jadi Imam Salat</a></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Sesi weigh-in alias timbang berat badan pun baru beres digelar.&nbsp;<a href=\"https://www.detik.com/tag/khabib-nurmagomedov\">Khabib Nurmagomedov</a>&nbsp;dan&nbsp;<a href=\"https://www.detik.com/tag/justin-gaethje\">Justin Gaethje</a>&nbsp;harus memangkas berat badan mereka jadi 155 pound atau setara 70 kg.</p>', '1603523062.jpg', 6, 'id', 48, '2020-10-24 00:04:22', '2020-10-24 00:04:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

CREATE TABLE `news_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_category`
--

INSERT INTO `news_category` (`id`, `name`, `id_user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Finance', 1, NULL, NULL, NULL),
(2, 'Bisnis', 1, NULL, NULL, NULL),
(3, 'Politic', 1, '2020-08-05 12:52:22', '2020-08-05 12:52:22', NULL),
(5, 'Transportation', 1, '2020-10-23 23:47:22', '2020-10-23 23:47:22', NULL),
(6, 'Sport', 1, '2020-10-23 23:53:20', '2020-10-23 23:53:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news_image`
--

CREATE TABLE `news_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_id` bigint(11) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_image`
--

INSERT INTO `news_image` (`id`, `img`, `news_id`, `id_user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1bb8e809-f04d-42de-8de7-ab3d239e5d9f_169.jpeg', 1, 1, '2020-08-01 16:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelayaran`
--

CREATE TABLE `pelayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_pelayaran` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_pelayaran` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_city` int(11) NOT NULL,
  `postal` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pkp_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_pelayaran` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_term` int(11) NOT NULL,
  `name_person` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_person` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_person` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax_person` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelayaran`
--

INSERT INTO `pelayaran` (`id`, `code_pelayaran`, `name_pelayaran`, `alias`, `address`, `id_city`, `postal`, `telp`, `fax`, `npwp`, `pkp_no`, `desc_pelayaran`, `payment_term`, `name_person`, `phone_person`, `email_person`, `fax_person`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'P0001', 'Indo Countainer Line, PT', 'ICON', 'Jalan Kesana Kemari no 098 Jakarta Selatan', 3, '80234', '0214356764', '0214356764', '71.2112.1121.1.111', '980', 'Pelayaran Desc', 14, 'Aji', '08767676744', '08767676744', '0361654433', '2020-08-01 11:44:11', '2020-08-20 23:06:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `detail_id` text NOT NULL,
  `detail_en` text NOT NULL,
  `img_title` varchar(250) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `title`, `detail_id`, `detail_en`, `img_title`, `id_user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Port to Port', '<p>Port to Port dapat diartikan dimana shipper atau pengirim barang mengantarkan barang kirimannya ke perusahaan pengiriman yang telah ditunjuk ditempat asal shipper, dan dikirim ke port penerima barang. Serta penerima barang atau consignee tersebut juga mengambil sendiri di port yang telah ditentukan oleh consignee sendiri.</p>', '<p>Port to Port can be defined as where the shipper or sender of goods delivers their shipment to the delivery company that has been appointed at the place of origin of the shipper, and sent to the port of the consignee. And the consignee or consignee also picks up himself at the port that has been determined by the consignee himself.</p>', 'background1.jpg', 1, '2020-09-22 02:20:54', '2020-09-22 02:20:54', NULL),
(2, 'Door to Door', 'Door to Door service dalam dunia cargo merupakan sebuah layanan dengan metode pengiriman sebuah barang akan dijemput atau di-pickup pada lokasi pengirim dan diantar menuju lokasi penerima barang atau consignee.', 'Door to Door service in the world of cargo is a service in which an item will be picked up or picked up at the sender\'s location and delivered to the consignee\'s location.', 'background2.jpg', 1, '2020-09-17 11:50:48', NULL, NULL),
(3, 'Less Container Loaded (LCL)', 'Less Container Loaded merupakan jenis pengiriman barang tanpa menggunakan container dengan kata lain parsial. Jika kita menggunakan jenis pengiriman Less Container Loaded, maka barang yang kita kirim itu ditujukan ke Gudang penumpukan dari shipping agent. Lalu dari pihak Gudang tersebut akan mengumpulkan barang-barang kiriman Less Container Loaded lain hingga memenuhi quota untuk di-loading / di-muat ke dalam container.', 'Less Container Loaded is a type of delivery without using a container, in other words, partial. If we use the Less Container Loaded shipping type, then the goods we send are addressed to the storage warehouse from the shipping agent. Then the warehouse will collect other Less Container Loaded shipments to meet the quota to be loaded / loaded into the container.', 'background1.jpg', 1, '2020-09-17 12:06:36', NULL, NULL),
(4, 'International Shipment', 'International Shipment adalah istilah yang digunakan untuk menggambarkan pengiriman paket atau kelompok pengiriman paket dimana paket tersebut diambil dari satu negara dan dikirim ke alamat di negara lain.', 'International Shipment is a term used to describe package delivery or group delivery of parcels where packages are picked up from one country and sent to an address in another country.', 'background2.jpg', 1, '2020-09-17 12:06:36', NULL, NULL),
(5, 'Asuransi MAG', 'ASURANSI MAG memberikan perlindungan terhadap kehilangan dan kerusakan pada kargo yang akibat dari bahaya laut yang terjadi selama pengangkutan kargo Anda, baik melalui laut maupun darat. Dengan menyertakan Asuransi MAG pada pengiriman, kargo Anda diberikan jaminan ICC A yang akan melindungi kargo dari cuaca ekstrem, kebakaran, atau bahaya laut yang dapat mengakibatkan kehilangan atau kerusakan muatan sehingga Anda akan lebih tenang ketika mengirimkan barang bersama BAHTERA.', 'MAG INSURANCE provides protection against loss and damage to cargo as a result of marine hazards that occur during the transportation of your cargo, either by sea or land. By including MAG Insurance on the shipment, your cargo is given ICC A guarantee which will protect the cargo from extreme weather, fire, or sea hazards that can cause loss or damage to the cargo so that you will be more calm when sending goods with BAHTERA.', 'background1.jpg', 1, '2020-09-17 12:06:36', NULL, NULL),
(6, 'Warehousing', 'Sebagai perusahaan layanan logistik yang terintegrasi, BAHTERA menyediakan gudang modern yang didukung dengan konsep desain modern, lokasi strategis, dan memiliki akses cepat dari depo kontainer untuk pengiriman antar pulau.', 'As an integrated logistics service company, BAHTERA provides a modern warehouse that is supported by a modern design concept, a strategic location, and has fast access from container depots for inter-island shipping.', 'background2.jpg', 1, '2020-09-17 12:06:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider_home`
--

CREATE TABLE `slider_home` (
  `id` int(11) NOT NULL,
  `img_title` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider_home`
--

INSERT INTO `slider_home` (`id`, `img_title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1603521232.jpg', '2020-10-24 06:33:52', '2020-10-24 06:33:52', NULL),
(2, 'whatsapp-image-2020-08-06-at-17.25.43-1280x635.jpg', '2020-09-07 16:38:50', NULL, NULL),
(3, 'whatsapp-image-2020-08-06-at-17.25.44-1-1111x790.jpg', '2020-09-07 16:39:32', NULL, NULL),
(4, 'whatsapp-image-2020-08-06-at-17.25.44-1280x665.jpg', '2020-09-07 16:39:32', NULL, NULL),
(5, 'whatsapp-image-2020-08-06-at-17.25.45-1-1072x790.jpg', '2020-09-07 16:39:32', NULL, NULL),
(6, 'whatsapp-image-2020-08-06-at-17.25.46-1-1173x782.jpg', '2020-09-07 16:39:32', NULL, NULL),
(7, 'whatsapp-image-2020-08-06-at-17.25.47-1-1044x783.jpg', '2020-09-07 16:39:32', NULL, NULL),
(10, '1603511141.jpg', '2020-10-24 03:45:41', '2020-10-24 03:45:41', NULL),
(11, '1603506821.jpg', '2020-10-24 02:33:41', '2020-10-24 02:33:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelayaran_id` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `date` datetime NOT NULL,
  `pic_pelayaran` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_price1` bigint(20) NOT NULL DEFAULT '0',
  `last_price2` bigint(20) NOT NULL DEFAULT '0',
  `last_price3` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id`, `pelayaran_id`, `id_city`, `price`, `date`, `pic_pelayaran`, `last_price1`, `last_price2`, `last_price3`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 6900000, '2020-08-02 00:00:00', 'Bastian', 7000000, 6800000, 7100000, '2020-08-21 04:49:10', '2020-08-21 04:49:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` varchar(150) NOT NULL,
  `testimoni` text NOT NULL,
  `img_testimoni` varchar(250) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `name`, `position`, `testimoni`, `img_testimoni`, `id_user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Marina', 'Direktur Utama Andalus', '<p>Kami telah bekerjasama dengan PT. BAHTERA SETIA selama kurang lebih 24 tahun, dan saya salut dengan pelayanan yang diberikan oleh PT. BAHTERA SETIA karena kesigapannya merespon. juga memiliki banyak rute dan yang terpenting saya bisa memonitor pengiriman saya kapanpun dan dimanapun jadi lebih tenang. Semoga kedepan PT. BAHTERA SETIA semakin maju</p>', '1603521416.jpg', 48, '2020-10-24 06:36:56', '2020-10-24 06:36:56', NULL),
(2, 'Fahmi Akbar Pasetya', 'Direktur Utama PNM', 'Kami telah bekerjasama dengan PT. BAHTERA SETIA selama kurang lebih 24 tahun, dan saya salut dengan pelayanan yang diberikan oleh PT. BAHTERA SETIA karena kesigapannya merespon. juga memiliki banyak rute dan yang terpenting saya bisa memonitor pengiriman saya kapanpun dan dimanapun jadi lebih tenang. Semoga kedepan PT. BAHTERA SETIA semakin maju', 'bp5ae2s20181119-81050-400x300.jpeg', 1, '2020-09-07 14:23:20', NULL, NULL),
(3, 'Fahmi Akbar Pasetya', 'Direktur Utama PNM', 'Kami telah bekerjasama dengan PT. BAHTERA SETIA selama kurang lebih 24 tahun, dan saya salut dengan pelayanan yang diberikan oleh PT. BAHTERA SETIA karena kesigapannya merespon. juga memiliki banyak rute dan yang terpenting saya bisa memonitor pengiriman saya kapanpun dan dimanapun jadi lebih tenang. Semoga kedepan PT. BAHTERA SETIA semakin maju', 'bp5ae2s20181119-81050-400x300.jpeg', 1, '2020-09-07 14:23:21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `longitude` varchar(25) NOT NULL,
  `latitude` varchar(25) NOT NULL,
  `description` text,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`id`, `transaction_id`, `longitude`, `latitude`, `description`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, '112.734736', '-7.198816', 'Masih dalam pelayaran dari Pelabuhan Tanjung Perak Surabaya Jawa Timur', '2020-09-20 09:44:23', '2020-09-20 21:02:36', '2020-09-30 11:41:16'),
(2, 1, '115.210980', '-8.746139', 'Telah sampai di Pelabuhan Benoa Bali', '2020-09-22 09:44:23', '2020-09-22 21:02:36', '2020-09-30 11:41:16'),
(3, 1, '118.979291', '-5.962502', 'Posisi di Laut Makassar akan bersandar di Pelabuhan Makassar', '2020-09-26 09:44:23', '2020-09-26 21:04:43', '2020-09-30 11:41:16'),
(4, 8, '115.2091981', '-8.7451341', 'Bersandar Pelabuhan Benoa Bali', '2020-09-29 09:40:22', '2020-09-30 03:41:26', '2020-09-30 03:56:15'),
(5, 11, '115.2091981', '-8.7451341', 'Posisi di Laut Makassar akan bersandar di Pelabuhan Makassar', '2020-10-24 01:51:22', '2020-10-24 05:58:47', '2020-10-24 06:02:21'),
(6, 11, '112.650600', '-7.163132', 'pelabuhan gresik', '2020-10-25 01:07:47', '2020-10-24 06:08:25', '2020-10-24 06:08:25'),
(7, 12, '115.209198', '-8.745134', 'Pelabuhan Gresik Jawa Timur', '2020-10-26 02:14:21', '2020-10-24 06:17:34', '2020-10-24 06:17:34'),
(8, 12, '114.623616', '-8.020557', 'Laut Bali', '2020-10-27 01:26:31', '2020-10-24 06:28:17', '2020-10-24 06:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `trans_no` varchar(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_no` varchar(20) DEFAULT NULL,
  `loading_date` datetime NOT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `vendor_truck_id` int(11) DEFAULT NULL,
  `location_id` int(11) NOT NULL,
  `pelayaran_id` int(11) DEFAULT NULL,
  `resi_no` bigint(12) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `trans_no`, `customer_id`, `shipping_no`, `loading_date`, `agent_id`, `vendor_truck_id`, `location_id`, `pelayaran_id`, `resi_no`, `status`) VALUES
(1, 'TR2020090001', 5, '1', '2020-09-29 20:56:51', 1, 1, 2, 1, 123456789012, 0),
(8, 'TR2020090002', 5, '12345', '2020-09-28 00:00:00', 1, 3, 3, 1, 181292669100, 0),
(9, 'TR2020090003', 5, NULL, '2020-09-30 00:00:00', NULL, NULL, 1, NULL, 166386482400, 0),
(10, 'TR2020090004', 5, NULL, '2020-09-29 00:00:00', NULL, NULL, 3, NULL, 19969298400, 0),
(11, 'TR2020100005', 31, NULL, '2020-10-24 00:00:00', NULL, NULL, 1, NULL, 158489259800, 0),
(12, 'TR2020100006', 31, NULL, '2020-10-24 00:00:00', NULL, NULL, 1, NULL, 155858176900, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `consignee_id` int(11) NOT NULL,
  `comodity` varchar(100) NOT NULL,
  `weight` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `package_unit` varchar(150) DEFAULT NULL,
  `length` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `volume` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`id`, `transaction_id`, `consignee_id`, `comodity`, `weight`, `quantity`, `package_unit`, `length`, `width`, `height`, `volume`) VALUES
(1, 1, 1, 'Kayu Gelondongan', 500, 100, NULL, 10, 8, 5, 400),
(2, 1, 2, 'Furniture', 20, 500, NULL, 2, 4, 3, 24),
(7, 8, 1, 'Kayu Balok', 100, 100, 'Kayu', 15, 2, 1, 30),
(8, 8, 1, 'Furniture Meja', 50, 200, 'Meja', 3, 2, 1, 6),
(9, 9, 1, 'Kayu Balok 1', 50, 100, 'Kayu', 15, 1, 1, 15),
(10, 9, 1, 'Kayu Balok 2', 100, 100, 'Kayu', 13, 2, 2, 52),
(11, 9, 1, 'Kayu Balok 3', 54, 41, 'Kayu', 2, 4, 1, 8),
(12, 10, 1, 'Kayu Balok 1', 50, 100, 'Kayu', 15, 1, 1, 15),
(13, 10, 1, 'Kayu Balok 2', 10, 200, 'Kayu', 4, 3, 2, 24),
(14, 11, 1, 'beras', 1000, 12, 'tonas', 1, 1, 1, 1),
(15, 12, 1, 'beras', 1000, 12, 'tonas', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trucking_type`
--

CREATE TABLE `trucking_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_trucking` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trucking_type`
--

INSERT INTO `trucking_type` (`id`, `name_trucking`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '20 feets', '2020-08-01 17:46:07', NULL, '0000-00-00 00:00:00'),
(2, '40 feets', '2020-08-01 17:46:07', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT '0',
  `role` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `verification_code`, `is_verified`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bastian', 'bbaztanzi@gmail.com', '2020-07-23 05:09:52', '$2y$10$FQikHO2fLUeGkN3JS4zCyeuuuni6vcWCHYKDnPBeLTQ3ClKq159om', NULL, 0, NULL, NULL, '2020-07-23 05:07:52', '2020-07-23 05:07:52'),
(2, 'Andy Bastian', 'andybastian90@gmail.com', '2020-09-05 15:12:34', '$2y$10$x0tIfGVY.gGYkquTKgM.sOJ2msPApRNV/iIgHax06d5pk/rzXEzMS', NULL, 0, NULL, NULL, '2020-09-05 07:46:17', '2020-09-05 15:12:34'),
(48, 'bahtera', 'bahterasetia423@gmail.com', NULL, '$2y$10$kPva.843UX7yuhyQDRy.uOV7A1ADltRYdpVnLaQkPP1woKGmCyjs6', 'e8149b9f914c3e4638737702febbaef049cca0a6', 1, NULL, NULL, '2020-10-23 19:09:00', '2020-10-23 19:10:14'),
(50, 'irhamsyah', 'irhamp12@gmail.com', NULL, '$2y$10$hBkdCZXXvVBD0zniNcokE.5bRK/42Sd57DZPOa3DpoGls4bkPUbXm', '6b0abc1ef922e0693fb86aac30ced961cd6c7a9a', 1, NULL, NULL, '2020-10-23 20:35:26', '2020-10-23 20:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_truck`
--

CREATE TABLE `vendor_truck` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_vendor` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_vendor` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_term` int(11) NOT NULL,
  `trucking_type_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_truck`
--

INSERT INTO `vendor_truck` (`id`, `code_vendor`, `name_vendor`, `address`, `telp`, `payment_term`, `trucking_type_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'V00043', 'Bumi Satria Persada, PT', 'Jakarta', '0219876789', 14, 1, '2020-08-01 17:50:34', NULL, NULL),
(2, 'V00043', 'Bumi Satria Persada, PT', 'Jakarta', '0219876789', 14, 2, '2020-08-01 17:50:34', NULL, NULL),
(3, 'V0022', 'Abadi Kokoh Insani, PT', 'Surabaya', '0319874452', 14, 1, '2020-08-01 17:51:32', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_account`
--
ALTER TABLE `bank_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consignee`
--
ALTER TABLE `consignee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entity`
--
ALTER TABLE `entity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `NewsCate` (`news_category_id`);

--
-- Indexes for table `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_image`
--
ALTER TABLE `news_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `News` (`news_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `pelayaran`
--
ALTER TABLE `pelayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_home`
--
ALTER TABLE `slider_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trucking_type`
--
ALTER TABLE `trucking_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_trucking` (`name_trucking`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_truck`
--
ALTER TABLE `vendor_truck`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `entity`
--
ALTER TABLE `entity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider_home`
--
ALTER TABLE `slider_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `NewsCate` FOREIGN KEY (`news_category_id`) REFERENCES `news_category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
