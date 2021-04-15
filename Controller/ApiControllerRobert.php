<?php
header('content-type: application/json');
require_once 'Models/Author.php';

class ApiController extends AuthorController {

    public function authors() {
        $data = $this->model->all();
        $JSON = json_encode($data);
        echo $JSON;
    }

    public function author($id) {
        $data = $this->model->find($id);
        $JSON = json_encode($data);
        echo $JSON;
    }
}