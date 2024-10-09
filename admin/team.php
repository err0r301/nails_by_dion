<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <script src="../scripts/admin_script.js" defer></script>
    <script src="../scripts/popup.js"></script>
    <link rel="stylesheet" href="/../styles/main_styles.css">
    <link rel="stylesheet" href="/../styles/admin_styles.css">

</head>

<body>
    <div class="grid-container">
        <?php
            $page = 'team';
            error_reporting(E_ALL);  
            ini_set('display_errors', 1); 
            include '../partial/admin_header.php';
            include '../partial/admin_sidebar.php';
            require '../scripts/user_scripts/remove_user.php';
            require '../scripts/user_scripts/add_user.php'; 
            require '../scripts/user_scripts/edit_user-info.php';
            require '../scripts/user_scripts/edit_user-pwd.php';           
            require '../scripts/user_scripts/get_admins.php';
            $team = getAdmins();
        ?>

        <main class="main-container">
            <div class="top">
                <h1 class="main-title font-weight-bold">TEAM</h1>
            </div>

            <div class="formatter">

                <div class="adding">
                    <div class="add-card">
                        <form id="add-member-form" action="" method="post" enctype="multipart/form-data">
                            <h3>Add New Member</h3>
                            <div class="add-form-container">
                                <div class="add-img-container">
                                    <img id="add-img" src="../_images/profile-pic blank.jpeg" alt="team-profile photo">
                                </div>
                                <div class="add-input-container">
                                    <input type="text" id="member-name" name="add-name" placeholder="Name" required>
                                    <input type="email" id="member-email" name="add-email" placeholder="Email" required>
                                    <input type="text" id="member-cell" name="add-cell" placeholder="Phone number" required>
                                    <input type="text" id="member-role" name="add-role" placeholder="Role" required>
                                    <label class="upload-image" for="admin-image">Upload Image</label>
                                    <input type="file" name="add-image" id="admin-image" accept="image/JPEG, image/PNG, image/JPG" required>
                                    <button type="submit">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>        

                    <div class="added">
                        <div class="deck">
                            <?php 
                                foreach ($team as $member) {
                                    $name = $member['name'];
                                    $email = $member['email'];
                                    $cell = $member['cell'];
                                    $role = $member['role'];
                                    $image = $member['image'];
                                    $memberID = $member['id'];
                                ?>
 
                                <div class="card-container" onclick="viewModal('popup-view-member', '<?php echo addslashes($memberID); ?>','<?php echo addslashes($name); ?>', '<?php echo addslashes($email); ?>', '<?php echo addslashes($cell); ?>', '<?php echo addslashes($role); ?>'); storeID('<?php echo addslashes( $memberID); ?>','delete-member-id');">
                                        <div class="team-card">
                                            <img id="team-pic" src="<?php echo $image?>" alt="team-profile photo">
                                            <p id="team-name"><?php echo $name ?></p>
                                            <p id="team-email"><?php echo $email ?></p>
                                            <p class="team-role"><?php echo $role ?></p>
                                            <div class="card-bottom">
                                                <!--    <button id="team-view">Edit</button>
                                            <button id="team-view">View</button> -->
                                            </div>
                                        </div>
                                    </div>
                            <?php }?>
                        </div>
                    </div>
                </div>

                <!-- ---------MODAL ----------- -->
                <div class="popup <?php if(isset($pwd)) echo 'active'?>" id="popup-generated-pwd">
                    <div class="overlay" onclick="togglePopup('popup-generated-pwd')"></div>
                    <div class="content">
                        <div class="close-btn" onclick="togglePopup('popup-generated-pwd')">&times;</div>
                        <h2>Generated Password</h2>
                        <strong>Password : <?php echo $pwd;?></strong>
                        <button onclick="togglePopup('popup-generated-pwd')">close</button> 
                    </div>
                </div>

                <div class="popup" id="popup-view-member">
                    <div class="overlay" onclick="togglePopup('popup-view-member')"></div>
                    <div class="content">
                        <div class="close-btn" onclick="togglePopup('popup-view-member')">&times;</div>
                        <h2>Team Member Details</h2>
                        <input type="hidden" name="userID" id="memberUserID">
                        <p id="modal-name"></p>
                        <p id="modal-email"></p>
                        <p id="modal-cell"></p>
                        <p id="modal-role"></p>
                        <div class="modal-buttons">
                            <button id="edit-button" onclick="togglePopup('popup-view-member');editModal('popup-edit-member', '<?php echo addslashes($name); ?>', '<?php echo addslashes($email); ?>', '<?php echo addslashes($cell); ?>', '<?php echo addslashes($role); ?>');">Edit</button>
                            <button id="delete-button" onclick="togglePopup('popup-delete-member');togglePopup('popup-view-member');">Delete</button> 
                        </div>
                    </div>
                </div>
        
                <!-- ---------EDIT MODAL ----------- -->
                <div class="popup" id="popup-edit-member">
                    <div class="overlay" onclick="togglePopup('popup-edit-member')"></div>
                    <div class="content">
                        <div class="close-btn" onclick="togglePopup('popup-edit-member')">&times;</div>
                        <h2>Edit Team Member Details</h2>
                        <form id="edit-member-form" action="" method="post">
                            <input type="hidden" name="userID" id="edit-member-id"> 
                            <input type="text" id="edit-name" name="edit-name" placeholder="Name" required>
                            <input type="email" id="edit-email" name="edit-email" placeholder="Email" required>
                            <input type="text" id="edit-cell" name="edit-cell" placeholder="Phone number" required>
                            <input type="text" id="edit-role" name="edit-role" placeholder="Role" required>
                            <button type="submit">Save</button>
                        </form>
                    </div>
                </div>

                <!-- ---------DELETE MODAL ----------- -->
                <div class="popup" id="popup-delete-member">
                    <div class="overlay" onclick="togglePopup('popup-delete-member')"></div>
                    <div class="content">
                        <div class="close-btn" onclick="togglePopup('popup-delete-member')">&times;</div>
                        <h2>Remove Employee</h2>
                        <p>Are you sure you want to remove this employee?</p>
                        <form action="" method="post">
                            <input type="hidden" name="delete-user-id" id="delete-member-id"> 
                            <button type="submit" id="delete-member-btn" value="Delete">Delete</button>
                            <button type="reset" onclick="togglePopup('popup-delete-member')">Cancel</button>
                        </form>
                    </div>
                </div>
        </main>

    </div>
    <script>
        const modal = document.getElementById("team-modal");
        const modalClose = document.getElementsByClassName("close")[0];

        function showTeamModal(name,email,phone,role) {
            document.getElementById("modal-name").textContent = name;
            document.getElementById("modal-email").textContent = email;
            document.getElementById("modal-phone").textContent = phone;
            document.getElementById("modal-role").textContent = role;
            modal.style.display = "block";
        }
        modalClose.onclick = function() {
            modal.style.display = "none";
        }
    </script>
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

if ($remove_user_confirmation != null){
    $confirmationID = 'confirmation_userInfo';
    if ($remove_user_confirmation == true) {
        $confirmationMessage = 'User details deleted successfully!';
        $confirmationImage = '../_images/tick.png';
    } else {
        $confirmationMessage = 'Failed to delete user details.';
        $confirmationImage = '../_images/cross.png';
    }
    require_once '../partial/popup.php';
}
?>
</html>
    