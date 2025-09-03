-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-08-2025 a las 01:53:33
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `piconerialandingpagedb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `slug`) VALUES
(1, 'TODO', 'home'),
(2, 'PICON', 'EL MEJOR'),
(3, 'GALLETAS', 'DELICIOSAS'),
(4, 'OTROS PRODUCTOS', 'PARA ACOMPAÑAR'),
(5, 'DE TEMPORADA', 'FESTEJAMOS CONTIGO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `google_reviews`
--

CREATE TABLE `google_reviews` (
  `id` int(11) NOT NULL,
  `place_id` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `place_name` varchar(255) DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `fetched_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `google_reviews`
--

INSERT INTO `google_reviews` (`id`, `place_id`, `author`, `rating`, `text`, `place_name`, `photo`, `fetched_at`) VALUES
(1, 'ChIJc3QwbQCvKIQRU482xYocid8', 'Rachel x', 5, '', 'La Piconeria de Ameca', 'https://lh3.googleusercontent.com/a-/ALV-UjX15z-aOrooa1QOUEs6ReUn3Grj39nRxWvJEc43z07wLKLU0nSTdA=s128-c0x00000000-cc-rp-mo-ba2', '2025-08-28 02:09:28'),
(2, 'ChIJc3QwbQCvKIQRU482xYocid8', 'Raul Camarena', 4, '', 'La Piconeria de Ameca', 'https://lh3.googleusercontent.com/a-/ALV-UjWm0rTq2AOQiLJVP4NYUsyXkzsqAi2Jbp0IUGJpohGWH0u7ELk=s128-c0x00000000-cc-rp-mo-ba4', '2025-08-28 02:09:28'),
(3, 'ChIJzwUqFqt3JoQRTz_JAMk4pNw', 'SANDRA MENDEZ', 5, 'The place is very welcoming and clean.  My favorite was the cookies de mebrillo  the white cookies  and the picones. Next time that you go to Ameca you need to go and tried them.', 'La Piconería Ameca', 'https://lh3.googleusercontent.com/a/ACg8ocI-MDxP3XNSjy0qhCJEUhn8U-56ImoKPi92uf0aUxSWLweJyg=s128-c0x00000000-cc-rp-mo', '2025-08-28 02:09:29'),
(4, 'ChIJzwUqFqt3JoQRTz_JAMk4pNw', 'La chica Del cabello rizado', 5, 'The place is very nice, clean and smells super appetizing, the person who served was very friendly, the snacks were super good, there are a variety of sizes from 47 to 13 for the individual, very good experience, I bought a package of cookies 🍪 of grains, and a individual picón, haha ​​I really wanted to save half for the next day, but I ended up eating the whole thing, super tasty, I highly recommend it', 'La Piconería Ameca', 'https://lh3.googleusercontent.com/a/ACg8ocJbxQZMH-uK8N-y72CjS2pb2jTLSza8xvz3oJ0z35G9aTp1Ysfz=s128-c0x00000000-cc-rp-mo-ba5', '2025-08-28 02:09:29'),
(5, 'ChIJzwUqFqt3JoQRTz_JAMk4pNw', 'Gabriela C.C.', 1, 'We stopped by the store and were drawn to the taste of the picones. They have quite a variety of flavors, such as cranberry, walnut and raisin, quince, guava, and I don\'t remember what else. They also have a variety of cookies, and they sell little boxes with colorful shells. We decided on a large one filled with quince and a small one with walnuts and raisins.\nThe breads are quite heavy because of the filling, but when you cut the walnut and raisin bread, you can tell it\'s too dry 😔 It fell apart when you cut it. I don\'t know if it was a few days old, but its flavor wasn\'t exactly good. The quince was a little moister, but it still didn\'t taste good either. I\'d say they\'re passable for a moment of hunger, but not enough to make me crave them again. Maybe I\'d try a freshly baked one, but I didn\'t get the chance to try them. I don\'t think I\'d buy them again even if I pass by there again. I think the ones from Cajititlán have a better flavor, texture, and presentation.\nThe girl who served us was very friendly.', 'La Piconería Ameca', 'https://lh3.googleusercontent.com/a/ACg8ocIUHoEV-jV-Cysywpt7HUdlEZLSXmlfVBO1HZMYGf3haAOIGA=s128-c0x00000000-cc-rp-mo-ba2', '2025-08-28 02:09:29'),
(6, 'ChIJzwUqFqt3JoQRTz_JAMk4pNw', 'Trigiovision Ameca', 5, 'If you want to taste the original and delicious flavor of His Majesty \"El Picón\", just go to Independencia 49b and there you will find them warm, fresh from the oven, I, your friend Trigio, recommend them to you. Go for it, Bagres!', 'La Piconería Ameca', 'https://lh3.googleusercontent.com/a-/ALV-UjWvT_VVX_o9HuGHD9TR17DuAX_vSGpehLlH7ngJ7jA5eB_asyGP=s128-c0x00000000-cc-rp-mo-ba4', '2025-08-28 02:09:29'),
(7, 'ChIJzwUqFqt3JoQRTz_JAMk4pNw', 'Ana Karen Valdivia', 5, 'Without a doubt the best picones, delicious and excellent service ✨', 'La Piconería Ameca', 'https://lh3.googleusercontent.com/a/ACg8ocJQDzWxuqxmoUttyPXNHHa-BF8imuHWCLwF0M32cht5tuQGYg=s128-c0x00000000-cc-rp-mo', '2025-08-28 02:09:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `categoria_id`) VALUES
(1, 'PICON', 'PICON CHICO', 17.00, 'images/img-03.jpg', 1),
(2, 'PICON JUMBO', 'PARA DISFRUTAR EN FAMILIA', 75.00, 'uploads/1756436807_img-02.jpg', 2),
(3, 'PICON-GIFT', 'REGALANDO SABOR', 120.00, 'uploads/1756437151_img-01.jpg', 5),
(4, 'GALLETAS NAVIDEÑAS', 'FESTEJANDO CON AMOR', 50.00, 'uploads/1756438160_img-49.jpg', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indices de la tabla `google_reviews`
--
ALTER TABLE `google_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `google_reviews`
--
ALTER TABLE `google_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
