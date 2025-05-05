<?php
require
require_once 'users_db_connection.php';

    // Function to sanitize input
    function sanitizeInput($data) {
        return htmlspecialchars(strip_tags(trim($data)));
    }

    // Check if the request method is POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        /*
        sanitize the data
        from frontend to remove 
        any unwanted characters
        */
        $username = sanitizeInput($_POST['username'] ?? '');
        $email = sanitizeInput($_POST['email'] ?? '');
        $password = sanitizeInput($_POST['password'] ?? '');

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        try {
            $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
            $stmt = $pdo->prepare($query);

            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);

            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'User registered successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to register user.']);
            }
        } catch (PDOException $e) {
            echo 'Database error: ';
        }
    } 
?>