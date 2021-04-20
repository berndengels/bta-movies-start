<?php
require_once 'Controller.php';
require_once 'Models/Event.php';
require_once 'Models/Category.php';
class EventController extends Controller
{

    private $categoryModel;

    public function __construct() {        
        $this->model = new Event();
        $this->categoryModel = new Category();
        parent::__construct();
    }

    public function index() {
        $list = $this->model->all();
        if($this->auth) {
            require_once 'Views/event/admin/index.php';
        } else {
            require_once 'Views/event/index.php';
        }        
    }

    public function show($id) {        
        $item = $this->model->find($id);
        require_once 'Views/event/show.php';
    }

    // zeige formular zum editiern oder neu anlegen eines datensatzes an
    public function edit($id = null) {
        if($this->auth) {
            $data = null;                      
            if($id) {
                $data = $this->model->find($id);
            }
            $categories = $this->categoryModel->all();
            require_once 'Views/Forms/event.php';
        } else {
            header('location: /events');
        }
        
    }

    public function store($id = null) {
        if($this->auth) {
            $data = null;                      
            $params = null;
            if(isset($_POST['title']) && $_POST['title'] !== '' && 
            isset($_POST['category_id']) && $_POST['category_id'] !== '' &&             
            isset($_POST['event_date']) && $_POST['event_date'] !== '' && 
            isset($_POST['description'])) {
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
        header('location: /events');        
    }

    public function delete($id) {
        if($this->auth) {
            $this->model->delete($id);
        }
        header('location: /events');
    }
}
