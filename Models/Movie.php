<?php
require_once 'Model.php';
class Movie extends Model {

    protected $table = 'movies';

    
    // public function insert(array $params) {
    //     $sql = "INSERT INTO (firstname, lastname)VALUES (:firstname, :lasname)";
    //     return  $this->prepareAndExecute($sql,$params);
    // }
    // public function update(array $params, int $id) {
    //     $sql = "UPDATE authors SET firstname = :firstname,  lastname = :lasname WHERE id=:id";
    //     $params ['id'] = $id;
    //     return  $this->prepareAndExecute($sql,$params);
    // }
}