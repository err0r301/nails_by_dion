<?php
// Include the config file
require '../data/config.php';
require '../scripts/validate_input.php';

$add_user_confirmation = null;
$success = null;
$error = null;
echo "<script> console.log('add_user.php')</script>";
// Check if the form has been submitted

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<script> console.log('This is add user')</script>";
    if (isset($_POST['add-name']) && isset($_POST['add-email']) && isset($_POST['add-cell'])) {
        $name = $_POST['add-name'];
        $email = $_POST['add-email'];
        $cell = $_POST['add-cell'];
        $userID = getMaxUserID($conn) + 1;

        if (isset($_POST['password'])) {
                $pwd = $_POST['password']; 
        }else{  
            $pwd = generatePassword();  
        }  

        $userType = 'Client'; 
        if ($page == 'team') {
            $userType = 'Admin';
        }
        echo "<script> console.log('test 1')</script>";
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
            $email = strtolower($email);

            // Insert the user data into the database
            $query = "INSERT INTO user (userID, name, email, cell, password, userType) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("isssss", $userID, $name, $email, $cell, $password_hash, $userType);
            $stmt->execute();
            echo "<script> console.log('test 2')</script>";
            
            if ($userType == 'Admin' && $stmt->affected_rows == 1) {
                $adminID = getMaxAdminID($conn) + 1;
                $role = $_POST['add-role'];
                $targetDir = "../_images/";
                $fileName = basename($_FILES['add-image']['name']);
                $targetFilePath = $targetDir . $fileName;

                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }

                if (move_uploaded_file($_FILES['add-image']['tmp_name'], $targetFilePath)) {
                    $image = $targetFilePath;
                    echo "<script> console.log('The file has been uploaded successfully. Image path: $image')</script>";
                } else {
                    echo "<script> console.log('Sorry, there was an error uploading your file.')</script>";
                }  

                echo "<script> console.log('adminID :$adminID, userID :$userID, image :$image, role :$role')</script>";

                $query = "INSERT INTO admin (adminID, userID, profileImage, role) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("iiss", $adminID, $userID, $image, $role);
                $stmt->execute();
                echo "<script> console.log('test 3')</script>";
            }

            // Check if the insertion was successful
            if ($stmt->affected_rows == 1) {
                $success = 'User created successfully';
                $add_user_confirmation = true;
            } else {
                $error = 'Failed to create user';
                $add_user_confirmation = false;
            }
            $stmt->close();
        }else{
            $add_user_confirmation = false;
        }

        $conn->close();
    }
}

function getMaxUserID($conn){
    $query = "SELECT MAX(userID) AS maxID FROM user";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return $row['maxID'];
}

function getMaxAdminID($conn){
    $query = "SELECT MAX(adminID) AS maxID FROM admin";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return $row['maxID'];
}

function generatePassword() { 
    $pwd = '';  
    $sChar = '`~!@#$%^&*()_+{}|:"<>?';
    $charCount = strlen($sChar);
    for ($i = 0; $i < 3; $i++) {
        $randIndex = random_int(0, $charCount - 1);  
        $pwd .= $sChar[$randIndex];  
        $pwd .= rand(0,9);
        $pwd .= chr(rand(ord('A'), ord('Z')));
        $pwd .= chr(rand(ord('a'), ord('z')));
    }

    $pwd = str_shuffle($pwd);

    return $pwd;
}