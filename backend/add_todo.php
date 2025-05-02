<?php 

require_once 'backend/todo.php';
require_once 'db_connection.php';

class ADD_TODO {
    
    private $todo;
    private $pdo;
    
    function __construct($pdo) {
        $this->todo = new TODO();
        $this->pdo = $pdo;
    }

    function add($todo): void {
        $this->todo->setTitle($todo['title']);
        $this->todo->setDescription($todo['description']);
        $this->todo->setCompleted($todo['completed']);

        $this->save_todo();
    }

    function save_todo(): void {
        $sql = "INSERT INTO todos (title, description, completed) VALUES (:title, :description, :completed)";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':title', $this->todo->getTitle());
        $stmt->bindParam(':description', $this->todo->getDescription());
        $stmt->bindParam(':completed', $this->todo->getCompleted());
        $stmt->execute();
        
    }

}

?>