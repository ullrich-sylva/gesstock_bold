<?php

class LigneDemandeModel extends Model {
    protected $table = 'lignedemande';
    
    public function getByDemandeId($demande_id) {
        $sql = "SELECT ld.*, e.reference as equipement_ref, e.nom as equipement_nom 
                FROM {$this->table} ld
                LEFT JOIN equipement e ON ld.equipement_id = e.id
                WHERE ld.demandemateriel_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$demande_id]);
        return $stmt->fetchAll();
    }
}
