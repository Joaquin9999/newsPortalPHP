SET foreign_key_checks = 0;
START TRANSACTION;

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL, 
  `migration` VARCHAR(255) NOT NULL, 
  `batch` INT NOT NULL
);

INSERT INTO migrations VALUES (1,'0001_01_01_000000_create_users_table',1);
INSERT INTO migrations VALUES (2,'0001_01_01_000001_create_cache_table',1);
INSERT INTO migrations VALUES (3,'0001_01_01_000002_create_jobs_table',1);
INSERT INTO migrations VALUES (4,'2024_10_03_233431_create_permission_tables',2);

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL, 
  `name` VARCHAR(255) NOT NULL, 
  `email` VARCHAR(255) NOT NULL, 
  `email_verified_at` DATETIME, 
  `password` VARCHAR(255) NOT NULL, 
  `remember_token` VARCHAR(100), 
  `created_at` DATETIME, 
  `updated_at` DATETIME
);

CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` VARCHAR(255) NOT NULL, 
  `token` VARCHAR(255) NOT NULL, 
  `created_at` DATETIME, 
  PRIMARY KEY (`email`)
);

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` VARCHAR(255) NOT NULL, 
  `user_id` INT, 
  `ip_address` VARCHAR(45), 
  `user_agent` TEXT, 
  `payload` TEXT NOT NULL, 
  `last_activity` INT NOT NULL, 
  PRIMARY KEY (`id`)
);

INSERT INTO sessions VALUES ('olAtBA2fhVA2rO0uZEeRsXgKAerOlOZxsDWKJ9aN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia2s4MkZLQmgyMjNJejBseEFXMjdHRXh0ckNNdTZMYlBTRzhEWXhyaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1728003119);

CREATE TABLE IF NOT EXISTS `cache` (
  `key` VARCHAR(255) NOT NULL, 
  `value` TEXT NOT NULL, 
  `expiration` INT NOT NULL, 
  PRIMARY KEY (`key`)
);

CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` VARCHAR(255) NOT NULL, 
  `owner` VARCHAR(255) NOT NULL, 
  `expiration` INT NOT NULL, 
  PRIMARY KEY (`key`)
);

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL, 
  `queue` VARCHAR(255) NOT NULL, 
  `payload` TEXT NOT NULL, 
  `attempts` INT NOT NULL, 
  `reserved_at` INT, 
  `available_at` INT NOT NULL, 
  `created_at` INT NOT NULL
);

CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` VARCHAR(255) NOT NULL, 
  `name` VARCHAR(255) NOT NULL, 
  `total_jobs` INT NOT NULL, 
  `pending_jobs` INT NOT NULL, 
  `failed_jobs` INT NOT NULL, 
  `failed_job_ids` TEXT NOT NULL, 
  `options` TEXT, 
  `cancelled_at` INT, 
  `created_at` INT NOT NULL, 
  `finished_at` INT, 
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL, 
  `uuid` VARCHAR(255) NOT NULL, 
  `connection` TEXT NOT NULL, 
  `queue` TEXT NOT NULL, 
  `payload` TEXT NOT NULL, 
  `exception` TEXT NOT NULL, 
  `failed_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL, 
  `name` VARCHAR(255) NOT NULL, 
  `guard_name` VARCHAR(255) NOT NULL, 
  `created_at` DATETIME, 
  `updated_at` DATETIME
);

CREATE TABLE IF NOT EXISTS `roles` (
  `id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL, 
  `name` VARCHAR(255) NOT NULL, 
  `guard_name` VARCHAR(255) NOT NULL, 
  `created_at` DATETIME, 
  `updated_at` DATETIME
);

INSERT INTO roles VALUES (1, 'admin', 'web', '2024-10-03 23:37:47', '2024-10-03 23:37:47');
INSERT INTO roles VALUES (2, 'editor', 'web', '2024-10-03 23:37:47', '2024-10-03 23:37:47');
INSERT INTO roles VALUES (3, 'usuario', 'web', '2024-10-03 23:37:47', '2024-10-03 23:37:47');

CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` INT NOT NULL, 
  `model_type` VARCHAR(255) NOT NULL, 
  `model_id` INT NOT NULL, 
  FOREIGN KEY (`permission_id`) REFERENCES `permissions`(`id`) ON DELETE CASCADE, 
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`)
);

CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` INT NOT NULL, 
  `model_type` VARCHAR(255) NOT NULL, 
  `model_id` INT NOT NULL, 
  FOREIGN KEY (`role_id`) REFERENCES `roles`(`id`) ON DELETE CASCADE, 
  PRIMARY KEY (`role_id`, `model_id`, `model_type`)
);

CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` INT NOT NULL, 
  `role_id` INT NOT NULL, 
  FOREIGN KEY (`permission_id`) REFERENCES `permissions`(`id`) ON DELETE CASCADE, 
  FOREIGN KEY (`role_id`) REFERENCES `roles`(`id`) ON DELETE CASCADE, 
  PRIMARY KEY (`permission_id`, `role_id`)
);

CREATE UNIQUE INDEX `users_email_unique` ON `users` (`email`);
CREATE INDEX `sessions_user_id_index` ON `sessions` (`user_id`);
CREATE INDEX `sessions_last_activity_index` ON `sessions` (`last_activity`);
CREATE INDEX `jobs_queue_index` ON `jobs` (`queue`);
CREATE UNIQUE INDEX `failed_jobs_uuid_unique` ON `failed_jobs` (`uuid`);
CREATE UNIQUE INDEX `permissions_name_guard_name_unique` ON `permissions` (`name`, `guard_name`);
CREATE UNIQUE INDEX `roles_name_guard_name_unique` ON `roles` (`name`, `guard_name`);
CREATE INDEX `model_has_permissions_model_id_model_type_index` ON `model_has_permissions` (`model_id`, `model_type`);
CREATE INDEX `model_has_roles_model_id_model_type_index` ON `model_has_roles` (`model_id`, `model_type`);

COMMIT;
SET foreign_key_checks = 1;