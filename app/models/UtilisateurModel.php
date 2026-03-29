<?php

class UtilisateurModel extends Model {
    protected $table = 'utilisateur';
    
    public function findByEmail($email) {
        $sql = "SELECT * FROM {$this->table} WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
    
    public function findByLogin($login) {
        $sql = "SELECT * FROM {$this->table} WHERE login = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$login]);
        return $stmt->fetch();
    }
    
    public function getById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id_utilisateur = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    public function getActive() {
        $sql = "SELECT * FROM {$this->table} WHERE actif = 1";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
}
