-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2018 at 11:17 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `risk_register`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('fvdokea051e0ptfjovhbjn9tgshovd99', '127.0.0.1', 1521052934, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035323933343b6c6f676765645f696e7c613a373a7b733a373a22757365725f6964223b733a313a2239223b733a383a22757365726e616d65223b733a343a226a656666223b733a31303a2266697273745f6e616d65223b733a343a224a656666223b733a393a226c6173745f6e616d65223b733a353a224d79657273223b733a373a22726f6c655f6964223b733a323a223130223b733a31353a22757365725f70726f6a6563745f6964223b733a313a2237223b733a31373a227265706f72745f70726f6a6563745f6964223b4e3b7d),
('0lij3juqrb3sr0s0lm5d0dr50l641iq5', '127.0.0.1', 1521053242, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035333234323b6c6f676765645f696e7c613a373a7b733a373a22757365725f6964223b733a313a2239223b733a383a22757365726e616d65223b733a343a226a656666223b733a31303a2266697273745f6e616d65223b733a343a224a656666223b733a393a226c6173745f6e616d65223b733a353a224d79657273223b733a373a22726f6c655f6964223b733a323a223130223b733a31353a22757365725f70726f6a6563745f6964223b733a313a2237223b733a31373a227265706f72745f70726f6a6563745f6964223b4e3b7d),
('ln32rqn84eh1dlfdh2s0mssokeeup86s', '127.0.0.1', 1521055092, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035353039323b6c6f676765645f696e7c613a373a7b733a373a22757365725f6964223b733a313a2239223b733a383a22757365726e616d65223b733a343a226a656666223b733a31303a2266697273745f6e616d65223b733a343a224a656666223b733a393a226c6173745f6e616d65223b733a353a224d79657273223b733a373a22726f6c655f6964223b733a323a223130223b733a31353a22757365725f70726f6a6563745f6964223b733a313a2237223b733a31373a227265706f72745f70726f6a6563745f6964223b4e3b7d),
('mg90hanc4hd4gqhmni5ep70f09lutasq', '127.0.0.1', 1521055425, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035353432353b6c6f676765645f696e7c613a373a7b733a373a22757365725f6964223b733a313a2239223b733a383a22757365726e616d65223b733a343a226a656666223b733a31303a2266697273745f6e616d65223b733a343a224a656666223b733a393a226c6173745f6e616d65223b733a353a224d79657273223b733a373a22726f6c655f6964223b733a323a223130223b733a31353a22757365725f70726f6a6563745f6964223b733a313a2237223b733a31373a227265706f72745f70726f6a6563745f6964223b4e3b7d),
('h147n6ske7uo9oukcp9e3fodr36a9p7c', '127.0.0.1', 1521057833, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035373833333b6c6f676765645f696e7c613a373a7b733a373a22757365725f6964223b733a313a2239223b733a383a22757365726e616d65223b733a343a226a656666223b733a31303a2266697273745f6e616d65223b733a343a224a656666223b733a393a226c6173745f6e616d65223b733a353a224d79657273223b733a373a22726f6c655f6964223b733a323a223130223b733a31353a22757365725f70726f6a6563745f6964223b733a313a2237223b733a31373a227265706f72745f70726f6a6563745f6964223b4e3b7d),
('68ol8rqnnhquljqttcg801anqm92bhr5', '127.0.0.1', 1521058622, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035383632323b6c6f676765645f696e7c613a373a7b733a373a22757365725f6964223b733a313a2239223b733a383a22757365726e616d65223b733a343a226a656666223b733a31303a2266697273745f6e616d65223b733a343a224a656666223b733a393a226c6173745f6e616d65223b733a353a224d79657273223b733a373a22726f6c655f6964223b733a323a223130223b733a31353a22757365725f70726f6a6563745f6964223b733a313a2237223b733a31373a227265706f72745f70726f6a6563745f6964223b733a313a2237223b7d),
('8al1htamcfn9mrfavcgspvn7ijpjbf49', '127.0.0.1', 1521059109, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035393130393b6c6f676765645f696e7c613a373a7b733a373a22757365725f6964223b733a313a2239223b733a383a22757365726e616d65223b733a343a226a656666223b733a31303a2266697273745f6e616d65223b733a343a224a656666223b733a393a226c6173745f6e616d65223b733a353a224d79657273223b733a373a22726f6c655f6964223b733a323a223130223b733a31353a22757365725f70726f6a6563745f6964223b733a313a2237223b733a31373a227265706f72745f70726f6a6563745f6964223b4e3b7d),
('r752po74cim8bfbiu294rtta9jvsnj3k', '127.0.0.1', 1521059855, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035393835353b6c6f676765645f696e7c613a373a7b733a373a22757365725f6964223b733a313a2239223b733a383a22757365726e616d65223b733a343a226a656666223b733a31303a2266697273745f6e616d65223b733a343a224a656666223b733a393a226c6173745f6e616d65223b733a353a224d79657273223b733a373a22726f6c655f6964223b733a323a223130223b733a31353a22757365725f70726f6a6563745f6964223b733a313a2237223b733a31373a227265706f72745f70726f6a6563745f6964223b4e3b7d),
('rgvpvnp2bapobpj318l9vmafprqiqies', '127.0.0.1', 1521060349, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036303334393b6c6f676765645f696e7c613a373a7b733a373a22757365725f6964223b733a313a2239223b733a383a22757365726e616d65223b733a343a226a656666223b733a31303a2266697273745f6e616d65223b733a343a224a656666223b733a393a226c6173745f6e616d65223b733a353a224d79657273223b733a373a22726f6c655f6964223b733a323a223130223b733a31353a22757365725f70726f6a6563745f6964223b733a313a2237223b733a31373a227265706f72745f70726f6a6563745f6964223b733a313a2237223b7d),
('nrn9o8hm0lnghq2asnl7fpga1m15m6ma', '127.0.0.1', 1521060667, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036303636373b6c6f676765645f696e7c613a31313a7b733a373a22757365725f6964223b733a313a2239223b733a383a22757365726e616d65223b733a343a226a656666223b733a31303a2266697273745f6e616d65223b733a343a224a656666223b733a393a226c6173745f6e616d65223b733a353a224d79657273223b733a373a22726f6c655f6964223b733a323a223130223b733a31353a22757365725f70726f6a6563745f6964223b733a313a2237223b733a31373a227265706f72745f70726f6a6563745f6964223b733a313a2237223b733a31313a2263617465676f72795f6964223b733a323a223239223b733a31313a2272656769737465725f6964223b733a343a224e6f6e65223b733a393a22646174655f66726f6d223b733a303a22223b733a373a22646174655f746f223b733a303a22223b7d),
('9kesneipsam5t2a4j71n309bl4fi6ki1', '127.0.0.1', 1521060903, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036303636373b6c6f676765645f696e7c613a31313a7b733a373a22757365725f6964223b733a313a2239223b733a383a22757365726e616d65223b733a343a226a656666223b733a31303a2266697273745f6e616d65223b733a343a224a656666223b733a393a226c6173745f6e616d65223b733a353a224d79657273223b733a373a22726f6c655f6964223b733a323a223130223b733a31353a22757365725f70726f6a6563745f6964223b733a313a2237223b733a31373a227265706f72745f70726f6a6563745f6964223b733a313a2237223b733a31313a2263617465676f72795f6964223b733a323a223331223b733a31313a2272656769737465725f6964223b733a343a224e6f6e65223b733a393a22646174655f66726f6d223b733a303a22223b733a373a22646174655f746f223b733a303a22223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `CostMetric`
--

CREATE TABLE `CostMetric` (
  `cost_id` int(11) NOT NULL,
  `cost_rating` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cost_description` mediumtext,
  `Project_project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CostMetric`
--

INSERT INTO `CostMetric` (`cost_id`, `cost_rating`, `created_at`, `updated_at`, `cost_description`, `Project_project_id`) VALUES
(1, '1', NULL, NULL, '1 million dollars', 0),
(2, '2', NULL, NULL, '2 million dollars', 0),
(3, '3', NULL, NULL, '3 million dollars', 0),
(4, '4', NULL, NULL, '4 million dollars', 0),
(5, '5', NULL, NULL, '5 million dollars', 0),
(8, '1', NULL, NULL, '1 million', 7),
(9, '2', NULL, NULL, '2 million', 7),
(10, '3', NULL, NULL, '3 Million', 7),
(11, '4', NULL, NULL, '4 Million', 7),
(12, '5', NULL, NULL, '5 Million', 7);

-- --------------------------------------------------------

--
-- Table structure for table `CurrentRiskLevels`
--

CREATE TABLE `CurrentRiskLevels` (
  `id` int(11) NOT NULL,
  `likelihood` int(11) DEFAULT NULL,
  `reputation_impact` int(11) DEFAULT NULL,
  `hs_impact` int(11) DEFAULT NULL,
  `env_impact` int(11) DEFAULT NULL,
  `legal_impact` int(11) DEFAULT NULL,
  `quality_impact` int(11) DEFAULT NULL,
  `risk_rating` int(11) DEFAULT NULL,
  `risk_level` varchar(45) DEFAULT NULL,
  `risk_uuid` varchar(128) DEFAULT NULL,
  `CostMetric_cost_id` int(11) NOT NULL,
  `ScheduleMetric_schedule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Entity`
--

CREATE TABLE `Entity` (
  `entity_id` int(11) NOT NULL,
  `entity_name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Project_project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Entity`
--

INSERT INTO `Entity` (`entity_id`, `entity_name`, `created_at`, `updated_at`, `Project_project_id`) VALUES
(1, 'Owner', NULL, NULL, 0),
(2, 'Government', NULL, NULL, 0),
(3, 'Contractor', NULL, NULL, 0),
(4, 'House', NULL, NULL, 3),
(5, 'Temple', NULL, NULL, 3),
(6, 'Vendor', NULL, NULL, 7),
(7, 'Contractor', NULL, NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `Hazards`
--

CREATE TABLE `Hazards` (
  `hazard_id` int(11) NOT NULL,
  `hazard_name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `MaterializationPhase`
--

CREATE TABLE `MaterializationPhase` (
  `materialization_id` int(11) NOT NULL,
  `materialization_name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Project_project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MaterializationPhase`
--

INSERT INTO `MaterializationPhase` (`materialization_id`, `materialization_name`, `created_at`, `updated_at`, `Project_project_id`) VALUES
(1, 'Project Execution', NULL, NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `PreRiskLevels`
--

CREATE TABLE `PreRiskLevels` (
  `id` int(11) NOT NULL,
  `likelihood` int(11) DEFAULT NULL,
  `reputation_impact` int(11) DEFAULT NULL,
  `hs_impact` int(11) DEFAULT NULL,
  `env_impact` int(11) DEFAULT NULL,
  `legal_impact` int(11) DEFAULT NULL,
  `quality_impact` int(11) DEFAULT NULL,
  `risk_rating` int(11) DEFAULT NULL,
  `risk_level` varchar(45) DEFAULT NULL,
  `risk_uuid` varchar(128) DEFAULT NULL,
  `CostMetric_cost_id` int(11) NOT NULL,
  `ScheduleMetric_schedule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Project`
--

CREATE TABLE `Project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(45) DEFAULT NULL,
  `project_description` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `User_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Project`
--

INSERT INTO `Project` (`project_id`, `project_name`, `project_description`, `created_at`, `updated_at`, `User_user_id`) VALUES
(2, 'BART Silicon Valley Phase II (BSVII)', 'Comparative Analysis (CA) of Tunneling Method', '2017-10-08 17:22:19', '2017-10-08 17:22:19', 1),
(3, 'REM (CDPQ Tunnel)', 'REM', '2017-11-18 17:48:35', '2017-11-18 17:48:35', 3),
(4, 'CIP Risk Register 2005', 'CIP', '2017-11-25 20:51:40', '2017-11-25 20:51:40', 6),
(5, 'Bob\'s Big Project', 'This is the mother load.', '2017-12-22 15:05:20', '2017-12-22 15:05:20', 8),
(6, 'Toronto Airport 2', 'Pedestrian Tunnel', '2018-01-25 1:14:05', '2018-01-25 1:14:05', 3),
(7, 'Montreal Airport Station', 'February workshop', '2018-01-31 11:22:56', '2018-01-31 11:22:56', 9),
(8, 'BCSIS', 'Blacklick Creek Sanitary Interceptor Sewer', '2018-02-22 14:06:35', '2018-02-22 14:06:35', 9);

-- --------------------------------------------------------

--
-- Table structure for table `Realization`
--

CREATE TABLE `Realization` (
  `realization_id` int(11) NOT NULL,
  `realization_name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Project_project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Realization`
--

INSERT INTO `Realization` (`realization_id`, `realization_name`, `created_at`, `updated_at`, `Project_project_id`) VALUES
(1, 'Yes', NULL, NULL, 0),
(2, 'No', NULL, NULL, 0),
(3, 'Yes', NULL, NULL, 7),
(4, 'No', NULL, NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `RegisterCopy`
--

CREATE TABLE `RegisterCopy` (
  `copy_id` int(11) NOT NULL,
  `Subproject_subproject_id` int(11) NOT NULL,
  `original_id` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RegisterCopy`
--

INSERT INTO `RegisterCopy` (`copy_id`, `Subproject_subproject_id`, `original_id`) VALUES
(1, 34, '33'),
(2, 35, '33'),
(3, 36, '33');

-- --------------------------------------------------------

--
-- Table structure for table `ResponseTitle`
--

CREATE TABLE `ResponseTitle` (
  `response_id` int(11) NOT NULL,
  `response_name` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `Project_project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ResponseTitle`
--

INSERT INTO `ResponseTitle` (`response_id`, `response_name`, `created_at`, `updated_at`, `Project_project_id`) VALUES
(1, 'Electricity Harzard', '2018-03-06 00:00:00', '2018-03-06 00:00:00', 7),
(2, 'Oil Spill', '2018-03-06 00:00:00', '2018-03-06 00:00:00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `RiskCategories`
--

CREATE TABLE `RiskCategories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Project_project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RiskCategories`
--

INSERT INTO `RiskCategories` (`category_id`, `category_name`, `created_at`, `updated_at`, `Project_project_id`) VALUES
(1, 'Construction', NULL, NULL, 0),
(2, 'Design/Mock-up', NULL, NULL, 0),
(3, 'Interface', NULL, NULL, 0),
(4, 'Logistics/Delivery', NULL, NULL, 0),
(5, 'Permits & Appovals', NULL, NULL, 0),
(6, 'Procurement/Commercial/Scope', NULL, NULL, 0),
(7, 'Project Management (PM)', NULL, NULL, 0),
(8, 'Quality/Health & Safety/Environment (QHSE)', NULL, NULL, 0),
(9, 'Financial', NULL, NULL, 0),
(10, 'Stakeholder', NULL, NULL, 0),
(11, 'Asset/Asset Management', NULL, NULL, 0),
(12, 'Security', NULL, NULL, 0),
(13, 'Compliance/Law/Regulation', NULL, NULL, 0),
(14, 'Systems Integration', NULL, NULL, 0),
(15, 'Maintenance (Management System, MMS)', NULL, NULL, 0),
(16, 'Testing & Commissioning', NULL, NULL, 0),
(17, 'Human Resources (HR)', NULL, NULL, 0),
(18, 'Availability - System Safety (RAMS)', NULL, NULL, 0),
(19, 'Rolling Stock', NULL, NULL, 0),
(20, 'Normal Operations (N)', NULL, NULL, 0),
(21, 'Special Operations (S)', NULL, NULL, 0),
(22, 'Maintenance (M)', NULL, NULL, 0),
(23, 'Emergencies (E)', NULL, NULL, 0),
(24, 'Fire Life Safety (FLS)/Civil Defense (CD)', NULL, NULL, 0),
(25, 'Validation', NULL, NULL, 0),
(26, 'Handover', NULL, NULL, 0),
(27, 'Administration', NULL, NULL, 7),
(28, 'Stakeholders', NULL, NULL, 7),
(29, 'Design', NULL, NULL, 7),
(30, 'Construction', NULL, NULL, 7),
(31, 'Operations', NULL, NULL, 7),
(32, 'Construction', NULL, NULL, 8);

-- --------------------------------------------------------

--
-- Table structure for table `RiskOwner`
--

CREATE TABLE `RiskOwner` (
  `riskowner_id` int(11) NOT NULL,
  `risk_owner` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Project_project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RiskOwner`
--

INSERT INTO `RiskOwner` (`riskowner_id`, `risk_owner`, `created_at`, `updated_at`, `Project_project_id`) VALUES
(1, 'VTA', NULL, NULL, 0),
(2, 'Contractor', NULL, NULL, 0),
(3, 'PM', NULL, NULL, 0),
(4, 'Federal Government', NULL, NULL, 3),
(5, 'Government', NULL, NULL, 7),
(6, 'Contrator', NULL, NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `RiskRegistry`
--

CREATE TABLE `RiskRegistry` (
  `item_id` int(11) NOT NULL,
  `identified_hazard_risk` mediumtext,
  `cause_trigger` mediumtext,
  `materialization_phase` varchar(45) DEFAULT NULL,
  `likelihood` int(11) DEFAULT NULL,
  `time_impact` int(11) DEFAULT NULL,
  `cost_impact` int(11) DEFAULT NULL,
  `reputation_impact` int(11) DEFAULT NULL,
  `hs_impact` int(11) DEFAULT NULL,
  `env_impact` int(11) DEFAULT NULL,
  `legal_impact` int(11) DEFAULT NULL,
  `quality_impact` int(11) DEFAULT NULL,
  `risk_rating` int(11) DEFAULT NULL,
  `risk_level` varchar(100) DEFAULT NULL,
  `control_mitigation` longtext,
  `milestone_target_date` mediumtext,
  `Status_status_id` int(11) NOT NULL,
  `SystemSafety_safety_id` int(11) NOT NULL,
  `RiskCategories_category_id` int(11) NOT NULL,
  `Realization_realization_id` int(11) NOT NULL,
  `Subproject_subproject_id` int(11) NOT NULL,
  `effect` mediumtext,
  `effective_date` date DEFAULT NULL,
  `User_user_id` int(11) NOT NULL,
  `archived` tinyint(4) DEFAULT NULL,
  `archived_date` varchar(45) DEFAULT NULL,
  `RiskOwner_riskowner_id` int(11) NOT NULL,
  `description_change` longtext,
  `entity` varchar(100) DEFAULT NULL,
  `risk_title` varchar(100) DEFAULT NULL,
  `project_location` varchar(100) DEFAULT NULL,
  `risk_uuid` varchar(128) DEFAULT NULL,
  `duplicated` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `Entity_entity_id` int(11) NOT NULL,
  `materialization_phase_materialization_id` int(11) NOT NULL,
  `CostMetric_cost_id` int(11) NOT NULL,
  `ScheduleMetric_schedule_id` int(11) NOT NULL,
  `likelihood_current` int(11) DEFAULT NULL,
  `reputation_impact_current` int(11) DEFAULT NULL,
  `hs_impact_current` int(11) DEFAULT NULL,
  `env_impact_current` int(11) DEFAULT NULL,
  `legal_impact_current` int(11) DEFAULT NULL,
  `quality_impact_current` int(11) DEFAULT NULL,
  `risk_rating_current` int(11) DEFAULT NULL,
  `risk_level_current` varchar(45) DEFAULT NULL,
  `likelihood_target` int(11) DEFAULT NULL,
  `reputation_impact_target` int(11) DEFAULT NULL,
  `hs_impact_target` int(11) DEFAULT NULL,
  `env_impact_target` int(11) DEFAULT NULL,
  `legal_impact_target` int(11) DEFAULT NULL,
  `quality_impact_target` int(11) DEFAULT NULL,
  `risk_rating_target` int(11) DEFAULT NULL,
  `risk_level_target` varchar(45) DEFAULT NULL,
  `time_impact_current` int(11) DEFAULT NULL,
  `cost_impact_current` int(11) DEFAULT NULL,
  `time_impact_target` int(11) DEFAULT NULL,
  `cost_impact_target` int(11) DEFAULT NULL,
  `action_owner` int(11) DEFAULT NULL,
  `action_item` longtext,
  `RiskSubCategories_subcategory_id` int(11) NOT NULL,
  `original_risk_id` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RiskRegistry`
--

INSERT INTO `RiskRegistry` (`item_id`, `identified_hazard_risk`, `cause_trigger`, `materialization_phase`, `likelihood`, `time_impact`, `cost_impact`, `reputation_impact`, `hs_impact`, `env_impact`, `legal_impact`, `quality_impact`, `risk_rating`, `risk_level`, `control_mitigation`, `milestone_target_date`, `Status_status_id`, `SystemSafety_safety_id`, `RiskCategories_category_id`, `Realization_realization_id`, `Subproject_subproject_id`, `effect`, `effective_date`, `User_user_id`, `archived`, `archived_date`, `RiskOwner_riskowner_id`, `description_change`, `entity`, `risk_title`, `project_location`, `risk_uuid`, `duplicated`, `created_at`, `Entity_entity_id`, `materialization_phase_materialization_id`, `CostMetric_cost_id`, `ScheduleMetric_schedule_id`, `likelihood_current`, `reputation_impact_current`, `hs_impact_current`, `env_impact_current`, `legal_impact_current`, `quality_impact_current`, `risk_rating_current`, `risk_level_current`, `likelihood_target`, `reputation_impact_target`, `hs_impact_target`, `env_impact_target`, `legal_impact_target`, `quality_impact_target`, `risk_rating_target`, `risk_level_target`, `time_impact_current`, `cost_impact_current`, `time_impact_target`, `cost_impact_target`, `action_owner`, `action_item`, `RiskSubCategories_subcategory_id`, `original_risk_id`) VALUES
(1, 'Excessive amount of reportable lost work days', 'Uncontrolled hazardous situations and hazradous events.', 'Project execution', 1, 1, 1, 1, 2, 1, 1, 1, 2, 'Threat Low', NULL, 'Prior to and during project execution', 2, 13, 8, 1, 2, 'Harm to people', NULL, 2, 0, NULL, 3, 'We added a title', NULL, 'Worker strike', 'Ohio', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(2, 'VTA/BART\'s (partly) Non-ISO 31000 compatible RM approach', 'Potential combination of Lack of understanding and Lack of experience.', 'Construction', 4, 1, 1, 1, 1, 1, 1, 1, 4, 'Threat Medium', 'Implement & maintain Best Management Practices (BMP) & State of the Art in project risk management\r\n- Based on ISO 31000\r\n- Follow a System Risk Management Approach\r\n- Integrate all stakeholders from the beginning & as much as possible', 'Prior to construction', 2, 7, 7, 1, 4, 'Differences in understanding how to control risks effectively & efficiently.', NULL, 2, 0, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(3, 'Different ground conditions encountered from the ones assumed during Preliminary Engineering', 'Major unforseen ground conditions', 'Construction', 3, 1, 3, 1, 1, 1, 1, 1, 9, 'Threat Medium', 'Carry out supplementary staged site investigations.', 'Prior to construction', 2, 5, 1, 1, 3, 'Additional cost & delays', NULL, 2, 1, '2017-11-28 9:55:58', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(14, 'Different ground conditions encountered from the ones assumed during Preliminary Engineering', 'Major unforseen ground conditions', 'Construction', 3, 1, 3, 1, 1, 1, 1, 1, 9, 'Threat Medium', 'Carry out supplementary staged site investigations.', 'Prior to construction', 2, 5, 1, 1, 3, 'Additional cost & delays', NULL, 2, 1, '2017-11-28 9:55:58', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(15, 'xxx', 'xxx', 'xxx', 3, 1, 1, 1, 1, 1, 1, 1, 3, 'Threat Low', NULL, 'xxx', 1, 3, 1, 1, 17, 'xxxx', NULL, 8, 0, NULL, 2, 'xxxx', 'contractor', 'xxx', 'xxx', '29569b06-17b2-4c95-bf57-a8c4b9456c20', NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(16, 'xxx', 'xxxxx', 'xxx', 2, 2, 1, 1, 1, 1, 1, 1, 4, 'Threat Medium', NULL, 'xxxxx', 1, 6, 9, 1, 2, 'xxxx', NULL, 2, 0, NULL, 2, 'xxxxx', '0', 'xxxx', 'xxxx', 'fd3a3208-f019-4b99-a2fd-9ae06e7b9de4', NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(17, 'xxx', 'xxxxx', 'xxx', 2, 2, 1, 1, 1, 1, 1, 1, 4, 'Threat Medium', NULL, 'xxxxx', 1, 6, 10, 1, 2, 'xxxx', NULL, 2, 0, NULL, 2, 'xxxxx', 'owner', 'xxxx', 'xxxx', 'fd3a3208-f019-4b99-a2fd-9ae06e7b9de4', NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(35, 'Excessive amount of reportable lost work days', 'Uncontrolled hazardous situations and hazradous events.', 'Project execution', 1, 1, 1, 1, 2, 1, 1, 1, 2, 'Threat Low', '2. Implement & maintain throughout the project, as much as possible and at all times, a (contract & site-)specific & State-of-the-Art Safety Management System (SMS) and Health & Safety (H&S) Plan, including (but not necessarily limited to) a combination (by STOP) of\r\n2.1   Close cooperation & early coordination with all local Authorities Having Jurisdiction (AHJ),\r\n2.2.  Close cooperation & early coordination with all local emergency response services,\r\n2.3   Emergency Response and Rescue Plan,\r\n2.4.  Fire Prevention and Fighting Program / Plan,\r\n2.5   Legal Compliance Plan,\r\n2.6   Thoroughly investigate all major incidents/accidents,\r\n2.7   Daily Safety Briefings, Work Plans & Pre-Construction Meetings,\r\n2.8   Periodic Joint Safety Walks,\r\n2.9   Safety Audits, Job Hazard Analysis (JHA) prior to start any new activity,\r\n2.10   Permit-required confined space entry policy,\r\n2.11  Welding & hot works permit policy,\r\n2.12  Redundant communications systems,\r\n2.13  Safety systems on engines and vehicles (automatic braking, fire extinguishers etc.),\r\n2.14  Operate and maintain only CE-conforming machinery, equipment and systems,\r\n2.15  Return to Work Clerks,\r\n2.16  Reduced duty policy for recovering workers,\r\n2.17  Adequate Personal Protective Equipment (PPE),\r\n2.18  Site-specific initial & refresher operators training,\r\n2.19  Site-specific initial & refresher training for all personnel supposed to be on site at a specific point in time,\r\n2.20  Integrate Lessons Learned (Workshops) periodically,\r\n2.21  Integrate a Buddy System / Go For Safety Program from the beginning,\r\n2.22  Integrate all stakeholders from the beginning.', 'Prior to and during project execution', 2, 13, 8, 1, 26, 'Harm to people', NULL, 2, 0, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(36, 'xxx', 'xxxxx', 'xxx', 2, 2, 1, 1, 1, 1, 1, 1, 4, 'Threat Medium', NULL, 'xxxxx', 1, 6, 10, 1, 26, 'xxxx', NULL, 2, 0, NULL, 2, 'xxxxx', 'owner', 'xxxx', 'xxxx', 'fd3a3208-f019-4b99-a2fd-9ae06e7b9de4', NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(37, 'xxx', 'xxxxx', 'xxx', 2, 2, 1, 1, 1, 1, 1, 1, 4, 'Threat Medium', NULL, 'xxxxx', 1, 6, 10, 1, 26, 'xxxx', NULL, 2, 0, NULL, 2, 'xxxxx', 'owner', 'xxxx', 'xxxx', 'fd3a3208-f019-4b99-a2fd-9ae06e7b9de4', NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(38, 'Excessive amount of reportable lost work days', 'Uncontrolled hazardous situations and hazradous events.', 'Project execution', 1, 1, 1, 1, 2, 1, 1, 1, 2, 'Threat Low', '2. Implement & maintain throughout the project, as much as possible and at all times, a (contract & site-)specific & State-of-the-Art Safety Management System (SMS) and Health & Safety (H&S) Plan, including (but not necessarily limited to) a combination (by STOP) of\r\n2.1   Close cooperation & early coordination with all local Authorities Having Jurisdiction (AHJ),\r\n2.2.  Close cooperation & early coordination with all local emergency response services,\r\n2.3   Emergency Response and Rescue Plan,\r\n2.4.  Fire Prevention and Fighting Program / Plan,\r\n2.5   Legal Compliance Plan,\r\n2.6   Thoroughly investigate all major incidents/accidents,\r\n2.7   Daily Safety Briefings, Work Plans & Pre-Construction Meetings,\r\n2.8   Periodic Joint Safety Walks,\r\n2.9   Safety Audits, Job Hazard Analysis (JHA) prior to start any new activity,\r\n2.10   Permit-required confined space entry policy,\r\n2.11  Welding & hot works permit policy,\r\n2.12  Redundant communications systems,\r\n2.13  Safety systems on engines and vehicles (automatic braking, fire extinguishers etc.),\r\n2.14  Operate and maintain only CE-conforming machinery, equipment and systems,\r\n2.15  Return to Work Clerks,\r\n2.16  Reduced duty policy for recovering workers,\r\n2.17  Adequate Personal Protective Equipment (PPE),\r\n2.18  Site-specific initial & refresher operators training,\r\n2.19  Site-specific initial & refresher training for all personnel supposed to be on site at a specific point in time,\r\n2.20  Integrate Lessons Learned (Workshops) periodically,\r\n2.21  Integrate a Buddy System / Go For Safety Program from the beginning,\r\n2.22  Integrate all stakeholders from the beginning.', 'Prior to and during project execution', 2, 13, 8, 1, 27, 'Harm to people', NULL, 2, 0, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(39, 'xxx', 'xxxxx', 'xxx', 2, 2, 1, 1, 1, 1, 1, 1, 4, 'Threat Medium', NULL, 'xxxxx', 1, 6, 10, 1, 27, 'xxxx', NULL, 2, 0, NULL, 2, 'xxxxx', 'owner', 'xxxx', 'xxxx', 'fd3a3208-f019-4b99-a2fd-9ae06e7b9de4', NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(40, 'xxx', 'xxxxx', 'xxx', 2, 2, 1, 1, 1, 1, 1, 1, 4, 'Threat Medium', NULL, 'xxxxx', 1, 6, 10, 1, 27, 'xxxx', NULL, 2, 0, NULL, 2, 'xxxxx', 'owner', 'xxxx', 'xxxx', 'fd3a3208-f019-4b99-a2fd-9ae06e7b9de4', NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(41, 'Excessive amount of reportable lost work days', 'Uncontrolled hazardous situations and hazradous events.', 'Project execution', 1, 1, 1, 1, 2, 1, 1, 1, 2, 'Threat Low', '2. Implement & maintain throughout the project, as much as possible and at all times, a (contract & site-)specific & State-of-the-Art Safety Management System (SMS) and Health & Safety (H&S) Plan, including (but not necessarily limited to) a combination (by STOP) of\r\n2.1   Close cooperation & early coordination with all local Authorities Having Jurisdiction (AHJ),\r\n2.2.  Close cooperation & early coordination with all local emergency response services,\r\n2.3   Emergency Response and Rescue Plan,\r\n2.4.  Fire Prevention and Fighting Program / Plan,\r\n2.5   Legal Compliance Plan,\r\n2.6   Thoroughly investigate all major incidents/accidents,\r\n2.7   Daily Safety Briefings, Work Plans & Pre-Construction Meetings,\r\n2.8   Periodic Joint Safety Walks,\r\n2.9   Safety Audits, Job Hazard Analysis (JHA) prior to start any new activity,\r\n2.10   Permit-required confined space entry policy,\r\n2.11  Welding & hot works permit policy,\r\n2.12  Redundant communications systems,\r\n2.13  Safety systems on engines and vehicles (automatic braking, fire extinguishers etc.),\r\n2.14  Operate and maintain only CE-conforming machinery, equipment and systems,\r\n2.15  Return to Work Clerks,\r\n2.16  Reduced duty policy for recovering workers,\r\n2.17  Adequate Personal Protective Equipment (PPE),\r\n2.18  Site-specific initial & refresher operators training,\r\n2.19  Site-specific initial & refresher training for all personnel supposed to be on site at a specific point in time,\r\n2.20  Integrate Lessons Learned (Workshops) periodically,\r\n2.21  Integrate a Buddy System / Go For Safety Program from the beginning,\r\n2.22  Integrate all stakeholders from the beginning.', 'Prior to and during project execution', 2, 13, 8, 1, 28, 'Harm to people', NULL, 2, 0, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(42, 'xxx', 'xxxxx', 'xxx', 2, 2, 1, 1, 1, 1, 1, 1, 4, 'Threat Medium', NULL, 'xxxxx', 1, 6, 10, 1, 28, 'xxxx', NULL, 2, 0, NULL, 2, 'xxxxx', 'owner', 'xxxx', 'xxxx', 'fd3a3208-f019-4b99-a2fd-9ae06e7b9de4', NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(43, 'xxx', 'xxxxx', 'xxx', 2, 2, 1, 1, 1, 1, 1, 1, 4, 'Threat Medium', NULL, 'xxxxx', 1, 6, 10, 1, 28, 'xxxx', NULL, 2, 0, NULL, 2, 'xxxxx', 'owner', 'xxxx', 'xxxx', 'fd3a3208-f019-4b99-a2fd-9ae06e7b9de4', NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(44, 'Excessive amount of reportable lost work days', 'Uncontrolled hazardous situations and hazradous events.', 'Project execution', 1, 1, 1, 1, 2, 1, 1, 1, 2, 'Threat Low', '2. Implement & maintain throughout the project, as much as possible and at all times, a (contract & site-)specific & State-of-the-Art Safety Management System (SMS) and Health & Safety (H&S) Plan, including (but not necessarily limited to) a combination (by STOP) of\r\n2.1   Close cooperation & early coordination with all local Authorities Having Jurisdiction (AHJ),\r\n2.2.  Close cooperation & early coordination with all local emergency response services,\r\n2.3   Emergency Response and Rescue Plan,\r\n2.4.  Fire Prevention and Fighting Program / Plan,\r\n2.5   Legal Compliance Plan,\r\n2.6   Thoroughly investigate all major incidents/accidents,\r\n2.7   Daily Safety Briefings, Work Plans & Pre-Construction Meetings,\r\n2.8   Periodic Joint Safety Walks,\r\n2.9   Safety Audits, Job Hazard Analysis (JHA) prior to start any new activity,\r\n2.10   Permit-required confined space entry policy,\r\n2.11  Welding & hot works permit policy,\r\n2.12  Redundant communications systems,\r\n2.13  Safety systems on engines and vehicles (automatic braking, fire extinguishers etc.),\r\n2.14  Operate and maintain only CE-conforming machinery, equipment and systems,\r\n2.15  Return to Work Clerks,\r\n2.16  Reduced duty policy for recovering workers,\r\n2.17  Adequate Personal Protective Equipment (PPE),\r\n2.18  Site-specific initial & refresher operators training,\r\n2.19  Site-specific initial & refresher training for all personnel supposed to be on site at a specific point in time,\r\n2.20  Integrate Lessons Learned (Workshops) periodically,\r\n2.21  Integrate a Buddy System / Go For Safety Program from the beginning,\r\n2.22  Integrate all stakeholders from the beginning.', 'Prior to and during project execution', 2, 13, 8, 1, 29, 'Harm to people', NULL, 2, 0, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(45, 'xxx', 'xxxxx', 'xxx', 2, 2, 1, 1, 1, 1, 1, 1, 4, 'Threat Medium', NULL, 'xxxxx', 1, 6, 10, 1, 29, 'xxxx', NULL, 2, 0, NULL, 2, 'xxxxx', 'owner', 'xxxx', 'xxxx', 'fd3a3208-f019-4b99-a2fd-9ae06e7b9de4', NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(46, 'xxx', 'xxxxx', 'xxx', 2, 2, 1, 1, 1, 1, 1, 1, 4, 'Threat Medium', NULL, 'xxxxx', 1, 6, 10, 1, 29, 'xxxx', NULL, 2, 0, NULL, 2, 'xxxxx', 'owner', 'xxxx', 'xxxx', 'fd3a3208-f019-4b99-a2fd-9ae06e7b9de4', NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(47, 'Excessive amount of reportable lost work days', 'Uncontrolled hazardous situations and hazradous events.', 'Project execution', 1, 1, 1, 1, 2, 1, 1, 1, 2, 'Threat Low', '2. Implement & maintain throughout the project, as much as possible and at all times, a (contract & site-)specific & State-of-the-Art Safety Management System (SMS) and Health & Safety (H&S) Plan, including (but not necessarily limited to) a combination (by STOP) of\r\n2.1   Close cooperation & early coordination with all local Authorities Having Jurisdiction (AHJ),\r\n2.2.  Close cooperation & early coordination with all local emergency response services,\r\n2.3   Emergency Response and Rescue Plan,\r\n2.4.  Fire Prevention and Fighting Program / Plan,\r\n2.5   Legal Compliance Plan,\r\n2.6   Thoroughly investigate all major incidents/accidents,\r\n2.7   Daily Safety Briefings, Work Plans & Pre-Construction Meetings,\r\n2.8   Periodic Joint Safety Walks,\r\n2.9   Safety Audits, Job Hazard Analysis (JHA) prior to start any new activity,\r\n2.10   Permit-required confined space entry policy,\r\n2.11  Welding & hot works permit policy,\r\n2.12  Redundant communications systems,\r\n2.13  Safety systems on engines and vehicles (automatic braking, fire extinguishers etc.),\r\n2.14  Operate and maintain only CE-conforming machinery, equipment and systems,\r\n2.15  Return to Work Clerks,\r\n2.16  Reduced duty policy for recovering workers,\r\n2.17  Adequate Personal Protective Equipment (PPE),\r\n2.18  Site-specific initial & refresher operators training,\r\n2.19  Site-specific initial & refresher training for all personnel supposed to be on site at a specific point in time,\r\n2.20  Integrate Lessons Learned (Workshops) periodically,\r\n2.21  Integrate a Buddy System / Go For Safety Program from the beginning,\r\n2.22  Integrate all stakeholders from the beginning.', 'Prior to and during project execution', 2, 13, 8, 1, 30, 'Harm to people', NULL, 2, 0, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(48, 'xxx', 'xxxxx', 'xxx', 2, 2, 1, 1, 1, 1, 1, 1, 4, 'Threat Medium', NULL, 'xxxxx', 1, 6, 10, 1, 30, 'xxxx', NULL, 2, 0, NULL, 2, 'xxxxx', 'owner', 'xxxx', 'xxxx', 'fd3a3208-f019-4b99-a2fd-9ae06e7b9de4', NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(49, 'xxx', 'xxxxx', 'xxx', 2, 2, 1, 1, 1, 1, 1, 1, 4, 'Threat Medium', NULL, 'xxxxx', 1, 6, 10, 1, 30, 'xxxx', NULL, 2, 0, NULL, 2, 'xxxxx', 'owner', 'xxxx', 'xxxx', 'fd3a3208-f019-4b99-a2fd-9ae06e7b9de4', NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(50, 'Excessive amount of reportable lost work days', 'Uncontrolled hazardous situations and hazradous events.', 'Project execution', 1, 1, 1, 1, 2, 1, 1, 1, 2, 'Threat Low', '2. Implement & maintain throughout the project, as much as possible and at all times, a (contract & site-)specific & State-of-the-Art Safety Management System (SMS) and Health & Safety (H&S) Plan, including (but not necessarily limited to) a combination (by STOP) of\r\n2.1   Close cooperation & early coordination with all local Authorities Having Jurisdiction (AHJ),\r\n2.2.  Close cooperation & early coordination with all local emergency response services,\r\n2.3   Emergency Response and Rescue Plan,\r\n2.4.  Fire Prevention and Fighting Program / Plan,\r\n2.5   Legal Compliance Plan,\r\n2.6   Thoroughly investigate all major incidents/accidents,\r\n2.7   Daily Safety Briefings, Work Plans & Pre-Construction Meetings,\r\n2.8   Periodic Joint Safety Walks,\r\n2.9   Safety Audits, Job Hazard Analysis (JHA) prior to start any new activity,\r\n2.10   Permit-required confined space entry policy,\r\n2.11  Welding & hot works permit policy,\r\n2.12  Redundant communications systems,\r\n2.13  Safety systems on engines and vehicles (automatic braking, fire extinguishers etc.),\r\n2.14  Operate and maintain only CE-conforming machinery, equipment and systems,\r\n2.15  Return to Work Clerks,\r\n2.16  Reduced duty policy for recovering workers,\r\n2.17  Adequate Personal Protective Equipment (PPE),\r\n2.18  Site-specific initial & refresher operators training,\r\n2.19  Site-specific initial & refresher training for all personnel supposed to be on site at a specific point in time,\r\n2.20  Integrate Lessons Learned (Workshops) periodically,\r\n2.21  Integrate a Buddy System / Go For Safety Program from the beginning,\r\n2.22  Integrate all stakeholders from the beginning.', 'Prior to and during project execution', 2, 13, 8, 1, 31, 'Harm to people', NULL, 2, 0, NULL, 3, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(51, 'xxx', 'xxxxx', 'xxx', 2, 2, 1, 1, 1, 1, 1, 1, 4, 'Threat Medium', NULL, 'xxxxx', 1, 6, 10, 1, 31, 'xxxx', NULL, 2, 0, NULL, 2, 'xxxxx', 'owner', 'xxxx', 'xxxx', 'fd3a3208-f019-4b99-a2fd-9ae06e7b9de4', 1, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(52, 'xxx', 'xxxxx', 'xxx', 2, 2, 1, 1, 1, 1, 1, 1, 4, 'Threat Medium', NULL, 'xxxxx', 1, 6, 10, 1, 31, 'xxxx', NULL, 2, 0, NULL, 2, 'xxxxx', 'owner', 'xxxx', 'xxxx', 'fd3a3208-f019-4b99-a2fd-9ae06e7b9de4', 1, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(53, 'rr', 'rrr', NULL, 2, NULL, NULL, 1, 1, 1, 1, 1, 4, 'Threat Medium', NULL, '10/10/10', 8, 14, 27, 3, 33, 'rrr', '2018-01-31', 9, 1, '2018-01-31 17:07:06', 5, 'rrr', NULL, 'rrrr', 'rrrr', '67c97e5b-4662-479a-adb8-f4a9d16a7415', NULL, NULL, 6, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(54, 'lklkj', 'lkjljk', NULL, 1, NULL, NULL, 1, 1, 1, 1, 1, 1, 'Threat Low', NULL, '7/14/2018', 9, 14, 27, 3, 33, 'lkjlkjl', '2018-01-31', 9, 1, '2018-01-31 17:07:08', 5, 'jlksjaflj', NULL, 'Worker strike', 'Ohio', 'ef80db30-6152-4d92-aff3-7f2cda29dcd7', NULL, NULL, 6, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(55, 'Confusion among bidders over risk allocation and requirements of Airport Authority', 'imprecise contract documents and reference design', NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 30, 'Unknown Risk Level', NULL, '1/1/2018', 8, 14, 27, 3, 33, 'overpricing of work and high bid prices with a large spread of bids.', '2018-01-31', 9, 0, NULL, 5, 'Confusion among bidders over risk allocation and requirements of Airport Authority due to imprecise contract documents and reference design leads to overpricing of work and high bid prices with a large spread of bids.', NULL, 'Bidder confusion', 'Montreal', '2d6ca317-8b9f-4436-bbe3-2bc45343a9bf', NULL, NULL, 6, 1, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(56, 'Inadequate project controls of highly interconnected projects in compressed schedule', 'coordinating interdependent and time dependent projects', NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 16, 'Threat High', NULL, '1/1/2019', 8, 14, 27, 3, 33, 'delays to program schedule and const increase', '2018-02-01', 9, 0, NULL, 5, 'Inadequate project controls of highly interconnected projects in compressed schedule due to coordinating interdependent and time dependent projects leads to delays to program schedule and const increase. \r\n', NULL, 'Project Controls', 'Montreal', '702efa59-1638-455c-b974-6b721194ddca', NULL, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(57, 'Inadequately prepared construction contract form, including general and special conditions', 'late decision or lack of procurement strategy', NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 36, 'Unknown Risk Level', NULL, '1/1/2019', 8, 14, 27, 3, 33, 'additional cost and schedule delays', '2018-02-01', 9, 0, NULL, 5, 'Inadequately prepared construction contract form, including general and special conditions due to late decision or lack of procurement strategy leads to additional cost and schedule delays. \r\n', NULL, 'Inadequately prepared construction contract form', 'Montreal', 'f0b4c268-585e-4751-8681-eb2dcf774541', NULL, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(58, 'Road accidents', 'Lack of safety signs', NULL, 1, NULL, NULL, 1, 1, 1, 1, 1, 2, 'Threat Low', NULL, '11/01/18', 8, 14, 30, 3, 33, 'Reputation', '2018-02-02', 9, 1, '2018-02-02 13:19:12', 5, 'Expansion of road and signage installation', NULL, 'Mombasa Road Construction', 'JKIA', 'be603987-db16-4482-be29-ff9e74f3316c', NULL, NULL, 6, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(59, 'Overcrowding', 'Lack of spave', NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 3, 'Threat Low', NULL, '01/03/18', 8, 14, 27, 3, 33, 'Slow construction', '2018-02-02', 14, 0, NULL, 5, 'Road expansion', NULL, 'Outer Ring Road', 'Eastlands', '59ebcf9e-a2fd-4dd9-ae9c-873e60c07b02', NULL, NULL, 6, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(60, 'Insufficient project funding', 'various reasons', NULL, 1, NULL, NULL, 1, 1, 1, 1, 1, 25, 'Threat High', NULL, '7/14/2018', 8, 14, 27, 3, 33, 'Project delayed or cancelled', '2018-02-02', 15, 0, NULL, 5, 'Insufficient project funding due to various reasons leads to Project delayed or cancelled. \r\n', NULL, 'Insufficient project funding', 'Montreal', 'bfff2129-704d-45db-a106-2faebbf1a9f9', NULL, NULL, 7, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(61, 'Ventilation systems not working optimally across the facility', 'incompatible ventilation system designs', NULL, 3, NULL, NULL, 1, 4, 1, 1, 1, 12, 'Threat High', NULL, '7/14/2018', 8, 14, 31, 3, 33, 'excess O&M costs and safety issues  [Station, Mezzanine, Tunnel, CTT]', '2018-02-02', 15, 0, NULL, 5, 'Ventilation systems not working optimally across the facility due to incompatible ventilation system designs leads to excess O&M costs and safety issues  [Station, Mezzanine, Tunnel, CTT]\r\n', NULL, 'Ventilations Systems not working', 'Montreal', 'fb03013c-73fe-430e-80e5-2f3dad7ff1d5', NULL, NULL, 7, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(62, 'rr', 'rrr', NULL, 2, NULL, NULL, 1, 1, 1, 1, 1, 4, 'Threat Medium', NULL, '10/10/10', 8, 14, 27, 3, 34, 'rrr', '2018-01-31', 9, 1, '2018-01-31 17:07:06', 5, 'rrr', NULL, 'rrrr', 'rrrr', '67c97e5b-4662-479a-adb8-f4a9d16a7415', 1, NULL, 6, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(63, 'lklkj', 'lkjljk', NULL, 1, NULL, NULL, 1, 1, 1, 1, 1, 1, 'Threat Low', NULL, '7/14/2018', 9, 14, 27, 3, 34, 'lkjlkjl', '2018-01-31', 9, 1, '2018-01-31 17:07:08', 5, 'jlksjaflj', NULL, 'Worker strike', 'Ohio', 'ef80db30-6152-4d92-aff3-7f2cda29dcd7', 1, NULL, 6, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(64, 'Confusion among bidders over risk allocation and requirements of Airport Authority', 'imprecise contract documents and reference design', NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 15, 'Threat High', NULL, '1/1/2018', 8, 14, 27, 3, 34, 'overpricing of work and high bid prices with a large spread of bids.', '2018-01-31', 9, 0, NULL, 5, 'Confusion among bidders over risk allocation and requirements of Airport Authority due to imprecise contract documents and reference design leads to overpricing of work and high bid prices with a large spread of bids.', NULL, 'Bidder confusion', 'Montreal', '2d6ca317-8b9f-4436-bbe3-2bc45343a9bf', 1, NULL, 6, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(65, 'Inadequate project controls of highly interconnected projects in compressed schedule', 'coordinating interdependent and time dependent projects', NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 16, 'Threat High', NULL, '1/1/2019', 8, 14, 27, 3, 34, 'delays to program schedule and const increase', '2018-02-01', 9, 0, NULL, 5, 'Inadequate project controls of highly interconnected projects in compressed schedule due to coordinating interdependent and time dependent projects leads to delays to program schedule and const increase. \r\n', NULL, 'Project Controls', 'Montreal', '702efa59-1638-455c-b974-6b721194ddca', 1, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(66, 'Inadequately prepared construction contract form, including general and special conditions', 'late decision or lack of procurement strategy', NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 36, 'Unknown Risk Level', NULL, '1/1/2019', 8, 14, 27, 3, 34, 'additional cost and schedule delays', '2018-02-01', 9, 1, '2018-02-02 18:00:57', 5, 'Inadequately prepared construction contract form, including general and special conditions due to late decision or lack of procurement strategy leads to additional cost and schedule delays. \r\n', NULL, 'Inadequately prepared construction contract form', 'Montreal', 'f0b4c268-585e-4751-8681-eb2dcf774541', 1, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(67, 'Road accidents', 'Lack of safety signs', NULL, 1, NULL, NULL, 1, 1, 1, 1, 1, 2, 'Threat Low', NULL, '11/01/18', 8, 14, 30, 3, 34, 'Reputation', '2018-02-02', 9, 1, '2018-02-02 13:19:12', 5, 'Expansion of road and signage installation', NULL, 'Mombasa Road Construction', 'JKIA', 'be603987-db16-4482-be29-ff9e74f3316c', 1, NULL, 6, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(68, 'Overcrowding', 'Lack of spave', NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 3, 'Threat Low', NULL, '01/03/18', 8, 14, 27, 3, 34, 'Slow construction', '2018-02-02', 14, 0, NULL, 5, 'Road expansion', NULL, 'Outer Ring Road', 'Eastlands', '59ebcf9e-a2fd-4dd9-ae9c-873e60c07b02', 1, NULL, 6, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(69, 'Insufficient project funding', 'various reasons', NULL, 1, NULL, NULL, 1, 1, 1, 1, 1, 25, 'Threat High', NULL, '7/14/2018', 8, 14, 27, 3, 34, 'Project delayed or cancelled', '2018-02-02', 15, 0, NULL, 5, 'Insufficient project funding due to various reasons leads to Project delayed or cancelled. \r\n', NULL, 'Insufficient project funding', 'Montreal', 'bfff2129-704d-45db-a106-2faebbf1a9f9', 1, NULL, 7, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(70, 'Ventilation systems not working optimally across the facility', 'incompatible ventilation system designs', NULL, 3, NULL, NULL, 1, 4, 1, 1, 1, 12, 'Threat High', NULL, '7/14/2018', 8, 14, 31, 3, 34, 'excess O&M costs and safety issues  [Station, Mezzanine, Tunnel, CTT]', '2018-02-02', 15, 0, NULL, 5, 'Ventilation systems not working optimally across the facility due to incompatible ventilation system designs leads to excess O&M costs and safety issues  [Station, Mezzanine, Tunnel, CTT]\r\n', NULL, 'Ventilations Systems not working', 'Montreal', 'fb03013c-73fe-430e-80e5-2f3dad7ff1d5', 1, NULL, 7, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(71, 'rr', 'rrr', NULL, 2, NULL, NULL, 1, 1, 1, 1, 1, 4, 'Threat Medium', NULL, '10/10/10', 8, 14, 27, 3, 35, 'rrr', '2018-01-31', 9, 1, '2018-01-31 17:07:06', 5, 'rrr', NULL, 'rrrr', 'rrrr', '67c97e5b-4662-479a-adb8-f4a9d16a7415', 1, NULL, 6, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(72, 'lklkj', 'lkjljk', NULL, 1, NULL, NULL, 1, 1, 1, 1, 1, 1, 'Threat Low', NULL, '7/14/2018', 9, 14, 27, 3, 35, 'lkjlkjl', '2018-01-31', 9, 1, '2018-01-31 17:07:08', 5, 'jlksjaflj', NULL, 'Worker strike', 'Ohio', 'ef80db30-6152-4d92-aff3-7f2cda29dcd7', 1, NULL, 6, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(73, 'Confusion among bidders over risk allocation and requirements of Airport Authority', 'imprecise contract documents and reference design', NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 30, 'Unknown Risk Level', NULL, '1/1/2018', 8, 14, 27, 3, 35, 'overpricing of work and high bid prices with a large spread of bids.', '2018-01-31', 9, 0, NULL, 5, 'Confusion among bidders over risk allocation and requirements of Airport Authority due to imprecise contract documents and reference design leads to overpricing of work and high bid prices with a large spread of bids.', NULL, 'Bidder confusion', 'Montreal', '2d6ca317-8b9f-4436-bbe3-2bc45343a9bf', 1, NULL, 6, 1, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(74, 'Inadequate project controls of highly interconnected projects in compressed schedule', 'coordinating interdependent and time dependent projects', NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 16, 'Threat High', NULL, '1/1/2019', 8, 14, 27, 3, 35, 'delays to program schedule and const increase', '2018-02-01', 9, 0, NULL, 5, 'Inadequate project controls of highly interconnected projects in compressed schedule due to coordinating interdependent and time dependent projects leads to delays to program schedule and const increase. \r\n', NULL, 'Project Controls', 'Montreal', '702efa59-1638-455c-b974-6b721194ddca', 1, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(75, 'Inadequately prepared construction contract form, including general and special conditions', 'late decision or lack of procurement strategy', NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 36, 'Unknown Risk Level', NULL, '1/1/2019', 8, 14, 27, 3, 35, 'additional cost and schedule delays', '2018-02-01', 9, 0, NULL, 5, 'Inadequately prepared construction contract form, including general and special conditions due to late decision or lack of procurement strategy leads to additional cost and schedule delays. \r\n', NULL, 'Inadequately prepared construction contract form', 'Montreal', 'f0b4c268-585e-4751-8681-eb2dcf774541', 1, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(76, 'Road accidents', 'Lack of safety signs', NULL, 1, NULL, NULL, 1, 1, 1, 1, 1, 2, 'Threat Low', NULL, '11/01/18', 8, 14, 30, 3, 35, 'Reputation', '2018-02-02', 9, 1, '2018-02-02 13:19:12', 5, 'Expansion of road and signage installation', NULL, 'Mombasa Road Construction', 'JKIA', 'be603987-db16-4482-be29-ff9e74f3316c', 1, NULL, 6, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(77, 'Overcrowding', 'Lack of spave', NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 3, 'Threat Low', NULL, '01/03/18', 8, 14, 27, 3, 35, 'Slow construction', '2018-02-02', 14, 0, NULL, 5, 'Road expansion', NULL, 'Outer Ring Road', 'Eastlands', '59ebcf9e-a2fd-4dd9-ae9c-873e60c07b02', 1, NULL, 6, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(78, 'Insufficient project funding', 'various reasons', NULL, 1, NULL, NULL, 1, 1, 1, 1, 1, 25, 'Threat High', NULL, '7/14/2018', 8, 14, 27, 3, 35, 'Project delayed or cancelled', '2018-02-02', 15, 0, NULL, 5, 'Insufficient project funding due to various reasons leads to Project delayed or cancelled. \r\n', NULL, 'Insufficient project funding', 'Montreal', 'bfff2129-704d-45db-a106-2faebbf1a9f9', 1, NULL, 7, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(79, 'Ventilation systems not working optimally across the facility', 'incompatible ventilation system designs', NULL, 3, NULL, NULL, 1, 4, 1, 1, 1, 12, 'Threat High', NULL, '7/14/2018', 8, 14, 31, 3, 35, 'excess O&M costs and safety issues  [Station, Mezzanine, Tunnel, CTT]', '2018-02-02', 15, 0, NULL, 5, 'Ventilation systems not working optimally across the facility due to incompatible ventilation system designs leads to excess O&M costs and safety issues  [Station, Mezzanine, Tunnel, CTT]\r\n', NULL, 'Ventilations Systems not working', 'Montreal', 'fb03013c-73fe-430e-80e5-2f3dad7ff1d5', 1, NULL, 7, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(80, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 15, NULL, NULL, NULL, 8, 14, 27, 3, 33, NULL, NULL, 9, 0, NULL, 5, 'Confusion among bidders over risk allocation and requirements of Airport Authority due to imprecise contract documents and reference design leads to overpricing of work and high bid prices with a large spread of bids.', NULL, NULL, NULL, '0a7f1ba0-ff02-40b0-8643-16318a73e287', NULL, NULL, 6, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(81, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 20, NULL, NULL, NULL, 8, 14, 27, 4, 33, NULL, NULL, 9, 0, NULL, 5, 'Inadequate project controls of highly interconnected projects in compressed schedule due to coordinating interdependent and time dependent projects leads to delays to program schedule and const increase. ', NULL, NULL, NULL, '3c42d8b3-9ed3-4009-9a22-84bf1d65c7ec', NULL, NULL, 6, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(82, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 8, 14, 27, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Inadequately prepared construction contract form, including general and special conditions due to late decision or lack of procurement strategy leads to additional cost and schedule delays. ', NULL, NULL, NULL, '0b0ef418-d3e8-40ce-a78b-7f2807a5c1c8', NULL, NULL, 6, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(83, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, 1, 1, 1, 5, NULL, NULL, NULL, 9, 14, 27, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'Insufficient project funding due to various reasons leads to Project delayed or cancelled. ', NULL, NULL, NULL, '509bb7f0-1f1f-4d19-9110-640706f25d89', NULL, NULL, 7, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(84, NULL, NULL, NULL, 5, NULL, NULL, 1, 1, 1, 1, 1, 25, NULL, NULL, NULL, 8, 16, 27, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'Insufficient schedule to design and construct project due to aggressive schedule leads to project delays ', NULL, NULL, NULL, '8d7f01ee-b271-4e35-8a06-e0ae5b3f6c91', NULL, NULL, 6, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(85, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 15, NULL, NULL, NULL, 9, 15, 27, 3, 33, NULL, NULL, 9, 0, NULL, 5, 'Lack of bidders due to increased construction activity in and around Montreal leads to overpricing of work and high bid prices.', NULL, NULL, NULL, 'a034f79f-f758-41b2-a97a-30403791c348', NULL, NULL, 6, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(86, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, 1, 1, 1, 5, NULL, NULL, NULL, 8, 15, 27, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'REM program removes airport station due to various reasons leads to Project delayed or cancelled. ', NULL, NULL, NULL, '5499adbf-dafc-4a00-9470-e990ab5a61b6', NULL, NULL, 7, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(87, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 8, 16, 27, 3, 33, NULL, NULL, 9, 0, NULL, 5, 'Insufficient resources applied to project by ADM during design and construction phases due to various reasons leads to Project delays and lack of quality control. ', NULL, NULL, NULL, '0fdf77bc-ebd9-47d3-8855-9b523234efce', NULL, NULL, 7, 1, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(88, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 9, 16, 27, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Insufficient resources applied to project by Consultants during design and construction phases due to various reasons leads to Project delays and lack of quality control. ', NULL, NULL, NULL, '9a817b99-c250-42ae-9df9-730b12d09c4e', NULL, NULL, 6, 1, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(89, NULL, NULL, NULL, 1, NULL, NULL, 4, 1, 1, 5, 5, 5, NULL, NULL, NULL, 9, 14, 28, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'Electronic interference to Airport radar/instrumentation due to electric train operation leads to expensive retrofits.', NULL, NULL, NULL, '0498343f-2104-4240-9f01-32725500248f', NULL, NULL, 6, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(90, NULL, NULL, NULL, 3, NULL, NULL, 4, 1, 1, 1, 1, 12, NULL, NULL, NULL, 8, 15, 28, 3, 33, NULL, NULL, 9, 0, NULL, 5, 'Additional disruption of curbside access due to unanticipated  utility relocations leads to customer disatisfaction', NULL, NULL, NULL, '310bcfe0-0f51-44dc-800e-ae6210b77021', NULL, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(91, NULL, NULL, NULL, 4, NULL, NULL, 3, 1, 1, 3, 1, 12, NULL, NULL, NULL, 9, 16, 28, 4, 33, NULL, NULL, 9, 0, NULL, 5, 'Additional travel time to terminal due to construction leads to flight delays and customer complaints and lawsuits from airlines', NULL, NULL, NULL, '7a85d436-f2a2-4363-9a13-1693d8dc963f', NULL, NULL, 7, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(92, NULL, NULL, NULL, 4, NULL, NULL, 3, 1, 1, 1, 2, 12, NULL, NULL, NULL, 8, 15, 28, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'Disruption of passenger flow inside the terminal due to poor staging of construction within the terminal leads to cost increase and schedule delay', NULL, NULL, NULL, 'b659158b-daf9-42bf-ae31-3d750be21809', NULL, NULL, 7, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(93, NULL, NULL, NULL, 5, NULL, NULL, 3, 1, 1, 1, 3, 20, NULL, NULL, NULL, 8, 15, 28, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'Failure to maintain Airport Station project milestones due to coordination/competing objective conflicts between neighboring projects  leads to cost increase and schedule delay', NULL, NULL, NULL, 'a76251fb-3a2e-4595-b0fd-c955c4789425', NULL, NULL, 7, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(94, NULL, NULL, NULL, 4, NULL, NULL, 3, 1, 1, 1, 1, 12, NULL, NULL, NULL, 9, 16, 28, 3, 33, NULL, NULL, 9, 0, NULL, 5, 'Further loss of operational capacity due to construction activities or use of inappropriate access leads to customer disatisfaction and schedule delay', NULL, NULL, NULL, '0754a72c-84f4-4f4f-aae3-69feb7bd459e', NULL, NULL, 6, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(95, NULL, NULL, NULL, 4, NULL, NULL, 3, 1, 1, 1, 2, 12, NULL, NULL, NULL, 9, 15, 28, 4, 33, NULL, NULL, 9, 0, NULL, 5, 'Higher than normal levels of confusion to arriving airport customers due to ineffective outreach campaign regarding construction activities leads to public complaints', NULL, NULL, NULL, '1af8b8b6-e787-4c6c-8b87-0a1fe52ac275', NULL, NULL, 7, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(96, NULL, NULL, NULL, 4, NULL, NULL, 3, 1, 1, 1, 1, 12, NULL, NULL, NULL, 8, 15, 28, 3, 33, NULL, NULL, 9, 0, NULL, 5, 'Higher than normal levels of parking garage customer complaints due to construction impacts such as noise, dust on cars leads to customer complaints', NULL, NULL, NULL, '97ab2f23-c8a9-46bd-bfc0-b5b31b60fda0', NULL, NULL, 7, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(97, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 2, 1, 9, NULL, NULL, NULL, 9, 14, 28, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Inability to reconcile schedule milestones with CDPQ due to poor schedule interface with CDPQ leads to cost increase and schedule delay', NULL, NULL, NULL, 'a2c742fc-20c6-4d4c-83ae-9dcfbc77189b', NULL, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(98, NULL, NULL, NULL, 4, NULL, NULL, 4, 1, 1, 1, 3, 16, NULL, NULL, NULL, 8, 14, 28, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'Negative impact to critical stakeholders at airport such as taxi/bus traffic, employees shuttle, rental cars, commercial services, deliveries, parking, terminal passengers due to construction of station shafts and access points for ventilation leads to work time restrictions and delays. ', NULL, NULL, NULL, '20d402d8-da1a-4d08-97dc-755bd3d562cf', NULL, NULL, 7, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(99, NULL, NULL, NULL, 5, NULL, NULL, 3, 3, 1, 1, 2, 15, NULL, NULL, NULL, 8, 15, 28, 3, 33, NULL, NULL, 9, 0, NULL, 5, 'Parking lot elevator failures in West tower due to overuse from loss of East Tower elevator leads to increased downtime, lack of access and increased maintanence costs', NULL, NULL, NULL, '9061e66f-b6ee-412f-b020-1d682f8ec98c', NULL, NULL, 7, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(100, NULL, NULL, NULL, 4, NULL, NULL, 4, 1, 1, 1, 1, 16, NULL, NULL, NULL, 9, 14, 28, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'Prolonged unanticipated interruption to curbside service due to poor staging of passenger curb during CTT construction leads to customer disatisfaction and schedule delay', NULL, NULL, NULL, 'd9cc4315-e98b-48b6-af40-6bf2ec60dad5', NULL, NULL, 7, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(101, NULL, NULL, NULL, 1, NULL, NULL, 4, 1, 1, 1, 1, 5, NULL, NULL, NULL, 8, 15, 28, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Risk of unanticipated additional terminal and stakeholder disruption due to missuse of blasting in excavation operation leads to ban on blasting or other restrictions.', NULL, NULL, NULL, 'aea20b21-d161-4c1c-a958-3ec47f2979cb', NULL, NULL, 6, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL);
INSERT INTO `RiskRegistry` (`item_id`, `identified_hazard_risk`, `cause_trigger`, `materialization_phase`, `likelihood`, `time_impact`, `cost_impact`, `reputation_impact`, `hs_impact`, `env_impact`, `legal_impact`, `quality_impact`, `risk_rating`, `risk_level`, `control_mitigation`, `milestone_target_date`, `Status_status_id`, `SystemSafety_safety_id`, `RiskCategories_category_id`, `Realization_realization_id`, `Subproject_subproject_id`, `effect`, `effective_date`, `User_user_id`, `archived`, `archived_date`, `RiskOwner_riskowner_id`, `description_change`, `entity`, `risk_title`, `project_location`, `risk_uuid`, `duplicated`, `created_at`, `Entity_entity_id`, `materialization_phase_materialization_id`, `CostMetric_cost_id`, `ScheduleMetric_schedule_id`, `likelihood_current`, `reputation_impact_current`, `hs_impact_current`, `env_impact_current`, `legal_impact_current`, `quality_impact_current`, `risk_rating_current`, `risk_level_current`, `likelihood_target`, `reputation_impact_target`, `hs_impact_target`, `env_impact_target`, `legal_impact_target`, `quality_impact_target`, `risk_rating_target`, `risk_level_target`, `time_impact_current`, `cost_impact_current`, `time_impact_target`, `cost_impact_target`, `action_owner`, `action_item`, `RiskSubCategories_subcategory_id`, `original_risk_id`) VALUES
(102, NULL, NULL, NULL, 2, NULL, NULL, 1, 1, 1, 1, 1, 8, NULL, NULL, NULL, 8, 14, 28, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'Stakeholders demands are incompatible with construction contract performance requirements due to lack of communication between Authority and stakeholders leads to scope changes during construction, cost increase and schedule delay', NULL, NULL, NULL, '595d34b9-0ae2-4a77-8f0c-06b14d888074', NULL, NULL, 6, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(103, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 3, 1, 9, NULL, NULL, NULL, 8, 15, 28, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Transport Canada regulation change negatively impacts project planning, design, or construction due to newly identified security threat leads to increased Safety and Security cost increase and schedule delay', NULL, NULL, NULL, '950e4a54-f990-4312-8962-cd745c1fdcc7', NULL, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(104, NULL, NULL, NULL, 3, NULL, NULL, 1, 5, 1, 1, 1, 15, NULL, NULL, NULL, 9, 15, 28, 4, 33, NULL, NULL, 9, 0, NULL, 5, 'Unanticipated restrictions on emergency access and egress due to construction activity in front of terminal leads to compromised safety and schedule delay', NULL, NULL, NULL, 'c9b59489-6ad1-4cca-a19d-10e7ffa5bfb2', NULL, NULL, 7, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(105, NULL, NULL, NULL, 2, NULL, NULL, 1, 1, 1, 1, 1, 6, NULL, NULL, NULL, 9, 16, 29, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'Delay in obtaining specialized permanent equipment due to long lead time and number of concurrent stations being built for REM leads to delays to schedule and additional cost.', NULL, NULL, NULL, '42321059-a9ea-4b84-b654-f3926d5a9760', NULL, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(106, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 9, 16, 29, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'Design and Procurement delay due to various reasons leads to shortened construction period.', NULL, NULL, NULL, '2a5899ee-55cf-4567-996c-6bd5b8712e51', NULL, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(107, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 6, NULL, NULL, NULL, 9, 15, 29, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Geotechnical conditions different to those anticipated  due to greater than anticipated variation in top of rock elevation leads to increased project cost, claims, and schedule delay. ', NULL, NULL, NULL, '8b19bc54-d983-448b-9f91-2c47580678e1', NULL, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(108, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 6, NULL, NULL, NULL, 8, 14, 29, 4, 33, NULL, NULL, 9, 0, NULL, 5, 'Geotechnical conditions different to those anticipated  due to greater than anticipated variations and higher rock mass permeability leads to increased project cost, claims, and schedule delay. ', NULL, NULL, NULL, '9955ed49-dfc0-472c-a5ae-e670f400c1ec', NULL, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(109, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 9, NULL, NULL, NULL, 8, 16, 29, 3, 33, NULL, NULL, 9, 0, NULL, 5, 'Geotechnical conditions different to those anticipated  due to greater than anticipated variations and reduced rock quality leads to increased project cost, claims, and schedule delay. ', NULL, NULL, NULL, '37de0c1b-171b-4d69-aec5-2a505f699dcb', NULL, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(110, NULL, NULL, NULL, 2, NULL, NULL, 1, 1, 1, 1, 1, 8, NULL, NULL, NULL, 9, 14, 29, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Geotechnical conditions different to those anticipated  due to more faults and/or faults with different ground characterization  leads to increased project cost, claims, and schedule delay. ', NULL, NULL, NULL, '1fbd6e9b-f1a6-4e8d-8191-2ec4fa8dc8f4', NULL, NULL, 7, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(111, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 8, 15, 29, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Geotechnical conditions different to those anticipated  due to more than anticipated boulders (number and/or size and/or strength) within the overburden deposits leads to increased project cost, claims, and schedule delay.', NULL, NULL, NULL, 'e0fcf7da-b3e7-4f2f-9d08-0d0a613de956', NULL, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(112, NULL, NULL, NULL, 2, NULL, NULL, 1, 1, 1, 1, 1, 4, NULL, NULL, NULL, 9, 15, 29, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'Geotechnical conditions different to those anticipated  due to unanticipated variations or complications (perched water) in groundwater conditions leads to increased project cost, claims, and schedule delay. ', NULL, NULL, NULL, 'f6582ec6-40c2-43e0-89be-6887cda0dcce', NULL, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(113, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 16, NULL, NULL, NULL, 9, 16, 29, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Geotechnical conditions different to those anticipated  due to various reasons (utilities, unknown groundwater, contaminated ground water, rock or soil etc.) leads to increased project cost, claims, and schedule delay. ', NULL, NULL, NULL, 'dd90931d-31a3-4bd7-abe4-7ecc1d91410e', NULL, NULL, 7, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(114, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 4, 12, NULL, NULL, NULL, 9, 16, 29, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Higher than anticipated distress to parking structure due to cumulative impact of numerous construction projects not modeled successfully leads to expensive retrofits.', NULL, NULL, NULL, 'db77ded0-9bba-4168-99a2-658f2b170920', NULL, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(115, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, 1, 1, 1, 3, NULL, NULL, NULL, 8, 14, 29, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Inability to identify AHJ for FLS systems [fire alarms] completd under different contracts due to various reasons leads to delays in design approval and construction commissioning.', NULL, NULL, NULL, '630ecdfb-7f72-4ea3-84f6-c5c895b2c8a9', NULL, NULL, 7, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(116, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 8, 14, 29, 3, 33, NULL, NULL, 9, 0, NULL, 5, 'Inability to operate Station due to lack of available power leads to delay in commissioning and increased costs.', NULL, NULL, NULL, 'a364fc74-2d9b-4259-8440-7b500fe482fc', NULL, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(117, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 9, 15, 29, 3, 33, NULL, NULL, 9, 0, NULL, 5, 'Incompatible ventilation systems by different designers in same building or connected facility are not effective due to lack of coordintation between ADM and CDPQ designs leads to poor performance in evreyday operation and in emergency.', NULL, NULL, NULL, '035f66ab-22bb-49b7-b87a-f63cc82bf920', NULL, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(118, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 8, 15, 29, 3, 33, NULL, NULL, 9, 0, NULL, 5, 'Increased material costs due to increased construction activity in and around Montreal leads to overpricing of work and high bid prices.', NULL, NULL, NULL, '172830a7-f46c-4992-b27e-70053ec9088a', NULL, NULL, 6, 1, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(119, NULL, NULL, NULL, 4, NULL, NULL, 1, 3, 1, 1, 1, 12, NULL, NULL, NULL, 8, 16, 29, 3, 33, NULL, NULL, 9, 0, NULL, 5, 'Insufficient access to works areas designated in contract due to congested site conditions in and around the terminal building leads to additional cost, contractor claims, and schedule delays', NULL, NULL, NULL, '46cd91ca-50fe-4cf8-a96f-aa12b08eca5c', NULL, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(120, NULL, NULL, NULL, 4, NULL, NULL, 4, 1, 1, 1, 3, 16, NULL, NULL, NULL, 8, 16, 29, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'Insufficient coordination between design and construction interface of airport station and other airport projects due to unequal design development or other factors leads to additional cost and schedule delays. ', NULL, NULL, NULL, 'f125e243-c770-4e1f-a1e2-03898262ade2', NULL, NULL, 6, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(121, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 16, NULL, NULL, NULL, 9, 16, 29, 3, 33, NULL, NULL, 9, 0, NULL, 5, 'Insufficient coordination between design and construction interface of airport station project and CDPQ Tunnel project due to unequal design development or other factors leads to additional cost and schedule delays. ', NULL, NULL, NULL, 'acc24deb-0e02-42a0-9d3b-085b67977bb1', NULL, NULL, 6, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(122, NULL, NULL, NULL, 5, NULL, NULL, 1, 1, 1, 1, 3, 25, NULL, NULL, NULL, 8, 15, 29, 3, 33, NULL, NULL, 9, 0, NULL, 5, 'Insufficient coordination between operational interface of airport station and other airport projects due to unequal design development or other factors leads to additional cost and schedule delays during commissioning. ', NULL, NULL, NULL, 'e75efc7f-424e-45fc-a977-9380e533bfdd', NULL, NULL, 6, 1, 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(123, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 9, 16, 29, 4, 33, NULL, NULL, 9, 0, NULL, 5, 'Insufficient electric power to operate station due to incorrect power demand estimates leads to expensive retrofit and delays', NULL, NULL, NULL, '6cf0d450-4990-49cb-b0cc-e2ed630c442a', NULL, NULL, 6, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(124, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 9, NULL, NULL, NULL, 9, 16, 29, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Insufficient regional access to airport for delivery of materials and equipment due to construction activities and neighboring highway construction leads to additional cost, contractor claims, and schedule delays', NULL, NULL, NULL, '73769063-9a26-4c6d-8643-d4085d95a326', NULL, NULL, 6, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(125, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 9, 16, 29, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'Insufficient sizing of rooms/shafts and other facilities, including electrical/mechanical/communication systems in the station due to incorrect design estimates or incompatible criteria leads to expensive retrofit and delays', NULL, NULL, NULL, '0336b7a2-f589-4494-ab3b-ff4eb60f567f', NULL, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(126, NULL, NULL, NULL, 3, NULL, NULL, 1, 3, 1, 1, 1, 9, NULL, NULL, NULL, 8, 15, 29, 3, 33, NULL, NULL, 9, 0, NULL, 5, 'Insufficient works areas designated in contract due to lack of available space, delays in previous contracts or other reasons, leads to additional cost, contractor claims, and schedule delays', NULL, NULL, NULL, '7f2c51d4-6034-4ee5-a8c3-c11d6e250677', NULL, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(127, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 16, NULL, NULL, NULL, 8, 16, 29, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'Insufficiently clear construction contract interface control between Airport station project and CDPQ tunnel project due to TBM delays, constrained access or other reason leads to increased cost and schedule delay', NULL, NULL, NULL, 'cf49a21d-719d-44bf-ac8b-071d073c7c9f', NULL, NULL, 7, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(128, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 8, 15, 29, 4, 33, NULL, NULL, 9, 0, NULL, 5, 'Lack of skilled labor and equipment due to increased construction activity in and around Montreal leads to overpricing of work and high bid prices.', NULL, NULL, NULL, 'f7eff19f-7026-4df1-98dd-372752a6fb2c', NULL, NULL, 6, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(129, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 16, NULL, NULL, NULL, 9, 15, 29, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Late changes in design criteria by CDPQ or ADM (eg shaft exc. size) due to various reasons leads to increased cost and schedule delay', NULL, NULL, NULL, '87697d72-bbec-4764-8d29-d1ee134fade9', NULL, NULL, 6, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(130, NULL, NULL, NULL, 2, NULL, NULL, 1, 1, 1, 1, 2, 10, NULL, NULL, NULL, 8, 14, 29, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Mistake made in station survey layout due to different survey datum (V & H) between Airport and CDPQ leads to delays, major redesign and claims and potential negative impacts to station operation', NULL, NULL, NULL, 'af879b5b-5512-410a-9ed4-e3862e1b7d03', NULL, NULL, 6, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(131, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 2, 12, NULL, NULL, NULL, 8, 15, 29, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'Modification of CDPQ alignment due to extension of REM line past airport (i.e. Airport no longer a terminus staion) leads to delays, major redesign and claims and potential negative impacts to station operation', NULL, NULL, NULL, '97f0d443-105e-4502-9459-39d3bf8113c5', NULL, NULL, 6, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(132, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 2, 15, NULL, NULL, NULL, 9, 15, 29, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Relocation of station alignment due to unanticipated relocation of tunnel alignment(V & H) by others leads to delays, major redesign and claims and potential negative impacts to station operation', NULL, NULL, NULL, '2a43b5b3-d83b-41d0-9783-e2cf7a108974', NULL, NULL, 7, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(133, NULL, NULL, NULL, 5, NULL, NULL, 3, 1, 1, 1, 3, 25, NULL, NULL, NULL, 9, 14, 29, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Third party utility relocation delays due to those agencies having different priorities and/or not able to respond in required timeframe leads to additional cost and schedule delays. ', NULL, NULL, NULL, 'd8f93645-1f5f-4475-a9f5-008594f330fe', NULL, NULL, 7, 1, 4, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(134, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 6, NULL, NULL, NULL, 9, 14, 29, 4, 33, NULL, NULL, 9, 0, NULL, 5, 'Unanticipated high groundwater inflow needs disposal by CDPQ due to confusion over inflow estimates leads to claims by CDPQ (who is required to dispose of water) on ADM (who is required to estimate inflow).', NULL, NULL, NULL, 'b1e022f1-bd20-4e85-85fd-7a33cd92f43e', NULL, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(135, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 16, NULL, NULL, NULL, 9, 15, 30, 3, 33, NULL, NULL, 9, 0, NULL, 5, 'CDPQ misses Construction Milestones due to various reasons leads to Contractor delay.', NULL, NULL, NULL, '3fd9e1d9-52eb-481a-9859-5b54872a8ec4', NULL, NULL, 7, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(136, NULL, NULL, NULL, 3, NULL, NULL, 1, 4, 1, 1, 1, 12, NULL, NULL, NULL, 9, 15, 30, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'Construction accident due to various reasons (explosives, equipment moving, trips and falls etc.) leads to injury, damage to equipment, additional cost and schedule delay ', NULL, NULL, NULL, '7bed9fc0-f67f-450a-8113-2e18dfe6c229', NULL, NULL, 6, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(137, NULL, NULL, NULL, 4, NULL, NULL, 4, 1, 1, 1, 3, 16, NULL, NULL, NULL, 8, 15, 30, 4, 33, NULL, NULL, 9, 0, NULL, 5, 'Contractors fail to understand importance of curbside operations and staging in contract due to lackof knowledge of airport operations and numerous contact points within Airport Operations leads to Contractor overpricing this risk, or additional cost and schedule delay.', NULL, NULL, NULL, 'b98de199-25e5-420d-bf7a-0f331dc5ad9c', NULL, NULL, 7, 1, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(138, NULL, NULL, NULL, 3, NULL, NULL, 3, 1, 2, 1, 1, 9, NULL, NULL, NULL, 9, 16, 30, 4, 33, NULL, NULL, 9, 0, NULL, 5, 'Controlled blasting causes unanticipated impacts to adjacent airport structures due to close proximity of building foundations leads to work stoppages and additional remediation costs.', NULL, NULL, NULL, '33340490-7773-4993-ad3f-8b946944fe70', NULL, NULL, 6, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(139, NULL, NULL, NULL, 3, NULL, NULL, 3, 3, 1, 1, 3, 9, NULL, NULL, NULL, 9, 14, 30, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Damage to adjacent airport structures due to failure to monitor impacts to adjacent structure during construction leads to cost increase and schedule delay', NULL, NULL, NULL, '6f2bb210-ad8e-4b07-9ff1-5542db6e3c8b', NULL, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(140, NULL, NULL, NULL, 3, NULL, NULL, 1, 3, 1, 1, 1, 9, NULL, NULL, NULL, 9, 14, 30, 3, 33, NULL, NULL, 9, 0, NULL, 5, 'Damage to adjacent structures due to construction activities leads to additional cost and time, damage to reputation, legal exposure and/or potential injuries', NULL, NULL, NULL, '4f7716d4-11af-454c-b986-00fe7fd4fe71', NULL, NULL, 6, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(141, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 16, NULL, NULL, NULL, 9, 15, 30, 3, 33, NULL, NULL, 9, 0, NULL, 5, 'Design changes requested by ADM during construction due to various causes leads to Contractor delays and claims.', NULL, NULL, NULL, '8be2e238-bfcc-4c82-be69-97d4845cf40b', NULL, NULL, 6, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(142, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 8, 14, 30, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Hours of muck removal operation could be limited due to airport terminal peak time traffic leads to delay and additional costs', NULL, NULL, NULL, 'f6901cdc-8657-4d81-94eb-b592496afdff', NULL, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(143, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 3, 9, NULL, NULL, NULL, 8, 16, 30, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Impact to sensitive equipment in nearby buildings and structures (e.g. Security apparatus) due to construction-induced vibration leads to Contractor delays.', NULL, NULL, NULL, 'aad7646f-f039-4c45-8acf-9e536c1c2656', NULL, NULL, 6, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(144, NULL, NULL, NULL, 5, NULL, NULL, 3, 1, 1, 1, 3, 25, NULL, NULL, NULL, 9, 14, 30, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'Inability to recover from issues with initial site activity or preparatory work due to highly compressed schedule with inter-dependent milestones leads to additional cost and schedule delays. ', NULL, NULL, NULL, '774863f8-3c6b-47ba-9657-3b4818abadf9', NULL, NULL, 7, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(145, NULL, NULL, NULL, 4, NULL, NULL, 2, 1, 1, 1, 2, 12, NULL, NULL, NULL, 8, 16, 30, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Inadequate traffic management around terminal by contractor due to inability to effectively separate construction traffic from airport customers leads to Contractor shutdown/delays', NULL, NULL, NULL, '63df6961-15e9-4399-81c5-3a694a680778', NULL, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(146, NULL, NULL, NULL, 2, NULL, NULL, 4, 1, 1, 1, 4, 8, NULL, NULL, NULL, 8, 15, 30, 4, 33, NULL, NULL, 9, 0, NULL, 5, 'Inappropriate use of lights during night work due to proximity to runway leads to Contractor shutdown, possible delays', NULL, NULL, NULL, '4b03980c-44f3-4733-bc4b-041059ea1140', NULL, NULL, 6, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(147, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 3, 1, 20, NULL, NULL, NULL, 9, 14, 30, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'Incompatible work plan requested by contractor due to inexperience with Airport operation requirements leads to claims, additional cost and schedule delay', NULL, NULL, NULL, '41c11e07-ff76-4a79-b901-7532fb234597', NULL, NULL, 7, 1, 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(148, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 9, NULL, NULL, NULL, 8, 15, 30, 4, 33, NULL, NULL, 9, 0, NULL, 5, 'Lack of trucks due to large volume of local work (especially acute issue during winter) leads to schedule delays and additional cost', NULL, NULL, NULL, 'e5712779-1b06-4925-be59-525e45345323', NULL, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(149, NULL, NULL, NULL, 2, NULL, NULL, 1, 1, 1, 5, 3, 10, NULL, NULL, NULL, 9, 15, 30, 4, 33, NULL, NULL, 9, 0, NULL, 5, 'Non-compliance with Airport regulations due to lack of appropriate use of height restricted equipment leads to Contractor shutdown and regulatory fines.', NULL, NULL, NULL, '16f89776-4506-4d60-9df5-edd1b706ad5c', NULL, NULL, 7, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(150, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 3, 1, 1, 16, NULL, NULL, NULL, 8, 15, 30, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Rising ground water level due to overly wet weather leads to water inflow into tunnel above predicted values resulting in claims', NULL, NULL, NULL, '3d3fa3b1-3f8f-4638-bf9c-79c2352a948c', NULL, NULL, 6, 1, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(151, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 8, NULL, NULL, NULL, 9, 15, 30, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'Service interruption to various utility services (Electric/water/etc.) due to tie-in to existing systems leads to project delays and customer inconvenience.', NULL, NULL, NULL, 'c281ccfc-1093-48b2-8481-3704af39c31c', NULL, NULL, 7, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(152, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 8, 16, 30, 3, 33, NULL, NULL, 9, 0, NULL, 5, 'Station contractor encounters errors in REM tunnel construction due to poor quality surveying or alignment control of tunnel or other factors leads to additional cost and schedule delay', NULL, NULL, NULL, '5da1a858-fd6b-473b-8009-efc11a298f60', NULL, NULL, 7, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(153, NULL, NULL, NULL, 1, NULL, NULL, 5, 5, 1, 5, 1, 5, NULL, NULL, NULL, 9, 14, 30, 4, 33, NULL, NULL, 9, 0, NULL, 5, 'Tunnel collapse due to mining large SEM span in shallow cover leads to additional cost and time, damage to reputation, legal exposure and/or major injuries', NULL, NULL, NULL, '829fe557-a029-4b94-94d8-2774abbaf82f', NULL, NULL, 6, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(154, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 16, NULL, NULL, NULL, 8, 14, 30, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Unexpected changes in tunnel handover condition from CDPQ to ADM due to various reasons leads to expensive retrofit design/construction and delays', NULL, NULL, NULL, '8d8ff242-264c-4eb4-bf9f-74eef363e782', NULL, NULL, 7, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(155, NULL, NULL, NULL, 3, NULL, NULL, 3, 1, 3, 1, 1, 9, NULL, NULL, NULL, 8, 16, 30, 3, 33, NULL, NULL, 9, 0, NULL, 5, 'Violation of contractually required environmental regulations due to dust/water disposal/spills during construction leads to fines and project delays ', NULL, NULL, NULL, 'adc2f387-504f-4ebe-8783-536ede62c29c', NULL, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(156, NULL, NULL, NULL, 3, NULL, NULL, 3, 1, 1, 1, 1, 9, NULL, NULL, NULL, 8, 14, 30, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'Work is restricted due to noise, dust and vibration impact on operations and/or existing structures leads to additional costs and claims for delay.', NULL, NULL, NULL, '08af345e-3876-43f0-858b-5b430cdfb004', NULL, NULL, 6, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(157, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 3, NULL, NULL, NULL, 8, 16, 30, 3, 33, NULL, NULL, 9, 0, NULL, 5, 'Work stopped due to labor disputes  leads to Contractor delays', NULL, NULL, NULL, 'd38c332e-13fb-4f4e-86f8-7b7e62a07687', NULL, NULL, 6, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(158, NULL, NULL, NULL, 2, NULL, NULL, 1, 1, 1, 1, 1, 6, NULL, NULL, NULL, 9, 14, 30, 4, 33, NULL, NULL, 9, 0, NULL, 5, 'Work stopped due to more adverse weather than anticipated in contract leads to Contractor delays', NULL, NULL, NULL, '5477d438-5a2a-4da5-ba14-1a59e4dd8ac2', NULL, NULL, 6, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(159, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 3, 9, NULL, NULL, NULL, 9, 14, 31, 4, 33, NULL, NULL, 9, 0, NULL, 5, 'Access/egress inadequate for O&M equipment during regular maintenance and replacement due to failure to design for proper access leads to added O&M cost  ', NULL, NULL, NULL, '45c05fea-b36e-40db-ab53-1a840d0561f7', NULL, NULL, 6, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(160, NULL, NULL, NULL, 3, NULL, NULL, 1, 4, 1, 1, 1, 12, NULL, NULL, NULL, 9, 14, 31, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Access/egress to new facilities inadequate during an emergency event due to incompatible design regarding a new security and safety threat leads to delayed response times  ', NULL, NULL, NULL, '57870f04-be29-4ab3-8252-b0ec369adda8', NULL, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(161, NULL, NULL, NULL, 5, NULL, NULL, 1, 1, 1, 1, 3, 15, NULL, NULL, NULL, 9, 16, 31, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Additional security personnel required due to increased patrol area of pasenger tunnel, etc leads to increased security costs   ', NULL, NULL, NULL, '14bfab82-9633-4dfe-adfb-4b427d16d221', NULL, NULL, 7, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(162, NULL, NULL, NULL, 4, NULL, NULL, 3, 1, 1, 1, 3, 12, NULL, NULL, NULL, 9, 16, 31, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Failure of communication/contingency plan during train system outage due to inadequate communication leads to overcrowding at platform and delays commencing bus contingency plan  ', NULL, NULL, NULL, '7c17b5c4-ffdc-41d2-a5c0-ebeb97fb5f33', NULL, NULL, 7, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(163, NULL, NULL, NULL, 3, NULL, NULL, 1, 3, 1, 1, 3, 9, NULL, NULL, NULL, 9, 14, 31, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'Inability to observe station activities due to failure to staff command center 24/7 leads to lack of early warning of issues  ', NULL, NULL, NULL, '9a0d5d4e-af3f-456d-82fc-e43fa4cc4a2e', NULL, NULL, 6, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(164, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 3, 12, NULL, NULL, NULL, 8, 15, 31, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'Incompatibility between transit operating systems due to use of differing design criteria leads to expensive rework and lost time and conflicts between REM and Station contractor/owner/operator', NULL, NULL, NULL, '3d6b4636-e244-4a0f-bf49-202be14db264', NULL, NULL, 7, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(165, NULL, NULL, NULL, 4, NULL, NULL, 1, 3, 1, 3, 3, 12, NULL, NULL, NULL, 9, 14, 31, 4, 33, NULL, NULL, 9, 0, NULL, 6, 'Incompatible technology of cameras/command centers due to failure to integrate emergency FLS systems leads to confusion during emergency   ', NULL, NULL, NULL, 'ae6b3a82-bd2e-46e1-b2bf-d19f06e19855', NULL, NULL, 6, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(166, NULL, NULL, NULL, 4, NULL, NULL, 3, 1, 1, 1, 4, 16, NULL, NULL, NULL, 8, 14, 31, 3, 33, NULL, NULL, 9, 0, NULL, 5, 'Lack of clear demarcation between Airport and Subway operational areas due to lack of current certaintity of turnstile location and other physical barriers leads to increased O&M Costs for Airport ', NULL, NULL, NULL, 'd6e214de-c350-4b98-93b3-9349a2fd31d4', NULL, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(167, NULL, NULL, NULL, 4, NULL, NULL, 3, 1, 1, 1, 2, 12, NULL, NULL, NULL, 8, 16, 31, 4, 33, NULL, NULL, 9, 0, NULL, 5, 'Lack of coordination between Airport and CDPQ due to inadequate day-to-day communication systems leads to poor facility maintenance  ', NULL, NULL, NULL, '36bfe48c-2e49-44a4-b55f-10aa160f71ae', NULL, NULL, 6, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(168, NULL, NULL, NULL, 4, NULL, NULL, 1, 3, 1, 3, 3, 12, NULL, NULL, NULL, 9, 15, 31, 4, 33, NULL, NULL, 9, 0, NULL, 5, 'Lack of coordination between Airport and CDPQ operations due to inadequate communication systems leads to possible security failures  ', NULL, NULL, NULL, '8603ab5b-536c-4dd3-a56a-b900d4876a76', NULL, NULL, 7, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(169, NULL, NULL, NULL, 3, NULL, NULL, 3, 1, 1, 1, 4, 12, NULL, NULL, NULL, 9, 16, 31, 4, 33, NULL, NULL, 9, 0, NULL, 5, 'Vapor cloud from underground structure HVAC system exhaust blocks field of vision of control tower due to location of exhaust  leads to air traffic interruptions and costs from airlines', NULL, NULL, NULL, 'cd8ea5cf-f17c-4729-a00b-ed613d6af9c7', NULL, NULL, 6, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(170, NULL, NULL, NULL, 3, NULL, NULL, 1, 4, 1, 1, 2, 12, NULL, NULL, NULL, 8, 15, 31, 3, 33, NULL, NULL, 9, 0, NULL, 6, 'Ventilation systems not working optimally across the facility due to incompatible ventilation system designs leads to excess O&M costs and safety issues  [Station, Mezzanine, Tunnel, CTT]', NULL, NULL, NULL, '7a16aa55-7534-4a0f-b329-ba508e0a9ef5', NULL, NULL, 6, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(171, 'rr', 'rrr', NULL, 2, NULL, NULL, 1, 1, 1, 1, 1, 4, 'Threat Medium', NULL, '10/10/10', 8, 14, 27, 3, 36, 'rrr', '2018-01-31', 9, 1, '2018-01-31 17:07:06', 5, 'rrr', NULL, 'rrrr', 'rrrr', '67c97e5b-4662-479a-adb8-f4a9d16a7415', 1, NULL, 6, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(172, 'lklkj', 'lkjljk', NULL, 1, NULL, NULL, 1, 1, 1, 1, 1, 1, 'Threat Low', NULL, '7/14/2018', 9, 14, 27, 3, 36, 'lkjlkjl', '2018-01-31', 9, 1, '2018-01-31 17:07:08', 5, 'jlksjaflj', NULL, 'Worker strike', 'Ohio', 'ef80db30-6152-4d92-aff3-7f2cda29dcd7', 1, NULL, 6, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(173, 'Confusion among bidders over risk allocation and requirements of Airport Authority', 'imprecise contract documents and reference design', NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 30, 'Unknown Risk Level', NULL, '1/1/2018', 8, 14, 27, 3, 36, 'overpricing of work and high bid prices with a large spread of bids.', '2018-01-31', 9, 0, NULL, 5, 'Confusion among bidders over risk allocation and requirements of Airport Authority due to imprecise contract documents and reference design leads to overpricing of work and high bid prices with a large spread of bids.', NULL, 'Bidder confusion', 'Montreal', '2d6ca317-8b9f-4436-bbe3-2bc45343a9bf', 1, NULL, 6, 1, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(174, 'Inadequate project controls of highly interconnected projects in compressed schedule', 'coordinating interdependent and time dependent projects', NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 16, 'Threat High', NULL, '1/1/2019', 8, 14, 27, 3, 36, 'delays to program schedule and const increase', '2018-02-01', 9, 0, NULL, 5, 'Inadequate project controls of highly interconnected projects in compressed schedule due to coordinating interdependent and time dependent projects leads to delays to program schedule and const increase. \r\n', NULL, 'Project Controls', 'Montreal', '702efa59-1638-455c-b974-6b721194ddca', 1, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(175, 'Inadequately prepared construction contract form, including general and special conditions', 'late decision or lack of procurement strategy', NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 36, 'Unknown Risk Level', NULL, '1/1/2019', 8, 14, 27, 3, 36, 'additional cost and schedule delays', '2018-02-01', 9, 0, NULL, 5, 'Inadequately prepared construction contract form, including general and special conditions due to late decision or lack of procurement strategy leads to additional cost and schedule delays. \r\n', NULL, 'Inadequately prepared construction contract form', 'Montreal', 'f0b4c268-585e-4751-8681-eb2dcf774541', 1, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(176, 'Road accidents', 'Lack of safety signs', NULL, 1, NULL, NULL, 1, 1, 1, 1, 1, 2, 'Threat Low', NULL, '11/01/18', 8, 14, 30, 3, 36, 'Reputation', '2018-02-02', 9, 1, '2018-02-02 13:19:12', 5, 'Expansion of road and signage installation', NULL, 'Mombasa Road Construction', 'JKIA', 'be603987-db16-4482-be29-ff9e74f3316c', 1, NULL, 6, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(177, 'Overcrowding', 'Lack of spave', NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 3, 'Threat Low', NULL, '01/03/18', 8, 14, 27, 3, 36, 'Slow construction', '2018-02-02', 14, 0, NULL, 5, 'Road expansion', NULL, 'Outer Ring Road', 'Eastlands', '59ebcf9e-a2fd-4dd9-ae9c-873e60c07b02', 1, NULL, 6, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(178, 'Insufficient project funding', 'various reasons', NULL, 1, NULL, NULL, 1, 1, 1, 1, 1, 25, 'Threat High', NULL, '7/14/2018', 8, 14, 27, 3, 36, 'Project delayed or cancelled', '2018-02-02', 15, 0, NULL, 5, 'Insufficient project funding due to various reasons leads to Project delayed or cancelled. \r\n', NULL, 'Insufficient project funding', 'Montreal', 'bfff2129-704d-45db-a106-2faebbf1a9f9', 1, NULL, 7, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(179, 'Ventilation systems not working optimally across the facility', 'incompatible ventilation system designs', NULL, 3, NULL, NULL, 1, 4, 1, 1, 1, 12, 'Threat High', NULL, '7/14/2018', 8, 14, 31, 3, 36, 'excess O&M costs and safety issues  [Station, Mezzanine, Tunnel, CTT]', '2018-02-02', 15, 0, NULL, 5, 'Ventilation systems not working optimally across the facility due to incompatible ventilation system designs leads to excess O&M costs and safety issues  [Station, Mezzanine, Tunnel, CTT]\r\n', NULL, 'Ventilations Systems not working', 'Montreal', 'fb03013c-73fe-430e-80e5-2f3dad7ff1d5', 1, NULL, 7, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(180, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 15, NULL, NULL, NULL, 8, 14, 27, 3, 36, NULL, NULL, 9, 0, NULL, 5, 'Confusion among bidders over risk allocation and requirements of Airport Authority due to imprecise contract documents and reference design leads to overpricing of work and high bid prices with a large spread of bids.', NULL, NULL, NULL, '0a7f1ba0-ff02-40b0-8643-16318a73e287', 1, NULL, 6, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(181, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 20, NULL, NULL, NULL, 8, 14, 27, 4, 36, NULL, NULL, 9, 0, NULL, 5, 'Inadequate project controls of highly interconnected projects in compressed schedule due to coordinating interdependent and time dependent projects leads to delays to program schedule and const increase. ', NULL, NULL, NULL, '3c42d8b3-9ed3-4009-9a22-84bf1d65c7ec', 1, NULL, 6, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(182, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 8, 14, 27, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Inadequately prepared construction contract form, including general and special conditions due to late decision or lack of procurement strategy leads to additional cost and schedule delays. ', NULL, NULL, NULL, '0b0ef418-d3e8-40ce-a78b-7f2807a5c1c8', 1, NULL, 6, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(183, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, 1, 1, 1, 5, NULL, NULL, NULL, 9, 14, 27, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'Insufficient project funding due to various reasons leads to Project delayed or cancelled. ', NULL, NULL, NULL, '509bb7f0-1f1f-4d19-9110-640706f25d89', 1, NULL, 7, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(184, NULL, NULL, NULL, 5, NULL, NULL, 1, 1, 1, 1, 1, 25, NULL, NULL, NULL, 8, 16, 27, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'Insufficient schedule to design and construct project due to aggressive schedule leads to project delays ', NULL, NULL, NULL, '8d7f01ee-b271-4e35-8a06-e0ae5b3f6c91', 1, NULL, 6, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(185, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 15, NULL, NULL, NULL, 9, 15, 27, 3, 36, NULL, NULL, 9, 0, NULL, 5, 'Lack of bidders due to increased construction activity in and around Montreal leads to overpricing of work and high bid prices.', NULL, NULL, NULL, 'a034f79f-f758-41b2-a97a-30403791c348', 1, NULL, 6, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(186, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, 1, 1, 1, 5, NULL, NULL, NULL, 8, 15, 27, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'REM program removes airport station due to various reasons leads to Project delayed or cancelled. ', NULL, NULL, NULL, '5499adbf-dafc-4a00-9470-e990ab5a61b6', 1, NULL, 7, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(187, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 8, 16, 27, 3, 36, NULL, NULL, 9, 0, NULL, 5, 'Insufficient resources applied to project by ADM during design and construction phases due to various reasons leads to Project delays and lack of quality control. ', NULL, NULL, NULL, '0fdf77bc-ebd9-47d3-8855-9b523234efce', 1, NULL, 7, 1, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(188, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 9, 16, 27, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Insufficient resources applied to project by Consultants during design and construction phases due to various reasons leads to Project delays and lack of quality control. ', NULL, NULL, NULL, '9a817b99-c250-42ae-9df9-730b12d09c4e', 1, NULL, 6, 1, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(189, NULL, NULL, NULL, 1, NULL, NULL, 4, 1, 1, 5, 5, 5, NULL, NULL, NULL, 9, 14, 28, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'Electronic interference to Airport radar/instrumentation due to electric train operation leads to expensive retrofits.', NULL, NULL, NULL, '0498343f-2104-4240-9f01-32725500248f', 1, NULL, 6, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(190, NULL, NULL, NULL, 3, NULL, NULL, 4, 1, 1, 1, 1, 12, NULL, NULL, NULL, 8, 15, 28, 3, 36, NULL, NULL, 9, 0, NULL, 5, 'Additional disruption of curbside access due to unanticipated  utility relocations leads to customer disatisfaction', NULL, NULL, NULL, '310bcfe0-0f51-44dc-800e-ae6210b77021', 1, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(191, NULL, NULL, NULL, 4, NULL, NULL, 3, 1, 1, 3, 1, 12, NULL, NULL, NULL, 9, 16, 28, 4, 36, NULL, NULL, 9, 0, NULL, 5, 'Additional travel time to terminal due to construction leads to flight delays and customer complaints and lawsuits from airlines', NULL, NULL, NULL, '7a85d436-f2a2-4363-9a13-1693d8dc963f', 1, NULL, 7, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(192, NULL, NULL, NULL, 4, NULL, NULL, 3, 1, 1, 1, 2, 12, NULL, NULL, NULL, 8, 15, 28, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'Disruption of passenger flow inside the terminal due to poor staging of construction within the terminal leads to cost increase and schedule delay', NULL, NULL, NULL, 'b659158b-daf9-42bf-ae31-3d750be21809', 1, NULL, 7, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(193, NULL, NULL, NULL, 5, NULL, NULL, 3, 1, 1, 1, 3, 20, NULL, NULL, NULL, 8, 15, 28, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'Failure to maintain Airport Station project milestones due to coordination/competing objective conflicts between neighboring projects  leads to cost increase and schedule delay', NULL, NULL, NULL, 'a76251fb-3a2e-4595-b0fd-c955c4789425', 1, NULL, 7, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(194, NULL, NULL, NULL, 4, NULL, NULL, 3, 1, 1, 1, 1, 12, NULL, NULL, NULL, 9, 16, 28, 3, 36, NULL, NULL, 9, 0, NULL, 5, 'Further loss of operational capacity due to construction activities or use of inappropriate access leads to customer disatisfaction and schedule delay', NULL, NULL, NULL, '0754a72c-84f4-4f4f-aae3-69feb7bd459e', 1, NULL, 6, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL);
INSERT INTO `RiskRegistry` (`item_id`, `identified_hazard_risk`, `cause_trigger`, `materialization_phase`, `likelihood`, `time_impact`, `cost_impact`, `reputation_impact`, `hs_impact`, `env_impact`, `legal_impact`, `quality_impact`, `risk_rating`, `risk_level`, `control_mitigation`, `milestone_target_date`, `Status_status_id`, `SystemSafety_safety_id`, `RiskCategories_category_id`, `Realization_realization_id`, `Subproject_subproject_id`, `effect`, `effective_date`, `User_user_id`, `archived`, `archived_date`, `RiskOwner_riskowner_id`, `description_change`, `entity`, `risk_title`, `project_location`, `risk_uuid`, `duplicated`, `created_at`, `Entity_entity_id`, `materialization_phase_materialization_id`, `CostMetric_cost_id`, `ScheduleMetric_schedule_id`, `likelihood_current`, `reputation_impact_current`, `hs_impact_current`, `env_impact_current`, `legal_impact_current`, `quality_impact_current`, `risk_rating_current`, `risk_level_current`, `likelihood_target`, `reputation_impact_target`, `hs_impact_target`, `env_impact_target`, `legal_impact_target`, `quality_impact_target`, `risk_rating_target`, `risk_level_target`, `time_impact_current`, `cost_impact_current`, `time_impact_target`, `cost_impact_target`, `action_owner`, `action_item`, `RiskSubCategories_subcategory_id`, `original_risk_id`) VALUES
(195, NULL, NULL, NULL, 4, NULL, NULL, 3, 1, 1, 1, 2, 12, NULL, NULL, NULL, 9, 15, 28, 4, 36, NULL, NULL, 9, 0, NULL, 5, 'Higher than normal levels of confusion to arriving airport customers due to ineffective outreach campaign regarding construction activities leads to public complaints', NULL, NULL, NULL, '1af8b8b6-e787-4c6c-8b87-0a1fe52ac275', 1, NULL, 7, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(196, NULL, NULL, NULL, 4, NULL, NULL, 3, 1, 1, 1, 1, 12, NULL, NULL, NULL, 8, 15, 28, 3, 36, NULL, NULL, 9, 0, NULL, 5, 'Higher than normal levels of parking garage customer complaints due to construction impacts such as noise, dust on cars leads to customer complaints', NULL, NULL, NULL, '97ab2f23-c8a9-46bd-bfc0-b5b31b60fda0', 1, NULL, 7, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(197, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 2, 1, 9, NULL, NULL, NULL, 9, 14, 28, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Inability to reconcile schedule milestones with CDPQ due to poor schedule interface with CDPQ leads to cost increase and schedule delay', NULL, NULL, NULL, 'a2c742fc-20c6-4d4c-83ae-9dcfbc77189b', 1, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(198, NULL, NULL, NULL, 4, NULL, NULL, 4, 1, 1, 1, 3, 16, NULL, NULL, NULL, 8, 14, 28, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'Negative impact to critical stakeholders at airport such as taxi/bus traffic, employees shuttle, rental cars, commercial services, deliveries, parking, terminal passengers due to construction of station shafts and access points for ventilation leads to work time restrictions and delays. ', NULL, NULL, NULL, '20d402d8-da1a-4d08-97dc-755bd3d562cf', 1, NULL, 7, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(199, NULL, NULL, NULL, 5, NULL, NULL, 3, 3, 1, 1, 2, 15, NULL, NULL, NULL, 8, 15, 28, 3, 36, NULL, NULL, 9, 0, NULL, 5, 'Parking lot elevator failures in West tower due to overuse from loss of East Tower elevator leads to increased downtime, lack of access and increased maintanence costs', NULL, NULL, NULL, '9061e66f-b6ee-412f-b020-1d682f8ec98c', 1, NULL, 7, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(200, NULL, NULL, NULL, 4, NULL, NULL, 4, 1, 1, 1, 1, 16, NULL, NULL, NULL, 9, 14, 28, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'Prolonged unanticipated interruption to curbside service due to poor staging of passenger curb during CTT construction leads to customer disatisfaction and schedule delay', NULL, NULL, NULL, 'd9cc4315-e98b-48b6-af40-6bf2ec60dad5', 1, NULL, 7, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(201, NULL, NULL, NULL, 1, NULL, NULL, 4, 1, 1, 1, 1, 5, NULL, NULL, NULL, 8, 15, 28, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Risk of unanticipated additional terminal and stakeholder disruption due to missuse of blasting in excavation operation leads to ban on blasting or other restrictions.', NULL, NULL, NULL, 'aea20b21-d161-4c1c-a958-3ec47f2979cb', 1, NULL, 6, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(202, NULL, NULL, NULL, 2, NULL, NULL, 1, 1, 1, 1, 1, 8, NULL, NULL, NULL, 8, 14, 28, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'Stakeholders demands are incompatible with construction contract performance requirements due to lack of communication between Authority and stakeholders leads to scope changes during construction, cost increase and schedule delay', NULL, NULL, NULL, '595d34b9-0ae2-4a77-8f0c-06b14d888074', 1, NULL, 6, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(203, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 3, 1, 9, NULL, NULL, NULL, 8, 15, 28, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Transport Canada regulation change negatively impacts project planning, design, or construction due to newly identified security threat leads to increased Safety and Security cost increase and schedule delay', NULL, NULL, NULL, '950e4a54-f990-4312-8962-cd745c1fdcc7', 1, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(204, NULL, NULL, NULL, 3, NULL, NULL, 1, 5, 1, 1, 1, 15, NULL, NULL, NULL, 9, 15, 28, 4, 36, NULL, NULL, 9, 0, NULL, 5, 'Unanticipated restrictions on emergency access and egress due to construction activity in front of terminal leads to compromised safety and schedule delay', NULL, NULL, NULL, 'c9b59489-6ad1-4cca-a19d-10e7ffa5bfb2', 1, NULL, 7, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(205, NULL, NULL, NULL, 2, NULL, NULL, 1, 1, 1, 1, 1, 6, NULL, NULL, NULL, 9, 16, 29, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'Delay in obtaining specialized permanent equipment due to long lead time and number of concurrent stations being built for REM leads to delays to schedule and additional cost.', NULL, NULL, NULL, '42321059-a9ea-4b84-b654-f3926d5a9760', 1, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(206, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 9, 16, 29, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'Design and Procurement delay due to various reasons leads to shortened construction period.', NULL, NULL, NULL, '2a5899ee-55cf-4567-996c-6bd5b8712e51', 1, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(207, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 6, NULL, NULL, NULL, 9, 15, 29, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Geotechnical conditions different to those anticipated  due to greater than anticipated variation in top of rock elevation leads to increased project cost, claims, and schedule delay. ', NULL, NULL, NULL, '8b19bc54-d983-448b-9f91-2c47580678e1', 1, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(208, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 6, NULL, NULL, NULL, 8, 14, 29, 4, 36, NULL, NULL, 9, 0, NULL, 5, 'Geotechnical conditions different to those anticipated  due to greater than anticipated variations and higher rock mass permeability leads to increased project cost, claims, and schedule delay. ', NULL, NULL, NULL, '9955ed49-dfc0-472c-a5ae-e670f400c1ec', 1, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(209, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 9, NULL, NULL, NULL, 8, 16, 29, 3, 36, NULL, NULL, 9, 0, NULL, 5, 'Geotechnical conditions different to those anticipated  due to greater than anticipated variations and reduced rock quality leads to increased project cost, claims, and schedule delay. ', NULL, NULL, NULL, '37de0c1b-171b-4d69-aec5-2a505f699dcb', 1, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(210, NULL, NULL, NULL, 2, NULL, NULL, 1, 1, 1, 1, 1, 8, NULL, NULL, NULL, 9, 14, 29, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Geotechnical conditions different to those anticipated  due to more faults and/or faults with different ground characterization  leads to increased project cost, claims, and schedule delay. ', NULL, NULL, NULL, '1fbd6e9b-f1a6-4e8d-8191-2ec4fa8dc8f4', 1, NULL, 7, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(211, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 8, 15, 29, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Geotechnical conditions different to those anticipated  due to more than anticipated boulders (number and/or size and/or strength) within the overburden deposits leads to increased project cost, claims, and schedule delay.', NULL, NULL, NULL, 'e0fcf7da-b3e7-4f2f-9d08-0d0a613de956', 1, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(212, NULL, NULL, NULL, 2, NULL, NULL, 1, 1, 1, 1, 1, 4, NULL, NULL, NULL, 9, 15, 29, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'Geotechnical conditions different to those anticipated  due to unanticipated variations or complications (perched water) in groundwater conditions leads to increased project cost, claims, and schedule delay. ', NULL, NULL, NULL, 'f6582ec6-40c2-43e0-89be-6887cda0dcce', 1, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(213, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 16, NULL, NULL, NULL, 9, 16, 29, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Geotechnical conditions different to those anticipated  due to various reasons (utilities, unknown groundwater, contaminated ground water, rock or soil etc.) leads to increased project cost, claims, and schedule delay. ', NULL, NULL, NULL, 'dd90931d-31a3-4bd7-abe4-7ecc1d91410e', 1, NULL, 7, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(214, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 4, 12, NULL, NULL, NULL, 9, 16, 29, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Higher than anticipated distress to parking structure due to cumulative impact of numerous construction projects not modeled successfully leads to expensive retrofits.', NULL, NULL, NULL, 'db77ded0-9bba-4168-99a2-658f2b170920', 1, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(215, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, 1, 1, 1, 3, NULL, NULL, NULL, 8, 14, 29, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Inability to identify AHJ for FLS systems [fire alarms] completd under different contracts due to various reasons leads to delays in design approval and construction commissioning.', NULL, NULL, NULL, '630ecdfb-7f72-4ea3-84f6-c5c895b2c8a9', 1, NULL, 7, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(216, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 8, 14, 29, 3, 36, NULL, NULL, 9, 0, NULL, 5, 'Inability to operate Station due to lack of available power leads to delay in commissioning and increased costs.', NULL, NULL, NULL, 'a364fc74-2d9b-4259-8440-7b500fe482fc', 1, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(217, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 9, 15, 29, 3, 36, NULL, NULL, 9, 0, NULL, 5, 'Incompatible ventilation systems by different designers in same building or connected facility are not effective due to lack of coordintation between ADM and CDPQ designs leads to poor performance in evreyday operation and in emergency.', NULL, NULL, NULL, '035f66ab-22bb-49b7-b87a-f63cc82bf920', 1, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(218, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 8, 15, 29, 3, 36, NULL, NULL, 9, 0, NULL, 5, 'Increased material costs due to increased construction activity in and around Montreal leads to overpricing of work and high bid prices.', NULL, NULL, NULL, '172830a7-f46c-4992-b27e-70053ec9088a', 1, NULL, 6, 1, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(219, NULL, NULL, NULL, 4, NULL, NULL, 1, 3, 1, 1, 1, 12, NULL, NULL, NULL, 8, 16, 29, 3, 36, NULL, NULL, 9, 0, NULL, 5, 'Insufficient access to works areas designated in contract due to congested site conditions in and around the terminal building leads to additional cost, contractor claims, and schedule delays', NULL, NULL, NULL, '46cd91ca-50fe-4cf8-a96f-aa12b08eca5c', 1, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(220, NULL, NULL, NULL, 4, NULL, NULL, 4, 1, 1, 1, 3, 16, NULL, NULL, NULL, 8, 16, 29, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'Insufficient coordination between design and construction interface of airport station and other airport projects due to unequal design development or other factors leads to additional cost and schedule delays. ', NULL, NULL, NULL, 'f125e243-c770-4e1f-a1e2-03898262ade2', 1, NULL, 6, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(221, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 16, NULL, NULL, NULL, 9, 16, 29, 3, 36, NULL, NULL, 9, 0, NULL, 5, 'Insufficient coordination between design and construction interface of airport station project and CDPQ Tunnel project due to unequal design development or other factors leads to additional cost and schedule delays. ', NULL, NULL, NULL, 'acc24deb-0e02-42a0-9d3b-085b67977bb1', 1, NULL, 6, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(222, NULL, NULL, NULL, 5, NULL, NULL, 1, 1, 1, 1, 3, 25, NULL, NULL, NULL, 8, 15, 29, 3, 36, NULL, NULL, 9, 0, NULL, 5, 'Insufficient coordination between operational interface of airport station and other airport projects due to unequal design development or other factors leads to additional cost and schedule delays during commissioning. ', NULL, NULL, NULL, 'e75efc7f-424e-45fc-a977-9380e533bfdd', 1, NULL, 6, 1, 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(223, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 9, 16, 29, 4, 36, NULL, NULL, 9, 0, NULL, 5, 'Insufficient electric power to operate station due to incorrect power demand estimates leads to expensive retrofit and delays', NULL, NULL, NULL, '6cf0d450-4990-49cb-b0cc-e2ed630c442a', 1, NULL, 6, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(224, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 9, NULL, NULL, NULL, 9, 16, 29, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Insufficient regional access to airport for delivery of materials and equipment due to construction activities and neighboring highway construction leads to additional cost, contractor claims, and schedule delays', NULL, NULL, NULL, '73769063-9a26-4c6d-8643-d4085d95a326', 1, NULL, 6, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(225, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 9, 16, 29, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'Insufficient sizing of rooms/shafts and other facilities, including electrical/mechanical/communication systems in the station due to incorrect design estimates or incompatible criteria leads to expensive retrofit and delays', NULL, NULL, NULL, '0336b7a2-f589-4494-ab3b-ff4eb60f567f', 1, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(226, NULL, NULL, NULL, 3, NULL, NULL, 1, 3, 1, 1, 1, 9, NULL, NULL, NULL, 8, 15, 29, 3, 36, NULL, NULL, 9, 0, NULL, 5, 'Insufficient works areas designated in contract due to lack of available space, delays in previous contracts or other reasons, leads to additional cost, contractor claims, and schedule delays', NULL, NULL, NULL, '7f2c51d4-6034-4ee5-a8c3-c11d6e250677', 1, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(227, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 16, NULL, NULL, NULL, 8, 16, 29, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'Insufficiently clear construction contract interface control between Airport station project and CDPQ tunnel project due to TBM delays, constrained access or other reason leads to increased cost and schedule delay', NULL, NULL, NULL, 'cf49a21d-719d-44bf-ac8b-071d073c7c9f', 1, NULL, 7, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(228, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 8, 15, 29, 4, 36, NULL, NULL, 9, 0, NULL, 5, 'Lack of skilled labor and equipment due to increased construction activity in and around Montreal leads to overpricing of work and high bid prices.', NULL, NULL, NULL, 'f7eff19f-7026-4df1-98dd-372752a6fb2c', 1, NULL, 6, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(229, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 16, NULL, NULL, NULL, 9, 15, 29, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Late changes in design criteria by CDPQ or ADM (eg shaft exc. size) due to various reasons leads to increased cost and schedule delay', NULL, NULL, NULL, '87697d72-bbec-4764-8d29-d1ee134fade9', 1, NULL, 6, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(230, NULL, NULL, NULL, 2, NULL, NULL, 1, 1, 1, 1, 2, 10, NULL, NULL, NULL, 8, 14, 29, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Mistake made in station survey layout due to different survey datum (V & H) between Airport and CDPQ leads to delays, major redesign and claims and potential negative impacts to station operation', NULL, NULL, NULL, 'af879b5b-5512-410a-9ed4-e3862e1b7d03', 1, NULL, 6, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(231, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 2, 12, NULL, NULL, NULL, 8, 15, 29, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'Modification of CDPQ alignment due to extension of REM line past airport (i.e. Airport no longer a terminus staion) leads to delays, major redesign and claims and potential negative impacts to station operation', NULL, NULL, NULL, '97f0d443-105e-4502-9459-39d3bf8113c5', 1, NULL, 6, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(232, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 2, 15, NULL, NULL, NULL, 9, 15, 29, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Relocation of station alignment due to unanticipated relocation of tunnel alignment(V & H) by others leads to delays, major redesign and claims and potential negative impacts to station operation', NULL, NULL, NULL, '2a43b5b3-d83b-41d0-9783-e2cf7a108974', 1, NULL, 7, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(233, NULL, NULL, NULL, 5, NULL, NULL, 3, 1, 1, 1, 3, 25, NULL, NULL, NULL, 9, 14, 29, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Third party utility relocation delays due to those agencies having different priorities and/or not able to respond in required timeframe leads to additional cost and schedule delays. ', NULL, NULL, NULL, 'd8f93645-1f5f-4475-a9f5-008594f330fe', 1, NULL, 7, 1, 4, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(234, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 6, NULL, NULL, NULL, 9, 14, 29, 4, 36, NULL, NULL, 9, 0, NULL, 5, 'Unanticipated high groundwater inflow needs disposal by CDPQ due to confusion over inflow estimates leads to claims by CDPQ (who is required to dispose of water) on ADM (who is required to estimate inflow).', NULL, NULL, NULL, 'b1e022f1-bd20-4e85-85fd-7a33cd92f43e', 1, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(235, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 16, NULL, NULL, NULL, 9, 15, 30, 3, 36, NULL, NULL, 9, 0, NULL, 5, 'CDPQ misses Construction Milestones due to various reasons leads to Contractor delay.', NULL, NULL, NULL, '3fd9e1d9-52eb-481a-9859-5b54872a8ec4', 1, NULL, 7, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(236, NULL, NULL, NULL, 3, NULL, NULL, 1, 4, 1, 1, 1, 12, NULL, NULL, NULL, 9, 15, 30, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'Construction accident due to various reasons (explosives, equipment moving, trips and falls etc.) leads to injury, damage to equipment, additional cost and schedule delay ', NULL, NULL, NULL, '7bed9fc0-f67f-450a-8113-2e18dfe6c229', 1, NULL, 6, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(237, NULL, NULL, NULL, 4, NULL, NULL, 4, 1, 1, 1, 3, 16, NULL, NULL, NULL, 8, 15, 30, 4, 36, NULL, NULL, 9, 0, NULL, 5, 'Contractors fail to understand importance of curbside operations and staging in contract due to lackof knowledge of airport operations and numerous contact points within Airport Operations leads to Contractor overpricing this risk, or additional cost and schedule delay.', NULL, NULL, NULL, 'b98de199-25e5-420d-bf7a-0f331dc5ad9c', 1, NULL, 7, 1, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(238, NULL, NULL, NULL, 3, NULL, NULL, 3, 1, 2, 1, 1, 9, NULL, NULL, NULL, 9, 16, 30, 4, 36, NULL, NULL, 9, 0, NULL, 5, 'Controlled blasting causes unanticipated impacts to adjacent airport structures due to close proximity of building foundations leads to work stoppages and additional remediation costs.', NULL, NULL, NULL, '33340490-7773-4993-ad3f-8b946944fe70', 1, NULL, 6, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(239, NULL, NULL, NULL, 3, NULL, NULL, 3, 3, 1, 1, 3, 9, NULL, NULL, NULL, 9, 14, 30, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Damage to adjacent airport structures due to failure to monitor impacts to adjacent structure during construction leads to cost increase and schedule delay', NULL, NULL, NULL, '6f2bb210-ad8e-4b07-9ff1-5542db6e3c8b', 1, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(240, NULL, NULL, NULL, 3, NULL, NULL, 1, 3, 1, 1, 1, 9, NULL, NULL, NULL, 9, 14, 30, 3, 36, NULL, NULL, 9, 0, NULL, 5, 'Damage to adjacent structures due to construction activities leads to additional cost and time, damage to reputation, legal exposure and/or potential injuries', NULL, NULL, NULL, '4f7716d4-11af-454c-b986-00fe7fd4fe71', 1, NULL, 6, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(241, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 16, NULL, NULL, NULL, 9, 15, 30, 3, 36, NULL, NULL, 9, 0, NULL, 5, 'Design changes requested by ADM during construction due to various causes leads to Contractor delays and claims.', NULL, NULL, NULL, '8be2e238-bfcc-4c82-be69-97d4845cf40b', 1, NULL, 6, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(242, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 8, 14, 30, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Hours of muck removal operation could be limited due to airport terminal peak time traffic leads to delay and additional costs', NULL, NULL, NULL, 'f6901cdc-8657-4d81-94eb-b592496afdff', 1, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(243, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 3, 9, NULL, NULL, NULL, 8, 16, 30, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Impact to sensitive equipment in nearby buildings and structures (e.g. Security apparatus) due to construction-induced vibration leads to Contractor delays.', NULL, NULL, NULL, 'aad7646f-f039-4c45-8acf-9e536c1c2656', 1, NULL, 6, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(244, NULL, NULL, NULL, 5, NULL, NULL, 3, 1, 1, 1, 3, 25, NULL, NULL, NULL, 9, 14, 30, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'Inability to recover from issues with initial site activity or preparatory work due to highly compressed schedule with inter-dependent milestones leads to additional cost and schedule delays. ', NULL, NULL, NULL, '774863f8-3c6b-47ba-9657-3b4818abadf9', 1, NULL, 7, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(245, NULL, NULL, NULL, 4, NULL, NULL, 2, 1, 1, 1, 2, 12, NULL, NULL, NULL, 8, 16, 30, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Inadequate traffic management around terminal by contractor due to inability to effectively separate construction traffic from airport customers leads to Contractor shutdown/delays', NULL, NULL, NULL, '63df6961-15e9-4399-81c5-3a694a680778', 1, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(246, NULL, NULL, NULL, 2, NULL, NULL, 4, 1, 1, 1, 4, 8, NULL, NULL, NULL, 8, 15, 30, 4, 36, NULL, NULL, 9, 0, NULL, 5, 'Inappropriate use of lights during night work due to proximity to runway leads to Contractor shutdown, possible delays', NULL, NULL, NULL, '4b03980c-44f3-4733-bc4b-041059ea1140', 1, NULL, 6, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(247, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 3, 1, 20, NULL, NULL, NULL, 9, 14, 30, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'Incompatible work plan requested by contractor due to inexperience with Airport operation requirements leads to claims, additional cost and schedule delay', NULL, NULL, NULL, '41c11e07-ff76-4a79-b901-7532fb234597', 1, NULL, 7, 1, 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(248, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 9, NULL, NULL, NULL, 8, 15, 30, 4, 36, NULL, NULL, 9, 0, NULL, 5, 'Lack of trucks due to large volume of local work (especially acute issue during winter) leads to schedule delays and additional cost', NULL, NULL, NULL, 'e5712779-1b06-4925-be59-525e45345323', 1, NULL, 7, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(249, NULL, NULL, NULL, 2, NULL, NULL, 1, 1, 1, 5, 3, 10, NULL, NULL, NULL, 9, 15, 30, 4, 36, NULL, NULL, 9, 0, NULL, 5, 'Non-compliance with Airport regulations due to lack of appropriate use of height restricted equipment leads to Contractor shutdown and regulatory fines.', NULL, NULL, NULL, '16f89776-4506-4d60-9df5-edd1b706ad5c', 1, NULL, 7, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(250, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 3, 1, 1, 16, NULL, NULL, NULL, 8, 15, 30, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Rising ground water level due to overly wet weather leads to water inflow into tunnel above predicted values resulting in claims', NULL, NULL, NULL, '3d3fa3b1-3f8f-4638-bf9c-79c2352a948c', 1, NULL, 6, 1, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(251, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 8, NULL, NULL, NULL, 9, 15, 30, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'Service interruption to various utility services (Electric/water/etc.) due to tie-in to existing systems leads to project delays and customer inconvenience.', NULL, NULL, NULL, 'c281ccfc-1093-48b2-8481-3704af39c31c', 1, NULL, 7, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(252, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 12, NULL, NULL, NULL, 8, 16, 30, 3, 36, NULL, NULL, 9, 0, NULL, 5, 'Station contractor encounters errors in REM tunnel construction due to poor quality surveying or alignment control of tunnel or other factors leads to additional cost and schedule delay', NULL, NULL, NULL, '5da1a858-fd6b-473b-8009-efc11a298f60', 1, NULL, 7, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(253, NULL, NULL, NULL, 1, NULL, NULL, 5, 5, 1, 5, 1, 5, NULL, NULL, NULL, 9, 14, 30, 4, 36, NULL, NULL, 9, 0, NULL, 5, 'Tunnel collapse due to mining large SEM span in shallow cover leads to additional cost and time, damage to reputation, legal exposure and/or major injuries', NULL, NULL, NULL, '829fe557-a029-4b94-94d8-2774abbaf82f', 1, NULL, 6, 1, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(254, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, 1, 1, 16, NULL, NULL, NULL, 8, 14, 30, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Unexpected changes in tunnel handover condition from CDPQ to ADM due to various reasons leads to expensive retrofit design/construction and delays', NULL, NULL, NULL, '8d8ff242-264c-4eb4-bf9f-74eef363e782', 1, NULL, 7, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(255, NULL, NULL, NULL, 3, NULL, NULL, 3, 1, 3, 1, 1, 9, NULL, NULL, NULL, 8, 16, 30, 3, 36, NULL, NULL, 9, 0, NULL, 5, 'Violation of contractually required environmental regulations due to dust/water disposal/spills during construction leads to fines and project delays ', NULL, NULL, NULL, 'adc2f387-504f-4ebe-8783-536ede62c29c', 1, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(256, NULL, NULL, NULL, 3, NULL, NULL, 3, 1, 1, 1, 1, 9, NULL, NULL, NULL, 8, 14, 30, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'Work is restricted due to noise, dust and vibration impact on operations and/or existing structures leads to additional costs and claims for delay.', NULL, NULL, NULL, '08af345e-3876-43f0-858b-5b430cdfb004', 1, NULL, 6, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(257, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 3, NULL, NULL, NULL, 8, 16, 30, 3, 36, NULL, NULL, 9, 0, NULL, 5, 'Work stopped due to labor disputes  leads to Contractor delays', NULL, NULL, NULL, 'd38c332e-13fb-4f4e-86f8-7b7e62a07687', 1, NULL, 6, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(258, NULL, NULL, NULL, 2, NULL, NULL, 1, 1, 1, 1, 1, 6, NULL, NULL, NULL, 9, 14, 30, 4, 36, NULL, NULL, 9, 0, NULL, 5, 'Work stopped due to more adverse weather than anticipated in contract leads to Contractor delays', NULL, NULL, NULL, '5477d438-5a2a-4da5-ba14-1a59e4dd8ac2', 1, NULL, 6, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(259, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 3, 9, NULL, NULL, NULL, 9, 14, 31, 4, 36, NULL, NULL, 9, 0, NULL, 5, 'Access/egress inadequate for O&M equipment during regular maintenance and replacement due to failure to design for proper access leads to added O&M cost  ', NULL, NULL, NULL, '45c05fea-b36e-40db-ab53-1a840d0561f7', 1, NULL, 6, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(260, NULL, NULL, NULL, 3, NULL, NULL, 1, 4, 1, 1, 1, 12, NULL, NULL, NULL, 9, 14, 31, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Access/egress to new facilities inadequate during an emergency event due to incompatible design regarding a new security and safety threat leads to delayed response times  ', NULL, NULL, NULL, '57870f04-be29-4ab3-8252-b0ec369adda8', 1, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(261, NULL, NULL, NULL, 5, NULL, NULL, 1, 1, 1, 1, 3, 15, NULL, NULL, NULL, 9, 16, 31, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Additional security personnel required due to increased patrol area of pasenger tunnel, etc leads to increased security costs   ', NULL, NULL, NULL, '14bfab82-9633-4dfe-adfb-4b427d16d221', 1, NULL, 7, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(262, NULL, NULL, NULL, 4, NULL, NULL, 3, 1, 1, 1, 3, 12, NULL, NULL, NULL, 9, 16, 31, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Failure of communication/contingency plan during train system outage due to inadequate communication leads to overcrowding at platform and delays commencing bus contingency plan  ', NULL, NULL, NULL, '7c17b5c4-ffdc-41d2-a5c0-ebeb97fb5f33', 1, NULL, 7, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(263, NULL, NULL, NULL, 3, NULL, NULL, 1, 3, 1, 1, 3, 9, NULL, NULL, NULL, 9, 14, 31, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'Inability to observe station activities due to failure to staff command center 24/7 leads to lack of early warning of issues  ', NULL, NULL, NULL, '9a0d5d4e-af3f-456d-82fc-e43fa4cc4a2e', 1, NULL, 6, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(264, NULL, NULL, NULL, 3, NULL, NULL, 1, 1, 1, 1, 3, 12, NULL, NULL, NULL, 8, 15, 31, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'Incompatibility between transit operating systems due to use of differing design criteria leads to expensive rework and lost time and conflicts between REM and Station contractor/owner/operator', NULL, NULL, NULL, '3d6b4636-e244-4a0f-bf49-202be14db264', 1, NULL, 7, 1, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(265, NULL, NULL, NULL, 4, NULL, NULL, 1, 3, 1, 3, 3, 12, NULL, NULL, NULL, 9, 14, 31, 4, 36, NULL, NULL, 9, 0, NULL, 6, 'Incompatible technology of cameras/command centers due to failure to integrate emergency FLS systems leads to confusion during emergency   ', NULL, NULL, NULL, 'ae6b3a82-bd2e-46e1-b2bf-d19f06e19855', 1, NULL, 6, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(266, NULL, NULL, NULL, 4, NULL, NULL, 3, 1, 1, 1, 4, 16, NULL, NULL, NULL, 8, 14, 31, 3, 36, NULL, NULL, 9, 0, NULL, 5, 'Lack of clear demarcation between Airport and Subway operational areas due to lack of current certaintity of turnstile location and other physical barriers leads to increased O&M Costs for Airport ', NULL, NULL, NULL, 'd6e214de-c350-4b98-93b3-9349a2fd31d4', 1, NULL, 7, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(267, NULL, NULL, NULL, 4, NULL, NULL, 3, 1, 1, 1, 2, 12, NULL, NULL, NULL, 8, 16, 31, 4, 36, NULL, NULL, 9, 0, NULL, 5, 'Lack of coordination between Airport and CDPQ due to inadequate day-to-day communication systems leads to poor facility maintenance  ', NULL, NULL, NULL, '36bfe48c-2e49-44a4-b55f-10aa160f71ae', 1, NULL, 6, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(268, NULL, NULL, NULL, 4, NULL, NULL, 1, 3, 1, 3, 3, 12, NULL, NULL, NULL, 9, 15, 31, 4, 36, NULL, NULL, 9, 0, NULL, 5, 'Lack of coordination between Airport and CDPQ operations due to inadequate communication systems leads to possible security failures  ', NULL, NULL, NULL, '8603ab5b-536c-4dd3-a56a-b900d4876a76', 1, NULL, 7, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(269, NULL, NULL, NULL, 3, NULL, NULL, 3, 1, 1, 1, 4, 12, NULL, NULL, NULL, 9, 16, 31, 4, 36, NULL, NULL, 9, 0, NULL, 5, 'Vapor cloud from underground structure HVAC system exhaust blocks field of vision of control tower due to location of exhaust  leads to air traffic interruptions and costs from airlines', NULL, NULL, NULL, 'cd8ea5cf-f17c-4729-a00b-ed613d6af9c7', 1, NULL, 6, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(270, NULL, NULL, NULL, 3, NULL, NULL, 1, 4, 1, 1, 2, 12, NULL, NULL, NULL, 8, 15, 31, 3, 36, NULL, NULL, 9, 0, NULL, 6, 'Ventilation systems not working optimally across the facility due to incompatible ventilation system designs leads to excess O&M costs and safety issues  [Station, Mezzanine, Tunnel, CTT]', NULL, NULL, NULL, '7a16aa55-7534-4a0f-b329-ba508e0a9ef5', 1, NULL, 6, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(271, 'www', 'www', NULL, 2, NULL, NULL, 1, 1, 1, 1, 1, 2, 'Threat Low', NULL, 'www', 8, 14, 27, 3, 33, 'www', '2018-02-21', 9, 0, NULL, 5, 'wwww', NULL, 'www', 'www', 'b4dee525-529b-4edd-92bc-c7e29220e82d', NULL, NULL, 6, 1, 1, 1, 3, 1, 1, 1, 1, 1, 3, 'Threat Low', 3, 1, 1, 1, 1, 1, 3, 'Threat Low', 1, 1, 1, 1, NULL, NULL, 0, NULL),
(272, 'xxx', 'xxx', NULL, 2, NULL, NULL, 1, 1, 1, 1, 1, 2, 'Threat Low', NULL, 'xxx', 8, 14, 30, 3, 33, 'xxx', '2018-03-11', 9, 0, NULL, 5, 'xxxx', NULL, 'xxx', 'xxxx', 'cd615716-2334-49c1-9858-facfdbd2a61b', NULL, '2018-03-10 21:00:00', 6, 1, 1, 1, 1, 1, 1, 1, 4, 1, 4, 'Threat Medium', 1, 1, 1, 1, 1, 5, 5, 'Threat Medium', 1, 1, 1, 1, 12, 'xxx', 5, '30.5.271'),
(273, 'eee', 'eee', NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 3, 'Threat Low', NULL, 'eeee', 8, 14, 30, 3, 33, 'eee', '2018-03-11', 9, 0, NULL, 5, 'eeee', NULL, 'eee', 'eee', '83ec1cba-6c85-4a63-a4d4-d1cec6bd8174', NULL, '2018-03-10 21:00:00', 6, 1, 1, 1, 1, 1, 1, 1, 4, 1, 4, 'Threat Medium', 3, 1, 1, 1, 1, 1, 3, 'Threat Low', 1, 1, 1, 1, 12, 'eeee', 5, '30.5.272'),
(274, 'rrrr', 'rrr', NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, 3, 'Threat Low', NULL, 'rrrr', 8, 14, 30, 3, 33, 'rrr', '2018-03-11', 9, 0, NULL, 5, 'rrrr', NULL, 'rrr', 'rrr', '6542f38c-4986-4407-8cef-cb181f59287e', NULL, '2018-03-10 21:00:00', 6, 1, 1, 1, 2, 1, 1, 1, 1, 1, 2, 'Threat Low', 1, 1, 1, 1, 5, 1, 5, 'Threat Medium', 1, 1, 1, 1, 12, 'rrrr', 6, '30.6.273'),
(275, 'cccc', 'ccc', NULL, 1, NULL, NULL, 1, 1, 1, 2, 1, 2, 'Threat Low', NULL, 'ccccc', 8, 14, 30, 3, 33, 'cccc', '2018-03-14', 9, 0, NULL, 5, 'xxxx', NULL, 'ccc', 'ccccc', 'a611ee11-1943-416c-84a2-197b4c95bc9a', NULL, '2018-03-13 21:00:00', 6, 1, 1, 1, 2, 1, 1, 1, 1, 1, 2, 'Threat Low', 2, 1, 1, 1, 1, 1, 2, 'Threat Low', 1, 1, 1, 1, 12, 'cccc', 5, '30.5.275'),
(276, 'xxxx', 'xxxx', NULL, 1, NULL, NULL, 1, 1, 1, 2, 1, 2, 'Threat Low', NULL, 'xxxxx', 9, 14, 30, 3, 33, 'xxx', '2018-03-14', 9, 0, NULL, 5, 'xxxx', NULL, 'xxxx', 'xxxx', '3dff971f-01b2-4bc4-9d8c-ad299b9c2c78', NULL, '2018-03-13 21:00:00', 6, 1, 1, 1, 1, 1, 1, 1, 3, 1, 3, 'Threat Low', 1, 1, 1, 1, 3, 1, 3, 'Threat Low', 1, 1, 1, 1, 15, 'xxx', 5, '30.5.276');

-- --------------------------------------------------------

--
-- Table structure for table `RiskResponse`
--

CREATE TABLE `RiskResponse` (
  `response_id` int(11) NOT NULL,
  `risk_uuid` varchar(128) DEFAULT NULL,
  `response_uuid` varchar(128) DEFAULT NULL,
  `response_title` varchar(100) DEFAULT NULL,
  `RiskStrategies_strategy_id` int(11) NOT NULL,
  `register_id` int(11) DEFAULT NULL,
  `user_id` blob,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `due_date` date DEFAULT NULL COMMENT '\n',
  `ResponseTitle_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RiskResponse`
--

INSERT INTO `RiskResponse` (`response_id`, `risk_uuid`, `response_uuid`, `response_title`, `RiskStrategies_strategy_id`, `register_id`, `user_id`, `created_at`, `updated_at`, `due_date`, `ResponseTitle_id`) VALUES
(1, '67c97e5b-4662-479a-adb8-f4a9d16a7415', '1b6eba9e-b7ff-4165-a69f-f39a842b0dd5', 'rrrr', 6, NULL, NULL, NULL, NULL, NULL, 0),
(2, 'ef80db30-6152-4d92-aff3-7f2cda29dcd7', 'f286a08b-6eec-4040-9a80-58d89d7181ca', 'Lock in suppliers', 6, NULL, NULL, NULL, NULL, NULL, 0),
(3, '2d6ca317-8b9f-4436-bbe3-2bc45343a9bf', 'b7b6cf73-84f4-4fcd-9870-235cf95a154b', 'Unmitigated Risk', 6, NULL, NULL, NULL, NULL, NULL, 0),
(4, '702efa59-1638-455c-b974-6b721194ddca', '4ab86ed4-adb0-44cf-99b5-c0633ffa4278', 'NA', 6, NULL, NULL, NULL, NULL, NULL, 0),
(5, 'f0b4c268-585e-4751-8681-eb2dcf774541', '6b359eee-418c-42d7-9f65-2867a82ad45f', 'NA', 6, NULL, NULL, NULL, NULL, NULL, 0),
(6, 'be603987-db16-4482-be29-ff9e74f3316c', 'abbcc798-a3c8-4697-861b-74a0b407b33e', 'Road hazard', 6, NULL, NULL, NULL, NULL, NULL, 0),
(7, '59ebcf9e-a2fd-4dd9-ae9c-873e60c07b02', '3d842d5b-f779-41f0-b2d8-9693b1e9d573', 'General population', 7, NULL, NULL, NULL, NULL, NULL, 0),
(8, 'bfff2129-704d-45db-a106-2faebbf1a9f9', 'd57fe342-f77b-45f5-9b27-bb03a4d372fc', 'NA', 6, NULL, NULL, NULL, NULL, NULL, 0),
(9, 'fb03013c-73fe-430e-80e5-2f3dad7ff1d5', 'd0c235a4-2581-46e8-93ae-cdb2d0c9885e', 'NA', 6, NULL, NULL, NULL, NULL, NULL, 0),
(10, 'b4dee525-529b-4edd-92bc-c7e29220e82d', 'bbe2ae94-07ac-4b9c-a594-370d760b15bf', 'wwww', 6, 33, 0x3132, '2018-02-26', '2018-02-26', NULL, 0),
(11, 'cd615716-2334-49c1-9858-facfdbd2a61b', 'f36a6807-6505-40e7-9272-b4410337d32f', NULL, 6, 33, 0x3132, '2018-03-27', '2018-03-27', '2018-04-03', 1),
(12, '83ec1cba-6c85-4a63-a4d4-d1cec6bd8174', 'ba2189b1-8e4e-4fed-8799-67f78e5c6fb2', NULL, 6, 33, 0x3132, '2018-03-21', '2018-03-21', '2018-03-28', 1),
(13, '6542f38c-4986-4407-8cef-cb181f59287e', '21a73507-565a-4b35-9d7f-657cffcf27a7', NULL, 6, 33, 0x3134, '2018-03-21', '2018-03-21', '2018-03-28', 1),
(14, 'a611ee11-1943-416c-84a2-197b4c95bc9a', 'e2fe0e43-2229-486a-9fd2-1146d48942cd', NULL, 6, 33, 0x30, '2018-03-14', '2018-03-14', '2018-03-26', 1),
(15, '3dff971f-01b2-4bc4-9d8c-ad299b9c2c78', 'ce4476c8-9630-4b25-b938-9c7af6f3bb3f', NULL, 6, 33, 0x613a323a7b693a303b733a323a223132223b693a313b733a323a223134223b7d, '2018-03-14', '2018-03-14', '2018-03-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `RiskRevisions`
--

CREATE TABLE `RiskRevisions` (
  `revision_id` int(11) NOT NULL,
  `identified_hazard_risk` mediumtext,
  `cause_trigger` mediumtext,
  `materialization_phase` varchar(45) DEFAULT NULL,
  `likelihood` int(11) DEFAULT NULL,
  `time_impact` int(11) DEFAULT NULL,
  `cost_impact` int(11) DEFAULT NULL,
  `reputation_impact` int(11) DEFAULT NULL,
  `hs_impact` int(11) DEFAULT NULL,
  `env_impact` int(11) DEFAULT NULL,
  `legal_impact` int(11) DEFAULT NULL,
  `quality_impact` int(11) DEFAULT NULL,
  `comments` longtext,
  `risk_rating` int(11) DEFAULT NULL,
  `risk_level` varchar(100) DEFAULT NULL,
  `control_mitigation` longtext,
  `residual_risk_likelihood` int(11) DEFAULT NULL,
  `residual_risk_impact` int(11) DEFAULT NULL,
  `residual_risk_rating` int(11) DEFAULT NULL,
  `residual_risk_level` varchar(100) DEFAULT NULL,
  `action_owner_email` varchar(128) DEFAULT NULL,
  `milestone_target_date` mediumtext,
  `Status_status_id` int(11) NOT NULL,
  `SystemSafety_safety_id` int(11) NOT NULL,
  `RiskCategories_category_id` int(11) NOT NULL,
  `Realization_realization_id` int(11) NOT NULL,
  `Subproject_subproject_id` int(11) NOT NULL,
  `effect` mediumtext,
  `effective_date` datetime DEFAULT NULL,
  `User_user_id` int(11) NOT NULL,
  `archived` tinyint(4) DEFAULT NULL,
  `archived_date` varchar(45) DEFAULT NULL,
  `RiskOwner_riskowner_id` int(11) NOT NULL,
  `description_change` longtext,
  `entity` varchar(100) DEFAULT NULL,
  `risk_title` varchar(100) DEFAULT NULL,
  `project_location` varchar(100) DEFAULT NULL,
  `risk_uuid` varchar(128) DEFAULT NULL,
  `duplicated` tinyint(4) DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `revision_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `materialization_phase_materialization_id` int(11) NOT NULL,
  `Entity_entity_id` int(11) NOT NULL,
  `CostMetric_cost_id` int(11) NOT NULL,
  `ScheduleMetric_schedule_id` int(11) NOT NULL,
  `action_owner_fname` varchar(45) DEFAULT NULL,
  `action_owner_lname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RiskRevisions`
--

INSERT INTO `RiskRevisions` (`revision_id`, `identified_hazard_risk`, `cause_trigger`, `materialization_phase`, `likelihood`, `time_impact`, `cost_impact`, `reputation_impact`, `hs_impact`, `env_impact`, `legal_impact`, `quality_impact`, `comments`, `risk_rating`, `risk_level`, `control_mitigation`, `residual_risk_likelihood`, `residual_risk_impact`, `residual_risk_rating`, `residual_risk_level`, `action_owner_email`, `milestone_target_date`, `Status_status_id`, `SystemSafety_safety_id`, `RiskCategories_category_id`, `Realization_realization_id`, `Subproject_subproject_id`, `effect`, `effective_date`, `User_user_id`, `archived`, `archived_date`, `RiskOwner_riskowner_id`, `description_change`, `entity`, `risk_title`, `project_location`, `risk_uuid`, `duplicated`, `item_id`, `revision_date`, `created_at`, `materialization_phase_materialization_id`, `Entity_entity_id`, `CostMetric_cost_id`, `ScheduleMetric_schedule_id`, `action_owner_fname`, `action_owner_lname`) VALUES
(1, 'Road accidents', 'Lack of safety signs', NULL, 1, NULL, NULL, 1, 1, 1, 1, 1, NULL, 2, 'Threat Low', NULL, 3, 1, 3, 'Threat Low', NULL, '11/01/18', 8, 14, 27, 3, 33, 'Reputation', '2018-02-02 05:23:28', 9, 0, NULL, 5, 'Expansion of road and signage installation', NULL, 'Mombasa Road Construction', 'JKIA', 'be603987-db16-4482-be29-ff9e74f3316c', NULL, 58, NULL, '2018-02-02 05:20:44', 1, 6, 1, 2, 'Brian', 'Birir'),
(2, 'Confusion among bidders over risk allocation and requirements of Airport Authority', 'imprecise contract documents and reference design', NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, NULL, 15, 'Threat High', NULL, 2, 1, 2, 'Threat Low', NULL, '1/1/2018', 8, 14, 27, 3, 33, 'overpricing of work and high bid prices with a large spread of bids.', '2018-02-02 02:36:39', 9, 0, NULL, 5, NULL, NULL, 'Bidder confusion', 'Montreal', '2d6ca317-8b9f-4436-bbe3-2bc45343a9bf', NULL, 55, NULL, '2018-01-31 17:07:03', 1, 6, 5, 1, 'Jeffrey', 'Myers'),
(3, 'Confusion among bidders over risk allocation and requirements of Airport Authority', 'imprecise contract documents and reference design', NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, NULL, 15, 'Threat High', NULL, 2, 1, 2, 'Threat Low', NULL, '1/1/2018', 8, 14, 27, 3, 33, 'overpricing of work and high bid prices with a large spread of bids.', '2018-02-02 17:36:18', 9, 0, NULL, 5, 'Confusion among bidders over risk allocation and requirements of Airport Authority due to imprecise contract documents and reference design leads to overpricing of work and high bid prices with a large spread of bids.', NULL, 'Bidder confusion', 'Montreal', '2d6ca317-8b9f-4436-bbe3-2bc45343a9bf', NULL, 55, NULL, '2018-01-31 17:07:03', 1, 6, 5, 1, 'Jeffrey', 'Myers'),
(4, 'Confusion among bidders over risk allocation and requirements of Airport Authority', 'imprecise contract documents and reference design', NULL, 3, NULL, NULL, 1, 1, 1, 1, 1, NULL, 15, 'Threat High', NULL, 2, 1, 2, 'Threat Low', NULL, '1/1/2018', 8, 14, 27, 3, 33, 'overpricing of work and high bid prices with a large spread of bids.', '2018-02-02 17:36:36', 9, 0, NULL, 5, 'Confusion among bidders over risk allocation and requirements of Airport Authority due to imprecise contract documents and reference design leads to overpricing of work and high bid prices with a large spread of bids.', NULL, 'Bidder confusion', 'Montreal', '2d6ca317-8b9f-4436-bbe3-2bc45343a9bf', NULL, 55, NULL, '2018-01-31 17:07:03', 1, 6, 5, 1, 'Jeffrey', 'Myers');

-- --------------------------------------------------------

--
-- Table structure for table `RiskStrategies`
--

CREATE TABLE `RiskStrategies` (
  `strategy_id` int(11) NOT NULL,
  `strategy_name` varchar(45) DEFAULT NULL,
  `Project_project_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RiskStrategies`
--

INSERT INTO `RiskStrategies` (`strategy_id`, `strategy_name`, `Project_project_id`, `created_at`, `updated_at`) VALUES
(1, 'Transfer', 0, NULL, NULL),
(2, 'Eliminate', 0, NULL, NULL),
(3, 'Avoid', 0, NULL, NULL),
(4, 'Accept', 0, NULL, NULL),
(5, 'Mitigate', 0, NULL, NULL),
(6, 'Transfer', 7, NULL, NULL),
(7, 'Eliminate', 7, NULL, NULL),
(8, 'Accept', 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `RiskSubCategories`
--

CREATE TABLE `RiskSubCategories` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `RiskCategories_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RiskSubCategories`
--

INSERT INTO `RiskSubCategories` (`subcategory_id`, `subcategory_name`, `created_at`, `updated_at`, `RiskCategories_category_id`) VALUES
(5, 'Geology', '2018-03-11 00:00:00', '2018-03-11 00:00:00', 30),
(6, 'Power', '2018-03-11 00:00:00', '2018-03-11 00:00:00', 30),
(7, 'Shaft', '2018-03-11 00:00:00', '2018-03-11 00:00:00', 30),
(8, 'Groundwater', '2018-03-11 00:00:00', '2018-03-11 00:00:00', 30);

-- --------------------------------------------------------

--
-- Table structure for table `RiskType`
--

CREATE TABLE `RiskType` (
  `risk_id` int(11) NOT NULL,
  `risk_type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(45) DEFAULT NULL,
  `role_description` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`role_id`, `role_name`, `role_description`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator', 'Manages all other roles of the system', NULL, '2017-11-18 10:22:54'),
(8, 'General user', 'General user role', '2017-11-16 15:01:46', '2017-11-16 15:01:46'),
(9, 'Program Manager', 'Manages programs', '2017-11-16 15:08:46', '2017-11-16 15:08:46'),
(10, 'Project Manager', 'Project manager role', '2017-11-18 11:10:23', '2017-11-18 11:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `ScheduleMetric`
--

CREATE TABLE `ScheduleMetric` (
  `schedule_id` int(11) NOT NULL,
  `schedule_rating` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `schedule_description` mediumtext,
  `Project_project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ScheduleMetric`
--

INSERT INTO `ScheduleMetric` (`schedule_id`, `schedule_rating`, `created_at`, `updated_at`, `schedule_description`, `Project_project_id`) VALUES
(1, '1', NULL, NULL, '1 million dollars', 0),
(2, '2', NULL, NULL, '2 million dollars', 0),
(3, '3', NULL, NULL, '3 million dollars', 0),
(4, '4', NULL, NULL, '4 million dollars', 0),
(5, '5', NULL, NULL, '5 million dollars', 0),
(6, '6', NULL, NULL, '6 million dollars', 0),
(7, '1', NULL, NULL, '1 million', 7),
(8, '2', NULL, NULL, '2 million', 7),
(9, '3', NULL, NULL, '3 Months', 7),
(10, '4', NULL, NULL, '4 Months', 7),
(11, '5', NULL, NULL, '5 Months', 7);

-- --------------------------------------------------------

--
-- Table structure for table `Status`
--

CREATE TABLE `Status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Project_project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Status`
--

INSERT INTO `Status` (`status_id`, `status_name`, `created_at`, `updated_at`, `Project_project_id`) VALUES
(1, 'Identified', NULL, NULL, 0),
(2, 'Planning', NULL, NULL, 0),
(3, 'Work in Progress', NULL, NULL, 0),
(4, 'Executed', NULL, NULL, 0),
(5, 'Inactive (dormant)', NULL, NULL, 0),
(6, 'Old/obsolete', NULL, NULL, 0),
(7, 'Super Old', NULL, NULL, 3),
(8, 'Identified', NULL, NULL, 7),
(9, 'Planning', NULL, NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `Subproject`
--

CREATE TABLE `Subproject` (
  `subproject_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `Project_project_id` int(11) NOT NULL,
  `duplicate` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Subproject`
--

INSERT INTO `Subproject` (`subproject_id`, `name`, `description`, `created_at`, `updated_at`, `Project_project_id`, `duplicate`) VALUES
(1, 'Generic project', 'Generic sub-project for BART', '2017-10-08 17:37:47', '2017-10-08 17:37:47', 2, NULL),
(2, 'Unmitigated Initial', 'Unmitigated', '2017-11-18 17:49:31', '2017-11-18 17:49:31', 3, NULL),
(3, 'Updated Mitigated 11_14_17', 'Updated', '2017-11-18 17:53:45', '2017-11-18 17:53:45', 3, NULL),
(4, 'TB Risks', 'Risks', '2017-11-25 20:51:55', '2017-11-25 20:51:55', 4, NULL),
(5, 'SB Risks', 'Risks of SB', '2017-11-25 20:52:21', '2017-11-25 20:52:21', 4, NULL),
(12, 'Twitter', 'Twitter', '2017-12-22 11:35:21', '2017-12-22 11:35:21', 3, 1),
(13, 'Facebook', 'Facebook', '2017-12-22 11:40:01', '2017-12-22 11:40:01', 3, 1),
(14, 'Linkedin', 'Linkedin', '2017-12-22 11:54:14', '2017-12-22 11:54:14', 3, 1),
(15, 'Bot', 'Bot', '2017-12-22 12:01:10', '2017-12-22 12:01:10', 3, 1),
(16, 'Bot2', 'Bot2', '2017-12-22 12:08:22', '2017-12-22 12:08:22', 3, 1),
(17, 'Single Bore Pedestrian Tunnel', 'Risk Register for Single Bore Pedestrian Tunn', '2017-12-22 15:06:37', '2017-12-22 15:06:37', 5, 0),
(25, 'Test 222', 'Test 222', '2017-12-29 19:48:20', '2017-12-29 19:48:20', 3, 1),
(26, 'test 33', 'Test 33', '2017-12-29 20:00:45', '2017-12-29 20:00:45', 3, 1),
(27, 'Test 2018', 'Test 2018', '2017-12-29 20:24:07', '2017-12-29 20:24:07', 3, 1),
(28, 'Initial part 2', 'Initial part 2', '2018-01-02 13:48:22', '2018-01-02 13:48:22', 3, 1),
(29, 'Initial part 2', 'Initial part 2', '2018-01-02 13:48:48', '2018-01-02 13:48:48', 3, 1),
(30, 'Initial 3', 'Initial 3', '2018-01-02 13:55:49', '2018-01-02 13:55:49', 3, 1),
(31, 'Test 44', 'Test 44', '2018-01-06 13:58:06', '2018-01-06 13:58:06', 3, 1),
(32, 'Generic Mitigated SB', 'Complete', '2018-01-26 10:44:03', '2018-01-26 10:44:03', 6, 0),
(33, 'Terminal 1', 'Terminal 1', '2018-01-31 12:46:58', '2018-01-31 12:46:58', 7, 0),
(34, 'TEst 1 duplicate', 'testing it out', '2018-02-02 17:42:55', '2018-02-02 17:42:55', 7, 1),
(35, 'Plan B risk reg', 'Option for single bore', '2018-02-02 21:46:21', '2018-02-02 21:46:21', 7, 1),
(36, 'Terminal 1 MARCH ADDITION', 'This version is for compiling the March chang', '2018-02-12 19:29:42', '2018-02-12 19:29:42', 7, 1),
(37, 'BCSIS Construction Risk Register', 'Risk Register Covering all Construction Risks', '2018-02-22 14:07:41', '2018-02-22 14:07:41', 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Subproject_has_User`
--

CREATE TABLE `Subproject_has_User` (
  `Subproject_subproject_id` int(11) NOT NULL,
  `User_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Subproject_has_User`
--

INSERT INTO `Subproject_has_User` (`Subproject_subproject_id`, `User_user_id`) VALUES
(33, 12),
(33, 13),
(33, 14),
(33, 15),
(37, 15),
(33, 16);

-- --------------------------------------------------------

--
-- Table structure for table `SystemSafety`
--

CREATE TABLE `SystemSafety` (
  `safety_id` int(11) NOT NULL,
  `safety_name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Project_project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SystemSafety`
--

INSERT INTO `SystemSafety` (`safety_id`, `safety_name`, `created_at`, `updated_at`, `Project_project_id`) VALUES
(1, 'S', NULL, NULL, 0),
(2, 'T', NULL, NULL, 0),
(3, 'O', NULL, NULL, 0),
(4, 'P', NULL, NULL, 0),
(5, 'OP', NULL, NULL, 0),
(6, 'ST', NULL, NULL, 0),
(7, 'SO', NULL, NULL, 0),
(8, 'SP', NULL, NULL, 0),
(9, 'SOP', NULL, NULL, 0),
(10, 'TO', NULL, NULL, 0),
(11, 'TP', NULL, NULL, 0),
(12, 'TOP', NULL, NULL, 0),
(13, 'STOP', NULL, NULL, 0),
(14, 'S', NULL, NULL, 7),
(15, 'ST', NULL, NULL, 7),
(16, 'STOP', NULL, NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `TargetRiskLevels`
--

CREATE TABLE `TargetRiskLevels` (
  `id` int(11) NOT NULL,
  `likelihood` int(11) DEFAULT NULL,
  `reputation_impact` int(11) DEFAULT NULL,
  `hs_impact` int(11) DEFAULT NULL,
  `env_impact` int(11) DEFAULT NULL,
  `legal_impact` int(11) DEFAULT NULL,
  `quality_impact` int(11) DEFAULT NULL,
  `risk_rating` int(11) DEFAULT NULL,
  `risk_level` varchar(45) DEFAULT NULL,
  `risk_uuid` varchar(128) DEFAULT NULL,
  `CostMetric_cost_id` int(11) NOT NULL,
  `ScheduleMetric_schedule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `Role_role_id` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `parent_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`user_id`, `first_name`, `last_name`, `password`, `created_at`, `updated_at`, `Role_role_id`, `email`, `username`, `parent_user_id`) VALUES
(1, 'Brian', 'Birir', 'd20257619e05c372e546652e3909400e', '2017-10-08 10:24:49', '2017-11-17 23:00:36', 1, 'brianbirir@gmail.com', 'brianbirir', NULL),
(2, 'John', 'Doe', '69e7ee74eab90b530eb674f647494481', '2017-11-17 23:01:37', '2018-01-22 12:55:42', 8, 'john@gmail.com', 'johndoe', 3),
(3, 'Lee', 'Birir', 'c359072db1f9e878b14174b63d6c7c88', '2017-11-18 17:46:34', '2017-12-16 12:06:43', 9, 'leebirir@gmail.com', 'leebirir', NULL),
(4, 'Bugs', 'Bunny', '5f4dcc3b5aa765d61d8327deb882cf99', '2017-11-19 9:04:28', '2017-11-19 9:04:28', 8, 'bugs@gmail.com', 'bugsbunny', 3),
(5, 'Kim', 'Kim', '5f4dcc3b5aa765d61d8327deb882cf99', '2017-11-21 8:17:36', '2017-11-21 8:17:36', 9, 'kim@gmail.com', 'kim', 1),
(6, 'Jane', 'Maryanne', '5f4dcc3b5aa765d61d8327deb882cf99', '2017-11-25 20:47:24', '2017-11-25 20:47:24', 9, 'maryanne@gmail.com', 'jane', 1),
(7, 'Peter', 'Russo', '5f4dcc3b5aa765d61d8327deb882cf99', '2017-11-25 20:50:02', '2017-11-25 20:50:02', 8, 'peter@gmail.com', 'peter', 6),
(8, 'Bob', 'Aldea', 'ad0aa06317e4b6917ac46525855965f5', '2017-12-22 15:03:30', '2017-12-22 15:04:35', 9, 'bob@mail.com', 'bob', 1),
(9, 'Jeff', 'Myers', '6119800e12712bd87e97bcf3044d9632', '2018-01-31 11:03:59', '2018-01-31 11:04:32', 10, 'jeffmyers@gmail.com', 'jeff', 1),
(10, 'James', 'Brady', '482c811da5d5b4bc6d497ffa98491e38', '2018-02-01 1:32:44', '2018-02-01 1:33:21', 9, 'jbrady@aldeaservices.com', 'jbrady', 1),
(12, 'Mike', 'Nuhfer', '482c811da5d5b4bc6d497ffa98491e38', '2018-02-01 1:42:05', '2018-02-01 1:42:43', 8, 'mnuhfer@aldeaservices.com', 'mnuhfer', 9),
(13, 'James', 'Brady', '5f4dcc3b5aa765d61d8327deb882cf99', '2018-02-02 2:43:17', '2018-02-02 2:43:17', 8, 'jbrady@aldeaservices.com', 'jbrady', 9),
(14, 'Brian', 'Birir', 'e445aebc144167927d253fba69faffa7', '2018-02-02 5:10:48', '2018-02-02 5:11:35', 8, 'breal85@live.com', 'brian', 9),
(15, 'Robert', 'Goodfellow', '482c811da5d5b4bc6d497ffa98491e38', '2018-02-02 13:12:55', '2018-02-02 16:54:58', 8, 'rgodfellow@aldeaservices.com', 'bgood', 9),
(16, 'mike', 'nu', '5f4dcc3b5aa765d61d8327deb882cf99', '2018-02-22 14:29:15', '2018-02-22 14:29:15', 8, 'abs@hou.com', 'mnu', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `CostMetric`
--
ALTER TABLE `CostMetric`
  ADD PRIMARY KEY (`cost_id`),
  ADD UNIQUE KEY `cost_id_UNIQUE` (`cost_id`),
  ADD KEY `fk_CostMetric_Project1_idx` (`Project_project_id`);

--
-- Indexes for table `CurrentRiskLevels`
--
ALTER TABLE `CurrentRiskLevels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_PreRiskLevels_CostMetric1_idx` (`CostMetric_cost_id`),
  ADD KEY `fk_PreRiskLevels_ScheduleMetric1_idx` (`ScheduleMetric_schedule_id`);

--
-- Indexes for table `Entity`
--
ALTER TABLE `Entity`
  ADD PRIMARY KEY (`entity_id`),
  ADD UNIQUE KEY `entity_id_UNIQUE` (`entity_id`),
  ADD KEY `fk_Entity_Project1_idx` (`Project_project_id`);

--
-- Indexes for table `Hazards`
--
ALTER TABLE `Hazards`
  ADD PRIMARY KEY (`hazard_id`),
  ADD UNIQUE KEY `hazard_id_UNIQUE` (`hazard_id`);

--
-- Indexes for table `MaterializationPhase`
--
ALTER TABLE `MaterializationPhase`
  ADD PRIMARY KEY (`materialization_id`),
  ADD UNIQUE KEY `materialization_id_UNIQUE` (`materialization_id`),
  ADD KEY `fk_MaterializationPhase_Project1_idx` (`Project_project_id`);

--
-- Indexes for table `PreRiskLevels`
--
ALTER TABLE `PreRiskLevels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_PreRiskLevels_CostMetric1_idx` (`CostMetric_cost_id`),
  ADD KEY `fk_PreRiskLevels_ScheduleMetric1_idx` (`ScheduleMetric_schedule_id`);

--
-- Indexes for table `Project`
--
ALTER TABLE `Project`
  ADD PRIMARY KEY (`project_id`),
  ADD UNIQUE KEY `project_id_UNIQUE` (`project_id`),
  ADD KEY `fk_Project_User1_idx` (`User_user_id`);

--
-- Indexes for table `Realization`
--
ALTER TABLE `Realization`
  ADD PRIMARY KEY (`realization_id`),
  ADD UNIQUE KEY `realization_id_UNIQUE` (`realization_id`),
  ADD KEY `fk_Realization_Project1_idx` (`Project_project_id`);

--
-- Indexes for table `RegisterCopy`
--
ALTER TABLE `RegisterCopy`
  ADD PRIMARY KEY (`copy_id`),
  ADD UNIQUE KEY `copy_id_UNIQUE` (`copy_id`),
  ADD KEY `fk_RegisterCopy_Subproject1_idx` (`Subproject_subproject_id`);

--
-- Indexes for table `ResponseTitle`
--
ALTER TABLE `ResponseTitle`
  ADD PRIMARY KEY (`response_id`),
  ADD UNIQUE KEY `status_id_UNIQUE` (`response_id`),
  ADD KEY `fk_ResponseTitle_Project1_idx` (`Project_project_id`);

--
-- Indexes for table `RiskCategories`
--
ALTER TABLE `RiskCategories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_id_UNIQUE` (`category_id`),
  ADD KEY `fk_RiskCategories_Project1_idx` (`Project_project_id`);

--
-- Indexes for table `RiskOwner`
--
ALTER TABLE `RiskOwner`
  ADD PRIMARY KEY (`riskowner_id`),
  ADD UNIQUE KEY `riskowner_id_UNIQUE` (`riskowner_id`),
  ADD KEY `fk_RiskOwner_Project1_idx` (`Project_project_id`);

--
-- Indexes for table `RiskRegistry`
--
ALTER TABLE `RiskRegistry`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `item_id_UNIQUE` (`item_id`),
  ADD KEY `fk_RiskRegistry_Status1_idx` (`Status_status_id`),
  ADD KEY `fk_RiskRegistry_SystemSafety1_idx` (`SystemSafety_safety_id`),
  ADD KEY `fk_RiskRegistry_RiskCategories1_idx` (`RiskCategories_category_id`),
  ADD KEY `fk_RiskRegistry_Realization1_idx` (`Realization_realization_id`),
  ADD KEY `fk_RiskRegistry_Subproject1_idx` (`Subproject_subproject_id`),
  ADD KEY `fk_RiskRegistry_User1_idx` (`User_user_id`),
  ADD KEY `fk_RiskRegistry_RiskOwner1_idx` (`RiskOwner_riskowner_id`),
  ADD KEY `fk_RiskRegistry_Entity1_idx` (`Entity_entity_id`),
  ADD KEY `fk_RiskRegistry_materialization_phase1_idx` (`materialization_phase_materialization_id`),
  ADD KEY `fk_RiskRegistry_CostMetric1_idx` (`CostMetric_cost_id`),
  ADD KEY `fk_RiskRegistry_ScheduleMetric1_idx` (`ScheduleMetric_schedule_id`),
  ADD KEY `fk_RiskRegistry_RiskSubCategories1_idx` (`RiskSubCategories_subcategory_id`);

--
-- Indexes for table `RiskResponse`
--
ALTER TABLE `RiskResponse`
  ADD PRIMARY KEY (`response_id`),
  ADD UNIQUE KEY `responde_id_UNIQUE` (`response_id`),
  ADD KEY `fk_RiskResponse_RiskStrategies1_idx` (`RiskStrategies_strategy_id`),
  ADD KEY `fk_RiskResponse_ResponseTitle1_idx` (`ResponseTitle_id`);

--
-- Indexes for table `RiskRevisions`
--
ALTER TABLE `RiskRevisions`
  ADD PRIMARY KEY (`revision_id`),
  ADD UNIQUE KEY `item_id_UNIQUE` (`revision_id`),
  ADD KEY `fk_RiskRegistry_Status1_idx` (`Status_status_id`),
  ADD KEY `fk_RiskRegistry_SystemSafety1_idx` (`SystemSafety_safety_id`),
  ADD KEY `fk_RiskRegistry_RiskCategories1_idx` (`RiskCategories_category_id`),
  ADD KEY `fk_RiskRegistry_Realization1_idx` (`Realization_realization_id`),
  ADD KEY `fk_RiskRegistry_Subproject1_idx` (`Subproject_subproject_id`),
  ADD KEY `fk_RiskRegistry_User1_idx` (`User_user_id`),
  ADD KEY `fk_RiskRegistry_RiskOwner1_idx` (`RiskOwner_riskowner_id`),
  ADD KEY `fk_RiskRevisions_RiskRegistry1_idx` (`item_id`),
  ADD KEY `fk_RiskRevisions_materialization_phase1_idx` (`materialization_phase_materialization_id`),
  ADD KEY `fk_RiskRevisions_Entity1_idx` (`Entity_entity_id`),
  ADD KEY `fk_RiskRevisions_CostMetric1_idx` (`CostMetric_cost_id`),
  ADD KEY `fk_RiskRevisions_ScheduleMetric1_idx` (`ScheduleMetric_schedule_id`);

--
-- Indexes for table `RiskStrategies`
--
ALTER TABLE `RiskStrategies`
  ADD PRIMARY KEY (`strategy_id`),
  ADD UNIQUE KEY `strategy_id_UNIQUE` (`strategy_id`),
  ADD KEY `fk_RiskStrategies_Project1_idx` (`Project_project_id`);

--
-- Indexes for table `RiskSubCategories`
--
ALTER TABLE `RiskSubCategories`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD UNIQUE KEY `subcategory_id_UNIQUE` (`subcategory_id`),
  ADD KEY `fk_RiskSubCategories_RiskCategories1_idx` (`RiskCategories_category_id`);

--
-- Indexes for table `RiskType`
--
ALTER TABLE `RiskType`
  ADD PRIMARY KEY (`risk_id`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_id_UNIQUE` (`role_id`);

--
-- Indexes for table `ScheduleMetric`
--
ALTER TABLE `ScheduleMetric`
  ADD PRIMARY KEY (`schedule_id`),
  ADD UNIQUE KEY `schedule_id_UNIQUE` (`schedule_id`),
  ADD KEY `fk_ScheduleMetric_Project1_idx` (`Project_project_id`);

--
-- Indexes for table `Status`
--
ALTER TABLE `Status`
  ADD PRIMARY KEY (`status_id`),
  ADD UNIQUE KEY `status_id_UNIQUE` (`status_id`),
  ADD KEY `fk_Status_Project1_idx` (`Project_project_id`);

--
-- Indexes for table `Subproject`
--
ALTER TABLE `Subproject`
  ADD PRIMARY KEY (`subproject_id`),
  ADD UNIQUE KEY `subproject_id_UNIQUE` (`subproject_id`),
  ADD KEY `fk_Subproject_Project1_idx` (`Project_project_id`);

--
-- Indexes for table `Subproject_has_User`
--
ALTER TABLE `Subproject_has_User`
  ADD PRIMARY KEY (`Subproject_subproject_id`,`User_user_id`),
  ADD KEY `fk_Subproject_has_User_User1_idx` (`User_user_id`),
  ADD KEY `fk_Subproject_has_User_Subproject1_idx` (`Subproject_subproject_id`);

--
-- Indexes for table `SystemSafety`
--
ALTER TABLE `SystemSafety`
  ADD PRIMARY KEY (`safety_id`),
  ADD UNIQUE KEY `safety_id_UNIQUE` (`safety_id`),
  ADD KEY `fk_SystemSafety_Project1_idx` (`Project_project_id`);

--
-- Indexes for table `TargetRiskLevels`
--
ALTER TABLE `TargetRiskLevels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_PreRiskLevels_CostMetric1_idx` (`CostMetric_cost_id`),
  ADD KEY `fk_PreRiskLevels_ScheduleMetric1_idx` (`ScheduleMetric_schedule_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  ADD KEY `fk_User_Role_idx` (`Role_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CostMetric`
--
ALTER TABLE `CostMetric`
  MODIFY `cost_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `CurrentRiskLevels`
--
ALTER TABLE `CurrentRiskLevels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Entity`
--
ALTER TABLE `Entity`
  MODIFY `entity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Hazards`
--
ALTER TABLE `Hazards`
  MODIFY `hazard_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `MaterializationPhase`
--
ALTER TABLE `MaterializationPhase`
  MODIFY `materialization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `PreRiskLevels`
--
ALTER TABLE `PreRiskLevels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Project`
--
ALTER TABLE `Project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Realization`
--
ALTER TABLE `Realization`
  MODIFY `realization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `RegisterCopy`
--
ALTER TABLE `RegisterCopy`
  MODIFY `copy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ResponseTitle`
--
ALTER TABLE `ResponseTitle`
  MODIFY `response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `RiskCategories`
--
ALTER TABLE `RiskCategories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `RiskOwner`
--
ALTER TABLE `RiskOwner`
  MODIFY `riskowner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `RiskRegistry`
--
ALTER TABLE `RiskRegistry`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;
--
-- AUTO_INCREMENT for table `RiskResponse`
--
ALTER TABLE `RiskResponse`
  MODIFY `response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `RiskRevisions`
--
ALTER TABLE `RiskRevisions`
  MODIFY `revision_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `RiskStrategies`
--
ALTER TABLE `RiskStrategies`
  MODIFY `strategy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `RiskSubCategories`
--
ALTER TABLE `RiskSubCategories`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Role`
--
ALTER TABLE `Role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ScheduleMetric`
--
ALTER TABLE `ScheduleMetric`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `Status`
--
ALTER TABLE `Status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `Subproject`
--
ALTER TABLE `Subproject`
  MODIFY `subproject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `SystemSafety`
--
ALTER TABLE `SystemSafety`
  MODIFY `safety_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `TargetRiskLevels`
--
ALTER TABLE `TargetRiskLevels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `CostMetric`
--
ALTER TABLE `CostMetric`
  ADD CONSTRAINT `fk_CostMetric_Project1` FOREIGN KEY (`Project_project_id`) REFERENCES `Project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `CurrentRiskLevels`
--
ALTER TABLE `CurrentRiskLevels`
  ADD CONSTRAINT `fk_PreRiskLevels_CostMetric11` FOREIGN KEY (`CostMetric_cost_id`) REFERENCES `CostMetric` (`cost_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PreRiskLevels_ScheduleMetric11` FOREIGN KEY (`ScheduleMetric_schedule_id`) REFERENCES `ScheduleMetric` (`schedule_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Entity`
--
ALTER TABLE `Entity`
  ADD CONSTRAINT `fk_Entity_Project1` FOREIGN KEY (`Project_project_id`) REFERENCES `Project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `MaterializationPhase`
--
ALTER TABLE `MaterializationPhase`
  ADD CONSTRAINT `fk_MaterializationPhase_Project1` FOREIGN KEY (`Project_project_id`) REFERENCES `Project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `PreRiskLevels`
--
ALTER TABLE `PreRiskLevels`
  ADD CONSTRAINT `fk_PreRiskLevels_CostMetric1` FOREIGN KEY (`CostMetric_cost_id`) REFERENCES `CostMetric` (`cost_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PreRiskLevels_ScheduleMetric1` FOREIGN KEY (`ScheduleMetric_schedule_id`) REFERENCES `ScheduleMetric` (`schedule_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Project`
--
ALTER TABLE `Project`
  ADD CONSTRAINT `fk_Project_User1` FOREIGN KEY (`User_user_id`) REFERENCES `User` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Realization`
--
ALTER TABLE `Realization`
  ADD CONSTRAINT `fk_Realization_Project1` FOREIGN KEY (`Project_project_id`) REFERENCES `Project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `RegisterCopy`
--
ALTER TABLE `RegisterCopy`
  ADD CONSTRAINT `fk_RegisterCopy_Subproject1` FOREIGN KEY (`Subproject_subproject_id`) REFERENCES `Subproject` (`subproject_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ResponseTitle`
--
ALTER TABLE `ResponseTitle`
  ADD CONSTRAINT `fk_ResponseTitle_Project1` FOREIGN KEY (`Project_project_id`) REFERENCES `Project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `RiskCategories`
--
ALTER TABLE `RiskCategories`
  ADD CONSTRAINT `fk_RiskCategories_Project1` FOREIGN KEY (`Project_project_id`) REFERENCES `Project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `RiskOwner`
--
ALTER TABLE `RiskOwner`
  ADD CONSTRAINT `fk_RiskOwner_Project1` FOREIGN KEY (`Project_project_id`) REFERENCES `Project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `RiskRegistry`
--
ALTER TABLE `RiskRegistry`
  ADD CONSTRAINT `fk_RiskRegistry_CostMetric1` FOREIGN KEY (`CostMetric_cost_id`) REFERENCES `CostMetric` (`cost_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiskRegistry_Entity1` FOREIGN KEY (`Entity_entity_id`) REFERENCES `Entity` (`entity_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiskRegistry_Realization1` FOREIGN KEY (`Realization_realization_id`) REFERENCES `Realization` (`realization_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiskRegistry_RiskCategories1` FOREIGN KEY (`RiskCategories_category_id`) REFERENCES `RiskCategories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiskRegistry_RiskOwner1` FOREIGN KEY (`RiskOwner_riskowner_id`) REFERENCES `RiskOwner` (`riskowner_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiskRegistry_RiskSubCategories1` FOREIGN KEY (`RiskSubCategories_subcategory_id`) REFERENCES `RiskSubCategories` (`subcategory_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiskRegistry_ScheduleMetric1` FOREIGN KEY (`ScheduleMetric_schedule_id`) REFERENCES `ScheduleMetric` (`schedule_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiskRegistry_Status1` FOREIGN KEY (`Status_status_id`) REFERENCES `Status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiskRegistry_Subproject1` FOREIGN KEY (`Subproject_subproject_id`) REFERENCES `Subproject` (`subproject_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiskRegistry_SystemSafety1` FOREIGN KEY (`SystemSafety_safety_id`) REFERENCES `SystemSafety` (`safety_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiskRegistry_User1` FOREIGN KEY (`User_user_id`) REFERENCES `User` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiskRegistry_materialization_phase1` FOREIGN KEY (`materialization_phase_materialization_id`) REFERENCES `MaterializationPhase` (`materialization_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `RiskResponse`
--
ALTER TABLE `RiskResponse`
  ADD CONSTRAINT `fk_RiskResponse_ResponseTitle1` FOREIGN KEY (`ResponseTitle_id`) REFERENCES `ResponseTitle` (`response_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiskResponse_RiskStrategies1` FOREIGN KEY (`RiskStrategies_strategy_id`) REFERENCES `RiskStrategies` (`strategy_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `RiskRevisions`
--
ALTER TABLE `RiskRevisions`
  ADD CONSTRAINT `fk_RiskRegistry_Realization10` FOREIGN KEY (`Realization_realization_id`) REFERENCES `Realization` (`realization_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiskRegistry_RiskCategories10` FOREIGN KEY (`RiskCategories_category_id`) REFERENCES `RiskCategories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiskRegistry_RiskOwner10` FOREIGN KEY (`RiskOwner_riskowner_id`) REFERENCES `RiskOwner` (`riskowner_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiskRegistry_Status10` FOREIGN KEY (`Status_status_id`) REFERENCES `Status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiskRegistry_Subproject10` FOREIGN KEY (`Subproject_subproject_id`) REFERENCES `Subproject` (`subproject_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiskRegistry_SystemSafety10` FOREIGN KEY (`SystemSafety_safety_id`) REFERENCES `SystemSafety` (`safety_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiskRegistry_User10` FOREIGN KEY (`User_user_id`) REFERENCES `User` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiskRevisions_CostMetric1` FOREIGN KEY (`CostMetric_cost_id`) REFERENCES `CostMetric` (`cost_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiskRevisions_Entity1` FOREIGN KEY (`Entity_entity_id`) REFERENCES `Entity` (`entity_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiskRevisions_RiskRegistry1` FOREIGN KEY (`item_id`) REFERENCES `RiskRegistry` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiskRevisions_ScheduleMetric1` FOREIGN KEY (`ScheduleMetric_schedule_id`) REFERENCES `ScheduleMetric` (`schedule_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiskRevisions_materialization_phase1` FOREIGN KEY (`materialization_phase_materialization_id`) REFERENCES `MaterializationPhase` (`materialization_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `RiskStrategies`
--
ALTER TABLE `RiskStrategies`
  ADD CONSTRAINT `fk_RiskStrategies_Project1` FOREIGN KEY (`Project_project_id`) REFERENCES `Project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `RiskSubCategories`
--
ALTER TABLE `RiskSubCategories`
  ADD CONSTRAINT `fk_RiskSubCategories_RiskCategories1` FOREIGN KEY (`RiskCategories_category_id`) REFERENCES `RiskCategories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ScheduleMetric`
--
ALTER TABLE `ScheduleMetric`
  ADD CONSTRAINT `fk_ScheduleMetric_Project1` FOREIGN KEY (`Project_project_id`) REFERENCES `Project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Status`
--
ALTER TABLE `Status`
  ADD CONSTRAINT `fk_Status_Project1` FOREIGN KEY (`Project_project_id`) REFERENCES `Project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Subproject`
--
ALTER TABLE `Subproject`
  ADD CONSTRAINT `fk_Subproject_Project1` FOREIGN KEY (`Project_project_id`) REFERENCES `Project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Subproject_has_User`
--
ALTER TABLE `Subproject_has_User`
  ADD CONSTRAINT `fk_Subproject_has_User_Subproject1` FOREIGN KEY (`Subproject_subproject_id`) REFERENCES `Subproject` (`subproject_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Subproject_has_User_User1` FOREIGN KEY (`User_user_id`) REFERENCES `User` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `SystemSafety`
--
ALTER TABLE `SystemSafety`
  ADD CONSTRAINT `fk_SystemSafety_Project1` FOREIGN KEY (`Project_project_id`) REFERENCES `Project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `TargetRiskLevels`
--
ALTER TABLE `TargetRiskLevels`
  ADD CONSTRAINT `fk_PreRiskLevels_CostMetric10` FOREIGN KEY (`CostMetric_cost_id`) REFERENCES `CostMetric` (`cost_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PreRiskLevels_ScheduleMetric10` FOREIGN KEY (`ScheduleMetric_schedule_id`) REFERENCES `ScheduleMetric` (`schedule_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `fk_User_Role` FOREIGN KEY (`Role_role_id`) REFERENCES `Role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
