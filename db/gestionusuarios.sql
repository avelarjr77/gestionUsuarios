-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: gestionusuarios
-- ------------------------------------------------------
-- Server version	8.0.31

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

--
-- Table structure for table `db_gu_estado`
--

DROP TABLE IF EXISTS `db_gu_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `db_gu_estado` (
  `e_estadoId` int NOT NULL AUTO_INCREMENT,
  `e_nombreEstado` varchar(100) DEFAULT NULL,
  `e_descripcionEstado` varchar(100) DEFAULT NULL,
  `e_FkGrupoEstado` int DEFAULT NULL,
  PRIMARY KEY (`e_estadoId`),
  KEY `e_FkGrupoEstado` (`e_FkGrupoEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_gu_estado`
--

LOCK TABLES `db_gu_estado` WRITE;
/*!40000 ALTER TABLE `db_gu_estado` DISABLE KEYS */;
INSERT INTO `db_gu_estado` VALUES (1,'Habilitado','Habilitado',1),(2,'Deshabilitado','Deshabilitado',1),(3,'Habilitado','Habilitado',1),(4,'Deshabilitado','Deshabilitado',1);
/*!40000 ALTER TABLE `db_gu_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_gu_grupoestado`
--

DROP TABLE IF EXISTS `db_gu_grupoestado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `db_gu_grupoestado` (
  `ge_grupoEstadoId` int NOT NULL AUTO_INCREMENT,
  `ge_grupoEstado` varchar(100) DEFAULT NULL,
  `ge_descripcionGrupoEstado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ge_grupoEstadoId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_gu_grupoestado`
--

LOCK TABLES `db_gu_grupoestado` WRITE;
/*!40000 ALTER TABLE `db_gu_grupoestado` DISABLE KEYS */;
INSERT INTO `db_gu_grupoestado` VALUES (1,'Usuarios','Usuarios'),(2,'Rol','Rol');
/*!40000 ALTER TABLE `db_gu_grupoestado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_gu_personas`
--

DROP TABLE IF EXISTS `db_gu_personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `db_gu_personas` (
  `p_personaId` int NOT NULL AUTO_INCREMENT,
  `p_primerNombre` varchar(50) DEFAULT NULL,
  `p_segundoNombre` varchar(50) DEFAULT NULL,
  `p_primerApellido` varchar(50) DEFAULT NULL,
  `p_segundoApellido` varchar(50) DEFAULT NULL,
  `p_FKTipoDocumento` int DEFAULT NULL,
  `p_documentoIdentidad` varchar(50) DEFAULT NULL,
  `p_correo` varchar(100) DEFAULT NULL,
  `p_contacto` varchar(50) DEFAULT NULL,
  `p_FKEstado` int DEFAULT NULL,
  `p_fechaCreacion` datetime DEFAULT NULL,
  `p_usuarioCreacion` int DEFAULT NULL,
  `p_fechaModifico` datetime DEFAULT NULL,
  `p_usuarioModifico` int DEFAULT NULL,
  PRIMARY KEY (`p_personaId`),
  KEY `p_FKTipoDocumento` (`p_FKTipoDocumento`),
  KEY `p_FKEstado` (`p_FKEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_gu_personas`
--

LOCK TABLES `db_gu_personas` WRITE;
/*!40000 ALTER TABLE `db_gu_personas` DISABLE KEYS */;
INSERT INTO `db_gu_personas` VALUES (6,'Oscar','Jeremías','Avelar','Escobar',1,'12345','oscar@gmail.com','12345',1,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `db_gu_personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_gu_rol`
--

DROP TABLE IF EXISTS `db_gu_rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `db_gu_rol` (
  `r_rolId` int NOT NULL AUTO_INCREMENT,
  `r_rol` varchar(100) DEFAULT NULL,
  `r_descripcionRol` varchar(100) DEFAULT NULL,
  `r_FKEstado` int DEFAULT NULL,
  PRIMARY KEY (`r_rolId`),
  KEY `r_FKEstado` (`r_FKEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_gu_rol`
--

LOCK TABLES `db_gu_rol` WRITE;
/*!40000 ALTER TABLE `db_gu_rol` DISABLE KEYS */;
INSERT INTO `db_gu_rol` VALUES (1,'Propietario','Propietario',1),(2,'Super Administrador','Super Administrador',1),(3,'Administrador','Administrador',1),(4,'Usuario','Usuario',1);
/*!40000 ALTER TABLE `db_gu_rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_gu_rolpermisos`
--

DROP TABLE IF EXISTS `db_gu_rolpermisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `db_gu_rolpermisos` (
  `rp_rolPermisosId` int NOT NULL AUTO_INCREMENT,
  `rp_rolPermisosNombre` varchar(100) DEFAULT NULL,
  `rp_descripcionRol` varchar(100) DEFAULT NULL,
  `rp_permisoVer` int DEFAULT NULL,
  `rp_permisoCrear` int DEFAULT NULL,
  `rp_permisoEditar` int DEFAULT NULL,
  `rp_permisoEliminar` int DEFAULT NULL,
  PRIMARY KEY (`rp_rolPermisosId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_gu_rolpermisos`
--

LOCK TABLES `db_gu_rolpermisos` WRITE;
/*!40000 ALTER TABLE `db_gu_rolpermisos` DISABLE KEYS */;
INSERT INTO `db_gu_rolpermisos` VALUES (1,'Propietario','Puede llevar a cabo todas las tareas relacionadas con la configuración y el mantenimiento en la base',1,1,1,1),(2,'Administrador de seguridad','Puede gestionar los permisos de los roles y configuracions de la Base de datos.',1,1,1,1),(3,'Escritor de datos','Puede Editar, Crear, Ver y Eliminra',1,1,1,1),(4,'Lector de datos','Solamente tiene permiso de lectura',0,0,0,0);
/*!40000 ALTER TABLE `db_gu_rolpermisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_gu_tipodocumento`
--

DROP TABLE IF EXISTS `db_gu_tipodocumento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `db_gu_tipodocumento` (
  `td_tipoDocumentoId` int NOT NULL AUTO_INCREMENT,
  `td_tipoDocumento` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`td_tipoDocumentoId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_gu_tipodocumento`
--

LOCK TABLES `db_gu_tipodocumento` WRITE;
/*!40000 ALTER TABLE `db_gu_tipodocumento` DISABLE KEYS */;
INSERT INTO `db_gu_tipodocumento` VALUES (1,'DUI'),(2,'NIT');
/*!40000 ALTER TABLE `db_gu_tipodocumento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_gu_usuarios`
--

DROP TABLE IF EXISTS `db_gu_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `db_gu_usuarios` (
  `u_usuarioId` int NOT NULL AUTO_INCREMENT,
  `u_FKPersona` int DEFAULT NULL,
  `u_usuario` varchar(100) DEFAULT NULL,
  `u_password` varchar(64) DEFAULT NULL,
  `u_FKRol` int DEFAULT NULL,
  `u_FKEstado` int DEFAULT NULL,
  `u_sesion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`u_usuarioId`),
  KEY `u_FKPersona` (`u_FKPersona`),
  KEY `u_FKEstado` (`u_FKEstado`),
  KEY `u_FKRol` (`u_FKRol`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_gu_usuarios`
--

LOCK TABLES `db_gu_usuarios` WRITE;
/*!40000 ALTER TABLE `db_gu_usuarios` DISABLE KEYS */;
INSERT INTO `db_gu_usuarios` VALUES (1,6,'superadmin','12345',1,1,'2023-08-20 18:25:40');
/*!40000 ALTER TABLE `db_gu_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-20 22:11:47
