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

------------------------------------------
---------------Home Updated---------------
------------------------------------------

CREATE TABLE `my_erp`.`account_type` (`id` INT NOT NULL AUTO_INCREMENT , `account_name` VARCHAR(255) NOT NULL , `description` TEXT NULL DEFAULT NULL , `parent_account` VARCHAR(15) NOT NULL , `editable` BOOLEAN NOT NULL DEFAULT TRUE , `created_at` DATETIME NOT NULL , `updated_at` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

INSERT INTO `account_type` (`id`, `account_name`, `description`, `parent_account`, `editable`, `created_at`, `updated_at`) VALUES
(1, 'Asset', 'Track special assets like goodwill and other intangible assets', 'asset', true, '2006-12-10 00:56:44', '1992-12-23 08:58:40'),
(2, 'Accounts Receivable', 'Reflects money owed to you by your customers. Zoho Books provides a default Accounts Receivable account. E.g. Unpaid Invoices', 'asset', false, '1994-11-06 19:43:24', '1988-10-12 13:13:54'),
(3, 'Other Current asset', 'Any short term asset that can be converted into cash or cash equivalents easily - Prepaid expenses - Stocks and Mutual Funds', 'asset', true, '1997-04-02 23:06:59', '1982-07-02 01:40:37'),
(4, 'Cash', 'To keep track of cash and other cash equivalents like petty cash, undeposited funds, etc.', 'asset', true, '1983-12-30 10:45:16', '1993-10-05 06:58:23'),
(5, 'Bank', 'To keep track of bank accounts like Savings, Checking, and Money Market accounts', 'asset', true, '1993-07-13 01:38:48', '1996-11-21 10:32:52'),
(6, 'Fixed asset', 'Any long term investment or an asset that cannot be converted into cash easily like:-Land and Buildings - Plant, Machinery and Equipment - Computers -Furniture', 'asset', true, '1975-11-13 15:16:03', '1999-03-13 21:06:20'),
(7, 'Stock', 'To keep track of your inventory assets.', 'asset', true, '1988-11-03 20:37:59', '1989-02-24 14:38:31'),
(8, 'Liability', 'Any short term liability like:Customer Deposits - Tax Payable', 'liability', true, '2006-11-28 12:21:19', '1983-02-11 23:23:49'),
(9, 'Credit Card', 'Create a trail of all your credit card transactions by creating a credit card account', 'liability', true, '1979-12-13 17:48:02', '2003-06-04 15:14:20'),
(10, 'Long Term Liability', 'Liabilities that mature after a minimum period of one year like Notes Payable, Debentures, and Long Term Loans', 'liability', true, '1995-02-27 22:27:55', '1973-09-20 03:47:27'),
(11, 'Other Liability', 'Obligation of an entity arising from past transactions or events which would require repayment.- Tax to be paid Loan to be Repaid Accounts Payable etc', 'liability', true, '1972-05-07 08:34:12', '2007-03-24 19:11:09'),
(12, 'Accounts Payable', 'Accounts Payable', 'liability', false, '2004-08-22 00:54:11', '2013-03-12 02:58:29'),
(13, 'Equity', 'Equity', 'equity', true, '1996-10-13 11:29:42', '1987-06-12 21:21:30'),
(14, 'Income', 'Income', 'income', true, '1997-08-12 18:56:25', '1977-05-21 10:29:56'),
(15, 'Other Income', 'Other Income', 'income', true, '2017-01-11 16:29:51', '1970-05-13 18:35:11'),
(16, 'Expense', 'Expense', 'expense', true, '1984-12-11 02:20:34', '1974-12-28 10:30:16'),
(17, 'Cost of Goods Sold', 'Cost of Goods Sold', 'expense', true, '2013-06-28 05:06:09', '2006-07-23 13:41:05'),
(18, 'Other Expense', 'Other Expense', 'expense', true, '1989-06-15 11:22:19', '2015-04-06 07:33:43');


------------------------------------------
--------------Office Updated--------------
------------------------------------------
