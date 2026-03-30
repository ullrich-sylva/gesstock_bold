-- ============================================================
-- SCRIPT DE RÉALIMENTATION (SEED) - BOLD STOCK
-- ============================================================

-- 1. Insertion des Catégories
INSERT IGNORE INTO `categorie` (`libelle`, `description`) VALUES 
('Transformateurs', 'Transformateurs de puissance et de distribution'),
('Disjoncteurs', 'Disjoncteurs haute et moyenne tension'),
('Câbles MT', 'Câbles pour moyenne tension'),
('Accessoires Réseau', 'Connecteurs, isolateurs et accessoires');

-- 2. Insertion des Fournisseurs
INSERT IGNORE INTO `fournisseur` (`nom`, `contact`, `telephone`, `email`, `adresse`) VALUES 
('Schneider Electric', 'Jean Dupont', '0123456789', 'contact@schneider.com', 'Rueil-Malmaison, France'),
('Legrand', 'Marie Martin', '0234567890', 'sales@legrand.com', 'Limoges, France'),
('ABB France', 'Pierre Durand', '0345678901', 'info@abb.fr', 'Cergy, France'),
('Nexans', 'Alice Bernard', '0456789012', 'group@nexans.com', 'Courbevoie, France'),
('Prysmian Group', 'Paul Lefebvre', '0567890123', 'contact@prysmian.com', 'Sainte-Geneviève-des-Bois, France');

-- 3. Insertion des Équipements
-- Note: On utilise des sous-requêtes pour récupérer les IDs des catégories par leur libellé
INSERT IGNORE INTO `equipement` (`reference`, `designation`, `description`, `id_categorie`, `stock_actuel`, `seuil_min`, `seuil_max`, `unite`) VALUES 
('TR-500KVA', 'Transformateur 500kVA', 'Transformateur de remplissage', (SELECT id_categorie FROM categorie WHERE libelle = 'Transformateurs' LIMIT 1), 5, 2, 10, 'Unité'),
('TR-1000KVA', 'Transformateur 1000kVA', 'Haute performance', (SELECT id_categorie FROM categorie WHERE libelle = 'Transformateurs' LIMIT 1), 3, 1, 5, 'Unité'),
('DJ-MT-630A', 'Disjoncteur MT 630A', 'Protection réseau', (SELECT id_categorie FROM categorie WHERE libelle = 'Disjoncteurs' LIMIT 1), 12, 5, 20, 'Unité'),
('DJ-MT-1250A', 'Disjoncteur MT 1250A', 'Industriel robuste', (SELECT id_categorie FROM categorie WHERE libelle = 'Disjoncteurs' LIMIT 1), 8, 3, 15, 'Unité'),
('CB-MT-240MM', 'Câble MT 240mm²', 'Aluminium XLPE', (SELECT id_categorie FROM categorie WHERE libelle = 'Câbles MT' LIMIT 1), 150, 50, 500, 'Mètre'),
('CB-MT-150MM', 'Câble MT 150mm²', 'Cuivre isolé', (SELECT id_categorie FROM categorie WHERE libelle = 'Câbles MT' LIMIT 1), 200, 100, 1000, 'Mètre'),
('IS-MT-24KV', 'Isolateur 24kV', 'Composite de suspension', (SELECT id_categorie FROM categorie WHERE libelle = 'Accessoires Réseau' LIMIT 1), 45, 10, 100, 'Pièce'),
('CN-MT-ALU', 'Connecteur Al/Cu', 'Bimétallique', (SELECT id_categorie FROM categorie WHERE libelle = 'Accessoires Réseau' LIMIT 1), 120, 30, 300, 'Pièce'),
('TR-SEC-250', 'Transformateur Sec 250kVA', 'Utilisation intérieure', (SELECT id_categorie FROM categorie WHERE libelle = 'Transformateurs' LIMIT 1), 2, 1, 4, 'Unité'),
('DJ-BT-250A', 'Disjoncteur BT 250A', 'Magnéto-thermique', (SELECT id_categorie FROM categorie WHERE libelle = 'Disjoncteurs' LIMIT 1), 30, 10, 60, 'Unité'),
('CB-BT-16MM', 'Câble BT 16mm²', 'H07RN-F souple', (SELECT id_categorie FROM categorie WHERE libelle = 'Câbles MT' LIMIT 1), 500, 200, 2000, 'Mètre'),
('AR-MT-SRE', 'Sectionneur Réseau MT', 'Commande manuelle', (SELECT id_categorie FROM categorie WHERE libelle = 'Accessoires Réseau' LIMIT 1), 6, 2, 10, 'Unité'),
('TR-25KVA', 'Transformateur 25kVA H61', 'Montage sur poteau', (SELECT id_categorie FROM categorie WHERE libelle = 'Transformateurs' LIMIT 1), 15, 5, 25, 'Unité'),
('DJ-BT-100A', 'Disjoncteur BT 100A', 'Usage tertiaire', (SELECT id_categorie FROM categorie WHERE libelle = 'Disjoncteurs' LIMIT 1), 50, 15, 100, 'Unité'),
('CB-MT-95MM', 'Câble MT 95mm²', 'Souterrain armé', (SELECT id_categorie FROM categorie WHERE libelle = 'Câbles MT' LIMIT 1), 300, 150, 1500, 'Mètre'),
('CN-COUP-HP', 'Coupe-circuit HP', 'Cartouche fusible', (SELECT id_categorie FROM categorie WHERE libelle = 'Accessoires Réseau' LIMIT 1), 80, 20, 200, 'Pièce'),
('TR-MT-CL', 'Cellule MT Compacte', 'Arrivée / Départ', (SELECT id_categorie FROM categorie WHERE libelle = 'Transformateurs' LIMIT 1), 4, 1, 8, 'Unité'),
('DJ-MT-GAS', 'Disjoncteur SF6', 'Gaz tourbillonnant', (SELECT id_categorie FROM categorie WHERE libelle = 'Disjoncteurs' LIMIT 1), 3, 1, 5, 'Unité'),
('CB-TEL-FIG', 'Câble Télé-conduite', 'Fibre optique armée', (SELECT id_categorie FROM categorie WHERE libelle = 'Câbles MT' LIMIT 1), 1000, 200, 5000, 'Mètre'),
('AR-IS-200', 'Isolateur Support 24kV', 'Porcelaine', (SELECT id_categorie FROM categorie WHERE libelle = 'Accessoires Réseau' LIMIT 1), 60, 20, 150, 'Pièce');
