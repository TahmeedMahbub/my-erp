-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 26, 2023 at 05:47 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_levels`
--

CREATE TABLE `access_levels` (
  `id` int NOT NULL,
  `module_id` int NOT NULL,
  `create` tinyint(1) NOT NULL,
  `read` tinyint(1) NOT NULL,
  `update` tinyint(1) NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `role_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `access_levels`
--

INSERT INTO `access_levels` (`id`, `module_id`, `create`, `read`, `update`, `delete`, `role_id`, `user_id`) VALUES
(54, 1, 1, 1, 1, 1, 1, NULL),
(55, 2, 1, 1, 1, 1, 1, NULL),
(56, 3, 1, 1, 1, 1, 1, NULL),
(57, 4, 1, 1, 1, 1, 1, NULL),
(58, 5, 1, 1, 1, 1, 1, NULL),
(59, 1, 1, 0, 0, 1, NULL, NULL),
(60, 2, 0, 1, 0, 1, NULL, NULL),
(61, 3, 0, 0, 1, 1, NULL, NULL),
(62, 4, 0, 0, 0, 1, NULL, NULL),
(63, 5, 0, 0, 0, 1, NULL, NULL),
(64, 1, 0, 0, 0, 1, NULL, NULL),
(65, 2, 0, 0, 0, 1, NULL, NULL),
(66, 3, 0, 0, 0, 1, NULL, NULL),
(67, 4, 0, 0, 0, 1, NULL, NULL),
(68, 5, 0, 0, 0, 1, NULL, NULL),
(69, 1, 0, 0, 0, 1, NULL, NULL),
(70, 2, 0, 0, 0, 1, NULL, NULL),
(71, 3, 0, 0, 0, 1, NULL, NULL),
(72, 4, 0, 0, 0, 1, NULL, NULL),
(73, 5, 0, 0, 0, 1, NULL, NULL),
(113, 1, 1, 1, 1, 1, NULL, 1),
(114, 2, 1, 1, 1, 1, NULL, 1),
(115, 3, 1, 1, 1, 1, NULL, 1),
(116, 4, 1, 1, 1, 1, NULL, 1),
(117, 5, 1, 1, 1, 1, NULL, 1),
(118, 6, 1, 1, 1, 1, NULL, 1),
(119, 6, 1, 1, 1, 1, 1, NULL),
(120, 7, 1, 1, 1, 1, 1, NULL),
(121, 8, 1, 1, 1, 1, 1, NULL),
(122, 9, 1, 1, 1, 1, 1, NULL),
(123, 10, 1, 1, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_code` varchar(255) DEFAULT NULL,
  `description` text,
  `account_type_id` int NOT NULL,
  `parent_account_type` varchar(30) NOT NULL,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `editable` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `account_name`, `account_code`, `description`, `account_type_id`, `parent_account_type`, `created_by`, `updated_by`, `created_at`, `updated_at`, `editable`, `deleted_by`, `deleted_at`) VALUES
(1, 'Advance Tax', 'Advance Tax', 'Any tax which is paid in advance is recorded into the advance tax account. This advance tax payment could be a quarterly, half yearly or yearly payment.', 3, 'asset', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(2, 'Employee Advance', 'Employee Advance', 'Money paid out to an employee in advance can be tracked here till it is repaid or shown to be spent for company purposes.', 3, 'asset', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(3, 'Cash', 'Cash', 'It is a small amount of cash that is used to pay your minor or casual expenses rather than writing a check.', 4, 'asset', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(4, 'Undeposited Funds', 'Undeposited Funds', 'Record funds received by your company yet to be deposited in a bank as undeposited funds and group them as a current asset in your balance sheet.', 4, 'asset', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(5, 'Accounts Receivable', 'Accounts Receivable', 'The money that customers owe you becomes the accounts receivable. A good example of this is a payment expected from an invoice sent to your customer.', 2, 'asset', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(6, 'Inventory Asset', 'Inventory Asset', 'An account which tracks the value of goods in your inventory.', 7, 'asset', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(7, 'Opening Balance Adjustments', 'Opening Balance Adjustments', 'This account will hold the difference in the debits and credits entered during the opening balance.', 8, 'liability', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(8, 'Employee Reimbursements', 'Employee Reimbursements', 'This account can be used to track the reimbursements that are due to be paid out to employees.', 8, 'liability', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(9, 'Tax Payable', 'Tax Payable', 'The amount of money which you owe to your tax authority is recorded under the tax payable account. This amount is a sum of your outstanding in taxes and the tax charged on sales.', 8, 'liability', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(10, 'Unearned Revenue', 'Unearned Revenue', 'A liability account that reports amounts received in advance of providing goods or services. When the goods or services are provided, this account balance is decreased and a revenue account is increased.', 8, 'liability', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(11, 'Accounts Payable', 'Accounts Payable', 'This is an account of all the money which you owe to others like a pending bill payment to a vendor,etc.', 12, 'liability', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(12, 'Tag Adjustments', 'Tag Adjustments', 'This adjustment account tracks the transfers between different reporting tags.', 11, 'liability', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(13, 'Drawings', 'Drawings', 'The money withdrawn from a business by its owner can be tracked with this account.', 13, 'equity', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(14, 'Opening Balance Offset', 'Opening Balance Offset', 'This is an account where you can record the balance from your previous years earning or the amount set aside for some activities. It is like a buffer account for your funds.', 13, 'equity', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(15, 'Owner Equity', 'Owner Equity', 'The owners rights to the assets of a company can be quantified in the owner\'s equity account.', 13, 'equity', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(16, 'Sales', 'Sales', 'The income from the sales in your business is recorded under the sales account.', 14, 'income', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(17, 'General Income', 'General Income', 'A general category of account where you can record any income which cannot be recorded into any other category.', 14, 'income', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(18, 'Other Charges', 'Other Charges', 'Miscellaneous charges like adjustments made to the invoice can be recorded in this account.', 14, 'income', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(19, 'Interest Income', 'Interest Income', 'A percentage of your balances and deposits are given as interest to you by your banks and financial institutions. This interest is recorded into the interest income account.', 14, 'income', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(20, 'Shipping Charge', 'Shipping Charge', 'Shipping charges made to the invoice will be recorded in this account.', 14, 'income', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(21, 'Discount', 'Discount', 'Any reduction on your selling price as a discount can be recorded into the discount account.', 14, 'income', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(22, 'Late Fee Income', 'Late Fee Income', 'Any late fee income is recorded into the late fee income account. The late fee is levied when the payment for an invoice is not received by the due date.', 14, 'income', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(23, 'Other Expenses', 'Other Expenses', 'Any minor expense on activities unrelated to primary business operations is recorded under the other expense account.', 16, 'expense', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(24, 'Bad Debt', 'Bad Debt', 'Any amount which is lost and is unrecoverable is recorded into the bad debt account.', 16, 'expense', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(25, 'Exchange Gain or Loss', 'Exchange Gain or Loss', 'Changing the conversion rate can result in a gain or a loss. You can record this into the exchange gain or loss account.', 18, 'expense', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(26, 'Cost of Goods Sold', 'Cost of Goods Sold', 'An expense account which tracks the value of the goods sold.', 17, 'expense', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(27, 'Prepaid Expense', 'Prepaid Expense', 'An asset account that reports amounts paid in advance while purchasing goods or services from a vendor.', 3, 'asset', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(28, 'Conveyance', 'Conveyance', 'An asset account that reports amounts paid in advance while purchasing goods or services from a vendor.', 16, 'expense', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL),
(29, 'Agent Commission', 'Agent Commission', 'Agent Commission.', 3, 'asset', 1, 1, '2023-09-26 16:15:11', '2023-09-26 16:15:11', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE `account_types` (
  `id` int NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `description` text,
  `parent_account` varchar(15) NOT NULL,
  `editable` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `account_types`
--

INSERT INTO `account_types` (`id`, `account_name`, `description`, `parent_account`, `editable`, `created_at`, `updated_at`) VALUES
(1, 'Asset', 'Track special assets like goodwill and other intangible assets', 'asset', 1, '2006-12-10 00:56:44', '1992-12-23 08:58:40'),
(2, 'Accounts Receivable', 'Reflects money owed to you by your customers. Zoho Books provides a default Accounts Receivable account. E.g. Unpaid Invoices', 'asset', 0, '1994-11-06 19:43:24', '1988-10-12 13:13:54'),
(3, 'Other Current asset', 'Any short term asset that can be converted into cash or cash equivalents easily - Prepaid expenses - Stocks and Mutual Funds', 'asset', 1, '1997-04-02 23:06:59', '1982-07-02 01:40:37'),
(4, 'Cash', 'To keep track of cash and other cash equivalents like petty cash, undeposited funds, etc.', 'asset', 1, '1983-12-30 10:45:16', '1993-10-05 06:58:23'),
(5, 'Bank', 'To keep track of bank accounts like Savings, Checking, and Money Market accounts', 'asset', 1, '1993-07-13 01:38:48', '1996-11-21 10:32:52'),
(6, 'Fixed asset', 'Any long term investment or an asset that cannot be converted into cash easily like:-Land and Buildings - Plant, Machinery and Equipment - Computers -Furniture', 'asset', 1, '1975-11-13 15:16:03', '1999-03-13 21:06:20'),
(7, 'Stock', 'To keep track of your inventory assets.', 'asset', 1, '1988-11-03 20:37:59', '1989-02-24 14:38:31'),
(8, 'Liability', 'Any short term liability like:Customer Deposits - Tax Payable', 'liability', 1, '2006-11-28 12:21:19', '1983-02-11 23:23:49'),
(9, 'Credit Card', 'Create a trail of all your credit card transactions by creating a credit card account', 'liability', 1, '1979-12-13 17:48:02', '2003-06-04 15:14:20'),
(10, 'Long Term Liability', 'Liabilities that mature after a minimum period of one year like Notes Payable, Debentures, and Long Term Loans', 'liability', 1, '1995-02-27 22:27:55', '1973-09-20 03:47:27'),
(11, 'Other Liability', 'Obligation of an entity arising from past transactions or events which would require repayment.- Tax to be paid Loan to be Repaid Accounts Payable etc', 'liability', 1, '1972-05-07 08:34:12', '2007-03-24 19:11:09'),
(12, 'Accounts Payable', 'Accounts Payable', 'liability', 0, '2004-08-22 00:54:11', '2013-03-12 02:58:29'),
(13, 'Equity', 'Equity', 'equity', 1, '1996-10-13 11:29:42', '1987-06-12 21:21:30'),
(14, 'Income', 'Income', 'income', 1, '1997-08-12 18:56:25', '1977-05-21 10:29:56'),
(15, 'Other Income', 'Other Income', 'income', 1, '2017-01-11 16:29:51', '1970-05-13 18:35:11'),
(16, 'Expense', 'Expense', 'expense', 1, '1984-12-11 02:20:34', '1974-12-28 10:30:16'),
(17, 'Cost of Goods Sold', 'Cost of Goods Sold', 'expense', 1, '2013-06-28 05:06:09', '2006-07-23 13:41:05'),
(18, 'Other Expense', 'Other Expense', 'expense', 1, '1989-06-15 11:22:19', '2015-04-06 07:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` text,
  `location` varchar(255) DEFAULT NULL,
  `deletable` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `details`, `location`, `deletable`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Head Office', 'This is main branch', 'Dhaka Cantonment, Bangladesh', 1, 0, 0, '2023-08-26 00:03:27', '2023-08-26 00:03:27', NULL),
(6, 'Gulshan', NULL, 'Gulshan-1, Dhaka', 1, 1, 1, '2023-08-28 17:51:41', '2023-08-28 17:51:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'brands/brand.jpg',
  `details` text,
  `category_id` int DEFAULT NULL,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT 'contacts/contact.jpg',
  `files` text,
  `company` varchar(255) DEFAULT NULL,
  `category_id` int NOT NULL,
  `phone` int NOT NULL,
  `phone_1` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `details` text,
  `address` text,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `branch_id` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `deletable` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `code`, `image`, `files`, `company`, `category_id`, `phone`, `phone_1`, `email`, `details`, `address`, `status`, `branch_id`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deletable`, `deleted_at`) VALUES
(1, 'Tahmeed Cus', NULL, 'contacts/contact.jpg', NULL, 'American Internation University - Bangladesh', 1, 1633394589, NULL, 'tahmidmahbub168@gmail.com', NULL, '118/6 (Infront of mount hermann high school), North Kafrul, Kafrul, Dhaka-1206', 'active', NULL, '2023-09-04 19:30:32', '2023-09-04 19:30:32', 1, 1, 1, NULL),
(2, 'Jerry Ven', NULL, 'contacts/contact.jpg', NULL, 'Robles and Parker Co', 2, 1698756452, '+1 (349) 614-5282', 'zylizybu@mailinator.com', NULL, 'Et ipsum aliqua Qu', 'active', 6, '2023-09-08 16:09:41', '2023-09-08 16:09:41', 1, 1, 1, NULL),
(3, 'Phoebe Del', NULL, 'contacts/contact.jpg', NULL, 'Nixon and Mullen Plc', 3, 1849637052, '+1 (592) 439-6911', 'huzudup@mailinator.com', NULL, 'Autem molestiae non', 'active', 6, '2023-09-08 16:35:50', '2023-09-08 16:35:50', 1, 1, 1, NULL),
(4, 'Anjolie PDel', 'Accusamus omnis ut l', 'contacts/contact.jpg', NULL, 'Petersen Mccormick Inc', 4, 1682370970, '+1 (632) 159-7145', 'luhycixew@mailinator.com', NULL, 'Culpa ad eum conseq', 'active', 1, '2023-09-08 16:41:12', '2023-09-08 16:41:12', 1, 1, 1, NULL),
(7, 'Ethan SDel', 'Veniam cum nemo eos', 'contacts/contact_Veniam cum nemo eos.jpg', '[\"contacts\\/856_7_WIN_20230511_20_25_26_Pro.jpg\",\"contacts\\/497_7_WIN_20230511_20_25_34_Pro.jpg\",\"contacts\\/856_7_WIN_20230511_20_25_26_Pro.jpg\",\"contacts\\/497_7_WIN_20230511_20_25_34_Pro.jpg\",\"contacts\\/834_7_WIN_20230609_14_52_10_Pro.jpg\"]', 'Watson and Watts Associates1', 5, 1654785651, '+1 (777) 721-63551', 'jeju@mailinator.com1', '1', 'Aspernatur repudiand1', 'active', 1, '2023-09-10 17:10:08', '2023-09-10 17:10:08', 1, 1, 1, NULL),
(8, 'Ainsley Cus', 'Qui sint velit et', 'contacts/contact.jpg', NULL, 'Day Holcomb Associates', 1, 1632545632, '+1 (919) 241-1978', 'dozamu@mailinator.com', NULL, 'Velit voluptate unde', 'active', 6, '2023-09-08 19:36:43', '2023-09-08 19:36:43', 1, 1, 1, NULL),
(11, 'Alec Ven', 'Nulla error Nam reru', 'contacts/contact_Nulla error Nam reru.jpg', '[\"contacts\\/542_11_WIN_20230511_20_25_26_Pro.jpg\",\"contacts\\/635_11_WIN_20230511_20_25_34_Pro.jpg\",\"contacts\\/310_11_WIN_20230609_14_52_10_Pro.jpg\"]', 'Larsen Giles Co', 2, 1633512352, '+1 (748) 151-2826', 'nuhitezyno@mailinator.com', NULL, 'Accusamus amet volu', 'active', 6, '2023-09-08 19:46:14', '2023-09-08 19:46:14', 1, 1, 1, NULL),
(12, 'Alec Del', 'Nulla error Nam reru1', 'contacts/contact_12.jpg', '[\"contacts\\/262_12_WIN_20230511_20_25_26_Pro.jpg\",\"contacts\\/832_12_WIN_20230511_20_25_34_Pro.jpg\",\"contacts\\/331_12_WIN_20230609_14_52_10_Pro.jpg\"]', 'Larsen Giles Co1', 3, 1633512351, '+1 (748) 151-2826123', 'nuhitezyno@mailinator.com1', NULL, 'Accusamus amet volu1', 'active', 1, '2023-09-10 14:23:56', '2023-09-10 14:23:56', 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_categories`
--

CREATE TABLE `contact_categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` text,
  `parent_category_id` int DEFAULT NULL,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deletable` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_categories`
--

INSERT INTO `contact_categories` (`id`, `name`, `details`, `parent_category_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deletable`, `deleted_at`) VALUES
(1, 'Customer', 'Customer will buy products.', NULL, 1, 1, '2023-09-03 17:39:39', '2023-09-04 19:30:32', 0, NULL),
(2, 'Vendor', 'Comany will purchase products from Vendor', NULL, 1, 1, '2023-09-21 17:19:49', '2023-09-21 17:19:49', 0, NULL),
(3, 'Delivery Person', 'Ships the products', NULL, 1, 1, '2023-09-03 18:14:20', '2023-09-08 16:09:41', 0, NULL),
(4, 'Purchase Delivery Person', 'Deliver Only Purchased Products', 3, 1, 1, '2023-09-21 17:26:55', '2023-09-21 17:26:55', 1, NULL),
(5, 'Sale Delivery Person', 'Deliver Only Sold Products', 3, 1, 1, '2023-09-21 17:26:55', '2023-09-21 17:26:55', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` int NOT NULL,
  `module` varchar(100) NOT NULL,
  `module_id` int NOT NULL,
  `operation` varchar(50) NOT NULL,
  `previous` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `after` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `user_id` int NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `module`, `module_id`, `operation`, `previous`, `after`, `user_id`, `ip_address`, `created_at`) VALUES
(23, 'Role', 6, 'Edit', '{\"id\":6,\"role_name\":\"Seller\",\"details\":\"Owner of a shop123\",\"deletable\":1,\"created_by\":1,\"created_at\":\"2023-08-25T11:32:30.000000Z\",\"updated_by\":0,\"updated_at\":\"2023-08-26T00:07:27.000000Z\"}', '{\"id\":6,\"role_name\":\"Seller\",\"details\":\"Owner of a shop\",\"deletable\":1,\"created_by\":1,\"created_at\":\"2023-08-25T11:32:30.000000Z\",\"updated_by\":0,\"updated_at\":\"2023-08-26T00:07:40.000000Z\"}', 0, '127.0.0.1', '2023-08-26 06:07:40'),
(24, 'Role', 6, 'Edit', '{\"id\":6,\"role_name\":\"Seller\",\"details\":\"Owner of a shop\",\"deletable\":1,\"created_by\":1,\"created_at\":\"2023-08-25T11:32:30.000000Z\",\"updated_by\":0,\"updated_at\":\"2023-08-26T00:07:40.000000Z\"}', '{\"id\":6,\"role_name\":\"Seller\",\"details\":\"Owner of a shop\",\"deletable\":1,\"created_by\":1,\"created_at\":\"2023-08-25T11:32:30.000000Z\",\"updated_by\":0,\"updated_at\":\"2023-08-26T00:15:03.000000Z\"}', 0, '127.0.0.1', '2023-08-26 06:15:03'),
(25, 'Branch', 5, 'Create', NULL, '{\"name\":\"test history\",\"location\":\"hfgh123\",\"details\":\"test history details\",\"created_by\":0,\"created_at\":\"2023-08-26T00:44:06.000000Z\",\"updated_by\":0,\"updated_at\":\"2023-08-26T00:44:06.000000Z\",\"id\":5}', 0, '127.0.0.1', '2023-08-26 06:44:06'),
(26, 'Branch', 5, 'Delete', '{\"id\":5,\"name\":\"test history\",\"details\":\"test history details\",\"location\":\"hfgh123\",\"deletable\":1,\"created_by\":0,\"updated_by\":0,\"created_at\":\"2023-08-26T00:44:06.000000Z\",\"updated_at\":\"2023-08-26T00:44:06.000000Z\"}', NULL, 0, '127.0.0.1', '2023-08-27 20:20:23'),
(27, 'Role', 1, 'Edit', '{\"id\":1,\"role_name\":\"Super Admin\",\"details\":\"Have All The Previlages\",\"deletable\":0,\"created_by\":1,\"created_at\":\"2023-08-24T00:39:01.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-25T21:57:26.000000Z\"}', '{\"id\":1,\"role_name\":\"Super Admin\",\"details\":\"Have All The Previlages\",\"deletable\":0,\"created_by\":1,\"created_at\":\"2023-08-24T00:39:01.000000Z\",\"updated_by\":0,\"updated_at\":\"2023-08-27T14:59:53.000000Z\"}', 0, '127.0.0.1', '2023-08-27 20:59:53'),
(28, 'Role', 1, 'Edit', '{\"id\":1,\"role_name\":\"Super Admin\",\"details\":\"Have All The Previlages\",\"deletable\":0,\"created_by\":1,\"created_at\":\"2023-08-24T00:39:01.000000Z\",\"updated_by\":0,\"updated_at\":\"2023-08-27T14:59:53.000000Z\"}', '{\"id\":1,\"role_name\":\"Super Admin\",\"details\":\"Have All The Previlages1\",\"deletable\":0,\"created_by\":1,\"created_at\":\"2023-08-24T00:39:01.000000Z\",\"updated_by\":0,\"updated_at\":\"2023-08-27T20:28:55.000000Z\"}', 0, '127.0.0.1', '2023-08-28 02:28:55'),
(29, 'Role', 1, 'Edit', '{\"id\":1,\"role_name\":\"Super Admin\",\"details\":\"Have All The Previlages1\",\"deletable\":0,\"created_by\":1,\"created_at\":\"2023-08-24T00:39:01.000000Z\",\"updated_by\":0,\"updated_at\":\"2023-08-27T20:28:55.000000Z\"}', '{\"id\":1,\"role_name\":\"Super Admin\",\"details\":\"Have All The Previlages\",\"deletable\":0,\"created_by\":1,\"created_at\":\"2023-08-24T00:39:01.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-27T20:29:12.000000Z\"}', 1, '127.0.0.1', '2023-08-28 02:29:12'),
(30, 'Role', 1, 'Edit', '{\"id\":1,\"role_name\":\"Super Admin\",\"details\":\"Have All The Previlages\",\"deletable\":0,\"created_by\":1,\"created_at\":\"2023-08-24T00:39:01.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-27T20:29:12.000000Z\"}', '{\"id\":1,\"role_name\":\"Super Admin3\",\"details\":\"Have All The Previlages\",\"deletable\":0,\"created_by\":1,\"created_at\":\"2023-08-24T00:39:01.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-27T20:29:16.000000Z\"}', 1, '127.0.0.1', '2023-08-28 02:29:16'),
(31, 'Role', 1, 'Edit', '{\"id\":1,\"role_name\":\"Super Admin3\",\"details\":\"Have All The Previlages\",\"deletable\":0,\"created_by\":1,\"created_at\":\"2023-08-24T00:39:01.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-27T20:29:16.000000Z\"}', '{\"id\":1,\"role_name\":\"Super Admin\",\"details\":\"Have All The Previlages\",\"deletable\":0,\"created_by\":1,\"created_at\":\"2023-08-24T00:39:01.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-27T20:29:20.000000Z\"}', 1, '127.0.0.1', '2023-08-28 02:29:20'),
(32, 'Role', 9, 'Create', NULL, '{\"role_name\":\"role1\",\"details\":\"role1 desc\",\"created_by\":1,\"created_at\":\"2023-08-27T20:29:31.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-27T20:29:31.000000Z\",\"id\":9}', 1, '127.0.0.1', '2023-08-28 02:29:31'),
(33, 'Role', 9, 'Edit', '{\"id\":9,\"role_name\":\"role1\",\"details\":\"role1 desc\",\"deletable\":1,\"created_by\":1,\"created_at\":\"2023-08-27T20:29:31.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-27T20:29:31.000000Z\"}', '{\"id\":9,\"role_name\":\"role\",\"details\":\"role1 desc\",\"deletable\":1,\"created_by\":1,\"created_at\":\"2023-08-27T20:29:31.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-27T20:29:38.000000Z\"}', 1, '127.0.0.1', '2023-08-28 02:29:38'),
(34, 'Role', 9, 'Edit', '{\"id\":9,\"role_name\":\"role\",\"details\":\"role1 desc\",\"deletable\":1,\"created_by\":1,\"created_at\":\"2023-08-27T20:29:31.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-27T20:29:38.000000Z\"}', '{\"id\":9,\"role_name\":\"role\",\"details\":\"role desc\",\"deletable\":1,\"created_by\":1,\"created_at\":\"2023-08-27T20:29:31.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-27T20:29:42.000000Z\"}', 1, '127.0.0.1', '2023-08-28 02:29:42'),
(35, 'Role', 9, 'Delete', '{\"id\":9,\"role_name\":\"role\",\"details\":\"role desc\",\"deletable\":1,\"created_by\":1,\"created_at\":\"2023-08-27T20:29:31.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-27T20:29:42.000000Z\"}', NULL, 1, '127.0.0.1', '2023-08-28 02:29:43'),
(36, 'User', 5, 'Create', NULL, '{\"name\":\"Tahmeed Mahbub\",\"phone\":\"1633394589\",\"email\":\"tahmidmahbub168@gmail.com\",\"verified\":\"yes\",\"branch_id\":1,\"role_id\":1,\"date_of_birth\":\"3456-02-12\",\"address\":\"118\\/6 (Infront of mount hermann high school), North Kafrul, Kafrul, Dhaka-1206\",\"username\":\"admin1\",\"phone_1\":\"01678054660\",\"company\":\"American Internation University - Bangladesh\",\"joining_date\":\"0543-05-04\",\"created_by\":1,\"created_at\":\"2023-08-28T17:11:35.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-28T17:11:35.000000Z\",\"id\":5}', 1, '127.0.0.1', '2023-08-28 23:11:35'),
(37, 'Branch', 6, 'Create', NULL, '{\"name\":\"Gulshan\",\"location\":\"Gulshan-1, Dhaka\",\"details\":null,\"created_by\":1,\"created_at\":\"2023-08-28T17:51:41.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-28T17:51:41.000000Z\",\"id\":6}', 1, '127.0.0.1', '2023-08-28 23:51:41'),
(38, 'User', 6, 'Create', NULL, '{\"name\":\"Mahbub Faruk\",\"phone\":\"1678054660\",\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"branch_id\":\"6\",\"role_id\":\"6\",\"date_of_birth\":null,\"address\":\"201 MU BAF\",\"username\":\"admin2\",\"phone_1\":\"01678054660\",\"company\":\"developer\",\"joining_date\":null,\"created_by\":1,\"created_at\":\"2023-08-28T18:25:40.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-28T18:25:40.000000Z\",\"id\":6}', 1, '127.0.0.1', '2023-08-29 00:25:40'),
(39, 'User', 7, 'Create', NULL, '{\"name\":\"Tahmeed Mahbub\",\"phone\":\"1633394589\",\"email\":\"tahmidmahbub168@gmail.com\",\"verified\":\"yes\",\"branch_id\":\"1\",\"role_id\":\"1\",\"date_of_birth\":null,\"address\":\"118\\/6 (Infront of mount hermann high school), North Kafrul, Kafrul, Dhaka-1206\",\"username\":\"admin3\",\"phone_1\":\"454879874\",\"company\":\"American Internation University - Bangladesh\",\"joining_date\":null,\"created_by\":1,\"created_at\":\"2023-08-29T15:01:16.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-29T15:01:16.000000Z\",\"id\":7}', 1, '127.0.0.1', '2023-08-29 21:01:16'),
(40, 'User', 8, 'Create', NULL, '{\"name\":\"Tahmeed Mahbub\",\"phone\":\"1633394589\",\"email\":\"tahmidmahbub168@gmail.com\",\"verified\":\"yes\",\"branch_id\":\"6\",\"role_id\":\"6\",\"date_of_birth\":null,\"address\":\"118\\/6 (Infront of mount hermann high school), North Kafrul, Kafrul, Dhaka-1206\",\"username\":\"admin4\",\"phone_1\":\"5345345436\",\"company\":\"American Internation University - Bangladesh\",\"joining_date\":null,\"created_by\":1,\"created_at\":\"2023-08-29T15:01:59.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-29T15:01:59.000000Z\",\"id\":8}', 1, '127.0.0.1', '2023-08-29 21:01:59'),
(41, 'User', 9, 'Create', NULL, '{\"name\":\"Mahbub Faruk\",\"phone\":\"1678054660\",\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"branch_id\":\"1\",\"role_id\":\"6\",\"date_of_birth\":null,\"address\":\"201 MU BAF\",\"username\":\"admin5\",\"phone_1\":null,\"company\":\"Bangladesh Air Force\",\"joining_date\":null,\"created_by\":1,\"created_at\":\"2023-08-29T15:03:15.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-29T15:03:15.000000Z\",\"id\":9,\"image\":\"images\\/users\\/user_admin5png\"}', 1, '127.0.0.1', '2023-08-29 21:03:15'),
(42, 'User', 10, 'Create', NULL, '{\"name\":\"Tahmeed Mahbub\",\"phone\":\"1633394589\",\"email\":\"tahmidmahbub168@gmail.com\",\"verified\":\"yes\",\"branch_id\":\"6\",\"role_id\":\"1\",\"date_of_birth\":null,\"address\":\"118\\/6 (Infront of mount hermann high school), North Kafrul, Kafrul, Dhaka-1206\",\"username\":\"admin6\",\"phone_1\":\"589478574\",\"company\":\"American Internation University - Bangladesh\",\"joining_date\":null,\"created_by\":1,\"created_at\":\"2023-08-29T15:05:00.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-29T15:05:00.000000Z\",\"id\":10}', 1, '127.0.0.1', '2023-08-29 21:05:00'),
(43, 'User', 11, 'Create', NULL, '{\"name\":\"Tahmeed Mahbub\",\"phone\":\"1633394589\",\"email\":\"tahmidmahbub168@gmail.com\",\"verified\":\"yes\",\"branch_id\":\"6\",\"role_id\":\"6\",\"date_of_birth\":null,\"address\":\"118\\/6 (Infront of mount hermann high school), North Kafrul, Kafrul, Dhaka-1206\",\"username\":\"admin7\",\"phone_1\":null,\"company\":\"American Internation University - Bangladesh\",\"joining_date\":null,\"created_by\":1,\"created_at\":\"2023-08-29T15:05:42.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-29T15:05:42.000000Z\",\"id\":11,\"image\":\"assets\\/images\\/users\\/user_admin7.png\"}', 1, '127.0.0.1', '2023-08-29 21:05:42'),
(44, 'User', 12, 'Create', NULL, '{\"name\":\"Mahbub Faruk\",\"phone\":\"1678054660\",\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"branch_id\":\"1\",\"role_id\":\"6\",\"date_of_birth\":null,\"address\":\"201 MU BAF\",\"username\":\"admin8\",\"phone_1\":\"rtreterfgre\",\"company\":\"Bangladesh Air Force\",\"joining_date\":null,\"created_by\":1,\"created_at\":\"2023-08-29T15:07:33.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-29T15:07:33.000000Z\",\"id\":12}', 1, '127.0.0.1', '2023-08-29 21:07:33'),
(45, 'User', 13, 'Create', NULL, '{\"name\":\"Mahbub Faruk\",\"phone\":\"1678054660\",\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"branch_id\":\"1\",\"role_id\":\"1\",\"date_of_birth\":null,\"address\":\"201 MU BAF\",\"username\":\"admin9\",\"phone_1\":\"01633394589\",\"company\":\"Bangladesh Air Force\",\"joining_date\":null,\"created_by\":1,\"created_at\":\"2023-08-29T15:08:16.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-29T15:08:16.000000Z\",\"image\":\"users\\/user_admin9.png\",\"id\":13}', 1, '127.0.0.1', '2023-08-29 21:08:16'),
(46, 'User', 5, 'Delete', '{\"id\":5,\"name\":\"Tahmeed Mahbub\",\"image\":\"users\\/user.jpg\",\"username\":\"admin1\",\"email\":\"tahmidmahbub168@gmail.com\",\"verified\":\"yes\",\"role_id\":1,\"branch_id\":1,\"company\":\"American Internation University - Bangladesh\",\"details\":null,\"date_of_birth\":\"3456-02-12\",\"joining_date\":\"0543-05-04\",\"phone\":1633394589,\"phone_1\":\"01678054660\",\"address\":\"118\\/6 (Infront of mount hermann high school), North Kafrul, Kafrul, Dhaka-1206\",\"deletable\":1,\"created_at\":\"2023-08-28T17:11:35.000000Z\",\"updated_at\":\"2023-08-28T17:11:35.000000Z\",\"created_by\":1,\"updated_by\":1}', NULL, 1, '127.0.0.1', '2023-08-29 21:11:31'),
(47, 'User', 6, 'Delete', '{\"id\":6,\"name\":\"Mahbub Faruk\",\"image\":\"users\\/user.jpg\",\"username\":\"admin2\",\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"role_id\":6,\"branch_id\":6,\"company\":\"developer\",\"details\":null,\"date_of_birth\":null,\"joining_date\":null,\"phone\":1678054660,\"phone_1\":\"01678054660\",\"address\":\"201 MU BAF\",\"deletable\":1,\"created_at\":\"2023-08-28T18:25:40.000000Z\",\"updated_at\":\"2023-08-28T18:25:40.000000Z\",\"created_by\":1,\"updated_by\":1}', NULL, 1, '127.0.0.1', '2023-08-29 21:11:34'),
(48, 'User', 7, 'Delete', '{\"id\":7,\"name\":\"Tahmeed Mahbub\",\"image\":\"users\\/user.jpg\",\"username\":\"admin3\",\"email\":\"tahmidmahbub168@gmail.com\",\"verified\":\"yes\",\"role_id\":1,\"branch_id\":1,\"company\":\"American Internation University - Bangladesh\",\"details\":null,\"date_of_birth\":null,\"joining_date\":null,\"phone\":1633394589,\"phone_1\":\"454879874\",\"address\":\"118\\/6 (Infront of mount hermann high school), North Kafrul, Kafrul, Dhaka-1206\",\"deletable\":1,\"created_at\":\"2023-08-29T15:01:16.000000Z\",\"updated_at\":\"2023-08-29T15:01:16.000000Z\",\"created_by\":1,\"updated_by\":1}', NULL, 1, '127.0.0.1', '2023-08-29 21:11:35'),
(49, 'User', 8, 'Delete', '{\"id\":8,\"name\":\"Tahmeed Mahbub\",\"image\":\"users\\/user.jpg\",\"username\":\"admin4\",\"email\":\"tahmidmahbub168@gmail.com\",\"verified\":\"yes\",\"role_id\":6,\"branch_id\":6,\"company\":\"American Internation University - Bangladesh\",\"details\":null,\"date_of_birth\":null,\"joining_date\":null,\"phone\":1633394589,\"phone_1\":\"5345345436\",\"address\":\"118\\/6 (Infront of mount hermann high school), North Kafrul, Kafrul, Dhaka-1206\",\"deletable\":1,\"created_at\":\"2023-08-29T15:01:59.000000Z\",\"updated_at\":\"2023-08-29T15:01:59.000000Z\",\"created_by\":1,\"updated_by\":1}', NULL, 1, '127.0.0.1', '2023-08-29 21:11:36'),
(50, 'User', 9, 'Delete', '{\"id\":9,\"name\":\"Mahbub Faruk\",\"image\":\"users\\/user.jpg\",\"username\":\"admin5\",\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"role_id\":6,\"branch_id\":1,\"company\":\"Bangladesh Air Force\",\"details\":null,\"date_of_birth\":null,\"joining_date\":null,\"phone\":1678054660,\"phone_1\":null,\"address\":\"201 MU BAF\",\"deletable\":1,\"created_at\":\"2023-08-29T15:03:15.000000Z\",\"updated_at\":\"2023-08-29T15:03:15.000000Z\",\"created_by\":1,\"updated_by\":1}', NULL, 1, '127.0.0.1', '2023-08-29 21:11:37'),
(51, 'User', 10, 'Delete', '{\"id\":10,\"name\":\"Tahmeed Mahbub\",\"image\":\"users\\/user.jpg\",\"username\":\"admin6\",\"email\":\"tahmidmahbub168@gmail.com\",\"verified\":\"yes\",\"role_id\":1,\"branch_id\":6,\"company\":\"American Internation University - Bangladesh\",\"details\":null,\"date_of_birth\":null,\"joining_date\":null,\"phone\":1633394589,\"phone_1\":\"589478574\",\"address\":\"118\\/6 (Infront of mount hermann high school), North Kafrul, Kafrul, Dhaka-1206\",\"deletable\":1,\"created_at\":\"2023-08-29T15:05:00.000000Z\",\"updated_at\":\"2023-08-29T15:05:00.000000Z\",\"created_by\":1,\"updated_by\":1}', NULL, 1, '127.0.0.1', '2023-08-29 21:11:38'),
(52, 'User', 11, 'Delete', '{\"id\":11,\"name\":\"Tahmeed Mahbub\",\"image\":\"users\\/user.jpg\",\"username\":\"admin7\",\"email\":\"tahmidmahbub168@gmail.com\",\"verified\":\"yes\",\"role_id\":6,\"branch_id\":6,\"company\":\"American Internation University - Bangladesh\",\"details\":null,\"date_of_birth\":null,\"joining_date\":null,\"phone\":1633394589,\"phone_1\":null,\"address\":\"118\\/6 (Infront of mount hermann high school), North Kafrul, Kafrul, Dhaka-1206\",\"deletable\":1,\"created_at\":\"2023-08-29T15:05:42.000000Z\",\"updated_at\":\"2023-08-29T15:05:42.000000Z\",\"created_by\":1,\"updated_by\":1}', NULL, 1, '127.0.0.1', '2023-08-29 21:11:39'),
(53, 'User', 12, 'Delete', '{\"id\":12,\"name\":\"Mahbub Faruk\",\"image\":\"users\\/user.jpg\",\"username\":\"admin8\",\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"role_id\":6,\"branch_id\":1,\"company\":\"Bangladesh Air Force\",\"details\":null,\"date_of_birth\":null,\"joining_date\":null,\"phone\":1678054660,\"phone_1\":\"rtreterfgre\",\"address\":\"201 MU BAF\",\"deletable\":1,\"created_at\":\"2023-08-29T15:07:33.000000Z\",\"updated_at\":\"2023-08-29T15:07:33.000000Z\",\"created_by\":1,\"updated_by\":1}', NULL, 1, '127.0.0.1', '2023-08-29 21:11:48'),
(54, 'User', 14, 'Create', NULL, '{\"name\":\"Mahbub Faruk\",\"phone\":1678054660,\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"branch_id\":\"1\",\"role_id\":\"1\",\"date_of_birth\":\"2023-08-08\",\"address\":\"201 MU BAF\",\"username\":\"admin9\",\"phone_1\":\"01633394589\",\"company\":\"Bangladesh Air Force\",\"joining_date\":\"2023-08-02\",\"created_by\":1,\"created_at\":\"2023-08-31T16:40:29.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-31T16:40:29.000000Z\",\"image\":\"user_nid\\/nid_admin9.png\",\"id\":14}', 1, '127.0.0.1', '2023-08-31 22:40:29'),
(55, 'User', 15, 'Create', NULL, '{\"name\":\"Mahbub Faruk\",\"phone\":1678054660,\"email\":\"123mahbub168@gmail.com\",\"verified\":\"yes\",\"branch_id\":\"1\",\"role_id\":\"1\",\"date_of_birth\":\"2023-08-08\",\"address\":\"201 MU BAF\",\"username\":\"admin9\",\"phone_1\":\"01633394589\",\"company\":\"Bangladesh Air Force\",\"joining_date\":\"2023-08-02\",\"created_by\":1,\"created_at\":\"2023-08-31T16:41:59.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-31T16:41:59.000000Z\",\"image\":\"user_nid\\/nid_admin9.png\",\"id\":15}', 1, '127.0.0.1', '2023-08-31 22:41:59'),
(56, 'User', 15, 'Create', NULL, '{\"id\":15,\"name\":\"Mahbub Faruk\",\"image\":\"user_nid\\/nid_admin9.png\",\"username\":\"admin9\",\"email\":\"23533@gmail.com\",\"verified\":\"yes\",\"role_id\":\"1\",\"branch_id\":\"1\",\"company\":\"Bangladesh Air Force\",\"details\":null,\"date_of_birth\":\"2023-08-08\",\"joining_date\":\"2023-08-02\",\"phone\":4561236998,\"phone_1\":\"01633394589\",\"address\":\"201 MU BAF\",\"deletable\":1,\"created_at\":\"2023-08-31T16:47:01.000000Z\",\"updated_at\":\"2023-08-31T16:47:01.000000Z\",\"created_by\":1,\"updated_by\":1}', 1, '127.0.0.1', '2023-08-31 22:47:01'),
(57, 'User', 15, 'Create', NULL, '{\"id\":15,\"name\":\"Mahbub Faruk\",\"image\":\"user_nid\\/nid_admin9.png\",\"username\":\"admin9\",\"email\":\"23533@gmail.com\",\"verified\":\"yes\",\"role_id\":\"6\",\"branch_id\":\"6\",\"company\":\"Bangladesh Air Force\",\"details\":null,\"date_of_birth\":\"2023-08-08\",\"joining_date\":\"2023-08-02\",\"phone\":4561236998,\"phone_1\":\"01633394589\",\"address\":\"201 MU BAF\",\"deletable\":1,\"created_at\":\"2023-08-31T16:47:14.000000Z\",\"updated_at\":\"2023-08-31T16:47:14.000000Z\",\"created_by\":1,\"updated_by\":1}', 1, '127.0.0.1', '2023-08-31 22:47:14'),
(58, 'User', 15, 'Delete', '{\"id\":15,\"name\":\"Mahbub Faruk\",\"image\":\"user_nid\\/nid_admin9.png\",\"username\":\"admin9\",\"email\":\"23533@gmail.com\",\"verified\":\"yes\",\"role_id\":6,\"branch_id\":6,\"company\":\"Bangladesh Air Force\",\"details\":null,\"date_of_birth\":\"2023-08-08\",\"joining_date\":\"2023-08-02\",\"phone\":4561236998,\"phone_1\":\"01633394589\",\"address\":\"201 MU BAF\",\"deletable\":1,\"created_at\":\"2023-08-31T16:47:14.000000Z\",\"updated_at\":\"2023-08-31T16:47:14.000000Z\",\"created_by\":1,\"updated_by\":1}', NULL, 1, '127.0.0.1', '2023-08-31 22:47:25'),
(59, 'User', 14, 'Delete', '{\"id\":14,\"name\":\"Mahbub Faruk\",\"image\":\"user_nid\\/nid_admin9.png\",\"username\":\"admin9\",\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"role_id\":1,\"branch_id\":1,\"company\":\"Bangladesh Air Force\",\"details\":null,\"date_of_birth\":\"2023-08-08\",\"joining_date\":\"2023-08-02\",\"phone\":1678054660,\"phone_1\":\"01633394589\",\"address\":\"201 MU BAF\",\"deletable\":1,\"created_at\":\"2023-08-31T16:40:29.000000Z\",\"updated_at\":\"2023-08-31T16:40:29.000000Z\",\"created_by\":1,\"updated_by\":1}', NULL, 1, '127.0.0.1', '2023-08-31 22:47:27'),
(60, 'Role', 10, 'Create', NULL, '{\"role_name\":\"123\",\"details\":\"4234\",\"manager_role\":\"6\",\"created_by\":1,\"created_at\":\"2023-08-31T17:29:18.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-31T17:29:18.000000Z\",\"id\":10}', 1, '127.0.0.1', '2023-08-31 23:29:18'),
(61, 'Role', 11, 'Create', NULL, '{\"role_name\":\"Super Admin123\",\"details\":\"Have All The Previlages123\",\"manager_role\":\"10\",\"created_by\":1,\"created_at\":\"2023-08-31T17:29:58.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-31T17:29:58.000000Z\",\"id\":11}', 1, '127.0.0.1', '2023-08-31 23:29:58'),
(62, 'Role', 12, 'Create', NULL, '{\"role_name\":\"Super Admin\",\"details\":\"432re32rd\",\"manager_role\":\"11\",\"created_by\":1,\"created_at\":\"2023-08-31T17:30:06.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-31T17:30:06.000000Z\",\"id\":12}', 1, '127.0.0.1', '2023-08-31 23:30:06'),
(63, 'Role', 13, 'Create', NULL, '{\"role_name\":\"Super Admin\",\"details\":\"Owner of a shop\",\"manager_role\":null,\"created_by\":1,\"created_at\":\"2023-08-31T17:32:30.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-31T17:32:30.000000Z\",\"id\":13}', 1, '127.0.0.1', '2023-08-31 23:32:30'),
(64, 'Role', 10, 'Edit', '{\"id\":10,\"role_name\":\"123\",\"details\":\"4234\",\"manager_role\":6,\"deletable\":1,\"created_by\":1,\"created_at\":\"2023-08-31T17:29:18.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-31T17:29:18.000000Z\"}', '{\"id\":10,\"role_name\":\"123\",\"details\":null,\"manager_role\":\"12\",\"deletable\":1,\"created_by\":1,\"created_at\":\"2023-08-31T17:29:18.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-31T17:38:31.000000Z\"}', 1, '127.0.0.1', '2023-08-31 23:38:31'),
(65, 'User', 16, 'Create', NULL, '{\"name\":\"Tahmeed Mahbub\",\"phone\":1633394589,\"email\":\"tahmidmahbub168@gmail.com\",\"verified\":\"yes\",\"branch_id\":\"6\",\"role_id\":\"6\",\"manager_role_id\":\"1\",\"manager_id\":\"13\",\"date_of_birth\":null,\"address\":\"118\\/6 (Infront of mount hermann high school), North Kafrul, Kafrul, Dhaka-1206\",\"username\":\"admin10\",\"phone_1\":null,\"company\":\"American Internation University - Bangladesh\",\"joining_date\":null,\"created_by\":1,\"created_at\":\"2023-08-31T19:27:37.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-31T19:27:37.000000Z\",\"id\":16}', 1, '127.0.0.1', '2023-09-01 01:27:37'),
(66, 'User', 16, 'Create', NULL, '{\"id\":16,\"name\":\"Tahmeed Mahbub\",\"image\":\"users\\/user.jpg\",\"username\":\"admin10\",\"email\":\"tahmidmahbub168@gmail.com\",\"verified\":\"yes\",\"role_id\":\"6\",\"branch_id\":\"6\",\"manager_role_id\":1,\"manager_id\":13,\"company\":\"American Internation University - Bangladesh\",\"details\":null,\"date_of_birth\":null,\"joining_date\":null,\"phone\":1633394589,\"phone_1\":null,\"address\":\"118\\/6 (Infront of mount hermann high school), North Kafrul, Kafrul, Dhaka-1206\",\"deletable\":1,\"created_at\":\"2023-08-31T20:18:09.000000Z\",\"updated_at\":\"2023-08-31T20:18:09.000000Z\",\"created_by\":1,\"updated_by\":1}', 1, '127.0.0.1', '2023-09-01 02:18:09'),
(67, 'User', 16, 'Create', NULL, '{\"id\":16,\"name\":\"Tahmeed Mahbub\",\"image\":\"users\\/user.jpg\",\"username\":\"admin10\",\"email\":\"tahmidmahbub168@gmail.com\",\"verified\":\"yes\",\"role_id\":\"6\",\"branch_id\":\"6\",\"manager_role_id\":\"6\",\"manager_id\":\"16\",\"company\":\"American Internation University - Bangladesh\",\"details\":null,\"date_of_birth\":null,\"joining_date\":null,\"phone\":1633394589,\"phone_1\":null,\"address\":\"118\\/6 (Infront of mount hermann high school), North Kafrul, Kafrul, Dhaka-1206\",\"deletable\":1,\"created_at\":\"2023-08-31T20:19:58.000000Z\",\"updated_at\":\"2023-08-31T20:19:58.000000Z\",\"created_by\":1,\"updated_by\":1}', 1, '127.0.0.1', '2023-09-01 02:19:58'),
(68, 'User', 16, 'Delete', '{\"id\":16,\"name\":\"Tahmeed Mahbub\",\"image\":\"users\\/user.jpg\",\"username\":\"admin10\",\"email\":\"tahmidmahbub168@gmail.com\",\"verified\":\"yes\",\"role_id\":6,\"branch_id\":6,\"manager_role_id\":6,\"manager_id\":16,\"company\":\"American Internation University - Bangladesh\",\"details\":null,\"date_of_birth\":null,\"joining_date\":null,\"phone\":1633394589,\"phone_1\":null,\"address\":\"118\\/6 (Infront of mount hermann high school), North Kafrul, Kafrul, Dhaka-1206\",\"deletable\":1,\"created_at\":\"2023-08-31T20:19:58.000000Z\",\"updated_at\":\"2023-08-31T20:19:58.000000Z\",\"created_by\":1,\"updated_by\":1,\"deleted_at\":null}', NULL, 1, '127.0.0.1', '2023-09-01 02:28:45'),
(69, 'Role', 10, 'Delete', '{\"id\":10,\"role_name\":\"123\",\"details\":null,\"manager_role_id\":1,\"deletable\":1,\"created_by\":1,\"created_at\":\"2023-08-31T17:29:18.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-31T17:38:31.000000Z\",\"deleted_at\":null}', NULL, 1, '127.0.0.1', '2023-09-01 02:31:41'),
(70, 'Role', 11, 'Delete', '{\"id\":11,\"role_name\":\"Super Admin123\",\"details\":\"Have All The Previlages123\",\"manager_role_id\":10,\"deletable\":1,\"created_by\":1,\"created_at\":\"2023-08-31T17:29:58.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-31T17:29:58.000000Z\",\"deleted_at\":null}', NULL, 1, '127.0.0.1', '2023-09-01 02:31:44'),
(71, 'Role', 12, 'Delete', '{\"id\":12,\"role_name\":\"Super Admin\",\"details\":\"432re32rd\",\"manager_role_id\":null,\"deletable\":1,\"created_by\":1,\"created_at\":\"2023-08-31T17:30:06.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-31T17:30:06.000000Z\",\"deleted_at\":null}', NULL, 1, '127.0.0.1', '2023-09-01 02:31:45'),
(72, 'Role', 13, 'Delete', '{\"id\":13,\"role_name\":\"Super Admin\",\"details\":\"Owner of a shop\",\"manager_role_id\":null,\"deletable\":1,\"created_by\":1,\"created_at\":\"2023-08-31T17:32:30.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-08-31T17:32:30.000000Z\",\"deleted_at\":null}', NULL, 1, '127.0.0.1', '2023-09-01 02:31:46'),
(73, 'User', 13, 'Create', NULL, '{\"id\":13,\"name\":\"Mahbub Faruk\",\"image\":\"users\\/user_admin9.png\",\"username\":\"admin9\",\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"role_id\":\"6\",\"branch_id\":\"1\",\"manager_role_id\":\"1\",\"manager_id\":\"1\",\"company\":\"Bangladesh Air Force\",\"details\":null,\"date_of_birth\":\"2023-08-08\",\"joining_date\":\"2023-08-02\",\"phone\":1678054660,\"phone_1\":\"01633394589\",\"address\":\"201 MU BAF\",\"deletable\":1,\"created_at\":\"2023-08-31T20:41:36.000000Z\",\"updated_at\":\"2023-08-31T20:41:36.000000Z\",\"created_by\":1,\"updated_by\":1,\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-01 02:41:36'),
(74, 'User', 13, 'Edit', '{\"id\":13,\"name\":\"Mahbub Faruk\",\"image\":\"users\\/user_admin9.png\",\"username\":\"admin9\",\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"role_id\":6,\"branch_id\":1,\"manager_role_id\":1,\"manager_id\":1,\"company\":\"Bangladesh Air Force\",\"details\":null,\"date_of_birth\":\"2023-08-08\",\"joining_date\":\"2023-08-02\",\"phone\":1678054660,\"phone_1\":\"01633394589\",\"address\":\"201 MU BAF\",\"deletable\":1,\"created_at\":\"2023-08-31T20:41:36.000000Z\",\"updated_at\":\"2023-08-31T20:41:36.000000Z\",\"created_by\":1,\"updated_by\":1,\"deleted_at\":null}', '{\"id\":13,\"name\":\"Mahbub Faruk\",\"image\":\"users\\/user_admin9.png\",\"username\":\"admin9\",\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"role_id\":\"6\",\"branch_id\":\"6\",\"manager_role_id\":\"1\",\"manager_id\":\"13\",\"company\":\"Bangladesh Air Force\",\"details\":null,\"date_of_birth\":\"2023-08-08\",\"joining_date\":\"2023-08-02\",\"phone\":1678054660,\"phone_1\":\"01633394589\",\"address\":\"201 MU BAF\",\"deletable\":1,\"created_at\":\"2023-08-31T20:44:16.000000Z\",\"updated_at\":\"2023-08-31T20:44:16.000000Z\",\"created_by\":1,\"updated_by\":1,\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-01 02:44:16'),
(75, 'User', 13, 'Edit', '{\"id\":13,\"name\":\"Mahbub Faruk\",\"image\":\"users\\/user_admin9.png\",\"username\":\"admin9\",\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"role_id\":6,\"branch_id\":6,\"manager_role_id\":1,\"manager_id\":13,\"company\":\"Bangladesh Air Force\",\"details\":null,\"date_of_birth\":\"2023-08-08\",\"joining_date\":\"2023-08-02\",\"phone\":1678054660,\"phone_1\":\"01633394589\",\"address\":\"201 MU BAF\",\"deletable\":1,\"created_at\":\"2023-08-31T20:44:16.000000Z\",\"updated_at\":\"2023-08-31T20:44:16.000000Z\",\"created_by\":1,\"updated_by\":1,\"deleted_at\":null}', '{\"id\":13,\"name\":\"Mahbub Faruk\",\"image\":\"users\\/user_admin9.png\",\"username\":\"admin9\",\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"role_id\":\"6\",\"branch_id\":\"6\",\"manager_role_id\":\"1\",\"manager_id\":\"1\",\"company\":\"Bangladesh Air Force\",\"details\":null,\"date_of_birth\":\"2023-08-08\",\"joining_date\":\"2023-08-02\",\"phone\":1678054660,\"phone_1\":\"01633394589\",\"address\":\"201 MU BAF\",\"deletable\":1,\"created_at\":\"2023-08-31T20:53:44.000000Z\",\"updated_at\":\"2023-08-31T20:53:44.000000Z\",\"created_by\":1,\"updated_by\":1,\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-01 02:53:44'),
(76, 'User', 13, 'Edit', '{\"id\":13,\"name\":\"Mahbub Faruk\",\"image\":\"users\\/user_admin9.png\",\"username\":\"admin9\",\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"nid_image\":null,\"role_id\":6,\"branch_id\":6,\"manager_role_id\":1,\"manager_id\":1,\"company\":\"Bangladesh Air Force\",\"details\":null,\"date_of_birth\":\"2023-08-08\",\"joining_date\":\"2023-08-02\",\"phone\":1678054660,\"phone_1\":\"01633394589\",\"address\":\"201 MU BAF\",\"deletable\":1,\"created_at\":\"2023-08-31T20:53:44.000000Z\",\"updated_at\":\"2023-08-31T20:53:44.000000Z\",\"created_by\":1,\"updated_by\":1,\"deleted_at\":null}', '{\"id\":13,\"name\":\"Mahbub Faruk\",\"image\":\"users\\/user_admin9.png\",\"username\":\"admin9\",\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"nid_image\":null,\"role_id\":\"6\",\"branch_id\":\"6\",\"manager_role_id\":\"1\",\"manager_id\":\"1\",\"company\":\"Bangladesh Air Force\",\"details\":null,\"date_of_birth\":\"2023-08-08\",\"joining_date\":\"2023-08-02\",\"phone\":1678054660,\"phone_1\":\"01633394589\",\"address\":\"201 MU BAF\",\"deletable\":1,\"created_at\":\"2023-08-31T21:23:57.000000Z\",\"updated_at\":\"2023-08-31T21:23:57.000000Z\",\"created_by\":1,\"updated_by\":1,\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-01 03:23:57'),
(77, 'User', 13, 'Edit', '{\"id\":13,\"name\":\"Mahbub Faruk\",\"image\":\"users\\/user_admin9.png\",\"username\":\"admin9\",\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"nid_image\":null,\"role_id\":6,\"branch_id\":6,\"manager_role_id\":1,\"manager_id\":1,\"company\":\"Bangladesh Air Force\",\"details\":null,\"date_of_birth\":\"2023-08-08\",\"joining_date\":\"2023-08-02\",\"phone\":1678054660,\"phone_1\":\"01633394589\",\"address\":\"201 MU BAF\",\"deletable\":1,\"created_at\":\"2023-08-31T21:23:57.000000Z\",\"updated_at\":\"2023-08-31T21:23:57.000000Z\",\"created_by\":1,\"updated_by\":1,\"deleted_at\":null}', '{\"id\":13,\"name\":\"Mahbub Faruk\",\"image\":\"users\\/user_admin9.png\",\"username\":\"admin9\",\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"nid_image\":\"user_nid\\/nid_admin9.jpg\",\"role_id\":\"6\",\"branch_id\":\"6\",\"manager_role_id\":\"1\",\"manager_id\":\"1\",\"company\":\"Bangladesh Air Force\",\"details\":null,\"date_of_birth\":\"2023-08-08\",\"joining_date\":\"2023-08-02\",\"phone\":1678054660,\"phone_1\":\"01633394589\",\"address\":\"201 MU BAF\",\"deletable\":1,\"created_at\":\"2023-08-31T21:24:14.000000Z\",\"updated_at\":\"2023-08-31T21:24:14.000000Z\",\"created_by\":1,\"updated_by\":1,\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-01 03:24:14'),
(78, 'User', 1, 'Edit', '{\"id\":1,\"name\":\"Super Admin\",\"image\":\"users\\/user-8.jpg\",\"username\":\"admin\",\"email\":\"admin@erp.com\",\"verified\":\"yes\",\"nid_image\":null,\"role_id\":1,\"branch_id\":1,\"manager_role_id\":null,\"manager_id\":null,\"company\":null,\"details\":\"Owner of this project\",\"date_of_birth\":null,\"joining_date\":null,\"phone\":1987654321,\"phone_1\":null,\"address\":\"Dhaka, Bangladesh\",\"deletable\":0,\"created_at\":\"2023-08-26T01:50:01.000000Z\",\"updated_at\":\"2023-08-26T01:50:01.000000Z\",\"created_by\":1,\"updated_by\":1,\"deleted_at\":null}', '{\"id\":1,\"name\":\"Super Admin\",\"image\":\"users\\/user-8.jpg\",\"username\":\"admin\",\"email\":\"admin@erp.com\",\"verified\":\"yes\",\"nid_image\":\"user_nid\\/nid_admin.jpg\",\"role_id\":\"1\",\"branch_id\":\"1\",\"manager_role_id\":null,\"manager_id\":null,\"company\":null,\"details\":\"Owner of this project\",\"date_of_birth\":null,\"joining_date\":null,\"phone\":1987654321,\"phone_1\":null,\"address\":\"Dhaka, Bangladesh\",\"deletable\":0,\"created_at\":\"2023-08-31T21:31:06.000000Z\",\"updated_at\":\"2023-08-31T21:31:06.000000Z\",\"created_by\":1,\"updated_by\":1,\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-01 03:31:06'),
(79, 'User', 13, 'Edit', '{\"id\":13,\"name\":\"Mahbub Faruk\",\"image\":\"users\\/user_admin9.png\",\"username\":\"admin9\",\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"nid_image\":\"user_nid\\/nid_admin9.jpg\",\"role_id\":6,\"branch_id\":6,\"manager_role_id\":1,\"manager_id\":1,\"company\":\"Bangladesh Air Force\",\"details\":null,\"date_of_birth\":\"2023-08-08\",\"joining_date\":\"2023-08-02\",\"phone\":1678054660,\"phone_1\":\"01633394589\",\"address\":\"201 MU BAF\",\"deletable\":1,\"created_at\":\"2023-08-31T21:24:14.000000Z\",\"updated_at\":\"2023-08-31T21:24:14.000000Z\",\"created_by\":1,\"updated_by\":1,\"deleted_at\":null}', '{\"id\":13,\"name\":\"Mahbub Faruk\",\"image\":\"users\\/user_admin9.png\",\"username\":\"admin9\",\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"nid_image\":\"user_nid\\/nid_admin9.jpg\",\"role_id\":\"6\",\"branch_id\":\"6\",\"manager_role_id\":\"1\",\"manager_id\":\"1\",\"company\":\"Bangladesh Air Force\",\"details\":null,\"date_of_birth\":\"2023-08-08\",\"joining_date\":\"2023-08-02\",\"phone\":1678054660,\"phone_1\":\"01633394589\",\"address\":\"201 MU BAF\",\"deletable\":1,\"created_at\":\"2023-08-31T21:31:15.000000Z\",\"updated_at\":\"2023-08-31T21:31:15.000000Z\",\"created_by\":1,\"updated_by\":1,\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-01 03:31:15'),
(83, 'User', 13, 'Edit', '{\"password\":\"Changed\"}', '{\"password\":\"Changed\"}', 1, '127.0.0.1', '2023-09-01 04:14:51'),
(84, 'User', 13, 'Edit', '{\"password\":\"Added New\"}', '{\"password\":\"Changed Previous\"}', 1, '127.0.0.1', '2023-09-01 04:16:01'),
(85, 'User', 13, 'Edit', '{\"id\":13,\"name\":\"Mahbub Faruk\",\"image\":\"users\\/user_admin9.png\",\"username\":\"admin9\",\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"nid_image\":\"user_nid\\/nid_admin9.jpg\",\"role_id\":6,\"branch_id\":6,\"manager_role_id\":1,\"manager_id\":1,\"company\":\"Bangladesh Air Force\",\"details\":null,\"date_of_birth\":\"2023-08-08\",\"joining_date\":\"2023-08-02\",\"phone\":1678054660,\"phone_1\":\"01633394589\",\"address\":\"201 MU BAF\",\"deletable\":1,\"created_at\":\"2023-08-31T21:31:15.000000Z\",\"updated_at\":\"2023-08-31T22:16:01.000000Z\",\"created_by\":1,\"updated_by\":1,\"deleted_at\":null}', '{\"id\":13,\"name\":\"Mahbub Faruk\",\"image\":\"users\\/user_admin9.png\",\"username\":\"admin9\",\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"nid_image\":\"user_nid\\/nid_admin9.jpg\",\"role_id\":\"6\",\"branch_id\":\"6\",\"manager_role_id\":\"1\",\"manager_id\":\"1\",\"company\":\"Bangladesh Air Force\",\"details\":null,\"date_of_birth\":\"2023-08-08\",\"joining_date\":\"2023-08-02\",\"phone\":1678054660,\"phone_1\":\"01633394589\",\"address\":\"201 MU BAF\",\"deletable\":1,\"created_at\":\"2023-08-31T22:19:58.000000Z\",\"updated_at\":\"2023-08-31T22:19:58.000000Z\",\"created_by\":1,\"updated_by\":1,\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-01 04:19:58'),
(93, 'Access Level', 58, 'Edit', '{\"Comment\":\"Access Level Changed\"}', '{\"Comment\":\"Role ID: 1\"}', 1, '127.0.0.1', '2023-09-01 09:21:17'),
(94, 'Access Level', 58, 'Edit', '{\"Comment\":\"Access Level Changed\"}', '{\"Comment\":\"Role ID: 1\"}', 1, '127.0.0.1', '2023-09-01 10:13:31'),
(95, 'Access Level', 58, 'Edit', '{\"Comment\":\"Access Level Changed\"}', '{\"Comment\":\"Role ID: 1\"}', 1, '127.0.0.1', '2023-09-01 10:13:49'),
(96, 'Access Level', 63, 'Edit', '{\"Comment\":\"Access Level Changed\"}', '{\"Comment\":\"User ID: 13\"}', 1, '127.0.0.1', '2023-09-01 10:52:11'),
(97, 'Access Level', 78, 'Edit', '{\"Comment\":\"Access Level Changed\"}', '{\"Comment\":\"User ID: 13\"}', 1, '127.0.0.1', '2023-09-01 10:54:09'),
(98, 'Access Level', 78, 'Edit', '{\"Comment\":\"Access Level Changed\"}', '{\"Comment\":\"User ID: 13\"}', 1, '127.0.0.1', '2023-09-01 10:54:18'),
(99, 'Access Level', 78, 'Edit', '{\"Comment\":\"Access Level Changed\"}', '{\"Comment\":\"User ID: 13\"}', 1, '127.0.0.1', '2023-09-01 10:54:22'),
(100, 'Access Level', 79, 'Edit', '{\"Comment\":\"User Access Level Changed\"}', '{\"Comment\":\"User ID: 1\"}', 1, '127.0.0.1', '2023-09-01 12:03:01'),
(101, 'Access Level', 79, 'Edit', '{\"Comment\":\"User Access Level Changed\"}', '{\"Comment\":\"User ID: 1\"}', 1, '127.0.0.1', '2023-09-01 12:07:30'),
(102, 'Access Level', 79, 'Edit', '{\"Comment\":\"User Access Level Changed\"}', '{\"Comment\":\"User ID: 1\"}', 1, '127.0.0.1', '2023-09-01 12:09:50'),
(103, 'Access Level', 58, 'Edit', '{\"Comment\":\"Role Access Level Changed\"}', '{\"Comment\":\"Role ID: 1\"}', 1, '127.0.0.1', '2023-09-01 12:16:40'),
(104, 'Access Level', 58, 'Edit', '{\"Comment\":\"Role Access Level Changed\"}', '{\"Comment\":\"Role ID: 1\"}', 1, '127.0.0.1', '2023-09-01 12:16:51'),
(105, 'Access Level', 58, 'Edit', '{\"Comment\":\"Role Access Level Changed\"}', '{\"Comment\":\"Role ID: 1\"}', 1, '127.0.0.1', '2023-09-01 12:23:34'),
(106, 'Access Level', 58, 'Edit', '{\"Comment\":\"Role Access Level Changed\"}', '{\"Comment\":\"Role ID: 1\"}', 1, '127.0.0.1', '2023-09-01 12:27:15'),
(107, 'Access Level', 58, 'Edit', '{\"Comment\":\"Role Access Level Changed\"}', '{\"Comment\":\"Role ID: 1\"}', 1, '127.0.0.1', '2023-09-01 12:41:04'),
(108, 'Access Level', 57, 'Edit', '{\"Comment\":\"Role Access Level Changed\"}', '{\"Comment\":\"Role ID: 1\"}', 1, '127.0.0.1', '2023-09-01 13:52:42'),
(109, 'Access Level', 58, 'Edit', '{\"Comment\":\"Role Access Level Changed\"}', '{\"Comment\":\"Role ID: 1\"}', 1, '127.0.0.1', '2023-09-01 13:54:27'),
(110, 'Access Level', 83, 'Edit', '{\"Comment\":\"User Access Level Changed\"}', '{\"Comment\":\"User ID: 1\"}', 1, '127.0.0.1', '2023-09-01 13:55:29'),
(111, 'Access Level', 83, 'Edit', '{\"Comment\":\"User Access Level Changed\"}', '{\"Comment\":\"User ID: 1\"}', 1, '127.0.0.1', '2023-09-01 13:55:43'),
(112, 'Access Level', 83, 'Edit', '{\"Comment\":\"User Access Level Changed\"}', '{\"Comment\":\"User ID: 1\"}', 1, '127.0.0.1', '2023-09-01 13:57:20'),
(113, 'Access Level', 83, 'Edit', '{\"Comment\":\"User Access Level Changed\"}', '{\"Comment\":\"User ID: 1\"}', 1, '127.0.0.1', '2023-09-01 13:59:29'),
(114, 'Access Level', 58, 'Edit', '{\"Comment\":\"Role Access Level Changed\"}', '{\"Comment\":\"Role ID: 1\"}', 1, '127.0.0.1', '2023-09-01 20:39:59'),
(115, 'Access Level', 83, 'Edit', '{\"Comment\":\"User Access Level Changed\"}', '{\"Comment\":\"User ID: 1\"}', 1, '127.0.0.1', '2023-09-01 20:40:23'),
(116, 'User', 17, 'Create', NULL, '{\"name\":\"Tahmeed Mahbub\",\"phone\":1633394589,\"email\":\"tahmidmahbub168@gmail.com\",\"verified\":\"yes\",\"branch_id\":\"6\",\"role_id\":\"6\",\"manager_role_id\":\"1\",\"manager_id\":\"1\",\"date_of_birth\":null,\"address\":\"118\\/6 (Infront of mount hermann high school), North Kafrul, Kafrul, Dhaka-1206\",\"username\":\"admin432\",\"phone_1\":null,\"company\":\"American Internation University - Bangladesh\",\"joining_date\":null,\"created_by\":1,\"created_at\":\"2023-09-01T14:45:39.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-09-01T14:45:39.000000Z\",\"id\":17}', 1, '127.0.0.1', '2023-09-01 20:45:39'),
(117, 'Access Level', 89, 'Edit', '{\"Comment\":\"User Access Level Changed\"}', '{\"Comment\":\"User ID: 1\"}', 1, '127.0.0.1', '2023-09-01 22:43:37'),
(118, 'Access Level', 89, 'Edit', '{\"Comment\":\"User Access Level Changed\"}', '{\"Comment\":\"User ID: 1\"}', 1, '127.0.0.1', '2023-09-01 22:43:44'),
(119, 'Access Level', 91, 'Edit', '{\"Comment\":\"User Access Level Changed\"}', '{\"Comment\":\"User ID: 13\"}', 1, '127.0.0.1', '2023-09-01 22:44:39'),
(120, 'Access Level', 91, 'Edit', '{\"Comment\":\"User Access Level Changed\"}', '{\"Comment\":\"User ID: 13\"}', 1, '127.0.0.1', '2023-09-01 22:44:47'),
(121, 'Access Level', 96, 'Edit', '{\"Comment\":\"User Access Level Changed\"}', '{\"Comment\":\"User ID: 13\"}', 1, '127.0.0.1', '2023-09-01 22:45:05'),
(122, 'Access Level', 96, 'Edit', '{\"Comment\":\"User Access Level Changed\"}', '{\"Comment\":\"User ID: 13\"}', 1, '127.0.0.1', '2023-09-01 22:45:14'),
(123, 'Access Level', 101, 'Edit', '{\"Comment\":\"User Access Level Changed\"}', '{\"Comment\":\"User ID: 13\"}', 1, '127.0.0.1', '2023-09-01 22:50:04'),
(124, 'Access Level', 97, 'Delete', '{\"Comment\":\"User Access Level Reverted\"}', '{\"Comment\":\"User ID: 13\"}', 1, '127.0.0.1', '2023-09-01 22:54:15'),
(125, 'Access Level', 97, 'Delete', '{\"Comment\":\"User Access Level Reverted\"}', '{\"Comment\":\"User ID: 13\"}', 1, '127.0.0.1', '2023-09-01 22:54:59'),
(126, 'Access Level', 98, 'Delete', '{\"Comment\":\"User Access Level Reverted\"}', '{\"Comment\":\"User ID: 13\"}', 1, '127.0.0.1', '2023-09-01 22:55:02'),
(127, 'Access Level', 99, 'Delete', '{\"Comment\":\"User Access Level Reverted\"}', '{\"Comment\":\"User ID: 13\"}', 1, '127.0.0.1', '2023-09-01 22:55:04'),
(128, 'Access Level', 101, 'Edit', '{\"Comment\":\"User Access Level Changed\"}', '{\"Comment\":\"User ID: 13\"}', 1, '127.0.0.1', '2023-09-01 22:55:28'),
(129, 'Access Level', 100, 'Delete', '{\"Comment\":\"User Access Level Reverted\"}', '{\"Comment\":\"User ID: 13\"}', 1, '127.0.0.1', '2023-09-01 22:55:32'),
(130, 'Access Level', 108, 'Create', '{\"Comment\":\"User Access Level Created\"}', '{\"Comment\":\"User ID: 1\"}', 1, '127.0.0.1', '2023-09-01 23:15:36'),
(131, 'Access Level', 108, 'Edit', '{\"Comment\":\"User Access Level Changed\"}', '{\"Comment\":\"User ID: 1\"}', 1, '127.0.0.1', '2023-09-01 23:17:19'),
(132, 'Access Level', 104, 'Delete', '{\"Comment\":\"User Access Level Reverted\"}', '{\"Comment\":\"User ID: 1\"}', 1, '127.0.0.1', '2023-09-02 13:10:32'),
(133, 'Access Level', 110, 'Create', '{\"Comment\":\"User Access Level Created\"}', '{\"Comment\":\"User ID: 1\"}', 1, '127.0.0.1', '2023-09-02 13:11:10'),
(134, 'Access Level', 110, 'Create', '{\"Comment\":\"User Access Level Created\"}', '{\"Comment\":\"User ID: 1\"}', 1, '127.0.0.1', '2023-09-02 13:11:17'),
(135, 'Access Level', 109, 'Delete', '{\"Comment\":\"User Access Level Reverted\"}', '{\"Comment\":\"User ID: 1\"}', 1, '127.0.0.1', '2023-09-02 13:11:19'),
(136, 'User', 18, 'Create', NULL, '{\"name\":\"Xena Pacheco\",\"phone\":7214813266,\"email\":\"wucokawe@mailinator.com\",\"verified\":\"yes\",\"branch_id\":\"1\",\"role_id\":\"1\",\"manager_role_id\":\"1\",\"manager_id\":\"1\",\"date_of_birth\":\"1979-12-03\",\"address\":\"Expedita proident m\",\"username\":\"zegyxykezo\",\"phone_1\":\"+1 (381) 919-2779\",\"company\":\"Watkins Velasquez Associates\",\"joining_date\":\"1977-07-08\",\"created_by\":1,\"created_at\":\"2023-09-02T07:14:47.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-09-02T07:14:47.000000Z\",\"id\":18}', 1, '127.0.0.1', '2023-09-02 13:14:47'),
(137, 'User', 18, 'Edit', '{\"id\":18,\"name\":\"Xena Pacheco\",\"image\":\"users\\/user.jpg\",\"username\":\"zegyxykezo\",\"email\":\"wucokawe@mailinator.com\",\"verified\":\"yes\",\"nid_image\":null,\"role_id\":1,\"branch_id\":1,\"manager_role_id\":1,\"manager_id\":1,\"company\":\"Watkins Velasquez Associates\",\"details\":null,\"date_of_birth\":\"1979-12-03\",\"joining_date\":\"1977-07-08\",\"phone\":7214813266,\"phone_1\":\"+1 (381) 919-2779\",\"address\":\"Expedita proident m\",\"deletable\":1,\"created_at\":\"2023-09-02T07:14:47.000000Z\",\"updated_at\":\"2023-09-02T07:14:47.000000Z\",\"created_by\":1,\"updated_by\":1,\"deleted_at\":null}', '{\"id\":18,\"name\":\"Xena Pacheco\",\"image\":\"users\\/user.jpg\",\"username\":\"zegyxykezo\",\"email\":\"wucokawe@mailinator.com\",\"verified\":\"yes\",\"nid_image\":null,\"role_id\":\"1\",\"branch_id\":\"1\",\"manager_role_id\":\"1\",\"manager_id\":\"1\",\"company\":\"Watkins Velasquez Associates\",\"details\":null,\"date_of_birth\":\"2000-12-03\",\"joining_date\":\"2013-07-08\",\"phone\":7214813266,\"phone_1\":\"+1 (381) 919-2779\",\"address\":\"Expedita proident m\",\"deletable\":1,\"created_at\":\"2023-09-02T07:27:56.000000Z\",\"updated_at\":\"2023-09-02T07:27:56.000000Z\",\"created_by\":1,\"updated_by\":1,\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-02 13:27:56'),
(138, 'Access Level', 118, 'Create', '{\"Comment\":\"User Access Level Created\"}', '{\"Comment\":\"User ID: 1\"}', 1, '127.0.0.1', '2023-09-03 23:38:52'),
(139, 'Contact Category', 2, 'Create', NULL, '{\"name\":\"name\",\"parent_category_id\":\"1\",\"details\":\"det\",\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-03T18:14:11.000000Z\",\"updated_at\":\"2023-09-03T18:14:11.000000Z\",\"id\":2}', 1, '127.0.0.1', '2023-09-04 00:14:11'),
(140, 'Contact Category', 3, 'Create', NULL, '{\"name\":\"name\",\"parent_category_id\":null,\"details\":null,\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-03T18:14:20.000000Z\",\"updated_at\":\"2023-09-03T18:14:20.000000Z\",\"id\":3}', 1, '127.0.0.1', '2023-09-04 00:14:20'),
(141, 'User', 1, 'Edit', '{\"id\":1,\"name\":\"Super Admin\",\"image\":\"users\\/user-8.jpg\",\"username\":\"admin\",\"email\":\"admin@erp.com\",\"verified\":\"yes\",\"nid_image\":\"user_nid\\/nid_admin.jpg\",\"role_id\":1,\"branch_id\":1,\"manager_role_id\":null,\"manager_id\":null,\"company\":null,\"details\":\"Owner of this project\",\"date_of_birth\":null,\"joining_date\":null,\"phone\":1987654321,\"phone_1\":null,\"address\":\"Dhaka, Bangladesh\",\"deletable\":0,\"created_at\":\"2023-08-31T21:31:06.000000Z\",\"updated_at\":\"2023-08-31T21:31:06.000000Z\",\"created_by\":1,\"updated_by\":1,\"deleted_at\":null}', '{\"id\":1,\"name\":\"Super Admin\",\"image\":\"users\\/user_admin.jpg\",\"username\":\"admin\",\"email\":\"admin@erp.com\",\"verified\":\"yes\",\"nid_image\":\"user_nid\\/nid_admin.jpg\",\"role_id\":\"1\",\"branch_id\":\"1\",\"manager_role_id\":null,\"manager_id\":null,\"company\":null,\"details\":\"Owner of this project\",\"date_of_birth\":null,\"joining_date\":null,\"phone\":1987654321,\"phone_1\":null,\"address\":\"Dhaka, Bangladesh\",\"deletable\":0,\"created_at\":\"2023-09-03T18:29:39.000000Z\",\"updated_at\":\"2023-09-03T18:29:39.000000Z\",\"created_by\":1,\"updated_by\":1,\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-04 00:29:39'),
(142, 'Contact Category', 4, 'Create', NULL, '{\"name\":\"name123\",\"parent_category_id\":null,\"details\":\"det\",\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-04T15:57:47.000000Z\",\"updated_at\":\"2023-09-04T15:57:47.000000Z\",\"id\":4}', 1, '127.0.0.1', '2023-09-04 21:57:47'),
(143, 'Contact Category', 2, 'Edit', '{\"id\":2,\"name\":\"name\",\"details\":\"det\",\"parent_category_id\":1,\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-03T18:14:11.000000Z\",\"updated_at\":\"2023-09-03T18:14:11.000000Z\",\"deletable\":1,\"deleted_at\":null}', '{\"id\":2,\"name\":\"name\",\"details\":\"det\",\"parent_category_id\":\"1\",\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-04T16:08:25.000000Z\",\"updated_at\":\"2023-09-04T16:08:25.000000Z\",\"deletable\":1,\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-04 22:08:25'),
(144, 'Contact Category', 2, 'Edit', '{\"id\":2,\"name\":\"name\",\"details\":\"det\",\"parent_category_id\":1,\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-04T16:08:25.000000Z\",\"updated_at\":\"2023-09-04T16:08:25.000000Z\",\"deletable\":1,\"deleted_at\":null}', '{\"id\":2,\"name\":\"name1\",\"details\":\"det1\",\"parent_category_id\":\"4\",\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-04T16:08:39.000000Z\",\"updated_at\":\"2023-09-04T16:08:39.000000Z\",\"deletable\":1,\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-04 22:08:39'),
(145, 'Contact Category', 2, 'Delete', '{\"id\":2,\"name\":\"name1\",\"details\":\"det1\",\"parent_category_id\":4,\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-04T16:08:39.000000Z\",\"updated_at\":\"2023-09-04T16:08:39.000000Z\",\"deletable\":1,\"deleted_at\":null}', NULL, 1, '127.0.0.1', '2023-09-04 22:36:16'),
(146, 'Contact Category', 4, 'Delete', '{\"id\":4,\"name\":\"name123\",\"details\":\"det\",\"parent_category_id\":null,\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-04T15:57:47.000000Z\",\"updated_at\":\"2023-09-04T15:57:47.000000Z\",\"deletable\":1,\"deleted_at\":null}', NULL, 1, '127.0.0.1', '2023-09-04 22:36:19'),
(147, 'Contact Category', 5, 'Create', NULL, '{\"name\":\"name\",\"parent_category_id\":null,\"details\":null,\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-04T18:03:08.000000Z\",\"updated_at\":\"2023-09-04T18:03:08.000000Z\",\"id\":5}', 1, '127.0.0.1', '2023-09-05 00:03:08'),
(148, 'Contact', 1, 'Create', NULL, '{\"name\":\"Tahmeed Mahbub\",\"phone\":1633394589,\"phone_1\":null,\"email\":\"tahmidmahbub168@gmail.com\",\"status\":\"active\",\"branch_id\":null,\"category_id\":\"1\",\"address\":\"118\\/6 (Infront of mount hermann high school), North Kafrul, Kafrul, Dhaka-1206\",\"code\":null,\"company\":\"American Internation University - Bangladesh\",\"created_by\":1,\"created_at\":\"2023-09-04T19:30:32.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-09-04T19:30:32.000000Z\",\"id\":1}', 1, '127.0.0.1', '2023-09-05 01:30:32');
INSERT INTO `histories` (`id`, `module`, `module_id`, `operation`, `previous`, `after`, `user_id`, `ip_address`, `created_at`) VALUES
(149, 'Contact Category', 5, 'Delete', '{\"id\":5,\"name\":\"name\",\"details\":null,\"parent_category_id\":null,\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-04T18:03:08.000000Z\",\"updated_at\":\"2023-09-04T18:03:08.000000Z\",\"deletable\":1,\"deleted_at\":null}', NULL, 1, '127.0.0.1', '2023-09-08 21:56:57'),
(150, 'Contact', 2, 'Create', NULL, '{\"name\":\"Jerry Holden\",\"phone\":1698756452,\"phone_1\":\"+1 (349) 614-5282\",\"email\":\"zylizybu@mailinator.com\",\"status\":\"active\",\"branch_id\":\"6\",\"category_id\":\"3\",\"address\":\"Et ipsum aliqua Qu\",\"code\":null,\"company\":\"Robles and Parker Co\",\"created_by\":1,\"created_at\":\"2023-09-08T16:09:41.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-09-08T16:09:41.000000Z\",\"id\":2}', 1, '127.0.0.1', '2023-09-08 22:09:41'),
(151, 'Contact', 3, 'Create', NULL, '{\"name\":\"Phoebe Sharpe\",\"phone\":1849637052,\"phone_1\":\"+1 (592) 439-6911\",\"email\":\"huzudup@mailinator.com\",\"status\":\"active\",\"branch_id\":\"6\",\"category_id\":\"3\",\"address\":\"Autem molestiae non\",\"code\":\"Quivelenimconsequ\",\"company\":\"Nixon and Mullen Plc\",\"created_by\":1,\"created_at\":\"2023-09-08T16:35:50.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-09-08T16:35:50.000000Z\",\"id\":3}', 1, '127.0.0.1', '2023-09-08 22:35:50'),
(152, 'Contact', 4, 'Create', NULL, '{\"name\":\"Anjolie Lowery\",\"phone\":1682370970,\"phone_1\":\"+1 (632) 159-7145\",\"email\":\"luhycixew@mailinator.com\",\"status\":\"active\",\"branch_id\":\"1\",\"category_id\":\"1\",\"address\":\"Culpa ad eum conseq\",\"code\":\"Accusamus omnis ut l\",\"company\":\"Petersen Mccormick Inc\",\"created_by\":1,\"created_at\":\"2023-09-08T16:41:12.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-09-08T16:41:12.000000Z\",\"id\":4}', 1, '127.0.0.1', '2023-09-08 22:41:12'),
(153, 'Contact', 5, 'Create', NULL, '{\"name\":\"contact1\",\"phone\":1633394568,\"phone_1\":null,\"email\":null,\"status\":\"active\",\"branch_id\":null,\"category_id\":\"3\",\"address\":null,\"code\":null,\"company\":null,\"created_by\":1,\"created_at\":\"2023-09-08T17:05:58.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-09-08T17:05:58.000000Z\",\"id\":5}', 1, '127.0.0.1', '2023-09-08 23:05:58'),
(154, 'Contact', 6, 'Create', NULL, '{\"name\":\"Thaddeus Moran\",\"phone\":1633356425,\"phone_1\":\"+1 (292) 107-7408\",\"email\":\"raqi@mailinator.com\",\"status\":\"active\",\"branch_id\":\"1\",\"category_id\":\"3\",\"address\":\"Voluptate ut corrupt\",\"code\":\"Quasi veniam archit\",\"company\":\"Jimenez Larsen LLC\",\"created_by\":1,\"created_at\":\"2023-09-08T17:37:47.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-09-08T17:37:47.000000Z\",\"id\":6}', 1, '127.0.0.1', '2023-09-08 23:37:47'),
(155, 'Contact', 6, 'Delete', '{\"id\":6,\"name\":\"Thaddeus Moran\",\"code\":\"Quasi veniam archit\",\"image\":\"contacts\\/contact.jpg\",\"company\":\"Jimenez Larsen LLC\",\"category_id\":3,\"phone\":1633356425,\"phone_1\":\"+1 (292) 107-7408\",\"email\":\"raqi@mailinator.com\",\"details\":null,\"address\":\"Voluptate ut corrupt\",\"status\":\"active\",\"branch_id\":1,\"created_at\":\"2023-09-08T17:37:47.000000Z\",\"updated_at\":\"2023-09-08T17:37:47.000000Z\",\"created_by\":1,\"updated_by\":1,\"deletable\":1,\"deleted_at\":null}', NULL, 1, '127.0.0.1', '2023-09-09 00:06:23'),
(156, 'Contact', 5, 'Delete', '{\"id\":5,\"name\":\"contact1\",\"code\":null,\"image\":\"contacts\\/contact.jpg\",\"company\":null,\"category_id\":3,\"phone\":1633394568,\"phone_1\":null,\"email\":null,\"details\":null,\"address\":null,\"status\":\"active\",\"branch_id\":null,\"created_at\":\"2023-09-08T17:05:58.000000Z\",\"updated_at\":\"2023-09-08T17:05:58.000000Z\",\"created_by\":1,\"updated_by\":1,\"deletable\":1,\"deleted_at\":null}', NULL, 1, '127.0.0.1', '2023-09-09 01:02:57'),
(157, 'Contact', 7, 'Create', NULL, '{\"name\":\"Ethan Kaufman\",\"phone\":1654785653,\"phone_1\":\"+1 (777) 721-6355\",\"email\":\"jeju@mailinator.com\",\"status\":\"active\",\"branch_id\":\"6\",\"category_id\":\"1\",\"address\":\"Aspernatur repudiand\",\"code\":\"Veniam cum nemo eos\",\"company\":\"Watson and Watts Associates\",\"created_by\":1,\"created_at\":\"2023-09-08T19:23:04.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-09-08T19:23:04.000000Z\",\"image\":\"contacts\\/contact_Veniam cum nemo eos.jpg\",\"id\":7}', 1, '127.0.0.1', '2023-09-09 01:23:04'),
(158, 'Contact', 8, 'Create', NULL, '{\"name\":\"Ainsley Mosley\",\"phone\":1632545632,\"phone_1\":\"+1 (919) 241-1978\",\"email\":\"dozamu@mailinator.com\",\"status\":\"active\",\"branch_id\":\"6\",\"category_id\":\"1\",\"address\":\"Velit voluptate unde\",\"code\":\"Qui sint velit et\",\"company\":\"Day Holcomb Associates\",\"created_by\":1,\"created_at\":\"2023-09-08T19:36:43.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-09-08T19:36:43.000000Z\",\"id\":8}', 1, '127.0.0.1', '2023-09-09 01:36:43'),
(159, 'Contact', 11, 'Create', NULL, '{\"name\":\"Alec Benjamin\",\"phone\":1633512352,\"phone_1\":\"+1 (748) 151-2826\",\"email\":\"nuhitezyno@mailinator.com\",\"status\":\"active\",\"branch_id\":\"6\",\"category_id\":\"1\",\"address\":\"Accusamus amet volu\",\"code\":\"Nulla error Nam reru\",\"company\":\"Larsen Giles Co\",\"created_by\":1,\"created_at\":\"2023-09-08T19:46:14.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-09-08T19:46:14.000000Z\",\"image\":\"contacts\\/contact_Nulla error Nam reru.jpg\",\"id\":11,\"files\":\"[\\\"contacts\\\\\\/542_11_WIN_20230511_20_25_26_Pro.jpg\\\",\\\"contacts\\\\\\/635_11_WIN_20230511_20_25_34_Pro.jpg\\\",\\\"contacts\\\\\\/310_11_WIN_20230609_14_52_10_Pro.jpg\\\"]\"}', 1, '127.0.0.1', '2023-09-09 01:46:14'),
(160, 'Contact', 12, 'Create', NULL, '{\"name\":\"Alec Benjamin1\",\"phone\":1633512351,\"phone_1\":\"+1 (748) 151-2826123\",\"email\":\"nuhitezyno@mailinator.com1\",\"status\":\"active\",\"branch_id\":\"1\",\"category_id\":\"3\",\"address\":\"Accusamus amet volu1\",\"code\":\"Nulla error Nam reru1\",\"company\":\"Larsen Giles Co1\",\"created_by\":1,\"created_at\":\"2023-09-10T14:23:56.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-09-10T14:23:56.000000Z\",\"id\":12,\"image\":\"contacts\\/contact_12.jpg\",\"files\":\"[\\\"contacts\\\\\\/262_12_WIN_20230511_20_25_26_Pro.jpg\\\",\\\"contacts\\\\\\/832_12_WIN_20230511_20_25_34_Pro.jpg\\\",\\\"contacts\\\\\\/331_12_WIN_20230609_14_52_10_Pro.jpg\\\"]\"}', 1, '127.0.0.1', '2023-09-10 20:23:56'),
(161, 'Contact', 16, 'Create', NULL, '{\"name\":\"Ethan Kaufman\",\"phone\":1654785653,\"phone_1\":\"+1 (777) 721-6355\",\"email\":\"jeju@mailinator.com\",\"status\":\"active\",\"branch_id\":\"6\",\"category_id\":\"1\",\"address\":\"Aspernatur repudiand\",\"details\":\"gt\",\"code\":\"Veniam cum nemo eos12\",\"company\":\"Watson and Watts Associates\",\"created_by\":1,\"created_at\":\"2023-09-10T14:39:15.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-09-10T14:39:15.000000Z\",\"id\":16}', 1, '127.0.0.1', '2023-09-10 20:39:15'),
(162, 'Contact', 17, 'Create', NULL, '{\"name\":\"Ethan Kaufman\",\"phone\":1654785653,\"phone_1\":\"+1 (777) 721-6355\",\"email\":\"jeju@mailinator.com\",\"status\":\"active\",\"branch_id\":\"6\",\"category_id\":\"1\",\"address\":\"Aspernatur repudiand\",\"details\":\"gt232\",\"code\":\"Veniam cum nemo eos1232\",\"company\":\"Watson and Watts Associates\",\"created_by\":1,\"created_at\":\"2023-09-10T14:39:31.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-09-10T14:39:31.000000Z\",\"id\":17}', 1, '127.0.0.1', '2023-09-10 20:39:31'),
(163, 'Contact', 18, 'Create', NULL, '{\"name\":\"Ethan Kaufman\",\"phone\":1654785653,\"phone_1\":\"+1 (777) 721-6355\",\"email\":\"jeju@mailinator.com\",\"status\":\"active\",\"branch_id\":\"6\",\"category_id\":\"1\",\"address\":\"Aspernatur repudiand\",\"details\":\"gt232fref\",\"company\":\"Watson and Watts Associates\",\"created_by\":1,\"created_at\":\"2023-09-10T14:47:29.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-09-10T14:47:29.000000Z\",\"id\":18}', 1, '127.0.0.1', '2023-09-10 20:47:29'),
(164, 'Contact', 19, 'Create', NULL, '{\"name\":\"Ethan Kaufman1\",\"phone\":1654786531,\"phone_1\":\"+1 (777) 721-63551\",\"email\":\"jeju@mailinator.com1\",\"status\":\"active\",\"branch_id\":\"6\",\"category_id\":\"1\",\"address\":\"Aspernatur repudiand1\",\"details\":\"gt23265464561\",\"company\":\"Watson and Watts Associates1\",\"created_by\":1,\"created_at\":\"2023-09-10T14:48:01.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-09-10T14:48:01.000000Z\",\"id\":19}', 1, '127.0.0.1', '2023-09-10 20:48:01'),
(165, 'Contact', 17, 'Delete', '{\"id\":17,\"name\":\"Ethan Kaufman\",\"code\":\"Veniam cum nemo eos1232\",\"image\":\"contacts\\/contact.jpg\",\"files\":null,\"company\":\"Watson and Watts Associates\",\"category_id\":1,\"phone\":1654785653,\"phone_1\":\"+1 (777) 721-6355\",\"email\":\"jeju@mailinator.com\",\"details\":\"gt232\",\"address\":\"Aspernatur repudiand\",\"status\":\"active\",\"branch_id\":6,\"created_at\":\"2023-09-10T14:39:31.000000Z\",\"updated_at\":\"2023-09-10T14:39:31.000000Z\",\"created_by\":1,\"updated_by\":1,\"deletable\":1,\"deleted_at\":null}', NULL, 1, '127.0.0.1', '2023-09-10 20:55:42'),
(166, 'Contact', 18, 'Delete', '{\"id\":18,\"name\":\"Ethan Kaufman\",\"code\":null,\"image\":\"contacts\\/contact.jpg\",\"files\":null,\"company\":\"Watson and Watts Associates\",\"category_id\":1,\"phone\":1654785653,\"phone_1\":\"+1 (777) 721-6355\",\"email\":\"jeju@mailinator.com\",\"details\":\"gt232fref\",\"address\":\"Aspernatur repudiand\",\"status\":\"active\",\"branch_id\":6,\"created_at\":\"2023-09-10T14:47:29.000000Z\",\"updated_at\":\"2023-09-10T14:47:29.000000Z\",\"created_by\":1,\"updated_by\":1,\"deletable\":1,\"deleted_at\":null}', NULL, 1, '127.0.0.1', '2023-09-10 20:55:44'),
(167, 'Contact', 19, 'Delete', '{\"id\":19,\"name\":\"Ethan Kaufman1\",\"code\":null,\"image\":\"contacts\\/contact.jpg\",\"files\":null,\"company\":\"Watson and Watts Associates1\",\"category_id\":1,\"phone\":1654786531,\"phone_1\":\"+1 (777) 721-63551\",\"email\":\"jeju@mailinator.com1\",\"details\":\"gt23265464561\",\"address\":\"Aspernatur repudiand1\",\"status\":\"active\",\"branch_id\":6,\"created_at\":\"2023-09-10T14:48:01.000000Z\",\"updated_at\":\"2023-09-10T14:48:01.000000Z\",\"created_by\":1,\"updated_by\":1,\"deletable\":1,\"deleted_at\":null}', NULL, 1, '127.0.0.1', '2023-09-10 20:55:47'),
(168, 'Contact', 16, 'Delete', '{\"id\":16,\"name\":\"Ethan Kaufman\",\"code\":\"Veniam cum nemo eos12\",\"image\":\"contacts\\/contact.jpg\",\"files\":null,\"company\":\"Watson and Watts Associates\",\"category_id\":1,\"phone\":1654785653,\"phone_1\":\"+1 (777) 721-6355\",\"email\":\"jeju@mailinator.com\",\"details\":\"gt\",\"address\":\"Aspernatur repudiand\",\"status\":\"active\",\"branch_id\":6,\"created_at\":\"2023-09-10T14:39:15.000000Z\",\"updated_at\":\"2023-09-10T14:39:15.000000Z\",\"created_by\":1,\"updated_by\":1,\"deletable\":1,\"deleted_at\":null}', NULL, 1, '127.0.0.1', '2023-09-10 20:55:52'),
(169, 'Contact', 7, 'Edit', NULL, '{\"id\":7,\"name\":\"Ethan Kaufman1\",\"code\":\"Veniam cum nemo eos\",\"image\":\"contacts\\/contact_Veniam cum nemo eos.jpg\",\"files\":null,\"company\":\"Watson and Watts Associates1\",\"category_id\":\"3\",\"phone\":1654785651,\"phone_1\":\"+1 (777) 721-63551\",\"email\":\"jeju@mailinator.com1\",\"details\":\"1\",\"address\":\"Aspernatur repudiand1\",\"status\":\"active\",\"branch_id\":\"1\",\"created_at\":\"2023-09-10T14:56:19.000000Z\",\"updated_at\":\"2023-09-10T14:56:19.000000Z\",\"created_by\":1,\"updated_by\":1,\"deletable\":1,\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-10 20:56:19'),
(170, 'Contact', 7, 'Edit', NULL, '{\"id\":7,\"name\":\"Ethan Kaufman1\",\"code\":\"Veniam cum nemo eos\",\"image\":\"contacts\\/contact_Veniam cum nemo eos.jpg\",\"files\":\"[\\\"contacts\\\\\\/856_7_WIN_20230511_20_25_26_Pro.jpg\\\",\\\"contacts\\\\\\/497_7_WIN_20230511_20_25_34_Pro.jpg\\\",\\\"contacts\\\\\\/834_7_WIN_20230609_14_52_10_Pro.jpg\\\"]\",\"company\":\"Watson and Watts Associates1\",\"category_id\":\"3\",\"phone\":1654785651,\"phone_1\":\"+1 (777) 721-63551\",\"email\":\"jeju@mailinator.com1\",\"details\":\"1\",\"address\":\"Aspernatur repudiand1\",\"status\":\"active\",\"branch_id\":\"1\",\"created_at\":\"2023-09-10T15:03:28.000000Z\",\"updated_at\":\"2023-09-10T15:03:28.000000Z\",\"created_by\":1,\"updated_by\":1,\"deletable\":1,\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-10 21:03:28'),
(171, 'Contact', 7, 'Edit', NULL, '{\"id\":7,\"name\":\"Ethan Kaufman1\",\"code\":\"Veniam cum nemo eos\",\"image\":\"contacts\\/contact_Veniam cum nemo eos.jpg\",\"files\":\"[\\\"contacts\\\\\\/856_7_WIN_20230511_20_25_26_Pro.jpg\\\",\\\"contacts\\\\\\/497_7_WIN_20230511_20_25_34_Pro.jpg\\\",\\\"contacts\\\\\\/834_7_WIN_20230609_14_52_10_Pro.jpg\\\"]\",\"company\":\"Watson and Watts Associates1\",\"category_id\":\"3\",\"phone\":1654785651,\"phone_1\":\"+1 (777) 721-63551\",\"email\":\"jeju@mailinator.com1\",\"details\":\"1\",\"address\":\"Aspernatur repudiand1\",\"status\":\"active\",\"branch_id\":\"1\",\"created_at\":\"2023-09-10T16:41:18.000000Z\",\"updated_at\":\"2023-09-10T16:41:18.000000Z\",\"created_by\":1,\"updated_by\":1,\"deletable\":1,\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-10 22:41:18'),
(172, 'Contact', 7, 'Edit', NULL, '{\"id\":7,\"name\":\"Ethan Kaufman1\",\"code\":\"Veniam cum nemo eos\",\"image\":\"contacts\\/contact_Veniam cum nemo eos.jpg\",\"files\":\"[\\\"contacts\\\\\\/856_7_WIN_20230511_20_25_26_Pro.jpg\\\",\\\"contacts\\\\\\/497_7_WIN_20230511_20_25_34_Pro.jpg\\\",\\\"contacts\\\\\\/834_7_WIN_20230609_14_52_10_Pro.jpg\\\"]\",\"company\":\"Watson and Watts Associates1\",\"category_id\":\"3\",\"phone\":1654785651,\"phone_1\":\"+1 (777) 721-63551\",\"email\":\"jeju@mailinator.com1\",\"details\":\"1\",\"address\":\"Aspernatur repudiand1\",\"status\":\"active\",\"branch_id\":\"1\",\"created_at\":\"2023-09-10T17:10:08.000000Z\",\"updated_at\":\"2023-09-10T17:10:08.000000Z\",\"created_by\":1,\"updated_by\":1,\"deletable\":1,\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-10 23:10:08'),
(173, 'Access Level', 120, 'Create', '{\"Comment\":\"Role Access Level Created\"}', '{\"Comment\":\"Role ID: 1\"}', 1, '127.0.0.1', '2023-09-15 23:45:23'),
(174, 'Product Category', 4, 'Create', NULL, '{\"name\":\"name\",\"parent_category_id\":\"2\",\"details\":\"det\",\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-15T19:29:55.000000Z\",\"updated_at\":\"2023-09-15T19:29:55.000000Z\",\"id\":4}', 1, '127.0.0.1', '2023-09-16 01:29:55'),
(175, 'Product Category', 2, 'Edit', '{\"id\":2,\"name\":\"Packaged Grocery\",\"details\":\"This items are packed by brand\",\"parent_category_id\":1,\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-15T18:14:59.000000Z\",\"updated_at\":\"2023-09-15T18:14:59.000000Z\",\"deletable\":1,\"deleted_at\":null}', '{\"id\":2,\"name\":\"Packaged Grocery\",\"details\":\"This items are packed by brand\",\"parent_category_id\":\"4\",\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-15T18:14:59.000000Z\",\"updated_at\":\"2023-09-15T19:43:37.000000Z\",\"deletable\":1,\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-16 01:43:37'),
(176, 'Product Category', 2, 'Edit', '{\"id\":2,\"name\":\"Packaged Grocery\",\"details\":\"This items are packed by brand\",\"parent_category_id\":4,\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-15T18:14:59.000000Z\",\"updated_at\":\"2023-09-15T19:43:37.000000Z\",\"deletable\":1,\"deleted_at\":null}', '{\"id\":2,\"name\":\"Packaged Grocery\",\"details\":\"This items are packed by brand\",\"parent_category_id\":\"1\",\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-15T18:14:59.000000Z\",\"updated_at\":\"2023-09-15T19:50:24.000000Z\",\"deletable\":1,\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-16 01:50:24'),
(177, 'Contact Category', 4, 'Delete', '{\"id\":4,\"name\":\"name\",\"details\":\"det\",\"parent_category_id\":2,\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-15T19:29:55.000000Z\",\"updated_at\":\"2023-09-15T19:29:55.000000Z\",\"deletable\":1,\"deleted_at\":null}', NULL, 1, '127.0.0.1', '2023-09-16 01:51:05'),
(178, 'Item', 2, 'Create', NULL, '{\"name\":\"Cyrus Mcconnell\",\"code\":\"Eos possimus harum\",\"category_id\":\"1\",\"unit_id\":\"1\",\"brand_id\":null,\"carton_size\":\"16\",\"low_stock\":\"5\",\"purchase_price\":\"750\",\"selling_price\":\"444\",\"details\":\"Provident eum enim\",\"created_by\":1,\"created_at\":\"2023-09-16T07:04:47.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-09-16T07:04:47.000000Z\",\"id\":2,\"image\":\"items\\/item_2.png\"}', 1, '127.0.0.1', '2023-09-16 13:04:47'),
(179, 'Item', 3, 'Create', NULL, '{\"name\":\"a\",\"code\":null,\"category_id\":\"2\",\"unit_id\":\"1\",\"brand_id\":null,\"carton_size\":1,\"low_stock\":0,\"purchase_price\":null,\"selling_price\":null,\"details\":null,\"created_by\":1,\"created_at\":\"2023-09-16T07:06:49.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-09-16T07:06:49.000000Z\",\"id\":3}', 1, '127.0.0.1', '2023-09-16 13:06:49'),
(180, 'Item', 2, 'Edit', '{\"id\":2,\"name\":\"Cyrus Mcconnell\",\"code\":\"Eos possimus harum\",\"image\":\"items\\/item_2.png\",\"details\":\"Provident eum enim\",\"brand_id\":null,\"unit_id\":1,\"carton_size\":16,\"purchase_price\":750,\"selling_price\":444,\"low_stock\":5,\"category_id\":1,\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-16T07:04:47.000000Z\",\"updated_at\":\"2023-09-16T07:04:47.000000Z\",\"deleted_at\":null}', '{\"id\":2,\"name\":\"Cyrus Mcconnell\",\"code\":\"Eos possimus harum\",\"image\":\"items\\/item_2.png\",\"details\":\"Provident eum enim\",\"brand_id\":null,\"unit_id\":\"1\",\"carton_size\":\"16\",\"purchase_price\":\"750\",\"selling_price\":\"444\",\"low_stock\":\"5\",\"category_id\":\"1\",\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-16T07:04:47.000000Z\",\"updated_at\":\"2023-09-16T07:15:49.000000Z\",\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-16 13:15:49'),
(181, 'Item', 2, 'Edit', '{\"id\":2,\"name\":\"Cyrus Mcconnell\",\"code\":\"Eos possimus harum\",\"image\":\"items\\/item_2.png\",\"details\":\"Provident eum enim\",\"brand_id\":null,\"unit_id\":1,\"carton_size\":16,\"purchase_price\":750,\"selling_price\":444,\"low_stock\":5,\"category_id\":1,\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-16T07:04:47.000000Z\",\"updated_at\":\"2023-09-16T07:15:49.000000Z\",\"deleted_at\":null}', '{\"id\":2,\"name\":\"Cyrus Mcconnell\",\"code\":\"Eos possimus harum\",\"image\":\"items\\/item_2.png\",\"details\":\"Provident eum enim\",\"brand_id\":null,\"unit_id\":\"1\",\"carton_size\":\"16\",\"purchase_price\":\"750\",\"selling_price\":\"444\",\"low_stock\":\"5\",\"category_id\":\"1\",\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-16T07:04:47.000000Z\",\"updated_at\":\"2023-09-16T07:15:54.000000Z\",\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-16 13:15:54'),
(182, 'Item', 2, 'Edit', '{\"id\":2,\"name\":\"Cyrus Mcconnell\",\"code\":\"Eos possimus harum\",\"image\":\"items\\/item_2.png\",\"details\":\"Provident eum enim\",\"brand_id\":null,\"unit_id\":1,\"carton_size\":16,\"purchase_price\":750,\"selling_price\":444,\"low_stock\":5,\"category_id\":1,\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-16T07:04:47.000000Z\",\"updated_at\":\"2023-09-16T07:15:54.000000Z\",\"deleted_at\":null}', '{\"id\":2,\"name\":\"Cyrus Mcconnell1\",\"code\":\"Eos possimus harum\",\"image\":\"items\\/item_2.png\",\"details\":null,\"brand_id\":null,\"unit_id\":\"1\",\"carton_size\":1,\"purchase_price\":null,\"selling_price\":null,\"low_stock\":0,\"category_id\":\"2\",\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-16T07:04:47.000000Z\",\"updated_at\":\"2023-09-16T07:16:15.000000Z\",\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-16 13:16:15'),
(183, 'Item', 2, 'Edit', '{\"id\":2,\"name\":\"Cyrus Mcconnell1\",\"code\":\"Eos possimus harum\",\"image\":\"items\\/item_2.png\",\"details\":null,\"brand_id\":null,\"unit_id\":1,\"carton_size\":1,\"purchase_price\":null,\"selling_price\":null,\"low_stock\":0,\"category_id\":2,\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-16T07:04:47.000000Z\",\"updated_at\":\"2023-09-16T07:16:15.000000Z\",\"deleted_at\":null}', '{\"id\":2,\"name\":\"Cyrus Mcconnell1\",\"code\":\"Eos possimus harum\",\"image\":\"items\\/item_2.png\",\"details\":\"details\",\"brand_id\":null,\"unit_id\":\"1\",\"carton_size\":\"100\",\"purchase_price\":\"456\",\"selling_price\":\"789\",\"low_stock\":\"0123\",\"category_id\":\"2\",\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-16T07:04:47.000000Z\",\"updated_at\":\"2023-09-16T07:17:16.000000Z\",\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-16 13:17:16'),
(184, 'Item', 4, 'Create', NULL, '{\"name\":\"Walter Murphy\",\"code\":\"Veniam optio incid\",\"category_id\":\"3\",\"unit_id\":\"1\",\"brand_id\":null,\"carton_size\":\"30\",\"low_stock\":\"65\",\"purchase_price\":\"931\",\"selling_price\":\"215\",\"details\":\"Irure provident dol\",\"created_by\":1,\"created_at\":\"2023-09-16T07:19:40.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-09-16T07:19:40.000000Z\",\"id\":4,\"image\":\"items\\/item_4.png\"}', 1, '127.0.0.1', '2023-09-16 13:19:40'),
(185, 'Item', 2, 'Edit', '{\"id\":2,\"name\":\"Cy rus\",\"code\":\"Eos possimus harum\",\"image\":\"items\\/item_2.png\",\"details\":\"details\",\"brand_id\":null,\"unit_id\":1,\"carton_size\":100,\"purchase_price\":456,\"selling_price\":789,\"low_stock\":123,\"category_id\":2,\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-16T07:04:47.000000Z\",\"updated_at\":\"2023-09-16T07:17:16.000000Z\",\"deleted_at\":null}', '{\"id\":2,\"name\":\"Cyrus Mcconnell1\",\"code\":\"Eos possimus harum\",\"image\":\"items\\/item_2.png\",\"details\":\"details\",\"brand_id\":null,\"unit_id\":\"1\",\"carton_size\":\"100\",\"purchase_price\":\"456\",\"selling_price\":\"789\",\"low_stock\":\"123\",\"category_id\":\"2\",\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-16T07:04:47.000000Z\",\"updated_at\":\"2023-09-16T07:46:15.000000Z\",\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-16 13:46:15'),
(186, 'Item', 2, 'Edit', '{\"id\":2,\"name\":\"Cyrus Mcconnell1\",\"code\":\"Eos possimus harum\",\"image\":\"items\\/item_2.png\",\"details\":\"details\",\"brand_id\":null,\"unit_id\":1,\"carton_size\":100,\"purchase_price\":456,\"selling_price\":789,\"low_stock\":123,\"category_id\":2,\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-16T07:04:47.000000Z\",\"updated_at\":\"2023-09-16T07:46:15.000000Z\",\"deleted_at\":null}', '{\"id\":2,\"name\":\"Cyrus Mcconnell1\",\"code\":\"Eos possimus harum\",\"image\":\"items\\/item_2.png\",\"details\":\"details\",\"brand_id\":null,\"unit_id\":\"1\",\"carton_size\":\"100\",\"purchase_price\":\"456\",\"selling_price\":\"789\",\"low_stock\":\"123\",\"category_id\":\"2\",\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-16T07:04:47.000000Z\",\"updated_at\":\"2023-09-16T07:46:28.000000Z\",\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-16 13:46:28'),
(187, 'Item', 5, 'Create', NULL, '{\"name\":\"Ulric Ray GFfg\",\"code\":\"UR0005\",\"category_id\":\"1\",\"unit_id\":\"1\",\"brand_id\":null,\"carton_size\":\"2\",\"low_stock\":\"88\",\"purchase_price\":\"911\",\"selling_price\":\"419\",\"details\":\"Facilis incididunt e\",\"created_by\":1,\"created_at\":\"2023-09-16T07:46:51.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-09-16T07:46:51.000000Z\",\"id\":5}', 1, '127.0.0.1', '2023-09-16 13:46:51'),
(188, 'Contact', 3, 'Delete', '{\"id\":3,\"name\":\"a\",\"code\":\"\",\"image\":\"items\\/item.jpg\",\"details\":null,\"brand_id\":null,\"unit_id\":1,\"carton_size\":1,\"purchase_price\":null,\"selling_price\":null,\"low_stock\":0,\"category_id\":2,\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-16T07:06:49.000000Z\",\"updated_at\":\"2023-09-16T07:06:49.000000Z\",\"deleted_at\":null}', NULL, 1, '127.0.0.1', '2023-09-16 13:48:09'),
(189, 'Item', 5, 'Delete', '{\"id\":5,\"name\":\"Ulric Ray GFfg\",\"code\":\"UR0005\",\"image\":\"items\\/item.jpg\",\"details\":\"Facilis incididunt e\",\"brand_id\":null,\"unit_id\":1,\"carton_size\":2,\"purchase_price\":911,\"selling_price\":419,\"low_stock\":88,\"category_id\":1,\"created_by\":1,\"updated_by\":1,\"created_at\":\"2023-09-16T07:46:51.000000Z\",\"updated_at\":\"2023-09-16T07:46:51.000000Z\",\"deleted_at\":null}', NULL, 1, '127.0.0.1', '2023-09-16 13:51:23'),
(190, 'Item', 6, 'Create', NULL, '{\"name\":\"Tahmeed Mahbub\",\"code\":\"TM0006\",\"category_id\":\"1\",\"unit_id\":\"1\",\"brand_id\":null,\"carton_size\":1,\"low_stock\":0,\"purchase_price\":null,\"selling_price\":null,\"details\":null,\"created_by\":1,\"created_at\":\"2023-09-16T08:01:17.000000Z\",\"updated_by\":1,\"updated_at\":\"2023-09-16T08:01:17.000000Z\",\"id\":6}', 1, '127.0.0.1', '2023-09-16 14:01:17'),
(191, 'Access Level', 123, 'Create', '{\"Comment\":\"Role Access Level Created\"}', '{\"Comment\":\"Role ID: 1\"}', 1, '127.0.0.1', '2023-09-21 22:38:37'),
(192, 'User', 13, 'Edit', '{\"id\":13,\"name\":\"Mahbub Faruk\",\"image\":\"users\\/user_admin9.png\",\"username\":\"admin9\",\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"nid_image\":\"user_nid\\/nid_admin9.jpg\",\"role_id\":6,\"branch_id\":6,\"manager_role_id\":1,\"manager_id\":1,\"company\":\"Bangladesh Air Force\",\"details\":null,\"date_of_birth\":\"2023-08-08\",\"joining_date\":\"2023-08-02\",\"phone\":1678054660,\"phone_1\":\"01633394589\",\"address\":\"201 MU BAF\",\"deletable\":1,\"created_at\":\"2023-08-31T22:19:58.000000Z\",\"updated_at\":\"2023-08-31T22:19:58.000000Z\",\"created_by\":1,\"updated_by\":1,\"deleted_at\":null}', '{\"id\":13,\"name\":\"Mahbub Faruk123\",\"image\":\"users\\/user_admin9.png\",\"username\":\"admin9\",\"email\":\"mahbub168@gmail.com\",\"verified\":\"yes\",\"nid_image\":\"user_nid\\/nid_admin9.jpg\",\"role_id\":\"6\",\"branch_id\":\"6\",\"manager_role_id\":\"1\",\"manager_id\":\"1\",\"company\":\"Bangladesh Air Force\",\"details\":null,\"date_of_birth\":\"2023-08-08\",\"joining_date\":\"2023-08-02\",\"phone\":1678054660,\"phone_1\":\"01633394589\",\"address\":\"201 MU BAF\",\"deletable\":1,\"created_at\":\"2023-08-31T22:19:58.000000Z\",\"updated_at\":\"2023-09-22T09:54:47.000000Z\",\"created_by\":1,\"updated_by\":1,\"deleted_at\":null}', 1, '127.0.0.1', '2023-09-22 15:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'items/item.jpg',
  `details` text,
  `brand_id` int DEFAULT NULL,
  `unit_id` int NOT NULL DEFAULT '1',
  `carton_size` int DEFAULT '1',
  `purchase_price` double DEFAULT NULL,
  `selling_price` double DEFAULT NULL,
  `low_stock` int DEFAULT NULL,
  `category_id` int NOT NULL,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `code`, `image`, `details`, `brand_id`, `unit_id`, `carton_size`, `purchase_price`, `selling_price`, `low_stock`, `category_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Snickers Chocolate', 'SC0001', 'items/item.jpg', 'Indian Snickers Chocolate', NULL, 1, 10, 75, 100, 5, 2, 1, 1, '2023-09-16 02:35:29', '2023-09-16 02:35:29', NULL),
(2, 'Cyrus Mcconnell1', 'Eos possimus harum', 'items/item_2.png', 'details', NULL, 1, 100, 456, 789, 123, 2, 1, 1, '2023-09-16 07:04:47', '2023-09-16 07:46:28', NULL),
(4, 'Walter Murphy', 'Veniam optio incid', 'items/item_4.png', 'Irure provident dol', NULL, 1, 30, 931, 215, 65, 3, 1, 1, '2023-09-16 07:19:40', '2023-09-16 07:19:40', NULL),
(6, 'Tahmeed Mahbub', 'TM0006', 'items/item.jpg', NULL, NULL, 1, 1, NULL, NULL, 0, 1, 1, 1, '2023-09-16 08:01:17', '2023-09-16 08:01:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` text,
  `parent_category_id` int DEFAULT NULL,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deletable` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `name`, `details`, `parent_category_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deletable`, `deleted_at`) VALUES
(1, 'Grocery', 'Grocery Items', NULL, 1, 1, '2023-09-15 18:14:11', '2023-09-15 18:14:11', 1, NULL),
(2, 'Packaged Grocery', 'This items are packed by brand', 1, 1, 1, '2023-09-15 18:14:59', '2023-09-15 19:50:24', 1, NULL),
(3, 'Unpacked Grocery', 'This items are selling openned', 1, 1, 1, '2023-09-15 18:14:59', '2023-09-15 18:14:59', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `module_prefix` varchar(255) NOT NULL,
  `deletable` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module_name`, `module_prefix`, `deletable`, `created_at`, `updated_at`) VALUES
(1, 'Role', 'role', 1, '2023-08-25 23:41:31', '2023-08-25 23:41:31'),
(2, 'Branch', 'branch', 1, '2023-09-01 06:28:17', '2023-09-01 06:28:17'),
(3, 'User', 'user', 1, '2023-09-01 06:28:17', '2023-09-01 06:28:17'),
(4, 'History', 'history', 1, '2023-09-01 06:29:32', '2023-09-01 06:29:32'),
(5, 'Access Level', 'access-level', 1, '2023-09-01 06:40:08', '2023-09-01 06:40:08'),
(6, 'Contact', 'contact', 1, '2023-09-03 23:38:25', '2023-09-03 23:38:25'),
(7, 'Item / Service', 'item', 1, '2023-09-15 22:41:38', '2023-09-15 22:41:38'),
(8, 'Purchase', 'purchase', 1, '2023-09-21 22:37:00', '2023-09-21 22:37:00'),
(9, 'Unit', 'unit', 1, '2023-09-21 22:37:32', '2023-09-21 22:37:32'),
(10, 'Brand', 'brand', 1, '2023-09-21 22:37:32', '2023-09-21 22:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int NOT NULL,
  `create` tinyint(1) NOT NULL DEFAULT '0',
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `update` tinyint(1) NOT NULL DEFAULT '0',
  `delete` tinyint(1) NOT NULL DEFAULT '0',
  `module_id` int NOT NULL,
  `role_id` int NOT NULL,
  `deletable` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int NOT NULL,
  `code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `vendor_id` int NOT NULL,
  `delivery_person_id` int DEFAULT NULL,
  `branch_id` int NOT NULL,
  `total_amount` double(10,2) NOT NULL DEFAULT '0.00',
  `paid_amount` double(10,2) DEFAULT '0.00',
  `paid_through_id` int DEFAULT NULL,
  `cheque_no` varchar(30) DEFAULT NULL,
  `cheque_date` date DEFAULT NULL,
  `payment_comment` text,
  `discount` double(10,2) NOT NULL DEFAULT '0.00',
  `discount_type` varchar(10) NOT NULL DEFAULT 'tk',
  `vat` double(10,2) NOT NULL DEFAULT '0.00',
  `vat_type` varchar(10) NOT NULL DEFAULT '%',
  `shipping_charge` double(10,2) NOT NULL DEFAULT '0.00',
  `note` text,
  `files` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `code`, `vendor_id`, `delivery_person_id`, `branch_id`, `total_amount`, `paid_amount`, `paid_through_id`, `cheque_no`, `cheque_date`, `payment_comment`, `discount`, `discount_type`, `vat`, `vat_type`, `shipping_charge`, `note`, `files`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, '000001', 2, NULL, 1, 400.00, 0.00, NULL, NULL, NULL, 'comment', 0.00, 'tk', 100.00, 'tk', 20.52, 'note', NULL, '2023-09-24 17:10:23', 1, '2023-09-24 17:10:23', 1, NULL),
(2, '000002', 2, NULL, 1, 400.00, 0.00, NULL, NULL, NULL, 'comment', 0.00, 'tk', 100.00, 'tk', 20.52, 'note', '[\"purchases\\/120_000002_Business Mail.docx\",\"purchases\\/516_000002_Cover Letter.docx\"]', '2023-09-24 17:17:23', 1, '2023-09-24 17:17:23', 1, NULL),
(3, '000003', 2, NULL, 1, 0.00, 0.00, NULL, NULL, NULL, NULL, 0.00, 'tk', 0.00, '%', 0.00, NULL, NULL, '2023-09-24 17:30:06', 1, '2023-09-24 17:30:06', 1, NULL),
(4, '000004', 2, NULL, 1, 115555.00, 15555.00, NULL, NULL, NULL, 'com', 1000.00, 'tk', 5.00, '%', 55.00, 'note', '[\"purchases\\/567_000004_[TorrentBD]Udemy - The Complete 2022 Web Development Bootcamp - Dr  Angela Yu [May 2022].torrent\",\"purchases\\/906_000004_[TorrentBD]Udemy - The Complete JavaScript Course 2023 From Zero to Expert! [Last updated 112022].torrent\"]', '2023-09-24 17:38:42', 1, '2023-09-24 17:38:42', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `details` text,
  `manager_role_id` int DEFAULT NULL,
  `deletable` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `details`, `manager_role_id`, `deletable`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', 'Have All The Previlages', NULL, 0, 1, '2023-08-23 18:39:01', 1, '2023-08-27 14:29:20', NULL),
(6, 'Seller', 'Owner of a shop', 1, 1, 1, '2023-08-25 05:32:30', 0, '2023-08-25 18:15:03', NULL),
(10, '123', NULL, 1, 1, 1, '2023-08-31 11:29:18', 1, '2023-08-31 14:31:41', '2023-08-31 20:31:41'),
(11, 'Super Admin123', 'Have All The Previlages123', 10, 1, 1, '2023-08-31 11:29:58', 1, '2023-08-31 14:31:44', '2023-08-31 20:31:44'),
(12, 'Super Admin', '432re32rd', NULL, 1, 1, '2023-08-31 11:30:06', 1, '2023-08-31 14:31:45', '2023-08-31 20:31:45'),
(13, 'Super Admin', 'Owner of a shop', NULL, 1, 1, '2023-08-31 11:32:30', 1, '2023-08-31 14:31:46', '2023-08-31 20:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `base_unit` double DEFAULT NULL,
  `details` text,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `base_unit`, `details`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Base Unit', 1, 'This is the Base Unit. By default Unit for Products', 1, 1, '2023-09-15 17:23:41', '2023-09-15 17:23:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(500) DEFAULT 'users/user.jpg',
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verified` varchar(10) NOT NULL DEFAULT 'no',
  `nid_image` text,
  `role_id` int NOT NULL,
  `branch_id` int NOT NULL,
  `manager_role_id` int DEFAULT NULL,
  `manager_id` int DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `details` text,
  `date_of_birth` date DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `phone` bigint NOT NULL,
  `phone_1` varchar(20) DEFAULT NULL,
  `address` text,
  `deletable` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `username`, `email`, `password`, `verified`, `nid_image`, `role_id`, `branch_id`, `manager_role_id`, `manager_id`, `company`, `details`, `date_of_birth`, `joining_date`, `phone`, `phone_1`, `address`, `deletable`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(0, 'Developer', 'users/user-5.jpg', 'developer', 'developer@erp.com', '$2y$10$QC3QiW2ywrbZgYPz0MSAeeHaL02sGnjz.Yu.P3ajwfbdILfz76mF6', 'yes', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1633394589, NULL, NULL, 0, '2023-08-26 01:50:01', '2023-08-26 01:50:01', 0, 0, NULL),
(1, 'Super Admin', 'users/user_admin.jpg', 'admin', 'admin@erp.com', '$2y$10$QC3QiW2ywrbZgYPz0MSAeeHaL02sGnjz.Yu.P3ajwfbdILfz76mF6', 'yes', 'user_nid/nid_admin.jpg', 1, 1, NULL, NULL, NULL, 'Owner of this project', NULL, NULL, 1987654321, NULL, 'Dhaka, Bangladesh', 0, '2023-09-03 18:29:39', '2023-09-03 18:29:39', 1, 1, NULL),
(13, 'Mahbub Faruk123', 'users/user_admin9.png', 'admin9', 'mahbub168@gmail.com', '$2y$10$qgxxNCnSiT7VskIHZAdx7.QTwWBMec5yd/tBxHSmO/D9s0ml7jn7e', 'yes', 'user_nid/nid_admin9.jpg', 6, 6, 1, 1, 'Bangladesh Air Force', NULL, '2023-08-08', '2023-08-02', 1678054660, '01633394589', '201 MU BAF', 1, '2023-08-31 22:19:58', '2023-09-22 09:54:47', 1, 1, NULL),
(16, 'Tahmeed Mahbub', 'users/user.jpg', 'admin10', 'tahmidmahbub168@gmail.com', '$2y$10$SMepn3O5nB8IjpXE.OQ7/ehMzZcuBm0fzJ793eWYQONwyY4xlIn3S', 'yes', NULL, 6, 6, 6, 16, 'American Internation University - Bangladesh', NULL, NULL, NULL, 1633394589, NULL, '118/6 (Infront of mount hermann high school), North Kafrul, Kafrul, Dhaka-1206', 1, '2023-08-31 20:19:58', '2023-08-31 20:28:45', 1, 1, '2023-08-31 20:28:45'),
(17, 'Tahmeed Mahbub', 'users/user.jpg', 'admin432', 'tahmidmahbub168@gmail.com', '$2y$10$gLHy9EbY9/UdvVeTyZhqKOFJk88bqPUdWWjflAYT4pGwadRA.k12i', 'yes', NULL, 6, 6, 1, 1, 'American Internation University - Bangladesh', NULL, NULL, NULL, 1633394589, NULL, '118/6 (Infront of mount hermann high school), North Kafrul, Kafrul, Dhaka-1206', 1, '2023-09-01 14:45:39', '2023-09-01 14:45:39', 1, 1, NULL),
(18, 'Xena Pacheco', 'users/user.jpg', 'zegyxykezo', 'wucokawe@mailinator.com', '$2y$10$GsCNkTzIe/kLFDbblQdDneOajk938VnX9zxoZj4H59jCp0081SQMa', 'yes', NULL, 1, 1, 1, 1, 'Watkins Velasquez Associates', NULL, '2000-12-03', '2013-07-08', 7214813266, '+1 (381) 919-2779', 'Expedita proident m', 1, '2023-09-02 07:27:56', '2023-09-02 07:27:56', 1, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_levels`
--
ALTER TABLE `access_levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_levels_ibfk_1` (`module_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_type_id` (`account_type_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

--
-- Indexes for table `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_code_unique` (`code`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `contact_categories`
--
ALTER TABLE `contact_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `parent_category_id` (`parent_category_id`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_unique` (`code`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `parent_category_id` (`parent_category_id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `module_id` (`module_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `delivery_person_id` (`delivery_person_id`),
  ADD KEY `paid_through_id` (`paid_through_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `manager_role_id` (`manager_role_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `manager_id` (`manager_id`),
  ADD KEY `manager_role_id` (`manager_role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_levels`
--
ALTER TABLE `access_levels`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `account_types`
--
ALTER TABLE `account_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contact_categories`
--
ALTER TABLE `contact_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_levels`
--
ALTER TABLE `access_levels`
  ADD CONSTRAINT `access_levels_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `access_levels_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `access_levels_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`account_type_id`) REFERENCES `account_types` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `accounts_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `accounts_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `accounts_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `branches_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `brands_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `brands_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `item_categories` (`id`);

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `contacts_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `contacts_ibfk_3` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `contacts_ibfk_4` FOREIGN KEY (`category_id`) REFERENCES `contact_categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `contact_categories`
--
ALTER TABLE `contact_categories`
  ADD CONSTRAINT `contact_categories_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `contact_categories_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `contact_categories_ibfk_3` FOREIGN KEY (`parent_category_id`) REFERENCES `contact_categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `histories`
--
ALTER TABLE `histories`
  ADD CONSTRAINT `histories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `items_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `item_categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `items_ibfk_4` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `items_ibfk_5` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD CONSTRAINT `item_categories_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `item_categories_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `item_categories_ibfk_3` FOREIGN KEY (`parent_category_id`) REFERENCES `item_categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `permissions_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `permissions_ibfk_3` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permissions_ibfk_4` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `purchases_ibfk_3` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `purchases_ibfk_4` FOREIGN KEY (`delivery_person_id`) REFERENCES `contacts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `purchases_ibfk_5` FOREIGN KEY (`paid_through_id`) REFERENCES `accounts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `purchases_ibfk_6` FOREIGN KEY (`vendor_id`) REFERENCES `contacts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `roles_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `roles_ibfk_3` FOREIGN KEY (`manager_role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `units_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `users_ibfk_5` FOREIGN KEY (`manager_role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `users_ibfk_6` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
