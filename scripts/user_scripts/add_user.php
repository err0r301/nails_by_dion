<?php
// Include the config file
require '../data/config.php';
require '../scripts/validate_input.php';
$error = null;
$success = null;
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $cell = $_POST['cell'];
    $pwd = $_POST['password'];

    // error massages
    
    $error = validatePassword($pwd,$error);  // not working
    $error = validateCell($cell,$error);
    $error = validateEmail($email,$error);
    $error = validateName($name,$error);
    echo"<script> console.log('error :$error pwd len :".strlen($pwd)."')</script>";
    
    

    // Validate the form data
    if ( is_null($error)) {
        // Hash the password
        $password_hash = password_hash($pwd, PASSWORD_DEFAULT);

        // Insert the user data into the database
        $query = "INSERT INTO user (name, email, cell, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssss", $name, $email, $cell, $password_hash);
        $stmt->execute();

        // Check if the insertion was successful
        if ($stmt->affected_rows == 1) {
            $success = 'User created successfully';
            $stmt->close();
        } else {
            $error = 'Failed to create user';
        }
    }

    $conn->close();
}