-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 17, 2015 at 11:18 AM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `college`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academicproject`
--

CREATE TABLE IF NOT EXISTS `tbl_academicproject` (
  `idacademicproject` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_title` varchar(255) NOT NULL,
  `college_name` varchar(255) NOT NULL,
  `time_duration` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `team_size` varchar(5) NOT NULL,
  `project_description` text NOT NULL,
  `tools_used` text NOT NULL,
  `challenges` text NOT NULL,
  `idstudent` bigint(20) NOT NULL,
  PRIMARY KEY (`idacademicproject`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_academicproject`
--

INSERT INTO `tbl_academicproject` (`idacademicproject`, `project_title`, `college_name`, `time_duration`, `role`, `team_size`, `project_description`, `tools_used`, `challenges`, `idstudent`) VALUES
(1, 'nn', 'nn', 'nnnn', 'nnnnn', '4', 'nnnnnn php CSS', 'nnnnnnnnnnnnnnnnnnnnn n  n  nnnnn ', 'nn nnn n n n nn nn nn n nn nn nn nn nn php', 1),
(2, 'qq', 'aa', 'uyuy', 'qp', '4', 'used php here as core language', 'ewqewqweq', 'ewqewqewqqq', 2),
(3, 'm', 'mm', 'uyuy', 'qp', '4', 'java', 'pphp', 'html', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_achievements`
--

CREATE TABLE IF NOT EXISTS `tbl_achievements` (
  `idachievements` bigint(20) NOT NULL AUTO_INCREMENT,
  `achievements` text NOT NULL,
  `idstudent` bigint(20) NOT NULL,
  PRIMARY KEY (`idachievements`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `tbl_achievements`
--

INSERT INTO `tbl_achievements` (`idachievements`, `achievements`, `idstudent`) VALUES
(41, 'achievements ', 1),
(42, 'one', 1),
(43, 'achievements ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companies`
--

CREATE TABLE IF NOT EXISTS `tbl_companies` (
  `idcompanies` bigint(20) NOT NULL AUTO_INCREMENT,
  `companyname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`idcompanies`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companyproject`
--

CREATE TABLE IF NOT EXISTS `tbl_companyproject` (
  `idcompanyproject` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_title` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `time_duration` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `team_size` varchar(5) NOT NULL,
  `project_description` text NOT NULL,
  `tools_used` text NOT NULL,
  `challenges` text NOT NULL,
  `idstudent` bigint(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`idcompanyproject`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_companyproject`
--

INSERT INTO `tbl_companyproject` (`idcompanyproject`, `project_title`, `company_name`, `time_duration`, `role`, `team_size`, `project_description`, `tools_used`, `challenges`, `idstudent`, `start_date`, `end_date`) VALUES
(2, 'p', 'p', '1', '2121', '4', '', 'kjh', 'jkh', 2, '0000-00-00', '0000-00-00'),
(3, 'po', 'poipoi', '32', 'WER', '1', 'po', 'popopo', 'p', 1, '2015-01-06', '2015-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_corecompetancy`
--

CREATE TABLE IF NOT EXISTS `tbl_corecompetancy` (
  `idcorecompetancy` bigint(20) NOT NULL AUTO_INCREMENT,
  `corecompetancy` varchar(255) DEFAULT NULL,
  `idstudent` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`idcorecompetancy`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `tbl_corecompetancy`
--

INSERT INTO `tbl_corecompetancy` (`idcorecompetancy`, `corecompetancy`, `idstudent`) VALUES
(52, 'K', 1),
(53, 'i', 1),
(54, 'r', 1),
(55, 'K', 1),
(56, '2345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE IF NOT EXISTS `tbl_department` (
  `iddepartment` bigint(20) NOT NULL AUTO_INCREMENT,
  `department` varchar(255) NOT NULL,
  PRIMARY KEY (`iddepartment`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`iddepartment`, `department`) VALUES
(1, 'Computer Science'),
(2, 'Electronic  Science');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pgdipcourses`
--

CREATE TABLE IF NOT EXISTS `tbl_pgdipcourses` (
  `idpgdipcourses` bigint(20) NOT NULL AUTO_INCREMENT,
  `pgdip_coursename` varchar(255) NOT NULL,
  PRIMARY KEY (`idpgdipcourses`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_pgdipcourses`
--

INSERT INTO `tbl_pgdipcourses` (`idpgdipcourses`, `pgdip_coursename`) VALUES
(1, 'Advanced Diploma in ASIC Design'),
(2, 'Advanced Diploma in ASIC Physical Design');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pgdipcoursesresumetypes`
--

CREATE TABLE IF NOT EXISTS `tbl_pgdipcoursesresumetypes` (
  `idpgdipcoursesresumetypes` bigint(20) NOT NULL AUTO_INCREMENT,
  `idpgdipcourses` bigint(20) NOT NULL,
  `idresumetypes` bigint(20) NOT NULL,
  PRIMARY KEY (`idpgdipcoursesresumetypes`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_pgdipcoursesresumetypes`
--

INSERT INTO `tbl_pgdipcoursesresumetypes` (`idpgdipcoursesresumetypes`, `idpgdipcourses`, `idresumetypes`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recruitement`
--

CREATE TABLE IF NOT EXISTS `tbl_recruitement` (
  `idrecruitement` bigint(20) NOT NULL AUTO_INCREMENT,
  `recruitementposition` varchar(500) NOT NULL,
  `idrecruiter` bigint(20) NOT NULL,
  `approved` enum('Yes','No') NOT NULL,
  `status` enum('Open','Close') NOT NULL,
  `recruitementdate` date NOT NULL,
  PRIMARY KEY (`idrecruitement`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_recruitement`
--

INSERT INTO `tbl_recruitement` (`idrecruitement`, `recruitementposition`, `idrecruiter`, `approved`, `status`, `recruitementdate`) VALUES
(1, 'SE', 1, 'No', 'Open', '2015-01-15'),
(2, 'Training SE', 1, 'Yes', 'Open', '2015-01-13'),
(3, 'RV-VLSI designer', 2, 'Yes', 'Close', '2015-01-02'),
(4, ' Chip Design SE', 1, 'No', 'Open', '2015-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recruitementresumes`
--

CREATE TABLE IF NOT EXISTS `tbl_recruitementresumes` (
  `idrecruitementresumes` bigint(20) NOT NULL AUTO_INCREMENT,
  `idrecruitement` bigint(20) NOT NULL,
  `idstudent` bigint(20) NOT NULL,
  PRIMARY KEY (`idrecruitementresumes`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_recruitementresumes`
--

INSERT INTO `tbl_recruitementresumes` (`idrecruitementresumes`, `idrecruitement`, `idstudent`) VALUES
(2, 1, 1),
(3, 1, 2),
(4, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recruiter`
--

CREATE TABLE IF NOT EXISTS `tbl_recruiter` (
  `idrecruiter` int(11) NOT NULL AUTO_INCREMENT,
  `usename` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `pin` varchar(50) NOT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `designation` varchar(255) NOT NULL,
  `std` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `web_url` varchar(255) NOT NULL,
  `comp_desc` text NOT NULL,
  `industry` varchar(255) NOT NULL,
  `no_employes` varchar(255) NOT NULL,
  `approve` int(11) NOT NULL,
  `active` binary(1) DEFAULT '1',
  `registereddate` varchar(20) DEFAULT NULL,
  `Otherindustry` varchar(100) DEFAULT '0',
  PRIMARY KEY (`idrecruiter`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_recruiter`
--

INSERT INTO `tbl_recruiter` (`idrecruiter`, `usename`, `password`, `email`, `company`, `address`, `pin`, `city`, `state`, `country`, `designation`, `std`, `contact`, `mobile`, `web_url`, `comp_desc`, `industry`, `no_employes`, `approve`, `active`, `registereddate`, `Otherindustry`) VALUES
(1, 'Venky Sir', '1234', 'venky@gmail.com', 'IBM', '', '', NULL, NULL, NULL, '', '', '', '', '', '', '', '', 0, '1', NULL, '0'),
(2, 'Archana Mam', '1234', 'archana@rv-vlsi.com', 'Rv-VLSI ', '', '', NULL, NULL, NULL, '', '', '', '', '', '', '', '', 0, '1', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resumekeywords`
--

CREATE TABLE IF NOT EXISTS `tbl_resumekeywords` (
  `idresumekeywords` bigint(20) NOT NULL AUTO_INCREMENT,
  `idresumetype` bigint(20) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  PRIMARY KEY (`idresumekeywords`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_resumekeywords`
--

INSERT INTO `tbl_resumekeywords` (`idresumekeywords`, `idresumetype`, `keywords`) VALUES
(1, 1, 'php'),
(2, 2, 'html'),
(3, 1, 'css'),
(4, 2, 'jquery'),
(5, 3, 'nnnn'),
(6, 3, 'kiran');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resumetypes`
--

CREATE TABLE IF NOT EXISTS `tbl_resumetypes` (
  `idresumetype` bigint(20) NOT NULL AUTO_INCREMENT,
  `resumetypename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idresumetype`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_resumetypes`
--

INSERT INTO `tbl_resumetypes` (`idresumetype`, `resumetypename`) VALUES
(1, 'VLSI - Front End'),
(2, 'EMBEDDED'),
(3, 'HTML');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE IF NOT EXISTS `tbl_student` (
  `idstudent` bigint(20) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `pincode` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `fathername` varchar(100) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `languages` varchar(1000) DEFAULT NULL,
  `nationality` varchar(500) DEFAULT NULL,
  `sslc_passoutyear` varchar(10) DEFAULT NULL,
  `sslc_percentagetype` varchar(10) DEFAULT NULL,
  `sslc_percentage` varchar(10) DEFAULT NULL,
  `sslc_schoolname` varchar(1000) DEFAULT NULL,
  `puc_passoutyear` varchar(10) DEFAULT NULL,
  `puc_percentagetype` varchar(10) DEFAULT NULL,
  `puc_percentage` varchar(10) DEFAULT NULL,
  `puc_schoolname` varchar(1000) DEFAULT NULL,
  `deg_passoutyear` varchar(10) DEFAULT NULL,
  `deg_percentagetype` varchar(10) DEFAULT NULL,
  `deg_schoolname` varchar(1000) DEFAULT NULL,
  `deg_percentage` varchar(10) DEFAULT NULL,
  `deg_university` varchar(10) DEFAULT NULL,
  `pg_percentagetype` varchar(10) DEFAULT NULL,
  `pg_schoolname` varchar(1000) DEFAULT NULL,
  `pg_percentage` varchar(10) DEFAULT '0',
  `pg_passoutyear` varchar(10) DEFAULT NULL,
  `pg_university` varchar(1000) DEFAULT NULL,
  `address` text,
  `pgdip_percentagetype` varchar(10) DEFAULT NULL,
  `pgdip_schoolname` varchar(255) DEFAULT NULL,
  `pgdip_percentage` varchar(10) DEFAULT '0',
  `pgdip_passoutyear` varchar(5) DEFAULT NULL,
  `pgdip_university` varchar(255) DEFAULT NULL,
  `deg_department` bigint(20) DEFAULT NULL,
  `pg_department` bigint(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `career_objective` text NOT NULL,
  `phd_percentagetype` varchar(255) NOT NULL,
  `phd_schoolname` varchar(255) NOT NULL,
  `phd_percentage` varchar(255) NOT NULL DEFAULT '0',
  `phd_passoutyear` varchar(255) NOT NULL,
  `phd_university` varchar(255) NOT NULL,
  `phd_department` varchar(255) NOT NULL,
  `rvvlsiid` varchar(25) NOT NULL DEFAULT '0',
  `pgdip_coursename` varchar(255) NOT NULL,
  `deg_projectname` varchar(255) DEFAULT NULL,
  `deg_projectdescription` varchar(500) DEFAULT NULL,
  `deg_projecttools` varchar(255) DEFAULT NULL,
  `deg_projectchallenges` varchar(500) DEFAULT NULL,
  `pg_projectname` varchar(255) DEFAULT NULL,
  `pg_projectdescription` varchar(500) DEFAULT NULL,
  `pg_projecttools` varchar(255) DEFAULT NULL,
  `pg_projectchallenges` varchar(500) DEFAULT NULL,
  `resumeid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idstudent`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`idstudent`, `firstname`, `lastname`, `email`, `mobile`, `city`, `pincode`, `country`, `state`, `dob`, `fathername`, `gender`, `languages`, `nationality`, `sslc_passoutyear`, `sslc_percentagetype`, `sslc_percentage`, `sslc_schoolname`, `puc_passoutyear`, `puc_percentagetype`, `puc_percentage`, `puc_schoolname`, `deg_passoutyear`, `deg_percentagetype`, `deg_schoolname`, `deg_percentage`, `deg_university`, `pg_percentagetype`, `pg_schoolname`, `pg_percentage`, `pg_passoutyear`, `pg_university`, `address`, `pgdip_percentagetype`, `pgdip_schoolname`, `pgdip_percentage`, `pgdip_passoutyear`, `pgdip_university`, `deg_department`, `pg_department`, `password`, `career_objective`, `phd_percentagetype`, `phd_schoolname`, `phd_percentage`, `phd_passoutyear`, `phd_university`, `phd_department`, `rvvlsiid`, `pgdip_coursename`, `deg_projectname`, `deg_projectdescription`, `deg_projecttools`, `deg_projectchallenges`, `pg_projectname`, `pg_projectdescription`, `pg_projecttools`, `pg_projectchallenges`, `resumeid`) VALUES
(1, 'kirans', 'kiranss', 'a', '', 'kiran', 'kiran', 'India', 'Karnataka', '0000-00-00', 'kiran', 'Male', 'kiran', 'kiran', '2011', 'CGPA', '1', '11', '2012', 'CGPA', 'CGPA', '22', '2013', 'Percentage', '33', '30', '333', 'CGPA', '44', '4', '2013', '333', 'ssss', 'CGPA', '1', '5', '2011', '5555', 2, 1, '1111', 'kkkkk', 'Percentage', 'clg', '80', '2012', 'univ', '2', '123', '2', 'o', 'o', 'o', '', 'o', '[', '[', '[', NULL),
(2, 'klj', 'lkj', 'a', 'lkj', 'lkj', 'lkj', 'India', 'Karnataka', '0000-00-00', 'lkj', 'Male', 'lkj', 'lkj', '2014', 'on', 'q', 'qq', '2014', 'on', 'on', 'w', '2014', 'on', 'ww', '5', 'w', 'on', 'w', '0', '2014', 'w', 'lkj', 'on', 'ww', 'w', '2014', 'w', 1, 1, '1234', '', '', '', '0', '', '', '', '', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'kavitha', 'lkj', 'b', 'lkj', 'bang', '98', 'India', 'Karnataka', '0000-00-00', 'lkj', '', 'lkj', 'lkj', '2014', 'Percentage', '50', 'college', '2014', 'Percentage', 'Percentage', 'puc', '2014', 'CGPA', 'ww', '4', 'vtu', '', '', '0', '2014', 'vtu', 'lkj', '', '1', '0', '2014', '', 1, 1, 'b', '', '', '', '0', '2014', '', '1', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studentresumekeywords`
--

CREATE TABLE IF NOT EXISTS `tbl_studentresumekeywords` (
  `idstudentresumekeywords` bigint(20) NOT NULL AUTO_INCREMENT,
  `idstudent` bigint(20) NOT NULL,
  `idresumetype` bigint(20) NOT NULL,
  `noofkeywords` varchar(10) NOT NULL,
  `keywords` text NOT NULL,
  PRIMARY KEY (`idstudentresumekeywords`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=142 ;

--
-- Dumping data for table `tbl_studentresumekeywords`
--

INSERT INTO `tbl_studentresumekeywords` (`idstudentresumekeywords`, `idstudent`, `idresumetype`, `noofkeywords`, `keywords`) VALUES
(133, 1, 1, '2', ' , php , css'),
(134, 1, 2, '1', ' , html'),
(135, 1, 3, '1', ' , nnnn'),
(136, 2, 1, '1', ' , php'),
(137, 2, 2, '1', ' , html'),
(138, 2, 3, '1', ' , nnnn'),
(139, 3, 1, '1', ' , php'),
(140, 3, 2, '1', ' , html'),
(141, 3, 3, '1', ' , nnnn');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_traininginstitute`
--

CREATE TABLE IF NOT EXISTS `tbl_traininginstitute` (
  `idtraininginstitute` bigint(20) NOT NULL AUTO_INCREMENT,
  `traininginstitute` varchar(255) NOT NULL,
  PRIMARY KEY (`idtraininginstitute`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_traininginstitute`
--

INSERT INTO `tbl_traininginstitute` (`idtraininginstitute`, `traininginstitute`) VALUES
(1, 'RV-VLSI Design Center'),
(2, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_year`
--

CREATE TABLE IF NOT EXISTS `tbl_year` (
  `idyear` bigint(20) NOT NULL AUTO_INCREMENT,
  `years` varchar(4) NOT NULL,
  PRIMARY KEY (`idyear`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_year`
--

INSERT INTO `tbl_year` (`idyear`, `years`) VALUES
(1, '2014'),
(2, '2013'),
(3, '2012'),
(4, '2011');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
