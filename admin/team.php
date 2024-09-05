<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <script src="../scripts/admin_script.js" defer></script>
    <link rel="stylesheet" href="/../styles/main_styles.css">
    <link rel="stylesheet" href="/../styles/admin_styles.css">

</head>

<body>
    <div class="grid-container">
        <?php
            $page = 'team';
            include '../partial/admin_header.php';
            include '../partial/admin_sidebar.php';
        ?>

        <main class="main-container">
            <div class="top">
                <h1 class="main-title font-weight-bold">TEAM</h1>
            </div>

            <div class="formatter">

                <div class="adding">
                    <div class="add-card">
                        <form id="add-member-form">
                            <h3>Add New Member</h3>
                            <div class="add-form-container">
                                <div class="add-img-container">
                                    <img id="add-img" src="../_images/profile-pic blank.jpeg" alt="team-profile photo">
                                </div>
                                <div class="add-input-container">
                                    <input type="text" id="member-name" placeholder="Name" required>
                                    <input type="email" id="member-email" placeholder="Email" required>
                                    <input type="pNumber" id="member-pNumber" placeholder="Phone number" required>
                                    <input type="text" id="member-address" placeholder="Address" required>
                                    <input type="text" id="member-role" placeholder="Role" required>
                                    <button type="submit">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                    <div class="added">
                        <div class="deck">

                            <div class="card-container" id="john-card">
                                <div class="team-card">
                                    <div class="trash">
                                        <i id="bin" class="fa-solid fa-xmark"></i>
                                    </div>
                                    <img id="team-pic" src="../_images/profile-pic blank.jpeg" alt="team-profile photo">
                                    <p id="team-name">John Doe</p>
                                    <p id="team-email">john@example.com</p>
                                    <p class="team-role">stylist</p>
                                    <div class="card-bottom">
                                        <!--    <button id="team-view">Edit</button>
                                    <button id="team-view">View</button> -->
                                    </div>
                                </div>
                            </div>

                            <div class="card-container">
                                <div class="team-card">
                                    <div class="trash">
                                        <i id="bin" class="fa-solid fa-xmark"></i>
                                    </div>
                                    <img id="team-pic" src="../_images/profile-pic blank.jpeg" alt="team-profile photo">
                                    <p id="team-name">Jane Doe</p>
                                    <p id="team-email">jane@example.com</p>
                                    <p class="team-role">manager</p>
                                    <div class="card-bottom">
                                        <!--    <button id="team-view">Edit</button>
                                    <button id="team-view">View</button> -->
                                    </div>
                                </div>
                            </div>

                            <div class="card-container">
                                <div class="team-card">
                                    <div class="trash">
                                        <i id="bin" class="fa-solid fa-xmark"></i>
                                    </div>
                                    <img id="team-pic" src="../_images/profile-pic blank.jpeg" alt="team-profile photo">
                                    <p id="team-name">Jim Beam</p>
                                    <p id="team-email">jim@example.com</p>
                                    <p class="team-role">owner</p>
                                    <div class="card-bottom">
                                        <!--    <button id="team-view">Edit</button>
                                    <button id="team-view">View</button> -->
                                    </div>
                                </div>
                            </div>

                            <div class="card-container">
                                <div class="team-card">
                                    <div class="trash">
                                        <i id="bin" class="fa-solid fa-xmark"></i>
                                    </div>
                                    <img id="team-pic" src="../_images/profile-pic blank.jpeg" alt="team-profile photo">
                                    <p id="team-name">Jack Daniels</p>
                                    <p id="team-email">jack@example.com</p>
                                    <p class="team-role">stylist</p>
                                    <div class="card-bottom">
                                        <!--    <button id="team-view">Edit</button>
                                    <button id="team-view">View</button> -->
                                    </div>
                                </div>
                            </div>

                            <div class="card-container">
                                <div class="team-card">
                                    <div class="trash">
                                        <i id="bin" class="fa-solid fa-xmark"></i>
                                    </div>
                                    <img id="team-pic" src="../_images/profile-pic blank.jpeg" alt="team-profile photo">
                                    <p id="team-name">Ali Wong</p>
                                    <p id="team-email">ali@example.com</p>
                                    <p class="team-role">stylist</p>
                                    <div class="card-bottom">
                                        <!--    <button id="team-view">Edit</button>
                                    <button id="team-view">View</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ---------MODAL ----------- -->

                <div id="team-modal" class="t-modal">
                    <div class="t-modal-content">
                        <span class="close">&times;</span>
                        <h2>Team Member Details</h2>
                        <p id="modal-name"></p>
                        <p id="modal-email"></p>
                        <p id="modal-phone"></p>
                        <p id="modal-address"></p>
                        <p id="modal-role"></p>
                        <div class="modal-buttons">
                            <button id="edit-button">Edit</button>
                            <button id="delete-button">Delete</button>
                        </div>
                    </div>
                </div>

                <!-- ---------EDIT MODAL ----------- -->

                <div id="edit-modal" class="t-modal">
                    <div class="t-modal-content">
                        <!--  <span class="close-edit">&times;</span>   -->
                        <h2>Edit Team Member Details</h2>
                        <form id="edit-member-form">
                            <input type="text" id="edit-name" placeholder="Name" required>
                            <input type="email" id="edit-email" placeholder="Email" required>
                            <input type="text" id="edit-phone" placeholder="Phone number" required>
                            <input type="text" id="edit-address" placeholder="Address" required>
                            <input type="text" id="edit-role" placeholder="Role" required>
                            <button type="submit">Save</button>
                        </form>
                    </div>
                </div>

        </main>

    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("add-member-form");
        form.addEventListener("submit", function(e) {
            e.preventDefault();

          
            const name = document.getElementById("member-name").value;
            const email = document.getElementById("member-email").value;
            const phone = document.getElementById("member-pNumber").value;
            const address = document.getElementById("member-address").value;
            const role = document.getElementById("member-role").value;

            // Creates a new team card   

            //  <button id="team-view">Edit</button>
            //<button id="team-view">View</button> 
            const newCard = document.createElement("div");
            newCard.classList.add("card-container");
            newCard.innerHTML = `
                        <div class="team-card">
                            <div class="trash">
                            <i id="bin"class="fa-solid fa-xmark"></i>
                            </div>
                            <img id="team-pic" src="../_images/profile-pic blank.jpeg" alt="team-profile photo">
                            <p id="team-name">${name}</p>
                            <p id="team-email">${email}</p>
                            <p class="team-role">${role}</p>
                            <div class="card-bottom">
                             
                            </div>
                        </div>
                    `;

            // <p id="team-phone">${phone}</p>
            // <p id="team-address">${address}</p>

         
            const deck = document.querySelector(".deck");
            deck.appendChild(newCard);

            
            const trashIcon = newCard.querySelector(".fa-xmark");
            trashIcon.addEventListener("click", function() {
                newCard.remove();
            });

            
            newCard.querySelector(".team-card").addEventListener("click", function() {
                showTeamModal({
                    name,
                    email,
                    phone,
                    address,
                    role
                });
            });

            // Clear inputs
            form.reset();
        });

     
        const existingTrashIcons = document.querySelectorAll(".fa-xmark");
        existingTrashIcons.forEach(icon => {
            icon.addEventListener("click", function() {
                icon.closest(".card-container").remove();
            });
        });

        const existingTeamCards = document.querySelectorAll(".team-card");
        existingTeamCards.forEach(card => {
            card.addEventListener("click", function() {
                const name = card.querySelector(".team-name").textContent;
                const email = card.querySelector(".team-email").textContent;
                const phone = card.querySelector(".team-phone").textContent;
                const address = card.querySelector(".team-address").textContent;
                const role = card.querySelector(".team-role").textContent;
                showTeamModal({
                    name,
                    email,
                    phone,
                    address,
                    role
                });
            });
        });

        // Modal functionality
        const modal = document.getElementById("team-modal");
        const span = document.getElementsByClassName("close")[0];

        function showTeamModal({
            name,
            email,
            phone,
            address,
            role
        }) {
            document.getElementById("modal-name").textContent = name;
            document.getElementById("modal-email").textContent = email;
            document.getElementById("modal-phone").textContent = phone;
            document.getElementById("modal-address").textContent = address;
            document.getElementById("modal-role").textContent = role;
            modal.style.display = "block";
        }

   
        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Edit and Delete buttons
        const editButton = document.getElementById("edit-button");
        const deleteButton = document.getElementById("delete-button");

        editButton.addEventListener("click", function() {
            
            document.getElementById("edit-modal").style.display = "block";

            
            document.getElementById("edit-name").value = document.getElementById("modal-name")
                .textContent;
            document.getElementById("edit-email").value = document.getElementById("modal-email")
                .textContent;
            document.getElementById("edit-phone").value = document.getElementById("modal-phone")
                .textContent;
            document.getElementById("edit-address").value = document.getElementById("modal-address")
                .textContent;
            document.getElementById("edit-role").value = document.getElementById("modal-role")
                .textContent;

        });

        // Save button 
        const saveButton = document.getElementById("edit-member-form");
        saveButton.addEventListener("submit", function(e) {
            e.preventDefault();

            
            document.getElementById("modal-name").textContent = document.getElementById("edit-name")
                .value;
            document.getElementById("modal-email").textContent = document.getElementById("edit-email")
                .value;
            document.getElementById("modal-phone").textContent = document.getElementById("edit-phone")
                .value;
            document.getElementById("modal-address").textContent = document.getElementById(
                "edit-address").value;
            document.getElementById("modal-role").textContent = document.getElementById("edit-role")
                .value;

            
            document.getElementById("edit-modal").style.display = "none";

        });

        deleteButton.addEventListener("click", function() {
            
            const email = document.getElementById("modal-email").textContent;
            const cardToDelete = Array.from(document.querySelectorAll(".team-card"))
                .find(card => card.querySelector("#team-email").textContent === email);
            if (cardToDelete) {
                cardToDelete.closest(".card-container").remove();
            }
            modal.style.display = "none";
        });

    });

    </script>
    </div>
</body>

</html>