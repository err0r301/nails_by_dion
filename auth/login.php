<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h1>Login</h1>
    <!-- Create login form with the following : labels & inputs, submit/reset btn, error message-->
    <form action="" method="POST">
        <div class="error_container">
            <p id="login_error"><?php echo $error; ?></p>
        </div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
    
</body>
</html>