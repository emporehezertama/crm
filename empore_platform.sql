-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 04, 2019 at 08:54 AM
-- Server version: 5.5.60-MariaDB
-- PHP Version: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `empore_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `crm_client`
--

CREATE TABLE IF NOT EXISTS `crm_client` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `handphone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_customer` smallint(6) DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pic_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic_telepon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crm_client`
--

INSERT INTO `crm_client` (`id`, `name`, `handphone`, `fax`, `address`, `email`, `type_customer`, `company`, `sales_id`, `created_at`, `updated_at`, `foto`, `user_id`, `pic_name`, `pic_telepon`, `pic_email`, `pic_position`) VALUES
(1, 'Bank Multiartha Sentosa', '(021) 57906006', NULL, 'Grha Bank Mas, \r\nJl.Setiabudi Selatan Kav. 7-8\r\nJakarta Selatan 12920', 'kantorpusat@bankmas.co.id', NULL, NULL, 4, '2019-04-09 16:49:28', '2019-04-09 17:24:27', NULL, 14, 'Peter', '-', '-', 'HR Manager'),
(2, 'Union Space', '021 29222922', NULL, 'Metropolitan Tower,  Jl. R.A. Kartini - T.B. Simatupang Kav. 14, Cilandak, Jakarta Selatan', 'tia@unionspace.com', NULL, NULL, 13, '2019-04-15 11:40:51', '2019-05-08 14:36:24', NULL, 15, 'astri.pramitha@unionspace.com; tia@unionspace.com', '+62 813-1551-1449 - Tia', 'tia@unionspace.com', 'HR Manager'),
(3, 'PT Dinar Makmur', 'Pak Jen 0812-8225-9414 ( IT Manager)', NULL, 'PT. Dinar Makmur\r\nPlant Address :\r\nJl. Pinayungan Raya No. 89\r\nDsn. Sukajaya RT. 011/006, Desa Pinayungan\r\nKec. Telukjambe Timur, Kab. Karawang - Jawa Barat 41361\r\nTel. (+62-267) 845 6988, Fax. (+62-267) 845 6989\r\n\r\nPT. Dinar Makmur Cikarang\r\nPlant Address :\r\nJl. Jababeka V Blok I-2\r\nKawasan Industri Cikarang, Pasir Gombong\r\nKec. Cikarang Utara, Kab. Bekasi - Jawa Barat 17530\r\nTel. (+62-21) 893 4551, Fax. (+62-21) 893 4552', '.', NULL, NULL, 4, '2019-04-15 12:15:35', '2019-04-15 12:15:35', NULL, 17, 'Jen', '0812-8225-9414', '.', 'IT Manager'),
(4, 'PT JXpress Trasindo', '(021) 806-27027, (021)5081-3635', NULL, 'PT. Jaya Ekspress Transindo\r\n18/F, RDTX Tower \r\nJl. Prof Dr Satrio Kav E4 No. 6 \r\nJakarta 12950, Indonesia', 'cs@j-express.id', NULL, NULL, 82, '2019-04-15 15:55:04', '2019-07-04 10:35:22', NULL, 18, 'Eko', '0821-1447-5755', '.', '.'),
(5, 'ADP International', '+62 878 8005 0096', NULL, 'Lintang Raya Kav. F11-12\r\nSentul Industrial Estate (Olympic CBD)\r\nSentul Babakan', 'adp.bsd@gmail.com', NULL, NULL, 20, '2019-04-15 16:42:17', '2019-04-15 17:16:33', NULL, 19, 'Emanuel Idris Harya', '+62 812-1547-571', 'idris_h4@yahoo.com', 'Workshop Manager'),
(6, 'PT Putra Mulia Telecommunication', '+62 215290 1170/1281/1219', NULL, 'Patra Jasa Office Tower, 18th Floor, Room 1811, Jl.Jend. Gatot Subroto Kav 32- 34 Jakarta 12950', 'sales@pmt.co.id', NULL, NULL, 16, '2019-04-15 18:12:12', '2019-04-15 18:12:12', NULL, 21, 'Wardono Mahwardi', '0816 100428', 'wardono.mahwardi@pmt.co.id', 'IT Leader'),
(7, 'PT Sari Multi Utama (Bogor Plant)', '(021) 87916889', NULL, 'Jl. Olympic Raya Kav B.12, Sentul, Babakan Madang, Bogor, Jawa Barat 16810', NULL, NULL, NULL, 13, '2019-04-16 13:28:01', '2019-05-23 16:09:46', NULL, 22, 'Jen', '0812-8225-9414', '.', 'IT Manager'),
(8, 'Hotel Indonesia Kempinski', '021 2358 7000', NULL, 'Jalan M.H. Thamrin No. 1\r\nJakarta Pusat\r\nDKI Jakarta 10310\r\nIndonesia', 'gist@grand-indonesia.com', NULL, NULL, 4, '2019-04-16 13:49:59', '2019-04-16 13:49:59', NULL, 23, 'Ronny', '081808607333', '-', 'IT Head'),
(9, 'PT Jamu Air Mancur', '021-428 00575 / 021-428 00577', NULL, 'l. Mataram No. 1\r\nKel. Selong, Kec. Kebayoran Baru\r\nJakarta Selatan 12110', 'cs@airmancur.co.id', NULL, NULL, 4, '2019-04-16 14:20:46', '2019-04-18 20:04:15', NULL, 24, 'Muji', '081807898777', 'muji_sarjono@airmancur.co.id', 'HR & GA Manager'),
(10, 'PT Sun Life Financial Indonesia', '(021) 52890000', NULL, 'Menara Sun Life Lantai Dasar\r\nJl Dr Ide Anak Agung Gde Agung Blok 6.3\r\nKawasan Mega Kuningan - Jakarta Selatan 12950', 'x', NULL, NULL, 4, '2019-04-16 14:38:43', '2019-04-16 14:38:43', NULL, 25, 'Billi Descapurnawan', '08561838418', 'Billi.Descapurnawan@sunlife.com', 'IT Technical Services Manager'),
(11, 'PT Champ Resto Indonesia', '+6221 3983 2178', NULL, 'JL. MH. THAMRIN 11,\r\nGEDUNG SARINAH LT. 12, UNIT O8\r\nJAKARTA PUSAT- 10350', 'Suarapelanggan@champ-group.com', NULL, NULL, 4, '2019-04-16 15:03:21', '2019-04-19 19:15:59', NULL, 26, 'Fajar', '+62 822-2800-0085', 'f.skurniadi@champ-group.com', 'HRD'),
(12, 'Lotte Shopping Avenue', '+62 21 29888 008-009', NULL, 'Jl. Prof. Dr. Satrio Kav 3 - 5, Karet - Kuningan\r\nJakarta 12940\r\nIndonesia', 'umi.lestari@lotteavenue.co.id', NULL, NULL, 4, '2019-04-16 15:55:56', '2019-04-16 15:55:56', NULL, 27, 'Oddy', '+62 21-29888 008', 'oddy@lotteavenue.co.id', 'IT'),
(13, 'PT Centrin Online Prima', '6221-2939 6555', NULL, 'Plaza Sentral Kav. 47 (Jl. Jend. Sudirman Kav. 47)\r\nJakarta, DKI Jakarta 12930\r\nIndonesia', 'imam@centrin.net.id', NULL, NULL, 4, '2019-04-16 16:26:41', '2019-04-18 20:03:30', NULL, 28, 'Imam', '081586048022', 'imam@centrin.net.id', 'Bussiness Development staff'),
(14, 'Brankas', '+62 818-0755-7765', NULL, 'Metropolitan Tower Level 13-A Jl. R.A. Kartini - T.B. Simatupang Kav. 14, Cilandak, Jakarta Selatan', 'XXXXX', NULL, NULL, NULL, '2019-04-16 17:22:32', '2019-04-16 17:22:32', NULL, 29, 'Christina Oey', '+62 818-0755-7765', 'AAAA', 'HR Manager'),
(15, 'Bank Kaltim', '081346248008', NULL, NULL, 'xxxxxxxx', NULL, NULL, NULL, '2019-04-19 19:27:43', '2019-04-19 19:27:43', NULL, 30, 'Wawan', '081346248008', 'xxxxxxxxxxxxx', 'need to check'),
(16, 'PT  Indoarsip', '081256198024', NULL, NULL, NULL, NULL, NULL, 4, '2019-04-19 19:34:04', '2019-05-21 13:57:10', NULL, 31, 'Dwi', '081256198024', 'xxxxx', 'IT Manager'),
(17, 'PT Interlink', '081225544006', NULL, NULL, 'syahnan@interlink.net.id', NULL, NULL, 13, '2019-04-19 19:40:07', '2019-05-08 14:36:45', NULL, 32, 'Syahnan', '081225544006', 'syahnan@interlink.net.id', 'ccc'),
(18, 'PT Mahkota Investama Unggulan', '021-57941370', NULL, NULL, 'vvvvvv', NULL, NULL, 4, '2019-04-19 19:44:15', '2019-04-19 19:44:15', NULL, 33, 'Vera', '021-57941370', 'vvvvvvv', 'cccvvvvvv'),
(19, 'PT Servio', '+62 21 8064 1000', NULL, 'South Quarter, Tower A, 18th Floor, Jl RA Kartini Kav 8, Cilandak Barat, Jakarta, RT.10/RW.4, Cilandak Bar., Cilandak, Jakarta, Daerah Khusus Ibukota Jakarta 12430', 'suci.desiarni@servio.co.id', NULL, NULL, 4, '2019-04-19 20:02:56', '2019-04-22 13:25:14', NULL, 34, 'Suci', '+62 21 8064 1000', 'suci.desiarni@servio.co.id', 'HRD'),
(20, 'PT Scan Shipping', '+62 21 2591 8163', NULL, 'Menara FIF, Lantai 11, Suite 112-113, JL TB Simatupang, Kavling 15, Cilandak Barat, RT.4/RW.1, Lb. Bulus, Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12430', NULL, NULL, NULL, 4, '2019-04-19 20:06:59', '2019-04-22 13:23:04', NULL, 35, 'Indra', '021-25918163', 'ibsusilo@scan-shipping.com', 'HRD'),
(21, 'PT Rentokil Indonesia', '+62 21 2276 5111/ +62 882 2286 1155', NULL, 'South Quarter Tower B 21st floor, R. A. Kav. 8, Jl. R.A.Kartini No.10, RT.4/RW.4, West Cilandak, Cilandak, South Jakarta City, Jakarta 12430', 'maulana.1@rentokil-initial.com', NULL, NULL, 4, '2019-04-19 20:11:13', '2019-04-22 13:19:09', NULL, 36, 'Maulana', '+62 21 2276 5111/ +62 882 2286 1155', 'maulana.1@rentokil-initial.com', 'HRD'),
(22, 'Citybank', '+62 21 7590 8674 / 75', NULL, 'South Quarter Tower B, 5th Floor r a Kav 8, Jl. R.A.Kartini, RT.10/RW.4, Cilandak Bar., Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12430', NULL, NULL, NULL, 4, '2019-04-19 20:20:27', '2019-04-22 11:36:59', NULL, 37, 'Abigail', '+62 21 7590 8674 / 75', NULL, 'HR Manager'),
(23, 'PT Tuperware', '+62 21 2966 1750', NULL, 'Gedung South Quarter, Tower A Lantai 12\r\nJl. RA Kartini Kav 8, Cilandak Barat\r\nJakarta Selatan - 12430', 'intanperdanasari@tupperware.com', NULL, NULL, 4, '2019-04-19 20:24:20', '2019-04-22 11:26:08', NULL, 38, 'Intan Perdana Sari', '+62 21 2966 1750', 'intanperdanasari@tupperware.com', 'HRD'),
(24, 'Asian Green Real Estate', '+62 21 2276 5181', NULL, '21st FL. South Quarter Tower B, Jl. RA.Kartini Kav 8, 12430 Jakarta, Indonesia', 'viktricia.tika@asiagreen.com', NULL, NULL, 4, '2019-04-19 20:27:28', '2019-04-22 11:22:21', NULL, 39, 'Viktricia Tika', '081806958009', 'viktricia.tika@asiagreen.com', 'Customer Genius'),
(25, 'PT Semen Indonesia', '+62 21 5261 174/5', NULL, 'South Quarter, Tower A, Lt.19-20\r\nJl. R.A. Kartini Kav.8\r\nCilandak Barat, Jakarta Selatan,\r\nDKI Jakarta, 12430', NULL, NULL, NULL, 4, '2019-04-19 20:30:47', '2019-04-22 13:13:38', NULL, 40, 'Proid Kontura', '021-5261174/5', NULL, 'Procurement Manager'),
(26, 'PT. Donaldson Filtration Indonesia', '+62 21 2270 2462', NULL, 'South Quarter Tower B 16/F Unit E, Jalan R.A. Kartini Kav. 8, Cilandak Barat, RT.10/RW.4, Cilandak Bar., Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12560', 'Shinta.rumetta@donaldson.com', NULL, NULL, 13, '2019-04-22 13:45:30', '2019-05-08 14:39:01', NULL, 41, 'Shnta Rumetta', '+62 817 4137 676', 'Shinta.rumetta@donaldson.com', 'HR & GA Manager'),
(27, 'PT Darya-Varia Laboratoria Tbk Perusahaan', '+62 21 2276 8000', NULL, 'South Quarter Building Tower C Lantai 18&19, Jalan R.A.Kartini Kav. 8, Cilandak Barat, Cilandak, RT.10/RW.4, Cilandak Bar., Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12430', '-', NULL, NULL, NULL, '2019-04-22 13:50:48', '2019-04-22 13:50:48', NULL, 42, 'Herni', '+62 21 2276 8000', '.', 'HR & GA Director'),
(28, 'PT. Suntory Garuda Beverage', '+62 21 2912 5999', NULL, 'Gedung South Quarter Tower C, Jl. R.A.Kartini, RT.10/RW.4, Cilandak Bar., Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12430', 'rina.meity@sgbi.co.id', NULL, NULL, 4, '2019-04-22 13:55:12', '2019-04-22 13:55:12', NULL, 43, 'Rina', '+62 21 2912 5999', 'rina.meity@sgbi.co.id', 'HRD'),
(29, 'PT AECOM Indonesia', '+62 21 7207 574', NULL, 'South Quarter Building Tower C, Jl. R.A.Kartini No.Kav 8, RT.10/RW.4, Cilandak Bar., Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12430', 'heryantiaulia.dewi@aecom.com', NULL, NULL, 4, '2019-04-22 13:58:12', '2019-04-22 13:58:12', NULL, 44, 'Ola', '+62 21 3002 2020', 'heryantiaulia.dewi@aecom.com', 'HR Manager'),
(30, 'PT. Japan Tobacco International', '+62 21 8067 0500', NULL, 'South Quarter, Tower C, Fl. 7 & 8, Jl. R.A.Kartini No.Kav. 8, RT.10/RW.4, West Cilandak, Cilandak, South Jakarta City, Jakarta 12430', 'bernadeta.devi@jti.com', NULL, NULL, 4, '2019-04-22 14:01:36', '2019-04-22 14:01:36', NULL, 45, 'Devi', '+62 21 8067 0500', 'bernadeta.devi@jti.com', 'HR'),
(31, 'NISSAN MOTOR INDONESIA', '+62 21 2271 2323', NULL, 'South Quarter Tower C, 15-16F, Jl. R.A.Kartini No.Kav. 8, RT.10/RW.4, Cilandak Bar., Cilandak, Jakarta, Daerah Khusus Ibukota Jakarta 12430', 'TBC', NULL, NULL, NULL, '2019-04-22 14:06:05', '2019-04-22 14:06:05', NULL, 46, 'Hilda', '+62 21 2271 2323', 'TBC', 'HRD'),
(32, 'Astra Credit Companies (ACC)', '+62 21 1500 599', NULL, 'Jl. TB Simatupang No. 90\r\nJakarta Selatan - 12530', 'TBC 1', NULL, NULL, NULL, '2019-04-22 14:17:44', '2019-04-22 14:17:44', NULL, 47, 'Rendi', '+62 812 6061 222', 'TBC 2', 'Auditor'),
(33, 'Big Cash Syariah', '+62 21 2277 7625', NULL, 'Jl. Lamandau IV No. 18, Blok M, Jakarta', 'TBC11', NULL, NULL, NULL, '2019-04-22 14:32:32', '2019-04-22 14:32:32', NULL, 48, 'Happy', '+62 816 1147 265', 'TBC2', 'Finance Department'),
(34, 'PT. Solusi Bangun Indonesia (HOLCIM)', '+62 21 2986 1000', NULL, 'Talavera Office Park, Talavera, Jl. TB Simatupang No.22 - 26, RT.4/RW.9, Cilandak, Daerah Khusus Ibukota Jakarta 12430', NULL, NULL, NULL, 4, '2019-04-22 14:40:06', '2019-04-22 14:42:50', NULL, 49, 'Widoyo', '+62 21 2986 1000', 'tbd', 'IT Manager'),
(35, 'PT Shell Indonesia', '+62 21 7592 4700', NULL, 'PT Shell Indonesia\r\nTalavera Office Park, 22nd - 26th Floor\r\nJl. TB Simatupang Kav. 22 - 26\r\nJakarta 12430', 'tbd', NULL, NULL, 4, '2019-04-22 14:46:31', '2019-04-22 14:46:31', NULL, 50, 'Emilia', '+62 21 7592 4700', 'tbd', 'HR Manager'),
(36, 'Petronas Carigali Tanjung Jabung', '+62 21 7592 5200', NULL, 'Talavera Office Park, Lantai 3, Jl. T.B. Simatupang Kav. 22-26, RT.3/RW.1, Cilandak Bar., Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12430', 'tbd1', NULL, NULL, NULL, '2019-04-22 14:53:31', '2019-04-22 14:53:31', NULL, 51, 'Rikianto', '+62 21 7592 5200', 'tbd', 'IT Manager'),
(37, 'PT. Collega Inti Pratama', '+62 21 7592 4428', NULL, 'Talavera Office Park, Jl. TB Simatupang, RT.3/RW.3, Cilandak Bar., Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12430', 'tbdd', NULL, NULL, NULL, '2019-04-22 14:56:41', '2019-04-22 14:56:41', NULL, 52, 'Sugiarto', '+62 21 7592 443 38', 'tbddd', 'Genera Manager'),
(38, 'PT Bukit Uluwatu Villa', '+62 21 7592 4475', NULL, 'Jalan Tb. Simatupang No.26, RT.3/RW.1, Cilandak Bar., Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12430', 'yohana.anastasya@buvagroup.com', NULL, NULL, 4, '2019-04-22 14:59:51', '2019-04-22 14:59:51', NULL, 53, 'Yohana', '+62 21 7592 4475', 'yohana.anastasya@buvagroup.com', 'HRD'),
(39, 'Seven Events', '+62 21 2918 2970', NULL, 'Metropolitan Tower, 18th Floor, Jalan R.A.Kartini No. 9, RT.10/RW.4, Cilandak Barat, Cilandak, RT.10/RW.4, Cilandak Bar., Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12440', 'rara@seven-event.com', NULL, NULL, 4, '2019-04-22 15:05:51', '2019-04-22 15:05:51', NULL, 54, 'Ayodhya Raga Ananda', '+62 813 1021 2019', 'rara@seven-event.com', 'HRD'),
(40, 'PT Tangguh Niaga Supratama', '+62 21 6121 633', NULL, 'Jalan Kebayoran Lama No.757/8, Grogol Utara, Kby. Lama, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12210', 'tbcc', NULL, NULL, 4, '2019-04-22 15:11:15', '2019-04-22 15:11:15', NULL, 55, 'Diana', '+62 858 9208 3607', 'tbc', 'HRD'),
(41, 'PT. Bali Towerindo Sentra, Tbk', '+62 21 7592 474', NULL, 'Wisma KEIAI Lt. 22, Jl. Jenderal Sudirman Kav. 3, Karet Tengsin, Tanah Abang, RT.10/RW.11, RT.10/RW.11, Karet Tengsin, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10250', 'tbdb', NULL, NULL, NULL, '2019-04-22 15:23:15', '2019-04-22 15:23:15', NULL, 56, 'Nita Dwi', '+62 813 1498 5915', 'tbd', 'HRD'),
(42, 'iForte Global Internet', '+62 852 1715 3858', NULL, 'Jl. Tebet Utara I No.48, RT.3/RW.10, Tebet Tim., Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12820', 'tbddc', NULL, NULL, NULL, '2019-04-22 15:30:05', '2019-04-22 15:30:05', NULL, 57, 'Ayu', '+62 852 1715 3858', 'tbc', 'HRD'),
(43, 'PT. Cipta Mapan Logistik (Linc Group)', '+62 21 3002 7138', NULL, 'Arteri Permata Hijau, Bellezza Gapuraprima Office Tower Floor, JL Letjend. Soepeno No. 34, RT.4/RW.2, North Grogol, Kebayoran Lama, South Jakarta City, Jakarta 12210', 'tbcdd', NULL, NULL, NULL, '2019-04-22 15:38:34', '2019-04-22 15:38:34', NULL, 58, 'Haryanto', '+62 857 7441 5500', 'tbc', 'HRD'),
(44, 'Bank BTPN -  JENIUS', '+62 21 300 26 200', NULL, 'PT Bank BTPN Tbk \r\nMenara BTPN - CBD Mega Kuningan \r\nJl. Dr. Ide Anak Agung Gde Agung Kav. 5.5 – 5.6 \r\nJakarta 12950', 'info@btpn.com', NULL, NULL, 59, '2019-04-24 11:14:42', '2019-04-24 11:27:53', NULL, 60, 'Tri Bimo Aryotedjo', '0818270465', 'tri.ariotedjo@btpn.com', 'Channel Development'),
(45, 'Importir.org', '021 2230 2193/ 021 2230 2193 / 0811 1191 560', NULL, 'Green Lake City Ruko Crown Block C no 32, Petir, Cipondoh, Kota Tangerang, 15147', 'recruitment@importir.com', NULL, NULL, 16, '2019-04-29 13:15:39', '2019-04-29 13:27:00', NULL, 61, 'Nadia', '021 2230 2193/ 021 2230 2193 / 0811 1191 560', 'recruitment@importir.com', 'HRD'),
(46, 'PT Maybank Indonesia Finance', '021 6230 0088', NULL, 'Gedung Wisma Eka Jiwa Lt. 10 \r\nJl. Mangga Dua Raya, Mangga Dua Selatan\r\nSawah Besar, Jakarta Pusat - 10730', 'jessicaa@maybankfinance.co.id', NULL, NULL, 13, '2019-04-29 17:17:05', '2019-05-17 13:09:19', NULL, 62, 'Jessica', '021 6230 0088', 'jessicaa@maybankfinance.co.id', 'TBC'),
(47, 'PointStar Indonesia', '(021) 25558789', NULL, 'Jl. KH Mas Mansyur, Cityloft Apartment Sudirman Lt 23, Unit 2303 Jakarta Pusat 1, RT.10/RW.11, Karet Tengsin, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10220', 'hr@point-star.com', NULL, NULL, 16, '2019-04-29 17:25:15', '2019-04-29 17:25:15', NULL, 63, 'TBC', '(021) 25558789', 'hr@point-star.com', 'TBC'),
(48, 'PT. Sitcomindo (Samsung Partners)', '081777425', NULL, 'Komplek Duta Merlin (Jl.Gajah Mada)\r\nJakarta\r\nDKI Jakarta\r\nIndonesia', 'deddy.purnama@sitcomasia.com', NULL, NULL, 59, '2019-04-30 10:22:35', '2019-05-13 10:01:24', NULL, 64, 'Deddy Purnama', '081777425', 'deddy.purnama@sitcomasia.com', 'GM Development'),
(49, 'BeliMobilGue.co.id', '(021) 8062 9622', NULL, 'Jl. Ampera Raya No. 137 Ragunan, Pasar Minggu, Jakarta Selatan 12560', 'talent@belimobilgue.co.id', NULL, NULL, 13, '2019-04-30 11:32:30', '2019-05-08 14:37:36', NULL, 65, 'TBC', '(021) 8062 9622', 'fachdi@belimobilgue.co.id', 'TBC'),
(50, 'PT. ADICIPTA BOGA INTIPRIMA IMPERIAL', '021 5366 2221', NULL, 'Jl. Palmerah Barat No.09, RT.1/RW.2, Gelora, Tanahabang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270', 'recruitment_op@impgroup.co.id', NULL, NULL, 13, '2019-04-30 12:33:41', '2019-05-08 14:37:10', NULL, 66, 'Rizky Pradana', '08111256880/ 081310100875 WA', 'recruitment_op@impgroup.co.id', 'Recruitment Head'),
(51, 'PT Berlina', '62-21 898 30160', NULL, 'Jl. Jababeka Raya Blok E 12 – 17\r\nKawasan Industri Jababeka Cikarang\r\n\r\nDesa Wangunharja, Kecamatan Cikarang Utara Bekasi 17520', 'info@berlina.co.id', NULL, NULL, 16, '2019-05-02 13:51:43', '2019-05-02 13:51:43', NULL, 67, 'TBC', 'TBC', 'recruitment@berlina.co.id', 'TBC'),
(52, 'Complete English Language Solutions', '+62 21 2991 2255', NULL, 'Epiwalk 3rd Floor Suite A305, \r\nJl. H.R Rasuna Said, South Jakarta 12940', 'ira@celsindonesia.com', NULL, NULL, 16, '2019-05-02 14:38:37', '2019-05-02 14:38:37', NULL, 68, 'Ira Ramadhani', '+62 856 9212 0377', 'ira@celsindonesia.com', 'Operations & Markeing Manager'),
(54, 'PT INDOSURYA INTI FINANCE', '021 3890 9068', NULL, 'Gedung Indosurya Finance Center Lt. 10 \r\nJl M.H Thamrin No. 3\r\nJakarta Pusat 10110', 'info@indosuryafinance.com', NULL, NULL, 16, '2019-05-02 15:01:54', '2019-05-02 15:01:54', NULL, 70, 'TBC', '021 3890 9068', 'Vacancy@indosuryafinance.com', 'HRD'),
(55, 'PT MUGI', '+62 21 8308 415', NULL, 'Mugi Griya Building 8th Floor\r\nMT. Haryono Street Kav. 10, Jakarta 12810 - Indonesia', 'hrd@mugi.co.id', NULL, NULL, 16, '2019-05-02 15:18:31', '2019-05-02 15:18:31', NULL, 71, 'TBC', '+62 21 8308 415', 'hrd@mugi.co.id', 'TBC'),
(56, 'PT Anabatic Digital Raya', '+62 21 8063 6010', NULL, 'Head Office \r\nGraha Anabatic\r\nJl. Scientia Boulevard Kav. U2\r\nSummarecon Serpong \r\nTangerang, Banten - 15811, Indonesia', 'marketing@anabatic.com', NULL, NULL, 16, '2019-05-02 15:40:23', '2019-05-02 15:40:23', NULL, 72, 'TBC', '+62 21 8063 6010', 'recruitment@anabatic.com', 'HRD'),
(57, 'PT Selalu Bahagia Bersama OPPO Manufacturing', '+62 21 2966 2888 ext 1013', NULL, 'Jl.Benua Mas Raya Blok B No.1\r\nPabuaran Tumpeng, Tangerang', 'TBI', NULL, NULL, NULL, '2019-05-02 15:55:51', '2019-05-02 15:55:51', NULL, 73, 'Neneng', '+62 21 2966 2888 ext 1013', 'neneng@oppo.com', 'HRD'),
(58, 'PT. Bahtera Pesat Lintasbuana', '+62 21 7824 283', NULL, 'Kompleks AL/Batan, Pasar Minggu Rawa Bambu., Jalan Raya Pasar Minggu, Jakarta Selatan, No. 5B.  RT.7/RW.7, Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12520', 'Recruitment@bahterapesat.co.id', NULL, NULL, 16, '2019-05-02 16:07:57', '2019-05-02 16:07:57', NULL, 74, 'Nazwita Tiara', '+62 21 7824 283', 'Nazwita.tiara@bahterapesat.co.id', 'HRD'),
(59, 'JAKARTA LIFE SCIENCES & AESTHETICS', '021 5794 0919', NULL, 'Permata Senayan, Rukan, Jl. Tentara Pelajar Jl. Patal Senayan, Senayan, Kebayoran Lama, South Jakarta City, Jakarta 12210', NULL, NULL, NULL, 4, '2019-05-02 17:35:12', '2019-05-02 17:37:38', NULL, 75, 'Wiwi', '021 5794 0919', 'ops.jakartalifesciences@gmail.com', 'HRD'),
(60, 'Daiichi', '021 5794 0709', NULL, 'Jl Tentara Pelajar Rukan Permata Senayan BI B/28-29', NULL, NULL, NULL, 4, '2019-05-02 17:44:45', '2019-05-23 16:13:07', NULL, 76, 'Dedi', '021 5794 0709', 'TBCCC', 'HRD'),
(61, 'STELLAR KAPITAL', '021 5794 0703', NULL, 'Komplek Permata Senayan B-25, Jl. Tentara Pelajar No.1, RT.2/RW.9, Grogol Utara, Kby. Lama, Jakarta, Daerah Khusus Ibukota Jakarta 12220', NULL, NULL, NULL, 4, '2019-05-02 17:59:09', '2019-05-02 18:01:05', NULL, 77, 'Ula', '021 5794 0703', 'ABC', 'HRD'),
(62, 'BTL Indonesia', '021 5794 0706', NULL, 'Rukan Permata Senayan Blok E-7, JL. Tentara Pelajar, Patal Senayan, 12210, RT.1/RW.7, Grogol Utara, Kby. Lama, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12210', NULL, NULL, NULL, 4, '2019-05-02 18:04:26', '2019-05-23 16:10:24', NULL, 78, 'Anton', '021 5794 0873', 'ABDDD', 'HRD'),
(63, 'Mitra10', '021-2900 1112', NULL, 'Mitra10 QBig BSD. Jl. BSD Raya Utama BSD City, Lengkong Kulon, Pagedangan, Tangerang, Banten 15331', 'ecommerce@mitra10.com', NULL, NULL, 59, '2019-05-08 10:47:06', '2019-05-08 11:00:12', NULL, 79, 'Inlie', '085887152240', 'ecommerce@mitra10.com', 'Fasility Management'),
(64, 'PT DIKA', '(021) 57950532', NULL, 'Jl. Bendungan Hilir Gg 10 No.31, Bendungan Hilir, Tanah Abang, Jakarta, 10210', 'ptdika@gmail.com', NULL, NULL, 59, '2019-05-21 09:45:40', '2019-05-21 14:01:32', NULL, 81, 'Mr. Alex', '081290098892', 'ptdika@gmail.com', 'Accuisision Product Manager');

-- --------------------------------------------------------

--
-- Table structure for table `crm_product`
--

CREATE TABLE IF NOT EXISTS `crm_product` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crm_product`
--

INSERT INTO `crm_product` (`id`, `name`, `description`, `url`, `logo`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, '2019-03-23 10:52:38', '2019-03-23 10:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `crm_projects`
--

CREATE TABLE IF NOT EXISTS `crm_projects` (
  `id` int(10) unsigned NOT NULL,
  `crm_client_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `pipeline_status` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `color` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` text COLLATE utf8mb4_unicode_ci,
  `project_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_id` int(11) DEFAULT NULL,
  `quotation_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crm_projects`
--

INSERT INTO `crm_projects` (`id`, `crm_client_id`, `price`, `name`, `description`, `pipeline_status`, `created_at`, `updated_at`, `color`, `file`, `project_category`, `sales_id`, `quotation_order`, `po_order`) VALUES
(1, 1, 0, 'Em-HR', NULL, NULL, '2019-04-09 17:12:46', '2019-04-09 17:12:46', '#E74C3C', NULL, 'ERP Solution - HR Solutions', 13, NULL, NULL),
(2, 1, 65000000, 'Em-HR and Custom IT', 'Opportunity in Em-HR product and Custom development', 1, '2019-04-09 17:21:18', '2019-04-09 17:21:18', '#1ABC9C', NULL, 'IT Services', 13, NULL, NULL),
(3, 2, 0, 'HR Management & System', 'Email send to Ibu Atri Pramitha on Friday, 12 April 2019', 1, '2019-04-15 11:45:10', '2019-04-15 11:45:10', '#3498DB', 'EMPORE HRIS (Em-HR).msg', 'HR Services', 1, NULL, NULL),
(4, 3, 0, 'Requirement for Operator', 'Kebutuhan SDM untuk posisi Operator Pabrik penempatan Cikarang dan Karawang,\r\nmenurut Pak Herman Cikarang sangat terbuka peluang utk vendor OS baru. dan PIC Pak Diadri akan undang meeting segera di Cikarang', 1, '2019-04-15 12:19:31', '2019-04-15 14:39:35', '#E74C3C', NULL, 'HR Services', 1, NULL, NULL),
(5, 4, 0, 'Procurement Aplication', 'Empore have send contract to JXpress and waiting feedback from them', 1, '2019-04-15 15:57:47', '2019-04-15 15:57:47', '#E74C3C', NULL, 'IT Services - Custome Software Development', 1, NULL, NULL),
(6, 5, 300000000, 'ERP  ADP International', NULL, 4, '2019-04-15 16:44:08', '2019-04-16 13:44:08', '#F39C12', NULL, 'ERP Solution', 1, NULL, NULL),
(7, 6, 49000000, 'Procurement & Logistic', 'Subscription License', 2, '2019-04-15 18:15:20', '2019-04-24 11:05:04', '#C0392B', NULL, 'IT Services - Custome Software Development', 1, '7/1/QO/201904110256', NULL),
(8, 7, 0, 'HR Management', '- Perusahaan yang memproduksi botol kemasan plastik.\r\n- Satu grup dengan PT Dinar Makmur', 1, '2019-04-16 13:32:53', '2019-04-16 13:32:53', '#2C3E50', NULL, 'HR Services', 1, NULL, NULL),
(9, 8, 0, 'Outsourcing Project', 'Currently, they have engaged with 2 Outsourcing Company', 1, '2019-04-16 13:54:18', '2019-04-16 13:54:43', '#16A085', NULL, 'HR Services', 1, NULL, NULL),
(10, 9, 0, 'Outsoucing Project', 'Introduction service & Company Profile to Pak Muji as Manager HR& GA', 1, '2019-04-16 14:27:47', '2019-04-16 14:27:47', '#2980B9', NULL, 'HR Services', 1, NULL, NULL),
(11, 10, 0, 'Outsourcing Project', 'Introducing for Company profile & services\r\nRequired for Vendor Outsourcing for some job position such as Administration, Insurance Sales and IT staff', 1, '2019-04-16 14:42:24', '2019-04-16 14:42:24', '#ECF0F1', NULL, 'HR Services', 1, NULL, NULL),
(12, 11, 0, 'HR Consulting and HR Application', 'PIC :\r\n1. Fajar -- HRD MP: 082228000085\r\n2. Ditte -- IT Manager MP : 081320008668', 1, '2019-04-16 15:05:44', '2019-04-16 15:18:12', '#E74C3C', NULL, 'HR Services', 1, NULL, NULL),
(13, 12, 0, 'ERP Project', 'ERP for Warehouses, Finance, Procurement & GA Application\r\nPIC: \r\n- Umi Lestari -- HRD -- E: umi.lestari@lotteavenue.co.id\r\n- Oddy --IT -- E:oddy@lotteavenue.co.id --P: +62 21-29888 008', 1, '2019-04-16 15:59:45', '2019-04-16 16:01:09', '#7F8C8D', NULL, 'ERP Solution', 1, NULL, NULL),
(14, 13, 0, 'HRiS', 'PIC:\r\n- Imam, Bussiness Development, E: imam@centrin.net.id; P: 081586048022\r\n- Nurdin, Bussiness Development, E: nurdin@centrin.net.id\r\n- Yanti, Secretary, E: yantie@centrin.net.id', 1, '2019-04-16 16:30:48', '2019-04-16 16:30:48', '#2ECC71', NULL, 'ERP Solution - HR Solutions', 1, NULL, NULL),
(15, 14, 0, 'Outsouring', NULL, 1, '2019-04-19 19:14:31', '2019-04-19 19:14:31', '#7F8C8D', NULL, 'HR Services', 1, NULL, NULL),
(16, 15, 0, 'Slik Application', 'Need to provide SLIK application', 1, '2019-04-19 19:29:22', '2019-04-19 19:29:22', '#1ABC9C', NULL, 'ERP Solution - SLIK', 1, NULL, NULL),
(17, 16, 0, 'Archieve Application', 'Plan to be updated on 29 March 19  minutes of meeting Indoarsip and Suzuki', 1, '2019-04-19 19:37:32', '2019-04-19 19:37:32', '#8E44AD', NULL, 'IT Services - Custome Software Development', 1, NULL, NULL),
(18, 17, 0, 'Project Application', NULL, 1, '2019-04-19 19:41:16', '2019-04-19 19:41:16', '#2980B9', NULL, 'IT Services - Custome Software Development', 1, NULL, NULL),
(19, NULL, 0, 'HRiS', 'Investment fund companies', NULL, '2019-04-19 19:58:38', '2019-04-19 19:58:38', '#F1C40F', NULL, 'ERP Solution - HR Solutions', 1, NULL, NULL),
(20, 18, 0, 'HRiS', 'CANVASING \r\nInvestment fund companies', 1, '2019-04-19 19:59:40', '2019-04-22 13:36:26', '#F1C40F', NULL, 'ERP Solution - HR Solutions', 1, NULL, NULL),
(21, 19, 0, 'TBC', 'CANVASING', 1, '2019-04-19 20:04:07', '2019-04-22 13:36:54', '#E67E22', NULL, 'HR Services', 1, NULL, NULL),
(22, 20, 0, 'TBC', 'CANVASING\r\nTrading & Shipping companies', 1, '2019-04-19 20:07:45', '2019-04-22 13:37:41', '#E74C3C', NULL, 'HR Services', 1, NULL, NULL),
(23, 21, 0, 'HRiS', 'CANVASING\r\nPest Control Services, they have using SunFish but still open for other HR services with lower price', 1, '2019-04-19 20:14:27', '2019-04-22 13:38:03', '#E74C3C', NULL, 'ERP Solution - HR Solutions', 1, NULL, NULL),
(24, 22, 0, 'TBC', 'CANVASING', 1, '2019-04-19 20:22:24', '2019-04-22 13:38:38', '#D35400', NULL, 'Others', 1, NULL, NULL),
(25, 23, 0, 'TBC', 'CANVASING\r\nHome plastic product', 1, '2019-04-19 20:25:35', '2019-04-22 13:38:54', '#F1C40F', NULL, 'Others', 1, NULL, NULL),
(26, 24, 0, 'TBC', 'CANVASING \r\nProperty Developer', 1, '2019-04-19 20:28:08', '2019-04-22 13:39:18', '#3498DB', NULL, 'Others', 1, NULL, NULL),
(27, 25, 0, 'Application Project', 'CANVASING', 1, '2019-04-22 13:15:17', '2019-04-22 13:39:38', '#E74C3C', NULL, 'IT Services', 1, NULL, NULL),
(28, 26, 0, 'HRiS', 'CANVASING\r\nPlan to send meeting invitation that will be held on 29 April 19', 1, '2019-04-22 13:46:46', '2019-04-22 13:46:46', '#E74C3C', NULL, 'HR Services', 1, NULL, NULL),
(29, 27, 0, 'TBC', 'CANVASING\r\nPharmaceutical company', 1, '2019-04-22 13:51:34', '2019-04-22 13:51:34', '#E74C3C', NULL, 'HR Services', 1, NULL, NULL),
(30, 28, 0, 'TBC', 'CANVASING', 1, '2019-04-22 13:55:41', '2019-04-22 13:55:41', '#E74C3C', NULL, 'HR Services', 1, NULL, NULL),
(31, 29, 0, 'TBC', 'CANVASING', 1, '2019-04-22 13:58:43', '2019-04-22 13:58:43', '#E74C3C', NULL, 'HR Services', 1, NULL, NULL),
(32, 30, 0, 'HRiS', NULL, 1, '2019-04-22 14:02:31', '2019-04-22 14:02:31', '#E74C3C', NULL, 'HR Services', 1, NULL, NULL),
(33, 31, 0, 'HRiS and Outsourcing', 'CANVASING\r\nOpen opportunity for unit car SPG provision and HRis', NULL, '2019-04-22 14:08:02', '2019-04-22 14:08:02', '#E74C3C', NULL, 'HR Services', 1, NULL, NULL),
(34, 32, 0, 'SLIK Report', 'CANVASING \r\nOpen opportunity to support SLIK report process', 1, '2019-04-22 14:19:41', '2019-04-22 14:21:05', '#E74C3C', NULL, 'ERP Solution - SLIK', 1, NULL, NULL),
(35, 33, 0, 'It Application, SlIK and HRiS', 'CANVASING\r\nPerusahaan dalam proses pergantian bidang usaha dan perubahan manajemen sehingga untuk kebutuhan aplikasi dan lain nya sangat dibutuhkan setelah semua proses tersebut selesai.', 1, '2019-04-22 14:34:35', '2019-04-22 14:34:35', '#E74C3C', NULL, 'IT Services', 1, NULL, NULL),
(36, 34, 0, 'Appplication Project', 'CANVASING', 1, '2019-04-22 14:41:12', '2019-04-22 14:41:12', '#E74C3C', NULL, 'IT Services', 1, NULL, NULL),
(37, 35, 0, NULL, 'CANVASING', 1, '2019-04-22 14:47:18', '2019-04-22 14:47:18', '#E74C3C', NULL, 'HR Services', 1, NULL, NULL),
(38, 36, 0, 'Application Project', 'CANVASING', 1, '2019-04-22 14:54:20', '2019-04-22 14:54:20', '#E74C3C', NULL, 'IT Services', 1, NULL, NULL),
(39, 37, 0, 'TBC', 'CANVASING\r\nAnak perusahaan TELKOM yang bergerak di bidang leasing (Fintech)', 1, '2019-04-22 14:57:35', '2019-04-22 15:01:47', '#E74C3C', NULL, 'IT Services', 1, NULL, NULL),
(40, 38, 0, 'TBC', 'CANVASING\r\nOpportunity to hotel system', 1, '2019-04-22 15:00:31', '2019-04-22 15:01:34', '#E74C3C', NULL, 'HR Services', 1, NULL, NULL),
(41, 39, 0, 'HRiS', 'CANVASING', 1, '2019-04-22 15:06:39', '2019-04-22 15:06:39', '#E74C3C', NULL, 'HR Services', 1, NULL, NULL),
(42, 40, 0, 'HRiS', 'CANVASING', 1, '2019-04-22 15:11:56', '2019-04-22 15:11:56', '#E74C3C', NULL, 'HR Services', 1, NULL, NULL),
(43, 41, 0, 'Resources', NULL, 1, '2019-04-22 15:24:10', '2019-04-22 15:24:10', '#E74C3C', NULL, 'HR Services - Recruitment & Head Hunting', 1, NULL, NULL),
(44, 42, 0, 'Recruitment', 'Iforte sedang mereview 1 OS yang telah bekerjasama, karena ada beberapa keluhan dari user, kesempatan untuk Empore adalah untuk replace OS existing tersebut, untuk Posisi Receptionis dan Teknisi', 1, '2019-04-22 15:31:56', '2019-04-22 15:33:31', '#E74C3C', NULL, 'HR Services', 1, NULL, NULL),
(45, 43, 0, 'Recruitment', 'Kebutuhan Outsourcing untuk tenaga kuli bongkar muat (TKBM)', 1, '2019-04-22 15:39:59', '2019-04-22 15:42:05', '#E74C3C', NULL, 'HR Services', 1, NULL, NULL),
(46, 44, 0, 'Attandance Application', 'Pengajuan Aplikasi HARRIS + Custom Attendance Application with photo & loglat', 1, '2019-04-24 11:17:40', '2019-04-24 11:17:40', '#8E44AD', NULL, 'HR Services', 1, NULL, NULL),
(47, 45, 0, 'Em-HR', 'JOB FAIR, Balai Kartini, 25 April 19', NULL, '2019-04-29 13:17:08', '2019-04-29 13:17:08', '#E74C3C', NULL, 'HR Services', 1, NULL, NULL),
(48, 45, 0, 'Em-HR', 'JOB FAIR, Balai Kartini 25 April 19', 1, '2019-04-29 13:18:50', '2019-04-29 13:18:50', '#16A085', NULL, 'HR Services', 1, NULL, NULL),
(49, 46, 0, 'SLIK', 'JOB FAIR, Balai Kartini, 25 April 19', 1, '2019-04-29 17:20:31', '2019-04-29 17:20:31', '#16A085', NULL, 'ERP Solution', 1, NULL, NULL),
(50, 47, 0, 'Em-HR', 'JOB FAIR, Balai Kartini, 25 April 19', 1, '2019-04-29 17:26:24', '2019-04-29 17:26:24', '#F1C40F', NULL, 'ERP Solution - HR Solutions', 1, NULL, NULL),
(51, 49, 0, 'Em-HR', 'JOB FAIR, Balai Kartini 25 April 19', 1, '2019-04-30 11:40:08', '2019-04-30 11:40:08', '#E74C3C', NULL, 'ERP Solution - HR Solutions', 1, NULL, NULL),
(52, NULL, 0, NULL, NULL, NULL, '2019-05-02 11:34:35', '2019-05-02 11:34:35', '#C0392B', NULL, 'IT Services', 1, NULL, NULL),
(53, 50, 0, 'Em-HR', 'JOB FAIR, Balai Kartini 25 April 19', 1, '2019-05-02 13:16:20', '2019-05-02 13:16:31', '#16A085', NULL, 'HR Services', 1, NULL, NULL),
(54, 51, 0, 'Em-HR', 'JOB FAIR, Balai Kartini 25 April 19', 1, '2019-05-02 13:52:43', '2019-05-02 13:52:43', '#34495E', NULL, 'HR Services', 1, NULL, NULL),
(55, 53, 0, 'HR Mangement', 'JOB FAIR, Balai Kartini, 25 April 19', 1, '2019-05-02 14:43:48', '2019-05-02 14:43:48', '#E74C3C', NULL, 'HR Services', 1, NULL, NULL),
(56, 54, 0, 'SLIK', 'JOB FAIR, Balai Kartini, 25 April 19', 1, '2019-05-02 15:02:50', '2019-05-02 15:02:50', '#3498DB', NULL, 'ERP Solution', 1, NULL, NULL),
(57, 55, 0, 'IT Custom Application', 'JOB FAIR, Balai Kartini, 25 April 19', 1, '2019-05-02 15:19:39', '2019-05-02 15:19:39', '#E67E22', NULL, 'IT Services', 1, NULL, NULL),
(58, 57, 0, 'Em-HR', 'JOB FAIR, Balai Kartini 25 April 19', 1, '2019-05-02 15:56:47', '2019-05-02 15:56:47', '#7F8C8D', NULL, 'HR Services', 1, NULL, NULL),
(59, 58, 0, 'Em-HR', 'JOB FAIR, Balai Kartini, 25 April 19', 1, '2019-05-02 16:09:28', '2019-05-02 16:09:28', '#8E44AD', NULL, 'HR Services', 1, NULL, NULL),
(60, 48, 123900000, 'Attandance Management', 'Aproachment by Call & Email, arrange schedule meet up for presentasi product', 2, '2019-05-02 16:56:27', '2019-05-20 13:52:01', '#3498DB', 'Quotation Sitcomasia.pdf', 'ERP Solution', 1, '60/1/QO/201905014703', NULL),
(61, 59, 0, 'Em-HR', 'CANVASING, \r\nTotal employee = 30 person', 1, '2019-05-02 17:36:10', '2019-05-02 17:36:10', '#16A085', NULL, 'HR Services', 1, NULL, NULL),
(62, 60, 0, 'Em-HR', 'CANVASING', 1, '2019-05-02 17:46:01', '2019-05-02 17:46:01', '#ECF0F1', NULL, 'HR Services', 1, NULL, NULL),
(63, 61, 0, 'Em-HR', 'CANVASING', 1, '2019-05-02 17:59:53', '2019-05-02 17:59:53', '#C0392B', NULL, 'HR Services', 1, NULL, NULL),
(64, 62, 0, 'Em-HR', 'CANVASING', 1, '2019-05-02 18:05:06', '2019-05-02 18:05:06', '#7F8C8D', NULL, 'HR Services', 1, NULL, NULL),
(65, 63, 0, 'EM-Hr', 'Visit HRD Branch office @Mitra10 Depok >> Direkomendasi untuk next meeting, Introducing product dan demo ke HRD HO', 1, '2019-05-08 10:50:51', '2019-05-08 10:50:51', '#F1C40F', NULL, 'HR Services', 1, NULL, NULL),
(66, 64, 20000, 'Direct Sales Representative', 'Partnership Direct Sales PEDE Fintech dengan pembayaran akuisisi per user start from 10K-20K', 1, '2019-05-21 09:54:47', '2019-05-21 09:54:47', '#E74C3C', NULL, 'HR Services - Recruitment & Head Hunting', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `crm_project_invoice`
--

CREATE TABLE IF NOT EXISTS `crm_project_invoice` (
  `id` int(10) unsigned NOT NULL,
  `crm_project_id` int(11) DEFAULT NULL,
  `payment_term` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `tax_price` int(11) DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks_payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_payment` int(11) DEFAULT NULL,
  `date_payment` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crm_project_items`
--

CREATE TABLE IF NOT EXISTS `crm_project_items` (
  `id` int(10) unsigned NOT NULL,
  `crm_project_id` int(11) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crm_project_items`
--

INSERT INTO `crm_project_items` (`id`, `crm_project_id`, `status`, `item`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'price', '0', '2019-04-09 17:12:46', '2019-04-09 17:12:46'),
(2, 2, 1, 'price', '65000000', '2019-04-09 17:21:18', '2019-04-09 17:21:18'),
(3, 3, 1, 'price', '0', '2019-04-15 11:45:10', '2019-04-15 11:45:10'),
(4, 3, 1, 'file', 'EMPORE HRIS (Em-HR).msg', '2019-04-15 11:45:10', '2019-04-15 11:45:10'),
(5, 4, 1, 'price', '0', '2019-04-15 12:19:31', '2019-04-15 12:19:31'),
(6, 5, 1, 'price', '0', '2019-04-15 15:57:47', '2019-04-15 15:57:47'),
(7, 6, 1, 'price', '0', '2019-04-15 16:44:08', '2019-04-15 16:44:08'),
(8, 7, 1, 'price', '49000000', '2019-04-15 18:15:20', '2019-04-15 18:15:20'),
(9, 8, 1, 'price', '0', '2019-04-16 13:32:53', '2019-04-16 13:32:53'),
(10, 6, 4, 'po_number', 'EHT-Q/ADP/09/0219', '2019-04-16 13:42:11', '2019-04-16 13:42:11'),
(11, 6, 4, 'price', '300000000', '2019-04-16 13:42:11', '2019-04-16 13:42:11'),
(12, 6, 4, 'payment_method', '1', '2019-04-16 13:42:11', '2019-04-16 13:42:11'),
(13, 6, 4, 'month', '12', '2019-04-16 13:42:11', '2019-04-16 13:42:11'),
(14, 6, 4, 'start_date', '2019-03-06', '2019-04-16 13:42:11', '2019-04-16 13:42:11'),
(15, 6, 4, 'end_date', '2020-03-6', '2019-04-16 13:42:11', '2019-04-16 13:42:11'),
(16, 9, 1, 'price', '0', '2019-04-16 13:54:18', '2019-04-16 13:54:18'),
(17, 10, 1, 'price', '0', '2019-04-16 14:27:47', '2019-04-16 14:27:47'),
(18, 11, 1, 'price', '0', '2019-04-16 14:42:24', '2019-04-16 14:42:24'),
(19, 12, 1, 'price', '0', '2019-04-16 15:05:44', '2019-04-16 15:05:44'),
(20, 13, 1, 'price', '0', '2019-04-16 15:59:45', '2019-04-16 15:59:45'),
(21, 14, 1, 'price', '0', '2019-04-16 16:30:48', '2019-04-16 16:30:48'),
(22, 15, 1, 'price', '0', '2019-04-19 19:14:31', '2019-04-19 19:14:31'),
(23, 16, 1, 'price', '0', '2019-04-19 19:29:22', '2019-04-19 19:29:22'),
(24, 17, 1, 'price', '0', '2019-04-19 19:37:32', '2019-04-19 19:37:32'),
(25, 18, 1, 'price', '0', '2019-04-19 19:41:16', '2019-04-19 19:41:16'),
(26, 19, 1, 'price', '0', '2019-04-19 19:58:38', '2019-04-19 19:58:38'),
(27, 20, 1, 'price', '0', '2019-04-19 19:59:40', '2019-04-19 19:59:40'),
(28, 21, 1, 'price', '0', '2019-04-19 20:04:07', '2019-04-19 20:04:07'),
(29, 22, 1, 'price', '0', '2019-04-19 20:07:45', '2019-04-19 20:07:45'),
(30, 23, 1, 'price', '0', '2019-04-19 20:14:27', '2019-04-19 20:14:27'),
(31, 24, 1, 'price', '0', '2019-04-19 20:22:24', '2019-04-19 20:22:24'),
(32, 25, 1, 'price', '0', '2019-04-19 20:25:35', '2019-04-19 20:25:35'),
(33, 26, 1, 'price', '0', '2019-04-19 20:28:08', '2019-04-19 20:28:08'),
(34, 27, 1, 'price', '0', '2019-04-22 13:15:17', '2019-04-22 13:15:17'),
(35, 28, 1, 'price', '0', '2019-04-22 13:46:46', '2019-04-22 13:46:46'),
(36, 29, 1, 'price', '0', '2019-04-22 13:51:34', '2019-04-22 13:51:34'),
(37, 30, 1, 'price', '0', '2019-04-22 13:55:41', '2019-04-22 13:55:41'),
(38, 31, 1, 'price', '0', '2019-04-22 13:58:43', '2019-04-22 13:58:43'),
(39, 32, 1, 'price', '0', '2019-04-22 14:02:31', '2019-04-22 14:02:31'),
(40, 33, 1, 'price', '0', '2019-04-22 14:08:02', '2019-04-22 14:08:02'),
(41, 34, 1, 'price', '0', '2019-04-22 14:19:41', '2019-04-22 14:19:41'),
(42, 35, 1, 'price', '0', '2019-04-22 14:34:35', '2019-04-22 14:34:35'),
(43, 36, 1, 'price', '0', '2019-04-22 14:41:12', '2019-04-22 14:41:12'),
(44, 37, 1, 'price', '0', '2019-04-22 14:47:18', '2019-04-22 14:47:18'),
(45, 38, 1, 'price', '0', '2019-04-22 14:54:20', '2019-04-22 14:54:20'),
(46, 39, 1, 'price', '0', '2019-04-22 14:57:35', '2019-04-22 14:57:35'),
(47, 40, 1, 'price', '0', '2019-04-22 15:00:31', '2019-04-22 15:00:31'),
(48, 41, 1, 'price', '0', '2019-04-22 15:06:39', '2019-04-22 15:06:39'),
(49, 42, 1, 'price', '0', '2019-04-22 15:11:56', '2019-04-22 15:11:56'),
(50, 43, 1, 'price', '0', '2019-04-22 15:24:10', '2019-04-22 15:24:10'),
(51, 44, 1, 'price', '0', '2019-04-22 15:31:56', '2019-04-22 15:31:56'),
(52, 45, 1, 'price', '0', '2019-04-22 15:39:59', '2019-04-22 15:39:59'),
(53, 7, 2, 'quotation_order', '7/1/QO/201904110256', '2019-04-24 11:05:04', '2019-04-24 11:05:04'),
(54, 7, 2, 'submit_date', NULL, '2019-04-24 11:05:04', '2019-04-24 11:05:04'),
(55, 7, 2, 'price', '49000000', '2019-04-24 11:05:04', '2019-04-24 11:05:04'),
(56, 46, 1, 'price', '0', '2019-04-24 11:17:40', '2019-04-24 11:17:40'),
(57, 47, 1, 'price', '0', '2019-04-29 13:17:08', '2019-04-29 13:17:08'),
(58, 48, 1, 'price', '0', '2019-04-29 13:18:50', '2019-04-29 13:18:50'),
(59, 49, 1, 'price', '0', '2019-04-29 17:20:31', '2019-04-29 17:20:31'),
(60, 50, 1, 'price', '0', '2019-04-29 17:26:24', '2019-04-29 17:26:24'),
(61, 51, 1, 'price', '0', '2019-04-30 11:40:08', '2019-04-30 11:40:08'),
(62, 52, 1, 'price', '0', '2019-05-02 11:34:35', '2019-05-02 11:34:35'),
(63, 53, 1, 'price', '0', '2019-05-02 13:16:20', '2019-05-02 13:16:20'),
(64, 54, 1, 'price', '0', '2019-05-02 13:52:43', '2019-05-02 13:52:43'),
(65, 55, 1, 'price', '0', '2019-05-02 14:43:48', '2019-05-02 14:43:48'),
(66, 56, 1, 'price', '0', '2019-05-02 15:02:50', '2019-05-02 15:02:50'),
(67, 57, 1, 'price', '0', '2019-05-02 15:19:39', '2019-05-02 15:19:39'),
(68, 58, 1, 'price', '0', '2019-05-02 15:56:47', '2019-05-02 15:56:47'),
(69, 59, 1, 'price', '0', '2019-05-02 16:09:28', '2019-05-02 16:09:28'),
(70, 60, 1, 'price', '0', '2019-05-02 16:56:27', '2019-05-02 16:56:27'),
(71, 61, 1, 'price', '0', '2019-05-02 17:36:10', '2019-05-02 17:36:10'),
(72, 62, 1, 'price', '0', '2019-05-02 17:46:01', '2019-05-02 17:46:01'),
(73, 63, 1, 'price', '0', '2019-05-02 17:59:53', '2019-05-02 17:59:53'),
(74, 64, 1, 'price', '0', '2019-05-02 18:05:06', '2019-05-02 18:05:06'),
(75, 65, 1, 'price', '0', '2019-05-08 10:50:51', '2019-05-08 10:50:51'),
(76, 60, 2, 'quotation_order', '60/1/QO/201905014703', '2019-05-20 13:52:01', '2019-05-20 13:52:01'),
(77, 60, 2, 'submit_date', NULL, '2019-05-20 13:52:01', '2019-05-20 13:52:01'),
(78, 60, 2, 'price', '123900000', '2019-05-20 13:52:01', '2019-05-20 13:52:01'),
(79, 60, 2, 'file', 'Quotation Sitcomasia.pdf', '2019-05-20 13:52:01', '2019-05-20 13:52:01'),
(80, 66, 1, 'price', '20000', '2019-05-21 09:54:47', '2019-05-21 09:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `crm_project_payment_method_perpetual_license`
--

CREATE TABLE IF NOT EXISTS `crm_project_payment_method_perpetual_license` (
  `id` int(10) unsigned NOT NULL,
  `crm_project_id` int(11) DEFAULT NULL,
  `terms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `milestone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persen` smallint(6) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `crm_project_invoice_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crm_project_payment_method_perpetual_license`
--

INSERT INTO `crm_project_payment_method_perpetual_license` (`id`, `crm_project_id`, `terms`, `milestone`, `persen`, `value`, `status`, `crm_project_invoice_id`, `created_at`, `updated_at`) VALUES
(1, 6, 'Term 1', 'Signing of Contact', 30, 90000000, 0, NULL, '2019-04-16 13:42:11', '2019-04-16 13:42:11'),
(2, 6, 'Term 2', 'Completion of 3 Module', 20, 60000000, 0, NULL, '2019-04-16 13:42:11', '2019-04-16 13:42:11'),
(3, 6, 'Term 3', 'Completion of all module & subscribe cloud server', 20, 60000000, 0, NULL, '2019-04-16 13:42:11', '2019-04-16 13:42:11'),
(4, 6, 'Term 3', 'Installation, Integration & Training', 30, 90000000, 0, NULL, '2019-04-16 13:42:11', '2019-04-16 13:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `crm_project_payment_method_subscription`
--

CREATE TABLE IF NOT EXISTS `crm_project_payment_method_subscription` (
  `id` int(10) unsigned NOT NULL,
  `crm_project_id` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `terms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `crm_project_invoice_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crm_project_pipeline`
--

CREATE TABLE IF NOT EXISTS `crm_project_pipeline` (
  `id` int(10) unsigned NOT NULL,
  `crm_project_id` int(11) DEFAULT NULL,
  `status_card` int(11) DEFAULT NULL,
  `pipeline_status` int(11) DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `file` text COLLATE utf8mb4_unicode_ci,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crm_project_pipeline`
--

INSERT INTO `crm_project_pipeline` (`id`, `crm_project_id`, `status_card`, `pipeline_status`, `value`, `created_at`, `updated_at`, `user_id`, `file`, `title`, `date`) VALUES
(4, 4, 5, 1, 'Have met Pak Jen introducing EMPORE HEZER TAMA.', '2019-04-15 12:26:47', '2019-04-16 13:57:09', 1, NULL, 'Meet', '2019-04-09'),
(5, 9, 5, 1, 'A complete approach by phone,', '2019-04-16 13:55:07', '2019-04-16 16:09:29', 1, NULL, 'Call', '2019-04-09'),
(6, 8, 5, 1, 'Have met Pak Jen introducing EMPORE HEZER TAMA.', '2019-04-16 13:56:55', '2019-04-16 13:56:55', 1, NULL, 'Meet', '2019-04-09'),
(7, 5, 5, 1, 'Have presented Procurement Application to client', '2019-04-16 14:01:46', '2019-04-16 14:04:26', 1, NULL, 'Demo', '2019-01-24'),
(8, 5, 5, 1, 'Waiting for Contract from Client', '2019-04-16 14:03:12', '2019-04-16 14:04:08', 1, NULL, 'Call', '2019-03-11'),
(9, 10, 5, 1, 'Have sent email to Pak Muji for company introduction', '2019-04-16 14:28:52', '2019-04-16 16:08:15', 1, NULL, 'Mail', '2019-02-07'),
(10, 10, 5, 1, 'Met Pak Muji to discuss more for Outsourcing project', '2019-04-16 14:30:14', '2019-04-16 16:08:30', 1, NULL, 'Meet', '2019-02-22'),
(11, 11, 5, 1, 'Email send to PIC for company introduction', '2019-04-16 14:43:41', '2019-04-16 16:07:27', 1, NULL, 'Mail', '2019-02-06'),
(12, 11, 5, 1, 'Met PIC to discuss more for Outsourcing Project', '2019-04-16 14:45:20', '2019-04-16 16:07:11', 1, NULL, 'Meet', '2019-02-13'),
(13, 12, 5, 1, 'Have contacted Pak Fajar from HR & GA Department', '2019-04-16 15:25:11', '2019-04-16 16:06:30', 1, NULL, 'Call', '2019-02-07'),
(14, 12, 5, 1, 'Have sent email for Company Introduction and need to follow up to arrange for meeting schedule', '2019-04-16 15:28:06', '2019-04-16 16:11:35', 1, NULL, 'Mail', '2019-02-22'),
(15, 13, 5, 1, 'ERP and HRis with Ibu Silvia (EMPORE)', '2019-04-16 16:03:51', '2019-05-02 13:10:40', 1, NULL, 'Demo', '2019-02-15'),
(16, 14, 5, 1, 'Sent email for Company profile', '2019-04-16 16:35:30', '2019-04-16 16:35:30', 1, NULL, 'Mail', '2019-02-12'),
(17, 14, 5, 1, 'Company Profile and HR Application presentation', '2019-04-16 16:37:12', '2019-04-16 16:37:12', 1, NULL, 'Demo', '2019-03-14'),
(18, 34, 5, 1, 'Meet Pak Rendy', '2019-04-22 14:20:23', '2019-04-22 14:20:23', 1, NULL, 'Meet', '2019-03-22'),
(19, 44, 5, 1, 'Lunch meeting with Ibu Ayu', '2019-04-22 15:32:44', '2019-04-22 15:32:44', 1, NULL, 'Meet', '2019-02-25'),
(20, 45, 5, 1, NULL, '2019-04-22 15:41:55', '2019-04-22 15:41:55', 1, NULL, 'Meet', '2019-04-18'),
(21, 46, 5, 1, 'Open Approaching to Mr. Bimo Channel Development Department, Arrange next meeting Week1 Mei 2019', '2019-04-24 11:20:19', '2019-04-24 11:20:19', 1, NULL, 'Meet', '2019-04-23'),
(22, 48, 5, 1, 'Send email for HR Services and Em-HR application', '2019-04-29 13:20:27', '2019-04-29 13:20:27', 1, NULL, 'Mail', '2019-04-29'),
(23, 49, 5, 1, 'Send company introduction and SLIK BELLA Brochure', '2019-04-29 17:21:38', '2019-04-29 17:21:38', 1, NULL, 'Mail', '2019-04-29'),
(25, 53, 5, 1, 'Send email for Em-HR application', '2019-05-02 13:19:57', '2019-05-02 13:19:57', 1, NULL, 'Mail', '2019-05-02'),
(26, 54, 5, 1, 'Send email for Em- HR', '2019-05-02 13:56:37', '2019-05-02 13:56:37', 1, NULL, 'Mail', '2019-05-02'),
(27, 55, 5, 1, 'Send email and Company Profile for company introduction', '2019-05-02 14:44:31', '2019-05-02 14:44:31', 1, NULL, 'Mail', '2019-05-02'),
(28, 56, 5, 1, 'Send Company Profile and Slik brochure for company introduction', '2019-05-02 15:05:45', '2019-05-02 15:05:45', 1, NULL, 'Mail', '2019-05-02'),
(29, 57, 5, 1, 'Send Company profile for Company Intoduction', '2019-05-02 15:21:28', '2019-05-02 15:21:28', 1, NULL, 'Mail', '2019-05-02'),
(30, 58, 5, 1, 'Send Em-HR Price list and Company Profile for Company Introduction', '2019-05-02 16:01:11', '2019-05-02 16:01:11', 1, NULL, 'Mail', '2019-05-02'),
(31, 46, 5, 1, 'Company Profile EMPORE was Send', '2019-05-02 16:03:10', '2019-05-02 16:03:10', 1, NULL, 'Mail', '2019-05-02'),
(32, 59, 5, 1, 'Send Em-HR Price List and Company Profile for Company Introduction', '2019-05-02 16:12:27', '2019-05-02 16:12:27', 1, NULL, 'Mail', '2019-05-02'),
(33, 61, 5, 1, 'Have present Em-HR Application', '2019-05-02 17:38:25', '2019-05-02 17:38:25', 1, NULL, 'Demo', '2019-04-02'),
(34, 51, 5, 1, 'Call Office to arrange time for meeting, need to send email to HRD Fachdi@belimobilgue.co.id', '2019-05-06 16:18:42', '2019-05-06 16:18:42', 1, NULL, 'Call', '2019-05-06'),
(35, 60, 5, 1, 'Aproachment by Call reschedule meet up for presentasi product', '2019-05-08 11:08:14', '2019-05-08 11:08:14', 1, NULL, 'Call', '2019-05-08'),
(36, 65, 5, 1, 'Visit HRD Branch office @Mitra10 Depok >> Direkomendasi untuk next meeting, Introducing product dan demo ke HRD HO', '2019-05-08 11:08:55', '2019-05-08 11:08:55', 1, NULL, 'Meet', '2019-05-08'),
(37, 3, 5, 1, 'Present company profile and company services', '2019-05-10 17:15:51', '2019-05-10 17:15:51', 1, NULL, 'Demo', '2019-05-07'),
(38, 3, 5, 1, 'Have sent email for PRICE LIST of Em-HR perpetual and subscription methode', '2019-05-10 17:17:15', '2019-05-20 14:01:02', 1, NULL, 'Mail', '2019-05-09'),
(39, 60, 5, 1, '1st Meeting 10/05/2019, Next for Quotation', '2019-05-13 10:03:25', '2019-05-13 10:03:25', 1, NULL, 'Meet', '2019-05-13'),
(40, 53, 5, 1, 'Rizky Pradana : Result dari GM saya, mohon maaf untuk kali ini kami belum lanjutkan proses penawaran dari Empore, karena masih menggunakan ProInt dan belum ada rencana penggantian', '2019-05-13 12:02:49', '2019-05-13 12:02:49', 1, 'Snapshoot WA confirmation.docx', 'Call', '2019-05-13'),
(41, 53, 4, 1, 'Terminate', '2019-05-13 12:03:29', '2019-05-13 12:03:29', 1, NULL, NULL, NULL),
(42, 18, 5, 1, 'Send email by Rachma Makiyah of ERP Slaes Quotation', '2019-05-13 14:53:41', '2019-05-13 14:53:41', 1, NULL, 'Mail', '2019-04-09'),
(43, 18, 5, 1, 'Follow up Pak Syahnan for quotation submitted, currently on Internal discussion', '2019-05-13 14:54:45', '2019-05-13 14:54:45', 1, NULL, 'Call', '2019-05-10'),
(44, 3, 5, 1, 'Received email from Union Space for Collaboration Term and condition by using subcription method', '2019-05-23 15:44:33', '2019-05-23 15:44:33', 1, NULL, 'Mail', '2019-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_01_10_162712_add_column_user_access', 1),
(2, '2019_01_10_163436_create_table_user_access', 2),
(3, '2019_01_23_133303_create_table_setting', 3),
(4, '2019_01_24_144344_create_table_navigations', 4),
(5, '2019_01_24_151735_add_column_navigations2', 5),
(6, '2019_01_24_171931_create_table_pages', 6),
(8, '2019_01_24_232647_add_column_navigation3', 7),
(9, '2019_01_25_143405_add_column_navigations4', 8),
(10, '2019_01_28_141127_add_column_navigation_pages', 9),
(12, '2019_01_28_161849_create_table_navigation_widget', 10),
(13, '2019_01_28_184008_add_column_navigation_page_widget', 11),
(14, '2019_01_29_120441_add_column_users', 12),
(15, '2019_01_29_120755_add_column_users2', 13),
(16, '2019_01_29_121002_add_column_users3', 14),
(17, '2019_01_29_132658_create_table_widget_success_stories', 15),
(18, '2019_02_01_181120_create_table_client', 16),
(19, '2019_02_01_183941_add_column_client1', 17),
(20, '2019_02_07_202357_add_column_client3', 17),
(21, '2019_02_07_202918_add_column_client', 18),
(22, '2019_02_08_155551_create_crm_projects', 19),
(23, '2019_02_08_172638_add_column_crm_projects', 20),
(24, '2019_02_08_181152_add_column_crm_projects', 21),
(25, '2019_02_09_095115_crm_project_pipeline', 22),
(26, '2019_02_09_100127_add_column_crm_project_pipeline', 23),
(27, '2019_02_09_153202_create_table_crm_product', 24),
(28, '2019_03_10_225617_add_column_crm_project_pipeline3', 25),
(29, '2019_03_17_174535_add_column_crm_projects', 26),
(30, '2019_03_17_180713_add_column_crm_projects3', 26),
(31, '2019_03_17_190940_add_column_crm_project_pipeline4', 26),
(32, '2019_03_17_213057_add_column_crm_projects5', 26),
(33, '2019_03_17_215824_create_table_crm_project_items', 26),
(34, '2019_03_22_171738_create_table_crm_project_payment_method', 27),
(35, '2019_03_23_005851_add_column_add_crm_project_pipeline3', 27),
(36, '2019_03_24_234659_create_table_crm_project_invoice', 27),
(37, '2019_03_25_021715_add_column_crm_project_invoice', 27),
(38, '2019_03_25_152539_add_column_crm_project_payment_method_subscription', 28),
(39, '2019_04_09_165233_add_column_crm_client20190408', 29);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(10) unsigned NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'title', 'CRM -  PT. EMPORE HEZER TAMA', '2019-01-24 07:16:22', '2019-02-01 10:40:10'),
(2, 'description', NULL, '2019-01-24 07:16:22', '2019-02-01 10:40:10'),
(3, 'telepon', '021234567', '2019-01-24 07:16:22', '2019-01-29 06:21:48'),
(4, 'fax', '021234567', '2019-01-24 07:16:22', '2019-01-29 06:21:48'),
(5, 'email', 'info@empore.com', '2019-01-24 07:16:23', '2019-02-01 07:02:51'),
(6, 'address', 'Metropolitan tower, level13-A \r\nJl. R.A. Kartini - T.B. Simatupang Kav. 14\r\nCilandak, Jakarta Selatan\r\nJakarta - 12430', '2019-01-24 07:16:23', '2019-02-01 07:02:51'),
(7, 'logo', '596027fde66988741faf82316dd1c994.png', '2019-01-25 05:03:29', '2019-02-01 07:01:30'),
(8, 'favicon', '93dc0354ae7540ac95e9219c4087050e.gif', '2019-01-25 06:37:42', '2019-02-01 07:06:00'),
(9, 'logo_footer', '596027fde66988741faf82316dd1c994.png', '2019-01-25 06:37:51', '2019-02-01 07:01:30'),
(10, 'footer_title', 'HRIS', '2019-01-25 19:08:11', '2019-02-01 07:01:51'),
(11, 'footer_description', 'Copyright © 2019 HRIS. \r\nAll Rights Reserved.', '2019-01-25 19:08:11', '2019-02-01 07:01:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_access_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `telepon` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_access_id`, `status`, `foto`, `address`, `telepon`, `fax`) VALUES
(1, 'Administrator', 'admin@gmail.com', NULL, '$2y$10$3gPS3dKGhiKXNKz8.gcxS.b/xjtAnNfhgICQv8SGCyBvI86oV8t/u', 'CrRCTUAB4fGk0G29NHES0HG1nUACTnkRugZYE8MTcsWb29M9Uyf6qKH4Ur10', NULL, '2019-01-29 06:14:29', 1, NULL, '/upload/profile/1/ebaa0189a1c52d15a24a8e143d17681a.jpeg', 'Bogor', '02145433', '02123242'),
(4, 'Rachma Makiyah', 'rachma@empore.co.id', NULL, '$2y$10$BNPhKXpKEkPKGvh7W/6a7OMX48fsKd1x039IrH4Oip5BxqGafLzP6', 'AjWygcWAeLKsfmKjtmeT6FZFRKH9ruPVB8hzcej6RhVVbZ2r2Lyp3RHDlu1Y', '2019-02-07 12:57:58', '2019-04-09 17:24:01', 4, 1, NULL, NULL, NULL, NULL),
(13, 'Naelly', 'naelly@empore.co.id', NULL, '$2y$10$l09XZXXztpY3aSLYR.urfenua4nTJRyELVbIl5CqLGno/Pp3B25ye', NULL, '2019-04-09 16:36:50', '2019-05-08 14:35:56', 4, 1, NULL, NULL, NULL, NULL),
(14, 'Bank Multiartha Sentosa', 'kantorpusat@bankmas.co.id', NULL, '$2y$10$9gjv22vhjaByeRSoM7YPw.tRRL0FZdSMfOsBHLOss/HFcIZPZp2Be', NULL, '2019-04-09 16:49:28', '2019-04-09 17:23:00', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Union Space', 'tia@unionspace.com', NULL, '$2y$10$0I82pMc/CxtK0.GhpR0lI.yBsLXOURSLwaWfUS.UaQMCcmFFLsgt2', NULL, '2019-04-15 11:40:51', '2019-04-15 11:40:51', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Margareth Silvia', 'silvia@empore.co.id', NULL, '$2y$10$IxHud5qI10I2PVw0WLPa4ep6EwWPjySEfepw6Qcb4fwN3MfueU.Hu', NULL, '2019-04-15 11:55:53', '2019-04-15 12:16:30', 4, 1, NULL, NULL, NULL, NULL),
(17, 'PT Dinar Makmur', '.', NULL, '$2y$10$EXa6L0KhgJ61vDNhjptvnuOvzIUA60fxeKScdpuXKhkXHVzp3FmQS', NULL, '2019-04-15 12:15:35', '2019-04-15 12:15:35', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'PT JXpress Trasindo', 'cs@j-express.id', NULL, '$2y$10$UFjA3quoYOrl5jvCPrl0W.Zu.GZA2pJEQdzI7wwTgXEbLUaB7DZ5e', NULL, '2019-04-15 15:55:04', '2019-04-15 15:55:04', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'ADP International', 'adp.bsd@gmail.com', NULL, '$2y$10$e8jxPJjBC3lQ6l7rMPmQ2OonO4CAPJXYD774buRUhWqkSNBTR55hy', NULL, '2019-04-15 16:42:17', '2019-04-15 16:42:17', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Henry S', 'henry@empore.co.id', NULL, '$2y$10$KiqQWxkgHPQjgb4c4kfdwurTi.Q4IwxN6JN8HOUTdptAfi7Q.Do0C', NULL, '2019-04-15 17:00:19', '2019-04-15 17:00:19', 4, 1, NULL, NULL, NULL, NULL),
(21, 'PT Putra Mulia Telecommunication', 'sales@pmt.co.id', NULL, '$2y$10$p7Sk112dvEZZK0gVeLkV6umYFp7NUVuPLMbJ.HX5P.d21mU.Bzak2', NULL, '2019-04-15 18:12:12', '2019-04-15 18:12:12', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'PT Sari Multi Utama (Bogor Plant)', NULL, NULL, '$2y$10$H2IzZn7ssq//5QP/uDMYMuihpfSxOiFyODu5yfC4yNLwo2Xw8w3/a', NULL, '2019-04-16 13:28:01', '2019-05-23 16:09:46', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Hotel Indonesia Kempinski', 'gist@grand-indonesia.com', NULL, '$2y$10$LM8k7XIk9F8YH.8QF05ZWuxnOj.t3g2p0F0SBRVbiNH78cBKHiW42', NULL, '2019-04-16 13:49:59', '2019-04-16 13:49:59', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'PT Jamu Air Mancur', 'cs@airmancur.co.id', NULL, '$2y$10$N2D1HBfw7JC6Mif8R19CsOcyMCTbHtig91zulBIaXNsGT..W1mpfG', NULL, '2019-04-16 14:20:46', '2019-04-16 14:21:59', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'PT Sun Life Financial Indonesia', 'x', NULL, '$2y$10$c/BQGtE71JRQ7QJ.UQTqH.qJwtyJAqJPEdvMEoIR.HPz0Mgam3hTy', NULL, '2019-04-16 14:38:43', '2019-04-16 14:38:43', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'PT Champ Resto Indonesia', 'Suarapelanggan@champ-group.com', NULL, '$2y$10$/ujdw6s8DrbC60dRDK8kJueo1.jP9DwyKHTJjGEAc8sxuXRfgizTa', NULL, '2019-04-16 15:03:21', '2019-04-16 15:03:21', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Lotte Shopping Avenue', 'umi.lestari@lotteavenue.co.id', NULL, '$2y$10$Sg4iUyPGAe8YDWpFvdDQlOROyALJ2BaNeAUftkOtNosULs9wf6tJu', NULL, '2019-04-16 15:55:56', '2019-04-16 15:55:56', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'PT Centrin Online Prima', 'imam@centrin.net.id', NULL, '$2y$10$NoyCl8YvSLFej9hZNApNHujFmheWzVorAxrCFS3DGxpkAD4rJyo36', NULL, '2019-04-16 16:26:41', '2019-04-16 16:26:41', NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Brankas', 'XXXXX', NULL, '$2y$10$/fElWiPwdl7Zy5xx3RlC2O2iHboAqgrtyIMrhWTG5xHnKPo6EhyhK', NULL, '2019-04-16 17:22:32', '2019-04-16 17:22:32', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Bank Kaltim', 'xxxxxxxx', NULL, '$2y$10$C3IznuV/Lu7KZZqei6LRZ.MD2rTu0O4sP6ODIXBo.RfA5UK/f901O', NULL, '2019-04-19 19:27:43', '2019-04-19 19:27:43', NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'PT  Indoarsip', NULL, NULL, '$2y$10$7Zwre1Pkf12sbgo6YYYZ5.lRyhSShE4OvwcekyM9R8VoNJXyjSD2e', NULL, '2019-04-19 19:34:04', '2019-05-21 13:57:10', NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'PT Interlink', 'syahnan@interlink.net.id', NULL, '$2y$10$jMgWbIEZsrE2coLKgteEleUqhUXItjEuCAFRE37rEFj2zgGMpNyxW', NULL, '2019-04-19 19:40:07', '2019-05-06 14:26:09', NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'PT Mahkota Investama Unggulan', 'vvvvvv', NULL, '$2y$10$Axgz6BtzRIorPcXqsZEkUO9T/yDNaW.ATP0e9iABSWSDrxWKJ0Ls.', NULL, '2019-04-19 19:44:15', '2019-04-19 19:44:15', NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'PT Servio', 'suci.desiarni@servio.co.id', NULL, '$2y$10$9o3IhTlU2fqWd5xcZ4290usrbrbkROnE2SgwKbLhbrKDqQE7Wj/PW', NULL, '2019-04-19 20:02:56', '2019-04-19 20:02:56', NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'PT Scan Shipping', NULL, NULL, '$2y$10$v51gObMHNZaqKmivmDBRD.GW3/6/y.2n2v6Ah2vZqwkCy/jPFDNEi', NULL, '2019-04-19 20:06:59', '2019-04-22 13:20:28', NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'PT Rentokil Indonesia', 'maulana.1@rentokil-initial.com', NULL, '$2y$10$Z.zmQM75kq2yWTQ1pyGkveDOHT2zZHf7NjBEFUonwgnWISEIcE4P.', NULL, '2019-04-19 20:11:13', '2019-04-22 11:48:05', NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Citybank', NULL, NULL, '$2y$10$g.w769s4gOYgmLkj5vmZZOpjRYBa5g25DSMiYy8HCvFpZuVMHXcK.', NULL, '2019-04-19 20:20:27', '2019-04-22 11:36:59', NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'PT Tuperware', 'intanperdanasari@tupperware.com', NULL, '$2y$10$EsguCXOw.nfRbKpJJKKQue3g9FO.UJc9uLcgPZeAJPLfHNVHcnOWu', NULL, '2019-04-19 20:24:20', '2019-04-22 11:26:08', NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Asian Green Real Estate', 'viktricia.tika@asiagreen.com', NULL, '$2y$10$b5bjKqgqwio84y3x5R8vvOWPWT35CkTR8RfhOyddZ5P7RzS.lgPna', NULL, '2019-04-19 20:27:28', '2019-04-22 11:22:22', NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'PT Semen Indonesia', NULL, NULL, '$2y$10$U9SYijdL5I0IqPDDgJ772uDKjJuUi2ApmOO8O00AYWKOvckca5bM.', NULL, '2019-04-19 20:30:47', '2019-04-22 11:57:01', NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'PT. Donaldson Filtration Indonesia', 'Shinta.rumetta@donaldson.com', NULL, '$2y$10$T13nLvipUzJLMiglndzkjey4Pgi8FdhP0NSCVuYmGIZJqJh6vYXyK', NULL, '2019-04-22 13:45:30', '2019-04-22 13:45:30', NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'PT Darya-Varia Laboratoria Tbk Perusahaan', '-', NULL, '$2y$10$NBgoTr0GHlesEEEHju14QO.W8OzuQSKAjdveZOogG8Y9Cm2fMUWji', NULL, '2019-04-22 13:50:48', '2019-04-22 13:50:48', NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'PT. Suntory Garuda Beverage', 'rina.meity@sgbi.co.id', NULL, '$2y$10$sAoxliDN88Ky8snkCGQ.RuofjhsBfZsTyPsNOxf2wdtAacwqfkMhS', NULL, '2019-04-22 13:55:12', '2019-04-22 13:55:12', NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'PT AECOM Indonesia', 'heryantiaulia.dewi@aecom.com', NULL, '$2y$10$LCft08MoXF6kb7iYq9YXHelGgjq3XJEmLI2L6PNETms0/LZmgEE2S', NULL, '2019-04-22 13:58:12', '2019-04-22 13:58:12', NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'PT. Japan Tobacco International', 'bernadeta.devi@jti.com', NULL, '$2y$10$N3aDWMMC9Cr7Gf0YP.PYBO3lVJIZV5kA3kO7Ztp6BSFEedCrNaPpe', NULL, '2019-04-22 14:01:36', '2019-04-22 14:01:36', NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'NISSAN MOTOR INDONESIA', 'TBC', NULL, '$2y$10$9u8YyCbIsMymkkKPO/TqCucxcjF5B1iCO2gpb.9dKB2UmlVqtxrju', NULL, '2019-04-22 14:06:05', '2019-04-22 14:06:05', NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'Astra Credit Companies (ACC)', 'TBC 1', NULL, '$2y$10$2/bEGdnER9ixRo8PlwFBeeCn4Lq05q.GJCMf8jW.ja5EufMEpCZua', NULL, '2019-04-22 14:17:44', '2019-04-22 14:17:44', NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'Big Cash Syariah', 'TBC11', NULL, '$2y$10$daddBRaG7GZFoHabQ5.4se8eO0D33lZv72zI1dqtNtRihf3vP9bpC', NULL, '2019-04-22 14:32:32', '2019-04-22 14:32:32', NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'PT. Solusi Bangun Indonesia (HOLCIM)', NULL, NULL, '$2y$10$88nVIdm5BJF9ADhxId7Z.Ongqw4ghrqkkVbri2QqQSRxgJ5YSsq3K', NULL, '2019-04-22 14:40:06', '2019-04-22 14:42:50', NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'PT Shell Indonesia', 'tbd', NULL, '$2y$10$Ye2VBy2t740oPd3.Dspq2udhGE1eYc4TdvEqM3KYIxjK5uRh66726', NULL, '2019-04-22 14:46:31', '2019-04-22 14:46:31', NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'Petronas Carigali Tanjung Jabung', 'tbd1', NULL, '$2y$10$IaT3HAReSv7n1iN65IDslu7ozJknE9zY4nXBv8wRTTBvREY2SkRc6', NULL, '2019-04-22 14:53:31', '2019-04-22 14:53:31', NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'PT. Collega Inti Pratama', 'tbdd', NULL, '$2y$10$nnHX2V8Gi.WiWJ5WUTDfj.KYPMd6j0/0EokyHazvPiEO1.frWIS4W', NULL, '2019-04-22 14:56:41', '2019-04-22 14:56:41', NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'PT Bukit Uluwatu Villa', 'yohana.anastasya@buvagroup.com', NULL, '$2y$10$/wADmdbaWebJTFAf9SUbGOyLxyCI8eQDm4RSpWxRu/2jONlNbo5Em', NULL, '2019-04-22 14:59:51', '2019-04-22 14:59:51', NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'Seven Events', 'rara@seven-event.com', NULL, '$2y$10$SjA4zp87w8m4i3QgFRlRrunKb/q8UsJS.254c0nP5w9Jc3ld7Prbi', NULL, '2019-04-22 15:05:50', '2019-04-22 15:05:50', NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'PT Tangguh Niaga Supratama', 'tbcc', NULL, '$2y$10$Q5KsVhArwtONcnwPoEVNke.SmZBMOT4PEkUt/JB99rq1aYsb20JSi', NULL, '2019-04-22 15:11:15', '2019-04-22 15:11:15', NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'PT. Bali Towerindo Sentra, Tbk', 'tbdb', NULL, '$2y$10$7v6TBeauEcBzJ.APNM/h5eJWQebQCyR4lVrrfqZ86esDgGKMiTkXG', NULL, '2019-04-22 15:23:15', '2019-04-22 15:23:15', NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'iForte Global Internet', 'tbddc', NULL, '$2y$10$VPC.Rj2RAtUYwPhTHMUOzez.ToMKBNpki.wBcPEh6B82Fl2e3LQai', NULL, '2019-04-22 15:30:05', '2019-04-22 15:30:05', NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'PT. Cipta Mapan Logistik (Linc Group)', 'tbcdd', NULL, '$2y$10$y7HTxKE.PGaqGxVCGR3AJeH3gG5BRAedfHpDX8tugn0rWaFiD2it6', NULL, '2019-04-22 15:38:34', '2019-04-22 15:38:34', NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'Muhammad Fitrayadi', 'adi@empore.co.id', NULL, '$2y$10$i9UC0kd8yd7in1isZIj1t.JZr8RmPF1bY4BMFnL7UXO3eVtUYoQE6', NULL, '2019-04-24 11:10:16', '2019-04-24 11:10:16', 4, 1, NULL, NULL, NULL, NULL),
(60, 'Bank BTPN -  JENIUS', 'info@btpn.com', NULL, '$2y$10$koWUqgSYk5W2NbHiYD1gSuHF9bQvxHuOtS79alB5ZY.LEVJVcSdT2', NULL, '2019-04-24 11:14:42', '2019-04-24 11:14:42', NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'Importir.org', 'recruitment@importir.com', NULL, '$2y$10$LRw15G8HNUYYr3go6OOvCuatO64lHrSg.SjlLGoapGJNLIlokf56C', NULL, '2019-04-29 13:15:39', '2019-04-29 13:15:39', NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'PT Maybank Indonesia Finance', 'jessicaa@maybankfinance.co.id', NULL, '$2y$10$LTD4ucf3Y..Kntqix7ujQ.2rStd34ycuKIodDj4JcFimVOrhqsKpC', NULL, '2019-04-29 17:17:05', '2019-04-29 17:19:19', NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'PointStar Indonesia', 'hr@point-star.com', NULL, '$2y$10$c8f1u1cbOnL1.b7nqxK/zOHzeakuTv9.T4jJ9m3LriYP9pB8Mkgae', NULL, '2019-04-29 17:25:15', '2019-04-29 17:25:15', NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'PT. Sitcomindo (Samsung Partners)', 'deddy.purnama@sitcomasia.com', NULL, '$2y$10$yFosR977yB3GE7wv9WamV.8mV11WITwxUIRS0.jOuTlEZ8DWJnQG.', NULL, '2019-04-30 10:22:35', '2019-05-13 10:01:24', NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'BeliMobilGue.co.id', 'talent@belimobilgue.co.id', NULL, '$2y$10$GYOmGISraveWcy0ttxkE7uI4u4PncsUDvwAriaMOefXZJ/RIC5aee', NULL, '2019-04-30 11:32:30', '2019-04-30 11:32:30', NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'PT. ADICIPTA BOGA INTIPRIMA IMPERIAL', 'recruitment_op@impgroup.co.id', NULL, '$2y$10$jHSqX.e5sg2mk9BCQzuqVu9oer.Diz0ybuGBgiNYEvMJ3t1wgmmtO', NULL, '2019-04-30 12:33:41', '2019-04-30 12:33:41', NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'PT Berlina', 'info@berlina.co.id', NULL, '$2y$10$G7LyI43hlNVPOoQnri9P8OGExVIHh0oWFPQubibOHdyUER/jYAvsu', NULL, '2019-05-02 13:51:43', '2019-05-02 13:51:43', NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'Complete English Language Solutions', 'ira@celsindonesia.com', NULL, '$2y$10$lcDWKOJYPu./8H5veFEx/uxsBK50U/6dLGvGhA8EqN7o/eTnD3d8m', NULL, '2019-05-02 14:38:37', '2019-05-02 14:38:37', NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'CELS  (Complete English Language Solutions)', 'TBA', NULL, '$2y$10$Npbfian6N7m./aAlrVpg1eni4ZtZRd8QjmZwDtZahRGDHfx5/DWva', NULL, '2019-05-02 14:42:53', '2019-05-02 14:42:53', NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'PT INDOSURYA INTI FINANCE', 'info@indosuryafinance.com', NULL, '$2y$10$vv6IBWYXPhK2513cs9g64.PjI5qj8u4CTJyZ3VRhsEgQVObJwIPNK', NULL, '2019-05-02 15:01:54', '2019-05-02 15:01:54', NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'PT MUGI', 'hrd@mugi.co.id', NULL, '$2y$10$eeUU1qHlk.K9FLiWecqhz.tIT33Rfeusc8qutHAM5U/I4ua69zY2u', NULL, '2019-05-02 15:18:31', '2019-05-02 15:18:31', NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'PT Anabatic Digital Raya', 'marketing@anabatic.com', NULL, '$2y$10$j4qTVB4g8cjbcLo4PoRHaeQ4MdzOKOmP3HPsqaRLmYwwIDMkMm8Am', NULL, '2019-05-02 15:40:23', '2019-05-02 15:40:23', NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'PT Selalu Bahagia Bersama OPPO Manufacturing', 'TBI', NULL, '$2y$10$Nj1qHzrVBazpOneonyO57uRbuqxXGuIeBkLnDZSf2qrb1i1dOcRTy', NULL, '2019-05-02 15:55:51', '2019-05-02 15:55:51', NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'PT. Bahtera Pesat Lintasbuana', 'Recruitment@bahterapesat.co.id', NULL, '$2y$10$MW/o8sIVwx0lovnkT4NAwu5RW/C1JTYzFev78sKiKqDE/iSsmGaG2', NULL, '2019-05-02 16:07:57', '2019-05-02 16:07:57', NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'JAKARTA LIFE SCIENCES & AESTHETICS', NULL, NULL, '$2y$10$a10x9YiNHONMTsrR5CykjOhR7MlmmbMf1IBjFbhu8l9ZN4Xx4pRqS', NULL, '2019-05-02 17:35:12', '2019-05-02 17:37:38', NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'Daiichi', NULL, NULL, '$2y$10$2dB7GPdi.DI4ag4qX.4SoOorv2/VoOo.mweyZTHN/rVz6EFhQw2FK', NULL, '2019-05-02 17:44:45', '2019-05-23 16:13:07', NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'STELLAR KAPITAL', NULL, NULL, '$2y$10$MO3vOieFPsRbexqWtZCa9eLMRWr2.5FXdo7WIIj9/If9ZEWS/eVxm', NULL, '2019-05-02 17:59:09', '2019-05-02 18:01:05', NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'BTL Indonesia', NULL, NULL, '$2y$10$YzyK8Kj94qARag7rSCCMt.ILFBehqp0.bUZ4Sh0vwL620/SB9gh8S', NULL, '2019-05-02 18:04:26', '2019-05-23 16:10:24', NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'Mitra10', 'ecommerce@mitra10.com', NULL, '$2y$10$KKM3yn8YrNy3vqH0nrxBPeu9blTHAqFK3i9oG5uoaAkA/o2BOaf2S', NULL, '2019-05-08 10:47:06', '2019-05-08 11:01:24', NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'Naelly', 'naelly@empore.co.id', NULL, '$2y$10$GlI8oWeL4Doj5YJWNEUBve2Tju0MsItM2yjxvnAfKQ6IRZnmaq6We', NULL, '2019-05-08 14:35:09', '2019-05-08 14:35:09', 1, 1, NULL, NULL, NULL, NULL),
(81, 'PT DIKA', 'ptdika@gmail.com', NULL, '$2y$10$zDYTBg.nAV3kjMPlIBPtUe5tvxlIiqJM4/QnkScB1X.7x2s13xPt6', NULL, '2019-05-21 09:45:40', '2019-05-21 09:48:45', NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'Rahmah Giassari', 'rahmahgiassari@gmail.com', NULL, '$2y$10$/IOBk7jA4/cu0GCAgBuqMucZ3ONF4dbwEWuqpXXjxKrxjYATjLGd2', NULL, '2019-07-04 10:34:55', '2019-07-04 10:34:55', 4, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE IF NOT EXISTS `user_access` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Administrator adalah orang / orang-orang yang bertugas untuk mengurusi hal-hal administrasi. Dalam dunia Internet, seorang administrator bertugas untuk mengelola hal-hal yang berhubungan dengan komputer.', '2019-01-24 07:31:09', '2019-01-24 07:31:09'),
(2, 'Operator', 'Operator Lapangan orang yang bertugas menjaga, melayani, dan menjalankan suatu peralatan, mesin, telepon, radio, dan sebagainya.', '2019-01-24 07:33:49', '2019-01-24 07:33:49'),
(3, 'Data Entry', 'Petugas entri data adalah anggota staf yang dipekerjakan untuk memasukkan atau memperbarui data ke dalam sistem komputer. Data sering dimasukkan ke komputer dari dokumen kertas menggunakan keyboard', '2019-01-24 07:35:31', '2019-01-24 07:35:31'),
(4, 'Sales / Marketing', 'Marketing merupakan salah satu fungsi utama di antara fungsi-fungsi penting lainnya yang ada dalam suatu perusahaan seperti : administrasi, pembukuan, pembelanjaan, produksi dan personalia.', '2019-02-07 12:51:30', '2019-02-07 12:51:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crm_client`
--
ALTER TABLE `crm_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_product`
--
ALTER TABLE `crm_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_projects`
--
ALTER TABLE `crm_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_project_invoice`
--
ALTER TABLE `crm_project_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_project_items`
--
ALTER TABLE `crm_project_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_project_payment_method_perpetual_license`
--
ALTER TABLE `crm_project_payment_method_perpetual_license`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_project_payment_method_subscription`
--
ALTER TABLE `crm_project_payment_method_subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_project_pipeline`
--
ALTER TABLE `crm_project_pipeline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crm_client`
--
ALTER TABLE `crm_client`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `crm_product`
--
ALTER TABLE `crm_product`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `crm_projects`
--
ALTER TABLE `crm_projects`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `crm_project_invoice`
--
ALTER TABLE `crm_project_invoice`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `crm_project_items`
--
ALTER TABLE `crm_project_items`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `crm_project_payment_method_perpetual_license`
--
ALTER TABLE `crm_project_payment_method_perpetual_license`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `crm_project_payment_method_subscription`
--
ALTER TABLE `crm_project_payment_method_subscription`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `crm_project_pipeline`
--
ALTER TABLE `crm_project_pipeline`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
