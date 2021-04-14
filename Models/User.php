<?php
require_once 'Model.php';
class User extends Model {

    protected $table = 'users';

    public function get(string $username, string $password) {
        
        $sql = "SELECT * FROM $this->table WHERE username = ? AND password = ?";
        $data = $this->getOne($sql, [$username, $password]);
        return $data;
    }
} 