<?php
require_once 'Model.php';

class Category extends Model {

    protected $table = 'category';

    public function find(int $id) {
        $data = parent::find($id);

        // get categories
        $sql = "SELECT * FROM category WHERE id = ?";
        $data['category'] = $this->getAll($sql, [$id]);

        return $data;
    }
}
