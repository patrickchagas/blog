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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_comments`
--

LOCK TABLES `tb_comments` WRITE;
/*!40000 ALTER TABLE `tb_comments` DISABLE KEYS */;
INSERT INTO `tb_comments` VALUES (1,'Administrador','aulascursophp7@gmail.com','2122223333','<p>Mr Robot</p>','mr-robot','sim','2018-09-28 10:24:32'),(2,'Administrador','aulascursophp7@gmail.com','2122223333','<p>The Flash</p>','serie-the-flash','sim','2018-09-28 10:24:50'),(3,'Administrador','aulascursophp7@gmail.com','2122223333','<p>Mr Robot 2</p>','mr-robot','sim','2018-09-28 15:33:31'),(4,'Patrick','aulascursophp7@gmail.com','2122223333','<p>&Oacute;tima s&eacute;rie!!!</p>','serie-the-flash','sim','2018-09-28 15:34:24'),(6,'Administrador','aulascursophp7@gmail.com','2122223333','<p>Uma das melhores s&eacute;ries que j&aacute; assisti, pena que cancelaram!</p>','scorpion-serie','sim','2018-09-28 15:50:35'),(7,'Patrick','patrickchagas21@gmail.com','2122223333','<p>Mr robot &eacute; mt bom!!</p>','mr-robot','sim','2018-10-09 12:09:55'),(8,'AnÃ´nimo','teste@teste.com.br','2122223333','<p>teste</p>','mr-robot','sim','2018-10-15 16:01:48');
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
  PRIMARY KEY (`idpost`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_posts`
--

LOCK TABLES `tb_posts` WRITE;
/*!40000 ALTER TABLE `tb_posts` DISABLE KEYS */;
INSERT INTO `tb_posts` VALUES (1,'Scorpion','<p><strong>Um g&ecirc;nio exc&ecirc;ntrico forma uma rede internacional de superg&ecirc;nios para atuar como a &uacute;ltima linha de defesa contra as amea&ccedil;as complexas do mundo moderno.</strong></p>\r\n<h2>&nbsp;</h2>\r\n<h2>Enredo</h2>\r\n<p style=\"margin: 0.5em 0px; line-height: inherit; color: #222222; font-family: sans-serif;\">Inspirado em uma hist&oacute;ria real, conta a hist&oacute;ria do exc&ecirc;ntrico g&ecirc;nio,<a style=\"text-decoration-line: none; color: #0b0080; background: none;\" title=\"Walter O\'Brien\" href=\"https://pt.wikipedia.org/wiki/Walter_O%27Brien\">Walter O\'Brien</a>, e de sua equipe composta por um comportamentalista(<a class=\"mw-redirect\" style=\"text-decoration-line: none; color: #0b0080; background: none;\" title=\"Behaviorista\" href=\"https://pt.wikipedia.org/wiki/Behaviorista\">Behaviorismo</a>), Toby, uma calculadora humana, Sylvester, e uma prod&iacute;gio da mec&acirc;nica, Happy. Todos s&atilde;o pessoas &oacute;timas de esp&iacute;rito, mas que n&atilde;o conseguem se socializar com a maioria das pessoas e por isso recebem a ajuda de uma ex atendente de lanchonete chamada Paige que tem um filho g&ecirc;nio, Ralph.</p>\r\n<p style=\"margin: 0.5em 0px; line-height: inherit; color: #222222; font-family: sans-serif;\">Quando um problema s&eacute;rio surge no espa&ccedil;o a&eacute;reo americano o agente Cabe Gallo resolve recrutar a equipe de g&ecirc;nios, j&aacute; que n&atilde;o existe nenhuma outra equipe capaz de resolver o problema. A partir da&iacute;, e agora com o apoio do governo, eles se tornam oficialmente a equipe Scorpion e transformam-se na &uacute;ltima linha de defesa contra amea&ccedil;as complexas ao redor do mundo.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>','sim','scorpion-serie','Patrick Chagas','20'),(7,'Nokia marca evento de lanÃ§amento para 04/10; saiba o que mais vem por aÃ­...','<p>Outubro de 2018 est&aacute; se tornando um dos meses mais movimentados para o mercado de tecnologia, especialmente no que diz respeito a smartphones. Al&eacute;m de eventos da Motorola, LG, Huawei, Google, OnePlus e Samsung, a Nokia tamb&eacute;m resolveu entrar na festa e</p>','sim','nokia-7plus','Administrador','0'),(20,'The Flash','<p>Depois de ser atingido por um raio, Barry Allen acorda de seu coma para descobrir que recebeu o poder da super velocidade, se tornando o Flash, lutando contra o crime em Central City.</p>','sim','serie-the-flash','Administrador','0'),(21,'Lorem Ipsum','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non dolor at eros hendrerit luctus a eu ex. Praesent vulputate sagittis sapien, non cursus nulla consectetur eu.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non dolor at eros h</p>','sim','lorem-ipsum','Administrador','0'),(24,'The Big Bang Theory','<p>Uma mulher que se muda para um apartamento do outro lado do corredor de dois f&iacute;sicos brilhantes, mas socialmente desajeitados, mostra-lhes o qu&atilde;o pouco sabem sobre a vida fora do laborat&oacute;rio.</p>','sim','the-big-bang-theory','Administrador','0'),(25,'Testando','<p>Testando</p>','sim','testando','Administrador','0'),(29,'Mr Robot','<p>Elliot, um brilhante mas altamente inst&aacute;vel jovem engenheiro de seguran&ccedil;a cibern&eacute;tica e hacker vigilante, torna-se uma figura chave em um jogo complexo de dom&iacute;nio global quando ele e seus aliados sombrios tentam derrubar a corpora&ccedil;&atilde;o corrupta para a</p>','sim','mr-robot','Patrick Chagas','0'),(30,'Code','<p>Web Developer</p>','sim','code-web-developer','Administrador','0'),(31,'Ai vocÃª passa...','<p>Ai voc&ecirc; passa...</p>','sim','alanzoka','Administrador','0'),(32,'FIFA 19 terÃ¡ seleÃ§Ã£o brasileira com nomes genÃ©ricos','<p>Somente Neymar possui um avatar fidedigno no game Com lan&ccedil;amento marcado para dia 25 de setembro, FIFA 19 pode decepcionar aqueles que queriam usar a sele&ccedil;&atilde;o de Philippe Coutinho, Marcelo e Casemiro: a escala&ccedil;&atilde;o do time brasileiro no game &eacute; gen&eacute;ri</p>','sim','fifa-19-tera-selecao-brasileira-com-nomes-genericos','Administrador','0'),(33,'Web Developer','<p><strong><span style=\"color: #222222; font-family: sans-serif;\">Este &eacute; o profissional que trabalha desenvolvendo websites, podendo ser um Web Designer (Desenvolvedor do Layout), ou Web Developer(Desenvolvedor de sistemas).&nbsp;</span></strong></p>','sim','web-developer','Administrador','0'),(37,'OlÃ¡ Mundo!','<p><strong>Ol&aacute; Mundo!</strong></p>','sim','ola-mundo','Administrador','0');
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
-- Table structure for table `tb_ratings`
--

DROP TABLE IF EXISTS `tb_ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_ratings` (
  `idrating` int(11) NOT NULL AUTO_INCREMENT,
  `likes` varchar(45) NOT NULL DEFAULT '0',
  `dislike` varchar(45) NOT NULL DEFAULT '0',
  `ipuser` varchar(45) NOT NULL,
  `desurl` varchar(200) NOT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`idrating`),
  KEY `fk_ratings_posts_idx` (`desurl`),
  KEY `fk_ratings_users_idx` (`iduser`),
  CONSTRAINT `fk_ratings_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_ratings`
--

LOCK TABLES `tb_ratings` WRITE;
/*!40000 ALTER TABLE `tb_ratings` DISABLE KEYS */;
INSERT INTO `tb_ratings` VALUES (1,'3','0','127.0.0.1','mr-robot',50),(2,'1','0','127.0.0.1','scorpion-serie',50),(3,'1','0','127.0.0.1','lorem-ipsum',50),(4,'1','0','127.0.0.1','ola-mundo',50),(5,'1','0','127.0.0.1','web-developer',50),(6,'1','0','127.0.0.1','fifa-19-tera-selecao-brasileira-com-nomes-genericos',50),(7,'1','0','127.0.0.1','scorpion-serie',53),(8,'0','1','127.0.0.1','nokia-7plus',53),(9,'1','0','127.0.0.1','testando',53);
/*!40000 ALTER TABLE `tb_ratings` ENABLE KEYS */;
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
  `status` varchar(12) NOT NULL,
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
INSERT INTO `tb_users` VALUES (50,54,'patrickchagas21@gmail.com','$2y$12$dS1UTNEfyWcjO.tllhlEsOUTbRRMAHDoyy2KVXw48XG4XnAPOrLEa',NULL,0,'Offline','2018-09-25 02:52:05','19/10/2018 20:51:16','19/10/2018 23:25:28'),(52,56,'suporte','$2y$12$WLvbVqYBRE4Y5P.WVou/feCbkdlqyK81dsEk8iHBEa3yLfThHKFbO','suporte-perfil',1,'Offline','2018-09-27 13:46:55','15/10/2018 00:14:30','15/10/2018 00:15:03'),(53,57,'admin','$2y$12$LGyAK9Qch6wxHjQ7dvunS.aqIbWVrQKwIe64SpnwI6yoZhBv3BU1y','admin-patrick',1,'Online','2018-09-27 21:57:36','19/10/2018 23:21:05','0');
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
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_visits`
--

LOCK TABLES `tb_visits` WRITE;
/*!40000 ALTER TABLE `tb_visits` DISABLE KEYS */;
INSERT INTO `tb_visits` VALUES (1,'127.0.0.1','2018/10/15','23:21'),(2,'127.0.0.1','2018/10/15','23:29'),(3,'127.0.0.1','2018/10/15','23:33'),(4,'127.0.0.1','2018/10/15','23:35'),(5,'127.0.0.1','2018/10/16','00:37'),(6,'127.0.0.1','2018/10/16','00:38'),(7,'127.0.0.1','2018/10/16','00:51'),(8,'127.0.0.1','2018/10/16','00:55'),(9,'127.0.0.1','2018/10/16','00:56'),(10,'127.0.0.1','2018/10/16','10:53'),(11,'127.0.0.1','2018/10/16','10:56'),(12,'127.0.0.1','2018/10/16','18:17'),(13,'127.0.0.1','2018/10/16','19:00'),(14,'127.0.0.1','2018/10/16','19:00'),(15,'127.0.0.1','2018/10/16','19:00'),(16,'127.0.0.1','2018/10/16','19:03'),(17,'127.0.0.1','2018/10/16','19:09'),(18,'127.0.0.1','2018/10/16','19:09'),(19,'127.0.0.1','2018/10/16','19:09'),(20,'127.0.0.1','2018/10/17','09:39'),(21,'127.0.0.1','2018/10/17','09:48'),(22,'127.0.0.1','2018/10/17','09:58'),(23,'127.0.0.1','2018/10/17','10:52'),(24,'127.0.0.1','2018/10/17','10:52'),(25,'127.0.0.1','2018/10/17','10:52'),(26,'127.0.0.1','2018/10/17','10:54'),(27,'127.0.0.1','2018/10/17','10:55'),(28,'127.0.0.1','2018/10/17','10:55'),(29,'127.0.0.1','2018/10/17','10:56'),(30,'127.0.0.1','2018/10/17','11:18'),(31,'127.0.0.1','2018/10/17','11:20'),(32,'127.0.0.1','2018/10/17','11:20'),(33,'127.0.0.1','2018/10/17','11:32'),(34,'127.0.0.1','2018/10/17','11:32'),(35,'127.0.0.1','2018/10/17','19:31'),(36,'127.0.0.1','2018/10/17','19:40'),(37,'127.0.0.1','2018/10/17','19:41'),(38,'127.0.0.1','2018/10/17','19:48'),(39,'127.0.0.1','2018/10/17','19:50'),(40,'127.0.0.1','2018/10/17','19:50'),(41,'127.0.0.1','2018/10/17','19:51'),(42,'127.0.0.1','2018/10/17','22:07'),(43,'127.0.0.1','2018/10/17','22:07'),(44,'127.0.0.1','2018/10/17','22:07'),(45,'127.0.0.1','2018/10/17','22:19'),(46,'127.0.0.1','2018/10/17','23:01'),(47,'127.0.0.1','2018/10/17','23:30'),(48,'127.0.0.1','2018/10/18','10:04'),(49,'127.0.0.1','2018/10/18','10:04'),(50,'127.0.0.1','2018/10/18','10:07'),(51,'127.0.0.1','2018/10/18','10:08'),(52,'127.0.0.1','2018/10/18','11:18'),(53,'127.0.0.1','2018/10/18','22:01'),(54,'127.0.0.1','2018/10/18','22:21'),(55,'127.0.0.1','2018/10/18','23:15'),(56,'127.0.0.1','2018/10/18','23:41'),(57,'127.0.0.1','2018/10/18','23:46'),(58,'127.0.0.1','2018/10/18','23:55'),(59,'127.0.0.1','2018/10/18','23:55'),(60,'127.0.0.1','2018/10/18','23:56'),(61,'127.0.0.1','2018/10/18','23:56'),(62,'127.0.0.1','2018/10/18','23:57'),(63,'127.0.0.1','2018/10/19','18:54'),(64,'127.0.0.1','2018/10/19','19:03'),(65,'127.0.0.1','2018/10/19','19:10'),(66,'127.0.0.1','2018/10/19','19:11'),(67,'127.0.0.1','2018/10/19','19:43'),(68,'127.0.0.1','2018/10/19','19:54'),(69,'127.0.0.1','2018/10/19','20:50'),(70,'127.0.0.1','2018/10/19','20:51'),(71,'127.0.0.1','2018/10/19','20:51'),(72,'127.0.0.1','2018/10/19','20:51'),(73,'127.0.0.1','2018/10/19','21:52'),(74,'127.0.0.1','2018/10/19','21:52'),(75,'127.0.0.1','2018/10/19','21:52'),(76,'127.0.0.1','2018/10/19','21:52'),(77,'127.0.0.1','2018/10/19','21:53'),(78,'127.0.0.1','2018/10/19','22:04'),(79,'127.0.0.1','2018/10/19','22:05'),(80,'127.0.0.1','2018/10/19','22:06'),(81,'127.0.0.1','2018/10/19','22:24'),(82,'127.0.0.1','2018/10/19','22:58'),(83,'127.0.0.1','2018/10/19','22:58'),(84,'127.0.0.1','2018/10/19','22:58'),(85,'127.0.0.1','2018/10/19','23:13'),(86,'127.0.0.1','2018/10/19','23:21'),(87,'127.0.0.1','2018/10/19','23:21'),(88,'127.0.0.1','2018/10/19','23:21'),(89,'127.0.0.1','2018/10/19','23:24'),(90,'127.0.0.1','2018/10/19','23:24'),(91,'127.0.0.1','2018/10/19','23:24'),(92,'127.0.0.1','2018/10/19','23:24'),(93,'127.0.0.1','2018/10/19','23:24'),(94,'127.0.0.1','2018/10/19','23:24'),(95,'127.0.0.1','2018/10/19','23:24'),(96,'127.0.0.1','2018/10/19','23:25'),(97,'127.0.0.1','2018/10/19','23:25'),(98,'127.0.0.1','2018/10/19','23:25'),(99,'127.0.0.1','2018/10/19','23:27');
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

-- Dump completed on 2018-10-19 23:30:21
