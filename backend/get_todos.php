<?php 

require_once 'db_connection.php';

class GET_TODOS {

    private $pdo;
    private $todos;

    function __construct($pdo) {
        $this->pdo = $pdo;
    }

    function get_todos(): void {
        $sql = "SELECT * FROM todos";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $this->todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<h2>{$this->todos[0]['description']}</h2>";

        echo "<br>getting values from database<br>";
    }

    

}






?>