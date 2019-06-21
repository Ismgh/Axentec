-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2019 at 08:41 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `axentec`
--

-- --------------------------------------------------------

--
-- Table structure for table `archive_person`
--

CREATE TABLE `archive_person` (
  `id_person` varchar(255) NOT NULL,
  `nom_person` varchar(100) DEFAULT NULL,
  `prenom_person` varchar(100) DEFAULT NULL,
  `numero_telephone` varchar(100) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `approuver` tinyint(1) NOT NULL,
  `description` text CHARACTER SET utf8,
  `id_type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archive_person`
--

INSERT INTO `archive_person` (`id_person`, `nom_person`, `prenom_person`, `numero_telephone`, `email`, `approuver`, `description`, `id_type`) VALUES
('qsdfqsdfqsdfsqdf', 'qsdfqsdf', 'qsdfqsdfqs', 'qsdfqsdf', 'qsdfqsdfqsd', 0, 'qsdfqsdfqsd', 'administrateur'),
('qsxszqdcq', 'qsdq', 'qsdqs', '0652325849', 'zjkjkjna@gmail.com', 0, 'un Ã©tudiant vient de s\'inscrire dans la formation : langue francée', 'etudiant');

-- --------------------------------------------------------

--
-- Table structure for table `cathegorie`
--

CREATE TABLE `cathegorie` (
  `id_cathegorie` varchar(100) NOT NULL,
  `image_cathegorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cathegorie`
--

INSERT INTO `cathegorie` (`id_cathegorie`, `image_cathegorie`) VALUES
('cours de soutien', 'school'),
('formation en informatique', 'memory'),
('formation professionnelle', 'work'),
('Les langues vivantes', 'language');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etudiant` varchar(100) NOT NULL,
  `nom_etudiant` varchar(100) NOT NULL,
  `prenom_etudiant` varchar(100) NOT NULL,
  `numero_telephone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `approuver` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `nom_etudiant`, `prenom_etudiant`, `numero_telephone`, `email`, `approuver`) VALUES
('qsxszqdq', 'qsdq', 'qsdqs', '0652325849', 'hatim.ismgh@gmail.com', 0),
('sdfsd', 'qiopôip', 'qîopôlome', '0652325849', 'jobeposition@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `etudiant_formation`
--

CREATE TABLE `etudiant_formation` (
  `id_formation` int(11) NOT NULL,
  `id_etudiant` varchar(100) NOT NULL,
  `nombre_sceance_present` int(11) DEFAULT NULL,
  `nombre_sceance_absent` int(100) DEFAULT NULL,
  `nombre_heures_par_seance` int(11) NOT NULL,
  `seance_1` varchar(100) DEFAULT NULL,
  `seance_2` varchar(100) DEFAULT NULL,
  `seance_3` varchar(100) DEFAULT NULL,
  `seance_4` varchar(100) DEFAULT NULL,
  `seance_5` varchar(100) DEFAULT NULL,
  `seance_6` varchar(100) DEFAULT NULL,
  `id_groupe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etudiant_formation`
--

INSERT INTO `etudiant_formation` (`id_formation`, `id_etudiant`, `nombre_sceance_present`, `nombre_sceance_absent`, `nombre_heures_par_seance`, `seance_1`, `seance_2`, `seance_3`, `seance_4`, `seance_5`, `seance_6`, `id_groupe`) VALUES
(1, 'qsxszqdq', 15, 0, 3, 'mardie_de_3pm_5pm', 'vendredie_de_6pm_5pm_8_am_9_am        ', '', '', '', '', 'g1'),
(1, 'sdfsd', 15, 0, 3, 'mardie_de_3pm_5pm', 'vendredie_de_6pm_5pm_8_am_9_am        ', '', '', '', '', 'g1'),
(2, 'qsxszqdq', 15, 0, 3, 'mardie_de_3pm_5pm', 'vendredie_de_6pm_5pm_8_am_9_am        ', '', '', '', '', 'g1');

-- --------------------------------------------------------

--
-- Table structure for table `formation`
--

CREATE TABLE `formation` (
  `id_formation` int(11) NOT NULL,
  `titre_formation` varchar(100) CHARACTER SET utf8 NOT NULL,
  `image_formation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `petit_description_formation` text COLLATE utf8_unicode_ci NOT NULL,
  `grande_description_formation` text COLLATE utf8_unicode_ci,
  `promotion_formation` double DEFAULT NULL,
  `nombre_heure_par_seance` float NOT NULL,
  `id_cathegorie` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `formation`
--

INSERT INTO `formation` (`id_formation`, `titre_formation`, `image_formation`, `petit_description_formation`, `grande_description_formation`, `promotion_formation`, `nombre_heure_par_seance`, `id_cathegorie`) VALUES
(1, 'bureautique                           ', 'http://getwallpapers.com/wallpaper/full/3/2/f/1256030-large-microsoft-office-wallpaper-themes-1920x1200-for-samsung.jpg', 'rench (le francais, pronounced  or (About this soundlisten) or la langue francaise ) is a Romance langquage of the Indo-European family. It descended from the Vulgar Latin of the Roman Empire, as did all Romance lan', 'Under the Constitution of France, French has been the official language of the Republic since 1992[20] (although the ordinance of Villers-Cotterï¿½ts made it mandatory for legal documents in 1539). France mandates the use of French in official government pu                            ', 0, 1.5, 'Les langues vivantes'),
(2, 'programation                                                     ', 'https://blog.bannersnack.com/wp-content/uploads/2017/03/How-to-Make-Responsive-HTML5-Banner-Ads-.png', 'rench (le francais, pronounced  or (About this soundlisten) or la langue francaise ) is a Romance langquage of the Indo-European family. It descended from the Vulgar Latin of the Roman Empire, as did all Romance lan7oundlisten) or la langue francaise ) is a Romance langquage of the Indo-European family. It descended from the Vulgar Latin of the Roman Empire, as \r\noundlisten) or la langue francaise ) is a Romance langquage of the Indo-European family. It descended from the Vulgar Latin of the Roman Empire, as \r\n', 'Under the Constitution of France, French has been the official language of the Republic since 1992[20] (although the ordinance of Villers-Cotterï¿½ts made it mandatory for legal documents in 1539). France mandates the use of French in official government pure \r\noundlisten) or la langue francaise ) is a Romance langquage of the Indo-European family. It descended from the Vulgar Latin of the Roman Empire, as \r\noundlisten) or la langue francaise ) is a Romance langquage of the Indo-European family. It descended from the Vulgar Latin of the Roman Empire, as \r\noundlisten) or la langue francaise ) is a Romance langquage of the Indo-European family. It descended from the Vulgar Latin of the Roman Empire, as oundlisten) or la langue francaise ) is a Romance langquage of the Indo-European family. It descended from the Vulgar Latin of the Roman Empire, as oundlisten) or la langue francaise ) is a Romance langquage of the Indo-European family. It descended from the Vulgar Latin of the Roman Empire, as                                                                                                             ', 20, 1.5, 'cours de soutien'),
(5, 'langue francee                                                          ', 'https://www.vactualpapers.com/web/wallpapers/saying-hello-in-different-languages-qhd-wallpaper/2560x2560.jpg', 'rench (le francais, pronounced  or (About this soundlisten) or la langue francaise ) is a Romance langquage of the Indo-European family. It descended from the Vulgar Latin of the Roman Empire, as did all Romance lan', 'Under the Constitution of France, French has been the official language of the Republic since 1992[20] (although the ordinance of Villers-Cotterï¿½ts made it mandatory for legal documents in 1539). France mandates the use of French in official government pu                                                        ', 0, 1.5, 'Les langues vivantes');

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

CREATE TABLE `groupe` (
  `id_groupe` varchar(100) NOT NULL,
  `id_proffesseur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupe`
--

INSERT INTO `groupe` (`id_groupe`, `id_proffesseur`) VALUES
('g1', 'naaima_informatique'),
('g3', 'naaima_informatique');

-- --------------------------------------------------------

--
-- Table structure for table `proffesseur`
--

CREATE TABLE `proffesseur` (
  `id_proffesseur` varchar(100) NOT NULL,
  `nom_proffesseur` varchar(100) NOT NULL,
  `prenom_proffesseur` varchar(100) NOT NULL,
  `numero_telephone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `id_formation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proffesseur`
--

INSERT INTO `proffesseur` (`id_proffesseur`, `nom_proffesseur`, `prenom_proffesseur`, `numero_telephone`, `email`, `id_formation`) VALUES
('hatim web', 'Mme', 'naaima', '0652143895', 'gekesun@polyswarms.com', 2),
('naaima_informatique', 'Mme', 'naaima', '0652143896', 'tekesun@polyswarms.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `travaille_stage`
--

CREATE TABLE `travaille_stage` (
  `id_travaille_stage` varchar(100) NOT NULL,
  `image_travaille_stage` varchar(100) DEFAULT NULL,
  `petite_desciption_travaille_stage` text NOT NULL,
  `grand_description_travaille_stage` text,
  `dpublication_travaille_stage` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travaille_stage`
--

INSERT INTO `travaille_stage` (`id_travaille_stage`, `image_travaille_stage`, `petite_desciption_travaille_stage`, `grand_description_travaille_stage`, `dpublication_travaille_stage`) VALUES
('proffeseur de ala langue almand', 'http://eskipaper.com/images/beautiful-germany-wallpaper-1.jpg', 'sqfsqdfq sqfsqdfq sqfsqdfq sqfsqdfq', 'qsddfqsfdq\r\nqsgfqfdgqdf\r\nqsddfqsfdq\r\nqsgfqfdgqdfqsddfqsfdq\r\nqsgfqfdgqdf', '2019-06-16 12:04:29'),
('web developper', 'https://wallpaperbro.com/img/70538.jpg', 'sqfsqdfq sqfsqdfq sqfsqdfq sqfsqdfq', 'qsddfqsfdq\r\nqsgfqfdgqdf\r\nqsddfqsfdq\r\nqsgfqfdgqdfqsddfqsfdq\r\nqsgfqfdgqdf', '2019-06-16 13:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`) VALUES
('administrateur'),
('etudiant');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `user` varchar(100) NOT NULL,
  `email_utilisateur` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`user`, `email_utilisateur`, `password`, `id_type`) VALUES
('dfgwfgwxf', 'jobeposition@gmail.com', 'qsdsdfsqdf', 'administrateur'),
('hatim', 'hatim.ismgh@gmail.com', '0000', 'administrateur'),
('qsxsazea', 'samir@gmail.com', '0000', 'etudiant'),
('qsxszqdq', 'zjkjkjna@gmail.com', '0000', 'etudiant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive_person`
--
ALTER TABLE `archive_person`
  ADD PRIMARY KEY (`id_person`),
  ADD KEY `archive_person_type_FK` (`id_type`);

--
-- Indexes for table `cathegorie`
--
ALTER TABLE `cathegorie`
  ADD PRIMARY KEY (`id_cathegorie`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etudiant`);

--
-- Indexes for table `etudiant_formation`
--
ALTER TABLE `etudiant_formation`
  ADD PRIMARY KEY (`id_formation`,`id_etudiant`),
  ADD KEY `etudiant_formation_group_FK` (`id_groupe`),
  ADD KEY `etudiant_formation_etudiant_FK` (`id_etudiant`);

--
-- Indexes for table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id_formation`),
  ADD KEY `formation_cathegorie_FK` (`id_cathegorie`);

--
-- Indexes for table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id_groupe`),
  ADD KEY `group_proffesseur_FK` (`id_proffesseur`);

--
-- Indexes for table `proffesseur`
--
ALTER TABLE `proffesseur`
  ADD PRIMARY KEY (`id_proffesseur`),
  ADD KEY `proffesseur_formation_FK` (`id_formation`);

--
-- Indexes for table `travaille_stage`
--
ALTER TABLE `travaille_stage`
  ADD PRIMARY KEY (`id_travaille_stage`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`user`),
  ADD KEY `utilisateur_type_FK` (`id_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formation`
--
ALTER TABLE `formation`
  MODIFY `id_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `archive_person`
--
ALTER TABLE `archive_person`
  ADD CONSTRAINT `archive_person_type_FK` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`);

--
-- Constraints for table `etudiant_formation`
--
ALTER TABLE `etudiant_formation`
  ADD CONSTRAINT `etudiant_formation_etudiant_FK` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`),
  ADD CONSTRAINT `etudiant_formation_formation_FK` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id_formation`),
  ADD CONSTRAINT `etudiant_formation_group_FK` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id_groupe`);

--
-- Constraints for table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `group_proffesseur_FK` FOREIGN KEY (`id_proffesseur`) REFERENCES `proffesseur` (`id_proffesseur`);

--
-- Constraints for table `proffesseur`
--
ALTER TABLE `proffesseur`
  ADD CONSTRAINT `proffesseur_formation_FK` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id_formation`);

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_type_FK` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
