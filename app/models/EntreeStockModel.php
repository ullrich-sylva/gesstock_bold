<?php

class EntreeStockModel extends Model {
    protected $table = 'entreestock';
    
    public function getWithDetails() {
        $sql = "SELECT es.*, f.nom as fournisseur_nom 
                FROM {$this->table} es
                LEFT JOIN fournisseur f ON es.fournisseur_id = f.id
                ORDER BY es.date_entree DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
    
    public function getByFournisseurId($fournisseur_id) {
        $sql = "SELECT * FROM {$this->table} WHERE fournisseur_id = ? ORDER BY date_entree DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$fournisseur_id]);
        return $stmt->fetchAll();
    }
}
