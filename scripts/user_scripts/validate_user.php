<?php 
// Include the config file
require_once '../data/config.php';
$error =  false;
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<script> console.log('pwd :$_POST[password]')</script>";
    if (isset($_POST['password'])){
    $pwd = $_POST['password'];
    }else{
        $error = true;
    }
    $email = $_POST['email'];

    // check if the user can be found in the database
    $query = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($pwd, $row['password'])) {
            // password is correct
            session_start();
            $_SESSION['user'] = $row;
            if ($_SESSION['user']['userType'] == 'Client') {
                header("Location: ../client/index.php");
                exit;
            } elseif ($_SESSION['user']['userType'] == 'Admin') {
                header("Location: ../admin/overview.php");
                exit;
            }    
        } else {
            $error = true;
        }
    } else {
        $error = true;
    }
    $stmt->close();    
}
$conn->close();


