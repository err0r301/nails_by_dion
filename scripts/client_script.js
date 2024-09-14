function validateEmail($email,$emailError) {
  var email = document.getElementById($email).value;
  var emailError = document.getElementById($emailError);

  if (email == "") {
    emailError.innerHTML = "Email cannot be empty";
    emailError.style.visibility = 'visible';
    //return false;
  } 

  if (email.indexOf("@") == -1) {
    emailError.innerHTML = "Invalid Email Address";
    emailError.style.visibility = 'visible';
    //return false;
  } 
}  

function validatePassword($password,$passwordError) {

  var pwd = document.getElementById($password).value;
  var pwdError = document.getElementById($passwordError);

  if (pwd.length < 8) {
    pwdError.innerHTML = "Password must be at least 8 characters";
    pwdError.style.visibility = 'visible';
    //return false;
  }

  // upper case
  if (!/[A-Z]/.test(pwd)) {
    pwdError.innerHTML = "Password must contain at least one uppercase letter";
    pwdError.style.visibility = 'visible';
    //return false;
  }

  // lower case
  if (!/[a-z]/.test(pwd)) {
    pwdError.innerHTML = "Password must contain at least one lowercase letter";
    pwdError.style.visibility = 'visible';
    //return false;
  }

  // number
  if (!/[0-9]/.test(pwd)) {
    pwdError.innerHTML = "Password must contain at least one number";
    pwdError.style.visibility = 'visible';
    //return false;
  }

  //special character
  if (!/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(pwd)) {
    pwdError.innerHTML = "Password must contain at least one special character";
    pwdError.style.visibility = 'visible';
    //return false;
  }

  if (pwd == "") {
    pwdError.innerHTML = "Password cannot be empty";
    pwdError.style.visibility = 'visible';
    //return false;
  }
}
  