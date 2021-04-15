<?php
require_once 'Model.php';
class Movie extends Model {
    
    protected $table = 'movies';

    public function insert(array $params) {
        // $sql = "INSERT INTO $this->table (firstname, lastname) VALUES ('$params[firstname]', '$params[lastname]')";
        $sql = "INSERT INTO $this->table (firstname, lastname) VALUES (:firstname, :lastname)";
        $this->prepareAndExecute($sql, $params);
    }

    public function update(int $id, array $params) {
        $params['id'] = $id;
        $sql = "UPDATE $this->table SET firstname = :firstname, lastname = :lastname WHERE id = :id";
        $this->prepareAndExecute($sql, $params);
    }
}