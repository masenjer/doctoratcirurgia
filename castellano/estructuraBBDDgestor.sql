-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: agullat.uab.es:3306
-- Tiempo de generación: 23-11-2012 a las 13:48:20
-- Versión del servidor: 5.0.32
-- Versión de PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `c2063231_gestor`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `CapMenu`
-- 

DROP TABLE IF EXISTS `CapMenu`;
CREATE TABLE IF NOT EXISTS `CapMenu` (
  `IdCapMenu` int(5) NOT NULL auto_increment,
  `Titol` char(255) default NULL,
  `Orden` int(2) NOT NULL,
  KEY `IdCapMenu` (`IdCapMenu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `Contacte`
-- 

DROP TABLE IF EXISTS `Contacte`;
CREATE TABLE IF NOT EXISTS `Contacte` (
  `IdContacte` int(11) NOT NULL auto_increment,
  `Titol` char(255) default NULL,
  `Contingut` longtext,
  `URL` char(255) default NULL,
  PRIMARY KEY  (`IdContacte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `Destacat`
-- 

DROP TABLE IF EXISTS `Destacat`;
CREATE TABLE IF NOT EXISTS `Destacat` (
  `IdDestacat` int(11) NOT NULL auto_increment,
  `FormatBoto` int(1) default NULL,
  `Imatge` char(255) default NULL,
  `TipusEnllac` int(1) default NULL,
  `URL` char(255) default NULL,
  `Orden` int(2) default '0',
  PRIMARY KEY  (`IdDestacat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `EnDirHome`
-- 

DROP TABLE IF EXISTS `EnDirHome`;
CREATE TABLE IF NOT EXISTS `EnDirHome` (
  `IdEnDirHome` int(11) NOT NULL auto_increment,
  `Titol` char(255) default NULL,
  `TipusEnllac` int(1) default NULL,
  `URL` char(255) default NULL,
  `Orden` int(2) default NULL,
  PRIMARY KEY  (`IdEnDirHome`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `IMGHome`
-- 

DROP TABLE IF EXISTS `IMGHome`;
CREATE TABLE IF NOT EXISTS `IMGHome` (
  `IdIMGHome` int(3) NOT NULL auto_increment,
  `Ruta` varchar(255) NOT NULL,
  `Orden` int(1) NOT NULL,
  PRIMARY KEY  (`IdIMGHome`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `LinMD`
-- 

DROP TABLE IF EXISTS `LinMD`;
CREATE TABLE IF NOT EXISTS `LinMD` (
  `IdLinMD` int(11) NOT NULL auto_increment,
  `Titol` char(255) default NULL,
  `Contingut` longtext,
  `IdCapMenu` int(5) NOT NULL,
  `Descripcio` char(255) NOT NULL,
  `Orden` int(2) NOT NULL,
  PRIMARY KEY  (`IdLinMD`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `LinMenu`
-- 

DROP TABLE IF EXISTS `LinMenu`;
CREATE TABLE IF NOT EXISTS `LinMenu` (
  `IdLinMenu` int(5) NOT NULL auto_increment,
  `IdCapMenu` int(5) default NULL,
  `IdLinMenuRel` int(5) default NULL,
  `Titol` char(255) default NULL,
  `Contingut` longtext,
  `Orden` int(2) NOT NULL,
  `Tipus` int(11) NOT NULL,
  PRIMARY KEY  (`IdLinMenu`),
  KEY `IdLinMenu` (`IdLinMenu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=219 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `Noticias`
-- 

DROP TABLE IF EXISTS `Noticias`;
CREATE TABLE IF NOT EXISTS `Noticias` (
  `IdNoticia` int(9) NOT NULL auto_increment,
  `Entradeta` longtext,
  `Cos` longtext,
  `Titol` longtext NOT NULL,
  `FechaDesPub` date NOT NULL,
  `FechaPub` date NOT NULL,
  `FechaNot` date NOT NULL,
  `Image` char(255) default NULL,
  KEY `IdNoticia` (`IdNoticia`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `Rols`
-- 

DROP TABLE IF EXISTS `Rols`;
CREATE TABLE IF NOT EXISTS `Rols` (
  `IdRol` int(5) NOT NULL auto_increment,
  `NomRol` char(100) default NULL,
  PRIMARY KEY  (`IdRol`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `Users`
-- 

DROP TABLE IF EXISTS `Users`;
CREATE TABLE IF NOT EXISTS `Users` (
  `IdUser` int(5) NOT NULL auto_increment,
  `User` char(100) default NULL,
  `Password` char(100) default NULL,
  `Email` char(255) default NULL,
  `Nom` char(255) default NULL,
  `Cognoms` char(255) default NULL,
  `Creacio` int(1) default NULL,
  `Edicio` int(1) default NULL,
  `Noticias` int(1) default NULL,
  `Usuarios` int(1) default NULL,
  KEY `IdUser` (`IdUser`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `UsersPublic`
-- 

DROP TABLE IF EXISTS `UsersPublic`;
CREATE TABLE IF NOT EXISTS `UsersPublic` (
  `IdUserPublic` int(11) NOT NULL auto_increment,
  `User` char(255) default NULL,
  `Password` char(255) default NULL,
  `Niu` int(7) default NULL,
  `Nom` char(255) default NULL,
  `Cognoms` char(255) default NULL,
  `Email` char(255) default NULL,
  `Investigador` char(255) default NULL,
  PRIMARY KEY  (`IdUserPublic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `Web`
-- 

DROP TABLE IF EXISTS `Web`;
CREATE TABLE IF NOT EXISTS `Web` (
  `IdWeb` int(5) NOT NULL auto_increment,
  `WebColor` char(6) NOT NULL,
  `ButtonsColor` char(6) NOT NULL,
  KEY `IdWeb` (`IdWeb`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;



-- 
-- Volcar la base de datos para la tabla `Users`
-- 

INSERT INTO `Users` (`IdUser`, `User`, `Password`, `Email`, `Nom`, `Cognoms`, `Creacio`, `Edicio`, `Noticias`, `Usuarios`) VALUES 
(1, 'admin', '123', '', 'Administrador', '', 1, 1, 1, 1);

-- 
-- Volcar la base de datos para la tabla `Web`
-- 

INSERT INTO `Web` (`IdWeb`, `WebColor`, `ButtonsColor`) VALUES 
(7, 'ff9900', 'ff9900');
