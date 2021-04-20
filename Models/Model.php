<?php
require_once 'inc/MyDB.php';

class Model extends MyDB {

    protected $table;

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

    public function insert(array $params) {
        $keys = [];
        $values = [];
        foreach($params as $key=>$value) {
            $keys[] = $key;
            $values[] = ":$key";            
            
        }
        $keysAsString = implode(",", $keys);
        $valuesAsString = implode(",", $values);
        $sql = "INSERT INTO $this->table ($keysAsString) VALUES ($valuesAsString)";        
        return $this->prepareAndExecute($sql, $params);
    }

    public function update(int $id, array $params) {        
        $updateArgument = "";
        $first = true;
        foreach($params as $key=>$value) {
            if($first) {
                $first = false;
            } else {
                $updateArgument .= ", ";
            }
            $updateArgument .= "$key = :$key";               
        }

        $sql = "UPDATE $this->table SET $updateArgument WHERE id = :id";
        $params['id'] = $id;
        return $this->prepareAndExecute($sql, $params);
    }

    public function delete(int $id) {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        return $this->prepareAndExecute($sql, [ $id ]);
    }
}
?>
