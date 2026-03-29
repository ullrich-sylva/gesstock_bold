<?php

class RapportModel extends Model {
    protected $table = 'entreestock';
    
    public function getMovementsByDateRange($start_date, $end_date) {
        $sql = "SELECT es.*, f.nom as fournisseur_nom, 'entree' as type
                FROM entreestock es
                LEFT JOIN fournisseur f ON es.fournisseur_id = f.id
                WHERE es.date_entree BETWEEN ? AND ?
                UNION
                SELECT ss.*, u.nom as utilisateur_nom, 'sortie' as type
                FROM sortiestock ss
                LEFT JOIN utilisateur u ON ss.utilisateur_id = u.id
                WHERE ss.date_sortie BETWEEN ? AND ?
                ORDER BY date LIMIT 10000";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$start_date, $end_date, $start_date, $end_date]);
        return $stmt->fetchAll();
    }
    
    public function getAlertHistory($limit = 100) {
        $sql = "SELECT a.*, e.nom as equipement_nom 
                FROM alerte a
                LEFT JOIN equipement e ON a.equipement_id = e.id
                ORDER BY a.date_creation DESC
                LIMIT ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$limit]);
        return $stmt->fetchAll();
    }
    
    public function getStockSummary() {
        $sql = "SELECT c.nom as categorie, COUNT(e.id) as nombre_equipements, SUM(e.quantite_stock) as quantite_total
                FROM equipement e
                LEFT JOIN categorie c ON e.categorie_id = c.id
                GROUP BY c.id";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
}
