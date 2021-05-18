-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 18 mai 2021 à 12:58
-- Version du serveur :  5.7.28
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `elarwika`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) CHARACTER SET utf8 NOT NULL,
  `image` varchar(200) CHARACTER SET utf8 NOT NULL DEFAULT 'default.png',
  `ordre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3270 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `image`, `ordre`) VALUES
(2, 'Savons mains', 'default.png', 0),
(9, 'Vaisselles', 'default.png', 0),
(11, 'Confitures', 'default.png', 0),
(19, 'Boissons', 'default.png', 0),
(20, 'Pâtes', 'default.png', 0),
(29, 'Chips', '29_1plandetravail1.png', 0),
(3242, 'Produits nettoyants', 'default.png', 0),
(3243, 'Sucre', '3243_sugar.png', 0),
(3244, 'Mayonnaise', 'default.png', 0),
(3245, 'Épices', 'default.png', 0),
(3246, 'Yaourts', 'default.png', 0),
(3247, 'Margarines', 'default.png', 0),
(3248, 'Farines', 'default.png', 0),
(3249, 'Huile', '3249_105.png', 0),
(3250, 'Lait', 'default.png', 0),
(3251, 'Riz', 'default.png', 0),
(3252, 'Couscous', 'default.png', 0),
(3253, 'Céréales', 'default.png', 0),
(3254, 'Chocolat', 'default.png', 0),
(3255, 'Couches bébé', 'default.png', 0),
(3256, 'Fromage', '3256_104.png', 0),
(3257, 'Thé', '3257_mint01.png', 0),
(3258, 'Gateau', '3258_103.png', 0),
(3259, 'Lentille', '3259_106.png', 0),
(3260, 'Jus', '3260_107.png', 0),
(3261, 'Café', '3261_102.png', 10),
(3262, 'Smen', '3262_smen.png', 0),
(3264, 'Miel', '3264_hony1.png', 0),
(3265, 'Pois chiche', '3265_poischiche01.jpeg', 0),
(3266, 'Haricot', '3266_bean.png', 0),
(3268, 'Frik', '3268_frik.jpeg', 0),
(3269, 'Pois cassés', '3269_poiscassea.jpeg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `heure` int(11) NOT NULL,
  `minute` int(11) NOT NULL,
  `date_insert` date NOT NULL,
  `valide` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `id_user`, `type`, `nom`, `email`, `telephone`, `date`, `heure`, `minute`, `date_insert`, `valide`) VALUES
(18, 35, 1, 'testing123@live.fr testing123@live.fr', 'testing123@live.fr', '0553535353', '2020-12-15', 10, 45, '2020-12-15', 0),
(19, 35, 0, 'testing123@live.fr testing123@live.fr', 'testing123@live.fr', '0553535353', '2020-12-15', 18, 20, '2020-12-15', 0),
(20, 36, 0, 'hamouche myriam', 'myr.hamouche@gmail.com', '0559058978', '2021-01-22', 12, 2, '2021-01-21', 0),
(21, 37, 1, 'hamouche ayoub', 'ay.hamouche@gmail.com', '0770531819', '2021-01-21', 11, 2, '2021-01-21', 0),
(22, 38, 0, 'nesrine nesrine', 'bobose.ange@gmail.com', '0770144250', '2021-02-24', 8, 1, '2021-02-24', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commande_detail`
--

DROP TABLE IF EXISTS `commande_detail`;
CREATE TABLE IF NOT EXISTS `commande_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_commande` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_commande` (`id_commande`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande_detail`
--

INSERT INTO `commande_detail` (`id`, `id_commande`, `id_produit`, `nom`, `quantite`, `prix`) VALUES
(33, 18, 662, 'CHAUSSURES POUR HOMME', 4, 12000),
(34, 18, 661, 'COMBINE CONDOR 430L GRIS', 1, 77900),
(35, 18, 628, 'SMART PHONE J7 PRIME', 1, 69900),
(36, 19, 663, 'BOUILLOIRE BEKO', 1, 5000),
(37, 20, 663, 'PROMOTION - 30%', 1, 120),
(38, 20, 661, 'PROMOTION -20%', 2, 90),
(39, 20, 628, 'PROMOTION -10%', 1, 100),
(40, 21, 626, 'Thé vert', 1, 50),
(41, 21, 661, 'PROMOTION -20%', 2, 90),
(42, 21, 662, 'PROMOTION - 40%', 1, 120),
(43, 22, 674, 'Biscuit cacaoté', 1, 45),
(44, 20, 540, '100', 10, 10),
(45, 22, 639, 'dd', 10, 10),
(46, 20, 674, '10', 10, 10);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `comment` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `valide` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_produit` (`id_produit`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `id_user`, `id_produit`, `comment`, `date`, `valide`) VALUES
(1, 35, 662, 'BON ARTICLE SUR 662', '2020-12-03', 1),
(3, 35, 662, 'gsdfg sdqf\\r\\nqsdf \\r\\nqsd\\r\\nfqsd \\r\\nfqs dfqsf qsdfqs fdqs\\r\\nf qsdfqsd fqsd', '2020-12-03', 1),
(5, 35, 662, 'dsqdsqdqs\r\ndsqddd', '2020-12-03', 1);

-- --------------------------------------------------------

--
-- Structure de la table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(200) CHARACTER SET utf8 NOT NULL,
  `description_complet` mediumtext CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `description_complet`) VALUES
(4, 'Comment est assuré le crédit bancaire?', '<p style=\"text-align: justify;\">La garantie des cr&eacute;dits bancaires assur&eacute;e par le FGMMC</p>\r\n<p style=\"text-align: justify;\">Le Fonds de Garantie Mutuelle des Micro Cr&eacute;dits (FGMMC) domicili&eacute; aupr&egrave;s de l&rsquo;Agence Nationale de Gestion du Micro Cr&eacute;dit&nbsp; a pour objet de garantir les micro cr&eacute;dits accord&eacute;s par les banques et &eacute;tablissements financiers, aux b&eacute;n&eacute;ficiaires ayant obtenu la notification des aides de l&rsquo;Agence Nationale de Gestion du Micro Cr&eacute;dit.</p>\r\n<p style=\"text-align: justify;\">En cas d&rsquo;impossibilit&eacute; de remboursement, pour le cr&eacute;ancier, pour cause de sinistre, le FGMMC couvre, &agrave; la diligence des banques et &eacute;tablissements financiers concern&eacute;s, les cr&eacute;ances restant dues, en principal, ainsi que les int&eacute;r&ecirc;ts, &agrave; la date de d&eacute;claration du sinistre et &agrave; hauteur de 85%.</p>'),
(5, 'L\'handicapé peut t il bénéficier d’un micro crédit?', '<p><span><span>Les handicap&eacute;s ne sont pas exclus du dispositif du micro cr&eacute;dit</span></span></p>\r\n<p style=\"text-align: justify;\"><span>L&rsquo;impasse faite, au niveau du dispositif, autour de dispositions particuli&egrave;res &agrave; accorder aux personnes en situation de handicap, pour la cr&eacute;ation d&rsquo;une activit&eacute;, est volontaire. Elle t&eacute;moigne de la volont&eacute; des pouvoirs publics d&rsquo;offrir, &agrave; la personne en situation de handicap, les m&ecirc;mes chances que les personnes en bonne sant&eacute;, en mati&egrave;re d&rsquo;acc&egrave;s au micro cr&eacute;dit. L&agrave; r&eacute;side toute la philosophie adopt&eacute;e, afin que le handicap ne soit pas v&eacute;cu comme tel.</span></p>'),
(6, 'De quels moyens l\'ANGEM dispose-t-elle, pour mener à bien ses missions?', '<p style=\"text-align: justify;\"><span><span>Des cellules de da&iuml;ras pour le travail de proximit&eacute;</span></span></p>\r\n<p style=\"text-align: justify;\"><span>Afin d&rsquo;assurer efficacement les missions qui lui sont confi&eacute;es, l&rsquo;Agence a adopt&eacute; un mod&egrave;le d&rsquo;organisation d&eacute;centralis&eacute;. En effet elle compte, 10 antennes r&eacute;gionales auxquelles sont rattach&eacute;es 49 coordinations de wilayas appuy&eacute;es par des cellules d&rsquo;accompagnement, au niveau de chaque da&iuml;ra, couvrant ainsi l&rsquo;ensemble du territoire national. Ce maillage du territoire, en plus &nbsp;de permettre &nbsp;un meilleur fonctionnement de l&rsquo;Agence, favorise &nbsp;le travail de proximit&eacute; et de sensibilisation des populations, notamment celles issues des r&eacute;gions rurales et isol&eacute;es.</span></p>'),
(7, 'Quels sont les projets financés par l’ANGEM?', '<p><span>Le micro cr&eacute;dit finance tous types d&rsquo;activit&eacute;s, sans exclusive. Le b&eacute;n&eacute;ficiaire a donc toute latitude de choisir l&rsquo;activit&eacute; qui lui convient le mieux, &agrave; la seule condition que le montant global de celle ci n&rsquo;exc&egrave;de pas celui du cr&eacute;dit accord&eacute;.</span></p>'),
(8, 'Est-il possible de créer une activité à domicile?', '<p style=\"text-align: justify;\"><span>L&rsquo;un des objectifs vis&eacute;s par le dispositif g&eacute;r&eacute; par l&rsquo;ANGEM est l&rsquo;int&eacute;gration de la femme dans le d&eacute;veloppement socio &eacute;conomique du pays, &agrave; travers l&rsquo;octroi de cr&eacute;dit pour la cr&eacute;ation d&rsquo;activit&eacute;s. Le micro cr&eacute;dit a &eacute;t&eacute; con&ccedil;u, notamment, pour favoriser l&rsquo;&eacute;mergence de l&rsquo;auto emploi et du travail &agrave; domicile, telles que les activit&eacute;s artisanales et de m&eacute;tiers, en particulier chez la population f&eacute;minine. Un tr&egrave;s grand nombre de femmes ont ainsi cr&eacute;e des activit&eacute;s qu&rsquo;elles exercent &agrave; domicile, telle que la confection, la p&acirc;tisserie, la production de confiserie, la production de couscous, de pain traditionnel, etc.</span></p>'),
(9, 'L’accompagnement : Le promoteur est t-il accompagné?', '<p style=\"text-align: justify;\"><span>L&rsquo;ANGEM, &agrave; travers les cellules d&rsquo;accompagnement des Da&iuml;ras,&nbsp; assure, &agrave; titre gracieux, l&rsquo;accompagnement du promoteur tout au long du processus de cr&eacute;ation et d&rsquo;exploitation du projet.</span></p>\r\n<p style=\"text-align: justify;\"><span>Les objectifs assign&eacute;s &agrave; l&rsquo;accompagnement sont :</span></p>\r\n<ul>\r\n<li style=\"text-align: justify;\"><span>D&rsquo;amener le promoteur &agrave; mesurer les conditions commerciales, techniques et financi&egrave;res de son projet&nbsp;;</span></li>\r\n<li style=\"text-align: justify;\"><span>De soutenir le promoteur dans ses d&eacute;marches&nbsp;;</span></li>\r\n<li style=\"text-align: justify;\"><span>D&rsquo;&eacute;tudier la fiabilit&eacute; de son projet&nbsp;;</span></li>\r\n<li style=\"text-align: justify;\"><span>De v&eacute;rifier la coh&eacute;rence des approches du promoteur&nbsp;;</span></li>\r\n</ul>'),
(10, 'Qui fait le suivi des activités qui bénéficient des avantages ?', '<p style=\"text-align: justify;\"><span>Les activit&eacute;s qui b&eacute;n&eacute;ficient des avantages pr&eacute;vus par le dispositif font l\'objet, durant la p&eacute;riode de b&eacute;n&eacute;fice des avantages, d\'un suivi par l\'agence. Sauf cas de force majeure, le non-respect des obligations pr&eacute;vues dans le cahier des charges liant le b&eacute;n&eacute;ficiaire &agrave; l\'agence entra&icirc;ne le retrait partiel ou total des aides accord&eacute;es.</span></p>'),
(11, 'Je viens de souscrire à un microcrédit. Puis-je avoir des conseils et de l\'assistance de l\'Agence ?', '<p><span>Tous les citoyens &eacute;ligibles au dispositif du micro-cr&eacute;dit b&eacute;n&eacute;ficient du conseil et de l\'assistance de l\'Agence Nationale de Gestion du Micro-cr&eacute;dit \"ANGEM\", &agrave; travers ses 49 directions d\'agences de wilayas.</span></p>'),
(12, 'Quels sont les avantages prévus pour les bénéficiaires éligibles au micro-crédit ?', '<p style=\"text-align: justify;\"><span>Les b&eacute;n&eacute;ficiaires &eacute;ligibles au micro-cr&eacute;dit b&eacute;n&eacute;ficient des avantages &agrave; partir du Fonds National de Soutien au Micro-Cr&eacute;dit&nbsp; :</span></p>\r\n<ul>\r\n<li style=\"text-align: justify;\"><span>d\'un pr&ecirc;t non r&eacute;mun&eacute;r&eacute; &eacute;quivalent &agrave; 29% du co&ucirc;t global du projet si ce dernier ne d&eacute;passe pas 1000.000 DA, destin&eacute; &agrave; compl&eacute;ter le niveau de l&rsquo;apport personnels requis pour &ecirc;tre &eacute;ligible au cr&eacute;dit bancaire ;</span></li>\r\n<li style=\"text-align: justify;\"><span>d\'une bonification des taux d\'int&eacute;r&ecirc;t pour les cr&eacute;dits bancaires obtenus ;</span></li>\r\n<li style=\"text-align: justify;\"><span>d\'un pr&ecirc;t non r&eacute;mun&eacute;r&eacute; au titre de l\'acquisition de mati&egrave;res premi&egrave;res dont le co&ucirc;t ne saurait d&eacute;passer cent mille dinars (100.000 DA). Ce montant est port&eacute; &agrave; 250 000 DA dans les wilayas du Sud.<br /></span></li>\r\n</ul>'),
(13, 'Quels sont les montants des prêts accordés ?', '<p><span>Le montant des pr&ecirc;ts pr&eacute;vus par le micro-cr&eacute;dit ANGEM est fix&eacute; &agrave; cent mille dinars 100.000 DA minimum (ce dernier peut atteindre 250 000 DA au niveau des wilayas du Sud) et ne saurait d&eacute;passer un million de dinars 1000.000 DA.</span></p>'),
(14, 'A quoi doivent satisfaire les bénéficiaires ?', '<p><span>Les b&eacute;n&eacute;ficiaires du micro-cr&eacute;dit doivent, lors de la cr&eacute;ation de leurs activit&eacute;s, satisfaire &agrave; des conditions li&eacute;es notamment &agrave; l\'&acirc;ge (18 ans), au savoir-faire et au niveau d\'apport personnel.</span></p>\r\n<p><span>Les activit&eacute;s doivent &ecirc;tre cr&eacute;&eacute;es par les b&eacute;n&eacute;ficiaires &agrave; titre individuel.</span></p>'),
(15, 'Qui sont les bénéficiaires du microcrédit ?', '<p style=\"text-align: justify;\"><span>Le&nbsp;</span><span>b&eacute;n&eacute;ficiaire des services du microcr&eacute;dit est une&nbsp;<span>personne dont les revenus sont faibles et qui n&rsquo;a pas acc&egrave;s aux institutions financi&egrave;res formelles faute de pouvoir remplir les conditions exig&eacute;es par ces institutions ( garanties, apport personnel etc.)</span>. Il m&egrave;ne g&eacute;n&eacute;ralement une petite activit&eacute; g&eacute;n&eacute;ratrice de revenus dans le cadre d&rsquo;une petite entreprise personnelle ou familiale.</span></p>\r\n<ul style=\"text-align: justify;\">\r\n<li><span><span>Dans les zones rurales</span>, ce sont souvent de petits paysans ou des personnes poss&eacute;dant une petite activit&eacute; de transformation alimentaire,&nbsp; de fabrication artisanale ou un petit commerce.</span></li>\r\n</ul>\r\n<ul style=\"text-align: justify;\">\r\n<li><span><span>Dans les zones urbaines</span>, la client&egrave;le est plus diversifi&eacute;e : petits commer&ccedil;ants, prestataires de services, artisans, vendeurs ambulants, etc.</span></li>\r\n</ul>\r\n<p style=\"text-align: justify;\"><span>On les d&eacute;signe g&eacute;n&eacute;ralement par le terme de micro-entrepreneurs et la plupart de ces micro-entrepreneurs travaillent dans le non structur&eacute;. C&rsquo;est donc aux individus qui composent ce segment de march&eacute; exclu ou mal servi par les institutions financi&egrave;res classiques (banques) que s&rsquo;adresse le microcr&eacute;dit.</span></p>'),
(16, 'Le micro-crédit est destiné à quelle activité ?', '<p><span>Le micro-cr&eacute;dit est destin&eacute; &agrave; :</span></p>\r\n<ul>\r\n<li><span>La cr&eacute;ation d\'activit&eacute;s, y compris &agrave; domicile, par l\'acquisition de petits mat&eacute;riels et mati&egrave;res premi&egrave;res de d&eacute;marrage.</span></li>\r\n<li><span>l\'achat de mati&egrave;res premi&egrave;res.</span></li>\r\n</ul>'),
(17, 'Qu\'est-ce que le microcrédit ?', '<p style=\"text-align: justify;\"><span>Le micro-cr&eacute;dit est un pr&ecirc;t accord&eacute; &agrave; des cat&eacute;gories de citoyens sans revenus et/ou disposant de petits revenus instables et irr&eacute;guliers. Il vise l\'int&eacute;gration &eacute;conomique et sociale des citoyens cibl&eacute;s &agrave; travers la cr&eacute;ation d\'activit&eacute;s de production de biens et services.</span></p>');

-- --------------------------------------------------------

--
-- Structure de la table `follow`
--

DROP TABLE IF EXISTS `follow`;
CREATE TABLE IF NOT EXISTS `follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `follow`
--

INSERT INTO `follow` (`id`, `id_user`, `id_produit`, `date`) VALUES
(3, 35, 674, '2021-04-11'),
(4, 35, 661, '2021-04-11');

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `date`) VALUES
(2, 'rachidelectrodu15@gmail.com', '2020-11-27'),
(3, 'nekkacheabdelali@ymail.com', '2020-11-27'),
(5, 'Abbeshassen19@gmail.com', '2020-11-27'),
(6, 'abdelrazek@hotmail.co.uk', '2020-11-27'),
(7, 'khemnou.pajems2@gmail.com', '2020-11-27'),
(8, 'saghir.yacin15@gmail.com', '2020-11-27'),
(9, 'biskri070707@hotmail.com', '2020-11-27'),
(10, 'mokhtarinora@hotmail.fr', '2020-11-27'),
(11, 'kebaneschehrazede@gmail.com', '2020-11-27'),
(12, 'safiazourdani@hotmail.fr', '2020-11-27'),
(13, 'kbarbiche@yahoo.fr', '2020-11-27'),
(14, 'arezkiabdous05@gmail.com', '2020-11-27'),
(15, 'siham.belgh@gmail.com', '2020-11-27'),
(16, 'hacenebenmohamed55@gmail.com', '2020-11-27'),
(17, 'bio-ecology@hotmail.com', '2020-11-27'),
(18, 'angemcom.setif@yahoo.fr', '2020-11-27'),
(19, 'sofiane.chamekh@yahoo.com', '2020-11-27'),
(20, 'morghad_brahim35@hotmail.fr', '2020-11-27'),
(21, 'samir_hiphop23@yahoo.fr', '2020-11-27'),
(22, 'idir.mezine@gmail.com', '2020-11-27'),
(23, '111@live.fr', '2020-12-13'),
(24, 'test@live.fr', '2021-04-11');

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

DROP TABLE IF EXISTS `page`;
CREATE TABLE IF NOT EXISTS `page` (
  `id` varchar(50) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `description_complet` text NOT NULL,
  `nb_vue` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `page`
--

INSERT INTO `page` (`id`, `titre`, `description_complet`, `nb_vue`) VALUES
('conditions', 'Conditions d\'utilisation', '<p>These are the terms and conditions of Live Positively</p>\r\n<h4>1. ACCEPTANCE OF TERMS</h4>\r\n<p>Welcome to SITE DU VENTE, these are the terms and conditions which govern the use of our website.</p>\r\n<p>For the purpose of these Terms &ldquo;Mobile Device&rdquo; includes a Smartphone or other mobile or handheld device (such as a tablet) with an open operating system capable of exchanging data via 3G, 4G or wirelessly over a computer network (for example Apple OS iPhones, iPads, Kindle, Kindle Fire, Android OS phones tablets and Symbian OS phones and tablet devices).</p>\r\n<p>These Terms apply regardless of whatever user device you are using (including desktop, laptop or mobile web browser, digital television, mobile phones, automobile-based personal computers, handheld digital devices, and any other Mobile Device or technology whether now known or developed in the future).</p>\r\n<p>You will be deemed to have agreed to be bound by these Terms when you use, access or browse the Site, register your details with us or subscribe for email or online services or send us an email.</p>\r\n<h4>2. CONTENT</h4>\r\n<p>The copyright in the material contained on, in, or available through this Website or any other Future Site or Server excluding the Content (as defined in paragraph 3) but including all other information, data, text, music, sound, photographs, graphics, video messages or others and the selection and arrangement thereof, and all source code, software compilations is owned by or licensed to &ldquo; Live Positively&rdquo;. All rights are reserved. You do not have any right, interest or title unless otherwise expressly indicated. The articles, designs and logos contained on or in this Website or Server are registered and owned by or licensed to &ldquo;Live Positively&rdquo;. Save as expressly stated, you do not have any right to use, copy, edit, vary, reproduce, publish, the content of the website, without the prior written consent of &ldquo;Live Positively&rdquo;. You are permitted to print or download extracts for your personal use only. Content may not be used for any commercial or public use. Save as expressly stated or as necessary to view, print or download extracts for personal use, none of the content may be copied, edited, published, stored, or transmitted in any form whatsoever without the prior written consent of Live Positively.</p>\r\n<h4>3. CONTENT SUBMITTED TO THE WEBSITE</h4>\r\n<p>Information, data, text, music, software, sound, photographs, graphics, video, messages or others may be posted or uploaded (in public or privately) Any information, data, text, music, software, sound, photographs, graphics, video, messages or others which are posted or uploaded on to Live Positively or otherwise transmitted through this Website by any visitor to this Website is referred to as &ldquo;Content&rdquo;. Live Positively does not control the Content and, as such, is not responsible for it in any way whatsoever. In particular, Live Positively does not guarantee the accuracy, integrity or quality of such Content. Live Positively shall have the right (but not the obligation) in its sole discretion to delete, edit, lock, move or remove any Content without notice. Without limiting the foregoing, Live Positively shall have the right without notice to record the IP address from which any Content is posted or uploaded to or otherwise transmitted through Live Positively and to lock or remove any Content which violates these Terms and Conditions or is or may be irrelevant, out of date, inappropriate or objectionable in any way whatsoever or in respect of which Live Positively receives any complaint (whether valid, justified or not).If you upload, post or otherwise transmit any Content to a public part of Live Positively (including, without limitation, if you post a message to a bulletin board or chat forum, upload files, input data, or engage in any other form of communication through Live Positively Site) you are wholly responsible for it. You hereby:</p>\r\n<p><strong>(a)</strong>&nbsp;grant Live Positively an irrevocable, perpetual, royalty&shy;free right to use, distribute, copy, edit, adapt, license, distribute, transmit, publish, publicly perform or display any such Content in any form or medium anywhere in the World;</p>\r\n<p><strong>(b)</strong>&nbsp;irrevocably and unconditionally waive any moral rights or similar rights you have in any Content pursuant to the Copyright, Designs and Patents Act 1988 (as amended, superseded or replaced from time to time) (the &ldquo;Act&rdquo;) or equivalent legislation anywhere in the World.</p>\r\n<h4>4. MEMBER CONDUCT</h4>\r\n<p>You agree that when using the Website you will not:&nbsp;<strong>(a)</strong>&nbsp;Upload, post or otherwise transmit Content which violates the rights (including, without limitation, the intellectual property rights) of a third party or which is unlawful, harmful, threatening, abusive, argumentative, flaming, hateful, offensive (whether in relation to sex, race, religion or otherwise) harassing, defamatory, vulgar, obscene, indecent, libelous, invasive of another&rsquo;s privacy or contains any illegal content;&nbsp;<strong>(b)</strong>&nbsp;Harvest Content or IP addresses or upload, post or otherwise transmit any Content which contains software viruses or any other files or programs that may interrupt, destroy or limit the functionality of this Website any networks connected to this Website, or that contains any chain letters, pyramid&shy;selling schemes, bulk mail, junk mail or similar; or&nbsp;<strong>(c)</strong>&nbsp;Upload, post or otherwise transmit any Content for any commercial or business purpose including (without limitation) any Content which contains any advertising or promotional materials; or&nbsp;<strong>(d)</strong>&nbsp;Restrict or in any way inhibit any person from using this Website&nbsp;<strong>(e)</strong>&nbsp;Upload, post or otherwise transmit any Content which is unnecessary and/or repetitive including any Content which repeats that previously uploaded, posted or transmitted by you or another visitor, unless absolutely necessary; or&nbsp;<strong>(f)</strong>&nbsp;Upload, post or otherwise transmit any Content to a part of this Website which is irrelevant to the subject matter or the Content; or&nbsp;<strong>(g)</strong>&nbsp;Upload, post or otherwise transmit any Content to this Website using an e&shy;mail address provided by a free account service such as hotmail; or&nbsp;<strong>(h)</strong>&nbsp;Register yourself as a member of this Website or the forum provided through this Website, or to receive any newsletter or other service under more than one user name and/or user account number without the consent of the Website editor or the forum moderator; or&nbsp;<strong>(i)</strong>&nbsp;Use this Website in a manner that is inconsistent with these Terms and Conditions and/or any relevant laws and regulations in force from time to time; or&nbsp;<strong>(j)</strong>&nbsp;Breach the terms of any suspension or ban or seek alternative access. You acknowledge that you are solely responsible for maintaining a secure password for the purpose of gaining access to the member sections of this Website. You agree to indemnify Live Positively in full and on demand from and against any loss, damage, costs or expenses which they suffer or incur directly or indirectly as a result of your use of this Website other than in accordance with these Terms and Conditions.</p>\r\n<h4>5. DISCLAIMER / LIABILITY​</h4>\r\n<p>This Website, Third Party Websites, links to the Third Party Websites, and any Content are provided on an &lsquo;as&shy;is&rsquo; and &lsquo;as available&rsquo; basis and use is at your own risk. To the maximum extent permitted by law:&nbsp;<strong>(a)</strong>&nbsp;Live Positively disclaims all liability whatsoever, whether arising in contract, tort (including negligence) or otherwise in relation to this Website, any other &nbsp;Third Party Websites, links to Third Party Websites, and Content; and&nbsp;<strong>(b)</strong>&nbsp;all implied warranties, terms and conditions relating to this Website, any Third Party Websites, links to Third Party Websites, Content (whether implied by statute, common law or otherwise), including (without limitation) any warranty, term or condition as to accuracy, completeness, satisfactory quality, performance, merchantability, fitness for purpose or any special purpose, non&shy;infringement and title are, as between Live Positively and you, hereby excluded. Live Positively makes no representation or warranty that this Website,&nbsp; and/or any Third Party Websites will be continuous, uninterrupted, secure or error&shy;free. Live Positively will not be liable, in contract, tort (including, without limitation, negligence), under statute or otherwise, as a result of or in connection with this Website,&nbsp; any Third Party Websites, links to Third Party Websites, the Content, Downloads or any products or services offered on or through this Website or Third Party Website, whether by Live Positively or on its behalf, for any:&nbsp;<strong>(a)</strong>&nbsp;economic loss (including, without limitation, loss of revenues, profits, contracts, business or anticipated savings); or&nbsp;<strong>(b)</strong>&nbsp;loss of goodwill or reputation; or&nbsp;<strong>(c)</strong>&nbsp;special or indirect or consequential loss. If Live Positively is liable to you directly or indirectly in relation to this Website,&nbsp; any Third Party Websites, links to Third Party Websites, the Content, Downloads or any products or services offered on or through this Website or Third Party Website, that liability (howsoever arising) shall be limited to the sums paid by you in consideration for Live Positively granting you membership to this Website . Nothing in these Terms and Conditions shall be construed as excluding or limiting the liability of Live Positively or its group companies for death or personal injury caused by its negligence or for any other liability which cannot be excluded by English law. This Website is controlled and operated by Live Positively. Live Positively makes no representation that content on this Website is appropriate or available for use in other locations.</p>\r\n<h4>6. GENERAL</h4>\r\n<p>​These Terms and Conditions (as amended from time to time) constitute the entire agreement between you and Live Positively concerning your use of this Website and supersede any previous arrangement, agreement, undertaking or proposal, written or oral between you and Live Positively in relation to such matters. Live Positively reserves the right to update these Terms and Conditions from time to time. If it does so, the updated version will be effective as soon as it is uploaded on to this Website. No other variation to these Terms and Conditions shall be effective unless in writing and signed by an authorized representative on behalf of Live Positively. These Terms and Conditions shall be governed by and construed in accordance with English law and you agree, for the benefit of Live Positively, to submit to the exclusive jurisdiction of the English Courts. If any provision(s) of these Terms and Conditions is held by a court of competent jurisdiction to be invalid or unenforceable, then such provision(s) shall be construed, as nearly as possible, to reflect the intentions of the parties and all other provisions shall remain in full force and effect. Live Positively&rsquo;s failure to exercise or enforce any right or provision of these Terms and Conditions shall not constitute a waiver of such right or provision unless acknowledged and agreed to by Live Positively in writing. Unless otherwise expressly stated, nothing in the Terms and Conditions shall create any rights or any other benefits whether pursuant to the Contracts (Rights of Third Parties) Act 1999 or otherwise in favor of any person other than you, and Live Positively.</p>', 0),
('presentation', 'Qui somme nous', '<p>Welcome to SITE VENTE</p>\r\n<p>Years ago, we became captivated by the idea of discovering the world through others&rsquo; eyes, to know about the latest technologies emerging through time, to search and learn about health, diseases and about treatments or again, about natural remedies offered by nature.</p>\r\n<p>All this and more is provided by our space &ldquo;SITE VENTE&rdquo; a website that saw the light on January 2020 and was established upon many researchers and hard work.</p>\r\n<p>Our concept is based on a teamwork (developers, writers, translators editors,&hellip;) who worked day and night to provide you interesting articles in different categories, notably, technology, health, cuisine, and travel. You will find important tips and ideas about your subject matter; the best countries to travel to, important tips concerning travel, diseases and treatments, well-being, relaxation, cooking, and a healthy diet and the latest technologies, news, and inventions that are emerging day after day.</p>\r\n<p>SITE VENTE will offer you new and different articles every day, in addition to a referencing help which is brought thanks to the quality of the links toward the sites.</p>\r\n<p>SITE VENTE talks about the most interesting news and discoveries that hit on a broad range of fields, from technology and its news to travel around the world that will change your thinking and your life and make it better, to all what turns around health and healthy cooking. If you are interested to learn something exceptional every day, SITE VENTE is the right place for you.</p>\r\n<p>SITE VENTE aims to provide practical information and guidance to help people live better and happier.</p>\r\n<p>Appreciate our website as a place where you can find the knowledge, tools, solutions, and motivation, to build up your life and to grow materially, mentally, and spiritually.</p>\r\n<p>This website is for everyone who desires to be a winner in his life.</p>\r\n<p>SITE VENTE is the place for people who want to live a good life, grow their awareness and their knowledge, and learn to improve their mental skills and inner powers.</p>\r\n<p>We wish you to enjoy and benefit from our website.</p>', 0),
('publicite', 'Publicité', '<h2>Article 1: Object</h2>\r\n<p>The present general conditions of use, have for object the legal framework of the methods of provision of the services of the website and their use.</p>\r\n<p>The conditions must be accepted by any user wishing to access the site.</p>\r\n<h3>Eventually</h3>\r\n<p>In the event of non-acceptance of the conditions of use, the user must renounce access to the services offered by the site.</p>\r\n<p>The site reserves the right to modify unilaterally and at any time the content of these conditions of use.</p>\r\n<h2>Article 2: Legal notice</h2>\r\n<p>VENTE publication is ensured by the society OK CONSULTING.</p>\r\n<h2>Article 3: Definition</h2>\r\n<p>Users: developers, editors, designers, writers, translators&hellip;..</p>\r\n<p>Content: articles in different categories (technology, health, travel and cuisine)</p>\r\n<h2>Article 4: Access to services</h2>\r\n<p>The site is accessible free of charge to any user with internet access</p>\r\n<p>The site implements all the means at its disposal to ensure quality access to its services, the obligation being of means, the site does not undertake to achieve this result.</p>\r\n<p>Access to the site may at any time be subject to interruption, suspension, modification without notice for maintenance or for any other case. The user undertakes not to claim any compensation following the interruption, suspension or modification of the site.</p>\r\n<h2>Article 5: Responsibility</h2>\r\n<p>Any event due to a case of force majeure resulting in a malfunction of the network or the server does not engage the responsibility of Live Positively</p>\r\n<p>The sources of the information disseminated on the site are deemed reliable. However, the site reserves the right to not guarantee the reliability of the sources.</p>\r\n<h2>Article 6: Links</h2>\r\n<p>Many outgoing links to other websites are present on this website. However, the web pages where these links lead do not engage the responsibility of VENTE which does not have control of these links and their content. Live Positively is providing these links to you only as a convenience and inclusion of any link does not imply endorsement by Live Positively Network of the site or any association with its operators.</p>', 0);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(200) CHARACTER SET utf8 NOT NULL,
  `description_complet` text CHARACTER SET utf8 NOT NULL,
  `prix` int(11) DEFAULT NULL,
  `disponible` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `nb_vue` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL,
  `ordre` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_categorie` (`id_categorie`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=906 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `id_categorie`, `nom`, `description_complet`, `prix`, `disponible`, `date`, `nb_vue`, `id_user`, `ordre`) VALUES
(628, 3249, 'Déo pour homme', '<p>D&eacute;codorant pour homme, en petit format, id&eacute;al pour les d&eacute;placements.&nbsp;</p>\r\n<p>Senteur fra&icirc;cheur.&nbsp;</p>', 100, 1, '2019-05-04', 17, 1, 0),
(639, 3258, 'Gateau au chocolat', '<p>Nouvelle recette de gateau au chocolat, tr&eacute;s gourmande et doublement&nbsp; chaucolat&eacute;e.&nbsp;</p>\r\n<p>Pays de fabrication : Alg&eacute;rie.</p>\r\n<p>Poids : 170g.</p>\r\n<p>Contenance du packet : 30 gateaux.</p>\r\n<p>Quantit&eacute; minimale &agrave; commander :&nbsp;</p>', 57, 1, '2019-05-04', 7, 1, 0),
(640, 3259, 'Lentilles Kenzy', '<p>Lentilles tr&eacute;s faciles &agrave; cuisiner.&nbsp;</p>\r\n<p>Quantit&eacute; minimale &agrave; commander :&nbsp;</p>', 70, 1, '2019-05-04', 13, 1, 0),
(660, 3258, 'Miz Boudoir', '<p>Boudoirs tr&eacute;s tendre et croustillants fabriqu&eacute;s selon la recette traditionnelle.&nbsp;</p>\r\n<p>Pays de fabrication : Alg&eacute;rie.</p>\r\n<p>Poids : 180g.</p>\r\n<p>Contenance du packet : 20 Boudoirs.</p>\r\n<p>Quantit&eacute; minimale &agrave; commander :&nbsp;</p>', 72, 1, '2019-05-04', 7, 1, 0),
(661, 3258, 'Palets Bretons', '<p>Petits biscruits sabl&eacute;s au pur beurre. D&eacute;licieux et tr&eacute;s moelleux, chaque packet est g&eacute;n&eacute;reux en quantit&eacute;.&nbsp;</p>\r\n<p>Pays de fabrication : Alg&eacute;rie.</p>\r\n<p>Poids : 200g.</p>\r\n<p>Contenance du packet : 30 biscuits.</p>\r\n<p>Quantit&eacute; minimale &agrave; commander :&nbsp;</p>', 45, 1, '2019-05-04', 36, 1, 0),
(662, 3258, 'Miz Gauferette ', '<p>Gaufrette fourr&eacute; &agrave; la cr&egrave;me de vanille. Peu sucr&eacute; et croustillant, il est tr&eacute;s riche en Prot&eacute;ines, glucides et lipides, id&eacute;al pour les go&ucirc;t&eacute;s.&nbsp;</p>\r\n<p>Pays de fabrication : Alg&eacute;rie.</p>\r\n<p>Poids : 140g.</p>\r\n<p>Contenance du packet : 24 gaufrettes.</p>\r\n<p>Quantit&eacute; minimale &agrave; commander :&nbsp;</p>', 35, 1, '2019-05-04', 71, 1, 0),
(663, 3258, 'MIZ Gaufrette', '<p>Gaufrette classique fourr&eacute; au chocolat. Peu sucr&eacute; et croustillant, il est tr&eacute;s riche en Prot&eacute;ines, glucides et lipides, id&eacute;al pour les go&ucirc;t&eacute;s.&nbsp;</p>\r\n<p>Pays de fabrication : Alg&eacute;rie.</p>\r\n<p>Poids : 130g.</p>\r\n<p>Contenance du packet : 24 Gaufrettes.</p>\r\n<p>Quantit&eacute; minimale &agrave; commander :&nbsp;</p>', 35, 1, '2019-05-04', 51, 1, 0),
(674, 3258, 'Biscuit cacaoté', '<p>Biscuit cacao fourr&eacute; &agrave; la cr&egrave;me de vanille. Peu sucr&eacute;, il est tr&eacute;s riche en Prot&eacute;ines, glucides et lipides, id&eacute;al pour les go&ucirc;t&eacute;s.&nbsp;</p>\r\n<p>Pays de fabrication : Alg&eacute;rie.</p>\r\n<p>Poids : 140g.</p>\r\n<p>Contenance du packet : 30 biscuits.</p>\r\n<p>Quantit&eacute; minimale &agrave; commander :&nbsp;</p>', 45, 1, '2021-02-08', 57, 1, 0),
(676, 3260, 'Jus Rouiba Cocktail  1L', '<p>Jus Rouiba bouteille&nbsp;</p>\r\n<p><em><strong>Go&ucirc;t</strong></em> : Cocktail&nbsp;</p>\r\n<p><strong><em>Contenance</em> </strong>: 1L&nbsp;</p>', 90, 1, '2021-04-12', 5, 1, 0),
(677, 3260, 'Jus Rouiba Cocktail 20 cl', '<p>Jus Rouiba Carton&nbsp;</p>\r\n<p><em><strong>Go&ucirc;t</strong></em> : Cocktail&nbsp;</p>\r\n<p><strong><em>Contenance</em> </strong>: 20 cl</p>', 70, 1, '2021-04-12', 1, 1, 0),
(678, 3260, 'Jus rouiba excellance 20 cl', '<p>Jus Rouiba bouteille 20 cl</p>\r\n<p><em><strong>Go&ucirc;t</strong></em> : Mangue</p>\r\n<p><strong><em>Contenance</em> </strong>: 20cl&nbsp;</p>', 80, 1, '2021-04-12', 0, 1, 0),
(679, 3260, 'Jus Rouiba orange 1L', '<p>Jus Rouiba&nbsp;</p>\r\n<p><em><strong>Go&ucirc;t</strong></em> : Orange</p>\r\n<p><strong><em>Contenance</em> </strong>: 1L&nbsp;</p>', 90, 1, '2021-04-12', 0, 1, 0),
(680, 3260, 'Jus Rouiba abricot orange 1L', '<p>Jus Rouiba&nbsp;</p>\r\n<p><em><strong>Go&ucirc;t</strong></em> : abricot orange&nbsp;&nbsp;</p>\r\n<p><strong><em>Contenance</em> </strong>: 1L&nbsp;</p>', 90, 1, '2021-04-12', 1, 1, 0),
(681, 3260, 'Jus Rouiba abricot orange 20cl', '<p>Jus Rouiba&nbsp;</p>\r\n<p><em><strong>Go&ucirc;t</strong></em> : abricot orange&nbsp;&nbsp;</p>\r\n<p><strong><em>Contenance</em> </strong>: 20 cl&nbsp;</p>', 90, 1, '2021-04-12', 0, 1, 0),
(682, 3260, 'Jus Rouiba orange pêche 1L', '<p>Jus Rouiba&nbsp;</p>\r\n<p><em><strong>Go&ucirc;t</strong></em> : orange p&ecirc;che&nbsp;&nbsp;</p>\r\n<p><strong><em>Contenance</em> </strong>: 1L&nbsp;</p>', 90, 1, '2021-04-12', 1, 1, 0),
(683, 3260, 'Jus Rouiba orange 20 cl', '<p>Jus Rouiba&nbsp;</p>\r\n<p><em><strong>Go&ucirc;t</strong></em> : orange</p>\r\n<p><strong><em>Contenance</em> </strong>: 20 cl&nbsp;</p>', 70, 1, '2021-04-12', 0, 1, 0),
(684, 3260, 'Jus Rouiba Ananas 1L', '<p>Jus Rouiba&nbsp;</p>\r\n<p><em><strong>Go&ucirc;t</strong></em> : Ananas</p>\r\n<p><strong><em>Contenance</em> </strong>: 1L&nbsp;</p>', 90, 1, '2021-04-12', 2, 1, 0),
(685, 3261, 'Café Molino', '<p>Molino est un caf&eacute; d\'exception r&eacute;s &eacute;labor&eacute;.&nbsp;</p>\r\n<p>Torr&eacute;fi&eacute; &agrave; la perfection, avec le caf&eacute; Milano vous avez l&rsquo;assurance que le calibre de la mouture vous permettra de profiter de tout son go&ucirc;t et de tous ses ar&ocirc;mes &agrave; chaque tasse.</p>\r\n<p><span style=\"color: #f1c40f;\"><em><strong>Soyez curieux et n&rsquo;h&eacute;sitez pas &agrave; tester et &agrave; go&ucirc;ter ! C&rsquo;est le meilleur moyen de trouver Le caf&eacute; moulu qui vous conviendra le mieux.</strong></em></span></p>\r\n<p>&nbsp;</p>\r\n<p><strong>Types de moutures :</strong></p>\r\n<p>- Caf&eacute; moulu pour cafeti&egrave;re &agrave; piston.</p>\r\n<p>- Caf&eacute; moulu pour cafeti&egrave;re filtre.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Contenance</strong> : 250 gr</p>', 136, 1, '2021-04-12', 0, 1, 0),
(686, 3261, 'Café 1001', '<p>1001 est le caf&eacute; de la famille Alg&eacute;rienne connu pour son aspect &eacute;conomique.&nbsp;</p>\r\n<p>Sa formule consentr&eacute;e permet de remplir plusieurs tasses, en utilisant des petites doses.&nbsp;</p>\r\n<p><em><strong><span style=\"color: #f1c40f;\">Soyez curieux et n&rsquo;h&eacute;sitez pas &agrave; tester et &agrave; go&ucirc;ter ! C&rsquo;est le meilleur moyen de trouver Le caf&eacute; moulu qui vous conviendra le mieux.</span></strong></em></p>\r\n<p>&nbsp;</p>\r\n<p><strong>Types de moutures :</strong></p>\r\n<p>- Caf&eacute; moulu pour cafeti&egrave;re &agrave; piston.</p>\r\n<p>- Caf&eacute; moulu pour cafeti&egrave;re filtre.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Contenance</strong> : 250 gr&nbsp;</p>', 161, 1, '2021-04-12', 2, 1, 0),
(687, 3261, 'Café Aroma', '<p>Aroma est un caf&eacute; moulou tr&eacute;s riche en aromes et doublement concentr&eacute;.&nbsp;</p>\r\n<p>Sa formule puissante vous fera appr&eacute;cier le vrai go&ucirc;t de la caf&eacute;ine.</p>\r\n<p>100% &eacute;conomique, une petite dose d\'Aroma suffit pour remplir&nbsp; en moyenne 4 tasses de caf&eacute;.&nbsp;</p>\r\n<p>Ou benetha hayla.</p>\r\n<p><em><span style=\"color: #f1c40f;\"><strong>Soyez curieux et n&rsquo;h&eacute;sitez pas &agrave; tester et &agrave; go&ucirc;ter ! C&rsquo;est le meilleur moyen de trouver Le caf&eacute; moulu qui vous conviendra le mieux.</strong></span></em></p>\r\n<p>&nbsp;</p>\r\n<p><strong>Types de moutures :</strong></p>\r\n<p>- Caf&eacute; moulu pour cafeti&egrave;re &agrave; piston.</p>\r\n<p>- Caf&eacute; moulu pour cafeti&egrave;re filtre.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Contenance</strong> : 250 gr</p>', 163, 1, '2021-04-12', 3, 1, 0),
(688, 3261, 'Café Cafésta', '<p>Cafesta est l\'alli&eacute; des grands adeptes du caf&eacute; gr&acirc;ce &agrave; son go&ucirc;t irr&eacute;prochable.</p>\r\n<p>Economique et tr&eacute;s riche en aromes, il peut &ecirc;tre pr&eacute;parer avec diff&eacute;rentes machines de caf&eacute;, tout en pr&eacute;servant sa saveur dans chaque tasse servie.&nbsp;&nbsp;</p>\r\n<p><strong><span style=\"color: #f1c40f;\"><em>Soyez curieux et n&rsquo;h&eacute;sitez pas &agrave; tester et &agrave; go&ucirc;ter ! C&rsquo;est le meilleur moyen de trouver Le caf&eacute; moulu qui vous conviendra le mieux.</em></span></strong></p>\r\n<p>&nbsp;</p>\r\n<p><strong>Types de moutures :</strong></p>\r\n<p>- Caf&eacute; moulu pour cafeti&egrave;re &agrave; piston.</p>\r\n<p>- Caf&eacute; moulu pour cafeti&egrave;re filtre.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Contenance</strong><em> <strong>:</strong></em> 250 gr</p>', 80, 1, '2021-04-12', 5, 1, 0),
(689, 3261, 'Café Facto', '<p>Facto est le caf&eacute; qui a du caract&egrave;re.&nbsp;</p>\r\n<p>Sa formule est d&eacute;licatement fabriqu&eacute;e afin de vous procurer la sensation d&rsquo;un caf&eacute; fra&icirc;chement torr&eacute;fi&eacute; et moulu.&nbsp;</p>\r\n<p><span style=\"color: #f1c40f;\"><strong><em>Soyez curieux et n&rsquo;h&eacute;sitez pas &agrave; tester et &agrave; go&ucirc;ter ! C&rsquo;est le meilleur moyen de trouver Le caf&eacute; moulu qui vous conviendra le mieux</em></strong></span></p>\r\n<p>&nbsp;</p>\r\n<p><strong>Types de moutures :</strong></p>\r\n<p>- Caf&eacute; moulu pour cafeti&egrave;re &agrave; piston.</p>\r\n<p>- Caf&eacute; moulu pour cafeti&egrave;re filtre</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Contnenance</strong><em><strong> :</strong></em> 250 gr</p>', 167, 1, '2021-04-12', 2, 1, 0),
(690, 3261, 'Café Boukhari', '<p>Boukhari est le caf&eacute; des Alg&eacute;riens.&nbsp;</p>\r\n<p>Tr&eacute;s riche en caf&eacute;ine, la texture de sa mouture s\'adapte parfaitement &agrave; tous types de machines d\'extraction, et sa complexit&eacute; aromatique red&eacute;finit le vrai go&ucirc;t du caf&eacute;.&nbsp;</p>\r\n<p><span style=\"color: #f1c40f;\"><em><strong>Soyez curieux et n&rsquo;h&eacute;sitez pas &agrave; tester et &agrave; go&ucirc;ter ! C&rsquo;est le meilleur moyen de trouver Le caf&eacute; moulu qui vous conviendra le mieux.</strong></em></span></p>\r\n<p>&nbsp;</p>\r\n<p><strong>Types de moutures :</strong></p>\r\n<p>- Caf&eacute; moulu pour cafeti&egrave;re &agrave; piston.</p>\r\n<p>- Caf&eacute; moulu pour cafeti&egrave;re filtre.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Types de moutures :</strong></p>\r\n<p>- Caf&eacute; moulu pour cafeti&egrave;re &agrave; piston.</p>\r\n<p>- Caf&eacute; moulu pour cafeti&egrave;re filtre.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Contenance</strong><em><strong> :</strong></em><strong>&nbsp; 250 gr</strong></p>\r\n<p>&nbsp;</p>', 157, 1, '2021-04-12', 3, 1, 0),
(691, 3261, 'Café Many', '<p>Many est un caf&eacute; moulou id&eacute;al pour les personnes&nbsp; qui aiment prendre le temps d&rsquo;appr&eacute;cier toute la complexit&eacute; aromatique de l\'arabica et du robusta.&nbsp;</p>\r\n<p>Riche en caf&eacute;ine, l\'odeur et le go&ucirc;t unique du caf&eacute; &eacute;merveilleront vos sens pour un moment d&eacute;licieusement caf&eacute;in&eacute; en famille ou entre amis.&nbsp;</p>\r\n<p><span style=\"color: #f1c40f;\"><strong><em>Soyez curieux et n&rsquo;h&eacute;sitez pas &agrave; tester et &agrave; go&ucirc;ter ! C&rsquo;est le meilleur moyen de trouver Le caf&eacute; moulu qui vous conviendra le mieux.</em></strong></span></p>\r\n<p>&nbsp;</p>\r\n<p><strong>Types de moutures :</strong></p>\r\n<p>- Caf&eacute; moulu pour cafeti&egrave;re &agrave; piston.</p>\r\n<p>- Caf&eacute; moulu pour cafeti&egrave;re filtre.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Poids net</strong> : <strong>250 gr</strong></p>\r\n<p><strong>Types de moutures :</strong></p>\r\n<p>- Le caf&eacute; moulu pour cafeti&egrave;re &agrave; piston.</p>\r\n<p>- La mouture pour cafeti&egrave;re filtre.</p>\r\n<p>&nbsp;</p>\r\n<p><em><strong>Contenance :</strong></em> 250 gr.</p>', 158, 1, '2021-04-12', 8, 1, 0),
(692, 29, 'Chips Mahboul BBQ', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes, saveur barbecue. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.</p>\r\n<p><strong>Poids net :&nbsp;</strong></p>\r\n<p>&nbsp;</p>', 62, 1, '2021-04-12', 4, 1, 0),
(693, 29, 'Chips Potato Camembert', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes saveur camembert. Il est riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 48 gr.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 38, 1, '2021-04-12', 0, 1, 0),
(694, 29, 'Chips Potato ', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes, saveur fromage. Il est riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 80 gr.</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>\r\n<p>&nbsp;</p>', 62, 1, '2021-04-12', 1, 1, 0),
(695, 29, 'Chips Potato ', '<p>Chips Potato&nbsp;</p>\r\n<p><em><strong>Go&ucirc;t :</strong></em> paprika&nbsp;</p>', 15, 1, '2021-04-12', 2, 1, 0),
(696, 29, 'Mahboul Saveur pesto', '<p>Fines tranches de pommes de terre frites, croustillantes saveur pesto. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 15, 1, '2021-04-12', 5, 1, 0),
(697, 29, 'Chips Potato salé', '<p>Fines tranches de pommes de terre frites, croustillantes et 100% naturelle. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 100 gr&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 62, 1, '2021-04-12', 4, 1, 0),
(698, 3257, 'Ahmed Tea Jasmine', '<p><strong>Th&eacute; Ahmed Tea Jasmine</strong>,&nbsp;boissons drainantes et stimulantes, go&ucirc;t menthe,&nbsp; &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Pr&eacute;sent&eacute; sous forme de sachets d\'infusion, sa composition est excellente pour la sant&eacute;, car il peut &ecirc;tre utiliser comme une cure pour la prete de poids.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 70, 1, '2021-04-12', 0, 1, 0),
(699, 3257, 'Thé el Badou', '<p><strong>Th&eacute; El Badou</strong>,&nbsp;boissons drainantes et stimulantes, go&ucirc;t menthe,&nbsp; &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Sa composition est excellente pour la sant&eacute;, car il peut &ecirc;tre utiliser comme une cure pour la prete de poids.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 70, 1, '2021-04-12', 1, 1, 0),
(700, 3257, 'Thé Chifaa', '<p><strong>Th&eacute; El Chifaa,&nbsp;</strong>boissons drainantes et stimulantes, go&ucirc;t menthe, &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Sa composition est excellente pour la sant&eacute;, car il peut &ecirc;tre utiliser comme une cure pour la prete de poids.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 70, 1, '2021-04-12', 0, 1, 0),
(701, 3257, 'Thé El mazadj', '<p><strong>Th&eacute; El Mazadj</strong>,&nbsp;boissons drainantes et stimulantes, go&ucirc;t menthe,&nbsp; &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Pr&eacute;sent&eacute; sous forme de sachets d\'infusion, sa composition est excellente pour la sant&eacute;, car il peut &ecirc;tre utiliser comme une cure pour la prete de poids.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 70, 1, '2021-04-12', 3, 1, 0),
(702, 3257, 'Thé Kabir', '<p>th&eacute;</p>', 24, 1, '2021-04-21', 0, 1, 0),
(704, 3257, 'Kabir', '<p><strong>Kabir</strong>,&nbsp;boissons drainantes et stimulantes, go&ucirc;t menthe,&nbsp; &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Sa composition est excellente pour la sant&eacute;, car il peut &ecirc;tre utiliser comme une cure pour la prete de poids.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 120, 1, '2021-04-22', 0, 1, 0),
(705, 3257, 'Chameau', '<p><strong>Chameau</strong>,&nbsp;boissons drainantes et stimulantes, go&ucirc;t menthe,&nbsp; &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Sa composition est excellente pour la sant&eacute;, car il peut &ecirc;tre utiliser comme une cure pour la prete de poids.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 50, 1, '2021-04-22', 0, 1, 0),
(706, 3257, 'Touareg', '<p><strong>Touareg</strong>, boissons drainantes et stimulantes, go&ucirc;t menthe, &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Sa composition est excellente pour la sant&eacute;, car il peut &ecirc;tre utiliser comme une cure pour la prete de poids.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 120, 1, '2021-04-22', 1, 1, 0),
(707, 3257, 'Ahmed Tea', '<p>Ahmed Tea</p>', 120, 1, '2021-04-22', 0, 1, 0),
(708, 3257, 'Thé vert', '<p><strong>Th&eacute; vert</strong>,&nbsp;boissons drainantes et stimulantes, go&ucirc;t menthe,&nbsp; &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Sa composition est excellente pour la sant&eacute;, car il peut &ecirc;tre utiliser comme une cure pour la prete de poids.</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 25 sachets de 2g.</strong></span></p>', 120, 1, '2021-04-22', 0, 1, 0),
(709, 3257, 'El Barwe', '<p>El Barwe,&nbsp;boissons drainantes et stimulantes, &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Sa d&eacute;licieuse composition est excellente pour les ad&eacute;ptes du th&eacute;.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 25 sachets de 2g.</strong></span></p>', 120, 1, '2021-04-22', 0, 1, 0),
(710, 3257, 'El Raki', '<p><strong>El Raki</strong>,&nbsp;boissons drainantes et stimulantes,&nbsp; &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Pr&eacute;sent&eacute; sous forme de sachets d\'infusion, sa d&eacute;licieuse composition est excellente pour les ad&eacute;ptes du th&eacute;.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 25 sachets de 2g.</strong></span></p>', 120, 1, '2021-04-22', 0, 1, 0),
(711, 3257, 'Safinat E\'saharaa', '<p>Safinat Esaharaa,&nbsp;boissons drainantes et stimulantes,&nbsp; &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Sa d&eacute;licieuse composition vous laissera d&eacute;couvrir le vrai go&ucirc;t du th&eacute;.</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 25 sachets de 2g.</strong></span></p>', 120, 1, '2021-04-22', 0, 1, 0),
(712, 3257, 'Safinet E\'Sahraa', '<p><strong>Safinet E\'Sahraa</strong>,&nbsp;boissons drainantes et stimulantes,&nbsp; &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Sa d&eacute;licieuse composition vous permetera de d&eacute;guster le vrai go&ucirc;t d\'un th&eacute; sahraoui.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 25 sachets de 2g.</strong></span></p>', 120, 1, '2021-04-22', 0, 1, 0),
(713, 3257, 'Sultan', '<p><strong>Sultan,</strong>&nbsp;boissons drainantes et stimulantes,&nbsp; &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Pr&eacute;sent&eacute; sous forme de sachets d\'infusion, sa d&eacute;licieuse composition est excellente pour se d&eacute;tendre.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 25 sachets de 2g.</strong></span></p>', 120, 1, '2021-04-22', 0, 1, 0),
(714, 3257, 'Sultan pur origan', '<p><strong>Sultan pur origan</strong>,&nbsp;est une tisage pr&eacute;sent&eacute;e sous forme de sachets d\'infusion.</p>\r\n<p>Facile &agrave; pr&eacute;parer, elle est essentiellement consommer pour soulager les douleurs ou juste pour relaxer son corps.</p>\r\n<p>&nbsp;</p>\r\n<p><strong><span style=\"color: #e67e23;\">Contenance : 25 sachets de 2g.</span></strong></p>\r\n<p>&nbsp;</p>', 120, 1, '2021-04-22', 0, 1, 0),
(715, 3257, 'Margess', '<p>Margess,&nbsp;boissons drainantes et stimulantes, &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Pr&eacute;sent&eacute; sous forme de sachets d\'infusion, sa composition est excellente pour la sant&eacute;.</p>\r\n<p>Vous pouvez d&eacute;couvrir sur notre site les diff&eacute;rents ar&ocirc;mes du th&eacute; Magress.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 25 sachets de 2g.</strong></span></p>', 120, 1, '2021-04-22', 1, 1, 0),
(716, 3257, 'Elephanto 55', '<p>Elephanto 55,&nbsp;boissons drainantes et stimulantes,&nbsp; &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Pr&eacute;sent&eacute; sous forme de sachets d\'infusion, sa d&eacute;licieuse composition est excellente pour se d&eacute;tendre.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 25 sachets de 10g.</strong></span></p>', 120, 1, '2021-04-22', 1, 1, 0),
(717, 3257, 'Elephanto 55 tisane origan', '<p><strong>Elephanto 55 tisane origan</strong>, est une tisage pr&eacute;sent&eacute;e sous forme de sachets d\'infusion.</p>\r\n<p>Facile &agrave; pr&eacute;parer, elle est essentiellement consommer pour soulager les douleurs ou juste pour relaxer son corps.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 25 sachets de 2g.</strong></span></p>', 120, 1, '2021-04-22', 1, 1, 0),
(718, 3257, 'Thé vitale', '<p>Th&eacute; vitale,&nbsp;boissons drainantes et stimulantes, &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Pr&eacute;sent&eacute; sous forme de sachets d\'infusion, sa composition est tr&eacute;s b&eacute;n&eacute;fique pour la sant&eacute;.</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 25 sachets de 10g.</strong></span></p>', 120, 1, '2021-04-22', 0, 1, 0),
(719, 3257, 'Thé vitale Menthe', '<p><strong>Th&eacute; vitale Menthe,&nbsp;</strong>boissons drainantes et stimulantes, go&ucirc;t menthe,&nbsp; &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Pr&eacute;sent&eacute; sous forme de sachets d\'infusion, sa composition est excellente pour la sant&eacute;, car il peut &ecirc;tre utiliser comme une cure pour la prete de poids.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 25 sachets de 2g.</strong></span></p>', 120, 1, '2021-04-22', 0, 1, 0),
(720, 3257, 'Thé vitale caramel', '<p><strong>Th&eacute; vitale caramel,</strong>&nbsp;boissons drainantes et stimulantes, go&ucirc;t caramel, &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Pr&eacute;sent&eacute; sous forme de sachets d\'infusion, sa composition et son go&ucirc;t&nbsp; sont d&eacute;licieusement excellents.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 25 sachets de 5g.</strong></span></p>\r\n<p>&nbsp;</p>', 120, 1, '2021-04-22', 0, 1, 0),
(721, 3257, 'Thé vitale aromatisé', '<p><strong>Th&eacute; vitale aromatis&eacute;,&nbsp;</strong>boissons drainantes et stimulantes, go&ucirc;t menthe,&nbsp; &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Pr&eacute;sent&eacute; sous forme de sachets d\'infusion, sa composition aromatis&eacute; vous fera d&eacute;couvrir le th&eacute; sous un nouveau go&ucirc;t.</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 20 sachets de 2g.</strong></span></p>\r\n<div class=\"product__desc m-t-25 m-b-30\">\r\n<p>&nbsp;</p>\r\n</div>', 120, 1, '2021-04-22', 0, 1, 0),
(722, 3257, 'Magress menthe', '<p><strong>Magress menthe,</strong>&nbsp;boissons drainantes et stimulantes, go&ucirc;t menthe,&nbsp; &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Pr&eacute;sent&eacute; sous forme de sachets d\'infusion, sa composition est excellente pour la sant&eacute;, car il peut &ecirc;tre utiliser comme une cure pour la prete de poids.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<div class=\"product__desc m-t-25 m-b-30\">\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 20 sachets de 2g.</strong></span></p>\r\n</div>', 120, 1, '2021-04-22', 1, 1, 0),
(723, 3257, 'Magress gingembre', '<p>Magress gingembre,&nbsp;&nbsp;boisson drainante et stimulante, &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Pr&eacute;sent&eacute; sous forme de sachets d\'infusion, sa composition est excellente pour la sant&eacute;, car il peut &ecirc;tre utiliser comme une cure pour la prete de poids.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 25 sachets de 2g.</strong></span></p>', 120, 1, '2021-04-22', 0, 1, 0),
(724, 3257, 'Magress Louisa', '<p><strong>Magress Louisa,</strong> boisson drainante et stimulante, &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Sa composition unique saura surprendre votre sens du go&ucirc;t.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 25 sachets de 2g.</strong></span></p>', 120, 1, '2021-04-22', 1, 1, 0),
(725, 3257, 'Magress piquant', '<p><strong>Magress piquant</strong>,&nbsp;boisson drainante et stimulante, &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Sa composition unique saura surprendre votre sens du go&ucirc;t.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 25 sachets de 2g.</strong></span></p>\r\n<p>&nbsp;</p>', 120, 1, '2021-04-22', 1, 1, 0),
(726, 3257, 'Magress Artemisia', '<p>Magress Artemisia,&nbsp;boisson drainante et stimulante, &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Sa composition en artemisia est excellente pour la sant&eacute;</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 25 sachets de 2g.</strong></span></p>', 120, 1, '2021-04-22', 2, 1, 0),
(727, 3257, 'Magress Thym', '<p><strong>Magress</strong>, boisson drainante et stimulante, &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Sa composition en thym est excellente pour soulager les troubles digestifs, &nbsp;la toux, les infections d\'origine bact&eacute;rienne ou fongique, des caries et des les piq&ucirc;res d\'insectes</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 25 sachets de 2g.</strong></span></p>\r\n<p>&nbsp;</p>', 120, 1, '2021-04-22', 1, 1, 0),
(729, 3257, 'Raouaie Rachem cumin', '<p><strong>Raouai Rachem</strong>,&nbsp;&nbsp;boisson drainante et stimulante, &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Pr&eacute;sent&eacute; sous forme de sachets d\'infusion, sa composition en cumin est excellente pour soulager les digestions difficiles, douleurs et spasmes de l&rsquo;estomac, les douleurs menstruelles, gastrites, inflammations rhumatismales, h&eacute;patites et fi&egrave;vres.</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 25 sachets de 2g.</strong></span></p>', 120, 1, '2021-04-22', 1, 1, 0),
(730, 3257, 'Raouaie Rachem Fenouil', '<p><strong>Raouaie Rachem Fenouil</strong>,&nbsp;boisson drainante et stimulante, &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Pr&eacute;sent&eacute; sous forme de sachets d\'infusion, sa composition en fenouil est excellente pour traiter les troubles digestifs et l&rsquo;inflammation des voies respiratoires.</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 25 sachets de 2g.</strong></span></p>', 120, 1, '2021-04-22', 0, 1, 0),
(731, 3257, 'Raouaie Rachem Romarin', '<p><strong>Raouaie Rachem Romarin</strong>, boisson drainante et stimulante, &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Pr&eacute;sent&eacute; sous forme de sachets d\'infusion, sa composition est d&eacute;licieusement excellente pour la sant&eacute;..&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 25 sachets de 2g.</strong></span></p>', 120, 1, '2021-04-22', 0, 1, 0),
(732, 3257, 'Raouaie Rachem Thé vert gingembre', '<p><strong>Raouaie Rachem</strong> th&eacute; vert contenant du gingembre,&nbsp; boisson drainante et stimulante, &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Pr&eacute;sent&eacute; sous forme de sachets d\'infusion, sa composition est excellente pour la sant&eacute;, car il peut &ecirc;tre utiliser comme une cure pour la prete de poids.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 25 sachets de 2g.</strong></span></p>', 120, 1, '2021-04-22', 1, 1, 0),
(733, 3257, 'Raouaie Rachem Thé menthe', '<p><strong>Raouaie Rachem</strong>, &nbsp;boissons drainantes et stimulantes, go&ucirc;t menthe,&nbsp; &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Pr&eacute;sent&eacute; sous forme de sachets d\'infusion, sa composition est excellente pour la sant&eacute;, car il peut &ecirc;tre utiliser comme une cure pour la prete de poids.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 20 sachets de 10g.</strong></span></p>', 120, 1, '2021-04-22', 2, 1, 0),
(734, 3257, 'Raouaie Rachem Thé vert arôme citron', '<p><strong>Raouaie Rachem</strong>, Th&eacute; vert ar&ocirc;me citron,&nbsp; boissons drainantes et stimulantes&nbsp; &agrave; consommer au quotidien.&nbsp;</p>\r\n<p>Pr&eacute;sent&eacute; sous forme de sachets d\'infusion, sa composition est excellente pour la sant&eacute;, car il peut &ecirc;tre utiliser comme une cure pour la prete de poids.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 20 sachets de 10g.</strong></span></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 120, 1, '2021-04-22', 3, 1, 0),
(735, 3257, 'El Barwe', '<p>El Barwe</p>', 120, 1, '2021-04-22', 2, 1, 0),
(736, 3261, 'Bonal', '<p>Caf&eacute; Bonal</p>\r\n<p><strong>Poids net : 250 gr</strong></p>', 160, 1, '2021-05-02', 0, 1, 0),
(737, 3261, 'Famico', '<p>Famico</p>', 120, 1, '2021-05-02', 0, 1, 0),
(738, 3261, 'Grand mère expresso classique ', '<p>Grand m&egrave;re expresso classique&nbsp;</p>', 120, 1, '2021-05-02', 0, 1, 0),
(739, 3261, 'Grand mère expresso LUNGO classique ', '<p>Grand m&egrave;re expresso LUNGO classique&nbsp;</p>', 120, 1, '2021-05-02', 0, 1, 0),
(740, 3261, 'MUNDO CAFÉ', '<p>MUNDO CAF&Eacute;</p>', 120, 1, '2021-05-02', 0, 1, 0),
(741, 3261, 'L\'OR espresso', '<p>L\'OR espresso</p>', 120, 1, '2021-05-02', 0, 1, 0),
(742, 3261, 'Niziere', '<p>Niziere</p>', 120, 1, '2021-05-02', 0, 1, 0),
(743, 3261, 'Niziere espresso 100% Arabica', '<p>Niziere espresso 100% Arabica</p>', 120, 1, '2021-05-02', 0, 1, 0),
(744, 3261, 'Niziere espresso 40% Arabica - 60% Robusta', '<p>Niziere espresso 40% Arabica - 60% Robusta</p>', 120, 1, '2021-05-02', 0, 1, 0),
(745, 3261, 'Niziere 50% Arabica - 50% Robusta', '<p>Niziere 50% Arabica - 50% Robusta</p>', 120, 1, '2021-05-02', 0, 1, 0),
(746, 3261, 'Niziere 40% Arabica - 60% Robusta', '<p>Niziere 40% Arabica - 60% Robusta</p>', 120, 1, '2021-05-02', 0, 1, 0),
(747, 3261, 'DAVIDOFF', '<p>DAVIDOFF</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>10 capsules</strong></span>&nbsp;</p>', 324, 1, '2021-05-02', 1, 1, 0),
(748, 3261, 'L\'OR espresso (capsules)', '<p>L\'OR espresso (capsules)</p>', 120, 1, '2021-05-02', 0, 1, 0),
(749, 3261, 'OSCAR (capsules)', '<p>OSCAR (capsules)</p>', 120, 1, '2021-05-02', 0, 1, 0),
(750, 3261, 'Maxwell', '<p>Maxwell</p>', 120, 1, '2021-05-02', 0, 1, 0),
(751, 3261, 'Maxwell (smooth blend)', '<p>Maxwell (smooth blend)</p>', 120, 1, '2021-05-02', 0, 1, 0),
(752, 3261, 'Maxwell (fine mousse)', '<p>Maxwell (fine mousse)</p>', 120, 1, '2021-05-02', 0, 1, 0),
(753, 3261, 'Aroma espresso (capsules)', '<p>Aroma espresso (capsules)</p>', 120, 1, '2021-05-02', 0, 1, 0),
(754, 3261, 'Aroma café espresso (capsules) Arabica supreme ', '<p>Aroma caf&eacute; espresso (capsules) Arabica supreme&nbsp;</p>', 120, 1, '2021-05-02', 0, 1, 0),
(755, 3261, 'Aroma espresso (capsules) Roma', '<p>Aroma espresso (capsules) Roma</p>', 120, 1, '2021-05-02', 0, 1, 0),
(756, 3261, 'Aroma Ristretto (capsules)', '<p>Aroma Ristretto (capsules)</p>', 120, 1, '2021-05-02', 0, 1, 0),
(757, 3261, 'Aroma Milano (capsules)', '<p>Aroma Milano</p>', 120, 1, '2021-05-02', 0, 1, 0),
(758, 3261, 'Aroma splendide (capsules)', '<p>Aroma splendide (capsules)</p>', 120, 1, '2021-05-02', 0, 1, 0),
(759, 3261, 'OSCAR ', '<p>OSCAR&nbsp;</p>', 120, 1, '2021-05-02', 0, 1, 0),
(760, 3261, 'Nescafé classique ', '<p>Nescaf&eacute; classique&nbsp;</p>', 120, 1, '2021-05-02', 1, 1, 0),
(761, 3261, 'Nescafé GOLD', '<p>Nescaf&eacute; GOLD</p>', 120, 1, '2021-05-02', 0, 1, 0),
(762, 3261, 'Nescafé classique ', '<p>Nescaf&eacute; classique&nbsp;</p>\r\n<p><strong>Poids net : 190 g</strong></p>', 640, 1, '2021-05-02', 2, 1, 0),
(763, 3261, 'DAVIDOFF Prestige', '<p>DAVIDOFF Prestige</p>', 120, 1, '2021-05-02', 0, 1, 0),
(764, 3261, 'Mameo', '<p>Mameo</p>', 120, 1, '2021-05-02', 0, 1, 0),
(765, 3261, 'Carte noire', '<p><strong>Poids net : 250 gr</strong></p>', 475, 1, '2021-05-02', 0, 1, 0),
(766, 3261, 'Carte noire original', '<p>Carte noire original</p>', 120, 1, '2021-05-02', 0, 1, 0),
(767, 3261, 'Chicorée  ', '<p>Chicor&eacute;e &nbsp;</p>', 120, 1, '2021-05-02', 0, 1, 0),
(768, 3261, 'Café Thika ', '<p>Caf&eacute; Thika&nbsp;</p>', 120, 1, '2021-05-02', 0, 1, 0),
(769, 3261, 'Chicorée  60%', '<p>Chicor&eacute;e &nbsp;60%</p>', 120, 1, '2021-05-02', 0, 1, 0),
(770, 3261, 'Chicorée café soluble', '<p>Chicor&eacute;e caf&eacute; soluble</p>', 120, 1, '2021-05-02', 0, 1, 0),
(771, 3261, 'Dozia', '<p>Dozia</p>\r\n<p><strong>Poids net : 250 gr</strong></p>\r\n<p>&nbsp;</p>', 152, 1, '2021-05-02', 0, 1, 0),
(772, 3261, 'Cafésta', '<p>Caf&eacute;sta</p>', 140, 1, '2021-05-02', 1, 1, 0),
(773, 3261, 'L\'OR espresso ', '<p>L\'OR espresso&nbsp;</p>', 120, 1, '2021-05-02', 0, 1, 0),
(774, 3261, 'MUNDO café (capsules)', '<p>MUNDO caf&eacute; (capsules)</p>', 120, 1, '2021-05-02', 0, 1, 0),
(775, 3261, 'MUNDO (capsules) extra cream', '<p>MUNDO (capsules) extra cream</p>', 120, 1, '2021-05-02', 1, 1, 0),
(776, 3261, 'Many 50% Robusta - 50% Arabica', '<p>Many 50% Robusta - 50% Arabica</p>', 120, 1, '2021-05-02', 0, 1, 0),
(777, 3261, 'L\'OR espresso x 40 capsules', '<p>L\'OR espresso x 40 capsules</p>', 240, 1, '2021-05-02', 0, 1, 0),
(778, 3261, 'MUNDO café (capsules) RISTRETTO ', '<p>MUNDO caf&eacute; (capsules) RISTRETTO&nbsp;</p>', 120, 1, '2021-05-02', 0, 1, 0),
(779, 3261, 'Cfésta Capriccio (capsules)', '<p>Cf&eacute;sta Capriccio</p>\r\n<p>10 capsules</p>', 250, 1, '2021-05-02', 0, 1, 0),
(780, 3261, 'Cafésta classico (capsules)', '<p>Caf&eacute;sta classico</p>\r\n<p>10 capsules</p>', 250, 1, '2021-05-02', 0, 1, 0),
(781, 3261, 'Cafésta classico (capsules)', '<p>Caf&eacute;sta classico</p>\r\n<p>10 capsules</p>', 250, 1, '2021-05-02', 0, 1, 0),
(782, 3261, 'Nescafé GOLD', '<p>Nescaf&eacute; GOLD</p>', 120, 1, '2021-05-02', 0, 1, 0),
(783, 3261, 'NESQUIK STICK CACAO ', '<p>NESQUIK STICK CACAO&nbsp;</p>', 120, 1, '2021-05-02', 0, 1, 0),
(784, 3261, 'CIRTA STAR', '<p>CIRTA STAR</p>', 120, 1, '2021-05-02', 0, 1, 0),
(785, 3261, 'BOUKHARI café grains', '<p>BOUKHARI caf&eacute; grains</p>', 120, 1, '2021-05-02', 0, 1, 0),
(786, 3261, 'MAXELL HOUSE 100 sticks', '<p>MAXELL HOUSE 100 sticks</p>', 240, 1, '2021-05-02', 0, 1, 0),
(787, 3261, 'MAXWELL HOUSE SMOOTH BLEND', '<p>MAXWELL HOUSE SMOOTH BLEND</p>', 120, 1, '2021-05-02', 1, 1, 0),
(788, 3261, 'Niziere 100% Arabica', '<p><strong>Caf&eacute; Niziere Kouoptamo 100% Arabica.</strong> Formule 100% naturelle sous forme de capsules de 50g.</p>\r\n<p><span style=\"color: #e67e23;\"><strong><em>Soyez curieux et n&rsquo;h&eacute;sitez pas &agrave; tester et &agrave; go&ucirc;ter ! C&rsquo;est le meilleur moyen de trouver Le caf&eacute; moulu qui vous conviendra le mieux.</em></strong></span></p>', 120, 1, '2021-05-02', 1, 1, 0),
(789, 29, 'Crunchy Saveur oignon', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes saveur oignon. Il est riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 10, 1, '2021-05-02', 4, 1, 0),
(790, 29, 'Crunchy BBQ', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes au barbecue. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 10, 1, '2021-05-02', 1, 1, 0),
(792, 29, 'Gurma Saveur pizza', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes saveur pizza Il est riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;<br />Poids net : 80 gr</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 65, 1, '2021-05-02', 1, 1, 0),
(793, 29, 'Gurma Piment', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes pimant&eacute;es. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 80 gr</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 65, 1, '2021-05-02', 4, 1, 0),
(794, 29, 'Gurma Saveur fromage', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes, saveur fromage. Il est riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 80 gr.</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 65, 1, '2021-05-02', 4, 1, 0),
(795, 29, 'Gurma Salé saveur oignon', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes, saveur oignon. Il est riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;<br />poids net : 80 gr.</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 65, 1, '2021-05-02', 1, 1, 0),
(796, 29, 'Gurma Salé', '<p>Fines tranches de pommes de terre frites, croustillantes, 100% naturelle. Il est riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 45 gr.</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 34, 1, '2021-05-02', 4, 1, 0),
(797, 29, 'Gurma 100% naturelle ', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes 100% nturel. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 80 gr</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 65, 1, '2021-05-02', 1, 1, 0),
(798, 29, 'Gurma chips sauce Algérienne', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes, saveur sauce Alg&eacute;rienne. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 80 gr</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 65, 1, '2021-05-02', 2, 1, 0),
(799, 29, 'CROX Saveur fromage oignon', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes, saveur fromage oignon. Il est riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 48 gr</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 37, 1, '2021-05-02', 0, 1, 0),
(800, 29, 'CROX Saveur mexicain', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes, saveur mexicain. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 23 gr</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 18, 1, '2021-05-02', 1, 1, 0),
(801, 29, 'CROX BBQ', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes au barbecue. Il est riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 10, 1, '2021-05-02', 0, 1, 0),
(802, 29, 'CROX Saveur fruits de mer', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes, saveur fruits de mer. Il est riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 48 gr</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 37, 1, '2021-05-02', 0, 1, 0),
(803, 29, 'CROX Saveur tomate', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes, saveur tomate. Il est riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 45 gr</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 38, 1, '2021-05-02', 0, 1, 0),
(804, 29, 'CROX Saveur fromage', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes, saveur fromage. Il est riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : importation.</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 23 gr.</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 18, 1, '2021-05-02', 1, 1, 0),
(805, 29, 'BUGLES Saveur tomate', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes au go&ucirc;t de tomate. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Pays de production : importation.</span></strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>\r\n<p>&nbsp;</p>', 10, 1, '2021-05-02', 1, 1, 0),
(806, 29, 'BUGLES sauce crème aux oignons', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes &agrave; la sauce cr&egrave;me d\'oignon . Il est riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 10, 1, '2021-05-02', 2, 1, 0),
(807, 29, 'BUGLES Piment', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes et piment&eacute;es. Il est riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 10, 1, '2021-05-02', 1, 1, 0),
(808, 29, 'BUGLES Saveur fromage', '<p>Fines tranches de pommes de terre frites, croustillantes, saveur fromage. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 10, 1, '2021-05-02', 2, 1, 0),
(809, 29, 'BUGLES BBQ', '<p>Fines tranches de pommes de terre frites, croustillantes au barbecue. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 10, 1, '2021-05-02', 1, 1, 0),
(810, 29, 'JACKER Saveur nature', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes, saveur nature.Il est riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 160 g.</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>\r\n<p>&nbsp;</p>', 195, 1, '2021-05-02', 1, 1, 0),
(811, 29, 'SILVER CHIPS BBQ', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes au go&ucirc;t barbecue. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 75 g.&nbsp;</strong></span></p>', 72, 1, '2021-05-02', 2, 1, 0),
(812, 29, 'SILVER CHIPS Saveur fromage ', '<p>Fines tranches de pommes de terre frites, croustillantes, saveur fromage. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 160 gr</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>\r\n<p>&nbsp;</p>', 148, 1, '2021-05-02', 1, 1, 0),
(813, 29, 'SILVER CHIPS NATURE', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes saveur naturelle. Il est riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 75 g.</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>\r\n<p>&nbsp;</p>', 92, 1, '2021-05-02', 3, 1, 0);
INSERT INTO `produit` (`id`, `id_categorie`, `nom`, `description_complet`, `prix`, `disponible`, `date`, `nb_vue`, `id_user`, `ordre`) VALUES
(814, 29, 'MISTER POTATO fromage ', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes au fromage. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides et contient moins de<strong> 31% de fat.</strong></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 100 gr.</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>\r\n<p>&nbsp;</p>', 148, 1, '2021-05-02', 5, 1, 0),
(815, 29, 'JACKER Saveur fromage ', '<p>Fines tranches de pommes de terre frites, croustillantes au fromage. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 10, 1, '2021-05-02', 0, 1, 0),
(816, 29, 'SILVER CHIPS Piment', '<p>Fines tranches de pommes de terre frites, coustillantes et piment&eacute;es. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 160 gr</strong></span></p>\r\n<p><strong><span style=\"color: #e67e23;\"><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.</span>&nbsp;</strong></p>', 148, 1, '2021-05-02', 1, 1, 0),
(817, 29, 'MISTER POTATO Piquant', '<p>Fines tranches de pommes de terre frites, croustillantes et piquantes. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 100 gr</strong></span></p>\r\n<p><strong><span style=\"color: #e67e23;\"><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.</span>&nbsp;</strong></p>', 148, 1, '2021-05-02', 1, 1, 0),
(818, 29, 'MISTER POTATO BBQ', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes au barbecue. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 100 gr.</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span> Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>\r\n<p>&nbsp;</p>', 148, 1, '2021-05-02', 3, 1, 0),
(819, 29, 'SMATCH Piquant citron', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes piquantes au go&ucirc;t de citron. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 45 gr.</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 36, 1, '2021-05-02', 1, 1, 0),
(820, 29, 'SMATCH Saveur oignon', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes au go&ucirc;t oignon. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 45 gr.</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 36, 1, '2021-05-02', 1, 1, 0),
(822, 29, 'SMATCH Saveur poulet rôti', '<p>&nbsp;Fines tranches de pommes de terre frites, tr&eacute;s croustillantes saveur poulet r&ocirc;ti. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Pays de production : Alg&eacute;rie.&nbsp;</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 45 gr</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 36, 1, '2021-05-02', 1, 1, 0),
(823, 29, 'LEGEND Saveur fromage oignon ', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes au go&ucirc;t fromage oignon. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 23 gr</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 48 gr.</strong></span></p>\r\n<p><strong><span style=\"color: #e67e23;\">Pays de production : Alg&eacute;rie.&nbsp;</span></strong></p>', 47, 1, '2021-05-02', 1, 1, 0),
(824, 29, 'LEGEND Saveur pizza', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes pour les passionn&eacute;s de la pizza. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.</p>\r\n<p><strong><span style=\"color: #e67e23;\">Pays de production : Alg&eacute;rie.&nbsp;</span></strong></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 48 gr.</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>\r\n<p>&nbsp;</p>', 47, 1, '2021-05-02', 0, 1, 0),
(825, 29, 'LEGEND Saveur  Poulet', '<p>Fines tranches de pommes de terre frites, format cornet, tr&eacute;s croustillantes, saveur poulet. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><strong><span class=\"field\"><span style=\"color: #e67e23;\">Pays de production : Alg&eacute;rie.&nbsp;</span></span></strong></p>\r\n<p><strong><span class=\"field\"><span style=\"color: #e67e23;\">Poids net : 48 gr</span></span></strong></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>\r\n<p>&nbsp;</p>', 47, 1, '2021-05-02', 0, 1, 0),
(827, 29, 'LEGEND Saveur  Poulet', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes saveur poulet. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><strong><span style=\"color: #e67e23;\">Pays de production : Alg&eacute;rie.&nbsp;</span></strong></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 48 gr.</strong></span></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 47, 1, '2021-05-02', 0, 1, 0),
(829, 29, 'LEGEND BBQ', '<p>Fines tranches de pommes de terre frites, sous forme de cornets, croustillantes au go&ucirc;t barbeque. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><strong><span style=\"color: #e67e23;\">Poids net : 23 gr</span></strong></p>\r\n<p><strong><span style=\"color: #e67e23;\">Poids net : 48 gr</span></strong></p>\r\n<p><strong><span style=\"color: #e67e23;\">Pays de production : Alg&eacute;rie.&nbsp;</span></strong></p>', 47, 1, '2021-05-02', 4, 1, 0),
(833, 29, 'LEGEND BBQ', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes au go&ucirc;t barbeque. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><strong><span style=\"color: #e67e23;\">Pays de production : Alg&eacute;rie.&nbsp;</span></strong></p>\r\n<p><strong><span style=\"color: #e67e23;\">Poids net : 23 gr.</span></strong></p>\r\n<p><span style=\"color: #e67e23;\"><strong><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</strong></span></p>', 47, 1, '2021-05-02', 1, 1, 0),
(834, 29, 'LEGEND SAveur Dinamita', '<p>Fines tranches de pommes de terre frites, au go&ucirc;t dinamica pour les amoureux du piquant. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><strong><span style=\"color: #e67e23;\">Pays de production : Alg&eacute;rie.&nbsp;</span></strong></p>\r\n<p><strong><span style=\"color: #e67e23;\">Poids net : 90 gr.</span></strong></p>\r\n<p><strong><span style=\"color: #e67e23;\"><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</span></strong></p>\r\n<p>&nbsp;</p>', 99, 1, '2021-05-02', 1, 1, 0),
(835, 29, 'CROX Saveur poulet', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes, saveur poulet. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.</p>\r\n<p><strong><span style=\"color: #e67e23;\">Pays de production : Alg&eacute;rie.&nbsp;</span></strong></p>\r\n<p><strong><span style=\"color: #e67e23;\">Poids net : 23 gr.&nbsp;</span></strong></p>\r\n<p><strong><span style=\"color: #e67e23;\"><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</span></strong></p>', 18, 1, '2021-05-02', 4, 1, 0),
(836, 29, 'CROX BBQ', '<p>Fines tranches de pommes de terre frites, tr&eacute;s croustillantes au go&ucirc;t barbeque. Tr&eacute;s riche en fibres alimentaires, prot&eacute;ines et glucides.&nbsp;</p>\r\n<p><strong><span style=\"color: #e67e23;\">Pays de production : Alg&eacute;rie.&nbsp;</span></strong></p>\r\n<p><strong><span style=\"color: #e67e23;\">Poids net : 23 gr.&nbsp;</span></strong></p>\r\n<p><strong><span style=\"color: #e67e23;\"><span class=\"field\">Cat&eacute;gories&nbsp;:</span>&nbsp;Snacks, Snacks sal&eacute;s, Ap&eacute;ritif, Chips et frites.&nbsp;</span></strong></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 18, 1, '2021-05-02', 1, 1, 0),
(837, 3243, 'DADDY', '<p>DADDY</p>', 20, 1, '2021-05-02', 0, 1, 0),
(838, 3243, 'Béghin say', '<p>B&eacute;ghin say</p>', 10, 1, '2021-05-02', 0, 1, 0),
(839, 3243, 'ZUCCHERO A QUADRETTI', '<p>ZUCCHERO A QUADRETTI</p>', 20, 1, '2021-05-02', 0, 1, 0),
(840, 3243, 'MAISON DU SUCRE', '<p>MAISON DU SUCRE</p>', 10, 1, '2021-05-02', 0, 1, 0),
(841, 3243, 'SKOR', '<p>SKOR</p>', 20, 1, '2021-05-02', 0, 1, 0),
(842, 3243, 'MAISON DU SUCRE', '<p>MAISON DU SUCRE</p>', 20, 1, '2021-05-02', 0, 1, 0),
(843, 3243, 'CANDEREL', '<p>CANDEREL</p>', 20, 1, '2021-05-02', 0, 1, 0),
(844, 3243, 'Béghin say', '<p>B&eacute;ghin say</p>', 20, 1, '2021-05-02', 0, 1, 0),
(845, 3243, 'Béghin say candy', '<p>B&eacute;ghin say candy</p>', 20, 1, '2021-05-02', 0, 1, 0),
(846, 3243, 'Saint LOUIS', '<p>Saint LOUIS</p>', 20, 1, '2021-05-02', 0, 1, 0),
(847, 3243, 'SUCRE EL AFRAH', '<p>SUCRE EL AFRAH</p>', 20, 1, '2021-05-02', 0, 1, 0),
(848, 3243, 'EZZED', '<p>EZZED</p>', 50, 1, '2021-05-02', 0, 1, 0),
(849, 3243, 'SKOR', '<p>SKOR</p>', 20, 1, '2021-05-02', 0, 1, 0),
(850, 3243, 'MAISON DU SUCRE', '<p>MAISON DU SUCRE</p>', 20, 1, '2021-05-02', 1, 1, 0),
(851, 3243, 'THIKA', '<p>THIKA</p>', 20, 1, '2021-05-02', 0, 1, 0),
(852, 3243, 'SKOR', '<p>SKOR</p>', 20, 1, '2021-05-02', 0, 1, 0),
(853, 3243, 'BERRAHAL', '<p>BERRAHAL</p>', 20, 1, '2021-05-02', 0, 1, 0),
(854, 3243, 'SKOR sucre roux', '<p>SKOR sucre roux</p>', 20, 1, '2021-05-02', 0, 1, 0),
(855, 3264, 'El Mordjene', '<p><span style=\"font-weight: 400;\">El Mordjene, un miel &agrave; texture &eacute;paisse. C\'est une formule d&eacute;licieuse, id&eacute;ale pour la p&acirc;tisserie et la viennoiserie.</span></p>\r\n<p><span style=\"font-weight: 400;\">Il peut servir de nappage ou de colle alimentaire</span><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 1 Kg</strong></span></p>', 85, 1, '2021-05-16', 0, 1, 0),
(856, 3264, 'El Mordjene 3 Kg', '<p><span style=\"font-weight: 400;\">El Mordjene, un miel &agrave; texture &eacute;paisse. C\'est une formule d&eacute;licieuse, id&eacute;ale pour la p&acirc;tisserie et la viennoiserie.</span></p>\r\n<p><span style=\"font-weight: 400;\">Il peut servir de nappage ou de colle alimentaire</span><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 3 Kg</strong></span></p>', 120, 1, '2021-05-16', 0, 1, 0),
(857, 3264, 'El Mordjene 0.5 Kg', '<p><span style=\"font-weight: 400;\">El Mordjene, un miel &agrave; texture &eacute;paisse. C\'est une formule d&eacute;licieuse, id&eacute;ale pour la p&acirc;tisserie et la viennoiserie.</span></p>\r\n<p><span style=\"font-weight: 400;\">Il peut servir de nappage ou de colle alimentaire</span><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 0.5 Kg</strong></span></p>', 50, 1, '2021-05-16', 0, 1, 0),
(858, 3264, 'ELA 3 Kg', '<p><span style=\"font-weight: 400;\">Ela, un miel &agrave; texture &eacute;paisse. C\'est une formule d&eacute;licieuse, id&eacute;ale pour la p&acirc;tisserie et la viennoiserie.</span></p>\r\n<p><span style=\"font-weight: 400;\">Il peut servir de nappage ou de colle alimentaire.</span><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 3 Kg</strong></span></p>', 120, 1, '2021-05-16', 0, 1, 0),
(859, 3264, 'ELA 3 Kg', '<p><span style=\"font-weight: 400;\">Ela, un miel &agrave; texture &eacute;paisse. C\'est une formule d&eacute;licieuse, id&eacute;ale pour la p&acirc;tisserie et la viennoiserie.</span></p>\r\n<p><span style=\"font-weight: 400;\">Il peut servir de nappage ou de colle alimentaire.</span><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 3 Kg</strong></span></p>', 120, 1, '2021-05-16', 0, 1, 0),
(860, 3264, 'ELA 3 Kg', '<p><span style=\"font-weight: 400;\">Ela, un miel &agrave; texture &eacute;paisse. C\'est une formule d&eacute;licieuse, id&eacute;ale pour la p&acirc;tisserie et la viennoiserie.</span></p>\r\n<p><span style=\"font-weight: 400;\">Il peut servir de nappage ou de colle alimentaire.</span><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 3 Kg</strong></span></p>', 120, 1, '2021-05-16', 0, 1, 0),
(861, 3264, 'ELA 3 Kg', '<p><span style=\"font-weight: 400;\">Ela, un miel &agrave; texture &eacute;paisse. C\'est une formule d&eacute;licieuse, id&eacute;ale pour la p&acirc;tisserie et la viennoiserie.</span></p>\r\n<p><span style=\"font-weight: 400;\">Il peut servir de nappage ou de colle alimentaire.</span><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 3 Kg</strong></span></p>', 120, 1, '2021-05-16', 0, 1, 0),
(862, 3264, 'El Mordjene', '<p><span style=\"font-weight: 400;\">El Mordjene, un miel &agrave; texture &eacute;paisse. C\'est une formule d&eacute;licieuse, id&eacute;ale pour la p&acirc;tisserie et la viennoiserie.</span></p>\r\n<p><span style=\"font-weight: 400;\">Il peut servir de nappage ou de colle alimentaire</span><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 2 Kg</strong></span></p>', 100, 1, '2021-05-16', 0, 1, 0),
(863, 3264, 'Bocal ', '<p><span style=\"font-weight: 400;\">Bocal, un miel &agrave; texture &eacute;paisse. C\'est une formule d&eacute;licieuse, id&eacute;ale pour la p&acirc;tisserie et la viennoiserie.</span></p>\r\n<p><span style=\"font-weight: 400;\">Il peut servir de nappage ou de colle alimentaire</span><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Contenance : 1 Kg</strong></span></p>', 100, 1, '2021-05-16', 0, 1, 0),
(864, 3259, 'THIKA Lentilles ', '<p><span style=\"font-weight: 400;\">Les lentilles THIKA sont peu caloriques, elles peuvent se pr&eacute;parer en soupe ou en rago&ucirc;t.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les cuisiner directement sans avoir &agrave; les tremper la veille dans l&rsquo;eau.&nbsp;</span></p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(865, 3259, 'SOS lentilles royales', '<p><span style=\"font-weight: 400;\">Les lentilles SOS sont peu caloriques, elles peuvent se pr&eacute;parer en soupe ou en rago&ucirc;t.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les cuisiner directement sans avoir &agrave; les tremper la veille dans l&rsquo;eau.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(866, 3259, 'SUP lentilles', '<p><span style=\"font-weight: 400;\">Les lentilles SUP sont peu caloriques, elles peuvent se pr&eacute;parer en soupe ou en rago&ucirc;t.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les cuisiner directement sans avoir &agrave; les tremper la veille dans l&rsquo;eau.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 1 Kg.</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(867, 3259, 'SUP lentilles rouges', '<p><span style=\"font-weight: 400;\">Les lentilles rouges&nbsp; SUP sont peu caloriques, elles peuvent se pr&eacute;parer en soupe ou en rago&ucirc;t.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les cuisiner directement sans avoir &agrave; les tremper la veille dans l&rsquo;eau.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 1 Kg.</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(868, 3259, 'EL IHSANE', '<p><span style=\"font-weight: 400;\">Les lentilles EL IHSANE sont peu caloriques, elles peuvent se pr&eacute;parer en soupe ou en rago&ucirc;t.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les cuisiner directement sans avoir &agrave; les tremper la veille dans l&rsquo;eau.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 1 Kg.&nbsp;</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(869, 3259, 'EL IHSANE', '<p><span style=\"font-weight: 400;\">Les lentilles EL IHSANE sont peu caloriques, elles peuvent se pr&eacute;parer en soupe ou en rago&ucirc;t.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les cuisiner directement sans avoir &agrave; les tremper la veille dans l&rsquo;eau.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr&nbsp;</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(870, 3259, 'LEGUSTE LENTILLES', '<p><span style=\"font-weight: 400;\">Les lentilles LEGUSTE sont peu caloriques, elles peuvent se pr&eacute;parer en soupe ou en rago&ucirc;t.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les cuisiner directement sans avoir &agrave; les tremper la veille dans l&rsquo;eau.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(871, 3259, 'EZZED LENTILLES', '<p><span style=\"font-weight: 400;\">Les lentilles EZZED sont peu caloriques, elles peuvent se pr&eacute;parer en soupe ou en rago&ucirc;t.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les cuisiner directement sans avoir &agrave; les tremper la veille dans l&rsquo;eau.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 1 Kg</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(872, 3259, 'EZZED LENTILLES', '<p><span style=\"font-weight: 400;\">Les lentilles &hellip; sont peu caloriques, elles peuvent se pr&eacute;parer en soupe ou en rago&ucirc;t.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les cuisiner directement sans avoir &agrave; les tremper la veille dans l&rsquo;eau.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(873, 3259, 'GARRIDO', '<p><span style=\"font-weight: 400;\">Les lentilles GARRIDO sont peu caloriques, elles peuvent se pr&eacute;parer en soupe ou en rago&ucirc;t.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les cuisiner directement sans avoir &agrave; les tremper la veille dans l&rsquo;eau.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr.</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(874, 3259, 'GARRIDO LENTILLES', '<p><span style=\"font-weight: 400;\">Les lentilles GARRIDO sont peu caloriques, elles peuvent se pr&eacute;parer en soupe ou en rago&ucirc;t.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les cuisiner directement sans avoir &agrave; les tremper la veille dans l&rsquo;eau.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr.</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(875, 3259, 'THIKA LENTILLES', '<p><span style=\"font-weight: 400;\">Les lentilles royales THIKA sont peu caloriques, elles peuvent se pr&eacute;parer en soupe ou en rago&ucirc;t.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les cuisiner directement sans avoir &agrave; les tremper la veille dans l&rsquo;eau.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 1 Kg.</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(876, 3259, 'RAÏSSA LENTILLES', '<p><span style=\"font-weight: 400;\">Les lentilles RA&Iuml;SSA sont peu caloriques, elles peuvent se pr&eacute;parer en soupe ou en rago&ucirc;t.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les cuisiner directement sans avoir &agrave; les tremper la veille dans l&rsquo;eau.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 1 Kg</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(877, 3259, 'ZYAD', '<p><span style=\"font-weight: 400;\">Les lentilles ZYAD sont peu caloriques, elles peuvent se pr&eacute;parer en soupe ou en rago&ucirc;t.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les cuisiner directement sans avoir &agrave; les tremper la veille dans l&rsquo;eau.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(878, 3259, 'EL FAWAHA LENTILLES', '<p><span style=\"font-weight: 400;\">Les lentilles ZYAD sont peu caloriques, elles peuvent se pr&eacute;parer en soupe ou en rago&ucirc;t.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les cuisiner directement sans avoir &agrave; les tremper la veille dans l&rsquo;eau.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(879, 3265, 'EL IHSANE POIS CHICHE', '<p><span style=\"font-weight: 400;\">Les pois chiches El Ihsane sont une </span><span style=\"font-weight: 400;\">excellente source de prot&eacute;ines v&eacute;g&eacute;tales. </span></p>\r\n<p><span style=\"font-weight: 400;\">Ils </span><span style=\"font-weight: 400;\">se d&eacute;gustent aussi bien dans un tajine ou un couscous que sous forme de pur&eacute;e : falafel, houmous.</span></p>\r\n<p><span style=\"font-weight: 400;\"> Il se marie &eacute;galement tr&egrave;s bien dans des salades.</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(880, 3265, 'EL IHSANE POIS CHICHE', '<p><span style=\"font-weight: 400;\">Les pois chiches El Ihsane sont une </span><span style=\"font-weight: 400;\">excellente source de prot&eacute;ines v&eacute;g&eacute;tales. </span></p>\r\n<p><span style=\"font-weight: 400;\">Ils </span><span style=\"font-weight: 400;\">se d&eacute;gustent aussi bien dans un tajine ou un couscous que sous forme de pur&eacute;e : falafel, houmous. </span></p>\r\n<p><span style=\"font-weight: 400;\">Il se marie &eacute;galement tr&egrave;s bien dans des salades.</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 1 Kg</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(881, 3265, 'GARRIDO POIS CHICHE', '<p><span style=\"font-weight: 400;\">Les pois chiches GARRIDO sont une </span><span style=\"font-weight: 400;\">excellente source de prot&eacute;ines v&eacute;g&eacute;tales. </span></p>\r\n<p><span style=\"font-weight: 400;\">Ils </span><span style=\"font-weight: 400;\">se d&eacute;gustent aussi bien dans un tajine ou un couscous que sous forme de pur&eacute;e : falafel, houmous. </span></p>\r\n<p><span style=\"font-weight: 400;\">Il se marie &eacute;galement tr&egrave;s bien dans des salades.</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(882, 3265, 'SOS POIS CHICHE', '<p><span style=\"font-weight: 400;\">Le pois chiches SOS sont une </span><span style=\"font-weight: 400;\">excellente source de prot&eacute;ines v&eacute;g&eacute;tales. </span></p>\r\n<p><span style=\"font-weight: 400;\">Ils </span><span style=\"font-weight: 400;\">se d&eacute;gustent aussi bien dans un tajine ou un couscous que sous forme de pur&eacute;e : falafel, houmous. </span></p>\r\n<p><span style=\"font-weight: 400;\">Il se marie &eacute;galement tr&egrave;s bien dans des salades.</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 1 Kg</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(883, 3265, 'SUCCHI POIS CHICHE', '<p><span style=\"font-weight: 400;\">Les pois chiches SUCCHI sont une </span><span style=\"font-weight: 400;\">excellente source de prot&eacute;ines v&eacute;g&eacute;tales. </span></p>\r\n<p><span style=\"font-weight: 400;\">Ils </span><span style=\"font-weight: 400;\">se d&eacute;gustent aussi bien dans un tajine ou un couscous que sous forme de pur&eacute;e : falafel, houmous. </span></p>\r\n<p><span style=\"font-weight: 400;\">Il se marie &eacute;galement tr&egrave;s bien dans des salades.</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(884, 3266, 'SUP HARICOTS BLANCS', '<p><span style=\"font-weight: 400;\">Les haricots blancs SUP sont </span><span style=\"font-weight: 400;\">frais et n&eacute;cessitent un temps de trempage.</span></p>\r\n<p><span style=\"font-weight: 400;\">Ils sont riches en : Fibres, Fer, Phosphore, Magn&eacute;sium.</span></p>\r\n<p><span style=\"font-weight: 400;\"> Vous pouvez les d&eacute;guster sous diff&eacute;rentes recettes.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr.</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(885, 3266, 'ZYAD HARICOTS BLANCS', '<p><span style=\"font-weight: 400;\">Les haricots blancs ZYAD sont </span><span style=\"font-weight: 400;\">frais et n&eacute;cessitent un temps de trempage.</span></p>\r\n<p><span style=\"font-weight: 400;\">Ils sont riches en : Fibres, Fer, Phosphore, Magn&eacute;sium. </span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les d&eacute;guster sous diff&eacute;rentes recettes.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr.</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(886, 3266, 'THIKA HARICOTS BLANCS', '<p><span style=\"font-weight: 400;\">Les haricots blancs THIKA sont </span><span style=\"font-weight: 400;\">frais et n&eacute;cessitent un temps de trempage.</span></p>\r\n<p><span style=\"font-weight: 400;\">Ils sont riches en : Fibres, Fer, Phosphore, Magn&eacute;sium. </span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les d&eacute;guster sous diff&eacute;rentes recettes.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 1 Kg</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(887, 3266, 'EL IHSANE', '<p><span style=\"font-weight: 400;\">Les haricots blancs El Ihsane sont </span><span style=\"font-weight: 400;\">frais et n&eacute;cessitent un temps de trempage.</span></p>\r\n<p><span style=\"font-weight: 400;\">Ils sont riches en : Fibres, Fer, Phosphore, Magn&eacute;sium. </span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les d&eacute;guster sous diff&eacute;rentes recettes.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 1 Kg</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(888, 3266, 'LEGUSTE HARICOTS BLANCS', '<p><span style=\"font-weight: 400;\">Les haricots blancs LEGUSTE sont </span><span style=\"font-weight: 400;\">frais et n&eacute;cessitent un temps de trempage.</span></p>\r\n<p><span style=\"font-weight: 400;\">Ils sont riches en : Fibres, Fer, Phosphore, Magn&eacute;sium. </span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les d&eacute;guster sous diff&eacute;rentes recettes.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 1 Kg.</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(889, 3266, 'GARRIDO HARICOTS BLANCS', '<p><span style=\"font-weight: 400;\">Les haricots blancs GARRIDO sont </span><span style=\"font-weight: 400;\">frais et n&eacute;cessitent un temps de trempage.</span></p>\r\n<p><span style=\"font-weight: 400;\">Ils sont riches en : Fibres, Fer, Phosphore, Magn&eacute;sium. </span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les d&eacute;guster sous diff&eacute;rentes recettes.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr.</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(890, 3266, 'EL IHSANE HARICOTS ROUGE', '<p><span style=\"font-weight: 400;\">Les haricots rouges EL IHSANE sont </span><span style=\"font-weight: 400;\">frais et n&eacute;cessitent un temps de trempage.</span></p>\r\n<p><span style=\"font-weight: 400;\">Ils sont riches en : Fibres, Fer, Phosphore, Magn&eacute;sium. </span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les d&eacute;guster sous diff&eacute;rentes recettes.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr.</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(891, 3266, 'LEGUSTE HARICOTS BLANCS', '<p><span style=\"font-weight: 400;\">Les haricots blancs LESGUSTE sont </span><span style=\"font-weight: 400;\">frais et n&eacute;cessitent un temps de trempage.</span></p>\r\n<p><span style=\"font-weight: 400;\">Ils sont riches en : Fibres, Fer, Phosphore, Magn&eacute;sium. </span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les d&eacute;guster sous diff&eacute;rentes recettes.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr.</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(892, 3266, 'NATTURA HARICOTS BLANCS', '<p><span style=\"font-weight: 400;\">Les haricots blancs NATTURA sont </span><span style=\"font-weight: 400;\">frais et n&eacute;cessitent un temps de trempage.</span></p>\r\n<p><span style=\"font-weight: 400;\">Ils sont riches en : Fibres, Fer, Phosphore, Magn&eacute;sium. </span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les d&eacute;guster sous diff&eacute;rentes recettes.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(893, 3266, 'SOS HARICOTS BLANCS', '<p><span style=\"font-weight: 400;\">Les haricots blancs SOS sont </span><span style=\"font-weight: 400;\">frais et n&eacute;cessitent un temps de trempage.</span></p>\r\n<p><span style=\"font-weight: 400;\">Ils sont riches en : Fibres, Fer, Phosphore, Magn&eacute;sium. </span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les d&eacute;guster sous diff&eacute;rentes recettes.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 1 Kg.</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(894, 3266, 'SUP HARICOTS BLANCS', '<p><span style=\"font-weight: 400;\">Les haricots blancs SUP sont </span><span style=\"font-weight: 400;\">frais et n&eacute;cessitent un temps de trempage.</span></p>\r\n<p><span style=\"font-weight: 400;\">Ils sont riches en : Fibres, Fer, Phosphore, Magn&eacute;sium.</span></p>\r\n<p><span style=\"font-weight: 400;\"> Vous pouvez les d&eacute;guster sous diff&eacute;rentes recettes.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 1 Kg</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(895, 3266, 'THIKA HARICOTS BLANCS ', '<p><span style=\"font-weight: 400;\">Les haricots blancs THIKA sont </span><span style=\"font-weight: 400;\">frais et n&eacute;cessitent un temps de trempage.</span></p>\r\n<p><span style=\"font-weight: 400;\">Ils sont riches en : Fibres, Fer, Phosphore, Magn&eacute;sium. Vous pouvez les d&eacute;guster sous diff&eacute;rentes recettes.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr.</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(896, 3266, 'SUCCHI HARICOTS BLANCS', '<p><span style=\"font-weight: 400;\">Les haricots blancs SUCCHI sont </span><span style=\"font-weight: 400;\">frais et n&eacute;cessitent un temps de trempage.</span></p>\r\n<p><span style=\"font-weight: 400;\">Ils sont riches en : Fibres, Fer, Phosphore, Magn&eacute;sium. </span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les d&eacute;guster sous diff&eacute;rentes recettes.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr.</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(897, 3266, 'THIKA HARICOTS ROUGES', '<p><span style=\"font-weight: 400;\">Les haricots rouges THIKA sont </span><span style=\"font-weight: 400;\">frais et n&eacute;cessitent un temps de trempage.</span></p>\r\n<p><span style=\"font-weight: 400;\">Ils sont riches en : Fibres, Fer, Phosphore, Magn&eacute;sium. </span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez les d&eacute;guster sous diff&eacute;rentes recettes.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 1 Kg.</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(898, 3268, 'SOS FRIK', '<p><span style=\"font-weight: 400;\">Bl&eacute; </span><span style=\"font-weight: 400;\">dur de couleur verte, c&rsquo;est </span><span style=\"font-weight: 400;\">un indispensable dans la cuisine de la chorba ou la harira.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 450 Gr</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(899, 3268, 'FAWAHA FRIK', '<p><span style=\"font-weight: 400;\">Bl&eacute; </span><span style=\"font-weight: 400;\">dur de couleur verte, c&rsquo;est </span><span style=\"font-weight: 400;\">un indispensable dans la cuisine de la chorba ou la harira.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 450 Gr</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(900, 3268, 'THIKA FRIK ', '<p><span style=\"font-weight: 400;\">Bl&eacute; </span><span style=\"font-weight: 400;\">dur de couleur verte, c&rsquo;est </span><span style=\"font-weight: 400;\">un indispensable dans la cuisine de la chorba ou la harira.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 450 Gr</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(901, 3268, 'THIKA FRIK ', '<p><span style=\"font-weight: 400;\">Bl&eacute; </span><span style=\"font-weight: 400;\">dur de couleur verte, c&rsquo;est </span><span style=\"font-weight: 400;\">un indispensable dans la cuisine de la chorba ou la harira.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(902, 3268, 'THIKA BOURGOULE TURQUE', '<p><span style=\"font-weight: 400;\">Pr&eacute;par&eacute;e avec de la sauce tomate, la formule du Bourgoule THIKA est tr&eacute;s d&eacute;licieuse.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Il se d&eacute;guste seul ou accompagn&eacute; d&rsquo;un plat principal.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 450 Gr</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(903, 3268, 'THIKA BOURGOULE TURQUE', '<p><span style=\"font-weight: 400;\">Pr&eacute;par&eacute;e avec de la sauce tomate, la formule du Bourgoule THIKA est tr&eacute;s d&eacute;licieuse.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Il se d&eacute;guste seul ou accompagn&eacute; d&rsquo;un plat principal.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(904, 3269, 'EZZED POIS CASSÉS', '<p><span style=\"font-weight: 400;\">Les </span>pois cass&eacute;s EZZED sont<span style=\"font-weight: 400;\"> excellents d\'un point de vue nutritionnel. </span></p>\r\n<p><span style=\"font-weight: 400;\">Ils sont riches en min&eacute;raux, notamment potassium, phosphore, calcium et fer, ainsi que les vitamines du groupe B.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">En soupe ou autre, vous pouvez les d&eacute;guster selon la recette qui vous convient.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0),
(905, 3269, 'GARRIDO POIS CASSÉS', '<p><span style=\"font-weight: 400;\">Les </span>pois cass&eacute;s GARRIDO sont<span style=\"font-weight: 400;\"> excellents d\'un point de vue nutritionnel. Ils sont riches en min&eacute;raux, notamment potassium, phosphore, calcium et fer, ainsi que les vitamines du groupe B.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">En soupe ou autre, vous pouvez les d&eacute;guster selon la recette qui vous convient.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #e67e23;\"><strong>Poids net : 500 Gr</strong></span></p>', 120, 1, '2021-05-17', 0, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `produit_img`
--

DROP TABLE IF EXISTS `produit_img`;
CREATE TABLE IF NOT EXISTS `produit_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` int(11) NOT NULL,
  `lien` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=281 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit_img`
--

INSERT INTO `produit_img` (`id`, `id_produit`, `lien`) VALUES
(44, 662, '14_103.png'),
(45, 661, '14_104.png'),
(46, 660, '14_105.png'),
(47, 640, '14_106.png'),
(48, 639, '14_107.png'),
(55, 628, '9_1plandetravail1.png'),
(60, 674, '10_10.png'),
(61, 663, '10_1.png'),
(62, 676, '11_rouiba1lcocktail.jpg'),
(63, 677, '12_rouibacocktaile.jpg'),
(64, 678, '13_rouibaexcellancemangue.jpg'),
(65, 679, '14_rouibaorange1l.jpg'),
(66, 680, '15_rouibaorangeabricot.jpg'),
(67, 681, '16_rouibaorangeabricot.jpg'),
(68, 682, '17_rouibaorangepeache.jpg'),
(69, 683, '18_rouibaorange.jpg'),
(70, 684, '19_rouiba1lananas.jpg'),
(71, 685, '20_olino.jpg'),
(72, 686, '21_1001.jpg'),
(73, 687, '22_aroma.jpg'),
(74, 688, '23_cafeasta.jpg'),
(75, 689, '24_facto.jpg'),
(76, 690, '25_cafeaboukhari.jpg'),
(77, 691, '26_many.jpg'),
(78, 692, '27_potatochipsbbq.jpg'),
(79, 693, '28_potatochipscamembert.jpg'),
(80, 694, '29_potatochipscheese.jpg'),
(81, 695, '30_potatochipspaprika.jpg'),
(82, 696, '31_potatochipspesto.jpg'),
(83, 697, '32_potatochips.jpg'),
(84, 698, '33_ahmedteajasmine.jpg'),
(85, 699, '34_elbadou.jpg'),
(86, 700, '35_elchifaa.jpg'),
(87, 701, '36_elmazadj.jpg'),
(89, 704, '38_2.png'),
(90, 705, '39_3.png'),
(91, 706, '40_4.png'),
(92, 707, '41_5.png'),
(93, 708, '42_6.png'),
(94, 709, '43_7.png'),
(95, 710, '44_8.png'),
(96, 711, '45_9.png'),
(97, 712, '46_10.png'),
(98, 713, '47_11.png'),
(99, 714, '48_12.png'),
(100, 715, '49_13.png'),
(101, 716, '50_14.png'),
(102, 717, '51_15.png'),
(103, 718, '52_16.png'),
(104, 719, '53_17.png'),
(105, 720, '54_18.png'),
(106, 721, '55_19.png'),
(107, 722, '56_20.png'),
(108, 723, '57_21.png'),
(109, 724, '58_22.png'),
(110, 725, '59_23.png'),
(111, 726, '60_24.png'),
(112, 727, '61_25.png'),
(114, 729, '63_26.png'),
(115, 730, '64_27.png'),
(116, 731, '65_28.png'),
(117, 732, '66_29.png'),
(118, 733, '67_30.png'),
(119, 734, '68_31.png'),
(120, 735, '69_32.png'),
(121, 736, '68_1.png'),
(122, 737, '69_2.png'),
(123, 738, '70_3.png'),
(124, 739, '71_4.png'),
(125, 740, '72_5.png'),
(126, 741, '73_6.png'),
(127, 742, '74_7.png'),
(128, 743, '75_9.png'),
(129, 744, '76_10.png'),
(130, 745, '77_11.png'),
(131, 746, '78_12.png'),
(132, 747, '79_13.png'),
(133, 748, '80_14.png'),
(134, 749, '81_15.png'),
(135, 750, '82_16.png'),
(136, 751, '83_16.png'),
(137, 752, '84_17.png'),
(138, 753, '85_18.png'),
(139, 754, '86_19.png'),
(140, 755, '87_20.png'),
(141, 756, '88_21.png'),
(142, 757, '89_22.png'),
(143, 758, '90_23.png'),
(144, 759, '91_24.png'),
(145, 760, '92_25.png'),
(146, 761, '93_26.png'),
(147, 762, '94_28.png'),
(148, 763, '95_30.png'),
(149, 764, '96_31.png'),
(150, 765, '97_32.png'),
(151, 766, '98_33.png'),
(152, 767, '99_34.png'),
(153, 768, '100_35.png'),
(154, 769, '101_36.png'),
(155, 770, '102_37.png'),
(156, 771, '103_38.png'),
(157, 772, '104_39.png'),
(158, 773, '105_40.png'),
(159, 774, '106_41.png'),
(160, 775, '107_42.png'),
(161, 776, '108_43.png'),
(162, 777, '109_44.png'),
(163, 778, '110_41.png'),
(164, 779, '111_45.png'),
(165, 780, '112_46.png'),
(166, 781, '113_45.png'),
(167, 782, '114_47.png'),
(168, 783, '115_48.png'),
(169, 784, '116_49.png'),
(170, 785, '117_50.png'),
(171, 786, '118_51.png'),
(172, 787, '119_52.png'),
(173, 788, '120_8.png'),
(174, 789, '121_1.png'),
(175, 790, '122_2.png'),
(176, 792, '123_3.png'),
(177, 793, '124_4.png'),
(178, 794, '125_5.png'),
(179, 795, '126_6.png'),
(180, 796, '127_7.png'),
(181, 797, '128_8.png'),
(182, 798, '129_10.png'),
(183, 799, '130_12.png'),
(184, 800, '131_13.png'),
(185, 801, '132_14.png'),
(186, 802, '133_15.png'),
(187, 803, '134_16.png'),
(188, 804, '135_18.png'),
(189, 805, '136_19.png'),
(190, 806, '137_20.png'),
(191, 807, '138_21.png'),
(192, 808, '139_22.png'),
(193, 809, '140_23.png'),
(194, 810, '141_31.png'),
(195, 811, '142_25.png'),
(196, 812, '143_28.png'),
(197, 813, '144_30.png'),
(198, 814, '145_36.png'),
(199, 815, '146_33.png'),
(200, 816, '147_37.png'),
(201, 817, '148_38.png'),
(202, 818, '149_39.png'),
(203, 819, '150_40.png'),
(204, 820, '151_41.png'),
(206, 822, '153_42.png'),
(207, 823, '154_44.png'),
(208, 824, '155_45.png'),
(209, 825, '156_46.png'),
(211, 827, '158_48.png'),
(213, 829, '160_51.png'),
(217, 833, '164_53.png'),
(218, 834, '165_54.png'),
(219, 835, '166_55.png'),
(220, 836, '167_56.png'),
(221, 837, '168_1.png'),
(222, 838, '169_2.png'),
(223, 839, '170_3.png'),
(224, 840, '171_4.png'),
(225, 841, '172_5.png'),
(226, 842, '173_6.png'),
(227, 843, '174_7.png'),
(228, 844, '175_8.png'),
(229, 845, '176_9.png'),
(230, 846, '177_10.png'),
(231, 847, '178_11.png'),
(232, 848, '179_13.png'),
(233, 849, '180_14.png'),
(234, 850, '181_15.png'),
(235, 851, '182_16.png'),
(236, 852, '183_17.png'),
(237, 853, '184_19.png'),
(238, 854, '185_21.png'),
(239, 855, '180_11.png'),
(240, 856, '181_4.png'),
(241, 857, '182_2.png'),
(242, 861, '183_5.png'),
(243, 862, '184_3.png'),
(244, 863, '185_6.png'),
(245, 864, '186_1.png'),
(246, 865, '187_2.png'),
(247, 866, '188_26.png'),
(248, 867, '189_27.png'),
(249, 869, '190_28.png'),
(250, 870, '191_32.png'),
(251, 871, '192_33.png'),
(252, 872, '193_34.png'),
(253, 874, '194_38.png'),
(254, 875, '195_40.png'),
(255, 876, '196_41.png'),
(256, 878, '197_44.png'),
(257, 879, '198_3.png'),
(258, 880, '199_11.png'),
(259, 881, '200_19.png'),
(260, 882, '201_22.png'),
(261, 883, '202_45.png'),
(262, 884, '203_4.png'),
(263, 885, '204_5.png'),
(264, 886, '205_6.png'),
(265, 887, '206_7.png'),
(266, 888, '207_8.png'),
(267, 889, '208_9.png'),
(268, 890, '209_10.png'),
(269, 891, '210_13.png'),
(270, 892, '211_14.png'),
(271, 893, '212_24.png'),
(272, 894, '213_25.png'),
(273, 895, '214_30.png'),
(274, 896, '215_37.png'),
(275, 897, '216_39.png'),
(276, 899, '217_43.png'),
(277, 901, '218_12.png'),
(278, 903, '219_31.png'),
(279, 904, '220_35.png'),
(280, 905, '221_17.png');

-- --------------------------------------------------------

--
-- Structure de la table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `vote_id` int(11) DEFAULT '0',
  `page_id` varchar(11) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `total_votes` int(11) NOT NULL DEFAULT '0',
  `total_value` int(11) NOT NULL DEFAULT '0',
  `used_ips` longtext CHARACTER SET utf8,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=419 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ratings`
--

INSERT INTO `ratings` (`id`, `vote_id`, `page_id`, `total_votes`, `total_value`, `used_ips`) VALUES
(7, NULL, 'p-662', 6, 20, 'a:6:{i:0;s:12:\"129.45.82.46\";i:1;s:14:\"35.224.144.143\";i:2;s:12:\"41.111.128.5\";i:3;s:13:\"82.80.230.228\";i:4;s:13:\"185.119.81.98\";i:5;s:13:\"51.222.43.142\";}'),
(8, NULL, 'p-661', 6, 18, 'a:6:{i:0;s:12:\"129.45.82.46\";i:1;s:14:\"35.224.144.143\";i:2;s:15:\"105.102.189.104\";i:3;s:13:\"82.80.230.228\";i:4;s:13:\"185.119.81.98\";i:5;s:11:\"72.79.53.16\";}'),
(9, NULL, 'p-640', 4, 7, 'a:4:{i:0;s:12:\"129.45.82.46\";i:1;s:14:\"35.224.144.143\";i:2;s:13:\"82.80.230.228\";i:3;s:13:\"185.119.81.98\";}'),
(10, NULL, 'p-639', 2, 6, 'a:2:{i:0;s:13:\"82.80.230.228\";i:1;s:13:\"185.119.81.98\";}'),
(11, NULL, 'p-637', 3, 6, 'a:3:{i:0;s:12:\"129.45.82.46\";i:1;s:13:\"129.45.61.124\";i:2;s:13:\"82.80.230.228\";}'),
(12, NULL, 'p-627', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(13, NULL, 'p-626', 3, 9, 'a:3:{i:0;s:13:\"82.80.230.228\";i:1;s:13:\"185.119.81.98\";i:2;s:13:\"51.222.43.142\";}'),
(14, NULL, 'p-576', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(15, NULL, 'p-574', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(16, NULL, 'p-573', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(17, NULL, 'p-572', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(18, NULL, 'p-554', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(19, NULL, 'p-663', 5, 12, 'a:5:{i:0;s:12:\"129.45.82.46\";i:1;s:14:\"35.224.144.143\";i:2;s:13:\"82.80.230.228\";i:3;s:13:\"185.119.81.98\";i:4;s:13:\"51.222.43.142\";}'),
(20, NULL, 'p-660', 4, 10, 'a:4:{i:0;s:12:\"129.45.82.46\";i:1;s:14:\"35.224.144.143\";i:2;s:13:\"82.80.230.228\";i:3;s:13:\"185.119.81.98\";}'),
(21, NULL, 'p-636', 2, 3, 'a:2:{i:0;s:13:\"129.45.61.124\";i:1;s:13:\"82.80.230.228\";}'),
(22, NULL, 'p-635', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(23, NULL, 'p-628', 5, 11, 'a:5:{i:0;s:14:\"51.161.119.105\";i:1;s:15:\"105.102.189.104\";i:2;s:13:\"82.80.230.228\";i:3;s:13:\"185.119.81.98\";i:4;s:11:\"72.79.53.16\";}'),
(24, NULL, 'p-582', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(25, NULL, 'p-523', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(26, NULL, 'p-500', 1, 2, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(27, NULL, 'p-499', 1, 2, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(28, NULL, 'p-486', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(29, NULL, 'p-400', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(30, NULL, 'p-377', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(31, NULL, 'p-300', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(32, NULL, 'p-292', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(33, NULL, 'p-89', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(34, NULL, 'p-566', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(35, NULL, 'p-436', 1, 2, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(36, NULL, 'p-382', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(37, NULL, 'p-279', 1, 2, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(38, NULL, 'p-204', 1, 3, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(39, NULL, 'p-125', 1, 2, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(40, NULL, 'p-111', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(41, NULL, 'p-91', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(42, NULL, 'p-68', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(43, NULL, 'p-31', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(44, NULL, 'p-624', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(45, NULL, 'p-623', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(46, NULL, 'p-598', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(47, NULL, 'p-595', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(48, NULL, 'p-594', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(49, NULL, 'p-586', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(50, NULL, 'p-585', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(51, NULL, 'p-584', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(52, NULL, 'p-583', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(53, NULL, 'p-423', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(54, NULL, 'p-36', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(55, NULL, 'p-617', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(56, NULL, 'p-616', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(57, NULL, 'p-597', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(58, NULL, 'p-496', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(59, NULL, 'p-495', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(60, NULL, 'p-488', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(61, NULL, 'p-472', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(62, NULL, 'p-417', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(63, NULL, 'p-399', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(64, NULL, 'p-398', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(65, NULL, 'p-170', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(66, NULL, 'p-124', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(67, NULL, 'p-487', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(68, NULL, 'p-464', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(69, NULL, 'p-451', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(70, NULL, 'p-450', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(71, NULL, 'p-388', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(72, NULL, 'p-387', 1, 3, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(73, NULL, 'p-359', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(74, NULL, 'p-330', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(75, NULL, 'p-329', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(76, NULL, 'p-328', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(77, NULL, 'p-285', 1, 2, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(78, NULL, 'p-261', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(79, NULL, 'p-581', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(80, NULL, 'p-580', 1, 2, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(81, NULL, 'p-579', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(82, NULL, 'p-578', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(83, NULL, 'p-577', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(84, NULL, 'p-570', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(85, NULL, 'p-557', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(86, NULL, 'p-553', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(87, NULL, 'p-552', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(88, NULL, 'p-551', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(89, NULL, 'p-550', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(90, NULL, 'p-549', 1, 2, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(91, NULL, 'p-513', 0, 0, NULL),
(92, NULL, 'p-510', 0, 0, NULL),
(93, NULL, 'p-492', 0, 0, NULL),
(94, NULL, 'p-491', 0, 0, NULL),
(95, NULL, 'p-490', 0, 0, NULL),
(96, NULL, 'p-489', 0, 0, NULL),
(97, NULL, 'p-471', 0, 0, NULL),
(98, NULL, 'p-463', 0, 0, NULL),
(99, NULL, 'p-458', 0, 0, NULL),
(100, NULL, 'p-457', 0, 0, NULL),
(101, NULL, 'p-454', 0, 0, NULL),
(102, NULL, 'p-452', 0, 0, NULL),
(103, NULL, 'p-326', 0, 0, NULL),
(104, NULL, 'p-322', 0, 0, NULL),
(105, NULL, 'p-317', 0, 0, NULL),
(106, NULL, 'p-315', 0, 0, NULL),
(107, NULL, 'p-311', 0, 0, NULL),
(108, NULL, 'p-310', 0, 0, NULL),
(109, NULL, 'p-309', 0, 0, NULL),
(110, NULL, 'p-308', 0, 0, NULL),
(111, NULL, 'p-307', 0, 0, NULL),
(112, NULL, 'p-278', 0, 0, NULL),
(113, NULL, 'p-275', 0, 0, NULL),
(114, NULL, 'p-264', 0, 0, NULL),
(115, NULL, 'p-85', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(116, NULL, 'p-260', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(117, NULL, 'p-238', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(118, NULL, 'p-237', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(119, NULL, 'p-236', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(120, NULL, 'p-201', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(121, NULL, 'p-200', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(122, NULL, 'p-173', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(123, NULL, 'p-120', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(124, NULL, 'p-158', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(125, NULL, 'p-84', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(126, NULL, 'p-156', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(127, NULL, 'p-134', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(128, NULL, 'p-47', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(129, NULL, 'p-126', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(130, NULL, 'p-22', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(131, NULL, 'p-122', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(132, NULL, 'p-544', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(133, NULL, 'p-543', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(134, NULL, 'p-542', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(135, NULL, 'p-541', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(136, NULL, 'p-540', 2, 6, 'a:2:{i:0;s:13:\"82.80.230.228\";i:1;s:13:\"185.119.81.98\";}'),
(137, NULL, 'p-539', 2, 7, 'a:2:{i:0;s:13:\"82.80.230.228\";i:1;s:13:\"185.119.81.98\";}'),
(138, NULL, 'p-538', 2, 6, 'a:2:{i:0;s:13:\"82.80.230.228\";i:1;s:13:\"185.119.81.98\";}'),
(139, NULL, 'p-537', 1, 2, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(140, NULL, 'p-536', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(141, NULL, 'p-535', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(142, NULL, 'p-509', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(143, NULL, 'p-494', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(144, NULL, 'p-548', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(145, NULL, 'p-547', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(146, NULL, 'p-546', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(147, NULL, 'p-545', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(148, NULL, 'p-481', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(149, NULL, 'p-478', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(150, NULL, 'p-468', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(151, NULL, 'p-467', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(152, NULL, 'p-435', 1, 2, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(153, NULL, 'p-434', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(154, NULL, 'p-433', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(155, NULL, 'p-404', 1, 2, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(156, NULL, 'p-403', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(157, NULL, 'p-376', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(158, NULL, 'p-360', 1, 2, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(159, NULL, 'p-358', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(160, NULL, 'p-357', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(161, NULL, 'p-356', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(162, NULL, 'p-340', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(163, NULL, 'p-327', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(164, NULL, 'p-254', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(165, NULL, 'p-251', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(166, NULL, 'p-242', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(167, NULL, 'p-241', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(168, NULL, 'p-240', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(169, NULL, 'p-220', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(170, NULL, 'p-219', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(171, NULL, 'p-218', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(172, NULL, 'p-32', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(173, NULL, 'p-30', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(174, NULL, 'p-4', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(175, NULL, 'p-3', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(176, NULL, 'p-2', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(177, NULL, 'p-35', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(178, NULL, 'p-211', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(179, NULL, 'p-210', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(180, NULL, 'p-203', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(181, NULL, 'p-189', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(182, NULL, 'p-186', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(183, NULL, 'p-185', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(184, NULL, 'p-184', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(185, NULL, 'p-183', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(186, NULL, 'p-182', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(187, NULL, 'p-181', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(188, NULL, 'p-180', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(189, NULL, 'p-153', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(190, NULL, 'p-133', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(191, NULL, 'p-132', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(192, NULL, 'p-131', 1, 2, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(193, NULL, 'p-129', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(194, NULL, 'p-128', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(195, NULL, 'p-113', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(196, NULL, 'p-112', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(197, NULL, 'p-107', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(198, NULL, 'p-104', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(199, NULL, 'p-90', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(200, NULL, 'p-76', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(201, NULL, 'p-66', 1, 1, 'a:1:{i:0;s:13:\"82.80.230.228\";}'),
(202, NULL, 'p-674', 3, 12, 'a:3:{i:0;s:13:\"185.119.81.98\";i:1;s:11:\"72.79.53.16\";i:2;s:13:\"129.45.68.189\";}'),
(203, NULL, 'p-675', 1, 3, 'a:1:{i:0;s:13:\"129.45.71.102\";}'),
(204, NULL, 'p-676', 1, 4, 'a:1:{i:0;s:12:\"41.111.128.5\";}'),
(205, NULL, 'p-677', 1, 3, 'a:1:{i:0;s:12:\"41.111.128.5\";}'),
(206, NULL, 'p-678', 0, 0, NULL),
(207, NULL, 'p-679', 0, 0, NULL),
(208, NULL, 'p-680', 1, 5, 'a:1:{i:0;s:12:\"41.111.128.5\";}'),
(209, NULL, 'p-681', 1, 4, 'a:1:{i:0;s:12:\"41.111.128.5\";}'),
(210, NULL, 'p-683', 0, 0, NULL),
(211, NULL, 'p-682', 0, 0, NULL),
(212, NULL, 'p-684', 0, 0, NULL),
(213, NULL, 'p-691', 0, 0, NULL),
(214, NULL, 'p-690', 0, 0, NULL),
(215, NULL, 'p-689', 0, 0, NULL),
(216, NULL, 'p-688', 0, 0, NULL),
(217, NULL, 'p-687', 0, 0, NULL),
(218, NULL, 'p-686', 0, 0, NULL),
(219, NULL, 'p-685', 0, 0, NULL),
(220, NULL, 'p-697', 0, 0, NULL),
(221, NULL, 'p-696', 0, 0, NULL),
(222, NULL, 'p-695', 0, 0, NULL),
(223, NULL, 'p-694', 0, 0, NULL),
(224, NULL, 'p-693', 0, 0, NULL),
(225, NULL, 'p-692', 0, 0, NULL),
(226, NULL, 'p-701', 0, 0, NULL),
(227, NULL, 'p-700', 0, 0, NULL),
(228, NULL, 'p-699', 0, 0, NULL),
(229, NULL, 'p-698', 0, 0, NULL),
(230, NULL, 'p-735', 0, 0, NULL),
(231, NULL, 'p-734', 0, 0, NULL),
(232, NULL, 'p-733', 0, 0, NULL),
(233, NULL, 'p-732', 0, 0, NULL),
(234, NULL, 'p-731', 0, 0, NULL),
(235, NULL, 'p-730', 0, 0, NULL),
(236, NULL, 'p-729', 0, 0, NULL),
(237, NULL, 'p-728', 0, 0, NULL),
(238, NULL, 'p-727', 0, 0, NULL),
(239, NULL, 'p-726', 0, 0, NULL),
(240, NULL, 'p-725', 0, 0, NULL),
(241, NULL, 'p-724', 0, 0, NULL),
(242, NULL, 'p-723', 0, 0, NULL),
(243, NULL, 'p-722', 0, 0, NULL),
(244, NULL, 'p-721', 0, 0, NULL),
(245, NULL, 'p-720', 0, 0, NULL),
(246, NULL, 'p-719', 0, 0, NULL),
(247, NULL, 'p-718', 0, 0, NULL),
(248, NULL, 'p-717', 0, 0, NULL),
(249, NULL, 'p-716', 0, 0, NULL),
(250, NULL, 'p-715', 0, 0, NULL),
(251, NULL, 'p-714', 0, 0, NULL),
(252, NULL, 'p-713', 0, 0, NULL),
(253, NULL, 'p-712', 0, 0, NULL),
(254, NULL, 'p-711', 0, 0, NULL),
(255, NULL, 'p-710', 0, 0, NULL),
(256, NULL, 'p-709', 0, 0, NULL),
(257, NULL, 'p-708', 0, 0, NULL),
(258, NULL, 'p-707', 0, 0, NULL),
(259, NULL, 'p-706', 0, 0, NULL),
(260, NULL, 'p-705', 0, 0, NULL),
(261, NULL, 'p-704', 0, 0, NULL),
(262, NULL, 'p-703', 0, 0, NULL),
(263, NULL, 'p-702', 0, 0, NULL),
(264, NULL, 'p-788', 0, 0, NULL),
(265, NULL, 'p-787', 0, 0, NULL),
(266, NULL, 'p-786', 0, 0, NULL),
(267, NULL, 'p-785', 0, 0, NULL),
(268, NULL, 'p-784', 0, 0, NULL),
(269, NULL, 'p-783', 0, 0, NULL),
(270, NULL, 'p-782', 0, 0, NULL),
(271, NULL, 'p-781', 0, 0, NULL),
(272, NULL, 'p-780', 0, 0, NULL),
(273, NULL, 'p-779', 0, 0, NULL),
(274, NULL, 'p-778', 0, 0, NULL),
(275, NULL, 'p-777', 0, 0, NULL),
(276, NULL, 'p-776', 0, 0, NULL),
(277, NULL, 'p-775', 0, 0, NULL),
(278, NULL, 'p-774', 0, 0, NULL),
(279, NULL, 'p-740', 0, 0, NULL),
(280, NULL, 'p-739', 0, 0, NULL),
(281, NULL, 'p-738', 0, 0, NULL),
(282, NULL, 'p-737', 0, 0, NULL),
(283, NULL, 'p-736', 0, 0, NULL),
(284, NULL, 'p-854', 0, 0, NULL),
(285, NULL, 'p-853', 0, 0, NULL),
(286, NULL, 'p-852', 0, 0, NULL),
(287, NULL, 'p-851', 0, 0, NULL),
(288, NULL, 'p-850', 0, 0, NULL),
(289, NULL, 'p-849', 0, 0, NULL),
(290, NULL, 'p-848', 0, 0, NULL),
(291, NULL, 'p-847', 0, 0, NULL),
(292, NULL, 'p-846', 0, 0, NULL),
(293, NULL, 'p-845', 0, 0, NULL),
(294, NULL, 'p-844', 0, 0, NULL),
(295, NULL, 'p-843', 0, 0, NULL),
(296, NULL, 'p-842', 0, 0, NULL),
(297, NULL, 'p-841', 0, 0, NULL),
(298, NULL, 'p-840', 0, 0, NULL),
(299, NULL, 'p-836', 0, 0, NULL),
(300, NULL, 'p-835', 0, 0, NULL),
(301, NULL, 'p-834', 0, 0, NULL),
(302, NULL, 'p-833', 0, 0, NULL),
(303, NULL, 'p-832', 0, 0, NULL),
(304, NULL, 'p-831', 0, 0, NULL),
(305, NULL, 'p-830', 0, 0, NULL),
(306, NULL, 'p-829', 0, 0, NULL),
(307, NULL, 'p-828', 0, 0, NULL),
(308, NULL, 'p-827', 0, 0, NULL),
(309, NULL, 'p-826', 0, 0, NULL),
(310, NULL, 'p-825', 0, 0, NULL),
(311, NULL, 'p-824', 0, 0, NULL),
(312, NULL, 'p-823', 0, 0, NULL),
(313, NULL, 'p-822', 0, 0, NULL),
(314, NULL, 'p-821', 0, 0, NULL),
(315, NULL, 'p-820', 0, 0, NULL),
(316, NULL, 'p-773', 0, 0, NULL),
(317, NULL, 'p-772', 0, 0, NULL),
(318, NULL, 'p-771', 0, 0, NULL),
(319, NULL, 'p-770', 0, 0, NULL),
(320, NULL, 'p-769', 0, 0, NULL),
(321, NULL, 'p-768', 0, 0, NULL),
(322, NULL, 'p-767', 0, 0, NULL),
(323, NULL, 'p-766', 0, 0, NULL),
(324, NULL, 'p-765', 0, 0, NULL),
(325, NULL, 'p-819', 0, 0, NULL),
(326, NULL, 'p-818', 0, 0, NULL),
(327, NULL, 'p-817', 0, 0, NULL),
(328, NULL, 'p-816', 0, 0, NULL),
(329, NULL, 'p-815', 0, 0, NULL),
(330, NULL, 'p-814', 0, 0, NULL),
(331, NULL, 'p-813', 0, 0, NULL),
(332, NULL, 'p-812', 0, 0, NULL),
(333, NULL, 'p-811', 0, 0, NULL),
(334, NULL, 'p-810', 0, 0, NULL),
(335, NULL, 'p-809', 0, 0, NULL),
(336, NULL, 'p-808', 0, 0, NULL),
(337, NULL, 'p-807', 0, 0, NULL),
(338, NULL, 'p-806', 0, 0, NULL),
(339, NULL, 'p-805', 0, 0, NULL),
(340, NULL, 'p-804', 0, 0, NULL),
(341, NULL, 'p-803', 0, 0, NULL),
(342, NULL, 'p-802', 0, 0, NULL),
(343, NULL, 'p-801', 0, 0, NULL),
(344, NULL, 'p-800', 0, 0, NULL),
(345, NULL, 'p-799', 0, 0, NULL),
(346, NULL, 'p-798', 0, 0, NULL),
(347, NULL, 'p-797', 0, 0, NULL),
(348, NULL, 'p-796', 0, 0, NULL),
(349, NULL, 'p-795', 0, 0, NULL),
(350, NULL, 'p-794', 0, 0, NULL),
(351, NULL, 'p-793', 0, 0, NULL),
(352, NULL, 'p-792', 0, 0, NULL),
(353, NULL, 'p-791', 0, 0, NULL),
(354, NULL, 'p-790', 0, 0, NULL),
(355, NULL, 'p-789', 0, 0, NULL),
(356, NULL, 'p-764', 0, 0, NULL),
(357, NULL, 'p-763', 0, 0, NULL),
(358, NULL, 'p-762', 0, 0, NULL),
(359, NULL, 'p-761', 0, 0, NULL),
(360, NULL, 'p-760', 0, 0, NULL),
(361, NULL, 'p-759', 0, 0, NULL),
(362, NULL, 'p-758', 0, 0, NULL),
(363, NULL, 'p-757', 0, 0, NULL),
(364, NULL, 'p-756', 0, 0, NULL),
(365, NULL, 'p-755', 0, 0, NULL),
(366, NULL, 'p-754', 0, 0, NULL),
(367, NULL, 'p-753', 0, 0, NULL),
(368, NULL, 'p-752', 0, 0, NULL),
(369, NULL, 'p-751', 0, 0, NULL),
(370, NULL, 'p-750', 0, 0, NULL),
(371, NULL, 'p-749', 0, 0, NULL),
(372, NULL, 'p-748', 0, 0, NULL),
(373, NULL, 'p-747', 0, 0, NULL),
(374, NULL, 'p-746', 0, 0, NULL),
(375, NULL, 'p-745', 0, 0, NULL),
(376, NULL, 'p-744', 0, 0, NULL),
(377, NULL, 'p-743', 0, 0, NULL),
(378, NULL, 'p-742', 0, 0, NULL),
(379, NULL, 'p-741', 0, 0, NULL),
(380, NULL, 'p-863', 0, 0, NULL),
(381, NULL, 'p-862', 0, 0, NULL),
(382, NULL, 'p-861', 0, 0, NULL),
(383, NULL, 'p-860', 0, 0, NULL),
(384, NULL, 'p-859', 0, 0, NULL),
(385, NULL, 'p-858', 0, 0, NULL),
(386, NULL, 'p-857', 0, 0, NULL),
(387, NULL, 'p-856', 0, 0, NULL),
(388, NULL, 'p-855', 0, 0, NULL),
(389, NULL, 'p-883', 0, 0, NULL),
(390, NULL, 'p-882', 0, 0, NULL),
(391, NULL, 'p-881', 0, 0, NULL),
(392, NULL, 'p-880', 0, 0, NULL),
(393, NULL, 'p-879', 0, 0, NULL),
(394, NULL, 'p-878', 0, 0, NULL),
(395, NULL, 'p-877', 0, 0, NULL),
(396, NULL, 'p-876', 0, 0, NULL),
(397, NULL, 'p-875', 0, 0, NULL),
(398, NULL, 'p-874', 0, 0, NULL),
(399, NULL, 'p-873', 0, 0, NULL),
(400, NULL, 'p-872', 0, 0, NULL),
(401, NULL, 'p-871', 0, 0, NULL),
(402, NULL, 'p-870', 0, 0, NULL),
(403, NULL, 'p-869', 0, 0, NULL),
(404, NULL, 'p-905', 0, 0, NULL),
(405, NULL, 'p-904', 0, 0, NULL),
(406, NULL, 'p-903', 0, 0, NULL),
(407, NULL, 'p-902', 0, 0, NULL),
(408, NULL, 'p-901', 0, 0, NULL),
(409, NULL, 'p-900', 0, 0, NULL),
(410, NULL, 'p-899', 0, 0, NULL),
(411, NULL, 'p-898', 0, 0, NULL),
(412, NULL, 'p-897', 0, 0, NULL),
(413, NULL, 'p-896', 0, 0, NULL),
(414, NULL, 'p-895', 0, 0, NULL),
(415, NULL, 'p-894', 0, 0, NULL),
(416, NULL, 'p-893', 0, 0, NULL),
(417, NULL, 'p-892', 0, 0, NULL),
(418, NULL, 'p-891', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(200) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `titre`, `description`) VALUES
(1, 'LIVRAISON A DOMICIL', 'Votre produit sera livré a votre adresse personnel'),
(2, '24/7 SUPPORT', 'Nos équipes sont prêt a répondre a tout vos questions'),
(3, 'PAIEMENT A LA LIVRAISON', 'Vous pouvez payer vos articles par CCP ou bien lors de livraison');

-- --------------------------------------------------------

--
-- Structure de la table `slide`
--

DROP TABLE IF EXISTS `slide`;
CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT '#',
  `titre` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `slide`
--

INSERT INTO `slide` (`id`, `image`, `titre`, `description`) VALUES
(25, '25_slideplandetravail1.jpg', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `tab_admi`
--

DROP TABLE IF EXISTS `tab_admi`;
CREATE TABLE IF NOT EXISTS `tab_admi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loggin` varchar(50) CHARACTER SET utf8 NOT NULL,
  `pass_md5` varchar(50) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tab_admi`
--

INSERT INTO `tab_admi` (`id`, `loggin`, `pass_md5`, `name`, `type`) VALUES
(1, 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 'SUPER', 0),
(46, 'test', '098f6bcd4621d373cade4e832627b4f6', 'Boutique SMART PIXEL', 1);

-- --------------------------------------------------------

--
-- Structure de la table `upload`
--

DROP TABLE IF EXISTS `upload`;
CREATE TABLE IF NOT EXISTS `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lien` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 NOT NULL,
  `nom` varchar(200) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(200) CHARACTER SET utf8 NOT NULL,
  `genre` int(11) NOT NULL DEFAULT '0',
  `wilaya` varchar(100) CHARACTER SET utf8 NOT NULL,
  `commune` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `adresse` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `telephone` varchar(20) CHARACTER SET utf8 NOT NULL,
  `avatar` varchar(200) CHARACTER SET utf8 NOT NULL DEFAULT 'default.png',
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `email`, `password`, `nom`, `prenom`, `genre`, `wilaya`, `commune`, `adresse`, `telephone`, `avatar`, `date`) VALUES
(1, '', 'test@live.fr', '61589acfcb48bfeee4a68cc536d1a493', 'walid', 'walid', 0, '16', '1', NULL, '', 'default.png', '2019-04-02'),
(2, '', 'testtest@live.fr', 'f2bd78d310ba64f482a7415e29778989', 'test', 'test', 0, '16', '1', NULL, '', 'default.png', '2019-07-09'),
(3, '', 'dahia.baraka@yahoo.com', '481ef83f3145fe37a5f40268bb87ca6b', 'Baraka', 'dahia', 0, '16', '1', NULL, '', 'default.png', '2019-07-14'),
(4, '', 'fbarakadz@gmail.com', 'd7124cb01ea12bd2ceebb3555122e193', 'Farid', 'farid', 0, '16', '1', NULL, '', 'default.png', '2019-07-24'),
(5, '', 'dahia.baraka@gmail.com', '193f67e40b4b13f36ffa39781574bd2c', 'Baraka', 'dahia', 0, '16', '1', NULL, '', 'default.png', '2019-09-19'),
(6, '', 'm.aris@hotmal.fr', 'e10adc3949ba59abbe56e057f20f883e', 'aris', 'musta', 0, '16', '1', NULL, '', 'default.png', '2019-10-12'),
(8, '', 'wassila_ba@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 'Baraka', 'Wassila', 0, '16', '1', 'Ain benian', '', 'default.png', '2019-10-25'),
(9, '', 'djames.designer@gmail.com', '33dad54c82312f5b6be577afa3725b92', 'Djamel', 'Eddine', 0, '16', '1', 'Dely Ibrahim, Alger', '', 'default.png', '2020-03-09'),
(10, '', 'bessaihhana47@gmail.com', '93d7803512926d31e46561b1d990a4cf', 'Bessaih ', 'Hana', 0, '16', '1', 'Palm Beach 113 Staouali Alger, Staouali', '', 'default.png', '2020-03-26'),
(11, '', 'fellald2@outlook.com', '4f3ab059a3f44f318bf865fd22273b5c', 'Fella', 'Ld', 0, '16', '1', 'Afrique bazar birkhadem', '', 'default.png', '2020-03-31'),
(12, '', 'hamicizohra@hotmail.fr', '95f2e9256583a44459fe634d0f52d5e5', 'Daoud', 'Zola', 0, '16', '1', 'Rue hassiba', '', 'default.png', '2020-04-06'),
(13, '', 'chekirebd@gmail.com', '97b05ce1ae7f26a63d91a2865ca202ca', 'chekireb ', 'djebril', 0, '16', '1', '21 Rue Reda Houhou SIDI MHAMED, 34 RUE ARBAJI ABD RAHMANE LA CASBAH', '', 'default.png', '2020-04-07'),
(14, '', 'kassioui_amar@yahoo.fr', '00f9f993cc6f4f67b2ac15c468db6e7a', 'Kassioui', 'Amar', 0, '16', '1', 'Cité CNEP , rue Aissat Idir ', '', 'default.png', '2020-04-09'),
(15, '', 'yo.baraka@etsbaraka.com', '0a7ca0055dd4315e72af929d0a0e1d15', 'baraka', 'mehdi', 0, '16', '1', '02 lot clos de la grotte ain benian (chateau boumedienne)', '', 'default.png', '2020-04-21'),
(16, '', 'karimaammarkhodja1974@gmail.com', 'b323b8b9c5e580867343b12eb1d4682f', 'Karima ', 'Ammarkhodja', 0, '16', '1', 'Agence de ain beniane ', '', 'default.png', '2020-04-22'),
(17, '', 'med140212@gmail.com', '791ec6b57231ef0777db852f05835014', 'Benmeddour ', 'Adam ', 0, '16', '1', 'Ridjal laafroun ', '', 'default.png', '2020-04-22'),
(18, '', 'nacera_baaziz@yahoo.com', '5da8eefbf4278b5638a31376410b78db', 'BENAZZA', 'Redouane', 0, '16', '1', 'bt B cage 1 sidi el kebir rais hammidou', '', 'default.png', '2020-04-23'),
(19, '', 'kamilia32@live.fr', '0e3868f198c5a4df1d346876d90ade41', 'Laure', 'Rima', 0, '16', '1', 'Ain benian ', '', 'default.png', '2020-04-24'),
(20, '', 'lbaraka50@gmail.com', 'eb05bd1fcc2658b1b2dd46b92c96fc28', 'Baraka', 'Linda', 0, '16', '1', '9 Cité militaire Boudjemaa temmim', '', 'default.png', '2020-04-25'),
(21, '', 'fella_kgc@yahoo.fr', '41ef3ff75287f2e6f43eda13ffcfd72a', 'Boukadoum ', 'Fella', 0, '16', '1', '02 lotissement arracyle bains romains 16060', '', 'default.png', '2020-04-26'),
(22, '', 'azizabaraka530@hotmail.com', '8e0e874a4d2a953d16aaf4f3ef48f4e5', 'Baraka', 'Aziza', 0, '16', '1', 'Cité 352 lgt beau séjour bouzareah', '', 'default.png', '2020-04-26'),
(23, '', 'taharzou2@gmail.com', '4975e683d51e54964db5a55a01cc0876', 'Aittahar', 'Karima', 0, '16', '1', '502 logements belvédère et A7 bis', '', 'default.png', '2020-04-27'),
(24, '', 'asona.asma32@gmail.com', '02f018029c6d44c308b17fc2ff46e047', 'Saidi', 'Asma', 0, '16', '1', '84rue montplaisant oued koreiche', '', 'default.png', '2020-04-29'),
(25, '', 'yacine.benamarr@gmail.com', '73f64eb1af8f8e6faef58f7383788906', 'BENAMAR', 'BRAHIM', 0, '16', '1', 'CITE 2540 LOGTS BATIMENT G6 ETAGE 1 APPARTEMENT 4 - 1626 DJISR KSENTINA - ALGER', '', 'default.png', '2020-05-03'),
(26, '', 'wassilamoudjit20@gmail.com', '9d8c8b2f00616751290a0a2ba7fa19bc', 'Moudjit', 'Ouassila', 0, '16', '1', '18 rue les frères mizie scala el biar', '', 'default.png', '2020-05-09'),
(27, '', 'ouassilamoudjit19@gmail.com', 'e813e49f9fba3168c06814ac7fb0c247', 'Moudjit', 'Wassila', 0, '16', '1', '18 rue les frères mizir scala el biar', '', 'default.png', '2020-05-09'),
(28, '', 'assiamor.bl@gmail.com', 'ac3670c105eff4577607cf8d1f5eb0d1', 'Benmokhtar', 'Salah', 0, '16', '1', '05 rue tayeb ikariouen', '', 'default.png', '2020-05-13'),
(29, '', 'maya.medjou@gmail.com', '45c1a63783da5d5658afacecea24242c', 'Merad', 'Maya', 0, '16', '1', 'Résidence Bali 2 Djenane Achabou ', '', 'default.png', '2020-05-15'),
(32, '', 'rafik.zenati@quintilesims.com', '8d9a0adb7c204239c9635426f35c9522', 'zenati', 'rafik', 0, '16', '1', 'Algiers, Algiers', '', 'default.png', '2020-05-26'),
(33, '', 'khokhaloli22@gmail.com', 'c00af9b18da856bb79c32bdd678889d5', 'Kerdjou', 'Souad', 0, '16', '1', '37 cooperative el nour ain benian ', '', 'default.png', '2020-06-01'),
(34, '', 'nounaprincesse51@gmail.com', 'f42a97e957973bab76c15d8374ca49c0', 'Nasri', 'Amel', 0, '16', '1', 'Clup des pins', '', 'default.png', '2020-06-04'),
(35, 'testing123@live.fr', 'testing123@live.fr', '8acacdee9f1f1cb43f3f28374a792efe', 'testing123@live.fr', 'testing123@live.fr', 1, '5', '6', 'testing123@live.fr', '0553535353', 'default.png', '2020-12-03'),
(36, 'myr', 'myr.hamouche@gmail.com', 'ea5ba0edfb4ff7023e53cf105b9d8ace', 'myriam', 'hamouche', 1, '16', '1', 'rue didouche morad', '0559058978', 'default.png', '2021-01-21'),
(37, 'ayoub', 'ay.hamouche@gmail.com', '6026eab13daf0bf4d5bae9e21ce93887', 'ayoub ', 'hamouche', 0, '1', '1', 'adrar', '0770531819', 'default.png', '2021-01-21'),
(38, 'nesrine', 'bobose.ange@gmail.com', '32ce593c98e06f20d0e0ad9d0660df4c', 'nesrine', 'nesrine', 1, '16', '1', '32 rue ben', '0770144250', 'default.png', '2021-02-24'),
(39, 'admin112', 'admin112@live.fr', '0fdf6d8829854bedeaed992a6f3ad83a', 'admin112', 'admin112', 0, '7', '6', 'admin112', '021551515151', 'default.png', '2021-04-11');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `commande_detail`
--
ALTER TABLE `commande_detail`
  ADD CONSTRAINT `commande_detail_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tab_admi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit_img`
--
ALTER TABLE `produit_img`
  ADD CONSTRAINT `produit_img_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
