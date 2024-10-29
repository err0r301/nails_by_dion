<?php
// Include the config file
require '../data/config.php';
$edit_userPwd_confirmation = null;

// Check if the form has been submitted
echo "<script> console.log('pwd 1')</script>";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<script> console.log('pwd 1.5')</script>";
    if (isset($_POST['current_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
        $currentPwd = $_POST['current_password'];   
        $newPwd = $_POST['new_password'];   
        $confirmPwd = $_POST['confirm_password'];
        // Validate the form data
        $pwd_error = null;
        $pwd_error = validatePassword($newPwd, $pwd_error);
        echo "<script> console.log('pwd 2. error : $pwd_error')</script>";
        if (is_null($pwd_error)) {
            echo "<script> console.log('pwd 2.5')</script>";
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
                    $pwd_error = null;
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
                        
                            if ($stmt->affected_rows > 0) {
                                echo "<script> console.log('Password updated successfully.')</script>";
                                $edit_userPwd_confirmation = true;
                            } else {
                                echo "<script> console.log('Failed to update password.')</script>";
                                $edit_userPwd_confirmation = false;
                            }
                            echo "<script> console.log('pwd 6')</script>";
                        } else {
                            echo "<script> console.log('Confirmation password does not match.')</script>";
                            $edit_userPwd_confirmation = 'false';
                            $pwd_error = "The confirmation password does not match.";
                        }
                    }
                } else {
                    echo "<script> console.log('Current password is incorrect.')</script>";
                    $edit_userPwd_confirmation = 'false';
                    $pwd_error = "The Current password which you entered is incorrect.";
                }
            }else{
                echo "<script> console.log('Failed to update password.')</script>";
            }
            $stmt->close();
        }else{
            $edit_userPwd_confirmation = 'false';
            if (is_null($edit_userPwd_confirmation)) {
                echo "<script> console.log('pwd failed : $pwd_error error bool : $edit_userPwd_confirmation')</script>";
            }
        }
    }
    $conn->close();
}
