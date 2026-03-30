<?php

class BonLivraisonModel extends Model {
    protected $table = 'bonlivraison';
    protected $primaryKey = 'id_bon';
    
    public function getWithDetails() {
        $sql = "SELECT * FROM {$this->table} ORDER BY date_livraison DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
    
    public function getByNumero($numero) {
        $sql = "SELECT * FROM {$this->table} WHERE numero_bon = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$numero]);
        return $stmt->fetch();
    }
    
    public function getByDemandeId($demande_id) {
        $sql = "SELECT * FROM {$this->table} WHERE id_demandemateriel = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$demande_id]);
        return $stmt->fetchAll();
    }
    
}
