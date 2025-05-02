<?php 
require_once './backend/add_todo.php';
require_once './backend/db_connection.php';
require_once './backend/todo.php';
require_once './backend/delete_todo.php';
require_once './backend/update_todo.php';
require_once './backend/get_todos.php';

$data = [
    'title' => 'Finish project',
    'description' => 'Complete by Monday',
    'completed' => true
];

// $todoHandler = new ADD_TODO($pdo);
// $todoHandler->add($data); 

// $todoHandler = new DELETE_TODO($pdo);
// $todoHandler->delete( 1); 

// $todoHandler = new UPDATE_TODO($pdo);
// $todoHandler->update($data, id: 2); 

$todoHandler = new GET_TODOS($pdo);
$todoHandler->get_todos();


//remember to clean up objects and close connections


?>