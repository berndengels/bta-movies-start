<?php
require_once 'Model.php';
class Category extends Model {

    protected $table = 'category';

    public function find(int $id) {
        $data = parent::find($id);

        $sql = "SELECT * FROM category WHERE id = ?";
        $data['category'] = $this->getAll($sql, [$id]);

        return $data;
    }

    public function insert(array $params) {
        $sql = "INSERT INTO category (name) VALUES (:name)";
        return $this->prepareAndExecute($sql, $params);
    }

    public function update(array $params, int $id) {
        $sql = "UPDATE category SET name = :name WHERE id=:id";
        $params['id'] = $id;
        return $this->prepareAndExecute($sql, $params);
    }

}
