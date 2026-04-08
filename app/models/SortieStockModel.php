<?php

require_once __DIR__ . '/Model.php';

class SortieStockModel extends Model {
    protected $table = 'sortiestock';
    protected $primaryKey = 'id';
    
    public function getWithDetails() {
        $sql = "SELECT ss.*, u.nom as utilisateur_nom, u.prenom as utilisateur_prenom, 
                (SELECT e.nom FROM lignesortie ls JOIN equipement e ON ls.id_equipement = e.id WHERE ls.id_sortie = ss.id LIMIT 1) as equipement_nom,
                (SELECT e.reference FROM lignesortie ls JOIN equipement e ON ls.id_equipement = e.id WHERE ls.id_sortie = ss.id LIMIT 1) as equipement_reference,
                (SELECT ls.quantite_sortie FROM lignesortie ls WHERE ls.id_sortie = ss.id LIMIT 1) as quantite
                FROM {$this->table} ss
                LEFT JOIN utilisateur u ON ss.utilisateur_id = u.id
                ORDER BY ss.date_sortie DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function getById($id) {
$sql = "SELECT ss.*, u.nom as utilisateur_nom, u.prenom as utilisateur_prenom, \n                (SELECT e.nom FROM lignesortie ls JOIN equipement e ON ls.id_equipement = e.id WHERE ls.id_sortie = ss.id LIMIT 1) as equipement_nom,\n                (SELECT e.reference FROM lignesortie ls JOIN equipement e ON ls.id_equipement = e.id WHERE ls.id_sortie = ss.id LIMIT 1) as equipement_reference,\n                (SELECT ls.quantite_sortie FROM lignesortie ls WHERE ls.id_sortie = ss.id LIMIT 1) as quantite\n                FROM {$this->table} ss\n                LEFT JOIN utilisateur u ON ss.utilisateur_id = u.id\n                WHERE ss.id = ?";        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    public function getByUtilisateurId($utilisateur_id) {
        $sql = "SELECT * FROM {$this->table} WHERE utilisateur_id = ? ORDER BY date_sortie DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$utilisateur_id]);
        return $stmt->fetchAll();
    }
    
    public function getByDemandeId($demande_id) {
        $sql = "SELECT * FROM {$this->table} WHERE demandemateriel_id = ? ORDER BY date_sortie DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$demande_id]);
        return $stmt->fetchAll();
    }
}
