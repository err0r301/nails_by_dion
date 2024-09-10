<?php
// Include the config file
require '../data/config.php';
//require '../scripts/validate_input.php';

$info_error = null;
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['cell'])) {
        $name = $_POST['name']; 
        $email = $_POST['email'];
        $cell = $_POST['cell'];
        // Validate the form data  
        $info_error =  validateEmail($email,$info_error);
        $info_error =  validateCell($cell,$info_error);   
        $info_error =  validateName($name,$info_error); 

        if ( is_null($info_error)) {
            // Update the user data in the database
            //echo"<script> console.log 'userID:".$_SESSION['user']['userID']."';</script>";
            $query = "UPDATE user SET name = ?, email = ?, cell = ? WHERE userID = '{$_SESSION['user']['userID']}'";   
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sss", $name, $email, $cell);
            $stmt->execute();

            // Check if the update was successful
            if ($stmt->affected_rows > 0) {
                $success = "User details updated successfully!";
                $_SESSION['user']['name'] = $name;
                $_SESSION['user']['email'] = $email;
                $_SESSION['user']['cell'] = $cell;
            } else {
                $info_error = "Failed to update user details.";
            }
            $stmt->close();
        }
    }
}
