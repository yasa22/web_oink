-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2024 a las 19:13:02
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_oink`
--

--
-- Volcado de datos para la tabla `img_producto`
--

INSERT INTO `img_producto` (`ID`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`) VALUES
(1, 'BN solo.jpg', 'Endless delante.jpg', 'Rosa solo.jpg', 'Endless playa.JPG', 'Endless playa del.jpg', 'Endless playa2.jpg');

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID_Producto`, `Nombre`, `Descripcion`, `Precio`, `Imagen`) VALUES
(1, 'ENDLESS SUMMER', 'La más famosa de nuestras camisetas. En vez de un verano interminable, prueba a tener un verano Oink!</br></br>Camiseta disponible con el dibujo trasero en dos colores.', 20, 'endless-collage.png'),
(2, 'PORK WAX', 'Si no te quieres caer surfeando las mejores olas tienes que apostar por la mejor cera. Ningún animal fue herido para obtrener este producto.</br></br>Camiseta disponible con el dibujo trasero en dos colores.', 20, 'porkwax-collage.png'),
(3, 'CERDO SURFERO', '[PRÓXIMAMENTE] Las leyendas cuentan que este curioso animal aparece cada verano por las playas robando olas a los más desprevenidos.</br></br>Camiseta disponible en varios colores.', 20, 'endless-collage.png'),
(4, 'prueba4', 'prueba4', 4444.4, 'endless-collage.png');
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
