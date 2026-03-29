<?php

class AlerteModel extends Model {
    protected $table = 'alerte';
    
    public function getActive() {
        $sql = "SELECT a.*, e.nom as equipement_nom, e.reference as equipement_ref 
                FROM {$this->table} a
                LEFT JOIN equipement e ON a.equipement_id = e.id
                WHERE a.statut = 'active'
                ORDER BY a.date_creation DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
    
    public function getByEquipementId($equipement_id) {
        $sql = "SELECT * FROM {$this->table} WHERE equipement_id = ? ORDER BY date_creation DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$equipement_id]);
        return $stmt->fetchAll();
    }
    
    public function createAlert($equipement_id, $type, $message) {
        $data = [
            'equipement_id' => $equipement_id,
            'type' => $type,
            'message' => $message,
            'statut' => 'active',
            'date_creation' => date('Y-m-d H:i:s')
        ];
        return $this->create($data);
    }
}
