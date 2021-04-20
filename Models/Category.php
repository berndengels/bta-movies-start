<?php
require_once 'Model.php';
class Category extends Model {

    protected $table = 'category';

    public function find(int $id) {
        $data = parent::find($id);

        // get events
        if($data) { 
            $sql = "SELECT id, title FROM event WHERE category_id = ?";
            $data['events'] = $this->getAll($sql, [$id]);
        }
        return $data;
    }

    // public function insert(array $params) {
    //     // $sql = "INSERT INTO $this->table (firstname, lastname) VALUES ('$params[firstname]', '$params[lastname]')";
    //     $sql = "INSERT INTO $this->table (name) VALUES (:name)";
    //     $this->prepareAndExecute($sql, $params);
    // }

    // public function update(int $id, array $params) {
    //     $params['id'] = $id;
    //     $sql = "UPDATE $this->table SET name = :name WHERE id = :id";
    //     $this->prepareAndExecute($sql, $params);
    // }
}
