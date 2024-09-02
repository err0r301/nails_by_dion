<?php
    require ('../scripts/user_scripts/edit_user.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <link rel="stylesheet" href="/../styles/client_styles.css">
    <link rel="stylesheet" href="/../styles/main_styles.css"> 
</head>
<body>
    <?php $page = 'profile';include '../partial/header.php';?>

    <section>
        <header>
            <h2>Profile Information</h2>
            <p>Update your account's profile information and email address.</p>
        </header>
        <form class="profile-form" action="" method="post" autocomplete="off">
                <span>
                    <label for="name">Name</label>
                    <p class="error" id="Profile-name-error">
                        <?php echo $name_error; ?>
                    </p>
                </span>
                <input type="text" id="name" name="name" value="<?php echo $_SESSION['user']['name']; ?>" required>  

                <span>
                    <label for="email">Email:</label>
                    <p class="error" id="Profile-email-error">
                        <?php echo $email_error; ?>
                    </p>
                </span>
                <input type="email" id="email" name="email" value="<?php echo $_SESSION['user']['email']; ?>" required>

                <span>
                    <label for="cell">Cell No.</label>
                    <p class="error" id="Profile-cell-error">
                        <?php echo $cell_error; ?>
                    </p>
                </span>
                <input type="text" id="cell" name="cell" value="<?php echo $_SESSION['user']['cell']; ?>">
            <span>
                <button type="submit" class="profile-button">Update</button>
                <button type="reset" class="profile-button">Reset</button>
            </span>
            
        </form>
    </section>

    <section>
        <header>
            <h2>Update Password</h2>
            <p>Ensure your password is 8 characters long and contains a special character, upper case letter, lower case letter, and a number.</p>
        </header>

        <form class="profile-form" action="" method="post" autocomplete="off">
            <div>
                <label for="update_password_current">Current Password</label>
                <input type="password" id="current_password" name="current_password" required>
                <!--<p class="error" id="current_password_error"></p>-->
            </div>

            <div>
                <label for="update_password_new">New Password</label>
                <input type="password" id="new_password" name="new_password" required>
                <!--<p class="error" id="new_password_error"></p>-->
                
            </div>

            <div>
                <label for="update_password_confirm">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
                <!--<p class="error" id="confirm_password_error"></p>-->
            </div>

            <span>
                <button type="submit" class="profile-button">Update</button>
                <button type="reset" class="profile-button">Reset</button>
            </span>
            
        </form>
    </section>

    <section>
        <header>
            <h2>Delete Account</h2>
            <p>This action is irreversible. All your data will be permanently deleted.</p>
        </header>

        <button class="unsubscribe profile-button" onclick="togglePopup('popup-register')">Delete account</button>
    </section>
</body>
</html>