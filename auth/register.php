<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="/../styles/client_styles.css">
    <link rel="stylesheet" href="/../styles/main_styles.css">  
</head>
<body>
    <div class="login_register">
        <div class="form-container">
            <a href="../client/index.php">
                <img class="logo" src="../_images/logo.png" alt="Nails By Dion">
            </a>
            
            <h2>Sign Up</h2>
            <div class="error"></div>
            <form  action="" method="POST" class="form">
                <div class="input-field">
                    <input id="name" type="text" name="text" required autocomplete="off"/>
                    <label for="username">Full Name</label>
                </div>

                <div class="input-field">
                    <input id="email" type="email" name="email" required autocomplete="off"/>
                    <label for="email">Email</label>
                </div>

                <div class="input-field">
                    <input id="cell" type="text" name="cell" required autocomplete="off"/>
                    <label for="cell">Cell no.</label>
                </div>

                <div class="input-field">
                    <input required="" autocomplete="off" type="password" name="text" id="password"/>
                    <label for="username">Password</label>
                </div>
                <button class="btn">Sign up</button>
                <p>
                    Already have an account?
                    <a href="login.php">Sign in</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>

