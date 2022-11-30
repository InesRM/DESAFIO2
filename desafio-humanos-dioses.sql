-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2022 a las 19:05:27
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `desafio-humanos-dioses`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `humanos`
--

CREATE TABLE `humanos` (
  `id_humano` int(3) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destino` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dios_protector` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cielo-infierno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `humanos`
--

INSERT INTO `humanos` (`id_humano`, `name`, `destino`, `dios_protector`, `cielo-infierno`, `created_at`, `updated_at`) VALUES
(1, 'Khattarikolau', '0', 'Zeus', '', '2022-11-27 20:49:36', '2022-11-27 20:49:36'),
(2, 'Mariopoulou', '0', 'Poseidon', '', '2022-11-27 20:49:36', '2022-11-27 20:49:36'),
(3, 'Sofia', '0', 'Zeus', '', '2022-11-27 20:49:36', '2022-11-27 20:49:36'),
(4, 'Aliciciakas', '0', 'Poseidon', '', '2022-11-27 20:49:36', '2022-11-27 20:49:36'),
(5, 'Isabelakis', '0', 'Hades', '', '2022-11-27 20:49:36', '2022-11-27 20:49:36'),
(6, 'Jaimeniadis', '0', 'Hades', '', '2022-11-27 20:49:36', '2022-11-27 20:49:36'),
(7, 'Miriamtheka', '0', 'Poseidon', '', '2022-11-27 20:49:36', '2022-11-27 20:49:36'),
(8, 'Inesiakas', '0', 'Zeus', '', '2022-11-27 20:49:36', '2022-11-27 20:49:36'),
(9, 'Manuelinidis', '0', 'Zeus', '', '2022-11-27 20:49:36', '2022-11-27 20:49:36'),
(10, 'Alejandrakis', '0', 'Zeus', '', '2022-11-27 20:49:36', '2022-11-27 20:49:36'),
(695824523, 'Manola', NULL, NULL, NULL, '2022-11-28 16:42:10', '2022-11-28 16:42:10'),
(695824524, 'Pepe', NULL, NULL, NULL, '2022-11-28 16:45:40', '2022-11-28 16:45:40'),
(695824525, 'Rosario', NULL, NULL, NULL, '2022-11-28 16:47:21', '2022-11-28 16:47:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_23_085616_create_humano_table', 1),
(6, '2022_11_27_193032_create_dios_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 12, 'tokenHades', '210e5cd1becd26e4af6411e649ed79008f75c6f53dcc9b224fb1c3634aad0431', '[\"hades\"]', '2022-11-28 15:04:37', NULL, '2022-11-27 21:02:18', '2022-11-28 15:04:37'),
(2, 'App\\Models\\User', 5, 'tokenUser', '67a789903695bd1ee204f37c4137a7b86891ed5bee06b924d0c1b4d5abc44c41', '[\"humano\"]', NULL, NULL, '2022-11-28 15:08:52', '2022-11-28 15:08:52'),
(3, 'App\\Models\\User', 20, 'nuevo', 'c3c2a11af1ca5cec1dc03b69e55d6600a33934ea4298dae490306683ccb0d295', '[\"User\"]', NULL, NULL, '2022-11-28 15:28:06', '2022-11-28 15:28:06'),
(4, 'App\\Models\\User', 21, 'nuevo', '5df66d8c1329cce9da7678789144c0a354fd36c6237c893e5c35ba39c83c5a58', '[\"User\"]', NULL, NULL, '2022-11-28 15:30:34', '2022-11-28 15:30:34'),
(5, 'App\\Models\\User', 22, 'nuevo', '0ae774b257299c65b9c17617426f97fc4b6cfc9baa3aa5435ede847712e25130', '[\"User\"]', NULL, NULL, '2022-11-28 16:28:40', '2022-11-28 16:28:40'),
(6, 'App\\Models\\User', 23, 'nuevo', '94580772ba5cd26ccb0c4e3fa052837a58c428d269cd34c98e91c3722f08cd74', '[\"User\"]', NULL, NULL, '2022-11-28 16:40:27', '2022-11-28 16:40:27'),
(7, 'App\\Models\\User', 24, 'nuevo', '2de63c1a536e524291ec62817f2faf526e4d001ea47ef18d717e3b60ab0d1576', '[\"User\"]', NULL, NULL, '2022-11-28 16:42:10', '2022-11-28 16:42:10'),
(8, 'App\\Models\\User', 25, 'nuevo', '833b4cbcca5443ce3ac3f11db9b749769bfe86b1941bc98511740087b634f504', '[\"User\"]', NULL, NULL, '2022-11-28 16:45:40', '2022-11-28 16:45:40'),
(9, 'App\\Models\\User', 27, 'nuevo', '9b5447c43c8702e928d3a8f93d22a5d7853769e05f795faf62dbb9b5e7ba02eb', '[\"User\"]', NULL, NULL, '2022-11-28 16:47:21', '2022-11-28 16:47:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` enum('dios','humano','hades') COLLATE utf8mb4_unicode_ci DEFAULT 'humano',
  `activo` tinyint(1) DEFAULT 0,
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
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `rol`, `activo`, `sabiduria`, `nobleza`, `virtud`, `maldad`, `audacia`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Khattarikolau', 'annabel36@example.org', '2022-11-27 20:17:51', '$2y$10$L9l5hdKNvzoLrjRk3XMjiOuCekYT98NYGxy.PhJyNlc8MVdyAzgmW', 'humano', 1, '5', '2', '5', '1', '1', 'iccNhdplhp', '2022-11-27 20:17:52', '2022-11-27 20:17:52'),
(2, 'Mariopoulou', 'zschroeder@example.net', '2022-11-27 20:17:51', '$2y$10$FavKG/a/upaUGiYpylYQ3OyzE8YQgZ1xnDb7L7CyyIIKTdfMdkZmW', 'humano', 1, '3', '2', '4', '4', '4', 'nhcNnsyxlG', '2022-11-27 20:17:52', '2022-11-27 20:17:52'),
(3, 'Sofia', 'jwisoky@example.net', '2022-11-27 20:17:51', '$2y$10$pnozJCO56iVpiJns9ATr.OnKuqdc79YpaAKRAyYuVEAg3.gR.Vd9K', 'humano', 1, '4', '5', '4', '2', '2', 'la6ZMXZNIt', '2022-11-27 20:17:52', '2022-11-27 20:17:52'),
(4, 'Aliciciakas', 'bhoeger@example.net', '2022-11-27 20:17:51', '$2y$10$l0rFcUHHcnDKp7pYHRTOOup3UwmBbUetvd6cIvRCyiRpFHJqDh1o.', 'humano', 1, '2', '3', '1', '5', '4', 'd6hcQHHw1j', '2022-11-27 20:17:52', '2022-11-27 20:17:52'),
(5, 'Isabelakis', 'zena01@example.net', '2022-11-27 20:17:51', '$2y$10$qUX.hmBlz1/eOyMtdJ5S1eydUwSeI0kA9y8aVP/ohCv8pTBfCM0pm', 'humano', 1, '4', '1', '1', '4', '1', 'D7VTavy92v', '2022-11-27 20:17:52', '2022-11-27 20:17:52'),
(6, 'Jaimeniadis', 'carlee16@example.net', '2022-11-27 20:17:51', '$2y$10$sO0N21j6sjVnzs0IuQm9P.eGxOqdGZqwKJtiFatjSKwT7UJdAFl0S', 'humano', 1, '1', '5', '1', '2', '4', 'bDyoUTLUIU', '2022-11-27 20:17:52', '2022-11-27 20:17:52'),
(7, 'Miriamtheka', 'joan54@example.com', '2022-11-27 20:17:52', '$2y$10$Q5xowwcmgFZHO3i8SGEQkOmi9O0J4sSYZy/AX6gu69lVwpnRkeJM.', 'humano', 1, '2', '5', '5', '3', '5', 'ndH4U8HSFU', '2022-11-27 20:17:52', '2022-11-27 20:17:52'),
(8, 'Inesiakas', 'runte.valentine@example.net', '2022-11-27 20:17:52', '$2y$10$BuyIyX.LGsYlOB6XG0U/tuTkqrZ.vvPlZhCp1xciao.FWubIsCbdG', 'humano', 1, '5', '4', '5', '3', '2', 'r8JJgy6oha', '2022-11-27 20:17:52', '2022-11-27 20:17:52'),
(9, 'Manuelinidis', 'ritchie.santina@example.com', '2022-11-27 20:17:52', '$2y$10$IUY0Q5cjEn0RMNFJBdfQxOif/7uHN65U/hYtiNRvVi5.N9jsOcb32', 'humano', 1, '2', '4', '5', '2', '1', 'yqQKGvgGBe', '2022-11-27 20:17:52', '2022-11-27 20:17:52'),
(10, 'Alejandrakis', 'ramon27@example.org', '2022-11-27 20:17:52', '$2y$10$dMZUFB3n/s5wohL7pILFJOc91/ndXJIQzfUb0ZP9H1fugm5pNEtNy', 'humano', 1, '2', '5', '4', '5', '1', 'TNoBgGzhFi', '2022-11-27 20:17:52', '2022-11-27 20:17:52'),
(12, 'Hades', 'arice@example.net', '2022-11-27 20:25:46', '$2y$10$fMNwigxf69QD9N8/pHRecus1T/bfK8KLwb45czCT6dUOhjiHrq1vm', 'hades', 1, '5', '5', '5', '5', '5', 'AzJ5JEchEW', '2022-11-27 20:25:46', '2022-11-27 20:25:46'),
(13, 'Poseidon', 'fadel.chadd@example.com', '2022-11-27 20:25:46', '$2y$10$ml9gwILCAAQrPJUK0rW0ZuogQAdK038DnDrOH.48zZg20y66gUKA.', 'dios', 1, '5', '5', '2', '1', '1', '1nk228beDT', '2022-11-27 20:25:46', '2022-11-27 20:25:46'),
(14, 'Zeus', 'liliane.botsford@example.net', '2022-11-27 20:25:46', '$2y$10$xnRSJyGKUwjeOI8GGef46eeCLuHVJT8mlro8.R6O.f7XW1PyIRZ.q', 'dios', 1, '3', '1', '1', '1', '5', 'tI7oxXwXoX', '2022-11-27 20:25:46', '2022-11-27 20:25:46'),
(24, 'Manola', 'manola@micrroeo.es', NULL, '$2y$10$tWsmKYdGgGBu1JnPCMhu8.ghIpIYiwTBZHe7wEQFcRE9TWbPVOlHS', 'humano', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-28 16:42:10', '2022-11-28 16:42:10'),
(25, 'Pepe', 'pepe@correo.es', NULL, '$2y$10$pH6D1akmLu/JoWuESszxx.EAuyneOhUqnJ97Vq2BaR0SFDuur4PBq', 'humano', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-28 16:45:40', '2022-11-28 16:45:40'),
(27, 'Rosario', 'manolita@micrroe.es', NULL, '$2y$10$XoVHCH43u6YQ.fBQNB9qvuxC5mNIGE/gvY8rl88Fdjp6hkkA.rYQu', 'humano', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-28 16:47:21', '2022-11-28 16:47:21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `humanos`
--
ALTER TABLE `humanos`
  ADD PRIMARY KEY (`id_humano`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `humanos`
--
ALTER TABLE `humanos`
  MODIFY `id_humano` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=695824526;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
