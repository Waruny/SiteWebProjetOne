-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2019 at 04:38 PM
-- Server version: 5.7.24-log
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trubl_bdd`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoriesproduit`
--

CREATE TABLE `categoriesproduit` (
  `id` int(11) NOT NULL,
  `nom_categorie` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cat_slug` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categoriesproduit`
--

INSERT INTO `categoriesproduit` (`id`, `nom_categorie`, `cat_slug`) VALUES
(1, 'PC de bureau', 'pc-de-bureau'),
(2, 'PC portable', 'pc-portable'),
(3, 'Écrans', 'ecrans'),
(4, 'Disques durs', 'disques-durs'),
(5, 'SSD', 'ssd'),
(6, 'Périphériques', 'peripheriques');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `email_client` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `mdp_client` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `nom_client` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom_client` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ville_client` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `codePostal_client` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `dateInscription_client` datetime DEFAULT CURRENT_TIMESTAMP,
  `tel_client` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `adresse_client` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adresse2_client` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `email_client`, `mdp_client`, `nom_client`, `prenom_client`, `ville_client`, `codePostal_client`, `dateInscription_client`, `tel_client`, `adresse_client`, `adresse2_client`) VALUES
(0, 'johndoe@gmail.com', 'john77', 'Doe', 'John', 'Lagny', '77400', '2019-05-26 18:17:04', '012345678', '3 avenue de la République', ''),
(1, 'daenerystargaryen@gmail.com', 'dae77', 'Targaryen', 'Daenerys', 'Volantis', '123456', '2019-05-26 18:17:04', '012345678', '3 avenue de des 7 Royaumes', ''),
(2, 'johnsnow@gmail.com', 'john77', 'Snow', 'John', 'Winterfell', '77888', '2019-05-26 18:17:04', '012345678', '7 rue du mur', ''),
(3, 'tyrionlannister@gmail.com', 'nain75', 'Lannister', 'Tyrion', 'Port-Réal', '77490', '2019-05-26 18:17:04', '012345678', '45 avenue de la Hache', ''),
(4, 'cerseilannister@gmail.com', 'cers77', 'Lannister', 'Cersei', 'Port-Réal', '77400', '2019-05-26 18:17:04', '012345678', '42 rue de la vigne', ''),
(5, 'adammartin@gmail.com', 'adam77', 'Martin', 'Adam', 'Bry sur Marne', '77600', '2019-05-26 18:17:04', '012345678', '4 impasse beaumarchais', ''),
(6, 'anthonybernard@gmail.com', 'anthony78', 'Bernard', 'Anthony', 'Neuilly sur Marne', '77700', '2019-05-26 18:17:04', '012345678', '4 impasse beaumarchais', ''),
(7, 'charlesthomas@gmail.com', 'charles79', 'Thomas', 'Charles', 'Paris', '75000', '2019-05-26 18:17:04', '012345678', '4 rue du louvre', ''),
(8, 'emiliedubois@gmail.com', 'emilie77', 'Dubois', 'Emilie', 'Paris', '75000', '2019-05-26 18:17:04', '012345678', '12 rue du quatre septembre', ''),
(9, 'leamoreau@gmail.com', 'lea77', 'Moreau', 'Léa', 'Pré en pail', '53100', '2019-05-26 18:17:04', '012345678', '4 cité du vieux chêne', ''),
(10, 'charlottemorel@gmail.com', 'cha77', 'Morel', 'Charlotte', 'nice', '06100', '2019-05-26 18:17:04', '012345678', '4 avenue de nice', ''),
(11, 'gabrielfournier@gmail.com', 'gaby77', 'Fournier', 'Gabriel', 'Monaco', '98000', '2019-05-26 18:17:04', '012345678', '8 avenue de la république', ''),
(12, 'gabrielledurand@gmail.com', 'gabydurand', 'Durand', 'Gabrielle', 'dignes les bains', '04420', '2019-05-26 18:17:04', '012345678', '8 rue de l\'éléphant', ''),
(13, 'juliettelefevre@gmail.com', 'ju66', 'Lefèvre', 'Juliette', 'Dijon', '21000', '2019-05-26 18:17:04', '012345678', '8 rue de la marianne', ''),
(14, 'julinesimon@gmail.com', 'julinesimon', 'Simon', 'Juline', 'Lyon', '69004', '2019-05-26 18:17:04', '012345678', '8 avenue de lyon', ''),
(15, 'leogirard@gmail.com', 'leogirad', 'Girard', 'Léo', 'Brest', '29200', '2019-05-26 18:17:04', '012345678', '12 rue du général leclerc', ''),
(16, 'davidlambert@gmail.com', 'dav66', 'David', 'Lambert', 'Lille', '59160', '2019-05-26 18:17:04', '012345678', '19 rue de l\'église', ''),
(17, 'samuelfontaine@gmail.com', 'sam104', 'Fontaine', 'Samuel', 'Cambrai', '59281', '2019-05-26 18:17:04', '012345678', '22 impasse de l\'église', ''),
(18, 'tristanbonnet@gmail.com', 'trist04', 'Bonnet', 'Tristan', 'Meaux', '77100', '2019-05-26 18:17:04', '012345678', '2 rue de l\'abbé Pierre Jouve', ''),
(19, 'nicolasmuller@gmail.com', 'nico14', 'Muller', 'Nicolas', 'Montfermeil', '93370', '2019-05-26 18:17:04', '012345678', '24 rue de la maison rouge', ''),
(20, 'lucasrousseau@gmail.com', 'lu17', 'Rousseau', 'Lucas', 'Brou Sur Chantereine', '77177', '2019-05-26 18:17:04', '012345678', '2 avenue Edouard Gourdon', '');

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `montant_commande` float NOT NULL,
  `nomClient_commande` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adresse_commande` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adresse2_commande` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ville_commande` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `codePostal_commande` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tel_commande` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `taxes_commande` float NOT NULL,
  `livraison_commande` float NOT NULL,
  `envoie_commande` tinyint(1) DEFAULT NULL,
  `date_commande` datetime DEFAULT CURRENT_TIMESTAMP,
  `email_commande` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lignecommande`
--

CREATE TABLE `lignecommande` (
  `id` int(11) NOT NULL,
  `nom_ligne` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `prix_ligne` float NOT NULL,
  `SKU_ligne` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quantite_ligne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `nom_produit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `produit_slug` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `descriptif` text COLLATE utf8_unicode_ci NOT NULL,
  `prix_produit` float NOT NULL,
  `poids_produit` float NOT NULL,
  `image_produit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_produit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stock_produit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `id_categorie`, `nom_produit`, `produit_slug`, `descriptif`, `prix_produit`, `poids_produit`, `image_produit`, `date_produit`, `stock_produit`) VALUES
(1, 1, 'iMac 21.5\" i5 2.3GHZ 8Go', 'imac-215-i5-8G', 'Ibi victu recreati et quiete, postquam abierat timor, vicos opulentos adorti equestrium adventu cohortium, quae casu propinquabant, nec resistere planitie porrecta conati digressi sunt retroque concedentes omne iuventutis robur relictum in sedibus acciverunt.', 1234.99, 9.44, 'img/imac-215.jpg', '2019-03-20 21:01:52', 100),
(2, 1, 'PC de bureau Elite', 'pc-bureau-elite', 'Incenderat autem audaces usque ad insaniam homines ad haec, quae nefariis egere conatibus, Luscus quidam curator urbis subito visus: eosque ut heiulans baiolorum praecentor ad expediendum quod orsi sunt incitans vocibus crebris. qui haut longe postea ideo vivus exustus est.', 1999.99, 26.59, 'img/elite.jpg', '2019-03-20 21:02:05', 29),
(3, 6, 'Corsair K70 ', 'corsair-k70', 'Incenderat autem audaces usque ad insaniam homines ad haec, quae nefariis egere conatibus, Luscus quidam curator urbis subito visus: eosque ut heiulans baiolorum praecentor ad expediendum quod orsi sunt incitans vocibus crebris. qui haut longe postea ideo vivus exustus est.', 129.95, 1.2, 'img/AR201804260116_g1.jpg', '2019-03-20 21:08:42', 221),
(4, 2, 'TRUBL PC portable office', 'trubl-pc-portable-office', 'Ex his quidam aeternitati se commendari posse per statuas aestimantes eas ardenter adfectant quasi plus praemii de figmentis aereis sensu carentibus adepturi, quam ex conscientia honeste recteque factorum, easque auro curant inbracteari, quod Acilio Glabrioni delatum est primo, cum consiliis armisque regem superasset Antiochum. ', 899.99, 2, 'img/MN0005212082_1_0005223102.jpg', '2019-06-04 11:45:38', 36),
(5, 2, 'TRUBL PC portable Home', 'trubl-pc-portable-home', 'Censorius Cato monstravit. qui interrogatus quam ob rem inter multos... statuam non haberet malo inquit ambigere bonos quam ob rem id non meruerim, quam quod est gravius cur inpetraverim mussitare.', 699.99, 1.8, 'img/MN0005084822_1_0005225307.jpg', '2019-06-04 13:42:23', 7),
(6, 3, 'Écran TRUBL 26 pouces', 'ecran-trubl-26', 'Et Epigonus quidem amictu tenus philosophus, ut apparuit, prece frustra temptata, sulcatis lateribus mortisque metu admoto turpi confessione cogitatorum socium, quae nulla erant, fuisse firmavit cum nec vidisset.', 289.99, 2, 'img/AR201801290040_g1.jpg', '2019-06-04 15:50:33', 89),
(7, 3, 'Écran TRUBL 24 pouces', 'ecran-trubl-24', 'Et Epigonus quidem amictu tenus philosophus, ut apparuit, prece frustra temptata, sulcatis lateribus mortisque metu admoto turpi confessione cogitatorum socium, quae nulla erant, fuisse firmavit cum nec vidisset.', 199.99, 1.5, 'img/MN0005141686_1.jpg', '2019-06-04 15:54:09', 46),
(8, 4, 'Western Digital Black 10to', 'wd-black-10to', 'Et Epigonus quidem amictu tenus philosophus, ut apparuit, prece frustra temptata, sulcatis lateribus mortisque metu admoto turpi confessione cogitatorum socium, quae nulla erant, fuisse firmavit cum nec vidisset.', 59.89, 0.5, 'img/MN0005238744_1.jpg', '2019-06-04 15:59:49', 126),
(9, 4, 'Seagate 2TO', 'hdd-seagate-2to', 'Et Epigonus quidem amictu tenus philosophus, ut apparuit, prece frustra temptata, sulcatis lateribus mortisque metu admoto turpi confessione cogitatorum socium, quae nulla erant, fuisse firmavit cum nec vidisset quicquam nec audisset penitus expers forensium rerum; Eusebius vero obiecta fidentius negans, suspensus in eodem gradu constantiae stetit latrocinium illud esse, non iudicium clamans.', 29.99, 0.4, 'img/MN0005273644_1.jpg', '2019-06-04 16:01:50', 101),
(10, 5, 'SSD Crucial 250go', 'ssd-crucial-250go', 'Et Epigonus quidem amictu tenus philosophus, ut apparuit, prece frustra temptata, sulcatis lateribus mortisque metu admoto turpi confessione cogitatorum socium, quae nulla erant, fuisse firmavit cum nec vidisset quicquam nec audisset penitus expers forensium rerum; Eusebius vero obiecta fidentius negans, suspensus in eodem gradu constantiae stetit latrocinium illud esse, non iudicium clamans.', 129.99, 0.3, 'img/AR201711210115_g1.jpg', '2019-06-04 16:09:59', 78),
(12, 5, 'SSD PNY 120go', 'ssd-pny-120go', 'Et Epigonus quidem amictu tenus philosophus, ut apparuit, prece frustra temptata, sulcatis lateribus mortisque metu admoto turpi confessione cogitatorum socium, quae nulla erant, fuisse firmavit cum nec vidisset quicquam nec audisset penitus expers forensium rerum; Eusebius vero obiecta fidentius negans, suspensus in eodem gradu constantiae stetit latrocinium illud esse, non iudicium clamans.', 68.99, 0.3, 'img/AR201704200066_g2.jpg', '2019-06-04 16:14:13', 12),
(14, 6, 'Souris TRUBL', 'souris-trubl', 'Et Epigonus quidem amictu tenus philosophus, ut apparuit, prece frustra temptata, sulcatis lateribus mortisque metu admoto turpi confessione cogitatorum socium, quae nulla erant, fuisse firmavit cum nec vidisset quicquam nec audisset penitus expers forensium rerum; Eusebius vero obiecta fidentius negans, suspensus in eodem gradu constantiae stetit latrocinium illud esse, non iudicium clamans.', 29.99, 0.1, 'img/AR201711030047_g1.jpg', '2019-06-04 16:16:39', 147);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `username`, `password`, `mail`, `created_at`) VALUES
(1, 'valko', '$2y$10$S39eint9WoVmlfLwUp4UjOcoQdDCT2Cs8Ii08aIDstVgPO/AmpmGy', 'valko@prestacode.com', '2019-03-18 20:51:09'),
(2, 'kelig', '$2y$10$vSQKcjRxoMvyChaKd7XrYu.YUXwW4dF2EmjURp/XGIYXLvPZGfGpi', 'kelig@prestacode.com', '2019-06-04 00:43:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoriesproduit`
--
ALTER TABLE `categoriesproduit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lignecommande`
--
ALTER TABLE `lignecommande`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produits_categorie` (`id_categorie`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `fk_produits_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categoriesproduit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
