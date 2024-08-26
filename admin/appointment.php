<?php
    $filePath = __DIR__ . '/../data/appointments.json';
    $appointmentsData = file_get_contents($filePath);
    $appointments = json_decode($appointmentsData, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <script src="../scripts/admin_script.js" defer></script>
    <link rel="stylesheet" href="/../styles/main_styles.css">
    <link rel="stylesheet" href="/../styles/admin_styles.css">
</head>
<body>
    <div class="grid-container">
        <?php
            include '../partial/admin_header.php';
            include '../partial/admin_sidebar.php';

            $pending = 0;
            $completed = 0;
            $cancelled = 0;
            $id = null;
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

            if(isset($_POST['delete'])){
                $id = $_POST['id'];
                unset($appointments[$id]);
                file_put_contents($filePath, json_encode($appointments, JSON_PRETTY_PRINT));
            }

            if(isset($_POST['add'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $date = $_POST['date'];
                $time = $_POST['time'];
                $service = $_POST['service'];
                $data = [
                    'id' => count($appointments) + 1,
                    'name' => $name,
                    'email' => $email,
                    'date' => $date,
                    'time' => $time,
                    'status' => 'Pending',
                    'service' => $service
                ];
                
                $appointments[] = $data;
                file_put_contents($filePath, json_encode($appointments, JSON_PRETTY_PRINT));
            }

            if(isset($_POST['update'])){
                $id = $_POST['id']-1;
                $name = $_POST['name'];
                $email = $_POST['email'];
                $date = $_POST['date'];
                $time = $_POST['time'];
                $status = $_POST['status'];
                $service = $_POST['service'];

                $data = [
                    'id' => $_POST['id'],
                    'name' => $name,
                    'email' => $email,
                    'date' => $date,
                    'time' => $time,
                    'status' => $status,
                    'service' => $service
                ];
                $appointments[$id] = $data;
                file_put_contents($filePath, json_encode($appointments, JSON_PRETTY_PRINT));
            }
        ?>       
        <!--popups-->
        <!--view popup-->
        <div class="popup" id="popup-view-appointment">
            <div class="overlay" onclick="togglePopup_view(null)"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopup_view(null)">&times;</div>
                <h2>Appointment Details</h2>
                <div class="form-group">
                    <p class="view-id"></p>
                </div>
                <div class="form-group">
                    <p class="view-name"></p>
                </div>
                <div class="form-group">
                    <p class="view-email"></p>
                </div>
                <div class="form-group">
                    <p class="view-date"></p>
                </div>
                <div class="form-group">
                    <p class="view-time"></p>
                </div>
                <div class="form-group">
                    <p class="view-status"></p>
                </div>
                <div class="form-group">
                    <p class="view-service"></p>
                </div>
            </div>
        </div>

        <!--add popup-->
        <div class="popup" id="popup-add-appointment">
            <div class="overlay" onclick="togglePopup_add('popup-add-appointment')"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopup_add('popup-add-appointment')">&times;</div>
                <h2>Add Appointment</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="appointment-name">Name:</label>
                        <input type="text" name="name" id="appointment-name" autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="appointment-email">Email:</label>
                        <input type="email" name="email" id="appointment-email" required>
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
                        <label for="appointment-service">Service:</label>
                        <input type="text" name="service" id="appointment-service" required>
                    </div>
                    <button type="submit" name="add" value="Add">Add</button>
                    <button type="reset">Reset</button>
                </form>
            </div>
        </div>

        <!--delete popup-->
        <div class="popup" id="popup-delete-appointment">
            <div class="overlay" onclick="togglePopup_delete(null)"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopup_delete(null)">&times;</div>
                <h2>Are you sure you want to delete this appointment?</h2>
                <form action="" method="post">
                    <input type="hidden" name="id">
                    <button type="submit" name="delete" value="Delete">Delete</button>
                    <button onclick="togglePopup_delete(null)">Cancel</button>
                </form>
            </div>
        </div>

        <!--edit popup-->
        <div class="popup" id="popup-edit-appointment">
            <div class="overlay" onclick="togglePopup_edit(null)"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopup_edit(null)">&times;</div>
                <h2>Edit Appointment</h2>
                <form action="" method="post">
                    <input type="hidden" name="id" class="id">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="name" required>
                    </div>
                    <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="email" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" name="date" class="date" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Time:</label>
                        <input type="time" name="time" class="time" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" class="form-selector status">
                            <option value="Pending">Pending</option>
                            <option value="Complete">Complete</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="service">Service:</label>
                        <input type="text" name="service" class="service" required>
                    </div>
                    <button type="submit" name="update" value="Update">Update</button>
                    <button onclick="togglePopup_edit(null)">Cancel</button>
                </form>
            </div>
        </div>
        
        <!--main content-->
        <main class="main-container">
            <div class="top">
                <h1 class="main-title font-weight-bold">APPOINTMENTS</h1>
                <button class="app-content-headerButton" onclick="togglePopup_add('popup-add-appointment')">Add Appointment</button>
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
<!--
            <div class="appointment-cards">
                <div class="card graph-l">
                    <canvas></canvas>
                </div>
                
                <div class="card graph-r" id="taskList">
                    <h1 class="main-title">TASKS</h1>
                    <div class="add-task">
                        <input type="text" autocomplete="off" placeholder="Add New Task" v-model="tasks.name" @keyup.enter="newItem" class="task-input">
                        <input type="submit" value="" class="submit-task" @click="newItem" title="Add Task">
                    </div>

                    <ul class="task-list">
                        <li class="task-list-item" v-for="task in tasks">
                            <label class="task-list-item-label">
                        <input type="checkbox">
                                <span>{{task.name}}</span>
                            </label>
                            <i class="fa fa-trash delete-btn"></i>
                        </li>
                    </ul>
                </div>
            </div>
            -->

            <div class="table-container">
                <table class="table" id="appointment_table">
                    <thead>
                        <tr>
                            <th onclick="sortTable(0,'appointment_table','appointment_arrow_1')">#<i class="arrow" id="appointment_arrow_1"></i></th>
                            <th onclick="sortTable(1,'appointment_table','appointment_arrow_2')">Name<i class="arrow" id="appointment_arrow_2"></i></th>
                            <th onclick="sortTable(2,'appointment_table','appointment_arrow_3')">E-mail<i class="arrow" id="appointment_arrow_3"></i></th>
                            <th onclick="sortTable(3,'appointment_table','appointment_arrow_4')">Date<i class="arrow" id="appointment_arrow_4"></i></th>
                            <th onclick="sortTable(4,'appointment_table','appointment_arrow_5')">Time<i class="arrow" id="appointment_arrow_5"></i></th>
                            <th>
                                <select name="status" id="status" onchange="getValue()">
                                  <option value="All">Appointments</option>
                                  <option value="Pending">Pending</option>
                                  <option value="Complete">Complete</option>
                                  <option value="Cancelled">Cancelled</option>
                                </select>
                            </th>
                            <th onclick="togglePopup_add('popup-add-appointment')"><button class='crud-btn btn-add'><i class="fa fa-plus"></i></button></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($appointments as $appointment) {
                                $appointmentJson = json_encode($appointment);
                                echo "
                                    <tr>
                                        <td>".$appointment['id']."</td>
                                        <td>".$appointment['name']."</td>
                                        <td>".$appointment['email']."</td>
                                        <td>".$appointment['date']."</td>
                                        <td>".$appointment['time']."</td>
                                        <td>".$appointment['status']."</td>
                                        <td> 
                                            <input type='hidden' name='id' value=".$appointment['id'].">
                                            <button class='crud-btn btn-view' onclick='togglePopup_view(".$appointmentJson.")'><i class='fa fa-eye'></i></button>
                                            <button class='crud-btn btn-edit' onclick='togglePopup_edit(".$appointmentJson.")'><i class='fa fa-pen-to-square'></i></button>
                                            <button class='crud-btn btn-delete' onclick='togglePopup_delete(".($appointment['id']-1).")'><i class='fa fa-trash-can'></i></button>
                                        </td>
                                    </tr>
                                ";
                            };
                        ?> 
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>