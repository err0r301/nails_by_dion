<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <script src="../scripts/admin_script.js" defer></script>
    <link rel="stylesheet" href="/../styles/main_styles.css">
    <link rel="stylesheet" href="/../styles/admin_styles.css">
    <?php 
        if ($pwd_error != null){?>
            <style>
                #pwd_error{
                    display: block;
                }
            </style>

        
    <?php }
        if ($info_error != null){?>
            <style>
                #info_error{
                    display: block;
                }
            </style>
    <?php }?>   
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
        
        <main class="main-container">
            <div class="profile">
                <div class="profile-avatar">
                    <img src="../_images/profile-pic blank.jpeg" alt="Profile Image" class="profile-img">
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
                        <p>Update your account's profile information and email address.</p>
                        <div class="error" id="info_error"><p><?php echo $info_error ?></p></div>
                    </header>

                    <form class="profile-form" action="" method="POST" >
                        <div>
                            <label for="name">Name</label>
                            <input type="text" id="name" name="edit-name" value="<?php echo $_SESSION['user']['name']; ?>">
                            <!--<p id="name_error" style="color: red;">your name is required</p>-->
                        </div>


                        <div>
                            <label for="email">Email</label>
                            <input type="email" id="email" name="edit-email" value="<?php echo $_SESSION['user']['email']; ?>" required>
                            <!--<p id="email_error" style="color: red;">The email you have entered is not valid</p>-->
                        </div>

                        <div>
                            <label for="cell">Cell No.</label>
                            <input type="text" id="cell" name="edit-cell" value="<?php echo $_SESSION['user']['cell']; ?>">
                            <!--<p id="cell_error" style="color: red;">The phone number you have entered is not valid</p>-->
                        </div>

                        <button type="submit" class="profile-button">Update</button>
                        <button type="reset" class="profile-button">Reset</button>
                    </form>
                </section>

                <section class="card">
                    <header>
                        <h2>Update Password</h2>
                        <p>Ensure your account is using a long, random password to stay secure.</p>
                        <div class="error" id="pwd_error"><p><?php echo $pwd_error ?></p></div>
                    </header>

                    <form class="profile-form" action="" method="POST">
                        <div>
                            <label for="update_password_current">Current Password</label>
                            <input type="password" id="update_password_current" name="current_password" required>
                            <!--<p id="current_password_error" style="color: red;">the password you have entered was invalid</p>-->
                        </div>

                        <div>
                            <label for="update_password_new">New Password</label>
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
</html>