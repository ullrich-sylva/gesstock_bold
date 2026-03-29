<?php

class InventaireModel extends Model {
    protected $table = 'inventaire';
    
    public function getWithDetails() {
        $sql = "SELECT i.*, u.nom as utilisateur_nom 
                FROM {$this->table} i
                LEFT JOIN utilisateur u ON i.utilisateur_id = u.id
                ORDER BY i.date_inventaire DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
    
    public function getRecent($limit = 10) {
        $sql = "SELECT * FROM {$this->table} ORDER BY date_inventaire DESC LIMIT ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$limit]);
        return $stmt->fetchAll();
    }
}
