CREATE TABLE `my_erp`.`roles` (`id` INT NOT NULL AUTO_INCREMENT , `role_name` VARCHAR(255) NOT NULL , `details` TEXT NULL DEFAULT NULL , `created_by` INT NOT NULL DEFAULT '1' , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_by` INT NOT NULL DEFAULT '1' , `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;

INSERT INTO `roles` (`id`, `role_name`, `details`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES (NULL, 'Super Admin', 'Have All The Previlages', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP);

ALTER TABLE `roles` ADD `deletable` BOOLEAN NOT NULL DEFAULT TRUE AFTER `details`;

CREATE TABLE `my_erp`.`modules` (`id` INT NOT NULL AUTO_INCREMENT , `module_name` INT NOT NULL , `module_prefix` INT NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `modules` CHANGE `module_name` `module_name` VARCHAR(255) NOT NULL, CHANGE `module_prefix` `module_prefix` VARCHAR(255) NOT NULL;

INSERT INTO `modules` (`id`, `module_name`, `module_prefix`, `created_at`, `updated_at`) VALUES (NULL, 'Role', 'role', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

CREATE TABLE `my_erp`.`permissions` (`id` INT NOT NULL AUTO_INCREMENT , `create` BOOLEAN NOT NULL DEFAULT FALSE , `read` BOOLEAN NOT NULL DEFAULT FALSE , `update` BOOLEAN NOT NULL DEFAULT FALSE , `delete` BOOLEAN NOT NULL DEFAULT FALSE , `module_id` INT NOT NULL , `role_id` INT NOT NULL , `created_by` INT NOT NULL , `updated_by` INT NOT NULL , `created_at` DATETIME NOT NULL , `updated_at` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `my_erp`.`users` (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `image` VARCHAR(500) NULL DEFAULT 'users/user.jpg' , `username` VARCHAR(255) NULL DEFAULT NULL , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `verified` VARCHAR(10) NOT NULL DEFAULT 'no' , `role_id` INT NOT NULL , `branch_id` INT NOT NULL , `company` VARCHAR(255) NULL DEFAULT NULL , `details` TEXT NULL DEFAULT NULL , `phone` BIGINT NOT NULL , `phone_1` BIGINT NULL DEFAULT NULL , `address` TEXT NULL DEFAULT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `created_by` INT NOT NULL , `updated_by` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

INSERT INTO `users` (`id`, `name`, `image`, `username`, `email`, `password`, `verified`, `role_id`, `branch_id`, `company`, `details`, `phone`, `phone_1`, `address`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES ('0', 'Developer', 'users/user.jpg', 'developer', 'developer@erp.com', '$2y$10$QC3QiW2ywrbZgYPz0MSAeeHaL02sGnjz.Yu.P3ajwfbdILfz76mF6', 'yes', '1', '1', NULL, NULL, '01633394589', NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '0', '0'), ('1', 'Super Admin', 'users/user.jpg', 'admin', 'admin@erp.com', '$2y$10$QC3QiW2ywrbZgYPz0MSAeeHaL02sGnjz.Yu.P3ajwfbdILfz76mF6', 'yes', '1', '1', NULL, 'Owner of this project', '01987654321', NULL, 'Dhaka, Bangladesh', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', '1');

UPDATE `users` SET `id` = '0' WHERE `users`.`username` = 'developer';

CREATE TABLE `my_erp`.`branches` (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `details` TEXT NULL DEFAULT NULL , `location` VARCHAR(255) NULL DEFAULT NULL , `created_by` INT NOT NULL , `updated_by` INT NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;

INSERT INTO `branches` (`id`, `name`, `details`, `location`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES (NULL, 'Head Office', 'This is main branch', 'Dhaka, Bangladesh', '1', '1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

ALTER TABLE `branches` ADD `deletable` BOOLEAN NOT NULL DEFAULT TRUE AFTER `location`;

ALTER TABLE `modules` ADD `deletable` BOOLEAN NOT NULL DEFAULT TRUE AFTER `module_prefix`;

ALTER TABLE `permissions` ADD `deletable` BOOLEAN NOT NULL DEFAULT TRUE AFTER `role_id`;

ALTER TABLE `users` ADD `deletable` BOOLEAN NOT NULL DEFAULT TRUE AFTER `address`;

CREATE TABLE `my_erp`.`histories` (`id` INT NOT NULL AUTO_INCREMENT , `module` INT NOT NULL , `operation` VARCHAR(50) NOT NULL , `previous` TEXT NOT NULL , `after` TEXT NOT NULL , `user_id` INT NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `histories` ADD `module_id` INT NOT NULL AFTER `module`;

ALTER TABLE `histories` CHANGE `module` `module` VARCHAR(100) NOT NULL;

ALTER TABLE `histories` CHANGE `previous` `previous` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL, CHANGE `after` `after` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL;

ALTER TABLE `histories` ADD `ip_address` VARCHAR(255) NULL DEFAULT NULL AFTER `user_id`;

ALTER TABLE `users` ADD `date_of_birth` DATE NULL DEFAULT NULL AFTER `details`;

ALTER TABLE `users` ADD `joining_date` DATE NULL DEFAULT NULL AFTER `date_of_birth`;

------------------------------------------
--------------Office Updated--------------
------------------------------------------

ALTER TABLE `users` CHANGE `phone_1` `phone_1` VARCHAR(20) NULL DEFAULT NULL;

ALTER TABLE `roles` ADD `manager_role` INT NULL AFTER `details`;

------------------------------------------
---------------Home Updated---------------
------------------------------------------
