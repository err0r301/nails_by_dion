<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <script src="../scripts/admin_script.js" defer></script>
    <script src="../scripts/popup.js"></script>
    <link rel="stylesheet" href="/../styles/main_styles.css">
    <link rel="stylesheet" href="/../styles/admin_styles.css">
</head>
<body>
    <div class="grid-container">
        <?php
            $page = 'appointment';
            include '../partial/admin_header.php';
            include '../partial/admin_sidebar.php';
            require '../data/config.php';
            
            error_reporting(E_ALL);  
            ini_set('display_errors', 1); 

            $query = "SELECT u.name as name FROM user u, admin a WHERE u.userID = a.userID";
            $result = mysqli_query($conn, $query);
            $stylists = mysqli_fetch_all($result, MYSQLI_ASSOC);

            require '../scripts/appointment_scripts/get_appointments.php';
            require '../scripts/service_scripts/get_services.php';
            require '../scripts/appointment_scripts/add_appointment.php';
            require '../scripts/appointment_scripts/remove_appointment.php';
            require '../scripts/appointment_scripts/edit_appointment.php';            

            $pending = 0;
            $completed = 0;
            $cancelled = 0;

            $appointments = getAppointments();
            $services = getServices();

            foreach ($appointments as $appointment) {
                switch ($appointment['status']) {
                    case 'Pending':
                        $pending++;
                        break;
                    case 'Complete':
                        $completed++;
                        break;
                    case 'Cancelled':
                        $cancelled++;
                        break;
                }
            }
        ?>    
        <!--popups-->
        
        <div class="popup" id="popup-view-appointment">
            <div class="overlay" onclick="togglePopup('popup-view-appointment')"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopup('popup-view-appointment')">&times;</div>
                <h2>Appointment Details</h2>
                <div class="form-group">
                    <p class="view-p">Appointment ID :</p>
                    <p id="view-id-value"></p>
                </div>
                <div class="form-group">
                    <p class="view-p">Client Name : </p>
                    <p id="view-name-value"></p>
                </div>
                <div class="form-group">
                    <p class="view-p">Scheduled Date : </p>
                    <p id="view-date-value"></p>
                </div>
                <div class="form-group">
                    <p class="view-p">Scheduled Time:</p>
                    <p id="view-time-value"></p>
                </div>
                <div class="form-group">
                    <p class="view-p"> Appointment Status :</p>
                    <p id="view-status-value"></p>
                </div>
                <div class="form-group">
                    <p class="view-p"> Service Booked :</p>
                    <p id="view-service-value"></p>
                </div>
            </div>
        </div>

        
        <div class="popup" id="popup-add-appointment">
            <div class="overlay" onclick="togglePopup('popup-add-appointment')"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopup('popup-add-appointment')">&times;</div>
                <h2>Add Appointment</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="appointment-email">Email:</label>
                        <input type="email" name="email" id="appointment-email" autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="appointment-date">Date:</label>
                        <input type="date" name="date" id="appointment-date" required>
                    </div>
                    <div class="form-group">
                        <label for="appointment-time">Time:</label>
                        <input type="time" name="time" id="appointment-time" required>
                    </div>
                    <div class="form-group">
                        <label for="appointment-stylist">Stylist:</label>
                        <select name="stylist" class="form-selector status" required>
                            <?php
                                foreach ($stylists as $stylist) {
                                    echo "<option value=" . $stylist['name'] . ">" . $stylist['name'] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="appointment-stylist">Service:</label>
                        <select name="service" class="form-selector services">
                            <?php
                                foreach ($services as $service) {
                                    echo "<option value=" . $service['serviceID'] . ">" . $service['serviceID'] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit" name="add" value="Add">Add</button>
                    <button type="reset">Reset</button>
                </form>
            </div>
        </div>


        <div class="popup" id="popup-delete-appointment">
            <div class="overlay" onclick="togglePopup('popup-delete-appointment')"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopup('popup-delete-appointment')">&times;</div>
                <h2>Delete Appointment</h2>
                <p>Are you sure you want to delete this appointment?</p>
                <form action="" method="post">
                    <input type="hidden" name="delete-appointment-id" id="delete-appointment-id"> 
                    <button type="submit" id="delete-appointment-btn" value="Delete">Delete</button>
                    <button type="reset" onclick="togglePopup('popup-delete-appointment')">Cancel</button>
                </form>
            </div>
        </div>
        
        <div class="popup" id="popup-edit-appointment">
            <div class="overlay" onclick="togglePopup('popup-edit-appointment')"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopup('popup-edit-appointment')">&times;</div>
                <h2>Edit Appointment</h2>
                <form action="" method="post">
                <input type="hidden" name="edit-appointment-id" id="edit-appointment-id">
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" name="edit_appointment_date" id="edit_appointment_date" class="date" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Time:</label>
                        <input type="time" name="edit_appointment_time" id="edit_appointment_time" class="time" required>
                    </div>
                    <div class="form-group">
                        <label for="appointment-stylist">Stylist:</label>
                        <select name="edit_appointment_stylist" id="edit_appointment_stylist" class="form-selector status" required>
                            <?php
                                foreach ($stylists as $stylist) {
                                    echo "<option value=" . $stylist['name'] . ">" . $stylist['name'] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="edit_appointment_status" id="edit_appointment_status" class="form-selector status">
                            <option value="Pending">Pending</option>
                            <option value="Confirmed">Confirmed</option>
                            <option value="Complete">Complete</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>
                    <button type="submit" name="update" value="Update">Update</button>
                    <button onclick="togglePopup_edit('popup-edit-appointment')">Cancel</button>
                </form>
            </div>
        </div>

                <!-- Confirmation Popups -->
        <!-- Add Appointment Confirmation Popup -->
        <!--<div class="popup" id="add_appointment_confirmation">
            <div class="overlay" onclick="togglePopup('add_appointment_confirmation')"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopup('add_appointment_confirmation')">&times;</div>
                <div class="confirmation-img">
                    <div class="circle">
                        <img src="../_images/tick.png" alt="Confirmation Icon">
                    </div>
                </div>
                <h2>Appointment Added Successfully!</h2>
                <button class="confirm-btn" onclick="togglePopup('add_appointment_confirmation')">OK</button>
            </div>
        </div>
      
        <div class="popup" id="edit_appointment_confirmation">
            <div class="overlay" onclick="togglePopup('edit_appointment_confirmation')"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopup('edit_appointment_confirmation')">&times;</div>
                <div class="confirmation-img">
                    <div class="circle">
                        <img src="../_images/tick.png" alt="Confirmation Icon">
                    </div>
                </div>
                <h2>Appointment Edited Successfully!</h2>
                <button class="confirm-btn" onclick="togglePopup('edit_appointment_confirmation')">OK</button>
            </div>
        </div>

        <div class="popup" id="delete_appointment_confirmation">
            <div class="overlay" onclick="togglePopup('delete_appointment_confirmation')"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopup('delete_appointment_confirmation')">&times;</div>
                <div class="confirmation-img">
                    <div class="circle">
                        <img src="../_images/tick.png" alt="Confirmation Icon">
                    </div>
                </div>
                <h2>Appointment Deleted Successfully!</h2>
                <button class="confirm-btn" onclick="togglePopup('delete_appointment_confirmation')">OK</button>
            </div>
        </div>-->
        
        <!--main content-->
        <main class="main-container">
            <div class="top">
                <h1 class="main-title font-weight-bold">APPOINTMENTS</h1>
                <button class="app-content-headerButton" onclick="togglePopup('popup-add-appointment')">Add Appointment</button>
            </div>
                <div class="main-overview">
                <div class="overview-card">
                    <div class="overview-card__data"><?php echo $pending?></div>
                    <div class="overview-card__info">Appointments pending</div>
                </div>

                <div class="overview-card">
                    <div class="overview-card__data"><?php echo $completed?></div>
                    <div class="overview-card__info">Monthly appointments completed</div>
                </div>
             
                <div class="overview-card">
                    <div class="overview-card__data"><?php echo $cancelled?></div>
                    <div class="overview-card__info">Monthly appointments canceled</div>
                </div>
            </div>

            <div class="table-container">
                <table class="table" id="appointment_table">
                    <thead>
                        <tr>
                            <th onclick="sortTable(0,'appointment_table','appointment_arrow_1')">#<i class="arrow" id="appointment_arrow_1"></i></th>
                            <th onclick="sortTable(1,'appointment_table','appointment_arrow_2')">Client<i class="arrow" id="appointment_arrow_2"></i></th>
                            <th onclick="sortTable(2,'appointment_table','appointment_arrow_4')">Date<i class="arrow" id="appointment_arrow_4"></i></th>
                            <th onclick="sortTable(3,'appointment_table','appointment_arrow_5')">Time<i class="arrow" id="appointment_arrow_5"></i></th>
                            <th>
                                <select name="stylist" id="stylist" class="table-selector" onchange="getValue('stylist')">
                                  <option value="All">Stylists</option>
                                  <?php
                                    foreach ($stylists as $stylist) {
                                        echo "<option value=".$stylist['name'].">".$stylist['name']."</option>";
                                    }
                                  ?>
                                </select>
                            </th>
                            <th>
                                <select name="status" id="status" class="table-selector" onchange="getValue('status')">
                                  <option value="All">Appointments</option>
                                  <option value="Pending">Pending</option>
                                  <option value="Confirmed">Confirmed</option>
                                  <option value="Complete">Complete</option>
                                  <option value="Cancelled">Cancelled</option>
                                </select>
                            </th>
                            <th onclick="togglePopup('popup-add-appointment')"><button class='crud-btn btn-add'><i class="fa fa-plus"></i></button></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  
                        foreach ($appointments as $appointment) {  
                            if ($appointment['appointmentID'] < 10) {  
                                $appointment['appointmentID'] = "0" . $appointment['appointmentID'];  
                            }  
                        
                            $datetime = new DateTime($appointment['date']);  
                            $date = $datetime->format('Y-m-d');  
                            $time = $datetime->format('H:i');  
                            ?>  
                            <tr>  
                                <td><?php echo htmlspecialchars($appointment['appointmentID']); ?></td>  
                                <td><?php echo htmlspecialchars($appointment['client']); ?></td>  
                                <td><?php echo htmlspecialchars($date); ?></td>  
                                <td><?php echo htmlspecialchars($time); ?></td>  
                                <td><?php echo htmlspecialchars($appointment['stylist']); ?></td>  
                                <td><?php echo htmlspecialchars($appointment['status']); ?></td>  
                                <td>   
                                    <button class='crud-btn btn-view' onclick="viewPopup('popup-view-appointment', <?php echo htmlspecialchars(json_encode($appointment), ENT_QUOTES); ?>)"><i class='fa fa-eye'></i></button>  
                                    <button class='crud-btn btn-edit' onclick="togglePopup('popup-edit-appointment', 'edit-appointment-id',<?php echo ($appointment['appointmentID']); ?>)"><i class='fa fa-pen-to-square'></i></button>  
                                    <button class='crud-btn btn-delete' onclick="togglePopup('popup-delete-appointment', 'delete-appointment-id', <?php echo ($appointment['appointmentID']); ?>)"><i class='fa fa-trash-can'></i></button>  
                                </td>  
                            </tr>  
                            <?php  
                        }  
                    ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
<?php 
    if ($add_appointment_confirmation != null){
        $confirmationID = 'add_appointment_confirmation';
        if ($add_appointment_confirmation == true) {
            $confirmationMessage = 'The appointment was added successfully!';
            $confirmationImage = '../_images/tick.png';
        } else {
            $confirmationMessage = 'Failed to add the appointment.';
            $confirmationImage = '../_images/cross.png';
        }
        require_once '../partial/popup.php';
    }
    
    if ($edit_appointment_confirmation != null){
        $confirmationID = 'edit_appointment_confirmation';
        if ($edit_appointment_confirmation == true) {
            $confirmationMessage = 'The appointment was updated successfully!';
            $confirmationImage = '../_images/tick.png';
        } else {
            $confirmationMessage = 'Failed to update the appointment.';
            $confirmationImage = '../_images/cross.png';
        }
        require_once '../partial/popup.php';
    }
    
    if ($remove_appointment_confirmation != null){
        $confirmationID = 'remove_appointment_confirmation';
        if ($remove_appointment_confirmation == true) {
            $confirmationMessage = 'The appointment was deleted successfully!';
            $confirmationImage = '../_images/tick.png';
        } else {
            $confirmationMessage = 'Failed to delete the appointment.';
            $confirmationImage = '../_images/cross.png';
        }
        require_once '../partial/popup.php';
    }
?> 
</html>