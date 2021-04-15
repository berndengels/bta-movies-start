<?php
require_once 'Model.php';

class Movie extends Model {

    protected $table = 'movies';



    public function insert(array $params) {
        $sql = "INSERT INTO movies (author_id, title, price) VALUES (author_id, :title, :price)";
        return $this->prepareAndExecute($sql, $params);
    }
    
    public function update(array $params, int $id) {
        $sql = "UPDATE movies SET author_id = :author_id, title = :title, price = :price WHERE id=:id";
        $params['id'] = $id;
        return $this->prepareAndExecute($sql, $params);
    }
   
}
