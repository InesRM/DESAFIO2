-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2022 at 10:31 PM
-- Server version: 8.0.31-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desafio2`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `humanos`
--

CREATE TABLE `humanos` (
  `id_humano` bigint UNSIGNED NOT NULL,
  `destino` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idDios` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cielo-infierno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `humanos`
--

INSERT INTO `humanos` (`id_humano`, `destino`, `idDios`, `cielo-infierno`, `created_at`, `updated_at`) VALUES
(1, '77', '1', NULL, NULL, NULL),
(2, '32', '1', NULL, NULL, NULL),
(3, '3', '1', NULL, NULL, NULL),
(4, '79', '3', NULL, NULL, NULL),
(10, '0', '4', NULL, NULL, '2022-12-14 11:06:57'),
(11, 'aaaaaa', '4', NULL, NULL, '2022-12-15 06:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `humano_prueba`
--

CREATE TABLE `humano_prueba` (
  `idHumano` bigint UNSIGNED NOT NULL,
  `idPrueba` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `humano_prueba`
--

INSERT INTO `humano_prueba` (`idHumano`, `idPrueba`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 9),
(2, 2),
(2, 3),
(2, 4),
(2, 6),
(3, 2),
(3, 4),
(3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(35, '2022_11_21_171746_create_humanos_table', 1),
(76, '2022_11_24_153905_create_roles_table', 2),
(77, '2022_11_24_153918_create_user_rol_table', 2),
(82, '2022_11_23_175157_create_humanos_table', 3),
(98, '2014_10_12_000000_create_users_table', 4),
(99, '2014_10_12_100000_create_password_resets_table', 4),
(100, '2019_08_19_000000_create_failed_jobs_table', 4),
(101, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(102, '2022_11_23_085616_create_humanos_table', 4),
(103, '2022_11_27_193032_create_dios_table', 4),
(104, '2022_11_29_205055_create_pruebas_table', 4),
(105, '2022_11_29_205119_create_pruebas_puntuales_table', 4),
(106, '2022_11_29_205133_create_pruebas_oraculo_table', 4),
(107, '2022_11_29_205204_create_pruebas_eleccion_table', 4),
(109, '2022_11_29_205245_create_pruebas_valoracion_table', 4),
(111, '2022_12_05_121405_create_humano_prueba_table', 5),
(112, '2022_11_29_205225_create_pruebas_resp_libre_table', 6);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 11, 'tokenUser', '0c4443314a5e523c51c839bb1f6b0f267696fe2366aaec20676463c663c1558b', '[\"humano\"]', NULL, NULL, '2022-12-14 17:59:17', '2022-12-14 17:59:17'),
(2, 'App\\Models\\User', 11, 'tokenUser', '508aefd96160ef8c0781dd5d5fec98ebdc132d5772bdec16ef18caaed690885d', '[\"humano\"]', NULL, NULL, '2022-12-14 18:01:56', '2022-12-14 18:01:56'),
(3, 'App\\Models\\User', 11, 'tokenUser', '716de320ec33994db79e9e575efaba1438860dc8705900b18b17c20e2be008a6', '[\"humano\"]', NULL, NULL, '2022-12-14 18:02:20', '2022-12-14 18:02:20'),
(4, 'App\\Models\\User', 11, 'tokenUser', 'de66c53075f8c4670e0c21cfd75a3116e92d56570f014099121074da551e8e21', '[\"humano\"]', NULL, NULL, '2022-12-14 18:37:30', '2022-12-14 18:37:30'),
(5, 'App\\Models\\User', 11, 'tokenUser', 'e59dace15ed362f2ee181ce3c13cc35e548b01e23dfc153b2453190e8eb674e4', '[\"humano\"]', NULL, NULL, '2022-12-14 18:38:29', '2022-12-14 18:38:29'),
(6, 'App\\Models\\User', 11, 'tokenUser', '6cc06b8eceab812edc177c65365014ed2c853b47ad264ad61dbcdb5663b32c91', '[\"humano\"]', NULL, NULL, '2022-12-14 18:40:55', '2022-12-14 18:40:55'),
(7, 'App\\Models\\User', 11, 'tokenUser', 'ad22f4c9c3ae72e2418371ecc7d9fb85595052df73311c93e3387a0d39fb1397', '[\"humano\"]', NULL, NULL, '2022-12-14 19:30:39', '2022-12-14 19:30:39'),
(8, 'App\\Models\\User', 11, 'tokenUser', 'e1ab4330fb7a27c96c831731ce53223d8e62363476ac95bf2659f41bc52cd882', '[\"humano\"]', NULL, NULL, '2022-12-14 19:37:36', '2022-12-14 19:37:36'),
(9, 'App\\Models\\User', 11, 'tokenUser', '2632a8d4e29eecb5b0d5470ab47b2cef6290d6e4776bcb504f0ae4fb7a4df069', '[\"humano\"]', NULL, NULL, '2022-12-15 06:41:50', '2022-12-15 06:41:50'),
(10, 'App\\Models\\User', 11, 'tokenUser', 'cfabd92e7f0e2beb8fe846f57da973214e19832d15e2460c8545fef31059fc61', '[\"humano\"]', NULL, NULL, '2022-12-15 06:43:01', '2022-12-15 06:43:01'),
(11, 'App\\Models\\User', 11, 'tokenUser', '7a76dde47912ea8923aafe1bf552a804f851bac3d9b11ebf650a5cb47ed2b373', '[\"humano\"]', NULL, NULL, '2022-12-15 06:43:06', '2022-12-15 06:43:06'),
(12, 'App\\Models\\User', 11, 'tokenUser', '853c9f1019f653ae98aac2df7e2c14b90fed97ac75f98b5718de8726a0e3adc1', '[\"humano\"]', NULL, NULL, '2022-12-15 06:43:07', '2022-12-15 06:43:07'),
(13, 'App\\Models\\User', 11, 'tokenUser', 'f18182024741e7c01c2060fae5238a987246a233a0e55f2a1563a93583c97779', '[\"humano\"]', NULL, NULL, '2022-12-15 06:43:26', '2022-12-15 06:43:26'),
(14, 'App\\Models\\User', 11, 'tokenUser', '12c54363aebbac5761cdb8abd7c12ffea136c0cc7f4d1efd278f6b78bf85e022', '[\"humano\"]', NULL, NULL, '2022-12-15 06:43:26', '2022-12-15 06:43:26'),
(15, 'App\\Models\\User', 11, 'tokenUser', '42df466f45cb06eb159c6b2ea8b4fd623c88d195999527cbdc62fd546698cc4a', '[\"humano\"]', NULL, NULL, '2022-12-15 06:43:27', '2022-12-15 06:43:27'),
(16, 'App\\Models\\User', 11, 'tokenUser', 'e04428e9ba1c6b6b2769c7b2368f43e656f4c3284fa184a4ad8a08c0e644a63b', '[\"humano\"]', NULL, NULL, '2022-12-15 06:43:27', '2022-12-15 06:43:27'),
(17, 'App\\Models\\User', 11, 'tokenUser', '51b5b51c2b9e1cecd6c9b37547fdede41a19d8bada57dbf77a645da0ad538290', '[\"humano\"]', NULL, NULL, '2022-12-15 06:45:13', '2022-12-15 06:45:13'),
(18, 'App\\Models\\User', 11, 'tokenUser', '18a0cdf9b79fd4cfb9e89fdd2ab36fcb4b4f27a4caf93d6b9b200dbb17c36ae2', '[\"humano\"]', NULL, NULL, '2022-12-15 07:01:55', '2022-12-15 07:01:55'),
(19, 'App\\Models\\User', 11, 'tokenUser', '3a953351f47e20bf9edfe3d127f98f395a1c0d0b8d8cc16189ca97e02744592c', '[\"humano\"]', NULL, NULL, '2022-12-15 07:01:55', '2022-12-15 07:01:55'),
(20, 'App\\Models\\User', 11, 'tokenUser', '9275facf02e47996e89da91ef572033b53e3252d8124626f691bbdb5594e7a2a', '[\"humano\"]', NULL, NULL, '2022-12-15 07:01:55', '2022-12-15 07:01:55'),
(21, 'App\\Models\\User', 11, 'tokenUser', 'cae8eef37b00a112e4be409591cc1c9fa28a48875afa4df62e0d33f0d376a7ed', '[\"humano\"]', NULL, NULL, '2022-12-15 07:01:55', '2022-12-15 07:01:55'),
(22, 'App\\Models\\User', 11, 'tokenUser', '2a3d1691b3bda36746e49d67a04137741d4dd510242fc61cc825944be0741640', '[\"humano\"]', NULL, NULL, '2022-12-15 07:11:41', '2022-12-15 07:11:41'),
(23, 'App\\Models\\User', 11, 'tokenUser', '0d111a0525052534a14dd99852ac4ea4654ebe0c81c69c7cda3e2532e0c6528e', '[\"humano\"]', NULL, NULL, '2022-12-15 07:11:41', '2022-12-15 07:11:41'),
(24, 'App\\Models\\User', 11, 'tokenUser', 'fe2a8d9ba1388636b673f14adbffc9bb8d290f299540c98acaf95a76efbbc5b8', '[\"humano\"]', NULL, NULL, '2022-12-15 07:11:41', '2022-12-15 07:11:41'),
(25, 'App\\Models\\User', 11, 'tokenUser', '430bfd901730b5eecc0138d3eb8e5b6cd912d116223c1eace28579cdb9d55b64', '[\"humano\"]', NULL, NULL, '2022-12-15 07:11:42', '2022-12-15 07:11:42'),
(26, 'App\\Models\\User', 11, 'tokenUser', '505cf382d25f201254ea7daafcefabd65067748875e4508a8c996193d48bad3c', '[\"humano\"]', NULL, NULL, '2022-12-15 07:11:42', '2022-12-15 07:11:42'),
(27, 'App\\Models\\User', 11, 'tokenUser', 'f7337adbd98211f13fe7145796f0b8f374d743df7a917da6bd099e6c106166a8', '[\"humano\"]', NULL, NULL, '2022-12-15 07:11:42', '2022-12-15 07:11:42'),
(28, 'App\\Models\\User', 11, 'tokenUser', '1dac70e49e1c584a9e1efd6fdede3cb7c6e79eb135b46ef8bc8c5cc3a0223b3a', '[\"humano\"]', NULL, NULL, '2022-12-15 07:11:42', '2022-12-15 07:11:42'),
(29, 'App\\Models\\User', 11, 'tokenUser', 'd00a986c95f35efe617fefbbdbbbdd4751b85c769d8340ce341125d9db3be3d8', '[\"humano\"]', NULL, NULL, '2022-12-15 07:11:42', '2022-12-15 07:11:42'),
(30, 'App\\Models\\User', 11, 'tokenUser', 'c6c0f2de81d1ae56a2a7ca3ec115d1751f1eb275e0a9d00c3c037a5b00c9bf07', '[\"humano\"]', NULL, NULL, '2022-12-15 08:14:44', '2022-12-15 08:14:44'),
(31, 'App\\Models\\User', 11, 'tokenUser', '18a7801e5433f1166b17e2b11f57172aa82af48413e7282d0dde30332865996f', '[\"humano\"]', NULL, NULL, '2022-12-15 08:15:25', '2022-12-15 08:15:25'),
(32, 'App\\Models\\User', 11, 'tokenUser', '3968aec46ff684429e98799460e5f0e878f371669bb7f7adcb4f5c09b1386124', '[\"humano\"]', NULL, NULL, '2022-12-15 08:16:27', '2022-12-15 08:16:27'),
(33, 'App\\Models\\User', 11, 'tokenUser', '571011e62fd7c5eadc63eec2c84acb46a8adf0d601fbf4ac9c30951dbe2f228a', '[\"humano\"]', NULL, NULL, '2022-12-15 08:29:05', '2022-12-15 08:29:05'),
(34, 'App\\Models\\User', 11, 'tokenUser', '413340c8fe1db50e7ca0c7bafa69fdb30f8e3456656bf03bcf299b8f392ed230', '[\"humano\"]', NULL, NULL, '2022-12-15 08:29:36', '2022-12-15 08:29:36'),
(35, 'App\\Models\\User', 11, 'tokenUser', '36fa0851a71b162cb5776782a137c50fd4a906af2da6244b72b9a30e3d29f48c', '[\"humano\"]', NULL, NULL, '2022-12-15 08:29:37', '2022-12-15 08:29:37'),
(36, 'App\\Models\\User', 11, 'tokenUser', 'd3b208e589e4d2c992f0c819cd11924c84d96db3a1dade606859b3a9d4478ae4', '[\"humano\"]', NULL, NULL, '2022-12-15 08:30:32', '2022-12-15 08:30:32'),
(37, 'App\\Models\\User', 11, 'tokenUser', '0ba8c704998db0de4822705ea9af209fe91670c68d8f36650383664abbc77d52', '[\"humano\"]', NULL, NULL, '2022-12-15 11:32:28', '2022-12-15 11:32:28'),
(38, 'App\\Models\\User', 11, 'tokenUser', 'f998abbdde2cd545d6fba3d5d5809cfb60bf57128fa221cde6ea45741e61dd72', '[\"humano\"]', NULL, NULL, '2022-12-15 11:32:48', '2022-12-15 11:32:48'),
(39, 'App\\Models\\User', 11, 'tokenUser', '3f5e60ae974f9875e20a11c9364425849f4fababc90c69bde3e5eae5d65931dd', '[\"humano\"]', NULL, NULL, '2022-12-15 11:32:48', '2022-12-15 11:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `pruebas`
--

CREATE TABLE `pruebas` (
  `id` bigint UNSIGNED NOT NULL,
  `destino` int NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pruebas`
--

INSERT INTO `pruebas` (`id`, `destino`, `titulo`, `created_at`, `updated_at`) VALUES
(2, 13, 'ps nada', '2022-11-30 08:31:44', '2022-11-30 08:31:44'),
(3, 13, 'asdasdf', '2022-11-30 12:04:53', '2022-11-30 12:04:53'),
(4, 13, 'ererer', '2022-11-30 12:05:55', '2022-11-30 12:05:55'),
(5, 13, 'ererer', '2022-11-30 12:09:06', '2022-11-30 12:09:06'),
(6, 13, 'ererer', '2022-11-30 12:09:19', '2022-11-30 12:09:19'),
(7, 13, 'ertreerttretre', '2022-11-30 12:09:43', '2022-11-30 12:09:43'),
(8, 43, 'asdfasd', '2022-12-01 14:59:12', '2022-12-01 14:59:12'),
(9, 1, 'aaaaaaaaaaaa aaaaaaaaaaa', '2022-12-01 15:00:13', '2022-12-01 15:00:13'),
(10, 3, 'AAAAAAAA AAAAAAAA AAAAAAA AAAAAAAAAAA AAAAAAA AAAAAAAA AAAAAAA', '2022-12-01 15:03:09', '2022-12-01 15:03:09'),
(11, 3, 'asdf', '2022-12-14 09:13:29', '2022-12-14 09:13:29'),
(12, 4, 'asdf asd', '2022-12-14 09:14:31', '2022-12-14 09:14:31'),
(13, 34, 'afseef e e e eeeee e e', '2022-12-14 09:15:06', '2022-12-14 09:15:06'),
(14, 3, 'hadfgsd', '2022-12-15 10:06:39', '2022-12-15 10:06:39'),
(15, 5, 'asdfasd', '2022-12-15 10:08:26', '2022-12-15 10:08:26'),
(16, 4, 'asdasdfasdfasdfdffffffffff', '2022-12-15 10:21:31', '2022-12-15 10:21:31'),
(17, 5, 'aaabbbbbbccccc', '2022-12-15 10:24:30', '2022-12-15 10:24:30'),
(18, 4, 'ffffffasdfasdasdfasdf', '2022-12-15 10:32:26', '2022-12-15 10:32:26'),
(19, 3, 'asdfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', '2022-12-15 10:38:00', '2022-12-15 10:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `pruebas_eleccion`
--

CREATE TABLE `pruebas_eleccion` (
  `id` bigint UNSIGNED NOT NULL,
  `respuestaCorrecta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `respuestaIncorrecta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atributo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pruebas_eleccion`
--

INSERT INTO `pruebas_eleccion` (`id`, `respuestaCorrecta`, `respuestaIncorrecta`, `atributo`, `created_at`, `updated_at`) VALUES
(2, 'asdf', 'fefsesef', 'nobleza', '2022-11-30 08:31:44', '2022-11-30 08:31:44'),
(3, 'aaa', 'xsxd', 'sabiduria', '2022-11-30 12:04:53', '2022-11-30 12:04:53'),
(4, 'asedrzxcxf', 'vvvvvvvvv', 'audacia', '2022-11-30 12:05:55', '2022-11-30 12:05:55'),
(8, 'ase', 'asdf', 'maldad', '2022-12-01 14:59:12', '2022-12-01 14:59:12'),
(9, 'a', 'a', 'audacia', '2022-12-01 15:00:13', '2022-12-01 15:00:13'),
(14, 'asdf', 'asd', 'virutd', '2022-12-15 10:06:39', '2022-12-15 10:06:39'),
(16, 'asdf', 'asdf', 'virutd', '2022-12-15 10:21:31', '2022-12-15 10:21:31'),
(17, 'asd', 'cccc', 'nobleza', '2022-12-15 10:24:30', '2022-12-15 10:24:30'),
(18, 'adsf', 'fds', 'virutd', '2022-12-15 10:32:26', '2022-12-15 10:32:26'),
(19, 'f', 'e', 'audacia', '2022-12-15 10:38:00', '2022-12-15 10:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `pruebas_oraculo`
--

CREATE TABLE `pruebas_oraculo` (
  `id` bigint UNSIGNED NOT NULL,
  `pregunta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pruebas_oraculo`
--

INSERT INTO `pruebas_oraculo` (`id`, `pregunta`, `created_at`, `updated_at`) VALUES
(2, 'aaaaaaaa', '2022-11-30 08:31:44', '2022-11-30 08:31:44'),
(3, 'referef', '2022-11-30 12:04:53', '2022-11-30 12:04:53'),
(4, 'asdfasevdxc', '2022-11-30 12:05:55', '2022-11-30 12:05:55'),
(8, 'asdfasdf', '2022-12-01 14:59:12', '2022-12-01 14:59:12'),
(9, 'aaaaaaaaaaaaaaaaaaaaaaaaaa', '2022-12-01 15:00:13', '2022-12-01 15:00:13'),
(11, 'fae', '2022-12-14 09:13:29', '2022-12-14 09:13:29'),
(12, 'asdf asd fasd', '2022-12-14 09:14:31', '2022-12-14 09:14:31'),
(13, 'e wefwe fwe fwef e e  e e', '2022-12-14 09:15:06', '2022-12-14 09:15:06'),
(14, 'asdfasdf', '2022-12-15 10:06:39', '2022-12-15 10:06:39'),
(16, 'asdf', '2022-12-15 10:21:31', '2022-12-15 10:21:31'),
(17, 'aaaaaaa x e', '2022-12-15 10:24:30', '2022-12-15 10:24:30'),
(18, 'asdf', '2022-12-15 10:32:26', '2022-12-15 10:32:26'),
(19, 'fefe', '2022-12-15 10:38:00', '2022-12-15 10:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `pruebas_puntuales`
--

CREATE TABLE `pruebas_puntuales` (
  `id` bigint UNSIGNED NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `porcentaje` int NOT NULL,
  `atributo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pruebas_puntuales`
--

INSERT INTO `pruebas_puntuales` (`id`, `descripcion`, `porcentaje`, `atributo`, `created_at`, `updated_at`) VALUES
(6, 'asdfasevdxc', 34, 'audacia', '2022-11-30 12:09:19', '2022-11-30 12:09:19'),
(7, 'retrretttttretttttttttttretertert', 36, 'maldad', '2022-11-30 12:09:43', '2022-11-30 12:09:43'),
(10, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 34, 'nobleza', '2022-12-01 15:03:09', '2022-12-01 15:03:09'),
(15, 'asdfasdffas', 34, 'virutd', '2022-12-15 10:08:26', '2022-12-15 10:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `pruebas_resp_libre`
--

CREATE TABLE `pruebas_resp_libre` (
  `id` bigint UNSIGNED NOT NULL,
  `porcentaje` int NOT NULL,
  `palabras_clave` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pruebas_resp_libre`
--

INSERT INTO `pruebas_resp_libre` (`id`, `porcentaje`, `palabras_clave`, `created_at`, `updated_at`) VALUES
(11, 3, 'asdf asdf asvsfcasd f f saxvs', '2022-12-14 09:13:29', '2022-12-14 09:13:29'),
(12, 64, 'a sdf sad asd f', '2022-12-14 09:14:31', '2022-12-14 09:14:31'),
(13, 34, 'e e e e er wrwr er e', '2022-12-14 09:15:06', '2022-12-14 09:15:06');

-- --------------------------------------------------------

--
-- Table structure for table `pruebas_valoracion`
--

CREATE TABLE `pruebas_valoracion` (
  `id` bigint UNSIGNED NOT NULL,
  `respuesta` int NOT NULL,
  `atributo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` enum('dios','humano','hades') COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `sabiduria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nobleza` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `virtud` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maldad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audacia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `rol`, `activo`, `sabiduria`, `nobleza`, `virtud`, `maldad`, `audacia`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'asdffda', 'asdf', NULL, '$2y$10$K3/He6R42Wud8D.sCKtQvux7lHr41JbTYHfM3YNLnky5jDZpIYcpW', 'dios', 1, '5', '5', '1', '4', '1', NULL, NULL, '2022-12-02 09:01:33'),
(2, 'aaaaaaaaa', 'asdfasdf', NULL, 'asdf', 'dios', 1, '5', '3', '4', '2', '3', NULL, NULL, NULL),
(3, 'xxxxxxxxxxxxxxxxx', 'retrererer', NULL, 'asdfsd', 'dios', 1, '3', '3', '4', '5', '3', NULL, NULL, NULL),
(4, 'rrrrrrrrrrrrrr', 'asdase', NULL, 'sad', 'dios', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'asdfasdfasdfasdfasdf', 'asdfwvdsv sdxv sd ', NULL, 'a', 'humano', 1, '2', '1', '3', '2', '1', NULL, NULL, '2022-12-14 11:06:57'),
(11, 'aaaaaa', 'aaaaa@aaaa.com', NULL, '$2y$10$dPf3O4iQhqnzZhWJ..3rN.C.YDec42S3/6C.gY9x2uAIUR4masQ8q', 'humano', 1, '1', '2', '3', '3', '4', NULL, NULL, '2022-12-15 06:59:05'),
(12, 'asdf', 'marioferestevez@gmail.com', NULL, '$2y$10$Wd4lceS3QpGNe9D/rFvhOOpKkXPJfT8mARZSQ1k5HXRB6PAs6ziye', 'dios', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-15 07:34:54', '2022-12-15 07:34:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `humanos`
--
ALTER TABLE `humanos`
  ADD PRIMARY KEY (`id_humano`);

--
-- Indexes for table `humano_prueba`
--
ALTER TABLE `humano_prueba`
  ADD PRIMARY KEY (`idHumano`,`idPrueba`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pruebas`
--
ALTER TABLE `pruebas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pruebas_eleccion`
--
ALTER TABLE `pruebas_eleccion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pruebas_oraculo`
--
ALTER TABLE `pruebas_oraculo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pruebas_puntuales`
--
ALTER TABLE `pruebas_puntuales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pruebas_resp_libre`
--
ALTER TABLE `pruebas_resp_libre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pruebas_valoracion`
--
ALTER TABLE `pruebas_valoracion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `pruebas`
--
ALTER TABLE `pruebas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
