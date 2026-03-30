<?php

class EquipementModel extends Model {
    protected $table = 'equipement';
    protected $primaryKey = 'id_equipement';
    
    public function getByCategoryId($category_id) {
        $sql = "SELECT * FROM {$this->table} WHERE id_categorie = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$category_id]);
        return $stmt->fetchAll();
    }
    
    public function getWithCategory() {
        $sql = "SELECT e.*, c.libelle as categorie_nom 
                FROM {$this->table} e
                LEFT JOIN categorie c ON e.id_categorie = c.id_categorie";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
    
    public function getLowStock() {
        $sql = "SELECT * FROM {$this->table} WHERE stock_actuel <= seuil_min";
        try {
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Dashboard low stock query error: " . $e->getMessage());
            return [];
        }
    }
    
    
    public function count() {
        $sql = "SELECT COUNT(*) as total FROM {$this->table}";
        $result = $this->pdo->query($sql)->fetch();
        return $result['total'] ?? 0;
    }
}
