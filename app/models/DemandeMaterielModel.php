<?php

class DemandeMaterielModel extends Model {
    protected $table = 'demandemateriel';
    
    public function getWithDetails() {
        $sql = "SELECT dm.*, u.nom as utilisateur_nom 
                FROM {$this->table} dm
                LEFT JOIN utilisateur u ON dm.utilisateur_id = u.id
                ORDER BY dm.date_demande DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
    
    public function getByStatus($status) {
        $sql = "SELECT * FROM {$this->table} WHERE statut = ? ORDER BY date_demande DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$status]);
        return $stmt->fetchAll();
    }
}
