<?php
    class DModel{ 
        protected $db = array();
        public function __construct(){
            $connect = 'mysql:dbname=pdo_seafoodweb; host=localhost; charset=utf8';
            $user = 'root';
            $password = '';
           $this-> db = new Database($connect, $user, $password);
        }
    }

?>