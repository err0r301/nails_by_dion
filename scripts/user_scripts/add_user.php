<?php
// Include the config file
require_once 'config.php';
require 'validate_input.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $cell = $_POST['cell'];
    $password = $_POST['password'];

    // error massages
    $error_name = validateName($name);
    $error_email = validateEmail($email);
    $error_cell = validateCell($cell);
    $error_password = validatePassword($password);

    // Validate the form data
    if ( is_null($error_name) && is_null($error_email) && is_null($error_cell) && is_null($error_password)) {
        // Hash the password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user data into the database
        $query = "INSERT INTO users (name, email, cell, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssss", $name, $email, $cell, $password_hash);
        $stmt->execute();

        // Check if the insertion was successful
        if ($stmt->affected_rows == 1) {
            $success = 'User created successfully';
            $stmt->close();
            $conn->close();
        } else {
            $error = 'Failed to create user';
        }
    }
}