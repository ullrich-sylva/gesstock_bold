<?php

class AlerteModel extends Model {
    protected $table = 'alerte';
    protected $primaryKey = 'id_alerte';
    
    public function getActive() {
        $sql = "SELECT * FROM {$this->table} WHERE est_lue = 0 ORDER BY date_alerte DESC";
        try {
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Alerte getActive error: " . $e->getMessage());
            return [];
        }
    }
    
    public function getByEquipementId($equipement_id) {
        $sql = "SELECT * FROM {$this->table} WHERE id_equipement = ? ORDER BY date_alerte DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$equipement_id]);
        return $stmt->fetchAll();
    }
    
    public function createAlert($equipement_id, $type, $message) {
        $data = [
            'id_equipement' => $equipement_id,
            'type_alerte' => $type,
            'message' => $message,
            'est_lue' => 0,
            'date_alerte' => date('Y-m-d H:i:s')
        ];
        return $this->create($data);
    }
    
}
