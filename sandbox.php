<?php 
// require_once './backend/add_todo.php';
require_once './backend/db_connection.php';
// require_once './backend/todo.php';
// require_once './backend/delete_todo.php';
// require_once './backend/update_todo.php';
// require_once './backend/get_todos.php';


header("Access-Control-Allow-Origin: *"); // Allow all origins (or replace * with specific domain)
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");


//insert a new todo into the database

$title = $_POST['title'];
$description = $_POST['description'];
$completed = $_POST['completed'];


$sql = "INSERT INTO todos (title, description, completed) VALUES (:title, :description, :completed)";
        
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':completed', $completed);
$stmt->execute();

echo ("Saved: $title $description $completed");


//fetch all todos from the database
// $sql = "SELECT * FROM todos";
// $stmt = $pdo->prepare($sql);
// $stmt->execute();
// $todos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo json_encode($todos);

// $id = $_GET['id'];



// echo $id;




// $todoHandler = new ADD_TODO($pdo);
// $todoHandler->add($data); 

// $todoHandler = new DELETE_TODO($pdo);
// $todoHandler->delete( 1); 

// $todoHandler = new UPDATE_TODO($pdo);
// $todoHandler->update($data, id: 2); 

//  $todoHandler = new GET_TODOS($pdo);


    




//remember to clean up objects and close connections
//remember to provide feedback to the user after each function call is done


?>