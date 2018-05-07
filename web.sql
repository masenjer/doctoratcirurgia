-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: master_pie_diabetico
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Table structure for table `CapMenu`
--

DROP TABLE IF EXISTS `CapMenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CapMenu` (
  `IdCapMenu` int(5) NOT NULL AUTO_INCREMENT,
  `Titol` char(255) DEFAULT NULL,
  `Orden` int(2) NOT NULL,
  `IdSite` int(1) NOT NULL DEFAULT '0',
  `Contingut` longtext,
  KEY `IdCapMenu` (`IdCapMenu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CapMenu`
--

LOCK TABLES `CapMenu` WRITE;
/*!40000 ALTER TABLE `CapMenu` DISABLE KEYS */;
/*!40000 ALTER TABLE `CapMenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Contacte`
--

DROP TABLE IF EXISTS `Contacte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Contacte` (
  `IdContacte` int(11) NOT NULL AUTO_INCREMENT,
  `Titol` char(255) DEFAULT NULL,
  `Contingut` longtext,
  `URL` char(255) DEFAULT NULL,
  `IdSite` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdContacte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Contacte`
--

LOCK TABLES `Contacte` WRITE;
/*!40000 ALTER TABLE `Contacte` DISABLE KEYS */;
/*!40000 ALTER TABLE `Contacte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Destacat`
--

DROP TABLE IF EXISTS `Destacat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Destacat` (
  `IdDestacat` int(11) NOT NULL AUTO_INCREMENT,
  `FormatBoto` int(1) DEFAULT NULL,
  `Imatge` char(255) DEFAULT NULL,
  `TipusEnllac` int(1) DEFAULT NULL,
  `URL` char(255) DEFAULT NULL,
  `Orden` int(2) DEFAULT '0',
  `IdSite` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdDestacat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Destacat`
--

LOCK TABLES `Destacat` WRITE;
/*!40000 ALTER TABLE `Destacat` DISABLE KEYS */;
/*!40000 ALTER TABLE `Destacat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Directori`
--

DROP TABLE IF EXISTS `Directori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Directori` (
  `IdDirectori` int(11) NOT NULL AUTO_INCREMENT,
  `IdDirectoriCategoria1` int(11) DEFAULT NULL,
  `IdDirectoriCategoria2` int(11) DEFAULT NULL,
  `Nom` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Cognoms` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `Carrec` text COLLATE utf8_spanish2_ci,
  `Despatx` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Ubicacio` text COLLATE utf8_spanish2_ci,
  `Telefon` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Adreca` text COLLATE utf8_spanish2_ci,
  `Imatge` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Perfil` text COLLATE utf8_spanish2_ci,
  `Inves` text COLLATE utf8_spanish2_ci,
  `Publi` text COLLATE utf8_spanish2_ci,
  `Xarxes` text COLLATE utf8_spanish2_ci,
  PRIMARY KEY (`IdDirectori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Directori`
--

LOCK TABLES `Directori` WRITE;
/*!40000 ALTER TABLE `Directori` DISABLE KEYS */;
/*!40000 ALTER TABLE `Directori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DirectoriCategoria`
--

DROP TABLE IF EXISTS `DirectoriCategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DirectoriCategoria` (
  `IdDirectoriCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `Titol_ca` varchar(255) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'Nova categoria',
  `Titol_es` varchar(255) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'Nueva categoría',
  `Titol_en` varchar(255) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'New category',
  `Orden` int(11) NOT NULL,
  PRIMARY KEY (`IdDirectoriCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DirectoriCategoria`
--

LOCK TABLES `DirectoriCategoria` WRITE;
/*!40000 ALTER TABLE `DirectoriCategoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `DirectoriCategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EnDirHome`
--

DROP TABLE IF EXISTS `EnDirHome`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EnDirHome` (
  `IdEnDirHome` int(11) NOT NULL AUTO_INCREMENT,
  `Titol` char(255) DEFAULT NULL,
  `TipusEnllac` int(1) DEFAULT NULL,
  `URL` char(255) DEFAULT NULL,
  `Orden` int(2) DEFAULT NULL,
  `IdSite` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdEnDirHome`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EnDirHome`
--

LOCK TABLES `EnDirHome` WRITE;
/*!40000 ALTER TABLE `EnDirHome` DISABLE KEYS */;
/*!40000 ALTER TABLE `EnDirHome` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `IMGHome`
--

DROP TABLE IF EXISTS `IMGHome`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `IMGHome` (
  `IdIMGHome` int(3) NOT NULL AUTO_INCREMENT,
  `Ruta` varchar(255) NOT NULL,
  `Orden` int(1) NOT NULL,
  PRIMARY KEY (`IdIMGHome`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `IMGHome`
--

LOCK TABLES `IMGHome` WRITE;
/*!40000 ALTER TABLE `IMGHome` DISABLE KEYS */;
/*!40000 ALTER TABLE `IMGHome` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LinMD`
--

DROP TABLE IF EXISTS `LinMD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LinMD` (
  `IdLinMD` int(11) NOT NULL AUTO_INCREMENT,
  `Titol` char(255) DEFAULT NULL,
  `Contingut` longtext,
  `IdCapMenu` int(5) NOT NULL,
  `Descripcio` char(255) NOT NULL,
  `Orden` int(2) NOT NULL,
  PRIMARY KEY (`IdLinMD`),
  KEY `IdCapMenu` (`IdCapMenu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LinMD`
--

LOCK TABLES `LinMD` WRITE;
/*!40000 ALTER TABLE `LinMD` DISABLE KEYS */;
/*!40000 ALTER TABLE `LinMD` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LinMenu`
--

DROP TABLE IF EXISTS `LinMenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LinMenu` (
  `IdLinMenu` int(5) NOT NULL AUTO_INCREMENT,
  `IdCapMenu` int(5) DEFAULT NULL,
  `IdLinMenuRel` int(5) DEFAULT NULL,
  `Titol` char(255) DEFAULT NULL,
  `Contingut` longtext,
  `Orden` int(2) NOT NULL,
  `Tipus` int(11) NOT NULL,
  `IdSite` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdLinMenu`),
  KEY `IdLinMenu` (`IdLinMenu`),
  KEY `IdCapMenu` (`IdCapMenu`),
  KEY `IdLinMenuRel` (`IdLinMenuRel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LinMenu`
--

LOCK TABLES `LinMenu` WRITE;
/*!40000 ALTER TABLE `LinMenu` DISABLE KEYS */;
/*!40000 ALTER TABLE `LinMenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Noticias`
--

DROP TABLE IF EXISTS `Noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Noticias` (
  `IdNoticia` int(9) NOT NULL AUTO_INCREMENT,
  `Entradeta` longtext,
  `Cos` longtext,
  `Titol` longtext NOT NULL,
  `FechaDesPub` date NOT NULL,
  `FechaPub` date NOT NULL,
  `FechaNot` date NOT NULL,
  `Image` char(255) DEFAULT NULL,
  `NOU` int(1) NOT NULL DEFAULT '0',
  `Rang` int(1) DEFAULT NULL,
  `IdSite` int(1) NOT NULL DEFAULT '0',
  KEY `IdNoticia` (`IdNoticia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Noticias`
--

LOCK TABLES `Noticias` WRITE;
/*!40000 ALTER TABLE `Noticias` DISABLE KEYS */;
/*!40000 ALTER TABLE `Noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Publicacions`
--

DROP TABLE IF EXISTS `Publicacions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Publicacions` (
  `IdPublicacions` int(11) NOT NULL AUTO_INCREMENT,
  `Autor` text NOT NULL,
  `Titol` text NOT NULL,
  `Tipus` int(1) NOT NULL,
  `Any` varchar(10) DEFAULT NULL,
  `Linies` varchar(255) DEFAULT NULL,
  `Revista` varchar(255) NOT NULL,
  PRIMARY KEY (`IdPublicacions`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Publicacions`
--

LOCK TABLES `Publicacions` WRITE;
/*!40000 ALTER TABLE `Publicacions` DISABLE KEYS */;
/*!40000 ALTER TABLE `Publicacions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Rols`
--

DROP TABLE IF EXISTS `Rols`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Rols` (
  `IdRol` int(5) NOT NULL AUTO_INCREMENT,
  `NomRol` char(100) DEFAULT NULL,
  PRIMARY KEY (`IdRol`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Rols`
--

LOCK TABLES `Rols` WRITE;
/*!40000 ALTER TABLE `Rols` DISABLE KEYS */;
/*!40000 ALTER TABLE `Rols` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `IdUser` int(5) NOT NULL AUTO_INCREMENT,
  `User` char(100) DEFAULT NULL,
  `Password` char(100) DEFAULT NULL,
  `P` varchar(256) DEFAULT NULL,
  `Email` char(255) DEFAULT NULL,
  `Nom` char(255) DEFAULT NULL,
  `Cognoms` char(255) DEFAULT NULL,
  `Creacio` int(1) DEFAULT NULL,
  `Edicio` int(1) DEFAULT NULL,
  `Noticias` int(1) DEFAULT NULL,
  `Usuarios` int(1) DEFAULT NULL,
  KEY `IdUser` (`IdUser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (3,'admin','8929b61a0e6b985943edc6d13c9992dc661e4f09','5477db6b19a2ee4b95343ada12a9c6114e8e0462','','admin','',1,1,1,1);
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UsersPublic`
--

DROP TABLE IF EXISTS `UsersPublic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UsersPublic` (
  `IdUserPublic` int(11) NOT NULL AUTO_INCREMENT,
  `User` char(255) DEFAULT NULL,
  `Password` char(255) DEFAULT NULL,
  `Niu` int(7) DEFAULT NULL,
  `Nom` char(255) DEFAULT NULL,
  `Cognoms` char(255) DEFAULT NULL,
  `Email` char(255) DEFAULT NULL,
  `Investigador` char(255) DEFAULT NULL,
  PRIMARY KEY (`IdUserPublic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UsersPublic`
--

LOCK TABLES `UsersPublic` WRITE;
/*!40000 ALTER TABLE `UsersPublic` DISABLE KEYS */;
/*!40000 ALTER TABLE `UsersPublic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Web`
--

DROP TABLE IF EXISTS `Web`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Web` (
  `IdWeb` int(5) NOT NULL AUTO_INCREMENT,
  `WebColor` char(6) NOT NULL,
  `ButtonsColor` char(6) NOT NULL,
  KEY `IdWeb` (`IdWeb`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Web`
--

LOCK TABLES `Web` WRITE;
/*!40000 ALTER TABLE `Web` DISABLE KEYS */;
/*!40000 ALTER TABLE `Web` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-04 16:56:41
