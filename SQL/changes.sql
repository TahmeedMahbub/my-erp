CREATE TABLE `my_erp`.`roles` (`id` INT NOT NULL AUTO_INCREMENT , `role_name` VARCHAR(255) NOT NULL , `details` TEXT NULL DEFAULT NULL , `created_by` INT NOT NULL DEFAULT '1' , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_by` INT NOT NULL DEFAULT '1' , `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;

INSERT INTO `roles` (`id`, `role_name`, `details`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES (NULL, 'Super Admin', 'Have All The Previlages', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP);

------------------------------------------
--------------Office Updated--------------
------------------------------------------

------------------------------------------
---------------Home Updated---------------
------------------------------------------
