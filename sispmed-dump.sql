-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: sispmed5
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

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
-- Table structure for table `acompanantes`
--

DROP TABLE IF EXISTS `acompanantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acompanantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `edad` int(2) NOT NULL,
  `mailAcom` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nIdAcom` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `pApe` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `parPac` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `pNom` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `sApe` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `sNom` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telAcom` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `tipoId_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Número Identificación Acompañante` (`nIdAcom`),
  KEY `acompanante_tipoId` (`tipoId_id`),
  KEY `acompanante_paciente` (`paciente_id`),
  CONSTRAINT `acompanante_paciente` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`),
  CONSTRAINT `acompanante_tipoId` FOREIGN KEY (`tipoId_id`) REFERENCES `tiposid` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci COMMENT='Tabla para almacenar los acompañantes de los pacientes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acompanantes`
--

LOCK TABLES `acompanantes` WRITE;
/*!40000 ALTER TABLE `acompanantes` DISABLE KEYS */;
INSERT INTO `acompanantes` VALUES (1,25,'acom1@misena.edi.co','1014274505','Fonseca','Primo','Andresin','Mosquera','Felipin','4349952',2,1),(2,35,'a@a.com','54853269','Perez','Primin','Pepito','Díaz','Ceron','3415896348',3,1);
/*!40000 ALTER TABLE `acompanantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arl`
--

DROP TABLE IF EXISTS `arl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomArl` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telArl` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomArl` (`nomArl`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arl`
--

LOCK TABLES `arl` WRITE;
/*!40000 ALTER TABLE `arl` DISABLE KEYS */;
INSERT INTO `arl` VALUES (1,'Colmena Seguros','4569951');
/*!40000 ALTER TABLE `arl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomCar` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'Nombre del cargo',
  `salCar` double NOT NULL DEFAULT 0 COMMENT 'Salario del cargo',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Nombre del cargo` (`nomCar`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci COMMENT='Tabla que almacena los cargos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` VALUES (1,'Administrador',0);
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias_insumos`
--

DROP TABLE IF EXISTS `categorias_insumos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias_insumos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomCate` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'Nombre de la categoría',
  `tipoCate` int(1) NOT NULL COMMENT 'Tipo de categoría, 0 para medicamentos, 1 para insumos',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Nombre de la categoría` (`nomCate`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias_insumos`
--

LOCK TABLES `categorias_insumos` WRITE;
/*!40000 ALTER TABLE `categorias_insumos` DISABLE KEYS */;
INSERT INTO `categorias_insumos` VALUES (1,'Analgésicos',0),(2,'Antiácidos',0),(3,'Antialérgicos',0),(4,'Antidiarreicos',0),(5,'Antiinfecciosos',0),(6,'Antiinflamatorios',0),(7,'Antidepresivos',0),(8,'Antipiréticos',0),(9,'Antitusivos',0),(10,'Laxantes',0),(11,'Mucolíticos',0);
/*!40000 ALTER TABLE `categorias_insumos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `citas`
--

DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` datetime NOT NULL,
  `hora_final` datetime NOT NULL,
  `acompanante_id` int(11) NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `sede_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cita_acompanante` (`acompanante_id`),
  KEY `cita_empleado` (`empleado_id`),
  KEY `cita_paciente` (`paciente_id`),
  KEY `cita_sede` (`sede_id`),
  CONSTRAINT `cita_acompanante` FOREIGN KEY (`acompanante_id`) REFERENCES `acompanantes` (`id`),
  CONSTRAINT `cita_empleado` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`),
  CONSTRAINT `cita_paciente` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`),
  CONSTRAINT `cita_sede` FOREIGN KEY (`sede_id`) REFERENCES `sedes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
INSERT INTO `citas` VALUES (1,'Prueba','2020-11-17','2020-11-17 17:05:39','2020-11-17 17:44:39',1,5,1,1);
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `convenios`
--

DROP TABLE IF EXISTS `convenios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `convenios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cosConv` double NOT NULL,
  `durConv` double NOT NULL,
  `fecAper` date NOT NULL,
  `nomConv` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `objConv` varchar(120) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `resolu` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `eps_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Nombre del convenio` (`nomConv`),
  KEY `convenio_eps` (`eps_id`),
  CONSTRAINT `convenio_eps` FOREIGN KEY (`eps_id`) REFERENCES `eps` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci COMMENT='Tabla que almacena los convenios que se tienen con las EPS';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `convenios`
--

LOCK TABLES `convenios` WRITE;
/*!40000 ALTER TABLE `convenios` DISABLE KEYS */;
INSERT INTO `convenios` VALUES (1,100000,5,'2020-11-16','Convenio Compensar','Prestar servicios de cardiología.','016 del 2020',1,0);
/*!40000 ALTER TABLE `convenios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ciuRes` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT 'N/A',
  `dirRes` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT 'N/A',
  `eCivil` enum('C','S','U','V') COLLATE utf8mb4_spanish2_ci DEFAULT 'S',
  `mailEmp` varchar(45) COLLATE utf8mb4_spanish2_ci DEFAULT 'N/A',
  `fecIng` date DEFAULT NULL,
  `fecNac` date DEFAULT NULL,
  `genero` enum('M','F','I') COLLATE utf8mb4_spanish2_ci DEFAULT 'I',
  `nIdEmp` varchar(15) COLLATE utf8mb4_spanish2_ci DEFAULT 'N/A',
  `pApe` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT 'N/A',
  `pNom` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT 'N/A',
  `rh` varchar(3) COLLATE utf8mb4_spanish2_ci DEFAULT 'N/A',
  `sApe` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT 'N/A',
  `sNom` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT 'N/A',
  `telEmp` varchar(15) COLLATE utf8mb4_spanish2_ci DEFAULT 'N/A',
  `arl_id` int(11) DEFAULT 0,
  `cargo_id` int(11) DEFAULT 0,
  `eps_id` int(11) DEFAULT 0,
  `tiposId_id` int(11) DEFAULT 0,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nIdEmp` (`nIdEmp`),
  KEY `empleado_arl` (`arl_id`),
  KEY `empleado_cargo` (`cargo_id`),
  KEY `empleado_eps` (`eps_id`),
  KEY `empleado_tipoId` (`tiposId_id`),
  CONSTRAINT `empleado_arl` FOREIGN KEY (`arl_id`) REFERENCES `arl` (`id`),
  CONSTRAINT `empleado_cargo` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`),
  CONSTRAINT `empleado_eps` FOREIGN KEY (`eps_id`) REFERENCES `eps` (`id`),
  CONSTRAINT `empleado_tipoId` FOREIGN KEY (`tiposId_id`) REFERENCES `tiposid` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci COMMENT='Tabla que almacena los datos de los empleados';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (1,'N/A',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'sispmed.com','Admin',NULL,NULL,NULL,NULL,NULL,1,1,2,1),(5,'Bogotá','Calle 123 #45-50','V','andres@gmail.com','2020-11-16','2020-01-07','M','1014274102','Fonsec','Andre','O-','Mosque','Feli','4587796',1,1,1,2,1);
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eps`
--

DROP TABLE IF EXISTS `eps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomEps` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telEps` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomEps` (`nomEps`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eps`
--

LOCK TABLES `eps` WRITE;
/*!40000 ALTER TABLE `eps` DISABLE KEYS */;
INSERT INTO `eps` VALUES (1,'Compensar EPS','4349951');
/*!40000 ALTER TABLE `eps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gastos`
--

DROP TABLE IF EXISTS `gastos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gastos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concepto` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecGasto` date NOT NULL,
  `forPago` enum('EF','TD','TC','CH') COLLATE utf8mb4_spanish2_ci NOT NULL,
  `valor` double NOT NULL,
  `empleado_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gasto_empleado` (`empleado_id`),
  CONSTRAINT `gasto_empleado` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci COMMENT='Tabla que almacena los gastos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gastos`
--

LOCK TABLES `gastos` WRITE;
/*!40000 ALTER TABLE `gastos` DISABLE KEYS */;
INSERT INTO `gastos` VALUES (1,'De prueba','2020-11-17','EF',15100,5);
/*!40000 ALTER TABLE `gastos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insumos`
--

DROP TABLE IF EXISTS `insumos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insumos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codIns` char(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `concen` char(10) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecVen` datetime NOT NULL,
  `labora` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nomIns` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `precioU` decimal(10,0) NOT NULL,
  `pres` char(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `unid` char(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `categoria_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codIns` (`codIns`),
  KEY `insumo_categoria` (`categoria_id`),
  CONSTRAINT `insumo_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias_insumos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insumos`
--

LOCK TABLES `insumos` WRITE;
/*!40000 ALTER TABLE `insumos` DISABLE KEYS */;
INSERT INTO `insumos` VALUES (1,'43975487','500mg','2021-07-06 00:52:09','Hof fman','Acetaminofen',13050,'Pastillas','sobre x100',1),(2,'34875436','800mg','2021-05-13 00:52:09','Pfizer','Ibuprofeno',11400,'Pastillas','sobre x50,2',2),(3,'84759374','65mg','2023-11-24 00:00:00','Abbvie','Dolex forte',19100,'Pastillas','sobre x14',3),(4,'48754365','400mg','2021-08-30 00:00:00','J y J','Advil max',20100,'Pastillas','sobre x16',4),(5,'39478576','200mg','2023-12-10 00:00:00','Sanofi','Advil ultra',13450,'Pastillas','sobre x10',5),(6,'34846575','220mg','2021-05-28 00:00:00','Merck','Ponstan',28400,'Pastillas','sobre x15',6),(7,'37847823','2,5ml','2022-06-19 00:00:00','Novartis','Benzetacil',19536,'Liquido','liquido x5ml',7),(8,'23409355','500mg','2023-07-05 00:00:00','Gilead Sciences','Azitromicina',11450,'Pastillas','sobre x3',8),(9,'18375748','81mg','2021-02-22 00:00:00','Glaxo Smitnkline','Aspirina',11020,'Pastillas','sobre x28',9),(10,'18274874','5ml','2022-07-13 00:00:00','Amgen','Clorfeniramina',3040,'Jarabe','jarabe x120ml',10),(11,'23473875','500ml','2021-12-12 00:00:00','Hof fman','Sulfato de magnesio',3150,'Liquido','liquido x500ml',11),(12,'38943745','500mg','2023-12-30 00:00:00','Pfizer','Amoxicilina',22900,'Pastillas','sobre x50',1),(13,'43895744','30mg','2021-11-26 00:00:00','Abbvie','Tiamina',76850,'Pastillas','sobre x250',2),(14,'23847835','500mg','2022-08-29 00:00:00','J y J','Ampicilina',54550,'Pastillas','sobre x100',3),(15,'64873589','500mg','2023-12-18 00:00:00','Sanofi','Cefacilina',8500,'Pastillas','sobre x10',4),(16,'23434535','25mg','2021-08-20 00:00:00','Merck','Amitriptilina',7750,'Pastillas','sobre x30',5),(17,'27346745','20mg','2022-04-27 00:00:00','Novartis','Omeprazol',7900,'Pastillas','sobre x14',6),(18,'24873257','240ml','2023-10-15 00:00:00','Gilead Sciences','Mylanta',32500,'Liquido','jarabe x240ml',7),(19,'37564385','100mg','2021-02-22 00:00:00','Glaxo Smitnkline','Diclofenaco',12600,'Pastillas','sobre x20',8),(20,'74675944','90mg','2023-03-15 00:00:00','Amgen','Complejo B',26099,'Pastillas','sobre x30',9);
/*!40000 ALTER TABLE `insumos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (13,'2014_10_12_000000_create_users_table',1),(14,'2014_10_12_100000_create_password_resets_table',1),(15,'2019_08_19_000000_create_failed_jobs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mov_insumos`
--

DROP TABLE IF EXISTS `mov_insumos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mov_insumos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(3) NOT NULL,
  `concepto` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `tipo` enum('0','1') COLLATE utf8mb4_spanish2_ci NOT NULL,
  `insumo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `movimiento_insumo` (`insumo_id`),
  CONSTRAINT `movimiento_insumo` FOREIGN KEY (`insumo_id`) REFERENCES `insumos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mov_insumos`
--

LOCK TABLES `mov_insumos` WRITE;
/*!40000 ALTER TABLE `mov_insumos` DISABLE KEYS */;
/*!40000 ALTER TABLE `mov_insumos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ciuRes` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `dirRes` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `eCivil` enum('C','S','U','V') COLLATE utf8mb4_spanish2_ci NOT NULL,
  `mailPac` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecNac` date NOT NULL,
  `genero` enum('F','I','M') COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nIdPac` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `pApe` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `pNom` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `regimen` enum('C','S') COLLATE utf8mb4_spanish2_ci NOT NULL,
  `rh` varchar(3) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `sApe` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `sNom` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telPac` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `eps_id` int(11) NOT NULL,
  `tipoId_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nIdPac` (`nIdPac`),
  KEY `paciente_eps` (`eps_id`),
  KEY `paciente_tipoId` (`tipoId_id`),
  CONSTRAINT `paciente_eps` FOREIGN KEY (`eps_id`) REFERENCES `eps` (`id`),
  CONSTRAINT `paciente_tipoId` FOREIGN KEY (`tipoId_id`) REFERENCES `tiposid` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` VALUES (1,'Bogotá','Calle 64C #112A-20','U','affonseca605@misena.edu.co','2018-04-10','M','1014274506','Fonseca','Andres','S','O+','Mosquera','Felipe','4349951',1,2),(2,'Bogotá','Calle 123 # 15-63','U','pjpp@gmail.com','2000-11-23','M','1002369852','Diaz','Enrique','C','O-','Perecin','Ceron','3256487596',1,3);
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `procedimientos`
--

DROP TABLE IF EXISTS `procedimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `procedimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codProc` varchar(10) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nomProc` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `preProc` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `valor` double NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codProc` (`codProc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procedimientos`
--

LOCK TABLES `procedimientos` WRITE;
/*!40000 ALTER TABLE `procedimientos` DISABLE KEYS */;
/*!40000 ALTER TABLE `procedimientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recaudos`
--

DROP TABLE IF EXISTS `recaudos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recaudos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concep` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecReca` datetime NOT NULL,
  `forPago` enum('EF','TD','TC','CH') COLLATE utf8mb4_spanish2_ci NOT NULL,
  `valor` double NOT NULL,
  `empleado_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `recaudo_empleado` (`empleado_id`),
  CONSTRAINT `recaudo_empleado` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recaudos`
--

LOCK TABLES `recaudos` WRITE;
/*!40000 ALTER TABLE `recaudos` DISABLE KEYS */;
INSERT INTO `recaudos` VALUES (1,'DE PRueba...','2020-11-17 00:00:00','EF',26100,5);
/*!40000 ALTER TABLE `recaudos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomRol` enum('Administrador','Enfermera','Jefe','Medico','Secretaria') COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador'),(2,'Enfermera'),(3,'Administrador'),(4,'Administrador');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sedes`
--

DROP TABLE IF EXISTS `sedes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sedes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dirSede` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nomSede` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telSede` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomSede` (`nomSede`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sedes`
--

LOCK TABLES `sedes` WRITE;
/*!40000 ALTER TABLE `sedes` DISABLE KEYS */;
INSERT INTO `sedes` VALUES (1,'Calle 127','Norte','2548896');
/*!40000 ALTER TABLE `sedes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_insumos`
--

DROP TABLE IF EXISTS `stock_insumos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_insumos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `disponi` int(11) NOT NULL,
  `entradas` int(11) NOT NULL,
  `salidas` int(11) NOT NULL,
  `insumo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `stock_insumo` (`insumo_id`),
  CONSTRAINT `stock_insumo` FOREIGN KEY (`insumo_id`) REFERENCES `insumos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_insumos`
--

LOCK TABLES `stock_insumos` WRITE;
/*!40000 ALTER TABLE `stock_insumos` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_insumos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiposid`
--

DROP TABLE IF EXISTS `tiposid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiposid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(3) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nomTipo` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipoId` (`tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiposid`
--

LOCK TABLES `tiposid` WRITE;
/*!40000 ALTER TABLE `tiposid` DISABLE KEYS */;
INSERT INTO `tiposid` VALUES (1,'AS','Adulto sin identificación'),(2,'CC','Cédula de ciudadanía'),(3,'CE','Cédula de extranjería'),(4,'MS','Menor sin identificación'),(5,'PA','Pasaporte'),(6,'RC','Registro Civil'),(7,'TI','Tarjeta de Identidad'),(8,'OT','Otro');
/*!40000 ALTER TABLE `tiposid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rol_id` int(11) NOT NULL,
  `empleado_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_rol_id_foreign` (`rol_id`),
  KEY `users_empleado_id_foreign` (`empleado_id`),
  CONSTRAINT `users_empleado_id_foreign` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`),
  CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrador','admin@sispmed.com',NULL,'$2y$10$7PUfAzg95Cm.2Jq0Z2tpqeBGiA0FptQ1YxmAXdzApDoZ4UAi3RZ76',NULL,NULL,NULL,1,1);
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

-- Dump completed on 2020-11-18 20:27:48
