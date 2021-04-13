<?php
require_once 'inc/MyDB.php';
class Model extends MyDB {

    protected $table;

    public function all() {
        $sql = "SELECT * FROM $this->table";
        // die($sql);
        return $this->getAll($sql);
    }
        
    public function find(int $id) {
        //parameter per numeric array
        $sql = "SELECT * FROM $this->table WHERE id=? AND firstname";
        return $this->getOne($sql, [$id]);

        //parameter per assoc array
        // $sql = "SELECT * FROM $this->table WHERE id=:is";
        // return $$this->getOne($sql, ['id'=>$id]);
    }
}
?>
