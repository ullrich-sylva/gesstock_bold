<?php

class LigneEntreeModel extends Model {
    protected $table = 'ligneentree';
    
    public function getByEntreeId($entree_id) {
        $sql = "SELECT le.*, e.reference as equipement_ref, e.nom as equipement_nom 
                FROM {$this->table} le
                LEFT JOIN equipement e ON le.equipement_id = e.id
                WHERE le.entreestock_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$entree_id]);
        return $stmt->fetchAll();
    }
}
