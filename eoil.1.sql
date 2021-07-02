-- MySQL dump 10.13  Distrib 5.5.62, for Linux (x86_64)
--
-- Host: localhost    Database: Eoil_app
-- ------------------------------------------------------
-- Server version	5.5.62

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
-- Table structure for table `effects`
--

DROP TABLE IF EXISTS `effects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `effects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `effect` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `caution` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `effect` (`effect`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `effects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `effects`
--

LOCK TABLES `effects` WRITE;
/*!40000 ALTER TABLE `effects` DISABLE KEYS */;
INSERT INTO `effects` VALUES (1,'殺菌効果','ニキビを直し、清潔な肌に','特になし',1,'2021-06-29 07:00:18'),(2,'頭痛緩和','ストレスや気温変化などの原因からくる偏頭痛の緩和','特になし',1,'2021-06-29 07:01:51'),(3,'虫刺され','虫刺されによる、痒みや腫れに効果的','特になし',1,'2021-06-29 08:32:24'),(4,'ニキビ','油分過多によるはニキビに','特になし',1,'2021-06-29 08:33:12'),(5,'リラックス','緊張した時や、ストレスフルな時に、ディフーザーに数滴たらしたり、お風呂に数滴入れて香りを楽しむ','特になし',1,'2021-06-29 08:34:39'),(6,'血行促進','血流の流れを良くする','特になし',2,'2021-06-29 08:51:02'),(7,'保湿','顔や体の保湿に','特になし',2,'2021-06-29 08:51:45'),(8,'ホルモン調整','ホルモンバランスを整える','体調を観察しながら使用する',2,'2021-06-29 08:53:57'),(9,'発汗作用','血流の流れを良くし、発汗を促進する','特になし',2,'2021-06-29 08:55:49'),(10,'集中力','集中力を高めたい時に効果的','特になし',2,'2021-06-29 08:58:00'),(11,'筋肉痛','筋肉に生じる痛みや、腰痛などに効果的','体調',2,'2021-06-29 09:00:15');
/*!40000 ALTER TABLE `effects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `essential_oils`
--

DROP TABLE IF EXISTS `essential_oils`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `essential_oils` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `scientific_name` varchar(255) NOT NULL,
  `plant_name` varchar(255) NOT NULL,
  `extraction` varchar(255) NOT NULL,
  `aroma` varchar(255) NOT NULL,
  `caution` varchar(255) NOT NULL,
  `english_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `essential_oils_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `essential_oils`
--

LOCK TABLES `essential_oils` WRITE;
/*!40000 ALTER TABLE `essential_oils` DISABLE KEYS */;
INSERT INTO `essential_oils` VALUES (1,'バジル','Ocimum basilicum','シソ科','水蒸気蒸留法','【ハーブ系】すっきりした甘さとスパイシーさがある香り','妊娠中・幼児は避ける、刺激強','Basil',1,'59331280160dac4bb7db551.58712906.jpg','2021-06-29 06:59:07'),(2,'ユーカリ','Eucalyptus globulus','フトモモ科','水蒸気蒸留法','【樹木系】強くフレッシュ。ほのかな甘さにグリーン調の香り','刺激強、高血圧・てんかん症の人、幼児は避ける','Eucalyptus',1,'197799487460dad8eb231d30.61777360.jpg','2021-06-29 08:25:15'),(3,'ラベンダー','Lavandula angustifolia','シソ科','水蒸気蒸留法','【フローラル系】ハーブとフローラルが融合した香り','特になし','Lavender',1,'175388073660dc4095a91697.51404814.jpg','2021-06-29 08:26:15'),(4,'ゼラニウム','Pelargonium graveolens','フウロソウ科','水蒸気蒸留法','【フローラル系】新鮮なグリーンと甘いフローラルが混ざったような香り','妊娠中は避ける、刺激強','Geranium',1,'155755439160dad9864b3ce3.09683493.jpg','2021-06-29 08:27:50'),(5,'ダマスクローズ','Rosa damascena','バラ科','水蒸気蒸留法','【フローラル系】フレッシュなローズの香り。','妊娠中は避ける、刺激強','Rose',1,'92018596460dad9cb6f8727.69221326.jpg','2021-06-29 08:28:59'),(6,'ティーツリー','Melaleuca alternifolia','フトモモ科','水蒸気蒸留法','【樹木系】フレッシュで、苦味と甘さが混ざったウッディーな香り','刺激強','Teatree',1,'92355578760dada2a5d3518.70907372.jpg','2021-06-29 08:30:34'),(7,'アイリス','Iris pallida','アヤメ科','水蒸気蒸留法','【フローラル系】スミレに似た温かくフローラルな香り','妊娠中は避ける、刺激強','Iris',2,'77944660560dadca25594d0.99299427.jpg','2021-06-29 08:41:06'),(8,'ジャスミン','Jasminum officinalis','モクセイ科','溶剤抽出法、二酸化炭素蒸留法','【フローラル系】濃厚な甘いフローラル調の香り','妊娠中は避ける、刺激強','Jasmine',2,'3643046360dadcf272cf06.46218743.jpg','2021-06-29 08:42:26'),(9,'イランイラン','Cananga odorata var. genuina','バンレイシ科','水蒸気蒸留法','【オリエンタル系】エキゾチックな甘い香り','妊娠中は避ける、刺激強、低血圧の人は避ける','YlangYlang',2,'115374637160dadd5353b946.27869778.jpg','2021-06-29 08:44:03'),(10,'タイム','Thymus vulgaris','シソ科','水蒸気蒸留法','【ハーブ系】甘さとほんのり辛さのあるハーブ調の香り','妊娠中、高血圧の人、幼児は避ける、刺激強','Thyme',2,'55725899860dadda1084611.59181895.jpg','2021-06-29 08:45:21'),(11,'ローズマリー','Rosmarinus officinalis','シソ科','水蒸気蒸留法','【ハーブ系】強いフレッシュなハーブの香り','抽出種類によって、乳幼児、妊婦、授乳中の人、神経系の弱い人、てんかん患者の人には使用しない','Rosemary',2,'83683934160dade2052f449.12911844.jpg','2021-06-29 08:47:28'),(12,'セージ','Salvia officinalis','シソ科','水蒸気蒸留法','【ハーブ系】フレッシュな草の、少し刺激のある香り','妊娠中は避ける、刺激強','Sage',2,'65300144260dade699e28c4.14026999.jpg','2021-06-29 08:48:41'),(13,'レモン','Citrus limon','ミカン科','圧搾法','【柑橘系】さわやかなシトラス、レモンの香り','光毒性、刺激強','Lemon',1,'195946241660dc4774f3f304.33096331.jpg','2021-06-29 09:19:04');
/*!40000 ALTER TABLE `essential_oils` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relations`
--

DROP TABLE IF EXISTS `relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oil_id` int(11) NOT NULL,
  `effect_id` int(11) NOT NULL,
  `howto` varchar(255) NOT NULL,
  `caution` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `relation_index` (`user_id`,`oil_id`,`effect_id`),
  KEY `oil_id` (`oil_id`),
  KEY `effect_id` (`effect_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `relations_ibfk_1` FOREIGN KEY (`oil_id`) REFERENCES `essential_oils` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `relations_ibfk_2` FOREIGN KEY (`effect_id`) REFERENCES `effects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `relations_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relations`
--

LOCK TABLES `relations` WRITE;
/*!40000 ALTER TABLE `relations` DISABLE KEYS */;
INSERT INTO `relations` VALUES (1,1,1,'オイルに混ぜて、ニキビや吹き出物の塗布','特になし',1,'2021-06-28 22:02:37'),(2,1,2,'ラベンダー、ティーツリーと一緒にブレンドし、こめかみに塗布する','特になし',1,'2021-06-28 22:02:57'),(3,3,5,'ディフーザーに数滴たらして使用','特になし',1,'2021-06-28 23:35:28'),(4,6,3,'虫刺され箇所に数滴塗布する','特になし',1,'2021-06-28 23:36:25'),(5,4,5,'キャリアオイルに数滴混ぜマッサージする','刺激が強いため、幼児や妊娠中は避ける',1,'2021-06-28 23:38:02'),(6,6,2,'ラベンダー、バジルなどとブレンドしたオイルを、こめかみに塗布する','特になし',1,'2021-06-28 23:38:39'),(7,10,4,'ニキビ箇所に塗布する','妊娠中は避ける、刺激強',2,'2021-06-28 23:50:27'),(8,11,10,'手首に塗布','特になし',2,'2021-06-28 23:59:15'),(10,2,11,'キャリアオイルに数滴ブレンドし、患部に塗布、またはマッサージする','体調を観察しながら使用する',2,'2021-06-29 00:03:37'),(11,1,11,'キャリアオイルに数滴ブレンドし、患部に塗布、またはマッサージする','特になし',2,'2021-06-29 00:04:01'),(12,12,10,'手首に塗布','特になし',2,'2021-06-29 00:07:24'),(13,10,6,'キャリアオイルに数滴混ぜマッサージする','特になし',2,'2021-06-29 00:08:37'),(14,8,7,'スキンケア、ボディケアとして、クリームに数滴ブレンドし使用','特になし',2,'2021-06-29 00:09:37'),(15,7,5,'ディフーザーに数滴たらして使用','特になし',2,'2021-06-29 00:14:25'),(16,9,8,'キャリアオイルとブレンドし、腹部をマッサージする','体調を観察しながら使用する',2,'2021-06-29 00:16:11'),(17,5,8,'キャリアオイルとブレンドし、腹部をマッサージする','体調を観察しながら使用する',2,'2021-06-29 00:17:24'),(18,13,10,'手首に塗布','光毒性をもつレモンを使用する場合は、日光に当たらない箇所に塗布する',1,'2021-06-29 00:20:53'),(19,2,3,'刺された箇所に塗布','特になし',1,'2021-06-29 19:22:56');
/*!40000 ALTER TABLE `relations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Tomomi','tomomi@gmail.com','tomomi','2021-06-29 06:56:43'),(2,'TAKAOKA','takaoka@gmail.com','takaoka','2021-06-29 06:57:12');
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

-- Dump completed on 2021-06-30 22:42:10
