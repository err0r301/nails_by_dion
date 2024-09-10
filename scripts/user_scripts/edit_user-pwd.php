<?php
// Include the config file
require '../data/config.php';
require '../scripts/validate_input.php';

$pwd_error = null;
// Check if the form has been submitted
echo "<script> console.log('pwd 1')</script>";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<script> console.log('pwd 1.5')</script>";
    if (isset($_POST['current_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
        $currentPwd = $_POST['current_password'];   
        $newPwd = $_POST['new_password'];   
        $confirmPwd = $_POST['confirm_password'];
        echo "<script> console.log('pwd 2')</script>";
        // Validate the form data

        // Check if the current password is correct
        $query  = "SELECT password FROM user WHERE userID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $_SESSION['user']['userID']);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo "<script> console.log('pwd 3')</script>";
            $row = $result->fetch_assoc();
            if (password_verify($currentPwd, $row ['password'])) {
                echo "<script> console.log('pwd 4')</script>";
                // check if the new password is valid
                $pwd_error = validatePassword($newPwd, $pwd_error);
                if (is_null($pwd_error)) {
                    echo "<script> console.log('pwd 5')</script>";
                    // check if the new password and confirm password match
                    if ($newPwd == $confirmPwd) {
                        $hashedPwd = password_hash($newPwd, PASSWORD_DEFAULT);
                        $query = "UPDATE user SET password = ? WHERE userID = ?";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("si", $hashedPwd, $_SESSION['user']['userID']);
                        $stmt->execute();
                        echo "<script> console.log('pwd 6')</script>";
                    } else {
                        $pwd_error = "Confirmation password does not match";
                    }
                }
            } else {
                $pwd_error = "Current password is incorrect";
            }
        }else{
            $pwd_error = "Failed to update password";
        }
    }
}
