-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-08-2019 a las 03:03:58
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `market`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZARPRODUCTO` (IN `ID` INT, IN `NOM` VARCHAR(40), IN `IDMARCA` INT, IN `PRECION` FLOAT, IN `PRECIOO` FLOAT, IN `DESCR` VARCHAR(300), IN `IDTALLA` INT, IN `IDTIPO` INT, IN `IDGEN` INT, IN `MAT` VARCHAR(25))  NO SQL
UPDATE CALZADO SET NOMBRE = NOM, ID_MARCA = IDMARCA, PRECIO_NORMAL = PRECION, PRECIO_OFERTA = PRECIOO, DESCRIPCION = DESCR, ID_TALLA = IDTALLA, ID_TIPO = IDTIPO, ID_GENERO = IDGEN, MATERIAL = MAT
WHERE COD_SEA = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZARUSUARIO` (IN `ID` INT, IN `NOM` VARCHAR(25), IN `APE` VARCHAR(25), IN `MAIL` VARCHAR(25), IN `CEL` VARCHAR(9), IN `DIREC` VARCHAR(40), IN `USU` VARCHAR(30), IN `PASS` VARCHAR(15))  NO SQL
UPDATE USUARIO SET ID_LOG = ID, NOMBRE = NOM, APELLIDO = APE, EMAIL = MAIL, CELULAR = CEL, DIRRECION = DIREC, NOM_USU = USU, PASS = PASS
WHERE ID_LOG = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZARUSUARIOADMIN` (IN `ID` INT, IN `IDROL` INT, IN `NOM` VARCHAR(20), IN `APE` VARCHAR(20), IN `MAIL` VARCHAR(30), IN `CEL` VARCHAR(9), IN `DIREC` VARCHAR(30), IN `USU` VARCHAR(15), IN `PASS` VARCHAR(15), IN `EST` CHAR(1))  NO SQL
UPDATE USUARIO SET ID_LOG = ID, ID_ROL = IDROL, NOMBRE = NOM, APELLIDO = APE, EMAIL = MAIL, CELULAR = CEL, DIRRECION = DIREC, NOM_USU = USU, PASS = PASS, ESTADO = EST
WHERE ID_LOG = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EDITARPRODUCTO` (IN `ID` INT)  NO SQL
SELECT C.COD_SEA, C.NOMBRE, M.NOM_MARCA, F.FOTO1, F.FOTO2, F.FOTO3, F.FOTO4, C.PRECIO_NORMAL, C.PRECIO_OFERTA, C.DESCRIPCION, T.TALLA, TI.NOM_TIPO, G.TIPO_GEN, C.MATERIAL
FROM calzado C INNER JOIN MARCA M ON C.ID_MARCA = M.ID_MARCA
INNER JOIN FOTO F ON C.COD_SEA = F.COD_SEA
INNER JOIN TALLA T ON C.ID_TALLA = T.ID_TALLA
INNER JOIN TIPO TI ON C.ID_TIPO = TI.ID_TIPO
INNER JOIN GENERO G ON C.ID_GENERO = G.ID_GENERO
WHERE C.COD_SEA = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EDITARUSUARIO` (IN `ID` INT)  NO SQL
SELECT U.*, R.NOM_ROL FROM USUARIO U 
INNER JOIN ROL R ON U.ID_ROL = R.ID_ROL WHERE ID_LOG = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ELIMINARPRODUCTO` (IN `ID` INT)  NO SQL
DELETE FROM Calzado WHERE COD_SEA = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ELIMINARUSUARIO` (IN `ID` INT)  NO SQL
DELETE FROM USUARIO WHERE ID_LOG = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERTARCALZADO` (IN `NOMBRE` VARCHAR(30), IN `IDMARCA` INT, IN `PRECION` FLOAT, IN `PRECIOO` FLOAT, IN `DESCR` VARCHAR(300), IN `IDTALLA` INT, IN `IDTIPO` INT, IN `IDGEN` INT, IN `MAT` VARCHAR(25))  NO SQL
INSERT INTO CALZADO(NOMBRE, ID_MARCA, PRECIO_NORMAL, PRECIO_OFERTA, DESCRIPCION, ID_TALLA, ID_TIPO, ID_GENERO, MATERIAL) VALUES(NOMBRE, IDMARCA, PRECION, PRECIOO, DESCR, IDTALLA, IDTIPO, IDGEN, MAT)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERTARIMG` (IN `ID` INT, IN `FOT1` VARCHAR(25), IN `FOT2` VARCHAR(25), IN `FOT3` VARCHAR(25), IN `FOT4` VARCHAR(25))  NO SQL
INSERT INTO FOTO(COD_SEA, FOTO1, FOTO2, FOTO3, FOTO4) VALUES(ID, FOT1, FOT2, FOT3, FOT4)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERTARUSUADMIN` (IN `ID` INT, IN `NOM` VARCHAR(30), IN `APE` VARCHAR(30), IN `MAIL` VARCHAR(40), IN `CEL` CHAR(9), IN `DIREC` VARCHAR(30), IN `USU` VARCHAR(15), IN `PASS` VARCHAR(15), IN `EST` CHAR(1))  NO SQL
INSERT INTO USUARIO(ID_ROL, NOMBRE, APELLIDO, EMAIL, CELULAR, DIRRECION, NOM_USU, PASS, ESTADO) VALUES(ID, NOM, APE, MAIL, CEL, DIREC, USU, PASS, EST)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERTARUSUARIOS` (IN `NOM` VARCHAR(30), IN `APE` VARCHAR(30), IN `MAIL` VARCHAR(30), IN `CEL` CHAR(30), IN `DIREC` VARCHAR(30), IN `USU` VARCHAR(20), IN `PASS` VARCHAR(20), IN `EST` CHAR(1))  NO SQL
INSERT INTO USUARIO(ID_ROL, NOMBRE, APELLIDO, EMAIL, CELULAR, DIRRECION, NOM_USU, PASS, ESTADO) VALUES(2, NOM, APE, MAIL, CEL, DIREC, USU, PASS, EST)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTARCALZADO` (IN `ID` INT)  NO SQL
SELECT C.COD_SEA, C.NOMBRE, M.NOM_MARCA, F.FOTO1, F.FOTO2, F.FOTO3, F.FOTO4, C.PRECIO_NORMAL, C.PRECIO_OFERTA, C.DESCRIPCION, T.TALLA, TI.NOM_TIPO, G.TIPO_GEN, C.MATERIAL
FROM calzado C INNER JOIN MARCA M ON C.ID_MARCA = M.ID_MARCA
INNER JOIN FOTO F ON C.COD_SEA = F.COD_SEA
INNER JOIN TALLA T ON C.ID_TALLA = T.ID_TALLA
INNER JOIN TIPO TI ON C.ID_TIPO = TI.ID_TIPO
INNER JOIN GENERO G ON C.ID_GENERO = G.ID_GENERO
WHERE C.COD_SEA = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTARCALZADOALL` ()  NO SQL
SELECT C.COD_SEA, C.NOMBRE, M.NOM_MARCA, F.FOTO1, F.FOTO2, F.FOTO3, F.FOTO4, C.PRECIO_NORMAL, C.PRECIO_OFERTA, C.DESCRIPCION, T.TALLA, TI.NOM_TIPO, G.TIPO_GEN, C.MATERIAL
FROM calzado C INNER JOIN MARCA M ON C.ID_MARCA = M.ID_MARCA
INNER JOIN FOTO F ON C.COD_SEA = F.COD_SEA
INNER JOIN TALLA T ON C.ID_TALLA = T.ID_TALLA
INNER JOIN TIPO TI ON C.ID_TIPO = TI.ID_TIPO
INNER JOIN GENERO G ON C.ID_GENERO = G.ID_GENERO$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTARUSUARIO` ()  NO SQL
SELECT U.*, R.NOM_ROL
FROM USUARIO U
INNER JOIN ROL R ON U.ID_ROL = R.ID_ROL$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTARVISTACALZADO` ()  NO SQL
SELECT C.COD_SEA, M.NOM_MARCA, C.NOMBRE, F.FOTO1, C.PRECIO_NORMAL, C.PRECIO_OFERTA
FROM calzado C INNER JOIN FOTO F ON c.COD_SEA = F.COD_SEA
INNER JOIN MARCA M ON C.ID_MARCA = M.ID_MARCA$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VALIDARLOGIN` (IN `USU` VARCHAR(15), IN `CLA` VARCHAR(15))  NO SQL
SELECT NOM_USU, PASS, ID_LOG, ID_ROL
from usuario
where NOM_USU = usu and PASS = cla$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calzado`
--

CREATE TABLE `calzado` (
  `COD_SEA` int(11) NOT NULL,
  `NOMBRE` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `ID_MARCA` int(11) NOT NULL,
  `PRECIO_NORMAL` float NOT NULL,
  `PRECIO_OFERTA` float NOT NULL,
  `DESCRIPCION` varchar(750) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `ID_TALLA` int(11) NOT NULL,
  `ID_TIPO` int(11) NOT NULL,
  `ID_GENERO` int(11) NOT NULL,
  `MATERIAL` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `calzado`
--

INSERT INTO `calzado` (`COD_SEA`, `NOMBRE`, `ID_MARCA`, `PRECIO_NORMAL`, `PRECIO_OFERTA`, `DESCRIPCION`, `ID_TALLA`, `ID_TIPO`, `ID_GENERO`, `MATERIAL`) VALUES
(1, 'Zapatilla Duramo 9 ', 1, 300, 250, 'Las Adidas Duramo 9 es la última versión hasta la fecha de esta conocida línea de gama media. Una zapatilla que puede adquirirse a un precio muy asequible', 1, 1, 1, 'Tela'),
(2, 'Zapatilla running Duramo Lite ', 1, 169, 135.2, 'Las Duramo Lite 2.0 es una versión muy sencilla y con dotes de ligereza de la línea Duramo de Adidas. No llega a las Duramo 9, que es el modelo del momento más orientado a la practica del running de esta saga, pero pueden ser unas zapatillas que te saquen de ciertos apuros para realizar algunos inte', 3, 1, 2, 'Tela'),
(3, 'Zapatilla Duramo 9', 1, 259, 207.2, 'Si estás buscando algo sencillo y que no tengas que rascarte el bolsillo, esta puede ser una de tus mejores apuestas. Es un calzado muy equilibrado, tal es así que están consideradas unas zapatillas de running, pero por su versatilidad y prestaciones nosotros vemos que pueden encajar perfectamente en nuestro estilo training. Te contamos todos los detalles de esta silueta a continuación.', 11, 5, 1, 'Tela'),
(4, 'Zapatillas urbanas Pod S W', 1, 499, 349.3, 'El P.O.D. System “punto de deflexión” regresa de los archivos, trayendo lo mejor del diseño de amortiguación de los 90 al mundo de hoy. Estas zapatillas combinan inspiración en el legado de adidas con un exterior ceñido tipo media. La mediasuela podular de cápsulas brinda una sensación semejante a estar flotando.', 4, 5, 2, 'Tela'),
(5, 'Zapatillas Superstar', 1, 199, 159.2, 'Las Adidas Superstar nacieron en el año 1969, algo que seguramente sorprenderá a todos los adolescentes que ahora las calzan y que desconocían que incluso sus abuelos las podrían haberlas usado. Al principio, su mayor éxito vino de parte de la NBA ya que eran las zapatillas utilizadas por las tres cuartas partes de los jugadores debido a su gran comodidad, a su suela que no deja huella en la cancha y, sobre todo, a su cómoda puntera en forma de concha tan característica.', 4, 2, 2, 'Cuero'),
(6, 'Zapatillas Campus', 1, 299, 209.3, 'Como un ícono atemporal de la moda urbana, las Campus son amados por su exterior elegante y suave y su estilo de corte bajo nacido en las canchas de básquet. Esta versión recupera la estética de los 90 con las 3 Tiras que lucen más anchas de lo nomal. Evocan la época de las batallas de hip-hop callejeras, marcadas por pasadores gruesos y un deseo de personalizar tus zapatillas y lucir el estilo más auténtico. Lucen un exterior de nobuk extrasuave con una suela estilizada tipo cupsole de caucho y', 4, 2, 2, 'Cuero'),
(7, 'Zapatilla Alphabounce', 1, 349, 279.2, 'Para empezar que la frontera entre zapatilla de running y sneaker no está delimitada, por lo que la adidas Alphabounce se convierte en uno de esos modelos que sobresalen por su gran versatilidad. Por un lado sirven para correr y sumar kilómetros, y por otro lado también son aptas para vestir, e incluir con cualquier look casual deportivo. Y más si cabe con los diferentes colores y modelos que adidas ha puesto en el mercado con la Alphabounce.', 2, 5, 1, '	 Tela'),
(8, 'Zapatillas running Galaxy4', 1, 179, 143.2, 'Las Adidas Galaxy 4 son unas cómodas zapatillas de gama media cuyo usuario tipo son corredores de pisada neutra y peso ligero. Están especialmente recomendadas para gente que esté dando sus primeros pasos dentro del mundo del running, siendo también una opción más que válida para aquellos que combinan correr y andar. \r\n\r\nSu económico precio es indudablemente otro de sus principales atractivos. ', 11, 5, 1, 'Tela'),
(9, 'Zapatilla Asweego', 1, 299, 209.3, 'Las Adidas Asweego son una de las zapatillas revelación entre los apasionados del running que están en nivel de iniciación. Una de las causas por las que los principiantes eligen este modelo es por su excelente relación calidad/precio. Pero no podemos olvidarnos que este calzado cuenta también con el sello de identidad de Adidas, una marca con un amplio legado en el mundo de las zapatillas y que siempre tiene en cuenta la comodidad y durabilidad de su calzado.', 10, 5, 1, 'Tela'),
(10, 'Zapatillas Urbanas Adi-Ease', 1, 199, 159.2, 'Con los Adidas Adi Ease podrás llevar toda la comodidad en un look muy casual. La suela vulcanizada te ofrece mejor tracción en superficies y en tablas de skate. La cubierta superior de gamuza les da esa ligereza y transpirabilidad necesarias para que los uses todo el día.', 11, 2, 1, '	 Tela'),
(11, 'Zapatillas Urbanas 3MC', 1, 199, 159.2, 'Combinando un diseño optimizado para el skate con un perfil clásico, estas zapatillas se sienten como en casa en la tabla y sin ella. Con un estilo versátil que se acomoda a todos, incorporan gamuza en el antepié y el empeine para una mayor resistencia al desgaste, y una suela Geoflex para una flexibilidad y agarre inigualables. Lucen detalles clásicos inspirados en las Gazelle como los costados blancos con textura, las letras doradas y los icónicos revestimientos.', 10, 2, 1, 'Tela'),
(12, 'Zapatilla Cosmic 2', 1, 249, 199.2, 'Estas zapatillas de running para hombre incorporan un exterior en malla transpirable que mantiene tus pies frescos en la maquina caminadora o en el sendero. Una mediasuela Cloudfoam supersuave proporciona una excelente amortiguación, mientras que la suela durable resiste el uso frecuente.', 8, 2, 1, 'Nailon '),
(13, 'Zapatillas Air Max', 2, 500, 449, 'Todo un icono de las sneakers de los 90 y posiblemente la zapatilla que lo cambió todo. Las Nike Air Max 90 es un modelo que no debe faltar en tu zapatero si de verdad te consideras un loco de las zapatillas casual. La revolucionaria unidad Air-Sole de Nike se abrió camino en el calzado Nike en 1978. En 1987, la Nike Air Max 1 debutó con aire visible en el talón, permitiendo a los fanáticos algo más que la sensación de comodidad de Air-Sole.. Tres años más tarde, la Nike Air Max 90 les permitió ver aún más este sistema, llegando con una ventana lateral de la tecnología Visible Air que era más grande que su predecesora', 11, 2, 2, 'Tela'),
(14, 'Zapatilla Ever Road Dmx', 3, 219, 153.3, 'Comodidad y sujeción para tus caminatas diarias. Esta zapatilla para mujer cuenta con tecnología de aire en movimiento del talón a la punta que proporciona amortiguación en cada paso. La parte superior de malla transpirable proporciona ventilación y cuenta con un sistema de cordones regulable para un ajuste seguro.', 3, 5, 2, 'Tela'),
(15, 'Zapatilla Energy Dynamo', 5, 229, 114.5, 'Estas zapatillas están diseñadas para mejorar la comodidad y estabilidad en cada paso.\r\nAdemás cuentan con cuerpo de malla que brinda máxima ventilación y revestimientos sintéticos que permiten mayor durabilidad.\r\nOfrecen tecnología Ignite para amortiguación de alto rebote y retorno de energía.\r\nEl material EVA permite una amortiguación extra ligera.\r\nAñaden tecnología Soft Foam para mayor comodidad y control de la humedad.', 5, 5, 2, 'Cuero'),
(17, 'Zapatillas Urbanas', 1, 169, 99, 'lorem lorem loremlorem', 9, 2, 1, 'Tela'),
(65, 'Zaptillas Running Air Max Sequ', 2, 500.1, 409.5, 'Las Nike Air Max Sequent 3 son unas zapatillas de running perfectas para las carreras cortas en las que necesitas una gran amortiguación. La parte superior tejida y elástica se mueve con los pies en cada pisada. Con ciertos toques que recuerdan a la Air Max orignal.  Pensada para corredores habitual', 1, 5, 2, 'Tela'),
(74, 'Zapatilla Nike Flex Contact 2', 2, 300, 209.3, 'El calzado de running para hombre Nike Flex Contact 2 brinda una sensación natural y un diseño elegante. En el antepié, la malla es elástica para dejar más espacio para los dedos, y el mediopié cuenta con una malla más ceñida que ofrece sujeción. El patrón gráfico tri-star en la suela funciona con u', 11, 1, 1, 'Tela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE `foto` (
  `ID_FOTO` int(11) NOT NULL,
  `COD_SEA` int(11) NOT NULL,
  `FOTO1` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `FOTO2` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `FOTO3` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `FOTO4` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `foto`
--

INSERT INTO `foto` (`ID_FOTO`, `COD_SEA`, `FOTO1`, `FOTO2`, `FOTO3`, `FOTO4`) VALUES
(1, 1, 'a1.jpg', 'a2.jpg', 'a3.jpg', 'a4.jpg'),
(2, 2, 'b1.jpg', 'b2.jpg', 'b3.jpg', 'b4.jpg'),
(3, 3, 'c1.jpg', 'c2.jpg', 'c3.jpg', 'c4.jpg'),
(4, 4, 'd1.jpg', 'd2.jpg', 'd3.jpg', 'd4.jpg'),
(6, 5, 'e1.jpg', 'e2.jpg', 'e3.jpg', 'e4.jpg'),
(7, 6, 'f1.jpg', 'f2.jpg', 'f3.jpg', 'f4.jpg'),
(8, 7, 'g1.jpg', 'g2.jpg', 'g3.jpg', 'g4.jpg'),
(9, 8, 'h1.jpg', 'h2.jpg', 'h3.jpg', 'h4.jpg'),
(10, 9, 'z1.jpg', 'z2.jpg', 'z3.jpg', 'z4.jpg'),
(11, 10, 'i1.jpg', 'i2.jpg', 'i3.jpg', 'i4.jpg'),
(12, 11, 'j1.jpg', 'j2.jpg', 'j3.jpg', 'j4.jpg'),
(13, 12, 'k1.jpg', 'k2.jpg', 'k3.jpg', 'k4.jpg'),
(14, 13, 'l1.jpg', 'l2.jpg', 'l3.jpg', 'l4.jpg'),
(15, 14, 'm1.jpg', 'm2.jpg', 'm3.jpg', 'm4.jpg'),
(16, 15, 'n1.jpg', 'n2.jpg', 'n3.jpg', 'n4.jpg'),
(18, 17, 'p1.jpg', 'p2.jpg', 'p3.jpg', 'p4.jpg'),
(20, 65, 'r1.jpg', 'r2.jpg', 'r3.jpg', 'r4.jpg'),
(25, 74, 't1.jpg', 't2.jpg', 't3.jpg', 't4.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `ID_GENERO` int(11) NOT NULL,
  `TIPO_GEN` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`ID_GENERO`, `TIPO_GEN`) VALUES
(1, 'Hombre'),
(2, 'Mujer'),
(3, 'Niño'),
(4, 'Niña');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `ID_MARCA` int(11) NOT NULL,
  `NOM_MARCA` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`ID_MARCA`, `NOM_MARCA`) VALUES
(1, 'Adidas'),
(2, 'Nike'),
(3, 'Reebok'),
(5, 'Puma'),
(6, 'Vans');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `ID_ROL` int(11) NOT NULL,
  `NOM_ROL` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_ROL`, `NOM_ROL`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla`
--

CREATE TABLE `talla` (
  `ID_TALLA` int(11) NOT NULL,
  `TALLA` char(4) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `talla`
--

INSERT INTO `talla` (`ID_TALLA`, `TALLA`) VALUES
(1, '19'),
(2, '19.5'),
(3, '20'),
(4, '20.5'),
(5, '21'),
(6, '21.5'),
(7, '22'),
(8, '22.5'),
(9, '23'),
(10, '23.5'),
(11, '24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `ID_TIPO` int(11) NOT NULL,
  `NOM_TIPO` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`ID_TIPO`, `NOM_TIPO`) VALUES
(1, 'Zapatillas'),
(2, 'Zapatillas Urbanas'),
(3, 'Zapato Formal'),
(4, 'Zapato Casual'),
(5, 'Zapatillas Running');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_LOG` int(11) NOT NULL,
  `ID_ROL` int(11) NOT NULL,
  `NOM_USU` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `PASS` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `NOMBRE` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `APELLIDO` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `EMAIL` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `CELULAR` varchar(9) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `DIRRECION` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `FECHA_CREA` date NOT NULL,
  `ESTADO` char(1) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_LOG`, `ID_ROL`, `NOM_USU`, `PASS`, `NOMBRE`, `APELLIDO`, `EMAIL`, `CELULAR`, `DIRRECION`, `FECHA_CREA`, `ESTADO`) VALUES
(1, 1, 'admin', '123', 'Brian Anthony', 'Torres Menacho', 'bryan98tm@gmail.com', '972101160', 'Mz T Lt 1-A', '0000-00-00', 'A'),
(24, 2, 'usu', '123', 'Estefany Reyna', 'Torres Menacho', 'estefany123@gmail.com', '934626785', 'Mz T Lt 1-A', '0000-00-00', 'A'),
(28, 2, 'usu1', '123', 'Nombre Practica', 'Ingresando Usuario', 'usu@gmail.com', '995979223', 'Av.Abancay', '0000-00-00', 'A'),
(29, 1, 'usu2', '123', 'Peluche', 'Zapra', 'zapra@gmail.com', '123456789', 'Av.Mate Pumacahua', '0000-00-00', 'D');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calzado`
--
ALTER TABLE `calzado`
  ADD PRIMARY KEY (`COD_SEA`),
  ADD KEY `ID_GENERO` (`ID_GENERO`),
  ADD KEY `ID_TALLA` (`ID_TALLA`),
  ADD KEY `ID_MARCA` (`ID_MARCA`),
  ADD KEY `ID_TIPO` (`ID_TIPO`);

--
-- Indices de la tabla `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`ID_FOTO`),
  ADD KEY `COD_SEA` (`COD_SEA`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`ID_GENERO`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`ID_MARCA`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID_ROL`);

--
-- Indices de la tabla `talla`
--
ALTER TABLE `talla`
  ADD PRIMARY KEY (`ID_TALLA`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`ID_TIPO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_LOG`),
  ADD KEY `ID_ROL` (`ID_ROL`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calzado`
--
ALTER TABLE `calzado`
  MODIFY `COD_SEA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `foto`
--
ALTER TABLE `foto`
  MODIFY `ID_FOTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `ID_GENERO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `ID_MARCA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `ID_ROL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `talla`
--
ALTER TABLE `talla`
  MODIFY `ID_TALLA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `ID_TIPO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_LOG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calzado`
--
ALTER TABLE `calzado`
  ADD CONSTRAINT `FK_GENERO` FOREIGN KEY (`ID_GENERO`) REFERENCES `genero` (`ID_GENERO`),
  ADD CONSTRAINT `FK_MARCA` FOREIGN KEY (`ID_MARCA`) REFERENCES `marca` (`ID_MARCA`),
  ADD CONSTRAINT `FK_TALLA` FOREIGN KEY (`ID_TALLA`) REFERENCES `talla` (`ID_TALLA`),
  ADD CONSTRAINT `FK_TIPO` FOREIGN KEY (`ID_TIPO`) REFERENCES `tipo` (`ID_TIPO`);

--
-- Filtros para la tabla `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `FK_CALZADO` FOREIGN KEY (`COD_SEA`) REFERENCES `calzado` (`COD_SEA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_ROL` FOREIGN KEY (`ID_ROL`) REFERENCES `rol` (`ID_ROL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
