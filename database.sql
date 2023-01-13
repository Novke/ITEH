/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.22-MariaDB : Database - iteh
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`iteh` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `iteh`;

/*Table structure for table `korisnik` */

DROP TABLE IF EXISTS `korisnik`;

CREATE TABLE `korisnik` (
  `ime` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `korisnik` */

insert  into `korisnik`(`ime`,`email`,`username`,`password`) values ('Pavle','pavlemata@gmail.com','ckove','1312'),('Milos','deadlift@maestro.rs','doyouliftbro','250kg'),('Gregor','ljubazemunac@gmail.hu','magas','magas'),('Marija','marija97@gmail.com','marija','123'),('Novica','novke.brate@gmail.com','novke','1337'),('Andrijana','andri.jana@yahoo.com','sekretarica','07062000');

/*Table structure for table `trener` */

DROP TABLE IF EXISTS `trener`;

CREATE TABLE `trener` (
  `ime` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `iskustvo` int(5) NOT NULL DEFAULT 0,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `trener` */

insert  into `trener`(`ime`,`username`,`password`,`iskustvo`) values ('Jocke','coca00','neimar123',153),('Marko','maremdm','pcg',20),('Djordje','roka','pale',350),('Cazim','vidramdk','vidovic2000',100);

/*Table structure for table `trening` */

DROP TABLE IF EXISTS `trening`;

CREATE TABLE `trening` (
  `datum` date NOT NULL,
  `vreme` int(5) NOT NULL,
  `korisnik` varchar(50) NOT NULL,
  `trener` varchar(50) NOT NULL,
  PRIMARY KEY (`datum`,`vreme`,`trener`),
  KEY `korisnik` (`korisnik`),
  KEY `trening_ibfk_2` (`trener`),
  CONSTRAINT `trening_ibfk_1` FOREIGN KEY (`korisnik`) REFERENCES `korisnik` (`username`),
  CONSTRAINT `trening_ibfk_2` FOREIGN KEY (`trener`) REFERENCES `trener` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `trening` */

insert  into `trening`(`datum`,`vreme`,`korisnik`,`trener`) values ('2023-03-21',12,'magas','coca00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
