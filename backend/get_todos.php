<?php 
require_once 'db_connection.php';
require_once './cors/cors.php';

class GET_TODOS {

    private $pdo;
    private $todos;
    private $user_id;

    function __construct($pdo, $user_id) {
        $this->pdo = $pdo;
        $this->user_id = $user_id;
    }

    function get_todos(): array {
        $sql = "SELECT * FROM todos WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
        $stmt->execute();
        $this->todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $this->todos;
    }
}


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $user_id = $_GET['user_id'] ?? null;
   

    $todoHandler = new GET_TODOS($pdo, $user_id);
    $todos = $todoHandler->get_todos();
    echo json_encode($todos);
}
