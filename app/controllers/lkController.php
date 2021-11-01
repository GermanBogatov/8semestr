<?php
use Libs\User as User;
class lkController extends Controller {
    public function __construct( $prefix ) {
        parent::__construct( $prefix );
        $this ->view->setTitle('Личный кабинет'); 
    }
    public function updatedata() {
        $name = htmlspecialchars($_POST['name']);
        $login = htmlspecialchars($_POST['login']);
        $email = htmlspecialchars($_POST['email']);
        $sname = htmlspecialchars($_POST['sname']);
        $phone = htmlspecialchars($_POST['phone']);
        //Сделать свои поверки на регистрацию!!!
    if ( !empty($name) || !empty($sname) || !empty($login) || !empty($email) || !empty($phone)  ){
        $data = array(
            "id" => $_SESSION["USER_ID"],
            "login" => $login, 
            "role" => $_SESSION["USER_ROLE"], 
            "password" => $_SESSION["USER_PASSWORD"], 
            "name" => $name, 
            "email" => $email, 
            "sname" => $sname, 
            "phone" => $phone
        );
        //var_dump($data);
        if ($id = $this->model->updatedata($data)){
           $data['id'] = $id;
            User::login($data);
             echo json_encode(array("error" =>""));
        }else{
           echo json_encode(array("error" =>"Вы не изменили данные!"));  
        }
    }else{
        echo json_encode(array("error" =>"Заполните все поля!"));
    }
         
    }
    
    
    
    public function updatepassword() {
        $password = htmlspecialchars($_POST['password']);
        $password_confirm = htmlspecialchars($_POST['password_confirm']);
        //Сделать свои поверки на регистрацию!!!
    if ( !empty($password) || !empty($password_confirm)  ){
        if($password == $password_confirm){
        $data = array(
            "id" => $_SESSION["USER_ID"],
            "login" => $_SESSION["USER_LOGIN"], 
            "role" => $_SESSION["USER_ROLE"], 
            "password" => md5($password), 
            "name" => $_SESSION["USER_NAME"], 
            "email" => $_SESSION["USER_EMAIL"], 
            "sname" => $_SESSION["USER_SNAME"], 
            "phone" => $_SESSION["USER_PHONE"]
        );
       // var_dump($data);
        if ($id = $this->model->updatepassword($data)){
           $data['id'] = $id;
            User::login($data);
             echo json_encode(array("error" =>""));
        }else{
           echo json_encode(array("error" =>"вы ввели старый пароль, придумайте новый!"));  
        }
    }else{
       echo json_encode(array("error" =>"Пароли не совпадают!")); 
    }
        }else{
        echo json_encode(array("error" =>"Заполните все поля!"));
    }
    }
}
