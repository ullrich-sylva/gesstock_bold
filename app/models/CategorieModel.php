<?php

class CategorieModel extends Model {
    protected $table = 'categorie';
    protected $primaryKey = 'id_categorie';
    
    public function getWithEquipements() {
        $sql = "SELECT * FROM {$this->table}";
        try {
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Categorie getWithEquipements error: " . $e->getMessage());
            return $this->getAll();
        }
    }
    
}
