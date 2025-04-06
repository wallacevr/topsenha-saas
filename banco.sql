-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura para tabela topsenha2.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela topsenha2.failed_jobs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela topsenha2.filas
DROP TABLE IF EXISTS `filas`;
CREATE TABLE IF NOT EXISTS `filas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefixo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `campos` json DEFAULT NULL,
  `proxima_fila_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `filas_proxima_fila_id_foreign` (`proxima_fila_id`),
  CONSTRAINT `filas_proxima_fila_id_foreign` FOREIGN KEY (`proxima_fila_id`) REFERENCES `filas` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela topsenha2.filas: ~2 rows (aproximadamente)
INSERT INTO `filas` (`id`, `nome`, `prefixo`, `campos`, `proxima_fila_id`, `created_at`, `updated_at`) VALUES
	(9, 'Retirada', 'RET', '"[\\"Placa\\",\\"Renavam\\"]"', NULL, '2025-03-24 01:45:26', '2025-03-24 01:45:26'),
	(10, 'Pagamento', 'PAG', '"[\\"Placa\\",\\"Renavam\\"]"', 9, '2025-03-24 01:45:52', '2025-03-24 01:45:52'),
	(12, 'Atendimento', 'ATE', '"[\\"Placa\\",\\"Renavam\\"]"', 10, '2025-03-24 02:06:11', '2025-03-24 02:06:11');

-- Copiando estrutura para tabela topsenha2.guiches
DROP TABLE IF EXISTS `guiches`;
CREATE TABLE IF NOT EXISTS `guiches` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela topsenha2.guiches: ~2 rows (aproximadamente)
INSERT INTO `guiches` (`id`, `nome`, `created_at`, `updated_at`) VALUES
	(3, 'Guiche 1', '2025-03-24 02:27:24', '2025-03-24 02:27:24'),
	(5, 'Guichê 2', '2025-03-24 04:00:52', '2025-03-24 05:06:02');

-- Copiando estrutura para tabela topsenha2.guiche_fila
DROP TABLE IF EXISTS `guiche_fila`;
CREATE TABLE IF NOT EXISTS `guiche_fila` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `guiche_id` bigint unsigned NOT NULL,
  `fila_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `guiche_fila_guiche_id_foreign` (`guiche_id`),
  KEY `guiche_fila_fila_id_foreign` (`fila_id`),
  CONSTRAINT `guiche_fila_fila_id_foreign` FOREIGN KEY (`fila_id`) REFERENCES `filas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `guiche_fila_guiche_id_foreign` FOREIGN KEY (`guiche_id`) REFERENCES `guiches` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela topsenha2.guiche_fila: ~3 rows (aproximadamente)
INSERT INTO `guiche_fila` (`id`, `guiche_id`, `fila_id`, `created_at`, `updated_at`) VALUES
	(2, 3, 12, NULL, NULL),
	(5, 5, 10, NULL, NULL),
	(6, 5, 9, NULL, NULL),
	(7, 5, 12, NULL, NULL);

-- Copiando estrutura para tabela topsenha2.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela topsenha2.migrations: ~0 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2020_05_21_100000_create_teams_table', 1),
	(7, '2020_05_21_200000_create_team_user_table', 1),
	(8, '2020_05_21_300000_create_team_invitations_table', 1),
	(9, '2025_03_20_011930_create_sessions_table', 1),
	(10, '2025_03_20_022615_create_guiches_table', 2),
	(11, '2025_03_20_022616_create_filas_table', 2),
	(12, '2025_03_20_022617_create_senhas_table', 2),
	(13, '2025_03_20_022618_create_guiche_fila_table', 2);

-- Copiando estrutura para tabela topsenha2.password_reset_tokens
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela topsenha2.password_reset_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela topsenha2.personal_access_tokens
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela topsenha2.personal_access_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela topsenha2.senhas
DROP TABLE IF EXISTS `senhas`;
CREATE TABLE IF NOT EXISTS `senhas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fila_id` bigint unsigned NOT NULL,
  `campos` json DEFAULT NULL,
  `guiche_id` bigint unsigned DEFAULT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prioritaria` tinyint(1) NOT NULL DEFAULT '0',
  `status` enum('pendente','chamado','atendido') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pendente',
  `inicio_atendimento` timestamp NULL DEFAULT NULL,
  `fim_atendimento` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `senhas_fila_id_foreign` (`fila_id`),
  KEY `senhas_guiche_id_foreign` (`guiche_id`),
  CONSTRAINT `senhas_fila_id_foreign` FOREIGN KEY (`fila_id`) REFERENCES `filas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `senhas_guiche_id_foreign` FOREIGN KEY (`guiche_id`) REFERENCES `guiches` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela topsenha2.senhas: ~69 rows (aproximadamente)
INSERT INTO `senhas` (`id`, `fila_id`, `campos`, `guiche_id`, `senha`, `prioritaria`, `status`, `inicio_atendimento`, `fim_atendimento`, `created_at`, `updated_at`) VALUES
	(1, 12, NULL, 3, 'ATE-001', 0, 'atendido', '2025-03-24 06:47:03', '2025-03-24 06:50:27', '2025-03-24 06:46:06', '2025-03-24 06:50:27'),
	(2, 12, NULL, 3, 'ATE-002', 0, 'atendido', '2025-03-24 06:50:27', '2025-03-24 06:50:37', '2025-03-24 06:46:09', '2025-03-24 06:50:37'),
	(3, 12, NULL, 3, 'ATE-003', 0, 'atendido', '2025-03-24 06:50:43', '2025-03-24 06:50:52', '2025-03-24 06:46:12', '2025-03-24 06:50:52'),
	(4, 12, NULL, 3, 'ATE-004', 0, 'atendido', '2025-03-24 06:50:55', '2025-03-24 07:00:00', '2025-03-24 06:46:37', '2025-03-24 07:00:00'),
	(5, 10, NULL, 5, 'ATE-001', 0, 'atendido', '2025-03-24 06:51:09', '2025-03-24 06:51:19', '2025-03-24 06:50:27', '2025-03-24 06:51:19'),
	(6, 10, NULL, 5, 'ATE-002', 0, 'atendido', '2025-03-24 06:51:19', '2025-03-24 06:51:26', '2025-03-24 06:50:37', '2025-03-24 06:51:26'),
	(7, 10, NULL, 5, 'ATE-003', 0, 'atendido', '2025-03-24 06:51:26', '2025-03-24 06:51:30', '2025-03-24 06:50:52', '2025-03-24 06:51:30'),
	(8, 9, NULL, 5, 'ATE-001', 0, 'atendido', '2025-03-25 05:59:24', '2025-03-25 05:59:38', '2025-03-24 06:51:19', '2025-03-25 05:59:38'),
	(9, 9, NULL, 5, 'ATE-002', 0, 'atendido', '2025-03-25 05:59:38', '2025-03-25 05:59:52', '2025-03-24 06:51:26', '2025-03-25 05:59:52'),
	(10, 9, NULL, 5, 'ATE-003', 0, 'atendido', '2025-03-25 05:59:52', '2025-03-25 06:04:48', '2025-03-24 06:51:30', '2025-03-25 06:04:48'),
	(11, 10, NULL, 5, 'ATE-004', 0, 'atendido', '2025-03-25 00:35:56', '2025-03-25 03:34:02', '2025-03-24 07:00:00', '2025-03-25 03:34:02'),
	(12, 12, NULL, 3, 'ATE-005', 0, 'atendido', '2025-03-24 07:00:35', '2025-03-24 07:01:55', '2025-03-24 07:00:15', '2025-03-24 07:01:55'),
	(13, 10, NULL, 5, 'ATE-005', 0, 'atendido', '2025-03-25 03:34:02', '2025-03-25 05:08:25', '2025-03-24 07:01:55', '2025-03-25 05:08:25'),
	(14, 12, NULL, 3, 'ATE-006', 0, 'atendido', '2025-03-24 07:02:28', '2025-03-24 07:05:28', '2025-03-24 07:02:03', '2025-03-24 07:05:28'),
	(15, 12, NULL, 3, 'ATE-007', 0, 'atendido', '2025-03-24 07:05:28', '2025-03-25 00:35:12', '2025-03-24 07:02:09', '2025-03-25 00:35:12'),
	(16, 10, NULL, 5, 'ATE-006', 0, 'atendido', '2025-03-25 05:08:25', '2025-03-25 05:57:16', '2025-03-24 07:05:28', '2025-03-25 05:57:16'),
	(17, 12, NULL, 3, 'ATE-008', 0, 'atendido', '2025-03-25 00:35:12', '2025-03-25 00:35:18', '2025-03-25 00:34:37', '2025-03-25 00:35:18'),
	(18, 12, NULL, 3, 'ATE-009', 0, 'chamado', '2025-03-25 00:35:18', NULL, '2025-03-25 00:34:45', '2025-03-25 00:35:18'),
	(19, 12, NULL, 5, 'ATE-010', 0, 'atendido', '2025-03-25 00:35:30', '2025-03-25 00:35:36', '2025-03-25 00:34:51', '2025-03-25 00:35:36'),
	(20, 10, NULL, 5, 'ATE-007', 0, 'atendido', '2025-03-25 05:57:16', '2025-03-25 05:57:37', '2025-03-25 00:35:12', '2025-03-25 05:57:37'),
	(21, 10, NULL, 5, 'ATE-008', 0, 'atendido', '2025-03-25 05:57:37', '2025-03-25 05:58:00', '2025-03-25 00:35:18', '2025-03-25 05:58:00'),
	(22, 10, NULL, 5, 'ATE-010', 0, 'atendido', '2025-03-25 05:58:00', '2025-03-25 05:59:16', '2025-03-25 00:35:36', '2025-03-25 05:59:16'),
	(23, 9, NULL, 5, 'ATE-004', 0, 'atendido', '2025-03-25 06:04:48', '2025-03-25 06:04:56', '2025-03-25 03:34:02', '2025-03-25 06:04:56'),
	(24, 9, NULL, 5, 'ATE-005', 0, 'atendido', '2025-03-25 06:04:56', '2025-03-25 06:07:18', '2025-03-25 05:08:25', '2025-03-25 06:07:18'),
	(25, 9, NULL, 5, 'ATE-006', 0, 'atendido', '2025-03-25 06:07:18', '2025-03-25 06:11:07', '2025-03-25 05:57:16', '2025-03-25 06:11:07'),
	(26, 9, NULL, 5, 'ATE-007', 0, 'atendido', '2025-03-25 06:11:07', '2025-03-25 06:11:19', '2025-03-25 05:57:37', '2025-03-25 06:11:19'),
	(27, 9, NULL, 5, 'ATE-008', 0, 'atendido', '2025-03-25 06:11:19', '2025-03-25 06:12:04', '2025-03-25 05:58:00', '2025-03-25 06:12:04'),
	(28, 9, NULL, 5, 'ATE-010', 0, 'atendido', '2025-03-25 06:12:04', '2025-03-25 06:12:28', '2025-03-25 05:59:16', '2025-03-25 06:12:28'),
	(29, 12, NULL, 5, 'ATE-001', 0, 'atendido', '2025-03-25 06:16:42', '2025-03-25 06:16:53', '2025-03-25 06:13:39', '2025-03-25 06:16:53'),
	(30, 12, NULL, 5, 'ATE-002', 0, 'atendido', '2025-03-25 06:16:53', '2025-03-25 06:17:41', '2025-03-25 06:13:43', '2025-03-25 06:17:41'),
	(31, 12, NULL, 5, 'ATE-003', 0, 'atendido', '2025-03-25 06:17:41', '2025-03-25 06:17:48', '2025-03-25 06:13:47', '2025-03-25 06:17:48'),
	(32, 12, NULL, 5, 'ATE-004', 0, 'atendido', '2025-03-25 06:17:48', '2025-03-25 06:32:49', '2025-03-25 06:13:51', '2025-03-25 06:32:49'),
	(33, 12, NULL, 5, 'ATE-005', 0, 'atendido', '2025-03-25 06:32:49', '2025-03-25 06:33:03', '2025-03-25 06:13:54', '2025-03-25 06:33:03'),
	(34, 12, NULL, 5, 'ATE-006', 0, 'atendido', '2025-03-25 06:33:03', '2025-03-25 06:34:00', '2025-03-25 06:13:59', '2025-03-25 06:34:00'),
	(35, 10, NULL, 5, 'ATE-001', 0, 'atendido', '2025-03-25 19:28:52', '2025-03-25 19:28:52', '2025-03-25 06:16:53', '2025-03-25 19:28:52'),
	(36, 10, NULL, 5, 'ATE-002', 0, 'atendido', '2025-03-25 19:28:52', '2025-03-25 19:28:52', '2025-03-25 06:17:41', '2025-03-25 19:28:52'),
	(37, 10, NULL, 5, 'ATE-003', 0, 'atendido', '2025-03-25 19:28:52', '2025-03-25 19:28:52', '2025-03-25 06:17:48', '2025-03-25 19:28:52'),
	(38, 10, NULL, 5, 'ATE-004', 0, 'atendido', '2025-03-25 19:28:52', '2025-03-25 19:28:52', '2025-03-25 06:32:49', '2025-03-25 19:28:52'),
	(39, 10, NULL, 5, 'ATE-005', 0, 'atendido', '2025-03-25 19:28:52', '2025-03-25 19:28:52', '2025-03-25 06:33:03', '2025-03-25 19:28:52'),
	(40, 10, NULL, 5, 'ATE-006', 0, 'atendido', '2025-03-25 19:28:52', '2025-03-25 19:28:52', '2025-03-25 06:34:00', '2025-03-25 19:28:52'),
	(41, 12, NULL, 5, 'ATE-007', 0, 'atendido', '2025-03-25 06:34:34', '2025-03-25 06:34:40', '2025-03-25 06:34:11', '2025-03-25 06:34:40'),
	(42, 12, NULL, 5, 'ATE-008', 0, 'atendido', '2025-03-25 06:34:40', '2025-03-25 06:34:45', '2025-03-25 06:34:15', '2025-03-25 06:34:45'),
	(43, 12, NULL, 5, 'ATE-009', 0, 'atendido', '2025-03-25 06:34:45', '2025-03-25 19:26:11', '2025-03-25 06:34:18', '2025-03-25 19:26:11'),
	(44, 12, NULL, 5, 'ATE-010', 0, 'atendido', '2025-03-25 19:26:11', '2025-03-25 19:26:31', '2025-03-25 06:34:22', '2025-03-25 19:26:31'),
	(45, 10, NULL, 5, 'ATE-007', 0, 'atendido', '2025-03-25 19:28:52', '2025-03-25 19:28:52', '2025-03-25 06:34:40', '2025-03-25 19:28:52'),
	(46, 10, NULL, 5, 'ATE-008', 0, 'atendido', '2025-03-25 19:28:52', '2025-03-25 19:28:52', '2025-03-25 06:34:45', '2025-03-25 19:28:52'),
	(47, 12, NULL, 5, 'ATE-011', 0, 'atendido', '2025-03-25 19:26:31', '2025-03-25 19:26:37', '2025-03-25 19:23:49', '2025-03-25 19:26:37'),
	(48, 12, NULL, 5, 'ATE-012', 0, 'atendido', '2025-03-25 19:26:37', '2025-03-25 19:26:43', '2025-03-25 19:23:56', '2025-03-25 19:26:43'),
	(49, 12, NULL, 5, 'ATE-013', 0, 'atendido', '2025-03-25 19:26:43', '2025-03-25 19:27:29', '2025-03-25 19:24:03', '2025-03-25 19:27:29'),
	(50, 12, NULL, 5, 'ATE-014', 0, 'atendido', '2025-03-25 19:27:29', '2025-03-25 19:28:52', '2025-03-25 19:24:11', '2025-03-25 19:28:52'),
	(51, 10, NULL, 5, 'ATE-009', 0, 'atendido', '2025-03-25 19:28:52', '2025-03-25 19:28:52', '2025-03-25 19:26:11', '2025-03-25 19:28:52'),
	(52, 10, NULL, 5, 'ATE-010', 0, 'atendido', '2025-03-25 19:28:52', '2025-03-25 19:28:52', '2025-03-25 19:26:31', '2025-03-25 19:28:52'),
	(53, 10, NULL, 5, 'ATE-011', 0, 'atendido', '2025-03-25 19:28:52', '2025-03-25 19:28:52', '2025-03-25 19:26:37', '2025-03-25 19:28:52'),
	(54, 10, NULL, 5, 'ATE-012', 0, 'atendido', '2025-03-25 19:28:52', '2025-03-25 19:28:52', '2025-03-25 19:26:43', '2025-03-25 19:28:52'),
	(55, 10, NULL, 5, 'ATE-013', 0, 'atendido', '2025-03-25 19:28:52', '2025-03-25 19:28:52', '2025-03-25 19:27:29', '2025-03-25 19:28:52'),
	(56, 10, NULL, 5, 'ATE-014', 0, 'atendido', '2025-03-25 19:28:52', '2025-03-25 19:29:06', '2025-03-25 19:28:52', '2025-03-25 19:29:06'),
	(57, 9, NULL, 5, 'ATE-001', 0, 'atendido', '2025-03-25 19:30:29', '2025-03-25 19:30:54', '2025-03-25 19:28:52', '2025-03-25 19:30:54'),
	(58, 9, NULL, 5, 'ATE-002', 0, 'chamado', '2025-03-25 19:30:54', NULL, '2025-03-25 19:28:52', '2025-03-25 19:30:54'),
	(59, 9, NULL, NULL, 'ATE-003', 0, 'pendente', NULL, NULL, '2025-03-25 19:28:52', '2025-03-25 19:28:52'),
	(60, 9, NULL, NULL, 'ATE-004', 0, 'pendente', NULL, NULL, '2025-03-25 19:28:52', '2025-03-25 19:28:52'),
	(61, 9, NULL, NULL, 'ATE-005', 0, 'pendente', NULL, NULL, '2025-03-25 19:28:52', '2025-03-25 19:28:52'),
	(62, 9, NULL, NULL, 'ATE-006', 0, 'pendente', NULL, NULL, '2025-03-25 19:28:52', '2025-03-25 19:28:52'),
	(63, 9, NULL, NULL, 'ATE-007', 0, 'pendente', NULL, NULL, '2025-03-25 19:28:52', '2025-03-25 19:28:52'),
	(64, 9, NULL, NULL, 'ATE-008', 0, 'pendente', NULL, NULL, '2025-03-25 19:28:52', '2025-03-25 19:28:52'),
	(65, 9, NULL, NULL, 'ATE-009', 0, 'pendente', NULL, NULL, '2025-03-25 19:28:52', '2025-03-25 19:28:52'),
	(66, 9, NULL, NULL, 'ATE-010', 0, 'pendente', NULL, NULL, '2025-03-25 19:28:52', '2025-03-25 19:28:52'),
	(67, 9, NULL, NULL, 'ATE-011', 0, 'pendente', NULL, NULL, '2025-03-25 19:28:52', '2025-03-25 19:28:52'),
	(68, 9, NULL, NULL, 'ATE-012', 0, 'pendente', NULL, NULL, '2025-03-25 19:28:52', '2025-03-25 19:28:52'),
	(69, 9, NULL, NULL, 'ATE-013', 0, 'pendente', NULL, NULL, '2025-03-25 19:28:52', '2025-03-25 19:28:52'),
	(70, 9, NULL, NULL, 'ATE-014', 0, 'pendente', NULL, NULL, '2025-03-25 19:29:06', '2025-03-25 19:29:06'),
	(71, 12, '{"0": "xxx-0000", "1": "101000100", "Placa": "", "Renavam": ""}', NULL, 'ATE-001', 0, 'pendente', NULL, NULL, '2025-03-26 06:35:12', '2025-03-26 06:35:12'),
	(72, 12, '{"Placa": "", "Renavam": ""}', NULL, 'ATE-002', 0, 'pendente', NULL, NULL, '2025-03-26 06:38:34', '2025-03-26 06:38:34'),
	(73, 12, '{"Placa": "", "Renavam": ""}', NULL, 'ATE-003', 0, 'pendente', NULL, NULL, '2025-03-27 02:06:16', '2025-03-27 02:06:16');

-- Copiando estrutura para tabela topsenha2.sessions
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela topsenha2.sessions: ~3 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('79QaZGr9eg4JlKGDvV5hhpyQ2w0AhZAY8Ql2MX8k', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiY3NvVDhwZkEzWmdvelM1OUlwOHRYdXR4cEM2bms1cFBTMTM5am5FRSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL3NlbmhhcyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvbG9naW4iO319', 1743044519),
	('85cyISpsb6HLa6sMO3uETtBdrfq7bwudPdw7zebU', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoidWVuVmhnN3ZwVnhZS2FzbFRabzdVUTVhMkkxWkQxT2xzSzl1ZG03aiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jaGFtYXJzZW5oYSI7fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEyJERORjNwaHVkcHNIQ2JFUFFoN3Q2M096eVVyWk1qSDNhaXNqVGljdHRpM0FFZDMzU2hENXUyIjt9', 1742961036),
	('VbtL8r3rUbmteEJwapbsjmKRFwxAb51GY9b23bdf', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWHh3WldBMkFVZzRUUXNuV1k5a2kyQzlBM2JockhKQVQxc040bGRWayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEyJERORjNwaHVkcHNIQ2JFUFFoN3Q2M096eVVyWk1qSDNhaXNqVGljdHRpM0FFZDMzU2hENXUyIjt9', 1743030633);

-- Copiando estrutura para tabela topsenha2.teams
DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela topsenha2.teams: ~0 rows (aproximadamente)
INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Administradores', 1, '2025-03-20 04:28:06', '2025-03-20 05:03:06');

-- Copiando estrutura para tabela topsenha2.team_invitations
DROP TABLE IF EXISTS `team_invitations`;
CREATE TABLE IF NOT EXISTS `team_invitations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`),
  CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela topsenha2.team_invitations: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela topsenha2.team_user
DROP TABLE IF EXISTS `team_user`;
CREATE TABLE IF NOT EXISTS `team_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela topsenha2.team_user: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela topsenha2.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela topsenha2.users: ~0 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
	(1, 'Wallace', 'wallacevr@gmail.com', NULL, '$2y$12$DNF3phudpsHCbEPQh7t63OzyUrZMjH3aisjTictti3AEd33ShD5u2', NULL, NULL, NULL, NULL, 1, NULL, '2025-03-20 04:28:06', '2025-03-20 04:28:16');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
