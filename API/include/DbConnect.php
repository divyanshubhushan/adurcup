<?php
 

class DbConnect {
 
    private $conn;
 
    function __construct() {        
    }
 
    function connect() {

        $this->conn = new PDO("mysql:host=localhost;dbname=adurcupc_task_manager;charset=utf8", 'adurcupc', '1its2n@t3secret');
        $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->conn;
    }
 
}
 
?>
