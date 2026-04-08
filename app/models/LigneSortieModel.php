<?php

require_once __DIR__ . '/Model.php';

/**
 * Modèle LigneSortie
 * 
 * Gère les lignes de détail d'une sortie de stock. Chaque ligne associe 
 * un équipement spécifique à une quantité déduite pour une sortie donnée.
 */
class LigneSortieModel extends Model {
    /** @var string Nom de la table */
    protected $table = 'lignesortie';
    
    /**
     * Récupère toutes les lignes associées à une sortie de stock spécifique.
     * Inclut le nom et la référence de l'équipement via une jointure.
     * 
     * @param int $sortie_id Identifiant de l'en-tête de sortie de stock
     * @return array Liste des équipements sortis
     */
    public function getBySortieId($sortie_id) {
        $sql = "SELECT ls.*, e.nom as equipement_nom, e.reference as equipement_ref
                FROM {$this->table} ls
LEFT JOIN equipement e ON ls.id_equipement = e.id
                WHERE ls.id_sortie = ?"
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$sortie_id]);
        return $stmt->fetchAll();
    }
}
