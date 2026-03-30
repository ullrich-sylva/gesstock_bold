<?php
require_once 'config/database.php';
try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Seeding Categories...\n";
    $categories = [
        ['Transformateurs', 'Transformateurs de puissance et de distribution'],
        ['Disjoncteurs', 'Disjoncteurs haute et moyenne tension'],
        ['Câbles MT', 'Câbles pour moyenne tension'],
        ['Accessoires Réseau', 'Connecteurs, isolateurs et accessoires']
    ];
    $catStmt = $pdo->prepare("INSERT IGNORE INTO categorie (libelle, description) VALUES (?, ?)");
    foreach ($categories as $cat) {
        $catStmt->execute($cat);
    }

    echo "Seeding Fournisseurs...\n";
    $fournisseurs = [
        ['Schneider Electric', 'Jean Dupont', '0123456789', 'contact@schneider.com', 'Rueil-Malmaison, France'],
        ['Legrand', 'Marie Martin', '0234567890', 'sales@legrand.com', 'Limoges, France'],
        ['ABB France', 'Pierre Durand', '0345678901', 'info@abb.fr', 'Cergy, France'],
        ['Nexans', 'Alice Bernard', '0456789012', 'group@nexans.com', 'Courbevoie, France'],
        ['Prysmian Group', 'Paul Lefebvre', '0567890123', 'contact@prysmian.com', 'Sainte-Geneviève-des-Bois, France']
    ];
    $fournStmt = $pdo->prepare("INSERT IGNORE INTO fournisseur (nom, contact, telephone, email, adresse) VALUES (?, ?, ?, ?, ?)");
    foreach ($fournisseurs as $f) {
        $fournStmt->execute($f);
    }

    // Get category IDs
    $stmt = $pdo->query("SELECT id_categorie, libelle FROM categorie");
    $catIds = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

    echo "Seeding Equipements...\n";
    $equipements = [
        ['TR-500KVA', 'Transformateur 500kVA', 'Transformateur de remplissage', 'Transformateurs', 5, 2, 10, 'Unité'],
        ['TR-1000KVA', 'Transformateur 1000kVA', 'Haute performance', 'Transformateurs', 3, 1, 5, 'Unité'],
        ['DJ-MT-630A', 'Disjoncteur MT 630A', 'Protection réseau', 'Disjoncteurs', 12, 5, 20, 'Unité'],
        ['DJ-MT-1250A', 'Disjoncteur MT 1250A', 'Industriel robuste', 'Disjoncteurs', 8, 3, 15, 'Unité'],
        ['CB-MT-240MM', 'Câble MT 240mm²', 'Aluminium XLPE', 'Câbles MT', 150, 50, 500, 'Mètre'],
        ['CB-MT-150MM', 'Câble MT 150mm²', 'Cuivre isolé', 'Câbles MT', 200, 100, 1000, 'Mètre'],
        ['IS-MT-24KV', 'Isolateur 24kV', 'Composite de suspension', 'Accessoires Réseau', 45, 10, 100, 'Pièce'],
        ['CN-MT-ALU', 'Connecteur Al/Cu', 'Bimétallique', 'Accessoires Réseau', 120, 30, 300, 'Pièce'],
        ['TR-SEC-250', 'Transformateur Sec 250kVA', 'Utilisation intérieure', 'Transformateurs', 2, 1, 4, 'Unité'],
        ['DJ-BT-250A', 'Disjoncteur BT 250A', 'Magnéto-thermique', 'Disjoncteurs', 30, 10, 60, 'Unité'],
        ['CB-BT-16MM', 'Câble BT 16mm²', 'H07RN-F souple', 'Câbles MT', 500, 200, 2000, 'Mètre'],
        ['AR-MT-SRE', 'Sectionneur Réseau MT', 'Commande manuelle', 'Accessoires Réseau', 6, 2, 10, 'Unité'],
        ['TR-25KVA', 'Transformateur 25kVA H61', 'Montage sur poteau', 'Transformateurs', 15, 5, 25, 'Unité'],
        ['DJ-BT-100A', 'Disjoncteur BT 100A', 'Usage tertiaire', 'Disjoncteurs', 50, 15, 100, 'Unité'],
        ['CB-MT-95MM', 'Câble MT 95mm²', 'Souterrain armé', 'Câbles MT', 300, 150, 1500, 'Mètre'],
        ['CN-COUP-HP', 'Coupe-circuit HP', 'Cartouche fusible', 'Accessoires Réseau', 80, 20, 200, 'Pièce'],
        ['TR-MT-CL', 'Cellule MT Compacte', 'Arrivée / Départ', 'Transformateurs', 4, 1, 8, 'Unité'],
        ['DJ-MT-GAS', 'Disjoncteur SF6', 'Gaz tourbillonnant', 'Disjoncteurs', 3, 1, 5, 'Unité'],
        ['CB-TEL-FIG', 'Câble Télé-conduite', 'Fibre optique armée', 'Câbles MT', 1000, 200, 5000, 'Mètre'],
        ['AR-IS-200', 'Isolateur Support 24kV', 'Porcelaine', 'Accessoires Réseau', 60, 20, 150, 'Pièce']
    ];

    $eqStmt = $pdo->prepare("INSERT IGNORE INTO equipement (reference, designation, description, id_categorie, stock_actuel, seuil_min, seuil_max, unite) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    foreach ($equipements as $eq) {
        $catName = $eq[3];
        $catId = $catIds[$catName] ?? null;
        if ($catId) {
            $eqData = [$eq[0], $eq[1], $eq[2], $catId, $eq[4], $eq[5], $eq[6], $eq[7]];
            $eqStmt->execute($eqData);
        }
    }

    echo "Seed completed successfully!\n";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "\n";
}
