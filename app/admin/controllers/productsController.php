<?php
use Libs\Files;
include_once 'sectionsController.php';
class productsController extends Controller {
    public function __construct($prefix) {
        parent::__construct($prefix);
        $this->view->setTitle('Товары');
        $sections = $this->getTreeForArray($this->model->getList('sections'));
        $this->view->sections = $sections;
    }
    public function index() {
        if( $products = $this->model->getList('products')){  
            $this->view->arResult["ITEMS"] = $products;
        }else{
            $this->view->arResult["ITEMS"] = array();
        }
        parent::index();
    }
 public function del() {
        $data = array(
            "id" => htmlspecialchars((int) $_POST["id"])
        );
        if ($data["id"] > 0 ){
           if ($this->model->delete( "products", "id", $data["id"] )){
                echo json_encode(array("error" => "true" ));
            }else{
                echo json_encode(array("error" => "false"));
            } 
        }
    }
    public function add() {
        $data = array();
        $error = array();
        if (count($_POST) > 0) {
            foreach ($_POST as $key => $rd) {
                $data[htmlspecialchars($key)] = htmlspecialchars($rd);
            }
        }
        if (strlen($data['product_name']) < 2) {
            $error["name"] = "short";
        }
        if (strlen($data['product_code']) < 2) {
            $error["code"] = "short";
        }
        if (isset($_FILES["product_p_img"])) {
            $data["p_img"] = Files::uploadFile($_FILES["product_p_img"], get_class($this));
        }
        if (isset($_FILES["product_d_img"])) {
            $data["d_img"] = Files::uploadFile($_FILES["product_d_img"], get_class($this));
        }
        if (isset($_FILES["product_imgs"])) {
            $arr_files = array();
            foreach ($_FILES["product_imgs"] as $key => $values) {
                foreach ($values as $k => $v) {
                    $arr_files[$k][$key] = $v;
                }
            }
            foreach ($arr_files as $file) {
                $data["imgs"][] = Files::uploadFile($file, get_class($this));
            }
        }
        if (count($error) == 0) {
            $addData = array(
                "name" => $data["product_name"],
                "code" => $data["product_code"],
                "sections_id" => $data["parent_section"],
                "price" => (int) $data["product_price"],
                "amount" => is_null($data["product_amount"]) ? "0" : "1",
                "p_img" => $data["p_img"],
                "d_img" => $data["d_img"],
                "imgs" => json_encode($data["imgs"]),
                "description" => $data["product_description"],
                "active" => is_null($data["product_active"]) ? "0" : "1",
            );
            if ($id = $this->model->add( $addData )){
                
                echo json_encode(array("error" => false));
            }else{
                echo json_encode(array("error" => true));
            }
        } else {
            echo json_encode(array("errors" => $error));
        }
    }
    
    

}
