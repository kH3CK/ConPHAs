-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2025 at 12:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conphas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` mediumint(9) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'Jaron', '$2y$10$yeQwbDmmdz/UTbGmQIZ44OiRX5GbFiGJMRo..7DTIDwTM35jmQqei');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` mediumint(9) NOT NULL,
  `title` varchar(100) NOT NULL,
  `preview_text` varchar(300) NOT NULL,
  `text` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `publication_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_link` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `preview_text`, `text`, `author`, `publication_date`, `image_link`) VALUES
(1, 'Innovatieve oplossingen voor een duurzamere toekomst', 'In deze blog bespreken we de nieuwste innovaties op het gebied van duurzaamheid en hoe deze bijdragen aan een groenere toekomst. We onderzoeken verschillende technologieën die een positieve impact hebben op het milieu...', 'In deze blog duiken we in de meest recente innovaties op het gebied van duurzaamheid en hoe deze bijdragen aan een groenere, leefbare toekomst voor iedereen. De wereld staat niet stil – en dat geldt ook voor technologie. Steeds meer slimme oplossingen worden ontwikkeld om onze ecologische voetafdruk te verkleinen, natuurlijke hulpbronnen efficiënter te benutten en de balans met onze planeet te herstellen.\r\n\r\nWe nemen je mee langs een aantal baanbrekende technologieën en trends die een positieve impact hebben op het milieu. Denk aan ontwikkelingen in hernieuwbare energie, circulair bouwen, groene mobiliteit, en zelfs innovaties in landbouw en voedselproductie. Deze technologische vooruitgang maakt het mogelijk om duurzamer te leven en werken, zonder in te leveren op comfort of kwaliteit.\r\n\r\nDaarnaast kijken we ook naar hoe bedrijven en overheden hun verantwoordelijkheid nemen – en hoe jij als individu daar een rol in kunt spelen. Van zonnepanelen op je dak tot slimme energienetwerken en van hergebruik van materialen tot CO₂-neutrale productie: de mogelijkheden groeien elke dag.\r\n\r\nKortom: duurzaamheid is allang geen trend meer – het is een noodzaak. Maar gelukkig ook eentje vol hoop, innovatie en kansen. Lees mee en ontdek hoe deze groene beweging steeds meer vaart krijgt.', 'Emma Jansen', '2023-03-15 15:28:49', 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'),
(2, 'De rol van groene chemie in een circulaire economie', 'Groene chemie speelt een cruciale rol in de transitie naar een circulaire economie. In dit artikel bespreken we hoe duurzame chemische processen bijdragen aan het verminderen van afval en het hergebruik van grondstoffen...', 'Groene chemie speelt een steeds belangrijkere rol in de overgang naar een duurzame en circulaire economie. Waar traditionele chemische processen vaak afhankelijk zijn van fossiele grondstoffen en veel afval produceren, richt groene chemie zich juist op het ontwikkelen van milieuvriendelijke alternatieven – met oog voor mens, milieu én toekomstige generaties.\r\n\r\nIn dit artikel gaan we dieper in op hoe duurzame chemische processen kunnen bijdragen aan het verminderen van schadelijk afval en het hergebruiken van waardevolle grondstoffen. Denk bijvoorbeeld aan het ontwerpen van reacties die minder bijproducten opleveren, of het gebruik van hernieuwbare materialen in plaats van eindige fossiele bronnen.\r\n\r\nDaarnaast kijken we naar innovatieve toepassingen, zoals biogebaseerde plastics, katalysatoren die efficiënter werken, en processen die draaien op groene energie in plaats van op aardolie. Deze nieuwe aanpak zorgt ervoor dat de chemische industrie – traditioneel gezien een grote vervuiler – juist een belangrijke speler wordt in het realiseren van een circulaire economie.\r\n\r\nGroene chemie is misschien niet altijd zichtbaar, maar vormt wel de fundering onder veel duurzame innovaties. Van schoonmaakmiddelen tot farmacie, van materialen tot energie – overal waar chemie zit, ligt een kans om het beter te doen. En die kansen worden met beide handen aangegrepen.\r\n\r\n', 'Thomas de Vries', '2023-02-28 05:12:26', 'https://images.unsplash.com/photo-1507668077129-56e32842fceb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'),
(3, 'Duurzame landbouwmethoden voor een gezondere planeet', 'Duurzame landbouw is essentieel voor het behoud van onze ecosystemen. In deze blog verkennen we innovatieve landbouwmethoden die de impact op het milieu verminderen en tegelijkertijd de voedselproductie verbeteren...', 'Duurzame landbouw is essentieel voor het behoud van onze ecosystemen én voor de toekomst van onze voedselvoorziening. Terwijl de wereldbevolking blijft groeien en de druk op natuurlijke hulpbronnen toeneemt, wordt het steeds duidelijker dat we onze manier van voedsel produceren moeten herzien. Gelukkig ontstaan er wereldwijd innovatieve landbouwmethoden die niet alleen de impact op het milieu beperken, maar ook zorgen voor gezondere bodems, meer biodiversiteit en efficiëntere oogsten.\r\n\r\nIn deze blog verkennen we een aantal van deze veelbelovende technieken. Denk aan precisielandbouw, waarbij met behulp van data en sensoren gewassen precies krijgen wat ze nodig hebben – niet meer en niet minder. Of agroforestry, waar bomen en landbouwgewassen op slimme wijze worden gecombineerd voor een gezonder ecosysteem. Ook hydroponics en vertical farming winnen terrein, vooral in stedelijke gebieden, waar ruimte schaars is maar de vraag naar lokaal voedsel groeit.\r\n\r\nWe kijken ook naar de rol van technologie, zoals drones, AI en robots, die boeren helpen om duurzamer en efficiënter te werken. En niet te vergeten: het herwaarderen van traditionele en regeneratieve landbouwmethoden, waarbij de natuur weer als partner wordt gezien in plaats van als tegenstander.\r\n\r\nDuurzame landbouw is geen verre toekomstvisie meer – het gebeurt nu, overal om ons heen. En elke stap richting een duurzamer landbouwsysteem is een stap naar een gezondere planeet.\r\n\r\n', 'Sophie Bakker', '2023-02-10 10:05:15', 'https://media1.thrillophilia.com/filestore/uwpz857lua13qmvub6um2v93dlrm_IMG%20Worlds%20%20of%20Adventure.jpg'),
(4, 'Nieuw project gelanceerd', 'We hebben onlangs een nieuw project gelanceerd dat veel aandacht heeft gekregen...', 'We hebben onlangs een nieuw project gelanceerd dat volop in de belangstelling staat – en met goede reden! In dit project zetten we vol in op bioplastics als duurzaam alternatief voor traditionele kunststoffen.\r\nBioplastics worden gemaakt van hernieuwbare grondstoffen, zoals maïszetmeel of suikerriet, en zijn vaak biologisch afbreekbaar. Dat betekent minder druk op het milieu, minder afval en een stap richting een circulaire economie. \r\n\r\nSamen met onze partners onderzoeken we hoe deze materialen op grotere schaal kunnen worden toegepast – van verpakkingen tot bouwmaterialen. De reacties zijn positief en de interesse groeit snel. \r\n\r\nWe zijn trots op deze stap richting een schonere toekomst. Wordt vervolgd!', 'Jaron de Boer', '2025-01-15 08:30:00', 'images/project.webp'),
(5, 'Uitbreiding van ons team', 'ConPHAs verwelkomt drie nieuwe experts in ons groeiende team van professionals...', 'We groeien – en dat doen we niet alleen in projecten, maar ook in mensen. Daarom zijn we superblij om drie nieuwe collega\'s te verwelkomen in ons team!\r\n\r\nMet hun frisse ideeën, nieuwe energie en bakken aan ervaring brengen ze precies wat we nodig hebben om nog beter te worden in wat we doen. Of het nu gaat om slimme oplossingen bedenken, goed samenwerken of gewoon lekker knallen aan mooie projecten – deze drie passen er helemaal bij.\r\n\r\nWe kijken ernaar uit om samen te bouwen aan toffe dingen. Welkom bij ConPHAs – we zijn blij dat jullie er zijn!', 'Emma Jansen', '2025-02-01 09:00:00', 'images/team.jpg'),
(6, 'Innovatie award gewonnen', 'We zijn trots om aan te kondigen dat ConPHAs de prestigieuze innovatie award heeft gewonnen...', 'We zijn ontzettend trots om aan te kondigen dat ConPHAs de prestigieuze innovatie-award in de wacht heeft gesleept voor ons werk op het gebied van bioplastics!\r\n\r\nMet dit project laten we zien hoe bioplastics – gemaakt uit hernieuwbare grondstoffen – een écht duurzaam alternatief kunnen vormen voor traditionele kunststoffen. Onze aanpak combineert innovatie, circulariteit en impact, en dat is niet onopgemerkt gebleven.\r\n\r\nDeze award is een mooie erkenning voor het harde werk van ons team én voor de richting die we op willen: een toekomst waarin slimme materialen bijdragen aan een schonere, gezondere wereld. \r\n\r\nBedankt aan iedereen die hieraan heeft bijgedragen – dit is pas het begin!', 'Thomas de Vries', '2025-03-01 11:00:00', 'images/award.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `blog_id` mediumint(9) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`blog_id`, `name`) VALUES
(1, 'Duurzaamheid'),
(1, 'Innovatie'),
(2, 'Groene chemie'),
(2, 'Circulaire economie'),
(3, 'Duurzaamheid'),
(4, 'Projecten'),
(5, 'Team'),
(6, 'Innovatie');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` mediumint(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hex` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `hex`) VALUES
(1, 'Primary Color', '36b843'),
(2, 'Secondary Color', '37852d'),
(3, 'Primary Background', 'ffffff'),
(4, 'Secondary Background', 'd9d9d9'),
(5, 'Danger', 'fb2c36');

-- --------------------------------------------------------

--
-- Table structure for table `internships`
--

CREATE TABLE `internships` (
  `id` mediumint(9) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `minimum_level` varchar(25) NOT NULL,
  `location` varchar(100) NOT NULL,
  `weeks` smallint(6) NOT NULL,
  `hours` smallint(6) NOT NULL,
  `compensation` smallint(6) NOT NULL DEFAULT 0,
  `start_date_and_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` varchar(25) NOT NULL,
  `image_link` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `internships`
--

INSERT INTO `internships` (`id`, `title`, `description`, `minimum_level`, `location`, `weeks`, `hours`, `compensation`, `start_date_and_time`, `type`, `image_link`) VALUES
(1, 'Bioloog', 'Lorem ipsum dolor sit amet', 'MBO 3', 'Groningen, Muntinglaan 5', 50, 300, 0, '2025-09-01 07:00:00', 'Afstudeerstage', 'images/biotechnoloog.jpg'),
(3, 'Milieudeskundige', 'Lorem ipsum dolor sit amet', 'MBO 3', 'Groningen, Friesestraatweg 5', 54, 350, 0, '2026-02-01 07:30:00', 'Meewerkstage', 'images/headerm25-3'),
(4, 'Wetenschapsvoorlichter', 'Lorem ipsum dolor sit amet', 'MBO 4', 'Groningen, Johan Willem Frisostraat 26', 20, 100, 0, '2025-05-23 06:00:00', 'Meewerkstage', 'images/presentatievaardigheden-toolshero'),
(5, 'Natuurbehoud', 'Lorem ipsum dolor sit amet', 'MBO 4', 'Groningen, Friesestraatweg', 54, 500, 0, '2026-02-01 07:30:00', 'Meewerkstage', 'images/natuur.jpg'),
(6, 'Schoonmaker', 'Lorem ipsum dolor sit amet', 'MBO 1', 'Assen, Weiersstraat', 10, 90, 0, '2025-06-15 08:00:00', 'Meewerkstage', 'images/schoonmaker.jpg'),
(7, 'Laborant', 'Lorem ipsum dolor sit amet', 'MBO 3', 'Assen, Thorbeckelaan', 35, 330, 0, '2025-08-01 07:30:00', 'afstudeerstage', 'images/lab.jpg'),
(8, 'Bioloog', 'Lorem ipsum dolor sit amet', 'HBO', 'Leeuwarden, Groeneweg', 30, 250, 0, '2026-03-01 07:30:00', 'afstudeerstage', 'images/biloog.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `texts`
--

CREATE TABLE `texts` (
  `id` mediumint(9) NOT NULL,
  `text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `texts`
--

INSERT INTO `texts` (`id`, `text`) VALUES
(1, 'ConPHAs'),
(2, 'https://placehold.co/200x200.png'),
(3, 'https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap'),
(4, '\"Space Mono\", monospace');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD KEY `blog_id` (`blog_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internships`
--
ALTER TABLE `internships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `texts`
--
ALTER TABLE `texts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `internships`
--
ALTER TABLE `internships`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `texts`
--
ALTER TABLE `texts`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
