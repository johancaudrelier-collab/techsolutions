-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: techsolutions
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `components`
--

DROP TABLE IF EXISTS `components`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `components` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `components`
--

LOCK TABLES `components` WRITE;
/*!40000 ALTER TABLE `components` DISABLE KEYS */;
INSERT INTO `components` VALUES (1,'Intel Core Ultra 9 285K (3.7 GHz / 5.7 GHz)','Intel Core Ultra 9 285K (3.7 GHz / 5.7 GHz)'),(2,'Corsair?5000D?Airflow\n','Corsair?5000D?Airflow\n'),(3,'Gigabyte GeForce RTX 5070 WINDFORCE OC SFF 12G\n','Gigabyte GeForce RTX 5070 WINDFORCE OC SFF 12G\n'),(4,'Gigabyte Z890 AORUS ELITE WIFI7\n\n','Gigabyte Z890 AORUS ELITE WIFI7\n\n'),(5,'CORSAIR Vengeance RGB DDR5 RAM 64Go (2x32Go)\n','CORSAIR Vengeance RGB DDR5 RAM 64Go (2x32Go)\n'),(6,'Samsung SSD 990 Pro NVMe M.2\n','Samsung SSD 990 Pro NVMe M.2\n'),(7,'Corsair RM1000e (2025)','Corsair RM1000e (2025)'),(8,'Noctua NH-D15\n','Noctua NH-D15\n'),(9,'Logitech MX Vertical','Logitech MX Vertical'),(10,'Logitech G G213 Prodigy Gaming Keyboard\n','Logitech G G213 Prodigy Gaming Keyboard\n'),(11,'\nSamsung 49\" LED - Odyssey G9 S49FG912EU\n','\nSamsung 49\" LED - Odyssey G9 S49FG912EU\n'),(12,'Logitech G Pro X Gaming Headset (Noir)\n','Logitech G Pro X Gaming Headset (Noir)\n'),(13,'Ubuntu LTS 24.04.03','Ubuntu LTS 24.04.03'),(14,'Logitech Brio 100\n','Logitech Brio 100\n'),(15,'Tapis de Souris wiliingood','Tapis de Souris wiliingood'),(16,'Logiciels','Logiciels'),(17,'YubiKey 5 NFC (USB-A) ','YubiKey 5 NFC (USB-A) '),(18,'Fractal Design North XL TG Charcoal Dark\n','Fractal Design North XL TG Charcoal Dark\n'),(19,'AMD Ryzen 7 9700X (3.8 GHz / 5.5 GHz)\n\n','AMD Ryzen 7 9700X (3.8 GHz / 5.5 GHz)\n\n'),(20,'GIGABYTE B850 AORUS Elite WIFI7 Carte M?re - AMD Ryzen 9000 Series\n','GIGABYTE B850 AORUS Elite WIFI7 Carte M?re - AMD Ryzen 9000 Series\n'),(21,'Crucial Pro RAM DDR5 32Go Kit (2x16Go)?\n','Crucial Pro RAM DDR5 32Go Kit (2x16Go)?\n'),(22,'Samsung SSD 990 Pro NVMe M.2\n','Samsung SSD 990 Pro NVMe M.2\n'),(23,'Seagate BarraCuda 2 To (ST2000DM008)\n','Seagate BarraCuda 2 To (ST2000DM008)\n'),(24,'Seagate BarraCuda 2 To (ST2000DM008) ','Seagate BarraCuda 2 To (ST2000DM008) '),(25,'Deep Cool Ventilateur PC Deepcool Ak620\n','Deep Cool Ventilateur PC Deepcool Ak620\n'),(26,'Corsair RM1000e (2025)','Corsair RM1000e (2025)'),(27,'Asus DUAL GeForce RTX 5060 \n','Asus DUAL GeForce RTX 5060 \n'),(28,'Logitech MX Vertical','Logitech MX Vertical'),(29,'Logitech MX Keys S PLUS\n','Logitech MX Keys S PLUS\n'),(30,'Logitech Brio 100 ','Logitech Brio 100 '),(31,'2x Acer Nitro KG272UGbmiipfx\n','2x Acer Nitro KG272UGbmiipfx\n'),(32,'Logitech Zone 300\n','Logitech Zone 300\n'),(33,'Tapis de Souris wiliingood','Tapis de Souris wiliingood'),(34,'Windows 11 pro et Linux VM','Windows 11 pro et Linux VM'),(35,'Logiciels','Logiciels'),(36,'YubiKey 5 NFC (USB-A) ','YubiKey 5 NFC (USB-A) '),(37,'Fractal Design Pop Silent Black TG Clear Tint','Fractal Design Pop Silent Black TG Clear Tint'),(38,'Processeurs Processeur AMD Ryzen 7 9700X 8 c?urs 3,8 GHz Base 5,5 GHz Turbo Radeon Graphiques int?gr','Processeurs Processeur AMD Ryzen 7 9700X 8 c?urs 3,8 GHz Base 5,5 GHz Turbo Radeon Graphiques int?gr?s\n'),(39,'?Gigabyte?X870E Eagle WiFi7?(AMD AM5)\n\n','?Gigabyte?X870E Eagle WiFi7?(AMD AM5)\n\n'),(40,'Kingston FURY Beast Noir RGB 32Go (2x16Go) \n','Kingston FURY Beast Noir RGB 32Go (2x16Go) \n'),(41,'Samsung 990 PRO M.2\n','Samsung 990 PRO M.2\n'),(42,'Seagate BarraCuda 2To\n','Seagate BarraCuda 2To\n'),(43,'Noctua NH-D15 G2\n','Noctua NH-D15 G2\n'),(44,'be quiet! Straight Power 12 ','be quiet! Straight Power 12 '),(45,'ASUS Dual GeForce RTX 5060 OC\n','ASUS Dual GeForce RTX 5060 OC\n'),(46,'Logitech MX Vertical','Logitech MX Vertical'),(47,'Logitech MX Keys S PLUS ','Logitech MX Keys S PLUS '),(48,'Logitech Brio 100 ','Logitech Brio 100 '),(49,'2x ASUS TUF Gaming VG27AQ5A\n','2x ASUS TUF Gaming VG27AQ5A\n'),(50,'Corsair HS65','Corsair HS65'),(51,'Tapis de Souris wiliingood','Tapis de Souris wiliingood'),(52,'Windows 11 pro ','Windows 11 pro '),(53,'Logiciels\n','Logiciels\n'),(54,'YubiKey 5 NFC (USB-A) ','YubiKey 5 NFC (USB-A) '),(55,'NZXT H5 Flow\n','NZXT H5 Flow\n'),(56,'AMD Ryzen 5 8500G\n','AMD Ryzen 5 8500G\n'),(57,'MSI B850 Gaming Plus WiFi?\n','MSI B850 Gaming Plus WiFi?\n'),(58,'Crucial Pro RAM DDR5\n','Crucial Pro RAM DDR5\n'),(59,'Samsung SSD 990 Pro\n','Samsung SSD 990 Pro\n'),(60,'Seagate BarraCuda 4 To ','Seagate BarraCuda 4 To '),(61,'ARCTIC Freezer 36 A-RGB\n','ARCTIC Freezer 36 A-RGB\n'),(62,'CORSAIR RM750e (2025)\n','CORSAIR RM750e (2025)\n'),(63,'MSI GeForce RTX 5060 8G Ventus 2X OC\n\n','MSI GeForce RTX 5060 8G Ventus 2X OC\n\n'),(64,'Logitech MX Vertical\n\n','Logitech MX Vertical\n\n'),(65,'Logitech MX Keys S PLUS ','Logitech MX Keys S PLUS '),(66,'Logitech Brio 300 Webcam Full HD\n','Logitech Brio 300 Webcam Full HD\n'),(67,'2x AOC Gaming Q27G42ZE\n','2x AOC Gaming Q27G42ZE\n'),(68,'Logitech Zone 300 ','Logitech Zone 300 '),(69,'\nXerox Versalink C415DN \n','\nXerox Versalink C415DN \n'),(70,'Tapis de Souris wiliingood','Tapis de Souris wiliingood'),(71,'Windows 11 pro ','Windows 11 pro '),(72,'\nLogiciels','\nLogiciels'),(73,'YubiKey 5 NFC (USB-A) ','YubiKey 5 NFC (USB-A) '),(74,'Corsair 3000D Airflow\n','Corsair 3000D Airflow\n'),(75,'AMD Ryzen 5 8500G?\n','AMD Ryzen 5 8500G?\n'),(76,'MSI X870E?\n','MSI X870E?\n'),(77,'Crucial Pro Overclocking 32GB ','Crucial Pro Overclocking 32GB '),(78,'Samsung SSD 990 Pro?\n','Samsung SSD 990 Pro?\n'),(79,'Seagate BarraCuda\n','Seagate BarraCuda\n'),(80,'Noctua NH-D15 Chromax Black\n','Noctua NH-D15 Chromax Black\n'),(81,'Corsair RM650e (2025)\n','Corsair RM650e (2025)\n'),(82,'Logitech MX Vertical\n','Logitech MX Vertical\n'),(83,'Logitech MX Keys S PLUS','Logitech MX Keys S PLUS'),(84,'Logitech Brio 300 Webcam Full HD ','Logitech Brio 300 Webcam Full HD '),(85,'2x MSI MAG 274QF X24\n','2x MSI MAG 274QF X24\n'),(86,'Logitech Zone 300 Bluetooth sans fil?\n','Logitech Zone 300 Bluetooth sans fil?\n'),(87,'Brother MFC-L9670CDN\n','Brother MFC-L9670CDN\n'),(88,'Tapis de Souris wiliingood','Tapis de Souris wiliingood'),(89,'Windows 11 pro ','Windows 11 pro '),(90,'- Pack office 365 standard (Word, Excel, PowerPoint, Outlook, Teams, OneDrive, SharePoint)\n-Antiviru','- Pack office 365 standard (Word, Excel, PowerPoint, Outlook, Teams, OneDrive, SharePoint)\n-Antivirus Bitdefender\n-Chrome\n-7-zip\n-Adobe Reader \n-Notepad++\n'),(91,'YubiKey 5 NFC (USB-A) ','YubiKey 5 NFC (USB-A) '),(92,'?FRACTAL DESIGN?Meshify 2 Compact TG Light (Noir)','?FRACTAL DESIGN?Meshify 2 Compact TG Light (Noir)'),(93,'AMD Ryzen 5 8500G?\n','AMD Ryzen 5 8500G?\n'),(94,'MSI B650 GAMING PLUS WIFI \n','MSI B650 GAMING PLUS WIFI \n'),(95,'Kingston FURY Beast Noir DDR5 16Go\n','Kingston FURY Beast Noir DDR5 16Go\n'),(96,'\nSamsung SSD 990 Pro NVMe\n','\nSamsung SSD 990 Pro NVMe\n'),(97,'\nbe quiet! Pure Rock 3 Black\n','\nbe quiet! Pure Rock 3 Black\n'),(98,'Corsair RM650 ATX 3.1 650W \n','Corsair RM650 ATX 3.1 650W \n'),(99,'Logitech MX Vertical\n','Logitech MX Vertical\n'),(100,'Logitech MX Keys S PLUS\n','Logitech MX Keys S PLUS\n'),(101,'Logitech Brio 300 Webcam Full HD','Logitech Brio 300 Webcam Full HD'),(102,'2x Ecran PC Lenovo L24I 4A 24\n','2x Ecran PC Lenovo L24I 4A 24\n'),(103,'Logitech Zone 300 Bluetooth sans fil? ','Logitech Zone 300 Bluetooth sans fil? '),(104,'HP 4302fdw ','HP 4302fdw '),(105,'Tapis de Souris wiliingood','Tapis de Souris wiliingood'),(106,'Windows 11 pro ','Windows 11 pro '),(107,'Logiciels\n','Logiciels\n'),(108,'YubiKey 5 NFC (USB-A) ','YubiKey 5 NFC (USB-A) '),(109,'FRACTAL DESIGN?Meshify 2 Compact TG Light (Noir)','FRACTAL DESIGN?Meshify 2 Compact TG Light (Noir)'),(110,'AMD Ryzen 7 8700G ','AMD Ryzen 7 8700G '),(111,'GigaByte X870E Aorus Elite WIFI7 ','GigaByte X870E Aorus Elite WIFI7 '),(112,'Kingston FURY Beast 32 Go Kit DDR5-5600 CL36','Kingston FURY Beast 32 Go Kit DDR5-5600 CL36'),(113,'Samsung SSD 990 Pro NVMe M.2\n','Samsung SSD 990 Pro NVMe M.2\n'),(114,'Noctua NH-U12A chromax.black\n','Noctua NH-U12A chromax.black\n'),(115,'Corsair RM650 ATX 3.1 650W ','Corsair RM650 ATX 3.1 650W '),(116,'Logitech MX Vertical\n','Logitech MX Vertical\n'),(117,'Logitech MX Keys S PLUS\n','Logitech MX Keys S PLUS\n'),(118,'Logitech Brio 300 Webcam Full HD','Logitech Brio 300 Webcam Full HD'),(119,'2x Lenovo L27-41\n','2x Lenovo L27-41\n'),(120,'Logitech Zone 300 Bluetooth sans fil? ','Logitech Zone 300 Bluetooth sans fil? '),(121,'HP EliteBook 8 G1i 16 AI PC (AD3Z0ET)\n','HP EliteBook 8 G1i 16 AI PC (AD3Z0ET)\n'),(122,'Tapis de Souris wiliingood','Tapis de Souris wiliingood'),(123,'Windows 11 pro ','Windows 11 pro '),(124,'Logiciels','Logiciels'),(125,'YubiKey 5 NFC (USB-A) ','YubiKey 5 NFC (USB-A) '),(126,'Logitech MX Vertical','Logitech MX Vertical'),(127,'LOGICKEYBOARD Clavier XL-Print Nero\n','LOGICKEYBOARD Clavier XL-Print Nero\n'),(128,'Logitech Brio 300 Webcam Full HD','Logitech Brio 300 Webcam Full HD'),(129,'LG UltraGear 32G810SA-W\n','LG UltraGear 32G810SA-W\n'),(130,'Jabra Evolve2 55 St?r?o MS + Dongle USB-A Link380\n','Jabra Evolve2 55 St?r?o MS + Dongle USB-A Link380\n'),(131,'Tapis de Souris wiliingood','Tapis de Souris wiliingood'),(132,'Windows 11 pro ','Windows 11 pro '),(133,'Logiciels','Logiciels');
/*!40000 ALTER TABLE `components` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` longtext NOT NULL,
  `status` enum('nouveau','traite','archived') NOT NULL DEFAULT 'nouveau',
  `reply_text` longtext DEFAULT NULL,
  `replied_by` varchar(100) DEFAULT NULL,
  `replied_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'Johan Caudrelier','jojo111@gmail.com','blblblgbsb','fdnvhjvfsvbjlbvfv fvvbvljvsjfv lj v vfljv fsvv','nouveau',NULL,NULL,NULL,'2025-12-11 22:27:57'),(2,'Johan Caudrelier','techmediapro.brive@gmail.com','Le gouvernement du Vietnam confirme avoir été victime d’un vol de données','je ne comprends pas la raison pour la quelle','nouveau',NULL,NULL,NULL,'2025-12-11 22:28:35'),(3,'Johan Caudrelier','techmediapro.brive@gmail.com','Le gouvernement du Vietnam confirme avoir été victime d’un vol de données','je ne comprends pas la raison pour la quelle','nouveau',NULL,NULL,NULL,'2025-12-11 22:47:56');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pc_components`
--

DROP TABLE IF EXISTS `pc_components`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pc_components` (
  `pc_id` int(10) unsigned NOT NULL,
  `component_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`pc_id`,`component_id`),
  KEY `component_id` (`component_id`),
  CONSTRAINT `pc_components_ibfk_1` FOREIGN KEY (`pc_id`) REFERENCES `pcs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pc_components_ibfk_2` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pc_components`
--

LOCK TABLES `pc_components` WRITE;
/*!40000 ALTER TABLE `pc_components` DISABLE KEYS */;
INSERT INTO `pc_components` VALUES (1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(1,9),(1,10),(1,11),(1,12),(1,13),(1,14),(1,15),(1,16),(1,17),(2,18),(2,19),(2,20),(2,21),(2,22),(2,23),(2,24),(2,25),(2,26),(2,27),(2,28),(2,29),(2,30),(2,31),(2,32),(2,33),(2,34),(2,35),(2,36),(3,37),(3,38),(3,39),(3,40),(3,41),(3,42),(3,43),(3,44),(3,45),(3,46),(3,47),(3,48),(3,49),(3,50),(3,51),(3,52),(3,53),(3,54),(4,55),(4,56),(4,57),(4,58),(4,59),(4,60),(4,61),(4,62),(4,63),(4,64),(4,65),(4,66),(4,67),(4,68),(4,69),(4,70),(4,71),(4,72),(4,73),(5,74),(5,75),(5,76),(5,77),(5,78),(5,79),(5,80),(5,81),(5,82),(5,83),(5,84),(5,85),(5,86),(5,87),(5,88),(5,89),(5,90),(5,91),(6,92),(6,93),(6,94),(6,95),(6,96),(6,97),(6,98),(6,99),(6,100),(6,101),(6,102),(6,103),(6,104),(6,105),(6,106),(6,107),(6,108),(7,109),(7,110),(7,111),(7,112),(7,113),(7,114),(7,115),(7,116),(7,117),(7,118),(7,119),(7,120),(7,121),(7,122),(7,123),(7,124),(7,125),(8,126),(8,127),(8,128),(8,129),(8,130),(8,131),(8,132),(8,133);
/*!40000 ALTER TABLE `pc_components` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pcs`
--

DROP TABLE IF EXISTS `pcs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pcs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pcs`
--

LOCK TABLES `pcs` WRITE;
/*!40000 ALTER TABLE `pcs` DISABLE KEYS */;
INSERT INTO `pcs` VALUES (1,'PC développement logiciel ','https://m.media-amazon.com/images/I/61GophOiBJL._AC_SY300_SX300_QL70_ML2_.jpg',399.00),(2,'PC \r\nGestion des infrastructures systèmes et réseau \r\n','https://www.cdiscount.com/pdt2/7/1/3/1/550x550/fra7340172704713/rw/boitier-pc-fractal-design-north-charcoal-black.jpg',899.00),(3,'PC Design UX/UI\r\n','https://media.materiel.net/r900/products/MN0006195748.jpg',1200.00),(4,'PC Marketing et vente ','https://m.media-amazon.com/images/I/51wAv5q4adL._AC_SX679_.jpg',0.00),(5,'PC Support client ','https://m.media-amazon.com/images/I/812UsZ2ruOL._AC_SX679_.jpg',0.00),(6,'PC Ressources humaines et administration ','https://media.materiel.net/r900/products/MN0005367534_1.jpg',1000.00),(7,'PC Direction','https://media.materiel.net/r900/products/MN0005367534_1.jpg',1000.00),(8,'PC personnes en situation de handicap ','https://m.media-amazon.com/images/I/812UsZ2ruOL._AC_SX679_.jpg',1000.00);
/*!40000 ALTER TABLE `pcs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('admin','employe','direction','rh','support') DEFAULT 'employe',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Admin','admin@gmail.com','$2y$10$KKCAuh1oe7uv6NMo78Pe.OdgVkA8SltDhmL2nj7vjduIfjmiPoxd2','admin','2025-12-11 21:29:18');
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

-- Dump completed on 2025-12-12 12:15:17
