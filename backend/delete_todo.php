<?php 

require_once 'db_connection.php';

class DELETE_TODO {
    
    private $pdo;
    
    function __construct($pdo) {
        $this->pdo = $pdo;
    }

    function delete($id): void {
        $this->delete_todo($id);
    }

    function delete_todo($id): void {
        $sql = "DELETE FROM todos WHERE id = :id";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
    }

}






?>