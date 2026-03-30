<?php

// Inclure la config database
require_once CONFIG_PATH . '/database.php';

// Classe de base pour tous les modèles
class Model {
    protected $table;
    protected $primaryKey = 'id';
    protected $pdo;
    
    public function __construct() {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }
    
    // Obtenir tous les enregistrements
    public function getAll() {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
    
    // Obtenir un enregistrement par ID
    public function getById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    // Créer un enregistrement
    public function create($data) {
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));
        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(array_values($data));
    }
    
    // Mettre à jour un enregistrement
    public function update($id, $data) {
        $set = implode(', ', array_map(fn($key) => "{$key} = ?", array_keys($data)));
        $sql = "UPDATE {$this->table} SET {$set} WHERE {$this->primaryKey} = ?";
        $values = array_values($data);
        $values[] = $id;
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($values);
    }
    
    // Supprimer un enregistrement
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
    
    // Obtenir le nombre total d'enregistrements
    public function count() {
        $sql = "SELECT COUNT(*) as total FROM {$this->table}";
        $stmt = $this->pdo->query($sql);
        $result = $stmt->fetch();
        return $result['total'] ?? 0;
    }
    
    // Rechercher
    public function search($column, $value) {
        $sql = "SELECT * FROM {$this->table} WHERE {$column} LIKE ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(["%{$value}%"]);
        return $stmt->fetchAll();
    }
    
    // Exécuter une requête personnalisée
    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}
