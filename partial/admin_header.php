<?php
session_start();
if (!isset($_SESSION['user']))
    header('Location: /../auth/login.php');
if ($_SESSION['user']['userType'] != "Admin")
    header('Location: /../auth/login.php');
echo "<script> console.log('session details : 
                    userID: " . $_SESSION['user']['userID'] . "
                    userType: " . $_SESSION['user']['userType'] . "')</script>";
?>

<header class="header">
    <div class="menu-icon" onclick="openSidebar()">
        <i class="fa fa-bars"></i>
    </div>
    <!--dark/light theme-->
    <div class="container-toggle">
        <!--<button id="theme-toggle" onclick="toggleTheme()">Theme</button>-->
        <label class="switch">
            <input type="checkbox" onclick="toggleTheme()">
            <span class="slider"></span>
        </label>
    </div>
    <script>
    function toggleTheme() {
        const currentTheme = document.documentElement.getAttribute("data-theme");
        const newTheme = currentTheme === "dark" ? "light" : "dark";
        document.documentElement.setAttribute("data-theme", newTheme);
        localStorage.setItem('theme', newTheme); // Save the theme preference
        updateToggleSwitch(newTheme);
    }

    // Load the saved theme preference on page load
    document.addEventListener('DOMContentLoaded', () => {
        const savedTheme = localStorage.getItem('theme') || 'light';
        document.documentElement.setAttribute('data-theme', savedTheme);
        updateToggleSwitch(savedTheme);
    });

    function updateToggleSwitch(theme) {
        const toggleSwitch = document.querySelector('.switch input');
        toggleSwitch.checked = theme === 'dark';
    }
    </script>
    <div class="header-right">
        <a href="admin_notification.php">
            <i class="nav-icon fa fa-bell"></i>
        </a>
        <!--
        <a href="messages.php">
           <i class="nav-icon fa fa-envelope"></i>
        </a>-->

        <div class="dropdown">
            <i class="nav-icon fa-solid fa-user"></i>

            <div class="dropdown-content">
                <a id="profile" href="admin_profile.php">View Profile</a>
                <a id="logout" href="../auth/logout.php">
                    Logout<i class="fa fa-right-from-bracket"></i>
                </a>
            </div>
        </div>
    </div>
</header>