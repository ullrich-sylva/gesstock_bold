<?php

class LigneInventaireModel extends Model {
    protected $table = 'ligneinventaire';
    
    public function getByInventaireId($inventaire_id) {
        $sql = "SELECT * FROM {$this->table} WHERE id_inventaire = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$inventaire_id]);
        return $stmt->fetchAll();
    }
}
