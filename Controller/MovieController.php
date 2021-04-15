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
//        Helper::dump($list);
        if ($this->auth) {
            require_once 'Views/movie/admin/index.php';
        } else {
            require_once 'Views/movie/index.php';
        }
    }

    public function show(int $id) {
    
        $item = $this->model->find($id);
        $item['author'] = $this->authorModel->find($item['author_id']);
        require_once 'Views/movie/show.php';
    }
    public function delete($id) {
        if($this->auth) {
            $this->model->delete($id);
        }
        header('location: /movies');
    }
    

}
$authors = $this->authorModel->all();