<?php

class FournisseurModel extends Model {
    protected $table = 'fournisseur';
    protected $primaryKey = 'id_fournisseur';
    
    public function getActive() {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
    
}
