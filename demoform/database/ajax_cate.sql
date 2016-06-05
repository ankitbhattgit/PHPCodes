-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2014 at 07:02 PM
-- Server version: 5.1.69
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ajax_cate`
--

-- --------------------------------------------------------

--
-- Table structure for table `sub_surgery`
--

CREATE TABLE IF NOT EXISTS `sub_surgery` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `surgery_name` varchar(255) NOT NULL,
  `parent_id` int(3) NOT NULL,
  `price` varchar(20) NOT NULL,
  `recommended_stay` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `sub_surgery`
--

INSERT INTO `sub_surgery` (`id`, `surgery_name`, `parent_id`, `price`, `recommended_stay`) VALUES
(9, 'Breast Augmentation (Round up to 499cc.)', 13, '3,785', '>= 9'),
(10, 'Breast Augmentation (Round > 500cc.)', 13, '3,950', '>= 9'),
(11, 'Breast Augmentation (dual plane round)', 13, '4,279', '>= 9'),
(12, 'Breast Augmentation (Tear drop)', 13, '4,773', '>= 9'),
(13, 'Endoscopic breast augmentation (round up to 499cc)', 13, '4,279', '>= 9'),
(14, 'Nipple Reduction 1 side', 14, '494', '>= 9'),
(15, 'Nipple Reduction 2 sides', 14, '987', '>= 9'),
(16, 'Areolar Reduction 1 side', 14, '658', '>= 9'),
(17, 'Areolar Reduction 2 sides', 14, '1,317', '>= 9'),
(18, 'Correction of inverted nipple 1 side', 14, '494', '>= 9'),
(19, 'Correction of inverted nipple 2 sides', 14, '987', '>= 9'),
(20, 'Male Areola Reduction 1 side', 14, '494', '>= 9'),
(21, 'Male Areola Reduction 2 sides', 14, '987', '>= 9'),
(22, 'Male Breast Reduction ', 14, '2,633 - 5,266', '>= 9'),
(23, 'Breast Lift', 15, '4,279', '>= 16'),
(24, 'Breast Reduction', 15, '5,925', '>= 16'),
(25, 'Breast Reduction with free nipple graft (no implant)', 15, '7,899', '>= 16'),
(26, 'Breast Reduction with free nipple graft (with round implant)', 15, '9,545', '>= 16'),
(27, 'Breast Lift with Implant (Round)', 15, '6,912', '>= 16'),
(28, 'Breast Lift Implant (Tear Drop)', 15, '7,899', '>= 16'),
(29, 'Breast Reduction-Lift with Implant (Round)', 15, '8,229', '>= 16'),
(30, 'Breast Reduction with chest wall contouring and implant (round)', 15, '9,874', '>= 16'),
(32, 'Removal of Breast Implant', 16, '1,975', '>= 9'),
(33, 'Removal of Breast Implant with Capsulectomy', 16, '3,291', '>= 9'),
(34, 'Simple Revision of Breast Implant', 16, '4,937 - 5,595', '>= 9'),
(35, 'Revision Breast Implant with Reduction-lift', 16, '8,558', '>= 16'),
(36, 'Revision Breast Implant with Reduction-lift (Tear Drop)', 16, '9,545', '>= 16'),
(37, 'Re-Implant Surgery (Round) 6 mos. after removal', 16, '3,785', '>= 9'),
(38, 'Face and Neck Lift', 17, '6,912', '>= 16'),
(39, 'Forehead lift (Coronal Brow Lift)', 17, '3,621', '>= 16'),
(40, 'Face Lift', 17, '4,279', '>= 16'),
(41, 'Neck Lift', 17, '2,633', '>= 16'),
(42, 'Forehead lift, Face lift, Neck lift', 17, '9,216', '>= 16'),
(43, 'Neck Lift with Mentoplasty (muscle repair)', 17, '2,962 - 3,621', '>= 16'),
(44, 'Upper blepharoplasty L.A.', 18, '922', '>= 9'),
(45, 'Lower blepharoplasty L.A.', 18, '922', '>= 9'),
(46, 'Upper OR lower blepharoplasty ', 18, '1,975', '>= 9'),
(47, 'Four lids plasty L.A.', 18, '1,777', '>= 9'),
(48, 'Four lids plasty G.A.', 18, '3,621', '>= 9'),
(49, 'Lateral brow lift L.A.', 19, '1,317', '>= 16'),
(50, 'Lateral brow lift G.A.', 19, '2,962', '>= 16'),
(51, 'Coronal Brow Lift (Forehead Lift)', 19, '3,621', '>= 16'),
(52, 'Augmentation Rhinoplasty & Alarplasty', 20, '1,646', '>= 9'),
(53, 'Augmentation Rhinoplasty', 20, '987', '>= 9'),
(54, 'Alarplasty', 20, '823', '>= 9'),
(55, 'Removal of Nasal Silicone implant', 20, '296', '-'),
(56, 'Reduction Rhinoplasty', 20, '2,633 - 4,937', '>= 16'),
(57, 'Prominent Ear Correction 1 side', 21, '823', '>= 9'),
(58, 'Prominent Ear Correction 2 sides', 21, '1,580', '>= 9'),
(59, 'Earlobe repair (after piercing) 1 side', 21, '658', '>= 9'),
(60, 'Earlobe repair (after piercing) 2 sides', 21, '1,317', '>= 9'),
(61, 'Minor Liposuction under L.A.', 22, '987', '>= 9'),
(62, 'Traditional Liposuction - 1st Area', 22, '1,975', '>= 9'),
(63, 'Liposuction Each extra area (Per Area)', 22, '658', '>= 9'),
(64, 'Cool Lipo - 1st Area', 22, '2,633', '>= 9'),
(65, 'Cool Lipo - Each extra area (Per Area)', 22, '823', '>= 9'),
(66, 'Abdominoplasty (Tummy Tuck)', 23, '5,431', '>= 16'),
(67, 'Abdominoplasty (Tummy Tuck) with trad lipo 2 areas', 23, '6,254', '>= 16'),
(68, 'Belt Lipectomy', 23, '7,241', '>= 16'),
(69, 'Belt Lipectomy with trad lipo 1 area', 23, '7,899', '>= 16'),
(70, 'Brachioplasty', 23, '3,950', '>= 16'),
(71, 'Thigh Lift (Medial)', 23, '4,608', '>= 16'),
(72, 'Thigh Lift (Lateral)', 23, '4,608', '>= 16'),
(73, 'Buttock Implant', 23, '5,595', '>= 16'),
(74, 'Excision of excess skin-fat (back)', 23, '5,266', '>= 16'),
(75, 'Fillers (Restylane) 1 box / BOTOX 1 bottle', 24, '987', '-'),
(76, 'Tracheal Shave', 25, '1,317', '>= 9'),
(77, 'SRS / GRS', 25, '13,166', '>= 21'),
(78, 'SRS And Breast Augmentation', 25, '16,951', '>= 21'),
(79, 'Labia reduction', 26, '823 - 1,646', '>=9'),
(80, 'Labia plasty after SRS ', 26, '1,975', '>= 9'),
(81, 'Forehead Brow Contouring', 27, '7,077', '>= 16'),
(82, 'Cheek Implant L.A.', 27, '1,646', '>= 12'),
(83, 'Cheek Implant G.A.', 27, '3,291', '>= 12'),
(84, 'Chin Augmentation L.A.', 27, '1,317', '>= 12'),
(85, 'Chin Augmentation G.A.', 27, '2,633', '>= 12'),
(86, 'Chin Contouring', 27, '2,633', '>= 12'),
(87, 'Chin and Mandible Angle Reduction', 27, '7,570', '>= 16'),
(88, 'Mandible Angle Reduction ', 27, '6,583', '>= 16'),
(89, 'Labiaplasty with Fat graft injection ', 27, '3,950', '>= 9');

-- --------------------------------------------------------

--
-- Table structure for table `surgery`
--

CREATE TABLE IF NOT EXISTS `surgery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `surgery_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `surgery`
--

INSERT INTO `surgery` (`id`, `surgery_name`) VALUES
(18, 'Eyelid Surgery'),
(17, 'Face Lift'),
(14, 'Breast Surgery'),
(13, 'Breast Implants'),
(16, 'Revision Breast Implants'),
(15, 'Breast Lift / Reduction-Lift with Implant'),
(19, 'Brow Surgery'),
(20, 'Nose Surgery'),
(21, 'Ear Surgery'),
(22, 'Liposuction'),
(23, 'Body Contouring'),
(24, 'BOTOX And Fillers'),
(25, 'Reassignment Surgery (Male To Female)'),
(26, 'Labia'),
(27, 'Feminisation Surgery');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
