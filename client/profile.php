<?php
    error_reporting(E_ALL);  
    ini_set('display_errors', 1);  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <link rel="stylesheet" href="/../styles/client_styles_root0.css">
    <link rel="stylesheet" href="/../styles/main_styles.css"> 
    <script src="../scripts/popup.js"></script>
</head>
<body>
    <?php 
        $page = 'profile'; 
        $unsubcribe = false;
        $pop = false;
        include '../partial/header.php';
        require '../scripts/user_scripts/remove_user.php';
        require '../scripts/validate_input.php';
        require '../scripts/user_scripts/edit_user-pwd.php';
        require '../scripts/user_scripts/edit_user-info.php';
    ?>
    <section>
        <header>
            <h2>Profile Information</h2>
            <p>Update your account's profile information and email address.</p>
        </header>

        <form class="profile-form" action="" method="POST">
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="edit-name" value="<?php echo $_SESSION['user']['name']; ?>" required>
                <p class="error" id="name_error"></p>    
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="edit-email" value="<?php echo $_SESSION['user']['email']; ?>" required>
                <p class="error" id="email_error"></p>
            </div>

            <div>
                <label for="cell">Cell No.</label>
                <input type="text" id="cell" name="edit-cell" value="<?php echo $_SESSION['user']['cell']; ?>">
                <p class="error" id="email_error"></p>
            </div>

            <button type="submit" class="profile-button">Update</button>
            <button type="reset" class="profile-button">Reset</button>
        </form>
    </section>

    <section>
        <header>
            <h2>Update Password</h2>
            <p>Ensure your password is 8 characters long and contains a special character, upper case letter, lower case letter, and a number.</p>
        </header>

        <form class="profile-form" action="" method="POST">
            <div>
                <label for="update_password_current">Current Password</label>
                <input type="password" id="update_password_current" name="current_password" required>
                <p class="error" id="current_password_error"></p>
            </div>

            <div>
                <label for="update_password_new">New Password</label>
                <input type="password" id="update_password_new" name="new_password" required>
                <p class="error" id="new_password_error"></p>
                
            </div>

            <div>
                <label for="update_password_confirm">Confirm Password</label>
                <input type="password" id="update_password_confirm" name="confirm_password" required>
                <p class="error" id="confirm_password_error"></p>
            </div>

            <button type="submit" class="profile-button">Update</button>
            <button type="reset" class="profile-button">Reset</button>
            </div>
        </form>
    </section>

    <section>
        <header>
            <h2>Delete account</h2>
            <p>Once your have deleted your account, you will no longer be able to access it.</p>
        </header>

        <button class="unsubscribe profile-button" onclick="togglePopup('popup-delete-account','delete-account-id',<?php echo $_SESSION['user']['userID']; ?>)">Delete Account</button>

        <div class="popup" id="popup-delete-account">
            <div class="overlay" onclick="togglePopup('popup-delete-account')"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopup('popup-delete-account')">&times;</div>
                <h2>Delete Account</h2>
                <p>Are you sure you want to delete your account?</p>
                <form action="" method="post">
                    <input type="hidden" name="delete-user-id" id="delete-account-id"> 
                    <button class="red-btn" type="submit" id="delete-account-btn" value="Delete">Delete</button>
                    <button type="reset" onclick="togglePopup('popup-delete-account')">Cancel</button>
                </form>
            </div>
        </div>
    </section>
</body>

<?php 
if ($edit_userInfo_confirmation != null){
    $confirmationID = 'confirmation_userInfo';
    if ($edit_userInfo_confirmation == true) {
        $confirmationMessage = 'User details updated successfully!';
        $confirmationImage = '../_images/tick.png';
    } else {
        $confirmationMessage = 'Failed to update user details.';
        $confirmationImage = '../_images/cross.png';
    }
    require_once '../partial/popup.php';
}

if ($edit_userPwd_confirmation != null){
    $confirmationID = 'confirmation_userPwd';
    if ($edit_userPwd_confirmation == 'true') {
        $confirmationMessage = 'User password updated successfully!';
        $confirmationImage = '../_images/tick.png';
    } else {
        $confirmationMessage = 'Password Update Failed. '.$pwd_error;
        $confirmationImage = '../_images/cross.png';
    }
    require_once '../partial/popup.php';
}

if ($remove_user_confirmation != null){
    $confirmationID = 'remove_user_confirmation';
    if ($remove_user_confirmation == true) {
        $confirmationMessage = 'The account was deleted successfully!';
        $confirmationImage = '../_images/tick.png';
        $link = 'index.php';
        $killSession = true;
    } else {
        $confirmationMessage = 'Failed to delete the account.';
        $confirmationImage = '../_images/cross.png';
    }
    require_once '../partial/popup.php';
}
?> 
</html>