-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: mysql
-- Čas generovania: Pi 14.Máj 2021, 07:49
-- Verzia serveru: 8.0.21
-- Verzia PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `test`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `Answers`
--

CREATE TABLE `Answers` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `question_id` int NOT NULL,
  `type` enum('Krátka odpoveď','Výber správnej odpovede','Párovanie odpovedí','Nakreslenie obrázka','Matematický výraz') CHARACTER SET utf8 COLLATE utf8_slovak_ci NOT NULL,
  `answer` text CHARACTER SET utf8 COLLATE utf8_slovak_ci NOT NULL,
  `correct_answer` varchar(255) COLLATE utf8_slovak_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `Answers`
--

INSERT INTO `Answers` (`id`, `user_id`, `question_id`, `type`, `answer`, `correct_answer`) VALUES
(1, 1, 1, 'Krátka odpoveď', '125', NULL),
(2, 1, 2, 'Krátka odpoveď', '69', NULL),
(3, 1, 3, 'Výber správnej odpovede', 'NePrešovský kraj,Šariš,nie je výrok', NULL),
(4, 1, 4, 'Výber správnej odpovede', 'Pí,inak sa nehovorí,Lí', NULL),
(5, 1, 5, 'Párovanie odpovedí', 'V', NULL),
(6, 1, 6, 'Párovanie odpovedí', 'S', NULL),
(7, 3, 10, 'Krátka odpoveď', '4096', NULL),
(8, 3, 11, 'Krátka odpoveď', '40', NULL),
(9, 3, 12, 'Výber správnej odpovede', 'meter štvorcový,meter kubický,meter za sekundu', 'meter štvorcový'),
(10, 3, 13, 'Výber správnej odpovede', 'V,S,O', 'V'),
(11, 3, 14, 'Párovanie odpovedí', '6a*a', NULL),
(12, 3, 15, 'Párovanie odpovedí', '2*(ab+ac+bc)', NULL),
(13, 3, 16, 'Párovanie odpovedí', '2Sp + Q', NULL),
(14, 3, 17, 'Párovanie odpovedí', '2πr(r+v)', NULL);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `Exams`
--

CREATE TABLE `Exams` (
  `id` int NOT NULL,
  `exam_code` varchar(32) CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `title` varchar(32) CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL,
  `time_limit` varchar(128) COLLATE utf8_slovak_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `exam_points` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `Exams`
--

INSERT INTO `Exams` (`id`, `exam_code`, `user_id`, `title`, `time_limit`, `is_active`, `exam_points`) VALUES
(1, 'e60d71', 1, 'test', '25000', 0, 60),
(2, '4690de', 1, 'Zápočet', '30000', 1, 30);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `ExamsLogin`
--

CREATE TABLE `ExamsLogin` (
  `id` int NOT NULL,
  `exam_id` int NOT NULL,
  `user_id` int NOT NULL,
  `finished` tinyint(1) NOT NULL,
  `leave_tab` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `Points`
--

CREATE TABLE `Points` (
  `id` int NOT NULL,
  `exam_id` int NOT NULL,
  `student_id` int NOT NULL,
  `question1_points` int NOT NULL,
  `question2_points` int NOT NULL,
  `question3_points` int NOT NULL,
  `question4_points` int NOT NULL,
  `question5_points` int NOT NULL,
  `question6_points` int NOT NULL,
  `question7_points` int NOT NULL,
  `question8_points` int NOT NULL,
  `question9_points` int NOT NULL,
  `question10_points` int NOT NULL,
  `question11_points` int NOT NULL,
  `all_points` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `Questions`
--

CREATE TABLE `Questions` (
  `id` int NOT NULL,
  `exam_id` int NOT NULL,
  `question` varchar(256) CHARACTER SET utf8 COLLATE utf8_slovak_ci NOT NULL,
  `answer_id` int NOT NULL,
  `type` enum('Krátka odpoveď','Výber správnej odpovede','Párovanie odpovedí','Nakreslenie obrázka','Matematický výraz') CHARACTER SET utf8 COLLATE utf8_slovak_ci NOT NULL,
  `question_points` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `Questions`
--

INSERT INTO `Questions` (`id`, `exam_id`, `question`, `answer_id`, `type`, `question_points`) VALUES
(1, 1, 'Vypočítajte 5*5*5', 1, 'Krátka odpoveď', 1),
(2, 1, 'Vypočítajte (128/2)+25-(5*4)', 2, 'Krátka odpoveď', 1),
(3, 1, 'K danému výroku vyberte jeho negáciu - (Prešovský kraj)', 3, 'Výber správnej odpovede', 1),
(4, 1, 'Ludolfovo číslo sa inak povie aj ', 4, 'Výber správnej odpovede', 1),
(5, 1, 'Objem sa píše ako', 5, 'Párovanie odpovedí', 1),
(6, 1, 'Obsah sa píše ako', 6, 'Párovanie odpovedí', 1),
(7, 1, 'kosoštvorec', 0, 'Nakreslenie obrázka', 1),
(8, 1, 'Derivuj y = 5x^3 -7x^2 + 8x -14', 0, 'Matematický výraz', 1),
(9, 1, 'Derivuj y = 5/x^2', 0, 'Matematický výraz', 1),
(10, 2, '8*8*8*8', 7, 'Krátka odpoveď', 1),
(11, 2, '936-136/37-17', 8, 'Krátka odpoveď', 1),
(12, 2, 'Rozloha sa meria v ?', 9, 'Výber správnej odpovede', 1),
(13, 2, 'Vyberte Značku pre objem', 10, 'Výber správnej odpovede', 1),
(14, 2, 'Obsah kocky', 11, 'Párovanie odpovedí', 1),
(15, 2, 'Obsah kvádra', 12, 'Párovanie odpovedí', 1),
(16, 2, 'Obsah Hranolu', 13, 'Párovanie odpovedí', 1),
(17, 2, 'Obsah Valca', 14, 'Párovanie odpovedí', 1),
(18, 2, 'jablko nepáda ďaleko od stromu', 0, 'Nakreslenie obrázka', 1),
(19, 2, 'Napíš vzorec pre kvadratickú rovnicu', 0, 'Matematický výraz', 1),
(20, 2, 'Napíš vzorec pre Integrál 1/x', 0, 'Matematický výraz', 1);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `Users`
--

CREATE TABLE `Users` (
  `id` int NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL,
  `surname` varchar(32) CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL,
  `ais_id` int DEFAULT NULL,
  `email` varchar(64) CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL,
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `Users`
--

INSERT INTO `Users` (`id`, `name`, `surname`, `ais_id`, `email`, `password`) VALUES
(1, 'miloš', 'blby', 97857, 'milos@gmail.com', 'milosko'),
(2, 'Luxo', 'Fuxo', 97889, NULL, NULL),
(3, 'Jožo', 'Lavý', NULL, 'jozef@gmail.com', 'b6fe850602bd67665c1cb19f6fc4e0ecf46c9e2e'),
(4, 'Janko', 'Mrkva', 95457, NULL, NULL),
(5, 'Miloš ', 'Zeman', 85579, NULL, NULL),
(6, 'Michal', 'Kaminský', 95555, NULL, NULL),
(7, 'Luxo', 'FSER', 85555, NULL, NULL),
(8, 'Fero', 'Gadzo', 7555, NULL, NULL),
(9, 'Arnold', 'Černy', 77777, NULL, NULL),
(10, 'Ivan', 'Milan', 55555, NULL, NULL),
(11, 'Oliver', 'Kahn', 89758, NULL, NULL),
(12, 'František', 'Novy', 74885, NULL, NULL),
(13, 'Lukáš', 'Lobl', 68985, NULL, NULL),
(14, 'Mišo', 'Neviem', 95875, NULL, NULL);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `Answers`
--
ALTER TABLE `Answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `umiestnenia_ifbk_1` (`question_id`),
  ADD KEY `umiestnenia_ifbk_2` (`user_id`);

--
-- Indexy pre tabuľku `Exams`
--
ALTER TABLE `Exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexy pre tabuľku `ExamsLogin`
--
ALTER TABLE `ExamsLogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `Points`
--
ALTER TABLE `Points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_id` (`exam_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexy pre tabuľku `Questions`
--
ALTER TABLE `Questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_id` (`exam_id`,`answer_id`),
  ADD KEY `answer_id` (`answer_id`);

--
-- Indexy pre tabuľku `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `Answers`
--
ALTER TABLE `Answers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT pre tabuľku `Exams`
--
ALTER TABLE `Exams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pre tabuľku `ExamsLogin`
--
ALTER TABLE `ExamsLogin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pre tabuľku `Points`
--
ALTER TABLE `Points`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pre tabuľku `Questions`
--
ALTER TABLE `Questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pre tabuľku `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `Answers`
--
ALTER TABLE `Answers`
  ADD CONSTRAINT `umiestnenia_ifbk_1` FOREIGN KEY (`question_id`) REFERENCES `Questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `umiestnenia_ifbk_2` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Obmedzenie pre tabuľku `Exams`
--
ALTER TABLE `Exams`
  ADD CONSTRAINT `Exams_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Obmedzenie pre tabuľku `Points`
--
ALTER TABLE `Points`
  ADD CONSTRAINT `points_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `Exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `points_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Obmedzenie pre tabuľku `Questions`
--
ALTER TABLE `Questions`
  ADD CONSTRAINT `exam_ifbk_1` FOREIGN KEY (`exam_id`) REFERENCES `Exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
