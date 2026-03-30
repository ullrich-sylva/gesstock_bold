<?php

class LigneEntreeModel extends Model {
    protected $table = 'ligneentree';
    
    public function getByEntreeId($entree_id) {
        $sql = "SELECT * FROM {$this->table} WHERE id_entreestock = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$entree_id]);
        return $stmt->fetchAll();
    }
}
