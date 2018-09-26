-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_blog
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.30-MariaDB

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
-- Table structure for table `tb_categories`
--

DROP TABLE IF EXISTS `tb_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_categories` (
  `idcategory` int(11) NOT NULL AUTO_INCREMENT,
  `descategory` varchar(60) NOT NULL,
  `active` varchar(45) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcategory`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categories`
--

LOCK TABLES `tb_categories` WRITE;
/*!40000 ALTER TABLE `tb_categories` DISABLE KEYS */;
INSERT INTO `tb_categories` VALUES (3,'Jogos','','2018-09-19 14:48:42'),(4,'Tecnologia','','2018-09-19 22:10:27'),(5,'Google','','2018-09-20 13:55:29'),(7,'Cursos','','2018-09-20 14:18:04'),(8,'Downloads','','2018-09-20 14:18:07'),(9,'SÃ©ries','','2018-09-20 14:18:12'),(10,'Tutoriais','','2018-09-20 14:24:04'),(11,'Destaque Principal','','2018-09-21 23:45:07'),(12,'Destaque 2','','2018-09-22 03:02:14'),(14,'Destaque 3','','2018-09-22 03:25:31'),(15,'Memes','','2018-09-22 03:44:01');
/*!40000 ALTER TABLE `tb_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_notices`
--

DROP TABLE IF EXISTS `tb_notices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_notices` (
  `idnotice` int(11) NOT NULL AUTO_INCREMENT,
  `notice` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `active` varchar(45) NOT NULL,
  `publishedby` varchar(255) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idnotice`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_notices`
--

LOCK TABLES `tb_notices` WRITE;
/*!40000 ALTER TABLE `tb_notices` DISABLE KEYS */;
INSERT INTO `tb_notices` VALUES (1,'Manutencao','<p><strong>O site passar&aacute; por algumas atualiza&ccedil;&otilde;es.</strong></p>','sim','Administrador','2018-09-26 01:06:42'),(2,'Nova manutenÃ§Ã£o ','<p><strong>O site sofrer&aacute; algumas atualiza&ccedil;&otilde;es para melhora de desempenho, ent&atilde;o algumas funcionalidades estar&atilde;o desativadas, obrigado pela compreens&atilde;o!</strong></p>','sim','Administrador','2018-09-26 13:05:37');
/*!40000 ALTER TABLE `tb_notices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_persons`
--

DROP TABLE IF EXISTS `tb_persons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_persons` (
  `idperson` int(11) NOT NULL AUTO_INCREMENT,
  `person` varchar(150) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` bigint(26) DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idperson`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_persons`
--

LOCK TABLES `tb_persons` WRITE;
/*!40000 ALTER TABLE `tb_persons` DISABLE KEYS */;
INSERT INTO `tb_persons` VALUES (2,'Administrador','aulascursophp7@gmail.com',2133334444,'2017-03-01 06:00:00'),(29,'Patrick Chagas','patrickchagas21@gmail.com',21984848840,'2018-09-25 01:48:06'),(30,'Patrick Chagas','patrickchagas21@gmail.com',21984848840,'2018-09-25 01:48:13'),(31,'Patrick Chagas','patrickchagas21@gmail.com',21984848840,'2018-09-25 01:48:16'),(32,'Patrick Chagas','patrickchagas21@gmail.com',21984848840,'2018-09-25 01:49:11'),(54,'Patrick Chagas','patrickchagas21@gmail.com',21984848840,'2018-09-25 02:52:05');
/*!40000 ALTER TABLE `tb_persons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_posts`
--

DROP TABLE IF EXISTS `tb_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_posts` (
  `idpost` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `active` varchar(20) NOT NULL,
  `desurl` varchar(150) NOT NULL,
  `publishedby` varchar(150) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idpost`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_posts`
--

LOCK TABLES `tb_posts` WRITE;
/*!40000 ALTER TABLE `tb_posts` DISABLE KEYS */;
INSERT INTO `tb_posts` VALUES (1,'Scorpion','<p><strong>Um g&ecirc;nio exc&ecirc;ntrico forma uma rede internacional de superg&ecirc;nios para atuar como a &uacute;ltima linha de defesa contra as amea&ccedil;as complexas do mundo moderno.</strong></p>\r\n<h2>&nbsp;</h2>\r\n<h2>Enredo</h2>\r\n<p style=\"margin: 0.5em 0px; line-height: inherit; color: #222222; font-family: sans-serif;\">Inspirado em uma hist&oacute;ria real, conta a hist&oacute;ria do exc&ecirc;ntrico g&ecirc;nio,<a style=\"text-decoration-line: none; color: #0b0080; background: none;\" title=\"Walter O\'Brien\" href=\"https://pt.wikipedia.org/wiki/Walter_O%27Brien\">Walter O\'Brien</a>, e de sua equipe composta por um comportamentalista(<a class=\"mw-redirect\" style=\"text-decoration-line: none; color: #0b0080; background: none;\" title=\"Behaviorista\" href=\"https://pt.wikipedia.org/wiki/Behaviorista\">Behaviorismo</a>), Toby, uma calculadora humana, Sylvester, e uma prod&iacute;gio da mec&acirc;nica, Happy. Todos s&atilde;o pessoas &oacute;timas de esp&iacute;rito, mas que n&atilde;o conseguem se socializar com a maioria das pessoas e por isso recebem a ajuda de uma ex atendente de lanchonete chamada Paige que tem um filho g&ecirc;nio, Ralph.</p>\r\n<p style=\"margin: 0.5em 0px; line-height: inherit; color: #222222; font-family: sans-serif;\">Quando um problema s&eacute;rio surge no espa&ccedil;o a&eacute;reo americano o agente Cabe Gallo resolve recrutar a equipe de g&ecirc;nios, j&aacute; que n&atilde;o existe nenhuma outra equipe capaz de resolver o problema. A partir da&iacute;, e agora com o apoio do governo, eles se tornam oficialmente a equipe Scorpion e transformam-se na &uacute;ltima linha de defesa contra amea&ccedil;as complexas ao redor do mundo.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>','sim','scorpion-serie','Patrick Chagas','2018-09-20 22:32:04'),(7,'Nokia marca evento de lanÃ§amento para 04/10; saiba o que mais vem por aÃ­...','<p>Outubro de 2018 est&aacute; se tornando um dos meses mais movimentados para o mercado de tecnologia, especialmente no que diz respeito a smartphones. Al&eacute;m de eventos da Motorola, LG, Huawei, Google, OnePlus e Samsung, a Nokia tamb&eacute;m resolveu entrar na festa e</p>','sim','nokia-7plus','Administrador','2018-09-20 23:02:50'),(20,'The Flash','<p>Depois de ser atingido por um raio, Barry Allen acorda de seu coma para descobrir que recebeu o poder da super velocidade, se tornando o Flash, lutando contra o crime em Central City.</p>','sim','serie-the-flash','Administrador','2018-09-21 03:09:30'),(21,'Lorem Ipsum','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non dolor at eros hendrerit luctus a eu ex. Praesent vulputate sagittis sapien, non cursus nulla consectetur eu.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non dolor at eros h</p>','sim','lorem-ipsum','Administrador','2018-09-21 13:24:44'),(24,'The Big Bang Theory','<p>Uma mulher que se muda para um apartamento do outro lado do corredor de dois f&iacute;sicos brilhantes, mas socialmente desajeitados, mostra-lhes o qu&atilde;o pouco sabem sobre a vida fora do laborat&oacute;rio.</p>','sim','the-big-bang-theory','Administrador','2018-09-21 13:28:16'),(25,'Testando','<p>Testando</p>','sim','testando','Administrador','2018-09-21 13:31:24'),(29,'Mr Robot','<p>Elliot, um brilhante mas altamente inst&aacute;vel jovem engenheiro de seguran&ccedil;a cibern&eacute;tica e hacker vigilante, torna-se uma figura chave em um jogo complexo de dom&iacute;nio global quando ele e seus aliados sombrios tentam derrubar a corpora&ccedil;&atilde;o corrupta para a</p>','sim','mr-robot','Patrick Chagas','2018-09-21 15:01:56'),(30,'Code','<p>Web Developer</p>','sim','code-web-developer','Administrador','2018-09-22 03:37:45'),(31,'Ai vocÃª passa...','<p>Ai voc&ecirc; passa...</p>','sim','alanzoka','Administrador','2018-09-22 03:44:44'),(32,'FIFA 19 terÃ¡ seleÃ§Ã£o brasileira com nomes genÃ©ricos','<p>Somente Neymar possui um avatar fidedigno no game Com lan&ccedil;amento marcado para dia 25 de setembro, FIFA 19 pode decepcionar aqueles que queriam usar a sele&ccedil;&atilde;o de Philippe Coutinho, Marcelo e Casemiro: a escala&ccedil;&atilde;o do time brasileiro no game &eacute; gen&eacute;ri</p>','sim','fifa-19-tera-selecao-brasileira-com-nomes-genericos','Administrador','2018-09-22 17:12:36'),(33,'Web Developer','<p><strong><span style=\"color: #222222; font-family: sans-serif;\">Este &eacute; o profissional que trabalha desenvolvendo websites, podendo ser um Web Designer (Desenvolvedor do Layout), ou Web Developer(Desenvolvedor de sistemas).&nbsp;</span></strong></p>','sim','web-developer','Administrador','2018-09-25 03:42:51'),(35,'Nova Postagem!','<p>Ol&aacute; Mundo!</p>','sim','nova-postagem','Administrador','2018-09-25 12:19:24');
/*!40000 ALTER TABLE `tb_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_postscategories`
--

DROP TABLE IF EXISTS `tb_postscategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_postscategories` (
  `idpost` int(11) NOT NULL,
  `idcategory` int(11) NOT NULL,
  PRIMARY KEY (`idpost`,`idcategory`),
  KEY `fk_tb_postscategories_tb_categories1_idx` (`idcategory`),
  CONSTRAINT `fk_tb_postscategories_tb_categories1` FOREIGN KEY (`idcategory`) REFERENCES `tb_categories` (`idcategory`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_postscategories_tb_posts1` FOREIGN KEY (`idpost`) REFERENCES `tb_posts` (`idpost`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_postscategories`
--

LOCK TABLES `tb_postscategories` WRITE;
/*!40000 ALTER TABLE `tb_postscategories` DISABLE KEYS */;
INSERT INTO `tb_postscategories` VALUES (1,9),(1,14),(7,4),(7,14),(20,9),(20,12),(21,14),(24,9),(24,12),(29,9),(29,11),(30,4),(31,15),(32,3),(33,4);
/*!40000 ALTER TABLE `tb_postscategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `idperson` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `despassword` varchar(256) NOT NULL,
  `inadmin` tinyint(4) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`iduser`),
  KEY `fk_tb_users_tb_persons_idx` (`idperson`),
  CONSTRAINT `fk_tb_users_tb_persons` FOREIGN KEY (`idperson`) REFERENCES `tb_persons` (`idperson`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_users`
--

LOCK TABLES `tb_users` WRITE;
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` VALUES (2,2,'admin','$2y$12$dg38xk3z/Yjxt8MPPeVOfutVrwsHrpDaPT/1..TRDXt2XU.8QUgo2',1,'2017-03-13 06:00:00'),(50,54,'patrickchagas21@gmail.com','$2y$12$dS1UTNEfyWcjO.tllhlEsOUTbRRMAHDoyy2KVXw48XG4XnAPOrLEa',0,'2018-09-25 02:52:05');
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_userslogs`
--

DROP TABLE IF EXISTS `tb_userslogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_userslogs` (
  `idlog` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `session_id` varchar(100) DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idlog`),
  KEY `fk_tb_userslog_tb_users1_idx` (`iduser`),
  CONSTRAINT `fk_tb_userslog_tb_users1` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_userslogs`
--

LOCK TABLES `tb_userslogs` WRITE;
/*!40000 ALTER TABLE `tb_userslogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_userslogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_userspasswordsrecoveries`
--

DROP TABLE IF EXISTS `tb_userspasswordsrecoveries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_userspasswordsrecoveries` (
  `idrecovery` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `ip` varchar(45) CHARACTER SET latin1 NOT NULL,
  `dtrecovery` datetime DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idrecovery`),
  KEY `fk_tb_userspasswordsrecoveries_tb_users1_idx` (`iduser`),
  CONSTRAINT `fk_tb_userspasswordsrecoveries_tb_users1` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_userspasswordsrecoveries`
--

LOCK TABLES `tb_userspasswordsrecoveries` WRITE;
/*!40000 ALTER TABLE `tb_userspasswordsrecoveries` DISABLE KEYS */;
INSERT INTO `tb_userspasswordsrecoveries` VALUES (1,2,'127.0.0.1','0000-00-00 00:00:00','2017-03-15 19:10:59'),(2,2,'127.0.0.1','2017-03-15 13:33:45','2017-03-15 19:11:18'),(3,2,'127.0.0.1','2017-03-15 13:37:35','2017-03-15 19:37:12'),(4,2,'127.0.0.1',NULL,'2018-09-19 13:19:55'),(5,2,'127.0.0.1',NULL,'2018-09-19 13:20:03'),(6,2,'127.0.0.1',NULL,'2018-09-19 13:33:00'),(7,2,'127.0.0.1','2018-09-19 10:41:33','2018-09-19 13:38:56'),(8,2,'127.0.0.1',NULL,'2018-09-19 13:41:54'),(9,2,'127.0.0.1',NULL,'2018-09-19 13:42:55'),(10,2,'127.0.0.1','2018-09-19 10:44:57','2018-09-19 13:44:16'),(11,2,'127.0.0.1','2018-09-19 10:52:43','2018-09-19 13:52:28'),(12,2,'127.0.0.1','2018-09-19 11:04:04','2018-09-19 14:03:54'),(13,2,'127.0.0.1',NULL,'2018-09-23 13:36:14'),(14,2,'127.0.0.1','2018-09-23 10:40:17','2018-09-23 13:40:02'),(15,2,'127.0.0.1','2018-09-23 10:44:41','2018-09-23 13:44:31'),(16,2,'127.0.0.1',NULL,'2018-09-23 21:17:30'),(17,2,'127.0.0.1',NULL,'2018-09-23 21:18:08'),(18,2,'127.0.0.1','2018-09-23 18:18:43','2018-09-23 21:18:30');
/*!40000 ALTER TABLE `tb_userspasswordsrecoveries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_videos`
--

DROP TABLE IF EXISTS `tb_videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_videos` (
  `idvideo` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` mediumtext,
  `link` varchar(250) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `dtregister` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idvideo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_videos`
--

LOCK TABLES `tb_videos` WRITE;
/*!40000 ALTER TABLE `tb_videos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_videoscategories`
--

DROP TABLE IF EXISTS `tb_videoscategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_videoscategories` (
  `idvideo` int(11) NOT NULL,
  `idcategory` int(11) NOT NULL,
  PRIMARY KEY (`idvideo`,`idcategory`),
  KEY `fk_tb_videoscategories_tb_categories1_idx` (`idcategory`),
  CONSTRAINT `fk_tb_videoscategories_tb_categories1` FOREIGN KEY (`idcategory`) REFERENCES `tb_categories` (`idcategory`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_videoscategories_tb_videos1` FOREIGN KEY (`idvideo`) REFERENCES `tb_videos` (`idvideo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_videoscategories`
--

LOCK TABLES `tb_videoscategories` WRITE;
/*!40000 ALTER TABLE `tb_videoscategories` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_videoscategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_blog'
--

--
-- Dumping routines for database 'db_blog'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_categories_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_categories_save`(
pidcategory INT,
pdescategory VARCHAR(64)
)
BEGIN
	
	IF pidcategory > 0 THEN
		
		UPDATE tb_categories
        SET descategory = pdescategory
        WHERE idcategory = pidcategory;
        
    ELSE
		
		INSERT INTO tb_categories (descategory) VALUES(pdescategory);
        
        SET pidcategory = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_categories WHERE idcategory = pidcategory;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_notices_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_notices_save`(
pidnotice int(11),
pnotice varchar(150),
pdescription text,
pactive varchar(10),
ppublishedby varchar(150)
)
BEGIN
	
	IF pidnotice > 0 THEN
		
		UPDATE tb_notices
        SET 
			notice = pnotice,
            description = pdescription,
            active = pactive,
            publishedby = ppublishedby
        WHERE idnotice = pidnotice;
        
    ELSE
		
		INSERT INTO tb_notices (notice, description, active, publishedby) 
        VALUES(pnotice, pdescription, pactive, ppublishedby);
        
        SET pidnotice = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_notices WHERE idnotice = pidnotice;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_posts_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_posts_save`(
pidpost int(11),
ptitle varchar(150),
pdescription text,
pactive varchar(10),
pdesurl varchar(128),
ppublishedby varchar(150)
)
BEGIN
	
	IF pidpost > 0 THEN
		
		UPDATE tb_posts
        SET 
			title = ptitle,
            description = pdescription,
            active = pactive,
            desurl = pdesurl,
            publishedby = ppublishedby
        WHERE idpost = pidpost;
        
    ELSE
		
		INSERT INTO tb_posts (title, description, active, desurl, publishedby) 
        VALUES(ptitle, pdescription, pactive, pdesurl, ppublishedby);
        
        SET pidpost = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_posts WHERE idpost = pidpost;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_userspasswordsrecoveries_create` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_userspasswordsrecoveries_create`(
piduser INT,
pip VARCHAR(45)
)
BEGIN
	
	INSERT INTO tb_userspasswordsrecoveries (iduser, ip)
    VALUES(piduser, pip);
    
    SELECT * FROM tb_userspasswordsrecoveries
    WHERE idrecovery = LAST_INSERT_ID();
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_usersupdate_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usersupdate_save`(
piduser INT,
pperson VARCHAR(64), 
plogin VARCHAR(64), 
ppassword VARCHAR(256), 
pemail VARCHAR(128), 
pphone BIGINT, 
pinadmin TINYINT
)
BEGIN
	
    DECLARE vidperson INT;
    
	SELECT idperson INTO vidperson
    FROM tb_users
    WHERE iduser = piduser;
    
    UPDATE tb_persons
    SET 
		person = pperson,
        email = pemail,
        phone = pphone
	WHERE idperson = vidperson;
    
    UPDATE tb_users
    SET
		login = plogin,
        despassword = ppassword,
        inadmin = pinadmin
	WHERE iduser = piduser;
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = piduser;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_users_delete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_delete`(
piduser INT
)
BEGIN
    
    DECLARE vidperson INT;
    
    SET FOREIGN_KEY_CHECKS = 0;
 
    SELECT idperson INTO vidperson
        FROM tb_users
    WHERE iduser = piduser;
 
    DELETE FROM tb_persons WHERE idperson = vidperson;
    
    DELETE FROM tb_userspasswordsrecoveries WHERE iduser = piduser;
    DELETE FROM tb_users WHERE iduser = piduser;
    
    SET FOREIGN_KEY_CHECKS = 1;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_users_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_save`(
pperson VARCHAR(64), 
plogin VARCHAR(64), 
ppassword VARCHAR(256), 
pemail VARCHAR(128), 
pphone BIGINT, 
pinadmin TINYINT
)
BEGIN
	
    DECLARE vidperson INT;
    
	INSERT INTO tb_persons (person, email, phone)
    VALUES(pperson, pemail, pphone);
    
    SET vidperson = LAST_INSERT_ID();
    
    INSERT INTO tb_users (idperson, login, despassword, inadmin)
    VALUES(vidperson, plogin, ppassword, pinadmin);
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = LAST_INSERT_ID();
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-26 11:02:40
