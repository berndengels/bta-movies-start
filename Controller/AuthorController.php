<?php
require_once 'Controller.php';
require_once 'Models/Author.php';
class AuthorController extends Controller
{

    public function __construct() {
        parent::__construct();
        $this->model = new Author();
    }

    public function index() {
        $list = $this->model->all();
        if($this->auth) {
            require_once 'Views/author/admin/index.php';
        } else {
            require_once 'Views/author/index.php';
        }        
    }

    public function show($id) {        
        $item = $this->model->find($id);
        require_once 'Views/author/show.php';
    }

    // zeige formular zum editiern oder neu anlegen eines datensatzes an
    public function edit($id = null) {
        if($this->auth) {
            $data = null;                      
            if($id) {
                $data = $this->model->find($id);
            }
            require_once 'Views/Forms/author.php';
        } else {
            header('location: /authors');
        }
        
    }

    public function store($id = null) {
        if($this->auth) {
            $data = null;                      
            $params = null;
            if(isset($_POST['firstname']) && $_POST['firstname'] !== '' && isset($_POST['lastname']) && $_POST['lastname'] !== '' ) {
                $params = $_POST;
            }
            if($params) {
                if($id) {
                    // UPDATE
                    $this->model->update($id, $_POST);
                } else {                
                    // INSERT
                    $this->model->insert($_POST);
                }            
            }            
        }
        header('location: /authors');        
    }

    public function delete($id) {
        if($this->auth) {
            $this->model->delete($id);
        }
        header('location: /authors');
    }
}
