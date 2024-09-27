-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2024 a las 18:55:04
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
-- Base de datos: `vintagestore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audits`
--

CREATE TABLE `audits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(500) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `audits`
--

INSERT INTO `audits` (`id`, `description`, `reason`, `type`, `users_id`, `created_at`, `updated_at`) VALUES
(1, 'Se desactivó al usuario #1<br> Nombre: Andres Bernal<br> Documento: 516156146', 'Porque ....', 2, 3, '2024-09-20 09:16:26', '2024-09-20 09:16:26'),
(2, 'Se activó al usuario #1<br> Nombre: Andres Benal<br> Documento: 516156146', 'Porque ....', 2, 3, '2024-09-20 09:49:20', '2024-09-20 09:49:20'),
(3, 'Se desactivó al usuario #5<br> Nombre: Luisa Buitrago<br> Documento: 1835467891', 'Porque ....', 2, 3, '2024-09-21 00:50:33', '2024-09-21 00:50:33'),
(4, 'Se desactivó al usuario #8<br> Nombre: Sofia Castro<br> Documento: 654123789', 'Porque ....', 2, 3, '2024-09-21 00:52:52', '2024-09-21 00:52:52'),
(5, 'Se desactivó al usuario #10<br> Nombre: Camila Moreno<br> Documento: 123456321', 'Porque ....', 2, 3, '2024-09-21 00:53:45', '2024-09-21 00:53:45'),
(6, 'Se activó al usuario #6<br> Nombre: Kevin Perez<br> Documento: 1335467891', 'Porque ....', 2, 3, '2024-09-21 00:55:55', '2024-09-21 00:55:55'),
(7, 'Se desactivó al usuario #9<br> Nombre: Andrés Rodríguez<br> Documento: 321654987', 'Porque ....', 2, 3, '2024-09-21 00:56:41', '2024-09-21 00:56:41'),
(8, 'Se desactivó al usuario #7<br> Nombre: Daniel Torres<br> Documento: 852963741', 'Porque ....', 2, 3, '2024-09-21 00:58:14', '2024-09-21 00:58:14'),
(9, 'Se desactivó al usuario #3<br> Nombre: Luna Perez<br> Documento: 1835467893', 'Porque ....', 2, 3, '2024-09-21 00:58:56', '2024-09-21 00:58:56'),
(10, 'Se desactivó al usuario #1<br> Nombre: Andres 1835467893<br> Documento: 516156146', 'Porque ....', 2, 3, '2024-09-21 01:00:27', '2024-09-21 01:00:27'),
(11, '\n        Se actualiza el producto de ID: 1 en los valores:\n        Camiseta Básica Grande = Camiseta Básica Grande\n        Camiseta de algodón de alta calidad. = Camiseta de algodón de alta calidad.\n        /productos.jpeg = /productos.jpeg\n        20 = 20\n        ', '', 1, 3, '2024-09-23 07:47:29', '2024-09-23 07:47:29'),
(12, '\r\n        Se actualiza el producto de ID: 1 en los valores:\r\n        Camiseta Básica Grande = Camiseta Básica Grande\r\n        Camiseta de algodón de alta calidad. = Camiseta de algodón de alta calidad.\r\n        /productos.jpeg = /productos.jpeg\r\n        20 = 20\r\n        ', '', 1, 5, '2024-09-25 01:13:34', '2024-09-25 01:13:34'),
(13, ' Se actualiza el producto ID 1: <br>\n         1. Camiseta Básica Grande = Camiseta Básica Grande <br> 2. Camiseta de algodón de alta calidad. = Camiseta de algodón de alta calidad. <br> 3. /productos.jpeg = /PV2PDbVDGko9b1u6mdlzGeSPPelzIPNitVaU1hOb.jpg <br> 4. 20 = 20 <br> 5. Accesorios = Accesorios <br> 6. XS = XS <br> 7. Blanco = Blanco', '', 1, 8, '2024-09-25 04:03:53', '2024-09-25 04:03:53'),
(14, ' Se actualiza el producto ID 2: <br>\n         1. Pantalones Jeans = Pantalones Jeans <br> 2. Jeans ajustados de mezclilla. = Jeans ajustados de mezclilla. <br> 3. /productos.jpeg = /mdQGu3O7hN3uWoAiiEn1DtepbLTxlrvdLbvsLpxr.jpg <br> 4. 40 = 40 <br> 5. Pantalones = Pantalones <br> 6. S = S <br> 7. Negro = Negro', '', 1, 9, '2024-09-26 07:37:23', '2024-09-26 07:37:23'),
(15, ' Se actualiza el producto ID 3: <br>\n         1. Chaqueta de Cuero = Chaqueta de Cuero <br> 2. Chaqueta de cuero genuino. = Chaqueta de cuero genuino. <br> 3. /productos.jpeg = /52r2jSOOhVLFtAAdx0c4OjNWdG80oKMgiN2moxWd.jpg <br> 4. 80 = 80 <br> 5. Accesorios = Accesorios <br> 6. M = M <br> 7. Azul = Azul', '', 1, 9, '2024-09-26 07:38:38', '2024-09-26 07:38:38'),
(16, ' Se actualiza el producto ID 4: <br>\n         1. Zapatos Deportivos = Zapatos Deportivos <br> 2. Zapatos deportivos para correr. = Zapatos deportivos para correr. <br> 3. /productos.jpeg = /W2eSSx38e6TcCpdReImavu47eKIkbgxqEqjaEurK.jpg <br> 4. 60 = 60 <br> 5. Chaquetas = Zapatos <br> 6. L = L <br> 7. Rojo = Rojo', '', 1, 9, '2024-09-26 07:39:38', '2024-09-26 07:39:38'),
(17, ' Se actualiza el producto ID 5: <br>\n         1. Sudadera con Capucha = Sudadera con Capucha <br> 2. Sudadera cómoda con capucha. = Sudadera cómoda con capucha. <br> 3. /productos.jpeg = /p1Cw7hLiX6hsm7rFbtdw0BUfWf1M02JTmxQTFCTt.jpg <br> 4. 35 = 35 <br> 5. Bolsos = Ropa <br> 6. XL = XL <br> 7. Amarillo = Amarillo', '', 1, 9, '2024-09-26 07:40:58', '2024-09-26 07:40:58'),
(18, ' Se actualiza el producto ID 6: <br>\n         1. Camisa de Vestir = Camisa de Vestir <br> 2. Camisa formal para ocasiones especiales. = Camisa formal para ocasiones especiales. <br> 3. /productos.jpeg = /iABsj95jodoY5wPwYWJYk0sLvtV3OFfI6Cg37Jw0.jpg <br> 4. 45 = 45 <br> 5. Ropa = Ropa <br> 6. XXL = XXL <br> 7. Verde = Verde', '', 1, 9, '2024-09-26 07:41:33', '2024-09-26 07:41:33'),
(19, ' Se actualiza el producto ID 7: <br>\n         1. Pantalones Cortos = Pantalones Cortos <br> 2. Pantalones cortos ideales para verano. = Pantalones cortos ideales para verano. <br> 3. /productos.jpeg = /Pfw8VSzRaVq7CCqpyiMGkvLKqA5CmzGdplOCyMmv.jpg <br> 4. 25 = 25 <br> 5. Pantalones = Pantalones <br> 6. XS = XS <br> 7. Blanco = Blanco', '', 1, 9, '2024-09-26 07:42:24', '2024-09-26 07:42:24'),
(20, ' Se actualiza el producto ID 4: <br>\n         1. Zapatos Deportivos = Zapatos Deportivos <br> 2. Zapatos deportivos para correr. = Zapatos deportivos para correr. <br> 3. /W2eSSx38e6TcCpdReImavu47eKIkbgxqEqjaEurK.jpg = /W2eSSx38e6TcCpdReImavu47eKIkbgxqEqjaEurK.jpg <br> 4. 60 = 60 <br> 5. Zapatos = Pantalones <br> 6. L = L <br> 7. Rojo = Rojo', '', 1, 9, '2024-09-26 07:42:36', '2024-09-26 07:42:36'),
(21, ' Se actualiza el producto ID 3: <br>\n         1. Chaqueta de Cuero = Chaqueta de Cuero <br> 2. Chaqueta de cuero genuino. = Chaqueta de cuero genuino. <br> 3. /52r2jSOOhVLFtAAdx0c4OjNWdG80oKMgiN2moxWd.jpg = /52r2jSOOhVLFtAAdx0c4OjNWdG80oKMgiN2moxWd.jpg <br> 4. 80 = 80 <br> 5. Accesorios = Accesorios <br> 6. M = M <br> 7. Azul = Rosa', '', 1, 9, '2024-09-26 07:42:51', '2024-09-26 07:42:51'),
(22, ' Se actualiza el producto ID 8: <br>\n         1. Chaqueta de Abrigo = Chaqueta de Abrigo <br> 2. Abrigo de lana para el invierno. = Abrigo de lana para el invierno. <br> 3. /productos.jpeg = /39eqDjZjymK0JYIHVrrNOLlaX7l6Up9ygZMVfOM7.jpg <br> 4. 100 = 100 <br> 5. Accesorios = Accesorios <br> 6. S = S <br> 7. Negro = Negro', '', 1, 9, '2024-09-26 07:43:38', '2024-09-26 07:43:38'),
(23, ' Se actualiza el producto ID 9: <br>\n         1. Botas de Cuero = Botas de Cuero <br> 2. Botas de cuero para climas fríos. = Botas de cuero para climas fríos. <br> 3. /productos.jpeg = /XabziVHugndIdzK9bOVMhS7536z3npPQtqDiEpSe.jpg <br> 4. 70 = 70 <br> 5. Chaquetas = Chaquetas <br> 6. M = M <br> 7. Azul = Azul', '', 1, 9, '2024-09-26 07:44:47', '2024-09-26 07:44:47'),
(24, ' Se actualiza el producto ID 10: <br>\n         1. Camisa Casual = Camisa Casual <br> 2. Camisa ligera y casual. = Camisa ligera y casual. <br> 3. /productos.jpeg = /EvBe1jEFwugU1WNRpyB5VIlVP1Qy4h36oGh7CsEE.jpg <br> 4. 30 = 30 <br> 5. Bolsos = Bolsos <br> 6. L = L <br> 7. Rojo = Rojo', '', 1, 9, '2024-09-26 07:45:47', '2024-09-26 07:45:47'),
(25, ' Se actualiza el producto ID 11: <br>\n         1. Abrigo de Lluvia = Abrigo de Lluvia <br> 2. Abrigo impermeable para días lluviosos. = Abrigo impermeable para días lluviosos. <br> 3. /productos.jpeg = /pGHo5rf5qxhMwJFUFksBSudLMyZp2mN5B88dudJl.jpg <br> 4. 55 = 55 <br> 5. Ropa = Ropa <br> 6. XL = XL <br> 7. Amarillo = Amarillo', '', 1, 9, '2024-09-26 07:46:36', '2024-09-26 07:46:36'),
(26, ' Se actualiza el producto ID 12: <br>\n         1. Bufanda de Lana = Bufanda de Lana <br> 2. Bufanda suave de lana. = Bufanda suave de lana. <br> 3. /productos.jpeg = /WSJs1xxSYWpcGJA8OysAXT7fg0ysB1LOgm24BHs1.jpg <br> 4. 15 = 15 <br> 5. Pantalones = Pantalones <br> 6. XXL = XXL <br> 7. Verde = Verde', '', 1, 9, '2024-09-26 07:51:35', '2024-09-26 07:51:35'),
(27, ' Se actualiza el producto ID 13: <br>\n         1. Guantes de Cuero = Guantes de Cuero <br> 2. Guantes de cuero para el frío. = Guantes de cuero para el frío. <br> 3. /productos.jpeg = /yqVX3Ti1c6K1oKkOA2yGffrA3czkj6tOa749piBK.jpg <br> 4. 20 = 20 <br> 5. Accesorios = Accesorios <br> 6. XS = XS <br> 7. Blanco = Blanco', '', 1, 9, '2024-09-26 07:52:31', '2024-09-26 07:52:31'),
(28, ' Se actualiza el producto ID 14: <br>\n         1. Cinturón de Cuero = Cinturón de Cuero <br> 2. Cinturón elegante de cuero. = Cinturón elegante de cuero. <br> 3. /productos.jpeg = /UbhoSrKq9RZLj61pDLIGWSNWnGZUK67RzDhuYArK.jpg <br> 4. 25 = 25 <br> 5. Chaquetas = Chaquetas <br> 6. S = S <br> 7. Negro = Negro', '', 1, 9, '2024-09-26 07:53:06', '2024-09-26 07:53:06'),
(29, ' Se actualiza el producto ID 15: <br>\n         1. Sombrero de Sol = Sombrero de Sol <br> 2. Sombrero ligero para protección solar. = Sombrero ligero para protección solar. <br> 3. /productos.jpeg = /lFty7u3ZCmalNlKtpsCrPRqxUSxwKvEQlwQk0cRH.jpg <br> 4. 18 = 18 <br> 5. Bolsos = Bolsos <br> 6. M = M <br> 7. Azul = Azul', '', 1, 9, '2024-09-26 07:53:50', '2024-09-26 07:53:50'),
(30, ' Se actualiza el producto ID 1: <br>\n         1. Camiseta Básica Grande = Camiseta Básica Grande <br> 2. Camiseta de algodón de alta calidad. = Camiseta de algodón de alta calidad. <br> 3. /PV2PDbVDGko9b1u6mdlzGeSPPelzIPNitVaU1hOb.jpg = /6gqdGJrfuE5hIlY7XzVVKrfofP5Xha4JCwOVOwVP.jpg <br> 4. 20 = 20 <br> 5. Accesorios = Accesorios <br> 6. XS = XS <br> 7. Blanco = Blanco', '', 1, 9, '2024-09-26 07:54:41', '2024-09-26 07:54:41'),
(31, ' Se actualiza el producto ID 14: <br>\n         1. Cinturón de Cuero = Cinturón de Cuero <br> 2. Cinturón elegante de cuero. = Cinturón elegante de cuero. <br> 3. /UbhoSrKq9RZLj61pDLIGWSNWnGZUK67RzDhuYArK.jpg = /sV4Z63pNuqIlZZDpcyg7zwIOm0LtnnBGxagfP4tK.jpg <br> 4. 25 = 25 <br> 5. Chaquetas = Chaquetas <br> 6. S = S <br> 7. Negro = Negro', '', 1, 9, '2024-09-26 07:57:41', '2024-09-26 07:57:41'),
(32, ' Se actualiza el producto ID 16: <br>\n         1. Pantalones de Chándal = Pantalones de Chándal <br> 2. Pantalones deportivos cómodos. = Pantalones deportivos cómodos. <br> 3. /productos.jpeg = /7aiwHB4Ofiju2B69NaVxcFA0ziMQb7EJthnSrZov.jpg <br> 4. 30 = 30 <br> 5. Ropa = Ropa <br> 6. L = L <br> 7. Rojo = Rojo', '', 1, 9, '2024-09-26 07:58:49', '2024-09-26 07:58:49'),
(33, ' Se actualiza el producto ID 17: <br>\n         1. Chaqueta Impermeable = Chaqueta grande <br> 2. Chaqueta ligera y resistente al agua. = Chaqueta ligera y resistente al agua. <br> 3. /productos.jpeg = /TIBwmZTGVQpHgFCCtDKn50xgoyUusIGdRCSuMyYs.jpg <br> 4. 65 = 65 <br> 5. Pantalones = Pantalones <br> 6. XL = XL <br> 7. Amarillo = Rojo', '', 1, 9, '2024-09-26 07:59:58', '2024-09-26 07:59:58'),
(34, ' Se actualiza el producto ID 18: <br>\n         1. Zapatos de Oficina = Zapatos de Oficina <br> 2. Zapatos formales para oficina. = Zapatos formales para oficina. <br> 3. /productos.jpeg = /JOssiaA57va9k4f2LrYopXbZZMtFKrV1QpQvUtjL.jpg <br> 4. 55 = 55 <br> 5. Accesorios = Accesorios <br> 6. XXL = XXL <br> 7. Verde = Verde', '', 1, 9, '2024-09-26 08:00:49', '2024-09-26 08:00:49'),
(35, ' Se actualiza el producto ID 19: <br>\n         1. Camiseta de Manga Larga = Camiseta de Manga Larga <br> 2. Camiseta con manga larga de algodón. = Camiseta con manga larga de algodón. <br> 3. /productos.jpeg = /GPtSVV8889WLyOb01fMmxXisFx3iXXM1tORZBBdu.jpg <br> 4. 22 = 22 <br> 5. Chaquetas = Chaquetas <br> 6. XS = XS <br> 7. Blanco = Blanco', '', 1, 9, '2024-09-26 08:02:04', '2024-09-26 08:02:04'),
(36, ' Se actualiza el producto ID 20: <br>\n         1. Pantalones de Traje = Pantalones de Traje <br> 2. Pantalones elegantes para traje. = Pantalones elegantes para traje. <br> 3. /productos.jpeg = /5PfXHnxvCWI42iIsZWMl7AvP63d3yHTZU1WO5T8k.jpg <br> 4. 50 = 50 <br> 5. Bolsos = Bolsos <br> 6. S = S <br> 7. Negro = Negro', '', 1, 9, '2024-09-26 08:03:41', '2024-09-26 08:03:41'),
(37, ' Se actualiza el producto ID 21: <br>\n         1. Chaqueta de Plumas = Chaqueta de Plumas <br> 2. Chaqueta abrigadora con relleno de plumas. = Chaqueta abrigadora con relleno de plumas. <br> 3. /productos.jpeg = /jc223AqWlMLCaFfJtqKQHaWfIR2YDPYOgxNSwFmL.jpg <br> 4. 90 = 90 <br> 5. Ropa = Ropa <br> 6. M = M <br> 7. Azul = Azul', '', 1, 9, '2024-09-26 08:04:26', '2024-09-26 08:04:26'),
(38, ' Se actualiza el producto ID 22: <br>\n         1. Botines de Ante = Botines de Ante <br> 2. Botines elegantes de ante. = Botines elegantes de ante. <br> 3. /productos.jpeg = /lqYNTGSYvU2AYvFI97103IBAE1Eqp7t5rnr6KV3f.jpg <br> 4. 75 = 75 <br> 5. Pantalones = Pantalones <br> 6. L = L <br> 7. Rojo = Rojo', '', 1, 9, '2024-09-26 08:05:12', '2024-09-26 08:05:12'),
(39, ' Se actualiza el producto ID 23: <br>\n         1. Camisa de Manga Corta = Camisa de Manga Corta <br> 2. Camisa ligera para climas cálidos. = Camisa ligera para climas cálidos. <br> 3. /productos.jpeg = /y2QlWWMg4lhy00oCJyEbOkZlDXUSVjjdZuYbIB7B.jpg <br> 4. 28 = 28 <br> 5. Accesorios = Accesorios <br> 6. XL = XL <br> 7. Amarillo = Amarillo', '', 1, 9, '2024-09-26 08:06:50', '2024-09-26 08:06:50'),
(40, ' Se actualiza el producto ID 24: <br>\n         1. Pantalones Cargo = Pantalones Cargo <br> 2. Pantalones con múltiples bolsillos. = Pantalones con múltiples bolsillos. <br> 3. /productos.jpeg = /vqK7iwhdUlSHo7avK0S0H8acLfU08grscxGpqqOe.jpg <br> 4. 35 = 35 <br> 5. Chaquetas = Chaquetas <br> 6. XXL = XXL <br> 7. Verde = Verde', '', 1, 9, '2024-09-26 08:07:25', '2024-09-26 08:07:25'),
(41, ' Se actualiza el producto ID 25: <br>\n         1. Chaqueta de Denim = Chaqueta de Denim <br> 2. Chaqueta de mezclilla clásica. = Chaqueta de mezclilla clásica. <br> 3. /productos.jpeg = /m1YiqQuqSnOPmjIAcmuFTRZrM9sieSkGuFUIda44.jpg <br> 4. 50 = 50 <br> 5. Bolsos = Bolsos <br> 6. XS = XS <br> 7. Blanco = Blanco', '', 1, 9, '2024-09-26 08:08:30', '2024-09-26 08:08:30'),
(42, ' Se actualiza el producto ID 26: <br>\n         1. Suéter de Lana = Suéter de Lana <br> 2. Suéter cálido y suave de lana. = Suéter cálido y suave de lana. <br> 3. /productos.jpeg = /PSVXOUD3dQWfaIgXMByETiwQPCYTTiw6wFFoxjAO.jpg <br> 4. 40 = 40 <br> 5. Ropa = Ropa <br> 6. S = S <br> 7. Negro = Negro', '', 1, 9, '2024-09-26 08:09:24', '2024-09-26 08:09:24'),
(43, ' Se actualiza el producto ID 27: <br>\n         1. Gorro de Lana = Gorro de Lana <br> 2. Gorro abrigador de lana. = Gorro abrigador de lana. <br> 3. /productos.jpeg = /yC9gxb44Q1bZ5vQu5MWHtPkh8ceMX1A3HL3lccow.jpg <br> 4. 12 = 12 <br> 5. Pantalones = Pantalones <br> 6. M = Única <br> 7. Azul = Azul', '', 1, 9, '2024-09-26 08:14:40', '2024-09-26 08:14:40'),
(44, ' Se actualiza el producto ID 28: <br>\n         1. Bufanda de Seda = Bufanda de Seda <br> 2. Bufanda elegante de seda. = Bufanda elegante de seda. <br> 3. /productos.jpeg = /mCuRrCLgsR9ejdogxr74Zh4MFgzYVPr7JfqEKd6W.jpg <br> 4. 22 = 22 <br> 5. Accesorios = Accesorios <br> 6. L = L <br> 7. Rojo = Rosa', '', 1, 9, '2024-09-26 08:15:16', '2024-09-26 08:15:16'),
(45, ' Se actualiza el producto ID 29: <br>\n         1. Cinturón Deportivo = Cinturón elegante cafe <br> 2. Cinturón ajustable para deportes. = Cinturón ajustable para deportes. <br> 3. /productos.jpeg = /productos.jpeg <br> 4. 18 = 18 <br> 5. Chaquetas = Chaquetas <br> 6. XL = XL <br> 7. Amarillo = Marrón', '', 1, 9, '2024-09-26 08:17:06', '2024-09-26 08:17:06'),
(46, ' Se actualiza el producto ID 29: <br>\n         1. Cinturón elegante cafe = Cinturón elegante cafe <br> 2. Cinturón ajustable para deportes. = Cinturón ajustable para deportes. <br> 3. /productos.jpeg = /On0zkFcd1c84h3cbFQoZA3KZWj9iwpVI7c0ytVwW.jpg <br> 4. 18 = 18 <br> 5. Chaquetas = Chaquetas <br> 6. XL = XL <br> 7. Marrón = Marrón', '', 1, 9, '2024-09-26 08:17:23', '2024-09-26 08:17:23'),
(47, ' Se actualiza el producto ID 30: <br>\n         1. Sombrero de Invierno = Sombrero de Invierno <br> 2. Sombrero cálido para invierno. = Sombrero cálido para invierno. <br> 3. /productos.jpeg = /8no7FWYMfr3WTgzE6Eovaav3FZPM1p9qv7yXQXGw.jpg <br> 4. 20 = 20 <br> 5. Bolsos = Bolsos <br> 6. XXL = XXL <br> 7. Verde = Negro', '', 1, 9, '2024-09-26 08:18:08', '2024-09-26 08:18:08'),
(48, ' Se actualiza el producto ID 31: <br>\n         1. Pantalones de Yoga = Pantalones de Yoga <br> 2. Pantalones flexibles para yoga. = Pantalones flexibles para yoga. <br> 3. /productos.jpeg = /wDonLVYMYKtwoIrSYasZN0KyuVc4Jg5j35uga2Dm.jpg <br> 4. 25 = 25 <br> 5. Ropa = Ropa <br> 6. XS = XS <br> 7. Blanco = Gris', '', 1, 9, '2024-09-26 08:20:08', '2024-09-26 08:20:08'),
(49, ' Se actualiza el producto ID 32: <br>\n         1. Chaqueta de Moda = Chaqueta de Moda <br> 2. Chaqueta moderna para ocasiones especiales. = Chaqueta moderna para ocasiones especiales. <br> 3. /productos.jpeg = /NPyevV06TGJfZuDwnjhCmkyD1L8LncWEyVZZwYYH.jpg <br> 4. 60 = 60 <br> 5. Pantalones = Pantalones <br> 6. S = S <br> 7. Negro = Negro', '', 1, 9, '2024-09-26 08:21:15', '2024-09-26 08:21:15'),
(50, ' Se actualiza el producto ID 33: <br>\n         1. Zapatos de Cuero = Zapatos de Cuero <br> 2. Zapatos elegantes de cuero. = Zapatos elegantes de cuero. <br> 3. /productos.jpeg = /PVs246a0En2RFpwbDUHfjkdN7oDMaQZYdCGek5Su.jpg <br> 4. 70 = 70 <br> 5. Accesorios = Accesorios <br> 6. M = M <br> 7. Azul = Marrón', '', 1, 9, '2024-09-26 08:22:07', '2024-09-26 08:22:07'),
(51, ' Se actualiza el producto ID 34: <br>\n         1. Camiseta Deportiva = Camiseta Deportiva <br> 2. Camiseta para actividades deportivas. = Camiseta para actividades deportivas. <br> 3. /productos.jpeg = /8TyL9iwWR5vyfhnS6GZDu4kN9MOuYgbqV3btkymO.jpg <br> 4. 20 = 20 <br> 5. Chaquetas = Chaquetas <br> 6. L = L <br> 7. Rojo = Rojo', '', 1, 9, '2024-09-26 08:23:02', '2024-09-26 08:23:02'),
(52, ' Se actualiza el producto ID 35: <br>\n         1. Pantalones de Tren = Pantalones de Tren <br> 2. Pantalones cómodos para viaje. = Pantalones cómodos para viaje. <br> 3. /productos.jpeg = /PCTh3rRZHMh8RdZ71vmP2W4D3PWLctlgMTl5uHRQ.jpg <br> 4. 40 = 40 <br> 5. Bolsos = Bolsos <br> 6. XL = XL <br> 7. Amarillo = Negro', '', 1, 9, '2024-09-26 08:23:47', '2024-09-26 08:23:47'),
(53, ' Se actualiza el producto ID 36: <br>\n         1. Chaqueta de Lino = Chaqueta de Lino <br> 2. Chaqueta ligera de lino. = Chaqueta ligera de lino. <br> 3. /productos.jpeg = /UrI0xRRxD11UsswU5ngoDGbCNgsRE9IkTqdr4G8y.jpg <br> 4. 55 = 55 <br> 5. Ropa = Ropa <br> 6. XXL = XXL <br> 7. Verde = Rosa', '', 1, 9, '2024-09-26 08:24:15', '2024-09-26 08:24:15'),
(54, ' Se actualiza el producto ID 37: <br>\n         1. Botas de Trabajo = Botas de Trabajo <br> 2. Botas resistentes para trabajo. = Botas resistentes para trabajo. <br> 3. /productos.jpeg = /WBs5Hgy7dAUAltinzXtcAE1xZSi5n9YrawWcQwPf.jpg <br> 4. 80 = 80 <br> 5. Pantalones = Pantalones <br> 6. XS = XS <br> 7. Blanco = Verde', '', 1, 9, '2024-09-26 08:25:12', '2024-09-26 08:25:12'),
(55, ' Se actualiza el producto ID 38: <br>\n         1. Camisa de Raya = Camisa de Raya <br> 2. Camisa con rayas elegantes. = Camisa con rayas elegantes. <br> 3. /productos.jpeg = /jrYs9Yp3eLJNPXx91Oldi5DOcJDjD5wpFdW0ctH5.jpg <br> 4. 30 = 30 <br> 5. Accesorios = Accesorios <br> 6. S = S <br> 7. Negro = Azul', '', 1, 9, '2024-09-26 08:26:38', '2024-09-26 08:26:38'),
(56, ' Se actualiza el producto ID 39: <br>\n         1. Pantalones de Cuero = Pantalones de Cuero <br> 2. Pantalones ajustados de cuero. = Pantalones ajustados de cuero. <br> 3. /productos.jpeg = /wKjh9zzWzvqvne1RpAXDuAzUFRfKye62fL8yjqqf.jpg <br> 4. 60 = 60 <br> 5. Chaquetas = Chaquetas <br> 6. M = M <br> 7. Azul = Marrón', '', 1, 9, '2024-09-26 08:27:29', '2024-09-26 08:27:29'),
(57, ' Se actualiza el producto ID 40: <br>\n         1. Chaqueta de Punto = Chaqueta de Puntos <br> 2. Chaqueta tejida a mano. = Chaqueta tejida a mano. <br> 3. /productos.jpeg = /YjGVvA3WpWedEOPFGCF9eRuArW6nnp2zdiG8D3My.jpg <br> 4. 45 = 45 <br> 5. Bolsos = Bolsos <br> 6. L = L <br> 7. Rojo = Blanco', '', 1, 9, '2024-09-26 08:28:10', '2024-09-26 08:28:10'),
(58, ' Se actualiza el producto ID 41: <br>\n         1. Suéter de Algodón = Suéter de Algodón <br> 2. Suéter suave de algodón. = Suéter suave de algodón. <br> 3. /productos.jpeg = /QcvjJ53m8twoqg1VUJY4e5rWRy3EU73p87gsxceR.jpg <br> 4. 35 = 35 <br> 5. Ropa = Ropa <br> 6. XL = XL <br> 7. Amarillo = Amarillo', '', 1, 9, '2024-09-26 08:28:40', '2024-09-26 08:28:40'),
(59, ' Se actualiza el producto ID 42: <br>\n         1. Gorro de Verano = Gorro de Verano <br> 2. Gorro ligero para verano. = Gorro ligero para verano. <br> 3. /productos.jpeg = /LrU7SQqJFbpxsuiWpSJVCE1jaSv7YmX6DITgX3Qz.jpg <br> 4. 15 = 15 <br> 5. Pantalones = Pantalones <br> 6. XXL = XXL <br> 7. Verde = Verde', '', 1, 9, '2024-09-26 08:29:05', '2024-09-26 08:29:05'),
(60, ' Se actualiza el producto ID 43: <br>\n         1. Bufanda de Lino = Bufanda de Lino <br> 2. Bufanda ligera de lino. = Bufanda ligera de lino. <br> 3. /productos.jpeg = /voZdu2csBwPNUmiM4fuFSopuIOXug0gyxLOHCnSD.jpg <br> 4. 25 = 25 <br> 5. Accesorios = Accesorios <br> 6. XS = XS <br> 7. Blanco = Azul', '', 1, 9, '2024-09-26 08:29:33', '2024-09-26 08:29:33'),
(61, ' Se actualiza el producto ID 44: <br>\n         1. Cinturón Elegante = Cinturón Elegante <br> 2. Cinturón de cuero con hebilla decorativa. = Cinturón de cuero con hebilla decorativa. <br> 3. /productos.jpeg = /IyGleIAu0rW6w5iDt4QeEWKaDhiz09jd7mAtDjn4.jpg <br> 4. 30 = 30 <br> 5. Chaquetas = Chaquetas <br> 6. S = S <br> 7. Negro = Negro', '', 1, 9, '2024-09-26 08:30:51', '2024-09-26 08:30:51'),
(62, ' Se actualiza el producto ID 45: <br>\n         1. Sombrero de Gala = Sombrero de Gala <br> 2. Sombrero formal para eventos. = Sombrero formal para eventos. <br> 3. /productos.jpeg = /Gg9v0Ue5riEJ22tXyH1aRmLKJp5KMjbDNUL52IeF.jpg <br> 4. 35 = 35 <br> 5. Bolsos = Bolsos <br> 6. M = M <br> 7. Azul = Rojo', '', 1, 9, '2024-09-26 08:31:23', '2024-09-26 08:31:23'),
(63, ' Se actualiza el producto ID 46: <br>\n         1. Pantalones de Nieve = Pantalones de Nieve <br> 2. Pantalones impermeables para nieve. = Pantalones impermeables para nieve. <br> 3. /productos.jpeg = /cpT0r34IN40F0HAggwG8rrP5u8aZ10gCG8bDouhh.jpg <br> 4. 50 = 50 <br> 5. Ropa = Ropa <br> 6. L = L <br> 7. Rojo = Azul', '', 1, 9, '2024-09-26 08:33:19', '2024-09-26 08:33:19'),
(64, ' Se actualiza el producto ID 47: <br>\n         1. Chaqueta de Piel Sintética = Chaqueta de Piel Sintética <br> 2. Chaqueta moderna de piel sintética. = Chaqueta moderna de piel sintética. <br> 3. /productos.jpeg = /814QdVcbo6Qyd8RaSRHC8VgpsLvHiSREijf6PLjU.jpg <br> 4. 65 = 65 <br> 5. Pantalones = Pantalones <br> 6. XL = XL <br> 7. Amarillo = Amarillo', '', 1, 9, '2024-09-26 08:35:33', '2024-09-26 08:35:33'),
(65, ' Se actualiza el producto ID 47: <br>\n         1. Chaqueta de Piel Sintética = Chaqueta de Piel Sintética <br> 2. Chaqueta moderna de piel sintética. = Chaqueta moderna de piel sintética. <br> 3. /814QdVcbo6Qyd8RaSRHC8VgpsLvHiSREijf6PLjU.jpg = /814QdVcbo6Qyd8RaSRHC8VgpsLvHiSREijf6PLjU.jpg <br> 4. 65 = 65 <br> 5. Pantalones = Pantalones <br> 6. XL = XL <br> 7. Amarillo = Marrón', '', 1, 9, '2024-09-26 08:35:43', '2024-09-26 08:35:43'),
(66, ' Se actualiza el producto ID 48: <br>\n         1. Zapatos de Charol = Zapatos de Charol <br> 2. Zapatos elegantes de charol. = Zapatos elegantes de charol. <br> 3. /productos.jpeg = /C5vwoHqQ1kFUHdzi3D4Do2N76Vp72Vaxxz4n6Fhf.jpg <br> 4. 75 = 75 <br> 5. Accesorios = Accesorios <br> 6. XXL = XXL <br> 7. Verde = Negro', '', 1, 9, '2024-09-26 08:36:29', '2024-09-26 08:36:29'),
(67, ' Se actualiza el producto ID 49: <br>\n         1. Camiseta de Manga Larga Deportiva = Camiseta de Manga Larga Deportiva <br> 2. Camiseta para deportes con manga larga. = Camiseta para deportes con manga larga. <br> 3. /productos.jpeg = /So0iwrNRj92hKx8Ufxba6PznYT38ZVU4WY13Orr7.jpg <br> 4. 25 = 25 <br> 5. Chaquetas = Chaquetas <br> 6. XS = XS <br> 7. Blanco = Negro', '', 1, 9, '2024-09-26 08:38:11', '2024-09-26 08:38:11'),
(68, ' Se actualiza el producto ID 50: <br>\n         1. Pantalones de Linterna = Pantalones de Linterna <br> 2. Pantalones cómodos con ajuste en el tobillo. = Pantalones cómodos con ajuste en el tobillo. <br> 3. /productos.jpeg = /5zvGSKHH69gYegLLq7OoJTEGER6dRjgj0EX7eqJe.jpg <br> 4. 35 = 35 <br> 5. Bolsos = Bolsos <br> 6. S = S <br> 7. Negro = Verde', '', 1, 9, '2024-09-26 08:38:48', '2024-09-26 08:38:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('1014658714|127.0.0.1', 'i:2;', 1726582137),
('1014658714|127.0.0.1:timer', 'i:1726582137;', 1726582137);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Ropa'),
(2, 'Pantalones'),
(3, 'Accesorios'),
(4, 'Chaquetas'),
(5, 'Bolsos'),
(6, 'Sombreros'),
(7, 'Vestidos'),
(8, 'Zapatos'),
(9, 'Complementos'),
(10, 'Relojes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(95) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `colors`
--

INSERT INTO `colors` (`id`, `name`) VALUES
(1, 'Blanco'),
(2, 'Negro'),
(3, 'Azul'),
(4, 'Rojo'),
(5, 'Amarillo'),
(6, 'Verde'),
(7, 'Gris'),
(8, 'Marrón'),
(9, 'Rosa'),
(10, 'Morado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `document` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `name`, `lastName`, `document`, `address`, `email`, `password`, `status`) VALUES
(1, 'Andres', 'Bernal', 516156146, 'Medellin', 'andres@gmail.com', '123454549328*', 0),
(2, 'Laura ', 'Bustos ', 2147483647, 'Bogota', 'lvalenlu02@gmail.com', '12345678*', 1),
(3, 'Luna ', 'Perez', 1835467893, 'Bogota', 'vale@gmail.com', 'nuevaaaaa123', 2),
(4, 'Ana ', 'Herrera', 535467891, 'Tolima', 'ana@gmail.com', '55121654566*', 1),
(5, 'Luisa ', 'Buitrago', 1835467891, 'Cali', 'lu@gmail.com', 'nuevaaa123*', 0),
(6, 'Kevin', 'Perez', 1335467891, 'Medellin', 'kevin@gmail.com', '456923u37131*', 1),
(7, 'Daniel', 'Torres', 852963741, 'Pereira', 'daniel.torres@example.com', 'password321', 1),
(8, 'Sofia', 'Castro', 654123789, 'Manizales', 'sofia.castro@example.com', 'pass654', 0),
(9, 'Andrés', 'Rodríguez', 321654987, 'Bucaramanga', 'andres.rodriguez@example.com', 'password963', 0),
(10, 'Camila', 'Moreno', 123456321, 'Popayán', 'camila.moreno@example.com', 'password1234', 2),
(11, 'Julian', 'Rojas', 456123789, 'Valledupar', 'julian.rojas@example.com', 'pass321', 1),
(12, 'Paula', 'Gil', 951357753, 'Pasto', 'paula.gil@example.com', 'password231', 2),
(13, 'Luis', 'Pineda', 159753456, 'Villavicencio', 'luis.pineda@example.com', 'pass555', 1),
(14, 'Sandra', 'Mendoza', 753951852, 'Tunja', 'sandra.mendoza@example.com', 'password852', 1),
(15, 'Jorge', 'Velasco', 123852951, 'Neiva', 'jorge.velasco@example.com', 'pass159', 2),
(16, 'Luisa', 'García', 357951258, 'Santa Marta', 'luisa.garcia@example.com', 'password753', 1),
(17, 'Santiago', 'Zapata', 258147369, 'Armenia', 'santiago.zapata@example.com', 'pass4567', 2),
(18, 'Monica', 'Cabrera', 789654123, 'Ibagué', 'monica.cabrera@example.com', 'password8523', 1),
(19, 'Diana', 'Salazar', 159357258, 'Riohacha', 'diana.salazar@example.com', 'pass12345', 1),
(20, 'Felipe', 'Mejía', 654789321, 'San Andrés', 'felipe.mejia@example.com', 'password654', 2),
(21, 'Angela', 'Ortiz', 951456753, 'Montería', 'angela.ortiz@example.com', 'pass951', 1),
(22, 'Victor', 'Cruz', 852741369, 'Cali', 'victor.cruz@example.com', 'password258', 1),
(23, 'Marcela', 'Linares', 357258147, 'Medellín', 'marcela.linares@example.com', 'pass147', 2),
(24, 'Sebastian', 'Gómez', 963258741, 'Bogotá', 'sebastian.gomez@example.com', 'password963', 1),
(25, 'Elena', 'Carrillo', 159147258, 'Bucaramanga', 'elena.carrillo@example.com', 'pass963', 2),
(26, 'Roberto', 'Fernández', 741852963, 'Pereira', 'roberto.fernandez@example.com', 'password741', 1),
(27, 'Lucia', 'Álvarez', 951852753, 'Cartagena', 'lucia.alvarez@example.com', 'pass852', 2),
(28, 'Miguel', 'Suárez', 456951753, 'Popayán', 'miguel.suarez@example.com', 'password951', 1),
(29, 'Carolina', 'Ramírez', 258963147, 'Neiva', 'carolina.ramirez@example.com', 'pass1234', 2),
(30, 'Javier', 'Quintero', 369852147, 'Tunja', 'javier.quintero@example.com', 'password12345', 1),
(31, 'Gabriela', 'Rico', 654258147, 'Cali', 'gabriela.rico@example.com', 'pass258', 2),
(32, 'Alejandro', 'Mora', 147369852, 'Valledupar', 'alejandro.mora@example.com', 'password147', 2),
(33, 'Beatriz', 'Escobar', 789123654, 'Barranquilla', 'beatriz.escobar@example.com', 'pass9637', 1),
(34, 'Oscar', 'López', 357951456, 'Bogotá', 'oscar.lopez@example.com', 'password357', 2),
(35, 'Cristina', 'Muñoz', 963147852, 'Manizales', 'cristina.munoz@example.com', 'pass1479', 1),
(36, 'Francisco', 'Valencia', 852741963, 'Cúcuta', 'francisco.valencia@example.com', 'password8527', 2),
(37, 'Valeria', 'Jaramillo', 741963258, 'Santa Marta', 'valeria.jaramillo@example.com', 'pass2583', 1),
(38, 'Pablo', 'Santos', 963258147, 'Armenia', 'pablo.santos@example.com', 'password9638', 2),
(39, 'Gloria', 'Castillo', 456987321, 'Medellín', 'gloria.castillo@example.com', 'pass4569', 1),
(40, 'Fernando', 'Hernández', 123789456, 'Cartagena', 'fernando.hernandez@example.com', 'password1237', 2),
(41, 'Liliana', 'Ortega', 987456321, 'Barranquilla', 'liliana.ortega@example.com', 'pass9874', 1),
(42, 'Ricardo', 'Mendoza', 753951456, 'Bogotá', 'ricardo.mendoza@example.com', 'password7539', 2),
(43, 'Andrea', 'Díaz', 852456789, 'Pereira', 'andrea.diaz@example.com', 'pass8524', 1),
(44, 'Enrique', 'Pérez', 159753258, 'Manizales', 'enrique.perez@example.com', 'password1597', 2),
(45, 'Natalia', 'Villalobos', 951753456, 'Medellín', 'natalia.villalobos@example.com', 'pass9517', 1),
(46, 'Diego', 'Arango', 258963852, 'Pasto', 'diego.arango@example.com', 'password2589', 2),
(47, 'Adriana', 'Campos', 456123852, 'Cali', 'adriana.campos@example.com', 'pass4561', 1),
(48, 'Mauricio', 'López', 789654852, 'Neiva', 'mauricio.lopez@example.com', 'password7896', 2),
(49, 'Claudia', 'Ramírez', 147852963, 'Tunja', 'claudia.ramirez@example.com', 'pass1478', 1),
(50, 'Felix', 'Montoya', 357963852, 'Cúcuta', 'felix.montoya@example.com', 'password3579', 2),
(51, 'Mariana', 'Cárdenas', 963852741, 'Villavicencio', 'mariana.cardenas@example.com', 'pass9638', 1),
(52, 'Esteban', 'Guerrero', 258741963, 'Cali', 'esteban.guerrero@example.com', 'password2587', 2),
(53, 'Patricia', 'Méndez', 654789258, 'Bogotá', 'patricia.mendez@example.com', 'pass6547', 1),
(54, 'Rodrigo', 'Quintana', 159456987, 'Cartagena', 'rodrigo.quintana@example.com', 'password1594', 2),
(55, 'Susana', 'González', 753159456, 'Valledupar', 'susana.gonzalez@example.com', 'pass7531', 1),
(56, 'Jorge', 'Salinas', 456789321, 'Pereira', 'jorge.salinas@example.com', 'password4567', 2),
(57, 'Ana María', 'Cardona', 963258963, 'Cúcuta', 'ana.cardona@example.com', 'pass9632', 1),
(58, 'Ivan', 'Bermúdez', 789456321, 'Santa Marta', 'ivan.bermudez@example.com', 'password7894', 2),
(59, 'Rosa', 'León', 159753951, 'Tunja', 'rosa.leon@example.com', 'pass1597', 1),
(60, 'Fernando', 'Zambrano', 852456951, 'Armenia', 'fernando.zambrano@example.com', 'password8524', 2),
(61, 'María José', 'Gaviria', 456123147, 'Bogotá', 'maria.gaviria@example.com', 'pass4561', 1),
(62, 'Álvaro', 'Patiño', 753951753, 'Cartagena', 'alvaro.patino@example.com', 'password7539', 2),
(63, 'Diana', 'Restrepo', 963147951, 'Medellín', 'diana.restrepo@example.com', 'pass9631', 1),
(64, 'Raúl', 'Morales', 159753456, 'Manizales', 'raul.morales@example.com', 'password1597', 2),
(65, 'Valentina', 'Ortiz', 654258963, 'Villavicencio', 'valentina.ortiz@example.com', 'pass6542', 1),
(66, 'David', 'Mora', 852963147, 'Neiva', 'david.mora@example.com', 'password8529', 2),
(67, 'Isabel', 'Mejía', 159456753, 'Pasto', 'isabel.mejia@example.com', 'pass1594', 1),
(68, 'Julio', 'Londoño', 951852753, 'Cúcuta', 'julio.londono@example.com', 'password9518', 2),
(69, 'Alejandra', 'Muñoz', 456789654, 'Cartagena', 'alejandra.munoz@example.com', 'pass4567', 1),
(70, 'Federico', 'Martínez', 258963654, 'Bogotá', 'federico.martinez@example.com', 'password2589', 2),
(71, 'Clara', 'Vega', 753159258, 'Pereira', 'clara.vega@example.com', 'pass7531', 1),
(72, 'Hernán', 'Luna', 159456258, 'Popayán', 'hernan.luna@example.com', 'password1594', 2),
(73, 'Tatiana', 'Herrera', 852456789, 'Valledupar', 'tatiana.herrera@example.com', 'pass8524', 1),
(74, 'Edgar', 'Vargas', 123456789, 'Santa Marta', 'edgar.vargas@example.com', 'password1234', 2),
(75, 'Natalia', 'Moreno', 951852369, 'Tunja', 'natalia.moreno@example.com', 'pass9518', 1),
(76, 'Camilo', 'Pineda', 789123456, 'Cali', 'camilo.pineda@example.com', 'password7891', 2),
(77, 'Santiago', 'Castro', 159753951, 'Medellín', 'santiago.castro@example.com', 'pass1597', 1),
(78, 'Iván', 'Rincón', 654258789, 'Cúcuta', 'ivan.rincon@example.com', 'password6542', 2),
(79, 'Adriana', 'Guzmán', 852741369, 'Bogotá', 'adriana.guzman@example.com', 'pass8527', 1),
(80, 'Leonardo', 'Ramos', 357258147, 'Villavicencio', 'leonardo.ramos@example.com', 'password3572', 2),
(81, 'Catalina', 'Ruiz', 963258147, 'Neiva', 'catalina.ruiz@example.com', 'pass9631', 1),
(82, 'Rafael', 'Moreno', 789654123, 'Manizales', 'rafael.moreno@example.com', 'password7896', 2),
(83, 'Daniela', 'González', 456123789, 'Armenia', 'daniela.gonzalez@example.com', 'pass4561', 1),
(84, 'Martín', 'Bautista', 159753456, 'Popayán', 'martin.bautista@example.com', 'password1597', 2),
(85, 'Sofía', 'Benítez', 852456789, 'Valledupar', 'sofia.benitez@example.com', 'pass8524', 1),
(86, 'Manuel', 'Quintero', 654789258, 'Cartagena', 'manuel.quintero@example.com', 'password6547', 2),
(87, 'Gloria', 'Serrano', 753951852, 'Bogotá', 'gloria.serrano@example.com', 'pass7539', 1),
(88, 'José', 'Palacios', 258963147, 'Tunja', 'jose.palacios@example.com', 'password2589', 2),
(89, 'Nicolás', 'Salinas', 963147852, 'Cúcuta', 'nicolas.salinas@example.com', 'pass9631', 1),
(90, 'Verónica', 'Bermúdez', 951852963, 'Villavicencio', 'veronica.bermudez@example.com', 'password9518', 2),
(91, 'Jairo', 'Castaño', 852456123, 'Neiva', 'jairo.castano@example.com', 'pass8524', 1),
(92, 'Margarita', 'Hurtado', 654789123, 'Santa Marta', 'margarita.hurtado@example.com', 'password6547', 2),
(93, 'Felipe', 'Uribe', 159753258, 'Cali', 'felipe.uribe@example.com', 'pass1597', 1),
(94, 'Marcos', 'Villa', 753951852, 'Medellín', 'marcos.villa@example.com', 'password7539', 2),
(95, 'Lucía', 'Ortiz', 258963147, 'Pereira', 'lucia.ortiz@example.com', 'pass2589', 1),
(96, 'Óscar', 'Gil', 963147258, 'Popayán', 'oscar.gil@example.com', 'password9631', 2),
(97, 'Carolina', 'Vargas', 951852753, 'Tunja', 'carolina.vargas@example.com', 'pass9518', 1),
(98, 'Santiago', 'López', 852456951, 'Cúcuta', 'santiago.lopez@example.com', 'password8524', 2),
(99, 'Patricia', 'Rojas', 456123789, 'Bogotá', 'patricia.rojas@example.com', 'password4561', 1),
(100, 'Javier', 'Maldonado', 159753258, 'Medellín', 'javier.maldonado@example.com', 'pass1597', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(18, '0001_01_01_000000_create_users_table', 2),
(19, '0001_01_01_000001_create_cache_table', 2),
(20, '0001_01_01_000002_create_jobs_table', 2),
(21, '2024_09_19_204205_create_audits_table', 3),
(22, '2024_09_20_051119_add_timestamps_to_products_table', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `saleDate` date NOT NULL,
  `shippingDate` date DEFAULT NULL,
  `deliveryDate` date DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `buyer_id` int(20) NOT NULL,
  `payMethod_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `saleDate`, `shippingDate`, `deliveryDate`, `product_id`, `buyer_id`, `payMethod_id`, `state_id`) VALUES
(76, '2024-09-01', '2024-10-01', '2024-10-05', 1, 3, 1, 1),
(77, '2024-09-02', '2024-10-02', '2024-10-06', 2, 5, 2, 2),
(78, '2024-09-03', '2024-10-03', '2024-10-07', 3, 6, 1, 3),
(79, '2024-09-04', '2024-10-04', '2024-10-08', 4, 7, 3, 1),
(80, '2024-09-05', '2024-10-05', '2024-10-09', 5, 3, 2, 2),
(81, '2024-09-06', '2024-10-06', '2024-10-10', 6, 5, 1, 3),
(82, '2024-09-07', '2024-10-07', '2024-10-11', 7, 6, 3, 1),
(83, '2024-09-08', '2024-10-08', '2024-10-12', 8, 7, 2, 2),
(84, '2024-09-09', '2024-10-09', '2024-10-13', 9, 3, 1, 3),
(85, '2024-09-10', '2024-10-10', '2024-10-14', 10, 5, 3, 1),
(86, '2024-09-11', '2024-10-11', '2024-10-15', 11, 6, 2, 2),
(87, '2024-09-12', '2024-10-12', '2024-10-16', 12, 7, 1, 3),
(88, '2024-09-13', '2024-10-13', '2024-10-17', 13, 3, 3, 1),
(89, '2024-09-14', '2024-10-14', '2024-10-18', 14, 5, 2, 2),
(90, '2024-09-15', '2024-10-15', '2024-10-19', 15, 6, 1, 3),
(91, '2024-09-16', '2024-10-16', '2024-10-20', 16, 7, 3, 1),
(92, '2024-09-17', '2024-10-17', '2024-10-21', 17, 3, 2, 2),
(93, '2024-09-18', '2024-10-18', '2024-10-22', 18, 5, 1, 3),
(94, '2024-09-19', '2024-10-19', '2024-10-23', 19, 6, 3, 1),
(95, '2024-09-20', '2024-10-20', '2024-10-24', 20, 7, 2, 2),
(96, '2024-09-21', '2024-10-21', '2024-10-25', 21, 3, 1, 3),
(97, '2024-09-22', '2024-10-22', '2024-10-26', 22, 5, 3, 1),
(98, '2024-09-23', '2024-10-23', '2024-10-27', 23, 6, 2, 2),
(99, '2024-09-24', '2024-10-24', '2024-10-28', 24, 7, 1, 3),
(100, '2024-09-25', '2024-10-25', '2024-10-29', 25, 3, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paymethod`
--

CREATE TABLE `paymethod` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paymethod`
--

INSERT INTO `paymethod` (`id`, `name`) VALUES
(1, 'Tarjeta de crédito'),
(2, 'Débito'),
(3, 'PayPal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `likes` int(11) NOT NULL,
  `publicationDate` date DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`, `likes`, `publicationDate`, `seller_id`, `category_id`, `color_id`, `size_id`, `state_id`) VALUES
(1, 'Camiseta Básica Grande', 20, 'Camiseta de algodón de alta calidad.', '/6gqdGJrfuE5hIlY7XzVVKrfofP5Xha4JCwOVOwVP.jpg', 5, '2024-05-01', 1, 3, 1, 1, 1),
(2, 'Pantalones Jeans', 40, 'Jeans ajustados de mezclilla.', '/mdQGu3O7hN3uWoAiiEn1DtepbLTxlrvdLbvsLpxr.jpg', 0, '2024-05-10', 2, 2, 2, 2, 2),
(3, 'Chaqueta de Cuero', 80, 'Chaqueta de cuero genuino.', '/52r2jSOOhVLFtAAdx0c4OjNWdG80oKMgiN2moxWd.jpg', 0, '2024-05-20', 3, 3, 9, 3, 1),
(4, 'Zapatos Deportivos', 60, 'Zapatos deportivos para correr.', '/W2eSSx38e6TcCpdReImavu47eKIkbgxqEqjaEurK.jpg', 0, '2024-05-30', 4, 2, 4, 4, 3),
(5, 'Sudadera con Capucha', 35, 'Sudadera cómoda con capucha.', '/p1Cw7hLiX6hsm7rFbtdw0BUfWf1M02JTmxQTFCTt.jpg', 0, '2024-06-01', 5, 1, 5, 5, 2),
(6, 'Camisa de Vestir', 45, 'Camisa formal para ocasiones especiales.', '/iABsj95jodoY5wPwYWJYk0sLvtV3OFfI6Cg37Jw0.jpg', 0, '2024-06-10', 6, 1, 6, 6, 1),
(7, 'Pantalones Cortos', 25, 'Pantalones cortos ideales para verano.', '/Pfw8VSzRaVq7CCqpyiMGkvLKqA5CmzGdplOCyMmv.jpg', 0, '2024-06-15', 7, 2, 1, 1, 2),
(8, 'Chaqueta de Abrigo', 100, 'Abrigo de lana para el invierno.', '/39eqDjZjymK0JYIHVrrNOLlaX7l6Up9ygZMVfOM7.jpg', 0, '2024-06-20', 8, 3, 2, 2, 3),
(9, 'Botas de Cuero', 70, 'Botas de cuero para climas fríos.', '/XabziVHugndIdzK9bOVMhS7536z3npPQtqDiEpSe.jpg', 0, '2024-07-01', 9, 4, 3, 3, 1),
(10, 'Camisa Casual', 30, 'Camisa ligera y casual.', '/EvBe1jEFwugU1WNRpyB5VIlVP1Qy4h36oGh7CsEE.jpg', 0, '2024-07-15', 10, 5, 4, 4, 2),
(11, 'Abrigo de Lluvia', 55, 'Abrigo impermeable para días lluviosos.', '/pGHo5rf5qxhMwJFUFksBSudLMyZp2mN5B88dudJl.jpg', 0, '2024-07-20', 11, 1, 5, 5, 3),
(12, 'Bufanda de Lana', 15, 'Bufanda suave de lana.', '/WSJs1xxSYWpcGJA8OysAXT7fg0ysB1LOgm24BHs1.jpg', 0, '2024-07-30', 12, 2, 6, 6, 1),
(13, 'Guantes de Cuero', 20, 'Guantes de cuero para el frío.', '/yqVX3Ti1c6K1oKkOA2yGffrA3czkj6tOa749piBK.jpg', 0, '2024-08-01', 13, 3, 1, 1, 2),
(14, 'Cinturón de Cuero', 25, 'Cinturón elegante de cuero.', '/sV4Z63pNuqIlZZDpcyg7zwIOm0LtnnBGxagfP4tK.jpg', 0, '2024-08-10', 14, 4, 2, 2, 3),
(15, 'Sombrero de Sol', 18, 'Sombrero ligero para protección solar.', '/lFty7u3ZCmalNlKtpsCrPRqxUSxwKvEQlwQk0cRH.jpg', 0, '2024-08-15', 15, 5, 3, 3, 1),
(16, 'Pantalones de Chándal', 30, 'Pantalones deportivos cómodos.', '/7aiwHB4Ofiju2B69NaVxcFA0ziMQb7EJthnSrZov.jpg', 0, '2024-08-20', 16, 1, 4, 4, 2),
(17, 'Chaqueta grande', 65, 'Chaqueta ligera y resistente al agua.', '/TIBwmZTGVQpHgFCCtDKn50xgoyUusIGdRCSuMyYs.jpg', 0, '2024-08-30', 17, 2, 4, 5, 3),
(18, 'Zapatos de Oficina', 55, 'Zapatos formales para oficina.', '/JOssiaA57va9k4f2LrYopXbZZMtFKrV1QpQvUtjL.jpg', 0, '2024-05-01', 18, 3, 6, 6, 1),
(19, 'Camiseta de Manga Larga', 22, 'Camiseta con manga larga de algodón.', '/GPtSVV8889WLyOb01fMmxXisFx3iXXM1tORZBBdu.jpg', 0, '2024-05-10', 19, 4, 1, 1, 2),
(20, 'Pantalones de Traje', 50, 'Pantalones elegantes para traje.', '/5PfXHnxvCWI42iIsZWMl7AvP63d3yHTZU1WO5T8k.jpg', 0, '2024-06-01', 20, 5, 2, 2, 3),
(21, 'Chaqueta de Plumas', 90, 'Chaqueta abrigadora con relleno de plumas.', '/jc223AqWlMLCaFfJtqKQHaWfIR2YDPYOgxNSwFmL.jpg', 0, '2024-06-15', 21, 1, 3, 3, 1),
(22, 'Botines de Ante', 75, 'Botines elegantes de ante.', '/lqYNTGSYvU2AYvFI97103IBAE1Eqp7t5rnr6KV3f.jpg', 0, '2024-07-01', 22, 2, 4, 4, 2),
(23, 'Camisa de Manga Corta', 28, 'Camisa ligera para climas cálidos.', '/y2QlWWMg4lhy00oCJyEbOkZlDXUSVjjdZuYbIB7B.jpg', 0, '2024-07-15', 23, 3, 5, 5, 3),
(24, 'Pantalones Cargo', 35, 'Pantalones con múltiples bolsillos.', '/vqK7iwhdUlSHo7avK0S0H8acLfU08grscxGpqqOe.jpg', 0, '2024-07-30', 24, 4, 6, 6, 1),
(25, 'Chaqueta de Denim', 50, 'Chaqueta de mezclilla clásica.', '/m1YiqQuqSnOPmjIAcmuFTRZrM9sieSkGuFUIda44.jpg', 0, '2024-08-05', 25, 5, 1, 1, 2),
(26, 'Suéter de Lana', 40, 'Suéter cálido y suave de lana.', '/PSVXOUD3dQWfaIgXMByETiwQPCYTTiw6wFFoxjAO.jpg', 0, '2024-09-01', 26, 1, 2, 2, 3),
(27, 'Gorro de Lana', 12, 'Gorro abrigador de lana.', '/yC9gxb44Q1bZ5vQu5MWHtPkh8ceMX1A3HL3lccow.jpg', 0, '2024-09-02', 27, 2, 3, 33, 1),
(28, 'Bufanda de Seda', 22, 'Bufanda elegante de seda.', '/mCuRrCLgsR9ejdogxr74Zh4MFgzYVPr7JfqEKd6W.jpg', 0, '2024-09-03', 28, 3, 9, 4, 2),
(29, 'Cinturón elegante cafe', 18, 'Cinturón ajustable para deportes.', '/On0zkFcd1c84h3cbFQoZA3KZWj9iwpVI7c0ytVwW.jpg', 0, '2024-09-04', 29, 4, 8, 5, 3),
(30, 'Sombrero de Invierno', 20, 'Sombrero cálido para invierno.', '/8no7FWYMfr3WTgzE6Eovaav3FZPM1p9qv7yXQXGw.jpg', 0, '2024-09-05', 30, 5, 2, 6, 1),
(31, 'Pantalones de Yoga', 25, 'Pantalones flexibles para yoga.', '/wDonLVYMYKtwoIrSYasZN0KyuVc4Jg5j35uga2Dm.jpg', 0, '2024-09-06', 31, 1, 7, 1, 2),
(32, 'Chaqueta de Moda', 60, 'Chaqueta moderna para ocasiones especiales.', '/NPyevV06TGJfZuDwnjhCmkyD1L8LncWEyVZZwYYH.jpg', 0, '2024-09-07', 32, 2, 2, 2, 3),
(33, 'Zapatos de Cuero', 70, 'Zapatos elegantes de cuero.', '/PVs246a0En2RFpwbDUHfjkdN7oDMaQZYdCGek5Su.jpg', 0, '2024-09-08', 33, 3, 8, 3, 1),
(34, 'Camiseta Deportiva', 20, 'Camiseta para actividades deportivas.', '/8TyL9iwWR5vyfhnS6GZDu4kN9MOuYgbqV3btkymO.jpg', 0, '2024-09-09', 34, 4, 4, 4, 2),
(35, 'Pantalones de Tren', 40, 'Pantalones cómodos para viaje.', '/PCTh3rRZHMh8RdZ71vmP2W4D3PWLctlgMTl5uHRQ.jpg', 0, '2024-09-10', 35, 5, 2, 5, 3),
(36, 'Chaqueta de Lino', 55, 'Chaqueta ligera de lino.', '/UrI0xRRxD11UsswU5ngoDGbCNgsRE9IkTqdr4G8y.jpg', 0, '2024-09-11', 36, 1, 9, 6, 1),
(37, 'Botas de Trabajo', 80, 'Botas resistentes para trabajo.', '/WBs5Hgy7dAUAltinzXtcAE1xZSi5n9YrawWcQwPf.jpg', 0, '2024-09-12', 37, 2, 6, 1, 2),
(38, 'Camisa de Raya', 30, 'Camisa con rayas elegantes.', '/jrYs9Yp3eLJNPXx91Oldi5DOcJDjD5wpFdW0ctH5.jpg', 0, '2024-09-13', 38, 3, 3, 2, 3),
(39, 'Pantalones de Cuero', 60, 'Pantalones ajustados de cuero.', '/wKjh9zzWzvqvne1RpAXDuAzUFRfKye62fL8yjqqf.jpg', 0, '2024-09-14', 39, 4, 8, 3, 1),
(40, 'Chaqueta de Puntos', 45, 'Chaqueta tejida a mano.', '/YjGVvA3WpWedEOPFGCF9eRuArW6nnp2zdiG8D3My.jpg', 0, '2024-09-15', 40, 5, 1, 4, 2),
(41, 'Suéter de Algodón', 35, 'Suéter suave de algodón.', '/QcvjJ53m8twoqg1VUJY4e5rWRy3EU73p87gsxceR.jpg', 0, '2024-09-16', 41, 1, 5, 5, 3),
(42, 'Gorro de Verano', 15, 'Gorro ligero para verano.', '/LrU7SQqJFbpxsuiWpSJVCE1jaSv7YmX6DITgX3Qz.jpg', 0, '2024-09-17', 42, 2, 6, 6, 1),
(43, 'Bufanda de Lino', 25, 'Bufanda ligera de lino.', '/voZdu2csBwPNUmiM4fuFSopuIOXug0gyxLOHCnSD.jpg', 0, '2024-09-18', 43, 3, 3, 1, 2),
(44, 'Cinturón Elegante', 30, 'Cinturón de cuero con hebilla decorativa.', '/IyGleIAu0rW6w5iDt4QeEWKaDhiz09jd7mAtDjn4.jpg', 0, '2024-09-19', 44, 4, 2, 2, 3),
(45, 'Sombrero de Gala', 35, 'Sombrero formal para eventos.', '/Gg9v0Ue5riEJ22tXyH1aRmLKJp5KMjbDNUL52IeF.jpg', 0, '2024-09-20', 45, 5, 4, 3, 1),
(46, 'Pantalones de Nieve', 50, 'Pantalones impermeables para nieve.', '/cpT0r34IN40F0HAggwG8rrP5u8aZ10gCG8bDouhh.jpg', 0, '2024-09-21', 46, 1, 3, 4, 2),
(47, 'Chaqueta de Piel Sintética', 65, 'Chaqueta moderna de piel sintética.', '/814QdVcbo6Qyd8RaSRHC8VgpsLvHiSREijf6PLjU.jpg', 0, '2024-09-22', 47, 2, 8, 5, 3),
(48, 'Zapatos de Charol', 75, 'Zapatos elegantes de charol.', '/C5vwoHqQ1kFUHdzi3D4Do2N76Vp72Vaxxz4n6Fhf.jpg', 0, '2024-09-23', 48, 3, 2, 6, 1),
(49, 'Camiseta de Manga Larga Deportiva', 25, 'Camiseta para deportes con manga larga.', '/So0iwrNRj92hKx8Ufxba6PznYT38ZVU4WY13Orr7.jpg', 0, '2024-09-24', 49, 4, 2, 1, 2),
(50, 'Pantalones de Linterna', 35, 'Pantalones cómodos con ajuste en el tobillo.', '/5zvGSKHH69gYegLLq7OoJTEGER6dRjgj0EX7eqJe.jpg', 0, '2024-09-25', 50, 5, 6, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `returnorder`
--

CREATE TABLE `returnorder` (
  `id` int(11) NOT NULL,
  `observation` varchar(40) NOT NULL,
  `returnDate` varchar(40) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `returnorder`
--

INSERT INTO `returnorder` (`id`, `observation`, `returnDate`, `order_id`, `buyer_id`) VALUES
(1, 'Producto defectuoso', '2024-09-05', 1, 1),
(2, 'Cambio de talla', '2024-09-06', 2, 2),
(3, 'Error en el pedido', '2024-09-07', 3, 3),
(4, 'Producto no corresponde', '2024-09-08', 4, 4),
(5, 'Devolución por insatisfacción', '2024-09-09', 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('WL3BtB9rnF3XWE8kmsCzExDfy7fni6ZYRPg668J1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoielZUQ1oyUDVwVUxxWmRJbkc3UjJQRG4wRUsyWXNkdU51VmhaalNEYiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9zeXYudGVzdC9sb2dpbiI7fX0=', 1727369610);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(95) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sizes`
--

INSERT INTO `sizes` (`id`, `name`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL'),
(6, 'XXL'),
(7, '4'),
(8, '6'),
(9, '8'),
(10, '10'),
(11, '12'),
(12, '14'),
(13, '16'),
(14, '18'),
(15, '28'),
(16, '30'),
(17, '32'),
(18, '34'),
(19, '36'),
(20, '38'),
(21, '40'),
(22, '42'),
(23, '36'),
(24, '37'),
(25, '37'),
(26, '38'),
(27, '39'),
(28, '40'),
(29, '41'),
(30, '42'),
(31, '43'),
(32, '44'),
(33, 'Única');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Pendiente'),
(2, 'Completado'),
(3, 'En Proceso'),
(4, 'Cancelado'),
(5, 'Devuelto'),
(6, 'Enviado'),
(7, 'En Espera'),
(8, 'Recibido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `document` varchar(10) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `charge` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `is_manager` tinyint(1) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `document`, `email_verified_at`, `password`, `charge`, `code`, `is_manager`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Laura Valentina Bustos Henao', 'lvalenlu02@gmail.com', '10987432', NULL, '$2y$12$clROkTCojyTXnvu8hEEfh.C8BKVhHcHPyJgUfTS7uBfpo2La8MftO', 'Project Manager', '0', 1, 'eWATCKlVSMqUSnSb8ci0FIFq8ATvSi6jiobW8ufLHRb0bNksbeXw0mTTLMoJ', '2024-09-17 03:48:10', '2024-09-26 21:53:24'),
(5, 'Valentina Henao', 'lvalenlau02@gmail.com', '109874321', NULL, '$2y$12$vrpdRzsXR67WhCZsWTklU.BJmUqxLJaU5QJoXlfFmfK7PseV9MWlu', 'asd', '0', 0, 'WvWPWP7qA1cLnc3CrLqdz5SQRRBYqksOUaXMn5HGEQcQOHmSRnw231WJ4v8J', '2024-09-17 03:51:51', '2024-09-17 03:51:51'),
(7, 'Andres Abril', 'abril0@gmail.com', '1044458714', NULL, '$2y$12$pMZdwCYGcwmobYqcC6x5juYbzLSady7b6zxTRb8oOb.GU1JfgW9pu', 'asdf', '0', 0, NULL, '2024-09-17 19:00:33', '2024-09-26 21:41:16'),
(8, 'Draco Malfoy', 'draco@howarts.edu.co', '516548461', NULL, '$2y$12$HGlviTJdmfVz5CmxDXvmC.7oWI8GUVkBPafuP0pFziqtiPWkax.H6', 'Mago', '0', 1, 'Gijvv8nVtNhCsVk3q42tzaHF3YlqhBl2GlbKmg95iRVHJKxodsvpynIhpRFt', '2024-09-25 02:27:38', '2024-09-25 03:52:11'),
(9, 'Marly Sanchez', 'marly@gmail.com', '5145611456', NULL, '$2y$12$BzQOgY1ffuDWsM30Dytaq..Rntn2YlUgCfI2EJvV6tsgvPMcg2DqS', 'Directora calidad de productos', '0', 0, 'EimL567oF9Di5OXA9Rm9D74fAKFAl53uvsrcnnwVE9hLuZRzV8LblymX8eZQ', '2024-09-26 06:54:49', '2024-09-26 07:19:04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audits_id_users_foreign` (`users_id`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `fk_payMethod_id` (`payMethod_id`),
  ADD KEY `fk_state_id` (`state_id`),
  ADD KEY `fk_buyer_id` (`buyer_id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `paymethod`
--
ALTER TABLE `paymethod`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idVendedor` (`seller_id`),
  ADD KEY `productos_ibfk_3` (`color_id`),
  ADD KEY `productos_ibfk_4` (`size_id`),
  ADD KEY `productos_ibfk_5` (`state_id`);

--
-- Indices de la tabla `returnorder`
--
ALTER TABLE `returnorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idComprador` (`buyer_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_document_unique` (`document`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `audits`
--
ALTER TABLE `audits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `paymethod`
--
ALTER TABLE `paymethod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `returnorder`
--
ALTER TABLE `returnorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `audits`
--
ALTER TABLE `audits`
  ADD CONSTRAINT `audits_id_users_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_buyer_id` FOREIGN KEY (`buyer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `fk_payMethod_id` FOREIGN KEY (`payMethod_id`) REFERENCES `paymethod` (`id`),
  ADD CONSTRAINT `fk_state_id` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`),
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`),
  ADD CONSTRAINT `products_ibfk_5` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Filtros para la tabla `returnorder`
--
ALTER TABLE `returnorder`
  ADD CONSTRAINT `returnorder_ibfk_2` FOREIGN KEY (`buyer_id`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
