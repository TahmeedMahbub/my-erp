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

ALTER TABLE `users` CHANGE `phone_1` `phone_1` VARCHAR(20) NULL DEFAULT NULL;

ALTER TABLE `roles` ADD `manager_role` INT NULL AFTER `details`;

ALTER TABLE `roles` CHANGE `manager_role` `manager_role_id` INT NULL DEFAULT NULL;

ALTER TABLE `users` ADD `manager_role_id` INT NULL DEFAULT NULL AFTER `branch_id`, ADD `manager_id` INT NULL DEFAULT NULL AFTER `manager_role_id`;

ALTER TABLE `users` ADD `deleted_at` DATETIME NULL DEFAULT NULL AFTER `updated_by`;

ALTER TABLE `roles` ADD `deleted_at` DATETIME NULL DEFAULT NULL AFTER `updated_at`;

ALTER TABLE `branches` ADD `deleted_at` DATETIME NULL DEFAULT NULL AFTER `updated_at`;

ALTER TABLE `users` ADD `nid_image` TEXT NULL DEFAULT NULL AFTER `verified`;

INSERT INTO `modules` (`id`, `module_name`, `module_prefix`, `deletable`, `created_at`, `updated_at`) VALUES (NULL, 'Branch', 'branch', '1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP), (NULL, 'User', 'user', '1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

INSERT INTO `modules` (`id`, `module_name`, `module_prefix`, `deletable`, `created_at`, `updated_at`) VALUES (NULL, 'History', 'history', '1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

INSERT INTO `modules` (`id`, `module_name`, `module_prefix`, `deletable`, `created_at`, `updated_at`) VALUES (NULL, 'Access Level', 'access-level', '1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

CREATE TABLE `my_erp`.`access_levels` (`id` INT NOT NULL AUTO_INCREMENT , `module_id` INT NOT NULL , `create` BOOLEAN NOT NULL , `read` BOOLEAN NOT NULL , `update` BOOLEAN NOT NULL , `delete` BOOLEAN NOT NULL , `role_id` INT NULL DEFAULT NULL , `user_id` INT NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `my_erp`.`contact_categories` (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `details` TEXT NULL DEFAULT NULL , `parent_category` INT NULL DEFAULT NULL , `created_by` INT NOT NULL , `updated_by` INT NOT NULL , `created_at` DATETIME NOT NULL , `updated_at` DATETIME NOT NULL , `deletable` BOOLEAN NOT NULL DEFAULT TRUE , `deleted_at` DATETIME NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

INSERT INTO `modules` (`id`, `module_name`, `module_prefix`, `deletable`, `created_at`, `updated_at`) VALUES (NULL, 'Contact', 'contact', '1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

INSERT INTO `contact_categories` (`id`, `name`, `details`, `parent_category`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deletable`, `deleted_at`) VALUES (NULL, 'customer', 'Customer will buy products.', NULL, '1', '1', '2023-09-03 17:39:39.000000', '2023-09-03 17:39:39.000000', '1', NULL);

ALTER TABLE `contact_categories` CHANGE `parent_category` `parent_category_id` INT NULL DEFAULT NULL;

CREATE TABLE `my_erp`.`contacts` (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `code` VARCHAR(255) NULL DEFAULT NULL , `company` VARCHAR(255) NULL DEFAULT NULL , `category_id` INT NOT NULL , `phone` INT NOT NULL , `phone_1` VARCHAR(20) NULL DEFAULT NULL , `email` VARCHAR(255) NULL DEFAULT NULL , `address` TEXT NULL DEFAULT NULL , `status` VARCHAR(255) NOT NULL DEFAULT 'active' , `branch_id` INT NULL DEFAULT NULL , `created_at` DATETIME NOT NULL , `updated_at` DATETIME NOT NULL , `created_by` INT NOT NULL , `updated_by` INT NOT NULL , `deletable` BOOLEAN NOT NULL DEFAULT TRUE , `deleted_at` DATETIME NULL DEFAULT NULL , PRIMARY KEY (`id`), UNIQUE `contact_code_unique` (`code`)) ENGINE = InnoDB;

ALTER TABLE `contacts` ADD `image` VARCHAR(255) NULL DEFAULT 'contacts/contact.jpg' AFTER `code`;

ALTER TABLE `contacts` ADD `details` TEXT NULL DEFAULT NULL AFTER `email`;

INSERT INTO `modules` (`id`, `module_name`, `module_prefix`, `deletable`, `created_at`, `updated_at`) VALUES (NULL, 'Product / Service', 'product', '1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

UPDATE `modules` SET `module_name` = 'Item / Service', `module_prefix` = 'item' WHERE `modules`.`id` = 7;

CREATE TABLE `my_erp`.`products` (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `code` VARCHAR(100) NULL DEFAULT NULL , `image` TEXT NULL DEFAULT NULL , `details` TEXT NULL DEFAULT NULL , `purchase_rate` DOUBLE NULL DEFAULT NULL , `sales_rate` DOUBLE NULL DEFAULT NULL , `low_stock` INT NULL DEFAULT NULL , `category_id` INT NOT NULL , `created_by` INT NOT NULL , `updated_by` INT NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `deleted_at` DATETIME NULL DEFAULT NULL , PRIMARY KEY (`id`), UNIQUE `code_unique` (`code`)) ENGINE = InnoDB;

ALTER TABLE `products` ADD `unit_id` INT NOT NULL DEFAULT '1' AFTER `details`, ADD `carton_size` INT NULL DEFAULT NULL AFTER `unit_id`;

ALTER TABLE `products` CHANGE `carton_size` `carton_size` INT NULL DEFAULT '1';

RENAME TABLE `my_erp`.`products` TO `my_erp`.`items`;

CREATE TABLE `my_erp`.`units` (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `base_unit` INT NULL DEFAULT NULL , `details` TEXT NULL DEFAULT NULL , `created_by` INT NOT NULL , `updated_by` INT NOT NULL , `created_at` DATETIME NOT NULL , `updated_at` DATETIME NOT NULL , `deleted_at` DATETIME NULL DEFAULT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB;

INSERT INTO `units` (`id`, `name`, `base_unit`, `details`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES ('1', 'Base Unit', '1', 'This is the Base Unit. By default Unit for Products', '1', '1', '2023-09-15 17:23:41.000000', '2023-09-15 17:23:41.000000', NULL);

CREATE TABLE `my_erp`.`item_categories` (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `details` TEXT NULL DEFAULT NULL , `parent_category_id` INT NULL DEFAULT NULL , `created_by` INT NOT NULL , `updated_by` INT NOT NULL , `created_at` DATETIME NOT NULL , `updated_at` DATETIME NOT NULL , `deletable` BOOLEAN NOT NULL DEFAULT TRUE , `deleted_at` DATETIME NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `items` CHANGE `image` `image` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'products/item.jpg';

CREATE TABLE `my_erp`.`brands` (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `details` TEXT NULL DEFAULT NULL , `category_id` INT NULL DEFAULT NULL , `created_by` INT NOT NULL , `updated_by` INT NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `deleted_at` DATETIME NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `items` ADD `brand_id` INT NOT NULL AFTER `details`;

ALTER TABLE `items` CHANGE `purchase_rate` `purchase_price` DOUBLE NULL DEFAULT NULL, CHANGE `sales_rate` `selling_price` DOUBLE NULL DEFAULT NULL;

ALTER TABLE `items` CHANGE `image` `image` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'items/item.jpg';

ALTER TABLE `items` CHANGE `brand_id` `brand_id` INT NULL DEFAULT NULL;

INSERT INTO `modules` (`id`, `module_name`, `module_prefix`, `deletable`, `created_at`, `updated_at`) VALUES ('8', 'Purchase', 'purchase', '1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

INSERT INTO `modules` (`id`, `module_name`, `module_prefix`, `deletable`, `created_at`, `updated_at`) VALUES (NULL, 'Unit', 'unit', '1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP), (NULL, 'Brand', 'brand', '1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

ALTER TABLE `units` CHANGE `base_unit` `base_unit` DOUBLE NULL DEFAULT NULL;

ALTER TABLE `brands` ADD `image` VARCHAR(255) NOT NULL DEFAULT 'brands/brand.jpg' AFTER `name`;

INSERT INTO `contact_categories` (`id`, `name`, `details`, `parent_category_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deletable`, `deleted_at`) VALUES ('1', 'Customer', 'Customer will buy products.', NULL, '1', '1', '2023-09-21 17:19:49.000000', '2023-09-21 17:19:49.000000', '0', NULL);

INSERT INTO `contact_categories` (`id`, `name`, `details`, `parent_category_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deletable`, `deleted_at`) VALUES ('2', 'Vendor', 'Comany will purchase products from Vendor', NULL, '1', '1', '2023-09-21 17:19:49.000000', '2023-09-21 17:19:49.000000', '0', NULL);

INSERT INTO `contact_categories` (`id`, `name`, `details`, `parent_category_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deletable`, `deleted_at`) VALUES ('3', 'Delivery Person', 'Ships the products', NULL, '1', '1', '2023-09-21 17:19:49.000000', '2023-09-21 17:19:49.000000', '0', NULL);

INSERT INTO `contact_categories` (`id`, `name`, `details`, `parent_category_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deletable`, `deleted_at`) VALUES ('4', 'Purchase Delivery Person', 'Deliver Only Purchased Products', '3', '1', '1', '2023-09-21 17:26:55.000000', '2023-09-21 17:26:55.000000', '1', NULL), ('5', 'Sale Delivery Person', 'Deliver Only Sold Products', '3', '1', '1', '2023-09-21 17:26:55.000000', '2023-09-21 17:26:55.000000', '1', NULL);

CREATE TABLE `my_erp`.`purchases` (`id` INT NOT NULL AUTO_INCREMENT , `code` VARCHAR(10) NOT NULL , `vendor_id` INT NOT NULL , `delivery_preson_id` INT NOT NULL , `branch_id` INT NOT NULL , `total_amount` DOUBLE(10,2) NOT NULL DEFAULT '0' , `paid_through_id` INT NULL DEFAULT NULL , `cheque_no` VARCHAR(30) NULL DEFAULT NULL , `cheque_date` DATE NULL DEFAULT NULL , `payment_comment` TEXT NULL DEFAULT NULL , `discount` DOUBLE(10,2) NOT NULL DEFAULT '0' , `discount_type` VARCHAR(10) NOT NULL DEFAULT 'tk' , `vat` DOUBLE(10,2) NOT NULL DEFAULT '0' , `vat_type` VARCHAR(10) NOT NULL DEFAULT '%' , `shipping_charge` DOUBLE(10,2) NOT NULL DEFAULT '0' , `note` TEXT NULL DEFAULT NULL , `files` TEXT NULL DEFAULT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `created_by` INT NOT NULL , `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_by` INT NOT NULL , `deleted_at` DATETIME NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `purchases` CHANGE `code` `code` VARCHAR(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL;

ALTER TABLE `purchases` CHANGE `delivery_preson_id` `delivery_preson_id` INT NULL DEFAULT NULL;

ALTER TABLE `purchases` ADD `paid_amount` DOUBLE(10,2) NULL DEFAULT '0' AFTER `total_amount`;

ALTER TABLE `access_levels` ADD FOREIGN KEY (`module_id`) REFERENCES `modules`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `access_levels` DROP FOREIGN KEY `access_levels_ibfk_1`; ALTER TABLE `access_levels` ADD CONSTRAINT `access_levels_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `modules`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `access_levels` ADD FOREIGN KEY (`role_id`) REFERENCES `roles`(`id`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `access_levels` ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `accounts` ADD FOREIGN KEY (`account_type_id`) REFERENCES `account_types`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `accounts` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION; ALTER TABLE `accounts` ADD FOREIGN KEY (`updated_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION; ALTER TABLE `accounts` ADD FOREIGN KEY (`deleted_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `branches` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `branches` ADD FOREIGN KEY (`updated_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `brands` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `brands` ADD FOREIGN KEY (`updated_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `contacts` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `contacts` ADD FOREIGN KEY (`updated_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `contact_categories` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `contact_categories` ADD FOREIGN KEY (`updated_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `items` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `items` ADD FOREIGN KEY (`updated_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `item_categories` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `item_categories` ADD FOREIGN KEY (`updated_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `permissions` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `permissions` ADD FOREIGN KEY (`updated_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `purchases` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `purchases` ADD FOREIGN KEY (`updated_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `roles` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `roles` ADD FOREIGN KEY (`updated_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `units` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `units` ADD FOREIGN KEY (`updated_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `users` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `users` ADD FOREIGN KEY (`updated_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `brands` ADD FOREIGN KEY (`category_id`) REFERENCES `item_categories`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `contacts` ADD FOREIGN KEY (`branch_id`) REFERENCES `branches`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `contacts` ADD FOREIGN KEY (`category_id`) REFERENCES `contact_categories`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `contact_categories` ADD FOREIGN KEY (`parent_category_id`) REFERENCES `contact_categories`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `histories` ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

------------------------------------------
---------------Home Updated---------------
------------------------------------------

CREATE TABLE `my_erp`.`purchase_entries` (`id` INT NOT NULL AUTO_INCREMENT , `purchase_id` INT NOT NULL , `item_id` INT NOT NULL , `expiry_date` DATE NULL DEFAULT NULL , `base_qty` DOUBLE NULL DEFAULT NULL , `carton_qty` DOUBLE NULL DEFAULT NULL , `price` DOUBLE NOT NULL , `price_unit` VARCHAR(10) NOT NULL DEFAULT 'base' , `discount` DOUBLE(10,2) NULL DEFAULT NULL , `discount_type` VARCHAR(5) NOT NULL DEFAULT 'tk' , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `created_by` INT NOT NULL , `updated_by` INT NOT NULL , `deleted_at` DATETIME NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `purchase_entries` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION; ALTER TABLE `purchase_entries` ADD FOREIGN KEY (`item_id`) REFERENCES `items`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `purchase_entries` ADD FOREIGN KEY (`purchase_id`) REFERENCES `purchases`(`id`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `purchase_entries` ADD FOREIGN KEY (`updated_by`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

CREATE TABLE `my_erp`.`item_lots` (`id` INT NOT NULL AUTO_INCREMENT, `item_id` INT NOT NULL , `lot_no` VARCHAR(30) NOT NULL , `branch_id` INT NOT NULL , `expiry_date` DATE NULL DEFAULT NULL , `total_stock` INT NOT NULL DEFAULT '0' , `purchased_stock` INT NOT NULL DEFAULT '0' , `sold_stock` INT NOT NULL DEFAULT '0' , `transferred_in_stock` INT NOT NULL DEFAULT '0' , `transferred_out_stock` INT NOT NULL DEFAULT '0' , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`) ) ENGINE = InnoDB;

CREATE TABLE `my_erp`.`journal_entries` (`id` INT NOT NULL AUTO_INCREMENT , `journal_type` VARCHAR(255) NULL DEFAULT NULL , `transaction_type` VARCHAR(3) NOT NULL , `amount` DOUBLE NOT NULL , `account_id` INT NOT NULL , `date` DATE NOT NULL , `contact_id` INT NOT NULL , `journal_id` INT NULL DEFAULT NULL , `model_name` VARCHAR(255) NULL DEFAULT NULL , `model_id` INT NULL DEFAULT NULL , `note` TEXT NULL DEFAULT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `created_by` INT NOT NULL , `updated_by` INT NOT NULL , `deleted_at` DATETIME NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

INSERT INTO `accounts` (`id`, `account_name`, `account_code`, `description`, `account_type_id`, `parent_account_type`, `created_by`, `updated_by`, `created_at`, `updated_at`, `editable`, `deleted_by`, `deleted_at`) VALUES ('30', 'Liable Shipping Charge', 'Liable Shipping Charge', 'Shipping Charge, ERP Organization Should Pay', '8', 'liability', '1', '1', '2023-09-27 20:08:32.000000', '2023-09-27 20:08:32.000000', '1', NULL, NULL);

ALTER TABLE `purchases` ADD `je_discount` DOUBLE NULL DEFAULT '0' AFTER `files`, ADD `je_vat` DOUBLE NULL DEFAULT '0' AFTER `je_discount`, ADD `je_shipping` DOUBLE NULL DEFAULT '0' AFTER `je_vat`;

ALTER TABLE `purchases` CHANGE `je_shipping` `je_subtotal` DOUBLE NULL DEFAULT '0';

ALTER TABLE `purchases` ADD `je_paid_amount` DOUBLE NULL DEFAULT '0' AFTER `je_vat`;





------------------------------------------
--------------Office Updated--------------
------------------------------------------
