<?php 
    /*session_start();
    if(!isset($_SESSION['user']))
        header('Location: /../auth/login.php');
    if($_SESSION['user']['userType'] != "Admin")
        header('Location: /../auth/login.php');
    echo"<script> console.log('session details : 
                    userID: $_SESSION[user]['userID']
                    userType: $_SESSION[user]['userType']')</script>"; */
?>

<header class="header">
    <div class="menu-icon" onclick="openSidebar()">
        <i class="fa fa-bars"></i>
    </div>
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


