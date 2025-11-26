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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `components`
--

LOCK TABLES `components` WRITE;
/*!40000 ALTER TABLE `components` DISABLE KEYS */;
INSERT INTO `components` VALUES (1,'Processeur ultra 9 285K','CPU 24 cœurs et 24 threads polyvalent'),(2,'RAM 64 Go Corsair vengance RGB','6000MHz DDR5 (2x32Go) '),(3,'SSD 4 To Samsung 990 Pro','NVMe M.2 rapide'),(4,'Carte graphique RTX 5080','Parfait pour le multie tache '),(5,'Boîtier Corsair 5000D Airflow','Boîtier noir\r\nConçu pour les cartes mères E-ATX / HTC / micro ATX / mini ITX\r\nBoîtier avec des détails simples et avec un bon flux d’air\r\n'),(6,'PC Bureautique','Alimentation Corsair 1000W'),(7,'Intel Core Ultra 9 285K (3.7 GHz / 5.7 GHz)','24-core/24-threads'),(10,'GIGABYTE Z890 AORUS Xtreme AI Top Carte M?re\n','Carte m?re adapt?e au processeur de derni?re g?n?ration Intel, carte m?re vraiment haut de gamme qui dispose des derni?res technologies et qui a un format E-ATX BIOS simple d?utilisation et application de la carte m?re aussi.'),(11,'CORSAIR Vengeance RGB DDR5 RAM 64Go (2x32Go)\n','6000MHz CL40 AMD Expo Compatible iCUE M?moire d\'Ordinateur - Gris\n'),(12,'Samsung SSD 990 Pro NVMe M.2\n','Pcle 4.0, SSD Interne, Capacit? 4 To, Vitesse de lecture jusqu\'? 7 450 Mo/s, Gestion Intelligente de la Chaleur avec Rev?tement en Nickel\n'),(13,'Corsair RM1000e (2025)\n','c?bles enti?rement modulaires?: Raccordez uniquement les c?bles dont votre syst?me a besoin, facilitant la conception d?un syst?me ?pur? et ordonn?.\nDeux connecteurs EPS12V?: Pour une grande compatibilit? avec les cartes m?res modernes.\nConnecteur PCIe 5.1 12V-2x6?pour les cartes graphiques r?centes.\nFonctionnement silencieux?: Ventilateur ? roulement hydrodynamique de 120?mm dot? d?une courbe de ventilation sp?cialement d?finie assure une ventilation quasi silencieuse, m?me ? pleine charge.\nMode de ventilation Zero RPM?: Fonctionnement quasi silencieux ? basses charges.\nTopologie LLC robuste avec une conversion CC-CC et des condensateurs 105? de qualit? industrielle.\nCompatible avec le mode veille Modern Standby, assurant des d?lais de passage de la veille au fonctionnement extr?mement rapides et une efficacit? ? faible charge am?lior?e.\n'),(14,'Noctua NH-D15\n','Ventirade CPU ? Double Tour (140 mm, Noir)\n'),(15,'Logitech MX Vertical','Avec son design n? de la science et des performances ?lev?es de la s?rie MX de?Logitech, la souris?MX Vertical?est une souris ergonomique con?ue pour offrir pr?cision, contr?le et confort aux utilisateurs exp?riment?s. Dites adieu ? l\'inconfort avec cette souris con?ue pour am?liorer la posture et r?duire les contraintes musculaires et la pression exerc?e sur le poignet.?La position naturelle de la main r?duit la pression exerc?e sur le poignet et l\'avant-bras. L\'angle vertical unique ? 57? a ?t? optimis? pour offrir une posture ergonomique sans compromettre les performance '),(16,'Logitech G G213 Prodigy Gaming Keyboard\n','Confortable, r?sistant, 4x plus rapide qu?un clavier classique et ?clairage des touches '),(17,'\nSamsung 49\" LED - Odyssey G9 S49FG912EU\n','?cran grand pour avoir une bonne visibilit? \nEcran PC 5K - 5120 x 1440 pixels - 1 ms (gris ? gris) - 32/9 - Dalle VA incurv?e - 144 Hz - DisplayHDR 600 - FreeSync Premium Pro - DisplayPort/HDMI - Hub USB - Noir\n'),(18,'Logitech G Pro X Gaming Headset (Noir)\n','Meilleur rapport qualit? prix'),(19,'Logitech Brio 100\n','Webcam Full HD pour r?unions/Streaming, ?quilibre Auto de l\'?clairage, Micro int?gr?, volet de confidentialit?, USB-A, pour Microsoft Teams, Google Meet, Zoom - Graphite\n'),(21,'Fractal Design North XL TG Charcoal Dark\n','');
/*!40000 ALTER TABLE `components` ENABLE KEYS */;
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
INSERT INTO `pc_components` VALUES (1,5),(1,11),(1,13);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pcs`
--

LOCK TABLES `pcs` WRITE;
/*!40000 ALTER TABLE `pcs` DISABLE KEYS */;
INSERT INTO `pcs` VALUES (1,'Pc développement logiciel ','https://www.portables.org/42641-large_default/ordinateur-de-bureau-dell.jpg',399.00),(2,'Pc gamer','https://media.materiel.net/r250/products/MN0006254851_0006273420_0006282430.jpg',899.00),(3,'PC Designer','https://faratech.fr/wp-content/uploads/2020/11/cd78120c-7124-43b6-a917-7869faa86881.jpg',1200.00);
/*!40000 ALTER TABLE `pcs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-26 10:08:02
