<?php

class Database extends PDO{
    public function __construct() {
        try{
        parent::__construct('mysql:host=localhost;dbname='.DBNAME,DBUSER,DBPASS);
        }catch(PDOException $e){
            echo'Подключение не удалось: '. $e->getMessage();
            die;
        }
}
}