<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <script src="../scripts/admin_script.js" defer></script>
    <script src="../scripts/popup.js"></script>
    <link rel="stylesheet" href="/../styles/main_styles.css">
    <link rel="stylesheet" href="/../styles/admin_styles.css">
</head>
<body>
    <div class="grid-container">
        <?php
            $page = 'admin_profile';
            include '../partial/admin_header.php';
            include '../partial/admin_sidebar.php';
            require '../scripts/validate_input.php';
            require '../scripts/user_scripts/edit_user-pwd.php';
            require '../scripts/user_scripts/edit_user-info.php';
            error_reporting(E_ALL);  
            ini_set('display_errors', 1); 
        ?> 

        <div class="popup" id="popup-password-requirements">
            <div class="overlay" onclick="togglePopup('popup-password-requirements')"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopup('popup-password-requirements')">&times;</div>
                <div class="confirmation-img">
                </div>
                <h2>Password Requirements</h2>
                <b>The password must be:</b>
                <ol style="text-align: left">
                <li>at least 8 characters long</li>
                <li>contain at least one uppercase letter</li> 
                <li>contain at least one lowercase letter</li>
                <li>contain at least one special character</li>
                <li>contain at least one digit.</li>
                </ol>
                
                <button class="confirm-btn" onclick="togglePopup('popup-password-requirements')">OK</button>
            </div>
        </div>
        
        <main class="main-container">
            <div class="profile">
                <div class="profile-avatar">
                    <img src="<?php echo $_SESSION['user']['image'];?>" alt="Profile Image" class="profile-img">
                    <div class="profile-info">
                        <b id="profile-name" ><?php echo $_SESSION['user']['name']; ?></b>
                        <br>
                        <b><?php echo $_SESSION['user']['email']; ?></b>
                        <br>
                        <i><?php echo $_SESSION['user']['role'];?></i>
                    </div>
                </div>
                <img src="../_images/profile-cover.jpg" alt="" class="profile-cover">
            </div>
            
            <div class="profile-edit-info main-cards">
                <section class="card">
                    <header>
                        <h2>Profile Information</h2>
                        <p class="help-text"  id="help-userInfo" style="display: block;">Update your account's profile information and email address.</p>
                    </header>

                    <form class="profile-form" action="" method="POST" >
                        <div>
                            <label for="name">Name</label>
                            <input type="text" id="name" name="edit-name" value="<?php echo $_SESSION['user']['name']; ?>">
                        </div>


                        <div>
                            <label for="email">Email</label>
                            <input type="email" id="email" name="edit-email" value="<?php echo $_SESSION['user']['email']; ?>" required>
                        </div>

                        <div>
                            <label for="cell">Cell No.</label>
                            <input type="text" id="cell" name="edit-cell" value="<?php echo $_SESSION['user']['cell']; ?>">
                        </div>

                        <button type="submit" class="profile-button">Update</button>
                        <button type="reset" class="profile-button">Reset</button>
                    </form>
                </section>

                <section class="card">
                    <header>
                        <h2>Update Password</h2>
                        <p>Ensure your account is using a long, random password to stay secure.</p>
                    </header>

                    <form class="profile-form" action="" method="POST">
                        <div>
                            <label for="update_password_current">Current Password</label>
                            <input type="password" id="update_password_current" name="current_password" required>
                            <!--<p id="current_password_error" style="color: red;">the password you have entered was invalid</p>-->
                        </div>

                        <div>
                            <label for="update_password_new">New Password<i class="fa-solid fa-circle-info" style="margin: 0 0 0 10px;" onclick="togglePopup('popup-password-requirements')"></i></label>
                            <input type="password" id="update_password_new" name="new_password" required>
                            <!--<p id="new_password_error_length" style="color: red;">the password need to be at least 8 characters long</p>
                            <<p id="new_password_error_special" style="color: red;">the password need to contain a spacial character</p>
                            <<p id="new_password_error_caps" style="color: red;">the password need contain an upper case letter</p>-->
                            
                        </div>

                        <div>
                            <label for="update_password_confirm">Confirm Password</label>
                            <input type="password" id="update_password_confirm" name="confirm_password" required>
                            <!--<p id="confirm_password_error" style="color: red;">the password does not match with the new password</p>-->
                        </div>

                        <button type="submit" class="profile-button">Update</button>
                        <button type="reset" class="profile-button">Reset</button>
                    </form>
                </section>
            </div>
        </main>
    </div>
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
?> 
</html>