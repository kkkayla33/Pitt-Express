# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.26)
# Database: PITTEXPRESS
# Generation Time: 2019-12-05 19:18:06 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Business_info
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Business_info`;

CREATE TABLE `Business_info` (
  `customer_id` int(5) NOT NULL,
  `income` int(10) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Business_info` WRITE;
/*!40000 ALTER TABLE `Business_info` DISABLE KEYS */;

INSERT INTO `Business_info` (`customer_id`, `income`)
VALUES
	(-1,100000),
	(3,10000000),
	(4,20000000),
	(7,40000000),
	(8,25000000),
	(10,15000000),
	(11,56000000),
	(13,13000000),
	(15,5000000),
	(17,500000),
	(18,2000000),
	(19,100000000),
	(24,10000),
	(28,10000);

/*!40000 ALTER TABLE `Business_info` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Classification
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Classification`;

CREATE TABLE `Classification` (
  `class_id` int(5) NOT NULL,
  `class_name` char(20) DEFAULT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Classification` WRITE;
/*!40000 ALTER TABLE `Classification` DISABLE KEYS */;

INSERT INTO `Classification` (`class_id`, `class_name`)
VALUES
	(1,'fruit'),
	(2,'meat'),
	(3,'beverage'),
	(4,'frozen food'),
	(5,'snack');

/*!40000 ALTER TABLE `Classification` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Customers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Customers`;

CREATE TABLE `Customers` (
  `customer_id` int(5) NOT NULL AUTO_INCREMENT,
  `username` char(20) DEFAULT NULL,
  `password` char(20) DEFAULT NULL,
  `kind` char(10) DEFAULT NULL,
  `street` char(50) DEFAULT NULL,
  `city` char(10) DEFAULT NULL,
  `state_id` int(5) DEFAULT NULL,
  `zip_code` int(5) DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Customers` WRITE;
/*!40000 ALTER TABLE `Customers` DISABLE KEYS */;

INSERT INTO `Customers` (`customer_id`, `username`, `password`, `kind`, `street`, `city`, `state_id`, `zip_code`)
VALUES
	(1,'ada','ada','Home','6224 5th ave','PIT',1,15232),
	(2,'alice','alice','Home','5 bayard road','PIT',1,15213),
	(3,'ellen','ellen','Business','5th Ave','NYC',2,14201),
	(4,'adam','adam','Business','6270 4th Ave','LA',3,95101),
	(5,'alexander','alexander','Home','6th Ave','BOS',4,2101),
	(6,'daniel','daniel','Home','910 42TH STREET','NYC',2,11219),
	(7,'carl','carl','Business','3450 Linden Place, Flushing','NYC',2,11354),
	(8,'dean','dean','Business','Fordham Road and the Bronx River Parkway','NYC',2,11231),
	(9,'lily','lily','Home','70 Hamilton Ave, Brooklyn','NYC',2,11231),
	(10,'jessica','jessica','Business','809 N.Hill St A','LA',3,90036),
	(11,'dave','dave','Business','443 Shatto Place','LA',3,90020),
	(12,'lucy','lucy','Home','39 Dalton Street','BOS',4,2199),
	(13,'henry','henry','Business','Oliver Ave & Mellon Sq, Pittsburgh','PIT',1,15222),
	(14,'kenney','kenney','Home','555 Lexington Avenue, 10th Floor, Room 202','NYC',2,10017),
	(15,'paul','paul','Business',' Gilroy 2 NewPark Mall','SF',3,94560),
	(16,'jessie','jessie','Home','620 Perry Pkwy ,Gaithersburg','NYC',2,14877),
	(17,'kyle','kyle','Business','18880 Gale Ave, Rowland Heights','LA',3,95108),
	(18,'emily','emily','Business',' 301 South Hills Village','PIT',1,15241),
	(19,'simon','simon','Business',' 41 West St 8 Floors','BOS',4,2111),
	(20,'will','will','Home','4200 Fifth Avenue','PIT',1,15260),
	(21,'oscar','oscar','home','Lombard St','SF',3,94133),
	(22,'ron','ron','Business','BELDEN ST #617','SF',3,94104),
	(23,'linda','linda','Home','301 South Hills Village','PIT',1,15241),
	(28,'zhujingjie','zhujingjie','Business','414 N Neville St','Pittsburgh',1,15213),
	(36,'abc','abc','Home','414 n mn','pit',1,12345);

/*!40000 ALTER TABLE `Customers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Detail
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Detail`;

CREATE TABLE `Detail` (
  `order_id` int(5) NOT NULL,
  `num` int(5) NOT NULL,
  `sale_price` float NOT NULL,
  `product_id` int(5) NOT NULL,
  PRIMARY KEY (`order_id`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Detail` WRITE;
/*!40000 ALTER TABLE `Detail` DISABLE KEYS */;

INSERT INTO `Detail` (`order_id`, `num`, `sale_price`, `product_id`)
VALUES
	(-1,1,1.03,1),
	(-1,1,0.39,2),
	(-1,2,3.49,3),
	(-1,2,5.29,5),
	(-1,3,2.3,6),
	(-1,1,7.49,8),
	(-1,2,5.59,12),
	(1,4,2,1),
	(1,50,1,14),
	(1,1,11,18),
	(2,30,1,2),
	(2,5,6,5),
	(2,10,12,7),
	(2,5,12,9),
	(3,20,7,12),
	(3,20,6,13),
	(4,1,9,8),
	(4,1,6,19),
	(4,1,4,21),
	(4,1,6,24),
	(5,20,7,12),
	(5,20,6,13),
	(5,20,6,23),
	(6,10,12,7),
	(6,30,1,14),
	(6,20,6,24),
	(7,2,5,3),
	(7,1,11,10),
	(8,3,11,11),
	(8,10,3,16),
	(8,10,4,25),
	(9,10,6,4),
	(9,5,6,5),
	(9,20,6,23),
	(10,1,5,3),
	(10,1,11,10),
	(10,3,4,21),
	(11,1,1.03,1),
	(11,1,0.39,2),
	(11,2,3.49,3),
	(11,2,5.29,5),
	(11,3,2.3,6),
	(11,1,7.49,8),
	(11,2,5.59,12),
	(13,1,1.03,1),
	(13,1,0.39,2),
	(13,1,3.49,3),
	(15,2,1.03,1),
	(15,1,0.39,2),
	(15,1,3.49,3),
	(15,1,5.29,5),
	(15,1,10.49,9);

/*!40000 ALTER TABLE `Detail` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Home_info
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Home_info`;

CREATE TABLE `Home_info` (
  `customer_id` int(5) NOT NULL,
  `income` int(10) DEFAULT NULL,
  `gender` char(5) DEFAULT NULL,
  `marriage` char(5) DEFAULT NULL,
  `age` int(5) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Home_info` WRITE;
/*!40000 ALTER TABLE `Home_info` DISABLE KEYS */;

INSERT INTO `Home_info` (`customer_id`, `income`, `gender`, `marriage`, `age`)
VALUES
	(1,500000,'F','Y',30),
	(2,200000,'F','N',23),
	(5,0,'M','N',18),
	(6,0,'M','N',16),
	(9,200000,'F','N',25),
	(12,150000,'F','Y',22),
	(14,500000,'F','Y',32),
	(16,300000,'F','Y',28),
	(20,0,'M','N',21);

/*!40000 ALTER TABLE `Home_info` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Inventory
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Inventory`;

CREATE TABLE `Inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_inventory_store` (`product_id`),
  CONSTRAINT `fk_inventory_product` FOREIGN KEY (`product_id`) REFERENCES `Product` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Inventory` WRITE;
/*!40000 ALTER TABLE `Inventory` DISABLE KEYS */;

INSERT INTO `Inventory` (`id`, `product_id`, `store_id`, `num`, `price`)
VALUES
	(1,1,6,40,6.99),
	(2,2,6,30,8.99),
	(3,1,1,10,9),
	(4,3,1,20,9.9),
	(5,4,1,20,10.9),
	(6,2,1,20,9.9),
	(7,5,1,20,9.8),
	(8,6,1,10,9.9);

/*!40000 ALTER TABLE `Inventory` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Manager
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Manager`;

CREATE TABLE `Manager` (
  `manager_id` int(5) NOT NULL,
  `name` char(10) DEFAULT NULL,
  `address` char(50) DEFAULT NULL,
  `email` char(20) DEFAULT NULL,
  `store_id` int(5) DEFAULT NULL,
  `salary` int(10) DEFAULT NULL,
  `password` char(20) DEFAULT NULL,
  `job_title` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`manager_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Manager` WRITE;
/*!40000 ALTER TABLE `Manager` DISABLE KEYS */;

INSERT INTO `Manager` (`manager_id`, `name`, `address`, `email`, `store_id`, `salary`, `password`, `job_title`)
VALUES
	(1,'cornelia','129 Fulton Street\r\n','cornelia@grocery.com',NULL,10000,'cornelia','region_manager'),
	(2,'eve','423 Shatto Place','eve@grocery.com',NULL,15000,'eve','region_manager'),
	(3,'daisy','1203 Western Ave','daisy@grocery.com',1,8000,'daisy','store_manager'),
	(4,'ethel','623 West End Avenue ,Unit4-ANewYork','ethel@grocery.com',2,8000,'ethel','store_manager'),
	(5,'tiffany','245 east broadway apt 1b new york NY','tiffany@grocery.com',3,8000,'tiffany','store_manager'),
	(6,'drew','202 W. 1st St. Los Angeles, CA 90012','drew@grocery.com',4,9000,'drew','store_manager'),
	(7,'earl','World Way, Los Angeles, CA 90045','earl@grocery.com',5,9500,'earl','store_manager'),
	(8,'joy','1 Dr Carlton B Goodlett Pl,CA 94102','joy@grocery.com',6,10000,'joy','store_manager'),
	(9,'gill','65 Beach St, Boston, MA 02111','gill@grocery.com',7,7000,'gill','store_manager');

/*!40000 ALTER TABLE `Manager` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Product`;

CREATE TABLE `Product` (
  `product_id` int(5) NOT NULL,
  `name` char(50) DEFAULT NULL,
  `amount` int(5) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `class_id` int(5) DEFAULT NULL,
  `cost` float DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `class_id` (`class_id`),
  CONSTRAINT `class_id` FOREIGN KEY (`class_id`) REFERENCES `Classification` (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Product` WRITE;
/*!40000 ALTER TABLE `Product` DISABLE KEYS */;

INSERT INTO `Product` (`product_id`, `name`, `amount`, `price`, `class_id`, `cost`, `image`)
VALUES
	(1,'apple',100,1.03,1,0.99,'apples.jpeg'),
	(2,'banana',100,0.39,1,0.2,'banana.jpg'),
	(3,'berry',100,3.49,1,2.99,'berry.jpg'),
	(4,'grape',100,4.29,1,3.01,'grape.jpg'),
	(5,'melon',100,5.29,1,4,'melon.jpg'),
	(6,'pear',100,2.3,1,2,'pear.jpeg'),
	(7,'ham',80,10.89,2,9,'ham.jpg'),
	(8,'hot dog',80,7.49,2,6,'hot dog.jpg'),
	(9,'shrimp',80,10.49,2,7,'shrimp.jpg'),
	(10,'salmon',50,7.99,2,5,'salmon.jpg'),
	(11,'turkey',80,7.99,2,5.5,'turkey.jpg'),
	(12,'coffee',150,5.59,3,3,'coffee.png'),
	(13,'tea',200,3.49,3,1,'tea.jpg'),
	(14,'water',1000,0.99,3,0.1,'water.jpg'),
	(15,'sparkling water',500,1.79,3,1,'sparkling water.jpeg'),
	(16,'coke',1000,2,3,1,'coke.jpg'),
	(17,'puff pastry',50,11.39,4,6,'puff pastry.jpeg'),
	(18,'dumpling',80,10.49,4,7,'dumpling.jpeg'),
	(19,'ice cream',50,3.99,4,2.99,'ice cream.jpg'),
	(20,'brown rice',60,2.99,4,1.99,'brown rice.jpg'),
	(21,'apple sauce',60,2.49,5,1.09,'apple sauce.jpg'),
	(22,'chocolate bar',100,2.49,5,1.59,'chocolate bar.jpg'),
	(23,'chips',200,3.99,5,2.29,'chips.jpg'),
	(24,'cookie',200,4.99,5,3.09,'cookie.jpg'),
	(25,'popcorn',100,2.7,5,1.5,'popcorn.png');

/*!40000 ALTER TABLE `Product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Region
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Region`;

CREATE TABLE `Region` (
  `region_id` int(5) NOT NULL AUTO_INCREMENT,
  `region_name` char(20) NOT NULL DEFAULT '',
  `manage_id` int(5) NOT NULL,
  PRIMARY KEY (`region_id`),
  UNIQUE KEY `region_name_UNIQUE` (`region_name`),
  UNIQUE KEY `manage_id_UNIQUE` (`manage_id`),
  CONSTRAINT `fk_Region_manager` FOREIGN KEY (`manage_id`) REFERENCES `Staff` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Region` WRITE;
/*!40000 ALTER TABLE `Region` DISABLE KEYS */;

INSERT INTO `Region` (`region_id`, `region_name`, `manage_id`)
VALUES
	(1,'PA',4),
	(2,'NY',3);

/*!40000 ALTER TABLE `Region` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table region_volume
# ------------------------------------------------------------

DROP VIEW IF EXISTS `region_volume`;

CREATE TABLE `region_volume` (
   `region_id` INT(5) NULL DEFAULT NULL,
   `region_name` CHAR(20) NOT NULL DEFAULT '',
   `region_manager` CHAR(10) NULL DEFAULT NULL,
   `region_performance` DOUBLE NULL DEFAULT NULL
) ENGINE=MyISAM;



# Dump of table Salesperson
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Salesperson`;

CREATE TABLE `Salesperson` (
  `sales_id` int(5) NOT NULL,
  `name` char(20) DEFAULT NULL,
  `address` char(50) DEFAULT NULL,
  `email` char(20) DEFAULT NULL,
  `store_id` int(5) DEFAULT NULL,
  `salary` int(10) DEFAULT NULL,
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Salesperson` WRITE;
/*!40000 ALTER TABLE `Salesperson` DISABLE KEYS */;

INSERT INTO `Salesperson` (`sales_id`, `name`, `address`, `email`, `store_id`, `salary`)
VALUES
	(100,'gloria','6th ave','gloria@grocery.com',1,5000),
	(101,'cam','129 Fulton Street','cam@grocery.com',1,5000),
	(102,'molly','910 42TH STREET','molly@grocery.com',2,6000),
	(103,'tammy','7th ave','tammy@grocery.com',2,6000),
	(104,'claire','4114 Sepulveda rd','claire@grocery.com',3,6000),
	(105,'phil','Brookville Blvd L16','phil@grocery.com',3,6000),
	(106,'tina','10920 Lindbrook Drive , Los Angeles','tina@grocery.com',4,7000),
	(107,'rita','10920 Lindbrook Drive , Los Angeles','rita@grocery.com',4,6000),
	(108,'tom','10620 Lindbrook Drive , Los Angeles','tom@grocery.com',5,7000),
	(109,'jerry','10620 Lindbrook Drive , Los Angeles','jerry@grocery.com',5,7000),
	(110,'max','1 Dr Carlton B Goodlett Pl','max@grocery.com',6,6000),
	(111,'caroline','1 Dr Carlton B Goodlett Pl','caroline@grocery.com',6,6000),
	(112,'ross','39 Dalton Street','ross@grocery.com',7,6000),
	(113,'chandler','39 Dalton Street','chandler@grocery.com',7,7000);

/*!40000 ALTER TABLE `Salesperson` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Staff
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Staff`;

CREATE TABLE `Staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `salary` int(11) NOT NULL,
  `region` int(11) DEFAULT NULL,
  `store` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Staff` WRITE;
/*!40000 ALTER TABLE `Staff` DISABLE KEYS */;

INSERT INTO `Staff` (`id`, `username`, `password`, `name`, `address`, `email`, `salary`, `region`, `store`)
VALUES
	(1,'ceo','imboss','Bill Gates','1 Rich St','bill.gates@pitt.edu',1,1,1),
	(3,'s.jobs','s.jobs','Steve Jobs','1000 Loop St.','steve.jobs@pitt.edu',2224,2,4),
	(4,'zuck','berg','Zuckberg','981 Facebook Blvd.','m.zuck@pitt.edu',100,1,2),
	(8,'jeff.b','jeff.b','Jeff Bezos','101 Seattle St.','jeff.b@pitt.edu',1000,2,6),
	(9,'warren','buffet','Warren Buffett','202 Fortune Ave.','war139@pitt.edu',2000,1,1),
	(10,'berny','berny','Bernard Arnault','11 No.5 Ave','berny@pitt.edu',1999,1,3),
	(12,'taylor','ilovecat13','Taylor Swift','48 McKenzie St.','ex.bf.bs@pitt.edu',5000,2,5),
	(14,'abby','abby','Abby','123 St','za@ab.co',1111,2,4),
	(15,'ross','ross','Ross','321 St','ross@pitt.edu',111,1,2),
	(16,'mike','mike','Mike','1234 Tree','mike@pitt.edu',1234,1,1),
	(17,'john','john','John','987 Adve','adv@pitt.edu',1221,1,3),
	(18,'lee','lee','Lee','99 Po St.','lee@pitt.edu',9898,1,3),
	(19,'hong','hong','Hong','987 Redmood','hong@pitt.edu',3333,1,2),
	(20,'mcmc','mcmc','Macau','98 Srr. St','mc@mc.pitt.edu',345,2,4);

/*!40000 ALTER TABLE `Staff` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table store
# ------------------------------------------------------------

DROP TABLE IF EXISTS `store`;

CREATE TABLE `store` (
  `store_id` int(5) NOT NULL AUTO_INCREMENT,
  `region_id` int(5) DEFAULT NULL,
  `address` char(50) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`store_id`),
  UNIQUE KEY `manager_id_UNIQUE` (`manager_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `store` WRITE;
/*!40000 ALTER TABLE `store` DISABLE KEYS */;

INSERT INTO `store` (`store_id`, `region_id`, `address`, `manager_id`)
VALUES
	(1,1,'1203 Western Ave',9),
	(2,1,'42TH STREET BROOKLYN',15),
	(3,1,'129 Fulton Street',10),
	(4,2,'1 World Way, Los Angeles',14),
	(5,2,'5301 Beach Boulevard, Buena Park ,CA',12),
	(6,2,'1 Dr Carlton B Goodlett Pl',8);

/*!40000 ALTER TABLE `store` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table store_volume
# ------------------------------------------------------------

DROP VIEW IF EXISTS `store_volume`;

CREATE TABLE `store_volume` (
   `store_id` INT(5) NOT NULL DEFAULT '0',
   `region_name` CHAR(20) NOT NULL DEFAULT '',
   `address` CHAR(50) NULL DEFAULT NULL,
   `store_manager` VARCHAR(45) NOT NULL,
   `store_performance` DOUBLE NULL DEFAULT NULL
) ENGINE=MyISAM;



# Dump of table top_product
# ------------------------------------------------------------

DROP VIEW IF EXISTS `top_product`;

CREATE TABLE `top_product` (
   `product_id` INT(5) NOT NULL,
   `name` CHAR(50) NULL DEFAULT NULL,
   `sales` DECIMAL(32) NULL DEFAULT NULL
) ENGINE=MyISAM;



# Dump of table total_profit
# ------------------------------------------------------------

DROP VIEW IF EXISTS `total_profit`;

CREATE TABLE `total_profit` (
   `total_profit` DOUBLE NULL DEFAULT NULL
) ENGINE=MyISAM;



# Dump of table total_sales
# ------------------------------------------------------------

DROP VIEW IF EXISTS `total_sales`;

CREATE TABLE `total_sales` (
   `total_sales` DOUBLE NULL DEFAULT NULL
) ENGINE=MyISAM;



# Dump of table Transaction
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Transaction`;

CREATE TABLE `Transaction` (
  `order_id` int(5) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `sales_id` int(5) DEFAULT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `store_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Transaction` WRITE;
/*!40000 ALTER TABLE `Transaction` DISABLE KEYS */;

INSERT INTO `Transaction` (`order_id`, `date`, `sales_id`, `customer_id`, `store_id`)
VALUES
	(1,'2019-06-13',1,1,1),
	(2,'2019-02-13',3,13,1),
	(3,'2019-03-13',4,3,2),
	(4,'2019-03-05',8,4,4),
	(5,'2019-02-06',9,4,4),
	(6,'2019-05-07',10,10,5),
	(7,'2019-04-03',12,16,5),
	(8,'2019-03-07',14,19,7),
	(9,'2018-08-15',110,15,6),
	(10,'2019-03-08',111,21,6),
	(13,'2019-12-05',20,28,4),
	(14,'2019-12-05',20,28,4),
	(15,'2019-12-05',14,36,4),
	(16,'2019-12-05',17,36,3);

/*!40000 ALTER TABLE `Transaction` ENABLE KEYS */;
UNLOCK TABLES;




# Replace placeholder table for store_volume with correct view syntax
# ------------------------------------------------------------

DROP TABLE `store_volume`;

CREATE ALGORITHM=UNDEFINED DEFINER=`zhujingjie`@`%` SQL SECURITY DEFINER VIEW `store_volume`
AS SELECT
   `store`.`store_id` AS `store_id`,
   `region`.`region_name` AS `region_name`,
   `store`.`address` AS `address`,
   `staff`.`name` AS `store_manager`,sum((`detail`.`num` * `detail`.`sale_price`)) AS `store_performance`
FROM ((((`detail` join `transaction`) join `store`) join `region`) join `staff`) where ((`detail`.`order_id` = `transaction`.`order_id`) and (`transaction`.`store_id` = `store`.`store_id`) and (`region`.`region_id` = `store`.`region_id`) and (`store`.`manager_id` = `staff`.`id`)) group by `store`.`store_id` order by `store_performance` desc;


# Replace placeholder table for total_profit with correct view syntax
# ------------------------------------------------------------

DROP TABLE `total_profit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`zhujingjie`@`%` SQL SECURITY DEFINER VIEW `total_profit`
AS SELECT
   sum((`detail`.`num` * (`detail`.`sale_price` - `product`.`cost`))) AS `total_profit`
FROM (`detail` join `product`) where (`detail`.`product_id` = `product`.`product_id`);


# Replace placeholder table for total_sales with correct view syntax
# ------------------------------------------------------------

DROP TABLE `total_sales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`zhujingjie`@`%` SQL SECURITY DEFINER VIEW `total_sales`
AS SELECT
   sum((`detail`.`num` * `detail`.`sale_price`)) AS `total_sales`
FROM `detail`;


# Replace placeholder table for top_product with correct view syntax
# ------------------------------------------------------------

DROP TABLE `top_product`;

CREATE ALGORITHM=UNDEFINED DEFINER=`zhujingjie`@`%` SQL SECURITY DEFINER VIEW `top_product`
AS SELECT
   `product`.`product_id` AS `product_id`,
   `product`.`name` AS `name`,sum(`detail`.`num`) AS `sales`
FROM (`product` join `detail`) where (`product`.`product_id` = `detail`.`product_id`) group by `detail`.`product_id` order by `sales` desc limit 10;


# Replace placeholder table for region_volume with correct view syntax
# ------------------------------------------------------------

DROP TABLE `region_volume`;

CREATE ALGORITHM=UNDEFINED DEFINER=`zhujingjie`@`%` SQL SECURITY DEFINER VIEW `region_volume`
AS SELECT
   `store`.`region_id` AS `region_id`,
   `region`.`region_name` AS `region_name`,
   `manager`.`name` AS `region_manager`,sum((`detail`.`num` * `detail`.`sale_price`)) AS `region_performance`
FROM ((((`detail` join `transaction`) join `store`) join `region`) join `manager`) where ((`detail`.`order_id` = `transaction`.`order_id`) and (`transaction`.`store_id` = `store`.`store_id`) and (`store`.`region_id` = `region`.`region_id`) and (`region`.`manage_id` = `manager`.`manager_id`)) group by `store`.`region_id` order by `region_performance` desc;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
