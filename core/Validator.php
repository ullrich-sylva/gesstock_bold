<?php

class Validator {
    private $errors = [];
    private $data = [];
    
    public function __construct($data = []) {
        $this->data = $data;
    }
    
    public function validate($rules) {
        foreach ($rules as $field => $rulesList) {
            $rules_array = explode('|', $rulesList);
            
            foreach ($rules_array as $rule) {
                $this->validateField($field, $rule);
            }
        }
        
        return empty($this->errors);
    }
    
    private function validateField($field, $rule) {
        [$rule_name, $rule_param] = explode(':', $rule . ':');
        $value = $this->data[$field] ?? '';
        
        switch($rule_name) {
            case 'required':
                if (empty($value)) {
                    $this->addError($field, "Le champ {$field} est requis");
                }
                break;
                
            case 'email':
                if (!empty($value) && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($field, "L'email est invalide");
                }
                break;
                
            case 'min':
                if (!empty($value) && strlen($value) < $rule_param) {
                    $this->addError($field, "Le champ {$field} doit contenir au moins {$rule_param} caractères");
                }
                break;
                
            case 'max':
                if (!empty($value) && strlen($value) > $rule_param) {
                    $this->addError($field, "Le champ {$field} ne doit pas dépasser {$rule_param} caractères");
                }
                break;
                
            case 'numeric':
                if (!empty($value) && !is_numeric($value)) {
                    $this->addError($field, "Le champ {$field} doit être numérique");
                }
                break;
                
            case 'unique':
                // À implémenter selon le modèle
                break;
                
            case 'confirmed':
                $confirmation_field = $field . '_confirmation';
                if ($value !== ($this->data[$confirmation_field] ?? '')) {
                    $this->addError($field, "Les valeurs ne correspondent pas");
                }
                break;
                
            case 'date':
                if (!empty($value) && !strtotime($value)) {
                    $this->addError($field, "La date est invalide");
                }
                break;
        }
    }
    
    private function addError($field, $message) {
        if (!isset($this->errors[$field])) {
            $this->errors[$field] = [];
        }
        $this->errors[$field][] = $message;
    }
    
    public function errors() {
        return $this->errors;
    }
    
    public function hasErrors() {
        return !empty($this->errors);
    }
    
    public function getError($field) {
        return $this->errors[$field] ?? [];
    }
}
