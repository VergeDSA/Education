-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: library
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (1,'Сергій','Давидов','2016-12-10 09:56:00',NULL),(2,'Артем','Д\'яченко','2016-12-10 16:56:56',NULL),(3,'Ілля','Морква','2016-12-10 16:56:56',NULL),(4,'Сергій','Кондрашенко','2016-12-10 16:56:56',NULL),(5,'Вадім','Малец','2016-12-10 16:56:56',NULL),(6,'Сергій','Губський','2016-12-10 16:56:56',NULL),(7,'Володимир','Кописов','2016-12-10 16:56:56',NULL),(8,'Олександр','Брічак','2016-12-10 16:56:56',NULL),(9,'Олександр','Павленко','2016-12-10 16:56:56',NULL),(10,'Кристиан','Уэнц','2016-12-10 22:47:40',NULL),(11,'Ларри','Ульман','2016-12-10 22:52:10',NULL),(12,'Дэвид','Скляр','2016-12-10 22:55:29',NULL),(13,'Адам','Трахтенберг','2016-12-10 22:55:29',NULL),(14,'Дмитрий','Котеров','2016-12-10 22:58:55',NULL),(15,'Алексей','Костарев','2016-12-10 22:58:55',NULL),(16,'Игорь','Симдянов','2016-12-10 23:02:17',NULL);
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authors_books`
--

DROP TABLE IF EXISTS `authors_books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authors_books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_authors_books_1_idx` (`author_id`),
  KEY `fk_authors_books_2_idx` (`book_id`),
  CONSTRAINT `fk_authors_books_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_authors_books_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors_books`
--

LOCK TABLES `authors_books` WRITE;
/*!40000 ALTER TABLE `authors_books` DISABLE KEYS */;
INSERT INTO `authors_books` VALUES (1,10,1,'2016-12-10 22:49:01',NULL),(2,11,2,'2016-12-10 22:52:27',NULL),(3,12,3,'2016-12-10 22:55:55',NULL),(4,13,3,'2016-12-10 22:55:55',NULL),(5,14,4,'2016-12-10 23:03:02',NULL),(6,15,4,'2016-12-10 23:03:02',NULL),(7,14,5,'2016-12-10 23:03:02',NULL),(8,16,5,'2016-12-10 23:03:02',NULL);
/*!40000 ALTER TABLE `authors_books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `number_of_pages` smallint(6) NOT NULL,
  `year` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'PHP и MySQL. Карманный справочник',256,2015,'2016-12-10 22:48:33',NULL),(2,'PHP и MySQL. Cоздание интернет-магазинов',544,2015,'2016-12-10 22:51:35',NULL),(3,'PHP. Рецепты программирования',784,2015,'2016-12-10 22:54:39',NULL),(4,'PHP 5',1104,2016,'2016-12-10 22:59:39',NULL),(5,'PHP 7',1088,2016,'2016-12-10 23:01:18',NULL);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books_in_categories`
--

DROP TABLE IF EXISTS `books_in_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books_in_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_books_in_categories_2_idx` (`category_id`),
  KEY `fk_books_in_categories_1_idx` (`book_id`),
  CONSTRAINT `fk_books_in_categories_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_books_in_categories_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books_in_categories`
--

LOCK TABLES `books_in_categories` WRITE;
/*!40000 ALTER TABLE `books_in_categories` DISABLE KEYS */;
INSERT INTO `books_in_categories` VALUES (1,1,1,'2016-12-11 04:36:43',NULL),(2,2,1,'2016-12-11 04:36:43',NULL),(3,3,1,'2016-12-11 04:36:43',NULL),(4,4,1,'2016-12-11 04:36:43',NULL),(5,5,1,'2016-12-11 04:36:43',NULL);
/*!40000 ALTER TABLE `books_in_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_category_UNIQUE` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Программирование','2016-12-11 04:35:58',NULL),(2,'Магия','2016-12-11 04:35:58',NULL),(3,'Вселенная и космос','2016-12-11 04:35:58',NULL),(4,'Физика','2016-12-11 04:35:58',NULL),(5,'Информационные войны','2016-12-11 04:35:58',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `readers`
--

DROP TABLE IF EXISTS `readers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `readers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `readers`
--

LOCK TABLES `readers` WRITE;
/*!40000 ALTER TABLE `readers` DISABLE KEYS */;
/*!40000 ALTER TABLE `readers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `readers_comments_books`
--

DROP TABLE IF EXISTS `readers_comments_books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `readers_comments_books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(45) NOT NULL,
  `reader_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_readers_comments_books_1_idx` (`reader_id`),
  KEY `fk_readers_comments_books_2_idx` (`book_id`),
  CONSTRAINT `fk_readers_comments_books_1` FOREIGN KEY (`reader_id`) REFERENCES `readers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_readers_comments_books_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `readers_comments_books`
--

LOCK TABLES `readers_comments_books` WRITE;
/*!40000 ALTER TABLE `readers_comments_books` DISABLE KEYS */;
/*!40000 ALTER TABLE `readers_comments_books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription_readers_authors`
--

DROP TABLE IF EXISTS `subscription_readers_authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription_readers_authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reader_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subscription_readers_authors_2_idx` (`author_id`),
  KEY `fk_subscription_readers_authors_1_idx` (`reader_id`),
  CONSTRAINT `fk_subscription_readers_authors_1` FOREIGN KEY (`reader_id`) REFERENCES `readers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_subscription_readers_authors_2` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_readers_authors`
--

LOCK TABLES `subscription_readers_authors` WRITE;
/*!40000 ALTER TABLE `subscription_readers_authors` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscription_readers_authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription_readers_categories`
--

DROP TABLE IF EXISTS `subscription_readers_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription_readers_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reader_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subscription_readers_categories_1_idx` (`reader_id`),
  KEY `fk_subscription_readers_categories_2_idx` (`category_id`),
  CONSTRAINT `fk_subscription_category_1` FOREIGN KEY (`reader_id`) REFERENCES `readers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_subscription_category_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_readers_categories`
--

LOCK TABLES `subscription_readers_categories` WRITE;
/*!40000 ALTER TABLE `subscription_readers_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscription_readers_categories` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-12 13:47:14
