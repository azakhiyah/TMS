-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Apr 2021 pada 11.13
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tmsdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `api_settings`
--

CREATE TABLE `api_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key_value` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `api_settings`
--

INSERT INTO `api_settings` (`id`, `key_name`, `key_value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'api', '1', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL),
(2, 'anyone_register', '0', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL),
(3, 'region_availability', 'region one, region two, region three', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL),
(4, 'driver_review', '0', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL),
(5, 'booking', '3', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL),
(6, 'cancel', '2', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL),
(7, 'max_trip', '1', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL),
(8, 'api_key', '', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL),
(9, 'db_url', '', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL),
(10, 'db_secret', '', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL),
(11, 'server_key', '', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL),
(12, 'google_api', '0', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `pickup` timestamp NULL DEFAULT NULL,
  `dropoff` timestamp NULL DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `pickup_addr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dest_addr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `travellers` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 0,
  `payment` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`id`, `customer_id`, `user_id`, `vehicle_id`, `driver_id`, `pickup`, `dropoff`, `duration`, `pickup_addr`, `dest_addr`, `note`, `travellers`, `status`, `payment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 1, 1, 7, '2020-12-10 09:36:58', '2020-12-11 17:38:45', 2880, '29242 Vandervort Station Suite 340\nWalterfort, WV 98681-9047', '20917 Carroll Field Apt. 359\nEulahport, ID 24880', 'sample note', 4, 1, 1, '2021-01-02 01:06:28', '2021-01-02 01:06:30', NULL),
(2, 5, 1, 2, 7, '2020-12-09 05:42:21', '2020-12-10 09:33:28', 1671, '63444 Gislason LakeKeeblerborough, NC 60176-0239', '928 Eliza Glens Apt. 264West Katherine, MA 99820-2883', 'sample note', 1, 0, 0, '2021-01-02 01:06:28', '2021-02-24 00:42:26', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings_meta`
--

CREATE TABLE `bookings_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'null',
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `bookings_meta`
--

INSERT INTO `bookings_meta` (`id`, `booking_id`, `type`, `key`, `value`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'integer', 'tax_total', '500', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(2, 1, 'integer', 'total_tax_percent', '0', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(3, 1, 'integer', 'total_tax_charge_rs', '0', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(4, 1, 'string', 'ride_status', 'Completed', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(5, 1, 'string', 'journey_date', '10-12-2020', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(6, 1, 'string', 'journey_time', '16:36:58', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(7, 1, 'integer', 'customerid', '4', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(8, 1, 'integer', 'vehicleid', '1', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(9, 1, 'integer', 'day', '1', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(10, 1, 'integer', 'mileage', '10', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(11, 1, 'integer', 'waiting_time', '0', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(12, 1, 'string', 'date', '2021-01-02', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(13, 1, 'integer', 'total', '500', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(14, 1, 'integer', 'receipt', '1', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(15, 2, 'string', 'ride_status', 'Upcoming', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(16, 2, 'string', 'journey_date', '09-12-2020', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(17, 2, 'string', 'journey_time', '12:42:21', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(18, 2, 'string', 'udf', 'N;', NULL, '2021-02-24 00:42:00', '2021-02-24 00:42:00'),
(19, 2, 'string', 'customerid', '5', NULL, '2021-03-21 20:38:21', '2021-03-21 20:38:21'),
(20, 2, 'string', 'vehicleid', '2', NULL, '2021-03-21 20:38:21', '2021-03-21 20:38:21'),
(21, 2, 'string', 'day', '1', NULL, '2021-03-21 20:38:21', '2021-03-21 20:38:21'),
(22, 2, 'string', 'mileage', '10', NULL, '2021-03-21 20:38:21', '2021-03-21 20:38:21'),
(23, 2, 'string', 'waiting_time', '0', NULL, '2021-03-21 20:38:21', '2021-03-21 20:38:21'),
(24, 2, 'string', 'date', '2021-03-22', NULL, '2021-03-21 20:38:21', '2021-03-21 20:38:21'),
(25, 2, 'string', 'total', '500', NULL, '2021-03-21 20:38:21', '2021-03-21 20:38:21'),
(26, 2, 'string', 'total_kms', '10', NULL, '2021-03-21 20:38:21', '2021-03-21 20:38:21'),
(27, 2, 'string', 'tax_total', '500', NULL, '2021-03-21 20:38:21', '2021-03-21 20:38:21'),
(28, 2, 'string', 'total_tax_percent', '0', NULL, '2021-03-21 20:38:21', '2021-03-21 20:38:21'),
(29, 2, 'string', 'total_tax_charge_rs', '0', NULL, '2021-03-21 20:38:21', '2021-03-21 20:38:21'),
(30, 2, 'integer', 'receipt', '1', NULL, '2021-03-21 20:38:21', '2021-03-21 20:38:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking_income`
--

CREATE TABLE `booking_income` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `income_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `booking_income`
--

INSERT INTO `booking_income` (`id`, `booking_id`, `income_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 3, '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL),
(2, 2, 4, '2021-03-21 20:38:21', '2021-03-21 20:38:21', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking_payments`
--

CREATE TABLE `booking_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_details` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking_quotation`
--

CREATE TABLE `booking_quotation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `pickup` timestamp NULL DEFAULT NULL,
  `dropoff` timestamp NULL DEFAULT NULL,
  `pickup_addr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dest_addr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `travellers` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 0,
  `payment` int(11) NOT NULL DEFAULT 0,
  `day` int(11) DEFAULT NULL,
  `mileage` double DEFAULT NULL,
  `waiting_time` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `tax_total` double(10,2) DEFAULT NULL,
  `total_tax_percent` double(10,2) DEFAULT NULL,
  `total_tax_charge_rs` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `company_services`
--

CREATE TABLE `company_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `company_services`
--

INSERT INTO `company_services` (`id`, `title`, `image`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Best price guranteed', 'fleet-bestprice.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Neque at, nobis repudiandae dolores.', NULL, '2021-01-02 01:06:29', '2021-01-02 01:06:29'),
(2, '24/7 Customer care', 'fleet-care.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Neque at, nobis repudiandae dolores.', NULL, '2021-01-02 01:06:29', '2021-01-02 01:06:29'),
(3, 'Home pickups', 'fleet-homepickup.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Neque at, nobis repudiandae dolores.', NULL, '2021-01-02 01:06:29', '2021-01-02 01:06:29'),
(4, 'Easy Bookings', 'fleet-easybooking.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Neque at, nobis repudiandae dolores.', NULL, '2021-01-02 01:06:29', '2021-01-02 01:06:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'DK 96', '2021-04-21 00:29:49', '2021-04-21 00:29:49', NULL),
(2, 'DK 82', '2021-04-21 00:29:55', '2021-04-21 00:29:55', NULL),
(3, 'DK 102', '2021-04-21 00:30:10', '2021-04-21 00:30:10', NULL),
(4, 'DK 108', '2021-04-21 00:30:17', '2021-04-21 00:30:17', NULL),
(5, 'PT. MIURA INDONESIA', '2021-04-21 00:30:31', '2021-04-21 00:30:31', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer_location`
--

CREATE TABLE `customer_location` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_customer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(4) DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customers_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `customer_location`
--

INSERT INTO `customer_location` (`id`, `name`, `address`, `city`, `province`, `postal_code`, `country`, `longitude`, `latitude`, `phone`, `email_customer`, `note`, `active`, `deleted_at`, `created_at`, `updated_at`, `customers_id`) VALUES
(1, NULL, 'HRSCC - SECTION 3 WALINI DK96 PURWAKARTA - JABAR', 'Purwakarta', 'Jawa Barat', 'unknown', 'Indonesia', 'unknown', 'unknown', '08111111111', 'unknown@unknown', 'DK 96 Need to update data real address,Postal Code, Longitude,latitude,phone,email', 1, NULL, '2021-04-21 00:34:34', '2021-04-21 00:37:12', 1),
(2, NULL, 'HRSCC- DK 82 PURWAKARATA - JABAR', 'Purwakarta', 'Jawa Barat', 'unknown', 'Indonesia', 'unknown', 'unknown', '08111111111', 'unknown@unknown', 'DK 82 Need to update data real address,Postal Code, Longitude,latitude,phone,email', 1, NULL, '2021-04-21 00:36:13', '2021-04-21 00:37:03', 2),
(3, NULL, 'HRSCC- DK 102 PURWAKARATA - JABAR', 'Purwakarta', 'Jawa Barat', 'unknown', 'Indonesia', 'unknown', 'unknown', '08111111111', 'unknown@unknown', 'DK 102 Need to update data real address,Postal Code, Longitude,latitude,phone,email', 1, NULL, '2021-04-21 00:36:52', '2021-04-21 00:36:52', 3),
(4, NULL, 'HRSCC - DK 108 JL. CIHALIWUNG - PADALARANG - JABAR', 'Padalarang', 'Jawa Barat', 'unknown', 'Indonesia', 'unknown', 'unknown', '08111111111', 'unknown@unknown', 'DK 108 Need to update data real address,Postal Code, Longitude,latitude,phone,email', 1, NULL, '2021-04-21 00:38:07', '2021-04-21 00:38:07', 4),
(5, NULL, 'Kawasan Karawang International Industrial City Jl. Harapan Raya Lot KK-10, Sirnabaya, Kec. Telukjambe Tim., Kabupaten Karawang, Jawa Barat 41361', 'Karawang', 'Jawa Barat', '41361', 'Indonesia', '-6.365111266911848', '107.2953768036879', '622129369977', 'unknown@unknown', 'PT. Miura Indonesia Need Update data Email', 1, NULL, '2021-04-21 00:41:46', '2021-04-21 00:41:58', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `delivery_order`
--

CREATE TABLE `delivery_order` (
  `id` int(11) NOT NULL,
  `no_SO` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_PO` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_LO` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customers_id` int(11) DEFAULT NULL,
  `customers_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `customer_location_id` int(11) DEFAULT NULL,
  `customer_location_address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `qty_order` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `warehouse_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `depo_id` int(11) DEFAULT NULL,
  `depo_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `drivers_id` int(11) DEFAULT NULL,
  `drivers_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `trucks_id` int(11) DEFAULT NULL,
  `door_number` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `license_plate` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transporter_id` int(11) DEFAULT NULL,
  `transporter_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `trailers_id` int(11) DEFAULT NULL,
  `trailers_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `statusdelivery` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `compartement` int(11) DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty_delivery` int(11) DEFAULT NULL,
  `date_delivery` timestamp NULL DEFAULT NULL,
  `attachment1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attachment2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `delivery_order`
--

INSERT INTO `delivery_order` (`id`, `no_SO`, `no_PO`, `no_LO`, `customers_id`, `customers_name`, `customer_location_id`, `customer_location_address`, `qty_order`, `product_id`, `product_name`, `warehouse_id`, `warehouse_name`, `depo_id`, `depo_name`, `drivers_id`, `drivers_name`, `trucks_id`, `door_number`, `license_plate`, `transporter_id`, `transporter_name`, `trailers_id`, `trailers_name`, `status`, `statusdelivery`, `compartement`, `note`, `qty_delivery`, `date_delivery`, `attachment1`, `attachment2`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SO123', 'PO123', 'LO123', 2, 'Karya Indah Logam', 6, 'Jl. Harsono RM No.1, Ragunan, Kec. Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta', 8000, 1, 'RON 92', 1, 'WH Pontir', 1, 'Depo Plumpang', 12, 'naira', 1, 'JNK03', 'B7777K', 3, 'PT.Sicepat Express', 1, 'Nissan', 1, 'Completed', 1, 'test tetete aadasdsad', 8000, '2021-04-29 17:00:00', NULL, NULL, '2021-04-03 10:59:24', '2021-04-03 12:00:28', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `depo`
--

CREATE TABLE `depo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_depo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(4) DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `depo`
--

INSERT INTO `depo` (`id`, `name`, `address`, `city`, `province`, `postal_code`, `country`, `longitude`, `latitude`, `phone`, `email_depo`, `note`, `active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Depo Plumpang', 'JL. YOS SUDARSO RT001 / RW 004 RAWABADAK SEL. JAKARTA \r\nKOTA JAKARTA UTARA , DKI JAKARTA 14330, INDONESIA', 'Jakarta Utara', 'DKI Jakarta', '14430', 'Indonesia', '-6.1349320782230565', '106.89348408176578', 'Unknown', 'Unknown', 'Unknown', 1, NULL, '2021-02-25 01:57:09', '2021-04-21 00:27:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sim_number` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sim_exp_date` date DEFAULT NULL,
  `driver_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emergency_contact` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gatepass` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gatepass_rls_date` date DEFAULT NULL,
  `gatepass_exp_date` date DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `address`, `phone`, `sex`, `sim_number`, `sim_exp_date`, `driver_image`, `emergency_contact`, `gatepass`, `gatepass_rls_date`, `gatepass_exp_date`, `join_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SUPRIYANTO', 'KP SANGIANG RT 002 /004 SANGIANG JAYA PRIUK TANGERANG', '081293108340', 'Male', '0810313481', '2024-03-31', NULL, '082220588345', 'Unknown', '2021-04-21', '2020-01-01', '2020-01-01', '2021-04-21 00:50:17', '2021-04-21 00:50:17', NULL),
(2, 'ARIS SUKRESNO', 'PERUMAHAN KEMUNING PERMAI BLOK C2 NO 30 RT 001 RW 007, JIUNGJING , CISOKA KAB TANGERANG', '082312408833', 'Male', '9009134812', '2024-09-25', NULL, '082220588345', 'Unknown', '2020-01-01', '2020-01-01', '2020-01-01', '2021-04-21 00:52:40', '2021-04-21 00:52:40', NULL),
(3, 'GILANG ARIF RISQI ROMADLON', 'SIRAU RT 02 RW 02 SIRAU,KEMRANJEN, KAB BANYUMAS', '081387960556', 'Male', '1348980100', '2025-09-17', NULL, '082220588345', 'Unknown', '2020-01-01', '2020-01-01', '2020-01-01', '2021-04-21 00:54:35', '2021-04-21 00:54:35', NULL),
(4, 'RIYANTO', 'DS. KC PADANGAN RT 06 RW 02 BOJONEGORO', '082241214358', 'Male', '6312154600', '2023-12-19', NULL, '082220588345', 'Unknown', '2020-01-01', '2020-01-01', '2020-01-01', '2021-04-21 00:56:28', '2021-04-21 00:56:28', NULL),
(5, 'JOKO SUSANTO', 'DS. SUMBERGANDU RT10 RW 02 KEC. PILANGKENCENG MADIUN', '082229435242', 'Male', '1541860300', '2026-01-03', NULL, '082220588345', 'Unknown', '2020-01-01', '2020-01-01', '2020-01-01', '2021-04-21 00:57:58', '2021-04-21 00:57:58', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `driver_logs`
--

CREATE TABLE `driver_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `driver_logs`
--

INSERT INTO `driver_logs` (`id`, `vehicle_id`, `driver_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '2021-01-02 01:06:30', '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(2, 2, 7, '2021-02-09 21:22:23', '2021-02-09 21:22:23', '2021-02-09 21:22:23'),
(3, 3, 11, '2021-02-15 02:13:40', '2021-02-15 02:13:40', '2021-02-15 02:13:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `driver_vehicle`
--

CREATE TABLE `driver_vehicle` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `driver_vehicle`
--

INSERT INTO `driver_vehicle` (`id`, `vehicle_id`, `driver_id`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(2, 2, 7, '2021-02-09 21:22:23', '2021-02-09 21:22:23'),
(3, 3, 11, '2021-02-15 02:13:40', '2021-02-15 02:13:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `email_content`
--

CREATE TABLE `email_content` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `email_content`
--

INSERT INTO `email_content` (`id`, `key`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'insurance', 'vehicle insurance email content', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL),
(2, 'vehicle_licence', 'vehicle licence email content', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL),
(3, 'driving_licence', 'driving licence email content', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL),
(4, 'registration', 'vehicle registration email content', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL),
(5, 'service_reminder', 'service reminder email content', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL),
(6, 'users', '', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL),
(7, 'options', '', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL),
(8, 'email', '0', '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `expense`
--

CREATE TABLE `expense` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `exp_id` int(11) DEFAULT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'e',
  `amount` double(10,2) NOT NULL DEFAULT 0.00,
  `user_id` int(11) DEFAULT NULL,
  `expense_type` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `expense`
--

INSERT INTO `expense` (`id`, `vehicle_id`, `exp_id`, `type`, `amount`, `user_id`, `expense_type`, `comment`, `date`, `created_at`, `updated_at`, `deleted_at`, `vendor_id`) VALUES
(1, 1, NULL, 'e', 1011.00, 2, 1, 'Sample Comment', '2021-01-01', '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL, NULL),
(2, 2, NULL, 'e', 4197.00, 3, 4, 'Sample Comment', '2020-12-28', '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL, NULL),
(3, 1, 1, 'e', 500.00, 2, 8, 'Sample Comment', '2020-12-31', '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL, NULL),
(4, 1, 2, 'e', 500.00, 2, 8, 'Sample Comment', '2021-01-12', '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `expense_cat`
--

CREATE TABLE `expense_cat` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `expense_cat`
--

INSERT INTO `expense_cat` (`id`, `name`, `user_id`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Insurance', 1, 'd', '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL),
(2, 'Patente', 1, 'd', '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL),
(3, 'Mechanics', 1, 'd', '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL),
(4, 'Car wash', 1, 'd', '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL),
(5, 'Vignette', 1, 'd', '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL),
(6, 'Maintenance', 14, 'd', '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL),
(7, 'Parking', 14, 'd', '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL),
(8, 'Fuel', 15, 'd', '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL),
(9, 'Car Services', 1, 'd', '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fare_settings`
--

CREATE TABLE `fare_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key_value` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `fare_settings`
--

INSERT INTO `fare_settings` (`id`, `key_name`, `key_value`, `created_at`, `updated_at`, `deleted_at`, `type_id`) VALUES
(1, 'hatchback_base_fare', '500', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 1),
(2, 'hatchback_base_km', '10', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 1),
(3, 'hatchback_base_time', '2', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 1),
(4, 'hatchback_std_fare', '20', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 1),
(5, 'hatchback_weekend_base_fare', '500', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 1),
(6, 'hatchback_weekend_base_km', '10', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 1),
(7, 'hatchback_weekend_wait_time', '2', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 1),
(8, 'hatchback_weekend_std_fare', '20', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 1),
(9, 'hatchback_night_base_fare', '500', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 1),
(10, 'hatchback_night_base_km', '10', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 1),
(11, 'hatchback_night_wait_time', '2', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 1),
(12, 'hatchback_night_std_fare', '20', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 1),
(13, 'sedan_base_fare', '500', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 2),
(14, 'sedan_base_km', '10', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 2),
(15, 'sedan_base_time', '2', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 2),
(16, 'sedan_std_fare', '20', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 2),
(17, 'sedan_weekend_base_fare', '500', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 2),
(18, 'sedan_weekend_base_km', '10', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 2),
(19, 'sedan_weekend_wait_time', '2', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 2),
(20, 'sedan_weekend_std_fare', '20', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 2),
(21, 'sedan_night_base_fare', '500', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 2),
(22, 'sedan_night_base_km', '10', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 2),
(23, 'sedan_night_wait_time', '2', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 2),
(24, 'sedan_night_std_fare', '20', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 2),
(25, 'minivan_base_fare', '500', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 3),
(26, 'minivan_base_km', '10', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 3),
(27, 'minivan_base_time', '2', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 3),
(28, 'minivan_std_fare', '20', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 3),
(29, 'minivan_weekend_base_fare', '500', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 3),
(30, 'minivan_weekend_base_km', '10', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 3),
(31, 'minivan_weekend_wait_time', '2', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 3),
(32, 'minivan_weekend_std_fare', '20', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 3),
(33, 'minivan_night_base_fare', '500', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 3),
(34, 'minivan_night_base_km', '10', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 3),
(35, 'minivan_night_wait_time', '2', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 3),
(36, 'minivan_night_std_fare', '20', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 3),
(37, 'saloon_base_fare', '500', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 4),
(38, 'saloon_base_km', '10', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 4),
(39, 'saloon_base_time', '2', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 4),
(40, 'saloon_std_fare', '20', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 4),
(41, 'saloon_weekend_base_fare', '500', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 4),
(42, 'saloon_weekend_base_km', '10', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 4),
(43, 'saloon_weekend_wait_time', '2', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 4),
(44, 'saloon_weekend_std_fare', '20', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 4),
(45, 'saloon_night_base_fare', '500', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 4),
(46, 'saloon_night_base_km', '10', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 4),
(47, 'saloon_night_wait_time', '2', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 4),
(48, 'saloon_night_std_fare', '20', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 4),
(49, 'suv_base_fare', '500', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 5),
(50, 'suv_base_km', '10', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 5),
(51, 'suv_base_time', '2', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 5),
(52, 'suv_std_fare', '20', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 5),
(53, 'suv_weekend_base_fare', '500', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 5),
(54, 'suv_weekend_base_km', '10', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 5),
(55, 'suv_weekend_wait_time', '2', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 5),
(56, 'suv_weekend_std_fare', '20', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 5),
(57, 'suv_night_base_fare', '500', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 5),
(58, 'suv_night_base_km', '10', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 5),
(59, 'suv_night_wait_time', '2', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 5),
(60, 'suv_night_std_fare', '20', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 5),
(61, 'bus_base_fare', '500', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 6),
(62, 'bus_base_km', '10', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 6),
(63, 'bus_base_time', '2', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 6),
(64, 'bus_std_fare', '20', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 6),
(65, 'bus_weekend_base_fare', '500', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 6),
(66, 'bus_weekend_base_km', '10', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 6),
(67, 'bus_weekend_wait_time', '2', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 6),
(68, 'bus_weekend_std_fare', '20', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 6),
(69, 'bus_night_base_fare', '500', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 6),
(70, 'bus_night_base_km', '10', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 6),
(71, 'bus_night_wait_time', '2', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 6),
(72, 'bus_night_std_fare', '20', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 6),
(73, 'truck_base_fare', '500', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 7),
(74, 'truck_base_km', '10', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 7),
(75, 'truck_base_time', '2', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 7),
(76, 'truck_std_fare', '20', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 7),
(77, 'truck_weekend_base_fare', '500', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 7),
(78, 'truck_weekend_base_km', '10', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 7),
(79, 'truck_weekend_wait_time', '2', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 7),
(80, 'truck_weekend_std_fare', '20', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 7),
(81, 'truck_night_base_fare', '500', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 7),
(82, 'truck_night_base_km', '10', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 7),
(83, 'truck_night_wait_time', '2', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 7),
(84, 'truck_night_std_fare', '20', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL, 7),
(85, 'coltdieseldouble_base_fare', '500', '2021-02-16 08:04:44', '2021-02-16 08:04:44', NULL, 8),
(86, 'coltdieseldouble_base_km', '10', '2021-02-16 08:04:44', '2021-02-16 08:04:44', NULL, 8),
(87, 'coltdieseldouble_base_time', '2', '2021-02-16 08:04:44', '2021-02-16 08:04:44', NULL, 8),
(88, 'coltdieseldouble_std_fare', '20', '2021-02-16 08:04:44', '2021-02-16 08:04:44', NULL, 8),
(89, 'coltdieseldouble_weekend_base_fare', '500', '2021-02-16 08:04:44', '2021-02-16 08:04:44', NULL, 8),
(90, 'coltdieseldouble_weekend_base_km', '10', '2021-02-16 08:04:44', '2021-02-16 08:04:44', NULL, 8),
(91, 'coltdieseldouble_weekend_wait_time', '2', '2021-02-16 08:04:44', '2021-02-16 08:04:44', NULL, 8),
(92, 'coltdieseldouble_weekend_std_fare', '20', '2021-02-16 08:04:44', '2021-02-16 08:04:44', NULL, 8),
(93, 'coltdieseldouble_night_base_fare', '500', '2021-02-16 08:04:44', '2021-02-16 08:04:44', NULL, 8),
(94, 'coltdieseldouble_night_base_km', '10', '2021-02-16 08:04:44', '2021-02-16 08:04:44', NULL, 8),
(95, 'coltdieseldouble_night_wait_time', '2', '2021-02-16 08:04:44', '2021-02-16 08:04:44', NULL, 8),
(96, 'coltdieseldouble_night_std_fare', '20', '2021-02-16 08:04:44', '2021-02-16 08:04:44', NULL, 8),
(97, 'coltdieseldouble(bak)_base_fare', '500', '2021-02-16 21:37:16', '2021-02-16 21:37:16', NULL, 9),
(98, 'coltdieseldouble(bak)_base_km', '10', '2021-02-16 21:37:16', '2021-02-16 21:37:16', NULL, 9),
(99, 'coltdieseldouble(bak)_base_time', '2', '2021-02-16 21:37:16', '2021-02-16 21:37:16', NULL, 9),
(100, 'coltdieseldouble(bak)_std_fare', '20', '2021-02-16 21:37:16', '2021-02-16 21:37:16', NULL, 9),
(101, 'coltdieseldouble(bak)_weekend_base_fare', '500', '2021-02-16 21:37:16', '2021-02-16 21:37:16', NULL, 9),
(102, 'coltdieseldouble(bak)_weekend_base_km', '10', '2021-02-16 21:37:16', '2021-02-16 21:37:16', NULL, 9),
(103, 'coltdieseldouble(bak)_weekend_wait_time', '2', '2021-02-16 21:37:16', '2021-02-16 21:37:16', NULL, 9),
(104, 'coltdieseldouble(bak)_weekend_std_fare', '20', '2021-02-16 21:37:16', '2021-02-16 21:37:16', NULL, 9),
(105, 'coltdieseldouble(bak)_night_base_fare', '500', '2021-02-16 21:37:16', '2021-02-16 21:37:16', NULL, 9),
(106, 'coltdieseldouble(bak)_night_base_km', '10', '2021-02-16 21:37:16', '2021-02-16 21:37:16', NULL, 9),
(107, 'coltdieseldouble(bak)_night_wait_time', '2', '2021-02-16 21:37:16', '2021-02-16 21:37:16', NULL, 9),
(108, 'coltdieseldouble(bak)_night_std_fare', '20', '2021-02-16 21:37:16', '2021-02-16 21:37:16', NULL, 9),
(109, 'coltdieseldouble_base_fare', '500', '2021-02-18 00:36:33', '2021-02-18 00:36:33', NULL, 10),
(110, 'coltdieseldouble_base_km', '10', '2021-02-18 00:36:33', '2021-02-18 00:36:33', NULL, 10),
(111, 'coltdieseldouble_base_time', '2', '2021-02-18 00:36:33', '2021-02-18 00:36:33', NULL, 10),
(112, 'coltdieseldouble_std_fare', '20', '2021-02-18 00:36:33', '2021-02-18 00:36:33', NULL, 10),
(113, 'coltdieseldouble_weekend_base_fare', '500', '2021-02-18 00:36:33', '2021-02-18 00:36:33', NULL, 10),
(114, 'coltdieseldouble_weekend_base_km', '10', '2021-02-18 00:36:33', '2021-02-18 00:36:33', NULL, 10),
(115, 'coltdieseldouble_weekend_wait_time', '2', '2021-02-18 00:36:33', '2021-02-18 00:36:33', NULL, 10),
(116, 'coltdieseldouble_weekend_std_fare', '20', '2021-02-18 00:36:33', '2021-02-18 00:36:33', NULL, 10),
(117, 'coltdieseldouble_night_base_fare', '500', '2021-02-18 00:36:33', '2021-02-18 00:36:33', NULL, 10),
(118, 'coltdieseldouble_night_base_km', '10', '2021-02-18 00:36:33', '2021-02-18 00:36:33', NULL, 10),
(119, 'coltdieseldouble_night_wait_time', '2', '2021-02-18 00:36:33', '2021-02-18 00:36:33', NULL, 10),
(120, 'coltdieseldouble_night_std_fare', '20', '2021-02-18 00:36:33', '2021-02-18 00:36:33', NULL, 10),
(121, 'coltdieseldouble_base_fare', '500', '2021-02-18 00:39:02', '2021-02-18 00:39:02', NULL, 11),
(122, 'coltdieseldouble_base_km', '10', '2021-02-18 00:39:02', '2021-02-18 00:39:02', NULL, 11),
(123, 'coltdieseldouble_base_time', '2', '2021-02-18 00:39:02', '2021-02-18 00:39:02', NULL, 11),
(124, 'coltdieseldouble_std_fare', '20', '2021-02-18 00:39:02', '2021-02-18 00:39:02', NULL, 11),
(125, 'coltdieseldouble_weekend_base_fare', '500', '2021-02-18 00:39:02', '2021-02-18 00:39:02', NULL, 11),
(126, 'coltdieseldouble_weekend_base_km', '10', '2021-02-18 00:39:02', '2021-02-18 00:39:02', NULL, 11),
(127, 'coltdieseldouble_weekend_wait_time', '2', '2021-02-18 00:39:02', '2021-02-18 00:39:02', NULL, 11),
(128, 'coltdieseldouble_weekend_std_fare', '20', '2021-02-18 00:39:02', '2021-02-18 00:39:02', NULL, 11),
(129, 'coltdieseldouble_night_base_fare', '500', '2021-02-18 00:39:02', '2021-02-18 00:39:02', NULL, 11),
(130, 'coltdieseldouble_night_base_km', '10', '2021-02-18 00:39:02', '2021-02-18 00:39:02', NULL, 11),
(131, 'coltdieseldouble_night_wait_time', '2', '2021-02-18 00:39:02', '2021-02-18 00:39:02', NULL, 11),
(132, 'coltdieseldouble_night_std_fare', '20', '2021-02-18 00:39:02', '2021-02-18 00:39:02', NULL, 11),
(133, 'coltdieseldouble_base_fare', '500', '2021-02-18 00:59:08', '2021-02-18 00:59:08', NULL, 12),
(134, 'coltdieseldouble_base_km', '10', '2021-02-18 00:59:08', '2021-02-18 00:59:08', NULL, 12),
(135, 'coltdieseldouble_base_time', '2', '2021-02-18 00:59:08', '2021-02-18 00:59:08', NULL, 12),
(136, 'coltdieseldouble_std_fare', '20', '2021-02-18 00:59:08', '2021-02-18 00:59:08', NULL, 12),
(137, 'coltdieseldouble_weekend_base_fare', '500', '2021-02-18 00:59:08', '2021-02-18 00:59:08', NULL, 12),
(138, 'coltdieseldouble_weekend_base_km', '10', '2021-02-18 00:59:08', '2021-02-18 00:59:08', NULL, 12),
(139, 'coltdieseldouble_weekend_wait_time', '2', '2021-02-18 00:59:08', '2021-02-18 00:59:08', NULL, 12),
(140, 'coltdieseldouble_weekend_std_fare', '20', '2021-02-18 00:59:08', '2021-02-18 00:59:08', NULL, 12),
(141, 'coltdieseldouble_night_base_fare', '500', '2021-02-18 00:59:08', '2021-02-18 00:59:08', NULL, 12),
(142, 'coltdieseldouble_night_base_km', '10', '2021-02-18 00:59:08', '2021-02-18 00:59:08', NULL, 12),
(143, 'coltdieseldouble_night_wait_time', '2', '2021-02-18 00:59:08', '2021-02-18 00:59:08', NULL, 12),
(144, 'coltdieseldouble_night_std_fare', '20', '2021-02-18 00:59:08', '2021-02-18 00:59:08', NULL, 12),
(145, 'coltdieseldouble2_base_fare', '500', '2021-04-17 01:04:03', '2021-04-17 01:04:03', NULL, 13),
(146, 'coltdieseldouble2_base_km', '10', '2021-04-17 01:04:03', '2021-04-17 01:04:03', NULL, 13),
(147, 'coltdieseldouble2_base_time', '2', '2021-04-17 01:04:03', '2021-04-17 01:04:03', NULL, 13),
(148, 'coltdieseldouble2_std_fare', '20', '2021-04-17 01:04:03', '2021-04-17 01:04:03', NULL, 13),
(149, 'coltdieseldouble2_weekend_base_fare', '500', '2021-04-17 01:04:03', '2021-04-17 01:04:03', NULL, 13),
(150, 'coltdieseldouble2_weekend_base_km', '10', '2021-04-17 01:04:03', '2021-04-17 01:04:03', NULL, 13),
(151, 'coltdieseldouble2_weekend_wait_time', '2', '2021-04-17 01:04:03', '2021-04-17 01:04:03', NULL, 13),
(152, 'coltdieseldouble2_weekend_std_fare', '20', '2021-04-17 01:04:03', '2021-04-17 01:04:03', NULL, 13),
(153, 'coltdieseldouble2_night_base_fare', '500', '2021-04-17 01:04:03', '2021-04-17 01:04:03', NULL, 13),
(154, 'coltdieseldouble2_night_base_km', '10', '2021-04-17 01:04:03', '2021-04-17 01:04:03', NULL, 13),
(155, 'coltdieseldouble2_night_wait_time', '2', '2021-04-17 01:04:03', '2021-04-17 01:04:03', NULL, 13),
(156, 'coltdieseldouble2_night_std_fare', '20', '2021-04-17 01:04:03', '2021-04-17 01:04:03', NULL, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `frontend`
--

CREATE TABLE `frontend` (
  `id` int(10) UNSIGNED NOT NULL,
  `key_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key_value` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `frontend`
--

INSERT INTO `frontend` (`id`, `key_name`, `key_value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'about_us', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(2, 'contact_email', 'master@admin.com', '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(3, 'contact_phone', '0123456789', '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(4, 'customer_support', '0999988888', '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(5, 'about_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(6, 'about_title', 'Proudly serving you', '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(7, 'facebook', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(8, 'twitter', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(9, 'instagram', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(10, 'linkedin', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(11, 'faq_link', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(12, 'cities', '5', '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(13, 'vehicles', '10', '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(14, 'cancellation', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(15, 'terms', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(16, 'privacy_policy', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(17, 'enable', '1', '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(18, 'language', 'en', '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fuel`
--

CREATE TABLE `fuel` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `start_meter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_meter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `vendor_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `fuel_from` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cost_per_unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `consumption` int(11) DEFAULT NULL,
  `complete` int(11) DEFAULT 0,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `fuel`
--

INSERT INTO `fuel` (`id`, `vehicle_id`, `user_id`, `start_meter`, `end_meter`, `reference`, `province`, `note`, `vendor_name`, `qty`, `fuel_from`, `cost_per_unit`, `consumption`, `complete`, `date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, '1000', '2000', NULL, 'Gujarat', 'sample note', NULL, 10, 'Fuel Tank', '50', 100, 0, '2020-12-31', '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL),
(2, 1, 2, '2000', '0', NULL, 'Gujarat', 'sample note', NULL, 10, 'Fuel Tank', '50', 0, 0, '2021-01-12', '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `income`
--

CREATE TABLE `income` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `income_id` int(11) DEFAULT NULL,
  `amount` double(10,2) NOT NULL DEFAULT 0.00,
  `user_id` int(11) DEFAULT NULL,
  `income_cat` int(11) DEFAULT NULL,
  `mileage` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `tax_percent` double(10,2) DEFAULT NULL,
  `tax_charge_rs` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `income`
--

INSERT INTO `income` (`id`, `vehicle_id`, `income_id`, `amount`, `user_id`, `income_cat`, `mileage`, `date`, `created_at`, `updated_at`, `deleted_at`, `tax_percent`, `tax_charge_rs`) VALUES
(1, 1, NULL, 1731.00, 2, 1, NULL, '2020-12-28', '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL, 0.00, 0.00),
(2, 2, NULL, 2017.00, 3, 1, NULL, '2021-01-01', '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL, 0.00, 0.00),
(3, 1, 1, 500.00, 1, 1, 10, '2021-01-02', '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL, 0.00, 0.00),
(4, 2, 2, 500.00, 5, 1, 10, '2021-03-22', '2021-03-21 20:38:21', '2021-03-21 20:38:21', NULL, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `income_cat`
--

CREATE TABLE `income_cat` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `income_cat`
--

INSERT INTO `income_cat` (`id`, `name`, `user_id`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Booking', 1, 'd', '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `message`
--

CREATE TABLE `message` (
  `id` int(10) UNSIGNED NOT NULL,
  `fcm_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_06_03_134331_create_expense_table', 1),
(2, '2017_06_03_134332_create_expense_cat_table', 1),
(3, '2017_06_03_134332_create_income_table', 1),
(4, '2017_06_03_134333_create_income_cat_table', 1),
(5, '2017_06_03_134336_create_password_resets_table', 1),
(6, '2017_06_03_134337_create_users_table', 1),
(7, '2017_06_03_134338_create_vehicles_table', 1),
(8, '2017_07_24_080537_create_booking_table', 1),
(9, '2017_07_24_080643_create_settings_table', 1),
(10, '2017_08_01_073926_create_booking_income_table', 1),
(11, '2017_10_30_064357_create_notifications_table', 1),
(12, '2017_10_30_094858_create_fuel_table', 1),
(13, '2017_11_09_105729_create_vendors_table', 1),
(14, '2017_11_10_062609_create_work_orders_table', 1),
(15, '2017_11_10_095438_create_notes_table', 1),
(16, '2017_11_22_093559_create_vehicle_group_table', 1),
(17, '2017_12_28_091600_create_service_items_table', 1),
(18, '2017_12_28_122952_create_service_reminder_table', 1),
(19, '2017_12_28_174333_create_api_settings_table', 1),
(20, '2018_01_08_062105_create_driver_vehicle_table', 1),
(21, '2018_01_10_130517_users_meta', 1),
(22, '2018_01_13_050018_bookings_meta', 1),
(23, '2018_01_16_095657_fare_settings', 1),
(24, '2018_01_25_050939_create_vehicles_meta_table', 1),
(25, '2018_02_06_052302_create_message_table', 1),
(26, '2018_02_06_125252_create_reviews_table', 1),
(27, '2018_03_13_124424_create_addresses_table', 1),
(28, '2018_03_28_085735_create_reasons_table', 1),
(29, '2018_04_28_073004_create_email_content_table', 1),
(30, '2018_08_14_061757_create_vehicle_review_table', 1),
(31, '2019_01_18_063916_add_vendor_id_to_expense', 1),
(32, '2019_01_19_080738_add_udf_to_vendors', 1),
(33, '2019_01_19_103826_create_parts_table', 1),
(34, '2019_01_19_110823_create_vehicle_types_table', 1),
(35, '2019_01_22_101948_create_driver_logs_table', 1),
(36, '2019_01_23_113852_add_type_id_to_vehicles_table', 1),
(37, '2019_01_24_095115_add_type_id_to_fare_settings_table', 1),
(38, '2019_04_12_092111_create_parts_category_table', 1),
(39, '2019_04_19_053314_create_work_order_logs_table', 1),
(40, '2019_05_13_062039_create_push_notification_table', 1),
(41, '2019_07_18_110031_add_column_to_vendors', 1),
(42, '2019_07_31_082514_create_testimonials_table', 1),
(43, '2019_07_31_102801_create_frontend_table', 1),
(44, '2019_08_01_045837_add_columns_to_message_table', 1),
(45, '2019_08_19_101509_create_booking_quotation_table', 1),
(46, '2019_08_22_052138_create_parts_used_table', 1),
(47, '2019_08_22_113138_add_parts_price_to_work_order_logs_table', 1),
(48, '2019_08_29_104613_create_company_services_table', 1),
(49, '2019_09_16_085700_create_teams_table', 1),
(50, '2019_12_10_083547_add_columns_to_booking_quotation_table', 1),
(51, '2019_12_16_064152_add_indexes_to_users_table', 1),
(52, '2019_12_16_064951_add_indexes_to_addresses_table', 1),
(53, '2019_12_16_065511_add_indexes_to_bookings_table', 1),
(54, '2019_12_16_083315_add_indexes_to_booking_income_table', 1),
(55, '2019_12_16_084539_add_indexes_to_booking_quotation_table', 1),
(56, '2019_12_16_085312_add_indexes_to_driver_logs_table', 1),
(57, '2019_12_16_085505_add_indexes_to_driver_vehicle_table', 1),
(58, '2019_12_16_091010_add_indexes_to_email_content_table', 1),
(59, '2019_12_16_091713_add_indexes_to_expense_table', 1),
(60, '2019_12_16_094305_add_indexes_to_expense_cat_table', 1),
(61, '2019_12_16_094651_add_indexes_to_fare_settings_table', 1),
(62, '2019_12_16_095024_add_indexes_to_frontend_table', 1),
(63, '2019_12_16_095339_add_indexes_to_fuel_table', 1),
(64, '2019_12_16_095634_add_indexes_to_income_table', 1),
(65, '2019_12_16_095953_add_indexes_to_income_cat_table', 1),
(66, '2019_12_16_100221_add_indexes_to_notes_table', 1),
(67, '2019_12_16_100437_add_indexes_to_notifications_table', 1),
(68, '2019_12_16_100545_add_indexes_to_parts_table', 1),
(69, '2019_12_16_101113_add_indexes_to_parts_used_table', 1),
(70, '2019_12_16_101540_add_indexes_to_push_notification_table', 1),
(71, '2019_12_16_101851_add_indexes_to_reviews_table', 1),
(72, '2019_12_16_102259_add_indexes_to_service_reminder_table', 1),
(73, '2019_12_16_102555_add_indexes_to_vehicles_table', 1),
(74, '2019_12_16_104209_add_indexes_to_vehicle_review_table', 1),
(75, '2019_12_16_104440_add_indexes_to_vendors_table', 1),
(76, '2019_12_16_104704_add_indexes_to_work_orders_table', 1),
(77, '2019_12_16_105013_add_indexes_to_work_order_logs_table', 1),
(78, '2019_12_16_115309_add_indexes_to_api_settings_table', 1),
(79, '2019_12_17_080649_add_taxes_to_income_table', 1),
(80, '2019_12_19_052248_create_payment_settings_table', 1),
(81, '2019_12_19_063520_create_booking_payments_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notes`
--

CREATE TABLE `notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `submitted_on` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderplan`
--

CREATE TABLE `orderplan` (
  `id` int(11) NOT NULL,
  `no_SO` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_PO` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_LO` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customers_id` int(11) DEFAULT NULL,
  `depo_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty_order` int(11) DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `customer_location_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `orderplan`
--

INSERT INTO `orderplan` (`id`, `no_SO`, `no_PO`, `no_LO`, `customers_id`, `depo_id`, `product_id`, `address`, `qty_order`, `attachment`, `created_at`, `updated_at`, `deleted_at`, `customer_location_id`) VALUES
(1, 'SO123', 'PO123', 'LO123', 2, 1, 1, NULL, 8000, NULL, '2021-04-02 00:35:51', '2021-04-02 05:39:32', NULL, 6),
(2, 'SO333', 'PO333', 'LO333', 3, 1, 1, NULL, 4000, NULL, '2021-04-02 18:41:53', '2021-04-02 18:41:53', NULL, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_plan`
--

CREATE TABLE `order_plan` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_on` date DEFAULT NULL,
  `required_by` date DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meter` int(11) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_plan_logs`
--

CREATE TABLE `order_plan_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_on` date DEFAULT NULL,
  `required_by` date DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meter` int(11) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parts_price` double DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `parts`
--

CREATE TABLE `parts` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `availability` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `barcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_cost` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `manufacturer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `udf` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `parts_category`
--

CREATE TABLE `parts_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `parts_category`
--

INSERT INTO `parts_category` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Engine Parts', '2021-01-02 01:06:29', '2021-01-02 01:06:29', NULL),
(2, 'Electricals', '2021-01-02 01:06:29', '2021-01-02 01:06:29', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `parts_used`
--

CREATE TABLE `parts_used` (
  `id` int(10) UNSIGNED NOT NULL,
  `part_id` int(11) DEFAULT NULL,
  `work_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_settings`
--

CREATE TABLE `payment_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `payment_settings`
--

INSERT INTO `payment_settings` (`id`, `name`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'method', '[\"cash\"]', '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(2, 'currency_code', 'INR', '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(3, 'stripe_publishable_key', '', '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(4, 'stripe_secret_key', '', '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(5, 'razorpay_key', '', '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(6, 'razorpay_secret', '', '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pickup_bytransport`
--

CREATE TABLE `pickup_bytransport` (
  `id` int(11) NOT NULL,
  `no_SO` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_PO` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_LO` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customers_id` int(11) DEFAULT NULL,
  `customers_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `customer_location_id` int(11) DEFAULT NULL,
  `customer_location_address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `qty_order` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `planning_at` timestamp NULL DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `warehouse_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `depo_id` int(11) DEFAULT NULL,
  `depo_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `drivers_id` int(11) DEFAULT NULL,
  `drivers_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `trucks_id` int(11) DEFAULT NULL,
  `door_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `transporter_id` int(11) DEFAULT NULL,
  `transporter_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `trailers_id` int(11) DEFAULT NULL,
  `trailers_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `license_plate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `statuspickup` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `compartement` int(11) DEFAULT NULL,
  `start_loading` timestamp NULL DEFAULT NULL,
  `stop_loading` timestamp NULL DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `pickup_bytransport`
--

INSERT INTO `pickup_bytransport` (`id`, `no_SO`, `no_PO`, `no_LO`, `customers_id`, `customers_name`, `customer_location_id`, `customer_location_address`, `qty_order`, `product_id`, `product_name`, `planning_at`, `warehouse_id`, `warehouse_name`, `depo_id`, `depo_name`, `drivers_id`, `drivers_name`, `trucks_id`, `door_number`, `transporter_id`, `transporter_name`, `trailers_id`, `trailers_name`, `license_plate`, `status`, `statuspickup`, `compartement`, `start_loading`, `stop_loading`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'SO123', 'PO123', 'LO123', 2, 'DK 82', 2, 'HRSCC- DK 82 PURWAKARATA - JABAR', 8000, 1, 'RON 92', '2021-04-21 17:00:00', 1, 'WH Pontir', 1, 'Depo Plumpang', 1, 'SUPRIYANTO', 1, 'JNK03', 1, 'PT.Sicepat Express', 1, 'Nissan', 'B7777K', 1, 'Pending', 1, '2021-04-23 17:00:00', '2021-04-20 17:00:00', 'tet', '2021-04-02 12:48:30', '2021-04-02 12:48:30', NULL),
(3, 'SO333', 'PO333', 'LO333', 3, 'DK 102', 3, 'HRSCC- DK 102 PURWAKARATA - JABAR', 4000, 1, 'RON 92', '2021-04-29 17:00:00', 2, 'WH Bintaro', 1, 'Depo Plumpang', 2, 'ARIS SUKRESNO', 1, 'JNK03', 1, 'PT.Sicepat Express', 1, 'Nissan', 'B7777K', 1, 'Completed', 2, '2021-04-29 17:00:00', '2021-04-29 17:00:00', 'test lagi', '2021-04-02 18:46:08', '2021-04-02 22:26:30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `density` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `name`, `density`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BIO SOLAR', '851,3', '2021-02-15 01:17:00', '2021-04-21 00:24:13', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `push_notification`
--

CREATE TABLE `push_notification` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `authtoken` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contentencoding` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `endpoint` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publickey` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reasons`
--

CREATE TABLE `reasons` (
  `id` int(10) UNSIGNED NOT NULL,
  `reason` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `reasons`
--

INSERT INTO `reasons` (`id`, `reason`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'No fuel', NULL, '2021-01-02 01:06:29', '2021-01-02 01:06:29'),
(2, 'Tire punctured', NULL, '2021-01-02 01:06:29', '2021-01-02 01:06:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `ratings` double(8,2) DEFAULT NULL,
  `review_text` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `service_items`
--

CREATE TABLE `service_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_interval` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'off',
  `overdue_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `overdue_unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meter_interval` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'off',
  `overdue_meter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `show_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'off',
  `duesoon_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duesoon_unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `show_meter` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'off',
  `duesoon_meter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `service_items`
--

INSERT INTO `service_items` (`id`, `description`, `time_interval`, `overdue_time`, `overdue_unit`, `meter_interval`, `overdue_meter`, `show_time`, `duesoon_time`, `duesoon_unit`, `show_meter`, `duesoon_meter`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Change oil', 'on', '60', 'day(s)', 'off', NULL, 'on', '2', 'day(s)', 'off', NULL, NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service_reminder`
--

CREATE TABLE `service_reminder` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `last_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_meter` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `label`, `name`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Website Name', 'app_name', 'Transport Manager', '2021-01-02 01:06:31', '2021-01-03 09:31:26', NULL),
(2, 'Business Address 1', 'badd1', 'Company Address 1', '2021-01-02 01:06:31', '2021-01-03 09:31:26', NULL),
(3, 'Business Address 2', 'badd2', 'Company Address 2', '2021-01-02 01:06:31', '2021-01-03 09:31:26', NULL),
(4, 'Email Address', 'email', 'master@admin.com', '2021-01-02 01:06:31', '2021-01-03 09:31:26', NULL),
(5, 'City', 'city', 'Jakarta', '2021-01-02 01:06:31', '2021-01-03 09:31:26', NULL),
(6, 'State', 'state', 'Jakarta', '2021-01-02 01:06:31', '2021-01-03 09:31:26', NULL),
(7, 'Country', 'country', 'Indonesia', '2021-01-02 01:06:31', '2021-01-03 09:31:26', NULL),
(8, 'Distence Format', 'dis_format', 'km', '2021-01-02 01:06:31', '2021-01-03 09:31:26', NULL),
(9, 'Language', 'language', 'English-en', '2021-01-02 01:06:31', '2021-01-03 09:31:26', NULL),
(10, 'Currency', 'currency', '₹', '2021-01-02 01:06:31', '2021-01-03 09:31:26', NULL),
(11, 'Tax No', 'tax_no', 'ABCD8735XXX', '2021-01-02 01:06:31', '2021-01-03 09:31:26', NULL),
(12, 'Invoice Text', 'invoice_text', 'Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.', '2021-01-02 01:06:31', '2021-01-03 09:31:26', NULL),
(13, 'Small Logo', 'icon_img', 'logo-40.png', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL),
(14, 'Main Logo', 'logo_img', 'logo.png', '2021-01-02 01:06:31', '2021-01-02 01:06:31', NULL),
(15, 'Time Interval', 'time_interval', '30', '2021-01-02 01:06:31', '2021-01-03 09:31:26', NULL),
(16, 'Tax Charge', 'tax_charge', 'null', '2021-01-02 01:06:31', '2021-01-03 09:31:26', NULL),
(17, 'Fuel Unit', 'fuel_unit', 'liter', '2021-01-02 01:06:31', '2021-01-03 09:31:26', NULL),
(18, 'Date Format', 'date_format', 'd-m-Y', '2021-01-02 01:06:31', '2021-01-03 09:31:26', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `team`
--

CREATE TABLE `team` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `team`
--

INSERT INTO `team` (`id`, `name`, `details`, `designation`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kevin Feest', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus neque est nemo et ipsum fugiat, ab facere adipisci. Aliquam quibusdam molestias quisquam distinctio? Culpa, voluptatem voluptates exercitationem sequi velit quaerat.', 'Owner', NULL, '2021-01-02 01:06:29', '2021-01-02 01:06:29', NULL),
(2, 'Dr. Litzy Doyle I', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus neque est nemo et ipsum fugiat, ab facere adipisci. Aliquam quibusdam molestias quisquam distinctio? Culpa, voluptatem voluptates exercitationem sequi velit quaerat.', 'Owner', NULL, '2021-01-02 01:06:29', '2021-01-02 01:06:29', NULL),
(3, 'Virginia Stracke', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus neque est nemo et ipsum fugiat, ab facere adipisci. Aliquam quibusdam molestias quisquam distinctio? Culpa, voluptatem voluptates exercitationem sequi velit quaerat.', 'Owner', NULL, '2021-01-02 01:06:29', '2021-01-02 01:06:29', NULL),
(4, 'Vicenta Reichel IV', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus neque est nemo et ipsum fugiat, ab facere adipisci. Aliquam quibusdam molestias quisquam distinctio? Culpa, voluptatem voluptates exercitationem sequi velit quaerat.', 'Owner', NULL, '2021-01-02 01:06:29', '2021-01-02 01:06:29', NULL),
(5, 'Porter Feeney', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus neque est nemo et ipsum fugiat, ab facere adipisci. Aliquam quibusdam molestias quisquam distinctio? Culpa, voluptatem voluptates exercitationem sequi velit quaerat.', 'Owner', NULL, '2021-01-02 01:06:29', '2021-01-02 01:06:29', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `details`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Torrey Hauck', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet animi doloribus, repudiandae iusto magnam soluta voluptates, expedita aspernatur consectetur! Ex fugit ducimus itaque, quibusdam nemo in animi quae libero repellendus!', NULL, '2021-01-02 01:06:29', '2021-01-02 01:06:29', NULL),
(2, 'Mrs. Macy Jaskolski', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet animi doloribus, repudiandae iusto magnam soluta voluptates, expedita aspernatur consectetur! Ex fugit ducimus itaque, quibusdam nemo in animi quae libero repellendus!', NULL, '2021-01-02 01:06:29', '2021-01-02 01:06:29', NULL),
(3, 'Zora Frami', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet animi doloribus, repudiandae iusto magnam soluta voluptates, expedita aspernatur consectetur! Ex fugit ducimus itaque, quibusdam nemo in animi quae libero repellendus!', NULL, '2021-01-02 01:06:29', '2021-01-02 01:06:29', NULL),
(4, 'Ms. Kathryne Blanda MD', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet animi doloribus, repudiandae iusto magnam soluta voluptates, expedita aspernatur consectetur! Ex fugit ducimus itaque, quibusdam nemo in animi quae libero repellendus!', NULL, '2021-01-02 01:06:29', '2021-01-02 01:06:29', NULL),
(5, 'Prof. Ahmed Predovic', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet animi doloribus, repudiandae iusto magnam soluta voluptates, expedita aspernatur consectetur! Ex fugit ducimus itaque, quibusdam nemo in animi quae libero repellendus!', NULL, '2021-01-02 01:06:29', '2021-01-02 01:06:29', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trailers`
--

CREATE TABLE `trailers` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_maker` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `license_plate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tag_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lic_exp_date` date DEFAULT NULL,
  `reg_exp_date` date DEFAULT NULL,
  `tera_sertifikat` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tera_rls_date` date DEFAULT NULL,
  `tera_exp_date` date DEFAULT NULL,
  `trailer_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `compartement` smallint(10) DEFAULT NULL,
  `capacity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `C1` tinyint(4) DEFAULT NULL,
  `C2` tinyint(4) DEFAULT NULL,
  `C3` tinyint(4) DEFAULT NULL,
  `C4` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `trailers`
--

INSERT INTO `trailers` (`id`, `brand`, `type`, `unit_maker`, `license_plate`, `tag_id`, `year`, `lic_exp_date`, `reg_exp_date`, `tera_sertifikat`, `tera_rls_date`, `tera_exp_date`, `trailer_image`, `compartement`, `capacity`, `C1`, `C2`, `C3`, `C4`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nissan', 'PK 215 H 4×2 6 Roda', 'PT.Sabar Menanti Order', 'B1234L', NULL, '2018', '2022-06-15', '2021-02-12', 'KL77777777', '2021-04-30', '2021-04-28', NULL, NULL, '1000KL', 1, 1, 1, NULL, '2021-02-12 17:35:38', '2021-04-17 21:43:27', NULL),
(2, 'HINO', 'FL 260 JT', 'PT.Barokah Abadi', 'DH9089ZNL', 'SNZ77777777', '2018', '2021-04-28', '2021-04-28', 'B90000000000', '2021-04-27', '2021-04-29', NULL, 2, '1000KL', 1, 1, 1, 1, '2021-04-17 21:44:29', '2021-04-17 22:08:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transporter`
--

CREATE TABLE `transporter` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_transporter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(4) DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `transporter`
--

INSERT INTO `transporter` (`id`, `name`, `address`, `city`, `province`, `postal_code`, `country`, `phone`, `email_transporter`, `note`, `active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'PT.Sicepat Express', 'Jl.Kesadaran 1 No.111 Rt.01 Rw.03', 'Tangerang Selatan', 'Banten', '13240', 'Indonesia', '6282167424439', 'AZAKHIYAH@GMAIL.COM', 'Test Transporter 3', 1, NULL, '2021-02-14 02:33:32', '2021-02-14 02:36:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trucks`
--

CREATE TABLE `trucks` (
  `id` int(11) NOT NULL,
  `factory_brand` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `truck_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `machine_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `license_plate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lic_exp_date` date DEFAULT NULL,
  `tax_exp_date` date DEFAULT NULL,
  `kir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kir_exp_date` date NOT NULL,
  `tera_sertifikat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tera_rls_date` date DEFAULT NULL,
  `tera_exp_date` date DEFAULT NULL,
  `gate_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gatepass_rls_date` date DEFAULT NULL,
  `gatepass_exp_date` date DEFAULT NULL,
  `door_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flowmeter` tinyint(4) DEFAULT NULL,
  `in_service` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `trucks`
--

INSERT INTO `trucks` (`id`, `factory_brand`, `model`, `type`, `year`, `group_id`, `truck_image`, `vin`, `machine_number`, `license_plate`, `tax_number`, `lic_exp_date`, `tax_exp_date`, `kir`, `kir_exp_date`, `tera_sertifikat`, `tera_rls_date`, `tera_exp_date`, `gate_pass`, `gatepass_rls_date`, `gatepass_exp_date`, `door_number`, `owner_type`, `flowmeter`, `in_service`, `created_at`, `updated_at`, `deleted_at`, `type_id`) VALUES
(1, 'Mitsubishi', '4D34-2AT7', NULL, '2020', NULL, NULL, 'MHF11KF8300002161', 'BK1111111110L', 'B7777K', '11111', '2022-01-01', '2021-08-09', '8888888J', '0000-00-00', '99999Y', '2021-01-01', '2022-01-01', 'B777KGP', '2021-01-01', '2021-05-01', 'JNK03', 'Rental', NULL, 0, '2021-02-18 23:26:58', '2021-04-16 21:46:11', NULL, 12),
(2, 'Mitsubishi', '4D34-2AT7', NULL, '2021', NULL, NULL, 'BX24596330', 'KL033434323', 'B1234ZNL', 'MNjk99999999', '2021-04-27', '2021-04-29', '8756733J', '0000-00-00', '11111K', '2021-04-27', '2021-04-27', 'L34', '2021-04-27', '2021-04-28', 'JN009', 'Rental', 1, 0, '2021-04-16 22:02:03', '2021-04-16 22:21:14', NULL, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `truck_group`
--

CREATE TABLE `truck_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `truck_review`
--

CREATE TABLE `truck_review` (
  `id` int(10) UNSIGNED NOT NULL,
  `truck_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reg_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kms_outgoing` int(11) DEFAULT NULL,
  `kms_incoming` int(11) DEFAULT NULL,
  `fuel_level_out` int(11) DEFAULT NULL,
  `fuel_level_in` int(11) DEFAULT NULL,
  `datetime_outgoing` datetime DEFAULT NULL,
  `datetime_incoming` datetime DEFAULT NULL,
  `petrol_card` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `lights` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `invertor` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `car_mats` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `int_damage` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `int_lights` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ext_car` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `tyre` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ladder` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `leed` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `power_tool` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ac` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `head_light` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `lock` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `windows` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `condition` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `oil_chk` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `suspension` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `tool_box` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `truck_types`
--

CREATE TABLE `truck_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `trucktype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `displayname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isenable` int(11) DEFAULT NULL,
  `cylinder_capacity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `km_per_liter` int(11) DEFAULT NULL,
  `hour_per_liter` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `truck_types`
--

INSERT INTO `truck_types` (`id`, `trucktype`, `brand`, `model`, `displayname`, `icon`, `isenable`, `cylinder_capacity`, `km_per_liter`, `hour_per_liter`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 'Colt Diesel Double', NULL, NULL, 'Colt Diesel Double', 'truck_type_1613635148.jpg', 1, '9000', NULL, NULL, '2021-02-18 00:59:08', '2021-02-18 00:59:08', NULL),
(13, 'Colt Diesel Double2', 'Mitsubishi', '4D34-2AT7', 'Colt Diesel Double', NULL, 0, '2000', 15, 1, '2021-04-17 01:04:03', '2021-04-17 01:04:03', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `api_token` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `group_id`, `api_token`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Administrator', 'master@admin.com', '$2y$10$L4WY3qC1VnlFsbgZaWKgrOydHFuiwyZGHuPqS/macc/tquO4aHzQy', 'S', NULL, 'stG1ykbIFoSmJOcJdDibLYCklXorGdUhJyquFf94zyocvPIkIsNHHWvNBEnu', 'FZpOsj3iqekibtAZc1X6oxvhREYa8kPCXV8Yl4bdM7iHGUAi9scmoIJ3nMK5', '2021-01-02 01:06:29', '2021-01-02 01:06:29', NULL),
(2, 'User One', 'user1@admin.com', '$2y$10$xqwZ4PEpSV9btk1HWbjoZufQQrTPF0kNngr03Noaw9S27j8RkfPZS', 'O', 1, '1HlcBMrSg3Hu5tdBYU5vG3t5s2KRXHxHzFip1hkxxHwyYlp12WkYZaJwVHYn', NULL, '2021-01-02 01:06:29', '2021-01-02 01:06:29', NULL),
(3, 'User Two', 'user2@admin.com', '$2y$10$KBvUxVv59XE4PSVuiIHRo.QhbztqWyxbGoI9ZffASxB/cRwJmZfDe', 'O', 1, 'cwoRmuYhRiyHhFkk7k2eES7Mp6Z0YIi5UVJzLH9r7ybZoVIxckyU4XywIPgS', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL),
(4, 'Customer One', 'customer1@gmail.com', '$2y$10$LX3TTX98Q5aeRtrKXtL9k.gWDy512phgVg15Pll63tNy5a6IyqGTW', 'C', NULL, 'omHQeMrh0tYPdXfamasCQITPOCi7DvV82XWKLozU8AzdjtQGvgFOTejJJi4c', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL),
(5, 'Customer Two', 'customer2@gmail.com', '$2y$10$7sHUyL7fRJQzU5eHec3Joe9wVS6cyzvbG0lv/co8du9bS.g2fRwFm', 'C', NULL, 'vLPUc5noFqCESdz1tYa6nP3PrFMcXYSSGdQRQAxsrzNY6FqZOxZTSHO6Fv5P', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL),
(6, 'Marshall Wilderman', 'maude.blanda@example.com', '$2y$10$cIUZrrGpGOOCEbQjmEDDAuuptKdUeeilyvSfjc5U3BiHzcK4xZ2V2', 'D', NULL, 'cXHE4IrWqVK8rttNbt1SRM6bGnctTXFqMuZHsSh0FO2SPbsVANoeI4ymAJBz', 'Bkye0vb9kC', '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(7, 'Stone O\'Reilly', 'dmarquardt@example.net', '$2y$10$fbUew2pPQsIzg.mOtgYVCe2XpdmnHvn2HSR7Lw2KzakOZDLSvzRMu', 'D', NULL, 'I2HDjlDjS7kwYu9Hp6n05rkinGzGPrgRheIussKRkLuEaVrr1FI2uYy5C4AN', 'XfplzuLrqa', '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL),
(8, 'dev tms', 'devtms@test.com', '$2y$10$jNCHJDzeG/dvBtRYv5DAH.d51HFHM3pAaDVDLEprcsoU8d3GkUqxG', 'O', 1, 'Pa9tL91z6wRBJ3DB114IGNF6vl4Xxxxn7MFwWSZ6LU1Ml0t3ODahQH0nkahl', NULL, '2021-01-03 09:26:36', '2021-01-03 09:26:36', NULL),
(9, 'zakhiyah arsal', 'AZAKHIYAH@GMAIL.COM', '$2y$10$mkiPWGnwvWsbnJJxb.XgP.GWonySRN.VSrPFF3w2EiCuqTS2Scray', 'C', NULL, 'g0kHB85BKdX4Hkn4b9sA77ZuJb91mzVf18nhhRI32FcPNHbYk7cZwrs2gq5x', NULL, '2021-01-29 00:18:35', '2021-01-29 00:18:35', NULL),
(10, 'zakhiyah arsal', 'Koperasi@GMAIL.COM', '$2y$10$Gs4wPJVCTMzOICoe6qIel.qZ8/sGyVbt/iNEbfe1Dn.fHXRCzg9By', 'C', NULL, 'KxY00uIn733h9oFQ8jI4F9rryjUVBpWUPaRxNPTBh9eVudjYkY9DFWIhW7gp', NULL, '2021-02-01 23:47:13', '2021-02-01 23:47:13', NULL),
(11, 'Andre arsal', 'sruyono@GMAIL.COM', '$2y$10$hZJy723ghzBih6W.G/b6I.WMVs6JEh9ZrVIHfbWf02xPSkZ8eQ8Gi', 'D', NULL, '0vqDWRnnG947dCgcFZSp6dl8ShbCjKYzpPrVGYzYGngO72Vmbc2AInHViv6V', NULL, '2021-02-15 02:13:40', '2021-02-15 02:13:40', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_meta`
--

CREATE TABLE `users_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'null',
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users_meta`
--

INSERT INTO `users_meta` (`id`, `user_id`, `type`, `key`, `value`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'string', 'profile_image', 'no-user.jpg', NULL, '2021-01-02 01:06:29', '2021-01-02 01:06:29'),
(2, 1, 'string', 'module', 'a:13:{i:0;s:1:\"0\";i:1;s:1:\"1\";i:2;s:1:\"2\";i:3;s:1:\"3\";i:4;s:1:\"4\";i:5;s:1:\"5\";i:6;s:1:\"6\";i:7;s:1:\"7\";i:8;s:2:\"14\";i:9;s:1:\"8\";i:10;s:1:\"9\";i:11;s:2:\"10\";i:12;s:2:\"12\";}', NULL, '2021-01-02 01:06:29', '2021-01-05 07:15:36'),
(3, 2, 'string', 'module', 'a:15:{i:0;i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;i:5;i:6;i:6;i:7;i:7;i:8;i:8;i:9;i:9;i:10;i:10;i:11;i:12;i:12;i:13;i:13;i:14;i:14;i:15;}', NULL, '2021-01-02 01:06:29', '2021-01-02 01:06:29'),
(4, 3, 'string', 'module', 'a:15:{i:0;i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;i:5;i:6;i:6;i:7;i:7;i:8;i:8;i:9;i:9;i:10;i:10;i:11;i:12;i:12;i:13;i:13;i:14;i:14;i:15;}', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(5, 4, 'string', 'first_name', 'Customer', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(6, 4, 'string', 'last_name', 'One', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(7, 4, 'string', 'address', '728 Evalyn Knolls Apt. 119 Lake Jaydenville, MD 74979-3406', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(8, 4, 'string', 'mobno', '8639379915669', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(9, 4, 'integer', 'gender', '0', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(10, 5, 'string', 'first_name', 'Customer', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(11, 5, 'string', 'last_name', 'Two', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(12, 5, 'string', 'address', '91158 Luigi Cliffs Lake Darby, MA 39627-1727', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(13, 5, 'string', 'mobno', '9773607007903', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(14, 5, 'integer', 'gender', '1', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(15, 6, 'string', 'first_name', 'Marshall', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(16, 6, 'string', 'last_name', 'Wilderman', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(17, 6, 'string', 'address', '59939 Mariam Rapids\nCecileside, NH 86234', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(18, 6, 'string', 'phone', '04529196658440', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(19, 6, 'string', 'issue_date', '2021-01-02', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(20, 6, 'string', 'exp_date', '2021-03-02', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(21, 6, 'string', 'start_date', '2021-01-02', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(22, 6, 'string', 'end_date', '2021-02-02', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(23, 6, 'integer', 'license_number', '355499', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(24, 6, 'integer', 'contract_number', '1468', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(25, 6, 'integer', 'emp_id', '30064', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(26, 7, 'string', 'first_name', 'Stone', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(27, 7, 'string', 'last_name', 'O\'Reilly', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(28, 7, 'string', 'address', '59531 Fadel Ports Apt. 806\nSaraifurt, TX 01440-6626', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(29, 7, 'string', 'phone', '08898254563130', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(30, 7, 'string', 'issue_date', '2021-01-02', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(31, 7, 'string', 'exp_date', '2021-03-02', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(32, 7, 'string', 'start_date', '2021-01-02', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(33, 7, 'string', 'end_date', '2021-02-02', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(34, 7, 'integer', 'license_number', '726982', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(35, 7, 'integer', 'contract_number', '6499', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(36, 7, 'integer', 'emp_id', '4651975', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(37, 6, 'integer', 'vehicle_id', '1', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(38, 8, 'string', 'module', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"5\";i:2;s:1:\"6\";i:3;s:1:\"7\";i:4;s:2:\"12\";}', NULL, '2021-01-03 09:26:36', '2021-01-03 09:26:36'),
(39, 8, 'string', 'language', 'English-en', NULL, '2021-01-03 09:26:36', '2021-01-03 09:26:36'),
(40, 1, 'string', 'language', 'English-en', NULL, '2021-01-03 09:31:26', '2021-01-03 09:31:26'),
(41, 8, 'integer', 'login_status', '1', NULL, '2021-01-08 08:17:18', '2021-01-08 08:17:18'),
(42, 9, 'string', 'first_name', 'zakhiyah', NULL, '2021-01-29 00:18:35', '2021-01-29 00:18:35'),
(43, 9, 'string', 'last_name', 'arsal', NULL, '2021-01-29 00:18:35', '2021-01-29 00:18:35'),
(44, 9, 'string', 'address', 'Asrama Polri Cipinang No.26 RT/RW : 012/006 Kel.Cipinang Kec.Pulo Gadung', NULL, '2021-01-29 00:18:35', '2021-01-29 00:18:35'),
(45, 9, 'string', 'mobno', '082167424439', NULL, '2021-01-29 00:18:35', '2021-01-29 00:18:35'),
(46, 9, 'string', 'gender', '1', NULL, '2021-01-29 00:18:35', '2021-01-29 00:18:35'),
(47, 10, 'string', 'first_name', 'zakhiyah', NULL, '2021-02-01 23:47:13', '2021-02-01 23:47:13'),
(48, 10, 'string', 'last_name', 'arsal', NULL, '2021-02-01 23:47:13', '2021-02-01 23:47:13'),
(49, 10, 'string', 'address', 'Asrama Polri Cipinang No.26 RT/RW : 012/006 Kel.Cipinang Kec.Pulo Gadung\r\nAsrama Polri Cipinang No.26 RT/RW : 012/006 Kel.Cipinang Kec.Pulo Gadung', NULL, '2021-02-01 23:47:13', '2021-02-01 23:47:13'),
(50, 10, 'string', 'mobno', '082167424439', NULL, '2021-02-01 23:47:13', '2021-02-01 23:47:13'),
(51, 10, 'string', 'gender', '1', NULL, '2021-02-01 23:47:13', '2021-02-01 23:47:13'),
(52, 7, 'string', 'vehicle_id', '2', NULL, '2021-02-09 21:22:23', '2021-02-09 21:22:23'),
(53, 11, 'string', '_token', 'yhzEUuKO9qVqOXY3F34ESQKTchTSOXjrz6hKEUVe', NULL, '2021-02-15 02:13:40', '2021-02-15 02:13:40'),
(54, 11, 'string', 'is_active', '0', NULL, '2021-02-15 02:13:40', '2021-02-15 02:13:40'),
(55, 11, 'string', 'is_available', '0', NULL, '2021-02-15 02:13:40', '2021-02-15 02:13:40'),
(56, 11, 'string', 'first_name', 'Andre', NULL, '2021-02-15 02:13:40', '2021-02-15 02:13:40'),
(57, 11, 'string', 'middle_name', 'Taulany', NULL, '2021-02-15 02:13:40', '2021-02-15 02:13:40'),
(58, 11, 'string', 'last_name', 'arsal', NULL, '2021-02-15 02:13:40', '2021-02-15 02:13:40'),
(59, 11, 'string', 'vehicle_id', '3', NULL, '2021-02-15 02:13:40', '2021-02-15 02:13:40'),
(60, 11, 'string', 'address', 'Asrama Polri Cipinang No.26 RT/RW : 012/006 Kel.Cipinang Kec.Pulo Gadung', NULL, '2021-02-15 02:13:40', '2021-02-15 02:13:40'),
(61, 11, 'string', 'email', 'sruyono@GMAIL.COM', NULL, '2021-02-15 02:13:40', '2021-02-15 02:13:40'),
(62, 11, 'string', 'phone_code', '+62', NULL, '2021-02-15 02:13:40', '2021-02-15 02:13:40'),
(63, 11, 'string', 'phone', '82167424439', NULL, '2021-02-15 02:13:40', '2021-02-15 02:13:40'),
(64, 11, 'string', 'emp_id', '12259', NULL, '2021-02-15 02:13:40', '2021-02-15 02:13:40'),
(65, 11, 'string', 'contract_number', 'SRF1701', NULL, '2021-02-15 02:13:40', '2021-02-15 02:13:40'),
(66, 11, 'string', 'license_number', '12222222', NULL, '2021-02-15 02:13:40', '2021-02-15 02:13:40'),
(67, 11, 'string', 'issue_date', '2021-02-11', NULL, '2021-02-15 02:13:40', '2021-02-15 02:13:40'),
(68, 11, 'string', 'exp_date', '2021-02-26', NULL, '2021-02-15 02:13:40', '2021-02-15 02:13:40'),
(69, 11, 'string', 'start_date', '2021-02-01', NULL, '2021-02-15 02:13:40', '2021-02-15 02:13:40'),
(70, 11, 'string', 'end_date', '2021-02-16', NULL, '2021-02-15 02:13:40', '2021-02-15 02:13:40'),
(71, 11, 'string', 'password', 'randhyn!3005', NULL, '2021-02-15 02:13:40', '2021-02-15 02:13:40'),
(72, 11, 'string', 'gender', '1', NULL, '2021-02-15 02:13:40', '2021-02-15 02:13:40'),
(73, 11, 'NULL', 'econtact', NULL, NULL, '2021-02-15 02:13:40', '2021-02-15 02:13:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `make` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `lic_exp_date` date DEFAULT NULL,
  `reg_exp_date` date DEFAULT NULL,
  `vehicle_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `engine_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `horse_power` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `license_plate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mileage` int(11) DEFAULT NULL,
  `in_service` tinyint(4) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `int_mileage` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `vehicles`
--

INSERT INTO `vehicles` (`id`, `make`, `model`, `type`, `year`, `group_id`, `lic_exp_date`, `reg_exp_date`, `vehicle_image`, `engine_type`, `horse_power`, `color`, `vin`, `license_plate`, `mileage`, `in_service`, `user_id`, `created_at`, `updated_at`, `deleted_at`, `int_mileage`, `type_id`) VALUES
(1, 'Honda', 'Jazz', NULL, '2015', 1, '2021-09-09', '2021-06-01', 'car1.jpeg', 'Petrol', '190', 'red', '2342342', '9191bh', 45464, 1, 1, '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL, 50, 3),
(2, 'Tata', 'NANO', NULL, '2012', 1, '2022-01-02', '2021-04-02', 'car2.jpeg', 'Petrol', '150', 'white', '124578', '1245ab', 45464, 1, 1, '2021-01-02 01:06:30', '2021-01-02 01:06:30', NULL, 40, 3),
(3, 'Kawasaki', 'K1115', NULL, '2017', 1, '2021-02-05', '2021-02-06', '49df2036-b367-459f-b1cd-1201b77608d2.jpeg', 'Petrol', '250', 'red', 'red', 'B1234Kl', NULL, 1, 1, '2021-02-15 01:44:50', '2021-02-15 02:31:18', NULL, 15, 7),
(4, 'Bajai', 'S57', NULL, '2020', 1, '2021-02-27', '2021-02-16', NULL, 'Petrol', '250', 'white', 'white', 'Z111L', NULL, 0, 1, '2021-02-15 01:46:47', '2021-02-15 01:47:11', NULL, 12, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vehicles_meta`
--

CREATE TABLE `vehicles_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'null',
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `vehicles_meta`
--

INSERT INTO `vehicles_meta` (`id`, `vehicle_id`, `type`, `key`, `value`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'integer', 'driver_id', '6', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(2, 1, 'double', 'average', '35.45', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(3, 1, 'string', 'ins_number', '70651', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(4, 1, 'string', 'ins_exp_date', '2021-07-11', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(5, 2, 'string', 'average', '42.5', NULL, '2021-01-02 01:06:30', '2021-02-09 21:22:32'),
(6, 2, 'string', 'ins_number', '36945', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(7, 2, 'string', 'ins_exp_date', '2021-07-11', NULL, '2021-01-02 01:06:30', '2021-01-02 01:06:30'),
(8, 2, 'string', 'driver_id', '7', NULL, '2021-02-09 21:22:23', '2021-02-09 21:22:23'),
(9, 2, 'string', 'udf', 'N;', NULL, '2021-02-09 21:22:32', '2021-02-09 21:22:32'),
(10, 3, 'string', 'ins_number', '', NULL, '2021-02-15 01:44:50', '2021-02-15 01:44:50'),
(11, 3, 'string', 'ins_exp_date', '', NULL, '2021-02-15 01:44:50', '2021-02-15 01:44:50'),
(12, 3, 'string', 'documents', '', NULL, '2021-02-15 01:44:50', '2021-02-15 01:44:50'),
(13, 3, 'string', 'udf', 'N;', NULL, '2021-02-15 01:44:50', '2021-02-15 01:44:50'),
(14, 3, 'string', 'average', '2', NULL, '2021-02-15 01:44:50', '2021-02-15 01:44:50'),
(15, 4, 'string', 'ins_number', '', NULL, '2021-02-15 01:46:47', '2021-02-15 01:46:47'),
(16, 4, 'string', 'ins_exp_date', '', NULL, '2021-02-15 01:46:47', '2021-02-15 01:46:47'),
(17, 4, 'string', 'documents', '', NULL, '2021-02-15 01:46:47', '2021-02-15 01:46:47'),
(18, 4, 'string', 'udf', 'N;', NULL, '2021-02-15 01:46:47', '2021-02-15 01:46:47'),
(19, 4, 'string', 'average', '12', NULL, '2021-02-15 01:46:47', '2021-02-15 01:46:47'),
(20, 3, 'integer', 'driver_id', '11', NULL, '2021-02-15 02:13:40', '2021-02-15 02:13:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vehicle_group`
--

CREATE TABLE `vehicle_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `vehicle_group`
--

INSERT INTO `vehicle_group` (`id`, `name`, `description`, `note`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Default', 'Default vehicle group', 'Default vehicle group', NULL, '2021-01-02 01:06:29', '2021-01-02 01:06:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vehicle_review`
--

CREATE TABLE `vehicle_review` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reg_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kms_outgoing` int(11) DEFAULT NULL,
  `kms_incoming` int(11) DEFAULT NULL,
  `fuel_level_out` int(11) DEFAULT NULL,
  `fuel_level_in` int(11) DEFAULT NULL,
  `datetime_outgoing` datetime DEFAULT NULL,
  `datetime_incoming` datetime DEFAULT NULL,
  `petrol_card` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `lights` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `invertor` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `car_mats` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `int_damage` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `int_lights` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ext_car` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `tyre` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ladder` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `leed` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `power_tool` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ac` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `head_light` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `lock` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `windows` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `condition` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `oil_chk` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `suspension` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `tool_box` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicletype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `displayname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isenable` int(11) DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `vehicletype`, `displayname`, `icon`, `isenable`, `seats`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hatchback', 'Hatchback', NULL, 1, 4, '2021-01-02 01:06:29', '2021-01-02 01:06:29', NULL),
(2, 'Sedan', 'Sedan', NULL, 1, 4, '2021-01-02 01:06:29', '2021-01-02 01:06:29', NULL),
(3, 'Mini van', 'Mini van', NULL, 1, 7, '2021-01-02 01:06:29', '2021-01-02 01:06:29', NULL),
(4, 'Saloon', 'Saloon', NULL, 1, 4, '2021-01-02 01:06:29', '2021-01-02 01:06:29', NULL),
(5, 'SUV', 'SUV', NULL, 1, 4, '2021-01-02 01:06:29', '2021-01-02 01:06:29', NULL),
(6, 'Bus', 'Bus', NULL, 1, 40, '2021-01-02 01:06:29', '2021-01-02 01:06:29', NULL),
(7, 'Truck', 'Truck', NULL, 1, 3, '2021-01-02 01:06:29', '2021-01-02 01:06:29', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendors`
--

CREATE TABLE `vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `custom_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `udf` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `photo`, `type`, `website`, `custom_type`, `note`, `phone`, `address1`, `address2`, `city`, `province`, `email`, `deleted_at`, `created_at`, `updated_at`, `udf`, `country`, `postal_code`) VALUES
(1, 'Lorna Hane', NULL, 'Fuel', 'http://www.example.com', NULL, 'default vendor', '08672616098057', '8845 Wilkinson Station Apt. 788\nOsbaldoside, CO 44950', NULL, 'Alexanneview', NULL, 'tfeeney@example.net', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL, NULL, NULL),
(2, 'Ernestina Doyle', NULL, 'Machinaries', 'http://www.example.com', NULL, 'default vendor', '04328628376991', '8279 Ida Forest Apt. 994\nAnjalifurt, SC 26816', NULL, 'South Bernice', NULL, 'guadalupe.funk@example.org', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32', NULL, NULL, NULL),
(3, 'zakhiyah arsal', NULL, 'Machinaries', 'test.com', NULL, NULL, '082167424439', 'Asrama Polri Cipinang No.26 RT/RW : 012/006 Kel.Cipinang Kec.Pulo Gadung', 'Asrama Polri Cipinang No.26 RT/RW : 012/006 Kel.Cipinang Kec.Pulo Gadung', 'Jakarta', 'Mauritania', 'AZAKHIYAH@GMAIL.COM', '2021-01-24 21:39:20', '2021-01-24 21:38:38', '2021-01-24 21:39:20', 'N;', 'Mauritania', '13240');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_WH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(4) DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `warehouse`
--

INSERT INTO `warehouse` (`id`, `name`, `address`, `city`, `province`, `postal_code`, `country`, `longitude`, `latitude`, `phone`, `email_WH`, `note`, `active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'PT. JANOKO CIKARANG', 'Jl. Jababeka IVD No V82f, Kawasan Industri Jababeka, Cikarang', 'Cikarang', 'Jawa Barat', '17530', 'Indonesia', '-6.288529259983719', '107.1316027277973', '082220588345', 'johan@janokogroup.com', 'Warehouse Janoko Cikarang', 1, NULL, '2021-04-21 00:15:35', '2021-04-21 00:15:35'),
(2, 'PT. JANOKO CISOKA', 'KP TELAGA RT 004 RW 003, Desa Selapajang, Kec. Cisoka Kab.Tangerang', 'Tangerang', 'Banten', 'unknown', 'Indonesia', 'unknown', 'unknown', '082220588345', 'johan@janokogroup.com', 'warehouse janoko cisoka', 1, NULL, '2021-04-21 00:20:54', '2021-04-21 00:20:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `work_orders`
--

CREATE TABLE `work_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_on` date DEFAULT NULL,
  `required_by` date DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meter` int(11) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `work_orders`
--

INSERT INTO `work_orders` (`id`, `created_on`, `required_by`, `vehicle_id`, `vendor_id`, `price`, `status`, `description`, `meter`, `note`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2021-01-02', '2021-01-07', 2, 1, 2000.00, 'Completed', 'Sample work order', 2398, 'sample work order', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32'),
(2, '2021-01-02', '2021-01-07', 1, 2, 1000.00, 'Pending', 'Sample work order', 1071, 'sample work order', NULL, '2021-01-02 01:06:32', '2021-01-02 01:06:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `work_order_logs`
--

CREATE TABLE `work_order_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_on` date DEFAULT NULL,
  `required_by` date DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meter` int(11) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parts_price` double DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `work_order_logs`
--

INSERT INTO `work_order_logs` (`id`, `created_on`, `required_by`, `vehicle_id`, `vendor_id`, `price`, `status`, `type`, `description`, `meter`, `note`, `created_at`, `updated_at`, `parts_price`) VALUES
(1, '2021-01-02', '2021-01-07', 2, 1, 2000.00, 'Completed', 'Created', 'Sample work order', 2398, 'sample work order', '2021-01-02 01:06:32', '2021-01-02 01:06:32', 0),
(2, '2021-01-02', '2021-01-07', 1, 2, 1000.00, 'Pending', 'Created', 'Sample work order', 1071, 'sample work order', '2021-01-02 01:06:32', '2021-01-02 01:06:32', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_customer_id_index` (`customer_id`);

--
-- Indeks untuk tabel `api_settings`
--
ALTER TABLE `api_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `api_settings_key_name_index` (`key_name`);

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_customer_id_driver_id_vehicle_id_user_id_index` (`customer_id`,`driver_id`,`vehicle_id`,`user_id`),
  ADD KEY `bookings_payment_status_index` (`payment`,`status`);

--
-- Indeks untuk tabel `bookings_meta`
--
ALTER TABLE `bookings_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_meta_booking_id_index` (`booking_id`),
  ADD KEY `bookings_meta_key_index` (`key`);

--
-- Indeks untuk tabel `booking_income`
--
ALTER TABLE `booking_income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_income_booking_id_income_id_index` (`booking_id`,`income_id`);

--
-- Indeks untuk tabel `booking_payments`
--
ALTER TABLE `booking_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `booking_quotation`
--
ALTER TABLE `booking_quotation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_quotation_customer_id_user_id_vehicle_id_driver_id_index` (`customer_id`,`user_id`,`vehicle_id`,`driver_id`),
  ADD KEY `booking_quotation_status_payment_index` (`status`,`payment`);

--
-- Indeks untuk tabel `company_services`
--
ALTER TABLE `company_services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer_location`
--
ALTER TABLE `customer_location`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `delivery_order`
--
ALTER TABLE `delivery_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pickup_bytransport_no_SO_index` (`no_SO`);

--
-- Indeks untuk tabel `depo`
--
ALTER TABLE `depo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `depo_name` (`name`);

--
-- Indeks untuk tabel `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `drivers_name_unique` (`name`);

--
-- Indeks untuk tabel `driver_logs`
--
ALTER TABLE `driver_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_logs_driver_id_vehicle_id_index` (`driver_id`,`vehicle_id`);

--
-- Indeks untuk tabel `driver_vehicle`
--
ALTER TABLE `driver_vehicle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_vehicle_driver_id_vehicle_id_index` (`driver_id`,`vehicle_id`);

--
-- Indeks untuk tabel `email_content`
--
ALTER TABLE `email_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_content_key_index` (`key`);

--
-- Indeks untuk tabel `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expense_vehicle_id_exp_id_user_id_expense_type_index` (`vehicle_id`,`exp_id`,`user_id`,`expense_type`),
  ADD KEY `expense_type_index` (`type`),
  ADD KEY `expense_date_index` (`date`);

--
-- Indeks untuk tabel `expense_cat`
--
ALTER TABLE `expense_cat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expense_cat_name_type_index` (`name`,`type`);

--
-- Indeks untuk tabel `fare_settings`
--
ALTER TABLE `fare_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fare_settings_key_name_index` (`key_name`),
  ADD KEY `fare_settings_type_id_index` (`type_id`);

--
-- Indeks untuk tabel `frontend`
--
ALTER TABLE `frontend`
  ADD PRIMARY KEY (`id`),
  ADD KEY `frontend_key_name_index` (`key_name`);

--
-- Indeks untuk tabel `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fuel_vehicle_id_user_id_index` (`vehicle_id`,`user_id`),
  ADD KEY `fuel_date_index` (`date`);

--
-- Indeks untuk tabel `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `income_vehicle_id_income_id_user_id_income_cat_index` (`vehicle_id`,`income_id`,`user_id`,`income_cat`),
  ADD KEY `income_date_index` (`date`);

--
-- Indeks untuk tabel `income_cat`
--
ALTER TABLE `income_cat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `income_cat_name_type_index` (`name`,`type`);

--
-- Indeks untuk tabel `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_vehicle_id_customer_id_index` (`vehicle_id`,`customer_id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`),
  ADD KEY `notifications_type_index` (`type`);

--
-- Indeks untuk tabel `orderplan`
--
ALTER TABLE `orderplan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderplan_customer_id_depo_id_product_id_index` (`customers_id`,`depo_id`,`product_id`);

--
-- Indeks untuk tabel `order_plan`
--
ALTER TABLE `order_plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_orders_vehicle_id_vendor_id_index` (`vehicle_id`,`vendor_id`),
  ADD KEY `work_orders_status_index` (`status`);

--
-- Indeks untuk tabel `order_plan_logs`
--
ALTER TABLE `order_plan_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_order_logs_vehicle_id_vendor_id_index` (`vehicle_id`,`vendor_id`),
  ADD KEY `work_order_logs_status_index` (`status`);

--
-- Indeks untuk tabel `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parts_category_id_user_id_availability_index` (`category_id`,`user_id`,`availability`);

--
-- Indeks untuk tabel `parts_category`
--
ALTER TABLE `parts_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `parts_used`
--
ALTER TABLE `parts_used`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parts_used_part_id_work_id_index` (`part_id`,`work_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `payment_settings`
--
ALTER TABLE `payment_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_settings_name_unique` (`name`);

--
-- Indeks untuk tabel `pickup_bytransport`
--
ALTER TABLE `pickup_bytransport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pickup_bytransport_no_PO_customers_id_warehouse_id_index` (`no_SO`,`customers_name`,`warehouse_name`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `push_notification`
--
ALTER TABLE `push_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `push_notification_user_id_index` (`user_id`),
  ADD KEY `push_notification_user_type_index` (`user_type`);

--
-- Indeks untuk tabel `reasons`
--
ALTER TABLE `reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_booking_id_driver_id_index` (`user_id`,`booking_id`,`driver_id`);

--
-- Indeks untuk tabel `service_items`
--
ALTER TABLE `service_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `service_reminder`
--
ALTER TABLE `service_reminder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_reminder_vehicle_id_service_id_index` (`vehicle_id`,`service_id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_name_unique` (`name`);

--
-- Indeks untuk tabel `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `trailers`
--
ALTER TABLE `trailers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transporter`
--
ALTER TABLE `transporter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transporter_name` (`name`);

--
-- Indeks untuk tabel `trucks`
--
ALTER TABLE `trucks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trucks_lic_exp_date_tax_exp_date_index` (`lic_exp_date`,`tax_exp_date`),
  ADD KEY `trucks_license_plate_index` (`license_plate`);

--
-- Indeks untuk tabel `truck_group`
--
ALTER TABLE `truck_group`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `truck_review`
--
ALTER TABLE `truck_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `truck_review_truck_id_user_id_index` (`truck_id`,`user_id`);

--
-- Indeks untuk tabel `truck_types`
--
ALTER TABLE `truck_types`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_user_type_index` (`user_type`);

--
-- Indeks untuk tabel `users_meta`
--
ALTER TABLE `users_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_meta_user_id_index` (`user_id`),
  ADD KEY `users_meta_key_index` (`key`);

--
-- Indeks untuk tabel `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicles_group_id_type_id_user_id_in_service_index` (`group_id`,`type_id`,`user_id`,`in_service`),
  ADD KEY `vehicles_lic_exp_date_reg_exp_date_index` (`lic_exp_date`,`reg_exp_date`),
  ADD KEY `vehicles_license_plate_index` (`license_plate`);

--
-- Indeks untuk tabel `vehicles_meta`
--
ALTER TABLE `vehicles_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicles_meta_vehicle_id_index` (`vehicle_id`),
  ADD KEY `vehicles_meta_key_index` (`key`);

--
-- Indeks untuk tabel `vehicle_group`
--
ALTER TABLE `vehicle_group`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vehicle_review`
--
ALTER TABLE `vehicle_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_review_vehicle_id_user_id_index` (`vehicle_id`,`user_id`);

--
-- Indeks untuk tabel `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendors_type_index` (`type`);

--
-- Indeks untuk tabel `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouse_name` (`name`);

--
-- Indeks untuk tabel `work_orders`
--
ALTER TABLE `work_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_orders_vehicle_id_vendor_id_index` (`vehicle_id`,`vendor_id`),
  ADD KEY `work_orders_status_index` (`status`);

--
-- Indeks untuk tabel `work_order_logs`
--
ALTER TABLE `work_order_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_order_logs_vehicle_id_vendor_id_index` (`vehicle_id`,`vendor_id`),
  ADD KEY `work_order_logs_status_index` (`status`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `api_settings`
--
ALTER TABLE `api_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `bookings_meta`
--
ALTER TABLE `bookings_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `booking_income`
--
ALTER TABLE `booking_income`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `booking_payments`
--
ALTER TABLE `booking_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `booking_quotation`
--
ALTER TABLE `booking_quotation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `company_services`
--
ALTER TABLE `company_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `customer_location`
--
ALTER TABLE `customer_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `delivery_order`
--
ALTER TABLE `delivery_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `depo`
--
ALTER TABLE `depo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `driver_logs`
--
ALTER TABLE `driver_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `driver_vehicle`
--
ALTER TABLE `driver_vehicle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `email_content`
--
ALTER TABLE `email_content`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `expense_cat`
--
ALTER TABLE `expense_cat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `fare_settings`
--
ALTER TABLE `fare_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT untuk tabel `frontend`
--
ALTER TABLE `frontend`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `fuel`
--
ALTER TABLE `fuel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `income`
--
ALTER TABLE `income`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `income_cat`
--
ALTER TABLE `income_cat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `orderplan`
--
ALTER TABLE `orderplan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `order_plan`
--
ALTER TABLE `order_plan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `order_plan_logs`
--
ALTER TABLE `order_plan_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `parts`
--
ALTER TABLE `parts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `parts_category`
--
ALTER TABLE `parts_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `parts_used`
--
ALTER TABLE `parts_used`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `payment_settings`
--
ALTER TABLE `payment_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pickup_bytransport`
--
ALTER TABLE `pickup_bytransport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `push_notification`
--
ALTER TABLE `push_notification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reasons`
--
ALTER TABLE `reasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `service_items`
--
ALTER TABLE `service_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `service_reminder`
--
ALTER TABLE `service_reminder`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `team`
--
ALTER TABLE `team`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `trailers`
--
ALTER TABLE `trailers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transporter`
--
ALTER TABLE `transporter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `trucks`
--
ALTER TABLE `trucks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `truck_group`
--
ALTER TABLE `truck_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `truck_review`
--
ALTER TABLE `truck_review`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `truck_types`
--
ALTER TABLE `truck_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users_meta`
--
ALTER TABLE `users_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `vehicles_meta`
--
ALTER TABLE `vehicles_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `vehicle_group`
--
ALTER TABLE `vehicle_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `vehicle_review`
--
ALTER TABLE `vehicle_review`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `work_orders`
--
ALTER TABLE `work_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `work_order_logs`
--
ALTER TABLE `work_order_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
