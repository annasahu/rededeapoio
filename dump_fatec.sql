-- MySQL dump 10.13  Distrib 8.0.26, for Linux (x86_64)
--
-- Host: localhost    Database: fatec
-- ------------------------------------------------------
-- Server version	8.0.26-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `idCategoria` int NOT NULL AUTO_INCREMENT,
  `nomeCategoria` varchar(200) DEFAULT NULL,
  `pontuacaoCategoria` int DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Acessorios',50),(2,'Bengalas',200),(3,'Cadeira de Banho',600),(4,'Cadeira de Rodas',600),(5,'Muletas',300),(6,'Sapatos',100);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produtos` (
  `idProduto` int NOT NULL AUTO_INCREMENT,
  `idCategoria` int DEFAULT NULL,
  `nomeProduto` varchar(200) DEFAULT NULL,
  `descricaoProduto` text,
  `quantidadeProduto` int DEFAULT NULL,
  `idUsuario` int DEFAULT NULL,
  `imagemProduto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idProduto`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (17,6,'Tênis Grand Court Base','Este tênis da Adidas inspirado nos anos 70 tem cabedal sintético macio. Uma mistura dos vários estilos celebrados nas quadras.',2,2,'Tenis_Grand_Court_Base.jpeg'),(19,2,'Bengala em alumínio 4 pontas','A Bengala de Alumínio com 4 pontas da Indaia é prática e durável. Com oito níveis de regulagem de altura através de pino de fácil ajuste. Indicada para auxiliar o equilíbrio na caminhada ou marcha.',3,2,'Bengala_em_alumínio_4_pontas.jpeg'),(20,4,'Cadeira de Rodas Simples','A cadeira Prolife é durável e resistente. Fabricada em aço carbono. Os freios bilaterais proporcionam segurança. Para seu conforto o encosto e o assento são em nylon. A cadeira é dobrável. Este modelo possui pneus infláveis e tem capacidade para até 90 kg.',1,3,'Cadeira_Rodas_Simples.jpeg'),(21,3,'Cadeira de banho em aluminio com coletor','A cadeira de banho higiênica reforçada com assento estofado e coletor D60 Dellamed é ideal para usuários com dificuldade de locomoção, sendo indicada para o uso sanitário e chuveiro.',1,3,'Cadeira_Banho_Aluminio.jpeg'),(22,4,'Cadeira de Rodas Simples','A cadeira Prolife é durável e resistente. Fabricada em aço carbono com pintura epóxi. Os freios bilaterais proporcionam segurança ao usuário. Para seu conforto o encosto e o assento são em nylon. A cadeira é também dobrável. Este modelo possui pneus infláveis, tem capacidade para té 90 kg.',1,2,'Cadeira_Rodas_Simples.jpeg'),(23,3,'Cadeira de banho simples','Cadeira Dune com estrutura em aço carbono. Fixa. Pintura epóxi, assento sanitário com abertura frontal para facilitar a higiene. Encosto em courvin. Apoio de pés escamoteáveis. apoio de braços fixo.',1,2,'Cadeira_Banho_Simples.png'),(24,6,'Tênis Adidas Ultimashow','Confeccionado em material que proporciona circulação de ar e frescor para os pés durante as atividades. Entressola macia e confortável e solado em borracha para maior tração dos movimentos. Tamanho 41, Masculino, cor Preta.',2,2,'Tenis_Adidas_Ultimashow.jpeg'),(27,1,'Meia para Coto Amputado','Meia Acessória para Coto Amputado Transtibial Ortho Pauher. Ajusta, protege e estabiliza o coto no encaixe da prótese.',5,3,'Meia_Cota.jpeg');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `nomeUsuario` varchar(200) DEFAULT NULL,
  `documentoUsuario` varchar(15) DEFAULT NULL,
  `tipoUsuario` varchar(15) DEFAULT NULL,
  `cepUsuario` varchar(10) DEFAULT NULL,
  `logradouroUsuario` varchar(200) DEFAULT NULL,
  `cidadeUsuario` varchar(100) DEFAULT NULL,
  `estadoUsuario` varchar(25) DEFAULT NULL,
  `telefoneUsuario` varchar(15) DEFAULT NULL,
  `emailUsuario` varchar(35) DEFAULT NULL,
  `senhaUsuario` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Daniel Russ Solis','123.456.789/21','Administrador','12345-789','rua das Flores, 123','Campinas','Sao Paulo','(19) 3289-4567','danielrsolis@gmail.com','15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225'),(2,'Adriana Santini','234.678.908/23','Cliente','23456-000','rua das Maravilhas','Campinas','Sao Paulo','(19) 6543-0987','drisantini@gmail.com','15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225'),(3,'Wanessa Corteze','234.678.432-22','Cliente','23456-009','rua da Flores, 2345','Campinas','Sao Paulo','(19) 4568-3222','wancor@gmail.com','15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-23 18:10:45
