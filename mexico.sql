-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2017 a las 00:34:18
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mexico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aguascalientes`
--

CREATE TABLE `aguascalientes` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aguascalientes`
--

INSERT INTO `aguascalientes` (`id`, `municipio`) VALUES
(1, 'Aguascalientes'),
(2, 'Asientos'),
(3, 'Calvillo'),
(4, 'Cosio'),
(5, 'Jesus Maria'),
(6, 'Pabellon de Arteaga'),
(7, 'Rincon de Romos'),
(8, 'San Jose de Gracia'),
(9, 'Tepezala'),
(10, 'El Llano'),
(11, 'San Francisco de los Romo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bajacalifornia`
--

CREATE TABLE `bajacalifornia` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bajacalifornia`
--

INSERT INTO `bajacalifornia` (`id`, `municipio`) VALUES
(1, 'Ensenada'),
(2, 'Mexicali'),
(3, 'Tecate'),
(4, 'Tijuana'),
(5, 'Playas de Rosarito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bajacaliforniasur`
--

CREATE TABLE `bajacaliforniasur` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bajacaliforniasur`
--

INSERT INTO `bajacaliforniasur` (`id`, `municipio`) VALUES
(1, 'Comondu'),
(2, 'Mulege'),
(3, 'La Paz'),
(4, 'Los Cabos'),
(5, 'Loreto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campeche`
--

CREATE TABLE `campeche` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `campeche`
--

INSERT INTO `campeche` (`id`, `municipio`) VALUES
(1, 'Calkini'),
(2, 'Campeche'),
(3, 'Carmen'),
(4, 'Champoton'),
(5, 'Hecelchakan'),
(6, 'Hopelchen'),
(7, 'Palizada'),
(8, 'Tenabo'),
(9, 'Escarcega'),
(10, 'Calakmul'),
(11, 'Candelaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cdmx`
--

CREATE TABLE `cdmx` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cdmx`
--

INSERT INTO `cdmx` (`id`, `municipio`) VALUES
(1, 'Azcapotzalco'),
(2, 'Coyoacan'),
(3, 'Cuajimalpa de Morelos'),
(4, 'Gustavo A. Madero'),
(5, 'Iztacalco'),
(6, 'Iztapalapa'),
(7, 'La Magdalena Contreras'),
(8, 'Milpa Alta'),
(9, 'Alvaro Obregon'),
(10, 'Tlalpan'),
(11, 'Xochimilco'),
(12, 'Benito Juarez'),
(13, 'Cuauhtemoc'),
(14, 'Miguel Hidalgo'),
(15, 'Venustiano Carranza'),
(16, 'Tlahuac');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chiapas`
--

CREATE TABLE `chiapas` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chiapas`
--

INSERT INTO `chiapas` (`id`, `municipio`) VALUES
(1, 'Acacoyagua'),
(2, 'Acala'),
(3, 'Acapetahua'),
(4, 'Amatan'),
(5, 'Amatenango de la Frontera'),
(6, 'Amatenango del Valle'),
(7, 'Angel Albino Corzo'),
(8, 'Arriaga'),
(9, 'Bejucal de Ocampo'),
(10, 'Bella Vista'),
(11, 'Berriozabal'),
(12, 'Bochil'),
(13, 'El Bosque'),
(14, 'Cacahoatan'),
(15, 'Catazaja'),
(16, 'Cintalapa'),
(17, 'Coapilla'),
(18, 'Comitan de Dominguez'),
(19, 'La Concordia'),
(20, 'Copainala'),
(21, 'Chalchihuitan'),
(22, 'Chamula'),
(23, 'Chanal'),
(24, 'Chapultenango'),
(25, 'Chenalho'),
(26, 'Chiapa de Corzo'),
(27, 'Chiapilla'),
(28, 'Chicomuselo'),
(29, 'Chilon'),
(30, 'Escuintla'),
(31, 'Francisco Leon'),
(32, 'Frontera Comalapa'),
(33, 'Frontera Hidalgo'),
(34, 'La Grandeza'),
(35, 'Huehuetan'),
(36, 'Huixtan'),
(37, 'La Independencia'),
(38, 'Ixhuatan'),
(39, 'Ixtapangajoya'),
(40, 'Jiquipilas'),
(41, 'Altamirano'),
(42, 'Huitiupan'),
(43, 'Ixtacomitan'),
(44, 'Huixtla'),
(45, 'Ixtapa'),
(46, 'Chicoasen'),
(47, 'Jitotol'),
(48, 'Juarez'),
(49, 'Larrainzar'),
(50, 'La Libertad'),
(51, 'Mapastepec'),
(52, 'Las Margaritas'),
(53, 'Mazapa de Madero'),
(54, 'Mazatan'),
(55, 'Metapa'),
(56, 'Mitontic'),
(57, 'Motozintla'),
(58, 'Nicolas Ruiz'),
(59, 'Ocosingo'),
(60, 'Ocotepec'),
(61, 'Ocozocoautla de Espinosa'),
(62, 'Ostuacan'),
(63, 'Osumacinta'),
(64, 'Oxchuc'),
(65, 'Palenque'),
(66, 'Pantelho'),
(67, 'Pantepec'),
(68, 'Pichucalco'),
(69, 'Pijijiapan'),
(70, 'El Porvenir'),
(71, 'Villa Comaltitlan'),
(72, 'Pueblo Nuevo Solistahuacan'),
(73, 'Rayon'),
(74, 'Reforma'),
(75, 'Las Rosas'),
(76, 'Sabanilla'),
(77, 'Salto de Agua'),
(78, 'San Cristobal de las Casas'),
(79, 'San Fernando'),
(80, 'Siltepec'),
(81, 'Simojovel'),
(82, 'Sitala'),
(83, 'Socoltenango'),
(84, 'Solosuchiapa'),
(85, 'Soyalo'),
(86, 'Suchiapa'),
(87, 'Suchiate'),
(88, 'Sunuapa'),
(89, 'Tapachula'),
(90, 'Tapalapa'),
(91, 'Tapilula'),
(92, 'Tecpatan'),
(93, 'Tenejapa'),
(94, 'Teopisca'),
(95, 'Tila'),
(96, 'Tonala'),
(97, 'Totolapa'),
(98, 'La Trinitaria'),
(99, 'Tumbala'),
(100, 'Tuxtla Gutierrez'),
(101, 'Tuxtla Chico'),
(102, 'Tuzantan'),
(103, 'Tzimol'),
(104, 'Union Juarez'),
(105, 'Venustiano Carranza'),
(106, 'Villa Corzo'),
(107, 'Villaflores'),
(108, 'Yajalon'),
(109, 'San Lucas'),
(110, 'Zinacantan'),
(111, 'San Juan Cancuc'),
(112, 'Aldama'),
(113, 'Benemerito de las Americas'),
(114, 'Maravilla Tenejapa'),
(115, 'Marques de Comillas'),
(116, 'Montecristo de Guerrero'),
(117, 'San Andres Duraznal'),
(118, 'Santiago el Pinar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chihuahua`
--

CREATE TABLE `chihuahua` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chihuahua`
--

INSERT INTO `chihuahua` (`id`, `municipio`) VALUES
(1, 'Ahumada'),
(2, 'Aldama'),
(3, 'Allende'),
(4, 'Aquiles Serdan'),
(5, 'Ascension'),
(6, 'Bachiniva'),
(7, 'Belleza'),
(8, 'Batopilas'),
(9, 'Bocoyna'),
(10, 'Buenaventura'),
(11, 'Camargo'),
(12, 'Carichi'),
(13, 'Casas Grandes'),
(14, 'Coronado'),
(15, 'Coyame del Sotol'),
(16, 'La Cruz'),
(17, 'Cuauhtemoc'),
(18, 'Cusihuiriachi'),
(19, 'Chihuahua'),
(20, 'Chinipas'),
(21, 'Delicias'),
(22, 'Dr. Belisario Dominguez'),
(23, 'Galeana'),
(24, 'Santa Isabel'),
(25, 'Gomez Farias'),
(26, 'Gran Morelos'),
(27, 'Guachochi'),
(28, 'Guadalupe'),
(29, 'Guadalupe y Calvo'),
(30, 'Guazapares'),
(31, 'Guerrero'),
(32, 'Hidalgo del Parral'),
(33, 'Huejotitan'),
(34, 'Ignacio Zaragoza'),
(35, 'Janos'),
(36, 'Jimenez'),
(37, 'Juarez'),
(38, 'Julimes'),
(39, 'Lopez'),
(40, 'Madera'),
(41, 'Maguarichi'),
(42, 'Manuel Benavides'),
(43, 'Matachi'),
(44, 'Matamoros'),
(45, 'Meoqui'),
(46, 'Morelos'),
(47, 'Moris'),
(48, 'Namiquipa'),
(49, 'Nonoava'),
(50, 'Nuevo Casas Grandes'),
(51, 'Ocampo'),
(52, 'Ojinaga'),
(53, 'Praxedis G. Guerrero'),
(54, 'Riva Palacio'),
(55, 'Rosales'),
(56, 'Rosario'),
(57, 'San Francisco de Borja'),
(58, 'San Francisco de Conchos'),
(59, 'San Francisco del Oro'),
(60, 'Santa Barbara'),
(61, 'Satevo'),
(62, 'Saucillo'),
(63, 'Temosachic'),
(64, 'El Tule'),
(65, 'Urique'),
(66, 'Uruachi'),
(67, 'Valle de Zaragoza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coahuila`
--

CREATE TABLE `coahuila` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `coahuila`
--

INSERT INTO `coahuila` (`id`, `municipio`) VALUES
(1, 'Abasolo'),
(2, 'Acu'),
(3, 'Allende'),
(4, 'Arteaga'),
(5, 'Candela'),
(6, 'Casta'),
(7, 'Cuatro Cienegas'),
(8, 'Escobedo'),
(9, 'Francisco I. Madero'),
(10, 'Frontera'),
(11, 'General Cepeda'),
(12, 'Guerrero'),
(13, 'Hidalgo'),
(14, 'Jimenez'),
(15, 'Juarez'),
(16, 'Lamadrid'),
(17, 'Matamoros'),
(18, 'Monclova'),
(19, 'Morelos'),
(20, 'Muzquiz'),
(21, 'Nadadores'),
(22, 'Nava'),
(23, 'Ocampo'),
(24, 'Parras'),
(25, 'Piedras Negras'),
(26, 'Progreso'),
(27, 'Ramos Arizpe'),
(28, 'Sabinas'),
(29, 'Sacramento'),
(30, 'Saltillo'),
(31, 'San Buenaventura'),
(32, 'San Juan de Sabinas'),
(33, 'San Pedro'),
(34, 'Sierra Mojada'),
(35, 'Torreon'),
(36, 'Viesca'),
(37, 'Villa Union'),
(38, 'Zaragoza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colima`
--

CREATE TABLE `colima` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colima`
--

INSERT INTO `colima` (`id`, `municipio`) VALUES
(1, 'Armeria'),
(2, 'Colima'),
(3, 'Comala'),
(4, 'Coquimatlan'),
(5, 'Cuahtemoc'),
(6, 'Ixtlahuacan'),
(7, 'Manzanillo'),
(8, 'Minatitlan'),
(9, 'Tecoman'),
(10, 'Villa de Alvarez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `durango`
--

CREATE TABLE `durango` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `durango`
--

INSERT INTO `durango` (`id`, `municipio`) VALUES
(1, 'Canatlan'),
(2, 'Canelas'),
(3, 'Coneto de Comonfort'),
(4, 'Cuencame'),
(5, 'Durango'),
(6, 'General Simon Bolivar'),
(7, 'Gomez Palacio'),
(8, 'Guadalupe Victoria'),
(9, 'Guanacevi'),
(10, 'Hidalgo'),
(11, 'Inde'),
(12, 'Lerdo'),
(13, 'Mapimi'),
(14, 'Mezquital'),
(15, 'Nazas'),
(16, 'Nombre de Dios'),
(17, 'Ocampo'),
(18, 'El Oro'),
(19, 'Otaez'),
(20, 'Panuco de Coronado'),
(21, 'Pe'),
(22, 'Poanas'),
(23, 'Pueblo Nuevo'),
(24, 'Rodeo'),
(25, 'San Bernardo'),
(26, 'San Dimas'),
(27, 'San Juan de Guadalupes'),
(28, 'San Juan del Rio'),
(29, 'San Luis del Cordero'),
(30, 'San Pedro del Gallo'),
(31, 'Santa Clara'),
(32, 'Santiago Papasquiaro'),
(33, 'Suchil'),
(34, 'Tamazula'),
(35, 'Tepehuanes'),
(36, 'Tlahualilo'),
(37, 'Topia'),
(38, 'Vicente Guerrero'),
(39, 'Nuevo Ideal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guanajuato`
--

CREATE TABLE `guanajuato` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `guanajuato`
--

INSERT INTO `guanajuato` (`id`, `municipio`) VALUES
(1, 'Abasolo'),
(2, 'Acambaro'),
(3, 'San Miguel de Allende'),
(4, 'Apaseo el Alto'),
(5, 'Apaseo el Grande'),
(6, 'Atarjea'),
(7, 'Celaya'),
(8, 'Manuel Doblado'),
(9, 'Comonfort'),
(10, 'Coroneo'),
(11, 'Cortazar'),
(12, 'Cueramaro'),
(13, 'Doctor Mora'),
(14, 'Dolos hidalgo Cuna de la Inpendencia Nacional'),
(15, 'Guanajuato'),
(16, 'Huanimaro'),
(17, 'Irapuato'),
(18, 'Jaral del Progreso'),
(19, 'Jerecuaro'),
(20, 'Leon'),
(21, 'Moroleon'),
(22, 'Ocampo'),
(23, 'Penjamo'),
(24, 'Pueblo Nuevo'),
(25, 'Purisima del Rincon'),
(26, 'Romita'),
(27, 'Salamanca'),
(28, 'Salatierra'),
(29, 'San Diego de la Union'),
(30, 'San Felipe'),
(31, 'San Francisco del Rincon'),
(32, 'San Jose Iturbide'),
(33, 'San Luis de la Paz'),
(34, 'Santa Catarina'),
(35, 'Santa Cruz de Juventino Rosas'),
(36, 'Santiago Maravatio'),
(37, 'Silao'),
(38, 'Tarandacuao'),
(39, 'Tarimoro'),
(40, 'Tierra Blanca'),
(41, 'Uriangato'),
(42, 'Valle de Santiago'),
(43, 'Vistoria'),
(44, 'Villagran'),
(45, 'Xichu'),
(46, 'Yuriria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guerrero`
--

CREATE TABLE `guerrero` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `guerrero`
--

INSERT INTO `guerrero` (`id`, `municipio`) VALUES
(1, 'Acapulco de Juarez'),
(2, 'Ahuacuotingo'),
(3, 'Ajuchitlan del Progreso'),
(4, 'Alcozauca de Guerrero'),
(5, 'Alpoyeca'),
(6, 'Apaxtla'),
(7, 'Arcelia'),
(8, 'Atenango del Rio'),
(9, 'Atlixtac'),
(10, 'Atoyac de Alvarez'),
(11, 'Ayutla de los Libres'),
(12, 'Azoyu'),
(13, 'Benito Juarez'),
(14, 'Buenavista de Cuellar'),
(15, 'Cohuayutla de Jose Maria Izazaga'),
(16, 'Cocula'),
(17, 'Copala'),
(18, 'Copalillo'),
(19, 'Copanatoyac'),
(20, 'Coyuca de Benitez'),
(21, 'Coyuca de Catalan'),
(22, 'Cuajinicuilapa'),
(23, 'Cualac'),
(24, 'Cuatepec'),
(25, 'Cuetzala del Progreso'),
(26, 'Cutzamala de Pinzon'),
(27, 'Chilapa de Alvarez'),
(28, 'Chipalcingo de los Bravo'),
(29, 'Florencio Villarreal'),
(30, 'General Heliodoro Castillo'),
(31, 'Huamuxtitlan'),
(32, 'Huitzuco de los Figueroa'),
(33, 'Iguala de la Independencia'),
(34, 'Igualapa'),
(35, 'Ixcateopan de Cuauhtemoc'),
(36, 'Zihuatanejo de Azueta'),
(37, 'Juan R. Escudero'),
(38, 'Leonardo Bravo'),
(39, 'Malinaltepec'),
(40, 'Martir de Cuilapan'),
(41, 'Atlamajalcingo del Monte'),
(42, 'General Canuto A. Neri'),
(43, 'Metlatonoc'),
(44, 'Mochitlan'),
(45, 'Olinala'),
(46, 'Ometepec'),
(47, 'Pedro Ascencion Alquisiras'),
(48, 'Petatlan'),
(49, 'Pilcaya'),
(50, 'Pungarabato'),
(51, 'Quechultenango'),
(52, 'San Luis Acatlan'),
(53, 'San Marcos'),
(54, 'San Miguel Totolapan'),
(55, 'Taxco de Alarcon'),
(56, 'Tecoanapa'),
(57, 'Tecpan de Galeana'),
(58, 'Teloloapan'),
(59, 'Tepecoacuilco de Trujano'),
(60, 'Tetipac'),
(61, 'Tixtla de Guerrero'),
(62, 'Tlacoachistlahuaca'),
(63, 'Tlacoapa'),
(64, 'Tlalchapa'),
(65, 'Tlalixtaquila de Maldonado'),
(66, 'Tlapa de Comonfort'),
(67, 'Tlapehuala'),
(68, 'La Union de Isidoro Montes de Oca'),
(69, 'Xalpatlahuac'),
(70, 'Xochihuehuetlan'),
(71, 'Xochistlahuaca'),
(72, 'Zapotitlan Tablas'),
(73, 'Zirandaro'),
(74, 'Zitlala'),
(75, 'Eduardo Neri'),
(76, 'Acatepec'),
(77, 'Marquelia'),
(78, 'Chochoapa el Grande'),
(79, 'Jose Joaquin de Herrera'),
(80, 'Juchitan'),
(81, 'Iliatenco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hidalgo`
--

CREATE TABLE `hidalgo` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hidalgo`
--

INSERT INTO `hidalgo` (`id`, `municipio`) VALUES
(1, 'Acatlan'),
(2, 'Acaxochitlan'),
(3, 'Actopan'),
(4, 'Agua Blanca de Iturbide'),
(5, 'Ajacuba'),
(6, 'Alfajayucan'),
(7, 'Almoloya'),
(8, 'Apan'),
(9, 'El Arenal'),
(10, 'Atitalaquia'),
(11, 'Atlapexco'),
(12, 'Atotonilco el Grande'),
(13, 'Calnali'),
(14, 'Atotonilco de Tula'),
(15, 'Cardonal'),
(16, 'Cuautepec de Hinojosa'),
(17, 'Chapantongo'),
(18, 'Chapulhuacan'),
(19, 'Chilcuautla'),
(20, 'Eloxochitlan'),
(21, 'Emiliano Zapata'),
(22, 'Epazoyucan'),
(23, 'Francisco I. Madero'),
(24, 'Huasca de Ocampo'),
(25, 'Huautla'),
(26, 'Huazalingo'),
(27, 'Huehuetla'),
(28, 'Huejutla de Reyes'),
(29, 'Huichapan'),
(30, 'Ixmiquilpan'),
(31, 'Jacala de Ledezma'),
(32, 'Jaltocan'),
(33, 'Juarez Hidalgo'),
(34, 'Lolotla'),
(35, 'Metepec'),
(36, 'San Agustin Metzquititlan'),
(37, 'Metztitlan'),
(38, 'Mineral del Chico'),
(39, 'Mineral del Monte'),
(40, 'La Mision'),
(41, 'Mixquiahuala de Juarez'),
(42, 'Molango de Escamilla'),
(43, 'Nicolas Flores'),
(44, 'Nopala de Villagran'),
(45, 'Omitlan de Juarez'),
(46, 'San Felipe Orizatlan'),
(47, 'Pacula'),
(48, 'Pachuca de Soto'),
(49, 'Pisaflores'),
(50, 'Progreso de Obregon'),
(51, 'Mineral de la Reforma'),
(52, 'San Agustin Tlaxiaca'),
(53, 'San Bartolo Tutotepec'),
(54, 'San Salvador'),
(55, 'Santiago de Anaya'),
(56, 'Santiago Tulantepec de Lugo Guerrero'),
(57, 'Singuilucan'),
(58, 'Tasquillo'),
(59, 'Tecozautla'),
(60, 'Tenango de Doria'),
(61, 'Tepeapulco'),
(62, 'Tepehuacan de Guerrero'),
(63, 'Tepeji del Rio de Ocampo'),
(64, 'Tepetitlan'),
(65, 'Tetepango'),
(66, 'Villa de Tezontepec'),
(67, 'Tezontepec de Aldama'),
(68, 'Tianguistengo'),
(69, 'Tizayuca'),
(70, 'Tlahuelilpan'),
(71, 'Tlahuiltepa'),
(72, 'Tlanalapa'),
(73, 'Tlanchinol'),
(74, 'Tlaxcoapan'),
(75, 'Tolcayuca'),
(76, 'Tula de Allende'),
(77, 'Tulancingo de Bravo'),
(78, 'Xochiatipan'),
(79, 'Xochicoatlan'),
(80, 'Yahualica'),
(81, 'Zacualtipan de Angeles'),
(82, 'Zapotlan de Juarez'),
(83, 'Zempoala'),
(84, 'Zimapan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jalisco`
--

CREATE TABLE `jalisco` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jalisco`
--

INSERT INTO `jalisco` (`id`, `municipio`) VALUES
(1, 'Acatic'),
(2, 'Acatlan de Juarez'),
(3, 'Ahualulco de Mercado'),
(4, 'Amacueca'),
(5, 'Amatitan'),
(6, 'Ameca'),
(7, 'San Juanito de Escobedo'),
(8, 'Arandas'),
(9, 'El Arenal'),
(10, 'Atemajac de Brizuela'),
(11, 'Atengo'),
(12, 'Atenguillo'),
(13, 'Atotonilco el Alto'),
(14, 'Atoyac'),
(15, 'Autlan de Navarro'),
(16, 'Ayotlan'),
(17, 'Ayutla'),
(18, 'La Barca'),
(19, 'Bola'),
(20, 'Cabo Corrientes'),
(21, 'Casimiro Castillo'),
(22, 'Cihuatlan'),
(23, 'Zapotlan el Grande'),
(24, 'Cocula'),
(25, 'Colotlan'),
(26, 'Concepcion de Buenos Aires'),
(27, 'Cuautitlan de Garcia Barragan'),
(28, 'Cuautla'),
(29, 'Cuquio'),
(30, 'Chapala'),
(31, 'Chimaltitan'),
(32, 'Chiquilistlan'),
(33, 'Degollado'),
(34, 'Ejutla'),
(35, 'Encarnacion de Diaz'),
(36, 'Etzatlan'),
(37, 'El Grullo'),
(38, 'Guachinango'),
(39, 'Guadalajara'),
(40, 'Hostotipaquillo'),
(41, 'Huejucar'),
(42, 'Huejuquilla el Alto'),
(43, 'La Huerta'),
(44, 'Ixtlahuacan de los Membrillos'),
(45, 'Ixtlahuacan del Rio'),
(46, 'Jalostotitlan'),
(47, 'Jamay'),
(48, 'Jesus Maria'),
(49, 'Jilotlan de los Dolores'),
(50, 'Jocotepec'),
(51, 'Juanacatlan'),
(52, 'Juchitlan'),
(53, 'Lagos de Moreno'),
(54, 'El Limon'),
(55, 'Magdalena'),
(56, 'Santa Maria del Oro'),
(57, 'La Manzanilla de la Paz'),
(58, 'Mascota'),
(59, 'Mazamitla'),
(60, 'Mexticacan'),
(61, 'Mezquitic'),
(62, 'Mixtlan'),
(63, 'Ocotlan'),
(64, 'Ojuelos de Jalisco'),
(65, 'Pihuamo'),
(66, 'Poncitlan'),
(67, 'Puerto Vallarta'),
(68, 'Villa Purificacion'),
(69, 'Quitupan'),
(70, 'El Salto'),
(71, 'San Cristobal de la Barranca'),
(72, 'San Diego de Alejandria'),
(73, 'San Juan de los Lagos'),
(74, 'San Marcos'),
(75, 'San Martin de Bola'),
(76, 'San Martin Hidalgo'),
(77, 'San Miguel el Alto'),
(78, 'Gomez Farias'),
(79, 'San Sebastian del Oeste'),
(80, 'Santa Maria de los Angeles'),
(81, 'San Julian'),
(82, 'Sayula'),
(83, 'Tala'),
(84, 'Talpa de Allende'),
(85, 'Tamazula de Gordiano'),
(86, 'Tapalpa'),
(87, 'Tecalitlan'),
(88, 'Tecolotlan'),
(89, 'Techaluta de Montenegro'),
(90, 'Tenamaxtlan'),
(91, 'Teocaltiche'),
(92, 'Teocuitatlan de Corona'),
(93, 'Tepatitlan de Morelos'),
(94, 'Tequila'),
(95, 'Teuchitlan'),
(96, 'Tizapan el Alto'),
(97, 'Tlajomulco de Zu'),
(98, 'San Pedro Tlaquepaque'),
(99, 'Toliman'),
(100, 'Tomatlan'),
(101, 'Tonala'),
(102, 'Tonaya'),
(103, 'Tonila'),
(104, 'Totatiche'),
(105, 'Tototlan'),
(106, 'Tuxcacuesco'),
(107, 'Tuxcueca'),
(108, 'Tuxpan'),
(109, 'Union de San Antonio'),
(110, 'Union de Tula'),
(111, 'Valle de Guadalupe'),
(112, 'Valle de Juarez'),
(113, 'San Gabriel'),
(114, 'Villa Corona'),
(115, 'Villa Guerrero'),
(116, 'Villa Hidalgo'),
(117, 'Ca'),
(118, 'Yahualica de Gonzalez Gallo'),
(119, 'Zacoalco de Torres'),
(120, 'Zapopan'),
(121, 'Zapotiltic'),
(122, 'Zapotitlan de Vadillo'),
(123, 'Zapotlan del Rey'),
(124, 'Zapotlanejo'),
(125, 'San Ignacio Cerro Gordo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mexico`
--

CREATE TABLE `mexico` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mexico`
--

INSERT INTO `mexico` (`id`, `municipio`) VALUES
(1, 'Acambay'),
(2, 'Acolman'),
(3, 'Aculco'),
(4, 'Almoloya de Alquisiras'),
(5, 'Almoloya de Juarez'),
(6, 'Almoloya del Rio'),
(7, 'Amanalco'),
(8, 'Amatepec'),
(9, 'Amecameca'),
(10, 'Apaxco'),
(11, 'Atenco'),
(12, 'Atizapan'),
(13, 'Atizapan de Zaragoza'),
(14, 'Atlacomulco'),
(15, 'Atlautla'),
(16, 'Axapusco'),
(17, 'Ayapango'),
(18, 'Calimaya'),
(19, 'Capulhuac'),
(20, 'Coacalco de Berriozabal'),
(21, 'Coatepec Harinas'),
(22, 'Cocotitlan'),
(23, 'Coyotepec'),
(24, 'Cuautitlan'),
(25, 'Chalco'),
(26, 'Chapa de Mota'),
(27, 'Chapultepec'),
(28, 'Chiautla'),
(29, 'Chicoloapan'),
(30, 'Chiconcuac'),
(31, 'Chimalhuacan'),
(32, 'Donato Guerra'),
(33, 'Ecatepec de Morelos'),
(34, 'Ecatzingo'),
(35, 'Huehuetoca'),
(36, 'Hueypoxtla'),
(37, 'Huixquilucan'),
(38, 'Isidro Fabela'),
(39, 'Ixtapaluca'),
(40, 'Ixtapan de la Sal'),
(41, 'Ixtapan del Oro'),
(42, 'Ixtlahuaca'),
(43, 'Xalatlaco'),
(44, 'Jaltenco'),
(45, 'Jilotepec'),
(46, 'Jilotzingo'),
(47, 'Jiquipilco'),
(48, 'Jocotitlan'),
(49, 'Joquicingo'),
(50, 'Juchitepec'),
(51, 'Lerma'),
(52, 'Malinalco'),
(53, 'Melchor Ocampo'),
(54, 'Metepec'),
(55, 'Mexicaltzingo'),
(56, 'Morelos'),
(57, 'Naucalpan de Juarez'),
(58, 'Nezahualcoyotl'),
(59, 'Nextlalpan'),
(60, 'Nicolas Romero'),
(61, 'Nopaltepec'),
(62, 'Ocoyoacac'),
(63, 'Ocuilan'),
(64, 'El Oro'),
(65, 'Otumba'),
(66, 'Otzoloapan'),
(67, 'Otzolotepec'),
(68, 'Ozumba'),
(69, 'Papalotla'),
(70, 'La Paz'),
(71, 'Polotitlan'),
(72, 'Rayon'),
(73, 'San Antonio la Isla'),
(74, 'San Felipe del Progreso'),
(75, 'San Martin de las Piramides'),
(76, 'San Mateo Atenco'),
(77, 'San Simon de Guerrero'),
(78, 'Santo Tomas'),
(79, 'Soyaniquilpan de Juarez'),
(80, 'Sultepec'),
(81, 'Tecamac'),
(82, 'Tejupilco'),
(83, 'Temamatla'),
(84, 'Temascalapa'),
(85, 'Temascalcingo'),
(86, 'Temascaltepec'),
(87, 'Temoaya'),
(88, 'Tenancingo'),
(89, 'Tenango del Aire'),
(90, 'Tenango del Valle'),
(91, 'Teoloyucan'),
(92, 'Teotihuacan'),
(93, 'Tepetlaoxtoc'),
(94, 'Tepetlixpa'),
(95, 'Tepotzotlan'),
(96, 'Tequixquiac'),
(97, 'Texcaltitlan'),
(98, 'Texcalyacac'),
(99, 'Texcoco'),
(100, 'Tezoyuca'),
(101, 'Tianguistenco'),
(102, 'Timilpan'),
(103, 'Tlalmanalco'),
(104, 'Tlalnepantla de Baz'),
(105, 'Tlatlaya'),
(106, 'Toluca'),
(107, 'Tonatico'),
(108, 'Tultepec'),
(109, 'Tultitlan'),
(110, 'Valle de Bravo'),
(111, 'Villa de Allende'),
(112, 'Villa del Carbon'),
(113, 'Villa Guerrero'),
(114, 'Villa Victoria'),
(115, 'Xonacatlan'),
(116, 'Zacazonapan'),
(117, 'Zacualpan'),
(118, 'Zinacantepec'),
(119, 'Zumpahuacan'),
(120, 'Zumpango'),
(121, 'Cuautitlan Izcalli'),
(122, 'Valle de Chalco Solidaridad'),
(123, 'Luvianos'),
(124, 'San Jose del Rincon'),
(125, 'Tonanitla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `michoacan`
--

CREATE TABLE `michoacan` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `michoacan`
--

INSERT INTO `michoacan` (`id`, `municipio`) VALUES
(1, 'Acuitzio'),
(2, 'Aguililla'),
(3, 'Alvaro Obregon'),
(4, 'Angamacutiro'),
(5, 'Angangueo'),
(6, 'Apatzingan'),
(7, 'Aporo'),
(8, 'Aquila'),
(9, 'Ario'),
(10, 'Arteaga'),
(11, 'Brise'),
(12, 'Buenavista'),
(13, 'Caracuaro'),
(14, 'Coahuayana'),
(15, 'Coalcoman de Vazquez Pallares'),
(16, 'Coeneo'),
(17, 'Contepec'),
(18, 'Copandaro'),
(19, 'Cotija'),
(20, 'Cuitzeo'),
(21, 'Charapan'),
(22, 'Charo'),
(23, 'Chavinda'),
(24, 'Cheran'),
(25, 'Chilchota'),
(26, 'Chinicuila'),
(27, 'Chucandiro'),
(28, 'Churintzio'),
(29, 'Churumuco'),
(30, 'Ecuandureo'),
(31, 'Epitacio Huerta'),
(32, 'Erongaricuaro'),
(33, 'Gabriel Zamora'),
(34, 'Hidalgo'),
(35, 'La Huacana'),
(36, 'Huandacareo'),
(37, 'Huaniqueo'),
(38, 'Huetamo'),
(39, 'Huiramba'),
(40, 'Indaparapeo'),
(41, 'Irimbo'),
(42, 'Ixtlan'),
(43, 'Jacona'),
(44, 'Jimenez'),
(45, 'Jiquilpan'),
(46, 'Juarez'),
(47, 'Jungapeo'),
(48, 'Lagunillas'),
(49, 'Madero'),
(50, 'Maravatio'),
(51, 'Marcos Castellanos'),
(52, 'Lazaro Cardenas'),
(53, 'Morelia'),
(54, 'Morelos'),
(55, 'Mugica'),
(56, 'Nahuatzen'),
(57, 'Nocupetaro'),
(58, 'Nuevo Parangaricutiro'),
(59, 'Numaran'),
(60, 'Ocampo'),
(61, 'Pajacuaran'),
(62, 'Panindicuaro'),
(63, 'Paracuaro'),
(64, 'Paracho'),
(65, 'Patzcuaro'),
(66, 'Penjamillo'),
(67, 'Periban'),
(68, 'La Piedad'),
(69, 'Purepero'),
(70, 'Puruandiro'),
(71, 'Querendaro'),
(72, 'Quiroga'),
(73, 'Cojumatlan de Regules'),
(74, 'Los Reyes'),
(75, 'Sahuayo'),
(76, 'San Lucas'),
(77, 'Santa Ana Maya'),
(78, 'Salvador Escalante'),
(79, 'Senguio'),
(80, 'Nuevo Urecho'),
(81, 'Susupuato'),
(82, 'Tacambaro'),
(83, 'Tancitaro'),
(84, 'Tangamandapio'),
(85, 'Tangancicuaro'),
(86, 'Tanhuato'),
(87, 'Taretan'),
(88, 'Tarimbaro'),
(89, 'Tepalcatepec'),
(90, 'Tingambato'),
(91, 'Ting'),
(92, 'Tiquicheo de Nicolas Romero'),
(93, 'Tlalpujahua'),
(94, 'Tlazazalca'),
(95, 'Tocumbo'),
(96, 'Tumbiscatio'),
(97, 'Turicato'),
(98, 'Tuxpan'),
(99, 'Tuzantla'),
(100, 'Tzintzuntzan'),
(101, 'Tzitzio'),
(102, 'Uruapan'),
(103, 'Venustiano Carranza'),
(104, 'Villamar'),
(105, 'Vista Hermosa'),
(106, 'Yurecuaro'),
(107, 'Zacapu'),
(108, 'Zamora'),
(109, 'Zinaparo'),
(110, 'Zinapecuaro'),
(111, 'Ziracuaretiro'),
(112, 'Zitacuaro'),
(113, 'Jose Sixto Verduzco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `morelos`
--

CREATE TABLE `morelos` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `morelos`
--

INSERT INTO `morelos` (`id`, `municipio`) VALUES
(1, 'Amacuzac'),
(2, 'Atlatlahucan'),
(3, 'Axochiapan'),
(4, 'Ayala'),
(5, 'Coatlan del Rio'),
(6, 'Cuautla'),
(7, 'Cuernavaca'),
(8, 'Emiliano Zapata'),
(9, 'Huitzilac'),
(10, 'Jantetelco'),
(11, 'Jiutepec'),
(12, 'Jojutla'),
(13, 'Jonacatepec'),
(14, 'Mazatepec'),
(15, 'Miacatlan'),
(16, 'Ocuituco'),
(17, 'Puente de Ixtla'),
(18, 'Temixco'),
(19, 'Tepalcingo'),
(20, 'Tepoztlan'),
(21, 'Tetecala'),
(22, 'Tetela del Volcan'),
(23, 'Tlalnepantla'),
(24, 'Tlaltizapan de Zapata'),
(25, 'Tlaquiltenango'),
(26, 'Tlayacapan'),
(27, 'Totolapan'),
(28, 'Xochitepec'),
(29, 'Yautepec'),
(30, 'Yecapixtla'),
(31, 'Zacatepec'),
(32, 'Zacualpan'),
(33, 'Temoac');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nayarit`
--

CREATE TABLE `nayarit` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nayarit`
--

INSERT INTO `nayarit` (`id`, `municipio`) VALUES
(1, 'Acaponeta'),
(2, 'Ahuacatlan'),
(3, 'Amatlan de Ca'),
(4, 'Compostela'),
(5, 'Huajicori'),
(6, 'Ixtlan del Rio'),
(7, 'Jala'),
(8, 'Xalisco'),
(9, 'Del Nayar'),
(10, 'Rosamorada'),
(11, 'Ruiz'),
(12, 'San Blas'),
(13, 'San Pedro Lagunillas'),
(14, 'Santa Maria del Oro'),
(15, 'Santiago Ixcuintla'),
(16, 'Tecuala'),
(17, 'Tepic'),
(18, 'Tuxpan'),
(19, 'La Yesca'),
(20, 'Bahia de Banderas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nuevoleon`
--

CREATE TABLE `nuevoleon` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nuevoleon`
--

INSERT INTO `nuevoleon` (`id`, `municipio`) VALUES
(1, 'Abasolo'),
(2, 'Agualeguas'),
(3, 'Los Aldamas'),
(4, 'Allende'),
(5, 'Anahuac'),
(6, 'Apodaca'),
(7, 'Aramberri'),
(8, 'Bustamante'),
(9, 'Cadereyta Jimenez'),
(10, 'Carmen'),
(11, 'Cerralvo'),
(12, 'Cienega de Flores'),
(13, 'China'),
(14, 'Dr. Arroyo'),
(15, 'Dr. Coss'),
(16, 'Dr. Gonzalez'),
(17, 'Galeana'),
(18, 'Garcia'),
(19, 'San Pedro Garza Garcia'),
(20, 'Gral. Bravo'),
(21, 'Gral. Escobedo'),
(22, 'Gral. Teran'),
(23, 'Gral. Trevi'),
(24, 'Gral. Zaragoza'),
(25, 'Gral. Zuazua'),
(26, 'Guadalupe'),
(27, 'Los Herreras'),
(28, 'Higueras'),
(29, 'Hualahuises'),
(30, 'Iturbide'),
(31, 'Juarez'),
(32, 'Lampazos de Naranjo'),
(33, 'Linares'),
(34, 'Marin'),
(35, 'Melchor Ocampo'),
(36, 'Mier y Noriega'),
(37, 'Mina'),
(38, 'Montemorelos'),
(39, 'Monterrey'),
(40, 'Paras'),
(41, 'Pesqueria'),
(42, 'Los Ramones'),
(43, 'Rayones'),
(44, 'Sabinas Hidalgo'),
(45, 'Salinas Victoria'),
(46, 'San Nicolas de los Garza'),
(47, 'Hidalgo'),
(48, 'Santa Catarina'),
(49, 'Santiago'),
(50, 'Vallecillo'),
(51, 'Villaldama');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oaxaca`
--

CREATE TABLE `oaxaca` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oaxaca`
--

INSERT INTO `oaxaca` (`id`, `municipio`) VALUES
(1, 'Abejones'),
(2, 'Acatlan de Perez Figueroa'),
(3, 'Asuncion Cacalotepec'),
(4, 'Asuncion Cuyotepeji'),
(5, 'Asuncion Ixtaltepec'),
(6, 'Asuncion Nochixtlan'),
(7, 'Asuncion Ocotlan'),
(8, 'Asuncion Tlacolulita'),
(9, 'Ayotzintepec'),
(10, 'El Barrio de la Soledad'),
(11, 'Calihuala'),
(12, 'Candelaria Loxicha'),
(13, 'Cienega de Zimatlan'),
(14, 'Ciudad Ixtepec'),
(15, 'Coatecas Altas'),
(16, 'Coicoyan de las Flores'),
(17, 'La Compa'),
(18, 'Concepcion Buenavista'),
(19, 'Concepcion Papalo'),
(20, 'Constancia del Rosario'),
(21, 'Cosolapa'),
(22, 'Cosoltepec'),
(23, 'Cuilapam de Guerrero'),
(24, 'Cuyamecalco Villa de Zaragoza'),
(25, 'Chahuites'),
(26, 'Chalcatongo de Hidalgo'),
(27, 'Chiquihuitlan de Benito Juarez'),
(28, 'Heroica Ciudad de Ejutla de Crespo'),
(29, 'Eloxochitlan de Flores Magon'),
(30, 'El Espinal'),
(31, 'Tamazulapam del Espiritu Santo'),
(32, 'Fresnillo de Trujano'),
(33, 'Guadalupe Etla'),
(34, 'Guadalupe de Ramirez'),
(35, 'Guelatao de Juarez'),
(36, 'Guevea de Humboldt'),
(37, 'Mesones Hidalgo'),
(38, 'Villa Hidalgo'),
(39, 'Heroica Ciudad de Huajuapan de Leon'),
(40, 'Huautepec'),
(41, 'Huautla de Jimenez'),
(42, 'Ixtlan de Juarez'),
(43, 'Heroica Ciudad de Juchitan de Zaragoza'),
(44, 'Loma Bonita'),
(45, 'Magdalena Apasco'),
(46, 'Magdalena Jaltepec'),
(47, 'Santa Magdalena Jicotlan'),
(48, 'Magdalena Mixtepec'),
(49, 'Magdalena Ocotlan'),
(50, 'Magdalena Pe'),
(51, 'Magdalena Teitipac'),
(52, 'Magdalena Tequisistlan</'),
(53, 'Magdalena Tlacotepec'),
(54, 'Magdalena Zahuatlan'),
(55, 'Mariscala de Juarez'),
(56, 'Martires de Tacubaya'),
(57, 'Matias Romero Avenda'),
(58, 'Mazatlan Villa de Flores'),
(59, 'Miahuatlan de Porfirio Diaz'),
(60, 'Mixistlan de la Reforma'),
(61, 'Monjas'),
(62, 'Natividad'),
(63, 'Nazareno Etla'),
(64, 'Nejapa de Madero'),
(65, 'Ixpantepec Nieves'),
(66, 'Santiago Niltepec'),
(67, 'Oaxaca de Juarez'),
(68, 'Ocotlan de Morelos'),
(69, 'La Pe'),
(70, 'Pinotepa de Don Luis'),
(71, 'Pluma Hidalgo'),
(72, 'San Jose del Progreso'),
(73, 'Putla Villa de Guerrero'),
(74, 'Santa Catarina Quioquitani'),
(75, 'Reforma de Pineda'),
(76, 'La Reforma'),
(77, 'Reyes Etla'),
(78, 'Rojas de Cuauhtemoc'),
(79, 'Salina Cruz'),
(80, 'San Agustin Amatengo'),
(81, 'San Agustin Atenango'),
(82, 'San Agustin Chayuco'),
(83, 'San Agustin de las Juntas'),
(84, 'San Agustin Etla'),
(85, 'San Agustin Loxicha'),
(86, 'San Agustin Tlacotepec'),
(87, 'San Agustin Yatareni'),
(88, 'San Andres Cabecera Nueva'),
(89, 'San Andres Dinicuiti'),
(90, 'San Andres Huaxpaltepec'),
(91, 'San Andres Huayapam'),
(92, 'San Andres Ixtlahuaca'),
(93, 'San Andres Lagunas'),
(94, 'San Andres Nuxi'),
(95, 'San Andres Paxtlan'),
(96, 'San Andres Sinaxtla'),
(97, 'San Andres Solaga'),
(98, 'San Andres Teotilalpam'),
(99, 'San Andres Tepetlapa'),
(100, 'San Andres Yaa'),
(101, 'San Andres Zabache'),
(102, 'San Andres Zautla'),
(103, 'San Antonino Castillo Velasco'),
(104, 'San Antonino el Alto'),
(105, 'San Antonino Monte Verde'),
(106, 'San Antonio Acutla'),
(107, 'San Antonio de la Cal'),
(108, 'San Antonio Huitepec'),
(109, 'San Antonio Nanahuatipam'),
(110, 'San Antonio Sinicahua'),
(111, 'San Antonio Tepetlapa'),
(112, 'San Baltazar Chichicapam'),
(113, 'San Baltazar Loxicha'),
(114, 'San Baltazar Yatzachi el Bajo'),
(115, 'San Bartolo Coyotepec'),
(116, 'San Bartolome Ayautla'),
(117, 'San Bartolome Loxicha'),
(118, 'San Bartolome Quialana'),
(119, 'San Bartolome Yucua'),
(120, 'San Bartolome Zoogocho'),
(121, 'San Bartolo Soyaltepec'),
(122, 'San Bartolo Yautepec'),
(123, 'San Bernardo Mixtepec'),
(124, 'San Blas Atempa'),
(125, 'San Carlos Yautepec'),
(126, 'San Cristobal Amatlan'),
(127, 'San Cristobal Amoltepec'),
(128, 'San Cristobal Lachirioag'),
(129, 'San Cristobal Suchixtlahuaca'),
(130, 'San Dionisio del Mar'),
(131, 'San Dionisio Ocotepec'),
(132, 'San Dionisio Ocotlan'),
(133, 'San Esteban Atatlahuca'),
(134, 'San Felipe Jalapa de Diaz'),
(135, 'San Felipe Tejalapam'),
(136, 'San Felipe Usila'),
(137, 'San Francisco Cahuacua'),
(138, 'San Francisco Cajonos'),
(139, 'San Francisco Chapulapa'),
(140, 'San Francisco Chindua'),
(141, 'San Francisco del Mar'),
(142, 'San Francisco Huehuetlan'),
(143, 'San Francisco Ixhuatan'),
(144, 'San Francisco Jaltepetongo'),
(145, 'San Francisco Lachigolo'),
(146, 'San Francisco Logueche'),
(147, 'San Francisco Nuxa'),
(148, 'San Francisco Ozolotepec'),
(149, 'San Francisco Sola'),
(150, 'San Francisco Telixtlahuaca'),
(151, 'San Francisco Teopan'),
(152, 'San Francisco Tlapancingo'),
(153, 'San Gabriel Mixtepec'),
(154, 'San Ildefonso Amatlan'),
(155, 'San Ildefonso Sola'),
(156, 'San Ildefonso Villa Alta'),
(157, 'San Jacinto Amilpas'),
(158, 'San Jacinto Tlacotepec'),
(159, 'San Jeronimo Coatlan'),
(160, 'San Jeronimo Silacayoapilla'),
(161, 'San Jeronimo Sosola'),
(162, 'San Jeronimo Taviche'),
(163, 'San Jeronimo Tecoatl'),
(164, 'San Jorge Nuchita'),
(165, 'San Jose Ayuquila'),
(166, 'San Jose Chiltepec'),
(167, 'San Jose del Pe'),
(168, 'San Jose Estancia Grande'),
(169, 'San Jose Independencia'),
(170, 'San Jose Lachiguiri'),
(171, 'San Jose Tenango'),
(172, 'San Juan Achiutla'),
(173, 'San Juan Atepec'),
(174, 'Animas Trujano'),
(175, 'San Juan Bautista Atatlahuca'),
(176, 'San Juan Bautista Coixtlahuaca'),
(177, 'San Juan Bautista Cuicatlan'),
(178, 'San Juan Bautista Guelache'),
(179, 'San Juan Bautista Jayacatlan'),
(180, 'San Juan Bautista Lo de Soto'),
(181, 'San Juan Bautista Suchitepec'),
(182, 'San Juan Bautista Tlacoatzintepec'),
(183, 'San Juan Bautista Tlachichilco'),
(184, 'San Juan Bautista Tuxtepec'),
(185, 'San Juan Cacahuatepec'),
(186, 'San Juan Cieneguilla'),
(187, 'San Juan Coatzospam'),
(188, 'San Juan Colorado'),
(189, 'San Juan Comaltepec'),
(190, 'San Juan Cotzocon'),
(191, 'San Juan Chicomezuchil'),
(192, 'San Juan Chilateca'),
(193, 'San Juan del Estado'),
(194, 'San Juan del Rio'),
(195, 'San Juan Diuxi'),
(196, 'San Juan Evangelista Analco'),
(197, 'San Juan Guelavia'),
(198, 'San Juan Guichicovi'),
(199, 'San Juan Ihualtepec'),
(200, 'San Juan Juquila Mixes'),
(201, 'San Juan Juquila Vijanos'),
(202, 'San Juan Lachao'),
(203, 'San Juan Lachigalla'),
(204, 'San Juan Lajarcia'),
(205, 'San Juan Lalana'),
(206, 'San Juan de los Cues'),
(207, 'San Juan Mazatlan'),
(208, 'San Juan Mixtepec -Dto. 08'),
(209, 'San Juan Mixtepec -Dto. 26 '),
(210, 'San Juan'),
(211, 'San Juan Ozolotepec'),
(212, 'San Juan Petlapa'),
(213, 'San Juan Quiahije'),
(214, 'San Juan Tabaa'),
(215, 'San Juan Tamazola'),
(216, 'San Juan Teita'),
(217, 'San Juan Teitipac'),
(218, 'San Juan Tepeuxila'),
(219, 'San Juan Teposcolula'),
(220, 'San Juan Yaee'),
(221, 'San Juan Yatzona'),
(222, 'San Juan Yucuita'),
(223, 'San Lorenzo'),
(224, 'San Lorenzo Albarradas'),
(225, 'San Lorenzo Cacaotepec'),
(226, 'San Lorenzo Cuaunecuiltitla'),
(227, 'San Lorenzo Texmelucan'),
(228, 'San Lorenzo Victoria'),
(229, 'San Lucas Camotlan'),
(230, 'San Lucas Ojitlan'),
(231, 'San Lucas Quiavini'),
(232, 'San Lucas Zoquiapam'),
(233, 'San Luis Amatlan'),
(234, 'San Marcial Ozolotepec'),
(235, 'San Marcos Arteaga'),
(236, 'San Martin de los Cansecos'),
(237, 'San Martin Huamelulpam'),
(238, 'San Martin Itunyoso'),
(239, 'San Martin Lachila'),
(240, 'San Martin Peras'),
(241, 'San Martin Tilcajete'),
(242, 'San Martin Toxpalan'),
(243, 'San Martin Zacatepec'),
(244, 'San Mateo Cajonos'),
(245, 'Capulalpam de Mendez'),
(246, 'San Mateo del Mar'),
(247, 'San Mateo Yoloxochitlan'),
(248, 'San Mateo Etlatongo'),
(249, 'San Mateo Nejapam'),
(250, 'San Mateo Pe'),
(251, 'San Mateo Pi'),
(252, 'San Mateo Rio Hondo'),
(253, 'San Mateo Sindihui'),
(254, 'San Mateo Tlapiltepec'),
(255, 'San Melchor Betaza'),
(256, 'San Miguel Achiutla'),
(257, 'San Miguel Ahuehuetitlan'),
(258, 'San Miguel Aloapam'),
(259, 'San Miguel Amatitlan'),
(260, 'San Miguel Amatlan'),
(261, 'San Miguel Coatlan'),
(262, 'San Miguel Chicahua'),
(263, 'San Miguel Chimalapa'),
(264, 'San Miguel del Puerto'),
(265, 'San Miguel del Rio'),
(266, 'San Miguel Ejutla'),
(267, 'San Miguel el Grande'),
(268, 'San Miguel Huautla'),
(269, 'San Miguel Mixtepec'),
(270, 'San Miguel Panixtlahuaca'),
(271, 'San Miguel Peras'),
(272, 'San Miguel Piedras'),
(273, 'San Miguel Quetzaltepec'),
(274, 'San Miguel Santa Flor'),
(275, 'Villa Sola de Vega'),
(276, 'San Miguel Soyaltepec'),
(277, 'San Miguel Suchixtepec'),
(278, 'Villa Talea de Castro'),
(279, 'San Miguel Tecomatlan'),
(280, 'San Miguel Tenango'),
(281, 'San Miguel Tequixtepec'),
(282, 'San Miguel Tilquiapam'),
(283, 'San Miguel Tlacamama'),
(284, 'San Miguel Tlacotepec'),
(285, 'San Miguel Tulancingo'),
(286, 'San Miguel Yotao'),
(287, 'San Nicolas'),
(288, 'San Nicolas Hidalgo'),
(289, 'San Pablo Coatlan'),
(290, 'San Pablo Cuatro Venados'),
(291, 'San Pablo Etla'),
(292, 'San Pablo Huitzo'),
(293, 'San Pablo Huixtepec'),
(294, 'San Pablo Macuiltianguis'),
(295, 'San Pablo Tijaltepec'),
(296, 'San Pablo Villa de Mitla'),
(297, 'San Pablo Yaganiza'),
(298, 'San Pedro Amuzgos'),
(299, 'San Pedro Apostol'),
(300, 'San Pedro Atoyac'),
(301, 'San Pedro Cajonos'),
(302, 'San Pedro Coxcaltepec Cantaros'),
(303, 'San Pedro Comitancillo'),
(304, 'San Pedro el Alto'),
(305, 'San Pedro Huamelula'),
(306, 'San Pedro Huilotepec'),
(307, 'San Pedro Ixcatlan'),
(308, 'San Pedro Ixtlahuaca'),
(309, 'San Pedro Jaltepetongo'),
(310, 'San Pedro Jicayan'),
(311, 'San Pedro Jocotipac'),
(312, 'San Pedro Juchatengo'),
(313, 'San Pedro Martir'),
(314, 'San Pedro Martir Quiechapa'),
(315, 'San Pedro Martir Yucuxaco'),
(316, 'San Pedro Mixtepec -Dto. 22'),
(317, 'San Pedro Mixtepec -Dto. 26'),
(318, 'San Pedro Molinos'),
(319, 'San Pedro Nopala'),
(320, 'San Pedro Ocopetatillo'),
(321, 'San Pedro Ocotepec'),
(322, 'San Pedro Pochutla'),
(323, 'San Pedro Quiatoni'),
(324, 'San Pedro Sochiapam'),
(325, 'San Pedro Tapanatepec'),
(326, 'San Pedro Taviche'),
(327, 'San Pedro Teozacoalco'),
(328, 'San Pedro Teutila'),
(329, 'San Pedro Tidaa'),
(330, 'San Pedro Topiltepec'),
(331, 'San Pedro Totolapam'),
(332, 'Villa de Tututepec de Melchor Ocampo'),
(333, 'San Pedro Yaneri'),
(334, 'San Pedro Yolox'),
(335, 'San Pedro y San Pablo Ayutla'),
(336, 'Villa de Etla'),
(337, 'San Pedro y San Pablo Teposcolula'),
(338, 'San Pedro y San Pablo Tequixtepec'),
(339, 'San Pedro Yucunama'),
(340, 'San Raymundo Jalpan'),
(341, 'San Sebastian Abasolo'),
(342, 'San Sebastian Coatlan'),
(343, 'San Sebastian Ixcapa'),
(344, 'San Sebastian Nicananduta'),
(345, 'San Sebastian Rio Hondo'),
(346, 'San Sebastian Tecomaxtlahuaca'),
(347, 'San Sebastian Teitipac'),
(348, 'San Sebastian Tutla'),
(349, 'San Simon Almolongas'),
(350, 'San Simon Zahuatlan'),
(351, 'Santa Ana'),
(352, 'Santa Ana Ateixtlahuaca'),
(353, 'Santa Ana Cuauhtemoc'),
(354, 'Santa Ana del Valle'),
(355, 'Santa Ana Tavela'),
(356, 'Santa Ana Tlapacoyan'),
(357, 'Santa Ana Yareni'),
(358, 'Santa Ana Zegache'),
(359, 'Santa Catalina Quieri'),
(360, 'Santa Catarina Cuixtla'),
(361, 'Santa Catarina Ixtepeji'),
(362, 'Santa Catarina Juquila'),
(363, 'Santa Catarina Lachatao'),
(364, 'Santa Catarina Loxicha'),
(365, 'Santa Catarina Mechoacan'),
(366, 'Santa Catarina Minas'),
(367, 'Santa Catarina Quiane'),
(368, 'Santa Catarina Tayata'),
(369, 'Santa Catarina Ticua'),
(370, 'Santa Catarina Yosonotu'),
(371, 'Santa Catarina Zapoquila'),
(372, 'Santa Cruz Acatepec'),
(373, 'Santa Cruz Amilpas'),
(374, 'Santa Cruz de Bravo'),
(375, 'Santa Cruz Itundujia'),
(376, 'Santa Cruz Mixtepec'),
(377, 'Santa Cruz Nundaco'),
(378, 'Santa Cruz Papalutla'),
(379, 'Santa Cruz Tacache de Mina'),
(380, 'Santa Cruz Tacahua'),
(381, 'Santa Cruz Tayata'),
(382, 'Santa Cruz Xitla'),
(383, 'Santa Cruz Xoxocotlan'),
(384, 'Santa Cruz Zenzontepec'),
(385, 'Santa Gertrudis'),
(386, 'Santa Ines del Monte'),
(387, 'Santa Ines Yatzeche'),
(388, 'Santa Lucia del Camino'),
(389, 'Santa Lucia Miahuatlan'),
(390, 'Santa Lucia Monteverde'),
(391, 'Santa Lucia Ocotlan'),
(392, 'Santa Maria Alotepec'),
(393, 'Santa Maria Apazco'),
(394, 'Santa Maria la Asuncion'),
(395, 'Heroica Ciudad de Tlaxiaco'),
(396, 'Ayoquezco de Aldama'),
(397, 'Santa Maria Atzompa'),
(398, 'Santa Maria Camotlan'),
(399, 'Santa Maria Colotepec'),
(400, 'Santa Maria Cortijo'),
(401, 'Santa Maria Coyotepec'),
(402, 'Santa Maria Chachoapam'),
(403, 'Villa de Chilapa de Diaz'),
(404, 'Santa Maria Chilchotla'),
(405, 'Santa Maria Chimalapa'),
(406, 'Santa Maria del Rosario'),
(407, 'Santa Maria del Tule'),
(408, 'Santa Maria Ecatepec'),
(409, 'Santa Maria Guelace'),
(410, 'Santa Maria Guienagati'),
(411, 'Santa Maria Huatulco'),
(412, 'Santa Maria Huazolotitlan'),
(413, 'Santa Maria Ipalapa'),
(414, 'Santa Maria Ixcatlan'),
(415, 'Santa Maria Jacatepec'),
(416, 'Santa Maria Jalapa del Marques'),
(417, 'Santa Maria Jaltianguis'),
(418, 'Santa Maria Lachixio'),
(419, 'Santa Maria Mixtequilla'),
(420, 'Santa Maria Nativitas'),
(421, 'Santa Maria Nduayaco'),
(422, 'Santa Maria Ozolotepec'),
(423, 'Santa Maria Papalo'),
(424, 'Santa Maria Pe'),
(425, 'Santa Maria Petapa'),
(426, 'Santa Maria Quiegolani'),
(427, 'Santa Maria Sola'),
(428, 'Santa Maria Tataltepec'),
(429, 'Santa Maria Tecomavaca'),
(430, 'Santa Maria Temaxcalapa'),
(431, 'Santa Maria Temaxcaltepec'),
(432, 'Santa Maria Teopoxco'),
(433, 'Santa Maria Tepantlali'),
(434, 'Santa Maria Texcatitlan'),
(435, 'Santa Maria Tlahuitoltepec'),
(436, 'Santa Maria Tlalixtac'),
(437, 'Santa Maria Tonameca'),
(438, 'Santa Maria Totolapilla'),
(439, 'Santa Maria Xadani'),
(440, 'Santa Maria Yalina'),
(441, 'Santa Maria Yavesia'),
(442, 'Santa Maria Yolotepec'),
(443, 'Santa Maria Yosoyua'),
(444, 'Santa Maria Yucuhiti'),
(445, 'Santa Maria Zacatepec'),
(446, 'Santa Maria Zaniza'),
(447, 'Santa Maria Zoquitlan'),
(448, 'Santiago Amoltepec'),
(449, 'Santiago Apoala'),
(450, 'Santiago Apostol'),
(451, 'Santiago Astata'),
(452, 'Santiago Atitlan'),
(453, 'Santiago Ayuquililla'),
(454, 'Santiago Cacaloxtepec'),
(455, 'Santiago Camotlan'),
(456, 'Santiago Camotlan'),
(457, 'Santiago Comaltepec'),
(458, 'Santiago Chazumba'),
(459, 'Santiago Choapam'),
(460, 'Santo Domingo Albarradas'),
(461, 'Santo Domingo Armenta'),
(462, 'Santo Domingo Chihuitan'),
(463, 'Santo Domingo de Morelos'),
(464, 'Santo Domingo Ixcatlan'),
(465, 'Santo Domingo Nuxaa'),
(466, 'Santo Domingo Ozolotepec'),
(467, 'Santo Domingo Petapa'),
(468, 'Santo Domingo Roayaga'),
(469, 'Santo Domingo Tehuantepec'),
(470, 'Santo Domingo Teojomulco'),
(471, 'Santo Domingo Tepuxtepec'),
(472, 'Santo Domingo Tlatayapam'),
(473, 'Santo Domingo Tomaltepec'),
(474, 'Santo Domingo Tonala'),
(475, 'Santo Domingo Tonaltepec'),
(476, 'Santo Domingo Xagacia'),
(477, 'Santo Domingo Yanhuitlan'),
(478, 'Santo Domingo Yodohino'),
(479, 'Santo Domingo Zanatepec'),
(480, 'Santos Reyes Nopala'),
(481, 'Santos Reyes Papalo'),
(482, 'Santos Reyes Tepejillo'),
(483, 'Santos Reyes Yucuna'),
(484, 'Santo Tomas Jalieza'),
(485, 'Santo Tomas Mazaltepec'),
(486, 'Santo Tomas Ocotepec'),
(487, 'Santo Tomas Tamazulapan'),
(488, 'San Vicente Coatlan'),
(489, 'San Vicente Lachixio'),
(490, 'San Vicente Nu'),
(491, 'Silacayoapam'),
(492, 'Sitio de Xitlapehua'),
(493, 'Soledad Etla'),
(494, 'Villa de Tamazulapam del Progreso'),
(495, 'Tanetze de Zaragoza'),
(496, 'Taniche'),
(497, 'Tataltepec de Valdes'),
(498, 'Teococuilco de Marcos Perez'),
(499, 'Teotitlan del Valle'),
(500, 'Tepelmeme Villa de Morelos'),
(501, 'Heroica Villa Tezoatlan de Segura y Luna, Cuna de la Independencia'),
(502, 'San Jeronimo Tlacochahuaya');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puebla`
--

CREATE TABLE `puebla` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puebla`
--

INSERT INTO `puebla` (`id`, `municipio`) VALUES
(1, 'Acajete'),
(2, 'Acateno'),
(3, 'Acatlan'),
(4, 'Acatzingo'),
(5, 'Acteopan'),
(6, 'Ahuacatlan'),
(7, 'Ahuatlan'),
(8, 'Ahuazotepec'),
(9, 'Ahuehuetitla'),
(10, 'Ajalpan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `queretaro`
--

CREATE TABLE `queretaro` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `queretaro`
--

INSERT INTO `queretaro` (`id`, `municipio`) VALUES
(1, 'Amealco de Bonfil'),
(2, 'Pinal de Amoles'),
(3, 'Arroyo Seco'),
(4, 'Cadereyta de Montes'),
(5, 'Colon'),
(6, 'Corregidora'),
(7, 'Ezequiel Montes'),
(8, 'Huimilpan'),
(9, 'Jalpan de Serra'),
(10, 'Landa de Matamoros'),
(11, 'El Marques'),
(12, 'Pedro Escobedo'),
(13, 'Pe'),
(14, 'Queretaro'),
(15, 'San Joaquin'),
(16, 'San Juan del Rio'),
(17, 'Tequisquiapan'),
(18, 'Toliman');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quintanaroo`
--

CREATE TABLE `quintanaroo` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `quintanaroo`
--

INSERT INTO `quintanaroo` (`id`, `municipio`) VALUES
(1, 'Cozumel'),
(2, 'Felipe Carrillo Puerto'),
(3, 'Isla Mujeres'),
(4, 'Othon P. Blanco'),
(5, 'Benito Juarez'),
(6, 'Jose Maria Morelos'),
(7, 'Lazaro Cardenas'),
(8, 'Solidaridad'),
(9, 'Tulum'),
(10, 'Bacalar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sanluis`
--

CREATE TABLE `sanluis` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sanluis`
--

INSERT INTO `sanluis` (`id`, `municipio`) VALUES
(1, 'Ahualulco'),
(2, 'Alaquines'),
(3, 'Aquismon'),
(4, 'Armadillo de los Infante'),
(5, 'Cardenas'),
(6, 'Catorce'),
(7, 'Cedral'),
(8, 'Cerritos'),
(9, 'Cerro de San Pedro'),
(10, 'Ciudad del Maiz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sinaloa`
--

CREATE TABLE `sinaloa` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sinaloa`
--

INSERT INTO `sinaloa` (`id`, `municipio`) VALUES
(1, 'Ahome'),
(2, 'Angostura'),
(3, 'Badiraguato'),
(4, 'Concordia'),
(5, 'Cosala'),
(6, 'Culiacan'),
(7, 'Choix'),
(8, 'Elota'),
(9, 'Escuinapa'),
(10, 'El Fuerte'),
(11, 'Guasave'),
(12, 'Mazatlan'),
(13, 'Mocorito'),
(14, 'Rosario'),
(15, 'Salvador Alvarado'),
(16, 'San Ignacio'),
(17, 'Sinaloa'),
(18, 'Navolato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sonora`
--

CREATE TABLE `sonora` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sonora`
--

INSERT INTO `sonora` (`id`, `municipio`) VALUES
(1, 'Aconchi'),
(2, 'Agua Prieta'),
(3, 'Alamos'),
(4, 'Altar'),
(5, 'Arivechi'),
(6, 'Arizpe'),
(7, 'Atil'),
(8, 'Bacadehuachi'),
(9, 'Bacanora'),
(10, 'Guaymas'),
(11, 'Hermosillo'),
(12, 'Nogales'),
(13, 'Caborca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabasco`
--

CREATE TABLE `tabasco` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tabasco`
--

INSERT INTO `tabasco` (`id`, `municipio`) VALUES
(1, 'Balancan'),
(2, 'Cardenas'),
(3, 'Centla'),
(4, 'Centro'),
(5, 'Comalcalco'),
(6, 'Cunduacan'),
(7, 'Emiliano Zapata'),
(8, 'Huimanguillo'),
(9, 'Jalapa'),
(10, 'Jalpa de Mendez'),
(11, 'Jonuta'),
(12, 'Macuspana'),
(13, 'Nacajuca'),
(14, 'Paraiso'),
(15, 'Tacotalpa'),
(16, 'Teapa'),
(17, 'Tenosique');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tamaulipas`
--

CREATE TABLE `tamaulipas` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tamaulipas`
--

INSERT INTO `tamaulipas` (`id`, `municipio`) VALUES
(1, 'Abasolo'),
(2, 'Aldama'),
(3, 'Altamira'),
(4, 'Antiguo Morelos'),
(5, 'Burgos'),
(6, 'Bustamante'),
(7, 'Camargo'),
(8, 'Casas'),
(9, 'Ciudad Madero'),
(10, 'Cruillas'),
(11, 'Gomez Farias'),
(12, 'Gonzalez'),
(13, 'Guerrero'),
(14, 'Gustavo Diaz Ordaz'),
(15, 'Hidalgo'),
(16, 'Jaumave'),
(17, 'Jimenez'),
(18, 'Llera'),
(19, 'Mainero'),
(20, 'El Mante'),
(21, 'Matamoros'),
(22, 'Mendez'),
(23, 'Mier'),
(24, 'Miguel Aleman'),
(25, 'Miquihuana'),
(26, 'Nuevo Laredo'),
(27, 'Nuevo Morelos'),
(28, 'Ocampo'),
(29, 'Reynosa'),
(30, 'Rio Bravo'),
(31, 'Tampico'),
(32, 'Valle Hermoso'),
(33, 'Victoria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlaxcala`
--

CREATE TABLE `tlaxcala` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tlaxcala`
--

INSERT INTO `tlaxcala` (`id`, `municipio`) VALUES
(1, 'Atlangatepec'),
(2, 'Atltzayanca'),
(3, 'Calpulalpan'),
(4, 'Tlaxcala'),
(5, 'Tlaxco'),
(6, 'Zacatelco'),
(7, 'Lazaro Cardenas'),
(8, 'Emiliano Zapata'),
(9, 'Hueyotlipan'),
(10, 'Panotla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veracruz`
--

CREATE TABLE `veracruz` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `veracruz`
--

INSERT INTO `veracruz` (`id`, `municipio`) VALUES
(1, 'Orizaba'),
(2, 'Xalapa'),
(3, 'Jalacingo'),
(4, 'Coahuitlan'),
(5, 'Catemaco'),
(6, 'Tuxpan'),
(7, 'Veracruz'),
(8, 'Tuxtilla'),
(9, 'Xoxocotla'),
(10, 'Zacualpan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `yucatan`
--

CREATE TABLE `yucatan` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `yucatan`
--

INSERT INTO `yucatan` (`id`, `municipio`) VALUES
(1, 'Merida'),
(2, 'Izamal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zacatecas`
--

CREATE TABLE `zacatecas` (
  `id` int(11) NOT NULL,
  `municipio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `zacatecas`
--

INSERT INTO `zacatecas` (`id`, `municipio`) VALUES
(1, 'Fresnillo'),
(2, 'Zacatecas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aguascalientes`
--
ALTER TABLE `aguascalientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bajacalifornia`
--
ALTER TABLE `bajacalifornia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bajacaliforniasur`
--
ALTER TABLE `bajacaliforniasur`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `campeche`
--
ALTER TABLE `campeche`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cdmx`
--
ALTER TABLE `cdmx`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `chiapas`
--
ALTER TABLE `chiapas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `chihuahua`
--
ALTER TABLE `chihuahua`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coahuila`
--
ALTER TABLE `coahuila`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colima`
--
ALTER TABLE `colima`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `durango`
--
ALTER TABLE `durango`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `guanajuato`
--
ALTER TABLE `guanajuato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `guerrero`
--
ALTER TABLE `guerrero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hidalgo`
--
ALTER TABLE `hidalgo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jalisco`
--
ALTER TABLE `jalisco`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mexico`
--
ALTER TABLE `mexico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `michoacan`
--
ALTER TABLE `michoacan`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `morelos`
--
ALTER TABLE `morelos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nayarit`
--
ALTER TABLE `nayarit`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nuevoleon`
--
ALTER TABLE `nuevoleon`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oaxaca`
--
ALTER TABLE `oaxaca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `puebla`
--
ALTER TABLE `puebla`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `queretaro`
--
ALTER TABLE `queretaro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `quintanaroo`
--
ALTER TABLE `quintanaroo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sanluis`
--
ALTER TABLE `sanluis`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sinaloa`
--
ALTER TABLE `sinaloa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sonora`
--
ALTER TABLE `sonora`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tabasco`
--
ALTER TABLE `tabasco`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tamaulipas`
--
ALTER TABLE `tamaulipas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tlaxcala`
--
ALTER TABLE `tlaxcala`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `veracruz`
--
ALTER TABLE `veracruz`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `yucatan`
--
ALTER TABLE `yucatan`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `zacatecas`
--
ALTER TABLE `zacatecas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aguascalientes`
--
ALTER TABLE `aguascalientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `bajacalifornia`
--
ALTER TABLE `bajacalifornia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `bajacaliforniasur`
--
ALTER TABLE `bajacaliforniasur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `campeche`
--
ALTER TABLE `campeche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `cdmx`
--
ALTER TABLE `cdmx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `chiapas`
--
ALTER TABLE `chiapas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT de la tabla `chihuahua`
--
ALTER TABLE `chihuahua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT de la tabla `coahuila`
--
ALTER TABLE `coahuila`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `colima`
--
ALTER TABLE `colima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `durango`
--
ALTER TABLE `durango`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `guanajuato`
--
ALTER TABLE `guanajuato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT de la tabla `guerrero`
--
ALTER TABLE `guerrero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT de la tabla `hidalgo`
--
ALTER TABLE `hidalgo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT de la tabla `jalisco`
--
ALTER TABLE `jalisco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT de la tabla `mexico`
--
ALTER TABLE `mexico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT de la tabla `michoacan`
--
ALTER TABLE `michoacan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT de la tabla `morelos`
--
ALTER TABLE `morelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `nayarit`
--
ALTER TABLE `nayarit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `nuevoleon`
--
ALTER TABLE `nuevoleon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de la tabla `oaxaca`
--
ALTER TABLE `oaxaca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;
--
-- AUTO_INCREMENT de la tabla `puebla`
--
ALTER TABLE `puebla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `queretaro`
--
ALTER TABLE `queretaro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `quintanaroo`
--
ALTER TABLE `quintanaroo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `sanluis`
--
ALTER TABLE `sanluis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `sinaloa`
--
ALTER TABLE `sinaloa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `sonora`
--
ALTER TABLE `sonora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `tabasco`
--
ALTER TABLE `tabasco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `tamaulipas`
--
ALTER TABLE `tamaulipas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `tlaxcala`
--
ALTER TABLE `tlaxcala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `veracruz`
--
ALTER TABLE `veracruz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `yucatan`
--
ALTER TABLE `yucatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `zacatecas`
--
ALTER TABLE `zacatecas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
