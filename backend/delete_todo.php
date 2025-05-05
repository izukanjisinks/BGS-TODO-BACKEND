<?php 

require_once 'db_connection.php';
require_once './cors/cors.php';

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

$id = $_GET['id'] ?? null; // Get the id from the query string, if available
if ($id) {
    $todoHandler = new DELETE_TODO($pdo);
    $todoHandler->delete($id);
    
    echo json_encode(["success" => "Todo deleted successfully"]);
} else {
    echo json_encode(["error" => "No ID provided"]);
}






?>