-- ============================================================
-- Base de données: `gesstock_bold`
-- ============================================================

-- Création de la base de données
CREATE DATABASE IF NOT EXISTS `gesstock_bold` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `gesstock_bold`;

-- ============================================================
-- Table `utilisateur`
-- ============================================================
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `nom` VARCHAR(100) NOT NULL,
  `prenom` VARCHAR(100) NOT NULL,
  `email` VARCHAR(120) NOT NULL UNIQUE,
  `mot_de_passe` VARCHAR(255) NOT NULL,
  `role` VARCHAR(50) DEFAULT 'user',
  `actif` BOOLEAN DEFAULT 1,
  `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `date_modification` DATETIME ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Table `categorie`
-- ============================================================
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `nom` VARCHAR(100) NOT NULL,
  `description` TEXT,
  `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Table `equipement`
-- ============================================================
CREATE TABLE IF NOT EXISTS `equipement` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `reference` VARCHAR(100) NOT NULL UNIQUE,
  `nom` VARCHAR(120) NOT NULL,
  `description` TEXT,
  `categorie_id` INT,
  `quantite_stock` INT DEFAULT 0,
  `seuil_alerte` INT DEFAULT 10,
  `prix_unitaire` DECIMAL(10, 2) DEFAULT 0,
  `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (categorie_id) REFERENCES categorie(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Table `fournisseur`
-- ============================================================
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `nom` VARCHAR(120) NOT NULL,
  `email` VARCHAR(120),
  `telephone` VARCHAR(20),
  `adresse` TEXT,
  `actif` BOOLEAN DEFAULT 1,
  `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Table `entreestock`
-- ============================================================
CREATE TABLE IF NOT EXISTS `entreestock` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `reference` VARCHAR(100) NOT NULL,
  `fournisseur_id` INT,
  `description` TEXT,
  `date_entree` DATE,
  `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (fournisseur_id) REFERENCES fournisseur(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Table `ligneentree`
-- ============================================================
CREATE TABLE IF NOT EXISTS `ligneentree` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `entreestock_id` INT NOT NULL,
  `equipement_id` INT NOT NULL,
  `quantite` INT,
  `prix_unitaire` DECIMAL(10, 2),
  FOREIGN KEY (entreestock_id) REFERENCES entreestock(id),
  FOREIGN KEY (equipement_id) REFERENCES equipement(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Table `sortiestock`
-- ============================================================
CREATE TABLE IF NOT EXISTS `sortiestock` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `reference` VARCHAR(100) NOT NULL,
  `utilisateur_id` INT,
  `description` TEXT,
  `date_sortie` DATE,
  `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Table `demandemateriel`
-- ============================================================
CREATE TABLE IF NOT EXISTS `demandemateriel` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `reference` VARCHAR(100) NOT NULL,
  `utilisateur_id` INT,
  `statut` VARCHAR(50) DEFAULT 'en_attente',
  `description` TEXT,
  `date_demande` DATE,
  `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Table `lignedemande`
-- ============================================================
CREATE TABLE IF NOT EXISTS `lignedemande` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `demandemateriel_id` INT NOT NULL,
  `equipement_id` INT NOT NULL,
  `quantite` INT,
  FOREIGN KEY (demandemateriel_id) REFERENCES demandemateriel(id),
  FOREIGN KEY (equipement_id) REFERENCES equipement(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Table `bonlivraison`
-- ============================================================
CREATE TABLE IF NOT EXISTS `bonlivraison` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `reference` VARCHAR(100) NOT NULL,
  `demandemateriel_id` INT,
  `description` TEXT,
  `date_livraison` DATE,
  `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (demandemateriel_id) REFERENCES demandemateriel(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Table `inventaire`
-- ============================================================
CREATE TABLE IF NOT EXISTS `inventaire` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `reference` VARCHAR(100) NOT NULL,
  `utilisateur_id` INT,
  `description` TEXT,
  `date_inventaire` DATE,
  `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Table `ligneinventaire`
-- ============================================================
CREATE TABLE IF NOT EXISTS `ligneinventaire` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `inventaire_id` INT NOT NULL,
  `equipement_id` INT NOT NULL,
  `quantite_physique` INT,
  `quantite_attendue` INT,
  FOREIGN KEY (inventaire_id) REFERENCES inventaire(id),
  FOREIGN KEY (equipement_id) REFERENCES equipement(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Table `alerte`
-- ============================================================
CREATE TABLE IF NOT EXISTS `alerte` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `equipement_id` INT,
  `type` VARCHAR(50),
  `message` TEXT,
  `statut` VARCHAR(50) DEFAULT 'active',
  `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (equipement_id) REFERENCES equipement(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Insertion de test
-- ============================================================

-- Insérer un utilisateur admin
INSERT INTO `utilisateur` (`nom`, `prenom`, `email`, `mot_de_passe`, `role`, `actif`)
VALUES ('Admin', 'Dministrateur', 'admin@gesstock.com', '$2y$10$YourHashedPasswordHere', 'admin', 1);

-- Insérer quelques catégories
INSERT INTO `categorie` (`nom`, `description`)
VALUES 
  ('Électronique', 'Composants électroniques'),
  ('Câblage', 'Câbles et connecteurs'),
  ('Outils', 'Outils et équipements');

-- Créer les index
CREATE INDEX idx_equipement_categorie ON equipement(categorie_id);
CREATE INDEX idx_equipement_reference ON equipement(reference);
CREATE INDEX idx_entreestock_fournisseur ON entreestock(fournisseur_id);
CREATE INDEX idx_sortiestock_utilisateur ON sortiestock(utilisateur_id);
CREATE INDEX idx_demandemateriel_utilisateur ON demandemateriel(utilisateur_id);
CREATE INDEX idx_alerte_equipement ON alerte(equipement_id);
