<?php
require_once 'Model.php';

class Movie extends Model {

    protected $table = 'movies';

    public function all() {
        $sql = "SELECT * FROM $this->table";
        return $this->getAll($sql);
    }

    public function find(int $id) {
        // numeric parameters
        $sql = "SELECT * FROM $this->table WHERE id=?";
        return $this->getOne($sql, [$id]);

        // assoc parameters
        $sql = "SELECT * FROM $this->table WHERE id=:id";
        return $this->getOne($sql, ['id' => $id]);
    }

/*
    public function insert(array $params) {
        $sql = "INSERT INTO authors (firstname, lastname) VALUES (:firstname, :lastname)";
        return $this->prepareAndExecute($sql, $params);
    }
    
    public function update(array $params, int $id) {
        $sql = "UPDATE authors SET firstname = :firstname, lastname = :lastname WHERE id=:id";
        $params['id'] = $id;
        return $this->prepareAndExecute($sql, $params);
    }
*/    
}
