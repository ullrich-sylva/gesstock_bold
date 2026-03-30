<?php

class UtilisateurModel extends Model {
    protected $table = 'utilisateur';
    protected $primaryKey = 'id_utilisateur';
    
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
    
    
    public function getActive() {
        $sql = "SELECT * FROM {$this->table} WHERE actif = 1";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
    
    public function updateResetToken($email, $token, $expires) {
        $sql = "UPDATE {$this->table} SET reset_token = ?, reset_expires = ? WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$token, $expires, $email]);
    }
    
    public function findByResetToken($token) {
        $sql = "SELECT * FROM {$this->table} WHERE reset_token = ? AND reset_expires > NOW()";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$token]);
        return $stmt->fetch();
    }
    
    public function updatePassword($id, $hashedPassword) {
        $sql = "UPDATE {$this->table} SET mot_de_passe = ?, reset_token = NULL, reset_expires = NULL WHERE id_utilisateur = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$hashedPassword, $id]);
    }
}
