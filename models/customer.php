<?php

class Customer{
    private $db;

    public function __CONSTRUCT(){
        $this->db = new DBController;
    }

    public function addCustomer($data){
       //prepare query
       $stmt = $this->db->prepare("INSERT INTO customers (id, firstname, lastname, email, telephone, created_at)
       VALUES(?,?,?,?,?,?)");
       $stmt->bind_param("sss", $id, $firstname, $lastname, $email, $telephone, created_at);
       
       if($stmt->execute()){
            $stmt->close();
       $this->db->close();
       return true;
       }else{
           return false;
       }
      
    }
    
}