<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUSTOMERS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../scripts/admin_script.js" defer></script>
    <link rel="stylesheet" href="/../styles/main_styles.css">
    <link rel="stylesheet" href="/../styles/admin_styles.css">
</head>

<body>
    <div class="grid-container">
        <?php
        $page = 'customer';
        include '../partial/admin_header.php';
        include '../partial/admin_sidebar.php';
        $filePath = __DIR__ . '/../data/customers.json';
        $customersData = file_get_contents($filePath);
        $customers = json_decode($customersData, true);
        ?>

        <main class="main-container">
            <div class="top">
                <h1 class="main-title font-weight-bold">CUSTOMERS</h1>
            </div>

            <div class="customer-overview">
                <div class="overview-container">
                    <div class="overview-card">
                        <div class="overview-card__data">267</div>
                        <div class="overview-card__info">Customers</div>
                    </div>

                    <div class="overview-card">
                        <div class="overview-card__data">229</div>
                        <div class="overview-card__info">Subscribers</div>
                    </div>

                    <div class="overview-card">
                        <div class="overview-card__data">62</div>
                        <div class="overview-card__info">Loyalty Members</div>
                    </div>
                </div>
                <div class="customer-line-graph">
                    <canvas id="customer-number"></canvas>
                </div>
            </div>


            <div class="table-container">
                <table class="table" id="customer_table">
                    <thead>
                        <tr>
                            <th onclick="sortTable(0,'customer_table','customer_arrow_1')">#<i class="arrow" id="customer_arrow_1"></i></th>
                            <th onclick="sortTable(1,'customer_table','customer_arrow_2')">Name<i class="arrow" id="customer_arrow_2"></i></th>
                            <th onclick="sortTable(2,'customer_table','customer_arrow_3')">Email<i class="arrow" id="customer_arrow_3"></i></th>
                            <th onclick="sortTable(3,'customer_table','customer_arrow_4')">Number<i class="arrow" id="customer_arrow_4"></i></th>
                            <th>
                                <select name="status" id="status" onchange="getValue()">
                                    <option value="All">All customers</option>
                                    <option value="Subscribed">Subscribed</option>
                                    <option value="Unsubscribed">Unsubscribed</option>
                                </select>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($customers as $customer) {
                            echo "
                                    <tr>
                                        <td>" . $customer['id'] . "</td>
                                        <td>" . $customer['name'] . "</td>
                                        <td>" . $customer['email'] . "</td>
                                        <td>" . $customer['phone'] . "</td>
                                        <td>" . $customer['status'] . "</td>
                                    </tr>
                                ";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>

</html>