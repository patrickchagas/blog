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
-- Table structure for table `tb_answers`
--

DROP TABLE IF EXISTS `tb_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_answers` (
  `idanswers` int(11) NOT NULL AUTO_INCREMENT,
  `nameuser` varchar(255) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(21) NOT NULL,
  `message` text NOT NULL,
  `answer` text,
  `identification` varchar(200) NOT NULL,
  `active` varchar(5) NOT NULL,
  `dtanswer` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idanswers`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_answers`
--

LOCK TABLES `tb_answers` WRITE;
/*!40000 ALTER TABLE `tb_answers` DISABLE KEYS */;
INSERT INTO `tb_answers` VALUES (1,'Administrador','aulascursophp7@gmail.com','2122223333','<p><strong>The Flash</strong></p>','Top','serie-the-flash','sim','2018-09-29 03:23:34');
/*!40000 ALTER TABLE `tb_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_categories`
--

DROP TABLE IF EXISTS `tb_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_categories` (
  `idcategory` int(11) NOT NULL AUTO_INCREMENT,
  `descategory` varchar(60) NOT NULL,
  `active` varchar(3) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcategory`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categories`
--

LOCK TABLES `tb_categories` WRITE;
/*!40000 ALTER TABLE `tb_categories` DISABLE KEYS */;
INSERT INTO `tb_categories` VALUES (3,'Jogos','sim','2018-09-19 14:48:42'),(4,'Tecnologia','sim','2018-09-19 22:10:27'),(5,'Google','sim','2018-09-20 13:55:29'),(7,'Cursos','sim','2018-09-20 14:18:04'),(8,'Downloads','sim','2018-09-20 14:18:07'),(9,'SÃ©ries','sim','2018-09-20 14:18:12'),(10,'Tutoriais','sim','2018-09-20 14:24:04'),(11,'Destaque Principal','nao','2018-09-21 23:45:07'),(12,'Destaque 2','nao','2018-09-22 03:02:14'),(14,'Destaque 3','nao','2018-09-22 03:25:31'),(15,'Memes','sim','2018-09-22 03:44:01');
/*!40000 ALTER TABLE `tb_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_comments`
--

DROP TABLE IF EXISTS `tb_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_comments` (
  `idcomment` int(11) NOT NULL AUTO_INCREMENT,
  `nameuser` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `identification` varchar(100) NOT NULL,
  `active` varchar(3) DEFAULT 'sim',
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcomment`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_comments`
--

LOCK TABLES `tb_comments` WRITE;
/*!40000 ALTER TABLE `tb_comments` DISABLE KEYS */;
INSERT INTO `tb_comments` VALUES (1,'Administrador','aulascursophp7@gmail.com','2122223333','<p>Mr Robot</p>','mr-robot','sim','2018-09-28 10:24:32'),(2,'Administrador','aulascursophp7@gmail.com','2122223333','<p>The Flash</p>','serie-the-flash','sim','2018-09-28 10:24:50'),(3,'Administrador','aulascursophp7@gmail.com','2122223333','<p>Mr Robot 2</p>','mr-robot','sim','2018-09-28 15:33:31'),(4,'Patrick','aulascursophp7@gmail.com','2122223333','<p>&Oacute;tima s&eacute;rie!!!</p>','serie-the-flash','sim','2018-09-28 15:34:24'),(6,'Administrador','aulascursophp7@gmail.com','2122223333','<p>Uma das melhores s&eacute;ries que j&aacute; assisti, pena que cancelaram!</p>','scorpion-serie','sim','2018-09-28 15:50:35'),(7,'Patrick','patrickchagas21@gmail.com','2122223333','<p>Mr robot &eacute; mt bom!!</p>','mr-robot','sim','2018-10-09 12:09:55');
/*!40000 ALTER TABLE `tb_comments` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_notices`
--

LOCK TABLES `tb_notices` WRITE;
/*!40000 ALTER TABLE `tb_notices` DISABLE KEYS */;
INSERT INTO `tb_notices` VALUES (1,'ManutenÃ§Ã£o','<p><strong>O site passar&aacute; por algumas atualiza&ccedil;&otilde;es.</strong></p>','nao','Administrador','2018-09-26 01:06:42'),(2,'Nova manutenÃ§Ã£o ','<p><strong>O site sofrer&aacute; algumas atualiza&ccedil;&otilde;es para melhora de desempenho, ent&atilde;o algumas funcionalidades estar&atilde;o desativadas, obrigado pela compreens&atilde;o!</strong></p>','sim','Administrador','2018-09-26 13:05:37');
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
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_persons`
--

LOCK TABLES `tb_persons` WRITE;
/*!40000 ALTER TABLE `tb_persons` DISABLE KEYS */;
INSERT INTO `tb_persons` VALUES (29,'Patrick Chagas','patrickchagas21@gmail.com',21984848840,'2018-09-25 01:48:06'),(30,'Patrick Chagas','patrickchagas21@gmail.com',21984848840,'2018-09-25 01:48:13'),(31,'Patrick Chagas','patrickchagas21@gmail.com',21984848840,'2018-09-25 01:48:16'),(32,'Patrick Chagas','patrickchagas21@gmail.com',21984848840,'2018-09-25 01:49:11'),(54,'Patrick Chagas','patrickchagas21@gmail.com',21984848840,'2018-09-25 02:52:05'),(56,'Suporte','suporte@blog.com.br',0,'2018-09-27 13:46:55'),(57,'Administrador','aulascursophp7@gmail.com',2122223333,'2018-09-27 21:57:36');
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
  `visits` varchar(255) NOT NULL DEFAULT '0',
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idpost`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_posts`
--

LOCK TABLES `tb_posts` WRITE;
/*!40000 ALTER TABLE `tb_posts` DISABLE KEYS */;
INSERT INTO `tb_posts` VALUES (1,'Scorpion','<p><strong>Um g&ecirc;nio exc&ecirc;ntrico forma uma rede internacional de superg&ecirc;nios para atuar como a &uacute;ltima linha de defesa contra as amea&ccedil;as complexas do mundo moderno.</strong></p>\r\n<h2>&nbsp;</h2>\r\n<h2>Enredo</h2>\r\n<p style=\"margin: 0.5em 0px; line-height: inherit; color: #222222; font-family: sans-serif;\">Inspirado em uma hist&oacute;ria real, conta a hist&oacute;ria do exc&ecirc;ntrico g&ecirc;nio,<a style=\"text-decoration-line: none; color: #0b0080; background: none;\" title=\"Walter O\'Brien\" href=\"https://pt.wikipedia.org/wiki/Walter_O%27Brien\">Walter O\'Brien</a>, e de sua equipe composta por um comportamentalista(<a class=\"mw-redirect\" style=\"text-decoration-line: none; color: #0b0080; background: none;\" title=\"Behaviorista\" href=\"https://pt.wikipedia.org/wiki/Behaviorista\">Behaviorismo</a>), Toby, uma calculadora humana, Sylvester, e uma prod&iacute;gio da mec&acirc;nica, Happy. Todos s&atilde;o pessoas &oacute;timas de esp&iacute;rito, mas que n&atilde;o conseguem se socializar com a maioria das pessoas e por isso recebem a ajuda de uma ex atendente de lanchonete chamada Paige que tem um filho g&ecirc;nio, Ralph.</p>\r\n<p style=\"margin: 0.5em 0px; line-height: inherit; color: #222222; font-family: sans-serif;\">Quando um problema s&eacute;rio surge no espa&ccedil;o a&eacute;reo americano o agente Cabe Gallo resolve recrutar a equipe de g&ecirc;nios, j&aacute; que n&atilde;o existe nenhuma outra equipe capaz de resolver o problema. A partir da&iacute;, e agora com o apoio do governo, eles se tornam oficialmente a equipe Scorpion e transformam-se na &uacute;ltima linha de defesa contra amea&ccedil;as complexas ao redor do mundo.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>','sim','scorpion-serie','Patrick Chagas','20','2018-09-20 22:32:04'),(7,'Nokia marca evento de lanÃ§amento para 04/10; saiba o que mais vem por aÃ­...','<p>Outubro de 2018 est&aacute; se tornando um dos meses mais movimentados para o mercado de tecnologia, especialmente no que diz respeito a smartphones. Al&eacute;m de eventos da Motorola, LG, Huawei, Google, OnePlus e Samsung, a Nokia tamb&eacute;m resolveu entrar na festa e</p>','sim','nokia-7plus','Administrador','0','2018-09-20 23:02:50'),(20,'The Flash','<p>Depois de ser atingido por um raio, Barry Allen acorda de seu coma para descobrir que recebeu o poder da super velocidade, se tornando o Flash, lutando contra o crime em Central City.</p>','sim','serie-the-flash','Administrador','0','2018-09-21 03:09:30'),(21,'Lorem Ipsum','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non dolor at eros hendrerit luctus a eu ex. Praesent vulputate sagittis sapien, non cursus nulla consectetur eu.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non dolor at eros h</p>','sim','lorem-ipsum','Administrador','0','2018-09-21 13:24:44'),(24,'The Big Bang Theory','<p>Uma mulher que se muda para um apartamento do outro lado do corredor de dois f&iacute;sicos brilhantes, mas socialmente desajeitados, mostra-lhes o qu&atilde;o pouco sabem sobre a vida fora do laborat&oacute;rio.</p>','sim','the-big-bang-theory','Administrador','0','2018-09-21 13:28:16'),(25,'Testando','<p>Testando</p>','sim','testando','Administrador','0','2018-09-21 13:31:24'),(29,'Mr Robot','<p>Elliot, um brilhante mas altamente inst&aacute;vel jovem engenheiro de seguran&ccedil;a cibern&eacute;tica e hacker vigilante, torna-se uma figura chave em um jogo complexo de dom&iacute;nio global quando ele e seus aliados sombrios tentam derrubar a corpora&ccedil;&atilde;o corrupta para a</p>','sim','mr-robot','Patrick Chagas','0','2018-09-21 15:01:56'),(30,'Code','<p>Web Developer</p>','sim','code-web-developer','Administrador','0','2018-09-22 03:37:45'),(31,'Ai vocÃª passa...','<p>Ai voc&ecirc; passa...</p>','sim','alanzoka','Administrador','0','2018-09-22 03:44:44'),(32,'FIFA 19 terÃ¡ seleÃ§Ã£o brasileira com nomes genÃ©ricos','<p>Somente Neymar possui um avatar fidedigno no game Com lan&ccedil;amento marcado para dia 25 de setembro, FIFA 19 pode decepcionar aqueles que queriam usar a sele&ccedil;&atilde;o de Philippe Coutinho, Marcelo e Casemiro: a escala&ccedil;&atilde;o do time brasileiro no game &eacute; gen&eacute;ri</p>','sim','fifa-19-tera-selecao-brasileira-com-nomes-genericos','Administrador','0','2018-09-22 17:12:36'),(33,'Web Developer','<p><strong><span style=\"color: #222222; font-family: sans-serif;\">Este &eacute; o profissional que trabalha desenvolvendo websites, podendo ser um Web Designer (Desenvolvedor do Layout), ou Web Developer(Desenvolvedor de sistemas).&nbsp;</span></strong></p>','sim','web-developer','Administrador','0','2018-09-25 03:42:51'),(37,'OlÃ¡ Mundo!','<p><strong>Ol&aacute; Mundo!</strong></p>','sim','ola-mundo','Administrador','0','2018-09-27 15:22:28');
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
INSERT INTO `tb_postscategories` VALUES (1,9),(1,14),(7,4),(7,14),(20,9),(20,12),(21,14),(24,9),(24,12),(29,9),(29,11),(30,4),(31,15),(32,3),(33,4),(37,4);
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
  `desurl` varchar(250) DEFAULT NULL,
  `inadmin` tinyint(4) NOT NULL,
  `status` int(11) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timeloginconnect` varchar(200) DEFAULT NULL,
  `timelogindisconnect` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`iduser`),
  KEY `fk_users_persons_idx` (`idperson`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_users`
--

LOCK TABLES `tb_users` WRITE;
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` VALUES (50,54,'patrickchagas21@gmail.com','$2y$12$dS1UTNEfyWcjO.tllhlEsOUTbRRMAHDoyy2KVXw48XG4XnAPOrLEa',NULL,0,1539484330,'2018-09-25 02:52:05','14/10/2018 18:48:01','14/10/2018 18:48:08'),(52,56,'suporte','$2y$12$WLvbVqYBRE4Y5P.WVou/feCbkdlqyK81dsEk8iHBEa3yLfThHKFbO','suporte-perfil',1,1539484330,'2018-09-27 13:46:55','',NULL),(53,57,'admin','$2y$12$LGyAK9Qch6wxHjQ7dvunS.aqIbWVrQKwIe64SpnwI6yoZhBv3BU1y','admin-patrick',1,1539484330,'2018-09-27 21:57:36','14/10/2018 18:53:17','0');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_userspasswordsrecoveries`
--

LOCK TABLES `tb_userspasswordsrecoveries` WRITE;
/*!40000 ALTER TABLE `tb_userspasswordsrecoveries` DISABLE KEYS */;
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
-- Table structure for table `tb_visits`
--

DROP TABLE IF EXISTS `tb_visits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_visits` (
  `idvisits` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(40) NOT NULL,
  `data` varchar(30) NOT NULL,
  `hora` varchar(30) NOT NULL,
  PRIMARY KEY (`idvisits`)
) ENGINE=InnoDB AUTO_INCREMENT=245 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_visits`
--

LOCK TABLES `tb_visits` WRITE;
/*!40000 ALTER TABLE `tb_visits` DISABLE KEYS */;
INSERT INTO `tb_visits` VALUES (1,'127.0.0.1','2018/10/12','09:21'),(2,'218.161.125.224','2018/10/12','09:21'),(3,'127.0.0.1','2018/10/12','09:23'),(4,'127.0.0.1','2018/10/12','09:25'),(5,'127.0.0.1','2018/10/12','09:25'),(6,'127.0.0.1','2018/10/12','09:29'),(7,'127.0.0.1','2018/10/12','09:30'),(8,'127.0.0.1','2018/10/12','09:30'),(9,'127.0.0.1','2018/10/12','09:31'),(10,'127.0.0.1','2018/10/12','09:32'),(11,'127.0.0.1','2018/10/12','09:32'),(12,'127.0.0.1','2018/10/12','09:32'),(13,'127.0.0.1','2018/10/12','09:34'),(14,'127.0.0.1','2018/10/12','09:34'),(15,'127.0.0.1','2018/10/12','09:34'),(16,'127.0.0.1','2018/10/12','09:38'),(17,'127.0.0.1','2018/10/12','09:43'),(18,'127.0.0.1','2018/10/12','09:43'),(19,'127.0.0.1','2018/10/12','09:43'),(20,'127.0.0.1','2018/10/12','09:46'),(21,'127.0.0.1','2018/10/12','10:14'),(22,'127.0.0.1','2018/10/12','10:23'),(23,'127.0.0.1','2018/10/12','10:31'),(24,'127.0.0.1','2018/10/12','10:31'),(25,'127.0.0.1','2018/10/12','10:49'),(26,'127.0.0.1','2018/10/12','10:49'),(27,'127.0.0.1','2018/10/12','10:49'),(28,'127.0.0.1','2018/10/12','10:50'),(29,'127.0.0.1','2018/10/12','17:55'),(30,'127.0.0.1','2018/10/12','17:55'),(31,'127.0.0.1','2018/10/12','17:55'),(32,'127.0.0.1','2018/10/12','17:56'),(33,'127.0.0.1','2018/10/12','17:56'),(34,'127.0.0.1','2018/10/12','17:56'),(35,'127.0.0.1','2018/10/12','17:56'),(36,'127.0.0.1','2018/10/12','17:56'),(37,'127.0.0.1','2018/10/12','17:56'),(38,'127.0.0.1','2018/10/12','17:56'),(39,'127.0.0.1','2018/10/12','17:56'),(40,'127.0.0.1','2018/10/12','17:56'),(41,'127.0.0.1','2018/10/12','17:56'),(42,'127.0.0.1','2018/10/12','17:56'),(43,'127.0.0.1','2018/10/12','17:57'),(44,'127.0.0.1','2018/10/12','17:57'),(45,'127.0.0.1','2018/10/12','17:57'),(46,'127.0.0.1','2018/10/12','17:57'),(47,'127.0.0.1','2018/10/12','17:58'),(48,'127.0.0.1','2018/10/12','18:09'),(49,'127.0.0.1','2018/10/12','18:10'),(50,'127.0.0.1','2018/10/12','18:11'),(51,'127.0.0.1','2018/10/12','18:21'),(52,'127.0.0.1','2018/10/12','18:22'),(53,'127.0.0.1','2018/10/12','18:26'),(54,'127.0.0.1','2018/10/12','18:29'),(55,'127.0.0.1','2018/10/12','18:29'),(56,'127.0.0.1','2018/10/12','18:30'),(57,'127.0.0.1','2018/10/12','18:30'),(58,'127.0.0.1','2018/10/12','18:30'),(59,'127.0.0.1','2018/10/12','18:31'),(60,'127.0.0.1','2018/10/12','18:31'),(61,'127.0.0.1','2018/10/12','18:31'),(62,'127.0.0.1','2018/10/12','18:32'),(63,'127.0.0.1','2018/10/12','18:57'),(64,'127.0.0.1','2018/10/12','19:03'),(65,'127.0.0.1','2018/10/12','19:03'),(66,'127.0.0.1','2018/10/12','19:05'),(67,'127.0.0.1','2018/10/12','19:06'),(68,'127.0.0.1','2018/10/12','19:07'),(69,'127.0.0.1','2018/10/12','19:10'),(70,'127.0.0.1','2018/10/12','19:10'),(71,'127.0.0.1','2018/10/12','19:10'),(72,'127.0.0.1','2018/10/12','19:10'),(73,'127.0.0.1','2018/10/12','19:11'),(74,'127.0.0.1','2018/10/12','19:11'),(75,'127.0.0.1','2018/10/12','19:11'),(76,'127.0.0.1','2018/10/12','19:11'),(77,'127.0.0.1','2018/10/12','19:11'),(78,'127.0.0.1','2018/10/12','19:11'),(79,'127.0.0.1','2018/10/12','19:11'),(80,'127.0.0.1','2018/10/12','19:11'),(81,'127.0.0.1','2018/10/12','19:12'),(82,'127.0.0.1','2018/10/12','19:12'),(83,'127.0.0.1','2018/10/12','19:12'),(84,'127.0.0.1','2018/10/12','19:12'),(85,'127.0.0.1','2018/10/12','19:12'),(86,'127.0.0.1','2018/10/12','19:12'),(87,'127.0.0.1','2018/10/12','19:12'),(88,'127.0.0.1','2018/10/12','19:12'),(89,'127.0.0.1','2018/10/12','19:12'),(90,'127.0.0.1','2018/10/12','19:12'),(91,'127.0.0.1','2018/10/12','19:12'),(92,'127.0.0.1','2018/10/12','19:12'),(93,'127.0.0.1','2018/10/12','19:12'),(94,'127.0.0.1','2018/10/12','19:12'),(95,'127.0.0.1','2018/10/12','19:13'),(96,'127.0.0.1','2018/10/12','19:13'),(97,'127.0.0.1','2018/10/12','19:13'),(98,'127.0.0.1','2018/10/12','19:13'),(99,'127.0.0.1','2018/10/12','19:13'),(100,'127.0.0.1','2018/10/12','19:13'),(101,'127.0.0.1','2018/10/12','19:13'),(102,'127.0.0.1','2018/10/12','19:13'),(103,'127.0.0.1','2018/10/12','19:14'),(104,'127.0.0.1','2018/10/12','19:14'),(105,'127.0.0.1','2018/10/12','19:16'),(106,'127.0.0.1','2018/10/12','19:16'),(107,'127.0.0.1','2018/10/12','19:16'),(108,'127.0.0.1','2018/10/12','19:16'),(109,'127.0.0.1','2018/10/12','19:16'),(110,'127.0.0.1','2018/10/12','19:16'),(111,'127.0.0.1','2018/10/12','19:16'),(112,'127.0.0.1','2018/10/12','19:16'),(113,'127.0.0.1','2018/10/12','19:16'),(114,'127.0.0.1','2018/10/12','19:16'),(115,'127.0.0.1','2018/10/12','19:17'),(116,'127.0.0.1','2018/10/12','19:17'),(117,'127.0.0.1','2018/10/12','19:17'),(118,'127.0.0.1','2018/10/12','19:17'),(119,'127.0.0.1','2018/10/12','19:17'),(120,'127.0.0.1','2018/10/12','19:17'),(121,'127.0.0.1','2018/10/12','19:17'),(122,'127.0.0.1','2018/10/12','19:17'),(123,'127.0.0.1','2018/10/12','19:17'),(124,'127.0.0.1','2018/10/12','19:17'),(125,'127.0.0.1','2018/10/12','19:17'),(126,'127.0.0.1','2018/10/12','19:17'),(127,'127.0.0.1','2018/10/12','19:17'),(128,'127.0.0.1','2018/10/12','19:17'),(129,'127.0.0.1','2018/10/12','19:17'),(130,'127.0.0.1','2018/10/12','19:17'),(131,'127.0.0.1','2018/10/12','19:17'),(132,'127.0.0.1','2018/10/12','19:18'),(133,'127.0.0.1','2018/10/12','19:18'),(134,'127.0.0.1','2018/10/12','19:18'),(135,'127.0.0.1','2018/10/12','19:18'),(136,'127.0.0.1','2018/10/12','19:18'),(137,'127.0.0.1','2018/10/12','19:18'),(138,'127.0.0.1','2018/10/12','19:18'),(139,'127.0.0.1','2018/10/12','19:18'),(140,'127.0.0.1','2018/10/12','19:18'),(141,'127.0.0.1','2018/10/12','19:18'),(142,'127.0.0.1','2018/10/12','19:18'),(143,'127.0.0.1','2018/10/12','19:18'),(144,'127.0.0.1','2018/10/12','19:18'),(145,'127.0.0.1','2018/10/12','19:18'),(146,'127.0.0.1','2018/10/12','19:18'),(147,'127.0.0.1','2018/10/12','19:19'),(148,'127.0.0.1','2018/10/12','19:19'),(149,'127.0.0.1','2018/10/12','19:19'),(150,'127.0.0.1','2018/10/12','19:19'),(151,'127.0.0.1','2018/10/12','19:19'),(152,'127.0.0.1','2018/10/12','19:19'),(153,'127.0.0.1','2018/10/12','19:19'),(154,'127.0.0.1','2018/10/12','19:19'),(155,'127.0.0.1','2018/10/12','19:21'),(156,'127.0.0.1','2018/10/12','19:22'),(157,'127.0.0.1','2018/10/12','23:15'),(158,'127.0.0.1','2018/10/12','23:15'),(159,'127.0.0.1','2018/10/12','23:15'),(160,'127.0.0.1','2018/10/13','10:15'),(161,'127.0.0.1','2018/10/13','10:16'),(162,'127.0.0.1','2018/10/13','10:17'),(163,'127.0.0.1','2018/10/13','10:35'),(164,'127.0.0.1','2018/10/13','10:37'),(165,'127.0.0.1','2018/10/13','10:50'),(166,'127.0.0.1','2018/10/13','10:50'),(167,'127.0.0.1','2018/10/13','10:50'),(168,'127.0.0.1','2018/10/13','10:50'),(169,'127.0.0.1','2018/10/13','10:50'),(170,'127.0.0.1','2018/10/13','10:51'),(171,'127.0.0.1','2018/10/13','10:52'),(172,'127.0.0.1','2018/10/13','10:53'),(173,'127.0.0.1','2018/10/13','10:55'),(174,'127.0.0.1','2018/10/13','10:55'),(175,'127.0.0.1','2018/10/13','10:56'),(176,'127.0.0.1','2018/10/13','10:56'),(177,'127.0.0.1','2018/10/13','10:58'),(178,'127.0.0.1','2018/10/13','10:58'),(179,'127.0.0.1','2018/10/13','10:58'),(180,'127.0.0.1','2018/10/13','10:58'),(181,'127.0.0.1','2018/10/13','10:59'),(182,'127.0.0.1','2018/10/13','10:59'),(183,'127.0.0.1','2018/10/13','10:59'),(184,'127.0.0.1','2018/10/13','10:59'),(185,'127.0.0.1','2018/10/13','10:59'),(186,'127.0.0.1','2018/10/13','11:00'),(187,'127.0.0.1','2018/10/13','11:00'),(188,'127.0.0.1','2018/10/13','11:00'),(189,'127.0.0.1','2018/10/13','11:00'),(190,'127.0.0.1','2018/10/13','11:01'),(191,'127.0.0.1','2018/10/13','11:01'),(192,'127.0.0.1','2018/10/13','11:02'),(193,'127.0.0.1','2018/10/13','11:02'),(194,'127.0.0.1','2018/10/13','11:39'),(195,'127.0.0.1','2018/10/13','11:39'),(196,'127.0.0.1','2018/10/13','11:39'),(197,'127.0.0.1','2018/10/13','11:39'),(198,'127.0.0.1','2018/10/13','11:43'),(199,'127.0.0.1','2018/10/13','11:43'),(200,'127.0.0.1','2018/10/13','11:44'),(201,'127.0.0.1','2018/10/13','11:44'),(202,'127.0.0.1','2018/10/13','11:45'),(203,'127.0.0.1','2018/10/13','19:47'),(204,'127.0.0.1','2018/10/13','19:51'),(205,'127.0.0.1','2018/10/13','19:52'),(206,'127.0.0.1','2018/10/13','19:53'),(207,'127.0.0.1','2018/10/13','20:59'),(208,'127.0.0.1','2018/10/13','21:00'),(209,'127.0.0.1','2018/10/13','21:00'),(210,'127.0.0.1','2018/10/13','21:00'),(211,'127.0.0.1','2018/10/13','21:00'),(212,'127.0.0.1','2018/10/13','21:00'),(213,'127.0.0.1','2018/10/13','21:01'),(214,'127.0.0.1','2018/10/13','21:01'),(215,'127.0.0.1','2018/10/13','21:01'),(216,'127.0.0.1','2018/10/13','21:02'),(217,'127.0.0.1','2018/10/13','21:02'),(218,'127.0.0.1','2018/10/13','21:02'),(219,'127.0.0.1','2018/10/13','21:05'),(220,'127.0.0.1','2018/10/13','21:13'),(221,'127.0.0.1','2018/10/13','21:13'),(222,'127.0.0.1','2018/10/14','04:33'),(223,'127.0.0.1','2018/10/14','04:33'),(224,'127.0.0.1','2018/10/14','04:34'),(225,'127.0.0.1','2018/10/14','04:34'),(226,'127.0.0.1','2018/10/14','04:35'),(227,'127.0.0.1','2018/10/14','04:55'),(228,'127.0.0.1','2018/10/14','04:55'),(229,'127.0.0.1','2018/10/14','04:56'),(230,'127.0.0.1','2018/10/14','05:06'),(231,'127.0.0.1','2018/10/14','05:07'),(232,'127.0.0.1','2018/10/14','14:03'),(233,'127.0.0.1','2018/10/14','14:03'),(234,'127.0.0.1','2018/10/14','14:03'),(235,'127.0.0.1','2018/10/14','14:03'),(236,'127.0.0.1','2018/10/14','14:03'),(237,'127.0.0.1','2018/10/14','14:03'),(238,'127.0.0.1','2018/10/14','14:03'),(239,'127.0.0.1','2018/10/14','14:03'),(240,'127.0.0.1','2018/10/14','14:04'),(241,'127.0.0.1','2018/10/14','14:07'),(242,'127.0.0.1','2018/10/14','16:42'),(243,'127.0.0.1','2018/10/14','16:43'),(244,'127.0.0.1','2018/10/14','23:38');
/*!40000 ALTER TABLE `tb_visits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_blog'
--

--
-- Dumping routines for database 'db_blog'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_answers_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_answers_save`(
pidanswer int(11),
pnameuser varchar(150),
pemail varchar(150),
pphone varchar(20),
pmessage text,
panswer text,
pidentification varchar(250),
pactive varchar(10)
)
BEGIN
	
	IF pidanswer > 0 THEN
		
		UPDATE tb_answers
        SET 
			nameuser = pnameuser,
            email = pemail,
            phone = pphone,
            message = pmessage,
            answer = panswer,
            identification = pidentification,
            active = pactive
        WHERE idanswer = pidanswer;
        
    ELSE
		
		INSERT INTO tb_answers (nameuser, email, phone, message, answer, identification, active) 
        VALUES(pnameuser, pemail, pphone, pmessage, panswer, pidentification, pactive);
        
        SET pidanswer = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_answers WHERE idanswer = pidanswer;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
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
/*!50003 DROP PROCEDURE IF EXISTS `sp_comments_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_comments_save`(
pidcomment int(11),
pnameuser varchar(150),
pemail varchar(150),
pphone varchar(20),
pmessage text,
pidentification varchar(250),
pactive varchar(10)
)
BEGIN
	
	IF pidcomment > 0 THEN
		
		UPDATE tb_comments
        SET 
			nameuser = pnameuser,
            email = pemail,
            phone = pphone,
            message = pmessage,
            identification = pidentification,
            active = pactive
        WHERE idcomment = pidcomment;
        
    ELSE
		
		INSERT INTO tb_comments (nameuser, email, phone, message, identification, active) 
        VALUES(pnameuser, pemail, pphone, pmessage, pidentification, pactive);
        
        SET pidcomment = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_comments WHERE idcomment = pidcomment;
    
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
pdespassword VARCHAR(256),
pdesurl VARCHAR(255), 
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
        despassword = pdespassword,
        desurl = pdesurl,
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
pdespassword VARCHAR(256),
pdesurl varchar(255), 
pemail VARCHAR(128), 
pphone BIGINT, 
pinadmin TINYINT
)
BEGIN
	
    DECLARE vidperson INT;
    
	INSERT INTO tb_persons (person, email, phone)
    VALUES(pperson, pemail, pphone);
    
    SET vidperson = LAST_INSERT_ID();
    
    INSERT INTO tb_users (idperson, login, despassword, desurl, inadmin)
    VALUES(vidperson, plogin, pdespassword, pdesurl, pinadmin);
    
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

-- Dump completed on 2018-10-14 19:01:38
