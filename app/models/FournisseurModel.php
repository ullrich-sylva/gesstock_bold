<?php

class FournisseurModel extends Model {
    protected $table = 'fournisseur';
    
    public function getActive() {
        $sql = "SELECT * FROM {$this->table} WHERE actif = 1";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
}
