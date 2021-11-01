<?php
class sectionsController extends Controller {
    private static $instance;
    public function __construct( $prefix ) {
        parent::__construct( $prefix );
        $this ->view->setTitle('Категории');    
    }
    public function index() { 
        parent::index(); 
    }
    public function getList() {
        if( $sections = $this->model->getList('sections', "id asc", "*", " `depth_level` = 0 ")){ 
            return $this->getTreeForArray($sections);
        }else{
            return array();
        }
    }
   public static function  getInstanse( $prefix ) {
        $instance = null;
        if (!empty(self::$instance) && self::$instance instanceof sectionsController ){
            $instance = self::$instance;
        }else{
            $instance = new sectionsController($prefix);
        }
        return $instance;
    } 
}

