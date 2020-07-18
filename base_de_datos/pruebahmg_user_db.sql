-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 18-07-2020 a las 07:08:38
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebahmg_user_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20200716151901', '2020-07-16 15:19:09', 61),
('DoctrineMigrations\\Version20200716152512', '2020-07-16 15:25:19', 51);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `coment`, `name`) VALUES
(8, 'sergio@gmail.com', '[]', '$2y$13$6PNb0dD3FhYBoSVvdHW04OPOInZUpAHRrzcP4TsPqTuq9yewutMxi', 'Soy un usuario nuevo', 'Sergio'),
(9, 'admin@gmail.com', '[]', '$2y$13$bzLmMrVhnDig1zK5XCgK2espyUv4UvJPzHnRts4sfy55Nl5RfMa86', 'Soy el usuario para probar', 'Admin'),
(10, 'paula_98@gmail.com', '[]', '$2y$13$Uow/UBt3RDhRUHpJOhfMBO.JHgb7KPZzeTS5VTAXEvgAoc/HSh0ya', 'Como molo, soy nueva', 'Paula'),
(11, 'jose_alco@gmail.com', '[]', '$2y$13$qsASd03.o45ofZkw726UVuq9ExX3kg6PUNpsFf5QCEo0ypL0plx96', 'Soy José, ¿lo sabes?', 'José'),
(12, 'marina_martinez@gmail.com', '[]', '$2y$13$E4T29IjlNkEUsxfkAIIfKemf5ypu6L6oVHTACP/baIiiNGeeD0Tgq', 'Marina Martinez, he sido editada', 'Marina Editada');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
