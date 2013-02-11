-- phpMyAdmin SQL Dump
-- version 2.9.2-Debian-1.one.com1
-- http://www.phpmyadmin.net
-- 
-- Host: MySQL Server
-- Generation Time: Feb 23, 2011 at 08:45 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.0-8+etch16
-- 
-- Database: `muselunden_no`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `artikler`
-- 

CREATE TABLE `artikler` (
  `id` int(8) NOT NULL auto_increment,
  `kategori` smallint(3) NOT NULL,
  `tittel` varchar(150) NOT NULL,
  `forsidetekst` text NOT NULL,
  `tekst` text NOT NULL,
  `forfatter` varchar(100) NOT NULL,
  `dato` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

-- 
-- Dumping data for table `artikler`
-- 


-- 
-- Table structure for table `menyvalg`
-- 

CREATE TABLE `menyvalg` (
  `id` smallint(6) NOT NULL auto_increment,
  `navn` varchar(120) NOT NULL,
  `sortering` tinyint(4) NOT NULL,
  `skjult` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `menyvalg`
-- 


