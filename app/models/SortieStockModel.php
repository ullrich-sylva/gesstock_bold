<?php

class SortieStockModel extends Model {
    protected $table = 'sortiestock';
    protected $primaryKey = 'id_sortie';
    
    public function getWithDetails() {
        $sql = "SELECT ss.*, e.designation as equipement_nom, u.nom as utilisateur_nom, u.prenom as utilisateur_prenom
                FROM {$this->table} ss
                LEFT JOIN equipement e ON ss.id_equipement = e.id_equipement
                LEFT JOIN utilisateur u ON ss.id_utilisateur = u.id_utilisateur
                ORDER BY ss.date_sortie DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $sql = "SELECT ss.*, e.designation as equipement_nom, u.nom as utilisateur_nom, u.prenom as utilisateur_prenom
                FROM {$this->table} ss
                LEFT JOIN equipement e ON ss.id_equipement = e.id_equipement
                LEFT JOIN utilisateur u ON ss.id_utilisateur = u.id_utilisateur
                WHERE ss.id_sortie = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    public function getByUtilisateurId($utilisateur_id) {
        $sql = "SELECT * FROM {$this->table} WHERE id_utilisateur = ? ORDER BY date_sortie DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$utilisateur_id]);
        return $stmt->fetchAll();
    }
    
    public function getByDemandeId($demande_id) {
        $sql = "SELECT * FROM {$this->table} WHERE id_demande = ? ORDER BY date_sortie DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$demande_id]);
        return $stmt->fetchAll();
    }
}
