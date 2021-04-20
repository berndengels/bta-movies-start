<?php
require_once 'Controller.php';
require_once 'Models/Movie.php';
require_once 'Models/Author.php';

class MovieController extends Controller {

    private $authorModel;

    public function __construct() {        
        $this->model = new Movie();
        $this->authorModel = new Author();
        parent::__construct();
    }

    public function index() {
        $list = $this->model->all();
        if($this->auth) {
            require_once 'Views/movie/admin/index.php';
        } else {
            require_once 'Views/movie/index.php';
        }        
    }

    public function show($id) {                
        $item = $this->model->find($id);
        $item['author'] = $this->authorModel->find($item['author_id']);        
        require_once 'Views/movie/show.php';
    }

    // zeige formular zum editiern oder neu anlegen eines datensatzes an
    public function edit($id = null) {
        if($this->auth) {
            $data = null;                      
            $authors = null;
            
            if($id) {
                $data = $this->model->find($id);
            }
            $authors = $this->authorModel->all();
            require_once 'Views/Forms/movie.php';
        } else {
            header('location: /movies');
        }
        
    }

    public function store($id = null) {
        if($this->auth) {
            $data = null;                      
            $params = null;
            $continueAfterImage = true;
            


            if(isset($_POST['title']) && $_POST['title'] !== '' && isset($_POST['price']) && $_POST['price'] !== '' ) {
                $params = $_POST;
                $params['image'] = null;
            }
        
            if($_FILES['image']['error'] == 0) {
                $image = $_FILES['image']['name'];
                $destination = __DIR__.'/../uploads/'.$image;
                $params['image'] = $image;                                
                $continueAfterImage = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
            } 

            if($params) {                
                if($continueAfterImage) {
                    if($id) {
                        // UPDATE
                        $this->model->update($id, $params);
                    } else {                
                        // INSERT
                        $this->model->insert($params);
                    }
                }                            
            }            
        }
        header('location: /movies');        
    }

    public function delete($id) {
        if($this->auth) {
            $this->model->delete($id);
        }
        header('location: /movies');

    }
}