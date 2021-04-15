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

    // public function insert($keys, $values) {
    //     $keysAsString = implode(",", $keys);
    //     $valuesAsString = implode(",", $values);
    //     $sql = "INSERT INTO $this->table ($keysAsString) VALUES ($valuesAsString)";        
    //     return $this->prepareAndExecute($sql);
    // }

    // public function update($id, $keys, $values) {


    //     $updateValues = "";

    //     foreach($keys as $index=>$key) {
    //         if($updateValues != "") {
    //             $updateValues .= ",";
    //         }
    //         $updateValues .= $keys[$index] . "=" . $values[$index];            
    //     }

    //     $sql = "UPDATE $this->table SET $updateValues WHERE id = ?";
    //     return $this->prepareAndExecute($sql, [$id]);
    // }

    public function delete(int $id) {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        return $this->prepareAndExecute($sql, [ $id ]);
    }
}
?>
