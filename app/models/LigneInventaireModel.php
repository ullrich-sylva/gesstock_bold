<?php

class LigneInventaireModel extends Model {
    protected $table = 'ligneinventaire';
    
    public function getByInventaireId($inventaire_id) {
        $sql = "SELECT li.*, e.reference as equipement_ref, e.nom as equipement_nom 
                FROM {$this->table} li
                LEFT JOIN equipement e ON li.equipement_id = e.id
                WHERE li.inventaire_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$inventaire_id]);
        return $stmt->fetchAll();
    }
}
