
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Cart`
--

--
-- Table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;


INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'TV & Audio'),
(2, 'Photo & Video'),
(3, 'IT'),
(4, 'Communications'),
(5, 'Air conditioners'),
(6, 'Large appiances'),
(7, 'Small appiances'),
(8, 'Entertainment'),
(9, 'Home');


CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`) VALUES
(1, '32" (81см) HD LED TV LG 32LF510B', '32" (81см) HD LED TV РЕЗОЛЮЦИЯ 1366X768 300HZ PQI USB MEDIA PLAYER (Видео, Снимки, Музика) SIMPLINK (HDMI CEC) DVB-T/C', 489, 10),
(2, 'GARMIN MAP OF BULGARIA ON SD OFRM', 'MAP OF BULGARIA', 79, 100),
(3, 'FULL HD ВИДЕОКАМЕРА SONY HDR-CX260VEB', 'FULL HD ВИДЕОКАМЕРА ЗАПИС ВЪРХУ ФЛАШ КАРТИ ПАМЕТ FULL HD 1080 50p ВИДЕОЗАПИС 8.9 МЕГАПИКСЕЛА (EXMOR R CMOS СЕНЗОР) SONY G ОБЕКТИВ C 30X ОПТИЧНО ПРИБЛИЖЕНИЕ ОПТИЧНА СТАБИЛИЗАЦИЯ С АКТИВЕН РЕЖИМ ', 599, 11),
(4, 'SAMSUNG PRO SD 32GB MB-SG32D CL10', 'SAMSUNG PRO SD 32GB MB-SG32D CL10', 69, 10),
(5, 'ЛАПТОП HP 15-AC009 N6A60EA NOTEBOOK', 'ПРЕНОСИМ КОМПЮТЪР DISPLAY 39.6 СМ (15.6 ИНЧА), HD (1366 X 768) CPU INTEL® CELERON® N3050, 1,6GHZ, 2MB КЕШ, 2 ЯДРА RAM 4 GB DDR3L-1600 SDRAM HDD 1 TB 5400 RPM SATA SUPERMULTI DVD ЗАПИСВАЩО УСТРОЙСТВО ГРАФИЧНА КАРТА INTEL HD GRAPHICS', 529, 3),
(6, 'TOSHIBA HAYABUSA 16GB USB 2.0 AQUA', '16 GB', 18, 104),
(7, 'Мобилен Телефон SAMSUNG GALAXY S5 NEO SILVER G903', 'МОБИЛЕН ТЕЛЕФОН SIM: MICRO SIM БАТЕРИЯ: LI-ION 2800 MAH ОПЕРАЦИОННА СИСТЕМА : ANDROID, V5.1.1 (LOLLIPOP) ПРОЦЕСОР: OCTA-CORE 1.6 GHZ ДИСПЛЕЙ: 5.1" (13 СМ) SUPER AMOLED КАПАЦИТИВЕН ДИСПЛЕЙ С 16M. ЦВЯТА, РЕЗОЛЮЦИЯ 1920 X 1080 КАМЕРА: 16 МPX КАМЕРА, АВТОМАТИЧЕН ФОКУС, LED СВЕТКАВИЦА ВТОРА КАМЕРА: 5 MP', 789, 10),
(8, 'PANASONIC KX-PRS110FXW', '', 149, 5),
(9, 'КЛИМАТИЧНА ИНВЕРТОРНА СИСТЕМА SAMSUNG AR-09JSFN', 'КЛИМАТИЧНА ИНВЕРТОРНА СИСТЕМА SEER - 6.1 / SCOP - 3.8 ЕНЕРГИЕН КЛАС НА ЕФЕКТИВНОСТ А++/A ОТДАВАНА МОЩНОСТ : ОХЛАЖДАНЕ - 2.50 KW ОТОПЛЕНИЕ - 3.20 KW', 899, 10),
(10, 'Инверторна Термо-помпена Система въздух-вода LG MONO HM121M.U31', 'Инверторна Термо-помпена Система въздух-вода Идеален уред за отопление и охлаждане Възможност за свързване към съществуваща парна инсталация Подгряване на вода за битови нужди Антикорозионни позлатени пластини Gold Fin Лесна поддръжка', 7999, 10),
(11, 'ПЕРАЛНА ЗА ВГРАЖДАНЕ ELECTROLUX EWG-147410W', 'ПЕРАЛНА ЗА ВГРАЖДАНЕ 0-1400 ОБОРОТА В МИНУТА ЦЕНТРОФУГА КАПАЦИТЕТ 7 кг. СУХО ПРАНЕ ЕНЕРГИЕН КЛАС А++ КЛАС НА ИЗПИРАНЕ А ЦИФРОВ ДИСПЛЕЙ', 1299, 10),
(12, 'КОМБИНИРАН ХЛАДИЛНИК-ФРИЗЕР ЗА ВГРАЖДАНЕ LIEBHERR ECBN-6156', 'КОМБИНИРАН ХЛАДИЛНИК-ФРИЗЕР ЗА ВГРАЖДАНЕ ОБЩ/ПОЛЕЗЕН ОБЕМ НА ХЛАДИЛНА ЧАСТ 585Л/ 480 Л В Т.Ч. BIOFRESH ЗОНА - 73Л/69Л ОБЩ/ПОЛЕЗЕН ОБЕМ НА ФРИЗЕРНА ЧАСТ - 183Л/ 116 Л ЕНЕРГИЕН КЛАС А + ЕЛЕКТРОННО СЕНЗОРНО УПРАВЛЕНИЕ PREMIUMPLUS ОБОРУДВАНЕ ОТ ЗАКАЛЕНО СТЪКЛО И АЛУМИНИЙ 2 ОТДЕЛЕНИЯ BIOFRESH ', 6499, 19),
(13, 'СОКОИЗТИСКВАЧКА ROHNSON R 427', 'СОКОИЗТИСКВАЧКА МОЩНОСТ 850W КОНТЕЙНЕР ЗА ОТПАДЪЦИ 1,8 Л. КАНА ЗА СОК С КАПАЦИТЕТ 700 МЛ. СПЕЦИАЛНА АНТИ-КАПКОВА СИСТЕМА 2 СКОРОСТИ ', 99, 5),
(14, 'МЕСОМЕЛАЧКА TEFAL NE610138', 'МЕСОМЕЛАЧКА МОЩНОСТ 2000 W КАПАЦИТЕТ 2.6 КГ/МИН РЕШЕТКИ 3 РЕНДЕТА - 3 КОНУСА ПРИСТАВКА ЗА НАДЕНИЦА, ЗА КЕБЕ, ЗА БИСКВИТИ ОТДЕЛЕНИЕ ЗА СЪХРАНЕНИЕ НА ПРИСТАВКИТЕ ФУНКЦИЯ "REVERSE"', 295, 34),
(15, 'XBOX ONE 500GB + KINECT', '', 989, 50),
(16, 'МИНИ СТЕПЕР С ВЕРТИКАЛНИ ДРЪЖКИ NEO ST-300 STEPPER', '', 79, 5),
(17, 'Полилей', 'EGLO 90852', 16, 50),
(18, 'Скрин', 'ZELLER 13474', 69, 45);

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE IF NOT EXISTS `products_categories` (
  `productId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products_categories`
--

INSERT INTO `products_categories` (`productId`, `categoryId`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 3),
(6, 3),
(7, 4),
(8, 4),
(9, 5),
(10, 5),
(11, 6),
(12, 6),
(13, 7),
(14, 7),
(15, 8),
(16, 8),
(17, 9),
(18, 9);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE IF NOT EXISTS `promotions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productId` int(11) NOT NULL,
  `percentage` double NOT NULL,
  `endDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `name`, `productId`, `percentage`, `endDate`) VALUES
(9, 'лоптоп HP', 5, 12.5, '2015-11-21'),
(10, 'скрин', 18, 40, '2015-12-25');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `message`, `userId`, `productId`) VALUES
(4, 'Edit', 20, 2),
(5, 'Good !!!', 21, 5),
(6, 'Testing', 21, 1),
(7, 'Broken screen', 20, 3),
(8, 'not coling', 21, 18);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Cash` decimal(10,0) NOT NULL,
  `isAdmin` tinyint(4) NOT NULL DEFAULT '0',
  `isEditor` tinyint(11) NOT NULL DEFAULT '0',
  `isModerator` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `Cash`, `isAdmin`, `isEditor`, `isModerator`) VALUES
(21, 'gosho', 'PAy5RnxtBhJVg', 4675, 1, 0, 0),
(20, 'pesho', 'PAy5RnxtBhJVg', 10230, 0, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
