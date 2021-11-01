<?php
use Libs\User as User;
class regController extends Controller {
    public function __construct( $prefix ) {
        parent::__construct( $prefix );
        $this->view->setTitle("Регистрация/Авторизация");
    }
    public function registration() {
        $name = htmlspecialchars($_POST['name']);
        $login = htmlspecialchars($_POST['login']);
        $email = htmlspecialchars($_POST['email']);
        $sname = htmlspecialchars($_POST['sname']);
        $phone = htmlspecialchars($_POST['phone']);
        $password = htmlspecialchars($_POST['password']);
        $password_confirm = htmlspecialchars($_POST['password_confirm']);
        //Сделать свои поверки на регистрацию!!!
    if ( $password == $password_confirm){
        if( $this->model->loginExists($login)){
            echo json_encode(array("error" =>"Логин уже существует!"));
        die;
        }
        if( $this->model->emailExist($email)){
            echo json_encode(array("error" =>"email уже существует!"));
        die;
        }
        $data = array(
            "login" => $login, 
            "role" => 2, 
            "password" => md5($password), 
            "name" => $name, 
            "email" => $email, 
            "sname" => $sname, 
            "phone" => $phone
        );
        if ($id = $this->model->registration($data)){
           $data['id'] = $id;
            User::login($data);
             echo json_encode(array("error" =>""));
        }else{
           echo json_encode(array("error" =>"произошла ошибочка!"));  
        }
    }else{
        echo json_encode(array("error" =>"Пароли не совпадают!"));
    }
    }
    public function login(  ) {
        $data["LOGIN"]= htmlspecialchars($_POST['login']);
        $data["PASSWORD"]= htmlspecialchars($_POST['password']);
        sleep(2);
        if($this->model->loginExists($data["LOGIN"]) ){ 
            if($user = $this->model->authorization($data)){
                User::login($user);
                echo json_encode(array("error" =>""));   
            }else{
                echo json_encode(array("error" =>"Неверный пароль!"));
            }  
        }else{
            echo json_encode(array("error" =>"Логин не существует!"));
        }
    } 
    public function logout() {
        User::logout();
        header('Location:'.MAIN_PREFIX.'/');    
    }  
}
