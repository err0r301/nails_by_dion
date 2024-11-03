<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <script src="../scripts/admin_script.js" defer></script>
    <link rel="stylesheet" href="/../styles/admin_styles.css">
    <link rel="stylesheet" href="/../styles/main_styles.css">

</head>

<body>
    <div class="grid-container">
        <?php
        $page = 'admin_notification';
        include '../partial/admin_header.php';
        include '../partial/admin_sidebar.php';
        require '../scripts/get_notification.php'
        ?>

        <main class="main-container">
            <div class="top">
                <p class="main-title font-weight-bold">NOTIFICATIONS (<span id="notification-count">3</span>)</p>
                <!-- <div>
                    <input type="text" id="calendar-input" placeholder="dd/mm/yyyy">
                    <button id='calendar-button'><i class="fa fa-calendar"></i>
                    </button>
                </div> -->
            </div>

            <?php
            $notifications = getNotifications();
            if ($notifications == "No notifications found") {
                echo "<p>No notifications found</p>";
            } else {
                foreach ($notifications as $notification) {
                    echo "<script>console.log('" . $notification['message'] . "')</script>"; ?>
                    <div class="message-box" data-message="<?php echo $notification["message"] ?>">
                        <div class="message-start">
                            <img src="../_images/profile-pic blank.jpeg" alt="Profile picture">
                            <p class="message-name"><?php echo $notification["sender"] ?></p>
                        </div>
                        <p class="message-time"><?php echo $notification["time"] ?></p>
                    </div>
            <?php }
            }
            ?>
            <!--
            <div class="message-box"
                data-message="Dear John, this is a reminder for your appointment scheduled for tomorrow at 3:00 PM. Please make sure to arrive 10 minutes early.">
                <div class="message-start">
                    <img src="../_images/profile-pic blank.jpeg" alt="Profile picture">
                    <p class="message-name">John Doe</p>
                    <p class="message-title">Appointment Reminder - Tomorrow at 3:00 PM</p>
                </div>
                <p class="message-time">10:25am</p>
            </div>

            <div class="message-box"
                data-message="Hello Jane, we have received a new order with the order number #12345. Please review and process it as soon as possible.">
                <div class="message-start">
                    <img src="../_images/profile-pic blank.jpeg" alt="Profile picture">
                    <p class="message-name">Jane Smith</p>
                    <p class="message-title">New Order Received - Order #12345</p>
                </div>
                <p class="message-time">10:30am</p>
            </div>

            <div class="message-box"
                data-message="Hi Alex, your payment for invoice #67890 has been successfully received. Thank you for your prompt payment.">
                <div class="message-start">
                    <img src="../_images/profile-pic blank.jpeg" alt="Profile picture">
                    <p class="message-name">Alex Johnson</p>
                    <p class="message-title">Payment Confirmation - Invoice #67890</p>
                </div>
                <p class="message-time">10:35am</p>
            </div>

            <div id="message-read" class="message-box message-unread"
                data-message="Hi Tinashe, this is a test message to ensure the notification system is working correctly.
                  Testing is a crucial aspect of software development, ensuring that applications function as intended and meet user requirements.
                  It involves systematically executing code to identify bugs, errors, or inconsistencies that may arise during the development process.
                  Various testing methodologies, such as unit testing, integration testing, and system testing, are employed to validate different aspects of the software.
                  Additionally, testing helps improve the overall quality of the product, enhances user experience, and boosts confidence in the reliability of the software.
                  By conducting thorough testing, developers can identify and rectify issues early in the development lifecycle, ultimately leading to a more robust and stable final product.">

                <div class="message-start">
                    <img src="../_images/profile-pic blank.jpeg" alt="Profile picture">
                    <p class="message-name">Tinashe Murindagomo</p>
                    <p class="message-title">Hello Website - Testing</p>
                </div>
                <p class="message-time">10:35am</p>
            </div>-->

        </main>

        <!-- The Modal -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p id="modalMessage">This is the message inside the modal.</p>
            </div>
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // Get all message boxes
        var messageBoxes = document.querySelectorAll('.message-box');

        // When the user clicks on a message box, open the modal with animation
        messageBoxes.forEach(function(box) {
            box.onclick = function() {
                var message = box.getAttribute('data-message');
                document.getElementById('modalMessage').textContent = message;
                modal.classList.remove('fade-out');
                modal.classList.add('fade-in');
                modal.style.display = "grid";
            }
        });

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it with animation
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.classList.remove('fade-in');
                modal.classList.add('fade-out');
                setTimeout(function() {
                    modal.style.display = "none";
                }, 400); // Match the animation-duration time
            }
        }
    </script>
</body>

</html>