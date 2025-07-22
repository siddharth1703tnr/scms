-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: servicecenter
-- ------------------------------------------------------
-- Server version	5.7.13-log

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
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(100) NOT NULL,
  `CustomerAddress` varchar(100) NOT NULL,
  `CustomerCity` varchar(45) NOT NULL,
  `MobileNumber` varchar(45) NOT NULL,
  `WhatsAppNumber` varchar(45) DEFAULT NULL,
  `ProductCompanyName` varchar(45) DEFAULT NULL,
  `ProductNameOrModel` varchar(45) DEFAULT NULL,
  `LastMessageSendDate` date DEFAULT NULL,
  `CreateDate` date NOT NULL,
  `CreateBy` int(11) NOT NULL,
  `ModifiedDate` date DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `CustomerId_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (17,'Patel Sanjay','A-1, Krishna Nagar','Ahmedabad','9876543210','9876543210','LG','Refrigerator X50','2024-09-01','2024-09-01',1,NULL,NULL,'Y'),(18,'Desai Nisha','12, Gandhi Road','Surat','9823456789','9823456789','Samsung','AC CoolPro','2024-09-02','2024-09-02',2,NULL,NULL,'Y'),(19,'Mehta Jignesh','20, Laxmi Society','Rajkot','9822345678','9822345678','Whirlpool','Washing Machine Turbo','2024-09-03','2024-09-03',3,NULL,NULL,'Y'),(20,'Shah Kalpesh','30, Ambika Park','Vadodara','9821234567','9821234567','Sony','LED TV Bravia','2024-09-04','2024-09-04',4,NULL,NULL,'Y'),(21,'Joshi Rupal','45, Sardar Colony','Bhavnagar','9820123456','9820123456','Godrej','Fridge SuperCool','2024-09-05','2024-09-05',5,NULL,NULL,'Y'),(22,'Trivedi Hiren','B-10, Punit Park','Jamnagar','9812345678','9812345678','Panasonic','Microwave Oven',NULL,'2024-09-06',6,NULL,NULL,'Y'),(23,'Patel Bansi','5, Shanti Niketan','Anand','9813456789','9813456789','LG','Air Purifier Alpha','2024-09-07','2024-09-07',7,NULL,NULL,'Y'),(24,'Desai Viraj','23, Rameshwar Nagar','Vapi','9814567890','9814567890','Samsung','Dishwasher ProClean',NULL,'2024-09-08',8,NULL,NULL,'Y'),(25,'Parikh Dhruv','60, Amrapali Society','Gandhinagar','9815678901','9815678901','Whirlpool','Refrigerator FrostFree','2024-09-09','2024-09-09',9,NULL,NULL,'Y'),(26,'Bhatt Anjali','C-2, Anand Vihar','Mehsana','9816789012','9816789012','Sony','Home Theatre SoundX','2024-09-10','2024-09-10',10,NULL,NULL,'Y');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distributor`
--

DROP TABLE IF EXISTS `distributor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distributor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `isactive` char(1) NOT NULL,
  `primarymobileno` varchar(10) NOT NULL,
  `secondmobileno` varchar(10) DEFAULT NULL,
  `emailaddress` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distributor`
--

LOCK TABLES `distributor` WRITE;
/*!40000 ALTER TABLE `distributor` DISABLE KEYS */;
INSERT INTO `distributor` VALUES (1,'ShreeJi','Y','9456987566','9456987566','shreeji@gmail.com','milpara Main Road','Rajkot'),(7,'Ifb point shital park','Y','9823344566','9823344566','new@gmail.com','Madhapar chowk','Rajkot'),(11,'radhika Ele.','Y','9016023638','8160067795','radhikaele@gmail.com','gandhigramm','rajkot'),(12,'gfd','N','9999999999','9999999999','dnjkv@cdjk.dcs','cdsj','bjhx'),(13,'eurak forbase','Y','9015666879','9015633789','eurakaa@gmail.com','near modi school','rajkot'),(14,'testdname','N','5555555555','5555555555','test@test.mail','test address','test'),(15,'Patel Distributors','Y','9876543210','9123456789','pateldistributors@gmail.com','101, Silver Plaza','Ahmedabad'),(16,'Desai Appliances','N','9823456789','9234567890','desaiappliances@yahoo.com','25, Market Road','Surat'),(17,'Mehta Enterprises','Y','9822345678',NULL,'mehtaent@hotmail.com','44, Ring Road','Rajkot'),(18,'Shah Electronics','Y','9821234567','9345678901','shahelectronics@rediffmail.com','33, Station Road','Vadodara'),(19,'Joshi Tech Supplies','Y','9820123456','9456789012','joshitech@gmail.com','10, GIDC Industrial Area','Bhavnagar'),(20,'Trivedi Sales','N','9812345678',NULL,'trivedisales@gmail.com','2, Punit Plaza','Jamnagar'),(21,'Parikh Distributors','Y','9813456789','9567890123','parikhdist@yahoo.com','50, Shanti Sadan','Anand'),(22,'Bhatt Electricals','N','9814567890',NULL,'bhatt.electricals@gmail.com','15, National Highway','Vapi'),(23,'Dave Solutions','Y','9815678901','9678901234','davesolutions@hotmail.com','28, Sector 12','Gandhinagar'),(24,'Rana Supply Co.','Y','9816789012','9789012345','ranasupply@gmail.com','19, New Industrial Estate','Mehsana'),(25,'Het cssak','Y','6355494350','6355494350','het@gmail.com','Rajkot','Rajkot');
/*!40000 ALTER TABLE `distributor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distributoruser`
--

DROP TABLE IF EXISTS `distributoruser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distributoruser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `userpassword` varchar(45) NOT NULL,
  `isactive` char(1) NOT NULL,
  `distributorid` int(11) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `mobileno` varchar(25) DEFAULT NULL,
  `roletype` varchar(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `fk_distributor` (`distributorid`),
  CONSTRAINT `fk_distributor` FOREIGN KEY (`distributorid`) REFERENCES `distributor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distributoruser`
--

LOCK TABLES `distributoruser` WRITE;
/*!40000 ALTER TABLE `distributoruser` DISABLE KEYS */;
INSERT INTO `distributoruser` VALUES (1,'sidd27','12345678','Y',1,'siddharth','borisagar','8460589338','admin','2024-08-13 20:42:59','2024-08-28 15:40:48'),(2,'siddharth007','bsb@282004','Y',1,'borisagar','borisagar','9016023638','Office','2024-08-15 11:29:38','2024-08-27 17:34:28'),(5,'Naresh.shreeji','shreeji@naresh','N',1,'Naresh','Patel','9624236544','Other User','2024-08-28 15:48:28','2024-08-28 15:50:26'),(10,'akki.radhika','12345678','Y',11,'akki','shilu','8128147474','Admin','2024-08-29 18:28:02',NULL),(11,'Hdndnd','dhdnnd','N',7,'Aaaa','Dhdjnd','9999999999','Reception','2024-08-30 18:37:05','2024-09-25 10:37:28'),(12,'cdssjk`','cdsjkjkc','Y',12,'sdjkvbk','csdjkvsbk','9999999999','Admin','2024-08-31 14:59:41','2024-09-02 15:13:07'),(13,'sanesshah','12345678','N',12,'sanesh','shah','9016023589','Admin','2024-09-02 14:56:36','2024-09-02 15:13:11'),(34,'sanjay.patel','password123','Y',11,'Sanjay','Patel','9876543210','Admin','2024-09-01 10:00:00',NULL),(35,'nisha.desai','securepass','Y',12,'Nisha','Desai','9823456789','User','2024-09-02 11:00:00',NULL),(36,'jignesh.mehta','jignesh@2024','Y',13,'Jignesh','Mehta','9822345678','Admin','2024-09-03 12:00:00',NULL),(37,'kalpesh.shah','kalpesh123','N',14,'Kalpesh','Shah','9821234567','User','2024-09-04 13:00:00',NULL),(38,'rupal.joshi','joshi456','Y',15,'Rupal','Joshi','9820123456','User','2024-09-05 14:00:00',NULL),(39,'hiren.trivedi','trivedih@007','N',16,'Hiren','Trivedi','9812345678','Admin','2024-09-06 15:00:00',NULL),(40,'bansi.patel','patel@bansi','Y',17,'Bansi','Patel','9813456789','User','2024-09-07 16:00:00',NULL),(41,'viraj.desai','viraj.desai','Y',18,'Viraj','Desai','9814567890','Admin','2024-09-08 17:00:00',NULL),(42,'dhruv.parikh','dhruv@parikh','Y',19,'Dhruv','Parikh','9815678901','User','2024-09-09 18:00:00',NULL),(43,'anjali.bhatt','anjali!bhatt','Y',20,'Anjali','Bhatt','9816789012','User','2024-09-10 19:00:00',NULL),(44,'Agravat Het','06082005','Y',7,'het','agravat','9589564589','Admin','2024-09-25 10:36:07',NULL);
/*!40000 ALTER TABLE `distributoruser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `new_table`
--

DROP TABLE IF EXISTS `new_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `new_table` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `new_table`
--

LOCK TABLES `new_table` WRITE;
/*!40000 ALTER TABLE `new_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `new_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partdetail`
--

DROP TABLE IF EXISTS `partdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servicecallid` int(11) NOT NULL,
  `partid` int(11) NOT NULL,
  `netprice` decimal(10,2) NOT NULL,
  `gstpercent` decimal(5,2) NOT NULL,
  `finalprice` decimal(10,2) NOT NULL,
  `createdate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partdetail`
--

LOCK TABLES `partdetail` WRITE;
/*!40000 ALTER TABLE `partdetail` DISABLE KEYS */;
/*!40000 ALTER TABLE `partdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicecall`
--

DROP TABLE IF EXISTS `servicecall`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicecall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `callnumber` varchar(45) NOT NULL,
  `customername` varchar(100) NOT NULL,
  `customermobileno` varchar(45) NOT NULL,
  `customeraddress` varchar(100) NOT NULL,
  `customercity` varchar(45) NOT NULL,
  `calltype` varchar(45) NOT NULL,
  `serviceworktype` varchar(45) DEFAULT NULL,
  `paymenttype` varchar(45) DEFAULT NULL,
  `calldate` datetime NOT NULL,
  `callassigndate` datetime DEFAULT NULL,
  `technicianassigned` int(11) DEFAULT NULL,
  `callcompletedate` datetime DEFAULT NULL,
  `callstatus` varchar(45) NOT NULL,
  `totalamount` decimal(10,2) DEFAULT NULL,
  `discountamount` decimal(10,2) DEFAULT NULL,
  `finalamount` decimal(10,2) DEFAULT NULL,
  `createdate` datetime NOT NULL,
  `createby` int(11) DEFAULT NULL,
  `createby_distributor_id` int(11) DEFAULT NULL,
  `createby_distributoruser_id` int(11) DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `customerproblem` varchar(200) DEFAULT NULL,
  `callresolution` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `callnumber_UNIQUE` (`callnumber`),
  KEY `fk_servicecall_technician` (`technicianassigned`),
  KEY `fk_servicecall_distributor` (`createby_distributor_id`),
  KEY `fk_servicecall_distributoruser` (`createby_distributoruser_id`),
  KEY `fk_servicecall_createby` (`createby`),
  KEY `fk_servicecall_modifiedby` (`modifiedby`),
  CONSTRAINT `fk_servicecall_createby` FOREIGN KEY (`createby`) REFERENCES `servicecenteruser` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_servicecall_distributor` FOREIGN KEY (`createby_distributor_id`) REFERENCES `distributor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_servicecall_distributoruser` FOREIGN KEY (`createby_distributoruser_id`) REFERENCES `distributoruser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_servicecall_modifiedby` FOREIGN KEY (`modifiedby`) REFERENCES `servicecenteruser` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_servicecall_technician` FOREIGN KEY (`technicianassigned`) REFERENCES `servicecenteruser` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=192 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicecall`
--

LOCK TABLES `servicecall` WRITE;
/*!40000 ALTER TABLE `servicecall` DISABLE KEYS */;
INSERT INTO `servicecall` VALUES (86,'20240901124026','bhjdvhjb','9999999999','djsdsbj','bbvdvd','Microwave','Repair',NULL,'2024-09-01 00:00:00','2024-09-25 10:28:05',65,NULL,'Assigned',NULL,NULL,NULL,'2024-09-01 12:40:59',NULL,11,10,1,'2024-09-25 10:28:05','bhjbjv',NULL),(87,'20240901142297','bbhjvjvbdj','9999999999','bbjvdjjd','dvdvdhjb','Microwave','Repair','cash','2024-09-01 00:00:00','2024-09-06 20:12:40',67,'2024-09-07 10:51:11','Close',500.00,50.00,450.00,'2024-09-01 14:22:28',NULL,11,10,2,'2024-09-07 10:51:11','vbfvbhjd','done'),(88,'20240901190665','Rajesh mehta','9824566789','Near temple,  Gandhigram ','Rajkot','WashingMachine','Service','cash','2024-09-01 00:00:00','2024-09-01 19:10:42',2,'2024-09-01 19:16:14','Close',500.00,50.00,450.00,'2024-09-01 19:06:57',NULL,11,10,2,'2024-09-01 19:16:14','WM not starting','pcb wire done'),(89,'20240902171413','testName','5555555556','testAddres','testCity','Microwave','Repair','cash','2024-09-02 00:00:00','2024-09-02 17:15:10',41,'2024-09-02 17:16:30','Close',500.00,50.00,450.00,'2024-09-02 17:14:13',58,NULL,NULL,2,'2024-09-02 17:16:30','testDesctiption','testResolution'),(90,'20240902171769','dhvb','9999999999','bhvbj','vbbhdjvjd','Microwave','Repair','Cash','2024-09-02 00:00:00','2024-09-02 19:44:53',41,'2024-09-06 20:13:37','Close',500.00,50.00,450.00,'2024-09-02 17:17:35',58,NULL,NULL,2,'2024-09-06 20:13:37','cbdhj','Visite done'),(91,'20240902172143','testDealerName','5555555556','testDealerAddres','testDealerCity','Microwave','Repair','cash','2024-09-02 00:00:00','2024-09-23 21:48:59',55,'2024-09-23 21:50:00','Close',1200.00,200.00,1000.00,'2024-09-02 17:21:47',NULL,11,10,2,'2024-09-23 21:50:00','testDealerDeacriptionn','testAddminResolution'),(172,'2024081010','Ramesh Patel','9876543210','101, Silver Plaza','Ahmedabad','Repair','AC Service','Cash','2024-08-10 09:00:00','2024-08-11 10:00:00',55,'2024-08-12 12:00:00','Close',1500.00,100.00,1400.00,'2024-08-10 08:00:00',58,11,10,58,'2024-08-12 14:00:00','AC not cooling','Replaced AC compressor'),(173,'2024081111','Suresh Desai','9823456789','25, Market Road','Surat','Installation','Washing Machine','Card','2024-08-11 10:30:00',NULL,NULL,NULL,'New',NULL,NULL,NULL,'2024-08-11 10:00:00',64,7,11,NULL,NULL,'Washing machine installation',NULL),(174,'2024081212','Rajesh Mehta','9822345678','44, Ring Road','Rajkot','Maintenance','Refrigerator','Online','2024-08-12 11:00:00','2024-08-13 14:00:00',55,'2024-08-15 16:00:00','Close',2000.00,150.00,1850.00,'2024-08-12 10:30:00',66,12,12,66,'2024-08-15 18:00:00','Fridge not cooling properly','Gas refill and maintenance'),(178,'2024081313','Vijay Shah','9821234567','33, Station Road','Vadodara','Repair','Microwave','Cash','2024-08-13 09:45:00','2024-08-14 11:00:00',55,'2024-08-15 15:00:00','Close',1000.00,50.00,950.00,'2024-08-13 09:00:00',67,12,13,67,'2024-08-15 16:30:00','Microwave not heating','Replaced magnetron'),(185,'2024081414','Dipak Joshi','9820123456','10, GIDC Industrial Area','Bhavnagar','Repair','Dishwasher','Card','2024-08-14 13:30:00',NULL,NULL,NULL,'New',NULL,NULL,NULL,'2024-08-14 13:00:00',58,11,34,NULL,NULL,'Dishwasher not cleaning properly',NULL),(186,'2024081515','Kiran Trivedi','9812345678','2, Punit Plaza','Jamnagar','Repair','Water Purifier','Cash','2024-08-15 12:00:00','2024-08-16 14:00:00',65,'2024-08-18 17:00:00','Close',1200.00,80.00,1120.00,'2024-08-15 11:30:00',64,12,35,64,'2024-08-18 18:00:00','Water purifier leaking','Replaced filters and pipes'),(187,'2024081616','Bhavna Parikh','9813456789','50, Shanti Sadan','Anand','Installation','Television','Cash','2024-08-16 14:00:00','2024-08-17 10:00:00',67,'2024-08-18 13:00:00','Close',1800.00,150.00,1650.00,'2024-08-16 13:30:00',66,17,40,66,'2024-08-18 15:00:00','Television wall mount installation','Mounted and tested'),(188,'2024081717','Ketan Bhatt','9814567890','15, National Highway','Vapi','Repair','Washing Machine','Online','2024-08-17 10:00:00','2024-08-18 12:00:00',65,NULL,'Assigned',NULL,NULL,NULL,'2024-08-17 09:30:00',68,11,10,NULL,NULL,'Washing machine not draining',NULL),(189,'2024081818','Dharmesh Dave','9815678901','28, Sector 12','Gandhinagar','Repair','Refrigerator','Cash','2024-08-18 11:00:00','2024-08-19 14:00:00',65,'2024-08-20 15:30:00','Close',2500.00,200.00,2300.00,'2024-08-18 10:30:00',58,12,13,58,'2024-08-20 16:30:00','Fridge not cooling','Replaced cooling fan'),(190,'2024081919','Hemant Rana','9816789012','19, New Industrial Estate','Mehsana','Microwave','AC','Card','2024-08-19 00:00:00','2024-08-20 11:00:00',55,'2024-09-06 20:04:08','Cancelled',0.00,0.00,0.00,'2024-08-19 08:30:00',64,12,35,2,'2024-09-06 20:04:08','AC not cooling','Call canceled by customer'),(191,'20240922200483','Het Agrvat','6355494350','Rajkot','Rajkot','WashingMachine','Repair','cash','2024-09-22 00:00:00','2024-09-23 21:46:53',67,'2024-09-23 21:47:24','Close',1200.00,200.00,1000.00,'2024-09-22 20:04:11',1,NULL,NULL,2,'2024-09-23 21:47:24','repair machine','');
/*!40000 ALTER TABLE `servicecall` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicecenteruser`
--

DROP TABLE IF EXISTS `servicecenteruser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicecenteruser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `primarymobileno` varchar(10) NOT NULL,
  `secondmobileno` varchar(10) DEFAULT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(45) NOT NULL,
  `roletype` varchar(20) NOT NULL,
  `isactive` char(1) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime DEFAULT NULL,
  `lastlogindate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicecenteruser`
--

LOCK TABLES `servicecenteruser` WRITE;
/*!40000 ALTER TABLE `servicecenteruser` DISABLE KEYS */;
INSERT INTO `servicecenteruser` VALUES (1,'siddharth27','12345678','8460589338','9016023638','siddharth','borisagar','rajkot,gujrat,india','rajkot','admin','Y','2024-07-20 20:16:30',NULL,'2024-10-16 07:40:15'),(2,'bhavesh.patel','password123','9876543210','9876543211','Bhavesh','b chdubvd','123, Shanti Nagar','Ahmedabad','Technician','Y','2024-07-23 13:14:33','2024-09-22 19:55:05',NULL),(41,'Rajesh.mehta','admin','9016023638','8160067795','Rajesh','Mehta','Bhavnager road','Rajkot','Technician','N','2024-08-24 15:27:11','2024-09-22 19:54:55',NULL),(55,'Ramesh.ooza','rameshooza','8907676543','9956677223','Ramesh','Oozo','Kanaya chowk','Rajkot','Technician','Y','2024-08-26 10:43:38','2024-08-31 09:04:44',NULL),(56,'sidd','12345678','8128147474','9016023638','siddharth','borisagar','shyamnager 4','rajkot','Technician','N','2024-08-26 11:14:42','2024-08-26 11:15:11',NULL),(58,'siddharth01','sidd@1234','8460589338','9016023638','siddharth','borisagar','rajkot','rajkot','admin','N','2024-08-30 18:30:15','2024-09-25 10:41:34','2024-09-25 10:41:24'),(64,'admin01','hashedpassword123','9876543210','9123456789','Rajesh','Patel','101, Silver Plaza','Ahmedabad','admin','Y','2024-08-01 09:00:00','2024-08-10 14:00:00','2024-08-12 10:30:00'),(65,'tech01','hashedpassword456','9877654321',NULL,'Suresh','Mehta','44, Ring Road','Rajkot','Technician','Y','2024-08-02 10:30:00','2024-08-11 12:00:00','2024-08-15 11:00:00'),(66,'admin02','hashedpassword789','9765432109','9567890123','Priya','Sharma','55, Market Road','Surat','admin','Y','2024-08-03 11:00:00','2024-08-13 15:30:00','2024-08-16 14:45:00'),(67,'tech02','hashedpassword101','9823456789','9987654321','Vijay','Shah','33, Station Road','Vadodara','Technician','Y','2024-08-04 12:00:00','2024-08-14 13:00:00','2024-08-17 09:15:00'),(68,'admin03','hashedpassword111','9812345678',NULL,'Anita','Singh','60, New Colony','Jamnagar','admin','N','2024-08-05 14:00:00','2024-08-15 10:00:00',NULL),(69,'tech03','hashedpassword121','9821098765','9825674321','Bhavin','Trivedi','15, National Highway','Vapi','Technician','N','2024-08-06 15:30:00','2024-08-18 16:00:00',NULL),(70,'vbfhjvbdfj','bcdjvbdj','8888888888','8888888888','cdnck','ccdkk','cdkskck','vffdkfv k','Technician','Y','2024-09-07 11:28:04',NULL,NULL),(71,'Vivek Parmar','/dcjdsbm','1234567894','6131356564','Vivek','Parmar','Morbi','Morbi','Technician','Y','2024-09-22 19:58:48',NULL,NULL),(72,'Agravat Het','06082005','6355494350','6355494350','Het','Agravat','Rajkot','Rajkot','admin','Y','2024-10-16 07:41:08',NULL,'2024-10-16 07:41:36');
/*!40000 ALTER TABLE `servicecenteruser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `technicianpaymentgiven`
--

DROP TABLE IF EXISTS `technicianpaymentgiven`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `technicianpaymentgiven` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `technicianid` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `callid` int(11) DEFAULT NULL,
  `createdate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technicianpaymentgiven`
--

LOCK TABLES `technicianpaymentgiven` WRITE;
/*!40000 ALTER TABLE `technicianpaymentgiven` DISABLE KEYS */;
/*!40000 ALTER TABLE `technicianpaymentgiven` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-25 12:44:10
