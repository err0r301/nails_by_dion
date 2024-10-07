<?php
    // Include the config file
    require '../data/config.php';
    $remove_user_confirmation = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['delete-user-id'])) {
            $userID = $_POST['delete-user-id']; 

            // check if the user is an admin
            $query1 = "SELECT userType FROM user WHERE userID = $userID";
            $result1 = $conn->query($query1);
            $row = $result1->fetch_assoc();

            if ($row['userType'] == 'Admin') {
                $query2 = "DELETE FROM admin WHERE userID = $userID";
                $result2 = $conn->query($query2);
            }

            $query4 = "DELETE FROM appointment WHERE userID = $userID";
            $result4 = $conn->query($query4);
            // remove the user data from the database
            $query3 = "DELETE FROM user WHERE userID = $userID";
            $result3 = $conn->query($query3);
        
            // Check if the data was removed successfully
            if ($result3) {
                echo "<script>console.log('Account removed successfully.')</script>";
                if ($row['userType'] == 'Client') {
                    header("Location: ../client/index.php");
                    session_start(); 
                    session_destroy(); 
                }
                
            } else {
                echo "<script>console.log('Error removing account. '". $conn->error.")</script>";
                $remove_user_confirmation = false;
            }
        }
    }
    // Close the database connection
    $conn->close();