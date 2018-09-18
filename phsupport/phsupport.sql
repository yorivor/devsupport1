-- MySQL dump 10.14  Distrib 5.5.52-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: phsupport
-- ------------------------------------------------------
-- Server version	5.5.52-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `article_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_banner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_date` date NOT NULL,
  `article_creator` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_active` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`article_id`),
  UNIQUE KEY `article_article_id_unique` (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (1,'','Test Downtime Advisory','2017-05-23','Dennis Bacea','<p>Test Downtime Advisory Article</p>','Downtime Advisory','','2017-05-23 02:53:09','2017-05-23 02:53:09'),(2,'','Test Outage Announcement','2017-05-23','Dennis Bacea','<p>Step 1: Test<br /><br />Step 2: Test<br /><br />Step 3: Test<br /><br />Step 4: Test</p>','Outage','Active','2017-05-23 02:54:20','2017-05-23 02:54:20');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `knowledge_article`
--

DROP TABLE IF EXISTS `knowledge_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `knowledge_article` (
  `knowledge_article_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `knowledge_category_id` int(11) NOT NULL,
  `sub_knowledge_category_id` int(11) NOT NULL,
  `knowledge_article_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `knowledge_article_date` date NOT NULL,
  `knowledge_article_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`knowledge_article_id`),
  UNIQUE KEY `knowledge_article_knowledge_article_id_unique` (`knowledge_article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `knowledge_article`
--

LOCK TABLES `knowledge_article` WRITE;
/*!40000 ALTER TABLE `knowledge_article` DISABLE KEYS */;
/*!40000 ALTER TABLE `knowledge_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `knowledge_category`
--

DROP TABLE IF EXISTS `knowledge_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `knowledge_category` (
  `knowledge_category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`knowledge_category_id`),
  UNIQUE KEY `knowledge_category_knowledge_category_id_unique` (`knowledge_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `knowledge_category`
--

LOCK TABLES `knowledge_category` WRITE;
/*!40000 ALTER TABLE `knowledge_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `knowledge_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id_logs` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_logs`),
  UNIQUE KEY `logs_id_logs_unique` (`id_logs`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,'Admin Created new account','2017-05-23 01:38:12','2017-05-23 01:38:12'),(2,'Admin Created new account','2017-05-23 01:39:55','2017-05-23 01:39:55'),(3,'Admin Delete account user id: 3','2017-05-23 01:52:12','2017-05-23 01:52:12'),(4,'Admin Created new account','2017-05-23 01:52:47','2017-05-23 01:52:47'),(5,'Admin Created new account','2017-05-23 02:07:07','2017-05-23 02:07:07'),(6,'Admin Created new account','2017-05-23 02:18:28','2017-05-23 02:18:28'),(7,'Dennis Bacea Created new Downtime Advisory','2017-05-23 02:53:09','2017-05-23 02:53:09'),(8,'Dennis Bacea Created new outage','2017-05-23 02:54:20','2017-05-23 02:54:20'),(9,'Richard Catibog Change password of account user id: 5','2017-05-23 23:50:44','2017-05-23 23:50:44'),(10,'Admin Update Who we are','2017-06-02 01:45:30','2017-06-02 01:45:30');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_05_11_094504_add_position_to_users',2),(6,'2017_05_12_095930_create_logs_table',3),(7,'2017_05_15_043605_create_article_table',4),(8,'2017_05_16_032059_add_paid_to_users',5),(9,'2017_05_17_035010_add_article_type_to_article',6),(10,'2017_05_17_035536_add_article_active_to_article',7),(11,'2017_05_22_091449_create_whoweare_table',8),(12,'2017_05_22_101113_create_whatwevalue_table',9),(13,'2017_05_23_035210_create_ourbrand_tabl',10),(14,'2017_05_23_040058_create_ourmission_table',11),(15,'2017_05_23_040853_create_ourvision_table',12),(16,'2017_05_26_044259_create_knowledge_category_table',13),(17,'2017_05_26_080625_create_sub_knowledge_category_table',13),(18,'2017_05_30_065056_create_knowledge_article_table',13);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ourbrand`
--

DROP TABLE IF EXISTS `ourbrand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ourbrand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ourbrand_id_unique` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ourbrand`
--

LOCK TABLES `ourbrand` WRITE;
/*!40000 ALTER TABLE `ourbrand` DISABLE KEYS */;
INSERT INTO `ourbrand` VALUES (1,'<h3><span style=\"color: #000000;\"><strong><span style=\"font-family: arial, helvetica, sans-serif;\">OUR BRAND</span></strong></span></h3>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif; color: #000000;\">51Talk (pronounced as FIVE-ONE-TALK) can be translated as &ldquo;I want to talk&rdquo;in Chinese. In Chinese, five is pronounced similarly to the word &ldquo;I&rdquo; and one is homophonous with the word &ldquo;want.&rdquo; That being said, it is one of our goals to ensure that our students have optimal &ldquo;talk-time&rdquo; during their lessons. It also sums up the students&rsquo; aspiration to master the English language.</span></p>','2017-05-22 20:00:17','2017-05-22 21:34:34');
/*!40000 ALTER TABLE `ourbrand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ourmission`
--

DROP TABLE IF EXISTS `ourmission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ourmission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ourmission_id_unique` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ourmission`
--

LOCK TABLES `ourmission` WRITE;
/*!40000 ALTER TABLE `ourmission` DISABLE KEYS */;
INSERT INTO `ourmission` VALUES (1,'<h3><span style=\"color: #000000;\"><strong><span style=\"font-family: arial, helvetica, sans-serif;\">OUR MISSION</span></strong></span></h3>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif; color: #000000;\">To deliver the best online English teaching service to our clients.</span></p>','2017-05-22 20:06:28','2017-05-22 23:42:49');
/*!40000 ALTER TABLE `ourmission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ourvision`
--

DROP TABLE IF EXISTS `ourvision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ourvision` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ourvision_id_unique` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ourvision`
--

LOCK TABLES `ourvision` WRITE;
/*!40000 ALTER TABLE `ourvision` DISABLE KEYS */;
INSERT INTO `ourvision` VALUES (1,'<h3><strong><span style=\"color: #000000; font-family: arial, helvetica, sans-serif;\">OUR VISION</span></strong></h3>\r\n<p><span style=\"color: #000000; font-family: arial, helvetica, sans-serif;\">To be recognized as the best and largest professional online English school in China and the leading online English company in the Philippines.</span></p>','2017-05-22 20:19:27','2017-05-22 23:43:13');
/*!40000 ALTER TABLE `ourvision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_knowledge_category`
--

DROP TABLE IF EXISTS `sub_knowledge_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_knowledge_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `knowledge_category_id` int(11) NOT NULL,
  `sub_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sub_knowledge_category_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_knowledge_category`
--

LOCK TABLES `sub_knowledge_category` WRITE;
/*!40000 ALTER TABLE `sub_knowledge_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_knowledge_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `position` enum('Super Admin','Admin','User') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@admin.com','$2y$10$xk.VgWMnYPGJI1/UTa2cU.5CgDwfOmCPy9ZTFf9KPf.xF1yGFO5Ge','pC1t01BIfNdY9FA9pu4wwhPDrArrvnCKLYSNy7WX3fDJyHgI4vuOYh3cy08R','2017-05-10 13:05:11','2017-05-10 13:05:11','Super Admin'),(2,'Dennis Bacea','dennis.bacea@51talk.com','$2y$10$wTd/QPp0XGdTdovV920fpuy6wVfpF9hWdwiBv4Rm9Xzb8PnKazFy2',NULL,'2017-05-23 01:38:12','2017-05-23 01:38:12','User'),(4,'Noel Clemente','noel@51talk.com','$2y$10$Y1R6xvIfLWZjmVGR.rHY6u03lv8y2Mbl9R9wF03DX9e/uyku43vxS',NULL,'2017-05-23 01:52:47','2017-05-23 01:52:47','User'),(5,'Richard Catibog','richard.catibog@51talk.com','$2y$10$D3gVdez1ds/L8PZ8BJUP7u1y/9DnLj7kZ5McwYjPvKN01t6f6VKcm',NULL,'2017-05-23 02:07:07','2017-05-23 23:50:44','Super Admin'),(6,'Paul Martinez','paul.martinez@51talk.com','$2y$10$yVnOq3mUQOtxyCl7ayFDUOOtN1EtUvD4g6H5pjJnNvap1IYSh9Zoa',NULL,'2017-05-23 02:18:28','2017-05-23 02:18:28','Super Admin');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `whatwevalue`
--

DROP TABLE IF EXISTS `whatwevalue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `whatwevalue` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `whatwevalue_id_unique` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `whatwevalue`
--

LOCK TABLES `whatwevalue` WRITE;
/*!40000 ALTER TABLE `whatwevalue` DISABLE KEYS */;
INSERT INTO `whatwevalue` VALUES (1,'<div id=\"Content\">\r\n<div id=\"Translation\">\r\n<h3><span style=\"color: #000000;\"><strong><span style=\"font-family: arial, helvetica, sans-serif;\">WHAT WE VALUE</span></strong></span></h3>\r\n<p><span style=\"color: #000000;\"><strong>PASSION</strong> &ndash; We believe in the importance of living and working with enthusiasm.</span></p>\r\n<p><span style=\"color: #000000;\"><strong>CUSTOMER FOCUS</strong> &ndash; We help our clients achieve their goals and we conduct business with utmost fairness and integrity. We consistently strive for customer satisfaction in our dealings with our industrial and academic partners.</span></p>\r\n<p><span style=\"color: #000000;\"><strong>GAME CHANGER</strong> &ndash; As a fast-growing company, we welcome change with a positive attitude.</span></p>\r\n<p><span style=\"color: #000000;\"><strong>CAMARADERIE</strong> &ndash; We practice mutual trust and friendship with everyone.</span></p>\r\n</div>\r\n</div>','2017-05-22 19:31:26','2017-05-22 20:59:04');
/*!40000 ALTER TABLE `whatwevalue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `whoweare`
--

DROP TABLE IF EXISTS `whoweare`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `whoweare` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `whoweare_id_unique` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `whoweare`
--

LOCK TABLES `whoweare` WRITE;
/*!40000 ALTER TABLE `whoweare` DISABLE KEYS */;
INSERT INTO `whoweare` VALUES (1,'<h3><span style=\"font-family: arial, helvetica, sans-serif; color: #000000;\"><strong>WHO WE ARE</strong></span></h3>\r\n<p><span style=\"color: #000000; font-size: 12pt; font-family: arial, helvetica, sans-serif;\">51Talk is the fastest growing online English Language Teaching (ELT) platform in China and the Philippines. 51Talk was established in China in 2011. Since 2012, it has been operating in the Philippines, creating thousands of jobs for home-based teachers. These teachers work from various parts of the Philippines.</span></p>','2017-05-22 19:16:28','2017-06-02 01:45:30');
/*!40000 ALTER TABLE `whoweare` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-05 15:41:59
