-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : mer. 26 juin 2024 à 04:38
-- Version du serveur : 8.0.37
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `catalogue_livre`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `mot_de_passe`) VALUES
(1, 'Gauvin', 'Pierre', '$2y$10$rtpqoo05GFWRDAwMZxlJBeNcByOqY7q.AdDRe66dT6r1wRXQao81W'),
(2, 'Souza', 'Osias', '$2y$10$NL9dA/nUVEzEcZpt2ONTqu.NLKBBE3XCI/.zvSYdQCeWmexkn53ee'),
(6, 'azerty', 'azerty', '$2y$10$2955KQ1nSnhJE1D1.BF6SOqmVIn.h7Yvuz0yE2p9Y0e5f3maGTbO.'),
(7, 'azerty', 'gregor', '$2y$10$1QxBFPw0zGzPX4d7ZSNNiu2mtyEQa2UXajedH6zG8A74aFaXXEWNa');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `id` int NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `publication` date NOT NULL,
  `genre` varchar(255) NOT NULL,
  `sous_genre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `resume` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prix` decimal(6,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `admin_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `titre`, `auteur`, `bio`, `publication`, `genre`, `sous_genre`, `resume`, `prix`, `image`, `admin_id`) VALUES
(1, '1984', 'George Orwell', 'George Orwell, né le 25 juin 1903 en Inde, est connu pour ses critiques sociales à travers la dystopie et la science-fiction.', '1949-06-08', 'Roman', 'Science-Fiction', 'Une dystopie politique dépeignant une société totalitaire où la liberté d\'expression est éteinte.', 17.99, './Images/Science-fiction/1984.jpg', 1),
(2, 'Dune', 'Frank Herbert', 'Frank Herbert, né le 8 octobre 1920 à Tacoma, est un auteur américain de science-fiction, célèbre pour ses romans épiques.', '1965-08-01', 'Roman', 'Science-Fiction', 'Un jeune noble doit naviguer dans un univers complexe de politique et d\'écologie sur la planète désertique Arrakis.', 12.10, './Images/Science-fiction/Dune.jpg', 1),
(3, 'Fondation', 'Isaac Asimov', 'Isaac Asimov, né le 2 janvier 1920 à Petrovichi, est un écrivain et biochimiste américain, auteur de nombreux classiques de la science-fiction.', '1951-05-03', 'Roman', 'Science-Fiction', 'Un scientifique crée une fondation pour préserver le savoir et minimiser l\'inévitable chute d\'un empire galactique.', 20.45, './Images/Science-fiction/Fondation.jpg', 1),
(4, 'Le Meilleur des mondes', 'Aldous Huxley', 'Aldous Huxley, né le 26 juillet 1894 à Godalming, est un écrivain britannique visionnaire, connu pour ses romans d\'anticipation.', '1932-01-01', 'Roman', 'Science-Fiction', 'Une société futuriste où les individus sont conditionnés et classés dès la naissance.', 20.00, './Images/Science-fiction/Le_meilleur_des_mondes.jpg', 1),
(5, 'La Guerre des mondes', 'H.G. Wells', 'H.G. Wells, né le 21 septembre 1866 à Bromley, est un auteur britannique pionnier de la science-fiction.', '1898-01-01', 'Roman', 'Science-Fiction', 'Des Martiens envahissent la Terre, déclenchant une lutte désespérée pour la survie de l\'humanité.', 16.50, './Images/Science-fiction/La_Guerre_des_mondes.jpg', 1),
(6, 'Neuromancien', 'William Gibson', 'William Gibson, né le 17 mars 1948 aux États-Unis, est un auteur de science-fiction, précurseur du cyberpunk.', '1984-07-01', 'Roman', 'Science-Fiction', 'Un hacker déchu est engagé pour un dernier coup dans un monde dominé par les corporations et l\'intelligence artificielle.', 15.75, './Images/Science-fiction/Neuromancien.jpg', 1),
(27, 'Le Secret de l\'Espadon', 'Edgar P. Jacobs', 'Edgar P. Jacobs, auteur de bandes dessinées d\'aventure et de science-fiction.', '2024-06-10', 'BD', 'Aventure', 'Une aventure épique impliquant des espions et une arme secrète qui pourrait changer le monde.', 17.74, './Images/BD/Blake_&_Mortimer_Le_Secret_de_l_Espadon.jpg', 2),
(31, 'Holly', 'Stephen King', 'Stephen King a écrit plus de 50 romans, autant de best-sellers, et plus de 200 nouvelles. Couronné de nombreux prix littéraires, il est devenu un mythe vivant de la littérature américaine (médaille de la National Book Foundation en 2003 pour sa contribution aux lettres américaines, Grand Master Award en 2007 pour l\'ensemble de son oeuvre).', '2024-02-28', 'Roman', 'Fantastique', 'Dans une jolie maison victorienne d\'une petite ville du Midwest, Emily et Rodney Harris, anciens professeurs d\'université, mènent une vie de retraités actifs. Malgré leur grand âge, les années semblent n\'avoir pas avoir de prise sur eux.', 14.89, './Images/Fantastique/Holly.jpg', 1),
(32, 'L\'armée de l\'ombre - Stalingrad', 'Jean-Pierre Pécau', 'Jean-Pierre Pécau est un auteur de bandes dessinées historiques, spécialisé dans les conflits mondiaux.', '2024-06-10', 'BD', 'Guerre', 'Un récit graphique sur la bataille de Stalingrad à travers les yeux d\'un sniper.', 10.10, './Images/BD/L_armée_de_l_ombre__Stalingrad.jpg', 2),
(33, 'Le Dernier Vol', 'Romain Hugault', 'Romain Hugault est connu pour ses illustrations détaillées d\'avions et ses récits aéronautiques.', '2024-06-10', 'BD', 'Guerre', 'L\'histoire d\'un pilote durant la Seconde Guerre mondiale et son dernier combat.', 17.50, './Images/BD/Le_dernier_vol.jpg', 2),
(34, 'Opération Overlord', 'Michel Koeniguer', 'Michel Koeniguer illustre des bandes dessinées militaires avec un réalisme saisissant.', '2024-06-10', 'BD', 'Guerre', 'Une série sur le Débarquement en Normandie et les jours qui ont suivi.', 16.45, './Images/BD/Opération_Overlord.jpg', 2),
(37, 'La Guerre des Lulus', 'Régis Hautière', 'Régis Hautière crée des bandes dessinées qui racontent la guerre à hauteur d\'enfant.', '2024-06-10', 'BD', 'Guerre', 'L\'aventure de quatre orphelins durant la Première Guerre mondiale.', 15.18, './Images/BD/La_Guerre_des_Lulus.jpg', 2),
(52, 'Ne me remerciez pas !', 'Martial Caroff', 'Martial Caroff est né le 22 octobre 1964 à Landerneau (29). Il a fait de longues études de géologie. Thèse sur les volcans de Polynésie française, puis poste à l’Université de Brest. Auteur d’autres choses que d’articles scientifiques en 1999, il est devenu romancier. ', '2023-11-09', 'Roman', 'Policier', 'Alors qu’il donne un cours, Jacques Gaubert s’effondre et décède. Empoisonnement aux diatomées, décrète le médecin légiste. Ironie\r\ndu sort, c’est précisément l’objet des recherches de cet expert en géologie.', 15.89, './Images/Policier/Ne_me_remerciez_pas.jpg', 2),
(53, 'Un été italien', 'Rebecca Serle', 'Rebecca Serle vit entre New York et Los Angeles où elle est autrice et scénariste pour la télévision.', '2024-04-10', 'Roman', 'Romance', 'Positano, ses ruelles pittoresques et ses panoramas à couper le souffle… Depuis sa plus tendre enfance, Katy a entendu sa mère parler de ce paradis perdu, ce petit coin d’Italie où elle a vécu le plus bel été de sa vie trente ans plus tôt.', 12.69, './Images/Romance/Un_été_italien.jpg', 2),
(54, 'Twisted love', 'Ana Huang', 'Ana Huang est une autrice américaine de best-sellers de romances. Elle remporte un succès grandissant et est une star des booktokeuses.', '2021-04-21', 'Roman', 'Romance', 'Il a un cœur de glace... mais pour elle, il brûlerait le monde. Alex Volkov est un diable doté d’un visage d’ange. Poussé par une tragédie qui l’a hanté pendant la majeure partie de sa vie, sa quête impitoyable de succès et de vengeance laisse peu de place aux affaires de cœur.', 12.75, './Images/Romance/Twisted_Love.jpg', 2),
(55, 'Une rencontre inattendue', 'J. M. Darhower', 'J. M. Darhower est auteure de romance. Elle vit dans une petite ville dans les Carolines.', '2022-10-26', 'Roman', 'Romance', 'Il était une fois un type qui s’emmerdait tellement qu’il se livrait au crime et à la destruction juste pour avoir le sentiment d’être en vie.', 19.29, './Images/Romance/Une_rencontre_innatendue.jpg', 2),
(56, 'Quelqu\'un d\'autre', 'Guillaume Musso', 'Guillaume Musso, né le 6 juin 1974 à Antibes, est un romancier français.', '2024-03-20', 'Roman', 'Romance', 'Au large de Cannes, un yacht dérive entre les îles de Lérins. À son bord repose Oriana Di Pietro, éditrice italienne et héritière d\'une célèbre famille milanaise. Agressée sauvagement, elle succombera après dix jours de coma.', 9.50, './Images/Romance/Quelqu_un_d_autre.jpg', 2),
(57, 'Wild Love', '', 'Après dix ans passés à l\'autre bout du monde, en Nouvelle-Calédonie, Lily Haime est de retour sur les rives de Lacanau, à Bordeaux.', '2024-05-01', 'Roman', 'Romance', 'Ocean est un professeur d’anglais engagé, qui milite contre le harcèlement scolaire depuis les bancs de la fac. Il vit à New York, partage un palier avec Ann, et rentre en Colombie, tous les étés.', 13.99, './Images/Romance/Wild_Love.jpg', 2),
(58, 'Malgré nous... ', 'Claire Norton', 'Claire Norton est une romancière française.\r\nElle s’est inspirée de rencontres marquantes faites en milieu hospitalier pour l’écriture de son premier roman.', '2019-06-06', 'Roman', 'Romance', 'Été 1988. Théo, Maxime et Julien réchappent d\'un terrible incendie. Les trois adolescents se jurent alors une amitié \" à la vie, à la mort \". Vingt années passent.', 12.50, './Images/Romance/Malgré_nous.jpg', 2),
(59, 'La Fille du Train', 'Paula Hawkins', 'Paula Hawkins est une auteure britannique née le 26 août 1972. Elle est connue pour ses thrillers psychologiques, notamment \"La Fille du Train\", qui a été adapté en film en 2016.', '2016-09-08', 'Roman', 'Policier', 'Rachel, une femme en pleine dérive, devient obsédée par un couple qu\'elle observe tous les jours depuis le train. Quand la femme disparaît, Rachel se retrouve mêlée à une enquête qui révélera des secrets enfouis.', 17.40, './Images/Policier/La_Fille_du_train.jpg', 1),
(60, 'Le Chuchoteur', 'Donato Carrisi', 'Donato Carrisi est un écrivain italien né le 25 mars 1973. Il est également scénariste et auteur de plusieurs thrillers à succès.', '2014-06-01', 'Roman', 'Policier', 'Six bras gauches de petites filles disparues sont retrouvés dans un champ. Une équipe de profileurs se lance dans une course contre la montre pour retrouver les victimes et arrêter le chuchoteur, un redoutable manipulateur.', 14.23, '.\\Images\\Policier\\Le_Chuchoteur.jpg', 1),
(61, 'La Disparition de Stéphanie Mailer', 'Joël Dicker', 'Joël Dicker est un écrivain suisse né le 16 juin 1985. Son roman \"La Vérité sur l\'Affaire Harry Quebert\" l\'a rendu célèbre à l\'international.', '2022-03-10', 'Roman', 'Policier', 'En enquêtant sur un double meurtre survenu en 1994, une journaliste nommée Stéphanie Mailer disparaît. La vérité derrière cette disparition et les meurtres anciens refait surface dans un petit village.', 15.64, './Images/Policier/La_Disparition_de_Stephanie_Mailer.jpg', 1),
(62, 'L\'Ordre du Jour', 'Éric Vuillard', 'Éric Vuillard est un écrivain et réalisateur français né le 4 mai 1968. Il a reçu le Prix Goncourt en 2017 pour \"L\'Ordre du Jour\".', '2021-08-18', 'Roman', 'Policier', 'Ce récit documenté relate la réunion secrète des grands industriels allemands avec les nazis en 1933, et explore les ramifications des compromissions économiques.', 14.30, './Images/Policier/L_ordre_du_jour.jpg', 1),
(63, 'Le Cri', 'Nicolas Beuglet', 'Nicolas Beuglet est un écrivain français né le 20 août 1974. Il est connu pour ses thrillers intenses et bien documentés.', '2018-01-11', 'Roman', 'Policier', 'Sarah Geringën, inspectrice de police norvégienne, enquête sur un patient décédé dans un hôpital psychiatrique avec un message mystérieux gravé dans sa chair. Une conspiration effrayante se dévoile.', 16.54, './Images/Policier/Le_Cri.jpg', 2),
(64, 'L\'île au trésor', 'Robert Louis Stevenson', 'Robert Louis Stevenson (1850-1894) était un écrivain écossais, célèbre pour ses romans d\'aventure, dont \"L\'île au trésor\".', '2014-01-01', 'Roman', 'Aventure', 'Jeune Jim Hawkins découvre une carte au trésor et s\'embarque dans une aventure dangereuse avec des pirates pour trouver l\'île mystérieuse.', 13.50, './Images/Aventure/L_île_au_trésor.jpg', 2),
(65, 'Le Comte de Monte-Cristo', 'Alexandre Dumas', 'Alexandre Dumas (1802-1870) est un écrivain français célèbre pour ses romans historiques et d\'aventures.', '1998-08-26', 'Roman', 'Aventure', 'Edmond Dantès est emprisonné à tort et s\'évade pour se venger de ceux qui l\'ont trahi, en utilisant une immense fortune cachée.', 15.40, './Images/Aventure/Le_Comte_de_Monte-Cristo.jpg', 2),
(66, 'L\'Appel de la forêt', 'Jack London', 'Jack London (1876-1916) était un écrivain américain connu pour ses récits de l\'Ouest américain et ses aventures maritimes.', '2017-06-07', 'Roman', 'Aventure', 'Buck, un chien domestique, est kidnappé et vendu comme chien de traîneau en Alaska, où il doit survivre dans des conditions extrêmes.', 10.60, './Images/Aventure/L_Appel_de_la_forêt.jpg', 2),
(67, 'La Dernière Cité Perdue', 'Fernando Gamboa', 'Fernando Gamboa est un écrivain espagnol. Il a consacré une bonne partie de sa vie d\'adulte à voyager en Afrique et en Amérique latine et a vécu dans plusieurs pays.', '2020-12-20', 'Roman', 'Aventure', 'Le récit de La dernière cité perdue débute plusieurs mois après le retour des trois protagonistes des aventures narrées dans La dernière crypte : Ulysse, Cassie et le professeur Castillo.', 15.10, './Images/Aventure/La_derniere_cite_perdue.jpg', 2),
(70, 'Voyage au centre de la Terre', 'Jules Verne', 'Jules Verne (1828-1905) était un écrivain français pionnier de la science-fiction et des romans d\'aventures.', '1992-06-09', 'Roman', 'Aventure', 'Le professeur Lidenbrock, son neveu Axel, et leur guide Hans descendent dans un volcan islandais pour explorer les mystères sous la surface de la Terre.', 14.30, './Images/Aventure/Voyage_au_centre_de_la_terre.jpg', 2),
(71, 'Robinson Crusoé', 'Daniel Defoe', 'Daniel Defoe (1660-1731) était un écrivain et journaliste anglais, célèbre pour ses récits d\'aventures.', '1980-08-12', 'Roman', 'Aventure', 'Après un naufrage, Robinson Crusoé survit seul sur une île déserte pendant 28 ans, luttant pour sa survie et rencontrant divers défis.', 12.60, './Images/Aventure/Robinson_Crusoé.jpg', 2),
(72, 'Never Night', 'Jay Kristoff', 'Jay Kristoff est un auteur australien né le 11 novembre 1973, connu pour ses séries de fantasy et de science-fiction.', '2023-11-16', 'Roman', 'Fantastique', 'Mia Corvere, une jeune femme déterminée, rejoint une école d\'assassins pour venger la mort de sa famille dans un monde où trois soleils ne laissent jamais la nuit tomber.', 12.69, './Images/Fantastique/Never_Night.jpg', 1),
(73, 'Sorcier d’Empire', 'François Baranger', 'François Baranger est un écrivain et illustrateur français né en 1970, connu pour ses œuvres de fantasy et d\'horreur.', '2023-03-15', 'Roman', 'Fantastique', 'Dans une France napoléonienne alternative peuplée de monstres, Ludwig Arcerese, un homme ayant oublié son passé, découvre qu\'il peut utiliser l\'Art Obscur pour traquer ces créatures.', 13.66, './Images/Fantastique/Sorcier_d_Empire.jpg', 1),
(74, 'Le Pont des Tempêtes', 'Danielle L. Jensen', 'Danielle L. Jensen est une auteure canadienne spécialisée dans les romans de fantasy romantique.', '2023-03-01', 'Roman', 'Fantastique', 'Lara, une espionne, doit trahir le roi qu\'elle épouse pour le bien de son pays, mais elle se retrouve tiraillée entre son devoir et son cœur.', 14.80, './Images/Fantastique/Le_Pont_des_Tempêtes.jpg', 1),
(76, 'Éclats Dormants', 'Alix E. Harrow', 'Alix E. Harrow est une auteure américaine de fantasy, connue pour ses histoires riches et immersives.', '2023-04-05', 'Roman', 'Fantastique', 'Zinnia, une jeune femme atteinte d\'une maladie incurable, entreprend un voyage à travers des royaumes magiques pour défier son destin.', 12.30, './Images/Fantastique/Éclats_Dormants.jpg', 1),
(77, 'Six Couronnes Écarlates', 'Elizabeth Lim', 'Elizabeth Lim est une auteure sino-américaine spécialisée dans la fantasy pour jeunes adultes.', '2023-04-19', 'Roman', 'Fantastique', 'Un conte épique sur des royaumes en guerre et une jeune princesse qui doit sauver son royaume en trouvant des couronnes magiques.', 13.20, './Images/Fantastique/Six_Couronnes_Écarlates.jpg', 1),
(78, 'Surveiller et punir', 'Michel Foucault', 'Michel Foucault, né le 15 octobre 1926 et mort le 25 juin 1984, est un philosophe et historien français. Connu pour ses travaux sur les institutions sociales, notamment la prison, la clinique et la sexualité, il a influencé de nombreux domaines académiques avec ses concepts de pouvoir et de discours.', '1975-02-15', 'Essai', 'Philosophie sociale', 'Cet essai explore l\'évolution des pratiques punitives en Occident, en passant de la torture publique à l\'enfermement disciplinaire, et analyse le développement de la prison comme institution centrale du contrôle social.', 11.56, './Images/Essai/Surveiller_et_punir.jpg', 1),
(79, 'Le Deuxième Sexe', 'Simone de Beauvoir', 'Simone de Beauvoir, née le 9 janvier 1908 et morte le 14 avril 1986, est une philosophe et écrivaine française. Compagne de Jean-Paul Sartre, elle a contribué à la pensée existentialiste et a milité pour les droits des femmes tout au long de sa vie.', '1949-06-01', 'Essai', 'Féminisme', 'Cet essai monumental examine la condition féminine, dénonçant les structures patriarcales qui oppriment les femmes et prônant leur émancipation. Il est considéré comme un texte fondateur du féminisme contemporain.', 15.25, './Images/Essai/Le_deuxieme_sexe.jpg', 1),
(80, 'La Société du spectacle', 'Guy Debord', 'Guy Debord, né le 28 décembre 1931 et mort le 30 novembre 1994, est un écrivain, cinéaste et théoricien. Fondateur de l\'Internationale situationniste, ses travaux portent sur la critique de la société de consommation et la politique révolutionnaire.', '1967-11-14', 'Essai', 'Critique sociale', 'Debord analyse la société contemporaine à travers le prisme du spectacle, où les images médiatiques et la consommation prennent le pas sur la réalité vécue. Cet essai critique le capitalisme moderne et ses effets aliénants.', 12.69, './Images/Essai/La_Societe_du_Spectacle.jpg', 1),
(81, 'La Pensée sauvage', 'Claude Lévi-Strauss', 'laude Lévi-Strauss, né le 28 novembre 1908 et mort le 30 octobre 2009, est un anthropologue et ethnologue français. Pionnier de l\'anthropologie structurale, ses recherches ont profondément influencé les sciences sociales, notamment par ses études des mythes et des sociétés indigènes.', '1962-11-01', 'Essai', 'Anthropologie', 'Lévi-Strauss explore les structures de la pensée mythique à travers diverses cultures, montrant que la pensée primitive est aussi complexe et logique que la pensée moderne, bouleversant les idées reçues sur la civilisation.', 12.50, './Images/Essai/La_Pensee_sauvage.jpg', 1),
(82, 'L\'Éthique protestante et l\'esprit du capitalisme', 'Max Weber', 'Max Weber, né le 21 avril 1864 et mort le 14 juin 1920, est un sociologue, économiste et historien allemand. Fondateur de la sociologie moderne, ses travaux couvrent de nombreux domaines, incluant la sociologie de la religion, la bureaucratie et l\'économie.', '1905-01-01', 'Essai', 'Sociologie', 'Cet essai classique analyse le rôle de l\'éthique protestante dans le développement du capitalisme moderne, suggérant que les valeurs religieuses ont influencé les attitudes économiques et le comportement social.', 13.40, './Images/Essai/L_Ethique_protestante_et_l_esprit_du_capitalisme.jpg', 1),
(83, 'Les Damnés de la Terre', 'Frantz Fanon', ' Frantz Fanon, né le 20 juillet 1925 et mort le 6 décembre 1961, est un psychiatre et philosophe martiniquais. Intellectuel engagé dans la lutte anticoloniale, ses écrits sur la psychologie de l\'oppression et la décolonisation ont eu une influence durable sur les mouvements révolutionnaires.', '1961-11-05', 'Essai', 'Études postcoloniales', ' Fanon y analyse les effets psychologiques et sociaux de la colonisation, appelant à une lutte révolutionnaire pour la décolonisation. Cet essai est devenu une œuvre majeure des études postcoloniales.', 20.25, './Images/Essai/Les_damnes_de_la_terre.jpg', 1),
(84, 'En attendant Godot', 'Samuel Beckett', 'Samuel Beckett, né le 13 avril 1906 et mort le 22 décembre 1989, est un écrivain, dramaturge et poète irlandais. Figure centrale du théâtre de l’absurde, il est surtout connu pour ses œuvres explorant la condition humaine et l’absurdité de la vie.', '1952-01-01', 'Théâtre', 'Théâtre de la maturation', 'Cette pièce absurde met en scène deux personnages, Vladimir et Estragon, qui attendent inlassablement un certain Godot. L’œuvre explore des thèmes de l’absurdité de la condition humaine et de l’attente.', 13.50, './Images/Théâtre/En_attendant_Godot.jpg', 1),
(85, 'Le Cid', 'Pierre Corneille', 'Pierre Corneille, né le 6 juin 1606 et mort le 1 octobre 1684, est un dramaturge français majeur du XVIIe siècle. Considéré comme l\'un des pères de la tragédie française, ses œuvres sont caractérisées par des thèmes d\'honneur et de devoir.', '1637-01-01', 'Théâtre', 'Théâtre initiatique', 'Tragédie classique racontant l’histoire de Rodrigue et Chimène, déchirés entre l’honneur familial et l’amour. Cette pièce est l’un des chefs-d’œuvre du théâtre français du XVIIe siècle.', 10.50, './Images/Théâtre/Le_Cid.jpg', 2),
(86, 'Antigone', 'Jean Anouilh', 'Jean Anouilh, né le 23 juin 1910 et mort le 3 octobre 1987, est un dramaturge français. Connu pour ses pièces mêlant tragédie et comédie, il a exploré des thèmes de moralité et de l\'absurde.', '1944-01-01', 'Théâtre', 'Théâtre initiatique', 'Cette adaptation moderne de la tragédie de Sophocle raconte l’histoire d’Antigone qui défie l’autorité du roi Créon pour enterrer son frère. La pièce explore des thèmes de résistance et de conscience individuelle.', 14.20, './Images/Théâtre/Antigone.jpg', 1),
(87, 'Rhinocéros', 'Eugène Ionesco', 'Eugène Ionesco, né le 26 novembre 1909 et mort le 28 mars 1994, est un dramaturge et écrivain franco-roumain. Figure clé du théâtre de l\'absurde, il a créé des œuvres qui explorent la futilité de l\'existence et l\'absurdité des conventions sociales.', '1959-01-01', 'Théâtre', 'Théâtre de la maturation', 'Cette pièce du théâtre de l\'absurde montre une petite ville où les habitants se transforment progressivement en rhinocéros. Elle traite de la montée du totalitarisme et du conformisme social.', 12.60, './Images/Théâtre/Rhinoceros.jpg', 1),
(89, 'La Cantatrice chauve', 'Eugène Ionesco', 'Eugène Ionesco, né le 26 novembre 1909 et mort le 28 mars 1994, est un dramaturge et écrivain franco-roumain. Son œuvre, pionnière du théâtre de l\'absurde, critique la banalité de la vie moderne et le langage comme outil inefficace de communication.', '1950-01-01', 'Théâtre', 'Théâtre de l\'absurde', 'Cette anti-pièce présente des conversations banales et répétitives entre deux couples, qui révèlent l’absurdité de la communication humaine. C’est un classique du théâtre de l’absurde.', 15.30, './Images/Théâtre/La_Cantatrice_chauve.jpg', 1),
(90, 'Huis clos', 'Jean-Paul Sartre', 'Jean-Paul Sartre, né le 21 juin 1905 et mort le 15 avril 1980, est un philosophe, dramaturge et écrivain français. Fondateur de l\'existentialisme, ses œuvres explorent la liberté humaine, la responsabilité individuelle et l\'absurdité de l\'existence.', '1944-01-01', 'Théâtre', 'Théâtre psychologique', 'Dans cette pièce existentialiste, trois personnages sont enfermés dans une pièce pour l’éternité, découvrant progressivement que \"l’enfer, c’est les autres\". Elle explore des thèmes de liberté, de choix et de responsabilité.', 9.49, './Images/Théâtre/Huis_clos.jpg', 1),
(91, 'Les étapes de la vie', 'Erik H. Erikson', 'Erik H. Erikson, né le 15 juin 1902 et décédé le 12 mai 1994, était un psychologue et psychothérapeute germano-américain d\'origine danoise. Il est connu pour avoir développé la théorie des stades du développement psychosocial.', '1902-06-15', 'Grandir', 'Psychologie du développement', 'Erikson, psychologue du développement, explore les différentes étapes psychosociales que les individus traversent tout au long de leur vie, de l\'enfance à la vieillesse. Il examine comment chaque étape contribue à la croissance personnelle et à l\'identité.', 16.29, './Images/Grandir/Les_étapes_de_la_vie.jpg', 2),
(92, 'L\'évolution créatrice', 'Henri Bergson', 'Henri Bergson, né le 18 octobre 1859 et mort le 4 janvier 1941, était un philosophe français. Il est célèbre pour ses contributions à la philosophie de la durée, à la métaphysique de la conscience et à la théorie de l\'évolution créatrice.', '1907-01-01', 'Grandir', 'Evolution personnelle', 'Bergson, philosophe français, discute de l\'évolution de la vie et de l\'esprit. Il soutient que l\'évolution n\'est pas simplement une progression linéaire mais implique une créativité intérieure continue, essentielle à la croissance intellectuelle et spirituelle.', 11.89, './Images/Grandir/L_Evolution_Creatrice.jpg', 2),
(93, 'La promesse de l\'aube', 'Romain Gary', 'Romain Gary, né le 8 mai 1914 et mort le 2 décembre 1980, était un écrivain et diplomate français. Il est le seul écrivain à avoir remporté deux fois le prix Goncourt, sous son propre nom et sous le pseudonyme d\'Émile Ajar.', '1960-01-01', 'Grandir', 'Récit autobiographique', 'Ce livre autobiographique de Romain Gary raconte son enfance en Pologne et ses années de formation en France. Il explore comment les expériences de jeunesse influencent la personnalité et la vision du monde d\'un individu.', 19.20, './Images/Grandir/La_promesse_de_l_aube.jpg', 2),
(94, 'Le cœur et la raison', 'Dorothy Leigh Sayers', 'Dorothy Leigh Sayers est née le 13 juin 1893 à Oxford, en Angleterre.\r\nDorothy Sayers a également été reconnue pour ses traductions, ses œuvres théâtrales, ses essais et ses critiques littéraires.', '1922-01-01', 'Grandir', 'Développement de l\'enfant', 'Harriet Vane retourne à Oxford afin de participer à une soirée étudiante. Elle y retrouve ses anciennes amies et professeurs du Collège Shrewsbury. Quelque temps après, le doyen de l’établissement informe Harriet que des événements inquiétants et de plus en plus menaçants viennent troubler la quiétude de ce lieu prestigieux', 13.60, './Images/Grandir/Le_coeur_et_la_raison.jpg', 2),
(95, 'Les étapes majeures de l\'enfance', 'Françoise Dolto', 'Françoise Dolto, née le 6 novembre 1908 et morte le 25 août 1988, était une pédiatre et psychanalyste française. Pionnière dans le domaine de la psychanalyse de l\'enfant.', '1984-01-01', 'Grandir', 'Développement de l\'enfant', 'Françoise Dolto, célèbre pédiatre et psychanalyste française, analyse le développement de l\'enfant durant sa première année de vie. Elle met en lumière comment les premières interactions et expériences influencent la croissance émotionnelle et psychologique.', 14.25, './Images/Grandir/Les_étapes_majeures_de_l_enfance.jpg', 2),
(96, 'L\'homme à la découverte de son âme', 'Carl Gustav Jung', 'Carl Gustav Jung, né le 26 juillet 1875 et mort le 6 juin 1961, était un psychiatre et psychanalyste suisse. Il a fondé la psychologie analytique, développant des concepts tels que l\'inconscient collectif, les archétypes et les types psychologiques.', '1933-01-01', 'Grandir', 'Evolution personnelle', 'Jung, psychiatre suisse et fondateur de la psychologie analytique, explore les différentes phases de développement de la conscience individuelle. Il examine comment les individus grandissent spirituellement et psychologiquement à travers la découverte et l\'intégration de leur \"anima\" (aspect féminin de l\'homme) et de leur \"animus\" (aspect masculin de la femme).', 15.99, './Images/Grandir/L_Homme_à_la_découverte_de_son_ame.jpg', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
