<?php 
// Include the config file
require '../data/config.php';
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
            $role = null;
            $getRole = "SELECT * FROM admin WHERE userID = " . $row['userID'];
            $role = $conn->query($getRole);
            $role = $role->fetch_assoc();
            // password is correct
            session_start();
            $_SESSION['user'] = array(
                'userID' => $row['userID'],
                'name' => $row['name'],
                'email' => $row['email'],
                'cell' => $row['cell'],
                'userType' => $row['userType'],
                'role'=> $role['role']
            );
            
            if ($_SESSION['user']['userType'] == 'Client') {
                //echo "<script> window.alert('User Type: " . $_SESSION['user']['userType'] . "')</script>";
                header("Location: ../client/index.php");
                exit;
            } elseif ($_SESSION['user']['userType'] == 'Admin') {
                //echo "<script> window.alert('User Type: " . $_SESSION['user']['userType'] . "')</script>";
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


