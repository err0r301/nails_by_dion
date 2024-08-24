<?php
    //require ('../scripts/verifyUser.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/../styles/client_styles.css">
    <link rel="stylesheet" href="/../styles/main_styles.css">
    <?php if ($email_error != null){?>
        <style>
            #login-email-error{
                visibility: visible;
            }
        </style>
    <?php } if ($password_error != null){?>
        <style>
            #login-password-error{
                visibility: visible;
            }
        </style>
    <?php } ?>  
        

</head>
<body>
    <div class="login_register">
        <div class="form-container">
            <a href="../client/index.php">
                <img class="logo" src="../_images/logo.png" alt="Nails By Dion">
            </a>
            
            <h2>Sign In</h2>
            <div class="error"></div>
            <form  action="" method="POST" class="form">
                <div class="input-field">
                    <input id="email" type="email" name="email" required autocomplete="off"/>
                    <label for="email">Email</label>
                </div>

                <div class="input-field">
                    <input required="" autocomplete="off" type="password" name="text" id="password"/>
                    <label for="username">Password</label>
                </div>
                <button class="btn">Sign in</button>
                <p>
                    Don't have an account?
                    <a href="register.php">Sign up</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>


