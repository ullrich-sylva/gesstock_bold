<?php

class EntreeStockModel extends Model {
    protected $table = 'entreestock';
    protected $primaryKey = 'id_entree';
    
    public function getWithDetails() {
        $sql = "SELECT es.*, bl.numero_bon as reference, f.nom as fournisseur_nom
                FROM {$this->table} es
                JOIN bonlivraison bl ON es.id_bon = bl.id_bon
                JOIN fournisseur f ON bl.id_fournisseur = f.id_fournisseur
                ORDER BY es.date_entree DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
    
    public function getById($id) {
        $sql = "SELECT es.*, bl.numero_bon as reference, f.nom as fournisseur_nom
                FROM {$this->table} es
                JOIN bonlivraison bl ON es.id_bon = bl.id_bon
                JOIN fournisseur f ON bl.id_fournisseur = f.id_fournisseur
                WHERE es.id_entree = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
