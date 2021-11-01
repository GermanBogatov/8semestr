<?php
class regModel extends Model{  
    public function __construct() {
        parent::_construct();   
    }
    public function registration($data){
        $sth = $this->db->prepare("INSERT users(login, role, password, name, email, sname, phone) " . "VALUES(:login, :role, :password, :name, :email, :sname, :phone) ");
        $sth->execute($data);
        if($sth->rowCount() > 0){
            return $this->db->lastInsertId();
        }else{
            return false;
        }
    }
    public function loginExists( $login ){
        $sth = $this->db->prepare("SELECT id FROM users WHERE login = :login");
        $sth->execute(array(":login" => $login));  
        if($sth->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }
     public function emailExist( $email ){
       $sth = $this->db->prepare("SELECT id FROM users WHERE email = :email");
        $sth->execute(array(":email" => $email));
        
        if($sth->rowCount()>0){
            return true;
        }else{
            return false;
        } 
    }
    public function authorization($data) {
        $sth = $this->db->prepare("SELECT id, name, role, login, sname, phone, email, password FROM users WHERE login = :login AND password = :password");
        $sth ->execute(array(":login"=> $data["LOGIN"],":password"=>md5($data["PASSWORD"])));
        if($res = $sth->fetch(PDO::FETCH_ASSOC)){
            return $res;
        }else{
            return false;
        }
    }
}