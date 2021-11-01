<?php
class productsModel extends Model{  
    public function __construct() {
        parent::_construct();    
    }
     public function add( $data ) {
        $sth = $this->db->prepare(
                "INSERT INTO products (name, code, sections_id, price, amount, p_img, d_img, imgs, description, active) " . " VALUE ( :name, :code, :sections_id, :price, :amount, :p_img, :d_img, :imgs, :description, :active);"
                );
        $sth->execute($data);
    //  var_dump($sth->errorInfo());
        if ($sth->rowCount() > 0 ){
            return $this->db->lastInsertId();
        }else{
            return false;
        }
    }
}

