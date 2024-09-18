<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../scripts/admin_script.js" defer></script>
    <link rel="stylesheet" href="/../styles/main_styles.css">
    <link rel="stylesheet" href="/../styles/admin_styles.css">
</head>
<body>
    <div class="grid-container">
        <?php
            $page = 'overview';
            include '../partial/admin_header.php';
            include '../partial/admin_sidebar.php';
            require '../scripts/chart.php';
        ?>

        <main class="main-container">
            <div class="top">
                <h1 class="main-title font-weight-bold">DASHBOARD</h1>
            </div>

            <div class="main-overview">
                <div class="overview-card">
                    <div class="overview-card__data">58</div>
                    <div class="overview-card__info">Weekly appointments</div>
                </div>

                <div class="overview-card">
                    <div class="overview-card__data">274</div>
                    <div class="overview-card__info">Monthly appointments</div>
                </div>
             
                <div class="overview-card">
                    <div class="overview-card__data">R23000</div>
                    <div class="overview-card__info">Sales this week</div>
                </div>

                <div class="overview-card">
                    <div class="overview-card__data">R85000</div>
                    <div class="overview-card__info">Sales this month</div> 
                </div>
            </div>

            <div class="main-cards">
                <div class="card card-3">
                    <canvas id="dashboard-sales-monthly"></canvas>
                </div>

                <div class="card card-2">
                    <canvas id="dashboard-sales-weekly"></canvas>
                </div>

                <div class="card card-1">
                    <canvas id="dashboard-service-revenue"></canvas>
                </div>    
            </div>
            <!--<div class="customer-line-graph">
                <canvas id="dashboard-customer-number"></canvas>
            </div>-->

            <div class="profile">
                <div class="profile-avatar">
                    <img src="../_images/profile-pic blank.jpeg" alt="Profile Image" class="profile-img">
                    <div class="profile-info">
                        <b id="profile-name" ><?php echo $_SESSION['user']['name']; ?></b>
                        <br>
                        <b><?php echo $_SESSION['user']['email']; ?></b>
                        <br>
                        <i>Role</i>
                        <br>
                        <a href="admin_profile.php">
                            <button id="edit-profile-btn">Edit</button>
                        </a>
                    </div>
                </div>
                <img src="../_images/profile-cover.jpg" alt="" class="profile-cover">
            </div>
<!--
            <div class="main-cards">
                <div class="card card-4" id="taskList">
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

                <div class="card card-4">
                    <div class="profile">
                        <div class="profile-avatar">
                            <img src="../_images/profile-pic blank.jpeg" alt="Profile Image" class="profile-img">
                            <div class="profile-info">
                                <b id="profile-name" ><?php echo $_SESSION['user']['name']; ?></b>
                                <br>
                                <b><?php echo $_SESSION['user']['email']; ?></b>
                                <br>
                                <i>Role</i>
                            </div>
                        </div>
                        <img src="../_images/profile-cover.jpg" alt="" class="profile-cover">
                    </div>
                </div>
            </div>
-->
        </main>
    </div>
    <script>
        displayMonthlySales('dashboard-sales-monthly');
        displayWeeklySales('dashboard-sales-weekly');
        displayServiceRevenue('dashboard-service-revenue');
        displayCustomerNumber('dashboard-customer-number');
    </script>
</body>
</html>