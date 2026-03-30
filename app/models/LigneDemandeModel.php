<?php

class LigneDemandeModel extends Model {
    protected $table = 'lignedemande';
    
    public function getByDemandeId($demande_id) {
        $sql = "SELECT * FROM {$this->table} WHERE id_demandemateriel = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$demande_id]);
        return $stmt->fetchAll();
    }
}
