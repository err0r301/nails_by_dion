<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../scripts/admin_script.js" defer></script>
    <link rel="stylesheet" href="/../styles/main_styles.css">
    <link rel="stylesheet" href="/../styles/admin_styles.css">
</head>

<body>
    <div class="grid-container">
        <?php
        $page = 'sale';
        include '../partial/admin_header.php';
        include '../partial/admin_sidebar.php';
        require '../scripts/chart.php';
        ?>

        <main class="main-container">
            <div class="top">
                <h1 class="main-title font-weight-bold">SALES</h1>
            </div>

            <div class="main-overview">
                <div class="overview-card">
                    <div class="overview-card__data">29</div>
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

            <div class="main-cards sales">
                <div class="card card-1">
                    <canvas id="service-revenue"></canvas>
                </div>

                <div class="card card-2">
                    <canvas id="sales-weekly"></canvas>
                </div>

                <div class="card card-3">
                    <canvas id="sales-monthly"></canvas>
                </div>
            </div>
        </main>
    </div>
</body>

</html>