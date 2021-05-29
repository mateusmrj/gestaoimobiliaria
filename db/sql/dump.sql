-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: localhost    Database: vista
-- ------------------------------------------------------
-- Server version	5.6.51-91.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `vista` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `vista`;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(300) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Mateus Martins','mateusmrj@gmail.com','(31) 99108-5790','2021-05-25 18:52:44','2021-05-25 18:52:44');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contratos`
--

DROP TABLE IF EXISTS `contratos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contratos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idImovel` int(11) NOT NULL,
  `idProprietario` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataFim` date NOT NULL,
  `taxaAdministracao` decimal(10,2) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `condominio` decimal(10,2) NOT NULL,
  `iptu` decimal(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contratos_1` (`idCliente`),
  KEY `fk_contratos_2` (`idProprietario`),
  KEY `fk_contratos_3` (`idImovel`),
  CONSTRAINT `fk_contratos_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_contratos_2` FOREIGN KEY (`idProprietario`) REFERENCES `proprietarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_contratos_3` FOREIGN KEY (`idImovel`) REFERENCES `imoveis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `imoveis`
--

DROP TABLE IF EXISTS `imoveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imoveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProprietario` int(11) NOT NULL,
  `endereco` varchar(455) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_new_table_1_idx` (`idProprietario`),
  CONSTRAINT `fk_new_table_1` FOREIGN KEY (`idProprietario`) REFERENCES `proprietarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imoveis`
--

LOCK TABLES `imoveis` WRITE;
/*!40000 ALTER TABLE `imoveis` DISABLE KEYS */;
INSERT INTO `imoveis` VALUES (1,1,'3153 - Casa de Alvenaria, Canto - Alvorada','2021-05-28 22:25:08','2021-05-28 22:25:08');
/*!40000 ALTER TABLE `imoveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensalidades`
--

DROP TABLE IF EXISTS `mensalidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mensalidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idContrato` int(11) NOT NULL,
  `parcela` int(2) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `vencimento` date NOT NULL,
  `flagPg` int(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mensalidades_1_idx` (`idContrato`),
  CONSTRAINT `fk_mensalidades_1` FOREIGN KEY (`idContrato`) REFERENCES `contratos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `proprietarios`
--

DROP TABLE IF EXISTS `proprietarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proprietarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(300) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `repasse` int(2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proprietarios`
--

LOCK TABLES `proprietarios` WRITE;
/*!40000 ALTER TABLE `proprietarios` DISABLE KEYS */;
INSERT INTO `proprietarios` VALUES (1,'Ana','ana@gmail.com','3195785-68',3,'2021-05-25 18:53:42','2021-05-25 18:53:42');
/*!40000 ALTER TABLE `proprietarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repasses`
--

DROP TABLE IF EXISTS `repasses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `repasses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idContrato` int(11) NOT NULL,
  `parcela` int(2) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `vencimento` date NOT NULL,
  `flagPg` int(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_repasses_1_idx` (`idContrato`),
  CONSTRAINT `fk_repasses_1` FOREIGN KEY (`idContrato`) REFERENCES `contratos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-29  9:52:28
