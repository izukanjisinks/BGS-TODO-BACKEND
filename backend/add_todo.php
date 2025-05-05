<?php 

require_once 'todo.php';
require_once 'db_connection.php';
require_once './cors/cors.php';


class ADD_TODO {
    
    private $todo;
    private $pdo;
    
    function __construct($pdo) {
        $this->todo = new TODO();
        $this->pdo = $pdo;
    }

    function add($task): void {
        $this->todo->setTitle($task['title']);
        $this->todo->setDescription($task['description']);
        $this->todo->setCompleted($task['completed']);

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

$todoHandler = new ADD_TODO($pdo);
$rawData = file_get_contents("php://input");

// Decode JSON to PHP associative array
$data = json_decode($rawData, true);

if ($data) {
    // Now you can access fields like this:
    $title = $data['title'];
    $description = $data['description'];
    $completed = $data['completed'];
    $todoHandler->add([
    'title' => $title,
    'description' => $description,
    'completed' => $completed
]);
}

?>