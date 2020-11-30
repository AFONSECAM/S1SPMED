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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci COMMENT='Tabla que almacena los cargos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` VALUES (1,'Administrador',0),(2,'Enfermera',1200000),(3,'Medico',2000000),(4,'Jefe',1600000);
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
  `procedimiento_id` int(11) NOT NULL,
  `sede_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cita_acompanante` (`acompanante_id`),
  KEY `cita_empleado` (`empleado_id`),
  KEY `cita_paciente` (`paciente_id`),
  KEY `cita_sede` (`sede_id`),
  KEY `cita_procedimiento` (`procedimiento_id`),
  CONSTRAINT `cita_acompanante` FOREIGN KEY (`acompanante_id`) REFERENCES `acompanantes` (`id`),
  CONSTRAINT `cita_empleado` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`),
  CONSTRAINT `cita_paciente` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`),
  CONSTRAINT `cita_procedimiento` FOREIGN KEY (`procedimiento_id`) REFERENCES `procedimientos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cita_sede` FOREIGN KEY (`sede_id`) REFERENCES `sedes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
INSERT INTO `citas` VALUES (1,'Prueba','2020-11-17','2020-11-17 17:05:39','2020-11-17 17:44:39',1,5,1,1,1),(2,'Prueba 2','2020-11-17','2020-11-17 17:45:39','2020-11-17 17:54:39',2,5,2,1,1);
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consulta`
--

DROP TABLE IF EXISTS `consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consulta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hc_identificacion_id` int(11) NOT NULL,
  `hc_anamnesis_id` int(11) NOT NULL,
  `hc_ante_id` int(11) NOT NULL,
  `hc_sistemas_id` int(11) NOT NULL,
  `hc_exa_signos_id` int(11) NOT NULL,
  `hc_exa_organos_id` int(11) NOT NULL,
  `hc_exa_neuro_id` int(11) NOT NULL,
  `hc_exa_respi_id` int(11) NOT NULL,
  `hc_exa_cardio_id` int(11) NOT NULL,
  `hc_exa_abdo_id` int(11) NOT NULL,
  `hc_exa_piel_id` int(11) NOT NULL,
  `hc_exa_osteo_id` int(11) NOT NULL,
  `hc_exa_genito_id` int(11) NOT NULL,
  `hc_result_id` int(11) NOT NULL,
  `hc_diag_id` int(11) NOT NULL,
  `hc_plan_id` int(11) NOT NULL,
  `hc_medica_id` int(11) NOT NULL,
  `cita_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hc_hc_anamnesis` (`hc_anamnesis_id`),
  KEY `hc_hc_ante` (`hc_ante_id`),
  KEY `hc_hc_diag` (`hc_diag_id`),
  KEY `hc_hc_exa_abdo` (`hc_exa_abdo_id`),
  KEY `hc_hc_exa_cardio` (`hc_exa_cardio_id`),
  KEY `hc_hc_exa_genito` (`hc_exa_genito_id`),
  KEY `hc_hc_exa_neuro` (`hc_exa_neuro_id`),
  KEY `hc_hc_exa_organos` (`hc_exa_organos_id`),
  KEY `hc_hc_exa_osteo` (`hc_exa_osteo_id`),
  KEY `hc_hc_exa_piel` (`hc_exa_piel_id`),
  KEY `hc_hc_exa_respi` (`hc_exa_respi_id`),
  KEY `hc_hc_exa_signos` (`hc_exa_signos_id`),
  KEY `hc_hc_identificacion` (`hc_identificacion_id`),
  KEY `hc_hc_medica` (`hc_medica_id`),
  KEY `hc_hc_plan` (`hc_plan_id`),
  KEY `hc_hc_result` (`hc_result_id`),
  KEY `hc_hc_sistemas` (`hc_sistemas_id`),
  CONSTRAINT `hc_hc_anamnesis` FOREIGN KEY (`hc_anamnesis_id`) REFERENCES `hc_anamnesis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hc_hc_ante` FOREIGN KEY (`hc_ante_id`) REFERENCES `hc_ante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hc_hc_diag` FOREIGN KEY (`hc_diag_id`) REFERENCES `hc_diag` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hc_hc_exa_abdo` FOREIGN KEY (`hc_exa_abdo_id`) REFERENCES `hc_exa_abdo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hc_hc_exa_cardio` FOREIGN KEY (`hc_exa_cardio_id`) REFERENCES `hc_exa_cardio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hc_hc_exa_genito` FOREIGN KEY (`hc_exa_genito_id`) REFERENCES `hc_exa_genito` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hc_hc_exa_neuro` FOREIGN KEY (`hc_exa_neuro_id`) REFERENCES `hc_exa_neuro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hc_hc_exa_organos` FOREIGN KEY (`hc_exa_organos_id`) REFERENCES `hc_exa_organos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hc_hc_exa_osteo` FOREIGN KEY (`hc_exa_osteo_id`) REFERENCES `hc_exa_osteo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hc_hc_exa_piel` FOREIGN KEY (`hc_exa_piel_id`) REFERENCES `hc_exa_piel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hc_hc_exa_respi` FOREIGN KEY (`hc_exa_respi_id`) REFERENCES `hc_exa_respi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hc_hc_exa_signos` FOREIGN KEY (`hc_exa_signos_id`) REFERENCES `hc_exa_signos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hc_hc_identificacion` FOREIGN KEY (`hc_identificacion_id`) REFERENCES `hc_identificacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hc_hc_medica` FOREIGN KEY (`hc_medica_id`) REFERENCES `hc_medica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hc_hc_plan` FOREIGN KEY (`hc_plan_id`) REFERENCES `hc_plan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hc_hc_result` FOREIGN KEY (`hc_result_id`) REFERENCES `hc_result` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hc_hc_sistemas` FOREIGN KEY (`hc_sistemas_id`) REFERENCES `hc_sistemas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta`
--

LOCK TABLES `consulta` WRITE;
/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
/*!40000 ALTER TABLE `consulta` ENABLE KEYS */;
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
INSERT INTO `convenios` VALUES (1,100000,5,'2020-11-16','Convenio Compensar','Prestar servicios de cardiología1.','016 del 2020',1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci COMMENT='Tabla que almacena los datos de los empleados';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (1,'N/A',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'sispmed.com','Admin',NULL,NULL,NULL,NULL,NULL,1,1,2,1),(5,'Bogotá','Calle 123 #45-50','V','andres@gmail.com','2020-11-16','2020-01-07','M','1014274102','Fonsec','Andre','O-','Mosque','Feli','4587796',1,2,1,2,1),(7,'Bogotá','Calle 123 # 15-00','C','enf@gmail.com','2020-11-30','1994-04-15','F','1002369812','Diaz','Enfermera','A+','Perecin','Ceron','3415896312',1,2,1,2,1),(8,'Bogotá','Calle 123 # 14-60','U','duvan@gmail.com','2020-11-17','1990-01-20','I','54853123','Prueba','Duvan','A+','Di','Juanito','3659658321',1,3,1,3,1);
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
-- Table structure for table `hc`
--

DROP TABLE IF EXISTS `hc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `consulta_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hc_consulta` (`consulta_id`),
  KEY `hc_paciente` (`paciente_id`),
  CONSTRAINT `hc_consulta` FOREIGN KEY (`consulta_id`) REFERENCES `consulta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hc_paciente` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hc`
--

LOCK TABLES `hc` WRITE;
/*!40000 ALTER TABLE `hc` DISABLE KEYS */;
/*!40000 ALTER TABLE `hc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hc_anamnesis`
--

DROP TABLE IF EXISTS `hc_anamnesis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hc_anamnesis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enfActual` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `motivo` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cita_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cita_id` (`cita_id`),
  CONSTRAINT `anamnesis_cita` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hc_anamnesis`
--

LOCK TABLES `hc_anamnesis` WRITE;
/*!40000 ALTER TABLE `hc_anamnesis` DISABLE KEYS */;
/*!40000 ALTER TABLE `hc_anamnesis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hc_ante`
--

DROP TABLE IF EXISTS `hc_ante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hc_ante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alergi` enum('si','no') COLLATE utf8mb4_spanish2_ci DEFAULT 'no',
  `anteFam` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT 'no',
  `farma` enum('si','no') COLLATE utf8mb4_spanish2_ci DEFAULT 'no',
  `gineco` enum('si','no') COLLATE utf8mb4_spanish2_ci DEFAULT 'no',
  `pato` enum('si','no') COLLATE utf8mb4_spanish2_ci DEFAULT 'no',
  `quirur` enum('si','no') COLLATE utf8mb4_spanish2_ci DEFAULT 'no',
  `toxi` enum('si','no') COLLATE utf8mb4_spanish2_ci DEFAULT 'no',
  `trauma` enum('si','no') COLLATE utf8mb4_spanish2_ci DEFAULT 'no',
  `cita_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cita_id` (`cita_id`),
  CONSTRAINT `ante_cita` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hc_ante`
--

LOCK TABLES `hc_ante` WRITE;
/*!40000 ALTER TABLE `hc_ante` DISABLE KEYS */;
/*!40000 ALTER TABLE `hc_ante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hc_diag`
--

DROP TABLE IF EXISTS `hc_diag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hc_diag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dx1` varchar(10) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `dx2` varchar(10) COLLATE utf8mb4_spanish2_ci DEFAULT 'Ninguno',
  `dx3` varchar(10) COLLATE utf8mb4_spanish2_ci DEFAULT 'Ninguno',
  `dx4` varchar(10) COLLATE utf8mb4_spanish2_ci DEFAULT 'Ninguno',
  `cita_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cita_id` (`cita_id`),
  CONSTRAINT `diag_cita` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hc_diag`
--

LOCK TABLES `hc_diag` WRITE;
/*!40000 ALTER TABLE `hc_diag` DISABLE KEYS */;
/*!40000 ALTER TABLE `hc_diag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hc_exa_abdo`
--

DROP TABLE IF EXISTS `hc_exa_abdo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hc_exa_abdo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ascitis` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `blumberg` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `descripcion` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT 'Ninguna observación',
  `distenido` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `dolor` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `espleno` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `hepato` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `hernia` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `masa` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `perista` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `rovsing` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `sinAlte` enum('si','no') COLLATE utf8mb4_spanish2_ci DEFAULT 'si',
  `cita_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cita_id` (`cita_id`),
  CONSTRAINT `exa_abdo_cita` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hc_exa_abdo`
--

LOCK TABLES `hc_exa_abdo` WRITE;
/*!40000 ALTER TABLE `hc_exa_abdo` DISABLE KEYS */;
/*!40000 ALTER TABLE `hc_exa_abdo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hc_exa_cardio`
--

DROP TABLE IF EXISTS `hc_exa_cardio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hc_exa_cardio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arritmico` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `arritmicoObs` varchar(30) COLLATE utf8mb4_spanish2_ci DEFAULT 'Ninguna observación',
  `edemas` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `edemasObs` varchar(30) COLLATE utf8mb4_spanish2_ci DEFAULT 'Ninguna observación',
  `inurgi` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `inurgiObs` varchar(30) COLLATE utf8mb4_spanish2_ci DEFAULT 'Ninguna observación',
  `otros` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `otrosObs` varchar(30) COLLATE utf8mb4_spanish2_ci DEFAULT 'Ninguna observación',
  `pulsos` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `pulsosObs` varchar(30) COLLATE utf8mb4_spanish2_ci DEFAULT 'Ninguna observación',
  `sinAlte` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'si',
  `soplos` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `soplosObs` varchar(30) COLLATE utf8mb4_spanish2_ci DEFAULT 'Ninguna observación',
  `cita_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cita_id` (`cita_id`),
  CONSTRAINT `exa_cardio_cita` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hc_exa_cardio`
--

LOCK TABLES `hc_exa_cardio` WRITE;
/*!40000 ALTER TABLE `hc_exa_cardio` DISABLE KEYS */;
/*!40000 ALTER TABLE `hc_exa_cardio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hc_exa_genito`
--

DROP TABLE IF EXISTS `hc_exa_genito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hc_exa_genito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT 'Ninguna descripción',
  `sinAlte` enum('si','no') COLLATE utf8mb4_spanish2_ci DEFAULT 'si',
  `cita_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cita_id` (`cita_id`),
  CONSTRAINT `exa_genito_cita` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hc_exa_genito`
--

LOCK TABLES `hc_exa_genito` WRITE;
/*!40000 ALTER TABLE `hc_exa_genito` DISABLE KEYS */;
/*!40000 ALTER TABLE `hc_exa_genito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hc_exa_neuro`
--

DROP TABLE IF EXISTS `hc_exa_neuro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hc_exa_neuro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ansioso` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `babinski` enum('I','D','N') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'N',
  `depresivo` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `eutimico` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `fondoOjo` enum('I','D','N') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'N',
  `fondoOjoObs` varchar(30) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `fzaMuscular` varchar(30) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `glassglow` enum('I','D','N') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'N',
  `hemiparesia` enum('I','D','N') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'N',
  `hemiplejia` enum('I','D','N') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'N',
  `lassegue` enum('I','D','N') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'N',
  `maniaco` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `otro` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `otroObs` varchar(30) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `psicotico` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `pupilas` enum('I','D','N') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'N',
  `pupilasObs` varchar(30) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `rigidezNuca` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `rot` enum('I','D','N') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'N',
  `rotObs` varchar(30) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `sinAlte` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `cita_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cita_id` (`cita_id`),
  CONSTRAINT `exa_neuro_cita` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hc_exa_neuro`
--

LOCK TABLES `hc_exa_neuro` WRITE;
/*!40000 ALTER TABLE `hc_exa_neuro` DISABLE KEYS */;
/*!40000 ALTER TABLE `hc_exa_neuro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hc_exa_organos`
--

DROP TABLE IF EXISTS `hc_exa_organos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hc_exa_organos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `boca` enum('I','D','N') COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `bocaObs` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT 'Ninguna observación',
  `nariz` enum('I','D','N') COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `narizObs` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT 'Ninguna observación',
  `oido` enum('I','D','N') COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `oidoObs` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT 'Ninguna observación',
  `ojo` enum('I','D','N') COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `ojoObs` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT 'Ninguna observación',
  `sinAlte` enum('si','no') COLLATE utf8mb4_spanish2_ci DEFAULT 'si',
  `cita_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cita_id` (`cita_id`),
  CONSTRAINT `exa_organos_cita` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hc_exa_organos`
--

LOCK TABLES `hc_exa_organos` WRITE;
/*!40000 ALTER TABLE `hc_exa_organos` DISABLE KEYS */;
/*!40000 ALTER TABLE `hc_exa_organos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hc_exa_osteo`
--

DROP TABLE IF EXISTS `hc_exa_osteo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hc_exa_osteo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT 'Ninguna descripción',
  `cita_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cita_id` (`cita_id`),
  CONSTRAINT `exa_osteo_cita` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hc_exa_osteo`
--

LOCK TABLES `hc_exa_osteo` WRITE;
/*!40000 ALTER TABLE `hc_exa_osteo` DISABLE KEYS */;
/*!40000 ALTER TABLE `hc_exa_osteo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hc_exa_piel`
--

DROP TABLE IF EXISTS `hc_exa_piel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hc_exa_piel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alopecia` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `ampolla` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `atrofia` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `costra` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `descripcion` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT 'Ninguna observación',
  `despig` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `escama` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `esclerosis` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `escoriacion` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `fisura` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `habon` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `liquen` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `macula` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `nodulo` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `papula` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `placa` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `pustula` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `querato` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `quiste` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `sinAlte` enum('si','no') COLLATE utf8mb4_spanish2_ci DEFAULT 'no',
  `tumor` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `ulcera` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `vesicula` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `cita_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cita_id` (`cita_id`),
  CONSTRAINT `exa_piel_cita` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hc_exa_piel`
--

LOCK TABLES `hc_exa_piel` WRITE;
/*!40000 ALTER TABLE `hc_exa_piel` DISABLE KEYS */;
/*!40000 ALTER TABLE `hc_exa_piel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hc_exa_respi`
--

DROP TABLE IF EXISTS `hc_exa_respi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hc_exa_respi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crepitos` enum('I','D','N') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'N',
  `crepitosObs` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT 'Ninguna observación',
  `estertores` enum('I','D','N') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'N',
  `estertoresObs` varchar(30) COLLATE utf8mb4_spanish2_ci DEFAULT 'Ninguna observación',
  `fremito` enum('I','D','N') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'N',
  `fremitoObs` varchar(30) COLLATE utf8mb4_spanish2_ci DEFAULT 'Ninguna observación',
  `percusion` enum('I','D','N') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'N',
  `percusionObs` varchar(30) COLLATE utf8mb4_spanish2_ci DEFAULT 'Ninguna observación',
  `roncus` enum('I','D','N') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'N',
  `roncusObs` varchar(30) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `sibilancias` enum('I','D','N') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'N',
  `sibilanciasObs` varchar(30) COLLATE utf8mb4_spanish2_ci DEFAULT 'Ninguna observación',
  `sinAlte` enum('si','no') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'no',
  `tirajes` enum('I','D','N') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'N',
  `tirajesObs` varchar(30) COLLATE utf8mb4_spanish2_ci DEFAULT 'Ninguna observación',
  `cita_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cita_id` (`cita_id`),
  CONSTRAINT `exa_respi_cita` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hc_exa_respi`
--

LOCK TABLES `hc_exa_respi` WRITE;
/*!40000 ALTER TABLE `hc_exa_respi` DISABLE KEYS */;
/*!40000 ALTER TABLE `hc_exa_respi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hc_exa_signos`
--

DROP TABLE IF EXISTS `hc_exa_signos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hc_exa_signos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ta` int(11) DEFAULT 0,
  `fc` int(11) DEFAULT 0,
  `fr` int(11) DEFAULT 0,
  `sat` int(11) DEFAULT 0,
  `temp` int(11) DEFAULT 0,
  `cita_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cita_id` (`cita_id`),
  CONSTRAINT `exa_signos_cita` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hc_exa_signos`
--

LOCK TABLES `hc_exa_signos` WRITE;
/*!40000 ALTER TABLE `hc_exa_signos` DISABLE KEYS */;
/*!40000 ALTER TABLE `hc_exa_signos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hc_identificacion`
--

DROP TABLE IF EXISTS `hc_identificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hc_identificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` varchar(15) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `paciente_id` int(11) NOT NULL,
  `acompanante_id` int(11) NOT NULL,
  `cita_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cita_id` (`cita_id`),
  KEY `identificacion_paciente` (`paciente_id`),
  KEY `identificacion_acompanante` (`acompanante_id`),
  CONSTRAINT `identificacion_acompanante` FOREIGN KEY (`acompanante_id`) REFERENCES `acompanantes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `identificacion_cita` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `identificacion_paciente` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hc_identificacion`
--

LOCK TABLES `hc_identificacion` WRITE;
/*!40000 ALTER TABLE `hc_identificacion` DISABLE KEYS */;
INSERT INTO `hc_identificacion` VALUES (1,'2020-11-17','17:05:39',1,1,1),(2,'2020-11-17','17:45:39',2,2,2);
/*!40000 ALTER TABLE `hc_identificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hc_medica`
--

DROP TABLE IF EXISTS `hc_medica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hc_medica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dosis` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `tiempoTra` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `viaAdmin` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `insumos_id` int(11) DEFAULT NULL,
  `cita_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cita_id` (`cita_id`),
  KEY `medica_insumos` (`insumos_id`),
  CONSTRAINT `medica_cita` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `medica_insumos` FOREIGN KEY (`insumos_id`) REFERENCES `insumos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hc_medica`
--

LOCK TABLES `hc_medica` WRITE;
/*!40000 ALTER TABLE `hc_medica` DISABLE KEYS */;
/*!40000 ALTER TABLE `hc_medica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hc_plan`
--

DROP TABLE IF EXISTS `hc_plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hc_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'No es necesario llevar un plan.',
  `cita_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cita_id` (`cita_id`),
  CONSTRAINT `plan_cita` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hc_plan`
--

LOCK TABLES `hc_plan` WRITE;
/*!40000 ALTER TABLE `hc_plan` DISABLE KEYS */;
/*!40000 ALTER TABLE `hc_plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hc_result`
--

DROP TABLE IF EXISTS `hc_result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hc_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'Ninguna descripción',
  `cita_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cita_id` (`cita_id`),
  CONSTRAINT `resultados_cita` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hc_result`
--

LOCK TABLES `hc_result` WRITE;
/*!40000 ALTER TABLE `hc_result` DISABLE KEYS */;
/*!40000 ALTER TABLE `hc_result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hc_sistemas`
--

DROP TABLE IF EXISTS `hc_sistemas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hc_sistemas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sistema` varchar(45) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `obs` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `cita_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cita_id` (`cita_id`),
  CONSTRAINT `sistemas` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hc_sistemas`
--

LOCK TABLES `hc_sistemas` WRITE;
/*!40000 ALTER TABLE `hc_sistemas` DISABLE KEYS */;
/*!40000 ALTER TABLE `hc_sistemas` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procedimientos`
--

LOCK TABLES `procedimientos` WRITE;
/*!40000 ALTER TABLE `procedimientos` DISABLE KEYS */;
INSERT INTO `procedimientos` VALUES (1,'CONG','Consulta general','Ninguna',37000);
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
INSERT INTO `roles` VALUES (1,'Administrador'),(2,'Enfermera'),(3,'Medico'),(4,'Jefe');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrador','admin@sispmed.com',NULL,'$2y$10$7PUfAzg95Cm.2Jq0Z2tpqeBGiA0FptQ1YxmAXdzApDoZ4UAi3RZ76',NULL,NULL,NULL,1,1),(2,'Enfermera Diaz','enfermera@sispmed.com',NULL,'$2y$10$t3r9EoCrv6vtYVNku9GRYeQF6Ait2tgyDXpKDfTNAuodNlu7lTPf6',NULL,'2020-11-30 21:02:45','2020-11-30 21:02:45',2,7),(3,'Duvan Prueba','medico@sispmed.com',NULL,'$2y$10$XqlL1gwYsMdcsMb3TIAyC.hYQty.qmUKS9LeSfh9kea6xHbT23b/G',NULL,'2020-11-30 21:07:08','2020-11-30 21:07:08',3,8);
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

-- Dump completed on 2020-11-30 16:20:46
