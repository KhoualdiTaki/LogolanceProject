-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 01 juin 2023 à 17:11
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
-- Base de données : `logolence_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id_administrateur` bigint(21) NOT NULL AUTO_INCREMENT,
  `nom_administrateur` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom_administrateur` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_naissance_administrateur` date DEFAULT NULL,
  `mobile_administrateur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_administrateur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse_administrateur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_administrateur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_administrateur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_connexion_administrateur` datetime DEFAULT NULL,
  `date_saisie_administrateur` datetime DEFAULT NULL,
  `etat_administrateur` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_administrateur`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id_administrateur`, `nom_administrateur`, `prenom_administrateur`, `date_naissance_administrateur`, `mobile_administrateur`, `email_administrateur`, `adresse_administrateur`, `login_administrateur`, `password_administrateur`, `date_connexion_administrateur`, `date_saisie_administrateur`, `etat_administrateur`) VALUES
(1, 'TAKI', 'KHOUALDI', '2000-01-01', '00 00 00 00 00', 'taki_khoualdi@gmail.com', 'Annaba', 'taki_khoualdi', '123456', NULL, '2023-05-29 01:59:03', 1);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` bigint(21) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom_client` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_naissance_client` datetime DEFAULT NULL,
  `mobile_client` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_client` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse_client` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `raison_sociale_client` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_client` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_client` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_connexion_client` datetime DEFAULT NULL,
  `date_saisie_client` datetime DEFAULT NULL,
  `etat_client` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `date_naissance_client`, `mobile_client`, `email_client`, `adresse_client`, `raison_sociale_client`, `login_client`, `password_client`, `date_connexion_client`, `date_saisie_client`, `etat_client`) VALUES
(1, 'Mohamed', 'Jaafar', '1980-10-15 00:00:00', '00 00 00 00 00', 'medjaafar@gmail.com', 'Annaba', 'RAS', 'jaafar', '123456', NULL, '2023-05-29 02:32:08', 1);

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

DROP TABLE IF EXISTS `domaine`;
CREATE TABLE IF NOT EXISTS `domaine` (
  `id_domaine` bigint(21) NOT NULL AUTO_INCREMENT,
  `intitule_domaine` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat_domaine` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_domaine`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `domaine`
--

INSERT INTO `domaine` (`id_domaine`, `intitule_domaine`, `etat_domaine`) VALUES
(1, 'Test', 1),
(2, 'Testimonial', 1),
(3, 'Education', 1);

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `id_livraison` bigint(21) NOT NULL AUTO_INCREMENT,
  `numero_livraison` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maniere_livraison` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lien_livraison` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_saisie_livraison` datetime DEFAULT NULL,
  `etat_livraison` tinyint(1) DEFAULT NULL,
  `id_postulat` bigint(21) DEFAULT NULL,
  PRIMARY KEY (`id_livraison`),
  KEY `FK_postulat_ayant_des_paiements` (`id_postulat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE IF NOT EXISTS `offre` (
  `id_offre` bigint(21) NOT NULL AUTO_INCREMENT,
  `intitule_offre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_offre` longtext COLLATE utf8_unicode_ci,
  `montant_offre` bigint(21) DEFAULT NULL,
  `monnaie_offre` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unite_offre` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_saisie_offre` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_validation_offre` datetime DEFAULT NULL,
  `client_offre` bigint(21) DEFAULT NULL,
  `domaine_offre` bigint(21) DEFAULT NULL,
  PRIMARY KEY (`id_offre`),
  KEY `FK_client_ayant_des_offres` (`client_offre`),
  KEY `FK_domaine_ayant_des_offres` (`domaine_offre`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id_offre`, `intitule_offre`, `description_offre`, `montant_offre`, `monnaie_offre`, `unite_offre`, `date_saisie_offre`, `date_validation_offre`, `client_offre`, `domaine_offre`) VALUES
(1, 'Test', 'RAS', 10000, 'DZD', 'Mois', '2023-05-29 05:49:29', '2023-06-01 15:37:40', 1, 1),
(2, 'Test offre 1', 'RAS', 1000, 'DZD', 'Heure', '2023-06-01 15:52:32', NULL, 1, 3),
(4, 'TEST', 'TEST', 1000, 'DZD', 'Jour', '2023-06-01 18:10:21', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `id_paiement` bigint(21) NOT NULL AUTO_INCREMENT,
  `montant_paiement` bigint(21) DEFAULT NULL,
  `monnaie_paiement` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_reglement_paiement` datetime DEFAULT CURRENT_TIMESTAMP,
  `postulat_paiement` bigint(21) DEFAULT NULL,
  PRIMARY KEY (`id_paiement`),
  KEY `FK_postulats_ayant_des_paiements` (`postulat_paiement`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `postulat`
--

DROP TABLE IF EXISTS `postulat`;
CREATE TABLE IF NOT EXISTS `postulat` (
  `id_postulat` bigint(21) NOT NULL AUTO_INCREMENT,
  `appreciation_postulat` tinyint(1) DEFAULT NULL,
  `date_saisie_postulat` datetime DEFAULT NULL,
  `date_validation_postulat` datetime DEFAULT NULL,
  `prestataire_postulat` bigint(21) DEFAULT NULL,
  `offre_postulat` bigint(21) DEFAULT NULL,
  PRIMARY KEY (`id_postulat`),
  KEY `FK_offre_ayant_des_postulats` (`offre_postulat`),
  KEY `FK_prestataire_ayant_des_postulats` (`prestataire_postulat`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `postulat`
--

INSERT INTO `postulat` (`id_postulat`, `appreciation_postulat`, `date_saisie_postulat`, `date_validation_postulat`, `prestataire_postulat`, `offre_postulat`) VALUES
(1, 0, '2023-06-01 17:14:53', '2023-06-01 18:08:31', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `prestataire`
--

DROP TABLE IF EXISTS `prestataire`;
CREATE TABLE IF NOT EXISTS `prestataire` (
  `id_prestataire` bigint(21) NOT NULL AUTO_INCREMENT,
  `nom_prestataire` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom_prestataire` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_naissance_prestataire` date DEFAULT NULL,
  `mobile_prestataire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_prestataire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse_prestataire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_debut_prestataire` date DEFAULT NULL,
  `experience_prestataire` longtext COLLATE utf8_unicode_ci,
  `niveau_prestataire` tinyint(1) DEFAULT NULL,
  `login_prestataire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_prestataire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_connexion_prestataire` datetime DEFAULT NULL,
  `date_saisie_prestataire` datetime DEFAULT CURRENT_TIMESTAMP,
  `etat_prestataire` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_prestataire`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `prestataire`
--

INSERT INTO `prestataire` (`id_prestataire`, `nom_prestataire`, `prenom_prestataire`, `date_naissance_prestataire`, `mobile_prestataire`, `email_prestataire`, `adresse_prestataire`, `date_debut_prestataire`, `experience_prestataire`, `niveau_prestataire`, `login_prestataire`, `password_prestataire`, `date_connexion_prestataire`, `date_saisie_prestataire`, `etat_prestataire`) VALUES
(1, 'Mahmoud', 'Guerfi', '2000-01-01', '00 00 00 00 00', 'mahmoudguerfi@gmail.com', 'Annaba', '2020-01-01', 'Lorem ipsum set amet dolor', 1, 'mahmoud', '123456', NULL, '2023-06-01 17:12:23', 1);

-- --------------------------------------------------------

--
-- Structure de la table `realisation`
--

DROP TABLE IF EXISTS `realisation`;
CREATE TABLE IF NOT EXISTS `realisation` (
  `id_realisation` bigint(21) NOT NULL AUTO_INCREMENT,
  `objet_realisation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_realisation` longtext COLLATE utf8_unicode_ci,
  `image_realisation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lien_realisation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_saisie_realisation` datetime DEFAULT CURRENT_TIMESTAMP,
  `prestataire_realisation` bigint(21) DEFAULT NULL,
  `domaine_realisation` bigint(21) DEFAULT NULL,
  PRIMARY KEY (`id_realisation`),
  KEY `FK_domaine_ayant_des_realisations` (`domaine_realisation`),
  KEY `FK_prestataire_ayant_des_realisations` (`prestataire_realisation`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `realisation`
--

INSERT INTO `realisation` (`id_realisation`, `objet_realisation`, `description_realisation`, `image_realisation`, `lien_realisation`, `date_saisie_realisation`, `prestataire_realisation`, `domaine_realisation`) VALUES
(1, 'Réalisation 1', 'Description de la réalisation 1', 'default.png', NULL, '2023-06-01 17:36:08', 1, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
