<?php

class RapportModel extends Model {
    protected $table = 'entreestock';
    
    public function getMovementsByDateRange($start_date, $end_date) {
        $sql = "SELECT 'entree' as type, date_entree as date FROM entreestock WHERE date_entree BETWEEN ? AND ? 
                UNION 
                SELECT 'sortie' as type, date_sortie as date FROM sortiestock WHERE date_sortie BETWEEN ? AND ? 
                ORDER BY date DESC LIMIT 1000";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$start_date, $end_date, $start_date, $end_date]);
        return $stmt->fetchAll();
    }
    
    public function getAlertHistory($limit = 100) {
        $sql = "SELECT * FROM alerte ORDER BY date_alerte DESC LIMIT :limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function getStockSummary() {
        $sql = "SELECT COUNT(*) as nombre_equipements, SUM(stock_actuel) as quantite_total FROM equipement";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetch();
    }
}
