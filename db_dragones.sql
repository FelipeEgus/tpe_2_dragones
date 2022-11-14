-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2022 a las 21:43:30
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_dragones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dragones`
--

CREATE TABLE `dragones` (
  `id` int(11) NOT NULL,
  `nombre_raza` varchar(50) NOT NULL COMMENT 'tipo de dragon',
  `descrip` text NOT NULL COMMENT 'describir raza',
  `representaciones` text NOT NULL,
  `id_mitologia_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dragones`
--

INSERT INTO `dragones` (`id`, `nombre_raza`, `descrip`, `representaciones`, `id_mitologia_fk`) VALUES
(1, 'Dragón ', 'una de las razas más conocidas de dragón, posee dos pares de piernas y un par de alas,su tamaño suele variar puede ser de unos pocos centímetros hasta más de 300 metros. Normalmente se los representa con colores cálidos, rojizos en su mayoría, aunque sus colores pueden variar según su representación.', 'Smaug el señor de los anillos, chimuelo como entrenar a tu dragón', 1),
(2, 'Guiverno', 'otra raza muy conocida, son un tipo de dragón que carece de un par de piernas delanteras, algunas razas son bípedas, aunque otras caminan apoyándose sobre sus alas, poseen un aguijón al final de su cola y también pueden poseer una mordida venenosa en lugar de su clásico aliento.Sus colores pueden variar, pero suelen ser tonos grisáceos.', 'Bestias aladas el señor de los anillos, Colacuerno húngaro harry pottrer', 2),
(3, 'Amphithere/Anfitero', 'Dragones carentes de piernas, fueron utilizados como símbolos de los heraldos europeos, sus alas suelen ser emplumadas o de murciélago, y comúnmente son amarrillas con tonos verdosos, sus cuerpos son alargados como los de una serpiente, y no suelen tener un aliento ', 'Reptil alado como entrenar a tu dragón', 2),
(4, 'Pyrausta', 'Es la combinación de un dragón y un insecto, son de tamaño reducido, su forma puede variar según el insecto, como una abeja, sus alas son como de hada, mariposa o algún otro insecto.\r\ntambién existe las “Fae” que son un dragón combinado un hada y estas son coloridas.\r\n', 'son Nombradas en el Inventorum Naturum ', 3),
(5, 'Hydra', 'Un dragón clásico de la mitología griega, es un dragón carente de alas, de gran tamaño, aunque por fuera de su contra parte griega no necesariamente regenera sus cabezas.\r\nsuele ser venenoso y no tiene un aliento de dragón.\r\n', 'Hydra de lerna', 3),
(6, 'Serpiente marina', 'la primera raza existente, son dragones que carecen de alas y son normalmente representados como los antiguos monstruos marinos, sus colores son tonos azules y verdes. uno de sus mayores representantes puede ser el leviatán.', 'Leviatán biblia judía', 4),
(79, 'Orochi', 'Un dragón de cuerpo de serpiente que al igual que la hydra, orochi cuenta con múltiples cabezas contando este con 8, su apariencia es como el clásico dragón asiático de color blanco, ya que su origen es japonés.', 'Dios orochi', 6),
(80, 'Uroboros', 'Generalmente es representado con dragón que devora.                                             Representa la naturaleza cíclica de las cosas y el eterno retorno. Simboliza el tiempo y la continuidad de la vida. Se usa como representación del renacer de las cosas que nunca desaparecen, que solo cambian eternamente.', 'Uroboros, Jörmungandr,', 5),
(81, 'Drake', 'Su apariencia es la de un dragón clásico con la deferencia que carece de alas, es parecido a los lung (dragones asiáticos). Sus colores pueden variar de colores negros a colores rojizos, algunos cuentan con el clásico aliento de fuego su origen se remonta a la actualidad ya que no hay información en ninguna mitología.', 'Destroza cavernas como entrenar a tu dragón', 10),
(82, 'Zmey', 'Zmey Gorynych es un dragón occidental que, en particular, tiene hasta doce cabezas, cada una de las cuales puede tener cuernos gemelos y también estar coronada. El dragón también puede tener hasta siete colas y estar de pie sobre sus patas traseras. Zmey Gorynych puede oler a azufre, el olor del dragón es lo suficientemente fuerte como para alertar a otros de su presencia.', 'Bylina (una poesía heroica rusa), Alacambiante como entrenar a tu dragón', 11),
(83, 'Fae', 'Es la combinación de un dragón y un hada, son de tamaño variado, pero no suelen ser tan grandes como los dragones clásicos, sus alas son como de hada y estas son coloridas.\r\nsu aliento suele ser para desorientar o para curar.\r\n', 'Nombradas en el Inventorum Naturum ', 3),
(84, 'Wyrm', 'Los wyrms son dragones serpenteantes carentes de patas, suelen habitar en cuevas y son dragones terrestres, suelen tener una mordida venenosa y algunos alientos.', 'Jörmundgander', 9),
(85, 'Basilisco', 'Un dragón con muchas variantes que pueden ir de una serpiente alada o un reptil gigante de grandes garras, tiene veneno letal y puede matar con la mirada, y era considerado es el rey de las serpientes. ', 'Basilisco Harry potter', 3),
(86, 'Long / lung ', 'El clásico dragón asiático puede variar la cantidad de dedos entre 3 a 4, cuentan con un cuerpo muy alargado más que el de un drake, por fuera de carecer de alas tienen capacidad de volar sus colores pueden variar y cuentan con una gema en la frente.', 'Shen long dragón ball', 6),
(87, 'Quetzalcoatl', 'Un tipo de dragón que como los wyrm carece de alas y patas, pero cuenta con la capacidad de volar, su cola y cabeza cuentan con plumas, aunque puede llegar a tenerlas en todo su cuerpo, es de un gran tamaño, suele ser muy colorido, aunque principalmente es de tonos de verde', 'Dios Quetzalcóatl', 8),
(88, 'Salamander', 'Un dragón carente de alas de gran tamaño y que cuenta con una gran cantidad de patas, su cuerpo suele ser bastante alargado', 'desconocidas', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mitologias`
--

CREATE TABLE `mitologias` (
  `id` int(11) NOT NULL,
  `mitologia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mitologias`
--

INSERT INTO `mitologias` (`id`, `mitologia`) VALUES
(1, 'babilonico'),
(2, 'europeo'),
(3, 'grecoromano'),
(4, 'prehistorico'),
(5, 'egipcio'),
(6, 'asiatico'),
(7, 'hindú'),
(8, 'latino americano'),
(9, 'nordico'),
(10, 'tolkien'),
(11, 'ruso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `mail`, `password`) VALUES
(1, 'admin@gmail.com', '$2y$10$Kz4YYD9lv29JBL9pxI6Fj.p8W/07sMxn0x5ajAhWggOLPxWHX8WY6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dragones`
--
ALTER TABLE `dragones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mitologia_fk` (`id_mitologia_fk`);

--
-- Indices de la tabla `mitologias`
--
ALTER TABLE `mitologias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dragones`
--
ALTER TABLE `dragones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `mitologias`
--
ALTER TABLE `mitologias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dragones`
--
ALTER TABLE `dragones`
  ADD CONSTRAINT `fk_dragones_mitologia` FOREIGN KEY (`id_mitologia_fk`) REFERENCES `mitologias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
