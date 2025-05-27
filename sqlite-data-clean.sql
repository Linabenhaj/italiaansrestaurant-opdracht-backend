-- MySQL dump 10.13  Distrib 8.0.42, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: italiaansrestaurant
-- ------------------------------------------------------
-- Server version	8.0.42-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `cache`
--

/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;

--
-- Dumping data for table `cache_locks`
--

/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;

--
-- Dumping data for table `contact_messages`
--

/*!40000 ALTER TABLE `contact_messages` DISABLE KEYS */;
INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES (6,'lina benhaj','r0887140@student.thomasmore.be','Reservatie om 18u mogelijk?','2025-05-25 17:56:26','2025-05-25 17:56:26');
/*!40000 ALTER TABLE `contact_messages` ENABLE KEYS */;

--
-- Dumping data for table `failed_jobs`
--

/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

--
-- Dumping data for table `faq_categories`
--

/*!40000 ALTER TABLE `faq_categories` DISABLE KEYS */;
INSERT INTO `faq_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES (1,'Hoe bestellen','2025-05-25 12:03:15','2025-05-25 12:03:15'),(2,'Betaling & factuur','2025-05-25 12:03:15','2025-05-25 12:03:15'),(4,'Account & registratie','2025-05-25 12:03:15','2025-05-25 12:03:15'),(5,'Contact','2025-05-25 12:03:15','2025-05-25 12:03:15'),(9,'Bezorging','2025-05-25 18:22:10','2025-05-25 18:22:10');
/*!40000 ALTER TABLE `faq_categories` ENABLE KEYS */;

--
-- Dumping data for table `faq_items`
--

/*!40000 ALTER TABLE `faq_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `faq_items` ENABLE KEYS */;

--
-- Dumping data for table `faqs`
--

/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` (`id`, `faq_category_id`, `question`, `answer`, `created_at`, `updated_at`) VALUES (1,5,'Hoe contact op te nemen met ons?','U kunt ons opbellen via +32268759487 of ons bereiken op admin@ehb.be','2025-05-25 12:04:52','2025-05-25 12:04:52'),(2,1,'Kan ik thuis laten bezorgen?','ja!','2025-05-25 12:05:22','2025-05-25 15:02:17');
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;

--
-- Dumping data for table `job_batches`
--

/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;

--
-- Dumping data for table `jobs`
--

/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

--
-- Dumping data for table `news_items`
--

/*!40000 ALTER TABLE `news_items` DISABLE KEYS */;
INSERT INTO `news_items` (`id`, `title`, `image_path`, `content`, `published_at`, `created_at`, `updated_at`) VALUES (1,'1+1 gratis!','news/wO71Iq649Uly1CFuWuBelFJREw1HZ3HDtEwOlijX.jpg','test1','2025-05-22 22:00:00','2025-05-25 12:03:15','2025-05-25 13:16:43'),(2,'Ontstaan van pizzeria antonio','news/lrTqSyJvRXczgbfBvFdxpbpyLYv8flMz4jrlJeWZ.png','test 2','2025-05-23 22:00:00','2025-05-25 12:03:15','2025-05-25 13:17:12'),(3,'Eerste demo-item','news/demo1.jpg','Dit is de inhoud van het eerste demo-nieuwsitem.','2025-05-23 19:00:44','2025-05-25 19:00:44','2025-05-25 19:00:44'),(4,'Tweede demo-item','news/demo2.jpg','Dit is de inhoud van het tweede demo-nieuwsitem.','2025-05-24 19:00:44','2025-05-25 19:00:44','2025-05-25 19:00:44'),(5,'Lol','news/r45g5gnaeTd0XWvUhUjcjvktp6zpMZbUWfFvv1ih.webp',',nezkdnjkn','2025-05-24 22:00:00','2025-05-25 19:52:46','2025-05-25 19:52:46');
/*!40000 ALTER TABLE `news_items` ENABLE KEYS */;

--
-- Dumping data for table `orders`
--

/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

--
-- Dumping data for table `password_reset_tokens`
--

/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES ('Benhaj.L@outlook.com','$2y$12$EOC3SvtmJDShBMrGZCcnleACRbx8Z4n2/ePzHRdf2jkrD10KtotxG','2025-05-26 11:00:18');
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

--
-- Dumping data for table `sessions`
--

/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `user_type`, `role`, `birthday`, `about`, `profile_picture`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES (1,'Admin Gebruiker','admin','admin@ehb.be',NULL,'$2y$12$0rzXrQ3k45Y/agpiEj3RaeZXa0OtpvCQ/rBKEdlAtc/bsZlf9vNcS','user','user',NULL,NULL,NULL,1,NULL,'2025-05-25 12:03:15','2025-05-25 19:20:50'),(2,'lina benhaj','Lina','Benhaj.L@outlook.com',NULL,'$2y$12$55DQM4jzd130GWYC7L.20Oed94WhtYxkjuHNwApalNDD86eG9Z7HW','user','user','2025-05-19','ik ben tof!','profiles/JPodSaao4NRI4O38JPw7hA00Nk4bRG5MKnScvBFN.jpg',0,NULL,'2025-05-25 15:40:57','2025-05-26 10:45:39');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-26 15:13:54
