<?php
require_once './cors/cors.php';
require_once 'db_connection.php';

class UPDATE_TODO {
    
    private $task;
    private $pdo;
    
    function __construct($pdo, $task) {
        $this->task = $task;
        $this->pdo = $pdo;
    }

    // function update($task): void {
    //     $this->todo->title = $task['title'];
    //     $this->todo->$task['description'];
    //     $this->todo->$task['completed'];

    //     $this->update_todo($task['id']);
    // }

    function update_todo(): void {
        $sql = "UPDATE todos SET title = :title, description = :description, completed = :completed WHERE id = :id";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $this->task['id'], PDO::PARAM_INT);
        $stmt->bindParam(':title', $this->task['title']);
        $stmt->bindParam(':description', $this->task['description']);
        $stmt->bindParam(':completed', $this->task['completed']);
        $stmt->execute();
        
    }  
}

$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);



if($data){
    $todoHandler = new UPDATE_TODO($pdo, $data);
    $todoHandler->update_todo();
    echo json_encode($data);
}

?>