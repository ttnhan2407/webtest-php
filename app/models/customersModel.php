<?php
    class customersModel extends DModel{
        public function __construct(){
            parent::__construct();
        }

        public function  insertcustomer($table_customer, $data){
            return $this->db ->insert($table_customer, $data);
        }
        public function login($table_customer, $username, $password){
            $sql = "SELECT * FROM $table_customer WHERE customers_email=? AND customers_password=?"; 
            return $this-> db ->affectedRows($sql, $username, $password);
        }
        public function getLogin($table_customer, $username, $password){
            $sql = "SELECT * FROM $table_customer WHERE customers_email=? AND customers_password=?"; 
            return $this-> db ->selectUser($sql, $username, $password);
        }
        public function load_cus($table, $cond){
            $sql = "SELECT * FROM $table WHERE $cond";
            return $this -> db->select($sql);
        }
        public function loadTT_cus($table, $cond){
            $sql = "SELECT * FROM $table WHERE $cond";
            return $this -> db->select($sql);
        }
    }

?>