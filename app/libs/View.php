<?php
use Libs\User;
use Libs\App;
class View{
    
    private $title = "Пустой заголовок";
    private $prefix = "/";
    public function __construct( $prefix ) {
        $this->prefix = $prefix;
    }
    public function render( $path, $file_name = 'index',$add_files = true ){
        if (file_exists(__DIR__.'/../views'.$this->prefix.$path.'/'.$file_name.'.php')){
            
            if($add_files){
                
                if(file_exists(__DIR__.'/../views'.$this->prefix.$path.'/style.css')){
                    $this->addcss = TEMPLATE_PATH.$this->prefix.$path.'/style.css';
                }
                
                if(file_exists(__DIR__.'/../views'.$this->prefix.$path.'/script.js')){
                    $this->addjs = TEMPLATE_PATH.$this->prefix.$path.'/script.js';
                }
            }
            require __DIR__.'/../views'.$this->prefix.$path.'/'.$file_name.'.php';
        }
        else{
            App::showError("Template by $path does not exist");
        }
    }
   // public function addHeader(){
   //     if (file_exists(__DIR__.'/../views/header.php')){
   //         require __DIR__.'/../views/header.php';
   //     }
   // }
  //  public function addFooter(){
  //      if (file_exists(__DIR__.'/../views/footer.php')){
  //          require __DIR__.'/../views/footer.php';
  //      }
  //  }
    
    public function setTitle($title){
        $this->title=$title;
    }
    public function getTitle(){
        return $this->title;
    }
}

