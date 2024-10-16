<?php
    require ('../scripts/verifyUser.php');
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
    <div class="login-container">
        <a href="../client/index.php">
            <img class="logo" src="../_images/logo.png" alt="Nails By Dion">
        </a>
           
        <h2>Login</h2>

        <form action="" method="post" autocomplete="off">
            <span>
                <label for="email">Email:</label>
                <p class="error" id="login-email-error">
                    <?php echo $email_error; ?>
                </p>
            </span>
            <input class="login_input" type="email" id="email" name="email" value="<?php echo $email; ?>" required>

            <span>  
                <label for="password">Password:</label>
                <p class="error" id="login-password-error">
                    <?php echo $password_error; ?>
                </p>
            </span>
            <input class="login_input" type="password" id="password" name="password" required>
        
            <button type="submit">Login</button>
            <p>Don't have an account? <a href="register.php">Sign up</a></p>
        </form>
    </div>

    <style>
        :root/*[data-theme="light"]*/{
  --text: #000000;
  --background: #f3e6d8;
  --primary: #e3cfbb;
  --secondary: #cea984;
  --accent: #674f00;
  --light: #ffffff;
}

/*:root[data-theme="dark"]{
  --text: #ffffff;
  --background: #000000;
  --primary: #d6b89a;
  --secondary: #b8946f;
  --accent: #4d3b00;
  --text-light: #000000;
}*/

body {
  background-color: var(--background);
}

/* --------- header  --------- */

.header-top-list {
  list-style: none;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 40px;
  background-color:var(--primary);
  margin: 0;
}

.header-top-list div{
  display: flex;
}

.header-top-item {
  margin-right: 20px;
  display: flex;
  align-items: center;
}

.header-top-item i{
  padding-right: 10px;
}

.item-title {
  font-weight: bold;
}

.social-list {
  list-style: none;
  display: flex;
  align-items: center;
  
}

.social-link {
  margin-right: 10px;
  color: var(--accent);
  font-size: 20px;
}

.social-link:hover {
  color: var(--accent);
}


.header-bottom {
  background-color: var(--light);
  padding:0 20px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  box-shadow: 0px 10px 10px 0px rgba(80, 80, 80, 0.1);
}

.navbar {
  display: flex;
  justify-content: space-between;
  
}

.logo {
  width: 120px;
  height: 120px;
}

.navbar-list {
  list-style: none;
  display: flex;
}

.navbar-link {
  color: var(--text);
  text-decoration: none;
}

.navbar-item ,.user-item, .book-nav{
  padding: 10px;
  margin:0 10px;
  position: relative;
  transition: 0.5s ease;
  cursor: pointer;
  border-radius: 5px;
}

.book-nav {
  position: relative;
  border: 2px solid var(--accent);
  display: inline-block;
  color: var(--accent);
  background: transparent;
  cursor: pointer;
  box-shadow: inset 0 0 0 0 var(--accent); 
  font-weight: bold;
  transition: ease-out 0.5s;
}

.book-nav:hover {
  color: var(--light);
  box-shadow: inset 0 -100px 0 0 var(--accent);
}

.user-item{
  position: relative;
  display: inline-block;
  color: var(--accent);
  border-radius: 50%;
}

.user-item:hover{
  color:var(--secondary);
  font-size: 17px;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: var(--background);
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  top: 50px;
  right: 0;
  border-radius: 20px;
  overflow: hidden;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
  color: var(--light);
  background-color: var(--secondary);
}

.user-item.active .dropdown-content {
  display: block;
}

.navbar-item::before {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 2px;
  width: 0;
  background-color:var(--secondary);
  transition: 0.5s ease;
}

.navbar-item:hover {
  transition-delay: 0.5s;
}

.navbar-item:hover::before {
  width: 100%;
}

.navbar-item::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 0;
  width: 100%;
  background-color: var(--secondary);
  transition: 0.4s ease;
  z-index: -1;
}

.navbar-item:hover::after {
  transition-delay: 0.4s;
}

.active-link{
  background-color: var(--secondary);
}

.active-link a{
  color: var(--light);
}

/* --------- Footer --------- */
/* Footer styles */
.footer {
  background-size: cover;
  background-position: center;
  padding: 50px 0;
  color: var(--text);
  background-color: var(--primary);
}

.footer .container {
  display: flex;
  flex-direction: column;
  justify-content: space-between;

}

.footer-top {
  align-items: center;
  margin-bottom: 30px;
}

.footer-brand {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.footer-brand .logo {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.footer-brand h3{
  font-size: 25px;
}

.footer-brand .input-wrapper {
  margin-top: 10px;
  display: flex;
}

.footer-brand .input-wrapper .email-field {
  padding: 10px;
  border: 1px solid var(--background);
  border-radius: 5px 0 0 5px;
  margin-right: 10px 0;
}

.footer-brand .input-wrapper .btn {
  background-color: var(--secondary);
  color: var(--light);
  font-weight: bold;
  border: none;
  padding: 10px 20px;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  display: flex;
  align-items: center;
}

.footer-link-box {
  display: flex;
  justify-content: space-evenly;
  margin: 20px 0;
}

.footer-list {
  list-style: none;
  padding: 0;
}

.footer-list-title {
  font-weight: bold;
  margin-bottom: 10px;
}

.footer-link {
  text-decoration: none;
  color: var(--text);
  display: block;
  margin-bottom: 5px;
  position: relative;
}

.footer-link:hover{
  color: var(--accent);
}

.footer-list-item {
  display: flex;
  align-items: center;
  margin-bottom: 5px;
}

.footer-list-item i{
  padding-right: 20px;
}

.footer-list .contact-link{
  text-decoration: none;
  color: var(--accent);
}

.footer-list .social-link{
  color:var(--text);
}

.footer-list .social-link:hover {
  color: var(--accent);
  opacity: 0.8;
}

.footer-bottom {
  text-align: center;
}

.footer-opening-times{
  display: flex;
  flex-direction: column;
  padding: 0;
}

/* ------ Hamburger menu ------- */

/* Hamburger menu icon styles */
.hamburger-menu {
  display: none;
  cursor: pointer;
}

.hamburger-icon {
  width: 30px;
  height: 20px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.hamburger-icon span {
  width: 100%;
  height: 3px;
  background-color: var(--text);
}

/* ------- Login/register --------- */

.login-container {
  max-width: 400px;
  margin: 100px auto;
  padding: 50px;
  background-color: var(--light) ;
  
  border-radius: 5px;
  box-shadow: 0 2px 5px var(--text);
  display: flex;
  flex-direction: column;
  align-items: center;
}

.login-container h2 {
  text-align: center;
  margin-bottom: 20px;
}

.login-container form {
  display: flex;
  flex-direction: column;
  width: 300px;
}

.login-container label {
  margin-bottom: 5px;
}

.login-container input {
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 10px;
}

.login-container button {
  padding:10px 15px;
  background-color: var(--secondary);
  font-weight: bold;
  color: var(--light);
  border: none;
  border-radius: 5px;
  margin: 20px 10px 10px 10px;
  cursor: pointer;
}

.login-container button:hover {
  background-color: var(--accent);
}

.login-container p{
    align-self: center;
}

/* --------- Logout ---------- */
.logout-container {
  max-width: 400px;
  margin: 100px auto;
  padding: 40px 20px;
  background-color: var(--light);
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.login-container #logout-buttons{
  display: flex;
}

.logout-button {
  display: inline-block;
  padding: 10px 20px;
  margin: 0 10px;
  width: 100px;
  background-color: var(--secondary);
  color: var(--light);
  text-decoration: none;
  border-radius: 5px;
}

.logout-button:hover {
  background-color: var(--accent);
}


/* ---------- Profile ----------- */

section {
    background-color: var(--primary);
    margin: 2rem;
    padding: 2rem;
    border-radius: 20px;
}

header {
    margin-bottom: 10px;
    
}

h2 {
    font-size: 1.5em;
    margin-bottom: 5px;
}

header p {
    font-size: 1em;
    color: var(--accent);
}

.profile-form {
    margin-top: 10px;
}

.profile-form label {
    display: block;
    margin-bottom: 5px;
}

.profile-form input {
    width: 100%;
    max-width: 500px;
    padding: 5px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

.profile-button {
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    color: var(--light);
    font-weight: bold;
}

.profile-form button[type="submit"] {
    background-color: var(--secondary);
}

.profile-form button[type="reset"] {
    background-color: var(--accent);
}

.unsubscribe{
  background: var(--accent);
}

/*------------- Contact ----------- */

.contact_container{
  padding: 20px;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-evenly;
}

.contact_container .form-group{
  display: flex;
  padding: 0 0 20px 0;
  justify-content: space-between;
}

.contact_container h1{
  text-align: center;
  padding-bottom: 20px;
}
.contact_container form {
  display: flex;
  flex-direction: column;
  width: 300px;
  margin: 20px;
}

.contact_container iframe{
  margin: 20px;
}

.contact_container label {
  margin-bottom: 5px;
}

.contact_container input {
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 10px;
}

/* ---------- Responsive ---------- */

@media screen and (max-width: 992px) {
  .header-opening-times{
    display: none;
  }

  .footer-link-box .logo{
    display: none;
  }
}
  
@media screen and (max-width :800px) {
  .header-bottom .logo{
    width: 120px;
    height: 120px; 
  }

  .login-container{
    margin: 0;
    padding: 0;
    width: 100%;
    max-width: none;
    min-height: 100vh;
    padding: 40px auto;
  }
} 
    </style>

    <style>
        body {
    font-family: "Montserrat", sans-serif;
    margin: 0;
    padding: 0;
}

.error {
    color: red;
    font-size: 0.9em;
    margin: 0 0 0 15px;
    padding: 0;
    visibility: hidden;
}

span {
  display: inline-flex;
}

/*----------- Pop Ups ----------*/

.popup .overlay{
  position:fixed;
  top:0px;
  left:0px;
  width:100vw;
  height:100vh;
  background:rgba(0,0,0,0.7);
  z-index:2;
  display: none;
}

.popup .content{
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%) scale(0);
  background:#fff;
  width:450px;
  z-index:3;
  text-align:center;
  padding:20px;
  box-sizing:border-box;
  border-radius: 20px;
}

.popup .close-btn{
  cursor:pointer;
  position:absolute;
  right:20px;
  top:20px;
  width:30px;
  height:30px;
  background:#222;
  color:#fff;
  font-size:25px;
  font-weight:600;
  line-height:30px;
  text-align:center;
  border-radius:50%;
}

.popup .close-btn:hover{
  background:#222222c1;
}

.popup h2{
  margin-top: 50px;
  color: #222222c1;
  font-weight: 600;
}

.popup .form-group {
  margin: 10px;
  color: #222222c1;
  font-weight: 600;
  text-align: left;
}

.popup .form-group input{
  width: 100%;
  padding: 5px;
  border: 1px solid #222;
  border-radius: 5px;
  outline: none;
}

.popup button{
  width: 35%;
  margin: 20px 10px 10px 10px;
  padding: 10px 0;
  background: #222;
  color: #fff;
  border: 0;
  outline: none;
  font-size: 18px;
  border-radius: 4px;
  cursor: pointer;
  box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
}

.popup button:hover{
  opacity: 0.8;
}

.popup.active .overlay{
  display:block;
}

.popup.active .content{
  transition:all 300ms ease-in-out;
  transform:translate(-50%,-50%) scale(1);
}


    </style>
</body>
</html>


