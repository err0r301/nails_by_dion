<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>  
    <link rel="stylesheet" href="/../styles/client_styles.css">
    <link rel="stylesheet" href="/../styles/main_styles.css">
</head>
<body>
    <div class="logout-container">
        <a href="../client/index.php">
            <img class="logo" src="../_images/logo.png" alt="Nails By Dion">
        </a>    
        <?php  
            session_start(); 
            if ($_SESSION["user"]['userType']=="Client"){
                echo "<h2>Thank you for visiting!</h2> <p>We hope to see you again soon.</p>";
            }
        ?>    
        <div id="logout-buttons">
            <a href="../client/index.php" class="logout-button">Home Page</a>
            <a href="../auth/login.php" class="logout-button" style="<?php if($_SESSION["user"]["userType"]=="Admin"){echo "display: inline-block;";}else{echo "display: none;";}?>">Login</a>
        </div> 
    </div>

    <?php
        if(isset($_SESSION['user'])){  
            session_destroy();  
        }  
        else{  
            header('Location: login.php'); 
        }  
    ?>
</body>
</html>