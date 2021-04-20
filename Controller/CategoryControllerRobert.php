<?php
require_once 'Controller.php';
require_once 'Models/Category.php';
<<<<<<< HEAD
class CategoryController extends Controller
{
=======

class CategoryController extends Controller {
>>>>>>> main

    public function __construct() {
        $this->model = new Category();
        parent::__construct();
    }

    public function index() {
        $list = $this->model->all();
        if($this->auth) {
            require_once 'Views/category/admin/index.php';
<<<<<<< HEAD
        } 
=======
        }
>>>>>>> main
        else {
            require_once 'Views/category/index.php';
        }
    }

<<<<<<< HEAD
    public function show($id) {        
=======
    public function show($id) {
>>>>>>> main
        $item = $this->model->find($id);
        require_once 'Views/category/show.php';
    }

    // zeige formular zum editiern oder neu anlegen eines datensatzes an
    public function edit($id = null) {

        if(!$this->auth) {
            header('location: /categories');
        }

<<<<<<< HEAD
        $data = null;

=======
>>>>>>> main
        if($id) {
            $data = $this->model->find($id);
        }

        require_once 'Views/Forms/category.php';
    }

    public function store($id = null) {
        if (!$this->auth) {
            header('location: /categories');
        }
        $params = null;
<<<<<<< HEAD
        
=======

>>>>>>> main
        if(isset($_POST['name']) && '' !== $_POST['name']) {
            $params = $_POST;
        }

        if($params) {
            if ($id) {
                $this->model->update($params, $id);
            } else {
                $this->model->insert($params);
            }
        }
        header('location: /categories');
    }

    public function delete($id) {
        if($this->auth) {
            $this->model->delete($id);
        }
        header('location: /categories');
    }
}
