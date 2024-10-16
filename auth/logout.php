<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>  
    <link rel="stylesheet" href="/../styles/main_styles.css">
</head>
<body>
    <div class="login_register">
        <div class="form-container">
            <a href="../client/index.php">
                <img class="logo" src="../_images/logo.png" alt="Nails By Dion">
            </a>    
            <h2>Logged Out</h2>
            <?php  
                session_start(); 
                if ($_SESSION["user"]['userType']=="Client"){
                    echo "<strong>Thank you for visiting!</strong>
                            <p>We hope to see you again soon.</p>";
                }elseif ($_SESSION["user"]['userType']=="Admin"){
                    echo "<strong>Thank you for all your hard work!</strong>
                            <p>You have successfully logged out.</p>";
                }
            ?>    
            <div id="logout-buttons">
                <a href="../client/index.php">
                    <button class="btn">
                        Home
                    </button>
                </a>
                <a href="../auth/login.php">
                    <button class="btn">
                        Login
                    </button>
                </a>
            </div> 
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