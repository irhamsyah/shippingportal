-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Sep 2020 pada 02.00
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shippingportal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agent`
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
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `agent`
--

INSERT INTO `agent` (`id`, `code_agent`, `name_agent`, `address`, `id_city`, `postal`, `telp`, `fax`, `npwp`, `pkp_no`, `desc_agent`, `payment_term`, `name_person`, `phone_person`, `email_person`, `fax_person`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'A0001', 'Cahaya Esa', 'Jalan Mawar Indah no 12 Tangerang Banten', 2, '', '0213141333', '0213141333', '', '', '', 12, 'Maria Subrantyo', '087221222334', 'marias@gmail.com', '', 0, '2020-08-01 11:11:29', NULL, NULL),
(3, 'A0002', 'PELANGI JAYA', 'Jalan Raya Puputan No 108 Renon', 3, '80234', '0212221111', '0213333333', '71.2112.1121.1.111', '980', 'Agent Desc disini', 14, 'Bastian', 'bbaztanzi@gmail.com', '08123456123', '0361654433', 0, '2020-08-20 06:18:48', '2020-08-20 06:18:48', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_account`
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
-- Dumping data untuk tabel `bank_account`
--

INSERT INTO `bank_account` (`id`, `agent_id`, `bank_name`, `bank_account`, `branch`, `account_name`, `bank_address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'BCA', '6112223334', 'Jakarta', 'Maria Subrantyo', 'Jalan Raya Pusatnya Jakarta', '2020-08-01 11:12:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `consignee`
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
-- Dumping data untuk tabel `consignee`
--

INSERT INTO `consignee` (`id`, `code_consignee`, `name_consignee`, `address_invoice`, `address`, `id_city`, `postal`, `telp`, `fax`, `npwp`, `pkp_no`, `desc_consignee`, `payment_term`, `name_person`, `phone_person`, `email_person`, `fax_person`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'C0186', 'Aloysius Purnomo', 'Jalan Raya Puputan No 108 Renon', 'Jalan Raya Puputan No 108 Renon Denpasar', 1, '80234', '0216667778', '0213333333', '71.2112.1121.1.111', '222', 'Desc consignee', 14, 'Bastian', '081524635271', '081524635271', '0361654433', '2020-08-21 23:48:33', '2020-08-21 23:48:33', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_customer` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_customer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_invoice` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_city` int(11) NOT NULL,
  `postal` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pkp_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_customer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_term` int(11) NOT NULL,
  `name_person` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_person` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_person` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax_person` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `code_customer`, `name_customer`, `address_invoice`, `address`, `id_city`, `postal`, `telp`, `fax`, `npwp`, `pkp_no`, `desc_customer`, `payment_term`, `name_person`, `phone_person`, `email_person`, `fax_person`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'R0001', 'ASIAN PRIMA INDOSTEEL, PT', 'Jalan Pemuda No 100 Tangerang Banten', 'Jalan Pemuda No 100 Tangerang Banten', 2, '0', '0217422321', '', '', '', '', 14, 'Marco Olivera', '081234521233', 'marcovera@gmail.com', '0217422321', 0, '2020-08-01 10:14:14', NULL, NULL),
(2, 'R0002', 'INDONESIA STEEL, PT', 'Jalan Raya Puputan No 108 Renon', 'Jalan Raya Puputan No 108 Renon Denpasar', 3, '80234', '0212221112', '0213332222', '71.2112.1121.1.111', '980', 'Description', 14, 'Bastian', 'bbaztanzi@gmail.com', '082233222333', '0361654433', 0, '2020-08-18 21:04:48', '2020-08-18 21:04:48', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `location`
--

CREATE TABLE `location` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_city` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_city` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_loading` tinyint(1) NOT NULL DEFAULT 0,
  `status_pelayaran` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `location`
--

INSERT INTO `location` (`id`, `code_city`, `name_city`, `province_city`, `status_loading`, `status_pelayaran`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '001', 'Ambon', 'Maluku', 0, 0, '2020-08-01 10:10:49', NULL, NULL),
(2, '006', 'Tangerang', 'Banten', 0, 0, '2020-08-01 10:12:38', NULL, NULL),
(3, '002', 'Jakarta Selatan', 'Jakarta', 0, 0, '2020-08-01 11:45:43', NULL, NULL),
(4, '003', 'Denpasar', 'Bali', 0, 0, '2020-08-22 00:57:06', '2020-08-22 00:57:06', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_category_id` bigint(11) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `img_title`, `news_category_id`, `id_user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '<p>Luhut Mau Tawarkan <strong>Harta Karun</strong> RI ke AS</p>', '<p><strong>Jakarta</strong> - Menteri Koordinator Bidang Kemaritiman dan Investasi Luhut Binsar Pandjaitan mengaku akan menawarkan &#39;harta karun&#39; kepada negara-negara yang siap menjadi investor. Salah satunya yang akan ditawari adalah Amerika Serikat (AS).</p>\r\n\r\n<p>Dia mengaku investor yang sudah siap mengembangkan &#39;harta karun&#39; di Indonesia adalah China. Namun dirinya tidak ingin menyerahkan ke negeri Tirai Bambu ini demi menjaga iklim investasi nasional.</p>\r\n\r\n<p>&quot;Ini kita juga memang dilematis, karena rare earth kan paling banyak diproduksi di Tiongkok, Amerika sendiri begitu di banned oleh Tiongkok itu kelabakan juga. Nah investor yang paling cepat sekarang itu Tiongkok, nah kalau kita semua kasih Tiongkok nanti semua mental,&quot; kata Luhut dalam acara Investasi di tengah Pandemi secara virtual, Sabtu (25/7/2020).</p>', '1bb8e809-f04d-42de-8de7-ab3d239e5d9f_169.jpeg', 1, 1, '2020-08-05 21:16:38', '2020-08-05 21:16:38', NULL),
(2, 'Kabar Gembira! Penukaran Uang Khusus Rp 75 Ribu Dibuka Lagi', '<p><b>Jakarta</b> - Bank Indonesia (BI) akan kembali membuka penukaran uang rupiah khusus pecahan Rp 75 ribu. Kepala Departemen Pengelolaan Uang Marlison Hakim menjelaskan bank sentral melihat animo masyarakat dan antusiasme yang tinggi dengan penerbitan uang ini.</p>\r\n\r\n<p>\"Kami harap masyarakat luas makin cepat makin banyak dapat UPK (Uang Pecahan Khusus) ini, kami harap masyarakat luas makin cepat makin banyak dapat UPK ini,\" kata dia dalam konferensi pers, Senin (24/8/2020).</p>\r\n\r\n<p>Dia mengungkapkan, BI telah melakukan evaluasi dan memandang perlu percepatan untuk pengedaran uang ini. Namun tetap dilakukan secara aman dengan seluruh protokol COVID-19 yang ketat.</p>\r\n\r\n<p>Karena itu BI membuka kembali permohonan penukaran melalui aplikasi PINTAR untuk masyarakat. Selain itu BI juga membuka layanan penukaran secara kolektif kepada masyarakat seperti pegawai di Kementerian Lembaga, instansi, korporasi, asosiasi dan perkumpulan.</p>\r\n\r\n<p>\"Masyarakat juga bisa melakukan kolektif jika ingin mendapatkan uang kemerdekaan ini. Minimal 17 orang untuk 17 fotokopi KTP,\" jelas dia.</p>', 'uang-khusus-hut-ri-ke-75-2_169.png', 2, 1, NULL, NULL, NULL),
(3, 'Negosiasi Dagang Inggris-Uni Eropa Masih Buntu', '<p><b>Jakarta</b> - Negosiasi kesepakatan dagang antara Inggris dan Uni Eropa usai Brexit atau keluarnya Inggris dari Uni Eropa pada pekan lalu berujung buntu. Kedua belah pihak, sepakat diskusi akan diperpanjang 2 bulan lagi hingga pertengahan Oktober. Diskusi selanjutnya berlangsung pada 7 September mendatang.</p>\r\n\r\n<p>Negosiator UE, Michle Barnier mengatakan negosiasi perdagangan pekan lalu tidak mendapatkan terobosan baru karena mengarah ke permasalahan di luar agenda, seperti hak penangkapan ikan komersial. Hal ini dianggap Barnier hanya membuang-buang waktu dan sulit mencapai kesepakatan baru.</p>\r\n\r\n<p>\"Pada tahap ini, kesepakatan antara Inggris dan Uni Eropa tampaknya tidak mungkin. Saya benar-benar tidak mengerti mengapa kita membuang-buang waktu yang berharga,\" ujar Barnier, dikutip dari CNN, Senin (24/8/2020).\r\nSedangkan menurut negosiator Inggris David Frost kebijakan perikanan masih masuk dalam poin-poin penting. Frost menganggap kesepakatan dagang masih mungkin dilakukan, meski sulit.</p>\r\n\r\n<p>\"Ada bidang penting lainnya yang masih harus diselesaikan dan, bahkan ada pemahaman luas antara negosiator yang harus diselesaikan. Namun, waktu yang kita meiliki terlalu singkat,\" katanya.</p>\r\n\r\n<p>Perlu diketahui Inggris meninggalkan Uni Eropa pada bulan Januari tahun lalu. Tetapi ketentuan perdagangan dengan UE tidak berubah selama periode transisi yang akan berakhir pada akhir tahun 2020. Jika negosiator gagal untuk membuat kesepakatan baru, perusahaan Inggris akan menghadapi biaya perdagangan yang lebih tinggi.</p>\r\n\r\n<p>Pejabat UE dan Inggris mengatakan kesepakatan dagang ini diharapkan dapat memperbaiki ekonomi Inggris yang telah terpuruk sejak Brexit. Output ekonomi Inggris menyusut dengan rekor 20,4% pada kuartal-II 2020. Mendorong negara itu terperosok ke jurang resesi. Selain itu. sekitar 730 ribu pekerjaan telah dicabut, sejak pandemi virus Corona memaksa bisnis tutup pada Maret lalu.</p>', 'fcb0b271-6dae-42f0-bb63-d0ba54c321de_169.jpeg', 1, 1, NULL, NULL, NULL),
(4, 'Kemenhub Sebut 40% Perdagangan Dunia Lewat Laut RI, Dapat Untung?', '<p><b>Jakarta</b> - Kementerian Perhubungan (Kemenhub) menyatakan perairan di wilayah Indonesia punya peran penting dalam perdagangan internasional. Banyak kapal yang pengangkut barang sering melintasi perairan Indonesia.</p>\r\n\r\n<p>Dirjen Perhubungan Laut Kemenhub Agus H. Purnomo mengatakan lalu lintas kargo pengiriman barang di dunia barang 90%-nya dilakukan lewat jalur laut. Kemudian, hampir 50% pelayaran tersebut di melalui laut Indonesia.</p>\r\n\r\n<p>\"Hampir 50% atau sekitar 40% perdagangan di dunia itu melalui laut yang bersinggungan dengan Indonesia. Pengiriman kargo, 90% diangkut melalui laut, 40%-nya akan lewat di perairan Indonesia,\" papar Agus dalam webinar yang diadakan Kemenhub, Senin (24/8/2020).</p>\r\n\r\n<p>\"Ini luar biasa bagaimana kita bisa menangkap peluang ini sebaik-baiknya,\" lanjutnya.</p>\r\n\r\n<p>Menanggapi hal itu, Kemenhub sudah mengambil kebijakan untuk mengadopsi bagan pemisah lalu lintas atau Traffic Separation Scheme (TSS), yang ditetapkan di Selat Sunda dan Selat Lombok.</p>\r\n\r\n<p>TSS Selat Sunda dan Selat Lombok resmi diberlakukan sejak 1 Juli 2020. Hal ini akan meningkatkan profil dan citra Indonesia di lingkungan Internasional sebagai salah satu negara maritim.</p>\r\n\r\n<p>\"Di jalur perdagangan dunia, Indonesia ini sangat besar pengaruhnya. Ini saya sedikit sampaikan, TTS Selat Sunda dan Selat Lombok kita mulai berlakukan secara internasional per 1 Juli 2020. Ini salah satu di antara jalur pelayaran internasional yang melalui Indonesia,\" jelas Agus.</p>\r\n\r\n<p>Agus meneruskan pemerintah sedang fokus untuk menyiapkan sarana dan prasarana untuk mendukung konektivitas transportasi laut. Salah satunya dengan melakukan pembangunan pelabuhan di berbagai daerah.</p>\r\n\r\n<p>Selama ini menurutnya banyak pelabuhan yang belum mampu jadi sandaran kapal besar dengan kargo. Pihaknya sedang mengupayakan agar hal itu bisa terwujud, setidaknya ada 1.321 pelabuhan yang akan dibangun.</p>\r\n\r\n<p>\"Kalau kita lihat sebaran pelabuhan di seluruh Indonesia ada 28 pelabuhan utama dari Sabang ke Merauke. Dengan 4 main port dan kemudian masih ada 164 pelabuhan pengumpul, dan lokal juga banyak,\" ungkap Agus.</p>\r\n', '084bd603-0b34-4f4c-bd5c-4999fd9d23dc_169.jpg', 3, 1, NULL, NULL, NULL),
(5, 'Tambah 1.877, Kasus Positif Corona di RI Per 24 Agustus Jadi 155.412', '<p><b>Jakarta</b> - Kasus positif virus Corona (COVID-19) di Indonesia kembali bertambah. Hari ini kasus positif Corona di RI bertambah sebanyak 1.877.</p>\r\n\r\n<p>Pertambahan kasus Corona ini dikutip dari data yang diterima dari Humas BNPB, Senin (24/8/2020). Cut off time pengambilan data adalah pukul 12.00 WIB.</p>\r\n\r\n<p>Dengan penambahan 1.877, total kasus positif Corona di Indonesia menjadi 155.412. Selain kasus positif, jumlah pasien yang sembuh dari Corona bertambah.</p>\r\n\r\n<p>Terdapat penambahan jumlah pasien yang sembuh dari Corona sebanyak 3.560, sehingga total pasien yang telah sembuh dari Corona berjumlah 111.060.</p>\r\n\r\n<p>Untuk kasus pasien Corona yang meninggal juga bertambah. Terdapat penambahan jumlah pasien Corona yang meninggal sebanyak 79, sehingga totalnya menjadi 6.759.</p>\r\n\r\n<p>Pada Minggu (23/8), total kasus positif Corona di RI sebanyak 153.535. Total pasien yang sembuh berjumlah 107.500, sedangkan total pasien yang meninggal sebanyak 6.680.</p>', '5d30bbd1-6889-47a1-9f6f-9ea34721a977_169.jpeg', 5, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `news_category`
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
-- Dumping data untuk tabel `news_category`
--

INSERT INTO `news_category` (`id`, `name`, `id_user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Finance', 1, NULL, NULL, NULL),
(2, 'Bisnis', 1, NULL, NULL, NULL),
(3, 'Politic', 1, '2020-08-05 12:52:22', '2020-08-05 12:52:22', NULL),
(5, 'Transportation', 1, '2020-08-05 12:54:52', '2020-08-05 12:54:52', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `news_image`
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
-- Dumping data untuk tabel `news_image`
--

INSERT INTO `news_image` (`id`, `img`, `news_id`, `id_user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1bb8e809-f04d-42de-8de7-ab3d239e5d9f_169.jpeg', 1, 1, '2020-08-01 16:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayaran`
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
-- Dumping data untuk tabel `pelayaran`
--

INSERT INTO `pelayaran` (`id`, `code_pelayaran`, `name_pelayaran`, `alias`, `address`, `id_city`, `postal`, `telp`, `fax`, `npwp`, `pkp_no`, `desc_pelayaran`, `payment_term`, `name_person`, `phone_person`, `email_person`, `fax_person`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'P0001', 'Indo Countainer Line, PT', 'ICON', 'Jalan Kesana Kemari no 098 Jakarta Selatan', 3, '80234', '0214356764', '0214356764', '71.2112.1121.1.111', '980', 'Pelayaran Desc', 14, 'Aji', '08767676744', '08767676744', '0361654433', '2020-08-01 11:44:11', '2020-08-20 23:06:29', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarif`
--

CREATE TABLE `tarif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelayaran_id` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `date` datetime NOT NULL,
  `pic_pelayaran` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_price1` bigint(20) NOT NULL DEFAULT 0,
  `last_price2` bigint(20) NOT NULL DEFAULT 0,
  `last_price3` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tarif`
--

INSERT INTO `tarif` (`id`, `pelayaran_id`, `id_city`, `price`, `date`, `pic_pelayaran`, `last_price1`, `last_price2`, `last_price3`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 6900000, '2020-08-02 00:00:00', 'Bastian', 7000000, 6800000, 7100000, '2020-08-21 04:49:10', '2020-08-21 04:49:10', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trucking_type`
--

CREATE TABLE `trucking_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_trucking` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `trucking_type`
--

INSERT INTO `trucking_type` (`id`, `name_trucking`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '20 feets', '2020-08-01 17:46:07', NULL, '0000-00-00 00:00:00'),
(2, '40 feets', '2020-08-01 17:46:07', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bastian', 'bbaztanzi@gmail.com', '2020-07-23 05:09:52', '$2y$10$FQikHO2fLUeGkN3JS4zCyeuuuni6vcWCHYKDnPBeLTQ3ClKq159om', NULL, NULL, '2020-07-23 05:07:52', '2020-07-23 05:07:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor_truck`
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
-- Dumping data untuk tabel `vendor_truck`
--

INSERT INTO `vendor_truck` (`id`, `code_vendor`, `name_vendor`, `address`, `telp`, `payment_term`, `trucking_type_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'V00043', 'Bumi Satria Persada, PT', 'Jakarta', '0219876789', 14, 1, '2020-08-01 17:50:34', NULL, NULL),
(2, 'V00043', 'Bumi Satria Persada, PT', 'Jakarta', '0219876789', 14, 2, '2020-08-01 17:50:34', NULL, NULL),
(3, 'V0022', 'Abadi Kokoh Insani, PT', 'Surabaya', '0319874452', 14, 1, '2020-08-01 17:51:32', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bank_account`
--
ALTER TABLE `bank_account`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `consignee`
--
ALTER TABLE `consignee`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `NewsCate` (`news_category_id`);

--
-- Indeks untuk tabel `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news_image`
--
ALTER TABLE `news_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `News` (`news_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pelayaran`
--
ALTER TABLE `pelayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `trucking_type`
--
ALTER TABLE `trucking_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_trucking` (`name_trucking`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `vendor_truck`
--
ALTER TABLE `vendor_truck`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agent`
--
ALTER TABLE `agent`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `bank_account`
--
ALTER TABLE `bank_account`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `consignee`
--
ALTER TABLE `consignee`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `location`
--
ALTER TABLE `location`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `news_image`
--
ALTER TABLE `news_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pelayaran`
--
ALTER TABLE `pelayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `trucking_type`
--
ALTER TABLE `trucking_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `vendor_truck`
--
ALTER TABLE `vendor_truck`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `NewsCate` FOREIGN KEY (`news_category_id`) REFERENCES `news_category` (`id`);

--
-- Ketidakleluasaan untuk tabel `news_image`
--
ALTER TABLE `news_image`
  ADD CONSTRAINT `News` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
