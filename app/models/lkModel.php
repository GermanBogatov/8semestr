<?php
class lkModel extends Model{  
    public function __construct() {
        parent::_construct();     
    }
    public function updatedata( $data ){
        //var_dump($data);
        $sth = $this->db->prepare(
                "UPDATE users SET login = :login, name = :name, sname = :sname, email = :email, phone = :phone, role = :role, password = :password " . " WHERE id = :id;"
                );
        //var_dump($sth->errorInfo());
        $sth->execute($data);
        if($sth->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
     public function updatepassword( $data ){
        //var_dump($data);
        $sth = $this->db->prepare(
                "UPDATE users SET login = :login, name = :name, sname = :sname, email = :email, phone = :phone, role = :role, password = :password " . " WHERE id = :id;"
                );
        //var_dump($sth->errorInfo());
        $sth->execute($data);
        if($sth->rowCount() > 0){
            return true;
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