<?php

class EquipementModel extends Model {
    protected $table = 'equipement';
    protected $primaryKey = 'id_equipement';
    
    public function getByCategoryId($category_id) {
        $sql = "SELECT * FROM {$this->table} WHERE id_categorie = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$category_id]);
        return $stmt->fetchAll();
    }
    
    public function getWithCategory() {
        $sql = "SELECT e.*, c.libelle as categorie_nom 
                FROM {$this->table} e
                LEFT JOIN categorie c ON e.id_categorie = c.id_categorie";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
    
    public function getLowStock() {
        $sql = "SELECT * FROM {$this->table} WHERE stock_actuel <= seuil_min";
        try {
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Dashboard low stock query error: " . $e->getMessage());
            return [];
        }
    }
    
    
    public function count() {
        $sql = "SELECT COUNT(*) as total FROM {$this->table}";
        $result = $this->pdo->query($sql)->fetch();
        return $result['total'] ?? 0;
    }

    public function updateStock($id, $change) {
        // 1. Mettre à jour le stock
        $sql = "UPDATE {$this->table} SET stock_actuel = stock_actuel + ? WHERE id_equipement = ?";
        $stmt = $this->pdo->prepare($sql);
        if (!$stmt->execute([$change, $id])) {
            return false;
        }

        // 2. Vérifier les seuils pour les alertes
        $equipement = $this->getById($id);
        if ($equipement) {
            require_once APP_PATH . '/models/AlerteModel.php';
            $alerteModel = new AlerteModel();
            
            $stock = $equipement['stock_actuel'];
            $min = $equipement['seuil_min'];
            $max = $equipement['seuil_max'];
            $nom = $equipement['designation'];

            if ($stock <= $min) {
                $alerteModel->createAlert($id, 'stock_min', "Niveau critique pour {$nom} ({$stock} restant, seuil à {$min})");
            } elseif ($stock >= $max && $max > 0) {
                $alerteModel->createAlert($id, 'stock_max', "Surstockage pour {$nom} ({$stock} en stock, seuil à {$max})");
            }
        }
        
        return true;
    }
}
