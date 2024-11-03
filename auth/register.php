<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$page = 'register';
require('../scripts/user_scripts/add_user.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="stylesheet" href="/../styles/main_styles.css">
    <script src="../scripts/popup.js"></script>
    <?php if ($error != null) { ?>
        <style>
            .error {
                display: block;
            }
        </style>
    <?php } ?>
</head>

<body>
    <div class="popup" id="pop-password-requirements">
        <div class="overlay" onclick="togglePopup('pop-password-requirements')"></div>
        <div class="content">
            <div class="close-btn" onclick="togglePopup('pop-password-requirements')">&times;</div>
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

            <button class="confirm-btn" onclick="togglePopup('pop-password-requirements')">OK</button>
        </div>
    </div>

    <div class="login_register">
        <div class="form-container">
            <a href="../client/index.php">
                <img class="logo" src="../_images/logo.png" alt="Nails By Dion">
            </a>

            <h2>Sign Up</h2>
            <div class="error">
                <p><?php echo $error ?></p>
            </div>
            <form action="" method="POST" class="form">
                <div class="input-field">
                    <input id="name" type="text" name="add-name" placeholder="" autocomplete="off" />
                    <label for="username">Full Name</label>
                </div>

                <div class="input-field">
                    <input id="email" type="email" name="add-email" placeholder="" autocomplete="off" />
                    <label for="email">Email</label>
                </div>

                <div class="input-field">
                    <input id="cell" type="text" name="add-cell" placeholder="" autocomplete="off" />
                    <label for="cell">Cell no.</label>
                </div>

                <div class="input-field">
                    <input id="password" type="password" name="password" placeholder="" autocomplete="off" />
                    <label for="username">Password </label> <i class="fa-solid fa-circle-info" onclick="togglePopup('pop-password-requirements')"></i>
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
<?php
if ($add_user_confirmation != null) {
    $confirmationID = 'add_user_confirmation';
    if ($add_user_confirmation == true) {
        $confirmationMessage = 'The registration was successful! Please sign in.';
        $confirmationImage = '../_images/tick.png';
        $link = 'login.php';
    } else {
        $confirmationMessage = 'The registration was unsuccessful!.';
        $confirmationImage = '../_images/cross.png';
    }
    require_once '../partial/popup.php';
}
?>

</html>