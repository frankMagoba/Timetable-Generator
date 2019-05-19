<?php

class DatabaseConnection{
    
    public $conn;
    var $DB_SERVER = "localhost";
    var $DB_USER = "root";
    var $DB_PASSWORD = "ROOT";
    var $DB_TABLE = "ttgs";
    function connection(){

        $conn = new mysqli($this->DB_SERVER, $this->DB_USER, $this->DB_PASSWORD, $this->DB_TABLE);

        if ($conn->connect_error) {
            trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
        }
        return $conn;
    }
    
    function querydb($query){
        $manageDb = new DatabaseConnection();
        $conn = $manageDb->connection();
        $stmt = $conn->prepare($query);

        if ($stmt) {
            $stmt->execute();
            $result = $stmt->get_result();
            
            $data = $result;
            
            $stmt->close();

        } else {
            echo "Error in : " . $query;
            trigger_error( 'Statement failed : ' . $stmt->error, E_USER_ERROR);
        }
        $conn->close();
        return $data;
    }
    
    function executedb($query){
        $manageDb = new DatabaseConnection();
        $conn = $manageDb->connection();
        $test = false;

        $stmt = $conn->prepare($query);
        if ( $stmt->execute() ) {
            $test = true;
        } else {
            trigger_error('Statement failed : ' . $stmt->error, E_USER_ERROR);
        }

        $conn->close();
        
        return $test;
    }
    
}


?>
