<?php

class InventaireModel extends Model {
    protected $table = 'inventaire';
    protected $primaryKey = 'id_inventaire';
    
    public function getWithDetails() {
        $sql = "SELECT i.*, u.nom as utilisateur_nom, u.prenom as utilisateur_prenom 
                FROM {$this->table} i
                LEFT JOIN utilisateur u ON i.id_utilisateur = u.id_utilisateur
                ORDER BY i.date_inventaire DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $sql = "SELECT i.*, u.nom as utilisateur_nom, u.prenom as utilisateur_prenom 
                FROM {$this->table} i
                LEFT JOIN utilisateur u ON i.id_utilisateur = u.id_utilisateur
                WHERE i.id_inventaire = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    public function getRecent($limit = 10) {
        $sql = "SELECT * FROM {$this->table} ORDER BY date_inventaire DESC LIMIT ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$limit]);
        return $stmt->fetchAll();
    }
    
    
}
