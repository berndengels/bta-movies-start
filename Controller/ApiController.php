<?php
header('Content-Type: application/json');
require_once 'Controller/AuthorController.php';
class ApiController extends AuthorController {

    public function authors() {
        $data = $this->model->all();
        echo json_encode($data);
    }

    public function author(int $id) {
        $data = $this->model->find($id);
        echo json_encode($data);
    }
}