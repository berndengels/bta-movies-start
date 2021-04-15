<?php 
header('Content-Type: application/json');
require_once "Models/Author.php";

class ApiController {

    public function __construct() {
        $this->model = new Author;
    }

    public function index() {
        
    }

    public function authors() {
        $data = $this->model->all();
        $JSON = json_encode($data);
        // Helper::dump($JSON);        
        echo $JSON;        
    }

    public function author(int $id) {
        $data = $this->model->find($id);
        $JSON = json_encode($data);
        // Helper::dump($JSON);
        echo $JSON;
    }

}

?>