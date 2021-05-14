-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: mysql
-- Čas generovania: Pi 14.Máj 2021, 16:10
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
  `correct_answer` varchar(255) CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `Answers`
--

INSERT INTO `Answers` (`id`, `user_id`, `question_id`, `type`, `answer`, `correct_answer`) VALUES
(1, 1, 1, 'Krátka odpoveď', '4096', '4096'),
(2, 1, 2, 'Krátka odpoveď', '69', '69'),
(3, 1, 3, 'Výber správnej odpovede', 'meter štvorcový,meter kubický,meter za sekundu', 'meter štvorcový'),
(4, 1, 4, 'Výber správnej odpovede', 'V,S,D', 'V'),
(5, 1, 5, 'Párovanie odpovedí', '6a*a', '6a*a'),
(6, 1, 6, 'Párovanie odpovedí', '2*(ab+ac+bc)', '2*(ab+ac+bc)'),
(7, 1, 7, 'Párovanie odpovedí', '2Sp + Q', '2Sp + Q'),
(8, 1, 8, 'Párovanie odpovedí', '2πr(r+v)', '2πr(r+v)'),
(9, 2, 12, 'Krátka odpoveď', '250', '250'),
(10, 2, 13, 'Krátka odpoveď', '100', '100'),
(11, 2, 14, 'Výber správnej odpovede', 'Euler,Ronaldo,Tatar', 'Euler'),
(12, 2, 15, 'Výber správnej odpovede', 'O,V,S', 'S'),
(13, 2, 16, 'Párovanie odpovedí', 'a*a*a', 'a*a*a'),
(14, 2, 17, 'Párovanie odpovedí', 'a*b*c', 'a*b*c'),
(15, 2, 18, 'Párovanie odpovedí', 'Sp*v', 'Sp*v'),
(16, 2, 19, 'Párovanie odpovedí', 'π.r*r.v', 'π.r*r.v'),
(17, 3, 1, 'Krátka odpoveď', '4096', NULL),
(18, 3, 2, 'Krátka odpoveď', '69', NULL),
(19, 3, 3, 'Výber správnej odpovede', '', 'meter štvorcový'),
(20, 3, 4, 'Výber správnej odpovede', '', 'V'),
(21, 3, 10, 'Matematický výraz', '4x\n2\n−14x+8', NULL),
(22, 3, 11, 'Matematický výraz', 'ln∣x∣', NULL),
(23, 3, 9, 'Nakreslenie obrázka', 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bWxuczp6d2liYmxlcj0iaHR0cDovL3p3aWJibGVyLmNvbS94bWwiIHZlcnNpb249IjEuMiIgYmFzZVByb2ZpbGU9InRpbnkiIHdpZHRoPSIxOTguNzM0NDI0NTkxMDY0NDUiIGhlaWdodD0iMjAyLjY5MDYxMjM3NTczNjI0IiB2aWV3Qm94PSIwIDAgMTk4LjczNDQyNDU5MTA2NDQ1IDIwMi42OTA2MTIzNzU3MzYyNCI+CiAgPHBhdGggZD0iTTU3My42MDAwMDYxMDM1MTU2LDE1MS4xOTk5OTY5NDgyNDIyIEw1NzMuMzQzNzU5ODk0MzcxLDE1Mi45NDg0MzYyNjAyMjM0IEw1NjYuMTg3NDg5NTA5NTgyNSwxNjMuODg3NDk0MDg3MjE5MjQgTDU1OS4yMTU2MzU3NzY1MTk4LDE3Ni43OTk5ODc3OTI5Njg3NSBMNTQ2LjI2ODc0NTg5OTIwMDQsMjA1LjYwMDAwMDg1ODMwNjg4IEw1MzguMTA5MzczNDUwMjc5MiwyMjAuMjAwMDA4NjkwMzU3MiBMNTM3LjI2ODc2MDY4MTE1MjMsMjIzLjQzNzUyNjIyNjA0MzcgTDUzMy4xMzEyNjMyNTYwNzMsMjI5Ljc3NTAwODQ0MDAxNzcgTDUzMS45OTk5Njk0ODI0MjE5LDIzNC40MDAwMDkxNTUyNzM0NCIgdHJhbnNmb3JtPSJtYXRyaXgoMSAwIDAgMSAtNDY0LjY2MjUwNTE0OTg0MTMgLTQzLjkwOTM3ODQ2ODk5MDMyNikiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzg4NDQwMCIgc3Ryb2tlLXdpZHRoPSIxMCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiB6d2liYmxlcjppZD0iY3lnbm5uIi8+CiAgPHBhdGggZD0iTTYxMy42MDAwMDYxMDM1MTU2LDE2MS41OTk5OTA4NDQ3MjY1NiBMNjEyLjAxNTU5NTQzNjA5NjIsMTczLjk4NDM1OTk3OTYyOTUyIEw2MTIuMDMxMjIxMzg5NzcwNSwyMTYuOTk5OTkxMTc4NTEyNTcgTDYxNS40NTQ2NjU0MjI0Mzk2LDIyOS4yNTE1NjYyMzEyNTA3NiBMNjE5LjA5MDYwODM1ODM4MzIsMjM0LjA1MzEzNzc3OTIzNTg0IEw2MTkuMjU0NjcyNTI3MzEzMiwyMzguMTk4NDQ0MTg3NjQxMTQgTDYyMC43OTk5NTcyNzUzOTA2LDI0MS41OTk5OTA4NDQ3MjY1NiIgdHJhbnNmb3JtPSJtYXRyaXgoMSAwIDAgMSAtNDY0LjY2MjUwNTE0OTg0MTMgLTQzLjkwOTM3ODQ2ODk5MDMyNikiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzg4NDQwMCIgc3Ryb2tlLXdpZHRoPSIxMCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiB6d2liYmxlcjppZD0iaTNmeDZwIi8+CiAgPHBhdGggZD0iTTU4My4xOTk5ODE2ODk0NTMxLDE2NC44MDAwMDMwNTE3NTc4IEw1ODMuNjYyNDc1ODI0MzU2MSwxNjQuMDE1NjEwMDk4ODM4OCBMNTkxLjczNzQ3MzQ4Nzg1NCwxNjMuOTk5OTg0NzQxMjEwOTQgTDU4Ni4zMjQ5ODc0MTE0OTksMTY0LjM3NDk4NjE3MTcyMjQgTDU3OS4yNDY4ODY0OTE3NzU1LDE2Ni4zOTk5OTM4OTY0ODQzOCBMNTc0LjkzNzUxMDk2NzI1NDYsMTY4LjIzMTI1MDI4NjEwMjMgTDU3My45Njg3NTU3MjIwNDU5LDE3MC40MzEyNDk2MTg1MzAyNyBMNTgxLjEyNDk5ODA5MjY1MTQsMTc1LjgzNzQ5OTYxODUzMDI3IEw1OTMuMzI1MDEwMjk5NjgyNiwxODEuNzg3NDk1MTM2MjYxIEw1ODkuMTkyMTczMjQyNTY5LDE4My41NDY4Njg2ODE5MDc2NSBMNTgwLjM0OTk3MDgxNzU2NTksMTg1LjY5OTk5NjQ3MTQwNTAzIEw1ODAuMzQ5OTcwODE3NTY1OSwxODYuMzg3NTAyMTkzNDUwOTMgTDU4Mi44ODc0Nzg4Mjg0MzAyLDE4Ny42MjQ5OTA0NjMyNTY4NCBMNTg5LjQ0Mzc1NDkxMTQyMjcsMTg4LjQzMTI0NDAxNTY5MzY2IEw1NzYuMjkzNzIzMzQ0ODAyOSwxOTIuODkwNjI0NjQyMzcyMTMgTDU3NS4yNzgxMDY2ODk0NTMxLDE5NC44MzEyODE5MDA0MDU4OCBMNTgzLjAyNDk5NjI4MDY3MDIsMTk5LjE2MjQ5MzQ2NzMzMDkzIEw2MDIuMDM3NDk5NDI3Nzk1NCwyMDYuNDAwMDA5MTU1MjczNDQgTDU4MS41ODc1MTYzMDc4MzA4LDIwOS4yMDYyNTE4NTk2NjQ5MiBMNTYyLjYyNDk5NDc1NDc5MTMsMjEwLjY1NjI3NDQ5NzUwOSBMNTY1Ljk5Mzc1MDA5NTM2NzQsMjEyLjgwMDAxMzA2NTMzODEzIEw1NzUuODc0OTcwMTk3Njc3NiwyMTUuNjAwMDIwNzY2MjU4MjQgTDU3Mi4yMTI0ODA1NDUwNDQsMjE4LjExMjUxMzA2NTMzODEzIEw1NjYuNjYyNDk5OTA0NjMyNiwyMjAuMTMxMjQ3NzU4ODY1MzYgTDU2NS42ODc1MDQ3NjgzNzE2LDIyMS42MTI0OTQ0Njg2ODg5NiBMNTY2LjE0MDYyNTIzODQxODYsMjIyLjgxNTY1NzEzODgyNDQ2IEw1OTIuNTM3NTAyMjg4ODE4NCwyMzAuNDAwMDA5MTU1MjczNDQgTDU3Ni44MDAwMTgzMTA1NDY5LDIzMC40MDAwMDkxNTUyNzM0NCIgdHJhbnNmb3JtPSJtYXRyaXgoMSAwIDAgMSAtNDY0LjY2MjUwNTE0OTg0MTMgLTQzLjkwOTM3ODQ2ODk5MDMyNikiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzg4NDQwMCIgc3Ryb2tlLXdpZHRoPSIxMCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiB6d2liYmxlcjppZD0ibjgzbG96Ii8+CiAgPHBhdGggZD0iTTU3Ni44MDAwMTgzMTA1NDY5LDEyNy45OTk5ODQ3NDEyMTA5NCBMNTcxLjEzMTIzNDY0NTg0MzUsMTI5LjU2ODc0MTMyMTU2MzcyIEw1NDYuMzEyNDk3MTM4OTc3LDEyOS41ODc0OTA3OTcwNDI4NSBMNTQxLjM2ODc1OTYzMjExMDYsMTI2LjU3NDk5NDA4NzIxOTI0IEw1NDAuMDMxMjIxMzg5NzcwNSwxMjEuNDk5OTk5MDQ2MzI1NjggTDU0MC4xMzEyMjc0OTMyODYxLDEwNy44Njg3NDE3NTA3MTcxNiBMNTQxLjEwMDAxMTM0ODcyNDQsMTA0LjkxODc1MjE5MzQ1MDkzIEw1NDQuNDM3NTAyODYxMDIzLDEwMy45OTk5ODQ3NDEyMTA5NCBMNTQyLjA5Mzc0ODA5MjY1MTQsMTAzLjMxODc0NDY1OTQyMzgzIEw1MzguMTYyNDk3NTIwNDQ2OCw5Mi41Mzc0OTE3OTg0MDA4OCBMNTM3LjYwMTU2ODU3OTY3MzgsNzcuNzEyNTA0NDQ2NTA2NSBMNTM4LjM4NzQ5NDA4NzIxOTIsNzMuODg3NDkzNjEwMzgyMDggTDU0Ni42ODc0ODk1MDk1ODI1LDY4Ljg4NzUwMTcxNjYxMzc3IEw1NTAuNzY4NzM4MjY5ODA1OSw2OC44MzEyNTMxNzA5NjcxIEw1NTEuNDU0NjY1NDIyNDM5Niw3MC4yOTA2MzM3MzgwNDA5MiBMNTUyLjY1NDY4ODcxNTkzNDgsNzAuMjM1OTQ0OTg2MzQzMzggTDU2MS40MTI1MDk5MTgyMTI5LDYxLjMyNTAwMzYyMzk2MjQgTDU2OS43MjQ5OTY1NjY3NzI1LDUxLjM1MDAwNTYyNjY3ODQ3IEw1NzMuMTQzNzU4ODkzMDEzLDQ4LjkwOTM3ODQ2ODk5MDMyNiBMNTg0LjcyNTAxMjc3OTIzNTgsNDguOTg3NTAwMTkwNzM0ODYgTDU4Ni4xMzc0OTc5MDE5MTY1LDUyLjc5Mzc1MjkwODcwNjY2NSBMNjM4LjMwMDAzNTQ3NjY4NDYsNTIuMTc0OTg1NDA4NzgyOTYgTDYzOS4xNjg3MzQ1NTA0NzYxLDUzLjg2ODc0Nzk0OTYwMDIyIEw2MzguODYyNTEwNjgxMTUyMyw1NS44MjQ5OTk4MDkyNjUxNCBMNjM1LjI5OTk4MzAyNDU5NzIsNTguMTM3NTAwNzYyOTM5NDUgTDY0Ni40MjUwNDExOTg3MzA1LDY3LjQ5OTk5NjE4NTMwMjczIEw2NDkuNDI1MDA4NzczODAzNyw3MS4yMTI0OTM0MTk2NDcyMiBMNjQ5LjU5Njg4MTE1MTE5OTMsNzQuMjU0Njc2MDQzOTg3MjcgTDY0OS4wODkwNzYyODA1OTM5LDc2LjYwNDY4MDM1OTM2MzU2IEw2NDQuMzUzMTIwODAzODMzLDg1LjE5OTk5Njk0ODI0MjE5IEw2MzYuOTc0OTY3OTU2NTQzLDkzLjYxMjQ5NDQ2ODY4ODk2IEw2MzYuODkzNzA4MjI5MDY0OSw5OC40NzgxMTg4OTY0ODQzOCBMNjUzLjMwMzA4NTgwMzk4NTYsMTE5LjQ0ODQ0MzA1NTE1MjkgTDY1OC4zOTY5Mjk3NDA5MDU4LDEyOS4zOTM3NDU5NTg4MDUwOCBMNjU4LjM4MTMwNDc0MDkwNTgsMTMxLjQ5OTk5MjYwOTAyNDA1IEw2NTcuNDAwMDQ0NDQxMjIzMSwxMzIuMjk5OTkyNTYxMzQwMzMgTDY0My4yODc0ODcwMzAwMjkzLDEzNS4zODc0OTQwODcyMTkyNCBMNjQzLjQ2MjQ3NzY4NDAyMSwxMzYuOTMxMjUxMDQ5MDQxNzUgTDY0Ny4xODQzNTgxMTk5NjQ2LDE0MS4xOTk5OTY5NDgyNDIyIEw2NDcuMDI0OTg0MzU5NzQxMiwxNDQuNjg3NTAwOTUzNjc0MzIgTDY0NC41Mzc0NjEyODA4MjI4LDE0OS4zMzc0ODk4NDMzNjg1MyBMNjI5LjI4NzQ4ODkzNzM3NzksMTQ5LjYwNjI0MDk4Nzc3NzcgTDYyMy41Mzc1MDEzMzUxNDQsMTUwLjQzMTI1ODY3ODQzNjI4IEw2MTkuODA2MjIxOTYxOTc1MSwxNTMuMDk5OTk3NTIwNDQ2NzggTDYxMi4xMzEyNDIyNzUyMzgsMTU1LjE5Mzc0NzA0MzYwOTYyIEw2MDAuNDkzNzQ4MTg4MDE4OCwxNTUuMTg3NDk2OTAwNTU4NDcgTDU5Ni4zOTk5OTM4OTY0ODQ0LDE1Mi44MTU2Mjc4MTMzMzkyMyBMNTcyLjUxNTYwNjA0NTcyMywxNTEuMTQ1MzEwMjgyNzA3MjEgTDU3MS4zMzEyMjk2ODY3MzcxLDE1MC4xMzc1MDgxNTM5MTU0IEw1NzEuMDY4NzMzNjkyMTY5MiwxNDcuOTk5OTg5NzQ4MDAxMSBMNTY1LjczMTI1NDEwMDc5OTYsMTM4LjUzMTI1MjE0NTc2NzIgTDU2NS42MDAwMDYxMDM1MTU2LDEzMS4xOTk5OTY5NDgyNDIyIiB0cmFuc2Zvcm09Im1hdHJpeCgxIDAgMCAxIC00NjQuNjYyNTA1MTQ5ODQxMyAtNDMuOTA5Mzc4NDY4OTkwMzI2KSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjMDA4ODAwIiBzdHJva2Utd2lkdGg9IjEwIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHp3aWJibGVyOmlkPSI2amgwaXYiLz4KICA8cGF0aCBkPSJNNDgzLjE5OTk4MTY4OTQ1MzEsMjEyLjgwMDAwMzA1MTc1NzggTDQ3Ni4yOTk5ODk3MDAzMTc0LDIwOS42MDYyNDA5ODc3Nzc3IEw0NzIuMDk5OTgyMjYxNjU3NywyMDkuNjg3NDkyODQ3NDQyNjMgTDQ2OS42ODc1MDQ3NjgzNzE2LDIxMi4wOTk5OTcwNDM2MDk2MiBMNDY5LjY2MjUwNTE0OTg0MTMsMjE3LjI2ODc0NTY2MDc4MTg2IEw0NzMuNzMxMjU0MTAwNzk5NTYsMjE5Ljg2ODc0Njc1NzUwNzMyIEw0ODAuNjEyNTA2ODY2NDU1MSwyMTkuODI0OTg3NDExNDk5MDIgTDQ4MC41NDUzMTUzODQ4NjQ4LDIxNi42MDE1NTg5MjM3MjEzIEw0NzcuNTAwMDA3NjI5Mzk0NTMsMjE1Ljk5OTk4NDc0MTIxMDk0IEw0NzYuODMxMjY3ODMzNzA5NywyMTYuNjU2MjM3MzYzODE1MyBMNDc2Ljk4NzUxNTQ0OTUyMzksMjE5LjkxMjQ5Mjc1MjA3NTIgTDQ4Mi41NDUzMDQxNzkxOTE2LDIxOS43NDUzMjAzMjAxMjk0IEw0ODMuOTQ1MjgyODE2ODg2OSwyMTguMjAwMDA2NzIzNDAzOTMgTDQ4My44OTA1OTYxNTEzNTE5MywyMTQuNjU0NzExOTYxNzQ2MjIgTDQ3Ny42NTQ2OTI3NjkwNTA2LDIxNC42NTQ3MTE5NjE3NDYyMiBMNDc3Ljg1NDY4OTcxNzI5MjgsMjE1Ljk0NTMwMjI0ODAwMTEgTDQ4MC44MDAwMTgzMTA1NDY5LDIxNS45OTk5ODQ3NDEyMTA5NCIgdHJhbnNmb3JtPSJtYXRyaXgoMSAwIDAgMSAtNDY0LjY2MjUwNTE0OTg0MTMgLTQzLjkwOTM3ODQ2ODk5MDMyNikiIGZpbGw9Im5vbmUiIHN0cm9rZT0iI2ZmMDAwMCIgc3Ryb2tlLXdpZHRoPSIxMCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiB6d2liYmxlcjppZD0ia2x5dzg2Ii8+CiAgPHBhdGggZD0iTTQ3Ni44MDAwMTgzMTA1NDY5LDIwNy45OTk5ODQ3NDEyMTA5NCBMNDc3LjYwMDAwNjEwMzUxNTYsMjAwLjgwMDAwMzA1MTc1NzgiIHRyYW5zZm9ybT0ibWF0cml4KDEgMCAwIDEgLTQ2NC42NjI1MDUxNDk4NDEzIC00My45MDkzNzg0Njg5OTAzMjYpIiBmaWxsPSJub25lIiBzdHJva2U9IiMwMDg4MDAiIHN0cm9rZS13aWR0aD0iMTAiIHN0cm9rZS1saW5lam9pbj0icm91bmQiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgendpYmJsZXI6aWQ9Im5mcGppbyIvPgo8L3N2Zz4K', NULL),
(24, 3, 6, 'Párovanie odpovedí', '2*(ab+ac+bc)', NULL),
(25, 3, 8, 'Párovanie odpovedí', '2πr(r+v)', NULL),
(26, 3, 5, 'Párovanie odpovedí', '6a*a', NULL),
(27, 3, 7, 'Párovanie odpovedí', '2Sp + Q', NULL);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `Exams`
--

CREATE TABLE `Exams` (
  `id` int NOT NULL,
  `exam_code` varchar(32) CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `title` varchar(32) CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL,
  `time_limit` varchar(128) CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `exam_points` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `Exams`
--

INSERT INTO `Exams` (`id`, `exam_code`, `user_id`, `title`, `time_limit`, `is_active`, `exam_points`) VALUES
(1, '171353', 1, 'Test z matematiky', '900000', 1, 30),
(2, '8f944a', 2, 'Previerka z matematiky', '900000', 0, 40);

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

--
-- Sťahujem dáta pre tabuľku `ExamsLogin`
--

INSERT INTO `ExamsLogin` (`id`, `exam_id`, `user_id`, `finished`, `leave_tab`) VALUES
(1, 1, 3, 1, 1);

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

--
-- Sťahujem dáta pre tabuľku `Points`
--

INSERT INTO `Points` (`id`, `exam_id`, `student_id`, `question1_points`, `question2_points`, `question3_points`, `question4_points`, `question5_points`, `question6_points`, `question7_points`, `question8_points`, `question9_points`, `question10_points`, `question11_points`, `all_points`) VALUES
(1, 1, 3, 2, 2, 3, 3, 4, 4, 4, 2, 2, 2, 2, 30);

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
(1, 1, 'Vypočítajte  8*8*8*8', 1, 'Krátka odpoveď', 2),
(2, 1, 'Vypočítajte (128/2)+25-(5*4)', 2, 'Krátka odpoveď', 2),
(3, 1, 'Rozloha sa meria v ?', 3, 'Výber správnej odpovede', 3),
(4, 1, 'Značka pre objem', 4, 'Výber správnej odpovede', 3),
(5, 1, 'Obsah kocky', 5, 'Párovanie odpovedí', 2),
(6, 1, 'Obsah kvádra', 6, 'Párovanie odpovedí', 2),
(7, 1, 'Obsah Hranolu', 7, 'Párovanie odpovedí', 2),
(8, 1, 'Obsah Valca', 8, 'Párovanie odpovedí', 2),
(9, 1, 'jablko nepáda ďaleko od stromu', 0, 'Nakreslenie obrázka', 4),
(10, 1, 'Derivuj y = 5x^3 -7x^2 + 8x -14', 0, 'Matematický výraz', 4),
(11, 1, 'Napíš vzorec pre Integrál 1/x', 0, 'Matematický výraz', 4),
(12, 2, '7*7*7 - 93', 9, 'Krátka odpoveď', 3),
(13, 2, '55/11 * 20', 10, 'Krátka odpoveď', 3),
(14, 2, 'Známy matematik', 11, 'Výber správnej odpovede', 4),
(15, 2, 'Značka pre Obsah', 12, 'Výber správnej odpovede', 4),
(16, 2, 'Objem kocky', 13, 'Párovanie odpovedí', 3),
(17, 2, 'Objem kvádra', 14, 'Párovanie odpovedí', 3),
(18, 2, 'Objem hranolu', 15, 'Párovanie odpovedí', 3),
(19, 2, 'Objem valca', 16, 'Párovanie odpovedí', 3),
(20, 2, 'ihlan', 0, 'Nakreslenie obrázka', 4),
(21, 2, 'Vzorec pre deriváciu sin x', 0, 'Matematický výraz', 5),
(22, 2, 'Vzorec pre integrál sin x', 0, 'Matematický výraz', 5);

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
(1, 'Ján', 'Nový', NULL, 'novy@gmail.com', 'b6fe850602bd67665c1cb19f6fc4e0ecf46c9e2e'),
(2, 'Peter', 'Hraško', NULL, 'hrasko@gmail.com', '4b8373d016f277527198385ba72fda0feb5da015'),
(3, 'Lukáš', 'Löbl', 97857, NULL, NULL);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pre tabuľku `Exams`
--
ALTER TABLE `Exams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pre tabuľku `ExamsLogin`
--
ALTER TABLE `ExamsLogin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pre tabuľku `Points`
--
ALTER TABLE `Points`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pre tabuľku `Questions`
--
ALTER TABLE `Questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pre tabuľku `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
