<?php 
require_once 'db_connection.php';
require_once 'cors.php';




class GET_TODOS {

    private $pdo;
    private $todos;

    function __construct($pdo) {
        $this->pdo = $pdo;
    }

    function get_todos(): array {
        $sql = "SELECT * FROM todos";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $this->todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $this->todos;
    }
}

$todoHandler = new GET_TODOS($pdo);
$todos = $todoHandler->get_todos();
echo json_encode($todos);

