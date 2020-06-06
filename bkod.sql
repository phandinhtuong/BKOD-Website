-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: bkod
-- ------------------------------------------------------
-- Server version	8.0.19

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
-- Table structure for table `building`
--

DROP TABLE IF EXISTS `building`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `building` (
  `BuildingId` int NOT NULL COMMENT 'ID toà nhà, bắt buộc.',
  `Name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Tên toà nhà, bắt buộc.',
  `SubName` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Location` geometry NOT NULL COMMENT 'Toạ độ toà nhà trên Google Maps, bắt buộc.',
  `Note` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`BuildingId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `building`
--

LOCK TABLES `building` WRITE;
/*!40000 ALTER TABLE `building` DISABLE KEYS */;
INSERT INTO `building` VALUES (3,'C9',NULL,_binary '\0\0\0\0\0\0\0+���}5@Kvl\�uZ@',NULL),(4,'C2',NULL,_binary '\0\0\0\0\0\0\0�s�\�5@�R	O\�uZ@',NULL),(5,'C1',NULL,_binary '\0\0\0\0\0\0\09�d�\�5@;ǀ\��uZ@',NULL),(6,'C3',NULL,_binary '\0\0\0\0\0\0\0��\�ܴ5@\�\"M�vZ@',NULL),(7,'C4',NULL,_binary '\0\0\0\0\0\0\0/�5@\�dvZ@',NULL),(8,'C5',NULL,_binary '\0\0\0\0\0\0\0=\'�o|5@�_?\�vZ@',NULL),(9,'C10',NULL,_binary '\0\0\0\0\0\0\0��aMe5@n��vZ@',NULL),(10,'HITECH',NULL,_binary '\0\0\0\0\0\0\0�\�9?\�5@J�\�\�vZ@',NULL),(11,'ITMS','Palm Landscape, Tòa nhà ITIMS',_binary '\0\0\0\0\0\0\0�@+0d5@O\�6��uZ@',NULL),(13,'D2','',_binary '\0\0\0\0\0\0\077�\',5@�k���uZ@',NULL),(16,'D2A','',_binary '\0\0\0\0\0\0\0&:\�,B5@�C�\�\�uZ@',NULL),(24,'D6','',_binary '\0\0\0\0\0\0\0	2*5@�}\�\�uZ@',NULL),(25,'D4','',_binary '\0\0\0\0\0\0\0\�9�5@�V\�\�\�uZ@',NULL),(26,'D6-8','',_binary '\0\0\0\0\0\0\0,�j�5@kH\�c\�uZ@',NULL),(27,'D8','',_binary '\0\0\0\0\0\0\0H�V\n5@����\�uZ@',NULL),(33,'Thư viện Tạ Quang Bửu','',_binary '\0\0\0\0\0\0\0���]/5@�gx�vZ@',NULL),(34,'D9','',_binary '\0\0\0\0\0\0\0\�@e��\05@��z�vZ@',NULL),(35,'Hồ Tiền','',_binary '\0\0\0\0\0\0\0v�X�5@Q�n�uZ@',NULL),(36,'D7','',_binary '\0\0\0\0\0\0\0��^5@�a�\�vZ@',NULL),(37,'D5','',_binary '\0\0\0\0\0\0\0�\�U�5@�R\�vZ@',NULL),(38,'D3','',_binary '\0\0\0\0\0\0\0\�\�\�:5@C��3vZ@',NULL),(39,'C8','Bộ môn Kỹ thuật hàng không vũ trụ',_binary '\0\0\0\0\0\0\0\�ut\\5@E�\0vZ@',NULL),(40,'C7','',_binary '\0\0\0\0\0\0\0�\�1 {5@g�v�vZ@',NULL),(41,'C6','',_binary '\0\0\0\0\0\0\0\��\�5@\�\�\�vZ@',NULL),(42,'CFL','Trung tâm Ngoại ngữ CFL',_binary '\0\0\0\0\0\0\0-\�(�5@�\�vZ@',NULL),(43,'Phòng TN Động cơ đốt trong','Phòng thí nghiệm Động cơ đốt trong',_binary '\0\0\0\0\0\0\0yv�և5@K;5�vZ@',NULL),(44,'B8','',_binary '\0\0\0\0\0\0\0\�r.\�U5@vS\�k%vZ@',NULL),(45,'B7BIS','',_binary '\0\0\0\0\0\0\0\0p\�\�s5@Z_&vZ@',NULL),(46,'B7','',_binary '\0\0\0\0\0\0\0$(~�5@E�\�\�&vZ@',NULL),(47,'B6','',_binary '\0\0\0\0\0\0\0\n�_\�5@:τ&vZ@',NULL),(48,'B5','',_binary '\0\0\0\0\0\0\0\�I�?�5@\�8~�4vZ@',NULL),(49,'B9','',_binary '\0\0\0\0\0\0\0�\�G��5@t	4vZ@',NULL),(50,'D3-5','',_binary '\0\0\0\0\0\0\0+j05@횐\�vZ@',NULL);
/*!40000 ALTER TABLE `building` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classroom`
--

DROP TABLE IF EXISTS `classroom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `classroom` (
  `ClassroomId` int NOT NULL COMMENT 'ID phòng học, bắt buộc.',
  `Floor` tinyint unsigned NOT NULL DEFAULT '1' COMMENT 'Tầng của phòng học, bắt buộc.',
  `Name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '101' COMMENT 'Tên phòng học, bắt buộc.',
  `SubName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Note` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`ClassroomId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classroom`
--

LOCK TABLES `classroom` WRITE;
/*!40000 ALTER TABLE `classroom` DISABLE KEYS */;
INSERT INTO `classroom` VALUES (1,1,'101','Giảng đường D3-101',NULL),(2,1,'102','Giảng đường D3-102',NULL),(3,1,'103','Giảng đường D3-103',NULL),(4,2,'201','Giảng đường D3-201',NULL),(5,2,'202','Giảng đường D3-202',NULL),(6,2,'202','Giảng đường D5-202',NULL),(7,2,'203','Giảng đường D5-203',NULL),(8,2,'203','Phòng thí nghiệm Vật lý đại cương D3-203',NULL),(9,2,'204','Phòng thí nghiệm Vật lý đại cương D3-204',NULL),(10,1,'104','Giảng đường D7-104',NULL),(11,2,'201','Giảng đường D7-201',NULL),(12,2,'202','Giảng đường D7-202',NULL),(13,2,'202','Giảng đường D9-202',NULL),(14,2,'203','Giảng đường D9-203',NULL),(15,2,'204','Giảng đường D9-204',NULL),(16,3,'302','Giảng đường D3-5 302',NULL),(17,2,'201','Giảng đường D3-5 201',NULL),(18,2,'202','Giảng đường D3-5 202',NULL),(19,2,'402','Giảng đường D7 402',NULL),(20,2,'401','Giảng đường D7 401',NULL),(21,2,'403','Giảng đường D9 403',NULL),(22,3,'303','Giảng đường D9 303',NULL),(24,3,'301','Giảng đường D9 301',NULL),(25,3,'302','Giảng đường D7 302',NULL),(26,1,'102','Phòng mượn sách tham khảo 102 Thư viện Tạ Quang Bửu',NULL),(27,1,'111','Phòng mượn sách tham khảo 111 Thư viện Tạ Quang Bửu',NULL),(28,2,'204','Văn phòng 204 Thư viện Tạ Quang Bửu',NULL),(29,2,'213','Ban quản trị toà nhà 213 Thư viện Tạ Quang Bửu',NULL),(30,2,'220A','Phòng thông tin thư mục 220A Thư viện Tạ Quang Bửu',NULL),(31,2,'227','Phòng 227 - Hướng dẫn sử dụng Thư viện Tạ Quang Bửu',NULL),(32,3,'320','Phòng truyền thống ĐHBKHN 320 Thư viện Tạ Quang Bửu',NULL);
/*!40000 ALTER TABLE `classroom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `building2classroom`
--

DROP TABLE IF EXISTS `building2classroom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `building2classroom` (
  `BuildingId` int NOT NULL COMMENT 'ID toà nhà, bắt buộc.',
  `ClassroomId` int NOT NULL COMMENT 'ID phòng học, bắt buộc.',
  PRIMARY KEY (`BuildingId`,`ClassroomId`),
  KEY `FK__Building2__Class__5F7E2DAC` (`ClassroomId`),
  CONSTRAINT `FK__Building2__Class__5F7E2DAC` FOREIGN KEY (`ClassroomId`) REFERENCES `classroom` (`ClassroomId`),
  CONSTRAINT `FK_Building2Classroom` FOREIGN KEY (`BuildingId`) REFERENCES `building` (`BuildingId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `building2classroom`
--

LOCK TABLES `building2classroom` WRITE;
/*!40000 ALTER TABLE `building2classroom` DISABLE KEYS */;
INSERT INTO `building2classroom` VALUES (38,1),(38,2),(38,3),(38,4),(38,5),(37,6),(37,7),(38,8),(38,9),(36,10),(36,11),(36,12),(34,13),(34,14),(34,15),(50,16),(50,17),(50,18),(36,19),(36,20),(34,21),(34,22),(34,24),(36,25),(33,26),(33,27),(33,28),(33,29),(33,30),(33,31),(33,32);
/*!40000 ALTER TABLE `building2classroom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manager`
--

DROP TABLE IF EXISTS `manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `manager` (
  `ManagerId` int NOT NULL COMMENT 'ID người quản lý phòng học trong khung giờ, bắt buộc.',
  `Name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Tên người quản lý, bắt buộc.',
  `Gender` tinyint unsigned NOT NULL DEFAULT '1' COMMENT 'Giới tính(0 là không tiết lộ, 1 là nam, 2 là nữ, 3 giới tính thứ 3), bắt buộc.',
  `Birthday` date NOT NULL DEFAULT '1990-04-21' COMMENT 'Ngày sinh, bắt buộc.',
  `Email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Email của người quản lý, bắt buộc.',
  `PhoneNumber` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Sđt của người quản lý, bắt buộc.',
  PRIMARY KEY (`ManagerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manager`
--

LOCK TABLES `manager` WRITE;
/*!40000 ALTER TABLE `manager` DISABLE KEYS */;
INSERT INTO `manager` VALUES (1,'Nguyễn Văn Tân',0,'1990-04-21','tannv210491@gmail.com','0345642688'),(2,'Đỗ Thị Mai',2,'1991-01-12','maidt109154@gmail.com','0343896478'),(3,'Trần Lương Bằng',1,'1992-11-16','bangtl136854@gmail.com','0358974280'),(4,'Lê Thanh Nghị',3,'1991-10-03','nghilt1656863@gmail.com','0385794738'),(5,'Trần Thị Thanh Thuỷ',2,'1992-06-08','thuyttt234685@gmail.com','0388448478');
/*!40000 ALTER TABLE `manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message` (
  `SenderId` int NOT NULL COMMENT 'Id người nhắn, bắt buộc.',
  `RecieverId` int NOT NULL COMMENT 'Id người nhận, bắt buộc.',
  `MessageId` int NOT NULL COMMENT 'ID thành viên đọc được tin nhắn, bắt buộc. ',
  `mContent` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Nội dung tin nhắn, bắt buộc.',
  `Time` datetime NOT NULL DEFAULT '2019-06-01 12:00:00.000000' COMMENT 'Thời điểm nhắn tin, bắt buộc.',
  PRIMARY KEY (`SenderId`,`RecieverId`,`MessageId`),
  KEY `FK_Message_User_Reciever` (`RecieverId`),
  CONSTRAINT `FK_Message_User_Reciever` FOREIGN KEY (`RecieverId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE,
  CONSTRAINT `FK_Message_User_Sender` FOREIGN KEY (`SenderId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (3,4,2070,'Xin chào!','2019-05-15 11:52:44.010000'),(3,4,2072,'Bạn học lớp nào?','2019-05-15 11:54:16.440000'),(3,4,2077,'jou','2020-02-21 19:02:37.343000'),(3,4,2078,'d','2020-02-21 19:02:41.813000'),(3,4,2079,'hd','2020-02-21 19:24:58.983000'),(3,15,2076,'tốt tốt','2019-05-17 15:57:01.180000'),(3,28,2068,' Xin chào','2019-05-15 11:49:01.743000'),(3,28,2074,'chào','2019-05-17 15:53:41.923000'),(3,28,2075,'em xin tiền','2019-05-17 15:53:49.633000'),(4,3,2071,'Hello!','2019-05-15 11:54:02.103000'),(4,3,2073,'Mình học lớp 12A4','2019-05-15 11:54:58.887000');
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `NewsId` int NOT NULL COMMENT 'ID tin tức, tăng dần và bắt buộc.',
  `ImageUrl` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Đường dẫn ảnh minh hoạ tin tức',
  `Title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Tiêu đề tin tức, bắt buộc.',
  `Url` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Đường dẫn đến trang tin tức, bắt buộc.',
  `Summary` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Tóm tắt nội dung tin tức.',
  `IsShowing` tinyint(1) NOT NULL COMMENT 'Đánh dấu có hiển thị không (0 là không hiển thị, 1 là hiển thị), bắt buộc.',
  PRIMARY KEY (`NewsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'https://scontent.fhan2-4.fna.fbcdn.net/v/t1.0-9/52890033_1311296715686114_6839441505678000128_o.jpg?_nc_cat=100&_nc_ohc=hyenqeHSejQAX9mDS2P&_nc_ht=scontent.fhan2-4.fna&oh=f10c72dff4ddd54343f2a0c8318677e2&oe=5EB59D65','Bach Khoa Open Day','https://www.facebook.com/BachKhoaOpenDay/photos/rpp.597627783585905/2543684792313518/?type=3&theater','Các khu vực tư vấn chuyên sâu sẽ kết thúc vào 17h chiều nay. Hẹn gặp lại các em',1),(2,'https://scontent.fhan2-4.fna.fbcdn.net/v/t1.0-9/52890033_1311296715686114_6839441505678000128_o.jpg?_nc_cat=100&_nc_ohc=hyenqeHSejQAX9mDS2P&_nc_ht=scontent.fhan2-4.fna&oh=f10c72dff4ddd54343f2a0c8318677e2&oe=5EB59D65','BACH KHOA OPEN 2019','https://www.facebook.com/BachKhoaOpenDay/photos/a.597677753580908/2543578238990840/?type=3&theater','Chờ đợi một buổi chiều BÙNG NỔ. Khu photozone - chụp ảnh & nhận ảnh miễn phí sẽ trở lại vào 13h30 ',1),(3,'https://scontent.fhan2-4.fna.fbcdn.net/v/t1.0-9/52890033_1311296715686114_6839441505678000128_o.jpg?_nc_cat=100&_nc_ohc=hyenqeHSejQAX9mDS2P&_nc_ht=scontent.fhan2-4.fna&oh=f10c72dff4ddd54343f2a0c8318677e2&oe=5EB59D65','Bach Khoa Open Day','https://www.facebook.com/BachKhoaOpenDay/photos/rpp.597627783585905/2543684792313518/?type=3&theater','Các khu vực tư vấn chuyên sâu sẽ kết thúc vào 17h chiều nay. Hẹn gặp lại các em',1),(4,'https://scontent.fhan2-4.fna.fbcdn.net/v/t1.0-9/52890033_1311296715686114_6839441505678000128_o.jpg?_nc_cat=100&_nc_ohc=hyenqeHSejQAX9mDS2P&_nc_ht=scontent.fhan2-4.fna&oh=f10c72dff4ddd54343f2a0c8318677e2&oe=5EB59D65','Bach Khoa Open Day','https://www.facebook.com/BachKhoaOpenDay/photos/rpp.597627783585905/2543684792313518/?type=3&theater','Các khu vực tư vấn chuyên sâu sẽ kết thúc vào 17h chiều nay. Hẹn gặp lại các em',1),(5,'https://scontent.fhan2-4.fna.fbcdn.net/v/t1.0-9/52890033_1311296715686114_6839441505678000128_o.jpg?_nc_cat=100&_nc_ohc=hyenqeHSejQAX9mDS2P&_nc_ht=scontent.fhan2-4.fna&oh=f10c72dff4ddd54343f2a0c8318677e2&oe=5EB59D65','BACH KHOA OPEN 2019','https://www.facebook.com/BachKhoaOpenDay/photos/a.597677753580908/2543578238990840/?type=3&theater','Chờ đợi một buổi chiều BÙNG NỔ. Khu photozone - chụp ảnh & nhận ảnh miễn phí sẽ trở lại vào 13h30 ',1),(6,'https://scontent.fhan2-4.fna.fbcdn.net/v/t1.0-9/52890033_1311296715686114_6839441505678000128_o.jpg?_nc_cat=100&_nc_ohc=hyenqeHSejQAX9mDS2P&_nc_ht=scontent.fhan2-4.fna&oh=f10c72dff4ddd54343f2a0c8318677e2&oe=5EB59D65','BACH KHOA OPEN 2019','https://www.facebook.com/BachKhoaOpenDay/photos/a.597677753580908/2543578238990840/?type=3&theater','Chờ đợi một buổi chiều BÙNG NỔ. Khu photozone - chụp ảnh & nhận ảnh miễn phí sẽ trở lại vào 13h30 ',1),(7,'https://scontent.fhan2-4.fna.fbcdn.net/v/t1.0-9/52890033_1311296715686114_6839441505678000128_o.jpg?_nc_cat=100&_nc_ohc=hyenqeHSejQAX9mDS2P&_nc_ht=scontent.fhan2-4.fna&oh=f10c72dff4ddd54343f2a0c8318677e2&oe=5EB59D65','Bach Khoa Open Day','https://www.facebook.com/BachKhoaOpenDay/photos/rpp.597627783585905/2543684792313518/?type=3&theater','Các khu vực tư vấn chuyên sâu sẽ kết thúc vào 17h chiều nay. Hẹn gặp lại các em',1),(8,'https://scontent.fhan2-4.fna.fbcdn.net/v/t1.0-9/52890033_1311296715686114_6839441505678000128_o.jpg?_nc_cat=100&_nc_ohc=hyenqeHSejQAX9mDS2P&_nc_ht=scontent.fhan2-4.fna&oh=f10c72dff4ddd54343f2a0c8318677e2&oe=5EB59D65','BACH KHOA OPEN 2019','https://www.facebook.com/BachKhoaOpenDay/photos/a.597677753580908/2543578238990840/?type=3&theater','Chờ đợi một buổi chiều BÙNG NỔ. Khu photozone - chụp ảnh & nhận ảnh miễn phí sẽ trở lại vào 13h30 ',1),(9,'https://scontent.fhan2-4.fna.fbcdn.net/v/t1.0-9/52890033_1311296715686114_6839441505678000128_o.jpg?_nc_cat=100&_nc_ohc=hyenqeHSejQAX9mDS2P&_nc_ht=scontent.fhan2-4.fna&oh=f10c72dff4ddd54343f2a0c8318677e2&oe=5EB59D65','Bach Khoa Open Day','https://www.facebook.com/BachKhoaOpenDay/photos/rpp.597627783585905/2543684792313518/?type=3&theater','Các khu vực tư vấn chuyên sâu sẽ kết thúc vào 17h chiều nay. Hẹn gặp lại các em',1),(10,'https://scontent.fhan2-4.fna.fbcdn.net/v/t1.0-9/52890033_1311296715686114_6839441505678000128_o.jpg?_nc_cat=100&_nc_ohc=hyenqeHSejQAX9mDS2P&_nc_ht=scontent.fhan2-4.fna&oh=f10c72dff4ddd54343f2a0c8318677e2&oe=5EB59D65','Bach Khoa Open Day','https://www.facebook.com/BachKhoaOpenDay/photos/rpp.597627783585905/2543684792313518/?type=3&theater','Các khu vực tư vấn chuyên sâu sẽ kết thúc vào 17h chiều nay. Hẹn gặp lại các em',1),(11,'https://scontent.fhan2-4.fna.fbcdn.net/v/t1.0-9/52890033_1311296715686114_6839441505678000128_o.jpg?_nc_cat=100&_nc_ohc=hyenqeHSejQAX9mDS2P&_nc_ht=scontent.fhan2-4.fna&oh=f10c72dff4ddd54343f2a0c8318677e2&oe=5EB59D65','BACH KHOA OPEN 2019','https://www.facebook.com/BachKhoaOpenDay/photos/a.597677753580908/2543578238990840/?type=3&theater','Chờ đợi một buổi chiều BÙNG NỔ. Khu photozone - chụp ảnh & nhận ảnh miễn phí sẽ trở lại vào 13h30 ',1),(12,'https://scontent.fhan2-4.fna.fbcdn.net/v/t1.0-9/52890033_1311296715686114_6839441505678000128_o.jpg?_nc_cat=100&_nc_ohc=hyenqeHSejQAX9mDS2P&_nc_ht=scontent.fhan2-4.fna&oh=f10c72dff4ddd54343f2a0c8318677e2&oe=5EB59D65','BACH KHOA OPEN 2019','https://www.facebook.com/BachKhoaOpenDay/photos/a.597677753580908/2543578238990840/?type=3&theater','Chờ đợi một buổi chiều BÙNG NỔ. Khu photozone - chụp ảnh & nhận ảnh miễn phí sẽ trở lại vào 13h30 ',1);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `setting` (
  `FormUrl` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Đường dẫn form đăng ký thông tin người dùng để tạo tài khoản.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES ('http://bit.ly/DangKyTraiNghiemHUST\r\n');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timesheet`
--

DROP TABLE IF EXISTS `timesheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `timesheet` (
  `TimesheetId` int NOT NULL COMMENT 'ID của chặng, bắt buộc.',
  `StartTime` time NOT NULL COMMENT 'ID Giờ bắt đầu chặng, bắt buộc.',
  `EndTime` time NOT NULL COMMENT 'ID Giờ kết thúc chặng, bắt buộc. StartTimeId kết hợp với EndTimeId là duy nhất',
  PRIMARY KEY (`TimesheetId`),
  UNIQUE KEY `UQ__Timeshee__180A46B736FC3EAE` (`StartTime`,`EndTime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timesheet`
--

LOCK TABLES `timesheet` WRITE;
/*!40000 ALTER TABLE `timesheet` DISABLE KEYS */;
INSERT INTO `timesheet` VALUES (19,'00:00:00.000000','01:00:00.000000'),(20,'01:00:00.000000','02:00:00.000000'),(21,'02:00:00.000000','03:00:00.000000'),(22,'03:00:00.000000','04:00:00.000000'),(23,'04:00:00.000000','05:00:00.000000'),(24,'05:00:00.000000','06:00:00.000000'),(1,'06:00:00.000000','07:00:00.000000'),(2,'07:00:00.000000','08:00:00.000000'),(3,'08:00:00.000000','09:00:00.000000'),(4,'09:00:00.000000','10:00:00.000000'),(5,'10:00:00.000000','11:00:00.000000'),(6,'11:00:00.000000','12:00:00.000000'),(7,'12:00:00.000000','13:00:00.000000'),(8,'13:00:00.000000','14:00:00.000000'),(9,'14:00:00.000000','15:00:00.000000'),(10,'15:00:00.000000','16:00:00.000000'),(11,'16:00:00.000000','17:00:00.000000'),(12,'17:00:00.000000','18:00:00.000000'),(13,'18:00:00.000000','19:00:00.000000'),(14,'19:00:00.000000','20:00:00.000000'),(15,'20:00:00.000000','21:00:00.000000'),(16,'21:00:00.000000','22:00:00.000000'),(17,'22:00:00.000000','23:00:00.000000'),(18,'23:00:00.000000','00:00:00.000000');
/*!40000 ALTER TABLE `timesheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timesheet2classroom`
--

DROP TABLE IF EXISTS `timesheet2classroom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `timesheet2classroom` (
  `TimesheetId` int NOT NULL,
  `ClassroomId` int NOT NULL,
  `ManagerId` int NOT NULL,
  PRIMARY KEY (`TimesheetId`,`ManagerId`),
  KEY `FK__Timesheet__Class__634EBE90` (`ClassroomId`),
  KEY `FK__Timesheet__Manag__6754599E` (`ManagerId`),
  CONSTRAINT `FK__Timesheet__Class__634EBE90` FOREIGN KEY (`ClassroomId`) REFERENCES `classroom` (`ClassroomId`),
  CONSTRAINT `FK__Timesheet__Manag__6754599E` FOREIGN KEY (`ManagerId`) REFERENCES `manager` (`ManagerId`),
  CONSTRAINT `FK_Timesheet2Classroom` FOREIGN KEY (`TimesheetId`) REFERENCES `timesheet` (`TimesheetId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timesheet2classroom`
--

LOCK TABLES `timesheet2classroom` WRITE;
/*!40000 ALTER TABLE `timesheet2classroom` DISABLE KEYS */;
INSERT INTO `timesheet2classroom` VALUES (1,1,1),(2,2,4),(3,3,1),(4,4,2),(5,5,5),(6,6,1),(20,6,2),(7,7,2),(9,9,2),(8,10,3),(10,10,5),(18,10,4),(11,11,5),(12,12,5),(23,12,4),(14,14,4),(13,15,4),(15,15,3),(17,17,3),(19,19,4),(21,20,2),(22,26,1),(16,27,5),(24,32,1);
/*!40000 ALTER TABLE `timesheet2classroom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tour`
--

DROP TABLE IF EXISTS `tour`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tour` (
  `TourId` int NOT NULL COMMENT 'ID của tour, bắt buộc.',
  `Name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Tên của tour, bắt buộc.',
  `State` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Trạng thái hiển thị của tour (0 là ẩn, 1 hiển thị).',
  `ImageUrl` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Đường dẫn ảnh minh hoạ tour.',
  `Date` date NOT NULL DEFAULT '2019-06-01' COMMENT 'Ngày hoạt động của tour, bắt buộc. Mặc định là 01/06/2019.',
  `MapImageUrl` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Đường dẫn ảnh bản đồ tour.',
  PRIMARY KEY (`TourId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tour`
--

LOCK TABLES `tour` WRITE;
/*!40000 ALTER TABLE `tour` DISABLE KEYS */;
INSERT INTO `tour` VALUES (1,' Tham quan trường Đại học Bách Khoa Hà Nội',1,'https://scontent.fhan2-3.fna.fbcdn.net/v/t1.0-9/57029094_1349664958515956_3114475502966931456_o.jpg?_nc_cat=109&_nc_ohc=Yr19bQIeiacAX90j-Ef&_nc_ht=scontent.fhan2-3.fna&oh=5d2ac546c822d0aee6fd1ebd2cdd4a2f&oe=5EBD5141','2019-05-17','http://htqt.hust.edu.vn/imgs/maphnen.jpg'),(2,'Bách Khoa Open Day 2019',1,'https://scontent.fhan2-1.fna.fbcdn.net/v/t1.0-9/52005801_1311297129019406_4532303692673581056_o.jpg?_nc_cat=101&_nc_ohc=rdiN3MtuZpQAX_XoVhY&_nc_ht=scontent.fhan2-1.fna&oh=1c1ba47f795f7cf669b9dfbaf7bc2f16&oe=5EC6B44F','2019-06-01','http://htqt.hust.edu.vn/seminar2016/imgs/mapbken.jpg'),(3,'BK Open Day',0,'https://scontent.fhan2-2.fna.fbcdn.net/v/t1.0-9/54727808_2539129712769026_3596918712491311104_n.jpg?_nc_cat=110&_nc_oc=AQkPYNU0wE1jjp3jiHsKCTioHdBbnHEbAGqZgmzXloU6GBg69i7E1SteOO18gFbSHII&_nc_ht=scontent.fhan2-2.fna&oh=ac962ac37df113b774bfb03762b85901&oe=5D0CBB9C&dl=1','2019-06-01','http://htqt.hust.edu.vn/imgs/maphnen.jpg'),(4,'BKOD',1,'https://scontent.fhan2-3.fna.fbcdn.net/v/t1.0-9/49650749_2433709176644414_7417508249332613120_n.jpg?_nc_cat=107&_nc_oc=AQmZsY4iWwnN37f_9qifMuwVw7AzOKuB31U9GaI2r-NtQmffH0_lJM78011XDp1RLh8&_nc_ht=scontent.fhan2-3.fna&oh=809a2e2b27a1e750a5bcf6405133c04c&oe=5D197C45&dl=1','2019-06-01','http://htqt.hust.edu.vn/seminar2016/imgs/mapbken.jpg');
/*!40000 ALTER TABLE `tour` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tour2member`
--

DROP TABLE IF EXISTS `tour2member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tour2member` (
  `TourId` int NOT NULL COMMENT 'ID của tour, khoá ngoại và bắt buộc.',
  `UserId` int NOT NULL COMMENT 'ID người dùng, khoá ngoại và bắt buộc.',
  `mFunction` tinyint unsigned NOT NULL DEFAULT '0' COMMENT 'Vai trò trong tour (1 là trưởng nhóm, 2 là phó nhóm, 3 là phụ huynh, 0 là thành viên bình thường), bắt buộc. Mặc định là 0.',
  `mLocation` geometry DEFAULT NULL COMMENT 'Toạ độ trên Google Maps.',
  `Note` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Ghi chú.',
  PRIMARY KEY (`TourId`,`UserId`),
  KEY `FK__Tour2Memb__UserI__5BAD9CC8` (`UserId`),
  CONSTRAINT `FK__Tour2Memb__TourI__5CA1C101` FOREIGN KEY (`TourId`) REFERENCES `tour` (`TourId`),
  CONSTRAINT `FK__Tour2Memb__UserI__5BAD9CC8` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tour2member`
--

LOCK TABLES `tour2member` WRITE;
/*!40000 ALTER TABLE `tour2member` DISABLE KEYS */;
INSERT INTO `tour2member` VALUES (1,3,0,_binary '\0\0\0\0\0\0\0\'�\�vb�4@:=\�\�vZ@',NULL),(1,4,0,_binary '\0\0\0\0\0\0\0]�\�\�5@*��\�9rZ@',NULL),(1,10,0,_binary '\0\0\0\0\0\0\08J^�c45@T�<|Z@',NULL),(1,13,0,NULL,NULL),(1,15,0,NULL,NULL),(1,19,3,NULL,NULL),(1,20,1,_binary '\0\0\0\0\0\0\0k}�Жg5@�4*p�OZ@',NULL),(1,23,2,NULL,NULL),(2,3,0,_binary '\0\0\0\0\0\0\0\'�\�vb�4@:=\�\�vZ@',NULL),(2,4,0,_binary '\0\0\0\0\0\0\0]�\�\�5@*��\�9rZ@',NULL),(2,10,0,NULL,NULL),(2,13,1,NULL,NULL),(2,15,2,NULL,NULL),(2,19,0,NULL,NULL),(3,3,1,_binary '\0\0\0\0\0\0\0\'�\�vb�4@:=\�\�vZ@',NULL),(3,4,0,_binary '\0\0\0\0\0\0\0]�\�\�5@*��\�9rZ@',NULL),(3,10,0,NULL,NULL),(3,15,0,NULL,NULL);
/*!40000 ALTER TABLE `tour2member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tour2timesheet`
--

DROP TABLE IF EXISTS `tour2timesheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tour2timesheet` (
  `TourId` int NOT NULL COMMENT 'ID của tour, bắt buộc.',
  `TimesheetId` int NOT NULL COMMENT 'ID của chặng, bắt buộc.',
  PRIMARY KEY (`TourId`,`TimesheetId`),
  KEY `FK__Tour2Time__Times__662B2B3B` (`TimesheetId`),
  CONSTRAINT `FK__Tour2Time__Times__662B2B3B` FOREIGN KEY (`TimesheetId`) REFERENCES `timesheet` (`TimesheetId`),
  CONSTRAINT `FK_Tour2Timesheet` FOREIGN KEY (`TourId`) REFERENCES `tour` (`TourId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='bang quan he';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tour2timesheet`
--

LOCK TABLES `tour2timesheet` WRITE;
/*!40000 ALTER TABLE `tour2timesheet` DISABLE KEYS */;
INSERT INTO `tour2timesheet` VALUES (2,3),(3,3),(3,4),(1,5),(3,5),(1,6),(3,6),(1,7),(4,7),(2,8),(4,8),(1,9),(4,9),(1,10),(4,10),(1,11),(4,11),(1,12),(2,15),(2,16),(3,16),(4,17),(4,18),(2,23);
/*!40000 ALTER TABLE `tour2timesheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `UserId` int NOT NULL COMMENT 'ID người dùng, bắt buộc.',
  `Username` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Tên đăng nhập, duy nhất và bắt buộc.',
  `Password` char(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Mật khẩu đăng nhập mã hoá SHA256, bắt buộc.',
  `Fullname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Họ tên đầy đủ, bắt buộc.',
  `Birthday` date NOT NULL DEFAULT '2002-06-14' COMMENT 'Ngày sinh, bắt buộc.',
  `Gender` tinyint unsigned NOT NULL DEFAULT '1' COMMENT 'Giới tính (0 là không tiết lộ, 1 là nam, 2 là nữ, 3 giới tính thứ 3), bắt buộc.',
  `School` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Tên trường người dùng đang theo học',
  `Class` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Tên lớp người dùng đang theo học',
  `PhoneNumber` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Sđt của người người dùng.',
  `IsCounselor` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Đánh dấu có phải là tư vấn viên không (0 là không phải, 1 là tư vấn viên, mặc định là 0).',
  `State` tinyint unsigned NOT NULL DEFAULT '0' COMMENT 'Trạng thái (0 là offline, 1 là online, 2 là busy, 3 là hidden), bắt buộc. Mặc định là 0.',
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `UQ__User__536C85E49EFCAC75` (`Username`),
  UNIQUE KEY `UQ__User__536C85E4C0BBCE70` (`Username`),
  UNIQUE KEY `UQ__User__536C85E4DFF3CD52` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (3,'a@a.a','F8044C313ABEC15571C4774F22A5BE29F0909D49DCDA08FF0CA1AC3B886E8EFC','Nguyễn Tất Thành','1998-01-21',1,'Trường THPT Phan Huy Chú','12A4','4656566',0,0),(4,'b@a.a','FBCCFB1397391B9BB9E276AEA206280F79EC2CA6A7610705977FD869363C67C4','Nguyễn Thị Thanh','2000-11-03',2,'THPT Nguyễn Đức Cảnh','10A9','0365687984',0,0),(10,'a@aa.a','D2855EEDBFD45A3237447569C6AA214AF1895337CF45D9C9A82A3226910BA158','Nguyễn Văn An','2004-01-01',1,'Trường THPT Phạm Hồng Thái','Chuyên Vật Lý','0673562347',0,0),(13,'aa@a.a','426ED65B32EEAC1C8EAA5CB1E2166E11A5E22A9D5640D2CFB3FBDCF1D482CAB9','Lê Than Nghị','2004-01-01',2,'Trường THPT Nguyễn Trãi - Ba Đình','10A3','0356756636',0,0),(15,'aa@aa.a','81E17F5B24B87C129B18D24DC26B3C8183C3972F1CB5B1ED0697E31BCE4EBE01','Lê Công Vinh','2004-01-01',1,'Trường THPT Lê Quý Đôn','11B3','0356733454',0,0),(19,'aaa@a.a','AB1C834A4D1E483AC77DB38379136ED8B0B2FD66433DD0D1AB15B36E021BD9A5','Nguyễn Xuân Bắc','2004-01-01',1,'Trường THPT Văn Lang','12A1','0356747567',0,0),(20,'aaaa@a.a','A1FF9537F25164E39F6A9B09E81697EFA508DA3B626FD753DE995AC08262C7B0','Phan Văn Tài Em','2004-01-01',3,'Trường THPT Trần Phú','10C','0348176876',0,1),(23,'aaaaa@a.a','BB16F4A13F6F2CAC6E4742D59C34BC6BD860C51F23E817A7461F4F55C97ABEB8','Nguyễn Thị Linh','2004-01-01',1,'Trường THPT Đoàn Kết - Hai Bà Trưng','Chuyên Toán 1','0384564563',0,1),(26,'aab@a.a','5F31AF3EA453A5BC7F71C193B3A48390728A45A4ABEEF30060421DD924121F73','Hoàng Thị Lan','2004-01-01',2,'Trường THCS & THPT Tạ Quang Bửu','Chuyên Tiếng Anh','0317346345',0,0),(28,'aac@a.a','612C76F8F316562F0C323A2E86AB398EE7B5A9348B6420DFB70F2D9F2C9265E4','Văn Mai Hương','2004-01-01',2,'Trường THPT Hoàng Diệu','10B2','0325245457',1,1),(29,'aad@a.a','DCF0AF5D9104BF757518213535B253D44C551AEE40850DF20C77FA406B8511AF','Đỗ Thị Nga','2004-01-01',2,'Trường THPT Kim Liên','11A6','0361675856',0,0),(30,'aae@a.a','27F71E2D9D2FF1B62FA063BEA3CE4D1761E6A7754B96643C52E8E0D8F1679DF1','Phạm Văn Quyền','2004-01-01',1,'Trường THPT Phùng Khắc Khoan','12B3','0325678678',1,1),(31,'aaf@a.a','6FEADE8B3F26D5C0BFD5B6A533EAF860B9177C6CF91A0518138A6544DDC874ED','Trần Anh Tuấn','2004-01-01',1,'Trường THPT Hồng Hà','12D','0323856457',0,0),(32,'aag@a.a','D447ACD0E6D3CCAC55C2168D7122A59B1547A1BF8AD6CD914ACF99E042A2ECC2','Nguyễn Văn Việt','2004-01-01',1,'Trường THPT Việt Đức','12A7','0378679789',1,1),(36,'asuca@a.a','DF76D70FEF5B355DD78208A14B8D5EDD598C1444739ACA76833E89B39CB74587','Trần Thị Nguyệt','2004-01-01',2,'Trường THPT Đông Kinh','Chuyên Hoá Học','0328564563',0,0),(123,'nam98nd16@gmail.com','8d6bea94517d67426e9ce5a8a1b5dae07c5452592806981f5f2c7c8ffb8cc51f','Nguyễn Văn Nam','2002-06-14',1,NULL,NULL,NULL,0,0),(1590894663,'101000011','57796321e9ea7cae183ac0727e84ee2ccaae781ccdf27fb3a848c6e087fb9cb1','Nguyyễn Văn A','2002-06-14',1,NULL,NULL,NULL,0,0),(1590897162,'101000012','81e12848cfd349a35a058649395114a8ca1e7aec3f6c746b525e20e440b7ab71','Nguyễn Văn B','2002-06-14',1,NULL,NULL,NULL,0,0),(1590897357,'123123123','6ddb6f615e44bf1de1dae751b6cc5b2914c9e2891c250603b4e36810e2c15f30','13','2002-06-14',1,NULL,NULL,NULL,0,0),(1590897506,'124124123','e5f593186aa462f29a43f8c2978419194861dea8c434c3df70212858c29b28de','123','2002-06-14',1,NULL,NULL,NULL,0,0),(1590898796,'123456','f418b8c66680e56d40e5fe163ff6731457f372e7914362067ad38e1d9e314d93','qwe','2002-06-14',1,NULL,NULL,NULL,0,0),(1590898903,'1234567','3296f92b318c8f4c5c12c5ceb62ee8cfe83c9abde884f3c5e3e09df141f91249','qwer','2002-06-14',1,NULL,NULL,NULL,0,0),(1590899238,'111','c2f1ac2a69b282813efc7a009a221ea80504f8e62156bb71e1a95bf9e5674f0e','123','2002-06-14',1,NULL,NULL,NULL,0,0),(1590899256,'1111','cfc8ca817f24d4626abfc1d36136cfc4a1aeb1b7750c3302fd406d0780c6e3a1','123','2002-06-14',1,NULL,NULL,NULL,0,0),(1590899268,'11111','2655efc4c359bd8a14eebe8a3f06356d2a8ad66dc7306837d47ab2878b643d56','123','2002-06-14',1,NULL,NULL,NULL,0,0),(1590899403,'111111','367e49f05b9e597772f0311c010a791d871f54ac73ac9f72952b5ace96a230fc','123','2002-06-14',1,NULL,NULL,NULL,0,0),(1590899530,'222','bbe6e744341a42873457279a34bede4715a5e0df9a5658ad1e633cfb4e3e79b3','222','2002-06-14',1,NULL,NULL,NULL,0,0),(1590899600,'2222','c47bffca2e49d233b6f6182786868dd62b94baef96063a23a4ca6822538b5ebb','2222','2002-06-14',1,NULL,NULL,NULL,0,0),(1590909643,'123333','33c7afe663e4b88ef7f0bf257606bdf161bf393f4fe3256dc9cc9e8acc929521','123','2002-06-14',1,NULL,NULL,NULL,0,0),(1590916842,'123456789','a4fcd8a0c934bf36c5ed8831148add1ec08eb49ff91298b9cb68e7062035bdee','123','2002-06-14',1,NULL,NULL,NULL,0,0),(1590979314,'1412','288c6aa341c96e3882420d08af24d70af205b4c114f16e70dded13691ec1975c','1412','2002-06-14',1,NULL,NULL,NULL,0,0),(1591027951,'nam','46c503b22e9030e14d469416c75cf1b96c9cbc3e30d07a97cbc5f3a6839f5982','Nguyễn Văn Nam','2002-06-14',1,NULL,NULL,NULL,0,0),(1591069554,'12311111','6aeaa14afd9aaf5d4d3ddda2edc095cefa556180e430c7895352f10cd27979c2','1','2002-06-14',1,NULL,NULL,NULL,0,0),(1591365972,'admin','f89b113a23ed2fa78913a762f7f6d02766de2ead392eb9cb7ffb50447d1c1427','Administrator','2002-06-14',1,'','','',0,0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-06 22:30:33
