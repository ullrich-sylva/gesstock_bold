<?php

class DemandeMaterielModel extends Model {
    protected $table = 'demandemateriel';
    protected $primaryKey = 'id_demande';
    
    public function getWithDetails() {
        $sql = "SELECT dm.*, u.nom as technicien_nom, u.prenom as technicien_prenom 
                FROM {$this->table} dm
                LEFT JOIN utilisateur u ON dm.id_technicien = u.id_utilisateur
                ORDER BY dm.date_demande DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $sql = "SELECT dm.*, u.nom as technicien_nom, u.prenom as technicien_prenom 
                FROM {$this->table} dm
                LEFT JOIN utilisateur u ON dm.id_technicien = u.id_utilisateur
                WHERE dm.id_demande = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    public function getByStatus($status) {
        $sql = "SELECT * FROM {$this->table} WHERE statut = ? ORDER BY date_demande DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$status]);
        return $stmt->fetchAll();
    }
    
}
