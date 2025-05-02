<?php
require_once 'backend/todo.php';

class UPDATE_TODO {
    
    private $todo;
    private $pdo;
    
    function __construct($pdo) {
        $this->todo = new TODO();
        $this->pdo = $pdo;
    }

    function update($todo, $id): void {
        $this->todo->setTitle($todo['title']);
        $this->todo->setDescription($todo['description']);
        $this->todo->setCompleted($todo['completed']);

        $this->update_todo($id);
    }

    function update_todo($id): void {
        $sql = "UPDATE todos SET title = :title, description = :description, completed = :completed WHERE id = :id";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $this->todo->getTitle());
        $stmt->bindParam(':description', $this->todo->getDescription());
        $stmt->bindParam(':completed', $this->todo->getCompleted());
        $stmt->execute();
        
    }

}


?>
