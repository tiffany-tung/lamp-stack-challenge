<?php
/**
* 
*/
class Lamp {
    protected $conn;
    
    public function __construct($conn) {
       $this->conn = $conn;
    }
    
    public function queryMovies($q, $sql) {
        $stmt = $this->conn->prepare($sql);
        $success = $stmt->execute(array($q));
        if (!$success) {
            var_dump($stmt->errorInfo());
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }
}
?>