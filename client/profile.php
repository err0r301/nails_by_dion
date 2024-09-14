<!--<?php
    require ('../scripts/updateUser.php');
?>-->
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
    <?php 
        $page = 'profile'; 
        $unsubcribe = false;
        $pop = false;
        include '../partial/header.php';?>
    <section>
        <header>
            <h2>Profile Information</h2>
            <p>Update your account's profile information and email address.</p>
        </header>

        <form class="profile-form">
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo $_SESSION['user']['name']; ?>" required>
                <p class="error" id="name_error"></p>    
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $_SESSION['user']['email']; ?>" required>
                <p class="error" id="email_error"></p>
            </div>

            <div>
                <label for="cell">Cell No.</label>
                <input type="text" id="cell" name="cell" value="<?php echo $_SESSION['user']['cell']; ?>">
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

        <form class="profile-form">
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
            <h2>Unsubscribe</h2>
            <p>Once your have unsubscribed, you will no longer receive important updates, promotions, and exclusive offers.</p>
        </header>

        <button class="unsubscribe profile-button" onclick="togglePopup('popup-register')">Unsubscribe</button>

        <div class='popup' id='popup-register'>
                    <div class='overlay' onclick="togglePopup('popup-register')" ></div>
                    <div class='content'>
                        <h2>You are now unsubscribed</h2>
                            <button onclick="togglePopup('popup-register')"> Back</button>  
                    </div>
                </div>
    </section>

    <script>
        function togglePopup(id) {
            const popup = document.getElementById(id);
            popup.classList.toggle("active");
            pop =document.getElementsByClassName("content")[0];
            pop.style.top = "100%";
        }
    </script>
</body>
</html>