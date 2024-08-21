<?php
//validate input
function validateName($name) {
    if (empty(trim($name))) {
        return "*";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        return "Only letters allowed";
    } else {
        return null;
    }
}

function validateEmail($email) {
    if (empty(trim($email))) {
        return "*";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format";
    } else {
        return null;
    }
}

function validateCell($cell) {
    if (!empty(trim($cell))) {
        if (!preg_match("/^[0-9]*$/", $cell)) {
            return "no characters allowed";
        } elseif (strlen($cell) != 10) {
            return "cell no. must be 10 digits";
        } elseif (!is_numeric($cell)) {
            return "Invalid cell number";
        } else {
            return null;
        }
    }

    return null;
}

function validatePassword($password) {
    if (empty(trim($password))) {
        return "*";
    } elseif (strlen($password) < 8) {
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
        return null;
    }
}

