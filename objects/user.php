<?php
class User{
  
    // database connection and table name
    private $conn;
    private $table_name = "user";
  
    // object properties
    public $id;
    public $email;
    public $password;
    public $name;
    public $status;
    public $image;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read products
function getUser($email , $password){
  
    // select all query
    $query = "SELECT
                u.id, u.email, u.password, u.name, u.status, u.image
            FROM
                " . $this->table_name . " u            
             WHERE
              email = '" . $email . "' and password = '" . $password ."'";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}

}

?>