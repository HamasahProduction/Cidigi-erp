-- Adminer 4.8.1 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `cidigi-erp`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `produk_master_id` int(10) unsigned NOT NULL,
  `satuan_ukuran_id` int(10) unsigned NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_total` double(8,2) NOT NULL,
  `jumlah_min` double(8,2) NOT NULL,
  `jenis_barang` enum('bahan_baku','bahan_setengah_jadi','bahan_jadi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `barang_produk_master_id_index` (`produk_master_id`),
  KEY `barang_satuan_ukuran_id_index` (`satuan_ukuran_id`),
  CONSTRAINT `barang_produk_master_id_foreign` FOREIGN KEY (`produk_master_id`) REFERENCES `master_produk` (`id`) ON DELETE CASCADE,
  CONSTRAINT `barang_satuan_ukuran_id_foreign` FOREIGN KEY (`satuan_ukuran_id`) REFERENCES `ukuran` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `barang` (`id`, `produk_master_id`, `satuan_ukuran_id`, `kode`, `nama`, `ukuran`, `jumlah_total`, `jumlah_min`, `jenis_barang`, `is_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2,	3,	1,	'K9090',	'Piston Crown',	'12',	1212.00,	12.00,	'bahan_baku',	0,	'2021-11-25 01:08:53',	'2021-11-25 01:08:53',	NULL),
(3,	3,	2,	'K9091',	'Piston Crown',	'122',	121.00,	2.00,	'bahan_setengah_jadi',	0,	'2021-11-25 01:09:06',	'2021-11-25 01:09:06',	NULL),
(4,	6,	2,	'K9091',	'Brightness',	'222',	22.00,	22.00,	'bahan_baku',	0,	'2021-11-25 01:09:19',	'2021-11-25 01:09:19',	NULL);

DROP TABLE IF EXISTS `divisi`;
CREATE TABLE `divisi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `divisi` (`id`, `nama`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1,	'Divisi Produksi A',	NULL,	NULL,	NULL),
(2,	'Divisi Produksi B',	NULL,	NULL,	NULL),
(3,	'Divisi Produksi C',	NULL,	NULL,	NULL),
(4,	'Divisi Produksi D',	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `formula`;
CREATE TABLE `formula` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('utama','item') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `formula` (`id`, `nama`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1,	'Formula 1',	'utama',	NULL,	NULL,	NULL),
(2,	'Formula 2',	'utama',	NULL,	NULL,	NULL),
(3,	'Formula 3',	'utama',	NULL,	NULL,	NULL),
(4,	'Formula 4',	'utama',	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `formula_item`;
CREATE TABLE `formula_item` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `formula_id` int(10) unsigned NOT NULL,
  `barang_id` int(10) unsigned NOT NULL,
  `subitem_id` int(10) unsigned NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `formula_item_formula_id_index` (`formula_id`),
  KEY `formula_item_barang_id_index` (`barang_id`),
  KEY `formula_item_subitem_id_index` (`subitem_id`),
  CONSTRAINT `formula_item_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`),
  CONSTRAINT `formula_item_formula_id_foreign` FOREIGN KEY (`formula_id`) REFERENCES `formula` (`id`),
  CONSTRAINT `formula_item_subitem_id_foreign` FOREIGN KEY (`subitem_id`) REFERENCES `subitem` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `master_produk`;
CREATE TABLE `master_produk` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suplier_id` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `master_produk_suplier_id_index` (`suplier_id`),
  CONSTRAINT `master_produk_suplier_id_foreign` FOREIGN KEY (`suplier_id`) REFERENCES `suplier` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `master_produk` (`id`, `nama`, `suplier_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1,	'Piston Crown',	1,	NULL,	NULL,	NULL),
(2,	'Piston Crown',	2,	NULL,	NULL,	NULL),
(3,	'Piston Crown',	3,	NULL,	NULL,	NULL),
(4,	'Led Indikator',	1,	NULL,	NULL,	NULL),
(5,	'Contrast',	1,	NULL,	NULL,	NULL),
(6,	'Brightness',	1,	NULL,	NULL,	NULL),
(7,	'Brightness',	3,	NULL,	NULL,	NULL),
(8,	'Brightness',	4,	NULL,	NULL,	NULL),
(9,	'Saklar',	1,	NULL,	NULL,	NULL),
(10,	'AC Inlet',	1,	NULL,	NULL,	NULL),
(11,	'konektor ',	1,	NULL,	NULL,	NULL),
(12,	'CGA (9 pin) ',	1,	NULL,	NULL,	NULL),
(13,	'CGA (9 pin) ',	2,	NULL,	NULL,	NULL),
(14,	'CGA (9 pin) ',	3,	NULL,	NULL,	NULL),
(15,	'CGA (9 pin) ',	4,	NULL,	NULL,	NULL),
(16,	'VGA (25 pin) ',	1,	NULL,	NULL,	NULL),
(17,	'Tabung hampa ',	1,	NULL,	NULL,	NULL),
(18,	'Fosfor ',	1,	NULL,	NULL,	NULL),
(19,	'Penutup bayangan',	1,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2014_10_12_200000_add_two_factor_columns_to_users_table',	1),
(4,	'2019_08_19_000000_create_failed_jobs_table',	1),
(5,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(6,	'2021_11_20_033132_create_sessions_table',	1),
(7,	'2021_11_20_042355_create_suplier_table',	1),
(8,	'2021_11_20_042422_create_ukuran_table',	1),
(9,	'2021_11_20_042433_create_master_produk_table',	1),
(10,	'2021_11_20_042534_create_barang_table',	1),
(11,	'2021_11_20_042601_create_formula_table',	1),
(12,	'2021_11_20_042603_create_subitem_table',	1),
(13,	'2021_11_20_042608_create_formula_item_table',	1),
(14,	'2021_11_20_065348_create_divisi_table',	1);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cmbAWmNbJrcYbzV03GdxEqAlrNe176FwwHVfi4sJ',	1,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36 Edg/96.0.1054.29',	'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiUThkS2MyN1VNS2hvaFpkVHlhajVWMWJVdTZybGNwZ0ltV09SMU5SNiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMwOiJodHRwOi8vY2lkaWdpLWVycC50ZXN0L3N1Yml0ZW0iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFRzVFhNLjIyN000L255NmFibXYzQi5aSFE5cHRMR1BFNGk4RGZHSUdtazdxeVguT1piaFV5IjtzOjU6ImFsZXJ0IjthOjA6e319',	1637773869),
('nuXqhL9GyeSwWhFwxonlEaUgmjsWgLRZdaeicmcD',	NULL,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36 Edg/96.0.1054.29',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiamdFWURsaTJlaFlUY21XZ1VZaURnZ2o1bVpaWWpyblVWYXZ5SURodyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9jaWRpZ2ktZXJwLnRlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',	1637805556);

DROP TABLE IF EXISTS `subitem`;
CREATE TABLE `subitem` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `formula_id` int(10) unsigned NOT NULL,
  `barang_id` int(10) unsigned NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subitem_formula_id_index` (`formula_id`),
  KEY `subitem_barang_id_index` (`barang_id`),
  KEY `subitem_jumlah_index` (`jumlah`),
  CONSTRAINT `subitem_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subitem_formula_id_foreign` FOREIGN KEY (`formula_id`) REFERENCES `formula` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `subitem` (`id`, `formula_id`, `barang_id`, `jumlah`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	2,	3,	'12',	'2021-11-25 01:09:36',	'2021-11-25 01:09:36',	NULL),
(2,	3,	2,	'12',	'2021-11-25 01:09:45',	'2021-11-25 01:09:45',	NULL),
(3,	3,	4,	'44',	'2021-11-25 01:09:55',	'2021-11-25 01:09:55',	NULL),
(4,	1,	2,	'12',	'2021-11-25 01:10:09',	'2021-11-25 01:10:09',	NULL);

DROP TABLE IF EXISTS `suplier`;
CREATE TABLE `suplier` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `suplier` (`id`, `nama`, `alamat`, `kontak`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'PT Nippon Steel 1',	'Jl. Pembangunan VI No.H20 Tuk, Kedawung, Cirebon, Jawa Barat 45153',	'08571189109',	NULL,	NULL,	NULL),
(2,	'PT Nippon Steel Corporation Indonesia',	'Jl. Asia Afrika No. 8, Gelora Bung Karno - Senayan, Jakarta Pusat 10270 Indonesia.',	'08571189109',	NULL,	NULL,	NULL),
(3,	'PT Nippon Steel 3',	'Jl. Pembangunan VI No.H20 Tuk, Kedawung, Cirebon, Jawa Barat 45153',	'08571189109',	NULL,	NULL,	NULL),
(4,	'PT Nippon Steel Corporation Indonesia PP',	'Jl. Asia Afrika No. 8, Gelora Bung Karno - Senayan, Jakarta Pusat 10270 Indonesia.',	'08571189109',	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `ukuran`;
CREATE TABLE `ukuran` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ukuran` (`id`, `nama`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1,	'Meter',	NULL,	NULL,	NULL),
(2,	'Centimeter',	NULL,	NULL,	NULL),
(3,	'Milimeter',	NULL,	NULL,	NULL),
(4,	'Kilogram',	NULL,	NULL,	NULL),
(5,	'Gram',	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1,	'superadmin',	'superadmin@gmail.com',	NULL,	'$2y$10$TsTXM.227M4/ny6abmv3B.ZHQ9ptLGPE4i8DfGIGmk7qyX.OZbhUy',	NULL,	NULL,	NULL,	NULL,	NULL,	'2021-11-25 00:55:35',	'2021-11-25 00:55:35');

-- 2021-11-25 02:18:33
