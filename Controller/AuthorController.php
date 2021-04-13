<?php
require_once 'Controller.php';
require_once 'Models/Author.php';
class AuthorController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new Author();
    }

    public function index() {
        // die(__METHOD__);
        $list = $this->model->all();
        require_once 'Views/author/index.php';
    }

    public function show($id) {
        $item = $this->model->find($id);
        require_once 'Views/author/show.php';
    }
    
    // zeige formular zum editiern oder neu anlegen eines datensatzes an 
    public function edit($id = null) {
        die(__METHOD__);
    }

    public function store($id = null) {
        die(__METHOD__);
    }

    public function delete($id) {
        die(__METHOD__);
    }
}
