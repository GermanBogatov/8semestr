<?php
use Libs\Files;
include_once 'sectionsController.php';
class productsController extends Controller {
    public function __construct($prefix) {
        parent::__construct($prefix);
        $this->view->setTitle('Товары');
        $products = $this->getTreeForArrayProduct($this->model->getList('products'));
        $this->view->products = $products;
    }
    public function index() {
        if( $products = $this->model->getList('products')){
            $this->view->arResult["ITEMS"] = $products;
        }else{
            $this->view->arResult["ITEMS"] = array();
        }
        parent::index();
    }
   public function getList() {
        if( $products = $this->model->getList('products')){
            
            return $this->getTreeForArrayProduct($products);
        }else{
            return array();
        }
    }
     public static function  getInstanse( $prefix ) {
        $instance = null;
        if (!empty(self::$instance) && self::$instance instanceof productsController ){
            $instance = self::$instance;
        }else{
            $instance = new productsController($prefix);
        }
        return $instance;
    } 

}
