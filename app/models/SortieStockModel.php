<?php

class SortieStockModel extends Model {
    protected $table = 'sortiestock';
    
    public function getWithDetails() {
        $sql = "SELECT ss.*, u.nom as utilisateur_nom 
                FROM {$this->table} ss
                LEFT JOIN utilisateur u ON ss.utilisateur_id = u.id
                ORDER BY ss.date_sortie DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
    
    public function getByUtilisateurId($utilisateur_id) {
        $sql = "SELECT * FROM {$this->table} WHERE utilisateur_id = ? ORDER BY date_sortie DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$utilisateur_id]);
        return $stmt->fetchAll();
    }
}
