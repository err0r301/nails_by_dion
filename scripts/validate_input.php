<?php
//validate input
function validateName($name, $error)
{
    if (empty(trim($name))) {
        return "Name is required";
    } else {
        return $error;
    }
}

function validateEmail($email, $error)
{
    if (empty(trim($email))) {
        return "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format";
    } else {
        return $error;
    }
}

function validateCell($cell, $error)
{
    if (!empty(trim($cell))) {
        if (!preg_match("/^[0-9]*$/", $cell)) {
            return "cell no. must only contain numbers 0-9";
        } elseif (strlen($cell) != 10) {
            return "cell no. must be 10 digits";
        } elseif (!is_numeric($cell)) {
            return "Invalid cell number";
        } else {
            return $error;
        }
    }

    return $error;
}


function validatePassword($password, $error)
{
    $pwdL = strlen($password);
    if (empty(trim($password))) {
        return "Password is required";
    } elseif ($pwdL < 8) {
        return "Password must be 8 characters or longer";
    } elseif (!preg_match("#[0-9]+#", $password)) {
        return "Password must contain a number";
    } elseif (!preg_match("#[A-Z]+#", $password)) {
        return "Password must contain an uppercase letter";
    } elseif (!preg_match("#[a-z]+#", $password)) {
        return "Password must contain a lowercase letter";
    } elseif (!preg_match("#\W+#", $password)) {
        return "Password must contain a special character";
    } else {
        return $error;
    }
}
