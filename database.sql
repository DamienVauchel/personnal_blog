-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 19 oct. 2017 à 14:12
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `personnal_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `creation_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `author`, `creation_date`, `update_date`, `photo`) VALUES
(59, 'Bienvenue sur mon blog professionnel', 'Bonjour Ã  vous et bienvenue sur mon blog professionnel.\r\nJ\'ai dÃ©cidÃ© de crÃ©er ce blog communautaire pour partager les nouveautÃ©s dans le beau mÃ©tier qui est le mien: le dÃ©veloppement web. La notion de communautaire me parait importante, c\'est pourquoi vous pourrez crÃ©er et modifier les articles pour apporter votre pierre Ã  l\'Ã©difice. \r\n\r\nCe blog est, Ã  la base, nÃ© d\'un projet dans le cadre de mes Ã©tudes sur OpenClassRooms, parcours dÃ©veloppeur d\'applications PHP/Symfony. \r\n\r\nN\'hÃ©sitez pas Ã  me faire part de vos remarques, de vos commentaires ou vos questions en utilisant le formulaire de contact sur la page d\'accueil du site (ou en cliquant sur l\'enveloppe du menu de navigation).', 'Damien', '2017-10-19 11:07:34', '2017-10-19 11:07:34', 'computer-1328422_1920.jpg'),
(60, 'Presentation', 'Pour ce premier article, j\'ai dÃ©cidÃ© de me prÃ©senter Ã  vous, pour que vous sachiez qui vous lisez :)\r\nJe m\'appelle Damien, j\'ai 25 ans et, jusqu\'Ã  maintenant, j\'Ã©tais opticien. J\'ai effectuÃ© une reconversion professionnelle pour vivre de ma passion: le web. C\'est donc dans cette optique que j\'ai commencÃ© Ã  apprendre le code par moi-mÃªme courant 2016 puis, en juillet 2017, Ã  m\'inscrire dans un parcours diplÃ´mant sur le site OpenClassRooms, en DÃ©veloppeur d\'Applications PHP/Symfony dans lequel je suis encore Ã©tudiant aujourd\'hui.\r\n\r\nEn parallÃ¨le, j\'ai crÃ©Ã© mon auto-entreprise Red Cloud Design en mars 2017 pour concrÃ©tiser ma volontÃ© de changer de voie et mettre un pied dans le monde de l\'informatique, du graphisme et plus particuliÃ¨rement du web et du design web.\r\n\r\nJe suis passionnÃ© de nouvelles technologies, d\'informatique, de photo et de bandes dessinÃ©es. Si vous voulez discuter de ces sujets, n\'hÃ©sitez pas Ã  me contacter via le formulaire en page d\'accueil :)\r\nA bientÃ´t!', 'Damien', '2017-10-19 11:16:35', '2017-10-19 11:33:18', 'banner.png'),
(61, 'Comment choisir un langage de programmation?', 'La premiÃ¨re question Ã  se poser est: Qu\'ai-je envie de faire? \r\n\r\nEn effet, chaque langage est diffÃ©rent et offre des possibilitÃ©s que les autres n\'offrent pas. Vous avez des langages orientÃ©s web, d\'autres plus orientÃ©s vers le logiciel, etc.. Dans ceux plus orientÃ©s web, vous en avez cÃ´tÃ© client et d\'autres cÃ´tÃ© serveur... Tout dÃ©pend donc de ce que vous voulez faire.\r\n\r\nAprÃ¨s avoir rÃ©pondu Ã  cette question, il faudra choisir son langage, je vous conseille de vous spÃ©cialiser sur un langage pour dÃ©buter pour maÃ®triser ce que vous faites. \r\nDans mon cas, j\'ai choisi l langage PHP parce qu\'il me permet de faire ce que j\'ai envie: crÃ©er des administrations de sites, crÃ©er le &quot;mÃ©canisme&quot; du site, la partie backend, etc... Dans l\'utilisation du PHP, on a Ã©galement besoin de langages complÃ©mentaires comme le HTML pour la structure de l\'affichage des pages web, le CSS pour embellir ces affichages,  Javascript pour animer l\'affichage de la page, SQL pour intÃ©ragir avec la base de donnÃ©es en envoyant nos requÃªtes.\r\nMÃªme si cela parait beaucoup, ce n\'est pas inaccessible, croyez-moi! ConnaÃ®tre un langage ne veut pas dire tout connaÃ®tre, chaque fonctions etc, non, heureusement! La communautÃ© est trÃ¨s active et Google devient rapidement votre meilleur alliÃ© et votre collÃ¨gue le plus efficace!\r\n\r\nAprÃ¨s avoir choisi votre langage, vous pouvez Ã©galement vous diriger vers un FrameWork... Qu\'est-ce que c\'est encore que ce nouveau truc?\r\nUn FrameWork, c\'est une sorte de langage modifiÃ© qui s\'appuie sur un langage existant. Quel intÃ©rÃªt? Tout simplement vous faciliter la vie, Ã©viter les redondances, vous permettre d\'aller plus vite. Il existe des centaines de FrameWorks. Pour PHP, les plus cÃ©lÃ¨bres sont Symfony et Zend. Chaque FrameWork a ses inconvÃ©nients et ses avantages, il faut donc bien se renseigner pour choisir celui qui se rapproche de votre faÃ§on de faire ou celui avec lequel vous irez le plus vite :)', 'Damien', '2017-10-19 12:03:17', '2017-10-19 12:03:17', 'web-1935737_1920.png'),
(62, 'Informatique et Ecologie', 'Depuis quelques temps, la prise de conscience Ã©cologique de notre sociÃ©tÃ© a pris de l\'ampleur. Il a fallut, et il faut toujours, amÃ©liorer notre gestion des Ã©nergies pour ne pas Ã©puiser les ressources offertes par notre planÃ¨te.\r\n\r\nCette prise de conscience sociale est aujourd\'hui appliquÃ©e Ã  bien des domaines et s\'Ã©tend de jours en jours. \r\n\r\nDans le secteur informatique, le recyclage des piÃ¨ces est de plus en plus pointu pour extraire les diffÃ©rents mÃ©taux, plastiques et autres matÃ©riaux pour qu\'ils puissent Ãªtre rÃ©utilisÃ©s.\r\nLe scandale Ã©nergÃ©tique autour des Data Center (parcs de donnÃ©es, les endroits oÃ¹ sont stockÃ©s les donnÃ©es du web, internet, etc: des grandes salles tempÃ©rÃ©es remplies de serveurs qui tournent 24h/24, 7j/7) a fait Ã©voluer certaines mentalitÃ©s et on peut aujourd\'hui trouver plusieurs hÃ©bergeurs proposant des services fonctionnant entiÃ¨rement en Ã©nergie verte. Certains vont mÃªme jusqu\'Ã  utiliser la chaleur sâ€™Ã©chappant des serveur pour chauffer leurs bureaux, idÃ©e simple et utile qui permet d\'utiliser une Ã©nergie vouÃ©e Ã  la perte.', 'Damien', '2017-10-19 13:35:35', '2017-10-19 13:35:35', 'webdesigner-2443766_1920.jpg'),
(63, 'Comment fonctionne le web?', 'On parcourt tous les jours des dizaines, des centaines de pages web, on tchate avec des inconnus de l\'autre bout du monde comme si cela Ã©tait normal. Mais comment cela est-il possible?\r\n\r\nInternet est nÃ© de l\'Ã©volution d\'un projet militaire et universitaire de 1969 appelÃ© ARPANET qui permettait de mettre en rÃ©seau des ordinateurs situÃ©s dans plusieurs Ã©tats d\'AmÃ©riques du Nord pour ne pas perdre de donnÃ©es sensibles. \r\nAujourd\'hui, presque tous les foyers du monde &quot;dÃ©veloppÃ©&quot; possÃ¨de une connexion Ã  Internet.\r\n\r\nMais qu\'est-ce qu\'Internet? \r\nInternet est un ensemble de services utilisÃ©s tous les jours par des millions de personnes. On peut y trouver le web, les services emails, les bilbiothÃ¨ques FTP, les IRC, les forums, etc\r\n\r\nMais alors, le web dans tout Ã§a?\r\nEt bien comme expliquÃ© juste au dessus, le web est une partie du rÃ©seau Internet. \r\nComprenez-donc que lorsqu\'on dit &quot;Cherche Ã§a sur Internet&quot; et qu\'on se connecte Ã  un moteur de recherche, c\'est un abus de langage, on &quot;Cherche sur le web&quot;.\r\n\r\nToutes ces donnÃ©es sont stockÃ©es dans des disques durs eux-mÃªmes situÃ©s dans des machines, les serveurs, qui sont regroupÃ©s dans des salles: les data centers (comme sur la photo).\r\nLes connexions se font majoritairement par des cÃ¢bles sous-marins et sous-terrains mais on peut Ã©galement se connecter via une liaison satellite.', 'Damien', '2017-10-19 13:52:57', '2017-10-19 13:52:57', 'server-2160321_1920.jpg'),
(64, 'Web et procrastination', 'Ahlala... Le web et son merveilleux contenu. Comment ferai-je sans lui?....... Quoi, il est dÃ©jÃ  18h?!\r\n\r\nC\'est un cas de figure familier? Malheureusement pour notre productivitÃ©, Internet et plus particuliÃ¨rement le web offrent un accÃ¨s quasi illimitÃ© Ã  du contenu. On l\'utilise souvent Ã  bon escient, mais on perd sÃ»rement autant de temps Ã  naviguer de pages en pages ou de vidÃ©os en vidÃ©os...', 'Damien', '2017-10-19 13:56:58', '2017-10-19 13:56:58', 'watch-2239970_1920.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
