-- MySQL dump 10.13  Distrib 5.7.12, for Linux (x86_64)
--
-- Host: localhost    Database: forum_db
-- ------------------------------------------------------
-- Server version	5.7.12-0ubuntu1

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,16,'whjdk lkjsdlajd akljlaskjdklasd lsjdla ksjdlasjdakljdk lk',9,1,'2016-06-12 18:18:44','2016-06-12 18:18:44'),(2,16,'another comment',9,1,'2016-06-12 18:27:43','2016-06-12 18:27:43'),(3,16,'another comment',9,1,'2016-06-12 18:28:14','2016-06-12 18:28:14'),(4,16,'another comment',9,1,'2016-06-12 18:30:41','2016-06-12 18:30:41'),(5,16,'another comment',9,1,'2016-06-12 18:31:12','2016-06-12 18:31:12'),(6,16,'another comment',9,1,'2016-06-12 18:31:45','2016-06-12 18:31:45');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2016_06_05_171142_create_users_table',1),('2016_06_05_172802_create_users_table',2),('2016_06_06_042116_add_role_to_users',3),('2016_06_06_063128_create_profiles_table',4),('2016_06_07_040448_create_questions_table',5),('2016_06_08_064948_create_comments_table',6),('2016_06_09_073629_add_columns_to_questions',6),('2016_06_11_231631_add_active_to_users',7),('2016_06_12_014840_create_comments_table',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL DEFAULT '0',
  `profile_pic` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'avatar.jpg',
  `about` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `education` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profiles_userid_foreign` (`userid`),
  CONSTRAINT `profiles_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (3,9,'9.jpeg','ADSAD','Web Developer','Masters in Computer Science','2016-06-08 11:19:36','2016-06-12 03:28:48'),(4,10,'avatar.jpg','','','','2016-06-08 11:24:39','2016-06-08 11:24:39'),(5,11,'11.jpeg','adsfsdf','Web Developer','Masters','2016-06-08 11:27:08','2016-06-09 10:49:44'),(6,12,'avatar.jpg','','','','2016-06-09 11:26:42','2016-06-09 11:26:42'),(7,13,'avatar.jpg','','','','2016-06-09 11:32:05','2016-06-09 11:32:05'),(8,14,'avatar.jpg','','','','2016-06-09 11:33:54','2016-06-09 11:33:54'),(9,15,'avatar.jpg','','','','2016-06-10 09:19:07','2016-06-10 09:19:07'),(10,16,'avatar.jpg','','','','2016-06-10 09:20:13','2016-06-10 09:20:13'),(11,17,'avatar.jpg','','','','2016-06-10 09:21:50','2016-06-10 09:21:50'),(12,18,'avatar.jpg','','','','2016-06-10 09:23:03','2016-06-10 09:23:03'),(13,19,'avatar.jpg','','','','2016-06-10 09:24:05','2016-06-10 09:24:05');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `enabled` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (12,'Praesent lobortis dolor orci, vitae fermentum augue posuere non. Duis sit amet tortor quis nunc ultrices eleifend ac eget erat. Cras commodo neque eleifend felis tempor tristique.',9,'2016-06-08 13:09:35','2016-06-08 13:09:35',1),(13,'Praesent lobortis dolor orci, vitae fermentum augue posuere non. Duis sit amet tortor quis nunc ultrices eleifend ac eget erat. Cras commodo neque eleifend felis tempor tristique.',9,'2016-06-08 13:09:39','2016-06-08 13:09:39',1),(14,'Praesent lobortis dolor orci, vitae fermentum augue posuere non. Duis sit amet tortor quis nunc ultrices eleifend ac eget erat. Cras commodo neque eleifend felis tempor tristique.',9,'2016-06-08 13:09:45','2016-06-08 13:09:45',1),(15,'Praesent lobortis dolor orci, vitae fermentum augue posuere non. Duis sit amet tortor quis nunc ultrices eleifend ac eget erat. Cras commodo neque eleifend felis tempor tristique.Praesent lobortis dolor orci, vitae fermentum augue posuere non. Duis sit amet tortor quis nunc ultrices eleifend ac eget erat. Cras commodo neque eleifend felis tempor tristique.',9,'2016-06-08 13:09:55','2016-06-12 06:46:04',0),(16,'Enim morbi nunc, suspendisse condimentum neque in massa est eros. Nunc sodales nulla ut ornare eget lacus, commodo sit, egestas sed magna mauris quia etiam, eget sapien nonummy, erat tristique. Sed vestibulum mauris porttitor id justo, habitasse in, convallis morbi eu lectus nisi, enim ne',9,'2016-06-08 13:11:00','2016-06-08 13:11:00',1),(17,'Enim morbi nunc, suspendisse condimentum neque in massa est eros. Nunc sodales nulla ut ornare eget lacus, commodo sit, egestas sed magna mauris quia etiam, eget sapien nonummy, erat tristique. Sed vestibulum mauris porttitor id justo, habitasse in, convallis morbi eu lectus nisi, enim ne',9,'2016-06-08 13:11:03','2016-06-12 06:45:51',0),(18,'Enim morbi nunc, suspendisse condimentum neque in massa est eros. Nunc sodales nulla ut ornare eget lacus, commodo sit, egestas sed magna mauris quia etiam, eget sapien nonummy, erat tristique. Sed vestibulum mauris porttitor id justo, habitasse in, convallis morbi eu lectus nisi, enim ne',9,'2016-06-08 13:11:08','2016-06-12 06:45:33',0),(19,'asdas',9,'2016-06-09 08:14:14','2016-06-09 08:14:14',0);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` enum('user','admin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (9,'Shailesh Singh','1000 N 4th street, Fairfield, IOWA1','6412338960','shailesh.singh1@outlook.com','$2y$10$dPB5bkzDexok7vHGmaiOZOCRNNdvL5EBDHZoGk5xG/UZKvJFZ1u/y','2016-06-08 11:19:35','2016-06-12 20:27:53','Cr9PpqjhfJsZlSmccIOed72kVa66RixVzzVJlEsqC2u56ft9ry5abvahThgL','admin',1),(10,'Raj Singh','1000 N 4th street, Fairfield, IOWA','9847299052','raj.singh822014@gmail.com','$2y$10$./e4BDMZZ.1iG35kHZhLVe3/kELSTrEIqq0cMoCuJq55G8zse8kH6','2016-06-08 11:24:39','2016-06-08 11:24:39',NULL,'user',1),(11,'Shailesh Singh','1000 N 4th street, Fairfield, IOWA','949659696','raj@gmail.com','$2y$10$oAW2RuGNXop30.KUnuNG9.L/kApk.W050FHQBYkVo/NfM.ET1b9Ne','2016-06-08 11:27:08','2016-06-12 04:42:32','Ih6gd6BQOcUUncj1YdxipRLuCZIIUzBpX9JEdtE42tL7AN3MpcwxLR48ftAv','admin',0),(12,'das desis','1000 N 4th street','444444444','rr@g.com','$2y$10$9rDO0jjsuYaLObeFwLHfleOeCC.p6L4kFaTJcHOtpAtYYLDGcnHWq','2016-06-09 11:26:42','2016-06-12 06:04:32',NULL,'admin',1),(13,'dfsdf  dsgfdg ','1234324 fdghfgfhf','555555555555','a@g.c','$2y$10$I82LZYBx83xwtEyQnRsk/uAvdFxdGlKdSqQ3lpoUtFDbZYDACl21a','2016-06-09 11:32:05','2016-06-12 04:42:12',NULL,'user',0),(14,'df','dfgdf','dfgddfg','rr@gmail.com','$2y$10$2jgP52NrZG05/IBfibJF/OxrVAvXoqy7H.eEJ35bNwbgrGvtmOnmq','2016-06-09 11:33:54','2016-06-12 04:35:01',NULL,'user',0),(15,'Abhisek Basukala','1000 N 4th street, Fairfield, IOWA','344556778','abhisek@gmail.com','$2y$10$n7VHTYge9RRaVTxg7n3ozO38QZBDi9agqDw.I3hbDh7mdfrgBLdA.','2016-06-10 09:19:07','2016-06-10 09:19:07',NULL,'user',1),(16,'Sandip Dulal','1000 N 4th street, Chicago, California','33333444444','sandip@gmail.com','$2y$10$CNZzz6Z3yAlQvUKH.d/Zf.V1T/Gb2AIma/2z6FE1waBcUa9QW6FK2','2016-06-10 09:20:13','2016-06-10 09:20:13',NULL,'user',1),(17,'Renu Singh','1000 N 4th street','2342323232','renu@gmail.com','$2y$10$/VOBxvG1tMddM6pF5uzH4O9cdfzJleiCWBFroGl/Ij3fEEdg2THEW','2016-06-10 09:21:50','2016-06-12 04:42:16',NULL,'admin',1),(18,'Govinda Basnet','1000 N 4th street, New York, NY','4564564456','govinda@gmail.com','$2y$10$mx1yOkqw85O6/udBQlDe4uaAUoK/mzqGOiB/MiK5.6Vgn.7LXVj/S','2016-06-10 09:23:03','2016-06-12 04:42:26',NULL,'user',0),(19,'Raju Neupane','1000 N 4th street, ottumwa, IOWA','45445454545','raju@gmail.com','$2y$10$JI9VEfLkjTmSDLNOwiLZMe65.61frVdq/vRNBs8Gxc8FFAZppGDOK','2016-06-10 09:24:05','2016-06-12 06:05:15',NULL,'admin',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-12 10:36:49
