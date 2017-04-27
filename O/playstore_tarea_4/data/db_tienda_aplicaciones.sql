-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2016 at 06:24 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tienda_aplicaciones`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aplicaciones`
--

DROP TABLE IF EXISTS `tbl_aplicaciones`;
CREATE TABLE IF NOT EXISTS `tbl_aplicaciones` (
  `codigo_aplicacion` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_desarrollador` int(11) NOT NULL,
  `nombre_aplicacion` varchar(100) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `fecha_actualizacion` date NOT NULL,
  `version` varchar(45) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `url_icono` varchar(45) NOT NULL,
  `calificacion` decimal(10,0) NOT NULL,
  PRIMARY KEY (`codigo_aplicacion`),
  KEY `fk_tbl_aplicaciones_tbl_usuarios1_idx` (`codigo_desarrollador`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_aplicaciones`
--

INSERT INTO `tbl_aplicaciones` (`codigo_aplicacion`, `codigo_desarrollador`, `nombre_aplicacion`, `descripcion`, `fecha_publicacion`, `fecha_actualizacion`, `version`, `url`, `url_icono`, `calificacion`) VALUES
(1, 2, 'Facebook', 'App para conocer personas de todo el mundo y perder el tiempo :v.', '2010-10-23', '2016-10-11', '8.9', 'apks/aplicacion1.apk', 'img/icono1.png', '5'),
(2, 1, 'YouTube', 'encuentra videos de forma facil y rapida gracias a esta app', '2016-10-10', '2016-10-26', '4.2', 'apks/aplicacion2.apk', 'img/icono2.png', '2'),
(3, 1, 'Clash of clans', 'un juego que hizo ganar mucho dinero a su desarrolador ', '2016-10-11', '2016-10-08', '2.0', 'apks/aplicacion3.apk', 'img/icono3.png', '4'),
(4, 2, 'Candy crush', 'juego pluzzle aburrido para alguno, entretenido para otros.', '2016-10-02', '2016-10-15', '1.5', 'apks/aplicacion4.apk', 'img/icono4.png', '2'),
(5, 1, 'WhatsApp', 'chatea sin limites... mientras tengas internet claro.', '2016-10-05', '2016-10-20', '3.6', 'apks/aplicacion5.apk', 'img/icono5.png', '5'),
(6, 2, 'facebook2', 'lo mismo pero mas barato :v', '2012-12-12', '2012-12-12', '0.9', 'apks/aplicacion1.apk', 'img/icono1.png', '2'),
(7, 2, 'Youtube2', 'prueba de el plugin calendario :v', '2016-11-22', '2016-11-30', '0.9', 'apks/aplicacion2.apk', 'img/icono2.png', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categorias`
--

DROP TABLE IF EXISTS `tbl_categorias`;
CREATE TABLE IF NOT EXISTS `tbl_categorias` (
  `codigo_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_categorias`
--

INSERT INTO `tbl_categorias` (`codigo_categoria`, `nombre_categoria`) VALUES
(1, 'Juegos'),
(2, 'Social'),
(3, 'Accion'),
(4, 'RPG'),
(5, 'Fotografia');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categorias_x_aplicacion`
--

DROP TABLE IF EXISTS `tbl_categorias_x_aplicacion`;
CREATE TABLE IF NOT EXISTS `tbl_categorias_x_aplicacion` (
  `codigo_categoria` int(11) NOT NULL,
  `codigo_aplicacion` int(11) NOT NULL,
  PRIMARY KEY (`codigo_categoria`,`codigo_aplicacion`),
  KEY `fk_tbl_categorias_has_tbl_aplicaciones_tbl_aplicaciones1_idx` (`codigo_aplicacion`),
  KEY `fk_tbl_categorias_has_tbl_aplicaciones_tbl_categorias1_idx` (`codigo_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_categorias_x_aplicacion`
--

INSERT INTO `tbl_categorias_x_aplicacion` (`codigo_categoria`, `codigo_aplicacion`) VALUES
(2, 1),
(2, 2),
(1, 3),
(2, 3),
(1, 4),
(2, 4),
(2, 5),
(5, 5),
(3, 6),
(2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comentarios`
--

DROP TABLE IF EXISTS `tbl_comentarios`;
CREATE TABLE IF NOT EXISTS `tbl_comentarios` (
  `codigo_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(2000) NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `calificacion` decimal(10,0) DEFAULT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `codigo_aplicacion` int(11) NOT NULL,
  PRIMARY KEY (`codigo_comentario`),
  KEY `fk_tbl_comentarios_tbl_usuarios1_idx` (`codigo_usuario`),
  KEY `fk_tbl_comentarios_tbl_aplicaciones1_idx` (`codigo_aplicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_comentarios`
--

INSERT INTO `tbl_comentarios` (`codigo_comentario`, `comentario`, `fecha_publicacion`, `calificacion`, `codigo_usuario`, `codigo_aplicacion`) VALUES
(1, 'que buena app plox :v', '2016-11-05', NULL, 1, 2),
(2, '', '2016-11-05', NULL, 1, 2),
(3, 'nuevo comentario alv', '2016-11-05', NULL, 1, 2),
(4, 'otro comentario', '2016-11-05', NULL, 3, 2),
(5, 'comentario para facebook', '2016-11-05', NULL, 3, 1),
(6, 'al fin termine jajajajaja :v', '2016-11-05', NULL, 1, 1),
(7, 'que mal app la dvd', '2016-11-05', NULL, 1, 1),
(8, 'no le hagan caso al de arriba la app no esta mal xD', '2016-11-05', NULL, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_imagenes`
--

DROP TABLE IF EXISTS `tbl_imagenes`;
CREATE TABLE IF NOT EXISTS `tbl_imagenes` (
  `codigo_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_aplicacion` int(11) NOT NULL,
  `url_imagen` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo_imagen`),
  KEY `fk_tbl_imagenes_tbl_aplicaciones1_idx` (`codigo_aplicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_imagenes`
--

INSERT INTO `tbl_imagenes` (`codigo_imagen`, `codigo_aplicacion`, `url_imagen`) VALUES
(1, 1, 'img/facebook_img1.jpg'),
(2, 1, 'img/facebook_img2.jpg'),
(3, 1, 'img/facebook_img3.jpg'),
(4, 2, 'img/youtube_img1.jpg'),
(5, 2, 'img/youtube_img2.jpg'),
(6, 2, 'img/youtube_img3.jpg'),
(7, 3, 'img/Clash_img1.jpg'),
(8, 3, 'img/Clash_img2.jpg'),
(9, 3, 'img/Clash_img3.jpg'),
(10, 4, 'img/Candy_img1.jpg'),
(11, 4, 'img/Candy_img2.jpg'),
(12, 4, 'img/Candy_img3.jpg'),
(13, 5, 'img/Whatsapp_img1.jpg'),
(14, 5, 'img/Whatsapp_img2.jpg'),
(15, 5, 'img/Whatsapp_img3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tipos_usuarios`
--

DROP TABLE IF EXISTS `tbl_tipos_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_tipos_usuarios` (
  `codigo_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_tipos_usuarios`
--

INSERT INTO `tbl_tipos_usuarios` (`codigo_tipo_usuario`, `nombre_tipo_usuario`) VALUES
(1, 'Usuario Normal'),
(2, 'Desarrollador');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `codigo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_tipo_usuario` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `correo_electronico` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fotografia` blob,
  PRIMARY KEY (`codigo_usuario`),
  KEY `fk_tbl_usuarios_tbl_tipos_usuarios_idx` (`codigo_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`codigo_usuario`, `codigo_tipo_usuario`, `usuario`, `correo_electronico`, `nombre`, `apellido`, `genero`, `fecha_nacimiento`, `fotografia`) VALUES
(1, 1, 'Mxria1', 'mxria@gmail.com', 'Maria', 'Zapata', 'F', '2000-01-14', NULL),
(2, 2, 'theDesarrollador', 'desarrollador@gmail.com', 'Manuel', 'Perez', 'M', '1995-10-09', NULL),
(3, 1, 'pato29', 'cuak@hotmail.com', 'Martin', 'Martinez', 'M', '2016-11-29', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_aplicaciones`
--
ALTER TABLE `tbl_aplicaciones`
  ADD CONSTRAINT `fk_tbl_aplicaciones_tbl_usuarios1` FOREIGN KEY (`codigo_desarrollador`) REFERENCES `tbl_usuarios` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_categorias_x_aplicacion`
--
ALTER TABLE `tbl_categorias_x_aplicacion`
  ADD CONSTRAINT `fk_tbl_categorias_has_tbl_aplicaciones_tbl_aplicaciones1` FOREIGN KEY (`codigo_aplicacion`) REFERENCES `tbl_aplicaciones` (`codigo_aplicacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_categorias_has_tbl_aplicaciones_tbl_categorias1` FOREIGN KEY (`codigo_categoria`) REFERENCES `tbl_categorias` (`codigo_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_comentarios`
--
ALTER TABLE `tbl_comentarios`
  ADD CONSTRAINT `fk_tbl_comentarios_tbl_aplicaciones1` FOREIGN KEY (`codigo_aplicacion`) REFERENCES `tbl_aplicaciones` (`codigo_aplicacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_comentarios_tbl_usuarios1` FOREIGN KEY (`codigo_usuario`) REFERENCES `tbl_usuarios` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_imagenes`
--
ALTER TABLE `tbl_imagenes`
  ADD CONSTRAINT `fk_tbl_imagenes_tbl_aplicaciones1` FOREIGN KEY (`codigo_aplicacion`) REFERENCES `tbl_aplicaciones` (`codigo_aplicacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `fk_tbl_usuarios_tbl_tipos_usuarios` FOREIGN KEY (`codigo_tipo_usuario`) REFERENCES `tbl_tipos_usuarios` (`codigo_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
