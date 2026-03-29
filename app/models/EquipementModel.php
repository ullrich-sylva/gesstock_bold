<?php

class EquipementModel extends Model {
    protected $table = 'equipement';
    
    public function getByCategoryId($category_id) {
        $sql = "SELECT * FROM {$this->table} WHERE categorie_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$category_id]);
        return $stmt->fetchAll();
    }
    
    public function getWithCategory() {
        $sql = "SELECT e.*, c.nom as categorie_nom 
                FROM {$this->table} e
                LEFT JOIN categorie c ON e.categorie_id = c.id";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
    
    public function getLowStock() {
        $sql = "SELECT * FROM {$this->table} WHERE quantite_stock <= seuil_alerte";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
}
