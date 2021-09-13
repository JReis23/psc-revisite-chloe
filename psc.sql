-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 08 août 2021 à 14:04
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `psc`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonne_newsletter`
--

DROP TABLE IF EXISTS `abonne_newsletter`;
CREATE TABLE IF NOT EXISTS `abonne_newsletter` (
  `id_abonne` int(30) NOT NULL AUTO_INCREMENT,
  `email` varchar(70) NOT NULL,
  PRIMARY KEY (`id_abonne`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `abonne_newsletter`
--

INSERT INTO `abonne_newsletter` (`id_abonne`, `email`) VALUES
(1, 'Azrty@yahoo.com');

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

DROP TABLE IF EXISTS `actualite`;
CREATE TABLE IF NOT EXISTS `actualite` (
  `id_actualite` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `accroche` text,
  `lien_externe` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `contenu` text,
  `rubrique` int(1) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `date_evenement` date DEFAULT NULL,
  PRIMARY KEY (`id_actualite`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `actualite`
--

INSERT INTO `actualite` (`id_actualite`, `titre`, `accroche`, `lien_externe`, `image`, `contenu`, `rubrique`, `date_debut`, `date_fin`, `date_evenement`) VALUES
(19, 'Le Ch&acirc;teau', '<p>In suscipit libero non consequat fermentum. Donec in sem scelerisque turpis aliquet porttitor. Sed egestas est in leo cursus, vel eleifend </p>', '', 'inc/image/img_actualite/images.jpg', '<p>In suscipit libero non consequat fermentum. Donec in sem scelerisque turpis aliquet porttitor. Sed egestas est in leo cursus, vel eleifend libero tristique. Etiam in volutpat nulla. Maecenas sollicitudin, erat id consectetur lobortis, justo nisl lacinia ante, non fringilla arcu orci nec erat. Fusce quis odio et velit bibendum venenatis ultricies quis purus. Nunc in interdum orci. Sed rutrum diam ante, et placerat ex fermentum a. Aliquam non libero quis elit sollicitudin sodales. Donec nec lorem quis nisl luctus sagittis in eget nisl. Pellentesque condimentum tempor velit, sed faucibus elit molestie vitae. Phasellus lobortis elit non nulla ornare, eget tempus orci elementum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris rhoncus pulvinar nisl, sit amet scelerisque nisi dapibus vel.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '2029-07-08', '2021-01-02', '2025-06-02'),
(33, 'Les Pi&egrave;ces', '<p>Lonsectetur adipiscing elit. Mauris rhoncus pulvinar nisl, sit amet scelerisque nisi dapibus vel.</p>', '', 'inc/image/img_actualite/plan-de-financement.jpg', '<p>In suscipit libero non consequat fermentum. Donec in sem scelerisque turpis aliquet porttitor. Sed egestas est in leo cursus, vel eleifend libero tristique. Etiam in volutpat nulla. Maecenas sollicitudin, erat id consectetur lobortis, justo nisl lacinia ante, non fringilla arcu orci nec erat. Fusce quis odio et velit bibendum venenatis ultricies quis purus. Nunc in interdum orci. Sed rutrum diam ante, et placerat ex fermentum a. Aliquam non libero quis elit sollicitudin sodales. Donec nec lorem quis nisl luctus sagittis in eget nisl. Pellentesque condimentum tempor velit, sed faucibus elit molestie vitae. Phasellus lobortis elit non nulla ornare, eget tempus orci elementum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris rhoncus pulvinar nisl, sit amet scelerisque nisi dapibus vel.</p>\r\n\r\n<p>Morbi in mi bibendum, sollicitudin elit ac, blandit mauris. Suspendisse a tortor cursus, faucibus lectus non, fermentum risus. Donec tristique dolor sit amet eros tempor iaculis. Vivamus eget ligula auctor, congue arcu laoreet, dapibus tortor. Pellentesque sed lorem non ligula suscipit aliquet. Morbi a egestas massa, eu mattis lorem. Ut convallis enim in nunc suscipit rutrum. Curabitur euismod a purus ut sagittis. Praesent faucibus volutpat interdum.</p>\r\n', 2, '2021-06-18', '2021-03-07', NULL),
(34, 'Le p\\\'tit Docteur', '<p>&nbsp;Vestibulum pretium felis sed tempor euismod. Maecenas dignissim ac nunc sit amet.</p>', NULL, 'inc/image/img_actualite/complementaire-sante.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eros neque, dictum non risus nec, lacinia vulputate sapien. Curabitur luctus neque nec est rutrum cursus. Praesent ullamcorper eros ac gravida mollis. Curabitur tincidunt eros sit amet scelerisque malesuada. Sed gravida in ex eleifend accumsan. Suspendisse finibus ut tellus nec elementum. Mauris eu felis velit. Vestibulum pharetra lorem at nulla consequat condimentum. Nunc lacinia dolor ac diam sollicitudin congue. Sed sodales libero et posuere blandit. Nam maximus neque quis ligula fringilla malesuada. Sed a iaculis enim.</p><p>&nbsp;</p>', 4, '2021-06-18', '2022-08-07', NULL),
(42, 'Personnel', '<p>Un Actualite qui parle du personnel</p>', '', 'inc/image/img_actualite/groupe-personnel-medical-portant-icones-liees-sante_53876-43071.webp', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus risus augue, pharetra id mi faucibus, tempor dictum tortor. Vivamus in tellus quis mauris suscipit hendrerit ac vitae augue. Morbi fermentum non urna vitae dapibus. Mauris congue sodales volutpat. Quisque interdum magna vel est faucibus lobortis. Etiam tincidunt enim risus, nec ultrices orci ornare vulputate. Vivamus in magna nulla. Sed id dolor facilisis, venenatis risus ut, lacinia risus. Sed risus purus, gravida vitae porttitor at, tincidunt eget urna.</p>\r\n\r\n<p>Etiam dictum mi in mauris bibendum facilisis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In ac sollicitudin nibh, sit amet consequat felis. Maecenas gravida ipsum in tristique dapibus. Phasellus interdum, leo in finibus ullamcorper, ipsum quam suscipit lacus, sit amet auctor tellus justo vel sapien. Integer et est vel nisi volutpat sagittis. Phasellus bibendum accumsan erat, vel maximus tortor varius sit amet. Aliquam id tellus nisl. Sed feugiat fringilla lorem vel condimentum. Donec placerat sed nunc vitae semper. Mauris ut lorem nec leo faucibus condimentum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse cursus nisl metus, id cursus nulla imperdiet ut.</p>\r\n', 4, '2022-07-31', '2022-08-07', '2023-03-05'),
(43, 'Le Stetoscope', '<p>Où l\'on parle de stéthoscope…</p>', '', 'inc/image/img_actualite/stetoscope.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus risus augue, pharetra id mi faucibus, tempor dictum tortor. Vivamus in tellus quis mauris suscipit hendrerit ac vitae augue. Morbi fermentum non urna vitae dapibus. Mauris congue sodales volutpat. Quisque interdum magna vel est faucibus lobortis. Etiam tincidunt enim risus, nec ultrices orci ornare vulputate. Vivamus in magna nulla. Sed id dolor facilisis, venenatis risus ut, lacinia risus. Sed risus purus, gravida vitae porttitor at, tincidunt eget urna.</p>\r\n\r\n<p>Etiam dictum mi in mauris bibendum facilisis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In ac sollicitudin nibh, sit amet consequat felis. Maecenas gravida ipsum in tristique dapibus. Phasellus interdum, leo in finibus ullamcorper, ipsum quam suscipit lacus, sit amet auctor tellus justo vel sapien. Integer et est vel nisi volutpat sagittis. Phasellus bibendum accumsan erat, vel maximus tortor varius sit amet. Aliquam id tellus nisl. Sed feugiat fringilla lorem vel condimentum. Donec placerat sed nunc vitae semper. Mauris ut lorem nec leo faucibus condimentum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse cursus nisl metus, id cursus nulla imperdiet ut.</p>\r\n', 4, '2021-07-31', '2074-08-07', NULL),
(44, 'Sant&eacute; public france', '<p>Un actualite qui parle de Santé Public France</p>', NULL, 'inc/image/img_actualite/sante public france.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus risus augue, pharetra id mi faucibus, tempor dictum tortor. Vivamus in tellus quis mauris suscipit hendrerit ac vitae augue. Morbi fermentum non urna vitae dapibus. Mauris congue sodales volutpat. Quisque interdum magna vel est faucibus lobortis. Etiam tincidunt enim risus, nec ultrices orci ornare vulputate. Vivamus in magna nulla. Sed id dolor facilisis, venenatis risus ut, lacinia risus. Sed risus purus, gravida vitae porttitor at, tincidunt eget urna.</p><p>Etiam dictum mi in mauris bibendum facilisis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In ac sollicitudin nibh, sit amet consequat felis. Maecenas gravida ipsum in tristique dapibus. Phasellus interdum, leo in finibus ullamcorper, ipsum quam suscipit lacus, sit amet auctor tellus justo vel sapien. Integer et est vel nisi volutpat sagittis. Phasellus bibendum accumsan erat, vel maximus tortor varius sit amet. Aliquam id tellus nisl. Sed feugiat fringilla lorem vel condimentum. Donec placerat sed nunc vitae semper. Mauris ut lorem nec leo faucibus condimentum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse cursus nisl metus, id cursus nulla imperdiet ut.</p>', 4, '2021-07-31', '2022-08-07', NULL),
(45, 'Personnel2', '<p>Un autre texte parlant du personnel</p>', NULL, 'inc/image/img_actualite/Sante-personnalisee-et-prevention-des-maladies-chroniques-besoins-perceptions-et-attentes-des-patients-et-des-medecins-generalistes_i1540.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus risus augue, pharetra id mi faucibus, tempor dictum tortor. Vivamus in tellus quis mauris suscipit hendrerit ac vitae augue. Morbi fermentum non urna vitae dapibus. Mauris congue sodales volutpat. Quisque interdum magna vel est faucibus lobortis. Etiam tincidunt enim risus, nec ultrices orci ornare vulputate. Vivamus in magna nulla. Sed id dolor facilisis, venenatis risus ut, lacinia risus. Sed risus purus, gravida vitae porttitor at, tincidunt eget urna.</p><p>Etiam dictum mi in mauris bibendum facilisis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In ac sollicitudin nibh, sit amet consequat felis. Maecenas gravida ipsum in tristique dapibus. Phasellus interdum, leo in finibus ullamcorper, ipsum quam suscipit lacus, sit amet auctor tellus justo vel sapien. Integer et est vel nisi volutpat sagittis. Phasellus bibendum accumsan erat, vel maximus tortor varius sit amet. Aliquam id tellus nisl. Sed feugiat fringilla lorem vel condimentum. Donec placerat sed nunc vitae semper. Mauris ut lorem nec leo faucibus condimentum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse cursus nisl metus, id cursus nulla imperdiet ut.</p>', 4, '2021-07-31', '2022-08-07', NULL),
(46, 'La nature', '<p>L\'accroche de l\'actualite</p>', '', 'inc/image/img_actualite/55f319361ba55025d864ec596c1dc834.jpg', '<h2><strong>Gros de l&#39;actualite</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Voici lactualite</p>\r\n', 1, '2021-03-04', '2021-04-07', '2027-06-03'),
(63, 'Finances', 'Autre actualité', '', '', '', 2, '2021-08-07', '2022-08-07', NULL),
(64, 'Test pour agenda', 'Page wikipedia de foret', 'https://fr.wikipedia.org/wiki/For%C3%AAt', '', '', 3, '2021-08-08', '2021-04-08', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id_administrateur` int(3) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `statut` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_administrateur`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id_administrateur`, `nom`, `prenom`, `email`, `mdp`, `statut`) VALUES
(1, 'Marchand', 'Fabiana', 'fabiana@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9', 1),
(26, 'Fauxnom', 'Fauxprenom', 'mail@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9', 1);

-- --------------------------------------------------------

--
-- Structure de la table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE IF NOT EXISTS `agenda` (
  `id_agenda` int(6) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `rubrique` int(1) DEFAULT '0',
  `lien` varchar(255) DEFAULT NULL,
  `date_jour` varchar(2) DEFAULT NULL,
  `date_mois` varchar(2) DEFAULT NULL,
  `date_annee` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `nom`, `description`, `rubrique`, `lien`, `date_jour`, `date_mois`, `date_annee`) VALUES
(8, 'Formation &laquo; Rep&eacute;rage de la crise suicidaire &raquo;', 'Formation &laquo;&nbsp;Rep&eacute;rage de la crise suicidaire&nbsp;&raquo; le 7 et 14 octobre 2021', 4, '', '07', '10', '21'),
(12, 'Octobre rose', 'Octobre rose&nbsp;: marche et trail urbain le dimanche 3 octobre 2021 &agrave; Barbezieux', 4, '', '03', '10', '21'),
(13, 'Conf&eacute;rences &laquo;&nbsp;sant&eacute; environnementale&nbsp;&raquo;', 'Conf&eacute;rences &laquo;&nbsp;sant&eacute; environnementale&nbsp;&raquo; octobre et novembre 2021&nbsp;', 4, '', '01', '10', '21'),
(11, 'Forum des aidants', 'Forum des aidants le 17 et 18 septembre 2021, &agrave; Montmoreau et Salles de Barbezieux', 4, '', '17', '09', '21');

-- --------------------------------------------------------

--
-- Structure de la table `bloc_agenda`
--

DROP TABLE IF EXISTS `bloc_agenda`;
CREATE TABLE IF NOT EXISTS `bloc_agenda` (
  `id_bloc_agenda` int(6) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT 'Agenda',
  `ordre` int(1) DEFAULT '1',
  `agenda1` int(6) DEFAULT '0',
  `agenda2` int(6) DEFAULT '0',
  `agenda3` int(6) DEFAULT '0',
  `agenda4` int(6) DEFAULT '0',
  `agenda5` int(6) DEFAULT '0',
  `agenda6` int(6) DEFAULT '0',
  `agenda7` int(6) DEFAULT '0',
  `agenda8` int(6) DEFAULT '0',
  `agenda9` int(6) DEFAULT '0',
  `agenda10` int(6) DEFAULT '0',
  `agenda11` int(6) DEFAULT '0',
  `agenda12` int(6) DEFAULT '0',
  PRIMARY KEY (`id_bloc_agenda`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bloc_agenda`
--

INSERT INTO `bloc_agenda` (`id_bloc_agenda`, `titre`, `ordre`, `agenda1`, `agenda2`, `agenda3`, `agenda4`, `agenda5`, `agenda6`, `agenda7`, `agenda8`, `agenda9`, `agenda10`, `agenda11`, `agenda12`) VALUES
(1, 'Actions du pays', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'Actions en cours', 1, 13, 8, 11, 12, 0, 0, 0, 0, 0, 0, 0, 0),
(74, 'Agenda', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(75, 'Agenda', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(54, 'Agenda', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(76, 'Agenda', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(77, 'Agenda', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(81, 'Agenda', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(79, 'Agenda', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(80, 'Informations / agenda des actions ', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(82, 'Agenda', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(83, 'Agenda', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(84, 'Actions', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `bloc_contact`
--

DROP TABLE IF EXISTS `bloc_contact`;
CREATE TABLE IF NOT EXISTS `bloc_contact` (
  `id_bloc_contact` int(3) NOT NULL AUTO_INCREMENT,
  `ordre` int(4) DEFAULT '1',
  `equipier_affichage` int(1) DEFAULT '0',
  `equipier` int(4) DEFAULT '1',
  `bouton_affichage` int(1) DEFAULT '0',
  PRIMARY KEY (`id_bloc_contact`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bloc_contact`
--

INSERT INTO `bloc_contact` (`id_bloc_contact`, `ordre`, `equipier_affichage`, `equipier`, `bouton_affichage`) VALUES
(1, 6, 0, 1, 0),
(2, 2, 1, 4, 1),
(3, 3, 1, 27, 1),
(4, 5, 1, 9, 0),
(5, 3, 1, 1, 1),
(74, 1, 1, 1, 1),
(54, 3, 0, NULL, 1),
(75, 1, 1, 9, 0),
(76, 1, 0, 1, 0),
(77, 1, 0, 1, 0),
(81, 1, 0, 1, 0),
(79, 3, 1, 9, 0),
(80, 4, 1, 9, 0),
(82, 4, 1, 1, 0),
(83, 2, 1, 9, 0),
(84, 1, 1, 27, 0);

-- --------------------------------------------------------

--
-- Structure de la table `bloc_contenu`
--

DROP TABLE IF EXISTS `bloc_contenu`;
CREATE TABLE IF NOT EXISTS `bloc_contenu` (
  `id_bloc_contenu` int(4) NOT NULL AUTO_INCREMENT,
  `page` int(4) DEFAULT NULL,
  `contenu` text,
  PRIMARY KEY (`id_bloc_contenu`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bloc_contenu`
--

INSERT INTO `bloc_contenu` (`id_bloc_contenu`, `page`, `contenu`) VALUES
(1, 1, '<h4><strong>Le Pays Sud Charente</strong></h4><p>Créé en 1972, sous la forme d’un SIVOM, il est reconnu « Pays » en 1998 et se transforme en Syndicat Mixte en 1999. Le Pays Sud Charente n’a pas de compétences mais des missions ayant trait au développement du territoire auprès des collectivités qui le composent.</p>'),
(2, 2, '<p>Si vous avez un projet, contacter le Pays Sud Charente, nous vous orienterons vers les dispositifs financiers et les<br>organismes appropriés.</p>'),
(77, NULL, '<p>&nbsp;</p><p>Le Contrat de dynamisation et de cohésion du Sud Charente a été signé en octobre 2018 entre la région<br>Nouvelle-Aquitaine, le Pays Sud Charente et les Communautés de communes Lavalette Tude Dronne et des<br>4B Sud Charente<br>Ces nouveaux contrats de territoire visent à<strong> accompagner, financièrement et techniquement, des projets</strong><br><strong>structurants et en émergence</strong> répondant aux enjeux locaux et aux priorités régionales. Diverses<br>thématiques sont ainsi concernées : développement économique, emploi, formation, transition<br>énergétique et écologique, développement des services et équipements indispensables à la population,<br>revitalisation des centres-bourgs...</p><p>Au regard des enjeux du territoire,<strong> 2 axes stratégiques de développement</strong> ont été identifiés afin<br>d’accompagner la réalisation de nombreuses actions publiques et privées :</p><ul><li>Renforcer l’économie du Sud Charente</li><li>Promouvoir l’attractivité résidentielle et touristique : accueillir durablement de nouvelles<br>populations</li></ul><p>Établi sur une durée de 3 ans 2018-2021), la Région Nouvelle-Aquitaine a signé 51 contrats qui diffèrent<br>selon la vulnérabilité du territoire. Le Sud Charente est classé dans la catégorie « les territoires les plus<br>vulnérables ».</p><p>&nbsp;</p><p><strong>À télécharger :</strong></p><p><a href=\"http://localhost/Pays_Sud_Charente/inc/document/Sud Charente - Actions.pdf\">Le plan d’action du contrat&nbsp;</a></p><p><a href=\"http://localhost/Pays_Sud_Charente/inc/document/Sud Charente_Synthese.pdf\">Synthèse du diagnostic&nbsp;</a></p><p><a href=\"http://localhost/Pays_Sud_Charente/inc/document/Sud Charente_Contrat.pdf\">Le contrat de dynamisation et de cohésion&nbsp;</a></p><p><a href=\"http://localhost/Pays_Sud_Charente/inc/document/20210101_Territ contractualisation.pdf\">La carte des territoires de contractualisation&nbsp;</a></p><p>&nbsp;</p><p>&nbsp;</p><p><a href=\"https://territoires.nouvelle-aquitaine.fr/les-territoires/sud-charente\">La carte d’identité du Sud Charente</a></p>'),
(3, 3, '<p>Depuis de nombreuses années, le Pays sud Charente s’investit dans le soutien à la filière forêts-bois locale. Il s’est notamment doté d’une charte forestière. Mais, depuis fin 2017, il s’est renforcé en se dotant d’une nouvelle compétence pour développer cette filière variée.<br>Sur près de 40 000 ha, la forêt du sud Charente représente un élément important du territoire. Diversifiée, elle est principalement composée de feuillus (à 75 %) dont les Chênes et le Châtaignier, présents essentiellement dans le Montmorélien (à l’Est). Les Pins (maritime, Taeda et laricio), sont eux, très présents notamment dans les Landes Brossacaises (au Sud-Ouest). Ils sont assez jeunes car ils ont été replantés pour la plupart après la tempête de 1999.<br>La gestion durable de cette forêt est une source de développement. A l’échelle locale et régionale, l’activité liée à la production et à la transformation de bois joue un rôle important dans l’emploi. Afin de faire de cette activité un des moteurs du dynamisme local, plusieurs actions de services publics sont actuellement mises en œuvre.&nbsp;</p>'),
(4, 4, '<h2><strong>Le Contrat Local de Santé (CLS) Sud Charente</strong></h2><p>&nbsp;</p><p><strong>Le CLS Sud Charente</strong> est conclu entre le Syndicat Mixte du Pays Sud Charente, la Communauté de Communes 4B Sud Charente, la Communauté de Communes Lavalette-Tude-Dronne, le Département de la Charente, la Préfecture de la Charente et l’Agence Régionale de Santé (ARS) de Nouvelle Aquitaine, la Mutualité Sociale Agricole (MSA), la Caisse Primaire d’Assurance Maladie de la Charente (CPAM) et la Région Nouvelle-Aquitaine.</p><p>Le CLS renforce le <strong>projet territorial de santé</strong> initié depuis 2009 par le Syndicat Mixte du Pays Sud Charente pour répondre à la problématique de démographie médicale et structurer un réseau d’acteurs œuvrant dans le domaine de la santé.</p><p>Le CLS consolide les partenariats et coordonne les initiatives locales en les reliant au projet territorial de santé visant à <strong>réduire les inégalités sociales de santé</strong>.</p>'),
(74, NULL, '<p>L\'équipe technique</p>'),
(75, NULL, '<h4><strong>Information COVID&nbsp;</strong></h4><h2><strong>POUR MIEUX COMPRENDRE LE COVID 19</strong></h2><p>&nbsp;</p><figure class=\"image\"><img src=\"http://localhost/Pays_Sud_Charente/inc/image/galerie/PHOTO COVID.jfif\"></figure><p>Les coronavirus sont une grande famille de virus, qui provoquent des maladies allant d’un simple rhume (certains virus saisonniers sont des Coronavirus) à des pathologies plus sévères comme le MERS-COV ou le SRAS.</p><p>Le virus identifié en janvier 2020 en Chine est un nouveau Coronavirus, nommé SARS-CoV-2. La maladie provoquée par ce coronavirus a été nommée COVID-19 par&nbsp;<a href=\"https://www.who.int/fr/emergencies/diseases/novel-coronavirus-2019/advice-for-public\"><strong>l’Organisation mondiale de la Santé - OMS</strong></a>. Depuis le 11 mars 2020, l’OMS qualifie la situation mondiale du COVID-19 de pandémie ; c’est-à-dire que l’épidémie est désormais mondiale.</p><p><strong>Les gestes barrières&nbsp;:</strong></p><p><a href=\"https://www.gouvernement.fr/info-coronavirus\">Le ministère des Solidarités et de la Santé</a> actualise ses recommandations régulièrement pour protéger votre santé et vous recommander les bons gestes à adopter face au Coronavirus COVID-19.&nbsp;</p><p>Face aux infections, il existe des gestes simples pour préserver votre santé et celle de votre entourage :</p><p>Se laver les mains très régulièrement</p><p>Tousser ou éternuer dans son coude ou dans un mouchoir</p><p>Saluer sans se serrer la main, arrêter les embrassades</p><p>Utiliser des mouchoirs à usage unique et les jeter</p><p>Éviter les rassemblements, limiter les déplacements et les contacts</p><p>Pour tous savoir sur l’évolution de l’épidémie, consulter les bulletins épidémiologiques de&nbsp;:</p><p>Santé Publique France&nbsp;: <a href=\"http://www.santepubliquefrance.fr\">www.santepubliquefrance.fr</a></p><p>Agence Régionale de Santé&nbsp;: <a href=\"https://www.nouvelle-aquitaine.ars.sante.fr/\">https://www.nouvelle-aquitaine.ars.sante.fr/</a></p><p>Télécharger l’application «&nbsp;Tous anti covid&nbsp;»</p><figure class=\"image\"><img src=\"http://localhost/Pays_Sud_Charente/inc/image/galerie/COVID_infog-vaccination-covid19-particuliers_0.png\" alt=\"http://localhost/Pays_Sud_Charente/inc/image/galerie/COVID_infog-vaccination-covid19-particuliers_0.png\"></figure><p><strong>OU SE FAIRE DEPISTER&nbsp;?&nbsp;</strong></p><p><strong>OU SE FAIRE VACCINNER&nbsp;?&nbsp;</strong></p><p>La liste des points de dépistage et de vaccination sur <a href=\"http://www.sante.fr\">www.sante.fr</a></p><figure class=\"image\"><img src=\"http://localhost/Pays_Sud_Charente/inc/image/galerie/COVID_infographie-isolement-que-faire.jpg\"></figure><p>&nbsp;</p><p>&nbsp;</p>'),
(5, 49, '<p>&nbsp;</p><p><strong>Le Pays Sud Charente</strong> appartient à la région Nouvelle-Aquitaine. Il se situe au Sud du département de la Charente. Le territoire est issu pour partie de deux anciennes provinces : la Saintonge et l’Angoumois. Il est frontalier avec le département de la Dordogne et de la Charente Maritime.</p><p>&nbsp;</p>'),
(54, NULL, '<p><strong>Un pays</strong> est comme le définit le législateur “ un territoire présentant une cohésion géographique, culturelle, économique ou sociale ”, sur lequel des élus souhaitent se fédérer, pour impliquer et mobiliser tous les acteurs du développement afin de définir et mettre en œuvre un projet de territoire.&nbsp;</p><p>Le Pays Sud Charente représente un bassin de vie d\'environ 35 000 habitants. Il s\'agit d\'une bonne échelle pour concilier à la fois réflexion, élaboration et réalisation de projets structurants et mobilisation de moyen d\'animation et d\'accompagnement pour ce faire.</p><h2>Les missions du Pays Sud Charente</h2><p><br>Le Pays exerce des missions pour le compte des deux Communautés de communes qui le composent. Elles sont définies par ces dernières, peuvent être évolutives et répondent à un besoin de mutualisation.<br>3 missions principales sont exercées actuellement :<br>- Animation des politiques contractuelles : Le programme européen LEADER et le contrat régional<br>- Mise en œuvre du Contrat Local de santé<br>- La valorisation de la filière bois/forêt</p><p>&nbsp;</p><p>&nbsp;</p>'),
(76, NULL, '<h2><strong>Études et projets</strong></h2><p>&nbsp;</p><p><strong>Charte paysagère et architecturale du Pays Sud Charente</strong></p><p>La Charte paysagère et architecturale a été élaborée en 2009 afin de sensibiliser la population, les élus et les<br>partenaires aux éléments qui constituent son paysage et façonnent son identité.<br>Objectifs de la Charte paysagère et architecturale</p><ul><li>Se doter d\'un outil de connaissance des paysages,</li><li>Guider les maîtres d\'ouvrage publics ou privés pour une prise en compte du paysage et de ses caractéristiques</li><li>dans leurs projets d\'aménagement en apportant des conseils concrets,</li><li>Identifier les actions prioritaires à conduire et les modalités de leur mise en œuvre,</li><li>Impliquer les acteurs privés (particuliers, professionnels…) dans la démarche de qualité paysagère du<br>territoire,</li></ul><p><a href=\"a\"><i>Télécharger la charte paysagère du Pays Sud Charente</i></a></p><p>&nbsp;</p><p><br><strong>Charte forestière de territoire</strong></p><p>Le Sud Charente a une vocation forestière très marquée avec 25 000 ha, soit un taux de boisement moyen de 25 %.<br>En 2010 les élus du Sud Charente ont souhaité réaliser une charte forestière de territoire qui vise à répondre aux<br>enjeux suivants :<br>- Au niveau économique : Renforcer, structurer et diversifier la filière de production, de récolte et de valorisation des<br>produits forestiers locaux<br>- Au niveau socioculturel : Tenir compte de la demande sociale : Eco tourisme, champignons, chasse…<br>- Au niveau environnemental : Mieux intégrer l\'environnement et la qualité des paysages dans la gestion forestière des<br>massifs (puits de carbone à valoriser, boisement des terres agricoles au niveau des périmètres des zones de captages<br>d’eau potable…)</p><p><a href=\"/Pays_Sud_Charente/inc/document/Charte%20foresti%C3%A8re%20-%20doc%20final.pdf\"><i>Télécharger la charte forestière du Pays Sud Charente</i></a><br>&nbsp;</p><p><br><strong>Schéma d’attractivité économique territorial</strong></p><p><i>Document en cours de réalisation</i></p>'),
(79, NULL, '<h2>Offre et accès aux soins</h2><p>&nbsp;</p><p><strong>L’axe 1 du CLS Sud Charente vise à garantir une offre et un accès aux soins pour tous les habitants du Sud Charente.&nbsp;</strong></p><p>Depuis 2009, les partenaires du CLS mènent des actions visant à renforcer l’attractivité du territoire pour faciliter l’installation de nouveaux professionnels de santé. Aujourd’hui, l’offre de soins en Sud Charente s’organise à travers <strong>un véritable maillage territorial de maisons de santé pluridisciplinaires (MSP).&nbsp;</strong></p><p>Dans le plan d’actions 2019 – 2023 du CLS, 3 axes de travail ont été définis par les professionnels de santé et les partenaires du territoire&nbsp;:</p><ol><li>1. Renforcer la démographie médicale et paramédicale en valorisant l’attractivité du territoire</li><li>2. Renforcer le lien ville – hôpital</li><li>3. Adapter et faire connaître l’offre en santé mentale</li></ol><p>&nbsp;</p><p>Le maillage territorial de MSP constitue la pierre angulaire de la stratégie mise en œuvre en Sud Charente. Entre 2012 et aujourd’hui, le CLS Sud Charente a accompagné <strong>6 projets de MSP</strong> portés par les professionnels de santé et les collectivités locales :</p><ul><li>La Maison de Santé de Chalais</li><li>La Maison de Santé de Montmoreau</li><li>La Maison de Santé de Villebois – Lavalette</li><li>La Maison de Santé de Barbezieux St Hilaire</li><li>La Maison de Santé de Baignes Saintes Radegonde</li><li>La Maison de Santé de Coteaux du Blanzacais</li></ul><p>Professionnels de santé, rejoignez-nous&nbsp;!&nbsp;</p><p>Témoignages en vidéo :</p><p><a href=\"https://vimeo.com/384859855\">MSP de Chalais</a></p><p><a href=\"https://vimeo.com/384844482\">MSP de Montmoreau</a></p><p>MSP de Barbezieux&nbsp;: <a href=\"https://vimeo.com/384825881\">https://vimeo.com/384825881</a></p><p><br>&nbsp;</p>'),
(80, NULL, '<h2>Prévention et promotion de la santé</h2><p>L’axe 2 du CLS a pour objectif de <strong>faire vivre et développer le réseau de partenaires de la Prévention et de la Promotion de la Santé</strong> <strong>(PPS).</strong>&nbsp;</p><p>Dès 2009, les acteurs de la PPS en Sud Charente ont souhaité travailler sur l’interconnaissance de leurs missions et actions pour faciliter les coopérations et les partenariats.&nbsp;</p><p>Forts de cette dynamique partenariale bien ancrée, les acteurs du territoire poursuivent leurs actions autour de plusieurs priorités&nbsp;dans le cadre du CLS 2.0&nbsp;:&nbsp;</p><ul><li>Travailler en réseau pour améliorer l’interconnaissance des partenaires du CLS</li><li>Promouvoir la santé des publics en situation de vulnérabilité</li><li>Promouvoir la santé des personnes âgées</li><li>Prévention des maladies chroniques</li></ul><h3>Santé environnementale&nbsp;</h3><p>Inscrit en 2019, ce nouvel axe du CLS vise à <strong>organiser une communication efficace et vulgariser à destination des habitants</strong>. La stratégie retenue se décline autour de deux axes&nbsp;:&nbsp;</p><ul><li>Créer un réseau local rassemblant les acteurs œuvrant dans le champ de la santé environnementale (SE)</li><li>Sensibiliser et former aux enjeux de la SE et de la santé publique (élus et agents des collectivités, professionnels de la petite enfance, professionnels de santé, partenaires du CLS)</li></ul>'),
(81, NULL, '<p>Des aides économiques sont possibles pour des projets de création, reprises ou développement d’entreprises.</p><p>&nbsp;Si vous avez un projet et selon votre localisation, veuillez prendre contact avec les services économiques des communautés de communes.</p><p>Communauté de communes Lavalette Tude Dronne mettre le logo de LTD</p><p>Tél : 05 45 24 08 79</p><p>Mail : <a href=\"mailto:s.groulet@ccltd.fr\">s.groulet@ccltd.fr</a></p><p>Site internet : <a href=\"https://www.lavalette-tude-dronne.fr/\">https://www.lavalette-tude-dronne.fr/</a></p><p>Communauté de communes des 4B Sud Charente mettre le logo des 4B</p><p>Tél : 05 45 78 89 09</p><p>Mail : <a href=\"mailto:economie@cdc4b.com\">economie@cdc4b.com</a></p><p>Site internet : <a href=\"http://www.cdc4b.com/\">http://www.cdc4b.com/</a></p><p>&nbsp;</p>'),
(82, NULL, '<h2><strong>Le programme LEADER</strong></h2><p>&nbsp;</p><p>LEADER, qui signifie Liaisons Entre Actions de Développement de l’Économie Rurale, est un programme européen destiné à soutenir les territoires ruraux, porteurs d\'une stratégie de développement local.</p><p>Alimenté par le Fonds Européen Agricole pour le Développement Rural (FEADER), il a pour vocation d’apporter une aide financière aux projets ayant un caractère innovant et structurant pour les territoires.</p><p>Cette nouvelle période de programmation est la 5ème génération du programme LEADER et couvre la période 2014-2022.</p><p>Notre stratégie LEADER, s’articule autour de deux enjeux principaux :</p><ul><li>Promouvoir le Sud Charente</li><li>Accueillir durablement de nouvelles entreprises et populations</li></ul><p>Elle se décline autour de 9 fiches actions détaillant l’ensemble des projets éligibles.</p><p><a href=\"http://localhost/Pays_Sud_Charente/inc/document/fiche%20action%20V4_d%C3%A9cembre%202019.pdf\">Les fiches actions du programme LEADER</a></p><p>&nbsp;</p><p>L’originalité du programme européen LEADER repose sur le fait qu’il est piloté et géré à l’échelle locale par un partenariat d\'acteurs publics et privés du territoire, constitué en Groupe d\'Action Locale (GAL).</p><p>Le GAL du Pays Sud Charente est doté d’un Comité de Programmation actuellement présidé par Jacques CHABOT. C’est l’organe décisionnel de ce programme. Il est à la fois composé d’élus et d’acteurs représentant la société civile.</p><p><a href=\"http://localhost/Pays_Sud_Charente/inc/document/liste%20membres%20GAL%20V8%20-%20d%C3%A9c%2020.pdf\">La composition du GAL Sud Charente</a></p><p>&nbsp;</p><p><strong>Si vous avez un projet, prenez contact au préalable</strong><br><strong>avec l’équipe du Pays Sud Charente</strong></p><p>Tél : 05 45 98 18 52<br>courriel : <a href=\"mailto:leader@pays-sud-charente.com\">leader@pays-sud-charente.com</a></p><p>&nbsp;</p><p><strong>A télécharger : Formulaire et annexes de demande de subvention :</strong></p><p><a href=\"http://localhost/Pays_Sud_Charente/inc/document/Formulaire%20dde%20subv%20Leader.docx\">formulaire de demande de subvention LEADER</a></p><p><a href=\"http://localhost/Pays_Sud_Charente/inc/document/Annexes%20financi%C3%A8res%20Leader.xls\">annexes financières LEADER</a></p><p><a href=\"http://localhost/Pays_Sud_Charente/inc/document/Annexe5%20march%C3%A9s%20publics.docx\">annexe marché publics</a></p>'),
(83, NULL, '<h3><strong>Bien vivre en Sud Charente&nbsp;</strong></h3><figure class=\"image\"><img src=\"http://localhost/Pays_Sud_Charente/inc/image/galerie/PHOTO HABITANTS.jpg\"></figure><p><br>Afin de permettre aux habitants d’avoir connaissances des dispositifs et actions portées sur le territoire en matière de santé, les partenaires du CLS ont travaillé des 2009 à la réalisation d’un guide santé (lien vers la page «&nbsp;partenaires&nbsp;») recensant l’ensemble des dispositifs du territoire.</p><p>Vous avez besoin d’une information sur un thème de santé, <strong>n’hésitez pas à contacter les partenaires du réseau&nbsp;CLS !&nbsp;</strong></p><p>&nbsp;</p><p><strong>Accès aux soins&nbsp;:&nbsp;</strong></p><p>Annuaire des professionnels de santé&nbsp;: <a href=\"http://annuairesante.ameli.fr/\">http://annuairesante.ameli.fr/</a></p><p>Liste des professionnels des Maisons de Santé du Sud Charente</p><p>Sur la Communauté de communes de Lavalette Tude Dronne&nbsp;: <a href=\"https://www.lavalette-tude-dronne.fr/sante/\">https://www.lavalette-tude-dronne.fr/sante/</a></p><p>Sur la Communauté de Communes 4B Sud Charente&nbsp;:</p><p><a href=\"http://www.cdc4b.com/content/sante\">http://www.cdc4b.com/content/sante</a></p><p>Contacter le centre de santé du Sud Charente&nbsp;: <a href=\"https://www.lacharente.fr/vos-besoins/pour-votre-sante/aller-dans-un-centre-de-sante-departemental/\">https://www.lacharente.fr/vos-besoins/pour-votre-sante/aller-dans-un-centre-de-sante-departemental/</a></p><p>Centre hospitalier du Sud Charente&nbsp;: <a href=\"http://www.ch-sud-charente.fr/\">http://www.ch-sud-charente.fr/</a></p><p>Centre d’examen de santé&nbsp;: la CPAM de Charente&nbsp;propose à tous les assurés et leur famille un examen périodique de santé gratuit. N’hésitez pas à prendre RDV&nbsp;: <a href=\"https://bilandesante16.fr/\">https://bilandesante16.fr/</a></p><p>&nbsp;</p><p><strong>Accès aux droits&nbsp;</strong></p><p><strong>Espace France Service (EFS)&nbsp;:</strong> c’est la possibilité, en un même lieu, d’être accueilli par un agent, d’obtenir des informations et d’effectuer des démarches administratives relevant de plusieurs administrations ou organismes publics (MSA, CAF, CPAM, Pole emploi, UDAF,…)</p><p><a href=\"https://www.lavalette-tude-dronne.fr/wp-content/uploads/2020/07/Plaquette-MSAP-Chalais.pdf \">Chalais</a></p><p><a href=\"https://www.lavalette-tude-dronne.fr/wp-content/uploads/2020/07/Plaquette-France-Services-Montmoreau.pdf \">Montmoreau</a></p><p><a href=\"https://www.lavalette-tude-dronne.fr/wp-content/uploads/2020/07/Plaquette-Espace-France-Services-St-Severin.pdf \">St Séverin</a>&nbsp;</p><p><a href=\"http://www.cdc4b.com/Economie%20sud%20Charente%20-%20maison%20communautaire%20pour%20l%27emploi \">Barbezieux St Hilaire</a></p><p><strong>Territoire d’Action Sociale (TAS)&nbsp;Sud Charente :</strong> les professionnels du Département vous accueillent, vous écoutent, vous informent et vous accompagnent dans tous les domaines de la solidarité : accès aux soins et santé, éducation et soutien à la parentalité, aides aux personnes âgées et handicapées, insertion sociale et professionnelle, accès aux droits, …</p><p><a href=\"#c350\">https://www.lacharente.fr/le-departement/les-actions-du-departement/solidarites/#c350</a></p><p>Chalais&nbsp;: 05 16 09 51 21&nbsp;</p><p>Barbezieux&nbsp;: 05 16 09 51 20</p><p><strong>Permanence d’accès aux soins (PASS) au CH Sud Charente&nbsp;:</strong> les professionnels de la PASS vous accompagnent dans les démarches nécessaires à la reconnaissance de vos droits, notamment en matière de couverture sociale – 05 45 79 45 49</p><p><strong>Caisse Primaire d’Assurance Maladie (CPAM)</strong>&nbsp;: 3646 – <a href=\"http://www.ameli.fr\">www.ameli.fr</a></p><p><strong>Mutualité sociale Agricole (MSA)</strong>&nbsp;: 05 46 97 50 50 - <a href=\"https://charentes.msa.fr\">https://charentes.msa.fr</a>&nbsp;</p><p><strong>Caisse d’Allocation Familiale (CAF)&nbsp;</strong>: 3230 - <a href=\"https://www.caf.fr/\">https://www.caf.fr/</a></p><p><br>&nbsp;</p><p><strong>Information et Dépistage cancers&nbsp;</strong></p><p><strong>Centre de dépistage des cancers&nbsp;: </strong>05 45 68 30 21 – <a href=\"http://www.depistagecancer-na.fr\">www.depistagecancer-na.fr</a><strong>&nbsp;</strong></p><p><strong>La ligue contre le cancer&nbsp;: 05 45 92 20 75 – </strong><a href=\"http://www.ligue-cancer.net/cd16\"><strong>www.ligue-cancer.net/cd16</strong></a><strong>&nbsp;</strong></p><p><strong>Santé mentale&nbsp;</strong></p><p><strong>Centre hospitalier Camille Claudel&nbsp;</strong></p><p>Centre médico-psychologique adultes et enfants : <a href=\"http://www.ch-claudel.fr/\">http://www.ch-claudel.fr/</a></p><p>Barbezieux et Chalais&nbsp;: 05 45 78 95 25</p><p>Lieu- dit&nbsp;: accueil de toute personne en souffrance psychique, avec ou sans RDV – 05 45 38 49 49</p><p>Unité d’Accueil et d’Orientation et Centre de Crise (UAOCC)&nbsp;: accueil en urgence 24h/24 – 05 45 67 58 00</p><p>La Maison des adolescents&nbsp;: 05 45 94 97 81&nbsp;</p><p><strong>Union Nationale des Amis et Familles de Personnes Malades et / ou Handicapées Psychiques</strong> (UNAFAM) 06 07 36 42 21 – <a href=\"http://www.unafam16.org\">www.unafam16.org</a>&nbsp;</p><p><strong>Addictions&nbsp;</strong></p><p><strong>Centre de Soins, d’Accompagnement et de Prévention en Addictologie (CSAPA)&nbsp;</strong></p><p><strong>CSAPA Agora&nbsp;:&nbsp;</strong></p><p>Angoulême&nbsp;: 05 45 95 97 00&nbsp;</p><p>Cognac&nbsp;: 05 45 82 63 34&nbsp;</p><p><strong>CSAPA France Addictions&nbsp;:</strong> 05 45 95 55 11</p><p>Angoulême&nbsp;</p><p>Permanences au Centre Hospitalier de Barbezieux&nbsp;</p><p><strong>Handicap&nbsp;</strong></p><p><strong>Maison Départementale pour les Personnes Handicapées (MDPH)&nbsp;</strong></p><p><a href=\"https://www.mdph-16.fr/\"><strong>https://www.mdph-16.fr/</strong></a><strong> </strong>- 0800 00 16 00</p><p><strong>Perte d’autonomie et dépendance&nbsp;</strong></p><p><strong>Département de la Charente&nbsp;: 05 16 09 50 00 - lien logo</strong></p><p><strong>Plateforme Territoriale d’Appui (PTA)&nbsp;: </strong>0809 109&nbsp;109 -<strong> </strong><a href=\"https://www.pta16.fr/\"><strong>https://www.pta16.fr/</strong></a><strong>&nbsp;</strong></p><p><strong>Plateforme des aidants du Sud et de l’Ouest Charente&nbsp;: </strong>05 45 66 13 32&nbsp;</p><p><strong>Santé sexuelle et parentalité&nbsp;</strong></p><p><strong>Le Centre Gratuit d\'Information, de Dépistage et de Diagnostic (Cegidd)&nbsp;</strong>: Dépistage des IST (Infections Sexuellement Transmissibles&nbsp;: VIH, Hépatites B et C, Syphilis, chlamydiae, gonocoques… ) anonyme et gratuit - 05 45 24 42 84</p><p><strong>Centre Périnatal de Proximité (CPP)&nbsp;: Suivi de grossesse et préparation à la naissance&nbsp;</strong></p><p>Centre Hospitalier du Sud Charente&nbsp;: 05 45 78 78 05</p><p><strong>Planning familial de Charente&nbsp;: </strong>07 68 29 36 79 - <a href=\"https://www.planning-familial.org/fr/le-planning-familial-de-charente-16\">https://www.planning-familial.org/fr/le-planning-familial-de-charente-16</a>&nbsp;</p><p><strong>Réseau d’Ecoute, d’Accompagnement et d’Appui à la Parentalité (REAAP)</strong></p><p>Centre socioculturel Envol à Chalais&nbsp;: 05 45 98 20 61</p><p>Centre socioculturel de Barbezieux&nbsp;: 05 45 78 05 92</p><p><strong>Nutrition&nbsp;</strong></p><p><strong>Réseau de Prévention et de Prise en Charge de l’Obésite (REPPCO)&nbsp;: </strong>05 45 22 95 68 - <a href=\"https://www.reppco.fr/\">https://www.reppco.fr/</a></p><p><strong>Ateliers d’activités physiques adaptés et ateliers autour de l’alimentation&nbsp;</strong></p><p><strong>Sport Santé Charente&nbsp;: </strong><a href=\"https://www.sportsantecharente.com/\"><strong>https://www.sportsantecharente.com/</strong></a><strong>&nbsp;</strong></p><p><strong>Association Santé Education Prévention Territoires (ASEPT)&nbsp;: </strong><a href=\"https://www.asept-charentes.fr/\"><strong>https://www.asept-charentes.fr/</strong></a><strong>&nbsp;</strong></p><p><strong>Association l’Oison&nbsp;: </strong><a href=\"https://sites.google.com/site/assoloison/home\"><strong>https://sites.google.com/site/assoloison/home</strong></a><strong>&nbsp;</strong></p><p><strong>Centre socioculturel Envol à Chalais&nbsp;: </strong><a href=\"https://centre-socio-culturel-du-pays-de-chalais.fr/\"><strong>https://centre-socio-culturel-du-pays-de-chalais.fr/</strong></a><strong>&nbsp;</strong></p><p><strong>Centre socioculturel du Barbezilien&nbsp;: </strong><a href=\"https://cscbarbezieux.com/\"><strong>https://cscbarbezieux.com/</strong></a><strong>&nbsp;</strong></p><p><strong>Amicale du Temps Libre en Blanzacais (ATLEB)&nbsp;: </strong><a href=\"http://atleb.fr/\"><strong>http://atleb.fr/</strong></a><strong>&nbsp;</strong></p><p><strong>Solidarité&nbsp;</strong></p><p><strong>Croix-Rouge</strong>&nbsp;: Barbezieux - 05 45 78 12 75 (antenne à Montmoreau et Chalais)&nbsp;</p><p><strong>Restau du Cœur</strong>&nbsp;: Barbezieux - <a href=\"https://www.google.com/search?q=restau+du+coeur+de+barbezieux&amp;oq=restau+du+coeur+de+barbezieux&amp;aqs=chrome..69i57j0i22i30.6912j0j4&amp;sourceid=chrome&amp;ie=UTF-8\">05 45 98 06 47</a> (antenne à Chalais) - <a href=\"https://www.restosducoeur.org/\">https://www.restosducoeur.org/</a>&nbsp;</p><p><strong>Epicerie sociale et solidaire&nbsp;</strong></p><p>Centre socioculturel du barbezilien&nbsp;: 05 45 78 05 92</p><p>Amicale du Temps Libre en Bleanzacais (ATLEB) – 05 45 64 10 95</p><p><strong>Insertion professionnelle&nbsp;</strong></p><p><strong>Mission locale Arc Charente</strong>&nbsp;: 05 45 78 34 60 - <a href=\"http://mlarccharente.com/\">http://mlarccharente.com/</a>&nbsp;</p><p><strong>Association d’Accueil d’Information en Sud Charente (AAISC)</strong>&nbsp;: 05 45 78 06 45 - <a href=\"https://www.aaisc.fr/\">https://www.aaisc.fr/</a>&nbsp;</p><p><strong>Lutte contre les violences faites aux femmes&nbsp;</strong></p><p><strong>Numéro départemental&nbsp;: 08 00 16 79 74</strong></p><p><strong>Numéro national&nbsp;: 39 19&nbsp;</strong></p><p><strong>Centre d’Hébergement et de Réinsertion sociale (CHRS) Parenthèse&nbsp;: </strong>accueil de jour <a href=\"https://www.google.com/search?q=CHRS+parenthese&amp;biw=1920&amp;bih=929&amp;sxsrf=ALeKk02SMjKgoi_1vc8RnWRR5JkDPgWvdw%3A1627463758424&amp;ei=TiABYYu5GYeWa9WVteAE&amp;oq=CHRS+parenthese&amp;gs_lcp=Cgdnd3Mtd2l6EAMyCwguEMcBEK8BEJMCMgYIABAWEB4yBggAEBYQHjIGCAAQFhAeOgcIIxCwAxAnOgcIABBHELADOgIIADoHCAAQhwIQFDoICC4QxwEQrwE6BAguEAo6CAgAEBYQChAeOg0ILhDHARCvARANEJMCOgYIABANEB46CAgAEAgQDRAeOgoILhDHARCvARANSgQIQRgAUKYqWN9AYNREaANwAngAgAGWAYgBgAuSAQQzLjEwmAEAoAEBqgEHZ3dzLXdpesgBBsABAQ&amp;sclient=gws-wiz&amp;ved=0ahUKEwiLmNL5toXyAhUHyxoKHdVKDUwQ4dUDCA8&amp;uact=5\">05 45 38 86 99</a> – Permanences sur RDV à Barbezieux et Chalais (lien affiche)&nbsp;</p><p>Centre d’Information pour le Droits des Femmes et des Familles (CIDFF) – 05 45 92 34 02 - <a href=\"https://charente.cidff.info/\">https://charente.cidff.info/</a>&nbsp;</p><p><br>&nbsp;</p><p><br>&nbsp;</p><p><br>&nbsp;</p>'),
(84, NULL, '');

-- --------------------------------------------------------

--
-- Structure de la table `bloc_doc`
--

DROP TABLE IF EXISTS `bloc_doc`;
CREATE TABLE IF NOT EXISTS `bloc_doc` (
  `id_bloc_doc` int(11) NOT NULL AUTO_INCREMENT,
  `ordre` int(4) DEFAULT '1',
  `titre` varchar(100) DEFAULT 'Documents à télécharger',
  `affichage` int(1) DEFAULT '0',
  `doc1` int(5) DEFAULT '0',
  `doc2` int(5) DEFAULT '0',
  `doc3` int(5) DEFAULT '0',
  `doc4` int(5) DEFAULT '0',
  `doc5` int(5) DEFAULT '0',
  `doc6` int(5) DEFAULT '0',
  `doc7` int(5) DEFAULT '0',
  `doc8` int(5) DEFAULT '0',
  `doc9` int(5) DEFAULT '0',
  `doc10` int(5) DEFAULT '0',
  `doc11` int(5) DEFAULT '0',
  `doc12` int(5) DEFAULT '0',
  PRIMARY KEY (`id_bloc_doc`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bloc_doc`
--

INSERT INTO `bloc_doc` (`id_bloc_doc`, `ordre`, `titre`, `affichage`, `doc1`, `doc2`, `doc3`, `doc4`, `doc5`, `doc6`, `doc7`, `doc8`, `doc9`, `doc10`, `doc11`, `doc12`) VALUES
(1, 2, 'Documents à télécharger', 1, 34, 33, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 2, 'Documents à télécharger', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 3, 'Documents à télécharger', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2, 'Documents à télécharger', 1, 12, 13, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2, 'Documents à télécharger', 1, 34, 33, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(74, 1, 'Documents à télécharger', 1, 34, 33, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(54, 4, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(75, 1, 'Documents à télécharger', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(76, 1, 'Documents à télécharger', 1, 33, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(77, 1, 'Documents à télécharger', 1, 47, 44, 45, 46, 0, 0, 0, 0, 0, 0, 0, 0),
(81, 1, 'Documents à télécharger', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(79, 4, 'Documents à télécharger', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(80, 2, 'Documents à télécharger', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(82, 2, 'Documents à télécharger', 1, 40, 39, 43, 42, 41, 0, 0, 0, 0, 0, 0, 0),
(83, 3, 'Documents à télécharger', 1, 38, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(84, 1, 'Documents à télécharger', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `bloc_lien`
--

DROP TABLE IF EXISTS `bloc_lien`;
CREATE TABLE IF NOT EXISTS `bloc_lien` (
  `id_bloc_lien` int(4) NOT NULL AUTO_INCREMENT,
  `ordre` int(4) DEFAULT '1',
  `titre` varchar(100) DEFAULT 'Liens',
  `affichage` int(1) DEFAULT '0',
  `lien1` int(4) DEFAULT '0',
  `lien2` int(4) DEFAULT '0',
  `lien3` int(4) DEFAULT '0',
  `lien4` int(4) DEFAULT '0',
  `lien5` int(4) DEFAULT '0',
  `lien6` int(4) DEFAULT '0',
  `lien7` int(4) DEFAULT '0',
  `lien8` int(4) DEFAULT '0',
  `lien9` int(4) DEFAULT '0',
  `lien10` int(4) DEFAULT '0',
  `lien11` int(4) DEFAULT '0',
  `lien12` int(4) DEFAULT '0',
  PRIMARY KEY (`id_bloc_lien`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bloc_lien`
--

INSERT INTO `bloc_lien` (`id_bloc_lien`, `ordre`, `titre`, `affichage`, `lien1`, `lien2`, `lien3`, `lien4`, `lien5`, `lien6`, `lien7`, `lien8`, `lien9`, `lien10`, `lien11`, `lien12`) VALUES
(1, 1, 'Liens partenaires', 1, 10, 11, 22, 23, 24, 25, 26, 27, 28, 29, 0, 0),
(2, 2, 'Liens Partenaires', 1, 16, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 3, 'Liens Partenaires', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 4, 'liens_utiles', 1, 17, 19, 18, 21, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 1, 'partenaires', 1, 11, 10, 22, 23, 24, 25, 26, 27, 28, 29, 0, 0),
(74, 1, 'Liens', 1, 11, 10, 22, 23, 24, 25, 26, 27, 28, 29, 0, 0),
(54, 1, 'Liens Partenaires', 1, 11, 10, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(75, 1, 'Liens', 1, 17, 31, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(76, 1, 'Liens', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(77, 1, 'Liens partenaires', 1, 12, 30, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(79, 2, 'Liens', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(80, 3, 'Liens utiles', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(81, 1, 'Liens partenaires', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(82, 1, 'Liens', 1, 16, 15, 32, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(83, 1, 'Liens', 1, 11, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(84, 2, 'Liens utiles', 1, 10, 11, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `bloc_rapport`
--

DROP TABLE IF EXISTS `bloc_rapport`;
CREATE TABLE IF NOT EXISTS `bloc_rapport` (
  `id_bloc_rapport` int(11) NOT NULL AUTO_INCREMENT,
  `ordre` int(4) DEFAULT '1',
  `titre` varchar(100) DEFAULT 'Compte-rendus',
  `affichage` int(1) DEFAULT '0',
  `rapport1` int(5) DEFAULT '0',
  `rapport2` int(5) DEFAULT '0',
  `rapport3` int(5) DEFAULT '0',
  `rapport4` int(5) DEFAULT '0',
  `rapport5` int(5) DEFAULT '0',
  `rapport6` int(5) DEFAULT '0',
  `rapport7` int(5) DEFAULT '0',
  `rapport8` int(5) DEFAULT '0',
  `rapport9` int(5) DEFAULT '0',
  `rapport10` int(5) DEFAULT '0',
  `rapport11` int(5) DEFAULT '0',
  `rapport12` int(5) DEFAULT '0',
  PRIMARY KEY (`id_bloc_rapport`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bloc_rapport`
--

INSERT INTO `bloc_rapport` (`id_bloc_rapport`, `ordre`, `titre`, `affichage`, `rapport1`, `rapport2`, `rapport3`, `rapport4`, `rapport5`, `rapport6`, `rapport7`, `rapport8`, `rapport9`, `rapport10`, `rapport11`, `rapport12`) VALUES
(4, 3, 'Publications', 1, 35, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1, 2, 'Comptes-rendus', 1, 15, 31, 32, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 'Comptes-rendus', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 'Comptes-rendus', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 3, 'Comptes-rendus', 1, 31, 32, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(54, 2, 'Rapports', 1, 32, 31, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(74, 1, 'Compte-rendus', 1, 15, 32, 31, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(75, 1, 'Compte-rendus', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(76, 1, 'Compte-rendus', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(77, 1, 'Compte-rendus', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(81, 1, 'Compte-rendus', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(79, 1, 'Compte-rendus', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(80, 1, 'Compte-rendus', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(82, 3, 'Compte-rendus', 1, 30, 29, 28, 26, 25, 24, 23, 22, 21, 20, 19, 18),
(83, 1, 'Compte-rendus', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(84, 1, 'Compte-rendus', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `carrousel`
--

DROP TABLE IF EXISTS `carrousel`;
CREATE TABLE IF NOT EXISTS `carrousel` (
  `id_carrousel` int(3) NOT NULL AUTO_INCREMENT,
  `affichage` int(1) DEFAULT '1',
  `ordre` int(1) DEFAULT '1',
  `image` varchar(45) DEFAULT NULL,
  `alt` varchar(255) NOT NULL,
  `accroche` text,
  `lien` varchar(255) DEFAULT NULL,
  `rubrique` varchar(50) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_carrousel`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `carrousel`
--

INSERT INTO `carrousel` (`id_carrousel`, `affichage`, `ordre`, `image`, `alt`, `accroche`, `lien`, `rubrique`, `titre`) VALUES
(1, 1, 2, 'inc/image/carrousel/carrousel1.jpg', 'Une carte du Pays', 'Ceci est la première image du diaporama.', 'http://www.diaporama.com/', '1', 'Première image'),
(2, 0, 3, 'inc/image/carrousel/carrousel2.jpg', '', 'Et voici la seconde image du diaporama.', 'https://www.', '2', '2eme image que je viens de modifier'),
(3, 1, 1, 'inc/image/carrousel/carrousel3.jpg', '', 'Un petit texte', 'http://www..com/', '3', 'une foret paisible'),
(4, 0, 1, 'inc/image/carrousel/carrousel4.jpg', '', 'Enfin, voici un autre image &agrave; faire d&eacute;filer.', 'https://www.huitre.com', '4', 'Nouvelle image'),
(5, 1, 1, 'inc/image/carrousel/carrousel5.jpg', '', 'Une carte du Pays...', '', '2', 'Le Pays'),
(6, 0, 1, 'inc/image/carrousel/carrousel6.jpg', '', '', '', '1', '');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_delegue`
--

DROP TABLE IF EXISTS `categorie_delegue`;
CREATE TABLE IF NOT EXISTS `categorie_delegue` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `mandat_debut` int(4) DEFAULT NULL,
  `mandat_fin` int(4) DEFAULT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie_delegue`
--

INSERT INTO `categorie_delegue` (`id_categorie`, `mandat_debut`, `mandat_fin`, `description`) VALUES
(1, 2020, 2026, 'LES DÉLÉGUÉS DU PAYS SUD CHARENTE'),
(2, NULL, NULL, 'DÉLÉGUÉS CdC SUD CHARENTE'),
(3, NULL, NULL, 'LES DELEGUES CdC\r\nLavalette-Tude-Dronne\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `id_document` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `nom_fichier` varchar(255) NOT NULL,
  `taille` int(11) DEFAULT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `rubrique` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_document`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `document`
--

INSERT INTO `document` (`id_document`, `nom`, `nom_fichier`, `taille`, `lien`, `rubrique`, `description`) VALUES
(12, 'Le contrat local de Santé 2.0', 'CLS Charente 2018 - 2023.pdf', NULL, 'inc/document/CLS Charente 2018 - 2023.pdf', 4, ''),
(13, 'Plan d\'actions', 'Plan actions CLS 2019 - 2023.pdf', NULL, 'inc/document/Plan actions CLS 2019 - 2023.pdf', 4, ''),
(14, 'Plaquette de présentation du CLS', 'Plaquette_CLS_2020.pdf', NULL, 'inc/document/Plaquette_CLS_2020.pdf', 4, ''),
(15, 'Compte-rendu du Comité Syndical 14/12/2020', 'Cpte Rendu CS 2020_12_14.pdf', NULL, 'inc/document/Cpte Rendu CS 2020_12_14.pdf', 1, 'compte rendu'),
(16, 'CR CP 2016_02_08.pdf', 'CR CP 2016_02_08.pdf', NULL, 'inc/document/CR CP 2016_02_08.pdf', 2, 'Compte rendu'),
(17, 'CR CP 2016_09_12.pdf', 'CR CP 2016_09_12.pdf', NULL, 'inc/document/CR CP 2016_09_12.pdf', 2, 'Compte rendu'),
(18, 'CR CP 2017_11_06.pdf', 'CR CP 2017_11_06.pdf', NULL, 'inc/document/CR CP 2017_11_06.pdf', 2, 'compte rendu'),
(19, 'CR CP 2018_07_09.pdf', 'CR CP 2018_07_09.pdf', NULL, 'inc/document/CR CP 2018_07_09.pdf', 2, 'compte rendu'),
(20, 'CR CP 2018_10_22.pdf', 'CR CP 2018_10_22.pdf', NULL, 'inc/document/CR CP 2018_10_22.pdf', 2, 'compte rendu'),
(21, 'CR CP 2019_01_14.pdf', 'CR CP 2019_01_14.pdf', NULL, 'inc/document/CR CP 2019_01_14.pdf', 2, 'compte rendu'),
(22, 'CR CP 2019_03_04.pdf', 'CR CP 2019_03_04.pdf', NULL, 'inc/document/CR CP 2019_03_04.pdf', 2, 'compte rendu'),
(23, 'CR CP 2019_10_21.pdf', 'CR CP 2019_10_21.pdf', NULL, 'inc/document/CR CP 2019_10_21.pdf', 2, 'compte rendu'),
(24, 'CR CP 2019_12_06.pdf', 'CR CP 2019_12_06.pdf', NULL, 'inc/document/CR CP 2019_12_06.pdf', 2, 'compte rendu'),
(25, 'CR CP 2020_02_24.pdf', 'CR CP 2020_02_24.pdf', NULL, 'inc/document/CR CP 2020_02_24.pdf', 2, 'compte rendu'),
(26, 'CR CP 2020_06_02.pdf', 'CR CP 2020_06_02.pdf', NULL, 'inc/document/CR CP 2020_06_02.pdf', 2, 'compte rendu'),
(27, 'CR CP 2020_12_03.pdf', 'CR CP 2020_12_03.pdf', NULL, 'inc/document/CR CP 2020_12_03.pdf', 2, 'compte rendu'),
(28, 'CR CP 2020_12_23.pdf', 'CR CP 2020_12_23.pdf', NULL, 'inc/document/CR CP 2020_12_23.pdf', 2, 'compte rendu'),
(29, 'CR CP 2021_05_17.pdf', 'CR CP 2021_05_17.pdf', NULL, 'inc/document/CR CP 2021_05_17.pdf', 2, 'compte rendu'),
(30, 'CR CP 2021_06_02.pdf', 'CR CP 2021_06_02.pdf', NULL, 'inc/document/CR CP 2021_06_02.pdf', 2, 'compte rendu'),
(31, 'Compte-rendu du Comité Syndical 01/02/2021', 'CR CS 20210201.pdf', NULL, 'inc/document/CR CS 20210201.pdf', 1, 'compte rendu'),
(32, 'Compte-rendu du Comité Syndical 01/04/2021', 'CR CS 20210401.pdf', NULL, 'inc/document/CR CS 20210401.pdf', 1, 'compte rendu'),
(33, 'Charte forestière', 'Charte forestière - doc final.pdf', NULL, 'inc/document/Charte forestière - doc final.pdf', 0, ''),
(34, 'Études région', 'DIAG_Sud Charente_V20190502.pdf', NULL, 'inc/document/DIAG_Sud Charente_V20190502.pdf', 1, ''),
(35, 'Etat des lieux santé-social élaboré dans le cadre du CLS, novembre 2018, ORS Nouvelle- Aquitaine', 'Etat des lieux CLS Sud Charente _ ORS 2018.pdf', NULL, 'inc/document/Etat des lieux CLS Sud Charente _ ORS 2018.pdf', 4, 'Publication'),
(36, 'Programme Familibus juillet-août 2021', 'Programme Familibus juillet août 2021.pdf', NULL, 'inc/document/Programme Familibus juillet août 2021.pdf', 4, ''),
(37, 'Octobre Rose 2021', 'Octobre rose affiche 2021.png', NULL, 'inc/document/Octobre rose affiche 2021.png', 4, ''),
(38, 'VFF - Lieux ressources Charente', 'VFF - Lieux ressources Charente.pdf', NULL, 'inc/document/VFF - Lieux ressources Charente.pdf', 4, ''),
(39, 'liste des membres GAL V8 - déc 20', 'liste membres GAL V8 - déc 20.pdf', NULL, 'inc/document/liste membres GAL V8 - déc 20.pdf', 2, ''),
(40, 'fiches actions du programme LEADER', 'fiche action V4_décembre 2019.pdf', NULL, 'inc/document/fiche action V4_décembre 2019.pdf', 2, ''),
(41, 'Annexe marchés publics', 'Annexe5 marchés publics.docx', NULL, 'inc/document/Annexe5 marchés publics.docx', 2, 'annexes de demande de subvention'),
(42, 'Annexes financières Leader', 'Annexes financières Leader.xls', NULL, 'inc/document/Annexes financières Leader.xls', 2, 'annexes de demande de subvention'),
(43, 'Formulaire de demande de subvention Leader', 'Formulaire dde subv Leader.docx', NULL, 'inc/document/Formulaire dde subv Leader.docx', 2, 'formulaire de demande de subvention'),
(44, 'Le contrat de dynamisation et de cohésion', 'Sud Charente_Contrat.pdf', NULL, 'inc/document/Sud Charente_Contrat.pdf', 2, ''),
(45, 'Le plan d’action du contrat', 'Sud Charente - Actions.pdf', NULL, 'inc/document/Sud Charente - Actions.pdf', 2, ''),
(46, 'Synthèse du diagnostic', 'Sud Charente_Synthese.pdf', NULL, 'inc/document/Sud Charente_Synthese.pdf', 2, '');

-- --------------------------------------------------------

--
-- Structure de la table `donnee_territoire`
--

DROP TABLE IF EXISTS `donnee_territoire`;
CREATE TABLE IF NOT EXISTS `donnee_territoire` (
  `id_donnee_territoire` int(1) NOT NULL AUTO_INCREMENT,
  `nom_cdc` varchar(255) NOT NULL,
  `nb_communes` int(2) NOT NULL,
  `nb_habitants` int(5) NOT NULL,
  PRIMARY KEY (`id_donnee_territoire`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `donnee_territoire`
--

INSERT INTO `donnee_territoire` (`id_donnee_territoire`, `nom_cdc`, `nb_communes`, `nb_habitants`) VALUES
(1, 'Lavalette Tude Dronne', 49, 18523),
(2, '4B Sud Charente', 30, 20676);

-- --------------------------------------------------------

--
-- Structure de la table `elu`
--

DROP TABLE IF EXISTS `elu`;
CREATE TABLE IF NOT EXISTS `elu` (
  `id_elu` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `fonction` varchar(200) DEFAULT NULL,
  `mandat` varchar(200) DEFAULT NULL,
  `categorie` int(1) DEFAULT NULL,
  `placement` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_elu`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `elu`
--

INSERT INTO `elu` (`id_elu`, `nom`, `prenom`, `photo`, `fonction`, `mandat`, `categorie`, `placement`) VALUES
(28, 'DELATTE', 'Beno&icirc;t', 'inc/image/img_pays/img_pays_elu/Benoît DELATTE.png', 'VP CdC 4B - Conseiller d&eacute;l&eacute;gu&eacute; Barbezieux', 'Pr&eacute;sident', 1, 1),
(29, 'AMBAUD', 'Jean-Yves', 'inc/image/img_pays/img_pays_elu/Jean-Yves AMBAUD.png', 'Pr&eacute;sident CdC-LTD - Maire de Ch&acirc;tignac', '1er Vice-Pr&eacute;sident', 1, 2),
(30, 'CHABOT', 'Jacques', 'inc/image/img_pays/img_pays_elu/Jacques CHABOT.png', 'Pr&eacute;sident CdC 4B - Maire Ladiville', '2&egrave;me Vice-Pr&eacute;sident', 1, 3),
(31, 'PAPILLAUD', 'Jo&euml;l', 'inc/image/img_pays/img_pays_elu/Joël PAPILLAUD.png', 'Maire St. Quentin de Chalais', '3&egrave;me Vice-Pr&eacute;sident', 1, 4),
(32, 'AUBRIT', 'Marie-Claire', 'inc/image/img_pays/img_pays_elu/Marie_claire_AUBRIT.png', 'Maire St F&eacute;lix', '', 2, 9),
(35, 'BELLY', 'Mich&egrave;le', 'inc/image/img_pays/img_pays_elu/Michèle BELLY.png', 'Adjointe C&ocirc;teaux du Blanzacais', '', 2, 2),
(36, 'BERGEON', 'Fr&eacute;d&eacute;ric', 'inc/image/img_pays/img_pays_elu/Frédéric BERGEON.png', 'Maire Montm&eacute;rac', '', 2, 3),
(37, 'DE CASTELBAJAC', 'Dominique', 'inc/image/img_pays/img_pays_elu/Dominique de CASTELBAJAC.png', 'Maire Passirac', '', 2, 4),
(39, 'CHAIGNAUD', 'Eric', 'inc/image/img_pays/img_pays_elu/Eric CHAIGNAUD.png', 'Adjoint Val des Vignes', '', 2, 5),
(40, 'COURIBAUD', 'Carole', 'inc/image/img_pays/img_pays_elu/Carole COURIBAUD.png', 'Adjointe Barbezieux', '', 2, 9),
(41, 'DEAU', 'Lo&iuml;c', 'inc/image/img_pays/img_pays_elu/Loïc DEAU.png', 'Adjoint Reignac', '', 2, 9),
(42, 'FAURE', 'Jean-Marie', 'inc/image/img_pays/img_pays_elu/Jean-Marie FAURE.png', 'Conseiller Ste Souline', '', 2, 9),
(43, 'FONTENOY', 'Yann', 'inc/image/img_pays/img_pays_elu/Yann FONTENOY.png', 'Conseiller Barbezieux', '', 2, 9),
(44, 'JEAN-MICHEL', 'ARVOIR', 'inc/image/img_pays/img_pays_elu/Jean-Michel ARVOIR.jpg', 'Maire Chadurie', '', 3, 9),
(45, 'AUDOIN', 'Charles', 'inc/image/img_pays/img_pays_elu/Charles AUDOIN.png', 'Maire Aubeterre', '', 3, 9),
(46, 'ROBERT', 'Patrick', 'inc/image/img_pays/img_pays_elu/balloon-1.png', 'Maire', '', 3, 9);

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `id_equipe` int(2) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `fonction` varchar(255) NOT NULL,
  `email` varchar(45) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `lien_photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`id_equipe`, `nom`, `prenom`, `fonction`, `email`, `tel`, `lien_photo`) VALUES
(1, 'PASQUIER', 'Michaël', 'Animateur des politiques contractuelles', 'leader@pays-sud-charente.com', '0645979584', 'inc/image/equipe/Mickael.jpg'),
(4, 'FLORENT', 'Corinne', 'Secrétariat / comptabilité / Gestionnaire Leader', 'accueil@pays-sud-charente.com', '05 45 98 18 52', 'inc/image/equipe/Corinne.jpg'),
(9, 'MENARD', 'Aurélie', 'Coordinatrice du Contrat Local de Santé Sud Charente', 'sante@pays-sud-charente.com', '06 45 96 03 84', NULL),
(27, 'BONNART', 'Xavier', 'Chargé de développement de la filière forêt-bois', 'forêt-bois@pays-sud-charente.com', '06 79 91 60 37', 'inc/image/equipe/avatar.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

DROP TABLE IF EXISTS `galerie`;
CREATE TABLE IF NOT EXISTS `galerie` (
  `id_galerie` int(5) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `rubrique` int(1) DEFAULT NULL,
  `date_ajout` date DEFAULT NULL,
  PRIMARY KEY (`id_galerie`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `galerie`
--

INSERT INTO `galerie` (`id_galerie`, `nom`, `description`, `lien`, `rubrique`, `date_ajout`) VALUES
(7, 'isolement : que faire ?', 'infographie sur la conduite &agrave; tenir en cas d&#039;isolement', 'inc/image/galerie/COVID_infographie-isolement-que-faire.jpg', 4, NULL),
(8, 'vaccination', 'infographie &agrave; propos de la vaccination pour les particuliers', 'inc/image/galerie/COVID_infog-vaccination-covid19-particuliers_0.png', 4, NULL),
(9, 'logo Region', '', 'inc/image/galerie/région horiz_QUADRI_2019.png', 2, NULL),
(10, 'Virus du COVID', 'Une illustration du virus COVID', 'inc/image/galerie/PHOTO COVID.jfif', 4, NULL),
(11, 'Photo habitant', 'Une m&egrave;re et son enfant chez le docteur', 'inc/image/galerie/PHOTO HABITANTS.jpg', 4, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `lien`
--

DROP TABLE IF EXISTS `lien`;
CREATE TABLE IF NOT EXISTS `lien` (
  `id_lien` int(4) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `rubrique` int(1) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id_lien`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lien`
--

INSERT INTO `lien` (`id_lien`, `nom`, `adresse`, `rubrique`, `description`) VALUES
(9, 'Préfecture de Charente', 'https://www.charente.gouv.fr/', 1, 'Services de l\'Etat en Charente'),
(10, 'LTD', 'https://www.lavalette-tude-dronne.fr/', 0, 'Communauté de Communes Lavalette Tude Dronne '),
(11, 'CdC4B', 'http://www.cdc4b.com/', 0, 'Communauté de Commune 4B Sud Charente'),
(12, 'Nouvelle Aquitaine', 'https://www.nouvelle-aquitaine.fr/', 0, 'Région'),
(15, 'Leader France', 'https://leaderfrance.fr/', 2, 'Liaison entre Actions de Développement de l’Économie Rurale'),
(17, 'ARS Nouvelle-Aquitaine', 'https://www.nouvelle-aquitaine.ars.sante.fr/', 4, 'Agence Regionale de Santé'),
(18, 'MSA des Charentes', 'https://charentes.msa.fr/lfy ', 4, '????'),
(19, 'CPAM de La Charente', 'https://www.ameli.fr/charente/assure/adresses-et-contact/points-accueil/angouleme-agence ', 4, 'Amelie.fr'),
(16, 'Europe en Nouvelle-Aquitaine', 'https://www.europe-en-nouvelle-aquitaine.eu/fr', 0, 'Action de l\'Europe en Nouvelle-Aquitaine'),
(20, 'Département de La Charente', 'https://www.lacharente.fr/', 0, 'Charente le Départament'),
(21, 'Facebook ', 'https://www.facebook.com/cls.sudcharente.7 ', 0, 'Facebook'),
(22, 'AAISC', 'https://www.aaisc.fr/', 1, 'Association Accueil Information Sud Charente'),
(23, 'Centre du Barbezilien', 'https://cscbarbezieux.com/', 1, 'Centre socioculturel'),
(24, 'Centre Socioculturel Envol', 'http://centre-socio-culturel-du-pays-de-chalais.fr/', 1, 'Centre Socioculturel Envol'),
(25, 'ENSC', 'http://numeriquesudcharente.org/', 1, ''),
(26, 'MOSC', 'https://mosc.fr/', 1, 'Mobilité Sud Ouest Charente '),
(27, 'Oh Bonheurs de Barbezieux', 'https://fr-fr.facebook.com/ohbonheurdebarbezieuxephemere/?ref=page_internal', 1, 'LES BOUTIQUES EPHÉMÈRES'),
(28, 'Pole Touristique Sud Charente', 'https://www.sudcharentetourisme.fr/', 1, 'La Fabrique à Souffle'),
(29, 'Veau de Chalais', 'https://www.produits-de-nouvelle-aquitaine.fr/produit/veau-de-chalais/', 1, ''),
(30, 'Territoires en Nouvelle-Aquitaine', 'https://territoires.nouvelle-aquitaine.fr/', 0, ''),
(31, 'Santé Publique France', ' www.santepubliquefrance.fr', 4, ''),
(32, 'Réseau rural', 'https://www.reseaurural.fr/r egion/nouvelle-aquitaine', 2, ''),
(33, 'Page wikpedia foret', 'azerty', 3, '');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(3) NOT NULL AUTO_INCREMENT,
  `bandeau` varchar(255) NOT NULL,
  `affichage_bandeau` int(1) NOT NULL,
  `affichage_image` int(1) NOT NULL,
  `affichage_texte` int(1) NOT NULL,
  `vignette1` int(3) DEFAULT NULL,
  `vignette2` int(3) DEFAULT NULL,
  `vignette3` int(3) DEFAULT NULL,
  `vignette4` int(3) DEFAULT NULL,
  `vignette5` int(3) DEFAULT NULL,
  `vignette6` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id_menu`, `bandeau`, `affichage_bandeau`, `affichage_image`, `affichage_texte`, `vignette1`, `vignette2`, `vignette3`, `vignette4`, `vignette5`, `vignette6`) VALUES
(1, 'Test de bandeau Pays', 0, 1, 0, 1, 2, 3, 4, 5, 6),
(2, 'Cliquez sur ce qui vous interesse', 0, 1, 0, 7, 8, 9, 10, 11, 12),
(3, 'Cliquez sur le profil vous correspondant', 1, 0, 0, 13, 14, 15, 16, 17, 18),
(4, 'Bandeau Sant&eacute;', 0, 0, 0, 19, 20, 21, 22, 23, 24);

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

DROP TABLE IF EXISTS `page`;
CREATE TABLE IF NOT EXISTS `page` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `rubrique` int(1) DEFAULT NULL,
  `placement` int(2) DEFAULT NULL,
  `titre` varchar(250) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `contenu_special` varchar(255) DEFAULT NULL,
  `menu` int(3) DEFAULT NULL,
  `bloc_actu_affichage` int(1) DEFAULT '0',
  `bloc_agenda_affichage` int(1) DEFAULT '0',
  `bloc_contact_affichage` int(1) NOT NULL DEFAULT '0',
  `bloc_actu_ordre` int(1) DEFAULT '1',
  `bloc_actu_titre` varchar(255) DEFAULT 'Actualités',
  PRIMARY KEY (`id_page`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `page`
--

INSERT INTO `page` (`id_page`, `nom`, `rubrique`, `placement`, `titre`, `description`, `lien`, `contenu_special`, `menu`, `bloc_actu_affichage`, `bloc_agenda_affichage`, `bloc_contact_affichage`, `bloc_actu_ordre`, `bloc_actu_titre`) VALUES
(1, 'pays_menu', 1, 0, 'Le Pays', NULL, 'pays_menu', '', 1, 0, 0, 0, 0, 'Actualit&eacute;s'),
(2, 'finance_menu', 2, 0, 'Financez votre projet', NULL, 'finance_menu', NULL, 2, 1, 0, 1, 0, 'Actualit&eacute;s'),
(3, 'foret_menu', 3, 0, 'Bois et for&ecirc;t', NULL, 'foret_menu', NULL, 3, 0, 0, 0, 0, ''),
(4, 'sante_menu', 4, 0, 'Contrat Local de Sant&eacute;', NULL, NULL, NULL, 4, 0, 1, 1, 1, 'actualites'),
(5, 'pays_territoire', 1, 1, 'Le territoire', NULL, 'pays_territoire', 'pages/pays/pays_territoire_special.php', NULL, 0, 0, 0, 0, ''),
(54, 'pays_elus', 1, 2, 'Missions et Elus', NULL, 'pays_elus', 'pages/pays/pays_elus_special.php', NULL, 0, 0, 1, 1, 'Actualites'),
(74, 'pays_lequipe_technique', 1, 3, 'L&#039;&eacute;quipe technique', NULL, 'pays_lequipe_technique', 'pages/pays/pays_equipe_special.php', NULL, 0, 0, 0, 1, 'Actualit&eacute;s'),
(75, 'sante_information_covid', 4, 4, 'Information COVID', NULL, 'sante_information_covid', NULL, NULL, 0, 0, 1, 1, 'Actualit&eacute;s'),
(76, 'pays_etudes_et_projets', 1, 4, '&Eacute;tudes et projets', NULL, 'pays_etudes_et_projets', NULL, NULL, 0, 0, 0, 1, 'Actualit&eacute;s'),
(77, 'finance_contrat_regional_de_dynamisation_et_de_cohesion', 2, 1, 'Contrat r&eacute;gional de dynamisation et de coh&eacute;sion', NULL, 'finance_contrat_regional_de_dynamisation_et_de_cohesion', NULL, NULL, 0, 0, 0, 1, 'Actualit&eacute;s'),
(79, 'sante_offre_et_acces_aux_soins', 4, 1, 'Offre et acc&egrave;s aux soins', NULL, 'sante_offre_et_acces_aux_soins', NULL, NULL, 0, 1, 1, 1, 'Actualit&eacute;s'),
(80, 'sante_prevention_et_promotion_de_la_sante', 4, 2, 'Pr&eacute;vention et promotion de la sant&eacute;', NULL, 'sante_prevention_et_promotion_de_la_sante', NULL, NULL, 0, 1, 1, 1, 'Actualit&eacute;s'),
(81, 'finance_aides_economiques_locales', 2, 3, 'Aides &eacute;conomiques Locales', NULL, 'finance_aides_economiques_locales', NULL, NULL, 0, 0, 0, 1, 'Actualit&eacute;s'),
(82, 'finance_le_programme_leader', 2, 2, 'Le programme LEADER', NULL, 'finance_le_programme_leader', NULL, NULL, 0, 0, 1, 1, 'Actualit&eacute;s'),
(83, 'sante_bien_vivre_en_sud_charente_', 4, 3, 'Bien vivre en Sud Charente', NULL, 'sante_bien_vivre_en_sud_charente_', NULL, NULL, 0, 0, 1, 1, 'Actualit&eacute;s'),
(84, 'foret_proprietaire_dun_bois', 3, 1, 'Propri&eacute;taire d&#039;un bois', NULL, 'foret_proprietaire_dun_bois', NULL, NULL, 0, 1, 1, 1, 'Actualit&eacute;s');

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

DROP TABLE IF EXISTS `partenaire`;
CREATE TABLE IF NOT EXISTS `partenaire` (
  `id_partenaire` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(45) DEFAULT NULL,
  `logo-reduit` varchar(45) DEFAULT NULL,
  `nom` varchar(45) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_partenaire`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `partenaire`
--

INSERT INTO `partenaire` (`id_partenaire`, `logo`, `logo-reduit`, `nom`, `adresse`) VALUES
(2, 'inc/image/logo/4B_sud_charente.jpg', '', '4B_sud_charente', 'http://www.cdc4b.com/'),
(11, 'inc/image/logo/Cg 16.jpg', NULL, 'Charente le departement', 'https://www.lacharente.fr/'),
(17, 'inc/image/logo/logo_Nouvelle_Aquitaine.png', NULL, 'bvcbvc', ' bvcbvcbvc'),
(19, 'inc/image/logo/LTD-H.jpg', NULL, 'RWF', 'https://ruralwebfactory.fr/');

-- --------------------------------------------------------

--
-- Structure de la table `rubrique`
--

DROP TABLE IF EXISTS `rubrique`;
CREATE TABLE IF NOT EXISTS `rubrique` (
  `id_rubrique` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `rubriquecol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_rubrique`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vignette`
--

DROP TABLE IF EXISTS `vignette`;
CREATE TABLE IF NOT EXISTS `vignette` (
  `id_vignette` int(3) NOT NULL AUTO_INCREMENT,
  `affichage` int(1) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `texte` text,
  `image` varchar(255) DEFAULT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `lienNom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_vignette`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vignette`
--

INSERT INTO `vignette` (`id_vignette`, `affichage`, `titre`, `texte`, `image`, `lien`, `lienNom`) VALUES
(1, 1, 'Le territoire', 'Vestibulum sit amet porta nunc. Nullam id consequat mauris. Duis maximus orci cursus, pharetra sapien porttitor, blandit enim. Ut ut gravida enim.', 'inc/image/img_menu/pays_vignette1.jpg', 'pays_territoire', 'pays_territoire'),
(4, 1, '&Eacute;tudes et projets', 'Phasellus tempor risus urna, eu cursus arcu lobortis ac. Quisque accumsan scelerisque accumsan. Donec gravida viverra aliquet.', 'inc/image/img_menu/pays_vignette4.jpg', 'pays_etudes_et_projets', 'pays_etudes_et_projets'),
(5, 0, '', '', '', '', ''),
(6, 0, '', '', '', '', ''),
(2, 1, 'Missions et &eacute;lus', 'Integer vehicula erat at diam tincidunt, non tempor dui tristique. Vestibulum tempus maximus arcu. Pellentesque metus dui, blandit vel congue vel, commodo sed turpis.', 'inc/image/img_menu/pays_vignette2.jpg', 'pays_elus', 'pays_elus'),
(7, 1, 'Contrat r&eacute;gional de dynamisation et de coh&eacute;sion', 'C&#039;est la vignette du Contrat r&eacute;gional de dynamisation et de coh&eacute;sion', 'inc/image/img_menu/finance_vignette1.jpg', 'finance_contrat_regional_de_dynamisation_et_de_cohesion', 'finance_contrat_regional_de_dynamisation_et_de_cohesion'),
(3, 1, 'l&#039;&eacute;quipe technique', 'Nulla placerat ultricies justo a venenatis. Suspendisse volutpat ultrices elementum. Fusce tincidunt vulputate luctus. Quisque quam erat, dictum faucibus sodales a, suscipit mattis lacus.', 'inc/image/img_menu/pays_vignette3.jpg', 'pays_lequipe_technique', 'pays_lequipe_technique'),
(8, 1, 'Le programme LEADER', 'Vignette du programme LEADER', 'inc/image/img_menu/finance_vignette2.jpg', '', ''),
(9, 1, 'Aides &eacute;conomiques locales', 'C&#039;est la vignette des aides &eacute;conomiques locales', 'inc/image/img_menu/finance_vignette3.jpg', 'finance_fetesLTD', ''),
(10, 0, '', '', '', '', ''),
(11, 0, 'Seconde vignette', 'Voici un beau decor roman !', '', '', ''),
(12, 0, 'troisieme vignette : la foret', 'Encore du texte', '', '', ''),
(13, 1, '&Eacute;lu Local', '', 'inc/image/img_menu/foret_vignette1.jpg', '/Pays_Sud_Charente//Pays_Sud_Charente/foret_test_page2', ''),
(14, 1, 'Propri&eacute;taire d&#039;un bois', '', 'inc/image/img_menu/foret_vignette2.jpg', 'foret_proprietaire_dun_bois', 'foret_proprietaire_dun_bois'),
(15, 1, 'Entreprise de fili&egrave;re bois', '', 'inc/image/img_menu/foret_vignette3.jpg', '', ''),
(16, 1, 'Habitant Sud Charente', '', 'inc/image/img_menu/foret_vignette4.jpg', '', ''),
(17, 0, '', '', '', '', ''),
(18, 0, '', '', '', '', ''),
(19, 1, 'Offre et acc&egrave;s aux soins', 'Ceci est la vignette qui m&egrave;ne &agrave; la page &quot;Offre et acc&egrave;s aux soins&quot;.', '', 'sante_offre_et_acces_aux_soins', 'sante_offre_et_acces_aux_soins'),
(20, 1, 'Pr&eacute;vention et promotion de la sant&eacute;', 'Celle-ci m&egrave;ne &agrave; la page &quot;Pr&eacute;vention et promotion de la sant&eacute;&quot;.', '', 'sante_prevention_et_promotion_de_la_sante', 'sante_prevention_et_promotion_de_la_sante'),
(21, 1, 'Bien vivre en Sud Charente', '', 'inc/image/img_menu/sante_vignette3.jpg', 'sante_bien_vivre_en_sud_charente_', 'sante_bien_vivre_en_sud_charente_'),
(22, 1, 'Information COVID', 'Pour mieux comprendre le COVID', 'inc/image/img_menu/sante_vignette4.jpg', 'sante_information_covid', 'sante_information_covid'),
(23, 0, '', '', '', '', ''),
(24, 0, '', '', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
