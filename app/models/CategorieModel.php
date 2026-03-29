<?php

class CategorieModel extends Model {
    protected $table = 'categorie';
    
    public function getWithEquipements() {
        $sql = "SELECT c.*, COUNT(e.id) as nombre_equipements 
                FROM {$this->table} c
                LEFT JOIN equipement e ON c.id = e.categorie_id
                GROUP BY c.id";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
}
