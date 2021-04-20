<?php
require_once 'Model.php';
class Event extends Model {

    protected $table = 'event';

    public function find(int $id) {
        $data = parent::find($id);

        if($data) {
            // get category
            $sql = "SELECT id, name FROM category WHERE id = ?";            
            $data['category'] = $this->getOne($sql, [$data['category_id']]);
        }
        

        return $data;
    }

    // public function insert($params) {
    //     // $sql = "INSERT INTO $this->table (firstname, lastname) VALUES ('$params[firstname]', '$params[lastname]')";
    //     $sql = "INSERT INTO $this->table (title, category_id, event_date, description) VALUES (:title, :category_id, :event_date, :description)";
    //     $this->prepareAndExecute($sql, $params);
    // }

    // public function update(int $id, array $params) {
    //     $params['id'] = $id;
    //     $sql = "UPDATE $this->table SET title = :title, category_id = :category_id, event_date = :event_date, description = :description WHERE id = :id";
    //     $this->prepareAndExecute($sql, $params);
    // }
}
