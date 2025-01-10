-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 10 jan. 2025 à 20:50
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `saminfo`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idc` int(11) NOT NULL,
  `jour` datetime NOT NULL DEFAULT current_timestamp(),
  `idcl` int(11) NOT NULL,
  `id_p` int(11) NOT NULL,
  `qte_c` int(11) NOT NULL,
  `livraison` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idc`, `jour`, `idcl`, `id_p`, `qte_c`, `livraison`) VALUES
(127, '2020-12-16 00:56:50', 68, 1, 8, 'magasin'),
(128, '2020-12-16 00:56:50', 68, 3, 4, 'magasin'),
(129, '2020-12-16 11:59:19', 69, 1, 1, 'magasin'),
(130, '2020-12-16 11:59:19', 69, 3, 1, 'magasin'),
(131, '2020-12-16 11:59:19', 69, 6, 1, 'magasin'),
(132, '2020-12-16 11:59:19', 69, 7, 1, 'magasin'),
(133, '2020-12-16 11:59:19', 69, 102, 1, 'magasin'),
(134, '2020-12-16 11:59:19', 69, 103, 1, 'magasin'),
(135, '2020-12-16 11:59:19', 69, 104, 1, 'magasin'),
(136, '2020-12-16 11:59:19', 69, 105, 1, 'magasin'),
(137, '2020-12-16 12:01:24', 69, 1, 1, 'magasin'),
(138, '2020-12-16 12:01:24', 69, 3, 1, 'magasin'),
(139, '2020-12-16 12:01:24', 69, 6, 1, 'magasin'),
(140, '2020-12-16 12:01:24', 69, 7, 1, 'magasin'),
(141, '2020-12-16 12:01:24', 69, 102, 1, 'magasin'),
(142, '2020-12-16 12:01:24', 69, 103, 1, 'magasin'),
(143, '2020-12-16 12:01:24', 69, 104, 1, 'magasin'),
(144, '2020-12-16 12:01:24', 69, 105, 1, 'magasin'),
(145, '2020-12-16 12:08:23', 69, 1, 2, 'magasin'),
(146, '2020-12-16 12:11:45', 69, 1, 1, 'Poste Tunisienne'),
(147, '2020-12-16 12:14:31', 69, 1, 1, 'Poste Tunisienne'),
(148, '2020-12-16 12:14:31', 69, 3, 1, 'Poste Tunisienne'),
(149, '2025-01-10 20:36:10', 70, 102, 1, 'magasin');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `img_path` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `img_path`) VALUES
(47, 'téléchargé (2).jpg'),
(48, '98045338_2563595237223469_7327908269396066304_o.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idp` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `pu` varchar(50) NOT NULL,
  `qte` int(11) NOT NULL DEFAULT 0,
  `img` varchar(250) DEFAULT NULL,
  `cat` varchar(50) NOT NULL,
  `caracteristique` text NOT NULL,
  `couleur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idp`, `nom`, `pu`, `qte`, `img`, `cat`, `caracteristique`, `couleur`) VALUES
(1, 'Dell Inspiron 3580 CEL 4205U 4Go 500Go W10 15,6', '659,000', 2, 'dell-inspiron-3580-cel-4205u-4go-500go-w10-156.webp', 'ordinateur Portable', 'Processeur: Intel Celeron N4205 Dual-Core (1.8 GHz, 2 Mo de mémoire cache  - Mémoire RAM: 4 Go DDR4 - Disque dur: 500 Go - Ecran 15.6\" FHD -Carte graphique: Intel HD Graphics- Systéme d\'exploitation: Windows 10', 'Black'),
(3, 'PCc portable HP15-db0012nk AMD A6-9225 Noir', '769', 1, 'pcc-portable-hp15-db0012nk-amd-a6-9225-noir.webp', 'ordinateur portable', 'Modèle : HP15-db0012nk\r\n\r\nProcesseur AMD A6-9225 (de 2.6 GHz à 3 GHz, 1Mo de mémoire cache), Mémoire RAM 4 Go DDR4, Disque Dur 1To HDD, Carte graphique AMD Radeon™ R4 , Wifi, Bluetooth, HDMI, Ecran 15.6\" LED HD.\r\n\r\nWINDOWS 10 HOME', 'Noir'),
(6, 'PC Portable LENOVO IdeaPad S145 Dual-Core 4Go 1To ', '739,000', 50, '94256-large_default.jpg', 'ordinateur Portable', 'Ecran 15.6\" HD LED - Processeur: Dual-Core AMD A6-9225 (2.6 GHz up to 3.0 GHz, Dual-Core) - FreeDos - Mémoire RAM: 4 Go DDR4 - Disque Dur: 1 To - Carte Graphique: Intel HD Graphics avec  Wifi', 'Noir '),
(7, 'Pc Portable HP 15-dw1002nk Celeron N4020 4Go 1To (', '859,000', 22, 'pc-portable-asus-x543ma-dual-core-4-go-silver-sim-orange-offerte-60-go.jpg', 'ordinateur portable', 'Ecran 15.6\" HD LED - Processeur: Intel Celeron N4020 (1.1 GHz, up to 2.8 GHz, 4 Mo de mémoire cache, Dual-Core) - Windows 10 - Mémoire RAM: 4 Go - Disque Dur: 1 To - Carte Graphique: Intel HD Graphics avec WiFi,USB Lecteur de cartes mémoires ', 'Silver'),
(102, 'PC Portable LENOVO IdeaPad S145 Dual-Core 4Go 1To ', '739,000', 50, 'dell-inspiron-3593-i5-1035g1-4go-1to-2go-w10-156.webp', 'ordinateur Portable', 'Ecran 15.6\" HD LED - Processeur: Dual-Core AMD A6-9225 (2.6 GHz up to 3.0 GHz, Dual-Core) - FreeDos - Mémoire RAM: 4 Go DDR4 - Disque Dur: 1 To - Carte Graphique: Intel HD Graphics avec  Wifi', 'Noir '),
(103, 'Téléphone Portable DORO 1360 - Noir', '85,900', 5, '77236-large_default.jpg', 'ordinateur Portable', 'Téléphone Portable DORO 1360 - Ecran: 2.4\" QVGA (320 x 240) - Stockage: 8 Mo - Capacité du répertoire: 100 - Lecteur de Carte Mémoire Extensible Jusqu\'à 32 Go - Appareil photo: CIF - Avec Socle de charge; Radio FM, lecteur MP3 - Double SIM - Capacité Batterie: 800mAh ', 'Noir'),
(104, 'Pc Portable Gamer LENOVO L340 i5 9é Gén 8Go 2To - ', '2 599,000', 5, '96202-thickbox_default.jpg', 'ordinateur Gamer', 'Ecran 15.6\" FULL HD - Processeur: Intel Core i5-9300HF (2.4 GHz up to 4.1 GHz, 8 Mo de mémoire cache, Quad-Core) - Systéme D\'exploitation: FreeDos - Mémoire RAM: 8 Go DDR4 - Disque dur: 2 To - Carte graphique: NVIDIA GeForce GTX 1650 avec (4 Go de mémoire dédiée) avec Wi-Fi, Bluetooth et USB 3.1 - Clavier rétroéclairé - Garantie: 2ans', 'Noir'),
(105, 'Souris Gamer JEDEL GM850 - Noir', '5,900', 5, '92152-large_default.jpg', 'accessoires Gamer', 'Souris Gamer JEDEL GM850 - Connectivité: Filaire - Interface avc l\'ordinateur: USB - 7 boutons - Longueur du câble: 1.5m - Windows XP jusqu‎’‎à Windows 10/Linux/Mac - Rétroéclairage 7', 'Noir');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_u` int(11) NOT NULL,
  `name_u` varchar(255) NOT NULL,
  `prenom_u` varchar(255) NOT NULL,
  `adresse_u` varchar(200) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `dateNaiss` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `role_u` varchar(50) NOT NULL DEFAULT '0',
  `recevoir_offre` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_u`, `name_u`, `prenom_u`, `adresse_u`, `code_postal`, `pays`, `telephone`, `dateNaiss`, `email`, `pwd`, `role_u`, `recevoir_offre`) VALUES
(67, 'jemai', 'sameh', 'henchir safsaf sidi mansour ghazela bizerte', 7030, 'bizerte', '24443862', '2020-12-12', 'samehjemai@gmail.com', 'sameh', 'Particuliere', 0),
(68, 'sameh', 'sameh', 'ben arous bizerte', 7030, 'bizerte', '24443862', '2020-12-11', 'samehjemai98@gmail.com', 'kjhgfd', 'Particuliere', 0),
(69, 'sameh', 'sameh', 'henchir safsaf sidi mansour ghazela bizerte', 7030, 'gf', '24443862', '2020-12-10', 'sameh8@gmail.com', 'kjhgfd', 'Particuliere', 0),
(70, 'jemai', 'sameh', 'tunisie', 7030, 'tunisie', '24578549', '2025-01-20', 'sameh.jemai4@gmail.com', '1234', 'Particuliere', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idc`),
  ADD KEY `id_p` (`id_p`),
  ADD KEY `fk_commande_user` (`idcl`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idp`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_commande_produit` FOREIGN KEY (`id_p`) REFERENCES `produit` (`idp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_commande_user` FOREIGN KEY (`idcl`) REFERENCES `user` (`id_u`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
