<?php
require_once 'Model.php';

class Movie extends Model {
    
    protected $table = 'movies';

    // public function insert(array $params) {
    //     // $sql = "INSERT INTO $this->table (firstname, lastname) VALUES ('$params[firstname]', '$params[lastname]')";
    //     $sql = "INSERT INTO $this->table (title, price, author_id, image) VALUES (:title, :price, :author_id, :image)";
    //     $this->prepareAndExecute($sql, $params);
    // }

    // public function update(int $id, array $params) {       
    //     $params['id'] = $id;
    //     $sql = "UPDATE $this->table SET title = :title, price = :price, author_id= :author_id, image = :image WHERE id = :id";
    //     $this->prepareAndExecute($sql, $params);
    // }
}

