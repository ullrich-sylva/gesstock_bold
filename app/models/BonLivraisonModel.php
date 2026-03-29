<?php

class BonLivraisonModel extends Model {
    protected $table = 'bonlivraison';
    
    public function getWithDetails() {
        $sql = "SELECT bl.*, dm.reference as demande_ref 
                FROM {$this->table} bl
                LEFT JOIN demandemateriel dm ON bl.demandemateriel_id = dm.id
                ORDER BY bl.date_livraison DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
    
    public function getByDemandeId($demande_id) {
        $sql = "SELECT * FROM {$this->table} WHERE demandemateriel_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$demande_id]);
        return $stmt->fetchAll();
    }
}
