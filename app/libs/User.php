<?php
namespace Libs;
class User{
    
    static function login( $data ){
        $_SESSION["LOGIN"] = true;
         $_SESSION["USER_ID"] = $data['id'];
          $_SESSION["USER_NAME"] = $data['name'];
          $_SESSION["USER_SNAME"] = $data['sname'];
          $_SESSION["USER_EMAIL"] = $data['email'];
          $_SESSION["USER_PHONE"] = $data['phone'];
           $_SESSION["USER_PASSWORD"] = $data['password'];
           $_SESSION["USER_ROLE"] = $data['role'];
           $_SESSION["USER_LOGIN"] = $data['login'];
    }
    
    static function isLogin(){
        if(isset($_SESSION["LOGIN"]) && $_SESSION["LOGIN"]){
            return true;
        }else{
            return false;
        }
    }
    
    static function isAdmin(){
        if(isset($_SESSION["USER_ROLE"]) && $_SESSION["USER_ROLE"] == ADMIN_ROLE){
            return true;
        }else{
            return false;
        }
    }
    
    static function getID() {
       if(isset($_SESSION["USER_ID"]) ){
            return $_SESSION["USER_ID"];
        }else{
            return false;
        } 
    }
    
    static function getLogin() {
       if(isset($_SESSION["USER_LOGIN"]) ){
            return $_SESSION["USER_LOGIN"];
        }else{
            return false;
        } 
    }
    
    static function logout(){
     session_destroy();
    }
}
