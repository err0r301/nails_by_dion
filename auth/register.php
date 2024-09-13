<?php 
    $page = 'register';
    require ('../scripts/user_scripts/add_user.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="/../styles/main_styles.css"> 
    <?php if ($error != null){?>
        <style>
            .error{
                display: block;
            }
        </style>
    <?php }?>   
</head>
<body>
    <div class="login_register">
        <div class="form-container">
            <a href="../client/index.php">
                <img class="logo" src="../_images/logo.png" alt="Nails By Dion">
            </a>
            
            <h2>Sign Up</h2>
            <div class="error"><p><?php echo $error ?></p></div>
            <form  action="" method="POST" class="form">
                <div class="input-field">
                    <input id="name" type="text" name="name" placeholder="" autocomplete="off"/>
                    <label for="username">Full Name</label>
                </div>

                <div class="input-field">
                    <input id="email" type="email" name="email" placeholder="" autocomplete="off"/>
                    <label for="email">Email</label>
                </div>

                <div class="input-field">
                    <input id="cell" type="text" name="cell" placeholder="" autocomplete="off"/>
                    <label for="cell">Cell no.</label>
                </div>

                <div class="input-field">
                    <input id="password" type="password" name="password" placeholder="" autocomplete="off"/>
                    <label for="username">Password</label>
                </div>
                <button class="btn">Sign up</button>
                <p>
                    Already have an account?
                    <a href="login.php" class="link">Sign in</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>

